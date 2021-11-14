<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-4">
                            <div class="card-body">
                                <h4 class="card-title">Thông tin khách hàng</h4>
                                <p class="card-description">
                                    Thông tin vận chuyển
                                </p>
                                <div class="template-demo">
                                    <p>Mã đơn hàng: <?= $data['row']->id ?></p>
                                    <p>Mã khách hàng: <?= $data['row']->customer_id ?></p>
                                    <p>Ngày tạo: <?= $data['row']->created_date ?></p>
                                    <p>Người nhận: <?= $data['row']->delivery_name ?></p>
                                    <p>Địa chỉ: <?= $data['row']->delivery_address ?></p>
                                    <?php if ($data['row']->note != '') : ?>
                                        <p>Ghi chú: <?= $data['row']->note ?></p>
                                    <?php endif; ?>
                                    <p>Tổng: <?= number_format($data['row']->total) ?> vnđ</p>
                                    <form method="POST">
                                        <div class="form-group">
                                            <label>Trạng thái đơn hàng:</label>
                                            <select class="js-example-basic-single w-100" name="status">
                                                <option value="0" <?= ($data['row']->status == "0") ? 'selected' : '' ?>>Chưa giao hàng</option>
                                                <option value="1" <?= ($data['row']->status == "1") ? 'selected' : '' ?>>Đã giao hàng</option>
                                            </select>
                                            <input type="hidden" name="order_id" value="<?= $data['row']->id ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    </form>
                                </div>
                            </div>
                        </div>
                        <div class="col-md-8">
                            <div class="card-body">
                                <h4 class="card-title">Chi tiết đơn hàng</h4>
                                <p class="card-description">
                                    Thông tin đơn hàng
                                </p>

                                <div class="table-responsive">
                                    <table class="table table-striped">
                                        <thead>
                                            <tr>
                                                <th>
                                                    Hình ảnh
                                                </th>
                                                <th>
                                                    Tên sản phẩm
                                                </th>
                                                <th>
                                                    Giá tiền
                                                </th>
                                                <th>
                                                    Số lượng
                                                </th>

                                            </tr>
                                        </thead>
                                        <tbody>
                                            <?php if (isset($data['detail']) && is_array($data['detail'])) : ?>
                                                <?php foreach ($data['detail'] as $item) : ?>
                                                    <tr>
                                                        <td class="py-1">
                                                            <img src="<?= ASSETS . "images/" . $item->image; ?>" alt="image" />
                                                        </td>
                                                        <td>
                                                            <?= $item->name ?>
                                                        </td>
                                                        <td>
                                                            <?= number_format($item->price); ?>
                                                        </td>
                                                        <td>
                                                            <?= $item->qty ?>
                                                        </td>
                                                    </tr>
                                                <?php endforeach; ?>
                                            <?php endif; ?>
                                        </tbody>
                                    </table>
                                </div>
                            </div>

                        </div>
                    </div>

                </div>
            </div>
        </div>
    </div>
</div>