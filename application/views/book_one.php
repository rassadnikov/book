<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 1:08
 */ ?>


<div class="row">

    <div class="col-md-4">
        <h1><?=htmlspecialchars($book->boo_name)?></h1>
        <?php if (file_exists($_SERVER["DOCUMENT_ROOT"]."/uploads/books/preview/".$book->boo_image) && !empty($book->boo_image)) { ?>
            <div class="thumbnail">
                <img src="/uploads/books/<?=$book->boo_image ;?>" alt="/uploads/books/preview/<?=$book->boo_image ;?>" width="200" height="250" />
            </div>
        <?php } ?>
    </div>

    <div class="col-md-8">
        <?php if(isset($authorList) && !empty($authorList)){ ?>
            <h3>Авторы:</h3>
            <ul>
                <?php foreach($authorList as $author){ ?>
                   <li><?=htmlspecialchars($author->aut_lname.' '.$author->aut_fname)?></li>
                <?php } ?>
            </ul>
        <?php } ?>
        <hr/>
        <?php if(isset($rubricList) && !empty($rubricList)){ ?>
            <h3>Рубрики:</h3>
            <ul>
                <?php foreach($rubricList as $rubric){ ?>
                    <li><?=htmlspecialchars($rubric->rub_name)?></li>
                <?php } ?>
            </ul>
        <?php } ?>

    </div>

</div>