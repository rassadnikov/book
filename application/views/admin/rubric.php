<?php /**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 21:57
 */ ?>

<div class="table table-striped">
    <div class="row thead">
        <div class="col">#</div>
        <div class="col">Название</div>
        <div class="col">Действие</div>
    </div>
    <form class="row" method="post" action="/admin/<?=$active;?>Action/add">
        <div class="col"></div>
        <div class="col"><input class="form-control" name="rub_name" value=""/></div>
        <div class="col">
            <button type="submit" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Добавить
            </button>
        </div>
    </form>
    <?php
    $ii = 1;
    if(isset($rubricList) && !empty($rubricList)){
    foreach($rubricList as $rubric){ ?>
        <form class="row" method="post" action="/admin/<?=$active;?>Action/edit/<?=$rubric->rub_id?>">
            <div class="col"><?=$ii;?></div>
            <div class="col">
                <input type="text" class="form-control" name="rub_name" value="<?=htmlspecialchars($rubric->rub_name);?>"/>
            </div>
            <div class="col">
                <button type="button" class="btn btn-default btn-sm deleteAjax" href="/admin/<?=$active;?>Action/delete/<?=$rubric->rub_id?>">
                    <span class="glyphicon glyphicon-remove"></span> Удалить
                </button>
                <button type="button" class="btn btn-default btn-sm editAjax">
                    <span class="glyphicon glyphicon-pencil"></span> Обновить
                </button>
            </div>
        </form>
        <?php $ii++;
    }}?>
</div>


<style type="text/css">

    .table{
        display:table;
        border-collapse: collapse;
        border-spacing: 0;
        width: 100%;
        margin-bottom: 20px;
        border-color: gray;
    }
    .thead .col{
        border-top: 0;
        vertical-align: bottom;
        border-bottom: 2px solid #ddd;
        padding: 8px;
        text-align: left;
        font-weight: bold;
    }

    .row{
        display: table-row;
        vertical-align: inherit;
        border-color: inherit;
        box-sizing: border-box;
    }

    .col{
        display: table-cell;
        padding: 8px;
        line-height: 1.42857143;
        vertical-align: top;
        border-top: 1px solid #ddd;
    }

</style>