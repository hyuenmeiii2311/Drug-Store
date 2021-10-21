<!--Title Box-->
<?php require 'title_box.php' ?>
<!--//Title Box-->

<!-- Main Content -->
<form name="CheckOut" method="POST" onsubmit="return validate()">
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-6 mb-5 mb-md-0">
                <!--Billing Details-->
                <h2 class="h3 mb-3 text-black">Billing Details</h2>
                <div class="p-3 p-lg-5 border">
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label class="text-black">Fullname <span class="text-danger">*</span></label>
                            <input type="text" value="<?=$_SESSION['user']->name;?>" class="form-control" id="c_name" name="c_name">
                        </div>
                    </div>
                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_phone" class="text-black">Phone <span class="text-danger">*</span></label>
                            <input type="text" value="<?=$_SESSION['user']->phone;?>" class="form-control" id="c_phone" name="c_phone" placeholder="Phone Number">
                        </div>
                    </div>

                    <div class="form-group row">
                        <div class="col-md-12">
                            <label for="c_address" class="text-black">Address <span class="text-danger">*</span></label>
                            <input type="text" value="<?=$_SESSION['user']->address;?>" class="form-control" id="c_address" name="c_address" placeholder="Street address">
                        </div>
                    </div>
                    <div class="form-group">
                      <input type="text" id="c_address_detail" name="c_address_detail" class="form-control" placeholder="Apartment, suite, unit etc. (optional)">
                    </div>

                    <div class="form-group">
                        <label for="c_order_notes" class="text-black">Order Notes</label>
                        <textarea name="c_order_notes" id="c_order_notes" cols="30" rows="5" class="form-control" placeholder="Write your notes here..."></textarea>
                    </div>

                </div>
                <!--//Billing Details-->
                <br>
                <!--Coupon Code-->
                <h2 class="h3 mb-3 text-black">Coupon Code</h2>
                <div class="p-3 p-lg-5 border">

                            <label for="c_code" class="text-black mb-3">Enter your coupon code if you have one</label>
                            <div class="input-group w-75">
                                <input type="text" class="form-control" id="c_code" placeholder="Coupon Code" aria-label="Coupon Code" aria-describedby="button-addon2">
                                <div class="input-group-append">
                                    <button class="btn btn-primary btn-sm px-4" type="button" id="button-addon2">Apply</button>
                                </div>
                            </div>

                        </div>
                <!--//Coupon Code-->
            </div>
            
            <!--Your order-->
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-12">
                        <h2 class="h3 mb-3 text-black">Your Order</h2>
                        <div class="p-3 p-lg-5 border">
                            <?php if (isset($data['cart'])) : ?>
                                <table class="table site-block-order-table mb-5">
                                    <thead>
                                        <th>Product</th>
                                        <th>Total</th>
                                    </thead>
                                    <tbody>
                                        <?php foreach ($data['cart'] as $item) : ?>
                                            <tr>
                                                <td style="font-family: 'Raleway', sans-serif;"><?= $item->name; ?> <strong class="mx-2">x</strong> <?= $item->cart_quantity; ?></td>
                                                <td><?= number_format($item->cart_quantity * $item->price); ?>đ</td>
                                            </tr>
                                        <?php endforeach; ?>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Cart Subtotal</strong></td>
                                            <td class="text-black"><?= number_format($data['sub_total']) ?>đ</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Coupon</strong></td>
                                            <td class="text-black">0</td>
                                        </tr>
                                        <tr>
                                            <td class="text-black font-weight-bold"><strong>Order Total</strong></td>
                                            <td class="text-black font-weight-bold"><strong><?= number_format($data['sub_total']) ?>đ</strong></td>
                                        </tr>
                                    </tbody>
                                </table>
                            <?php endif; ?>

                            <div class="border mb-3">
                                <h3 class="h6 mb-0"><a class="d-block" data-toggle="collapse" href="#collapsebank" role="button" aria-expanded="false" aria-controls="collapsebank">Cash payment</a></h3>

                                <div class="collapse" id="collapsebank">
                                    <div class="py-2 px-4">
                                        <p style="font-family: 'Raleway', sans-serif;" class="mb-0">Quý khách hàng sẽ trả tiền mặt cho nhân viên giao hàng ngay khi nhận được đơn hàng của mình.Phí thu hộ: ₫0 VNĐ.
                                            Ưu đãi về phí vận chuyển áp dụng cả với phí thu hộ. Pharma chấp nhận hình thức thanh toán khi nhận hàng (COD) cho tất cả các đơn hàng trên toàn quốc.</p>
                                    </div>
                                </div>
                            </div>

                            <div class="form-group">
                                <button class="btn btn-primary btn-lg btn-block" type="submit" >Place
                                    Order</button>
                            </div>

                        </div>
                    </div>
                </div>
            </div>
            <!--//Your order-->
        </div>
        <!-- </form> -->
    </div>
</div>


</form>

<hr>

<div class="site-section site-section-sm site-blocks-1 border-0" data-aos="fade">
    <div class="container">
        <div class="row">
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-truck text-primary"></span>
                </div>
                <div class="text">
                    <h2>Free Shipping</h2>
                    <p id="font-unicode">Trung tâm Thuốc Pharma sẽ miễn phí giao hàng, cẩn thận đóng gói đơn hàng và giao hàng tận nhà trên toàn quốc.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="100">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-refresh2 text-primary"></span>
                </div>
                <div class="text">
                    <h2>Free Returns</h2>
                    <p id="font-unicode">Miễn phí hoàn lại sản phẩm nếu có bất cứ trục trặc về sản phẩm giúp khách hàng có trải nghiệm tốt nhất khi mua hàng.</p>
                </div>
            </div>
            <div class="col-md-6 col-lg-4 d-lg-flex mb-4 mb-lg-0 pl-4" data-aos="fade-up" data-aos-delay="200">
                <div class="icon mr-4 align-self-start">
                    <span class="icon-help text-primary"></span>
                </div>
                <div class="text">
                    <h2>Customer Support</h2>
                    <p id="font-unicode">Dịch vụ chăm sóc tận tâm, luôn sẵn sàng giải đáp mọi thắc mắc, băn khoăn trong việc sử dụng sản phẩm cũng như chăm sóc sức khỏe.</p>
                </div>
            </div>
        </div>
    </div>
</div>

<hr>
<!-- //Main Content -->

<style>
    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }
</style>

<!-- Javascript -->
<script>
    function validate() {
        //check name
        var name = document.forms["CheckOut"]["c_name"].value;
        if (name == "") {
            alert("Hãy điền tên của bạn!");
            return false;
        }
        if (!validateName(name)) {
            alert("Tên không hợp lệ!");
            return false;
        }
        //check phone
        var phone = document.forms["CheckOut"]["c_phone"].value;
        if (!validatePhoneNumber(phone)) {
            alert("Điện thoại không hợp lệ!");
            return false;
        }

        //check address
        if (document.getElementById("c_address").value == "") {
            alert("Hãy điền địa chỉ!");
            return false;
        }
        if (document.getElementById("c_address_detail").value == "") {
            alert("Hãy điền số nhà!");
            return false;
        }
    }
    function validatePhoneNumber(input_str) {
        var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        return re.test(input_str);
    }

    function validateName(input_str) {
        var re = /^\w+/;
        return re.test(input_str);
    }
</script>
<!-- //Javascript -->