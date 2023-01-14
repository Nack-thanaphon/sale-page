<nav class="navbar navbar-expand-lg navbar-white navbar-light  my-success">
  <a class="navbar-brand" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Home', 'action' => 'index']) ?>">
    <img src="<?= $this->Url->image('logo.png') ?> " width="50" height="50" alt="">
  </a>
  <div class="btn-group d-lg-none" role="group" aria-label="Basic example">
    <a href="<?= $this->Url->build(['prefix' => false, 'controller' => 'cart', 'action' => 'index']) ?>" type="button" class="btn btn-muted text-white"><?=__('สั่งซื้อสินค้า')?></a>
    <button type="button" class="btn btn-tranparent" data-toggle="collapse" data-target="#navbarSupportedContent"><i class="fas fa-bars"></i></button>
  </div>

  <div class="collapse navbar-collapse" id="navbarSupportedContent">
    <ul class="navbar-nav mr-auto p-2">
      <li class="nav-item active">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Aboutus', 'action' => 'index']) ?> "> <i class="fas fa-link"></i> <?=__('ธุรกิจ')?> <span class="sr-only">(current)</span></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'Products', 'action' => 'index']) ?> "> <i class="fas fa-link"></i> <?=__('สินค้า')?></a>
      </li>
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'posts', 'action' => 'index']) ?> "> <?=__('บทความ')?></a>
      </li>
      <!-- <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourcustomer']) ?>"> <i class="fas fa-link"></i> <?=__('กิจกรรม')?></a>
      </li> -->
      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>"> <i class="fas fa-link"></i> <?=__('สาขา')?></a>
      </li>

      <li class="nav-item">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'aboutus']) ?>"> <i class="fas fa-link"></i> <?=__('เกี่ยวกับเรา')?></a>
      </li>

      <li class="nav-item d-sm-none d-block">
        <a class="nav-link text-white" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'login']) ?>" class="m-1 text-muted"><i class="fas fa-link"></i> <?=__('เข้าสู่ระบบ')?></a>
      </li>

    </ul>
    <div class=" d-none d-lg-flex justify-content-end col-12 col-sm-4 col-md-12 col-lg-4 m-0 p-0 mt-2 mt-sm-0">
      <!-- <div class="my-auto"><i class="fas fa-cart-arrow-down"><span></span></i></div> -->
      <a href="<?= $this->Url->build(['prefix' => false,'controller' => 'cart', 'action' => 'index']) ?>" type="button" class="btn btn-muted text-white"><?=__('สั่งซื้อสินค้า')?></a>      <a class="nav-link   my-auto text-white" data-toggle="dropdown" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'carts', 'action' => 'index']) ?>">
        <i class="fas fa-cart-shopping"></i>
        <span class="badge badge-danger navbar-badge"  id="cart_total"></span>
      </a>
    </div>
  </div>
</nav>




<script>
  ` <div class="dropdown-menu dropdown-menu-lg dropdown-menu-right">

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item">
            <!-- Message Start -->
            <div class="media">
              <img src="https://images.unsplash.com/photo-1560859253-341f42b25e20?ixlib=rb-1.2.1&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="User Avatar" class="img-size-50 img-circle mr-3">
              <div class="media-body">
                <h3 class="dropdown-item-title">
                  น้ำสมุนไพร
                  <span class="float-right text-sm text-muted"><i class="fas fa-star"></i></span>
                </h3>
                <p class="text-sm text-muted"><i class="far fa-clock mr-1"></i>จำนวน:</p>
              </div>
            </div>
            <!-- Message End -->
          </a>
          <div class="dropdown-divider"></div>

          <div class="dropdown-divider"></div>
          <a href="#" class="dropdown-item dropdown-footer">ไปหน้าชำระสินค้า</a>
        </div>`
</script>