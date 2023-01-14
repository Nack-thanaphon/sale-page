<?php $this->assign('title', 'ระบบผู้ใช้งานและสมาชิก'); ?>
<div class="container-fluid">
    <div class="row my-5 h-100 ">
        <div class="col-12">
            <div class="py-2">
                <small class="text-muted">Users Management Systems </small>
                <h3 class="m-0 p-0">ระบบผู้ใช้งานและสมาชิก</h3>
            </div>
        </div>
        <div class="col-sm-4 col-12 m-0 p-0">
            <?php foreach ($usersUnVerifiled as $user) : ?>
                <div class="card  p-1 m-1">
                    <div class="row m-0 p-0">
                        <div class="col-sm-12 col-12">
                            <div>
                                <p class="m-0 p-0"><?= $user->name ?></p>
                                <small class="text-muted"><?= $user->email ?></small><br>
                                <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small><br>
                                <small class="text-muted">สถานะ : <?= ($user->verified == 1) ? '<i class="fas fa-check-circle text-success"></i> ยืนยันตัวตนเรียบร้อย</small>' : '<i class="fas fa-times-circle text-danger"></i> รอการยืนยันตัวตน</small>' ?>
                            </div>
                        </div>
                        <!-- <div class=" d-none d-sm-flex justify-content-between m-0 p-0 col-12 col-sm-4 ">
                                <p type="button" class="m-0 p-0">ยืนยัน</p>
                                <p type="button" class="m-0 p-0 text-danger">ไม่ยืนยัน</p>
                            </div> -->
                    </div>
                </div>
            <?php endforeach ?>
        </div>
        <div class="col-sm-8  col-12 p-0  m-0 ">
            <div class="card  p-1 m-1">
                <div class="col-12  d-sm-flex justify-content-end mb-2 m-0 p-0">
                    <div class="">
                        <a href="<?= $this->Url->build(['controller' => 'Users', 'action' => 'add']) ?>" class="btn btn-primary m-1"><i class="fas fa-plus-circle"></i> เพิ่มผู้ใช้งาน</a>
                    </div>
                </div>

                <table id="example" class="table table-hover row-border display dt-responsive nowrap" class="w-100">

                    <thead>
                        <tr>
                            <th>ลำดับ</th>
                            <th>ข้อมูลส่วนตัว</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($usersUnVerifiled as $key => $user) : ?>
                            <tr class="shadow-sm ">
                                <td width="10%"><?= $key + 1 ?></td>
                                <td width="80%">
                                    <p class="m-0 p-0 text-muted"><a href="http://"><?= $user->name ?></a></p>
                                    <small class="m-0 p-0 text-muted">อีเมลล์ผู้ใช้งาน :<?= $user->email ?></small><br>
                                    <small class="m-0 p-0 text-muted">สร้างขึ้นเมือ :<?= $user->created_at ?></small><br>
                                    <small>สถานะผู้ใช้งาน : </small><?= ($user->user_role_id == 1) ? '<small class="text-primary">' . $user->users_type['ut_name'] . '</small>' : '<small class="text-muted">' . $user->users_type['ut_name'] . '</small>' ?>
                                </td>

                                <td>
                                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'edit', $user->token]) ?>" type="button" class=" p-1 text-muted"><i class="fa-solid fa-pen-to-square"></i></a>
                                    <a href="<?= $this->Url->build(['controller' => 'users', 'action' => 'view', $user->token]) ?>" class="p-1 text-primary"><i class="fas fa-circle-info"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>