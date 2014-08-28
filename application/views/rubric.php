<?php
/**
 * Created by PhpStorm.
 * User: Олег
 * Date: 28.08.14
 * Time: 2:10
 */  ?>

<div class="panel panel-default">
    <div class="panel-heading">Список рубрик</div>

    <table class="table">
        <thead>
        <tr>
            <th>#</th>
            <th>Название</th>
            <th></th>
        </tr>
        </thead>
        <tbody>
        <?php $ii = 1;
        if(isset($rubricList) && !empty($rubricList)){
            foreach($rubricList as $rubric){?>
                <tr>
                    <td><?=$ii?></td>
                    <td><?=htmlspecialchars($rubric->rub_name)?></td>
                    <td>
                        <a href="/rubric/<?=$rubric->rub_id?>">
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