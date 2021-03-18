<div class="main-panel">
  <div >
    <div class="col-12 grid-margin" style="padding:0px;">
                <div class="card">
                  <div class="card-body">
                    <h4>Purchase Return</h4>
                    <br>
                    <form class="form-sample" method="POST" id="purchase_form" action="<?php echo site_url('Purchases/pur_return'); ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Invoice Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" name="return_dt" 
                                id="trans_dt"
                              value="<?php echo date('Y-m-d'); ?>" required/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Invoice No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="inv_no" required/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                            <select class="livesearch" id="comp_name" name="comp_name" required>
                              <option value="">Select Company</option>
                              <?php foreach($companys as $row) { ?>
                                <option value="<?php echo $row->ID;?>"><?php echo $row->Comp_Name;?></option>
                                <?php
                                  }
                                ?>
                            </select>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bill Type</label>
                            <div class="col-sm-9">
                            <select class="livesearch" id="bill_type" name="bill_type" required>
                              <option value="">Select Bill Type</option>
                              <option value="C">Cash</option>
                              <option value="B">Credit</option>
                            </select>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="gstin" name="gstin" readonly/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ph_no" name="ph_no"  readonly/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="table table-responsive my_div">
                        <table class="table-bordered" width="400">
                          <thead>
                            <tr>
                              <th>Product</th>
                              <th>Batch</th>
                          
                              <th>Exp Date</th>
                           
                              <th>Qty</th>
                             
                              <th>Amount</th>
                              <th><button class="btn btn-info d-none d-md-block" type="button" id="addrow" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom">
                                    <i class="mdi mdi-comment-plus-outline menu-icon"></i>
                                  </button>
                              </th>
                            </tr>
                          </thead>
            
                          <tbody id="intro">
                            <tr>
                              <td><select class="livesearch" style="width:200px" name="ret_prod_id[]" id=Pro_ID>
                                  <option value="0">Select Product</option>
                                  <?php foreach ($product as $row) { ?>
                                  <option value="<?php echo $row->ID?>"><?php echo $row->Name?></option>
                                  <?php
                                    };
                                  ?>
                                  </select>
                              </td>
                              <td>
                               <select class="batch form-control" id="ret_batch" name="ret_batch[]"style="width:180px"  required>
                                <option>Select Product</option>
                               </select>        

                                <!-- <input type="text" class="form-control"   style="width:180px"  name="ret_batch[]" id="Batch" required/> --></td>     
                                         
                              <td><input type="date" class="form-control Expiry"  style="width:160px"  name="ret_exp_dt[]" required/><span class="cd_error"></span></td>
                           
                              <td><input type="text" class="form-control"   style="width:90px" name="ret_qty[]" id="qty" value="0" required/></td>
                             
                              <td><input type="text" class="form-control tot_Amt"  id="tot_Amt"  style="width:200px" name="ret_amt[]" value="0" /></td>
                              <td><button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td>
                            </tr>
                          </tbody>
                        </table>
                      </div>
                      <br>
                 
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total"><!-- Total Tax: --></label>
                            <div class="col-sm-9">
                             <!--  <input type="number" class="form-control" name="taxamt" id="gstamt" value="0" readonly/> -->
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">Net Amt:</label>
                            <div class="col-sm-3">
                                <input type="number" class="form-control" name="netamt" id="netamt" value="0" readonly/>
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
<!---------------------------------------------------------------------------------------------->
        <footer class="footer">
          <div class="w-100 clearfix">
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018<a href="https://www.synergicsoftek.in/" target="_blank">Synergic Softek Solutions Pvt.Ltd.</a>. All rights reserved.</span>
            <span class="float-none float-sm-right d-block mt-1 mt-sm-0 text-center">Hand-crafted & made with <i class="mdi mdi-heart-outline text-danger"></i></span>
          </div>
        </footer>
        <!-- partial -->
      </div>
      <!-- main-panel ends -->
    </div>
    <!-- page-body-wrapper ends -->
  </div>
  <!-- container-scroller -->

