<?php /**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 22:15
 */ ?>
<a href="/admin/bookAction/add" title="добавить товар">
    <button type="button" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Добавить книгу
    </button>
</a>
<form class="form-horizontal" role="form" method="post" action="/admin/<?=$active?>Action/edit/<?=$book->boo_id?>" enctype="multipart/form-data">

    <div class="form-group">
        <label for="boo_name" class="col-sm-2 control-label">Название:</label>
        <div class="col-sm-10">
            <input type="text" name="boo_name" value="<?=htmlspecialchars($book->boo_name)?>" id="boo_name" placeholder="Название"  class="form-control" required />
        </div>
    </div>
    <div class="form-group">
        <label for="rubric" class="col-sm-2 control-label">Рубрики:</label>
        <div class="col-sm-10">
            <?php
            if(isset($rubricList) && !empty($rubricList)){
                foreach($rubricList as $rubric){?>
                    <div style="display: inline-block; ">
                        <input type="checkbox" name="rubrics[]" value="<?=$rubric->rub_id?>"  <?=($rubric->rub_id == $rubric->bru_rubric_id)?'checked':'';?> />
                        <?=htmlspecialchars($rubric->rub_name)?>
                    </div>
                <?php }
            }?>
        </div>
    </div>
    <div class="form-group">
        <label for="rubric" class="col-sm-2 control-label">Авторы:</label>
        <div class="col-sm-10">
            <?php
            if(isset($authorList) && !empty($authorList)){
                foreach($authorList as $author){?>
                    <div style="display: inline-block; ">
                        <input type="checkbox" name="authors[]" value="<?=$author->aut_id?>"  <?=($author->aut_id == $author->bau_author_id)?'checked':'';?> />
                        <?=htmlspecialchars($author->aut_fname.' '.$author->aut_lname)?>
                    </div>
                <?php }
            }?>
        </div>
    </div>
    <div class="form-group">
        <div class="col-md-8">
            <?php if (file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/books/preview/".$book->boo_image) && !empty($book->boo_image)) { ?>
                <div class="col-sm-6 col-md-4">
                    <div class="thumbnail">
                        <img class="itemImg" src="/uploads/books/preview/<?=$book->boo_image ;?>" alt="/uploads/books/preview/<?=$book->boo_image ;?>" />
                    </div>
                    <div class="caption">
                        <p align="center">
                            <a href="/admin/<?=$active?>Action/deleteImage/<?=$book->boo_id;?>" class="btn btn-primary deleteImage" role="button">Удалить фото</a>
                        </p>
                    </div>
                </div>
                <div style="clear: both"></div>
            <?php } ?>
            <p><br/><input type="file" name="photo" /></p>
        </div>
        <div class="col-md-4">
            <div class="btn-group" style="float: right;">
                <a href="/admin/<?=$active?>">
                    <button type="button" class="btn btn-default btn-md">
                        <span class="glyphicon glyphicon-arrow-left"></span> Назад
                    </button>
                </a>
                <a href="/admin/<?=$active?>Action/delete/<?=$book->boo_id ;?>" onclick="return confirm('Вы уверены?')">
                    <button type="button" class="btn btn-default btn-md">
                        <span class="glyphicon glyphicon-remove"></span> Удалить
                    </button>
                </a>
                <a>
                    <button type="submit" class="btn btn-default btn-md" >
                        <span class="glyphicon glyphicon-floppy-saved"></span> Сохранить
                    </button>
                </a>
            </div>

        </div>
    </div>
</form>

