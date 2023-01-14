<?php $this->assign('title', 'แก้ไขออเดอร์'); ?>

<?php $this->assign('title', $OrdersData[0]['orders_code']); ?>
<div class="row my-3">
    <div class="col-12 d-flex justify-content-between my-4 px-3">
        <h3 class="font-weight-bold"><?= __('อัพเดตสถานะออเดอร์') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    <div class="col-12 col-sm-8 ">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-6 m-0 p-0 mb-2">
                <div class="card  p-2  pb-2 m-1 h-100 ">
                    <label class="text-muted">สถานะสินค้า</label>
                    <h3 class="text-primary ">
                        <?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?>
                    </h3>
                    <h6>วันที่สั่งซื้อ: <?= $OrdersData[0]['date'] ?></h6>
                </div>
            </div>
            <div class="col-12 col-sm-6 m-0 p-0 mb-2">
                <div class="card  p-2  pb-2 m-1 h-100 ">
                    <label class="text-muted">การชำระเงิน</label>
                    <h5>รหัสออเดอร์ : <?= $OrdersData[0]['orders_code'] ?></h5>
                    <input type="hidden" value="<?= $OrdersData[0]['id'] ?>" id="orders_id">
                    <input type="hidden" value="<?= $OrdersData[0]['orders_token'] ?>" id="orders_token">
                    <h6>สถานะ : <span class="text-success"> <?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h6>
                    <a type="button" class="text-primary" data-toggle="modal" data-target="#payment_status">
                        ดูสลิปการโอนเงิน
                    </a>
                </div>
            </div>
        </div>
        <div class="card p-2 m-1 mb-2 m-0">
            <div class="col-12 d-flex justify-content-between m-0 p-0 my-auto">
                <b class="text-muted my-auto">ประวัติสถานะการทำรายการ</b>
                <a class="btn btn" type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">อัพเดตสถานะ <i class="fas fa-pen-square"></i></a>
            </div>
            <!-- <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> รับออเดอร์</p>
                <p class="text-muted">19 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> กำลังดำเนินการ</p>
                <p class="text-muted">20 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> อยู่ระหว่างการจัดส่ง</p>
                <p class="text-muted">21 ตุลาคม 2565</p>
            </div>
            <div class="d-flex justify-content-between mb-2">
                <p class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย</p>
                <p class="text-muted">22 ตุลาคม 2565</p>
            </div> -->
        </div>
        <div class="card m-1 p-2 m-0 ">
            <div class="col-12 d-flex justify-content-between m-0 p-0 ">
                <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                <!-- <a class="btn btn"><i class="fa-solid fa-print"></i></a> -->
            </div>
            <?php foreach ($OrdersData as $rowData) : ?>
                <div class="row m-0  mb-1 px-2 ">
                    <!-- รหัสสินค้า <?= $rowData['p_id'] ?> -->
                    <div class="col-3 p-2 m-0 p-0 m-auto">
                        <div class="w-75 h-75" style="overflow: hidden;">
                            <img class="w-100 d-flex justify-content-center" src="<?php echo $this->Url->build($rowData['image'], ['fullBase' => true]); ?>" alt="">
                        </div>
                    </div>
                    <div class="col-9 p-2 my-auto m-0 p-0 ">
                        <p class="m-0 p-0 text-success"><?= $rowData['title'] ?></p>
                        <small class="text-muted ">จำนวน <?= $rowData['total'] ?> ชิ้น</small> <br>
                        <p>ราคา <?= $rowData['price'] ?> บาท</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <section class="d-flex justify-content-between">
                <h4>ยอดรวมชำระ</h4>
                <h1><?= $OrdersData[0]['Total_price'] ?> บาท</h1>
            </section>
        </div>
    </div>
    <div class="col-12 col-sm-4 ">
        <div class="card p-3  m-1 h-100">
            <label for="" class="text-muted">ลูกค้า</label>
            <h3><?= $UserData[0]['name'] ?></h3>
            <h6>เบอร์โทร : <?= ($UserData[0]['phone']) ? $UserData[0]['phone'] : 'ไม่มีข้อมูล' ?></h6>
            <!-- <a href="/customer/orderhistory">ดูประวัติการสั่งซื้อ</a> -->
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

