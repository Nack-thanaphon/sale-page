<div class="container-fluid">
    <div class="row my-3 ">
        <div class=" col-12 col-sm-8 ">
            <label for="">
                <h3>ข้อมูลบริษัท</h3>
            </label>
            <?php foreach ($contact as $contacts) : ?>
                <div class="card p-3">
                    <div class="row m-0 p-0">
                        <div class="col-8">
                            <div class="m-0 p-0">
                                <small>ชื่อร้านค้า</small>
                                <h1><?= $contacts->b_name ?></h1>
                            </div>
                        </div>
                        <div class="col-4 d-flex justify-content-end">
                            <div class="btn-group" role="group" aria-label="Basic example">

                                <?= $this->Html->link(__('อัพเดตข้อมูล'), ['action' => 'edit', $contacts->id, 'class' => 'btn btn m-1']) ?>
                            </div>
                        </div>
                        <div class="col-12">
                            <section class=" mt-1">
                                <div class=" my-2">
                                    <section class="mb-3">
                                        <small class="text-muted">ที่อยู่</small>
                                        <p class="m-0 p-0">
                                            <?= $contacts->b_adress ?>
                                        </p>
                                    </section>
                                    <section class="mb-3">
                                        <small class="text-muted">เบอร์โทรติดต่อ</small>
                                        <h4 class="m-0 p-0">
                                            <?= $contacts->b_phone ?>

                                        </h4>
                                    </section>
                                    <section class="mb-3">
                                        <small class="text-muted">Socail medea</small>
                                        <h6 class="m-0 p-0"><?= $contacts->b_social ?></h6>
                                    </section>

                                    <section class="mb-3">
                                        <small class="text-muted">ช่องทางชำระเงิน</small>
                                        <h6 class="m-0 p-0"> <?= $contacts->b_payment ?></h6>
                                    </section>
                                </div>
                            </section>
                        </div>
                    </div>
                </div>
            <?php endforeach; ?>
        </div>
        <div class=" col-12 col-sm-4 ">
            <label for="">
                <h3>ประวัติการอัพเดต</h3>
            </label>
            <div class="card p-3">
                <table>
                    <thead class="text-right">
                        <tr>
                            <td class="text-left">วันเดือนปี</td>
                            <td>ผู้จัดการ</td>
                            <td>สถานะ</td>
                        </tr>
                    </thead>
                    <tbody class="text-right">
                        <tr>
                            <td class="text-left"><?= date('d-m-Y') ?></td>
                            <td>
                                <small class="text-muted">
                                    nack
                                </small>
                            </td>
                            <td>
                                <small class="text-primary">แก้ไขแล้ว</small>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left"><?= date('d-m-Y') ?></td>
                            <td>
                                <small class="text-muted">
                                    nack
                                </small>
                            </td>
                            <td>
                                <small class="text-primary">แก้ไขแล้ว</small>
                            </td>
                        </tr>
                        <tr>
                            <td class="text-left"><?= date('d-m-Y') ?></td>
                            <td>
                                <small class="text-muted">
                                    nack
                                </small>
                            </td>
                            <td>
                                <small class="text-primary">แก้ไขแล้ว</small>
                            </td>
                        </tr>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>