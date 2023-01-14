<?php $this->assign('title', 'สาขา'); ?>

<style>
    iframe {
        width: 100%;
    }
</style>
<div class="container-fluid">
    <div class="row my-3">

        <div class="col-12 col-md-12 col-lg-8 mx-auto  h-100" id="BranchData">
            <div class="card  shadow-sm border p-3">
                <div class="mb-2">
                    <h5>PENPEN HOUSE:Farm By Mom </h5>
                    <h4>สาขา <span id="mb_name"></span> </h4>
                    <small>เบอร์โทร <span id="mb_phone"></span></small> <br>
                    <label for="mb_map">ตำแหน่งร้าน </label><br>
                    <div class="w-100" id="mb_map"></div>
                    <a href="#" id="mb_link" target="blank">ไปที่ร้านค้า</a>
                </div>
            </div>
        </div>
        <div class="col-12 col-md-12 col-lg-4 mb-2 h-100">
            <div class="card  shadow-sm border p-2">
                <form id="BranchAdd">
                    <div class="modal-header">
                        <h3 class="modal-title " id="updateTxt">เพิ่มข้อมูลสาขา</h3>
                        <button type="button" class="close d-none" onclick="cancle()">
                            <span aria-hidden="true">&times;</span>
                        </button>
                    </div>
                    <div class="input-group mb-3">
                        <select class="custom-select" name="b_province" id="province">
                            <option value="เชียงใหม่">เชียงใหม่</option>
                            <option value="กรุงเทพมหานคร">กรุงเทพมหานคร</option>
                            <option value="อยุธยา">อยุธยา</option>
                            <option value="นครปฐม">นครปฐม</option>
                            <option value="น่าน">น่าน</option>
                            <option value="ลำปาง">ลำปาง</option>
                        </select>
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="b_name" id="name" class="form-control" placeholder="สาขา">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="b_phone" id="phone" class="form-control" placeholder="เบอร์โทรติดต่อ">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="b_link" id="link" class="form-control" placeholder="ลิงค์สาขา">
                    </div>
                    <div class="input-group mb-3">
                        <input type="text" name="b_map" id="map" class="form-control" placeholder="แผนที่">
                        <!-- <p class="text-muted">เช่น link : www.dev-nack.com</p> -->
                    </div>
                </form>
                <div class="btn-group" role="group" id="add">
                    <button id="addData" class="btn btn-success w-100 ">บันทึก</button>
                </div>
                <div class="btn-group" role="group" id="update">
                </div>
            </div>
            <ul class="list-group d-sm-block" id="branch_list">
            </ul>
            <!-- <div class="list-group-item">ดูข้อมูลทั้งหมด</div> -->
        </div>

    </div>

</div>


<script>
    var branchData = []
    let html = ''
    let link = []
    sidebar()

    function filterData(name, i, phone, link) {
        $("#mb_name").text(name ? name : "ไมมีข้อมูล")
        $("#mb_phone").text(phone ? phone : "ไมมีข้อมูล")
        // $("#mb_email").text(email ? email : "ไมมีข้อมูล")
        $("#mb_link").attr('href', link)
        $("#mb_map").html(branchglobal[i].map)
    }

    var branchglobal = '';

    function sidebar() {
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Branch', 'action' => 'index']) ?>",
            type: "post",
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
                let branchData2 = ''
                let Branch = resp.Branch1
                branchglobal = Branch;
                var j = 0;
                for (i = 0; i < Branch.length; i++) {
                    // html += `<option value="${Branch[i]['province']}">${Branch[i]['province']}</option>`
                    branchData2 +=
                        `<li class="list-group-item d-flex justify-content-between">
                    <a href="${Branch[i]['link']}" target="blank">
                        #${Branch[i]['name']}
                    </a>
                    <div>
                        <i id="view${i}" class="far fa-eye" type="button" onclick="filterData('${Branch[i]['name']}','${i}','${Branch[i]['phone']}','${Branch[i]['link']}')"></i>
                        <i class="far fa-edit" type="button" onclick="editbranch(${Branch[i]['id']})"></i>
                    </div>
                </li>`
                    branchData.push(Branch[i])

                }
                $('#branch_list').html(branchData2).promise().done(() => {
                    //autoclick id function
                    $('#view' + j).trigger('click')
                })
            }
        })
    }

    function cancle() {
        window.location.reload()
    }

    $('#addData').click(function() {
        let data1 = $("#BranchAdd").serialize()
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Branch', 'action' => 'add']) ?>",
            type: "post",
            data: data1,
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
            }
        })
        sidebar()
    })

    function editbranch(id) {
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'Branch', 'action' => 'edit']) ?>",
            type: "post",
            data: {
                id: id
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
                let data = resp.Branch
                let html = ''
                html += `<button onclick="updatebranch(${data.id})"  class="btn btn w-100 ">อัพเดตข้อมูล</button>
             <button onclick="deletebranch(${data.id})" type="button" class="btn btn-danger w-100">ลบ</button>`
                $('#updateTxt').text('อัพเดตข้อมูล')
                $('#name').val(data.b_name)
                $('#link').val(data.b_link)
                $('#phone').val(data.b_phone)
                $('#map').val(data.b_map)
                $('#add').hide()
                $('#update').show()
                $('.close').addClass('d-block')
                $('#update').html(html)
            }
        })
    }

    function updatebranch(id) {
        let name = $('#name').val()
        let link = $('#link').val()
        let phone = $('#phone').val()
        let map = $('#map').val()
        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'branch', 'action' => 'update']) ?>",
            type: "post",
            data: {
                id: id,
                b_name: name,
                b_link: link,
                b_phone: phone,
                b_map: map,
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function(resp) {
                $('#update').hide()
                $('#add').show()
                $('#name').val('')
                $('#link').val('')
                $('#phone').val('')
                $('#map').val('')
                sidebar()
                toastr.success('อัพเดตเรียบร้อย')
            }
        })
    }

    function deletebranch(id) {
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
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'Branch', 'action' => 'delete']) ?>",
                type: "post",
                data: {
                    id: id
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(resp) {
                    $('#add').show()
                    $('#update').hide()
                    $('#name').val('')
                    $('#link').val('')
                    $('#phone').val('')
                    $('#map').val('')

                    if (result.isConfirmed) {
                        Swal.fire(
                            'ลบเรียบร้อย!',
                            'ดำเนินการเรียบร้อย.',
                            'success'
                        )
                    }
                }
            })
            sidebar()
        })
    }
</script>