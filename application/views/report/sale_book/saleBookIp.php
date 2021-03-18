<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
                  <h4 style="color:blue">Sale Book Report</h4>
                  
             <div class="row">
                <div class="col-12">
              
              <form method="POST" id="form" action="<?php echo site_url("Report/saleBook");?>" >

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

         
            <div class="form-group row">
               <label for="to_dt" class="col-sm-2 col-form-label"></label>
    
              <button class="btn btn-primary" id="save" type="submit">Proceed</button>
            </div>

     </form>
   </div>
 </div>
</div>
</div>
</div>
