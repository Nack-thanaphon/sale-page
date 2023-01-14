<style>
  .social {
    color: rgb(71, 120, 42) !important;
  }
</style>
<div class="row mt-3 text-white m-0 my-success py-5 m-0 text-md-left ">
  <div class="col-12 p-0 m-0">
    <div class="container">
      <div class="row m-0 p-0">
        <div class="col-12 col-sm-8 mb-2">
          <h3 class="text-uppercase font-weight-bold"><?= $contactData->name ?></h3>
          <hr class="my-secondary accent-2 mb-4 mt-0 d-inline-block mx-auto" style="width: 60px;">
          <p><?= $contactData->about ?></p>
        </div>
        <div class="col-12 col-sm-4 mb-2">
          <small>กำลังใช้งาน</small>
          <div id="LTF_hitcounter"></div>
        </div>
      </div>
    </div>
  </div>
</div>


<script type="text/javascript" src="//cdn.livetrafficfeed.com/static/hitcounterjs/live.js?sty=82&min=5&sta=1&uni=1&tz=Asia%2FBangkok&ro=0"></script>