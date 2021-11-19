<!--MAIN-->
<div class="main-panel">
  <div class="content-wrapper">
    <div class="row">
      <div class="col-md-12 grid-margin">
        <div class="row">
          <div class="col-12 col-xl-8 mb-4 mb-xl-0">
            <h3 class="font-weight-bold">Welcome !</h3>
            <h6 class="font-weight-normal mb-0">All systems are running smoothly! You have <span class="text-primary">3 unread alerts!</span></h6>
          </div>

        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-6 grid-margin stretch-card">
        <div class="card tale-bg">
          <div class="card-people mt-auto">
            <img src="<?= ASSETS_ADMIN ?>images/dashboard/people.svg" alt="people">
            <div class="weather-info">
              <div class="d-flex">
                <div>
                  <h2 class="mb-0 font-weight-normal"><i class="icon-sun mr-2"></i></h2>
                </div>
                <div class="ml-2">
                  <h4 class="location font-weight-normal">Việt Nam</h4>
                  <h6 class="font-weight-normal"><?php echo date("d-m-Y"); ?></h6>
                </div>
              </div>
            </div>
          </div>
        </div>
      </div>
      <div class="col-md-6 grid-margin transparent">
        <div class="row">
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-tale">
              <div class="card-body">
                <p class="mb-4">Tống sản phẩm</p>
                <p class="fs-30 mb-2"><?= $data['total_products'] ?></p>
                <!-- <p>10.00% (30 days)</p> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 mb-4 stretch-card transparent">
            <div class="card card-dark-blue">
              <div class="card-body">
                <p class="mb-4">Tổng khách hàng</p>
                <p class="fs-30 mb-2"><?= $data['total_users'] ?></p>
                <!-- <p>22.00% (30 days)</p> -->
              </div>
            </div>
          </div>
        </div>
        <div class="row">
          <div class="col-md-6 mb-4 mb-lg-0 stretch-card transparent">
            <div class="card card-light-blue">
              <div class="card-body">
                <p class="mb-4">Tổng đơn đặt hàng</p>
                <p class="fs-30 mb-2"><?= $data['total_orders'] ?></p>
                <!-- <p>2.00% (30 days)</p> -->
              </div>
            </div>
          </div>
          <div class="col-md-6 stretch-card transparent">
            <div class="card card-light-danger">
              <div class="card-body">
                <p class="mb-4">Tổng thương hiệu</p>
                <p class="fs-30 mb-2"><?= $data['total_brands'] ?></p>
                <!-- <p>0.22% (30 days)</p> -->
              </div>
            </div>
          </div>
        </div>
      </div>
    </div>
    <div class="row">
      <div class="col-md-12 grid-margin stretch-card">
        <div class="card">
          <div class="card-body">
            <p class="card-title">báo cáo đơn hàng</p>
            <div class="col-12 col-xl-4" style="float: right;">
              <div class="justify-content-end d-flex">
                <div class="dropdown flex-md-grow-1 flex-xl-grow-0">
                  <form method="POST">
                    <input type="date" name="date_report" value="<?php echo isset($_POST['date_report']) ? $_POST['date_report'] : ''  ?>" class="btn btn-sm btn-light bg-white ">
                    <button type="submit" class="btn btn-primary btn-sm">Submit</button>
                  </form>
                  </input>
                </div>
              </div>
            </div>
            <p class="font-weight-500">Tổng doanh thu của tháng: <?= number_format($data['total_report'] )?> vnđ</p>
            <div class="table-responsive">
              <table class="table table-striped">
                <thead>
                  <tr>
                    <th>
                      Mã đơn hàng
                    </th>
                    <th>
                      Ngày đặt
                    </th>
                    <th>
                      Khách hàng
                    </th>
                    <th>
                      Địa chỉ
                    </th>
                    <th>
                      Tổng đơn
                    </th>
                  </tr>
                </thead>
                <tbody>
                  <?php if (isset($data['detail_report']) && is_array($data['detail_report'])) : ?>
                    <?php foreach ($data['detail_report'] as $item) : ?>
                      <tr>
                        <td><?= $item->id ?></td>
                        <td><?= $item->created_date ?></td>
                        <td><?= $item->delivery_name ?></td>
                        <td><?= $item->delivery_address ?></td>
                        <td><?= $item->total ?></td>
                      </tr>
                    <?php endforeach; ?>
                  <?php else : ?>
                    <td colspan="8">
                      <p style="text-align:center;">No data available in table</p>
                    </td>
                  <?php endif; ?>
                </tbody>
              </table>
            </div>
          </div>
        </div>
      </div>

    </div>

  </div>
  <!-- content-wrapper ends -->
</div>
<!--//MAIN-->