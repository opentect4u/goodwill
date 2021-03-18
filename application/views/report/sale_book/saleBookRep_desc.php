<style>
table {
    border-collapse: collapse;
}

table, td, th {
    border: 1px solid #dddddd;

    padding: 6px;

    font-size: 14px;
}

th {

    text-align: center;

}

tr:hover {background-color: #f5f5f5;}

</style>

<script>
  function printDiv() {

        var divToPrint = document.getElementById('divToPrint');

        var WindowObject = window.open('', 'Print-Window');
        WindowObject.document.open();
        WindowObject.document.writeln('<!DOCTYPE html>');
        WindowObject.document.writeln('<html><head><title></title><style type="text/css">');


        WindowObject.document.writeln('@media print { .center { text-align: center;}' +
            '                                         .inline { display: inline; }' +
            '                                         .underline { text-decoration: underline; }' +
            '                                         .left { margin-left: 315px;} ' +
            '                                         .right { margin-right: 375px; display: inline; }' +
            '                                          table { border-collapse: collapse; font-size: 12px;}' +
            '                                          th, td { border: 1px solid black; border-collapse: collapse; padding: 6px;}' +
            '                                           th, td { }' +
            '                                         .border { border: 1px solid black; } ' +
            '                                         .bottom { bottom: 5px; width: 100%; position: fixed ' +
            '                                       ' +
            '                                   } } </style>');
        WindowObject.document.writeln('</head><body onload="window.print()">');
        WindowObject.document.writeln(divToPrint.innerHTML);
        WindowObject.document.writeln('</body></html>');
        WindowObject.document.close();
        setTimeout(function () {
            WindowObject.close();
        }, 10);

  }
</script>

      <div class="main-panel">
        <div class="content-wrapper" style="max-width: 1300px;">
          <div class="card">
         
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                
                <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>GOODWILL PHARMACY</h2>

                        <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4>

                        <h4>Sale Book Between : <?php echo date('d/m/Y',strtotime($_POST['from_dt'])).' To '.date('d/m/Y',strtotime($_POST['to_dt']));?></h4>
                    </div>
                    

                    <br>  

                    <table style="width: 100%;margin-bottom: 20px">

                        <thead>

                            <tr>
                             <!--    <th>Sl No.</th> -->
                                <th>Bill No.</th>
                                <th>Bill Date</th>
                                <th>Select Product</th>
                                <th>Select Batch</th>
                                <th>Unit</th>
                                <th>MRP (A)</th>
                                <th>Sold  (Unit)</th>
                              <!--   <th>Customer</th> -->
                              
                                <th>Gross Amount (Including GST)</th>
                                <th>CGST Rate</th>
                                <th>SGST Rate</th>
                                <th>CGST</th>
                                <th>SGST</th>
                                <th>Taxable Amount</th>
                                <th>Dicsount Rate</th>
                                <th>Dicsount Amount</th>
                                <th>Net  Amount</th>
                                <th>Roundedoff</th>
                                <th>Total</th>   
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($sale){ 

                                    $i           = 1;
                                    $grss_amt    = 0;
                                    $cgst_amt    = 0;
                                    $sgst_amt    = 0;
                                    $taxable_amt = 0;
                                    $dis_amt     = 0;
                                    $net_amt     = 0;
                                    $tot         = 0;

                                    foreach($sale as $dtls){

                            ?>
                                <tr>
                                     <!-- <td><?php echo $i++; ?></td> -->
                                     <td><?php echo $dtls->Sales_ID;   ?></td>
                                      <td><?php echo Date('d/m/Y',strtotime($dtls->trans_dt));?></td>
                                      <td><?php echo get_product_name($dtls->Prod_ID); ?></td> 
                                      <td><?php echo $dtls->Batch; ?></td> 

                                       <td><?php echo $dtls->Unit; ?></td> 
                                        <td><?php echo number_format(($dtls->Max_Ret_Price), 2, '.', ''); //round(($dtls->Max_Ret_Price),2); ?></td> 
                                      <td><?php echo $dtls->qty; ?></td> 
                                    
                                     <td><?php echo number_format(($dtls->sale_amt), 2, '.', ''); 
                                                    $grss_amt +=$dtls->sale_amt;

                                     ?></td>
                                      <td><?php echo ($dtls->GST_Rt)/2; ?></td> 
                                      <td><?php echo ($dtls->GST_Rt)/2; ?></td> 
                                     <td><?php echo $dtls->CGST_amt; 
                                                         $cgst_amt +=$dtls->CGST_amt;
                                     ?></td>
                                     <td><?php echo $dtls->SGST_amt;
                                                     $sgst_amt +=$dtls->SGST_amt;
                                      ?></td>
                                     <td><?php echo number_format(($dtls->sale_amt-$dtls->CGST_amt-$dtls->SGST_amt), 2, '.', ''); 
                                                     $taxable_amt +=($dtls->sale_amt-$dtls->CGST_amt-$dtls->SGST_amt);
                                     ?></td>
                                      <td><?php echo number_format(($dtls->Dis_Rate), 2, '.', ''); ?></td> 
                                     <td><?php echo number_format(($dtls->dis_amt), 2, '.', ''); 
                                                         $dis_amt +=$dtls->dis_amt; 
                                     ?></td>
                                     <td><?php echo ($dtls->sale_amt-$dtls->dis_amt); 
                                                             $net_amt  += ($dtls->sale_amt-$dtls->dis_amt); 
                                     ?></td>
                                      <td><?php echo round((round($dtls->net_price)-($dtls->net_price)),2); ?></td>
                                     <td><?php echo round($dtls->net_price); 
                                                                 $tot +=round($dtls->net_price); 
                                     ?></td>
                                </tr>
                                <?php        
                                    }
                                ?>

                            <!--     <tr>
                                 
                                    <td colspan="3">Total : </td><td><?=$grss_amt?></td>
                                    <td><?=$cgst_amt?></td>
                                     <td><?=$sgst_amt?></td>
                                    <td><?=$taxable_amt?></td>
                                     <td><?=$dis_amt?></td>
                                     <td><?=$net_amt?></td>
                                     <td><?=$tot?></td>
                                     <td><?php echo $tot->tot_sale;?></td>
                                    <td><?php echo $tot->dis_amt;?></td>
                                    <td><?php echo $tot->net_price;?></td> 
                                </tr> -->
 
                                <?php
                                   }
                                
                                else{

                                    echo "<tr><td colspan='14' style='text-align:center;'>No Data Found</td></tr>";

                                }   

                            ?>

                        </tbody>

                    </table>
                

                </div>   

                <div style="text-align: center;">

                    <button class="btn btn-primary" type="button" onclick="printDiv();">Print</button>

                </div>

            </div>
        </div>
    </div>
</div>