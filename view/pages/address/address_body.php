<style>
    .address-card-dynamic {
        width: 100%;
        margin-bottom: 20px;
        border: 1px solid #e0e0e0;
        border-radius: 8px;
        padding: 20px;
        box-shadow: 0 2px 8px rgba(0,0,0,0.1);
        transition: all 0.3s ease;
    }

    .address-card-dynamic:hover {
        box-shadow: 0 4px 12px rgba(0,0,0,0.15);
    }

    .account-address-box {
        min-height: 180px; /* Fixed height for consistency */
    }

    .account-address-bottom {
        margin-top: 15px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    #shipping-address .row {
        margin-bottom: 0;
    }

    #shipping-address .col-md-12 {
        padding-left: 0;
        padding-right: 0;
    }
    #addnew_address {
        font-size: 13px;
        padding: 4px 12px;
        border-radius: 4px;
    }
    .small-icon {
        height: 30px;
        width: 30px;
    }
    .icon-label {
        margin-top: 8px !important;
    }
    #Line path:first-child {
    fill: #FF0000; /* or your desired color */
    }
    /* Add this to your existing styles */
    .form-control-sm {
        height: 32px !important;
        padding: 5px 10px !important;
        font-size: 13px !important;
    }

    .textarea-sm {
        min-height: 60px !important;
        padding: 5px 10px !important;
        font-size: 13px !important;
    }

    .form-label-sm {
        font-size: 13px !important;
        margin-bottom: 3px !important;
    }

</style>

