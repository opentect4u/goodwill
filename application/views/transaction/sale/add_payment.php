<div class="main-panel">
  <div >
    <div class="col-12 grid-margin" style="padding:0px;">
                <div class="card">
                  <div class="card-body">
                    <div class="row">
                    <div class="col-md-6">
                    <h4>Credit Payment</h4>
                    </div> <div class="col-md-6"><h4 style="font-color:red"><?php if( null !== $this->session->flashdata('msg')){
                               echo $this->session->flashdata('msg');
                    };?></h4></div></div>
                    <br>
                    <form class="form-sample" method="POST" id="purchase_form" action="<?php echo site_url('Sales/addcredit_amt'); ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bill No</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="bill_no" id="bill_no" required>
                            </div>
                          </div>        
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Date</label>
                            <div class="col-sm-9">
                              <input class="form-control" class="form-control" type="date" name="bill_dt" id="bill_dt" value="<?php echo date('Y-m-d'); ?>" required>
                            </div>
                          </div>
                        </div>
                      </div>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Customer's Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="cust_name" id="cust_name" readonly>
                            </div>
                          </div>
                        </div>
                         <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Amount</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" name="amt" id="amt" required="">
                            </div>
                          </div>
                        </div>
                      </div>  
                      <div class="form-group d-flex">
                        <input type="submit" class="btn btn-info d-none d-md-block" id="save" click="return confirm('Are you sure you want to Save this item?');">
                      </div>
                    </form>
                  </div>
                </div>
              </div>
        </div>

        <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="https://www.synergicsoftek.in/" target="_blank">Synergic Softek Solutions Pvt.Ltd.</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline text-danger"></i></span>
          </div>
        </footer>
        
      </div>
      
    </div>
 
  </div>

 <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/vendors/datatables.net/jquery.dataTables.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/dashboard.js"); ?>"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
  <script src="<?php echo base_url("/assets/vendors/typeahead.js/typeahead.bundle.min.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/data-table.js"); ?>"></script>

<script>

      $('#bill_dt').on('change', function(event) {
    
        let bill_no = $('#bill_no').val();
        var bill_dt = $('#bill_dt').val();
       
        $.get('<?php echo site_url("Sales/get_credit_bill_dtl");?>',{ 

          bill_no:bill_no,
          bill_dt:bill_dt

        })
        .done(function(data)
        {
          var batchData = JSON.parse(data) ;
          $('#cust_name').val(batchData.cust_name);
          $('#amt').val(batchData.tot_amt);
         
        })

      })

      $('#bill_no').on('change', function(event) {
    
        let bill_no = $('#bill_no').val();
       
       
        $.get('<?php echo site_url("Sales/get_bill_exist");?>',{ 

          bill_no:bill_no        

        })
        .done(function(data)
        {
         if(data == 0){
          alert("Bill Does Not Exist");
           $('#bill_no').val("");
         }
         
        })

      })

</script>
</body>
</html>