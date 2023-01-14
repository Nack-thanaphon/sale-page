<?php $this->assign('title', 'แก้ไขสินค้า'); ?>

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



    .image-area {
        width: 100%;
    }

    .image-area img {
        position: relative;
        max-width: 100%;
        height: auto;
    }

    .remove-image {
        position: absolute;
        top: 0px;
        right: 0px;
        padding-right: 5px;
        text-decoration: none;
        -webkit-transition: background 0.5s;
        transition: background 0.5s;
    }
</style>

<div class="row my-3">
    <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-end">
        <?= $this->Html->link(__('Back to'), ['action' => 'index']) ?>
    </div>
    <div class="col-12 col-md-12 col-lg-8">
        <div class="card m-2 p-3">
            <div class="d-flex justify-content-between py-2 my-auto">
                <h3 class="font-weight-bold"><?= __('อัพเดตสินค้า') ?></h3>
                <h6 class="fas fa-trash-alt my-auto" type="button" onclick="deleteProducts(<?= $Products->p_id ?>)"></h6>
            </div>
            <?= $this->Form->create($Products, ["enctype" => "multipart/form-data"])  ?>
            <input type="hidden" id="pId" value="<?= $Products->p_id ?>">
            <div class="form-group">
                <div class="form-floating mb-1">
                    <label>โปรโมชั่น</label>
                    <select name="p_promotion" class="form-control selectpicker">
                        <?php foreach ($promotion as $row) : ?>
                            <option value="<?= $row->pr_id ?>" <?= ($Products->p_promotion == $row->pr_id) ? "selected" : "" ?>><?= $row->pr_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <label>ชื่อสินค้า</label>
                    <?= $this->Form->input('p_title', ['class' => 'form-control ', 'placeholder' => 'ชื่อสินค้า']); ?>
                </div>
                <div class="form-floating mb-1">
                    <label>ชนิดสินค้า</label>
                    <select name="p_type_id" class="form-control selectpicker">
                        <?php foreach ($ProductsType as $row) : ?>
                            <option value="<?= $row->p_id ?>" <?= ($Products->p_type_id == $row->p_id) ? "selected" : "" ?>><?= $row->pt_name ?></option>
                        <?php endforeach; ?>
                    </select>
                </div>
                <div class="form-floating mb-1">
                    <label>รายละเอียดบทความ</label>
                    <textarea name="p_detail" id="editor1" rows="10" cols="80" required><?= $Products->p_detail ?></textarea>
                </div>

                <div class="row m-0 p-0 ">
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_total">จำนวนสินค้า</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="p_total" value="<?= $Products->p_total ?>" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">/ชิ้น</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_price">ราคาสินค้า</label>
                        <div class="input-group mb-3">
                            <input type="text" class="form-control" name="p_price" value="<?= $Products->p_price ?>" aria-label="Amount (to the nearest dollar)">
                            <div class="input-group-append">
                                <span class="input-group-text">/บาท</span>
                            </div>
                        </div>
                    </div>
                    <div class="col-12 col-sm-12 m-0 mt-2">
                        <div class="form-floating mb-1">
                            <label>สถานะสินค้า</label>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value='1' <?php echo ($Products->status == 1) ? "checked" : ""  ?>>
                                <label class="form-check-label" for="flexRadioDefault1">
                                    เผยแพร่
                                </label>
                            </div>
                            <div class="form-check">
                                <input class="form-check-input" type="radio" name="status" value='0' <?php echo ($Products->status == 0) ? "checked" : ""  ?>>
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
    <div class="col-12 col-md-12 col-lg-4 m-0">
        <div class="card m-2 p-2">
            <div class="d-flex justify-content-between my-auto m-1">
                <p class="my-2 p-0">รูปภาพปก<br>
                    <span>
                        <small class="text-muted cover-warning">**กรุณาอัพโหลดภาพหน้าปก</small>
                    </span>
                </p>
                <label class="my-2 p-0" for="imagecover"><i class="fas fa-arrow-circle-up"></i></label>

                <input type="file" id="imagecover" class="d-none">

            </div>

            <div class="row m-0 p-0">
                <div class="col-12  m-0 p-0" id="getProductsCoverImg">
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
                <input type="file" id="images" class="d-none" multiple>

            </div>

            <div class="multiimages row" id="getProductsImg">

            </div>
        </div>
        <?= $this->Form->button(__('บันทึกข้อมูล'), ['class' => 'btn btn-primary w-100 m-1']) ?>
        <?= $this->Form->end() ?>
    </div>

