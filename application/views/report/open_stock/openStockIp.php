<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <h3>Open Stock Log</h3>

               <?php
    
     if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        
    ?>
              <div class="row">
                <div class="col-12">
                    <div id="divToPrint">

                    <div style="text-align:center;">

                        <h2>GOODWILL PHARMACY</h2>

                        <h4>57/47/3 OLD CULCUTTA ROAD ,Uttarpara, Rahara Kolkata-700118</h4>

                        <h4>Ph- 0332568-4041/2523-6563</h4> 

                        <h4>GSTIN :19AAATG6028Q1Z5</h4>

                        <h4>Opening Stock Log : <?php echo $_POST['stk_yr'].'-'.($_POST['stk_yr'] + 1);?>
                                                  
                        </h4>
                    </div>
                    

                    <br>  

                    <table style="width: 100%;">

                        <thead>

                            <tr>
                                <th>Sl No.</th>

                                <th>Product ID</th>

                                <th>Product</th>

                                <th>Batch</th>

                                <th>Quantity</th>

                            </tr>

                        </thead>

                        <tbody>

                            <?php

                                if($item){ 

                                    $i = 1;

                                    foreach($item as $dtls){

                            ?>
                                <tr>
                                     <td><?php echo $i++; ?></td>
                                     <td><?php echo $dtls->prod_id;   ?></td>
                                     <td><?php echo $dtls->prod_name; ?></td>
                                     <td><?php echo $dtls->batch; ?></td>
                                     <td><?php echo $dtls->qty; ?></td>
                                </tr>
                                <?php        
                                    }
                                
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
                    <?php } else{ ?>

                      <div class="row" style="margin-top: 20px;">
           
                <div class="col-6" >

                  <form method="POST" id="form" action="<?php echo site_url("Report/openStock");?>" >
                   

                <div class="form-group row">

                     <label for="year" class="col-sm-2 col-form-label">Year:</label>

                         <div class="col-sm-4">
                              <input type="text" class="form-control" id="stk_yr" name="stk_yr" required/>
                         </div>

                </div>

              


                <div class="form-group row">

                    <div class="col-sm-10">

                      <button class="btn btn-primary" id="save" type="submit">Proceed</button>

                    </div>

                </div>
                   </form>    

                    <?php } ?>
                  </div>
                </div>
              </div>
            </div>
          </div>