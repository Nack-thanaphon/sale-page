<div class="row my-3">
    <?= $this->Html->link(__('Back to'), ['action' => 'index'], ['class' => 'col-12 d-flex justify-content-end mb-2']) ?>
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card p-3">
            
            <?= $this->Form->create($product, ["enctype" => "multipart/form-data"]) ?>
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
                    <?= $this->Form->input('p_title', ['class' => 'form-control ','placeholder'=>'ชื่อสินค้า']); ?>
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
                        <?= $this->Form->input('p_total', ['class' => 'form-control', 'id' => 'p_total','placeholder'=>'ตัวอย่าง : 20']); ?>
                    </div>
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_price">ราคาสินค้า</label>
                        <?= $this->Form->input('p_price', ['class' => 'form-control', 'id' => 'p_price','placeholder'=>'ตัวอย่าง : 250']); ?>
                    </div>
                </div>
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
    <div class="col-12 col-md-12 col-lg-4">
        <div class="card p-3">
            <div class="form-group my-2">
                <small>ภาพสินค้า</small>
            </div>
            <input type="file" name="p_image_id" class="form-control" class="image" multiple id="gallery-photo-add">
            <div class="gallery row m-0 p-0"></div>
            <?= $this->Form->button(__('Submit'), ['class' => 'btn btn-primary w-100']) ?>
            <?= $this->Form->end() ?>
        </div>
    </div>
</div>


<script>
    CKEDITOR.replace('editor1');

    $(function() {
        // Multiple images preview in browser
        var imagesPreview = function(input, placeToInsertImagePreview) {

            if (input.files) {
                var filesAmount = input.files.length;

                for (i = 0; i < filesAmount; i++) {
                    var reader = new FileReader();

                    reader.onload = function(event) {
                        $($.parseHTML('<img class="col-4 p-1">')).attr('src', event.target.result).appendTo(placeToInsertImagePreview);
                    }

                    reader.readAsDataURL(input.files[i]);
                }
            }

        };

        $('#gallery-photo-add').on('change', function() {
            imagesPreview(this, 'div.gallery');
        });
    });
</script>