<!-- plugins:js -->
  <script src="<?php echo base_url("/assets/vendors/js/vendor.bundle.base.js"); ?>"></script>
  <!-- endinject -->
  <!-- Plugin js for this page -->
  <script src="<?php echo base_url("/assets/vendors/chart.js/Chart.min.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/progressbar.js/progressbar.min.js");?>"></script>

  <script src="<?php echo base_url("/assets/vendors/datatables.net/jquery.dataTables.js");?>"></script>
  <script src="<?php echo base_url("/assets/vendors/datatables.net-bs4/dataTables.bootstrap4.js"); ?>"></script>

  <!-- End plugin js for this page -->
  <!-- inject:js -->
  <script src="<?php echo base_url("/assets/js/off-canvas.js");?>"></script>
  <script src="<?php echo base_url("/assets/js/hoverable-collapse.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/template.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/settings.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/todolist.js"); ?>"></script>
  <!-- endinject -->
  <!-- Custom js for this page-->
  <script src="<?php echo base_url("/assets/js/dashboard.js"); ?>"></script>
  
  <script src="//cdnjs.cloudflare.com/ajax/libs/select2/4.0.3/js/select2.full.js"></script>
  
  <!-- End custom js for this page-->

  <script src="<?php echo base_url("/assets/vendors/typeahead.js/typeahead.bundle.min.js"); ?>"></script>
  
  <script src="<?php echo base_url("/assets/js/data-table.js"); ?>"></script>

<script>
    
    $(document).ready(function() {

      $('.msg').hide();

        <?php 
              if($this->session->flashdata('msg'))
        { ?>

      $('.msg').html('<?php echo $this->session->flashdata('msg'); ?>').show();

      <?php } ?>  
    });
    
</script>

<script>

