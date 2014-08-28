<?php /**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 21:54
 */ ?>

<div class="table table-striped">
    <div class="row thead">
        <div class="col">#</div>
        <div class="col">Имя</div>
        <div class="col">Фамилия</div>
        <div class="col">Действие</div>
    </div>
    <form class="row" method="post" action="/admin/<?=$active;?>Action/add">
        <div class="col"></div>
        <div class="col"><input class="form-control" name="aut_fname" value=""/></div>
        <div class="col"><input class="form-control" name="aut_lname" value=""/></div>
        <div class="col">
            <button type="submit" class="btn btn-default btn-sm">
                <span class="glyphicon glyphicon-plus"></span> Добавить
            </button>
        </div>
    </form>
    <?php
    $ii = 1;
    if(isset($authorList) && !empty($authorList)){
        foreach($authorList as $author){ ?>
            <form class="row" method="post" action="/admin/<?=$active;?>Action/edit/<?=$author->aut_id?>">
                <div class="col"><?=$ii;?></div>
                <div class="col">
                    <input type="text" class="form-control" name="aut_fname" value="<?=htmlspecialchars($author->aut_fname);?>"/>
                </div>
                <div class="col">
                    <input type="text" class="form-control" name="aut_lname" value="<?=htmlspecialchars($author->aut_lname);?>"/>
                </div>
                <div class="col">
                    <button type="button" class="btn btn-default btn-sm deleteAjax" href="/admin/<?=$active;?>Action/delete/<?=$author->aut_id?>">
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