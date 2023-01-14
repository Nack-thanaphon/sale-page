<style>
    .p_img {
        width: 100%;
        object-fit: cover;
        height: 290px;
    }


    .post_img {
        object-fit: cover;
        height: 160px;
    }

    .map {
        width: 100%;
        height: 170px;
    }

    iframe {
        width: 100% !important;
        object-fit: contain;
    }

    @media screen and (max-width: 750px) {


        .post_img {
            height: 100%;
            /* overflow: hidden; */
        }


    }
</style>

<?php $this->assign('title', 'หน้าหลัก'); ?>
<div class="container">
    <div class="col-12 m-0 p-0 ">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 p-1" src="<?= $this->Url->build('img/banner.png') ?>">
                </div>
                <!-- <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div> -->
            </div>
        </div>
    </div>
    <div class="col-12 m-0 p-0  mt-3">
        <div id="carouselExampleSlidesOnly" class="carousel slide" data-ride="carousel">
            <div class="carousel-inner">
                <div class="carousel-item active">
                    <img class="d-block w-100 p-1" src="<?= $this->Url->build('img/promotion.png') ?>">
                </div>
                <!-- <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Second slide">
            </div>
            <div class="carousel-item">
                <img class="d-block w-100" src="..." alt="Third slide">
            </div> -->
            </div>
        </div>
    </div>

    <!-- <div class="row my-4  m-0 p-0 d-flex justify-content-between">

        <div class="col-12  py-3 p-2 h-100  text-start  mb-2">
            <h1 class="text-success m-0 p-0" style="font-size:3rem ;">สาขา</h1>
        </div>
        <div class="col-12  m-0">
            <div class="row m-0 p-0">
                <?php foreach ($Branch as $key => $value) : ?>
                    <div class=" m-0 p-0 col-12 col-sm-4  ">
                
                        <div class="card p-2 m-1">
                            <div class="card-body p-1  h-100">
                                <h5 class="m-0 p-0 text-left col-12 text-truncate"><?= $value->b_name ?></h5>
                                <hr>
                                <p class="text-muted mt-1 m-0 ">จังหวัด : <span class="text-success"><?= $value->b_province ?></span></p>
                                <p class="text-muted  m-0 p-0">เบอร์โทร : <?= $value->b_phone ?></p>
                                <a href="<?= $value->b_link ?>" id="mb_link" target="blank">
                                    <p class="m-0 p-0 mt-3"> ไปที่ร้านค้า</p>
                                </a>
                               
                            </div>
                        </div>
                    </div>

                <?php endforeach; ?>
            </div>
            <div class="text-right my-2 ">
                <a class="text-muted" href="<?= $this->Url->build(['prefix' => false, 'controller' => 'aboutus', 'action' => 'ourbranch']) ?>">อ่านทั้งหมด</a>
            </div>
        </div>

    </div> -->

    <div class="row my-4  m-0 p-0 py-sm-5">
        <div class="col-12  py-3 p-2 h-100  text-center  mb-4">
            <h2 class="text-success m-0 p-0" style="font-size:3rem ;">สินค้า</h2>
            <small>เรามีสิน้คาที่หลากหลาย และมีทีมที่สามารถทำได้ทันทีรวดเร็ว ตามกำหนด </small> <br>
            <a href="http://">ดูรายการสินค้าทั้งหมด</a>
        </div>
        <div class="col-12  m-0 p-0 ">
            <div class="row m-0 p-0">
                <?php foreach ($data as $key => $value) : ?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-4">
                        <div class="card">
                            <img class="card-img p_img" src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">
                            <!-- <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link text-danger like">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div> -->
                            <div class="card-body">
                                <h4 class=""><?= $value->title ?></h4>
                                <h6 class="card-subtitle mb-2 text-muted">ชนิด : <?= $value->type ?></h6>
                                <p class="card-text">
                                    <?= $value->detail ?>
                                <div class="buy d-flex justify-content-between align-items-center">
                                    <div class="price text-success">
                                        <h5 class="mt-4"><i class="fa-solid fa-baht-sign"></i><?= $value->price ?></h5>
                                    </div>
                                    <div class="btn-group" role="group" aria-label="Basic example">
                                        <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" type="button" class="btn btn-success  mt-3"> <i class="fab fa-line  text-white"></i></a>
                                        <a href=" <?= $this->Url->build([
                                                        'controller' => 'products',
                                                        'action' => 'view',
                                                        $value->id,
                                                        'slug' => $value->title
                                                    ]) ?>" type="button" class="btn btn-success mt-3">รายละเอียดสินค้า</a>
                                    </div>

                                </div>
                            </div>
                        </div>
                    </div>

                    <!-- <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 "><?= $value->type ?></small>
                            <img class=" w-100 " src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">

                            <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0"><?= $value->title ?></h5>
                                <div class="text-right m-0 ">
                                    <h5 class="text-success mt-1 m-0 p-0 "><?= $value->price ?> บาท/ชิ้น </h5>
                                    <small class="text-muted text-right m-0 p-0">ในคลัง <?= $value->total ?> ชิ้น</small>
                                    <div class="row mt-3 m-0 p-0 d-flex justify-content-between">
                                        <div class="col-2 m-0 p-0">
                                            <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" class="btn btn m-0 p-0 w-100 ">
                                                <h5 class="fab fa-line text-success m-0 p-0"></h5>
                                            </a>
                                        </div>
                                        <div class="col-9 m-0 p-0 my-auto">
                                            <a class="btn btn-white m-0 p-0  w-100 " href="
                                                <?= $this->Url->build([
                                                    'controller' => 'products',
                                                    'action' => 'view',
                                                    $value->id,
                                                    'slug' => $value->title
                                                ]) ?>">
                                                <small class="m-0 p-0"><i class="fas fa-link"></i> รายละเอียดสินค้า</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-sm-8 m-0 p-0 mb-2 ">
            <div class="row m-0 p-0">
                <?php foreach ($data as $key => $value) : ?>
                    <div class="col-12 col-sm-8 col-md-6 col-lg-6">
                        <div class="shadow-sm">
                            <img class="card-img p_img" src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">
                            <!-- <div class="card-img-overlay d-flex justify-content-end">
                                <a href="#" class="card-link text-danger like">
                                    <i class="fas fa-heart"></i>
                                </a>
                            </div> -->
                            <div class="card-body">
                                <h4 class=""><?= $value->title ?></h4>
                            </div>
                        </div>
                    </div>

                    <!-- <small class="text-muted posts_type badge badge-pill badge-success text-white m-0 "><?= $value->type ?></small>
                            <img class=" w-100 " src="<?= $this->Url->build($value->image); ?>" alt="<?= $value->title ?>">

                            <div class="card-body m-0 p-2">
                                <h5 class="col-12 text-truncate my-1 m-0 p-0"><?= $value->title ?></h5>
                                <div class="text-right m-0 ">
                                    <h5 class="text-success mt-1 m-0 p-0 "><?= $value->price ?> บาท/ชิ้น </h5>
                                    <small class="text-muted text-right m-0 p-0">ในคลัง <?= $value->total ?> ชิ้น</small>
                                    <div class="row mt-3 m-0 p-0 d-flex justify-content-between">
                                        <div class="col-2 m-0 p-0">
                                            <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า<?= $value->title ?>" target="blank" class="btn btn m-0 p-0 w-100 ">
                                                <h5 class="fab fa-line text-success m-0 p-0"></h5>
                                            </a>
                                        </div>
                                        <div class="col-9 m-0 p-0 my-auto">
                                            <a class="btn btn-white m-0 p-0  w-100 " href="
                                                <?= $this->Url->build([
                                                    'controller' => 'products',
                                                    'action' => 'view',
                                                    $value->id,
                                                    'slug' => $value->title
                                                ]) ?>">
                                                <small class="m-0 p-0"><i class="fas fa-link"></i> รายละเอียดสินค้า</small>
                                            </a>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div> -->
                <?php endforeach; ?>
            </div>
        </div>
        <div class="col-12 col-sm-4 m-0 p-0 mb-2">
            <div class="shadow-sm m-1 p-2">
                <h3 class="text-success">ต้องการให้ติดต่อกลับ ?</h3>
                <small>ชื่อ</small> <br>
                <small class="alert-text text-danger d-none" id="userData2"></small>
                <input type="text" id="userData" class="form-control mb-2" placeholder="ชื่อ">
                <small>เบอร์โทร</small> <br>
                <small class="alert-text text-danger  d-none" id="phoneData2"></small>
                <input type="text" id="phoneData" class="form-control mb-2" placeholder="เบอร์โทร">
                <small class="alert-text text-danger  d-none" id="ClikforEmail2"></small>
                <textarea class="form-control mb-2" id="detailData" rows="5" placeholder="กรอกข้อความติดต่อ">ต้องการสั่งซื้อสินค้า</textarea>
                <button type="button" id="ClikforEmail" class="btn btn-success" onclick="sendEmail()">ส่งข้อความ</button>
            </div>
        </div>
    </div>
