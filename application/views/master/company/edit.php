<div class="main-panel">
  <div class="content-wrapper">
    <div class="col-12 grid-margin">
                <div class="card">
                  <div class="card-body">
                    <h4>Edit Company Details</h4>
                    <br><br>
                    <form class="form-sample" method="POST" action="<?php echo site_url('Masters/editComp'); ?>">

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Code</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="cmpCd" value="<?php echo $comp->ID; ?>" readonly/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="compName" value="<?php echo $comp->Comp_Name;?>" required/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Address</label>
                            <div class="col-sm-9">
                                <textarea class="form-control" name="addr" rows="4" cols="50" required><?php echo $comp->comp_addr; ?></textarea>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="cnct" value="<?php echo $comp->Contact; ?>"/>
                            </div>
                          </div>
                        </div>
                    </div>

                    <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Drug License No.</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="linc" value="<?php echo $comp->Drug_License; ?>" />
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="gstin" value="<?php echo $comp->GST_ID; ?>" required/>
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