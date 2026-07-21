<div class="container-fluid flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <!--<form id="tailoring-unit-form" class="card-body p-0" enctype="multipart/form-data">-->
      <div class="row g-0">
        <!-- Personal and Address Information Side by Side -->
         
        <div class="card">
          <div class="card-header">
            <h5>Customers</h5>
          </div>
          <div class="d-flex flex-wrap align-items-center gap-2 mb-3">
            <div class="d-flex align-items-center gap-2">
              <div class="input-group input-group-merge">
                <span class="input-group-text">From</span>
                <input type="date" class="form-control form-control-sm" id="startDate" style="width: 130px;">
              </div>
              <div class="input-group input-group-merge">
                <span class="input-group-text">To</span>
                <input type="date" class="form-control form-control-sm" id="endDate" style="width: 130px;">
              </div>
              <button class="btn btn-primary btn-sm" id="applyFilter" style="width:150px;">
                <i class="ri-filter-line me-1"></i>Apply
              </button>
              <button class="btn btn-outline-secondary btn-sm" id="resetFilters" style="width:150px;">
                        <i class="ri-refresh-line me-1"></i> Reset
                    </button>
            </div>
            <div class="input-group input-group-merge" style="width: 250px;">
                    <span class="input-group-text"><i class="ri-search-line"></i></span>
                    <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search Customers...">
                </div>
          </div>
          
          <div class="table-responsive" style="padding-bottom:10px;">
            
            <table class="table table-bordered table-striped" id="unit_table">
              <thead class="table-dark">
                <tr>
                  <th>#</th>
                  <th>Name</th>
                  <th>Address</th>
                  <th>Postal</th>
                  <th>country</th>
                  <th>state</th>
                  <th>Mobile</th>
                  <th>Email</th>
                  <th>gender</th>
                  <th>Status</th>
                  <!-- <th width="120">Action</th> -->
                </tr>
              </thead>
              <tbody id="customers_tbody"></tbody>
            </table>
          </div>
            
        </div>
      </div>
    </div>
  </div>
</div>
          

       
        <!-- Submit Button -->
       
