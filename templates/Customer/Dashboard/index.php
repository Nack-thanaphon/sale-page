<?php $this->assign('title', 'หน้าหลัก'); ?>

<div class="row my-3">
    <div class="col-12 col-sm-8 ">
        <?php foreach ($UserOrders as $row) : ?>
            <div class="card p-3 m-1 mb-2">
                <a href="/customer/payment/<?= $row->orders_token ?>" class=" m-0 rounded">
                    <div class="row m-0 p-0 d-flex my-auto justify-content-between">
                        <h6 for="" class="text-muted">รหัสออเดอร์</h6>
                    </div>
                    <h2 class="text-primary">#<?= $row->orders_code ?></h2>
                    <small class="text-dark">วันที่สั่งซื้อ: <?= $row->created_at ?></small>
                </a>
            </div>
        <?php endforeach; ?>
    </div>
    <div class="col-12 col-sm-4 ">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0 mb-2">
                <div class="card p-3  m-1 h-100">
                    <label for="" class="text-muted">ลูกค้า</label>
                    <h5><?= $UserData[0]['name'] ?></h5>
                    <h6>เบอร์โทร : <?= ($UserData[0]['phone']) ? $UserData[0]['phone'] : 'ไม่มีข้อมูล' ?></h6>
                    <a href="/customer/orderhistory">ดูประวัติการสั่งซื้อ</a>
                    <br>
                    <hr class="m-0">
                    <div class="py-2">
                        <label for="" class="text-muted m-0 p-0">ที่อยู่จัดส่ง</label> <br>
                        <div class="my-1">
                            <?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?>
                        </div>
                        <hr class="m-0">
                        <label for="" class="text-muted m-0 p-0">หมายเหตุ</label> <br>
                        <div class="my-1">
                            <?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>