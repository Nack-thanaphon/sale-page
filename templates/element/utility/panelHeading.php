<?php
$panelTitle = isset($panelTitle) ? $panelTitle : null;
$panelTool = isset($panelTool) ? $panelTool : null;
$hbuilt = isset($hbuilt) ? 'hbuilt' : null;
?>
<div class="panel-heading <?php echo $hbuilt;?>">
    <?php if ($panelTool === true): ?>
        <div class="panel-tools">
            <a class="showhide"><i class="fa fa-chevron-up"></i></a>
            <a class="closebox"><i class="fa fa-times"></i></a>
        </div>
    <?php endif; ?>
    <?php echo $panelTitle; ?>
</div>