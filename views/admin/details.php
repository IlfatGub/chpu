<?php
include ROOT . '/views/admin/laouyts/header.php';
?>

<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12"
     style="display: inline-block; vertical-align: ">

    <?php if (count($errors) > 0) : ?>
        <h4 class="alert-danger label-danger" style="padding: 5px">
            <?php foreach ($errors as $error) {
                echo $error . "<br>";
            } ?>
        </h4>
    <?php endif; ?>

    <div class="row col-lg-12 col-md-10 col-sm-10 col-xs-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-10 col-md-10 col-sm-10  col-xs-10">
                <input type="text" name="name" class="form-control " placeholder="введите название детали">
                <input type="file" name="file">
            </div>
            <input type="submit" name="add" class="btn-success btn col-lg-2 col-md-2 col-sm-2 col-xs-2" value="+">
        </form>
    </div>
    <br><br>
    <h2 class="page-header">Список деталей</h2>
    <div class="row">

        <?php foreach ($details as $item) : ?>
<!--            <tr style="vertical-align: middle">-->
<!--                <td><img src="--><?//= '\template\uploads\\'.$item['img'] ?><!--" height="100px" class="img-rounded "> </td>-->
<!--                <td>-->
<!--                    --><?//= $item['name'] ?>
<!--                    <div style="float: right;">-->
<!--                            <small><a href="/admin/details/update/--><?//= $item['id'] ?><!--">Изменить /</a></small>-->
<!--                            <small><a href="/admin/delete/--><?//= $item['id'] ?><!--">Удалить</a></small>-->
<!--                    </div>-->
<!--                </td>-->
<!--            </tr>-->
            <div class="col-sm-6 col-md-4">
                <div class="thumbnail">
                    <img data-src="holder.js/300x200" alt="300x200" style="width: 300px; height: 200px;" src="<?='\template\uploads\\'.$item['img'] ?>">
                    <div class="caption">
                        <h5><?= $item['name'] ?></h5>
                        <p>
                            <a href="/admin/details/update/<?= $item['id'] ?>" class="btn btn-primary" role="button">Изменить</a>
                            <a href="/admin/delete/<?= $item['id'] ?>" class="btn btn-default" role="button">Удалить</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php endforeach; ?>
    </div>


</div>

<?php
include ROOT . '/views/admin/laouyts/footer.php'
?>


