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
                                        <th>Họ và tên</th>
                                        <th>Email</th>
                                        <th>Ngày gửi</th>
                                        <th>Tiêu đề</th>
                                        <th>Nội dung</th>
                                        <th>Trạng thái</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <?php if (isset($data['contact']) && is_array($data['contact'])) : ?>
                                        <?php foreach ($data['contact'] as $item) : ?>
                                            <tr>
                                                <td><?= $item->name ?></td>
                                                <td><?= $item->email ?></td>
                                                <td><?= $item->created_date ?></td>
                                                <td><?= $item->subject ?></td>
                                                <td><?= $item->message ?></td>
                                                <td>
                                                    <?php if($item->status == 0) : ?>
                                                        <label class="badge badge-warning">Chưa trả lời</label>
                                                    <?php else :?>
                                                        <label class="badge badge-success">Trả lời</label>
                                                    <?php endif;?>
                                                </td>
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
                        <!--Pagination -->
                        <?php require './app/views/admin/partials/_pagination.php' ?>
                        <!--//Pagination -->
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>