      <nav class="bottom-navbar">
        <div class="container">
          <ul class="nav page-navigation">
            <li class="nav-item">
              <a class="nav-link" href="<?php echo site_url('Main/login'); ?>">
                <i class="mdi mdi-home-outline menu-icon"></i>
                <span class="menu-title">Dashboard</span>
              </a>
            </li>
            <li class="nav-item">
              <a class="nav-link" href="#">
                <i class="mdi mdi-airplay menu-icon"></i>
                <span class="menu-title">Masters</span>
                <i class="menu-arrow"></i>
              </a>
                <div class="submenu">
                    <ul class="submenu-item">
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/comp');?>">Company</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/hsn'); ?>">HSN</a></li>
                    <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Masters/product'); ?>">Product</a></li>
                    </ul>
                </div>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Purchase</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Purchases/viewPurchase');?>">Purchase Entry</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Purchases/viewPurchasebydt');?>">Purchase View</a></li>
                  <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Purchases/viewpurreturn');?>">Purchase Return</a></li>
                </ul>
              </div>
            </li>

            <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Sales</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url("Sales/sales");?>">Sales Entry</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url('Sales/viewsalebydt');?>">Sales By Date</a></li>
                <li class="nav-item"> <a class="nav-link" href="<?php echo site_url("Sales/creditpay_list");?>">Credit Payment</a></li>
              
               
                </ul>
              </div>
            </li>

             <li class="nav-item">
              <a href="#" class="nav-link">
                <i class="mdi mdi-file-document-box-outline menu-icon"></i>
                <span class="menu-title">Reports</span>
                <i class="menu-arrow"></i></a>
              <div class="submenu">
                <ul class="submenu-item">
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/openStock");?>">Opening Stock Log</a></li>
                <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/totStockRep");?>">Total Stock Report</a></li>
                 <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/stockRep");?>">Itemwise Stock</a></li>
                 <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/purchaseBook");?>">Purchase Book</a></li>
              <!--    <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/saleBook");?>">Sales Book</a></li> -->
                  <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/com_GST");?>">Sales Book</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/consolidated_sale");?>">Consolidated Sales Book</a></li>
                 <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/itempurchase");?>">Itemwise Purchase</a></li>

                 <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/itemsale");?>">Itemwise Sales</a></li>
                  <li class="nav-item"><a class="nav-link" href="<?php echo site_url("Report/cr_sale_rep");?>">Credit Sale Report</a></li>
                 <li class="nav-item"> <a class="nav-link" href="<?php echo site_url("Report/composite_GST");?>">Composite GST</a></li>
                <!--   <li class="nav-item"> <a class="nav-link" href="<?php echo site_url("Report/com_GST");?>">Sell Detail</a></li> -->
                </ul>
              </div>
            </li>
           
                   
          </ul>
        </div>
      </nav>
    </div>