<?php
$cakeDescription = 'PENPEN HOUSE | ';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?><?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta(array('name' => 'og:image', 'content' => $this->fetch('image')), NULL, array('inline' => false)); ?>
    <?= $this->Html->meta('icon', $this->Url->Image('logo.png')) ?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
    <?= $this->Html->css(['bootstrap-4.min.css']) ?>
    <?= $this->Html->css(['home']) ?>

    <?= $this->Html->css(['adminlte.min.css']) ?>
    <?= $this->Html->css(['OverlayScrollbars.min.css']) ?>
    <?= $this->Html->css(['summernote-bs4.min.css']) ?>
    <?= $this->Html->script("adminlte.js"); ?>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.css" />
    <script src="https://cdn.jsdelivr.net/npm/swiper@8/swiper-bundle.min.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <?= $this->element('/utility/toastNotificationBackend'); ?>
    <link href="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/css/toastr.css" rel="stylesheet" />
</head>

<body>
    <?= $this->Flash->render() ?>
    <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
            <?= $this->element('/component/front_navbar') ?>
        </div>
        <div class="col-12 m-0 p-0">
            <?= $this->fetch('content') ?>
        </div>
    </div>
    <?= $this->element('/component/subscribe') ?>

    <?= $this->element('/component/footer') ?>

    <script src="https://cdn.jsdelivr.net/npm/popper.js@1.12.9/dist/umd/popper.min.js" integrity="sha384-ApNbgh9B+Y1QKtv3Rn7W3mgPxhU9K/ScQsAP7hUibX39j7fakFPskvXusvfa0b4Q" crossorigin="anonymous"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@4.0.0/dist/js/bootstrap.min.js" integrity="sha384-JZR6Spejh4U02d8jOt6vLEHfe/JQGiRRSQQxSfFWpi1MquVdAyjUar5+76PVCmYl" crossorigin="anonymous"></script>
    <?= $this->Html->script("plugins/jquery-ui/jquery-ui.min.js"); ?>
    <?= $this->Html->script("fslightbox.js"); ?>
    <?= $this->Html->script("custom.js"); ?>
    <?= $this->Html->script("plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>
    <?= $this->Html->script("plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>
    <?= $this->Html->script("plugins/sparklines/sparkline.js"); ?>
    <?= $this->Html->script("plugins/jqvmap/jquery.vmap.min.js"); ?>
    <?= $this->Html->script("plugins/jqvmap/maps/jquery.vmap.usa.js"); ?>
    <?= $this->Html->script("plugins/jquery-knob/jquery.knob.min.js"); ?>
    <?= $this->Html->script("plugins/moment/moment.min.js"); ?>
    <?= $this->Html->script("plugins/daterangepicker/daterangepicker.js"); ?>
    <?= $this->Html->script("plugins/tempusdominus-bootstrap-4/js/tempusdominus-bootstrap-4.min.js"); ?>
    <?= $this->Html->script("plugins/summernote/summernote-bs4.min.js"); ?>
    <?= $this->Html->script("overlayScrollbars.min.js"); ?>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/toastr.js/2.0.1/js/toastr.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>

    <script>
        $.widget.bridge('uibutton', $.ui.button)
    </script>


</body>

</html>