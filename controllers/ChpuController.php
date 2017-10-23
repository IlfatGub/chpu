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
            $sum = 0;
            $for = Chpu::getParameter($_POST['for']);
            foreach ($for as $item) {
                $text .= $_POST[$item['code']] ? trim($item['code']) . trim($_POST[$item['code']]) . ' ' : '';
                $sum = $sum + $_POST[$item['code']];
            }
            if ($sum) {
                Chpu::setSave($_POST['details'], $_POST['for'], $text);
            }
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