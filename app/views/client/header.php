<!DOCTYPE html>
<html lang="en">

<head>
  <title><?= $data['page_title'] ?> - <?= WEBSITE_TITLE ?></title>
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">

  <link rel="shortcut icon" href="<?= ASSETS ?>images/medicine.png" />

  <link href="https://fonts.googleapis.com/css?family=Rubik:400,700|Crimson+Text:400,400i" rel="stylesheet">
  <link rel="stylesheet" href="<?= ASSETS ?>fonts/icomoon/style.css">

  <link rel="preconnect" href="https://fonts.googleapis.com">
  <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin>
  <link href="https://fonts.googleapis.com/css2?family=Raleway:wght@500&display=swap" rel="stylesheet">

  <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/5.15.1/css/all.min.css" />

  <link rel="stylesheet" href="<?= ASSETS ?>css/bootstrap.min.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/magnific-popup.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/jquery-ui.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/owl.carousel.min.css">
  <link rel="stylesheet" href="<?= ASSETS ?>css/owl.theme.default.min.css">

  <link rel="stylesheet" href="<?= ASSETS ?>css/aos.css">

  <link rel="stylesheet" href="<?= ASSETS ?>css/style.css">

</head>
<body>
  <div class="site-wrap">
    <div class="site-navbar py-2">
      <!--Search-->
      <?php if (isset($data['show_search'])) { ?>
        <div class="search-wrap">
          <div class="container">
            <a href="#" class="search-close js-search-close"><span class="icon-close2"></span></a>
            <form method="get">
              <input type="text" name="keyword" class="form-control" placeholder="Search keyword and hit enter...">
            </form>
          </div>
        </div>
      <?php } ?>
      <!--//Search-->

      <div class="container">
        <div class="d-flex align-items-center justify-content-between">
          <div class="logo">
            <div class="site-logo">
              <a href="<?= ROOT ?>index" class="js-logo-clone"><?= WEBSITE_TITLE ?></a>
            </div>
          </div>
          <div class="main-nav d-none d-lg-block">
            <nav class="site-navigation text-right text-md-center" role="navigation">
              <ul class="site-menu js-clone-nav d-none d-lg-block">
                <li class="active"><a href="<?= ROOT ?>index">Home</a></li>
                <li><a href="<?= ROOT ?>shop">Store</a></li>

                <!--Product List-->
                <li class="has-children">
                  <a href="#">Product List</a>
                  <ul class="dropdown">
                    <?php if (isset($data['product_mix']) && is_array($data['product_mix'])) : ?>
                      <?php foreach ($data['product_mix'] as $mix) : ?>
                        <li><a href="<?= ROOT . "shop/category/" . $mix->id ?>" style="font-family: 'Raleway', sans-serif;"><?= $mix->name ?></a></li>
                      <?php endforeach; ?>
                    <?php endif; ?>

                  </ul>
                </li>
                <!-- //Product List-->

                <li><a href="<?= ROOT ?>about">About</a></li>
                <li><a href="<?= ROOT ?>contact">Contact</a></li>
                <li style="font-family: 'Raleway', sans-serif;color:#224242">
                  <?php
                  if (isset($_SESSION['user']) && $_SESSION['user'] != "") {
                    echo '<i class="fas fa-user-circle"></i>&nbsp;<a href="profile">' . $_SESSION['user']->name . "</a>";
                  } ?>
                </li>
              </ul>
            </nav>
          </div>
          <div class="icons">
            <!--Icon search-->
            <?php if (isset($data['show_search'])) { ?>
              <a href="#" class="icons-btn d-inline-block js-search-open"><span class="icon-search"></span></a>
            <?php } ?>
            <!--//Icon search-->

            <!--Icon cart-->
            <a href="<?= ROOT ?>cart" class="icons-btn d-inline-block bag">
              <span class="icon-shopping-bag"></span>
              <span class="number">
                <?php if (isset($_SESSION['number']) && $_SESSION['number'] != "") {
                  echo $_SESSION['number'];
                } else {
                  echo '0';
                } ?>
              </span>
            </a>
            <!--//Icon cart-->

            <!--Login-->
            <?php if (isset($_SESSION['user']) && $_SESSION['user'] != "") { ?>
              <i style="color:black;" class="fas fa-sign-out-alt"></i>&nbsp;<a href="<?= ROOT ?>logout">Logout</a>
            <?php } else { ?>
              <i style="color:black;" class="fas fa-sign-in-alt"></i>&nbsp;<a href="<?= ROOT ?>login">Login | </a><a href="<?= ROOT ?>signup">Sign Up</a>
            <?php } ?>
            <!--Logout-->

            <a href="#" class="site-menu-toggle js-menu-toggle ml-3 d-inline-block d-lg-none"><span class="icon-menu"></span></a>
          </div>
        </div>
      </div>
    </div>