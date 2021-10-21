

<!--Login-->
<div class="site-section">
    <div class="container" id="containerfrm">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black"><?= $data['page_title'] ?></h2>
            </div>
            <div class="col-md-12" style="margin-top:-20px;">
                <p>Don't have an account? <a href="<?=ROOT?>signup"> Click here</a> to sign up</p>
                <form method="post" name="Login" onsubmit="return validate()">
                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label class="text-black">Email&nbsp;<span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email" name="email" value="<?php echo isset($_POST['email']) ? $_POST['email'] : null ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Password&nbsp;<span class="text-danger">*</span></label>
                                <input type="password" class="form-control" id="password" name="password">
                                <p id="error_email" style="font-family: 'Raleway', sans-serif;" class="text-danger"><?php echo checkError(); ?></p>
                            </div>
                            
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <span>
                                    <input type="checkbox" name="remember"> Remember me
                                </span>
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" id="btnSubmit" class="btn btn-primary btn-lg btn-block" value="Submit">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!--//Login-->

<!--Offices-->
<div class="site-section bg-primary">
    <div class="container">
        <div class="row">
            <div class="col-12">
                <h2 class="text-white mb-4">Offices</h2>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">New York</span>
                    <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">London</span>
                    <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                </div>
            </div>
            <div class="col-lg-4">
                <div class="p-4 bg-white mb-3 rounded">
                    <span class="d-block text-black h6 text-uppercase">Canada</span>
                    <p class="mb-0">203 Fake St. Mountain View, San Francisco, California, USA</p>
                </div>
            </div>
        </div>
    </div>

</div>
<!--//Offices-->

<style>
    #containerfrm{
        width: 40%;
        margin: 0 auto;
        margin-top: -65px;
    }
    #btnSubmit{
        width: 40%;
        margin: 0 auto;
    }
</style>

<!-- Javascript -->
<script>
    function validate() {

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

        //check pass
        var pass = document.getElementById("password").value;
        if (pass == "") {
            alert("Hãy điền mật khẩu!");
            return false;
        }
    }
    function validateEmail(input_str) {
            var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
            return re.test(input_str);
        }
</script>
<!-- //Javascript -->