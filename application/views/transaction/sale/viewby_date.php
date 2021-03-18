<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <h3>List of Sale</h3>

               <?php
    
     if($_SERVER['REQUEST_METHOD'] == 'POST') { 
        
    ?>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                         <tr>
                            <th>Sl.No.</th>
                            <th>Date</th>
                            <th>Bill No.</th>
                            <th>Customer</th>
                            <th>Amount</th>
                            <th>Print</th>
                            <th>Cancel</th>
                            <th>Delete</th>
                            <th style="display:none;">Bill Trans</th>
                        </tr>
                      </thead>
                     <tbody>
                      <?php 
                         $i = 1; 
                            foreach($data as $row){ 
                      ?>
                        <tr id = "table_trans">
                            
                            <td><?php echo $i; ?></td>
                            <td style="color:<?php if($row->bill_trans == "R"){echo "red";}else{ echo "";}?>"><?php echo date('d/m/Y',strtotime($row->bill_dt));?></td>
                             <td id="bill_no" style="color:<?php if($row->bill_trans == "R"){echo "red";}else{ echo "";}?>" ><?php echo $row->bill_no;?></td>
                              <td style="color:<?php if($row->bill_trans == "R"){echo "red";}else{ echo "";}?>"><?php echo $row->cust_name;?></td>
                              <td style="color:<?php if($row->bill_trans == "R"){echo "red";}else{ echo "";}?>"><?php echo round($row->tot_amt,0);?></td> 
                            <td>
                              <a href="<?php echo site_url('Sales/viewReport?bill_no='.$row->bill_no.''); ?>" title="Print">
                                <span class="mdi mdi-printer"></span>
                              </a>
                            </td>
                            <td>
                              <a href="<?php echo site_url('Sales/cancelBill?bill_no='.$row->bill_no.'&billdt='.$row->bill_dt); ?>" onclick="return confirm('Are you sure you want to cancel this bill?');" >
                                <span class="mdi mdi-cancel"></span>
                                </a> 
                              </td>
                            <td>
                              <a href="<?php echo site_url('Sales/delsalebill?bill_no='.$row->bill_no.''); ?>" onclick="return confirm('Are you sure you want to delete this item?');" >
                              <span class="mdi mdi-delete"></span>
                              </a> 
                            </td>  
                            <td id=bill_trans style="display:none;">
                                <?php echo $row->bill_trans; ?>
                            </td>
                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>
                    <?php } else{ ?>

                      <div class="row" style="margin-top: 20px;">
           
                <div class="col-6" >

                   <form method="POST"  action="<?php echo site_url("Sales/viewsalebydt");?>" >
                     <div class="form-group row">

                    <label for="from_date" class="col-sm-4 col-form-label">From Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="from_date"
                               class="form-control" required
                               value="<?php //echo $sys_date;?>"
                        />

                    </div>

                </div>

                <div class="form-group row">

                    <label for="to_date" class="col-sm-4 col-form-label">To Date:</label>

                    <div class="col-sm-6">

                        <input type="date"
                               name="to_date"
                               class="form-control" required
                               value="<?php //echo $sys_date;?>"
                            />

                    </div>

                </div>

              


                <div class="form-group row">

                    <div class="col-sm-10">

                        <input type="submit" class="btn btn-info" value="Proceed" />

                    </div>

                </div>
                   </form>    

                    <?php } ?>
                </div>
            </div>
        </div>
    </div>
  </div>
</div>
    