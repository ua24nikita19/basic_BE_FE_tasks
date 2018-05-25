<h1>Employees</h1>
<?php if (isset($empls)) : ?>
    <?php $this->d(__DIR__.'/template/menuPart.php', ['empls'=>$empls]); ?>
<?php endif; ?>
