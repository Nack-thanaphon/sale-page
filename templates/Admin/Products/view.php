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
        <div class="card m-2 p-2">
            <div class="form-group">
                <h3 class="font-weight-bold"><?= __('อัพเดตสินค้า') ?></h3>
                <div class="form-floating mb-1">
                    <label>โปรโมชั่น</label>
                    <p><?= (!empty($Products->promotions) ? $Products->promotions : "ไม่พบข้อมูล") ?></p>
                    <input type="hidden" id="pId" value="<?= $Products->id ?>">

                </div>
                <div class="form-floating mb-1">
                    <label>ชื่อสินค้า</label>
                    <h4> <?= (!empty($Products->title) ? $Products->title : "ไม่พบข้อมูล") ?></h4>
                </div>
                <div class="form-floating mb-1">
                    <label>ชนิดสินค้า</label>
                    <p> <?= (!empty($Products->type) ? $Products->type : "ไม่พบข้อมูล") ?></p>

                </div>
                <div class="form-floating mb-1">
                    <label>รายละเอียดบทความ</label>
                    <div class="col-12" class="w-100">
                        <?= $Products->detail ?>
                    </div>
                </div>

                <div class="row m-0 p-0 ">
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_total">จำนวนสินค้า</label>
                        <span class="input-group-text"><?= $Products->total ?>/ชิ้น</span>
                    </div>
                    <div class="col-12 col-sm-6 m-0">
                        <label for="p_price">ราคาสินค้า</label>
                        <span class="input-group-text"><?= $Products->price ?>/บาท</span>
                    </div>
                    <div class="col-12 col-sm-12 m-0 mt-2">
                        <label>สถานะสินค้า</label>
                        <div class="m-0 p-0" type="radio" name="p_status" value='1'><?php echo ($Products->status == 1) ? "<p class='text-primary'>กำลังใช้งาน</p>" : "<p class='text-danger'>ปิดการใช้งาน</p>"  ?></div>
                    </div>

                </div>
            </div>
        </div>
    </div>
    <div class="col-12 col-md-12 col-lg-4 m-0">
        <div class="card m-2 p-2">
            <div class="d-flex justify-content-between my-auto m-1">
                <p class="my-2 p-0">รูปภาพปก</p>
                <label class="my-2 p-0" for="imagecover"></label>

                <input type="file" id="imagecover" class="d-none">

            </div>

            <div class="row m-0 p-0">
                <div class="col-12  m-0 p-0" id="getProductsCoverImg">
                </div>
            </div>
        </div>
        <div class="card m-2 p-2">
            <div class="d-flex justify-content-between my-auto m-1">
                <p class="my-2 p-0">รูปภาพประกอบ</p>
                <label class="my-2 p-0" for="images"></label>
                <input type="file" id="images" class="d-none" multiple>

            </div>

            <div class="multiimages row" id="getProductsImg">

            </div>
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
    </script>