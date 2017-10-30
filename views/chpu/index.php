<?php
include ROOT . '/views/laouyts/header.php';
include_once ROOT.'/models/Chpu.php';
include_once ROOT.'/models/ChpuFor.php';
?>
    <div class="row col-lg-12">
        <div class=""> </div>
        <div class="col-lg-3">
            <?php foreach ($details as $item) : ?>
                <button type="button"
                        data-id="<?= $item['id']; ?>"
                        id="details<?= $item['id']; ?>"
                        class="btn btn-primary btn-block for_list"><?= $item['name'] ?>
                </button>
            <?php endforeach; ?>
        </div>
        <div class="col-lg-3 for-content"></div>
        <div class="col-lg-6 parameter-content"></div>
    </div>
    <div class="col-lg-12 row text-center" style="margin: 15px" >
        <img src="" alt="" class="img-responsive text-center" id="details-img">
    </div>

<?php if ($save) : ?>
    <div class="row col-lg-10 col-lg-offset-1" style="margin-top: 30px">
        <div href="#" class="list-group-item active" style="color: white">
            Сохранненая конфигурация
            <div style="float: right; margin-top: -8px; margin-right: -12px">
                <form action="" method="post">
                    <input type="submit" name="save" class="btn btn-default" value="Сохранить"/>
                    <input type="submit" name="clear" class="btn btn-warning" value="Очистить"/>
                </form>
            </div>
        </div>
            <table class="col-md-12 table table-bordered table-responsive" style="z-index: 10000; background: white" >
            <?php foreach ($save as $item) : ?>
                    <tr id="for_param_<?=$item['id']?>">
                        <td class="col-md-2">
                            <?= Chpu::getDetailsName($item['id_details']) ?>
                        </td>
                        <td class="col-md-4">
                            <?= ChpuFor::getCode($item['id_for']).'('.ChpuFor::getName($item['id_for']).')' ?>
                        </td>
                        <td class="col-md-6">
                            <?= $item['text'] ?>
                        </td>
                        <td>
                            <button type="button" class="btn btn-link btn-param-delete" data-id = "<?=$item['id']?>" title="Удалить запись"><span class="glyphicon glyphicon-trash"></span> </button>
                        </td>
                    </tr>
            <?php endforeach; ?>
            </table>
    </div>
<?php endif ?>

<?php
include ROOT . '/views/laouyts/footer.php'
?>


