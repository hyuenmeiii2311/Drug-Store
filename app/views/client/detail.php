<!--Title Box-->
<?php require 'title_box.php' ?>
<!--//Title Box-->

<!-- Product Detail-->
<div class="site-section">
    <div class="container">
        <div class="row">
            <?php if (isset($data['product'])) : ?>
                <div class="col-md-5 mr-auto">
                    <div class="border text-center">
                        <img src="<?= ASSETS . "images/" . $data['product']->image; ?>" alt="Image" class="img-fluid p-5">
                    </div>
                </div>
                <div class="col-md-6">
                    <h2 class="text-black"><?= $data['product']->name ?></h2>
                    <p id="font-unicode">Thương hiệu : <?= $data['product_brand']->name ?> | Số lượng : <?= $data['product']->quantity ?></p>
                    <p class="weight-unit"><?= $data['product']->weight . "&nbsp;" . $data['product']->unit ?></p>
                    <p>
                        <!--<del>$95.00</del>--> <strong class="product-price"><?= number_format($data['product']->price) ?> vnđ</strong>
                    </p>
                    <p id="font-unicode"><?= $data['product']->description ?></p>
                    <form method="POST">
                        <div class="mb-5">
                            <div class="input-group mb-3" style="max-width: 220px;">
                                <div class="input-group-prepend">
                                    <!-- <button class="btn btn-outline-primary js-btn-minus" type="button">&minus;</button> -->
                                </div>
                                <input  type="number" class="form-control text-center" min="1" max="<?= $data['product']->quantity ?>" name="quantity" value="1" placeholder="" aria-label="Example text with button addon" aria-describedby="button-addon1">
                                <div class="input-group-append">
                                    <!-- <button class="btn btn-outline-primary js-btn-plus" type="button">&plus;</button> -->
                                </div>
                            </div>

                        </div>
                        <button type="submit" class="buy-now btn btn-sm height-auto px-4 py-3 btn-primary">Add To Cart</button>
                    </form>
                </div>
            <?php endif; ?>
        </div>
    </div>
</div>
<!-- // Product Detail-->

<!-- Related Products-->
<?php if (isset($data['related_products']) && $data['related_products'] != false) { ?>
    <div class="site-section bg-light">
        <div class="container">
            <div class="row">
                <div class="title-section text-center col-12">
                    <h2 class="text-uppercase" style="font-family: 'Raleway', sans-serif;">Sản phẩm liên quan</h2>
                </div>
            </div>
            <div class="row">
                <div class="col-md-12 block-3 products-wrap">
                    <div class="nonloop-block-3 owl-carousel">

                        <?php foreach ($data['related_products'] as $item) : ?>
                            <div class="text-center item mb-4">
                                <a href="<?= ROOT ?>detail/<?= $item->id ?>"> <img src="<?= ASSETS . "images/" . $item->image; ?>" alt="Related Product's Image" class="img-related"></a>
                                <p class="product-name"><a href="<?= ROOT ?>detail/<?= $item->id ?>" style="color: black;"><?= $item->name; ?></a></p>
                            </div>
                        <?php endforeach; ?>

                    </div>
                </div>
            </div>
        </div>
    </div>
<?php } else {
    require 'product_not_found.php';
} ?>
<!-- //Related Products-->


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
    .weight-unit {
        font-family: 'Raleway', sans-serif;
        color: black;
        font-size: 15px;
        font-weight: 600;
        border: 2px solid #51eaea;
        border-radius: 8px;
        padding: 5px;
        width: fit-content;
    }

    .product-price {
        color: black;
        font-size: 23px;
    }

    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }

    .img-related {
        width: 80px;
        height: 350px;
    }

    .product-name {
        font-family: 'Raleway', sans-serif;
        color: black;
        font-weight: bold;
        font-size: 17px;

    }
</style>
