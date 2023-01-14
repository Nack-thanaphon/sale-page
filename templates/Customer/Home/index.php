<div class="container">
    <div class="row m-0 py-2  ">
        <div class="col-12 col-sm-12">
            <div class="row m-0 py-3 d-flex justify-content-between">
                <div class="my-auto">ไปหน้าจัดการ</div>
                <div class="btn btn-primary">ประวัติการสั่งซื้อ</div>
            </div>
        </div>

        <div class="col-12 col-sm-4">
            <div class="shadow-sm border my-1 p-3">
                <h4>ชำระผ่านธานคาร</h4>
                <img src="https://www.sacsteelwork.com/wp-content/uploads/2022/05/SAC-bankpay-100-736x1024.jpg" class="w-100 d-inline-block my-1" alt="">
                <div class="btn btn-primary">แจ้งสลิปชำระเงิน</div>
            </div>
        </div>
        <div class="col-12 col-sm-8">
            <div class="card p-3 m-1 mb-2">
                <h6 for="" class="text-muted">รหัสออเดอร์</h6>
                <h2 class="text-primary">#<?= $OrdersData[0]['id'] ?></h2>
                <small>วันที่สั่งซื้อ: <?= $OrdersData[0]['date'] ?></small>
            </div>
            <div class="card p-3 m-1">
                <div class="col-12 d-flex justify-content-between m-0 p-0">
                    <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                    <a class="btn btn"><i class="fa-solid fa-print"></i></a>
                </div>
                <?php foreach ($OrdersData as $rowData) : ?>
                    <div class="row m-0  mb-1 px-2">
                        <div class="col-2 m-0 p-0">
                            <img class="w-100 d-flex justify-content-center" src="https://cdn.britannica.com/72/170772-050-D52BF8C2/Avocado-fruits.jpg" alt="">
                        </div>
                        <div class="col-10 my-auto m-0 p-0 ">
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
                    <small class="mb-2">105/1 หอการค้าดาวอังคาร
                        ตำบล ในเวียง อำเภอ ในเวียง จังหวัด เชียงใหม่
                        รหัสไปษณีย์ 44556</small>
                    <hr class="m-0">
                    <b>หมายเหตุ</b>
                    <small>**ไม่ต้องบอกเมีย</small>
                </div>
            </div>
        </div>
    </div>
</div>