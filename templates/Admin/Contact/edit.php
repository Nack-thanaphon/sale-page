<?php $this->assign('title', 'ข้อมูลเว็บไซต์'); ?>
<div class="container-fluid">
    <?= $this->Form->create($contact) ?>
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
            <div class="card p-3">
                <div class="row m-0 p-0">
                    <div class="col-12">
                        <div class="m-0 p-0">
                            <small>ชื่อร้านค้า</small>
                            <div class=" my-2">
                                <input type="text" name="name" class="form-control" value="<?= $contact->name ?>">
                            </div>
                        </div>
                    </div>
                    <div class="col-12">
                        <section class=" mt-1">
                            <div class=" my-2">
                                <section class="mb-3">
                                    <small class="text-muted">รายละเอียดเว็บไซต์</small>
                                    <div class="my-2">
                                        <textarea name="about" class="form-control text-left" cols="30" rows="3"><?= $contact->about ?></textarea>
                                    </div>
                                </section>
                                <section class="mb-3">
                                    <small class="text-muted">ที่อยู่</small>
                                    <div class="my-2">
                                        <textarea name="adress" class="form-control text-left" cols="30" rows="3"><?= $contact->adress ?></textarea>
                                    </div>
                                </section>
                                <section class="mb-3">
                                    <small class="text-muted">เบอร์โทรติดต่อ</small>
                                    <div class="my-2">
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i class="fas fa-phone"></i></span>
                                            </div>
                                            <input type="text" name="" value="<?= $contact->phone ?>" class="form-control" placeholder="หมายเลขโทรศัพท์" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </section>
                                <section class="mb-3">
                                    <small class="text-muted">Social medea</small>
                                    <div class="my-2">
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-facebook"></i></span>
                                            </div>
                                            <input type="text" name="facebook" value="<?= $contact->facebook ?>" class="form-control" placeholder="facebook" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-line"></i></span>
                                            </div>
                                            <input type="text" name="line" value="<?= $contact->line ?>" class="form-control" placeholder="line" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-instagram"></i></span>
                                            </div>
                                            <input type="text" name="instagram" value="<?= $contact->instagram ?>" class="form-control" placeholder="instagram" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                        <div class="input-group mb-1">
                                            <div class="input-group-prepend">
                                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-tiktok"></i></span>
                                            </div>
                                            <input type="text" name="tiktok" value="<?= $contact->tiktok ?>" class="form-control" placeholder="tiktok" aria-label="Username" aria-describedby="basic-addon1">
                                        </div>
                                    </div>
                                </section>
                                <!-- <section class="mb-3">
                                    <small class="text-muted">ช่องทางชำระเงิน</small><br>
                                    <div class="my-2">
                                        <input type="file">
                                    </div>
                                </section> -->
                            </div>
                        </section>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4">
            <div class="card p-3">
                <div class="card-header text-start p-0 ">
                    <p class="m-0 my-2">แจ้งเตือนเมือมีออเดอร์เข้า</p>
                </div>
                <div class="card-body p-0 pt-2">
                    <div class="mb-2">
                        <p class="m-0 p-0 text-success">Line TOKEN</p>
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-line"></i></span>
                            </div>
                            <input type="text" name="linetoken" value="<?= $contact->linetoken ?>" class="form-control" placeholder="Line Notify" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                    <div class="mb-2">
                        <p class="m-0 p-0 text-success">LineOA</p>
                        <div class="input-group my-2">
                            <div class="input-group-prepend">
                                <span class="input-group-text" id="basic-addon1"> <i class="fab fa-line"></i></span>
                            </div>
                            <input type="text" name="lineoficial" value="<?= $contact->lineoficial ?>" class="form-control" placeholder="Line Oficial" aria-label="Username" aria-describedby="basic-addon1">
                        </div>
                    </div>
                </div>
            </div>
            <button class="btn btn-primary w-100" type="submit">บันทึกข้อมูล</button>
        </div>
    </div>
    <?= $this->Form->end() ?>
</div>