<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
           <div class="card-body">
 <div class="row">
           <div class="col-6">
            <h3>List of Sale</h3>
          </div>
          
           <div class="col-6">
             <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Sales/addsales'); ?>">New Sale</a>
           </div>
             </div>
           </div>
              
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
                            <th>Delete</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($data as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($row->bill_dt));?></td>
                            <td><?php echo $row->bill_no;?></td>
                            <td><?php echo $row->cust_name;?></td>
                            <td><?php echo round($row->tot_amt,0);?></td> 
                            <td>
                              <a href="<?php echo site_url('Sales/viewReport?bill_no='.$row->bill_no.''); ?>" title="Print">
                                <span class="mdi mdi-printer"></span>
                              </a>
                            </td>
                            <td>
                              <a href="<?php echo site_url('Sales/delsalebill?bill_no='.$row->bill_no.''); ?>" onclick="return confirm('Are you sure you want to delete this item?');" >
                              <span class="mdi mdi-delete"></span>
                              </a>
                            </td>  
                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>
                  </div>
                </div>
              </div>
            </div>
