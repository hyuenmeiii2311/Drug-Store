<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-lg-12 grid-margin stretch-card">
                <div class="card">
                    <div class="row">
                        <div class="col-md-12">
                            <div class="card-body">
                                <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                                <p class="card-description">
                                Thông tin liên lạc
                                </p>
                                <div class="template-demo">
                                    <p><b>Địa chỉ email:</b> <?= $data['row']->email ?></p>
                                    <p><b>Họ và tên:</b> <?= $data['row']->name ?></p>
                                    <p><b>Tiêu đề: </b><?= $data['row']->subject ?></p>
                                    <p><b>Ngày gửi:</b> <?= $data['row']->created_date ?></p>
                                    <p><b>Nội dung:</b> </p>
                                    <p><?= $data['row']->message ?></p>
                                    <form method="POST">
                                        <div class="form-group">
                                            <?php if ($data['row']->status != 1) : ?>
                                                <label>Trạng thái :</label>
                                                <select class="js-example-basic-single w-100" name="status">
                                                    <option value="0" <?= ($data['row']->status == "0") ? 'selected' : '' ?>>Chưa trả lời</option>
                                                    <option value="1" <?= ($data['row']->status == "1") ? 'selected' : '' ?>>Đã trả lời</option>
                                                </select>
                                                <input type="hidden" name="contact_id" value="<?= $data['row']->id ?>">
                                        </div>
                                        <button type="submit" class="btn btn-primary mr-2">Submit</button>
                                    <?php else : ?>
                                        <label class="badge badge-success">Đã giao hàng</label>
                                </div>
                            <?php endif; ?>
                            </form>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
</div>