<section class="col-xl-9 account-wrapper">
    
    <div class="account-address-add">
       
        <div style="margin-top: -20px; text-align: right;">
            <a href="javascript:void(0);" id="addnew_address" style="display: inline-block;" data-toggle="tooltip" title="Add New Address" data-i18n="add_new_address_title">
                <svg id="Line" height="30" viewBox="0 0 64 64" width="30" xmlns="http://www.w3.org/2000/svg" style="fill: red;">
                    <path d="m59.28775 26.0578-7.30176-6.251v-11.72068a.99973.99973 0 0 0 -1-1h-7.46a.99974.99974 0 0 0 -1 1v3.60693l-7.2109-6.17675a5.07688 5.07688 0 0 0 -6.6416 0l-23.97314 20.54345a2.04251 2.04251 0 0 0 1.32226 3.56787h5.98047v18.92188a8.60569 8.60569 0 0 0 8.59082 8.60059h10.481a1.00019 1.00019 0 0 0 -.00006-2h-10.48094a6.60308 6.60308 0 0 1 -6.59082-6.60059v-19.92188a1.00005 1.00005 0 0 0 -1-1l-6.99951-.05078 23.97119-20.542a3.08781 3.08781 0 0 1 4.03955 0l8.86133 7.59082a1.00655 1.00655 0 0 0 1.65039-.75934v-4.7802h5.46v11.18066a1.00013 1.00013 0 0 0 .34961.75928l7.63184 6.60156h-6.98148a.99974.99974 0 0 0 -1 1v3.7002a1.00019 1.00019 0 0 0 2-.00006v-2.70014h5.98145a2.03152 2.03152 0 0 0 1.32031-3.56982z"/>
                    <path style="fill: initial;" d="m43.99564 33.718a13.00122 13.00122 0 0 0 .00012 26.00244c17.24786-.71391 17.24231-25.29106-.00012-26.00244zm.00012 24.00244c-14.59461-.60394-14.58984-21.40082.00006-22.00244a11.00122 11.00122 0 0 1 -.00006 22.00244z"/>
                    <path d="m49.001 45.71942h-4v-4.00049a1.00019 1.00019 0 0 0 -2 0v4.00049h-4a1.00019 1.00019 0 0 0 .00006 2h3.99994v4a1 1 0 0 0 2 0v-4h4a1 1 0 0 0 0-2z"/>
                </svg>
            </a>
        </div>

        <div class="text-center">
            <div id="shipping-address" class="col-12"></div>
        </div>
    </div> 
    
    <br><br>
    
    <!-- New Address Modal - With Cascading Dropdowns -->
    <div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="newAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg" role="document">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title" id="newAddressModalLabel">Add New Shipping Address</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="newAddressForm" class="row g-3">
                        <div class="col-md-6">
                            <label class="form-label">Full Name <span class="text-danger">*</span></label>
                            <input type="text" id="modal-funame" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Email Address <span class="text-danger">*</span></label>
                            <input type="email" id="modal-email" class="form-control" required>
                        </div>
    
                        <div class="col-12">
                            <label class="form-label">Permanent / Shipping Address <span class="text-danger">*</span></label>
                            <textarea id="modal-paddress" class="form-control" rows="2" required></textarea>
                        </div>
    
                        <div class="col-md-6">
                            <label class="form-label">Street <span class="text-danger">*</span></label>
                            <input type="text" id="modal-street" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">Postal Code</label>
                            <input type="text" id="modal-postalcode" class="form-control">
                        </div>
    
                        <!-- Cascading Dropdowns -->
                        <div class="col-md-4">
                            <label class="form-label">Country <span class="text-danger">*</span></label>
                            <select id="modal-country" class="form-select" required>
                                <option value="">Select Country</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">State <span class="text-danger">*</span></label>
                            <select id="modal-state" class="form-select" required>
                                <option value="">Select State</option>
                            </select>
                        </div>
                        <div class="col-md-4">
                            <label class="form-label">District <span class="text-danger">*</span></label>
                            <select id="modal-district" class="form-select" required>
                                <option value="">Select District</option>
                            </select>
                        </div>
    
                        <div class="col-md-6">
                            <label class="form-label">Mobile Number <span class="text-danger">*</span></label>
                            <input type="tel" id="modal-mobile" class="form-control" required>
                        </div>
                        <div class="col-md-6">
                            <label class="form-label">WhatsApp Number</label>
                            <input type="tel" id="modal-wmobile" class="form-control">
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="modal-save-address-btn" class="btn btn-primary">Save Address</button>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Edit Address Modal - FIXED with cascading dropdowns -->
    <div class="modal fade" id="editAddressModal" tabindex="-1" aria-labelledby="editAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header bg-primary text-white">
                    <h5 class="modal-title" id="editAddressModalLabel">Edit Shipping Address</h5>
                    <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editAddressForm">
                        <input type="hidden" id="address_id" name="address_id">
    
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="customer_name" class="form-label">Full Name <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="customer_name" name="customer_name" required>
                            </div>
                            <div class="col-md-6">
                                <label for="email_address" class="form-label">Email <span class="text-danger">*</span></label>
                                <input type="email" class="form-control" id="email_address" name="email_address" required>
                            </div>
                        </div>
    
                        <div class="mb-3">
                            <label for="shipping_address" class="form-label">Shipping Address <span class="text-danger">*</span></label>
                            <textarea class="form-control" id="shipping_address" name="shipping_address" rows="2" required></textarea>
                        </div>
    
                        <div class="row mb-3">
                            <div class="col-md-6">
                                <label for="street" class="form-label">Street <span class="text-danger">*</span></label>
                                <input type="text" class="form-control" id="street" name="street" required>
                            </div>
                            <div class="col-md-6">
                                <label for="postal_code" class="form-label">Postal Code</label>
                                <input type="text" class="form-control" id="postal_code" name="postal_code">
                            </div>
                        </div>
    
                        <!-- Cascading Dropdowns -->
                        <div class="row mb-3">
                            <div class="col-md-4">
                                <label for="edit_country" class="form-label">Country <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_country" name="country" required>
                                    <option value="">Select Country</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_state" class="form-label">State <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_state" name="state" required>
                                    <option value="">Select State</option>
                                </select>
                            </div>
                            <div class="col-md-4">
                                <label for="edit_district" class="form-label">District <span class="text-danger">*</span></label>
                                <select class="form-select" id="edit_district" name="district" required>
                                    <option value="">Select District</option>
                                </select>
                            </div>
                        </div>
    
                        <div class="row">
                            <div class="col-md-6">
                                <label for="mobile_no" class="form-label">Phone <span class="text-danger">*</span></label>
                                <input type="tel" class="form-control" id="mobile_no" name="mobile_no" required>
                            </div>
                            <div class="col-md-6">
                                <label for="whatsapp_no" class="form-label">WhatsApp Number</label>
                                <input type="tel" class="form-control" id="whatsapp_no" name="whatsapp_no">
                            </div>
                        </div>
                    </form>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                    <button type="button" id="updateAddressBtn" class="btn btn-primary">Save Changes</button>
                </div>
            </div>
        </div>
    </div>

</section>