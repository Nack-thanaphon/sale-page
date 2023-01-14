<?php $this->assign('title', 'สาขาของเรา'); ?>

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

    iframe {
        width: 100%;
    }
</style>


<div class="header-cover">
    <img class="header-img" src="https://img.freepik.com/premium-photo/ripe-fresh-avocado-green-background-top-view_185193-10955.jpg?w=2000" alt="">
    <div class="centered">
        <h1 class="m-0 p-0">สาขา</h1>
        <small>สาขาที่จัดจำหน่ายสินค้า และ แฟรนไชส์</small>
    </div>
</div>
<div class="container">
    <div class="row my-3 m-0 p-0">
        <div class="col-sm-3 col-12 mb-2">
            <h5>ค้นหาสาขา</h5>
        </div>
        <div class="col-9 mb-2">
            <nav aria-label="text-end">
                <ol class="breadcrumb bg-transparent  p-0 m-0">
                    <li class="breadcrumb-item"><a href="/">หน้าหลัก</a></li>
                    <li class="breadcrumb-item active" aria-current="page">สาขาทั้งหมด</li>
                    <!-- <li class="breadcrumb-item active" aria-current="page">Data</li> -->
                </ol>
            </nav>
        </div>
        <div class="col-12 col-md-12 col-lg-3 mb-2 h-100">
            <select onchange="fillterFunc()" id="filterData" class="form-control">
                <!-- <option value="" selected>เลือกสาขา</option> -->
            </select>
        </div>

        <div class="col-12 col-md-12 col-lg-9 mx-auto  h-100" id="BranchData">
            <div class="card  shadow-sm border p-3">
                <div class="mb-2">
                    <small class="text-uppercase">PENPEN HOUSE: Farm By Mom </small>
                    <h4>สาขา <span class="text-success" id="mb_name"></span> </h4>
                    <h6>จังหวัด <span class="text-success" id="mb_province"></span> </h6>
                    <h6>เบอร์โทร <span class="text-success" id="mb_phone"></span></h6>
                    <a href="#" id="mb_link" class="d-flex justify-content-end mb-3" target="blank">ไปที่ร้านค้า</a>
                    <div class="w-100" id="mb_map"></div>
                </div>
            </div>
        </div>
    </div>

</div>


<script>
    var branchData = []
    let html = ''
    let link = []
    sidebar()

    function filterData(name, i, phone, link, province) {
        $("#mb_name").text(name ? name : "ไมมีข้อมูล")
        $("#mb_phone").text(phone ? phone : "ไมมีข้อมูล")
        $("#mb_province").text(province ? province : "ไมมีข้อมูล")
        $("#mb_link").attr('href', link)
        $("#mb_map").html(branchglobal[i].map)
    }
    var branchglobal = '';


    function fillterFunc() {
        let x = $('#filterData').val();
        // console.log(branchData[x]['name'],x,branchData[x]['phone'],branchData[x]['link'],branchData[x]['province'])
        filterData(branchData[x]['name'], x, branchData[x]['phone'], branchData[x]['link'], branchData[x]['province'])
    }

    function sidebar() {
        $.ajax({
            url: "<?= $this->Url->build('/api/branch', ['fullBase' => true]); ?>",
            type: "post",
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
                let branchData2 = ''
                let Branch = resp
                branchglobal = Branch;
                var j = 0;
                for (i = 0; i < Branch.length; i++) {
                    // html += `<option value="${Branch[i]['province']}">${Branch[i]['province']}</option>`
                    branchData2 +=
                        `<option value="${i}">${Branch[i]['name']}</option>`
                    branchData.push(Branch[i])
                    filterData(Branch[i]['name'], i, Branch[i]['phone'], Branch[i]['link'], Branch[i]['province'])
                }
                $('#filterData').html(branchData2)
            }
        })
    }
</script>