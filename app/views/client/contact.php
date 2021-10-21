<!--Title Box-->
<?php require 'title_box.php' ?>
<!--//Title Box-->

<!-- Main Content -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <div class="col-md-12">
                <h2 class="h3 mb-5 text-black">Get In Touch</h2>
            </div>
            <div class="col-md-12">

                <form action="#" method="post" name="Contact" onsubmit="return validate()">

                    <div class="p-3 p-lg-5 border">
                        <div class="form-group row">
                            <?php if(isset($_GET['success']) && $_GET['success'] != '') :?>
                            <div class="alert alert-success">
                                <strong>Sent Successfully!</strong> We will rely to you as soon as possible. Thanks for contacting us.
                            </div>
                            <?php endif;?>

                            <div class="col-md-6">
                                <label for="c_fname" class="text-black">First Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_fname" name="c_fname" pattern="/^[A-z ]$/" value="<?php echo isset($_POST['c_fname']) ? $_POST['c_fname'] : ''  ?>">
                            </div>
                            <div class="col-md-6">
                                <label for="c_lname" class="text-black">Last Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="c_lname" name="c_lname" value="<?php echo isset($_POST['c_lname']) ? $_POST['c_lname'] : ''  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_email" class="text-black">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="c_email" name="c_email" placeholder="" value="<?php echo isset($_POST['c_email']) ? $_POST['c_email'] : ''  ?>">
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_subject" class="text-black">Subject </label>
                                <input type="text" class="form-control" id="c_subject" name="c_subject" value="<?php echo isset($_POST['c_subject']) ? $_POST['c_subject'] : ''  ?>">
                            </div>
                        </div>

                        <div class="form-group row">
                            <div class="col-md-12">
                                <label for="c_message" class="text-black">Message </label>
                                <textarea name="c_message" id="c_message" cols="30" rows="7" class="form-control" value="<?php echo isset($_POST['c_message']) ? $_POST['c_message'] : ''  ?>"></textarea>
                            </div>
                        </div>
                        <div class="form-group row">
                            <div class="col-lg-12">
                                <input type="submit" class="btn btn-primary btn-lg btn-block" onclick="validate()" value="Send Message">
                            </div>
                        </div>
                    </div>
                </form>
            </div>

        </div>
    </div>
</div>
<!-- //Main Content -->

<div class="site-section bg-secondary bg-image" style="background-image: url('<?= ASSETS ?>images/bg_2.jpg');">
    <div class="container">
        <div class="row align-items-stretch">
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= ASSETS ?>images/bg_1.jpg');">
                    <div class="banner-1-inner align-self-center">
                        <h2>Pharma Products</h2>
                        <p id="font-unicode">Trước khi đến tay bạn, các sản phẩm sẽ được kiểm tra và đóng gói bởi các dược sĩ có kinh nghiệm.</p>
                    </div>
                </a>
            </div>
            <div class="col-lg-6 mb-5 mb-lg-0">
                <a href="#" class="banner-1 h-100 d-flex" style="background-image: url('<?= ASSETS ?>images/bg_2.jpg');">
                    <div class="banner-1-inner ml-auto  align-self-center">
                        <h2>Rated by Experts</h2>
                        <p id="font-unicode">Đảm bảo 100% thuốc chính hãng, được kiểm duyệt bởi Bộ Y Tế, và có hạn sử dụng xa.
                        </p>
                    </div>
                </a>
            </div>
        </div>
    </div>
</div>



<style>
    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }
</style>

<!-- Javascript -->
<script>
    function validate() {
        //check name
        var first_name = document.forms["Contact"]["c_fname"].value;
        var last_name = document.forms["Contact"]["c_lname"].value;

        // if (first_name == "") {
        //     alert("Enter your first name!");
        //     return false;
        // }
        // if (!validateName(first_name)) {
        //     alert("Please enter a valid first name.");
        //     return false;
        // }

        // if (last_name == "") {
        //     alert("Enter your last name!");
        //     return false;
        // }
        // if (!validateName(last_name)) {
        //     alert("Please enter a valid last name. ");
        //     return false;
        // }

        // //check email
        // var email = document.getElementById("c_email").value;
        // if (email == "") {
        //     alert("Enter your email!");
        //     return false;
        // }
        // if (!validateEmail(email)) {
        //     alert("Your email is invalid!");
        //     return false;
        // }

        // //check subject
        // var subject = document.forms["Contact"]["c_subject"].value;
        // if (subject == "") {
        //     alert("Enter subject!");
        //     return false;
        // }

        // //check subject
        // var msg = document.forms["Contact"]["c_message"].value;
        // if (msg == "") {
        //     alert("Enter message!");
        //     return false;
        // }
    }

    function validateName(input_str) {
        return /^[A-Za-z\s]+$/.test(input_str);
    }

    function validateEmail(input_str) {
        var re = /^\w+([\.-]?\w+)*@\w+([\.-]?\w+)*(\.\w{2,3})+$/;
        return re.test(input_str);
    }
</script>
<!-- //Javascript -->