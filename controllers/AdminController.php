<?php

include_once ROOT . '/models/Details.php';
include_once ROOT . '/models/ChpuFor.php';
include_once ROOT . '/models/Parameter.php';
include_once ROOT . '/models/Save.php';

class AdminController
{
    public static function actionDetails($del = null)
    {
        $errors = array();
        if (isset($del)) :
            Details::delete($del);
        endif;

        if (isset($_POST['add'])) :
            if (isset($_POST['name'])) :
                if (Details::chekDetails($_POST['name']) !== true):
                    $uploaddir = 'template/uploads/'; // Relative path under webroot
                    $filename = $_FILES['file']['name'];
                    $ext = explode('.', $filename);
                    $name = Save::translit($_POST['name']).'.'.array_pop($ext);
                    $uploadfile = $uploaddir . basename($name);

                    if (move_uploaded_file($_FILES['file']['tmp_name'], $uploadfile)) {
                        echo "File is valid, and was successfully uploaded.\n";
                        Details::setDetails($_POST['name'], basename($name));
                    } else {
                        echo "File uploading failed.\n";
                    }
                else:
                    $errors[] = 'Такое наименование уже есть';
                endif;
            else:
                $errors[] = 'Введите Наименование';
            endif;
        endif;

        $details = Details::getList();

        require_once(ROOT . '/views/admin/details.php');
        return true;
    }

    public static function actionFor($del = null)
    {
        $errors = array();
        if (isset($del)) :
            ChpuFor::delete($del);
        endif;

        if (!empty($_POST['add'])):
            if (!empty($_POST['name']) and !empty($_POST['code'])) {
                if (ChpuFor::chekForbyCode($_POST['code']) !== true) :
                    ChpuFor::setFor($_POST['name'], $_POST['code']);
                else:
                    $errors[] = 'Цикл с таким кодом уже добавлен';
                endif;
            } else {
                $errors[] = 'Одно из полей не заполнено';
            }
        endif;

        $for = ChpuFor::getList();

        require_once(ROOT . '/views/admin/for.php');
        return true;
    }

    public static function actionParameter($for, $del = null)
    {
        $errors = array();
        if (isset($del)) :
            Parameter::delete($del);
        endif;

        if (!empty($_POST['add'])):
            if (!empty($_POST['name']) and !empty($_POST['code']) and !empty($_POST['ext'])) {
                if (Parameter::checkByCode($for, $_POST['code']) !== true and Parameter::checkByName($for, $_POST['name']) !== true) :
                    Parameter::setParameter($_POST['name'], $_POST['code'], $_POST['ext'], $for);
                else:
                    $errors[] = 'Введные данные, совпадают с данными в базе данных';
                endif;
            } else {
                $errors[] = 'Одно из полей не заполнено';
            }
        endif;

        if (!empty($_POST['update'])) {
            if (!empty($_POST['upd_name']) and !empty($_POST['upd_code']) and !empty($_POST['upd_ext'])) {
                Parameter::updateById($_POST['upd_id'], $_POST['upd_name'], $_POST['upd_code'], $_POST['upd_ext']);
            } else {
                $errors[] = 'Одно из полей не заполнено';
            }
        }

        $parameter = Parameter::getListByForId($for);

        require_once(ROOT . '/views/admin/parameter.php');
        return true;
    }

    public static function actionDetailsUpd($id){
        if (!empty($_POST['update'])) {
            if (!empty($_POST['upd_name']) or empty($_POST['upd_file'])) {
                $uploaddir = 'template/uploads/'; // Relative path under webroot
                $filename = $_FILES['upd_file']['name'];
                $ext = explode('.', $filename);
                $name = Save::translit($_POST['upd_name']).'.'.array_pop($ext);
                $uploadfile = $uploaddir . basename($name);

                if (move_uploaded_file($_FILES['upd_file']['tmp_name'], $uploadfile)) {
                    echo "File is valid, and was successfully uploaded.\n";
                } else {
                    echo "File uploading failed.\n";
                }
                Details::updateById($_POST['upd_name'], $name, $id);
            } else {
                $errors[] = 'Одно из полей не заполнено';
            }
        }

        $details = Details::findById($id);


        require_once(ROOT . '/views/admin/detailsUpd.php');
        return true;
    }

}