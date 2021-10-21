<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Thông tin khách hàng
                        </p>
                        <form class="forms-sample">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email</label>
                                <input type="email" class="form-control" id="email" name="email" placeholder="Email">
                            </div>
                            <div class="form-group">
                                <label for="exampleInputPassword4">Mật khẩu</label>
                                <input type="password" class="form-control" id="password" name="password" placeholder="Password">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label for="exampleSelectGender">Giới tính</label>
                                    <select class="form-control" id="exampleSelectGender">
                                        <option>Nam</option>
                                        <option>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày sinh</label>
                                    <input type="datetime" class="form-control" id="datebirth" name="datebirth">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label>Quyền truy cập</label>
                                <input type="tel" class="form-control" id="role" name="role">
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>

        </div>
    </div>