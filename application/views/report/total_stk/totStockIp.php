<div class="main-panel">
        <div class="content-wrapper">
          <div class="card">
         
            <div class="card-body">
              <h3>Open Stock Log</h3>

              <div class="row">
                <div class="col-12">
                
              
              <div class="row" style="margin-top: 20px;">
           
                <div class="col-6" >

                  <form method="POST" id="form" action="<?php echo site_url("Report/totStockRep");?>" >

                    <div class="form-group row">
                        <label for="stk_dt" class="col-sm-2 col-form-label">Date:</label>

                         <div class="col-sm-4">
                              <input type="date" class="form-control" id="stk_dt" name="stk_dt" value="<?php echo date('Y-m-d');?>"required/>
                         </div>
                    </div>

                <div class="form-group row">

                    <div class="col-sm-10">

                      <button class="btn btn-primary" id="save" type="submit">Proceed</button>

                    </div>

                </div>
                   </form>   
              </div>
            </div>
          

          </div>
          </div>
          </div>
          </div>
          </div> 

   