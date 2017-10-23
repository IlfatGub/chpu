


    $(document).ready(function () {
        $(".for_list").click(function () {
            var id = $(this).attr("data-id");
            $.post("/for/"+id, {}, function (data) {
                $(".for-content").html(data);
            });
            //Очистка блока с параметарми
            $(".parameter-content").empty();

            $(".for_list").removeClass("active");
            $(this).addClass("active");
        });

        $(".btn-param-delete").click(function () {
            var id = $(this).attr("data-id");
            $.post("/save/delete/"+id);

            $("#for_param_"+id).hide(500);
        });
    });

