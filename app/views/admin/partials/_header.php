<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title> <?= ucwords($data['page_title'] . ' - ' . WEBSITE_TITLE) ?></title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/feather/feather.css">
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/css/vendor.bundle.base.css">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/mdi/css/materialdesignicons.min.css">
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/datatables.net-bs4/dataTables.bootstrap4.css">
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/ti-icons/css/themify-icons.css">
  <link rel="stylesheet" type="text/css" href="<?= ASSETS_ADMIN ?>js/select.dataTables.min.css">

  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/select2/select2.min.css">
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>vendors/select2-bootstrap-theme/select2-bootstrap.min.css">

  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?= ASSETS_ADMIN ?>css/vertical-layout-light/style.css">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?= ASSETS ?>images/medicine.png" />
</head>

<body>
  <div class="container-scroller">
    <!-- partial:partials/_navbar.html -->
    <?php include "./app/views/admin/partials/_navbar.php"; ?>
    <!-- partial -->

    <div class="container-fluid page-body-wrapper">
      <!-- partial:partials/_sidebar.html -->
      <?php include "./app/views/admin/partials/_sidebar.php"; ?>
      <!-- partial -->