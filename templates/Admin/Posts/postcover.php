<div class="container">
    <h3>เลือกภาพหน้าปก</h3>
    <div class="row m-0 p-0">
        <?php foreach ($coverimage as $image) : ?>
            <div class="col-4 m-2">
                <img src="<?= $this->Url->build($image->image) ?>" class="w-100" alt="">
                <div class="btn btn-primary my-1 w-100" onclick="selected(<?= $image->id ?>)">เลือกเป็นภาพหน้าปก</div>
            </div>
        <?php endforeach; ?>
    </div>
</div>


<script>
    function selected(id) {

        $.ajax({
            url: "<?= $this->Url->build(['controller' => 'posts', 'action' => 'postcover']) ?>",
            type: "post",
            data: {
                pid: id,
            },
            dataType: 'json',
            headers: {
                'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
            },
            success: function() {
                alert('เรียบร้อย');
            }
        })
    }
</script>