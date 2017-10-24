<?php
include ROOT . '/views/admin/laouyts/header.php';
?>

<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12" style="display: inline-block; vertical-align: ">
    <?php if (count($errors) > 0) : ?>
        <h4 class="alert-danger label-danger" style="padding: 5px">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </h4>
    <?php endif; ?>

    <div class="row col-lg-12 col-md-12 col-sm-12 col-xs-12">
        <form action="" method="post">
            <div class="col-lg-3 col-md-3 col-sm-3  col-xs-3">
                <input type="text" name="code" class="form-control " placeholder="Код">
            </div>
            <div class="col-lg-6 col-md-6 col-sm-6 col-xs-6 ">
                <input type="text" name="name" class="form-control " placeholder="Параметр">
            </div>
            <div class="col-lg-2 col-md-2 col-sm-2 col-xs-2 ">
                <input type="text" name="ext" class="form-control " placeholder="ед/изм">
            </div>
            <input type="submit" name="add" class="btn-success btn col-lg-1 col-md-1 col-sm-1 col-xs-1" value="+">
        </form>
    </div>
    <br><br>
    <h2 class="page-header">Цикл - <?= ChpuFor::getName($for) ?></h2>
    <table class="table table-bordered table-responsive" style="background: white">
        <tr class="alert-info">
            <td style="max-width: 50px">Code</td>
            <td>Наименование детали</td>
            <td>ед/изм</td>
            <td></td>
        </tr>
        <?php foreach ($parameter as $item) : ?>
            <tr>
                <td><?= $item['code'] ?></td>
                <td><?= $item['name'] ?></td>
                <td><?= $item['ext'] ?></td>
                <td>
                    <div style="float: right;"><small><a href="/admin/parameter/<?=$for?>/delete/<?= $item['id'] ?>">Удалить</a></small></div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php
include ROOT . '/views/admin/laouyts/footer.php'
?>


