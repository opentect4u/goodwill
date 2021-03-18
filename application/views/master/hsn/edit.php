<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Edit HSN Details</h4>
                    <br><br>
                    <form class="form-sample" method="POST" action="<?php echo site_url('Masters/editHsn'); ?>">

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">HSN Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="hsncd" value="<?php echo $hsn->Code; ?>" readonly/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">HSN/SAC Group</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="hsnName" value="<?php echo $hsn->Grp;?>" required/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">CGST(%)</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="cgst" value="<?php echo $hsn->CGST_Rt;?>" required/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">SGST(%)</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="sgst" value="<?php echo $hsn->SGST_Rt;?>" required/>
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