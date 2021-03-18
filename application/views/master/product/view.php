<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
          <div class="card-body msg">
          </div>
           <div class="card-body">
             <a style="float: Right;"
                     class ="btn btn-info d-none d-md-block"
                     href ="<?php echo site_url('Masters/addProduct'); ?>">Add New Product</a>
           </div>
            <div class="card-body">
              <h3>List of Products</h3>
              <div class="row">
                <div class="col-12">
                  <div class="table-responsive">
                    <table id="order-listing" class="table">
                      <thead>
                        <tr>
                            <th>Sl.No.</th>
                            <th>Code</th>
                            <th>Name</th>
                            <th>Edit</th>
                        </tr>
                      </thead>
                      <tbody>
                      <?php 
                         $i = 1; 
                        foreach($prod as $row){ 
                      ?>
                        <tr>
                            
                            <td><?php echo $i; ?></td>
                            <td><?php echo $row->ID; ?></td>
                            <td><?php echo $row->Name; ?></td>
                            <td>
                              <a href="<?php echo site_url('Masters/editProduct?ID='.$row->ID.''); ?>" title="Edit"><i class="mdi mdi-pencil-box-outline"></i></a>
                            </td>

                        </tr>
                         <?php 
                          $i++;
                          } 
                        ?>
                      </tbody>
                    </table>