<?php
include_once ROOT . '/models/Chpu.php';
include_once ROOT . '/models/ChpuFor.php';
include_once ROOT . '/models/Save.php';

class ChpuController
{

    public function actionIndex()
    {
        if (isset($_POST['submit'])) {
            $text = '';
            $maxCount = 0;
            $sum = 0;
            $arr_item = array();
            $for = Chpu::getParameter($_POST['for']);
            foreach ($for as $item) {
                $arr_item[$item['code']] = explode(';', trim($_POST[$item['code']]));
                $maxCount < count($arr_item[$item['code']]) ? $maxCount = count($arr_item[$item['code']]) : $maxCount = $maxCount;
//                foreach ($arr_item as $parameter) {
//                    $text .= $_POST[$item['code']] ? trim($item['code']) . $parameter . ' ' : '';
//                }
                $sum = $sum + $_POST[$item['code']];
            }
            if ($sum) :
                for ($i = 0; $i < $maxCount; $i++) :
                    foreach ($for as $item) :
                        $text .= substr($item['code'], 0, -1) . $i;
                        $text .= isset($arr_item[$item['code']][$i]) ? $arr_item[$item['code']][$i] : '';
                        $text .= ' ';
                    endforeach;
                endfor;

                Chpu::setSave($_POST['details'], $_POST['for'], $text);
            endif;
        }

        if (isset($_POST['clear'])) {
            Save::clear();
        }

        $details = Chpu::getDetails();
        $save = Save::getSave();

        if (isset($_POST['save'])) {
            Save::saveFile($save);
            Save::downloadFile();
        }

        require_once(ROOT . '/views/chpu/index.php');

        return true;
    }

    public function actionView($id, $page = 1)
    {
        $model = Chpu::getParameter($id, $page);
        require_once(ROOT . '/views/chpu/view.php');

        return true;
    }

    public function actionFor($id)
    {
        $details = Chpu::getDetails();
        $detailsId = $id;
        $operations = Chpu::getOperations();
        require_once(ROOT . '/views/chpu/for.php');

        return true;
    }

    public function actionParameter($detailsId, $forId)
    {
        $model = Chpu::getParameter($forId);
        require_once(ROOT . '/views/chpu/parameter.php');

        return true;
    }

    public function actionAdd()
    {
        print_r($_POST);
        return true;
    }

}