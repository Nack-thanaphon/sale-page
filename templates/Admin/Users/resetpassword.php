<body class="text-center">
    <main class="form-signin">
        <!-- <img class="mb-4" src="/docs/5.0/assets/brand/bootstrap-logo.svg" alt="" width="72" height="57"> -->
        <h1 class="h3 mb-3 fw-normal">เปลี่ยนรหัสผ่าน</h1>

        <?= $this->flash->render() ?>

        <?= $this->Form->create() ?>
        <div class="form-floating mb-2">
            <?= $this->Form->input('password', ['class' => 'form-control', 'id' => 'floatingpassword', 'type' => "password"]) ?>
            <label for="floatingpassword">Your Password</label>
        </div>
        <div class="form-floating mb-2">
            <input type="password" class="form-control" id="floatingpassword2">
            <label for="floatingpassword2">Your Password (อีกครั้ง)</label>
        </div>

        <?= $this->Form->button('เปลี่ยนรหัสผ่าน', ['class' => 'btn btn-secondary ', 'id' => 'resetpassword']) ?>

        <!-- <button class="w-100 btn btn-lg btn-primary" type=#resetpassword">Sign in</button> -->
      
        <?= $this->Form->end() ?>

    </main>

</body>


<!-- <script>
    function checkpass() {
        let pass = $('#floatingpassword').val()
        let pass2 = $('#floatingpassword2').val()

        if (pass != pass2) {
            alert(1)
        } else {
            alert(2)
        }
    }

    checkpass()
</script> -->