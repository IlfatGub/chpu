<?php
include ROOT . '/views/laouyts/header.php';
include_once ROOT.'/models/Chpu.php';
include_once ROOT.'/models/ChpuFor.php';
?>
    <div class="col-lg-8 col-lg-offset-2 text-center" style="margin-bottom: 30px">
        <div class="btn-group btn-group-lg">
            <?php foreach ($details as $item) : ?>
                <button type="button" data-id="<?= $item['id']; ?>" id="details<?= $item['id']; ?>"
                        class="btn btn-primary  for_list"><?= $item['name'] ?></button>
            <?php endforeach; ?>
        </div>

    </div>

    <div class="row col-lg-12">
        <div class="col-lg-5 for-content"></div>
        <div class="col-lg-7 parameter-content"></div>
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



Агапов А
Исхакова Р
Кузьмина Е
Валиуллин А
