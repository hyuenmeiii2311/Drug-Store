<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            <?php echo ($data['index'] == "add") ? "Thêm mới" : "Sửa" ?>
                        </p>
                        <form class="forms-sample" method="POST" onsubmit="return validate()">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <input type="text" value="<?php echo ($data['index'] == "edit") ? $data['row']->name : '' ?>" class="form-control" id="category" name="name" placeholder="Nhập tên thể loại">
                                <input type="hidden" name="cate_id" value="<?= ($data['index'] == "edit") ? $data['row']->id :''?>">
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="js-example-basic-single w-100" name="mix_id">
                                    <?php if (isset($data['mix'])) : ?>
                                        <?php foreach ($data['mix'] as $item) : ?>
                                            <option value="<?= $item->id ?>"><?= $item->name ?></option>
                                        <?php endforeach; ?>
                                    <?php endif; ?>
                                    <?php if ($data['index'] == "edit") : ?>
                                        <option value="<?= $data['row']->product_mix_id ?>" selected><?= $data['row']->mix_name ?></option>
                                    <?php endif; ?>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>
</div>
<!-- Javascript -->
<script>
    function validate() {
        var name = document.getElementById("category").value;
        if (name == "") {
            alert("Hãy nhập tên!");
            return false;
        }
    }
</script>
<!-- //Javascript -->