<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Thông tin đặt hàng
                        </p>
                        <form class="forms-sample" method="POST" onsubmit="return validate()">
                            <div class="form-group">
                                <label>Mã đơn đặt hàng</label>
                                <input type="text" class="form-control" id="order_id" name="order_id" disabled>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Mã khách hàng</label>
                                    <select class="form-control" id="customer_id" name="customer_id">
                                        <option value="select">Chọn mã khách hàng</option>
                                        <?php if (isset($data['user']) && is_array($data['user'])) : ?>
                                            <?php foreach ($data['user'] as $item) : ?>
                                                <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày gửi</label>
                                    <input type="datetime" class="form-control" id="created_date" name="created_date">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Tên người nhận</label>
                                    <input type="text" class="form-control" id="delivery_name" name="delivery_name">
                                </div>
                                <div class="col-md-6">
                                    <label>Số điện thoại người nhận</label>
                                    <input type="tel" class="form-control" id="delivery_phone" name="delivery_phone">
                                </div>

                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Địa chỉ người nhận</label>
                                    <input type="text" class="form-control" id="delivery_address" name="delivery_address">

                                </div>
                                <div class="col-md-6">
                                    <label>Ghi chú</label>
                                    <input type="text" class="form-control" id="note" name="note">
                                </div>
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Sản phẩm</label>
                                    <input type="text" class="form-control" id="product" name="product">
                                </div>
                                <div class="col-md-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tổng đơn</label>
                                <input type="text" class="form-control" id="total" name="total">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
    <!-- Javascript -->
    <script>
        function validate() {
            var name = document.getElementById("delivery_name").value;
            if (name == "") {
                alert("Hãy điền tên người nhận !");
                return false;
            }
            if (validateNumber(name)) {
                alert(" Tên người nhận không hợp lệ !");
                return false;
            }

            var customer_id = document.getElementById("customer_id").value;
            if (customer_id == "select") {
                alert("Hãy chọn mã khách hàng!");
                return false;
            }

            //check phone
            var phone = document.getElementById("delivery_phone").value;
            if (phone == "") {
                alert("Điện thoại không hợp lệ!");
                return false;
            }
            if (!validatePhoneNumber(phone)) {
                alert("Điện thoại không hợp lệ!");
                return false;
            }
            //check address
            if (document.getElementById("delivery_address").value == "") {
                alert("Hãy điền địa chỉ!");
                return false;
            }

            if (document.getElementById("note").value == "") {
                alert("Hãy điền ghi chú!");
                return false;
            }
            if (document.getElementById("total").value == "") {
                alert("Tổng đơn trống!");
                return false;
            }
            if (document.getElementById("product").value == "") {
                alert("Tổng đơn trống!");
                return false;
            }
            if (document.getElementById("quantity").value == "") {
                alert("Tổng đơn trống!");
                return false;
            }
        }

        function validateNumber(input_str) {
            var re = /^\d+/g;
            return re.test(input_str);
        }

        function validatePhoneNumber(input_str) {
            var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
            return re.test(input_str);
        }
    </script>
    <!-- //Javascript -->