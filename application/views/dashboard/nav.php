  <div class="container-scroller">
    <!-- partial:partials/_horizontal-navbar.html -->
    <div class="horizontal-menu">
      <nav class="navbar top-navbar col-lg-12 col-12 p-0">
        <div class="container">
          <div class="text-center navbar-brand-wrapper d-flex align-items-center justify-content-center">
            <a class="navbar-brand brand-logo" href="<?php echo site_url('main/login'); ?>"><img src="<?php echo base_url("/assets/images/logo.png");?>" alt="logo"/></a>
            <a class="navbar-brand brand-logo-mini" href="index.html"><img src="<?php echo base_url("/assets/images/logo-mini.svg");?>" alt="logo"/></a>
          </div>
          <div class="navbar-menu-wrapper d-flex align-items-center">
            
            <ul class="navbar-nav navbar-nav-right">
              <li class="nav-item nav-profile dropdown mr-0 mr-sm-2">
                <a class="nav-link dropdown-toggle" href="#" data-toggle="dropdown" id="profileDropdown">
                  <!--<img src="<?php //echo base_url("/assets/images/logo.png"); ?>" alt="profile"/>-->
                  <span class="nav-profile-name">User : <?php echo $_SESSION['user_id']; ?></span>
                </a>
                <div class="dropdown-menu dropdown-menu-right navbar-dropdown" aria-labelledby="profileDropdown">
                  <a class="dropdown-item">
                    <i class="mdi mdi-settings text-primary"></i>
                    Settings
                  </a>
                  <a class="dropdown-item" href="<?php echo site_url('main/logout'); ?>">
                    <i class="mdi mdi-logout text-primary"></i>
                    Logout
                  </a>
                </div>
              </li>
            </ul>
            <button class="navbar-toggler navbar-toggler-right d-lg-none align-self-center" type="button" data-toggle="horizontal-menu-toggle">
              <span class="mdi mdi-menu"></span>
            </button>
          </div>
        </div>
      </nav>