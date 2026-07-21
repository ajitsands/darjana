<div class="container-fluid flex-grow-1 container-p-y">
  <div class="row">
    <div class="col-12">
      <div class="card shadow-sm border-0 rounded-3">
        <div class="card-header bg-primary text-white text-center py-2">
          <h5 class="mb-0"><b>Vendor Profile</b></h5>
        </div>
        <form id="vendor-profile-form" class="card-body p-3" enctype="multipart/form-data">
          <div class="row g-3">
            <!-- Hidden Vendor ID -->
            <input type="hidden" id="vendor-id" class="form-control" value="<?php echo isset($_SESSION['vendor_id']) ? htmlspecialchars($_SESSION['vendor_id']) : ''; ?>" />

            <!-- Personal and Address Information Side by Side -->
            <div class="col-md-6">
              <h6 class="mb-2">Personal Information</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-first-name" class="form-control form-control-sm" placeholder="First Name" />
                    <label for="vendor-first-name">First Name<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-second-name" class="form-control form-control-sm" placeholder="Second Name" />
                    <label for="vendor-second-name">Second Name<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="email" id="vendor-gmail-id" class="form-control form-control-sm" placeholder="Email" />
                    <label for="vendor-gmail-id">Email<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-username" class="form-control form-control-sm" placeholder="Username" />
                    <label for="vendor-username">Username<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline position-relative">
                    <input type="password" id="vendor-password" class="form-control form-control-sm" placeholder="Password" />
                    <label for="vendor-password">Password<span style="color: red;"> *</span></label>
                    <span class="position-absolute" style="top: 50%; right: 10px; transform: translateY(-50%); cursor: pointer;">
                      <i class="ri-eye-off-line" id="toggle-password" style="font-size: 1rem;"></i>
                    </span>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-contact-number" class="form-control form-control-sm" placeholder="Vendor Contact Number" />
                    <label for="vendor-contact-number">Contact Number<span style="color: red;"> *</span></label>
                  </div>
                </div>
                
                
              </div>
            </div>

            <div class="col-md-6">
              <h6 class="mb-2">Address Information</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <select id="vendor-country" class="select2 form-select form-select-sm" data-allow-clear="true">
                      <option value="" selected disabled>-- Select Country --</option>
                    </select>
                    <label for="vendor-country">Country<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <select id="vendor-state" class="select2 form-select form-select-sm" data-allow-clear="true" disabled>
                      <option value="" selected disabled>-- Select State --</option>
                    </select>
                    <label for="vendor-state">State<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <select id="vendor-district" class="select2 form-select form-select-sm" data-allow-clear="true" disabled>
                      <option value="" selected disabled>-- Select District --</option>
                    </select>
                    <label for="vendor-district">District</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-address" class="form-control form-control-sm" placeholder="Address" />
                    <label for="vendor-address">Address<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-street" class="form-control form-control-sm" placeholder="Street" />
                    <label for="vendor-street">Street</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-landmark" class="form-control form-control-sm" placeholder="Landmark" />
                    <label for="vendor-landmark">Landmark</label>
                  </div>
                </div>
              </div>
            </div>

            <!-- Business and KYC Information Side by Side -->
            <div class="col-md-6">
              <h6 class="mb-2">Business Information</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <select id="vendor-business-type" class="select2 form-select form-select-sm" data-allow-clear="true">
                      <option value="0" selected disabled>-- Select --</option>
                      <option value="Retail">Retail</option>
                      <option value="Wholesale">Wholesale</option>
                      <option value="Manufacturer">Manufacturer</option>
                      <option value="Service Provider">Service Provider</option>
                    </select>
                    <label for="vendor-business-type">Business Type<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="number" id="vendor-pickup-pincode" class="form-control form-control-sm" placeholder="Pickup Pincode" />
                    <label for="vendor-pickup-pincode">Pickup Pincode<span style="color: red;"> *</span></label>
                  </div>
                </div>
                <!-- Add these new fields -->
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="number" step="0.01" id="vendor-tax-percentage" class="form-control form-control-sm" placeholder="Tax %" />
                    <label for="vendor-tax-percentage">Tax Percentage (%)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="number" step="0.01" id="vendor-cod-fee" class="form-control form-control-sm" placeholder="COD Fee"  />
                    <label for="vendor-cod-fee">COD Fee (BHD)</label>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <select id="vendor-tax-type" class="select2 form-select form-select-sm" data-allow-clear="true">
                      <option value="0">Apply same tax % to all products</option>
                      <option value="1">Use individual product tax</option>
                    </select>
                    <label for="vendor-tax-type">Tax Calculation Method<span style="color: red;"> *</span></label>
                  </div>
                </div>
                 <div class="col-md-6">
                  <div class="form-floating form-floating-outline">
                    <input type="text" id="vendor-business-number" class="form-control form-control-sm" placeholder="Contact Number" />
                    <label for="vendor-business-number">Contact Number<span style="color: red;"> *</span></label>
                  </div>
                </div>
              </div>
            </div>

            <div class="col-md-6">
              <h6 class="mb-2">KYC Document</h6>
              <div class="row g-3">
                <div class="col-md-6">
                  <div class="form-group">
                    <input type="file" id="vendor-kyc-file" class="form-control form-control-sm" accept=".pdf,.jpg,.jpeg,.png" multiple />
                    <label for="vendor-kyc-file" class="form-label">Upload KYC Documents</label>
                    <small id="kyc-details-link" class="form-text" style="color: #0066cc; text-decoration: underline; cursor: pointer;">View Details</small>
                  </div>
                </div>
                <div class="col-md-6">
                  <div class="form-group">
                    <label class="form-label">Current KYC Documents</label>
                    <div id="kyc-file-display">
                      <span id="kyc-file-name">No files uploaded</span>
                    </div>
                  </div>
                </div>
              </div>
            </div>
          </div>

         <!-- KYC Details Modal -->
        <div class="modal fade" id="kycDetailsModal" tabindex="-1" aria-labelledby="kycDetailsModalLabel" aria-hidden="true">
          <div class="modal-dialog modal-dialog-centered modal-lg">
            <div class="modal-content shadow-lg border-0 rounded-3">
              <div class="modal-header bg-primary text-white py-2">
                <h6 class="modal-title mb-0" id="kycDetailsModalLabel">
                  <i class="ri-file-text-line me-2"></i> KYC Document Requirements
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
              </div>
        
              <div class="modal-body p-3">
                <section class="mb-3">
                  <h6 class="fw-bold text-primary mb-2">Accepted KYC Documents</h6>
                  <p class="small text-muted">These documents are valid for KYC verification as per Indian regulations:</p>
                  <div class="row">
                    <div class="col-md-6">
                      <h6 class="fw-semibold text-dark">
                        <i class="ri-user-line me-1 text-primary"></i> Proof of Identity (Any one)
                      </h6>
                      <ul class="small mb-3 ps-3">
                        <li>Aadhaar Card</li>
                        <li>PAN Card (Mandatory)</li>
                        <li>Voter ID Card</li>
                        <li>Passport</li>
                        <li>Driving License</li>
                        <li>NREGA Job Card</li>
                        <li>Govt./PSU Identity Card</li>
                      </ul>
                    </div>
                    <div class="col-md-6">
                      <h6 class="fw-semibold text-dark">
                        <i class="ri-map-pin-line me-1 text-primary"></i> Proof of Address (Any one)
                      </h6>
                      <ul class="small mb-3 ps-3">
                        <li>Aadhaar Card</li>
                        <li>Voter ID Card</li>
                        <li>Passport</li>
                        <li>Driving License</li>
                        <li>Utility Bill (≤ 3 months)</li>
                        <li>Bank Statement (≤ 3 months)</li>
                        <li>Rental Agreement</li>
                        <li>National Population Register Letter</li>
                      </ul>
                    </div>
                  </div>
                </section>
        
                <section class="mb-3">
                  <h6 class="fw-bold text-primary mb-2">
                    <i class="ri-file-list-3-line me-1"></i> Accepted File Types
                  </h6>
                  <p class="small text-muted mb-1">Allowed file formats:</p>
                  <ul class="small ps-3 mb-0">
                    <li>PDF (.pdf)</li>
                    <li>JPEG (.jpg, .jpeg)</li>
                    <li>PNG (.png)</li>
                  </ul>
                </section>
        
                <section>
                  <h6 class="fw-bold text-primary mb-2">
                    <i class="ri-folder-zip-line me-1"></i> File Size Limit
                  </h6>
                  <p class="small mb-0">
                    Each document must be <strong>≤ 5 MB</strong>. Ensure files are clear and legible.
                  </p>
                </section>
              </div>
        
              <div class="modal-footer py-2">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                  <i class="ri-close-line me-1"></i> Close
                </button>
              </div>
            </div>
          </div>
        </div>
        
        <!-- Submit Button -->
        <div class="row mt-3">
          <div class="col-12 text-end">
            <button class="btn btn-primary btn-sm ladda-button" type="button" id="btn_update_vendor" data-style="expand-left">
              <i class="ri-save-line me-1"></i>
              <span class="align-middle">Update Profile</span>
            </button>
          </div>
        </div>
