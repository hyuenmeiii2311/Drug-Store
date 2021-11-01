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
                        <form class="forms-sample" method="POST" onsubmit="return validate()">
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Địa chỉ email</label>
                                    <input type="email" value="<?= $data['row']->email ?>" disabled class="form-control" id="email" name="email">
                                    <input type="hidden" name="contact_id" value="<?=  $data['row']->id?>">
                                
                                </div>
                                <div class="col-md-6">
                                    <label>Trạng thái</label>
                                    <select class="js-example-basic-single w-100" name="status">
                                        <option <?php ($data['row']->status == 0) ? 'selected"' : ""?> value="0">Chưa trả lời</option>
                                        <option <?php ($data['row']->status == 1) ? "selected" : ""?> value="1">Đã trả lời</option>
                                    </select>
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" value="<?= $data['row']->name ?>" disabled class="form-control" id="name" name="name">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Tiêu đề</label>
                                    <input type="text" value="<?= $data['row']->subject ?>" disabled class="form-control" id="subject" name="subject">
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày gửi</label>
                                    <input type="datetime" value="<?= $data['row']->created_date ?>" disabled class="form-control" id="created_date" name="created_date">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Nội dung</label>
                                <textarea disabled class="form-control" id="message" name="message" rows="5"><?= $data['row']->message ?></textarea>
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
            var status = document.getElementById("status").value;
            if (status == "") {
                alert("Hãy điền trạng thái !");
                return false;
            }
        }
    </script>
    <!-- //Javascript -->