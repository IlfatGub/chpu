<?php
include ROOT . '/views/admin/laouyts/header.php';
include_once ROOT . '/models/Chpu.php';
include_once ROOT . '/models/ChpuFor.php';
?>
<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12"  style="display: inline-block; vertical-align: ">

    <?php if (count($errors) > 0) : ?>
        <h4 class="alert-danger label-danger" style="padding: 5px">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </h4>
    <?php endif; ?>

    <div class="row col-lg-12 col-md-10 col-sm-10 col-xs-10">
        <form action="" method="post">
            <div class="col-lg-7 col-md-7 col-sm-7 col-xs-7">
                <input type="text" name="name" class="form-control " placeholder="введите название детали">
            </div>
            <div class="col-lg-3 col-md-3 col-sm-3 col-xs-3 ">
                <input type="text" name="code" class="form-control " placeholder="Код цикла">
            </div>
            <input type="submit" name="add" class="btn-success btn col-lg-2 col-md-2 col-sm-2 col-xs-2" value="Добавить">
        </form>
    </div>

    <br><br>
    <h2 class="page-header">Список цикл</h2>
    <table class="table table-bordered table-responsive" style="background: white">
        <tr class="alert-info">
            <td style="max-width: 50px">Id</td>
            <td>Code</td>
            <td>
                Наименование детали
            </td>
        </tr>
        <?php foreach ($for as $item) : ?>
            <tr>
                <td><?= $item['id'] ?></td>
                <td><?= $item['code'] ?></td>
                <td>
                    <?= $item['name'] ?>
                    <div style="float: right;">
                        <small><a href="/admin/for/<?= $item['id'] ?>">Удалить</a></small>
                        /
                        <small><a href="/admin/parameter/<?= $item['id'] ?>">Параметры </a></small>
                    </div>
                </td>
            </tr>
        <?php endforeach; ?>
    </table>

</div>

<?php
include ROOT . '/views/admin/laouyts/footer.php'
?>


