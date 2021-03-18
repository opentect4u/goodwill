<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
           <div class="card-body">
 <div class="row">
           <div class="col-6">
            <h3>List of Due Payment</h3>
          </div>
          
           <div class="col-6">
             <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Sales/cr_payment'); ?>">New Payment</a>
           </div>
             </div>
           </div>
              
              <div class="row">
                <div class="col-md-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sl.No.</th>
                          
                            <th>Bill No.</th>
                            <th>Bill Date.</th>
                           
                            <th>Amount</th>
                            <th>Paid Date</th>
                            <th>Option</th>
                         
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($data as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->bill_no;?></td>
                            <td><?php echo date("d/m/Y",strtotime($row->bill_date));?></td>
                        
                            <td><?php echo round($row->amt,0);?></td> 
                             <td><?php echo date("d/m/Y",strtotime($row->paid_dt));?></td> 
                          
                            <td>
                              <a href="<?php echo site_url('Sales/delcrbill?bill_no='.$row->bill_no.'&bill_date='.$row->bill_date.''); ?>" onclick="return confirm('Are you sure you want to delete this item?');" >
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
          </div>
        </div>
      
