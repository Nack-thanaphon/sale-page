<div class="container-fluid">
    <div class="row my-5 h-100 ">
        <div class="col-sm-4  col-12 news_orders">

            <div class="card  p-3 mb-2 m-1">
                <div class="row m-0 p-0">
                    <div class="col-sm-8 col-12">
                        <div>
                            <h5 class="m-0 p-0">#15433</h5>
                            <small class="text-muted">วันที่ : <?= date('d-m-Y') ?></small>
                        </div>
                    </div>
                    <div class=" d-none d-sm-flex justify-content-between m-0 p-0 col-12 col-sm-4 ">
                        <p type="button" class="m-0 p-0">ยืนยัน</p>
                        <p type="button" class="m-0 p-0 text-danger">ไม่ยืนยัน</p>
                    </div>
                    <div class="col-12">
                        <section class="text-muted mt-1">
                            <small>1.อโวคาโด / 2กิโล..</small><br>
                            <small>2.สตอเบอรี่ / 1กิโล..</small><br>
                        </section>
                        <div class="d-block d-sm-none mt-3 m-0 p-0 col-12 ">
                            <div class="btn-group w-100" role="group" aria-label="Basic example">
                                <button type="button" class="btn btn">ยกเลิก</button>
                                <button type="button" class="btn btn-primary">ยืนยัน</button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        <div class="col-sm-8  col-12 order_table">
            <div class="row  m-0 p-0">
                <div class="col-12 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-success">
                        <p class="m-0 p-0 ">ชำระแล้ว</h4>

                        <h5 class="text-right m-0 p-0 font-weight-bold">100
                            <span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-primary">
                        <p class="m-0 p-0 ">ในตะกร้า</h4>
                        <h5 class="text-right m-0 p-0 font-weight-bold">2
                            <span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
                <div class="col-6 col-sm-4 m-0 p-0">
                    <div class="m-1 p-2 card bg-danger ">
                        <p class="m-0 p-0 ">ยกเลิก</h4>

                        <h5 class="text-right m-0 p-0 font-weight-bold">0
                            <span><small>/ ครัั้ง</small></span></h3>
                    </div>
                </div>
            </div>
            <div class="card  p-2 m-1">
                <table id="example" class="display responsive nowrap" style="width:100%">   
                <thead>
                        <tr>
                            <th>รายละเอียด</th>
                            <th>สถานะ</th>
                            <th>จัดการ</th>
                        </tr>
                    </thead>
                    <tbody>

                        <?php foreach ($cart as $cart) : ?>
                            <tr class="shadow-sm">
                                <td class="w-50">
                                    <h5 class="font-weight-bold">หมายเลข : #<?= $cart->c_id ?></h5>
                                    <p class="m-0 p-0 text-muted">ชื่อลูกค้า: <a href="http://">ธนพล กัลปพฤกษ์</a></p>
                                    <p class="m-0 p-0 text-muted"> วันที่สั่งซื้อ : 10/06/2565</p>


                                </td>
                                <td class="w-10">
                                    <small class="badge badge-primary">ชำระเงินเรียบร้อย</small>
                                </td>
                                <td class="actions w-30">
                                    <a href="<?= $this->Url->build(['controller' => 'Carts', 'action' => 'edit', $cart->c_id]) ?>" type="button" class=" p-1 text-muted">อัพเดต</a>
                                    <a href="<?= $this->Url->build(['controller' => 'Carts', 'action' => 'view', $cart->c_id]) ?>" class="p-1 text-primary">ดูข้อมูล</a>
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
<div class="modal fade" id="exampleModalLong" tabindex="-1" role="dialog" aria-labelledby="exampleModalLongTitle" aria-hidden="true">
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
</div>

<script>
    $(document).ready(function() {
        var t = $('#example').DataTable({
            responsive: true,
            columnDefs: [{
                    responsivePriority: 1,
                    targets: 0
                },
                {
                    responsivePriority: 2,
                    targets: -1
                }
            ],
            order: [
                [1, 'asc']
            ],
        });

    });
</script>