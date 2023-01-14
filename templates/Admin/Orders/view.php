<?php $this->assign('title', $OrdersData[0]['orders_id']); ?>

<div class="row my-3">
    <div class="col-12 d-flex justify-content-between my-4 px-3">
        <h3 class="font-weight-bold"><?= __('ข้อมูลออเดอร์') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    <div class="col-12 col-sm-8 ">
        <div class="card p-3 m-1 mb-2 ">
            <div class="row">
                <div class="col-12 m-0 p-0">
                    <h6 class="m-0 p-0 text-left">รหัสสินค้า</h6>
                    <h3 class="text-primary m-0 p-0text-left"><?= $OrdersData[0]['orders_id'] ?></h3>
                    <small><?= $OrdersData[0]['date'] ?></small>
                </div>

            </div>
        </div>
        <div class="card p-3 m-1">
            <div class="col-12 d-flex justify-content-between m-0 p-0">
                <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                <a class="btn btn"><i class="fa-solid fa-print"></i></a>
            </div>
            <?php foreach ($OrdersData as $rowData) : ?>
                <div class="row m-0  mb-1 px-2">
                    <div class="col-4 col-sm-2">
                        <?php if (!empty($rowData['productsimage'])) { ?>
                            <img class="w-100" src="<?= $this->Url->build($rowData['productsimage']) ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="col-8  col-sm-10">
                        <h4 class="m-0 p-0 text-success"><?= $rowData['title'] ?></h4>
                        <h6 class="text-muted ">จำนวน <?= $rowData['total'] ?> ชิ้น</h6>
                        <p>ราคา <?= $rowData['price'] ?> บาท</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <section class="d-flex justify-content-between">
                <h5>ยอดรวมชำระ</h5>
                <h3><?= $OrdersData[0]['Total_price'] ?> บาท</h3>
            </section>
        </div>
        <!-- <div class="shadow-sm border m-1 p-2">
                <h3>ยอดรวมชำระ</h3>
                <div class="">
                    <h1 class="text-success"><?= $OrdersData[0]['Total_price'] ?> บาท</h1>
                    ที่อยู่ สรุปราคา ปุ่มแจ้งชำระเงิน แนบรูป
                </div>
            </div> -->
        <div class="col-12  m-0 p-0 mb-2">
            <div class="card p-3  m-1 h-100">
                <label for="" class="text-muted">ที่อยู่จัดส่ง</label>
                <small class="mb-2"><?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?></small>
                <hr class="m-0">
                <b>หมายเหตุ</b>
                <small><?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?></small>
            </div>
        </div>
    </div>
    <div class="col-12 col-sm-4 ">
        <div class="card p-3 mb-2 m-1 ">
            <label for="" class="text-muted">การชำระเงิน</label>
            <h3>สถานะ : <span class="text-success"><?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h3>
            <!-- <i class="fas fa-check-circle"></i> ชำระแล้ว</span> -->
            <h6>ช่องทางการชำระ : โอนผ่านธนาคาร</h6>
            <a type="button" class="text-primary" data-toggle="modal" data-target="#exampleModal">
                ดูสลิปการโอนเงิน
            </a>
        </div>
        <!-- <div class="card p-2 mb-2 m-1">
            <label for="" class="text-muted">ประวัติสถานะการทำรายการ</label>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> รับออเดอร์</small>
                <small class="text-muted">19 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> กำลังดำเนินการ</small>
                <small class="text-muted">20 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> อยู่ระหว่างการจัดส่ง</small>
                <small class="text-muted">21 ตุลาคม 2565</small>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <small class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย</small>
                <small class="text-muted">22 ตุลาคม 2565</small>
            </div>
        </div> -->
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0 mb-2">
                <div class="card p-3  m-1 h-100">
                    <label for="" class="text-muted">ลูกค้า</label>
                    <h3><?= $UserData[0]['name'] ?></h3>
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

<div class="modal" id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">แจ้งชำระเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-6 m-0 p-0">
                        <small class="m-0 p-0 ">รหัสสินค้า </small>
                        <h6 class="m-0 p-0"><?= $OrdersData[0]['orders_id'] ?></h6>
                        <small><?= $OrdersData[0]['date'] ?></small>
                        <h5 class="m-0 p-0 text-primary ">ยอดรวมชำระ <?= $OrdersData[0]['Total_price'] ?> บาท</h5>
                    </div>
                    <div class="col-6  m-0 p-0 m-auto">
                        <h6 class="m-0 p-0  text-right   text-muted">สถานะสินค้า </h6>
                        <h3 class="m-0 p-0  text-right "><?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h3>
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-12 m-0 p-0 my-3">
                </div> -->
                <hr>
                <div class="col-12 col-sm-12 ">
                    <?php if (!empty($OrdersData[0]['paymentimage'])) { ?>

                        <img class="w-100 my-3" src="<?= $this->Url->build($OrdersData[0]['paymentimage']) ?> " alt="">
                    <?php } else { ?>
                        <img class="w-100 my-3" src="<?= $this->Url->image('1615974410_35508.png') ?> " alt="">
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">ดำเนินการเรียบร้อย</button>
            </div>
        </div>
    </div>
</div>