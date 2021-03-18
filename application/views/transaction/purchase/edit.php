<div class="main-panel">
  <div >
    <div class="col-12 grid-margin" style="padding:0px;">
                <div class="card">
                  <div class="card-body">
                    <h4>New Purchase</h4>
                    <br><br>
                    <form class="form-sample" method="POST" id="purchase_form" action="<?php echo site_url('Purchases/editPurchase'); ?>">
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Invoice Date</label>
                            <div class="col-sm-9">
                              <input type="date" class="form-control" id="trans_dt" name="bill_dt" value="<?php echo $row1->bill_dt; ?>" readonly/>
                                 <input type="hidden" class="form-control" name="purId" value="<?php echo $row1->purId; ?>"/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Invoice No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" name="bill_no" value="<?php echo $row1->bill_no; ?>" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Company Name</label>
                            <div class="col-sm-9">
                            <input type="text" class="form-control" name="compname" id="compname" 
                                value="<?php 
                                            foreach($companys as $row){
                                                if($row->ID == $row1->comp){
                                                    echo $row->Comp_Name;
                                                }
                                              }
                                        ?>" readonly/>
                              
                              <input type="hidden" id = "comp_name" name="comp_name" value="<?php echo $row1->comp; ?>" />

                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Bill Type</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="billtype" name="billtype" 
                                      value="<?php 
                                                  if($row1->bill_type=='C'){
                                                    echo 'Cash';
                                                  }else{
                                                    echo 'Credit';
                                                  }
                                            ?>" readonly
                              />  
                              <input type="hidden" id = "bill_type" name="bill_type" value="<?php echo $row1->bill_type; ?>" />        
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">GSTIN</label>
                            <div class="col-sm-9">
                              <input type="text" class="form-control" id="gstin" name="gstin" value="<?php echo $row1->GSTIN; ?>" readonly/>
                            </div>
                          </div>
                        </div>

                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label">Contact No.</label>
                            <div class="col-sm-9">
                                <input type="text" class="form-control" id="ph_no" name="ph_no"  value="<?php echo $row1->ph_no; ?>" readonly/>
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
                              <th>Unit</th>
                              <th>Exp Date</th>
                              <th>MRP</th>
                              <th>Rate</th>
                              <th>Discount Amt</th>
                              <th>CGST Rate</th>
                              <th>SGST Rate</th>
                              <th>Qty</th>
                              <th>CGST Amt</th>
                              <th>SGST Amt</th>
                              <th>Net Price(Excluding Tax)</th>
                             <th><button class="btn btn-info d-none d-md-block" type="button" id="addrow" data-toggle="tooltip" data-original-title="Add Row" data-placement="bottom">
                                    <i class="mdi mdi-comment-plus-outline menu-icon"></i>
                                  </button>
                              </th>
                            </tr>
                          </thead>
            
                          <tbody id="intro">
                            <?php
                              $i=0;
                              foreach($row2 as $val){
                              $i++;
                            ?>        
                            
                            <tr>
                              <td>
                                  <input type="text" class="form-control" style="width:200px" id="Prod_ID" name="Prod_ID[]"  
                                         value="<?php 
                                                    foreach ($product as $row) {
                                                      if($row->ID==$val->pro_id){
                                                        echo $row->Name;
                                                      }
                                                    }
                                                ?>" readonly
                                  />
                                  <input type="hidden" class="form-control" style="width:200px" id="Pro_ID" name="Pro_ID[]"  
                                         value="<?php echo $val->pro_id; ?>"
                                  />
                              </td>
                              <td><input type="text" class="form-control"   style="width:200px"  name="Batch[]" id="Batch" value="<?php echo $val->batch;?>"readonly/></td>     
                              <td><input type="text" class="form-control"   style="width:90px"   name="Unit[]" id="unit" value="<?php echo $val->unit;?>"required readonly/></td>                
                              <td><input type="date" class="form-control"   style="width:200px"  name="Expiry[]" value="<?php echo $val->exp_dt;?>" required readonly/></td>
                              <td><input type="text" class="form-control"   style="width:90px"   name="Max_Ret_Price[]" value="<?php echo $val->mrp;?>" readonly/></td>
                              <td><input type="text" class="form-control"   style="width:90px"  name="Purchase_Rt[]" id="prate" value="<?php echo $val->pur_rt;?>" required readonly/></td>
                              <td><input type="text" class="form-control damt" style="width:90px"  name="Dis_Amt[]" id="damt" value="<?php echo $val->dis_amt;?>" readonly/></td>
                              <td><input type="text" class="form-control"   style="width:90px"  name="CGST_Rt[]" id="cgst" value="<?php echo $val->cgst_rt;?>" required readonly/></td>
                              <td><input type="text" class="form-control"   style="width:90px"  name="SGST_Rt[]" id="sgst" value="<?php echo $val->sgst_rt;?>" readonly required/></td>
                              <td><input type="text" class="form-control"   style="width:90px" name="Qty[]" id="qty" value="<?php echo $val->qty;?>" required readonly/></td>
                              <td><input type="text" class="form-control cgst" style="width:90px"  name="CGST_Amt[]" id="cgstamt" value="<?php echo $val->cgst_amt;?>" readonly/></td>
                              <td><input type="text" class="form-control sgst" style="width:90px"  name="SGST_Amt[]" id="sgstamt" value="<?php echo $val->sgst_amt;?>" readonly/></td>
                              <td><input type="text" class="form-control tot_Amt"  id="tot_Amt"  style="width:200px" name="tot_Amt[]" value="<?php echo $val->tot_Amt;?>" readonly/></td>
                              <td><button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td>
                            </tr>
                            <?php
                              }
                            ?>
                          </tbody>
                        </table>
                      </div>
                      <br>
                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">Gross Amt:</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="grsamt" id="grsamt" value="<?php echo $sum->gross_amt;?>" readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">Total Discount:</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="disamt" id="disamt" value="<?php echo $sum->dis_amt;?>" readonly/>
                            </div>
                          </div>
                        </div>
                      </div>

                      <div class="row">
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">Total Tax:</label>
                            <div class="col-sm-9">
                              <input type="number" class="form-control" name="taxamt" id="gstamt" value="<?php echo $sum->tax_amt;?>" readonly/>
                            </div>
                          </div>
                        </div>
                        <div class="col-md-6">
                          <div class="form-group row">
                            <label class="col-sm-3 col-form-label total">Net Amt(Including Tax):</label>
                            <div class="col-sm-9">
                                <input type="number" class="form-control" name="netamt" id="netamt" value="<?php echo $sum->net_amt;?>" readonly/>
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
            <span class="text-muted d-block text-center text-sm-left d-sm-inline-block">Copyright © 2018 <a href="https://www.synergicsoftek.in/" target="_blank">Synergic Softek Solutions Pvt.Ltd.</a>. All rights reserved.</span>
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
    //Adding row on click
    $("#addrow").click(function(){
      $("#intro").append('<tr><td><select class="livesearch" style="width:200px" name="Pro_ID[]" id=Pro_ID><option value="0">Select Product</option><?php foreach ($product as $row) { ?><option value="<?php echo $row->ID?>"><?php echo $row->Name?></option><?php } ?></select></td><td><input type="text" class="form-control"   style="width:200px"  name="Batch[]" id="Batch" required/></td><td><input type="text" class="form-control"   style="width:90px"   name="Unit[]" id="unit" required/></td><td><input type="date" class="form-control Expiry"  style="width:160px"  name="Expiry[]" required/><span class="cd_error"></span></td><td><input type="text" class="form-control mrp"   style="width:90px"   name="Max_Ret_Price[]" value="0" /></td><td><input type="text" class="form-control purrate"    style="width:90px"  name="Purchase_Rt[]" id="prate" value="0" required/></td><td><input type="text" class="form-control damt"    style="width:90px"  name="Dis_Amt[]" id="damt" value="0" required/></td><td><input type="text" class="form-control"    style="width:90px"  name="CGST_Rt[]" id="cgst" value="0" required/></td><td><input type="text" class="form-control"   style="width:90px"  name="SGST_Rt[]" id="sgst" value="0" required/></td><td><input class="form-control" type="text" style="width:90px" name="Qty[]" id="qty" value="0" required/></td><td><input class="form-control cgst" type="text" style="width:90px" name="CGST_Amt[]" id="cgstamt" value="0" readonly/></td><td><input type="text" class="form-control sgst"    style="width:90px"  name="SGST_Amt[]" id="sgstamt" value="0" readonly/></td><td><input type="text" class="form-control tot_Amt"  id="tot_Amt"  style="width:200px" name="tot_Amt[]" value="0" readonly/></td><td><button class="btn btn-danger" type= "button" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td></tr>');
      $('.livesearch').select2();
      $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
    });

    //Removing extra row
    $("#intro").on('click','#removeRow',function(){
        $(this).parents('tr').remove();
         
      //Sum discount
      var dsum = 0;
      $('.damt').each(function(){
        dsum += parseFloat(this.value);
      });
      $('#disamt').val(parseFloat(dsum));

      //sum gst amount
      var gsum  = 0;
      var cgsum = 0;
      var sgsum = 0;
      $('.cgst').each(function(){
        cgsum += parseFloat(this.value);
      });

      $('.sgst').each(function(){
        sgsum += parseFloat(this.value);
      });

      gsum = parseFloat(cgsum) + parseFloat(sgsum);
      $('#gstamt').val(parseFloat(gsum));

      //Sum net amount
      var sum = 0;
      $('.tot_Amt').each(function(){
        sum += parseFloat(this.value);
      });
      var net = parseFloat(sum) + parseFloat(gsum);
      $("#netamt").val(parseFloat(net));

      //total gross amount
        var grsum = 0;
        grsum = parseFloat(net) + parseFloat(dsum) - parseFloat(gsum)
        $("#grsamt").val(parseFloat(grsum));
 
    });

    //Calculating net amount excluding tax and tax amount
    $("#intro").on('change','#qty',function(){
      var row     = $(this).closest('tr');
      var unit    = row.find("td:eq(2) input[type='text']").val();
      var prate   = row.find("td:eq(5) input[type='text']").val();
      var damt    = row.find("td:eq(6) input[type='text']").val();
      var cgstrt  = row.find("td:eq(7) input[type='text']").val();
      var sgstrt  = row.find("td:eq(8) input[type='text']").val();
      var qty     = row.find("td:eq(9) input[type='text']").val();

      var gross_amt   = parseFloat(prate)*qty/unit;
      var net_amt     = (gross_amt - damt);
      var cgst        = parseFloat(net_amt)*parseFloat(cgstrt)/100;
      var sgst        = parseFloat(net_amt)*parseFloat(sgstrt)/100;


       row.find("td:eq(1) input[type='text']").prop('readonly', true);
       row.find("td:eq(2) input[type='text']").prop('readonly', true);
       row.find("td:eq(4) input[type='text']").prop('readonly', true);
       row.find("td:eq(5) input[type='text']").prop('readonly', true);
       row.find("td:eq(6) input[type='text']").prop('readonly', true);
       row.find("td:eq(7) input[type='text']").prop('readonly', true);
       row.find("td:eq(8) input[type='text']").prop('readonly', true);
       row.find("td:eq(9) input[type='text']").prop('readonly', true);
      

      row.find("td:eq(10) input[type='text']").val((parseFloat(cgst)).toFixed(2));
      row.find("td:eq(11) input[type='text']").val((parseFloat(sgst)).toFixed(2));
      row.find("td:eq(12) input[type='text']").val((parseFloat(net_amt)).toFixed(2));
    });

    $("#intro").on('change','#qty',function(){
      
      //Sum discount
      var dsum = 0;
      $('.damt').each(function(){
        dsum += parseFloat(this.value);
      });
      $('#disamt').val(parseFloat(dsum).toFixed(2));

      //sum gst amount
      var gsum  = 0;
      var cgsum = 0;
      var sgsum = 0;
      $('.cgst').each(function(){
        cgsum += parseFloat(this.value);
      });

      $('.sgst').each(function(){
        sgsum += parseFloat(this.value);
      });

      gsum = parseFloat(cgsum) + parseFloat(sgsum);
      $('#gstamt').val(parseFloat(gsum).toFixed(2));

      //Sum net amount
      var sum = 0;
      $('.tot_Amt').each(function(){
        sum += parseFloat(this.value);
      });
      var net = parseFloat(sum) + parseFloat(gsum);
      $("#netamt").val(parseFloat(net).toFixed(2));

      //total gross amount
        var grsum = 0;
        grsum = parseFloat(net) + parseFloat(dsum) - parseFloat(gsum)
        $("#grsamt").val(parseFloat(grsum).toFixed(2));

    });
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
//Expiry date cannot be less than system date
  $('#purchase_form').submit(function(event){

      $('#intro tr').each(function() {

      var row     = $(this).closest('tr');
  
      var trans_dt = $('#trans_dt').val();
      var cheque_date = row.find("td:eq(3) input[type='date']").val();

      if(new Date(cheque_date) < new Date(trans_dt))
      {
      row.find(".cd_error").html("Invalid Expiry date").css("color", "red"); 
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


 //Retrieve gst Rate Company
    $("#intro").on('change','#Pro_ID',function(){
      //$(".Pro_ID").change(function(){
          var row     = $(this).closest('tr');
        var comp = $(this).val();
        row.find("td:eq(7) input[type='text']").val("");
        row.find("td:eq(8) input[type='text']").val("");

        $.get("<?php echo site_url('Purchases/get_gst_rate');?>",
          {
            id:comp
          }
          )
        .done(function(data){
              var data = JSON.parse(data)
     
          row.find("td:eq(7) input[type='text']").val((parseFloat(data.CGST_Rt)).toFixed(2));
          row.find("td:eq(8) input[type='text']").val((parseFloat(data.CGST_Rt)).toFixed(2));
    
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