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
                                    <label>Sản phẩm</label>
                                    <input type="text" class="form-control" id="product" name="product">
                                </div>
                                <div class="col-md-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                </div>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>