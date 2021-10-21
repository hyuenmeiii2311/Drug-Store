<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">

            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            <a>
                                <i class="mdi mdi-plus-circle-outline">Thêm mới</i>
                            </a>
                        </p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Mã khách hàng</th>
                                        <th>Ngày đặt</th>
                                        <th>Tên người nhận</th>
                                        <th>Địa chỉ giao</th>
                                        <th>Điện thoại</th>
                                        <th>Ghi chú</th>
                                        <th>Tổng tiền</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['order']) && is_array($data['order'])) : ?>
                                        <?php foreach ($data['order'] as $item) : ?>
                                            <tr>
                                                <td><?= $item->customer_id ?></td>
                                                <td><?= $item->created_date ?></td>
                                                <td><?= $item->delivery_name ?></td>
                                                <td><?= $item->delivery_address ?></td>
                                                <td><?= $item->delivery_phone ?></td>
                                                <td><?= $item->note ?></td>
                                                <td><?= $item->total ?></td>
                                                <td>
                                                    <i class="mdi mdi-table-edit"></i>Edit |
                                                    <i class="mdi mdi-delete"></i>Delete
                                                </td>
                                            </tr>
                                        <?php endforeach; ?>
                                    <?php else : ?>
                                        <td colspan="8">
                                            <p style="text-align:center;">No data available in table</p>
                                        </td>
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