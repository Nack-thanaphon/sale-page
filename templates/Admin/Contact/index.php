<?php $this->assign('title', 'ข้อมูลเว็บไซต์'); ?>
<div class="container-fluid">
    <div class="row m-2 my-2 h-100 ">
        <div class="col-10  ">
            <div class="py-2">
                <small class="text-muted">Website Management Systems </small>
                <h3 class="m-0 p-0">ระบบจัดการข้อมูลเว็บไซต์</h3>
            </div>
        </div>
        <div class="col-2  ">
            <div class="py-2">
                <?= $this->Html->link(__('Back'), ['action' => 'index'], ['class' => 'd-flex justify-content-end my-3']) ?>
            </div>
        </div>
        <div class="col-sm-8  col-12">
            <?php foreach ($contact as $contacts) : ?>
                <div class="card p-3">
                    <div class="row m-0 p-0">
                        <div class="col-10">
                            <div class="m-0 p-0">
                                <small>ชื่อร้านค้า</small>
                                <div class=" my-2">
                                    <h3 class="text-success"><?= $contacts->name ?></h3>
                                </div>
                            </div>
                        </div>
                        <div class="col-2 d-flex justify-content-end">
                            <div class="btn-group" role="group" aria-label="Basic example">
                                <a href="<?= $this->Url->build(['action' => 'edit', $contacts->id, 'class' => 'btn btn m-1']) ?>"><i class="fas fa-wrench"></i></a>
                            </div>
                        </div>
                        <div class="col-12">
                            <section class=" mt-1">
                                <div class=" my-2">
                                    <section class="mb-3">
                                        <small class="text-muted">รายละเอียดเว็บไซต์</small>
                                        <div class="my-2">
                                            <p class="m-0 p-0">
                                                <?= $contacts->about ?>
                                            </p>
                                        </div>
                                    </section>
                                    <section class="mb-3">
                                        <small class="text-muted">ที่อยู่</small>
                                        <div class="my-2">
                                            <p class="m-0 p-0">
                                                <?= $contacts->adress ?>
                                            </p>
                                        </div>
                                    </section>
                                    <section class="mb-3">
                                        <small class="text-muted">เบอร์โทรติดต่อ</small>
                                        <div class="my-2">
                                            <h4 class="m-0 p-0">
                                                <?= $contacts->phone ?>
                                            </h4>
                                        </div>
                                    </section>
                                    <section class="mb-3">
                                        <small class="text-muted">Social medea</small>
                                        <div class="my-2">
                                            <i class="fab fa-facebook"></i>
                                            <a class="m-0 p-0">
                                                <?= $contacts->facebook ?>
                                            </a>
                                            <br>
                                            <i class="fab fa-line"></i>
                                            <a class="m-0 p-0">
                                                <?= $contacts->line ?>
                                            </a>
                                            <br>
                                            <i class="fab fa-instagram"></i>
                                            <a class="m-0 p-0">
                                                <?= $contacts->instagram ?>
                                            </a>
                                            <br>
                                            <i class="fab fa-tiktok"></i>
                                            <a class="m-0 p-0">
                                                <?= $contacts->instagram ?>
                                            </a>
                                        </div>
                                    </section>

                                    <section class="mb-3">
                                        <small class="text-muted">ช่องทางชำระเงิน</small><br>
                                        <!-- <small class="text-muted">รูปภาพบัญชีธนาคารทั้งหมด</small> <br> -->
                                        <a class="m-0 p-0" data-toggle="modal" data-target="#exampleModal" type="button">เรียกดู</a>
                                        <h6 class="m-0 p-0"> <?= $contacts->payment ?></h6>
                                    </section>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card p-3">
                <div class="card-header text-start p-0 ">
                    <p class="m-0 my-2">แจ้งเตือนเมือมีออเดอร์เข้า</p>
                </div>
                <div class="card-body p-0 pt-2">
                    <div class="mb-2">
                        <p class="m-0 p-0 text-success">Line TOKEN</p>
                        <small><?= $contacts->linetoken ?></small>
                    </div>
                    <div class="mb-2">
                        <p class="m-0 p-0 text-success">LineOA</p>
                        <small><?= $contacts->lineoficial ?></small>
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
                <h5 class="modal-title" id="exampleModalLabel">ช่องทางชำระเงิน</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <hr>
                <div class="col-12 col-sm-12 ">
                    <input type="hidden" id="paymentImgId" value="<?= $contacts->id ?>">
                    <?php if (!empty($contacts->paymentimg)) { ?>
                        <img class="w-100 my-3" id="payment_show" src="<?= $this->Url->build($contacts->paymentimg, ['fullBase' => true]); ?> " alt="">
                    <?php } else { ?>
                        <p class="m-0 p-0">ไม่มีข้อมูล</p>
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
    $('#payment_img').on('change', function() {
        var formData = new FormData();
        let paymentImgId = $("#paymentImgId").val()

        formData.append('paymentImgId', paymentImgId);
        formData.append('paymentImg', $('input[type=file]')[0].files[0]);

        $.LoadingOverlay("show");
        $.ajax({
            url: "<?= $this->Url->build(['action' => 'paymentUpload']) ?>",
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