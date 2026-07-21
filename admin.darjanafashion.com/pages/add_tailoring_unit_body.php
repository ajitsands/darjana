<div class="container-fluid flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
     
        
        <!--<form id="tailoring-unit-form" class="card-body p-0" enctype="multipart/form-data">-->
          <div class="row g-0">
            
            <!-- Personal and Address Information Side by Side -->
            <div class="card">
                <div class="card-header">
                <h5>Add Tailoring Unit</h5>
                </div>

                <div class="card-body">
                <div class="row g-3">
                <input type="hidden" id="unit_id">
                <div class="col-md-3">
                <div class="form-floating form-floating-outline ">
                <input type="text" id="unit_name" class="form-control form-control form-control-sm">
                <label>Unit Name *</label>
                </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-floating form-floating-outline">
                <input type="text" id="contact_person" class="form-control form-control form-control-sm">
                <label>Contact Person *</label>
                </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-floating form-floating-outline">
                <input type="text" id="phone" class="form-control form-control form-control-sm">
                <label>Phone</label>
                </div>
                </div>
                
                <div class="col-md-3">
                <div class="form-floating form-floating-outline">
                <input type="email" id="email" class="form-control form-control form-control-sm">
                <label>Email</label>
                </div>
                </div>
                
                <div class="col-md-12">
                <div class="form-floating form-floating-outline">
                <textarea id="address" class="form-control form-control form-control-sm"></textarea>
                <label>Address</label>
                </div>
                </div>
                <div class="col-11 text-end">
                <button class="btn btn-primary btn-sm ladda-button" type="button" id="btn_add_unit" data-style="expand-left">
                  <i class="ri-save-line me-1"></i>
                  <span class="align-middle">Add Unit</span>
                </button>
              </div>
             <div class="col-1 text-end">
              <button class="btn btn-secondary btn-sm ladda-button" type="button" id="btn_clear_unit" data-style="expand-left">
                <i class="ri-refresh-line me-1"></i>
                <span class="align-middle">Clear</span>
              </button>
            </div>
            </div>
                
                </div>
                
                
                 <div class="table-responsive" style="padding-bottom:10px;">
                    <table class="table table-bordered table-striped" id="unit_table">
                        <thead class="table-dark">
                            <tr>
                                <th>#</th>
                                <th>Unit Name</th>
                                <th>Contact Person</th>
                                <th>Phone</th>
                                <th>Email</th>
                                <th>Address</th>
                                <th>Status</th>
                                <th width="120">Action</th>
                            </tr>
                        </thead>
                        <tbody id="unit_tbody"></tbody>
                    </table>
                </div>
                
                </div>
            </div>
            
            
            
        <!--</form> -->
        
        
        
          </div>
          
         
          </div>
          </div>
          

       
        <!-- Submit Button -->
       