</div>


<script>
    CKEDITOR.replace('editor1');
    var ProductId = $('#pId').val();
    var CoverId = 0
    GetProductsImg()

    function GetProductsImg() {
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Products', 'action' => 'getProductsImg']) ?>",
            type: "post",
            data: {
                id: ProductId
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
                let CoverImageData = resp.cover
                let ImageData = resp.img
                let CoverImg = ''
                let Img = ''

                for (i = 0; i < CoverImageData.length; i++) {
                    CoverId = CoverImageData[i].id
                    CoverImg += `<img id="singleimages" src="<?php echo $this->Url->build('${CoverImageData[i].name}', ['fullBase' => true]); ?>" class="w-100">`
                }
                for (i = 0; i < ImageData.length; i++) {
                    Img += ` <div class="image-area col-3 m-0 p-0">
                    <img src="<?php echo $this->Url->build('${ImageData[i].name}', ['fullBase' => true]); ?>" class="p-1">
                    <a type="button" class="remove-image" onclick="delete_img(${ImageData[i].id})" style="display: inline;">&#215;</a>
                    </div>`
                }

                $("#getProductsCoverImg").html(CoverImg)
                $("#getProductsImg").html(Img)
            }
        })
    }

    $('#imagecover').on('change', function() {
        var formData = new FormData();
        let id = CoverId
        let product_id = ProductId

        formData.append("id", id)
        formData.append("product_id", product_id)
        formData.append('files', $('input[type=file]')[0].files[0]);

        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Image', 'action' => 'productsCoverAdd']) ?>",
            type: 'post',
            data: formData,
            id,
            product_id,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
                GetProductsImg()
            }
        })
    })

    $('#images').on('change', function() {
        var formData = new FormData();
        let product_id = ProductId
        formData.append("product_id", product_id)
        var totalfiles = document.getElementById('images').files.length;
        for (var index = 0; index < totalfiles; index++) {
            formData.append("files[]", document.getElementById('images').files[index]);
        }

        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Image', 'action' => 'productsImageAdd']) ?>",
            type: 'post',
            data: formData,
            product_id,
            contentType: false,
            cache: false,
            processData: false,
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(response) {
                Swal.fire({
                    text: 'อัพเดตข้อมูลเรียบร้อย',
                    icon: 'success',
                    confirmButtonText: 'ตกลง',
                })
                GetProductsImg()
            }
        })
    })

    function deleteProducts(id) {
        Swal.fire({
            title: 'คุณแน่ใจใช่ไหม?',
            text: "คุณต้องการลบข้อมูล " + id + " ใช่ไหม !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบเลย!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= $this->Url->build(['controller' => 'products', 'action' => 'delete']) ?>",
                    type: "post",
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                    },
                })
                Swal.fire(
                    'ลบเรียบร้อย!',
                    'ดำเนินการเรียบร้อย.',
                    'success'
                )
                window.location = ('<?= $this->Url->build(['action' => 'index']) ?>')
            }
        })
    }

    function delete_img(id) {
        Swal.fire({
            title: 'คุณแน่ใจใช่ไหม?',
            text: "คุณต้องการลบข้อมูล " + id + " ใช่ไหม !",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'ใช่, ลบเลย!',
            cancelButtonText: 'ยกเลิก'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: "<?= $this->Url->build(['controller' => 'image', 'action' => 'delete']) ?>",
                    type: "post",
                    dataType: 'json',
                    data: {
                        id: id
                    },
                    headers: {
                        'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                    },
                })
                Swal.fire(
                    'ลบเรียบร้อย!',
                    'ดำเนินการเรียบร้อย.',
                    'success'
                )
                GetProductsImg()
            }
        })
    }
</script>