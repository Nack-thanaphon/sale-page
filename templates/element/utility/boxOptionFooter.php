<?php
$class = isset($class) ? $class : 'btn btn-default btn-flat pull-right';
$link = isset($link) ? $link : false;
?>
<div class="box-footer">
    <?php if (($link !== false)): ?>
        <?php echo $this->Permission->link(__('Back'), $link, ['class' => $class, 'name' => 'btnBack']); ?>
    <?php else: ?>
        <?php echo $this->Permission->buttonBack(); ?>
    <?php endif; ?>
</div>
