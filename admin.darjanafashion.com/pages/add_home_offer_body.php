<div class="row">
  <div class="col-xl-4 col-lg-4 col-md-5 col-sm-12 mt-1">
    <div class="card">
      <form class="card-body form-repeater" enctype="multipart/form-data">
        <h5>Add Home Offer</h5>
        <div class="row">
            <div class="col-6">
                <div class="input-group input-group-merge">
                  <div class="form-floating form-floating-outline">
                    <select id="category_name" class="form-control" required>
                        <option value="">Select Category</option>
                    </select>
                    <label for="category_name">Category Name<span style="color: red;"> *</span></label>
                  </div>
                </div>
            </div>
            <div class="col-6">
                <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                        <select id="sub_category_name" class="form-control" required>
                            <option value="">Select Sub Category</option>
                            <option value="add_new_sub_category">Add New Sub Category</option>
                        </select>
                        <label for="sub_category_name">Sub Category Name<span style="color: red;">
                                *</span></label>
                    </div>
                </div>
            </div>
        </div>

        <div class="row mt-3">
          <div class="col-7">
            <div class="form-floating form-floating-outline">
              <select id="vendor-business-type" class="select2 form-select" data-allow-clear="true">
                <option value="0" selected disabled>-- Select --</option>
                <option value="Retail">Retail</option>
                <option value="Wholesale">Wholesale</option>
                <option value="Manufacturer">Manufacturer</option>
                <option value="Service Provider">Service Provider</option>
              </select>
              <label for="vendor-business-type">Business Type<span style="color: red;"> *</span></label>
            </div>
          </div>  
          <div class="col-5">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-pickup-pincode" class="form-control" placeholder="Pickup Pincode" />
                <label for="vendor-pickup-pincode">Pickup Pincode<span style="color: red;"> *</span></label>
              </div>
          </div>
        </div>

        <div class="row mt-3">
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-address" class="form-control" placeholder="Address" />
                <label for="vendor-address">Address<span style="color: red;"> *</span></label>
              </div>
          </div>
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-street" class="form-control" placeholder="Street" />
                <label for="vendor-street">Street</label>
              </div>
          </div>
        </div> 

        <div class="row mt-3"> 
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-district" class="form-control" placeholder="District" />
                <label for="vendor-district">District</label>
              </div>
          </div>
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-state" class="form-control" placeholder="State" />
                <label for="vendor-state">State<span style="color: red;"> *</span></label>
              </div>
          </div>
        </div> 

        <div class="row mt-3">
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-country" class="form-control" placeholder="Country" />
                <label for="vendor-country">Country<span style="color: red;"> *</span></label>
              </div>
          </div>
          <div class="col-6">
              <div class="form-floating form-floating-outline">
                <input type="text" id="vendor-landmark" class="form-control" placeholder="Landmark" />
                <label for="vendor-landmark">Landmark</label>
              </div>
          </div>
          <input type="hidden" id="vendor-user-id" class="form-control" value="" />
        </div>
        
        <div class="row mt-3">
          <div id="btn_save_div">
            <button class="btn btn-primary ladda-button" type="button" style="float: right;" id="btn_save_vendor" data-style="expand-left">
              <i class="ri-save-line me-1"></i>
              <span class="align-middle">Add Vendor</span>
            </button>
            <div id="btn_update_div" style="display:none !important">
              <button class="btn btn-warning" type="button" style="float: right;" id="btn_update_vendor">
                <i class="ri-save-line me-1"></i>
                <span class="align-middle">Update</span>
              </button>
            </div>
          </div>
        </div>
      </form>
    </div>
  </div>
  <br>
  <div class="col-xl-8 col-lg-4 col-md-5 col-sm-12 mb-8 mt-1">
    <div class="card shadow-lg border-0 rounded-4">
      <div class="bg-primary text-white text-center">
        <h4 class="mb-0 mt-1"><b>List Of Vendor</b></h4>
      </div>
      <div class="card-body">
        <div class="table-responsive">
        <table id="vendorTable" class="table table-bordered" style="width:100%">
          <thead class="text-center">
              <tr>
                  <th></th> 
                  <th>Full Name</th>
                  <th>Business Type</th>
                  <th>Pincode</th>
                  <th>Street</th>
                  <th>District</th>
                  <th>State</th>
                  <th>Country</th>
                  <th>Landmark</th>
              </tr>
          </thead>
          <tbody></tbody>
      </table>
        </div>
      </div>
    </div>
  </div>
</div>
