<!--Title Box-->
<?php require 'title_box.php' ?>
<!--//Title Box-->

<!-- Main Content -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black"><?= $data['page_title'] ?></h2>
            </div>
            <div class="col-md-12">
                <p>Returning customer? <a href="<?= ROOT ?>login">Click here</a> to login</p>

                <form method="post" name="SignUp" onsubmit="return validate()">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Fullname&nbsp;<span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="fullname" name="fullname" value="<?php echo isset($_POST['fullname']) ? $_POST['fullname'] : ''  ?>">
                                <p class="text-danger" style="font-family: 'Raleway', sans-serif;"  id="err_name"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-6">
                                <label class="text-black">Gender</label>
                                <select id="gender" name="gender" class="form-control">
                                    <option value="select">Select a Gender</option>
                                    <option value="1">Male</option>
                                    <option value="0">Female</option>
                                    <option value="">Other</option>
                                </select>
                            </div>
                            <div class="col-md-6">
                                <label class="text-black">Date of Birth:</label>
                                <input type="date" class="form-control" id="datebirth" name="datebirth" value="<?php echo isset($_POST['datebirth']) ? $_POST['datebirth'] : ''  ?>">
                            </div>

                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Phone Number&nbsp;</label>
                                <input type="tel" class="form-control" id="phone" name="phone" value="<?php echo isset($_POST['phone']) ? $_POST['phone'] : ''  ?>">
                                <p class="text-danger" style="font-family: 'Raleway', sans-serif;"  id="err_tel"></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Email&nbsp;<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : ''  ?>">
                                <p id="error_email" style="font-family: 'Raleway', sans-serif;" class="text-danger"><?php echo checkError(); ?></p>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Password &nbsp;<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                                <p class="text-danger" style="font-family: 'Raleway', sans-serif;"  id="err_pass"></p>                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">RePassword &nbsp;<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="repassword" name="repassword">
                                <p class="text-danger" style="font-family: 'Raleway', sans-serif;"  id="err_repass"></p>                            
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_address" class="text-black">Address</label>
                                <input type="text" class="form-control" id="address" name="address" value="<?php echo isset($_POST['address']) ? $_POST['address'] : ''  ?>">
                            </div>
                            <p>&nbsp;&nbsp;&nbsp;&nbsp;By creating an account you agree to our <b>Terms & Privacy</b>.</p>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>
        </div>
    </div>
</div>
<!-- //Main Content -->

<!-- Javascript -->
<script>
    function validate() {

        //check name
        var name = document.forms["SignUp"]["fullname"].value;
        if (name == "") {
            alert("Hãy điền tên của bạn!");
            return false;
        }
        if (!(/^[A-Za-z\s]+$/.test(name))) {
            document.getElementById( "err_name" ).innerHTML = "Tên không hợp lệ!";
            return false;
        }
        //check gender
        if (document.getElementById("gender").value == "select") {
            alert("Hãy chọn giới tính!");
            return false;
        }

        //check date of birth
        if (document.getElementById("datebirth").value == "") {
            alert("Hãy chọn ngày sinh!");
            return false;
        }

        //check phone
        var phone = document.forms["SignUp"]["phone"].value;
        if (!(/^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im.test(phone))) {
            document.getElementById( "err_tel" ).innerHTML = "Số điện thoại không hợp lệ!";
            return false;
        }

        //check address
        if (document.getElementById("address").value == "") {
            alert("Hãy điền địa chỉ!");
            return false;
        }

        //check pass
        var pass = document.getElementById("password").value;
        var repass = document.getElementById("repassword").value;
        if (pass == "") {
            alert("Hãy điền mật khẩu!");
            return false;
        } else if (pass.length < 8) {
            document.getElementById( "err_pass" ).innerHTML = "Mật khẩu không được ít hơn 8 kí tự!";
            return false;

        } else if (repass == "") {
            alert("Hãy nhập lại mật khẩu!");
            return false;

        } else if (pass != repass) {
            document.getElementById( "err_repass" ).innerHTML = "Nhập lại mật khẩu không đúng. Hãy nhập lại!";
            return false;
        }

        //check email
        var email = document.getElementById("email").value;
        if (email == "") {
            alert("Hãy nhập email!");
            return false;
        }
        if (!validateEmail(email)) {
            alert("Email không hợp lệ!");
            return false;
        }
    }

    function validatePhoneNumber(input_str) {
        var re = /^[\+]?[(]?[0-9]{3}[)]?[-\s\.]?[0-9]{3}[-\s\.]?[0-9]{4,6}$/im;
        return re.test(input_str);
    }

    function validateEmail(input_str) {
        var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return re.test(input_str);
    }
</script>
<!-- //Javascript -->