</div>




<script>
    var count = 0;

    $(document).ready(function() {
        readClickNum()
    })

    $('#ClikforEmail').click(function() {
        count++
        if (count == 3) {
            setWithExpiry("ClickCount", count, 800000)
        }
        readClickNum()
    })


    function millisToMinutesAndSeconds(millis) {
        var minutes = Math.floor(millis / 60000);
        var seconds = ((millis % 60000) / 1000).toFixed(0);
        return minutes + ":" + (seconds < 10 ? '0' : '') + seconds;
    }

    function readClickNum() {
        let clickValue = localStorage.getItem('ClickCount');

        if (!clickValue) {
            return null
        }

        const item = JSON.parse(clickValue)
        const now = new Date()

        console.log('>>>local', millisToMinutesAndSeconds(item.expiry))
        console.log('>>>date', millisToMinutesAndSeconds(now.getTime()))
        if (now.getTime() > item.expiry) {
            localStorage.removeItem('ClickCount')
            $('#ClikforEmail').attr('disabled', false)
        } else {
            if (item.value == 3) {
                $('#ClikforEmail').attr('disabled', true)
                toastr.error("คุณกดส่งข้อความเกิน 3 ครั้ง");
            } else {
                $('#ClikforEmail').attr('disabled', false)
            }
        }

    }

    function setWithExpiry(key, value, ttl) {
        const now = new Date()
        const item = {
            value: value,
            expiry: now.getTime() + ttl,
        }
        localStorage.setItem(key, JSON.stringify(item))
    }

    function checkemty(data, text) {

        if (data == '') {
            $('#' + text).text('กรุณาใส่ข้อมูลให้ครบถ้วน')
            $('#' + text).removeClass('d-none')
            return false
        } else {
            $('#' + text).addClass('d-none')
            return true
        }
    }

    function sendEmail() {
        let userData = $('#userData').val()
        let phoneData = $('#phoneData').val()
        let detailData = $('#detailData').val()

        let userDataCheck = checkemty(userData, 'userData2')
        let phoneDataCheck = checkemty(phoneData, 'phoneData2')
        let detailDataCheck = checkemty(detailData, 'ClikforEmail2')

        // console.log(userDataCheck)
        // console.log(phoneDataCheck)
        // console.log(detailDataCheck)

        if (userData != false && phoneData != false && detailData != false) {
            $.ajax({
                url: 'home/sendMail',
                method: 'POST',
                dataType: 'json',
                data: {
                    user: userData,
                    phone: phoneData,
                    detail: detailData,
                },
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(resp) {}
            })
            toastr.success("ส่งข้อความถึงทีมงานเรียบร้อย");
        } else {
            toastr.error("กรุณากรอกข้อมูล");
        }
    }
</script>