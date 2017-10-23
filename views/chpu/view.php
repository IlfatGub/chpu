

<?php
include ROOT.'/views/laouyts/main.php'
?>

<body>
<div class="col-lg-8 col-lg-offset-2">

    <nav class="navbar navbar-inverse" role="navigation">
        <div class="container-fluid">
            <div class="navbar-header ">
                <a class="navbar-brand" href="/">Автоматизация загрузки параметров деталей на станках с ЧПУ "STR-30"</a>
            </div>
        </div>
    </nav>
    <div class="list-group">
        <a href="#" class="list-group-item active">
            Cras justo odio
        </a>
        <?php foreach ($model as $item) : ?>
            <a href="#"  class="list-group-item"><?= $item['id'] ?> - <?= $item['name'] ?> - <?= $item['code'] ?></a>
        <?php endforeach; ?>
    </div>
</div>
</body>

<script async="" src="/template/js/bootstrap.min.js" type="text/javascript"></script>
</html>