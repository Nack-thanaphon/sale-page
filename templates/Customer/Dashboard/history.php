<?php $this->assign('title', 'หน้าหลัก'); ?>

<div class="row my-3">
    <div class="col-12 col-sm-8 table-responsive-lg ">
        <table class="table m-1">
            <thead class="thead-dark">
                <tr>
                    <th scope="col">ออเดอร์</th>
                    <th scope="col">วันเดือนปี</th>
                    <th scope="col">ยอดสั่งซื้อ</th>
                    <th scope="col">สถานะ</th>
                </tr>
            </thead>
            <tbody>
                <?php foreach ($UserOrders as $row) : ?>
                    <tr>
                        <th scope="row"><?= $row->orders_code ?></th>
                        <td><?= $row->created_at ?></td>
                        <td><?= $row->total_price ?></td>
                        <td><?= ($this->Custom->getOrderStatus($row->id)) ?></td>
                    </tr>
                <?php endforeach; ?>
            </tbody>
        </table>
    </div>
    <div class="col-12 col-sm-4 ">
        <div class="row m-0 p-0">
            <div class="col-12 col-sm-12 m-0 p-0 mb-2">
                <div class="card p-3  m-1 h-100">
                    <label for="" class="text-muted">ลูกค้า</label>
                    <h5><?= $UserData[0]['name'] ?></h5>
                    <h6>เบอร์โทร : <?= ($UserData[0]['phone']) ? $UserData[0]['phone'] : 'ไม่มีข้อมูล' ?></h6>
                    <a href="http://">ดูประวัติการสั่งซื้อ</a>
                    <br>
                    <hr class="m-0">
                    <div class="py-2">
                        <label for="" class="text-muted m-0 p-0">ที่อยู่จัดส่ง</label> <br>
                        <div class="my-1">
                            <?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?>
                        </div>
                        <hr class="m-0">
                        <label for="" class="text-muted m-0 p-0">หมายเหตุ</label> <br>
                        <div class="my-1">
                            <?= ($UserData[0]['address']) ? $UserData[0]['address'] : 'ไม่มีข้อมูล' ?>
                        </div>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>