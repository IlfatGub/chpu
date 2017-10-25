<?php

include_once ROOT . '/models/Details.php';
include_once ROOT . '/models/ChpuFor.php';
include_once ROOT . '/models/Parameter.php';

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
                    Details::setDetails($_POST['name']);
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

    public static function actionAjaxParam()
    {
//        print_r($_GET['id']);
//        print_r( $_GET['val']);
//        print_r($_GET['type']);
//        Parameter::updateById($_GET['id'], $_GET['val'], $_GET['type']);
    }

}