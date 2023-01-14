<?php $this->assign('title', 'ออเดอร์'); ?>

<div class="container-fluid">
    <div class="row m-2 my-2 h-100 ">
        <div class="col-sm-12  col-12">
            <div class="py-2">
                <small class="text-muted">Orders Management Systems </small>
                <h3 class="m-0 p-0">ระบบจัดการออเดอร์</h3>
            </div>
        </div>
        <div class="col-sm-4  col-12 news_orders">
            <?php if (!empty($ordersToday)) {
                foreach ($ordersToday as $key => $value) : ?>
                    <div class="card  p-3 mb-2 m-1">
                        <div class="row m-0 p-0 ">
                            <div class="col-sm-12 col-12 p-0">
                                <div>
                                    <h5 class="m-0 p-0">#<?= $value->orders_code ?></h5>
                                    <small class="text-muted">วันที่ : <?= $value->created_at ?></small>
                                </div>
                            </div>
                            <hr>
                            <div class="col-sm-12 col-12 p-0">
                                <p class="m-0 p-0">ลูกค้า : <?= (!empty(($value->user['name']))) ? $value->user['name'] : "รอข้อมูลผู้ใช้งาน" ?> </p>
                                <p class="text-muted m-0 mt-1 p-0">สถานะ :
                                    <?php
                                    $orderStatus = $value->status;
                                    if ($orderStatus == 0) {
                                        echo '<span class="text-danger">ยกเลิก</span>';
                                    }
                                    if ($orderStatus == 1) {
                                        echo '<span class="text-muted">รอการชำระเงิน</span>';
                                    }
                                    if ($orderStatus == 2) {
                                        echo '<span class="text-primary">รอการตรวจสอบ</span>';
                                    }
                                    if ($orderStatus == 3) {
                                        echo '<span class="text-primary">ชำระเงินแล้ว</span>';
                                    }
                                    if ($orderStatus == 4) {
                                        echo '<span class="text-muted">กำลังดำเนินการ</span>';
                                    }
                                    if ($orderStatus == 5) {
                                        echo '<span class="text-success">จัดส่งแล้ว</span>';
                                    }
                                    ?>
                                </p>
                            </div>
                            <!-- <div class="col-12">
                                <section class="text-muted mt-1">
                                    <small>1.อโวคาโด / 2กิโล..</small><br>
                                    <small>2.สตอเบอรี่ / 1กิโล..</small><br>
                                </section>
                            </div> -->
                        </div>
                    </div>
                <?php endforeach; ?>
            <?php } else { ?>
                <div class="card  p-3 mb-2 m-1">
                    <div class="row m-0 p-0">
                        <p class="text-muted m-0 p-0">ไม่มีข้อมูล</p>
                    </div>
                </div>
            <?php } ?>
        </div>
        <div class="col-sm-8  col-12 order_table">
            <div class="row  m-0 p-0">
                <div class="col-12 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-success">
                        <p class="m-0 p-0 ">ชำระแล้ว</h4>

                        <h5 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countSuccessOrder() ?><span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-primary">
                        <p class="m-0 p-0 ">ในตะกร้า</h4>
                        <h5 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countInCart() ?><span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-danger ">
                        <p class="m-0 p-0 ">ยกเลิก</h4>

                        <h5 class="text-right m-0 p-0 font-weight-bold">
                            <?= $this->Custom->countOrderCancle() ?><span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
            </div>
            <div class="card  p-2 m-1 table-responsive-lg">
                <table id="ordersTable" class="display responsive nowrap" style="width:100%">
                    <thead>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>
                        <?php foreach ($ordersAll as $key => $order) : ?>
                            <tr class="shadow-sm">
                                <td class="w-50 p-3">
                                    <h5 class="font-weight-bold">หมายเลข : <?= $order->orders_code ?></h5>
                                    <p class="m-0 p-0 text-muted">ชื่อลูกค้า: <a href=""><?= (!empty(($order->user['name']))) ? $order->user['name'] : "รอข้อมูลผู้ใช้งาน" ?></a></p>
                                    <p class="m-0 p-0 text-muted"> วันที่สั่งซื้อ :<?= $order->created_at ?></p>
                                </td>
                                <td class="w-10 p-3">
                                    <?php
                                    if ($order->status == 0) {
                                        echo '<span class="text-danger">ยกเลิก</span>';
                                    }
                                    if ($order->status == 1) {
                                        echo '<span class="text-muted">รอการชำระเงิน</span>';
                                    }
                                    if ($order->status == 2) {
                                        echo '<span class="text-primary">รอการตรวจสอบ</span>';
                                    }
                                    if ($order->status == 3) {
                                        echo '<span class="text-primary">ชำระเงินแล้ว</span>';
                                    }
                                    if ($order->status == 4) {
                                        echo '<span class="text-muted">กำลังดำเนินการ</span>';
                                    }
                                    if ($order->status == 5) {
                                        echo '<span class="text-success">จัดส่งแล้ว</span>';
                                    }
                                    ?>
                                </td>

                                <td class="actions w-30">
                                    <a href="<?= $this->Url->build(['controller' => 'Orders', 'action' => 'edit', $order->id]) ?>" type="button" class=" p-1 text-muted"><i class="fa-solid fa-pen-to-square"></i> </a>
                                    <a href="<?= $this->Url->build(['controller' => 'Orders', 'action' => 'view', $order->id]) ?>" class="p-1 text-primary"><i class="fas fa-circle-info"></i> </a>
                                </td>
                            </tr>
                        <?php endforeach ?>

                    </tbody>
                </table>
            </div>
        </div>
    </div>
</div>




<!-- Modal -->
<!-- <div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="exampleModalLongTitle">รายละเอียดออเดอร์</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <h2>#11590</h2>
                <h6>ผู้สั่งซื้อ: <a href="http://">ธนพล กัลปพฤกษ์</a></h6>
                <small>วันที่สั่งซื้อ: 10/10/2565</small> <br>
                <hr>

                <b>รายการ</b>
                <ul class="py-2">
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                    <li>
                        <p class="m-0 p-0">lorem3</p>
                        <small class="text-muted">*2 Lorem ipsum dolor sit.</small>
                    </li>
                </ul>
                <hr>
                <section class="d-flex justify-content-between">
                    <h3>ยอดรวมชำระ</h3>
                    <h1>390 บาท</h1>
                </section>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary">Save changes</button>
            </div>
        </div>
    </div>
</div> -->

<script>
    $(document).ready(function() {
        var t = $('#ordersTable').DataTable({
            responsive: true,
            "order": [
                [0, 'desc'],
                [1, 'desc']
            ]
        });

    });
</script>