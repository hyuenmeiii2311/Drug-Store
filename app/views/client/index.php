

<!-- Main Content -->
<div class="site-blocks-cover" style="background-image: url('<?= ASSETS ?>images/hero_1.jpg');">
  <div class="container">
    <div class="row">
      <div class="col-lg-7 mx-auto order-lg-2 align-self-center">
        <div class="site-block-cover-content text-center">
          <h2 class="sub-title">Effective Medicine, New Medicine Everyday</h2>
          <h1>Welcome To Pharma</h1>
          <p>
            <a href="<?=ROOT?>shop" class="btn btn-primary px-5 py-3">Shop Now</a>
          </p>
        </div>
      </div>
    </div>
  </div>
</div>

<div class="site-section">
  <div class="container">
    <div class="row align-items-stretch section-overlap">
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="banner-wrap bg-primary h-100">
          <a href="#" class="h-100">
            <h5>Free <br> Shipping</h5>
            <p>
              Amet sit amet dolor
              <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
            </p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="banner-wrap h-100">
          <a href="#" class="h-100">
            <h5>Season <br> Sale 50% Off</h5>
            <p>
              Amet sit amet dolor
              <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
            </p>
          </a>
        </div>
      </div>
      <div class="col-md-6 col-lg-4 mb-4 mb-lg-0">
        <div class="banner-wrap bg-warning h-100">
          <a href="#" class="h-100">
            <h5>Buy <br> A Gift Card</h5>
            <p>
              Amet sit amet dolor
              <strong>Lorem, ipsum dolor sit amet consectetur adipisicing.</strong>
            </p>
          </a>
        </div>
      </div>

    </div>
  </div>
</div>

<!-- Popular Products-->
<div class="site-section">
  <div class="container">
    <div class="row">
      <div class="title-section text-center col-12">
        <h2 class="text-uppercase">Popular Products</h2>
      </div>
    </div>

    <div class="row">
      <div class="col-sm-6 col-lg-4 text-center item mb-4">
        <span class="tag">Sale</span>
        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_01.png" alt="Image"></a>
        <h3 class="text-dark"><a href="<?=ROOT?>detail">Bioderma</a></h3>
        <p class="price"><del>95.00</del> &mdash; $55.00</p>
      </div>
      <div class="col-sm-6 col-lg-4 text-center item mb-4">
        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_02.png" alt="Image"></a>
        <h3 class="text-dark"><a href="detail">Chanca Piedra</a></h3>
        <p class="price">$70.00</p>
      </div>
      <div class="col-sm-6 col-lg-4 text-center item mb-4">
        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_03.png" alt="Image"></a>
        <h3 class="text-dark"><a href="<?=ROOT?>detail">Umcka Cold Care</a></h3>
        <p class="price">$120.00</p>
      </div>

      <div class="col-sm-6 col-lg-4 text-center item mb-4">

        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_04.png" alt="Image"></a>
        <h3 class="text-dark"><a href="<?=ROOT?>detail">Cetyl Pure</a></h3>
        <p class="price"><del>45.00</del> &mdash; $20.00</p>
      </div>
      <div class="col-sm-6 col-lg-4 text-center item mb-4">
        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_05.png" alt="Image"></a>
        <h3 class="text-dark"><a href="<?=ROOT?>detail">CLA Core</a></h3>
        <p class="price">$38.00</p>
      </div>
      <div class="col-sm-6 col-lg-4 text-center item mb-4">
        <span class="tag">Sale</span>
        <a href="<?=ROOT?>detail"> <img src="<?= ASSETS ?>images/product_06.png" alt="Image"></a>
        <h3 class="text-dark"><a href="<?=ROOT?>detail">Poo Pourri</a></h3>
        <p class="price"><del>$89</del> &mdash; $38.00</p>
      </div>
    </div>
    <div class="row mt-5">
      <div class="col-12 text-center">
        <a href="<?=ROOT?>shop" class="btn btn-primary px-4 py-3">View All Products</a>
      </div>
    </div>
  </div>
</div>
<!-- Popular Products-->

<!--New products-->
<?php if (isset($data['new_products'])) {?>
<div class="site-section bg-light">
  <div class="container">
    <div class="row">
      <div class="title-section text-center col-12">
        <h2 class="text-uppercase">New products</h2>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 block-3 products-wrap">
        <div class="nonloop-block-3 owl-carousel">

        <?php foreach ($data['new_products'] as $item) :?>
          <div class="text-center item mb-4">
            <a href="<?=ROOT?>detail/<?= $item->id?>"> <img src="<?= ASSETS ."images/". $item->image;?>" alt="Related Product's Image" class="img-related"></a>
            <p class="product-name"><a href="<?=ROOT?>detail/<?= $item->id?>" style="color: black;"><?= $item->name; ?></a></p>
          </div>
        <?php endforeach; ?>

        </div>
      </div>
    </div>
  </div>
</div>
<?php } ?> <!--endif-->
<!--New products-->


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
    .product-price {
        color: black;
        font-size: 23px;
    }

    #font-unicode {
        font-family: 'Raleway', sans-serif;
    }
    .img-related{
        width: 80px;
        height: 350px;
    }
    .product-name{
        font-family: 'Raleway', sans-serif;
        color: black;
        font-weight:bold;
        font-size:17px;

    }
</style>

