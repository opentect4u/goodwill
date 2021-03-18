<div class="container-fluid page-body-wrapper">
    <div class="main-panel">
        <div class="content-wrapper">
          <div class="row">
             <div class="col-md-12 grid-margin">
                <div class="card bg-white">
                  <div class="card-body d-flex align-items-center justify-content-between">
                    <h4 class="mt-1 mb-1"><?php echo("Hi,".$_SESSION['user_name']." Welcome!");?></h4>
                    <span class="inline"><h4 class="mt-1 mb-1">Date : <?php echo date('d/m/Y');?></h4></span>
                  </div>
                </div>
            </div>
        </div>

        <div class="row">
            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-success">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-success icon-rounded-lg">
                      <i class="mdi mdi-arrow-top-right"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h5 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo 'Rs.'.$purm->monthPur; ?></h5>
                        <small class="mb-0">This month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-info">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-info icon-rounded-lg">
                      <i class="mdi mdi-basket"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Purchases</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h5 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo 'Rs.'.$pur->todayPur; ?></h5>
                        <small class="mb-0">Today</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-danger">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-danger icon-rounded-lg">
                      <i class="mdi mdi-chart-donut-variant"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h5 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo 'Rs.'.$salm->monthsale; ?></h5>
                        <small class="mb-0">This Month</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-3 grid-margin stretch-card">
              <div class="card border-0 border-radius-2 bg-warning">
                <div class="card-body">
                  <div class="d-flex flex-md-column flex-xl-row flex-wrap  align-items-center justify-content-between">
                    <div class="icon-rounded-inverse-warning icon-rounded-lg">
                      <i class="mdi mdi-chart-multiline"></i>
                    </div>
                    <div class="text-white">
                      <p class="font-weight-medium mt-md-2 mt-xl-0 text-md-center text-xl-left">Total Sales</p>
                      <div class="d-flex flex-md-column flex-xl-row flex-wrap align-items-baseline align-items-md-center align-items-xl-baseline">
                        <h5 class="mb-0 mb-md-1 mb-lg-0 mr-1"><?php echo 'Rs.'.$sale->todaysale; ?></h5>
                        <small class="mb-0">Today</small>
                      </div>
                    </div>
                  </div>
                </div>
              </div>
            </div>
        </div>
 
        <div class="row">
            <div class="col-md-12">
              <div class="card">
                <div class="card-body">
                  <p class="card-title"><h4>Near to expiry list<h4></p>
                  <div class="row">
                   
                  </div>
                  <div class="table-responsive">
                    <table class="table table-striped">
                      <thead>
                        <tr class="border-top-0">
                          <th class="text-muted">Expiry Date</th>
                          <th class="text-muted">Product ID</th>
                          <th class="text-muted">Product Name</th>
                          <th class="text-muted">Batch No.</th>
                          <th class="text-muted">Quantity</th>
                        </tr>
                      </thead>
                      <tbody>
                         
                          <?php
                            foreach($exp as $val){
                          ?>
                          <tr>
                          <td><?php echo date('d/m/Y',strtotime($val->exp_dt)); ?></td>
                          <td><?php echo $val->prod_id; ?></td>
                          <td><?php echo $val->prod_name;?></td>
                          <td><?php echo $val->prod_batch;?></td>
                          <td><?php echo $val->qty;?></td>
                          </tr>
                          <?php
                            }
                          ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
          </div>
        </div>