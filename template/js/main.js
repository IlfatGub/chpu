


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

        // $(".ajaxParam").change(function () {
        //     var id = $(this).attr("data-id");
        //     var val = $(this).val();
        //     var type = $(this).attr("id");
        //     alert(val + id + type);
        //     $.get("/admin/ajaxParam?id="+id+"?val="+val+"?type="+type);
        //     //
        //     // $("#for_param_"+id).hide(500);
        // });

    });

