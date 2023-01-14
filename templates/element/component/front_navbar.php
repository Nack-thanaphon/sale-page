<style>
  .btn .badge {
    position: relative;
    top: -10px !important;
  }
</style>

<!-- <div class="container">
  <div class="d-flex justify-content-between py-2 p-2  ">
    <div class="p-0 my-auto">
      <select class="m-0 p-0 form-control lang">
        <option disabled>กรุณาเลือกภาษา</option>
        <option value="1">English</option>
        <option value="2" selected="selected">Thailand</option>
      </select>
    </div>


    <?php if (!empty($userData)) { ?>
      <?php foreach ($userData as $row) : ?>
        <div class=" m-0 p-0">
          <p class="text-dark m-0 p-0"> <?= $row->name ?></p>
          <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'login']) ?>">
            <small class="text-end m-0 p-0"> <?= __("ไปหน้าจัดการ") ?></small>
          </a>
        </div>
      <?php endforeach; ?>
    <?php } else { ?>
      <div class="d-flex">
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'register']) ?>" class="m-1">
          <?= __("สมัครสมาชิก") ?></a>
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'login']) ?>" class="m-1 text-muted">
          <?= __("เข้าสู่ระบบ") ?></a>
      </div>
    <?php } ?>
  </div>
</div> -->
<nav class="navbar navbar-expand-lg navbar-white navbar-light  my-success">
  <div class="container">
    <a class="navbar-brand" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Home', 'action' => 'index']) ?>">
      <img src="<?= $this->Url->image('logo.png') ?> " width="70" height="70" alt="">
    </a>

    <!-- <div class="btn-group d-lg-none" role="group" aria-label="Basic example">

      <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'cart', 'action' => 'index']) ?>" type="button" class="btn btn-muted text-white">
        <?= __("สั่งซื้อสินค้า") ?></a>
      <button type="button" class="btn btn-tranparent" data-toggle="collapse" data-target="#navbarSupportedContent"><i class="fas fa-bars"></i></button>

    </div> -->

    <div class="collapse navbar-collapse" id="navbarSupportedContent">
      <ul class="navbar-nav mr-auto p-2">
        <!-- <li class="nav-item active">
          <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Aboutus', 'action' => 'index']) ?> ">
            <?= __("ธุรกิจ") ?> <span class="sr-only">(current)</span>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Products', 'action' => 'index']) ?> ">
            </i></i> <?= __("สินค้า") ?>
          </a>
        </li> -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']) ?> ">


            </i></i> <?= __("บทความ") ?>
          </a>
        </li> -->
        <!-- <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'aboutus', 'action' => 'ourcustomer']) ?>">
      <i class="fas fa-chevron-down"> -->
        <!-- </i></i> <?= __("กิจกรรม") ?></a>
      </li>  -->
        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'aboutus', 'action' => 'ourbranch']) ?>">
          <?= __("สาขา") ?>
          </a>
        </li> -->

        <!-- <li class="nav-item">
          <a class="nav-link text-white" href="<?= $this->Url->build(['controller' => 'aboutus', 'action' => 'aboutus']) ?>">
            <?= __("เกี่ยวกับเรา") ?>
          </a>
        </li> -->
        <!-- <li class="nav-item d-sm-none d-block">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'login']) ?>" class="m-1 text-muted">
          <?= __("เข้าสู่ระบบ") ?></a>
      </li> -->
      </ul>
      <!-- <div class=" d-none d-lg-flex justify-content-end col-12 col-sm-4 col-md-12 col-lg-4 m-0 p-0 mt-2 mt-sm-0">
        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'cart', 'action' => 'index']) ?>" type="button" class="btn btn-muted text-white">
          <?= __("สั่งซื้อสินค้า") ?></a>

        <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'cart', 'action' => 'index']) ?>" type="button" class="btn btn-muted text-white">
          <i class="fas fa-cart-shopping"></i>
          <span class="badge badge-danger navbar-badge" id="cart_total"></span>
        </a>
      </div> -->
    </div>
  </div>
</nav>



<script>
  var selected = localStorage.getItem('selected');

  if (selected) {
    $(".lang").val(selected);
  }

  $(".lang").change(function() {
    let value = $('.lang').val()
    if (value == 1) {
      window.location.href = '/en/'
      localStorage.setItem('selected', $(this).val());
    }
    if (value == 2) {
      window.location.href = '/th/'
      localStorage.setItem('selected', $(this).val());
    }

  });
</script>