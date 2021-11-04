<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Thông tin sản phẩm
                        </p>
                        <form class="forms-sample" method="POST" onsubmit="return validate()" enctype="multipart/form-data">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <?php if ($data['index'] == "edit") : ?>
                                    <input type="hidden" name="product_id" value="<?= $data['row']->id ?>">
                                    <input type="text" class="form-control" value="<?= $data['row']->name ?>" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                <?php else : ?>
                                    <input type="text" class="form-control" id="name" name="name" placeholder="Nhập tên sản phẩm">
                                <?php endif; ?>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Trọng lượng</label>
                                    <?php if ($data['index'] == "edit") : ?>
                                        <input type="text" value="<?= $data['row']->weight ?>" min="0" class="form-control" id="weight" name="weight" placeholder="Nhập trọng lượng">
                                    <?php else : ?>
                                        <input type="text" min="0" class="form-control" id="weight" name="weight" placeholder="Nhập trọng lượng">
                                    <?php endif; ?>
                                </div>
                                <div class="col-md-6">
                                    <label>Đơn vị</label>
                                    <select class="form-control" id="unit" name="unit">
                                        <option value="select">Chọn đơn vị</option>
                                        <?php if ($data['index'] == "edit") : ?>
                                            <option selected><?= $data['row']->unit ?></option>
                                        <?php endif; ?>
                                        <option>Viên</option>
                                        <option>Hộp</option>
                                        <option>Chiếc</option>
                                        <option>Cái</option>
                                        <option>Tuýp</option>
                                        <option>Chai</option>
                                        <option>ml</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Giá</label>
                                    <input type="text" min="0" value="<?= ($data['index'] == "edit") ? $data['row']->price : '' ?>" class="form-control" id="price" name="price" placeholder="Nhập giá tiền">
                                </div>
                                <div class="col-md-6">
                                    <label>Số lượng</label>
                                    <input type="number" value="<?= ($data['index'] == "edit") ? $data['row']->quantity : '' ?>" min="0" class="form-control" id="quantity" name="quantity" placeholder="Nhập số lượng">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <?php if ($data['index'] == "edit") : ?>
                                    <img src="<?= ASSETS . "images/" . $data['row']->image ?>" alt="Product's image" class="product-image" height="300" weight="300"><br>
                                    <input type="hidden" value="<?= $data['row']->image ?>" name="old_image">
                                    <?php endif; ?>
                                <div class="input-group col-xs-12">
                                    <input type="file" class="form-control file-upload-info" accept="image/png,image/jpeg,image/jpg" name="fileToUpload" id="fileToUpload" <?= ($data['index'] != "edit") ? "required" : "" ?>>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Thể loại</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <?php if (isset($data['category']) && is_array($data['category'])) : ?>
                                            <?php foreach ($data['category'] as $item) : ?>
                                                <option <?= ($data['row']->category_id == $item->id) ? "selected" : "" ?> value="<?=$item->id?>"><?= $item->name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Thương hiệu</label>
                                    <select class="form-control" id="brand_id" name="brand_id">
                                        <?php if (isset($data['brand']) && is_array($data['brand'])) : ?>
                                            <?php foreach ($data['brand'] as $item) : ?>
                                                <option <?= ($data['row']->brand_id == $item->id) ? "selected" : "" ?> value="<?=$item->id?>"><?= $item->name ?></option>
                                            <?php endforeach; ?>
                                        <?php endif; ?>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="5"><?= ($data['index'] == "edit") ? $data['row']->description : '' ?></textarea>
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
            var name = document.getElementById("name").value;
            if (name == "") {
                alert("Hãy điền tên !");
                return false;
            }

            var weight = document.getElementById("weight").value;
            if (weight == "") {
                alert("Hãy điền trọng lượng!");
                return false;
            }
            if (!validateNumber(weight)) {
                alert("Trọng lượng không hợp lệ! Hãy nhập lại.");
                return false;
            }

            if (document.getElementById("unit").value == "select") {
                alert("Hãy chọn đơn vị!");
                return false;
            }

            var price = document.getElementById("price").value;
            if (price == "") {
                alert("Hãy điền giá!");
                return false;
            }
            if (!validateNumber(price)) {
                alert("Giá không hợp lệ! Hãy nhập lại.");
                return false;
            }

            var quantity = document.getElementById("quantity").value;
            if (quantity == "") {
                alert("Hãy điền số lượng!");
                return false;
            }

            var quantity = document.getElementById("image").value;
            if (quantity == "") {
                alert("Hãy chọn ảnh!");
                return false;
            }


            var category_id = document.getElementById("category_id").value;
            if (category_id == "") {
                alert("Hãy chọn thể loại!");
                return false;
            }

            var brand_id = document.getElementById("brand_id").value;
            if (brand_id == "") {
                alert("Hãy chọn thương hiệu!");
                return false;
            }

            var description = document.getElementById("description").value;
            if (description == "") {
                alert("Hãy điền mô tả!");
                return false;
            }

        }

        function validateNumber(input_str) {
            var re = /^\d+/g;
            return re.test(input_str);
        }
    </script>
    <!-- //Javascript -->