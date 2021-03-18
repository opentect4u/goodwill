<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Edit Product Details</h4>
                    <br><br>
                    <form class="form-sample" method="POST" id= "prod_form" action="<?php echo site_url('Masters/editProduct'); ?>">

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Id</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="prodId" value="<?php echo $prod->ID; ?>" readonly/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Product Name</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="prod" value="<?php echo $prod->Name;?>" required/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GST Rate</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="gst_rt" value="<?php echo $prod->gst_rt; ?>" />
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">HSN Group</label>
                            <div class="col-sm-9">
                            <select class="js-example-basic-single w-100" id="hsngrp" name="hsn">
                              <option value="0">select HSN Group</option>

                              <?php foreach($hsn as $row) { ?>

                                <option value="<?php echo $row->Code; ?>" 

                                               <?php echo ($row->Code==$prod->HSN_ID)?'selected':'';?>
                                >
                                    <?php echo $row->Grp;?>
                                </option>
                                <?php
                                  }
                                ?>
                            </select>
                            </div>
                          </div>
                        </div>
                    </div>
                      
                      <div class="form-group d-flex">
                        <input type="submit" class="btn btn-info d-none d-md-block" id="add-task">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div> 