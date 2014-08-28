<?php /**
 * Created by PhpStorm.
 * User: Олег
 * Date: 27.08.14
 * Time: 22:13
 */ ?>
<a href="/admin/bookAction/add" title="добавить книжку">
    <button type="button" class="btn btn-default btn-sm">
        <span class="glyphicon glyphicon-plus"></span> Добавить книжку
    </button>
</a>
<table class="table table-striped">
    <thead>
    <tr>
        <th>#</th>
        <th>Название</th>
        <th>Обложка</th>
        <th>Действие</th>
    </tr>
    </thead>
    <tbody>
    <?php $ii = 1;
    if(isset($bookList) && !empty($bookList)){
        foreach($bookList as $book){ ?>
            <tr>
                <td><?=$ii;?></td>
                <td><?=htmlspecialchars($book->boo_name);?></td>
                <td>
                    <?php
                    if (file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/books/preview/".$book->boo_image) && !empty($book->boo_image)) { ?>
                        <img src="/uploads/books/preview/<?=$book->boo_image?>" alt="/uploads/books/preview/<?=$book->boo_image?>" width="120" height="120"/>
                    <?php } ?>
                </td>
                <td>
                    <a href="/admin/bookAction/delete/<?=$book->boo_id;?>" title="удалить книжку" onclick="return confirm('Вы уверены?')">
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-remove"></span> Удалить
                        </button>
                    </a>
                    <a href="/admin/book/<?=$book->boo_id;?>" title="редактировать книгу">
                        <button type="button" class="btn btn-default btn-sm">
                            <span class="glyphicon glyphicon-pencil"></span> Изменить
                        </button>
                    </a>
                </td>
            </tr>
            <?php $ii++;
        }}?>
    </tbody>
</table>