<div class="main-panel">
    <div class="content-wrapper">
        <div class="row">
            <div class="col-12 grid-margin stretch-card">
                <div class="card">
                    <div class="card-body">
                        <h4 class="card-title"><?= ucwords($data['page_title']) ?></h4>
                        <p class="card-description">
                            Sửa thông tin khách hàng
                        </p>
                        <form class="forms-sample" method="POST" onsubmit="return validate()">
                            <div class="form-group">
                                <label>Họ và tên</label>
                                <input type="text" value="<?= $data['row']->name ?>" class="form-control" id="name" name="name" placeholder="Name">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ email</label>
                                <input type="email" value="<?= $data['row']->email ?>" class="form-control" id="email" name="email" placeholder="Email">
                                <input type="hidden" name="user_id" value="<?=  $data['row']->id?>">
                            </div>
                            <div class="form-group">
                                <label>Mật khẩu</label>
                                <input type="password" value="<?= $data['row']->password ?>" class="form-control" id="password" name="password" placeholder="Password">
                                <input type="hidden" value="<?= $data['row']->password ?>" class="form-control"  name="old_password" placeholder="Password">
                            </div>
                            <div class="form-group row">
                                <div class="col-md-6">
                                    <label>Giới tính</label>
                                    <select class="form-control" id="gender" name="gender">
                                        <option value="1" <?= ($data['row']->gender == 1) ? 'selected' : ""?>>Nam</option>
                                        <option value="0" <?= ($data['row']->gender == 0) ? 'selected' : ""?>>Nữ</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label>Ngày sinh</label>
                                    <input type="date" value="<?= $data['row']->datebirth ?>" class="form-control" id="datebirth" name="datebirth">
                                </div>
                            </div>
                            <div class="form-group">
                                <label>Số điện thoại</label>
                                <input type="tel" value="<?= $data['row']->phone ?>" class="form-control" id="phone" name="phone">
                            </div>
                            <div class="form-group">
                                <label>Địa chỉ</label>
                                <input type="text" value="<?= $data['row']->address ?>" class="form-control" id="address" name="address">
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
        //check name
        var name = document.getElementById("name").value;
        if (name == "") {
            alert("Hãy điền tên !");
            return false;
        }
        
        if (validateName(name)) {
            alert("Tên không hợp lệ!");
            return false;
        }

        //check email
        var email = document.getElementById("email").value;
        if ( email == "") {
            alert("Hãy nhập email!");
            return false;
        }
        if (!validateEmail(email)) {
            alert("Email không hợp lệ!");
            return false;
        }

        //check password
        var pass = document.getElementById("password").value;      
        if (pass == "") {
            alert("Hãy điền mật khẩu!");
            return false;
        } else if (pass.length < 8) {
            alert("Mật khẩu không được ít hơn 8 kí tự!");
            return false;
        }

        
        //check date of birth
        if (document.getElementById("datebirth").value == "") {
            alert("Hãy nhập ngày sinh!");
            return false;
        }
        if (document.getElementById("address").value == "") {
            alert("Hãy nhập địa chỉ!");
            return false;
        }

        //check phone
        var phone = document.getElementById("phone").value;
        if (phone == "") {
            alert("Hãy nhập điện thoại!");
            return false;
        }
        if (!validatePhoneNumber(phone)) {
            alert("Điện thoại không hợp lệ!");
            return false;
        }
 
        
    }

    function validatePhoneNumber(input_str) {
        var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        return re.test(input_str);
    }

    function validateName(input_str) {
        var re = /^\d+/g;
        return re.test(input_str);
    }

    function validateEmail(input_str) {
        // var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        var re = /^(([^<>()[\]\\.,;:\s@"]+(\.[^<>()[\]\\.,;:\s@"]+)*)|(".+"))@((\[[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\.[0-9]{1,3}\])|(([a-zA-Z\-0-9]+\.)+[a-zA-Z]{2,}))$/;
        return re.test(input_str);
    }
</script>
<!-- //Javascript -->