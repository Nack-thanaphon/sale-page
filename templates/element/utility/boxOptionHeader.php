<?php
$btitle = isset($btitle) ? $btitle : __('Box Option Header ($btitle)');
$bcollapse = isset($bcollapse) ? $bcollapse : false;
$bclose = isset($bclose) ? $bclose : false;
$blink = isset($blink) ? $blink : [];
$bnoti = isset($bnoti) ? $bnoti : null;
$bicon = isset($bicon) ? $this->Bootstrap->icon($bicon) : null;
?>

<!-- .card-header -->
<!-- <?php if(!empty($param)){ ?>
    <div class="card-header" style="background-color:<?php echo $param=='a'? '#357b0b':'#031dc0'; ?>; color:white;">
<?php } else { ?>
    <div class="card-header" style="background-color:#357b0b;">
<?php } ?> -->
<div class="card-header">
<?php echo $btitle; ?>
    <!-- <div class="f-right">
        <a href="javascript:;"><i class="icofont icofont-minus"></i></a>
        <a href="javascript:;"><i class="icofont icofont-refresh"></i></a>
        <a href="javascript:;"><i class="icofont icofont-close"></i></a>
    </div> -->
</div>
<!-- /.card-header -->