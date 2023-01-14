<style>
    .p_img {
        width: 100%;
        object-fit: cover;
        height: 200px;
    }


    .post_img {
        object-fit: cover;
        height: 160px;
    }

    .map {
        width: 100%;
        height: 170px;
    }

    iframe {
        width: 100% !important;
        object-fit: contain;
    }

    @media screen and (max-width: 750px) {

        .p_img {
            height: 100%;
            /* overflow: hidden; */
        }


    }
</style>



<div class="container">
    <div class="row m-1 my-3">
        <div class="col-12 d-flex  justify-content-between py-3 my-auto">
            <h2>ตะกร้าสินค้า</h2>
            <p onclick="seeProduct()" type="button" class="d-block d-sm-none m-0 p-0 my-auto">
                ดูสินค้าทั้งหมด
            </p>
        </div>
        <div class="col-12 col-sm-8 m-0 p-0 d-none d-sm-block" id="productData">
            <div class="row m-0 p-0" id="product_items">
            </div>
        </div>
        <div class="col-12 col-sm-4 m-0 p-0">
            <div class="m-1 card border shadow-sm  p-3">
                <h4>รายการสินค้า</h4>
                <div class="col-12 p-0" id="product_cart">
                </div>
            </div>
            <div class="m-1  card  p-3 text-dark">
                <h4 class="mb-1">ยอดรวมชำระ</h4>
                <p class="p-0 m-0"></p>
                <table>
                    <tr class="m-0 p-0">
                        <th colspan="4" class="text-muted">รายการ</th>
                        <th class="text-right text-muted">จำนวน</th>
                    </tr>
                    <hr>
                    <tbody id="tbody_precal">
                        <!-- <tr>
                                <td colspan="4">อโวคาโด</td>
                                <td>3</td>
                            </tr> -->
                    </tbody>
                </table>
                <div class="dropdown-divider"></div>
                <div class="d-flex justify-content-between">
                    <h6 class="mb-3">ยอดรวมชำระ</h6>
                    <h4 class="mb-3" id="precal_sum"></h4>
                    <input type="hidden" id="price" value="">
                </div>
                <button class="btn btn-primary" id="gotopayment" onclick="gotoPayment()" disabled>ชำระเงิน</button>
                <!-- <a class="btn btn-primary" href="<?= $this->Url->Build(['controller' => 'cart', 'action' => 'payment']) ?>" onclick="gotoPayment()">ชำระเงิน</a> -->
            </div>
        </div>
    </div>
    <script>
        var productData = "";
        $(document).ready(function() {

            $.ajax({
                url: "<?php echo $this->Url->build('/api/product', ['fullBase' => true]); ?>",
                type: "GET",
                dataType: "json", // added data type
                success: function(result) {
                    let productItem = "";
                    for (i = 0; i < result.length; i++) {
                        productData = result[i];
                        let name = result[i].title.replace(/^\s+|\s+$/gm, '');;

                        productItem += ` 
                   <div class=" col-sm-4 col-12 " id="productCart_list" >
                <div class="card">
                <img class="card-img p_img" src="<?php echo $this->Url->build('/', ['fullBase' => true]); ?>${result[i].image}" alt="${result[i].title}">
                <div class="card-body">
                <h6 class="">${result[i].title}</h6>
                <h6 class="card-subtitle mb-2 text-muted">ชนิด : ${result[i].type}</h6>
                <p class="card-text">
                <div class="price text-success">
                    <h5 class="mt-4"><i class="fa-solid fa-baht-sign"></i>${result[i].price}</h5>
                </div>
                <div class="buy d-flex justify-content-between align-items-center ">
                    <div class="btn-group w-100" role="group" aria-label="Basic example">
                        <a href="https://line.me/R/oaMessage/<?= $contactData->lineoficial; ?>?สอบถามสินค้า${result[i].title}" target="blank" type="button" class="btn btn-success  mt-3"> <i class="fab fa-line  text-white"></i></a>
                        <a type="button" class="btn btn-success  mt-3" onclick="select_product(${result[i].id},'${name}','${result[i].image}',${result[i].price})">เพิ่มในตะกร้าสินค้า</a>
                    </div>
                </div>
                </div>
                </div>
                </div>
                    
                    `;
                    }
                    $("#product_items").html(productItem);
                },
            });
        });

        //ตะกร้าสินค้า

        function seeProduct() {
            $('#productData').toggleClass('d-none')
        }
        // ไปหน้าจ่ายเงิน
        function gotoPayment() {

            let totalprice = $('#price').val()

            $.ajax({
                type: 'POST',
                url: '<?php echo $this->Url->build(['controller' => 'cart', 'action' => 'add']); ?>',
                data: {
                    totalprice: totalprice,
                    c_detail: JSON.stringify(cart_list),
                },
                headers: {
                    'X-CSRF-token': $('meta[name="csrfToken"]').attr('content')
                },
                success: function(res) {
                    let resp = JSON.parse(res)
                    localStorage.setItem("orders_token", resp.orders_token);
                    if (resp.result == 200) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'เพิ่มสินค้าเรียบร้อย',
                            showConfirmButton: true,
                            confirmButtonText: 'ไปหน้าชำระเงิน',
                        }).then((result) => {
                            window.location.href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>"
                        })
                    }
                    if (resp.result == 304) {
                        Swal.fire({
                            position: 'center',
                            icon: 'success',
                            title: 'กรุณาเข้าสู่ระบบ',
                            showConfirmButton: true,
                            confirmButtonText: 'ไปหน้าเข้าสู่ระบบ',
                        }).then((result) => {
                            window.location.href = "<?= $this->Url->build(['controller' => 'users', 'action' => 'login']) ?>"
                        })
                    }
                }
            });
        }
    </script>
</div>