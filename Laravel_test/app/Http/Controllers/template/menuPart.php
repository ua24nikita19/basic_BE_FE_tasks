
<ul style="background-color: rgb(<?php echo rand(100,255)?>,<?php echo rand(100,255)?>,<?php echo rand(100,255)?>);class='list-group'">
    <?php foreach($empls as $index=>$value):?>
        <li class='list-group-item'>
            <i>#<?php echo $value->id;?></i>
            <b><?php echo $value->full_name;?></b>
            <b><?php echo $value->position ?></b>
            <span class='badge badge-span'>
                <?php echo count($value->vassal)|0 ?>
            </span>
        </li>
        <?php if (count($value->vassal)>0) : ?>
            <?php $this->d(__DIR__.'/menuPart.php', ['empls'=>$value->vassal]); ?>
        <?php endif; ?>

    <?php endforeach;?>
</ul>