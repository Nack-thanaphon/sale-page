<?php $this->assign('title', 'เพิ่มผู้ใช้งาน'); ?>

<div class="row my-3 m-2">
    <div class="col-12 d-flex justify-content-between">
        <h3 class="font-weight-bold"><?= __('เพิ่มผู้ใช้งาน') ?></h3>
        <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => ' mb-2']) ?>
    </div>

    <div class="col-12 col-md-12 col-lg-12 card">
        <div class="row p-3 ">
            <div class="col-12  my-2">
                
            </div>
            <div class="col-12 col-sm-6 my-2">
                <h3>รูปภาพประจำตัว</h3>
                <input type="file" name="" id="imgcover">
                <img  src="https://www.pngall.com/wp-content/uploads/5/User-Profile-PNG.png" class="w-100 my-3" id="EventsImgPreviews" class="py-2" alt="">
            </div>
            <div class="form-group col-12 col-sm-6 my-auto ">
                <?= $this->Form->create($user, ["enctype" => "multipart/form-data"]); ?>
                <div class="form-floating mb-3">
                    <label for="floatingemail">ชื่อ-นามสกุล</label>
                    <?= $this->Form->input('name', ['class' => 'form-control ', 'placeholder' => 'ชื่อ-นามสกุล']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">อีเมลล์ผู้ใช้งาน</label>
                    <?= $this->Form->input('email', ['class' => 'form-control ', 'placeholder' => 'อีเมลล์ผู้ใช้งาน']); ?>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">รหัสผ่าน</label>
                    <?= $this->Form->input('password', ['type' => 'password', 'class' => 'form-control ', 'placeholder' => 'รหัสผ่าน']); ?>
                </div>
                <div class="row m-0 p-0">
                    <div class="col-6">
                        <div class="form-floating my-3 ">
                            <label for="floatingemail">ตำแหน่งผู้ใช้งาน</label>
                            <select class="form-control" name="user_role_id">
                                <?php foreach ($getUserRole as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->ur_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                    <div class="col-6">
                        <div class="form-floating my-3 ">
                            <label for="floatingemail">สิทธิ์ผู้ใช้งาน</label>
                            <select class="form-control" name="user_type_id">
                                <?php foreach ($getUserType as $data) : ?>
                                    <option value="<?= $data->id ?>"><?= $data->ut_name ?></option>
                                <?php endforeach; ?>
                            </select>
                        </div>
                    </div>
                </div>
                <div class="form-floating mb-3">
                    <label for="floatingemail">สถานะผู้ใช้งาน</label>
                    <div class="form-check">
                        <input class="form-check-input" type="radio" name="p_status" value='0'>
                        <label class="form-check-label" for="flexRadioDefault2">
                            เปิดการใช้งาน
                        </label>
                    </div>
                    <div class="form-check">
                        <input class="form-check-input " type="radio" name="p_status" value='1' checked>
                        <label class="form-check-label text-danger" for="flexRadioDefault1">
                            ปิดการใช้งาน
                        </label>
                    </div>

                </div>
                <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 mt-2 m-0']) ?>
                <?= $this->Form->end() ?>
            </div>
        </div>
    </div>

</div>



<script>
    $(document).ready(function() {
        function readURL(input) {
            if (input.files && input.files[0]) {
                var reader = new FileReader();
                reader.onload = function(e) {
                    $('#EventsImgPreviews').attr('src', e.target.result);
                    $('#EventsImgPreviews').attr('hidden', false);
                }
                reader.readAsDataURL(input.files[0]);
            }
        }
        $("#imgcover").change(function() {
            readURL(this);
        })
    });
</script>