</div>
<!-- page-body-wrapper ends -->
</div>
<!-- container-scroller -->

<!-- plugins:js -->
<script src="<?= ASSETS_ADMIN ?>vendors/js/vendor.bundle.base.js"></script>
<!-- endinject -->
<!-- Plugin js for this page -->
<script src="<?= ASSETS_ADMIN ?>vendors/chart.js/Chart.min.js"></script>
<script src="<?= ASSETS_ADMIN ?>vendors/datatables.net/jquery.dataTables.js"></script>
<script src="<?= ASSETS_ADMIN ?>vendors/datatables.net-bs4/dataTables.bootstrap4.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/dataTables.select.min.js"></script>

<!-- End plugin js for this page -->
<!-- inject:js -->
<script src="<?= ASSETS_ADMIN ?>js/off-canvas.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/hoverable-collapse.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/template.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/settings.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/todolist.js"></script>
<script src="<?= ASSETS_ADMIN ?>vendors/select2/select2.min.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/select2.js"></script>
<!-- endinject -->
<!-- Custom js for this page-->
<script src="<?= ASSETS_ADMIN ?>js/dashboard.js"></script>
<script src="<?= ASSETS_ADMIN ?>js/Chart.roundedBarCharts.js"></script>
<!-- End custom js for this page-->
<script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
<!-- alert deleted successfully-->
<?php if (isset($_SESSION['success']) && $_SESSION['success'] == "delete") : ?>
  <script>
    swal({
      title: "Success!",
      text: "You deleted successfully!",
      icon: "success",
      button: "Ok",
    });
  </script>
<?php
  unset($_SESSION['success']);
  endif;
?>
<!-- alert edited successfully-->
<?php if (isset($_SESSION['success']) && $_SESSION['success'] == "edit") : ?>
  <script>
    swal({
      title: "Success!",
      text: "You edited successfully!",
      icon: "success",
      button: "Ok",
    });
  </script>
<?php
  unset($_SESSION['success']);
  endif;
?>
<!-- alert added successfully-->
<?php if (isset($_SESSION['success']) && $_SESSION['success'] == "add") : ?>
  <script>
    swal({
      title: "Success!",
      text: "You added successfully!",
      icon: "success",
      button: "Ok",
    });
  </script>
<?php
  unset($_SESSION['success']);
  endif;
?>
</body>

</html>