<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <div class="row">
                <div class="col-12">
                  <h4 style="color:blue">Itemwise Sale Report</h4>
                
            
              
              <form method="POST" id="form" action="<?php echo site_url("Report/itemsale");?>" >

                    <div class="form-group row">
                      <label for="prod" class="col-sm-2 col-form-label">Product:</label>
                     
                        <div class="col-sm-4">
                                <select class="livesearch form-control" name="prod" id="prod"> 
                                    <option value="0">Select Product</option>
                                    <?php 
                                        foreach ($product as $row){ ?>
                                        <option value="<?php echo $row->ID?>"><?php echo $row->Name?></option>
                                    <?php
                                        }
                                    ?>
                                </select>
                        </div>
                    </div>

                    <div class="form-group row">
                        <label for="from_dt" class="col-sm-2 col-form-label">From:</label>

                         <div class="col-sm-4">
                              <input type="date" class="form-control" id="from_dt" name="from_dt" value="<?php echo date('Y-m-d');?>" required/>
                         </div>
                    </div>

                    <div class="form-group row">
                        <label for="to_dt" class="col-sm-2 col-form-label">To:</label>

                         <div class="col-sm-4">
                              <input type="date" class="form-control" id="to_dt" name="to_dt" value="<?php echo date('Y-m-d');?>" required/>
                         </div>
                    </div>

          <div class="modal-footer">
      <button class="btn btn-secondary" type="button" data-dismiss="modal">Cancel</button>
      <button class="btn btn-primary" id="save" type="submit">Proceed</button>
    </div>
<!---------------------------------->
     </form>
     </div>
   </div>
 </div>
</div>
</div>
<script>
  $(document).ready(function() {
    $('.livesearch').select2();
});
</script>