<!DOCTYPE html>
<html lang="en">

<head>
  <!-- Required meta tags -->
  <meta charset="utf-8">
  <meta name="viewport" content="width=device-width, initial-scale=1, shrink-to-fit=no">
  <title>Goodwill Pharmacy</title>
  <!-- plugins:css -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/mdi/css/materialdesignicons.min.css");?>">
  <link rel="stylesheet" href="<?php echo base_url("/assets/vendors/css/vendor.bundle.base.css");?>">
  <!-- endinject -->
  <!-- Plugin css for this page -->
  <!-- End plugin css for this page -->
  <!-- inject:css -->
  <link rel="stylesheet" href="<?php echo base_url("/assets/css/style.css");?>">
  <!-- endinject -->
  <link rel="shortcut icon" href="<?php echo base_url("/assets/images/favicon.png");?>" />
</head>

<body>
  <div class="container-scroller">
    <div class="container-fluid page-body-wrapper full-page-wrapper">
      <div class="main-panel">
        <div class="content-wrapper d-flex align-items-center auth px-0">
          <div class="row w-100 mx-0">
            <div class="col-lg-4 mx-auto">
              <div class="auth-form-light text-left py-5 px-4 px-sm-5">
                <div class="brand-logo" style="text-align: center;">
                  <img src="<?php echo base_url("/assets/images/logo.png");?>" alt="logo" height="120" width="120">
                </div>
                <h4>Hello! let's get started</h4>
                <h6 class="font-weight-light">Sign in to continue.</h6>

                <span style="color:red;margin:auto;display:block;text-align: center;">
                    <p>
                        <?php
                                if($this->session->flashdata('err_message')){
                                    
                                    echo $this->session->flashdata('err_message');
                                }
                        ?>
                    </p>
                </span>    


                <form class="pt-3" method="POST" action="<?php echo site_url("Main/index");?>">
                  <div class="form-group">
                    <input type="text" class="form-control form-control-lg" name ="userid" id="userid" placeholder="Username" required>
			
                  </div>
                  <div class="form-group">
                    <input type="password" class="form-control form-control-lg" name="paswd" id="paswd" placeholder="Password" required>
                  </div>
                  <div class="mt-3">
                    <input type="submit" class="btn btn-block btn-primary btn-lg font-weight-medium auth-form-btn" name="submit" id="submit" value="SIGN IN">
                  </div>
                  <div class="my-2 d-flex justify-content-between align-items-center">
                    <div class="form-check">
                      <label class="form-check-label text-muted">
                        <input type="checkbox" class="form-check-input">
                        Keep me signed in
                      </label>
                    </div>
                    <a href="#" class="auth-link text-black">Forgot password?</a>
                  </div>
                </form>
              </div>
            </div>
          </div>
        </div>
      </div>
      <!-- content-wrapper ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->
  <!-- plugins:js -->
  <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url("/assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js"); ?>"></script>
  <!-- endinject -->
</body>

</html>

<script>
  $(document).ready(function(){
    $('#userid').on('change',function(){
      var userId = $('#userid').val();
      $.get("./index.php/main/chkUser",{user:userId},function(data){
        if(data==0){
          $('#userid').val('');
          $("#userid").css("border","1px solid red");
					alert("Invalid user id.");
          return false;
        }else{
          $("#userid").css("border","1px solid #ccc");
          return true;
        }
      });
    });
  });
</script>