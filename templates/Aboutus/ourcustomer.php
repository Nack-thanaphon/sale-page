<?php $this->assign('title', 'ลูกค้าของเรา'); ?>

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
        <h1 class="m-0 p-0">กิจกรรม</h1>
        <small>รีวิว กิจกรรมภายใน พาเที่ยว</small>
    </div>
</div>
<div class="container">
    <div class="row my-5 p-0 m-0">
        <div class="col-12">
            <h4>กิจกรรมล่าสุด</h4>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-3 h-100  p-1">
            <ul class="list-group d-none d-sm-block" id="product_type">
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item"><a href="http://">#Lorem, ipsum dolor.</a></li>
                <li class="list-group-item  text-muted"><a href="http://"></a>โหลดข้อมูลเพิ่ม</li>
            </ul>
        </div>
        <div class="col-sm-12 col-md-12 col-lg-9 h-100 p-0 m-0">
            <div class="row m-0 p-0 ">
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
                <div class="col-6 col-md-4 col-lg-4 col-sm-4 p-1">
                    <img class="w-100" src="https://images.unsplash.com/photo-1666888735446-cb7d8029ddfe?ixlib=rb-4.0.3&ixid=MnwxMjA3fDB8MHxwaG90by1wYWdlfHx8fGVufDB8fHx8&auto=format&fit=crop&w=1170&q=80" alt="">
                </div>
            </div>
        </div>
    </div>
</div>