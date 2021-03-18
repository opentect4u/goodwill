<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
          
            <div class="card-body">
               <div class="row">
              <div class="col-6"> <h3>List of Purchases Return</h3></div>
              <div class="col-6">
               <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Purchases/pur_return'); ?>">New Purchase Return</a>

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
                            <th>Amount</th>
                            <th>option</th>

                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($purretu as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo date('d/m/Y',strtotime($row->return_dt)); ?></td>
                            <td><?php echo $row->inv_no; ?></td>
                            <td><?php echo $row->ret_amt; ?></td>
                            <!-- <td>
                              <a href="<?php //echo site_url('Purchases/editPurchase?id='.$row->bill_no.''); ?>" title="Edit"><i class="mdi mdi-pencil-box-outline"></i> View</a>
                            </td> -->
                            <td>
                              <a href="<?php echo site_url('Purchases/delretpur?bill_no='.$row->inv_no.' & ret_batch='.$row->ret_batch.' '); ?>" onclick="return confirm('Are you sure you want to delete this item?');" >
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
      </div>
      