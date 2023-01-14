<style>
    .news_detail,
    img {
        width: 100%;
    }
</style>



<?php foreach ($posts as $data) : ?>

    <?php $this->assign('title', $data->title); ?>
    <title><?php echo $this->fetch('title'); ?></title>
    <?= $this->Html->meta('icon', $this->Url->build($data->img)) ?>

    <div class="container">
        <!-- desktop -->
        <div class="row m-0 p-sm-5 mb-3 d-none mx-auto d-sm-block">
            <div class="col-12 col-md-12 col-lg-12 d-flex justify-content-end">
                <?= $this->Html->link(__('Back to'), ['action' => 'index']) ?>
            </div>
            <div class="col-8 mx-auto">
                <div class="pt-2 pb-3">
                    <small class="text-muted"><?= $data->type ?></small>
                    <h1 class="text-success"><?= $data->title ?></h1>
                    <small class="m-0"> <span>โดย</span> <?= $data->user ?></small>
                </div>

                <img class="d-block w-100" src="<?= $this->Url->build($data->image); ?>" alt="<?= $data->title ?>">
                <div class="text-secondary pt-4"><?= $data->detail ?></div>
            </div>
        </div>
        <!-- phone -->
        <div class="row m-0 p-sm-5  mb-3 d-block d-sm-none">
            <div class="col-12 col-md-12 col-lg-12 mt-2 d-flex justify-content-end">
                <?= $this->Html->link(__('Back to'), ['action' => 'index']) ?>
            </div>
            <div class="col-12">
                <div class="pt-2 pb-3">
                    <small class="text-muted"><?= $data->type ?></small>
                    <h4 class="text-success"><?= $data->title ?></h4>
                    <small class="m-0"> <span>โดย</span> <?= $data->user ?></small>
                </div>
                <img class="d-block w-100" src="<?= $this->Url->build($data->image); ?>" alt="<?= $data->p_title ?>">
                <div class="pt-4 news_detail w-100"><?= $data->detail ?></div>
            </div>
        </div>
    </div>

<?php endforeach; ?>