$(document).ready(function(){
    //Retrieve GSTIN and contact no. on supply of company
      $("#comp_name").change(function(){
        var comp = $(this).val();
        $.get("<?php echo site_url('Purchases/compDtls');?>",{id:comp})
        .done(function(data){

          $.each(JSON.parse(data),function(key,value){
            
            var gstId = value.GST_ID;
            var phNo  = value.Contact;

            $("#gstin").val(gstId);
            $("#ph_no").val(phNo);
          });
        });
      });

    //Adding row on click
    $("#addrow").click(function(){
      $("#intro").append('<tr><td><select class="livesearch" style="width:200px" name="ret_prod_id[]" id=Pro_ID><option value="0">Select Product</option><?php foreach ($product as $row) { ?><option value="<?php echo $row->ID?>"><?php echo $row->Name?></option><?php } ?></select></td><td> <select class="batch form-control" id="ret_batch" name="ret_batch[]" required><option>Select Product</option></select> </td><td><input type="date" class="form-control Expiry"  style="width:160px"  name="ret_exp_dt[]" required/><span class="cd_error"></span></td><td><input class="form-control" type="text" style="width:90px" name="ret_qty[]" id="qty" value="0" required/></td><td><input type="text" class="form-control tot_Amt"  id="tot_Amt"  style="width:200px" name="ret_amt[]" value="0" /></td><td><button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td></tr>');
      $('.livesearch').select2();
      $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
    });

    //Removing extra row
    $("#intro").on('click','#removeRow',function(){
        $(this).parents('tr').remove();

      //Sum net amount
      var sum = 0;
      $('.tot_Amt').each(function(){
        sum += parseFloat(this.value);
      });
     
      $("#netamt").val(parseFloat(sum));

    
 
    });

    //Calculating net amount excluding tax and tax amount
    $("#intro").on('change','#qty',function(){
      var row     = $(this).closest('tr');
      var unit    = row.find("td:eq(2) input[type='text']").val();
      var prate   = row.find("td:eq(5) input[type='text']").val();
   

      var gross_amt   = parseFloat(prate)*qty/unit;
     
      var sgst        = parseFloat(net_amt)*parseFloat(sgstrt)/100;
    

      row.find("td:eq(10) input[type='text']").val((parseFloat(cgst)).toFixed(2));
    });
// Ajax coding for batch
    $("#intro").on('change','#Pro_ID',function(){
      
      var row     = $(this).closest('tr');

              var product_id = $(this).val();
        $.get("<?php echo site_url('Purchases/getret_batch');?>",{id:product_id})
        .done(function(data){


                 var string = '<option value="">Select Batch</option>';

                $.each(JSON.parse(data), function( index, value ) {

                    string += '<option value="' + value.Batch + '">' + value.Batch + '</option>'

                });

                console.log(string);
                 row.find("td:eq(1)").find(".batch").html(string);
        


        });
    });
// Ajax code for Expiry Date
 $("#intro").on('change','#ret_batch',function(){
      
      var row     = $(this).closest('tr');

      var prod_id    = row.find("td:eq(0)").find(".livesearch").val();
      var batch = $(this).val();

        $.get("<?php echo site_url('Purchases/getret_exp');?>",{id:prod_id,batch:batch})
        .done(function(data){

               var exp =JSON.parse(data);
         
              
                row.find("td:eq(2)").find(".Expiry").val(exp.Expiry);
        


        });
    });


    $("#intro").on('change','#tot_Amt',function(){


      var sum = 0;
      $('.tot_Amt').each(function(){
        sum += parseFloat(this.value);
      });
     // var net = parseFloat(sum) + parseFloat(gsum);
      $("#netamt").val(parseFloat(sum).toFixed(2));



    })


  });

   $("#trans_dt").change(function(){

          var trans_dt = $('#trans_dt').val();


         
       var d = new Date();

       var month = d.getMonth()+1;
       var day = d.getDate();

       var output = d.getFullYear() + '-' +
          (month<10 ? '0' : '') + month + '-' +
          (day<10 ? '0' : '') + day;

        console.log(trans_dt,output);

              if(new Date(output) < new Date(trans_dt))
              {
              alert("Purchase  Date Can Not Be Greater Than Current Date");
             
              return false;
              }else{
                 $('#submit').attr('type', 'submit');
              }
    })

 $('#purchase_form').submit(function(event){

           
    var trans_dt = $('#trans_dt').val();
    var d = new Date();
    var month = d.getMonth()+1;
    var day = d.getDate();
    var output = d.getFullYear() + '-' +
    (month<10 ? '0' : '') + month + '-' +
    (day<10 ? '0' : '') + day;

                    if(new Date(output) < new Date(trans_dt)){

                      alert("Purchase  Date Can Not Be Greater Than Current Date");
                       event.preventDefault();
                        return false;
                    }
                     else 
                        {
                   
                       return true;
                      }
            });

  

	$("#intro").on('change','.purrate',function(){
  
      var row     = $(this).closest('tr');
      var mrp    = row.find("td:eq(4) input[type='text']").val();
      var prate   = row.find("td:eq(5) input[type='text']").val();
     console.log(mrp,prate)
      if(parseFloat(mrp) < parseFloat(prate)){

     alert("Rate Can not be greater than MRP");
     row.find("td:eq(5) input[type='text']").val("");
      }
       
      });

  $('#purchase_form').submit(function(event){

    $('#intro tr').each(function() {


          var row     = $(this).closest('tr');
      
          var trans_dt = $('#trans_dt').val();
          var cheque_date = row.find("td:eq(3) input[type='date']").val();


          if(new Date(cheque_date) < new Date(trans_dt))
          {
          row.find(".cd_error").html("Expiry Date Can Not Be Less Than Bill Date").css("color", "red"); 
           row.find("td:eq(3) input[type='date']").val("");
         
          event.preventDefault();
         
          return false;
          }
           else{
                   row.find(".cd_error").html(""); 
                   return true;
              }

        });
      });
</script>

<script>
  $(document).ready(function() {
    $('.livesearch').select2();
});
</script>

</body>
</html>