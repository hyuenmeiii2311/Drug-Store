<!-- Main Content -->
<div class="bg-light py-3">
    <div class="container">
        <div class="row">
            <div class="col-md-12 mb-0">
                <a href="<?= ROOT ?>index">Home</a> <span class="mx-2 mb-0">/</span>
                <strong class="text-black"><?= $data['page_title'] ?></strong>
            </div>
        </div>
    </div>
</div>

<!--Cart-->
<div class="site-section">
    <div class="container">
        <div class="row mb-5">
            <form class="col-md-12" method="post">
                <div class="site-blocks-table" id="cart_table">
                    <?php if (isset($data['cart']) && $data['cart'] != '') { ?>
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th class="product-thumbnail">Image</th>
                                    <th class="product-name">Product</th>
                                    <th class="product-price">Price</th>
                                    <th class="product-quantity">Quantity</th>
                                    <th class="product-total">Total</th>
                                    <th class="product-remove">Remove</th>
                                </tr>
                            </thead>
                            <tbody>
                                <?php foreach ($data['cart'] as $item) : ?>
                                    <tr>
                                        <td class="product-thumbnail">
                                            <a href="<?= ROOT ?>detail/<?= $item->id ?>">
                                                <img src="<?= ASSETS . "images/" . $item->image; ?>" alt="Image" class="img-fluid" width="90px" height="116px">
                                            </a>
                                        </td>
                                        <td class="product-name">
                                            <p>
                                                <a href="<?= ROOT ?>detail/<?= $item->id ?>" style="color: black;font-family: 'Raleway', sans-serif;">
                                                    <?= $item->name; ?>
                                                </a>
                                            </p>
                                        </td>
                                        <td><?= number_format($item->price); ?>vnđ</td>
                                        <td>
                                            <div class="input-group mb-3" style="max-width: 120px;">
                                                <div class="input-group-prepend">
                                                    <button onclick="subtract_quantity('<?= $item->id ?>')" class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button>
                                                </div>
                                                <input onchange="edit_quantity(this.value,'<?= $item->id ?>')" type="text" class="form-control text-center" value="<?= $item->cart_quantity; ?>" min="0" max="<?= $item->quantity; ?>" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                                <div class="input-group-append">
                                                    <button onclick="add_quantity('<?= $item->id ?>')" class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button>
                                                </div>
                                            </div>

                                        </td>
                                        <td><?= number_format($item->cart_quantity * $item->price); ?>vnđ</td>
                                        <td><a onclick="remove(this.getAttribute('delete_id'))" delete_id="<?= $item->id ?>" href="<?= ROOT ?>cart" class="btn btn-primary height-auto btn-sm">X</a></td>
                                    </tr>
                                <?php endforeach; ?>
                            </tbody>
                        </table>
                    <?php } else { ?>
                        <p class="text-danger" style="font-weight: bold;" id="font-unicode">Không có sản phẩm nào trong giỏ hàng.</p>
                    <?php } ?>
                </div>
            </form>
        </div>

        <div class="row">
            <div class="col-md-6">
                <div class="row mb-5">
                    <div class="col-md-6 mb-3 mb-md-0">
                        <button class="btn btn-primary btn-md btn-block">Update Cart</button>
                    </div>
                    <div class="col-md-6">
                        <button onclick="location.href='<?= ROOT ?>shop ?>'" class="btn btn-outline-primary btn-md btn-block">Continue Shopping</button>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <label class="text-black h4" for="coupon">Coupon</label>
                        <p>Enter your coupon code if you have one.</p>
                    </div>
                    <div class="col-md-8 mb-3 mb-md-0">
                        <input type="text" class="form-control py-3" id="coupon" placeholder="Coupon Code">
                    </div>
                    <div class="col-md-4">
                        <button class="btn btn-primary btn-md px-4">Apply Coupon</button>
                    </div>
                </div>
            </div>
            <div class="col-md-6 pl-5">
                <div class="row justify-content-end">
                    <div class="col-md-7">
                        <div class="row">
                            <div class="col-md-12 text-right border-bottom mb-5">
                                <h3 class="text-black h4 text-uppercase">Cart Totals</h3>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Subtotal</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"><?= number_format($data['sub_total']) ?> vnđ</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Coupon</span>
                                <!--Coupon: giảm giá theo số %-->
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">0</strong>
                            </div>
                        </div>
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <span class="text-black">Shipping Cost</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black">Free</strong>
                            </div>
                        </div>
                        <div class="row mb-5">
                            <div class="col-md-6">
                                <span class="text-black">Total</span>
                            </div>
                            <div class="col-md-6 text-right">
                                <strong class="text-black"><?= number_format($data['sub_total']) ?> vnđ</strong>
                            </div>
                        </div>

                        <div class="row">
                            <div class="col-md-12">
                                <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
                                    <button class="btn btn-primary btn-lg btn-block" onclick="window.location.href = 'checkout'">Proceed To Checkout</button>
                                <?php } else { ?>
                                    <button class="btn btn-primary btn-lg btn-block" onclick="checkLogin() ">Proceed To Checkout</button>
                                <?php } ?>
                                
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>


