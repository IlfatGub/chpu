
<?php
include_once ROOT.'/models/Details.php'
?>

    <a href="#" class="list-group-item active">
        Циклы(<?= Details::getName($detailsId)?>)
    </a>
    <?php foreach ($operations as $item) : ?>
        <a href="#"  data-id="<?= $detailsId.';'.$item['id']; ?>" class="list-group-item parameter_list"><?= $item['name'] ?></a>
    <?php endforeach; ?>


    <script>
        $(document).ready(function () {
            $(".parameter_list").click(function () {
                var id = $(this).attr("data-id");
                arr = id.split(";");
                $.post("/for/"+arr[0]+"/parameter/"+arr[1], {}, function (data) {
                    $(".parameter-content").html(data);
                });

                $(".parameter_list").removeClass('alert-info');
                $(this).addClass('alert-info')
            });
        });
    </script>