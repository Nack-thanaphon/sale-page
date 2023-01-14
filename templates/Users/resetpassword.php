<?php $this->assign('title', 'reset-password'); ?>
<title><?php echo $this->fetch('title'); ?></title>

<div class="login-box my-5 mx-auto">
    <div class="card  my-3 card-outline card-primary">
        <div class="card-header text-start my-2 text-sm-center">
            <h2 class="m-0 p-0">เปลี่ยนรหัสผ่าน</h2>
            <small>PENPEN HOUSE</small>
        </div>
        <div class="card-body">
            <div class="input-group mb-3">
                <input type="password" name="password" placeholder="กรอกรหัสผ่าน" class="form-control" id="password" placeholder='รหัสผ่าน'>
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-envelope p-0"></span>
                    </div>
                </div>
            </div>
            <div class="input-group mb-3">
                <input type="password" placeholder="กรอกรหัสผ่านอีกครั้ง" class="form-control" id="repassword">
                <div class="input-group-append">
                    <div class="input-group-text">
                        <span class="fas fa-lock"></span>
                    </div>
                </div>
            </div>
            <div class="row m-0 p-0">
                <div class="col-12 mt-4 p-0">
                    <button class="btn btn-primary w-100" onclick="checkpass()">ยืนยันเปลี่ยนรหัสผ่าน</button>
                </div>
            </div>
            <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-danger" id="googlelogin">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->

        </div>

    </div>
</div>






<script>
    function checkpass() {
        var getUrl = window.location.pathname.split("/");
        var token = getUrl[getUrl.length - 1];
        let pass = $('#password').val()
        let pass2 = $('#repassword').val()

        if (pass == '') {
            alert('กรุณากรอกรหัสผ่าน')
            return false
        }
        if (pass != pass2) {
            alert('รหัสผ่านไม่ตรงกัน')
            return false
        } else {
            $.ajax({
                url: "<?= $this->Url->build(['controller' => 'users', 'action' => 'resetpassword']) ?>",
                type: 'post',
                data: {
                    token: token,
                    password: pass
                },
                dataType: 'json',
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(response) {
                    if (response == 200) {
                        Swal.fire({
                            text: 'อัพเดตข้อมูลเรียบร้อย',
                            icon: 'success',
                            confirmButtonText: 'เข้าสู่ระบบ',
                        }).then((result) => {
                            window.location.href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>"
                        })
                    }
                }
            })
        }
    }
</script>