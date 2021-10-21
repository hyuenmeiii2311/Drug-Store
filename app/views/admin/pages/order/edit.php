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
                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Mã đơn đặt hàng</label>
                                <input type="text" class="form-control" id="order_id" name="order_id">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Mã khách hàng</label>
                                    <input type="text" class="form-control" id="customer_id" name="customer_id">
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày gửi</label>
                                    <input type="datetime" class="form-control" id="created_date" name="created_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Tên người nhận</label>
                                <input type="text" class="form-control" id="delivery_name" name="delivery_name">
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại người nhận</label>
                                <input type="tel" class="form-control" id="delivery_phone" name="delivery_phone">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ người nhận</label>
                                <input type="text" class="form-control" id="delivery_address" name="delivery_address">
                            </div>
                            <div class="form-group">
                                <label>Ghi chú</label>
                                <input type="text" class="form-control" id="note" name="note">
                            </div>
                            <div class="form-group">
                                <label>Tổng đơn</label>
                                <input type="text" class="form-control" id="total" name="total">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>