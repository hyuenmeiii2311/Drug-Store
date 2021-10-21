<!--Title Box-->
<?php require 'title_box.php' ?>
<!--//Title Box-->

<!-- Main Content -->
<div class="site-section">
    <div class="container">
        <div class="row">
            <!--Sidebar-->
            <?php require 'sidebar.php' ?>
            <!--Sidebar-->

            <div class="float-right" style="width : 77%;margin-left: 30px;">
                <!-- Filter-->
                <div class="row">
                    <div class="col-lg-6">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Price</h3>
                        <div id="slider-range" class="border-primary"></div>
                        <input type="text" name="text" id="amount" onchange="test()" class="form-control border-0 pl-0 bg-white" disabled="" />
                    </div>
                    <div class="col-lg-6">
                        <h3 class="mb-3 h6 text-uppercase text-black d-block">Filter by Reference</h3>
                        <button type="button" class="btn btn-secondary btn-md dropdown-toggle px-4" id="dropdownMenuReference" data-toggle="dropdown">Reference</button>
                        <div class="dropdown-menu" aria-labelledby="dropdownMenuReference">
                            <a class="dropdown-item" href="#">Relevance</a>
                            <a class="dropdown-item" href="<?= ROOT . "shop/name_a" ?>">Name, A to Z</a>
                            <a class="dropdown-item" href="#">Name, Z to A</a>
                            <div class="dropdown-divider"></div>
                            <a class="dropdown-item" href="#">Price, low to high</a>
                            <a class="dropdown-item" href="#">Price, high to low</a>
                        </div>
                    </div>
                </div>
                <!-- //Filter-->

                <!-- Product -->
                <div class="row">
                    <?php if (isset($data['products']) && is_array($data['products'])) : ?>
                        <?php foreach ($data['products'] as $item) : ?>
                            <?php require 'single_product.php' ?>
                        <?php endforeach; ?>
                    <?php else : ?>
                        <?php require 'product_not_found.php' ?>
                    <?php endif; ?>
                </div>
                <!-- //Product -->
            </div>
        </div>

        <!--Paging -->
        <?php require 'paging.php' ?>
        <!--//Paging -->
    </div>
</div>

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

<!-- //Main Content -->

<style>
    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }

    .list-group-item {
        border: none;
        padding: 5px 20px;
        font-size: 16px;
    }

    .list-group-item[data-toggle="collapse"]::after {
        width: 0;
        height: 0;
        position: absolute;
        top: calc(50% - 12px);
        right: 10px;
        content: '';
        -webkit-transition: top .2s, -webkit-transform .2s;
        transition: top .2s, -webkit-transform .2s;
        transition: transform .2s, top .2s;
        transition: transform .2s, top .2s, -webkit-transform .2s;
        font-family: 'Raleway', sans-serif;
    }

    .list-group-tree .list-group-collapse .list-group {
        margin-left: 25px;
        border-left: 1px solid #ced4da;
    }

    .list-group-tree .list-group-item.active {
        color: #51eaea;
        background-color: #fff;
        font-weight: 700;
    }

    .list-group-tree .list-group-collapse .list-group>.list-group-item::before {
        position: absolute;
        top: 14px;
        left: 0;
        content: '';
        width: 8px;
        height: 1px;
        background-color: #ced4da;
    }

    .list-group-tree .list-group-item:hover {
        color: #51eaea;
        background-color: #fff;
        outline: 0;
        font-weight: 700;
    }

    .title-left {
        font-size: 16px;
        border-bottom: 3px solid #000000;
        margin-bottom: 20px;
    }

    .title-left h3 {
        font-weight: 700;
        color: #000000;
    }
</style>
<script>
    $(document).ready(function() {
        $("input[name='amount']").change(function(){
            var amount = document.getElementById("amount");
            alert(amount);
        });

    });

    function test() {
        var amount = document.getElementById("amount");
        alert(amount);
    }
</script>