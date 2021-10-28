<nav class="sidebar sidebar-offcanvas" id="sidebar">
  <ul class="nav">
    <li class="nav-item">
      <a class="nav-link" href="<?= ROOT ?>admin/home">
        <i class="icon-grid menu-icon"></i>
        <span class="menu-title">Trang chủ</span>
      </a>
    </li>
    <!--Product-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#product" aria-expanded="false" aria-controls="product">
        <i class="mdi mdi-checkbox-multiple-blank-outline"></i>&nbsp;&nbsp;
        <span class="menu-title">Sản phẩm</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="product">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/product">Xem</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/add_product">Thêm</a></li>
        </ul>
      </div>
    </li>
    <!--//Product-->

    <!--Brand-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#brand" aria-expanded="false" aria-controls="brand">
        <i class="mdi mdi-blogger"></i>&nbsp;&nbsp;
        <span class="menu-title">Thương hiệu</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="brand">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/brand">Xem</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/brand?action=add">Thêm</a></li>
        </ul>
      </div>
    </li>
    <!--//Brand-->

    <!--Order-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#order" aria-expanded="false" aria-controls="order">
        <i class="mdi mdi-cart"></i> &nbsp;&nbsp;
        <span class="menu-title">Đơn hàng</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="order">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/order">Xem</a></li>
          <li class="nav-item"> <a class="nav-link" href="">Thêm</a></li>

        </ul>
      </div>
    </li>
    <!--//Order-->

    <!--User-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#user" aria-expanded="false" aria-controls="user">
        <i class="mdi mdi-account"></i>&nbsp;&nbsp;
        <span class="menu-title">Khách hàng</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="user">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/user">Xem</a></li>
        </ul>
      </div>
    </li>
    <!--//User-->

    <!--Contact-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#contact" aria-expanded="false" aria-controls="contact">
        <i class="mdi mdi-contact-mail"></i>&nbsp;&nbsp;
        <span class="menu-title">Liên hệ</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="contact">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/contact">Xem</a></li>
        </ul>
      </div>
    </li>
    <!--//Contact-->

    <!--Category-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#cate" aria-expanded="false" aria-controls="cate">
        <i class="mdi mdi-file-document"></i> &nbsp;&nbsp;
        <span class="menu-title">Thể loại</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="cate">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/category">Xem</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/category?action=add">Thêm</a></li>

        </ul>
      </div>
    </li>
    <!--//Category-->

    <!--List-->
    <li class="nav-item">
      <a class="nav-link" data-toggle="collapse" href="#tables" aria-expanded="false" aria-controls="tables">
        <i class="mdi mdi-checkbox-multiple-blank"></i> &nbsp;&nbsp;
        <span class="menu-title">Danh mục</span>
        <i class="menu-arrow"></i>
      </a>
      <div class="collapse" id="tables">
        <ul class="nav flex-column sub-menu">
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/mix">Xem</a></li>
          <li class="nav-item"> <a class="nav-link" href="<?= ROOT ?>admin/mix?action=add">Thêm</a></li>
        </ul>
      </div>
    </li>
    <!--//List-->
  </ul>
</nav>