<div class="modal " id="exampleModal" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLabel">อัพเดตสถานะสินค้า</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-8">
                        <h5>รหัสสินค้า | #<?= $OrdersData[0]['orders_code'] ?></h5>
                        <small><?= $OrdersData[0]['date'] ?></small>
                    </div>
                    <div class="col-12 col-sm-4">
                        <select name="" class="custom-select" id="status">
                            <option class="text-muted" value="0" <?= ($OrdersData[0]['status'] == 0) ? "selected" : "" ?>>ยกเลิก</option>
                            <option class="text-muted" value="1" <?= ($OrdersData[0]['status'] == 1) ? "selected" : "" ?>>รอการชำระเงิน</option>
                            <option class="text-muted" value="2" <?= ($OrdersData[0]['status'] == 2) ? "selected" : "" ?>>รอการตรวจสอบ</option>
                            <option class="text-muted" value="3" <?= ($OrdersData[0]['status'] == 3) ? "selected" : "" ?>>ชำระเงินแล้ว</option>
                            <option class="text-muted" value="4" <?= ($OrdersData[0]['status'] == 4) ? "selected" : "" ?>>กำลังดำเนินการ</option>
                            <option class="text-muted" value="5" <?= ($OrdersData[0]['status'] == 5) ? "selected" : "" ?>>จัดส่งแล้ว</option>
                        </select>
                    </div>
                </div>
                <div class="col-12 col-sm-12 my-3">
                    <div class="form-floating my-1">
                        <label>บริษัทขนส่ง</label>
                        <select class="custom-select" id="delivery_service">
                            <option disabled selected>กรุณาเลือก</option>
                            <option value="FlashExpress" <?= (!empty(($OrdersData[0]['delivery_service'] == "FlashExpress"))) ? 'selected' : '' ?>>FlashExpress</option>
                            <option value="Shopee" <?= (!empty(($OrdersData[0]['delivery_service'] == "Shopee"))) ? 'selected' : '' ?>>Shopee</option>
                            <option value="Kerry" <?= (!empty(($OrdersData[0]['delivery_service'] == "Kerry"))) ? 'selected' : '' ?>>Kerry</option>
                            <option value="ไปรษณีย์ไทย" <?= (!empty(($OrdersData[0]['delivery_service'] == "ไปรษณีย์ไทย"))) ? 'selected' : '' ?>>ไปรษณีย์ไทย</option>
                        </select>
                    </div>
                    <div class="form-floating my-1">
                        <label>เลขพัสดุสินค้า</label>
                        <input id="delivery_code" class="form-control" value="<?= $OrdersData[0]['delivery_code'] ?>" placeholder="เลขพัสดุสินค้า"></input>
                    </div>
                    <!-- <div class="mt-3">
                        <hr class="my-2">
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> รับออเดอร์
                                <br>
                                <span>
                                    <small class="text-muted">19 ตุลาคม 2565</small>
                                </span>
                            </h6>
                        </div>
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> กำลังดำเนินการ
                                <br>
                                <span>
                                    <small class="text-muted">20 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                        <div class=" my-3 text-muted">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle "></i> อยู่ระหว่างการจัดส่ง
                                <br>
                                <span>
                                    <small class="text-muted">21 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                        <div class="mt-3">
                            <h6 class="font-weight-bold"><i class="fas fa-check-circle text-success"></i> จัดส่งเรียบร้อย
                                <br>
                                <span>
                                    <small class="text-muted">22 ตุลาคม 2565</small>
                                </span>
                            </h6>

                        </div>
                    </div> -->
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">ปิด</button>
                <button type="button" class="btn btn-primary" id="updateSave">บันทึกข้อมูล</button>
            </div>
        </div>
    </div>
</div>

<div class="modal" id="payment_status" tabindex="-1" role="dialog" aria-labelledby="exampleModalLabel" aria-hidden="true">
    <div class="modal-dialog" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="payment_statusLabel">แจ้งชำระเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="row m-0 p-0">
                    <div class="col-sm-6 col-12 mb-2 m-0 p-0">
                        <small class="m-0 p-0 ">รหัสสินค้า </small>
                        <h6 class="m-0 p-0"><?= $OrdersData[0]['orders_code'] ?></h6>
                        <small><?= $OrdersData[0]['date'] ?></small>
                        <h5 class="m-0 p-0 text-primary ">ยอดรวมชำระ <?= $OrdersData[0]['Total_price'] ?> บาท</h5>
                    </div>
                  
                    <div class="col-sm-6  col-12 mb-2 m-0 p-0 m-auto">
                        <h6 class="m-0 p-0  text-left text-sm-right ">สถานะสินค้า </h6>
                        <h4 class="m-0 p-0 my-2 text-left text-sm-right "><?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h4>
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-12 m-0 p-0 my-3">
                </div> -->
                <hr>
                <div class="col-12 col-sm-12 ">
                    <?php if (!empty($OrdersData[0]['paymentimage'])) { ?>
                        <img class="w-100 my-3" src="<?= $this->Url->build($OrdersData[0]['paymentimage']) ?> " alt="">
                    <?php } else { ?>
                        <img class="w-100 my-3" src="<?= $this->Url->build($PaymentImg->img) ?> " alt="">
                    <?php } ?>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">ดำเนินการเรียบร้อย</button>
            </div>
        </div>
    </div>
</div>


<script>
    $('#updateSave').on('click', function() {

        var formData = new FormData();
        let orders_id = $("#orders_id").val();
        let orders_token = $("#orders_token").val();
        let delivery_service = $("#delivery_service").val();
        let delivery_code = $("#delivery_code").val()
        let status = $("#status").val();

        formData.append("orders_id", orders_id)
        formData.append("orders_token", orders_token)
        formData.append("status", status)
        formData.append("delivery_service", delivery_service)
        formData.append('delivery_code', delivery_code);

        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'orders', 'action' => 'updateStatus']) ?>",
            type: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
                window.location.reload()

            }
        })
    })
</script>