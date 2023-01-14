<?php $this->assign('title','สินค้า'); ?>


<div class="container-fluid">
    <div class="row m-2 my-2 h-100 ">
        <div class="col-sm-12  col-12">
            <div class="py-2">
                <small class="text-muted">Products Management Systems </small>
                <h3 class="m-0 p-0">ระบบจัดการคลังสินค้า</h3>
            </div>
            <div class="row  my-3">
                <div class="col-12 col-sm-4 m-0 p-0">
                    <div class="m-1 p-3 card bg-success">
                        <h5 class="m-0 p-0 ">สินค้าทั้งหมด</h5>
                        <h6 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countProduct(); ?>
                            <span><small>/ รายการ</small></span>
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-3 card bg-primary">
                        <h5 class="m-0 p-0 ">ประเภทสินค้าทั้งหมด</h5>
                        <h6 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countProductType(); ?>
                            <span><small>/ ประเภท</small></span>
                        </h6>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-3 card shadow-sm ">
                        <h5 class="m-0 p-0 ">โปรโมชั่นทั้งหมด</h5>
                        <h6 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countPromotion(); ?>
                            <span><small>/ ครั้ง</small></span>
                        </h6>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-12  col-12 order_table">
            <div class="card  p-2">
                <div class="col-12  d-sm-flex justify-content-end mb-2 m-0 p-0">
                    <div class="">
                        <a href="<?= $this->Url->build(['controller' => 'Products', 'action' => 'add']) ?>" class="btn btn-primary m-1">เพิ่มสินค้า</a>
                    </div>
                </div>
                <table id="example" class="display responsive nowrap" style="width:100%">

                    <thead>
                        <tr>
                            <th>รูปภาพปก</th>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($products as $key => $product) : ?>
                            <tr class="shadow-sm">
                                <td class="w-40" style="width: 150px; overflow: hidden;height:150px ;">

                                    <a data-fslightbox href="<?php echo $this->Url->build($product->image, ['fullBase' => true]); ?>">
                                        <img class="w-100" style="object-fit:contain;" src="<?php echo $this->Url->build($product->image, ['fullBase' => true]); ?>">
                                    </a>

                                </td>
                                <td class="w-50">
                                    <h5 class="m-0 p-0 "><?= $product->title ?></a></p>
                                        <small class="m-0 p-0 text-muted"><?= $product->date ?></small><br>
                                        <small class="m-0 p-0 text-muted"> <?= $product->user ?></small>
                                </td>
                                <td class="w-10">
                                    <?= ($product->status == 1 ? '<small class="badge badge-primary">เผยแพร่</small>' : '<small class="badge badge-danger">ไม่เผยแพร่</small>') ?>
                                </td>
                                <td class="actions w-30">
                                    <a href="<?= $this->Url->build(['controller' => 'products', 'action' => 'edit', $product->id]) ?>" type="button" class=" p-1 text-muted"><i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a href="<?= $this->Url->build(['controller' => 'products', 'action' => 'view', $product->id]) ?>" class="p-1 text-primary"><i class="fas fa-circle-info"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach ?>
                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            responsive: true,
            order: [
                [0, 'desc']
            ],
        });

    });
</script>