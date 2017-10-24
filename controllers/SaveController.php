<?php
include_once ROOT . '/models/Chpu.php';
include_once ROOT . '/models/ChpuFor.php';
include_once ROOT . '/models/Save.php';

class SaveController
{

    public function actionDelete($id)
    {
        Save::delete($id);

        return true;
    }
}