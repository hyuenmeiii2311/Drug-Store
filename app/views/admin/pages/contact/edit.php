<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Thông tin liên lạc
                        </p>
                        <form class="forms-sample">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Mã người dùng</label>
                                    <input type="text" class="form-control" id="user_id" name="user_id">
                                </div>
                                <div class="col-md-6">
                                    <label>Địa chỉ email</label>
                                    <input type="email" class="form-control" id="email" name="email">

                                </div>
                            </div>
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Tiêu đề</label>
                                    <input type="email" class="form-control" id="subject" name="subject">
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày gửi</label>
                                    <input type="datetime" class="form-control" id="created_date" name="created_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea class="form-control" id="message" name="message" rows="5"></textarea>
                            </div>
                            <button type="submit" class="btn btn-primary mr-2">Submit</button>
                            <button class="btn btn-light">Cancel</button>
                        </form>
                    </div>
                </div>
            </div>
        </div>
    </div>