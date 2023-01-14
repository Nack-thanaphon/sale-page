<?php $this->assign('title', 'login'); ?>
<title><?php echo $this->fetch('title'); ?></title>

<div class="login-box my-5 mx-auto">
  <?= $this->Flash->render() ?>
  <div class="card  my-3 card-outline card-primary">
  <div class="card-header text-start my-2 text-sm-center">
            <h2 class="m-0 p-0">เข้าสู่ระบบ</h2>
            <small>PENPEN HOUSE</small>
        </div>
    <div class="card-body">
      <?= $this->Form->create() ?>
      <div class="input-group mb-3">
        <?= $this->Form->input('email', ['class' => 'form-control', 'placeholder' => 'อีเมลล์']) ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-envelope"></span>
          </div>
        </div>
      </div>
      <div class="input-group mb-3">
        <?= $this->Form->password('password', ['class' => 'form-control', 'placeholder' => 'รหัสผ่าน']) ?>
        <div class="input-group-append">
          <div class="input-group-text">
            <span class="fas fa-lock"></span>
          </div>
        </div>
      </div>
      <div class="row m-0 p-0">
        <div class="col-12 m-0 p-0">
          <div class="icheck-primary">
            <input type="checkbox" id="remember">
            <label for="remember">
              Remember Me
            </label>
          </div>
        </div>
        <div class="col-12 mt-4 p-0">
          <?= $this->Form->button('เข้าสู่ระบบ', ['class' => "btn btn-primary btn-block"]); ?>
        </div>
      </div>
      <!-- <div class="social-auth-links text-center mt-2 mb-3">
        <a href="#" class="btn btn-block btn-danger" id="googlelogin">
          <i class="fab fa-google-plus mr-2"></i> Sign in using Google+
        </a>
      </div> -->

      <p class="my-2 text-center">
        <?= $this->Html->link('สมัครสมาชิก', ['action' => 'register'], ['class' => 'text-center text-dark']) ?>
        <?= $this->Html->link('ลืมรหัสผ่าน?', ['action' => 'forgetpassword']) ?>
      </p>
      <?= $this->Form->end() ?>
    </div>

  </div>
</div>






<script src="https://www.gstatic.com/firebasejs/4.5.0/firebase.js"></script>

<script>
  const Config = {
    apiKey: "AIzaSyBqTO2sznTFt81a0ZGo8BeIPROjXHFfxLY",
    authDomain: "realtime-chat-12332.firebaseapp.com",
    projectId: "realtime-chat-12332",
    storageBucket: "realtime-chat-12332.appspot.com",
    messagingSenderId: "424933598885",
    appId: "1:424933598885:web:4a6b8c9d67da6403950f4c",
    measurementId: "G-0NYGLHJCJZ"
  };

  firebase.initializeApp(Config);


  $('#googlelogin').click(function() {
    const GoogleAuthProvider = new firebase.auth.GoogleAuthProvider();
    firebase.auth().signInWithPopup(GoogleAuthProvider)
    firebase.auth().onAuthStateChanged(function(user) {
      console.log(user)
    });
  })


  $("#googlelogout").click(function() {
    //คำสั่ง ออกจการะบบ ของ firebase
    firebase.auth().signOut().then(function() {});

  });
</script>