<?php $this->assign('title', 'ธุรกิจของเรา'); ?>

<style>
    /* .product_card1:hover {
        box-shadow: 1px 1px 1px 1px #888888;

    } */

    .postsImg {
        position: relative;
        width: 100%;
        height: 150px;
        overflow: hidden;
    }

    .posts_type {
        position: absolute;
        top: 10px;
        left: 6px;
    }

    @media screen and (max-width: 650px) {
        .postsImg {
            position: relative;
            width: 100%;
            height: 100px;
            overflow: hidden;
        }

    }


    .header-cover {
        height: 150px;
        overflow: hidden;
        position: relative;
        text-align: center;
    }

    .header-img {
        height: auto;
        object-fit: contain;
    }

    .centered {
        position: absolute;
        top: 50%;
        left: 50%;
        width: 100%;
        transform: translate(-50%, -50%);
    }

    .centered h1 {
        color: #4E7A61;
        font-size: 4rem;
    }
</style>


<div class="header-cover">
    <img class="header-img" src="https://img.freepik.com/premium-photo/ripe-fresh-avocado-green-background-top-view_185193-10955.jpg?w=2000" alt="">
    <div class="centered">
        <h1 class="m-0 p-0">ธุรกิจ</h1>
        <small>แฟนไชส์ สินค้าส่งออก ออกบูธ และ สินค้าหัตถกรรม</small>
    </div>
</div>


<div class="container my-2 my-sm-5">
    <div class="row my-5 p-0  m-0 p-0">
        <div class="col-12 col-sm-4 mb-2 my-auto">
            <div class="card p-2 h-100">
                <div class="w-100">
                    <p><span class="text-success mb-2">
                            <h5 class="text-success">
                                👉 สตรอเบอรี่&อโวคาโดสมูทตี้
                            </h5>
                        </span>
                        &nbsp;&nbsp;&nbsp; จากที่เราเคยเปิดร้านนม เราก็จะมีเมนูเกี่ยวกับนมเยอะมาก 20-30เมนู
                        แต่เชียงใหม่เมืองใหญ่และปราบเซียน เราจะไปแข่งกับร้านนมเจ้าดังก็ยากอยู่
                        การหาจุดเด่นของตัวเอง มองปัจจัยบวกรอบๆตัวเรา
                        แล้วมาสรุปกับตัวเองว่าจะขายอะไรดี ทำโปรดักซ์แบบไหน
                        จึงจะสามารถขายได้ จึงเลือก เมนูมาแค่ 2เมนู คือ สตรอเบอรี่สมูทตี้และอโวคาโดสมูทตี้
                        เน้นการออกตลาดนัด ได้แก่ ถนนคนเดินวันเสาร์-อาทิตย์ ตลาดนัดโลตัสคำเที่ยง
                        ตลาดนัดคณะพายาบาลมช. งานประจำปีต่างๆของเชียงใหม่ ฯ
                        การขายของที่ตลาดนัดไม่ใช่เรื่องง่าย ขายดีอย่างเดียวไม่ได้
                        ต้องมีความอดทนสูงมาก แต่ลูกค้าเริ่มติด เคยขายได้วันละ 500-600แก้ว</p>

                    <a class="btn btn-success rounded" href="<?= $this->Url->build(['controller' => 'aboutus', 'action' => 'ourbranch']) ?>">ดูสาขาใกล้เคียง</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8 mb-2 my-auto">
            <div class=" p-1 h-100">
                <div class="my-auto">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class="swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/product/001.jpg') ?>" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/product/002.jpg') ?>" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/product/003.jpg') ?>" alt="">
                            </div>
                            <div class="swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/product/004.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/product/005.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 p-0  m-0 p-0">
        <div class="col-12 col-sm-8 mb-2 my-auto">
            <div class=" p-1 h-100">
                <div class="my-auto">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class=" swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/fruit/001.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/fruit/002.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/fruit/003.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/fruit/004.jpg') ?>" alt="">
                            </div>
                          
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-4 mb-2">
            <div class="card p-2 h-100">
                <div class="w-100">
                    <p><span class="text-success mb-2">
                            <h5 class="text-success">
                                👉พืช ผัก สินค้าเกษตรอื่นๆ
                            </h5>
                        </span>
                        &nbsp;&nbsp;&nbsp; ก็จาก pain pointเดิม ที่พอปลูกแล้วราคาตกต่ำ ตลาดตาย ต้องทำยังไง
                        พ่อแม่เริ่มมาปรึกษา เริ่มให้เราหาตลาด หา Contact ก็เริ่มรู้จักพ่อค้าแม่ค้ามากขึ้น
                        เริ่มรู้จักร้านอาหาร ร้านสลัด โรงแรมต่างๆ ที่ใช้ พืชผัก ที่เรามี จนทุกวันนี้เราได้ดูแล
                        เป็น supplier ที่จัดส่งพืช ผัก เมืองหนาว ให้ร้านสลัดในกทม.หลายราย</p>
                    <a class="btn btn-success rounded" href="<?= $this->Url->build(['controller' => 'products', 'action' => 'index']) ?>">ติดต่อเพื่อสั่งซื้อ</a>
                </div>
            </div>
        </div>
    </div>
    <div class="row my-5 p-0  m-0 p-0">
        <div class="col-12 col-sm-4 mb-2">
            <div class="card p-2 h-100">
                <div class="w-100">
                    <p><span class="text-success mb-2">
                            <h5 class="text-success">
                                👉แฟรนไชส์ “PENPEN HOUSE”
                            </h5>
                        </span>
                        &nbsp;&nbsp;&nbsp; อโวคาโด&สตรอเบอรี่สมูทตี้ เกิดจากลูกค้าต่างจังหวัดที่เวลามาเที่ยวเชียงใหม่
                        ได้กินเมนูปั่นจากร้านเรา ติดใจ ครั้นจะมาอุดหนุนที่เชียงใหม่ตลอดก็ไม่ได้
                        บางคนรบเร้าให้ขยายสาขาที่ต่างจังหวัด ที่ กทม.เพราะจะได้ไปอุดหนุนได้
                        เริ่มลองระบบแฟรนไชส์ ตั้งแต่ปี 2563 ตอนนี้เรามีแฟรนไชส์ เกือบ 20สาขา</p>
                    <a class="btn btn-success rounded" href="<?= $this->Url->build(['controller' => 'aboutus', 'action' => 'ourbranch']) ?>">สอบถามรายละเอียดเพิ่มเติม</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-sm-8 mb-2">
            <div class=" p-1 h-100">
                <div class="my-auto">
                    <div class="swiper mySwiper">
                        <div class="swiper-wrapper">
                            <div class=" swiper-slide">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/branch/001.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/branch/002.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/branch/003.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/branch/004.jpg') ?>" alt="">
                            </div>
                            <div class=" swiper-slide ">
                                <img style="width:100%;height:250px;object-fit:cover;" src="<?= $this->Url->build('img/about/branch/005.jpg') ?>" alt="">
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<script>
    var swiper = new Swiper(".mySwiper", {
        slidesPerView: 2,
        lazy: true,
        spaceBetween: 50,
        freeMode: true,
        autoplay: {
            delay: 5000,
        },
        pagination: {
            el: ".swiper-pagination",
            clickable: true,
        },
        breakpoints: {
            640: {
                slidesPerView: 2,
                spaceBetween: 20,
            },
            768: {
                slidesPerView: 4,
                spaceBetween: 40,
            },
            1024: {
                slidesPerView: 3,
                spaceBetween: 50,
            },
        },
    });
</script>