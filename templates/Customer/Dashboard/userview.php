<div class="row my-3 m-2">
    <div class="col-12 d-flex justify-content-between my-4">
        <h3 class="font-weight-bold"><?= __('ข้อมูลผู้ใช้งาน') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>
    <div class="col-12 col-md-12 col-lg-12 card">
        <?= $this->Form->create($user, ["enctype" => "multipart/form-data"]) ?>
        <div class="row p-3 ">
            <div class="col-12  my-2">
                <h3>รูปภาพประจำตัว</h3>
            </div>
            <div class="col-12 col-sm-6 my-2">
                <div class="row m-0 py-3 my-auto w-100" style="overflow: hidden;">
                    <a data-fslightbox href="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>">
                        <img id="user_image_file" src="<?php echo $this->Url->build($user->image, ['fullBase' => true]); ?>" class="w-100">
                    </a>
                </div>
                <!-- <img src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png" class="w-100 " alt=""> -->
            </div>
            <div class="form-group col-12 col-sm-6 mt-2">

                <div class="form-floating mb-3">
                    <label for="floatingemail">ชื่อ-นามสกุล</label>
                    <h5 class="text-muted text-uppercase"><?= $user['name'] ?></h5>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">อีเมลล์ผู้ใช้งาน</label>
                    <h5 class="text-muted"><?= $user['email'] ?></h5>
                </div>

                <div class="form-floating mb-3">
                    <label for="floatingemail">ตำแหน่งผู้ใช้งาน</label>
                    <?php echo ($user['user_role_id'] == 1) ? '<p class="text-primary">เจ้าของร้านค้า</p>' : '' ?>
                    <?php echo ($user['user_role_id'] == 2) ? '<p class="text-primary">ผู้ใช้งานทั่วไป</p>' : '' ?>
                    <?php echo ($user['user_role_id'] == 3) ? '<p class="text-primary">ผู้จัดการร้านค้า</p>' : '' ?>
                    <?php echo ($user['user_role_id'] == 4) ? '<p class="text-primary">ผู้จัดการเว็บไซต์</p>' : '' ?>
                </div>
                <div class="row m-0 p-0">
                    <div class="col-12 col-sm-6 form-floating mb-3 m-0 p-0">
                        <label for="floatingemail">สถานะการยืนยันตัวตน</label>
                        <?php
                        if ($user['verified'] == 0) {
                            echo '
                        <p class="text-danger m-0 p-0"><i class="fas fa-times-circle"></i> ยังไม่ได้ยืนยันตัวตน</p>';
                        }
                        if ($user['verified'] == 1) {
                            echo '<p class="text-success m-0 p-0"><i class="fas fa-check-circle"></i> ยืนยันตัวตนเรียบร้อย</p>';
                        }
                        ?>

                    </div>

                    <div class="col-12 col-sm-6 form-floating mb-3 m-0 p-0">
                        <label for="floatingemail">สถานะผู้ใช้งาน</label>
                        <?php
                        if ($user['status'] == 0) {
                            echo '
                        <p class="text-danger m-0 p-0"><i class="fas fa-times-circle"></i> ไม่ได้ใช้งาน</p>';
                        }
                        if ($user['status'] == 1) {
                            echo '<p class="text-success m-0 p-0"><i class="fas fa-check-circle"></i> กำลังใช้งาน</p>';
                        }
                        ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
</div>