<?php
include ROOT . '/views/admin/laouyts/header.php';
?>

<div class="col-lg-8 col-lg-offset-2 col-md-10 col-md-offset-1 col-sm-12 col-xs-12"
     style="display: inline-block; vertical-align: ">

    <div class="row col-lg-12 col-md-10 col-sm-10 col-xs-10">
        <form action="" method="post" enctype="multipart/form-data">
            <div class="col-lg-10 col-md-10 col-sm-10  col-xs-10">
                <input type="text" name="upd_name" class="form-control " placeholder="введите название детали" value="<?= $details['name'] ?>">
                <input type="file" name="upd_file">
            </div>
            <input type="submit" name="update" class="btn-success btn col-lg-2 col-md-2 col-sm-2 col-xs-2" value="+">
        </form>
    </div>
    <br><br>
    <br><br>
    <img src="<?= '\template\uploads\\'.$details['img'] ?>"  class="img-rounded img-responsive">
</div>

<?php
include ROOT . '/views/admin/laouyts/footer.php'
?>


