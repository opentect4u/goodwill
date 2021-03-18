<script>

function printDiv() {
	var total_amt;
	var net_amt  ;
	var divToPrint=document.getElementById('divToPrint');

	var WindowObject=window.open('','Print-Window');
	WindowObject.document.open();
	WindowObject.document.writeln('<!DOCTYPE html>');
	WindowObject.document.writeln('<html><head><title></title><style>');

	WindowObject.document.writeln('body{margin:0;}'+
		'.tableBill{font-family: arial; font-size: 11px; color: #232323; text-align: left; font-weight: 300;}'+
		'@page {margin:5px 2px;}'+
		'.th_top{border-top: #ccc solid 1px; border-bottom: #ccc solid 1px; padding: 7px 5px; text-align: center;font-size: 14px;}' +
		'.padding{padding: 2px 5px;}' +
		' .border_bot{1px; border-bottom: #ccc solid 1px;}' +
		'table.bill_logo_sec tr td.address{width:45%; border-right: #ccc solid 1px; padding-left: 18px;}' +
		'table.bill_logo_sec tr td.address img.printLogo{width:50px;}' +
		'table.bill_logo_sec tr td.address h2{font-size: 15x; color: #000; margin:0; padding: 0 0 0 0;font-weight: 600;}' +
		'table.bill_logo_sec tr td.address p{font-size: 10px; color: #3D3D3D; margin: 0; padding:0;font-weight: 300; line-height: 12px;}' +
		'table.bill_logo_sec tr td.logo{width:55%; text-align: right;} ' +

		'table.bill_cus_details tr td.customerDet{width: 60%; border-right: #ccc solid 1px; padding-right: 5px; padding-left: 5px;}' +
		'table.bill_cus_details tr td.customerDet dl{width: 100%; display: inline-block; margin: 0; padding: 0;}'+
		'table.bill_cus_details tr td.customerDet dl dt{width: 90px; float: left; margin: 0; padding:1px 0 1px 0;font-weight: 300; height:14px;text-align: left;font-size: 10px;}'+
		'table.bill_cus_details tr td.customerDet dl dd{width: 162px; float: left; margin: 0; padding:1px 0 1px 0; font-weight: 300; height:14px;text-align: left;font-size: 10px;}'+
		'table.bill_cus_details tr td.billDet{width: 40%; padding-left: 5px;}'+
		'table.bill_cus_details tr td.billDet dl{width: 100%; display: inline-block; margin: 0; padding: 0;}'+
		'table.bill_cus_details tr td.billDet dl dt{width: 38%; float: left; margin: 0; padding:0 0 3px 0;font-weight: 300; height: 14px; font-size: 10px;text-align: left;}'+
		'table.bill_cus_details tr td.billDet dl dd{width: 62%; float: left; margin: 0; padding:0 0 3px 0;font-weight: 300; height: 14px; font-size: 10px;text-align: left;}'+
		'table.billColumn td{padding: 3px 16px;}'+
		'table.billColumn td.name{border-bottom: #ccc solid 1px; font-weight: 600; width: 50%; font-size: 11px;}'+
		'table.billColumn td.batch{border-bottom: #ccc solid 1px; font-weight: 600; width: 25%; font-size: 11px;}'+
		'table.billColumn td.expair{border-bottom: #ccc solid 1px; font-weight: 600; width: 15%; font-size: 11px;}'+
		'table.billColumn td.qty{border-bottom: #ccc solid 1px; font-weight: 600; width: 8%; font-size: 11px;}'+
		'table.billColumn td.mrp{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 11px;}'+
		'table.billColumn td.disRat{border-bottom: #ccc solid 1px; font-weight: 600; width: 8%; font-size: 11px;}'+
		'table.billColumn td.disAmount{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 11px;}'+
		'table.billColumn td.netPric{border-bottom: #ccc solid 1px; font-weight: 600; width: 12%; font-size: 11px; padding: 3px 10px; text-align: right;}'+
		'table.billColumn td.netPricTd{padding: 3px 10px; text-align: right;}'+
		'table.tablefoot td.footLeft{text-align: left; width: 70%;}'+
		'table.tablefoot td.footLeft p{margin: 0; padding: 0; font-weight: 300; padding: 2px 5px;}'+
		'p.goodWill{margin: 0; padding: 0;}'+
		'table.tablefoot td.footLeft p.goodWill strong{font-weight: 600;}'+
		'table.tablefoot td.footRight{ width: 30%;}'+
		'.goodWillTd{height: 32px; padding: 0 18px 5px 5px; text-align: right;}'+
		'.productList{height:300px; vertical-align: top;}'+
		'.prepared{padding: 0 5px 5px 18px; width: 50%; font-weight: 600; height:40px; vertical-align:bottom;}'+
		'.amtTxt{padding: 0 5px 5px 5px; width: 50%; font-weight: 600; height:27px; background: #ddd;}'+
		'.rupis{padding:0 5px 5px 18px; width: 50%; font-weight: 600; height:22px; background: #ddd;}'+
		'table.footAmount tr td.footAmountLeft{border-right: #ccc solid 1px; padding:0 5px 5px 5px; width: 50%;font-weight: 600;text-align: right; background: #ddd;}'+
         'table.footAmount tr td.footAmountRight{padding:0 10px 5px 5px; width: 50%; font-weight: 600; text-align: right; background: #ddd;}'+
		'                                   } } </style>');
	// WindowObject.document.writeln('<style type="text/css">@media print{p { color: blue; }}');
	WindowObject.document.writeln('</head><body onload="window.print()">');
	WindowObject.document.writeln(divToPrint.innerHTML);
	WindowObject.document.writeln('</body></html>');
	WindowObject.document.close();
	setTimeout(function(){ WindowObject.close();},10);
}

