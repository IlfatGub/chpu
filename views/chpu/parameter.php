<form action="#" method="post">
    <div href="#" class="list-group-item active" style="color: white">
        Параметры
    </div>
    <input type="hidden" name="details"  value="<?=$detailsId?>"/>
    <input type="hidden" name="for"  value="<?=$forId?>"/>
    <?php foreach ($model as $item) : ?>
        <div class="list-group-item parameter_list" style="padding: 3px 5px">
            <table>
                <tr>
                    <td class="col-lg-10 col-sm-10 col-md-10">
                        <?= $item['name'] . '(' . $item['ext'] . ')' ?>
                    </td>
                    <td>
                        <input  type="text" data-id="<?=$item['ext']?>" class="form-control parameter_input" name="<?= $item['code'] ?>">
                    </td>
                </tr>
            </table>
        </div>
    <?php endforeach; ?>
    <div class="list-group-item parameter_list">
        <div class="text-center">
            <input type="submit" name="submit" class="btn btn-default" value="Добавить"/>
        </div>
    </div>
</form>

<div class="result">

</div>


