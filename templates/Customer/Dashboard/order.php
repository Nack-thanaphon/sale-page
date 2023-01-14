<?php $this->assign('title', 'หน้าหลัก'); ?>

<div class="row my-3">
    <div class="col-12 col-sm-12 ">
        <?php foreach ($UserOrders as $row) : ?>
            <div class="card p-3 m-1 mb-2">
                <a href="/customer/payment/<?= $row->orders_token ?>" class=" m-0 rounded">
                    <div class="row m-0 p-0">
                        <div class="col-8 m-0 p-0  my-auto">
                            <h6 for="" class="text-muted">รหัสออเดอร์</h6>
                            <h2 class="text-primary m-0 p-0">#<?= $row->orders_code ?></h2>
                            <small class="text-dark m-0 p-0">วันที่สั่งซื้อ: <?= $row->created_at ?></small>
                        </div>
                        <div class="col-4 m-0 p-0 ">
                            <h6 for="" class="text-muted text-right">สถานะสินค้า</h6>
                            <h4 class="m-0 p-0 text-right text-dark"><?= ($this->Custom->getOrderStatus($row->id)) ?></h4>
                        </div>
                    </div>
                </a>
            </div>
        <?php endforeach; ?>
    </div>

</div>