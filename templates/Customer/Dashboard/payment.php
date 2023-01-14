<?php $this->assign('title', 'หน้าชำระเงิน'); ?>

<div class="row m-0 py-2  ">
    <div class="col-12 col-sm-12">
        <div class="row m-0 py-3 d-flex justify-content-end">
            <a type="button" class="btn btn-primary" data-toggle="modal" data-target="#exampleModal">
                <i class="fas fa-pen-square"></i> แจ้งชำระเงิน
            </a>
        </div>
    </div>


    <div class="col-12 col-sm-12">
        <div class="card p-3 m-1 mb-2 ">
            <div class="row">
                <div class="col-6 m-0 p-0">
                    <h6 class="m-0 p-0 text-left">รหัสสินค้า</h6>
                    <h3 class="text-primary m-0 p-0text-left"><?= $OrdersData[0]['orders_id'] ?></h3>
                    <small><?= $OrdersData[0]['date'] ?></small>
                </div>
                <div class="col-6  m-0 p-0 my-auto">
                    <h6 class="m-0 p-0  text-right  text-muted">สถานะสินค้า </h6>
                    <h3 class="m-0 p-0  text-right "><?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h3>
                </div>
            </div>
        </div>
        <div class="card p-3 m-1">
            <div class="col-12 d-flex justify-content-between m-0 p-0">
                <b class="mb-2 text-muted">รายละเอียดออเดอร์</b>
                <a class="btn btn"><i class="fa-solid fa-print"></i></a>
            </div>
            <?php foreach ($OrdersData as $rowData) : ?>
                <div class="d-flex justify-items-between mb-2">
                    <div class="my-auto  p-1">
                        <?php if (!empty($rowData['productsimage'])) { ?>
                            <img style="width:100px;height:100px; object-fit: cover;" src="<?= $this->Url->build($rowData['productsimage']) ?>" alt="">
                        <?php } ?>
                    </div>
                    <div class="my-auto p-1 w-100">
                        <h6 class="m-0 p-0 text-success col-8 text-truncate"><?= $rowData['title'] ?></h6>
                        <h6 class="text-muted ">จำนวน <?= $rowData['total'] ?> ชิ้น</h6>
                        <p>ราคา/ชิ้น <?= $rowData['price'] ?> บาท</p>
                    </div>
                </div>
            <?php endforeach; ?>
            <hr>
            <section class="d-flex justify-content-between">
                <h5>ยอดรวมชำระ</h5>
                <h3><?= $OrdersData[0]['Total_price'] ?> บาท</h3>
            </section>
        </div>
        <input type="hidden" id="paymentImgId" value="<?= ($OrdersData[0]['paymentimageId']) ? $OrdersData[0]['paymentimageId'] : 0 ?>">
        <input type="hidden" id="orders_id" value="<?= ($OrdersData[0]['id']) ?>">
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
                <!-- <b>หมายเหตุ</b>
                <small><?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?></small> -->
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
                    <div class="col-12 m-0 p-0">
                        <small class="m-0 p-0 ">รหัสสินค้า <span class="text-primary"><?= $OrdersData[0]['orders_id'] ?></span></small><br>
                        <small>เวลา : <span><?= $OrdersData[0]['date'] ?></span></small>
                        <h5 class="m-0 p-0 ">ยอดรวมชำระ <span class="text-primary"><?= $OrdersData[0]['Total_price'] ?></span> บาท</h5>
                 <hr>
                        <h6 class="m-0 p-0   text-muted">สถานะสินค้า </h6>
                        <h3 class="m-0 p-0   "><?= $this->Custom->getOrderStatus($OrdersData[0]['id']) ?></h3>
                    </div>
                </div>
                <!-- <div class="col-12 col-sm-12 m-0 p-0 my-3">
                </div> -->
                <hr>
                <div class="col-12 col-sm-12 ">
                    <?php if (!empty($OrdersData[0]['paymentimage'])) { ?>

                        <img class="w-100 my-3" id="payment_show" src="<?= $this->Url->build($OrdersData[0]['paymentimage']) ?> " alt="">
                    <?php } else { ?>
                        <img class="w-100 my-3" id="payment_show" src="<?= $this->Url->build($contactData->paymentimg) ?> " alt="">
                    <?php } ?>
                    <div class="d-flex justify-content-center ">
                        <label class="my-2 py-2 text-center" for="payment_img">
                            <small for="confirm_payment ">อัพโหลดสลิปชำระเงิน</small> <br>
                            <p class="m-0 p-0"><i class="fas fa-arrow-circle-up"></i> <span class="text-primary">คลิ๊กเพื่ออัพโหลด</span></p>
                        </label>
                        <input type="file" id="payment_img" name="payment_img" class="d-none">
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary">ดำเนินการเรียบร้อย</button>
            </div>
        </div>
    </div>
</div>

<script src="https://cdn.jsdelivr.net/npm/gasparesganga-jquery-loading-overlay@2.1.7/dist/loadingoverlay.min.js"></script>
<script>
    $(document).ready(function() {

        // $("#exampleModal").modal('show');
        localStorage.removeItem("orders_token");
        localStorage.removeItem("cart_list");
    })
    $('#payment_img').on('change', function() {

        var formData = new FormData();
        let orders_id = $("#orders_id").val();
        let orders_token = $("#orders_token").val();
        let paymentImgId = $("#paymentImgId").val()

        let paymentImgIdData = 0;

        if (paymentImgId == 'undefined') {
            paymentImgIdData = 0;
        } else {
            paymentImgIdData = paymentImgId
        }


        formData.append("orders_id", orders_id)
        formData.append("orders_token", orders_token)
        formData.append('paymentImgId', paymentImgIdData);
        formData.append('paymentImg', $('input[type=file]')[0].files[0]);

        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'dashboard', 'action' => 'paymentUpload']) ?>",
            type: 'post',
            data: formData,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {
                setTimeout(function() {
                    $.LoadingOverlay("hide");
                    Swal.fire({
                        text: 'อัพเดตข้อมูลเรียบร้อย',
                        icon: 'success',
                        confirmButtonText: 'ตกลง',
                    }).then((result) => {
                        if (result.isConfirmed) {
                            window.location.reload()
                        }
                    })
                }, 3000);

            }
        })
    })
</script>