</script>


<style>
		.tableBill{font-family: arial; font-size: 12px; color: #232323; text-align: left; font-weight: 300;}
		.th_top{border-top: #ccc solid 1px; border-bottom: #ccc solid 1px; padding: 7px 5px; text-align: center;
			font-size: 14px;}
			.padding1{padding: 7px 5px;text-align: left}
		.padding{padding: 7px 5px;}
		.border_bot{1px; border-bottom: #ccc solid 1px;}
		table.bill_logo_sec tr td.address{width:40%; border-right: #ccc solid 1px;}
		table.bill_logo_sec tr td.address img.printLogo{width:50px;}
		table.bill_logo_sec tr td.address h2{font-size: 15px; color: #000; margin: 0; padding: 0 0 0px 0 ;
		font-weight: 600;}
		table.bill_logo_sec tr td.address p{font-size: 10px; color: #3D3D3D; margin: 0; padding:0;
		font-weight: 300; line-height:12px;}
		
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

<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
           <div class="card-body">
              <h3></h3>
              <div class="row">
                <div class="col-12">

                	<div id="divToPrint">
	<div style="max-width: 800px; margin: 0 auto;">
	<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="tableBill">
	<thead>
    <tr>
      <th class="th_top">
	Prescription Registration/Cash Memo 
		<?php foreach($data as $row);

				$bill_trans= $row->bill_trans;

				if($bill_trans == 'R'){
					
					echo "<p style=color:red;font-size:30px>"."Bill Cancelled"."</p>";

				}else{

					echo "";
				}
		?>
	</th>
		</tr>
		<tr>
		<th class="padding1 border_bot">
		<table border="0" cellspacing="0" cellpadding="0" width="100%;" class="bill_logo_sec" >
			<tr>
			<td class="address" valign="top" text-align="center" >
				<img class="printLogo" src= "http://sssprojects.co.in/goodwill/assets/images/logo.png" alt="logo"> 
				<h2 font-weight: 300;>GOODWILL PHARMACY </h2>
				<p>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118 </p>
				<p>Ph- 0332568-4041/2523-6563 <strong>GSTIN :19AAATG6028Q1Z5</strong> </p>
				<p style="text-align: center;font-weight: bold;"><strong>DL.No.:S-651/SB-651</strong> </p>
				</td>
			<td class="logo" valign="top"><table border="0" cellspacing="0" cellpadding="0" width="100%;" class="bill_cus_details">
			<tr>
			<td class="customerDet" valign="top" >
				
				 <dl>
  <dt>Customer's Name:</dt>
  <dd><?php foreach($data as $row);
                
                       $cust_name= $row->cust_name;
                        echo strtoupper($cust_name);
                      ?></dd>
					  <!-- <br> -->
  <dt>Customer's Add:</dt>
  <!-- <dd>Address</dd> -->
  <!-- <dt>Customer's Name </dt> -->
  <dd><?php foreach($data as $row);
                       $cust_add= $row->cust_add;
                        echo strtoupper($cust_add);
                      ?></dd>
 <!-- <br> -->
  <dt>Doctor's Name</dt> 
  <dd><?php foreach($data as $row);
                       $doctor= $row->doctor;
                        echo strtoupper($doctor);
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
	<dt>Pay: </dt>
  <dd><?php  if($row->bill_type == "C")
                        {  echo "Cash";}else{
                        	echo "Credit";
                        } ?></dd>
  <dt>Patient Type: </dt>
  <dd><?php foreach($data as $row);
                       $in_out_type= $row->in_out_type;

                       if($in_out_type == "O" or $in_out_type ==  "OUT")
                        {  echo "Out";}else{
                        	echo "IN";
                        }
                      ?> </dd>
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
                                <td class="disRat">Dis(%)</td> 
                                <td class="disAmount">Dis Amt.</td>
                                 <td class="disAmount">CGST Amt.</td>
                                <td class="disAmount">SGST Amt.</td>
                                <td class="netPric">Net Amt.</td>
                                
                            </tr>
							<?php 
                        $total_amt = 0.00;
                        $tot_cnt   = 0.00;
                        $tot_dis   = 0.00;
                        $net_amt   = 0.00;
                        $amt       = 0.00;
                        $tot_tax   = 0.00;
                        foreach($data as $key)
                        {
                        ?>
						<tr>
                                <td><?php  echo($key->Name); ?></td> 
                                <td><?php  echo($key->Batch); ?></td>
                                <td><?php echo date('d/m/Y', strtotime($key->Expiry)); ?></td>  
                                <td><?php  echo ($key->qty); ?></td>
                                <td><?php  echo number_format(round(($key->mrp),2),2); ?></td> 
                                <td><?php  echo number_format(round(($key->Dis_Rate),2),2); ?></td> 
                                <td><?php  echo number_format(round(($key->Dis_Amount),2),2); ?></td>
                                <td><?php  echo number_format(round(($key->CGST_amt),2),2); ?></td>
                                <td><?php  echo number_format(round(($key->SGST_amt),2),2); ?></td>
                                <td class="netPricTd"><?php  $amt = $key->Net_Price + $key->CGST_amt + $key->SGST_amt; 
                                echo number_format(round(($amt),2),2); ?></td>

                                <!-- number_format($number, 2, '.', ''); -->
                            </tr>
							<?php
                              
                                 $total_amt += round((round($key->mrp,2)*($key->qty)),2);
                                 $tot_dis += $key->Dis_Amount;
                                // $tot_cnt += $key->qty;
                                $tot_tax += round((($key->CGST_amt)*2),2);
                                $net_amt += (($amt ));
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

			<tr style="background: #ddd;">
			<td rowspan="3" style="width: 67%;padding: 4px;" ><?php echo getIndianCurrency(round($net_amt-$tot_dis));?></td>
			<td style="width: 20%;padding: 5px;border-right: #ccc solid 1px;">Gross Amount </td>
			
			<td style="padding: 4px;"><?php echo $total_amt;?> </td>
		</tr>

      <tr style="background: #ddd;"> <td style="width: 20%;padding: 4px;border-right: #ccc solid 1px;">Discount Amt</td>
      	  
      	   <td style="padding: 4px;"><?php echo $tot_dis;?></td>

      </tr>
      <tr style="background: #ddd;"> 
      	  <td style="width: 20%;border-right: #ccc solid 1px;padding: 4px;">Net Total (Rounded)</td>
      	   <td style="padding: 4px;"><?php echo round($net_amt-$tot_dis);?></td>

      </tr>
			
	<tr>
   <!-- console.log(num); -->

	<td valign="bottom" class="prepared">
	Prepared by :  <?PHP echo 	$this->session->userdata('login')->user_id?>
	</td>
	<td valign="bottom" class="goodWillTd" colspan="2"><p class="goodWill">For <strong>Goodwill Pharmacy</strong></p></td>
					</tr>

  </tfoot>
	</table>

	
		</div>
		

</div>
</td>
</tr>
</tfoot>
</table>



</div>


</div>
</div>
<div class="modal-footer">

    <button class="btn btn-primary" type="button" onclick="location.href='<?php echo base_url('index.php/Sales/sales');?>'">Back</button>

    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>
 
</div>
</div>
</div>
</div>
</div>
</div>

<footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2020 <a href="https://www.synergicsoftek.in/" target="_blank">Synergic</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center"></span>
          </div>
        </footer>

<!-- <script src="<?php //echo base_url('js/numtoword.js')?>"></script> 
<script type="text/javascript">
var num = <?php //echo round($net_amt) ?>;
//   var number=1000;
  var Inwords=toWords(num)+' only';
  
  $("#prn").html(Inwords);
//   console.log(num);
</script> -->
</body>
</html>
                  
                    