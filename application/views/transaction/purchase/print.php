<style>
		.tableBill{font-family: arial; font-size: 12px; color: #232323; text-align: left; font-weight: 300;}
		.th_top{border-top: #ccc solid 1px; border-bottom: #ccc solid 1px; padding: 7px 5px; text-align: center;
			font-size: 14px;}
			.padding1{padding: 7px 5px;text-align: left}
		.padding{padding: 7px 5px;}
		.border_bot{1px; border-bottom: #ccc solid 1px;}
		table.bill_logo_sec tr td.address{width:40%; border-right: #ccc solid 1px;}
		table.bill_logo_sec tr td.address h2{font-size: 18px; color: #000; margin: 0; padding: 0 0 4px 0 ;
		font-weight: 600;}
		table.bill_logo_sec tr td.address p{font-size: 12px; color: #3D3D3D; margin: 0; padding:0;
		font-weight: 300; line-height:17px;}
		
		table.bill_logo_sec tr td.logo{width:56%; text-align: right;}
		
		table.bill_cus_details tr td.customerDet{width: 70%; border-right: #ccc solid 1px; padding-right: 5px; padding-left: 5px;}
		table.bill_cus_details tr td.customerDet dl{width: 100%; display: inline-block; margin: 0; padding: 0;}
		table.bill_cus_details tr td.customerDet dl dt{width:100px; float: left; margin: 0; padding:0 0 3px 0;
			font-weight: 600; height:30px; font-size: 12px; text-align: left;}
		table.bill_cus_details tr td.customerDet dl dd{width: 165px; float: left; margin: 0; padding:0 0 3px 0;
			font-weight: 300; height:30px; text-align: left; font-size: 12px;}
		
		table.bill_cus_details tr td.billDet{width: 40%; padding-left: 5px;}
		table.bill_cus_details tr td.billDet dl{width: 100%; display: inline-block; margin: 0; padding: 0;}
		table.bill_cus_details tr td.billDet dl dt{width: 38%; float: left; margin: 0; padding:0 0 3px 0; height: 14px; font-size: 12px;
			font-weight: 300; text-align: left;}
		table.bill_cus_details tr td.billDet dl dd{width: 62%; float:left; margin: 0; padding:0 0 3px 0; height: 14px; font-size: 12px;
			font-weight: 300; text-align: left;}
		table.billColumn td{padding: 3px 17px;}
		.rupis{padding:0 5px 5px 18px; width: 50%; font-weight: 600; height:26px; background: #ddd;}
		table.billColumn td.name{border-bottom: #ccc solid 1px; font-weight: 600; width: 50%; font-size: 12px;}
		table.billColumn td.batch{border-bottom: #ccc solid 1px; font-weight: 600; width: 25%; font-size: 12px;}
		table.billColumn td.expair{border-bottom: #ccc solid 1px; font-weight: 600; width: 15%; font-size: 12px;}
		table.billColumn td.qty{border-bottom: #ccc solid 1px; font-weight: 600; width: 8%; font-size: 12px;}
		table.billColumn td.mrp{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 12px;}
		table.billColumn td.disRat{border-bottom: #ccc solid 1px; font-weight: 600; width: 8%; font-size: 12px;}
		table.billColumn td.disAmount{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 12px;}
		table.billColumn td.netPric{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 12px; padding: 3px 10px;
			text-align: right;}
		table.billColumn td.netPricTd{padding: 3px 10px; text-align: right;}
		table.tablefoot td.footLeft{text-align: left; width: 70%;}
		table.tablefoot td.footLeft p{margin: 0; padding: 0; font-weight: 300;}
		table.tablefoot td.footLeft p{margin: 0; padding: 0; font-weight: 300; padding: 2px 5px;}
		p.goodWill{margin: 0; padding: 0;}
		table.tablefoot td.footLeft p.goodWill strong{font-weight: 600;}
		.goodWillTd{height: 32px; padding: 0 18px 5px 5px; text-align: right;}
		
		table.tablefoot td.footRight{ width: 30%;}
		table.footAmount tr td.footAmountLeft{border-right: #ccc solid 1px; padding:0 5px 5px 5px; width: 50%;text-align: right;
			font-weight: 600;  background: #ddd;}
		table.footAmount tr td.footAmountRight{padding:0 10px 5px 5px; width: 50%; font-weight: 600; text-align: right;  background: #ddd;}
		.amtTxt{padding: 0 5px 5px 5px; width: 50%; font-weight: 600; height:45px; background: #ddd;}
		.prepared{padding: 0 5px 5px 18px; width: 50%; font-weight: 600; height:40px; vertical-align:bottom;}
		.productList{height:300px; vertical-align: top;}
	</style>
    <!-- Page -->
	
    <div class="page">
      <div class="page-content">
     
	  <div id="divToPrint">
	<div style="max-width: 800px; margin: 0 auto;">
	<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="tableBill">
	<thead>
    	
		<tr>
		<th class="padding1 border_bot">
		<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="bill_logo_sec" >
			<tr>
			<td class="address" valign="top" text-align="center" >
				<h2 font-weight: 300;>Purchase Bill Details</h2>
			
				</td>
			<td class="logo" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%;" class="bill_cus_details">
			<tr>
			<td class="customerDet" valign="top" >
				
				 <dl>
                 
  <dt>Company Name:</dt>
  <dd><?php foreach($data as $row);
                
                       $comp_name= $row->comp_name;
                        echo strtoupper($comp_name);
                      ?></dd>
					  <!-- <br> -->
  <dt>Company Add:</dt>
  <!-- <dd>Address</dd> -->
  <!-- <dt>Customer's Name </dt> -->
  <dd><?php foreach($data as $row);
                       $comp_add= $row->comp_add;
                        echo strtoupper($comp_add);
                      ?></dd>
 <!-- <br> -->
  <dt>GSTIN</dt> 
  <dd><?php foreach($data as $row);
                       $GSTIN= $row->GSTIN;
                        echo strtoupper($GSTIN);
                      ?></dd>
<dt>Phone Number:</dt> 
  <dd><?php foreach($data as $row);
                       $ph_no= $row->ph_no;
                        echo strtoupper($ph_no);
                      ?></dd>
</dl> 
</dl> 

				</td>
			<td class="billDet" valign="top">
				<dl>
  <dt>Bill No:</dt>
  <dd> <?php echo $bill_no ; ?></dd>
  <dt>Bill Dt.:</dt>
  <dd> <?php foreach($data as $row);
                       $originalDate= $row->bill_dt;
                       $newDate = date("d-m-Y", strtotime($originalDate));
                       echo date("d-m-Y", strtotime($newDate));
                       ?></dd>
	<!-- <dt>Pay: </dt>
  <dd>Cash/Credit</dd>
  <dt>Patient Type: </dt>
  <dd><?php foreach($data as $row);
                       $in_out_type= $row->in_out_type;
                        echo $in_out_type;
                      ?> </dd> -->
</dl>
				</td>
			</tr>
		</table></td>
			</tr>
		</table>
		</th>
    </tr>

  </thead>
  <tbody>
    <tr>
      <td class="border_bot productList">
	<table width="100%" border="0" cellspacing="0" cellpadding="0" class="billColumn">
		
                    <tbody>
                            <tr id="one">
                                <td class="name">Product</td> 
                                <td class="batch">Batch</td>
                                <td class="expair">Exp Dt</td>  
                                <td class="qty">Qty</td>
                                <td class="mrp">MRP</td> 
                                <td class="mrp">Pur Rt</td>
                                <td class="disRat">Dis(%)</td> 
                                <td class="disAmount">Dis Amt.</td>
                                <td class="mrp">CGST Amt</td>
                                <td class="mrp">SGST Amt</td>
                                <td class="netPric">Net Amt.</td>
                                
                            </tr>

						<!-- <tr>
                                <td>name</td> 
                                <td>Batch</td>
                                <td>Expiry</td>  
                                <td>qty</td>
                                <td>mrp</td> 
                                <td>Dis_Rate</td> 
                                <td>Dis_Amount</td>
                                <td>Net_Price</td>
                                
                            </tr> -->
							<?php 
                        $total_amt = 0.00;
                        $tot_cnt   = 0.00;
                        $tot_dis   = 0.00;
                        $net_amt   = 0.00;
                        foreach($data as $key)
                        {
                        ?>
						<tr>
                                <td><?php  echo($key->pro_name); ?></td> 
                                <td><?php  echo($key->batch); ?></td>
                                <td><?php  echo($key->exp_dt); ?></td>  
                                <td><?php  echo ($key->qty); ?></td>
                                <td><?php  echo number_format(round(($key->mrp),2),2); ?></td> 
                                <td><?php  echo number_format(round(($key->pur_rt),2),2); ?></td>
                                <td><?php  echo number_format(round(($key->Dis_Rate),2),2); ?></td> 
                                <td><?php  echo number_format(round(($key->Dis_Amount),2),2); ?></td>
                                <td><?php  echo number_format(round(($key->CGST_Amt),2),2); ?></td> 
                                <td><?php  echo number_format(round(($key->SGST_Amt),2),2); ?></td> 
                                <td class="netPricTd"><?php  echo number_format(round(($key->Net_Price ),2),2); ?></td>

                                <!-- number_format($number, 2, '.', ''); -->
                            </tr>
							<?php
                              
                                $total_amt += (round($key->pur_rt,2)*($key->qty))+($key->CGST_Amt)+ ($key->SGST_Amt);
                                 $tot_dis += $key->Dis_Amount;
                                // $tot_cnt += $key->qty;
                                $net_amt += (($key->Net_Price ));
                             ?>
							
                    
							<?php
                        }
                        ?>
                    </tbody>

</table>

	</td>
    </tr>
	
  </tbody>
  
  <tfoot>
  
    <tr>
      <td class="border_bot">
		<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="tablefoot">
			<tr>
   <!-- console.log(num); -->

			<td class="footLeft" valign="top">
				<!-- <table border="0" cellspacing="0" cellpadding="0" width="100%;">
					 <tr><td><p class="goodWill">For <strong>Goodwill Pharmacy</strong></p></td></tr>
					<tr><td height="40;"> </td></tr>
					<tr>
					<td><p class="signe">Authorized Signatory</p></td></tr> 
					
				</table> -->

				<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="footAmount">
				<tr>
				<td class="amtTxt"></td>	
				</tr>
				
				<tr id="one" class="rupis">
				<td id="prn" class="rupis">Net Total (Rounded)</td>	
				</tr>

				<!-- <tr>
				<td class="prepared">Prepared by</td>	
				</tr> -->
				
				</table>
				</td>
			<td class="footRight" valign="top">
				<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="footAmount">
				<tr>
				<td class="footAmountLeft" style="padding-top: 5px;">Gross Amount</td>	
				<td class="footAmountRight" style="padding-top: 5px;"><?php echo $total_amt;?></td>	
				</tr>
				<tr>
				<td class="footAmountLeft">Disconut Amt</td>	
				<td class="footAmountRight"><?php echo $tot_dis;?></td>	
				</tr>
				<tr>
				<td class="footAmountLeft">Net Total (Rounded)</td>	
				<td class="footAmountRight"><?php echo round($net_amt);?></td>
				<td>
				</td>
				</tr>
				<td class="footLeft" valign="top">
				
				
				<!-- <br><table border="0" cellspacing="0" cellpadding="0" width="100%;">
					<tr><td class="goodWillTd"><p class="goodWill">For <strong>Goodwill Pharmacy</strong></p></td></tr>
					
					
					
				</table>
				</td>
				</table> -->
				</td>


				
				<!-- <tr >
				
                    <td colspan="8">
					Prepared by
                    </td>
			 -->
		  </table>
	</td>
	</tr>
	<tr>
   <!-- console.log(num); -->

	<!-- <td valign="bottom" class="prepared">
	Prepared by :  <?PHP echo 	$this->session->userdata('login')->user_id?>
	</td>
	<td valign="bottom" class="goodWillTd"><p class="goodWill">For <strong>Goodwill Pharmacy</strong></p></td>
					</tr> -->

  </tfoot>
	</table>
		</div>
		

</div>
<div class="modal-footer">

    <button class="btn btn-primary" type="button" onclick="location.href='<?php echo base_url('index.php/Main/sales');?>'">Back</button>

    <!-- <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button> -->
 
</div>
      </div>
    </div>
    <!-- End Page -->


    <!-- Footer -->
    <footer class="site-footer">
  
      <div class="site-footer-right">
	  <a href="https://www.synergicsoftek.in/">Copyright @ Synergic Softek Solutions Pvt. Ltd. 2019</a>
      </div>
    </footer>
    <!-- Core  -->
    <script src="<?php echo base_url();?>global/vendor/babel-external-helpers/babel-external-helpers.js"></script>
    <script src="<?php echo base_url();?>global/vendor/jquery/jquery.js"></script>
    <script src="<?php echo base_url();?>global/vendor/popper-js/umd/popper.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/bootstrap/bootstrap.js"></script>
    <script src="<?php echo base_url();?>global/vendor/animsition/animsition.js"></script>
    <script src="<?php echo base_url();?>global/vendor/mousewheel/jquery.mousewheel.js"></script>
    <script src="<?php echo base_url();?>global/vendor/asscrollbar/jquery-asScrollbar.js"></script>
    <script src="<?php echo base_url();?>global/vendor/asscrollable/jquery-asScrollable.js"></script>
    <script src="<?php echo base_url();?>global/vendor/ashoverscroll/jquery-asHoverScroll.js"></script>
    
    <!-- Plugins -->
    <script src="<?php echo base_url();?>global/vendor/switchery/switchery.js"></script>
    <script src="<?php echo base_url();?>global/vendor/intro-js/intro.js"></script>
    <script src="<?php echo base_url();?>global/vendor/screenfull/screenfull.js"></script>
    <script src="<?php echo base_url();?>global/vendor/slidepanel/jquery-slidePanel.js"></script>
    <script src="<?php echo base_url();?>global/vendor/skycons/skycons.js"></script>
    <script src="<?php echo base_url();?>global/vendor/chartist/chartist.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/chartist-plugin-tooltip/chartist-plugin-tooltip.js"></script>
    <script src="<?php echo base_url();?>global/vendor/aspieprogress/jquery-asPieProgress.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/jvectormap/jquery-jvectormap.min.js"></script>
    <script src="<?php echo base_url();?>global/vendor/jvectormap/maps/jquery-jvectormap-au-mill-en.js"></script>
    <script src="<?php echo base_url();?>global/vendor/matchheight/jquery.matchHeight-min.js"></script>
    
    <!-- Scripts -->
    <script src="<?php echo base_url();?>global/js/Component.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin.js"></script>
    <script src="<?php echo base_url();?>global/js/Base.js"></script>
    <script src="<?php echo base_url();?>global/js/Config.js"></script>
    
    <script src="<?php echo base_url();?>assets/js/Section/Menubar.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/GridMenu.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/Sidebar.js"></script>
    <script src="<?php echo base_url();?>assets/js/Section/PageAside.js"></script>
    <script src="<?php echo base_url();?>assets/js/Plugin/menu.js"></script>
    
    <script src="<?php echo base_url();?>global/js/config/colors.js"></script>
    <script src="<?php echo base_url();?>assets/js/config/tour.js"></script>
    <script>Config.set('assets', '../assets');</script>
    
    <!-- Page -->
    <script src="<?php echo base_url();?>assets/js/Site.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin/asscrollable.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin/slidepanel.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin/switchery.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin/matchheight.js"></script>
    <script src="<?php echo base_url();?>global/js/Plugin/jvectormap.js"></script>
    <script src="<?php echo base_url();?>assets/examples/js/dashboard/v1.js"></script>


	<script src="<?php echo base_url('js/numtoword.js')?>"></script> 
<script type="text/javascript">
var num = <?php echo round($net_amt) ?>;
//   var number=1000;
  var Inwords=toWords(num)+' only';
  
  $("#prn").html(Inwords);
//   console.log(num);
</script>
  </body>
</html>