<!--//Cart-->

<div class="site-section bg-secondary bg-image" style="background-image: url('<?= ASSETS ?>images/bg_2.jpg');">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= ASSETS ?>images/bg_1.jpg');">
                    <div class="banner-1-inner align-self-center">
                        <h2>Pharma Products</h2>
                        <p id="font-unicode">Trước khi đến tay bạn, các sản phẩm sẽ được kiểm tra và đóng gói bởi các dược sĩ có kinh nghiệm.</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= ASSETS ?>images/bg_2.jpg');">
                    <div class="banner-1-inner ml-auto  align-self-center">
                        <h2>Rated by Experts</h2>
                        <p id="font-unicode">Đảm bảo 100% thuốc chính hãng, được kiểm duyệt bởi Bộ Y Tế, và có hạn sử dụng xa.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>
<!-- //Main Content -->
<style>
    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }
</style>
<script>

    function checkLogin() {
        if (confirm('Login to continue purchasing?')) {
            // Save it!
            window.location.href = "login";
        } else {
            // Do nothing!
        }
    }
    function edit_quantity(quantity, id) {
        if (isNaN(quantity)) {
            return;
        }
        send_data({
            quantity: quantity.trim(),
            id: id.trim()
        }, "edit_quantity");
    }

    function remove(id) {
        send_data({
            id: id.trim()
        }, "remove");
    }

    function add_quantity(id) {
        send_data({
            id: id.trim()
        }, "add_quantity");
    }

    function subtract_quantity(id) {
        send_data({
            id: id.trim()
        }, "subtract_quantity");
    }

    function send_data(data = {}, data_type) {
        var ajax = new XMLHttpRequest(); //XMLHttpRequest - Tạo HTTP request đến server 
        ajax.addEventListener('readystatechange', function() //Một Event Handler lắng nghe và xử lý một sự kiện khi có thay đổi về trạng thái nào diễn ra.
            {
                if (ajax.readyState == 4 && ajax.status == 200) {
                    handle_result(ajax.responseText);
                }
            });
        ajax.open("POST", "<?= ROOT ?>cart/" + data_type + "/" + JSON.stringify(data), true); //JSON.stringify() lấy 1 đối tượng JavaScript và chuyển đổi nó thành 1 chuỗi JSON.
        ajax.send();
    }

    function handle_result(result) {
        console.log(result);
        if (result != "") {
            var obj = JSON.parse(result); //nhận vào một chuỗi JSON và chuyển đổi (transform) nó thành một đối tượng JavaScript.
            if (typeof obj.data_type != 'undefined') {
                if (obj.data_type == "remove") {
                    window.location.href = window.location.href;
                }
                if (obj.data_type == "edit_quantity") {
                    window.location.href = window.location.href;
                }
                if (obj.data_type == "add_quantity") {
                    window.location.href = window.location.href;
                }

                if (obj.data_type == "subtract_quantity") {
                    window.location.href = window.location.href;
                }
            }
        }
    }
</script>