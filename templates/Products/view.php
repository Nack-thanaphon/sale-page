<?php $this->assign('title', $product->p_title); ?>
<title><?= $this->fetch('title'); ?></title>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.min.css" integrity="sha512-17EgCFERpgZKcm0j0fEq1YCJuyAWdz9KUtv1EjVuaOz8pDnh/0nZxmU6BBXwaaxqoi9PQXnRWqlcDB027hgv9A==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick-theme.css" integrity="sha512-6lLUdeQ5uheMFbWm3CP271l14RsX1xtx+J5x2yeIDkkiBpeVTNhTqijME7GgRKKi6hCqovwCoBTlRBEC20M8Mg==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.css" integrity="sha512-wR4oNhLBHf7smjy0K4oqzdWumd+r5/+6QO/vDda76MW5iug4PT7v86FoEkySIJft3XA0Ae6axhIvHrqwm793Nw==" crossorigin="anonymous" referrerpolicy="no-referrer" />
<link href="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.js">
</link>

<style>
    .slick-track {
        margin-left: 0;
    }
</style>


<div class="container">
    <div class="row m-0 p-sm-0 my-2 p-1 my-sm-5">
        <div class="col-12  my-2">
            <nav aria-label="text-end">
                <ol class="breadcrumb bg-transparent  p-0 m-0">
                    <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active"><a href="<?= $this->Url->build(['prefix'=>false,'controller'=>'products','action'=>'index']) ?>">สินค้า</a></li>
                    <li class="breadcrumb-item active" aria-current="page"><?= $product->p_title ?></li>
                </ol>
            </nav>
        </div>
        <div class="col-12 col-sm-4 mb-3">
            <?php foreach ($productEdit as $key => $dataImg) : ?>
                <?php $this->assign('image', $this->Url->build($dataImg['img'][$key]['name'])); ?>
                <?= $this->Html->meta(array('name' => 'og:image', 'content' => $this->fetch('image')), NULL, array('inline' => false)); ?>

                <div class="slider slider-for w-100">
                    <?php foreach ($dataImg['img'] as $key => $dataImg1) : ?>
                        <a data-fslightbox href="<?= $this->Url->build($dataImg['img'][$key]['name']) ?>">
                            <img src="<?= $this->Url->build($dataImg['img'][$key]['name']) ?>" class="rounded " style="width:100%;height:300px;object-fit:cover ;">
                        </a>
                    <?php endforeach; ?>
                </div>
                <div class="slider slider-nav my-2 m-0  w-100">
                    <?php foreach ($dataImg['img'] as $key => $dataImg1) : ?>
                        <div class="m-1">
                            <img src="<?= $this->Url->build($dataImg['img'][$key]['name']) ?>" style="width:50px;height:50px;object-fit:cover ;" alt="Product Image">
                        </div>
                    <?php endforeach; ?>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-12 col-sm-7 p-1 pl-sm-3">
            <div class="row m-0">
                <div class="col-12 col-sm-12 mb-1">
                    <small class="text-muted">ชื่อสินค้า</small>
                    <h3 class="mb-1 text-success"><?= $product->p_title ?></h3>
                    <small class="text-muted">รายละเอียด</small>
                    <div><?= $product->p_detail ?></div>
                    <hr>

                    <div class="py-2  mt-4">
                        <h2 class="mb-0">
                            ราคา <?= $product->p_price ?> บาท
                        </h2>
                    </div>
                </div>
                <div class="col-12 col-sm-6 my-2">
                    <!-- function select_product(id, name, image, image_id, price) -->

                    <a class="btn btn-primary btn-lg btn-flat w-100" onclick="select_product(<?= $product->p_id ?>,'<?= $product->p_title ?>','<?= $product->p_title ?>',<?= $product->p_price ?>)">เพิ่มในตะกร้าสินค้า</a>
                </div>
                <div class="col-12 col-sm-6 my-2">
                    <a href="https://line.me/R/oaMessage/@777gmaui?สอบถามสินค้า <?= $product->p_title ?>" class="btn btn-success btn-lg btn-flat w-100">
                        <i class="fab fa-line fa-lg mr-2 "></i>สั่งซื้อผ่านไลน์
                    </a>
                </div>
            </div>
        </div>
    </div>
    <!-- <div class="row mt-4">
        <nav class="w-100">
            <div class="nav nav-tabs" id="product-tab" role="tablist">
                <a class="nav-item nav-link active" id="product-desc-tab" data-toggle="tab" href="#product-desc" role="tab" aria-controls="product-desc" aria-selected="true">Description</a>
                <a class="nav-item nav-link" id="product-comments-tab" data-toggle="tab" href="#product-comments" role="tab" aria-controls="product-comments" aria-selected="false">Comments</a>
                <a class="nav-item nav-link" id="product-rating-tab" data-toggle="tab" href="#product-rating" role="tab" aria-controls="product-rating" aria-selected="false">Rating</a>
            </div>
        </nav>
        <div class="tab-content p-3" id="nav-tabContent">
            <div class="tab-pane fade show active" id="product-desc" role="tabpanel" aria-labelledby="product-desc-tab"> Lorem ipsum dolor sit amet, consectetur adipiscing elit. Morbi vitae condimentum erat. Vestibulum ante ipsum primis in faucibus orci luctus et ultrices posuere cubilia Curae; Sed posuere, purus at efficitur hendrerit, augue elit lacinia arcu, a eleifend sem elit et nunc. Sed rutrum vestibulum est, sit amet cursus dolor fermentum vel. Suspendisse mi nibh, congue et ante et, commodo mattis lacus. Duis varius finibus purus sed venenatis. Vivamus varius metus quam, id dapibus velit mattis eu. Praesent et semper risus. Vestibulum erat erat, condimentum at elit at, bibendum placerat orci. Nullam gravida velit mauris, in pellentesque urna pellentesque viverra. Nullam non pellentesque justo, et ultricies neque. Praesent vel metus rutrum, tempus erat a, rutrum ante. Quisque interdum efficitur nunc vitae consectetur. Suspendisse venenatis, tortor non convallis interdum, urna mi molestie eros, vel tempor justo lacus ac justo. Fusce id enim a erat fringilla sollicitudin ultrices vel metus. </div>
            <div class="tab-pane fade" id="product-comments" role="tabpanel" aria-labelledby="product-comments-tab"> Vivamus rhoncus nisl sed venenatis luctus. Sed condimentum risus ut tortor feugiat laoreet. Suspendisse potenti. Donec et finibus sem, ut commodo lectus. Cras eget neque dignissim, placerat orci interdum, venenatis odio. Nulla turpis elit, consequat eu eros ac, consectetur fringilla urna. Duis gravida ex pulvinar mauris ornare, eget porttitor enim vulputate. Mauris hendrerit, massa nec aliquam cursus, ex elit euismod lorem, vehicula rhoncus nisl dui sit amet eros. Nulla turpis lorem, dignissim a sapien eget, ultrices venenatis dolor. Curabitur vel turpis at magna elementum hendrerit vel id dui. Curabitur a ex ullamcorper, ornare velit vel, tincidunt ipsum. </div>
            <div class="tab-pane fade" id="product-rating" role="tabpanel" aria-labelledby="product-rating-tab"> Cras ut ipsum ornare, aliquam ipsum non, posuere elit. In hac habitasse platea dictumst. Aenean elementum leo augue, id fermentum risus efficitur vel. Nulla iaculis malesuada scelerisque. Praesent vel ipsum felis. Ut molestie, purus aliquam placerat sollicitudin, mi ligula euismod neque, non bibendum nibh neque et erat. Etiam dignissim aliquam ligula, aliquet feugiat nibh rhoncus ut. Aliquam efficitur lacinia lacinia. Morbi ac molestie lectus, vitae hendrerit nisl. Nullam metus odio, malesuada in vehicula at, consectetur nec justo. Quisque suscipit odio velit, at accumsan urna vestibulum a. Proin dictum, urna ut varius consectetur, sapien justo porta lectus, at mollis nisi orci et nulla. Donec pellentesque tortor vel nisl commodo ullamcorper. Donec varius massa at semper posuere. Integer finibus orci vitae vehicula placerat. </div>
        </div>
    </div> -->
</div>
<script src="//cdnjs.cloudflare.com/ajax/libs/toastr.js/latest/toastr.min.css"></script>
<script src="https://cdnjs.cloudflare.com/ajax/libs/slick-carousel/1.8.1/slick.min.js" integrity="sha512-XtmMtDEcNz2j7ekrtHvOVR4iwwaD6o/FUJe6+Zq+HgcCsk3kj4uSQQR8weQ2QVj1o0Pk6PwYLohm206ZzNfubg==" crossorigin="anonymous" referrerpolicy="no-referrer"></script>
<script>
    $('.slider-for').slick({
        slidesToShow: 1,
        slidesToScroll: 1,
        arrows: false,
        fade: true,
        asNavFor: '.slider-nav'
    });
    $('.slider-nav').slick({
        autoplay: true,
        slidesToShow: 7,
        slidesToScroll: 1,
    });
</script>