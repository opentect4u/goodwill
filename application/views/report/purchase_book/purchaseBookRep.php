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
        <div class="content-wrapper">
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

                        <h4>Purchase Book Between : <?php echo date('d/m/Y',strtotime($_POST['from_dt'])).' To '.date('d/m/Y',strtotime($_POST['to_dt']));?></h4>
                    </div>
                    

                    <br>  

                    <table style="width: 100%;">

                        <thead>

                            <tr>
                                <th>Sl No.</th>

                                <th>Bill No.</th>

                                <th>Company</th>

                                <th>Bill Date</th>

                                <th>Amount</th>

                                <th>Discount</th>

                                <th>CGST</th>

                                <th>SGST</th>

                                <th>Net Amount</th>
   
                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($purc){ 

                                    $i = 1;

                                    foreach($purc as $dtls){


                            ?>
                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $dtls->bill_no;   ?></td>
                                     <td><?php echo get_comp_name($dtls->comp_name); ?></td>
                                     <td><?php echo Date('d/m/Y',strtotime($dtls->bill_dt));?></td>
                                     <td><?php echo $dtls->purc_amt; ?></td>
                                     <td><?php echo $dtls->dis_amt; ?></td>
                                     <td><?php echo $dtls->cgst;     ?></td>
                                     <td><?php echo $dtls->sgst;     ?></td>
                                     <td><?php echo $dtls->tot_amt;  ?></td>
                                </tr>
                                <?php        
                                    }
                                ?>

                                <tr>
                                    <td>Total : </td>
                                    <td></td><td></td><td></td>
                                    <td><?php echo $tot->tot_purc;?></td>
                                    <td><?php echo $tot->dis_amt;?></td>
                                    <td><?php echo $tot->tot_cgst;?></td>
                                    <td><?php echo $tot->tot_sgst;?></td>
                                    <td><?php echo $tot->tot_amt;?></td>
                                </tr>


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
</div>