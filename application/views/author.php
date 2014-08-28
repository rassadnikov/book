<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 1:31
 */ ?>

<div class="panel panel-default">
    <div class="panel-heading">Список авторов</div>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Имя</th>
            <th>Фамилия</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $ii = 1;
        if(isset($authorList) && !empty($authorList)){
            foreach($authorList as $author){?>
                <tr>
                    <td><?=$ii?></td>
                    <td><?=htmlspecialchars($author->aut_fname)?></td>
                    <td><?=htmlspecialchars($author->aut_lname)?></td>
                    <td>
                        <a href="/author/<?=$author->aut_id?>">
                            <button type="button" class="btn btn-primary">Перейти</button>
                        </a>
                    </td>
                </tr>
            <?php $ii++;
            }
        }?>
        </tbody>
    </table>
</div>