<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
           <div class="card-body">
             <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Masters/addHsn'); ?>">Add New HSN</a>
           </div>
            <div class="card-body">
              <h3>List of HSN Codes</h3>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Code</th>
                            <th>Group</th>
                            <th>CGST(%)</th>
                            <th>SGST(%)</th>
                            <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                            foreach($hsn as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->Code; ?></td>
                            <td><?php echo $row->Grp; ?></td>
                            <td><?php echo $row->CGST_Rt; ?></td>
                            <td><?php echo $row->SGST_Rt; ?></td>
                            <td>
                              <a href="<?php echo site_url('Masters/editHsn?code='.$row->Code.''); ?>" title="Edit"><i class="mdi mdi-pencil-box-outline"></i></a>
                            </td>

                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>