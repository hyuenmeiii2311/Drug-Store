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
                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Tên sản phẩm</label>
                                <input type="text" class="form-control" id="product" name="product" placeholder="Nhập tên sản phẩm">
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Trọng lượng</label>
                                    <input type="text" class="form-control" id="weight" name="weight">
                                </div>
                                <div class="col-md-6">
                                    <label>Đơn vị</label>
                                    <select class="form-control" id="unit" name="unit">
                                        <option>Category1</option>
                                        <option>Category2</option>
                                        <option>Category3</option>
                                        <option>Category4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Giá</label>
                                    <input type="text" class="form-control" id="price" name="price">
                                </div>
                                <div class="col-md-6">
                                    <label>Số lượng</label>
                                    <input type="number" class="form-control" id="quantity" name="quantity">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Hình ảnh</label>
                                <input type="file" name="img[]" class="file-upload-default">
                                <div class="input-group col-xs-12">
                                    <input type="text" class="form-control file-upload-info" disabled placeholder="Upload Image">
                                    <span class="input-group-append">
                                        <button class="file-upload-browse btn btn-primary" type="button">Upload</button>
                                    </span>
                                </div>
                            </div>
                            
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Thể loại</label>
                                    <select class="form-control" id="category_id" name="category_id">
                                        <option>Category1</option>
                                        <option>Category2</option>
                                        <option>Category3</option>
                                        <option>Category4</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Thương hiệu</label>
                                    <select class="form-control" id="brand_id" name="brand_id">
                                        <option>Category1</option>
                                        <option>Category2</option>
                                        <option>Category3</option>
                                        <option>Category4</option>
                                    </select>
                                </div>
                            </div>

                            <div class="form-group">
                                <label>Mô tả</label>
                                <textarea class="form-control" id="description" name="description" rows="5"></textarea>
                            </div>
                            

                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>