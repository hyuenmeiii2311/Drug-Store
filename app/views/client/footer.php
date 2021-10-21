<footer class="site-footer">
  <div class="container">
    <div class="row">
      <div class="col-md-6 col-lg-3 mb-4 mb-lg-0">

        <div class="block-7">
          <h3 class="footer-heading mb-4">About Us</h3>
          <p style="font-family: 'Raleway', sans-serif;">Pharma tận dụng nền tảng công nghệ tiên tiến nhằm mang đến người dùng trải nghiệm dịch vụ Nhà thuốc thân thiện. Đáp ứng nhanh chóng, tận tâm, và hoàn toàn trực tuyến.</p>
        </div>

      </div>
      <div class="col-lg-3 mx-auto mb-5 mb-lg-0">
        <h3 class="footer-heading mb-4">Quick Links</h3>
        <ul class="list-unstyled">
          <?php if (isset($data['product_mix']) && is_array($data['product_mix'])) : ?>
            <?php foreach ($data['product_mix'] as $mix) : ?>
              <li><a href="<?= ROOT . "shop/category/" . $mix->id ?>" style="font-family: 'Raleway', sans-serif;color:black;"><?= $mix->name ?></a></li>
            <?php endforeach; ?>
          <?php endif; ?>
        </ul>
      </div>

      <div class="col-md-6 col-lg-3">
        <div class="block-5 mb-5">
          <h3 class="footer-heading mb-4">Contact Info</h3>
          <ul class="list-unstyled">
            <li class="address">No.3 Cau Giay Street, Lang Thuong ward, Dong Da District, Hanoi, Vietnam</li>
            <li class="phone"><a href="#">(+084) 0829625989</a></li>
            <li class="email">nikkiletb2311@gmail.com</li>
          </ul>
        </div>


      </div>
    </div>
    <div class="row pt-5 mt-5 text-center">
      <div class="col-md-12">
        <p>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
          Copyright &copy;
          <script>
            document.write(new Date().getFullYear());
          </script> All rights reserved | This template is made
          with <i class="icon-heart" aria-hidden="true"></i> by <a href="https://colorlib.com" target="_blank" class="text-primary">Team 20 - CNTT3K59 - GTVT</a>
          <!-- Link back to Colorlib can't be removed. Template is licensed under CC BY 3.0. -->
        </p>
      </div>

    </div>
  </div>
</footer>
</div>

<script src="<?= ASSETS ?>js/jquery-3.3.1.min.js"></script>
<script src="<?= ASSETS ?>js/jquery-ui.js"></script>
<script src="<?= ASSETS ?>js/popper.min.js"></script>
<script src="<?= ASSETS ?>js/bootstrap.min.js"></script>
<script src="<?= ASSETS ?>js/owl.carousel.min.js"></script>
<script src="<?= ASSETS ?>js/jquery.magnific-popup.min.js"></script>
<script src="<?= ASSETS ?>js/aos.js"></script>

<script src="<?= ASSETS ?>js/main.js"></script>

</body>

</html>