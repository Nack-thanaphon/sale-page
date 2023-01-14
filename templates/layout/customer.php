<?php
$cakeDescription = 'FarmByMOM | ';
?>
<!DOCTYPE html>
<html>

<head>
    <?= $this->Html->charset() ?>
    <meta name="viewport" content="width=device-width, initial-scale=1">
    <title>
        <?= $cakeDescription ?>
        <?= $this->fetch('title') ?>
    </title>
    <?= $this->Html->meta('icon', $this->Url->Image('logo.png')) ?>
    <?= $this->Html->meta('csrfToken', $this->request->getAttribute('csrfToken')); ?>

    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.2.0/css/all.min.css" integrity="sha512-xh6O/CkQoPOWDdYTDqeRdPCVd1SpvCA9XXcUnZS2FmJNp1coAFzvtCN9BmamE+4aHK8yyUHUSCcJHgXloTyT2A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/jquery/3.6.1/jquery.min.js" integrity="sha512-aVKKRRi/Q/YV+4mjoKBsE4x3H+BkegoM/em46NNlCqNTmUYADjBbeNefNxYV7giUp0VxICtqdrbqU7iVaeZNXA==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>

    <?= $this->Html->css(['bootstrap-4.min.css']) ?>
    <?= $this->Html->css(['adminlte.min.css']) ?>
    <?= $this->Html->css(['back_end']) ?>
    <?= $this->Html->css(['OverlayScrollbars.min.css']) ?>
    <?= $this->Html->css(['summernote-bs4.min.css']) ?>
    <?= $this->Html->script("adminlte.js"); ?>
    <link rel="stylesheet" href="https://cdn.datatables.net/1.13.1/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.datatables.net/responsive/2.4.0/css/responsive.dataTables.min.css">
    <script src="https://www.gstatic.com/firebasejs/7.22.1/firebase-app.js"></script>
    <script src="https://www.gstatic.com/firebasejs/7.22.1/firebase-firestore.js"></script>
    <script src="//cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.ckeditor.com/4.20.0/standard/ckeditor.js"></script>
    <?= $this->element('/utility/toastNotificationBackend'); ?>



    <!-- <script>
        // Initialize Firebase
        var config = {
            apiKey: "AIzaSyBqTO2sznTFt81a0ZGo8BeIPROjXHFfxLY",
            authDomain: "realtime-chat-12332.firebaseapp.com",
            databaseURL: "https://realtime-chat-12332-default-rtdb.asia-southeast1.firebasedatabase.app",
            projectId: "realtime-chat-12332",
            storageBucket: "realtime-chat-12332.appspot.com",
            messagingSenderId: "424933598885",
            appId: "1:424933598885:web:4a6b8c9d67da6403950f4c",
            measurementId: "G-0NYGLHJCJZ"
        };
        firebase.initializeApp(config);
    </script> -->

</head>

<body class="hold-transition sidebar-mini layout-fixed">
    <div class="wrapper">
        <?= $this->Flash->render() ?>
        <?= $this->element('/component/customer_sidebar') ?>
        <?= $this->element('/component/back_navbar1') ?>
        <div class="content-wrapper">
            <section class="content">
                <div class="container-fluid">
                    <div class="row m-0">
                        <div class="col-12 m-0 p-0">
                            <?= $this->fetch('content') ?>
                        </div>
                    </div>
                </div>
            </section>
        </div>
        <script src="https://cdn.jsdelivr.net/npm/apexcharts"></script>
        <?= $this->Html->script("plugins/summernote/summernote-bs4.min.js"); ?>
        <?= $this->Html->script("plugins/jquery-ui/jquery-ui.min.js"); ?>
        <?= $this->Html->script("plugins/bootstrap/js/bootstrap.bundle.min.js"); ?>
        <?= $this->Html->script("plugins/summernote/summernote-bs4.min.js"); ?>
        <?= $this->Html->script("plugins/moment/moment.min.js"); ?>
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
        <script src="https://cdn.datatables.net/1.12.1/js/jquery.dataTables.min.js"></script>
        <script src="https://cdn.datatables.net/responsive/2.4.0/js/dataTables.responsive.min.js"></script>
        <script>
            $.widget.bridge('uibutton', $.ui.button)
        </script>
        <?= $this->Html->script("custom.js"); ?>
        <?= $this->Html->script("fslightbox.js"); ?>
    </div>

</body>

</html>