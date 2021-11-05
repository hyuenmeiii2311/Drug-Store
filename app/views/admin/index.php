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
                  <input type="date" value="<?php echo date('Y-m-d'); ?>" class="btn btn-sm btn-light bg-white ">

                  </input>
                </div>
              </div>
            </div>
            <p class="font-weight-500">Tổng doanh thu của tháng :</p>
            <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr>
                          <th>
                            User
                          </th>
                          <th>
                            First name
                          </th>
                          <th>
                            Progress
                          </th>
                          <th>
                            Amount
                          </th>
                          <th>
                            Deadline
                          </th>
                        </tr>
                      </thead>
                      <tbody>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face1.jpg" alt="image"/>
                          </td>
                          <td>
                            Herman Beck
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-success" role="progressbar" style="width: 25%" aria-valuenow="25" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $ 77.99
                          </td>
                          <td>
                            May 15, 2015
                          </td>
                        </tr>
                        <tr>
                          <td class="py-1">
                            <img src="../../images/faces/face2.jpg" alt="image"/>
                          </td>
                          <td>
                            Messsy Adam
                          </td>
                          <td>
                            <div class="progress">
                              <div class="progress-bar bg-danger" role="progressbar" style="width: 75%" aria-valuenow="75" aria-valuemin="0" aria-valuemax="100"></div>
                            </div>
                          </td>
                          <td>
                            $245.30
                          </td>
                          <td>
                            July 1, 2015
                          </td>
                        </tr>
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