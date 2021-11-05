<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">Thông tin khách hàng</p>
                        <div class="table-responsive">
                            <table class="table table-hover">
                                <thead>
                                    <tr>
                                        <th>Họ và tên</th>
                                        <th>Số điện thoại</th>
                                        <th>Giới tính</th>
                                        <th>Email</th>
                                        <th>Địa chỉ</th>
                                        <th>Ngày sinh</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['user']) && is_array($data['user'])) : ?>
                                        <?php foreach ($data['user'] as $item) : ?>
                                            <tr>
                                                <td><?= $item->name ?></td>
                                                <td><?= $item->phone ?></td>
                                                <td><?= ($item->gender == 0) ? 'Nữ' : 'Nam' ?></td>
                                                <td><?= $item->email ?></td>
                                                <td><?= $item->address ?></td>
                                                <td><?= $item->datebirth ?></td>
                                                <td>
                                                    <a style="color: black;" href="<?= ROOT . "admin/user?action=edit&id=" . $item->id ?>">
                                                        <i class="mdi mdi-table-edit"></i>Edit
                                                    </a> |
                                                    <a style="color: black;" href="<?= ROOT . "admin/user?action=delete&id=" . $item->id ?>">
                                                        <i class="mdi mdi-delete"></i>Delete
                                                    </a>
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
                        <!--Pagination -->
                        <?php require './app/views/admin/partials/_pagination.php' ?>
                        <!--//Pagination -->
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>