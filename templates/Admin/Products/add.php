<?php $this->assign('title', 'เพิ่มสินค้า'); ?>


<style>
    label#largeFile:after {
        position: absolute;
        width: 100%;
        max-width: 800px;

    }

    label#largeFile input#file {
        width: 0px;
        height: 0px;
    }
</style>

<div class="row my-3">
    <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => 'col-12 d-flex justify-content-end mb-2']) ?>
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card p-3">
            <?= $this->Form->create($ProductsData, ["enctype" => "multipart/form-data"]) ?>
            <div class="form-group">
                <h3 class="font-weight-bold"><?= __('เพิ่มสินค้า') ?></h3>
                <div class="form-floating mb-1">
                    <label>โปรโมชั่น</label>
                    <select name="p_promotion" class="form-control selectpicker">
                        <?php
                        foreach ($promotion as $row) {
                            echo '<option value="' . $row->pr_id . '" >' . $row->pr_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <label>ชื่อสินค้า</label>
                    <input class="form-control" type="text" placeholder='ชื่อสินค้า' name="p_title">
                </div>
                <div class="form-floating mb-1">
                    <label>ชนิดสินค้า</label>
                    <select name="p_type_id" class="form-control selectpicker">
                        <?php
                        foreach ($ProductsType as $row) {
                            echo '<option value="' . $row->p_id . '" >' . $row->pt_name . '</option>';
                        }
                        ?>
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <label>รายละเอียดบทความ</label>
                    <textarea name="p_detail" id="editor1" rows="10" cols="80" required></textarea>
                </div>

                <div class=" row m-0 p-0 ">
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_total">จำนวนสินค้า</label>
                        <div class="input-group mb-3">
                            <?= $this->Form->input('p_total', ['class' => 'form-control', 'type' => 'number', 'id' => 'p_total', 'placeholder' => 'กรุณากรอกจำนวนสินค้า']); ?>
                            <div class="input-group-append">
                                <span class="input-group-text">/ชิ้น</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_price">ราคาสินค้า</label>
                        <div class="input-group mb-3">
                            <?= $this->Form->input('p_price', ['class' => 'form-control', 'type' => 'number', 'id' => 'p_price', 'placeholder' => 'กรุณากรอกราคาสินค้า']); ?>
                            <div class="input-group-append">
                                <span class="input-group-text">/บาท</span>
                            </div>
                        </div>
                    </div>

                    <div class="col-12 col-sm-12 m-0">

                        <div class="form-floating mb-1">
                            <label>สถานะสินค้า</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="p_status" value='1' checked>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    เผยแพร่
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="p_status" value='0'>
                                <label class="form-check-label" for="flexRadioDefault2">
                                    ไม่เผยแพร่
                                </label>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4">
        <div class="card m-2 p-2">
            <div class="d-flex justify-content-between my-auto m-1">
                <p class="my-2 p-0">รูปภาพปก <br>
                    <span>
                        <small class="text-muted cover-warning">**กรุณาอัพโหลดภาพหน้าปก</small>
                    </span>
                </p>
                <label class="my-2 p-0" for="imagecover"><i class="fas fa-arrow-circle-up"></i></label>
                <input type="file" id="imagecover" name="imagecover" class="d-none">

            </div>
            <div class="row m-0 p-0">
                <div class="col-12  m-0 p-0">
                    <img id="singleimages" class="w-100">
                </div>
            </div>
        </div>
        <div class="card m-2 p-2">
            <div class="d-flex justify-content-between my-auto m-1">
                <p class="my-2 p-0">รูปภาพประกอบ
                    <br>
                    <span>
                        <small class="text-muted img-warning">**กรุณาอัพโหลดภาพสินค้า</small>
                    </span>
                </p>
                <label class="my-2 p-0" for="images"><i class="fas fa-arrow-circle-up"></i></label>
                <input type="file" name="images[]" id="images" class="d-none" multiple>
            </div>
            <div class="row m-0 p-0">
                <div class="multiimages">
                </div>
            </div>
        </div>
        <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 m-1 saveData', 'disabled' => true]) ?>
        <?= $this->Form->end() ?>
    </div>

</div>


<script>
    CKEDITOR.replace('editor1');
    $(function() {
        $('#imagecover').on('change', function() {
            singleimagesPreview(this);
            $('.cover-warning').hide()
            $('.saveData').attr('disabled', false)
        });
        $('#images').on('change', function() {
            multiimagesPreview(this, 'div.multiimages');
            $('.img-warning').hide()
        });
    });
</script>