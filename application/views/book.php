<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 0:00
 */ ?>
<div class="row">

    <?php if(isset($bookList) && !empty($bookList)){
        foreach($bookList as $book){ ?>
            <div class="col-sm-4 col-md-3">
                <div class="thumbnail">
                    <img src="/uploads/books/preview/<?=$book->boo_image?>" alt="/uploads/books/preview/<?=$book->boo_image?>">
                    <div class="caption">
                        <h3><?=htmlspecialchars($book->boo_name)?></h3>
                        <p>
                            <a href="/book/<?=$book->boo_id?>" class="btn btn-primary" role="button">Посмотреть</a>
                        </p>
                    </div>
                </div>
            </div>
        <?php }
    }?>

</div>
