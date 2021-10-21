<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-md-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Thông tin thể loại
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Thể loại</label>
                                <input type="text" class="form-control" id="category" name="category" placeholder="Nhập tên thể loại">
                            </div>
                            <div class="form-group">
                                <label>Danh mục sản phẩm</label>
                                <select class="js-example-basic-single w-100">
                                    <option value="AL">Alabama</option>
                                    <option value="WY">Wyoming</option>
                                </select>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>