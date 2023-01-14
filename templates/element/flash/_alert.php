<?php $class = isset($class) ? $class : 'info'; ?>
<script type="text/javascript">
    setTimeout(function () {
        toasNotification('<?php echo $message ; ?>', '<?php echo $class; ?>');
    }, 300);
</script>