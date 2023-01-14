<aside class="main-sidebar sidebar-dark-primary elevation-4">
    <a href="<?= $this->Url->Build(['controller' => 'dashboard']) ?>" class="brand-link text-start ">
        <h3 class="brand-text font-weight-bold p-3">PENPEN HOUSE</h3>
    </a>

    <div class="sidebar">
        <div class="mt-3 pb-1 mb-2 d-flex m-0 p-0">
            <?php foreach ($userData as $row) : ?>
                <div class="px-3">
                    <small class="text-white"> <?= $row->name ?></small> <br>
                    <small class="text-secondary"><?= $row->role ?></small>
                </div>
            <?php endforeach; ?>
        </div>
        <!-- <div class="form-inline">
            <div class="input-group" data-widget="sidebar-search">
                <input class="form-control form-control-sidebar" type="search" placeholder="Search" aria-label="Search">
                <div class="input-group-append">
                    <button class="btn btn-sidebar">
                        <i class="fas fa-search fa-fw"></i>
                    </button>
                </div>
            </div>
        </div> -->

        <nav class="mt-2">
            <ul class="nav nav-pills nav-sidebar flex-column" data-widget="treeview" role="menu" data-accordion="false">
                <li class="nav-header text-secondary text-uppercase"><small>Management space</small></li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-database"></i>
                        <p class="text-bold text-uppercase">
                            หน้าหลัก
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'order']) ?>" class="nav-link">
                        <i class="fas fa-bars"></i>
                        <p class="text-bold text-uppercase">
                            รายการคำสั่งซื้อ
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'tracking']) ?>" class="nav-link">
                        <i class="fas fa-shopping-cart"></i>
                        <p class="text-bold text-uppercase">
                            ติดตามออเดอร์
                        </p>
                    </a>
                </li> -->
                <li class="nav-header text-secondary text-uppercase"><small>System Area</small></li>
                <li class="nav-item">
                    <a href="/customer/address/<?= $userData[0]['token']  ?>" class="nav-link">
                        <i class="fas fa-address-card"></i>
                        <p class="text-bold text-uppercase">
                            ที่อยู่จัดส่ง
                        </p>
                    </a>
                </li>
                <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'history']) ?>" class="nav-link">
                        <i class="fas fa-users-cog"></i>
                        <p class="text-bold text-uppercase">
                            ประวัติการสั่งซื้อ
                        </p>
                    </a>
                </li>
                <!-- <li class="nav-item">
                    <a href="<?= $this->Url->build(['controller' => 'chats', 'action' => 'index']) ?>" class="nav-link">
                        <i class="fas fa-info-circle"></i>
                        <p class="text-bold text-uppercase">
                            รายงาน
                        </p>
                    </a>
                </li> -->

                <li class="nav-item">
                    <a onclick="logout()" type="button" class="nav-link">
                        <i class="fas fa-sign-out"></i>
                        <p class="text-bold text-uppercase">
                            ออกจากระบบ
                        </p>
                    </a>
                </li>
            </ul>
        </nav>

    </div>

</aside>


<script>
    function logout() {
        Swal.fire({
            title: 'ออกจากระบบ',
            text: "คุณต้องการออกจากระบบใช่ไหม!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ฉันต้องการ!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                window.location.href = '<?= $this->Url->build(['prefix' => false, 'controller' => 'users', 'action' => 'logout']) ?>'

            }
        })
    }
</script>