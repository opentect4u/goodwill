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
  <script src="<?php echo base_url("/assets/vendors/select2/select2.min.js"); ?>"></script>
  <script src="<?php echo base_url("/assets/js/select2.js"); ?>"></script>
  
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
    $("#intro").append('<tr><td><select class="form-control js-example-basic-single w-100" style="width:200px" name="Pro_ID[]" id=Pro_ID><option value="0">Select Product</option><?php foreach ($product as $row) { ?><option value="<?php echo $row->ID?>"><?php echo $row->Name?></option><?php } ?></select></td><td><input type="text" class="form-control"   style="width:200px"  name="Batch[]" id="Batch"/></td><td><input type="text" class="form-control"   style="width:90px"   name="Unit[]" /></td><td><input type="date" class="form-control"   style="width:200px"  name="Expiry[]"/></td><td><input type="text" class="form-control"   style="width:90px"   name="Max_Ret_Price[]" /></td><td><input type="text" class="form-control"    style="width:90px"  name="Purchase_Rt[]" /></td><td><input type="text" class="form-control"    style="width:90px"  name="Dis_Amt[]" /></td><td><input type="text" class="form-control"    style="width:90px"  name="CGST_Rt[]" /></td><td><input type="text" class="form-control"    style="width:90px"  name="SGST_Rt[]" /></td><td><input class="form-control Qty" type="text" style="width:90px" name="Qty[]" /></td><td><input class="form-control" type="text" style="width:90px" name="CGST_Amt[]" /></td><td><input type="text" class="form-control"    style="width:90px"  name="SGST_Amt[]" /></td><td><input type="text" class="form-control tot_Amt"  id="tot_Amt"  style="width:200px" name="tot_Amt[]" /></td><td><button class="btn btn-danger" data-toggle="tooltip" data-original-title="Remove Row" data-placement="bottom" id="removeRow"><i class="mdi mdi-minus-circle"></i></button></td></tr>');
      //$('.preferSelect').change();
      $('.livesearch').select2();
      $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});
    });

    //Removing extra row
    $("#intro").on('click','#removeRow',function(){
        $(this).parent().parent().remove();
       // $('.amount_cls').change();
       // $('.preferSelect').find('option[value ="' + this.value + '"]').attr("disabled", false);
    });
    
   /* $("#total").on('mouseover mouseenter mouseleave mouseup mousedown', function(){
        return false;
      });*/
   /* $("#total").val("");
    $('.preferSelect').change();
    $('#intro').trigger('change');
    $('[data-toggle="tooltip"]').tooltip({trigger: "hover"});*/

    $('#intro').trigger('change');


  $('#intro').on( "change", ".amount_cls", function() {
     $("#total").val('');
      var total = 0;
      $('.amount_cls').each(function(){
          total += +$(this).val();
      });
      $("#total").val(total);
      
  });


    $('#intro').on("change", ".preferSelect", function() {
    
    $('.preferSelect').each(function(){
        $('.preferSelect').find('option[value ="' + this.value + '"]').attr("disabled", true);
    
      });
  });
  });

</script>

<script>
  $(document).ready(function() {
    $('.livesearch').select2();

    //Restrict duplicate hsn code
    $("#hsnCd").on('change',function(){

      var hsncd  = $("#hsnCd").val();

      $.get("<?php echo site_url('Masters/chkhsn') ?>",{hsncd:hsncd},function(data){

        if(data > 0)
        {
          $("#hsnCd").val('');
          $("#hsnCd").css("border","1px solid red");
          alert("Code already in use.");
          return false;
        }else{
            $("#hsnCd").css("border","1px solid #ccc");
            return true;    
        }
      });
    });

    //Restrict Product entry with 0 hsn group
    $("#prod_form").on('submit',function(){
      var hsngrp = $("#hsngrp").val();
      if(hsngrp == 0)
      {
        $("#hsngrp").css("border","1px solid red");
        alert("Please select a HSN group");
        return false;
      }else{
        $("#hsngrp").css("border","1px solid #ccc");
        return true;
      }
    });
  });


</script>

 

</body>

</html>