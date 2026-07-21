<div class="modal fade" id="changeAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="changeAddressModalLabel" data-i18n="select_delivery_address">Select Delivery Address</h5>
                <button type="button" class="close" data-bs-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">×</span>
                </button>
            </div>
            <div class="modal-body">
                <!-- Add New Address Card -->
                <div class="card mb-4 border-2 add-new-address-card" style="border-style: dashed; border-color: #0d6efd; cursor: pointer;">
                    <div class="card-body text-center py-4">
                        <div class="d-flex flex-column align-items-center justify-content-center">
                            <i class="fas fa-plus-circle mb-2" style="font-size: 28px; color: #0d6efd;"></i>
                            <h5 class="mb-0" style="color: #0d6efd; font-weight: 600;" data-i18n="add_new_address">Add New Address</h5>
                        </div>
                    </div>
                </div>

                <!-- Saved Addresses Heading -->
                <h5 class="mb-3 font-weight-bold" data-i18n="your_saved_addresses">Your Saved Addresses</h5>
                
                <!-- Address Container (will be populated dynamically) -->
                <div class="row" id="addressContainer">
                    <!-- Default Address Card -->
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 border-primary shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-primary" data-i18n="default">Default</span>
                                    <button class="btn btn-sm btn-outline-secondary edit-address-btn">
                                        <i class="fas fa-edit"></i> 
                                        <span data-i18n="edit">Edit</span>
                                    </button>
                                </div>
                                <h5 class="card-title mt-1">John Smith</h5>
                                <p class="card-text mb-2">
                                    123 Main Street<br>
                                    Apt 4B<br>
                                    New York, NY 10001<br>
                                    United States
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-phone-alt mr-1"></i> +1 (555) 123-4567<br>
                                        <i class="fas fa-envelope mr-1"></i> john@example.com
                                    </small>
                                </p>
                                <button class="btn btn-primary btn-block mt-3 selected-address-btn" disabled>
                                    <i class="fas fa-check-circle mr-2"></i> 
                                    <span data-i18n="currently_selected">Currently Selected</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Secondary Address Card -->
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-light text-muted" data-i18n="home">Home</span>
                                    <button class="btn btn-sm btn-outline-secondary edit-address-btn">
                                        <i class="fas fa-edit"></i> 
                                        <span data-i18n="edit">Edit</span>
                                    </button>
                                </div>
                                <h5 class="card-title mt-1">John Smith</h5>
                                <p class="card-text mb-2">
                                    456 Oak Avenue<br>
                                    Suburban Lane<br>
                                    Brooklyn, NY 11201<br>
                                    United States
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-phone-alt mr-1"></i> +1 (555) 987-6543<br>
                                        <i class="fas fa-envelope mr-1"></i> john@home.com
                                    </small>
                                </p>
                                <button class="btn btn-outline-primary btn-block mt-3 select-address-btn">
                                    <i class="fas fa-map-marker-alt mr-2"></i> 
                                    <span data-i18n="use_this_address">Use This Address</span>
                                </button>
                            </div>
                        </div>
                    </div>

                    <!-- Office Address Card -->
                    <div class="col-md-6 mb-4">
                        <div class="card h-100 shadow-sm">
                            <div class="card-body">
                                <div class="d-flex justify-content-between align-items-start mb-2">
                                    <span class="badge badge-light text-muted" data-i18n="office">Office</span>
                                    <button class="btn btn-sm btn-outline-secondary edit-address-btn">
                                        <i class="fas fa-edit"></i> 
                                        <span data-i18n="edit">Edit</span>
                                    </button>
                                </div>
                                <h5 class="card-title mt-1">John Smith (Work)</h5>
                                <p class="card-text mb-2">
                                    789 Business Center<br>
                                    Suite 200<br>
                                    Manhattan, NY 10017<br>
                                    United States
                                </p>
                                <p class="card-text">
                                    <small class="text-muted">
                                        <i class="fas fa-phone-alt mr-1"></i> +1 (555) 456-7890<br>
                                        <i class="fas fa-envelope mr-1"></i> j.smith@company.com
                                    </small>
                                </p>
                                <button class="btn btn-outline-primary btn-block mt-3 select-address-btn">
                                    <i class="fas fa-map-marker-alt mr-2"></i> 
                                    <span data-i18n="use_this_address">Use This Address</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-i18n="cancel">Cancel</button>
            </div>
        </div>
    </div>
</div>