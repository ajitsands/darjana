<div class="row">
    <div class="col-12">
        <!-- Add Promo Code Card -->
        <div class="card shadow-sm border-0 rounded-3 mb-4">
            <div class="card-header bg-primary text-white text-center py-2">
                <h5 class="mb-0"><b>Add New Promo Code</b></h5>
            </div>
            <form id="promo-code-form" class="card-body p-3">
                <div class="row g-3">
                    <div class="col-md-4">
                        <div class="form-floating form-floating-outline">
                            <input type="text" id="promo-code" class="form-control form-control-sm" placeholder="Enter Promo Code" maxlength="50" />
                            <label for="promo-code">Promo Code <span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-floating form-floating-outline">
                            <input type="number" id="offer-percentage" class="form-control form-control-sm" placeholder="Offer Percentage" step="0.01" min="0" max="100" />
                            <label for="offer-percentage">Offer Percentage (%) <span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="form-floating form-floating-outline">
                            <input type="number" id="minimum-order" class="form-control form-control-sm" placeholder="Minimum Order Amount" step="0.01" min="0" />
                            <label for="minimum-order">Minimum Order Amount (BHD)</label>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <input type="date" id="start-date" class="form-control form-control-sm" placeholder="Start Date" min="<?php echo date('Y-m-d'); ?>" />
                            <label for="start-date">Start Date <span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    
                    <!-- Update the expire date div to be after start date -->
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <input type="date" id="expire-date" class="form-control form-control-sm" placeholder="Expire Date" min="<?php echo date('Y-m-d'); ?>" />
                            <label for="expire-date">Expire Date <span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <input type="number" id="max-uses" class="form-control form-control-sm" placeholder="Maximum Uses" min="1" />
                            <label for="max-uses">Maximum Uses (Leave empty for unlimited)</label>
                        </div>
                    </div>
                    
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <select id="status" class="select2 form-select form-select-sm" data-allow-clear="true">
                                <option value="1" selected>Active</option>
                                <option value="0">Deactive</option>
                            </select>
                            <label for="status">Status <span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    
                    <div class="col-12 text-end">
                        <button class="btn btn-primary btn-sm ladda-button" type="button" id="btn-add-promo" data-style="expand-left">
                            <i class="ri-add-line me-1"></i>
                            <span class="align-middle">Add Promo Code</span>
                        </button>
                        <button class="btn btn-secondary btn-sm d-none" type="button" id="btn-cancel-edit">
                            <i class="ri-close-line me-1"></i>
                            <span class="align-middle">Cancel Edit</span>
                        </button>
                    </div>
                </div>
            </form>
        </div>
        
        <!-- Promo Codes List Card -->
        <div class="card shadow-sm border-0 rounded-3">
            <div class="card-header bg-primary text-white text-center py-2">
                <h5 class="mb-0"><b>Promo Codes List</b></h5>
            </div>
            <div class="card-body p-3">
                <div class="table-responsive">
                    <table class="table table-bordered table-striped table-hover" id="promo-codes-table">
                        <thead class="table-light">
                            <tr>
                                <th>ID</th>
                                <th>Promo Code</th>
                                <th>Offer %</th>
                                <th>Min Order</th>
                                <th>Start Date</th> <!-- Add this -->
                                <th>Expire Date</th>
                                <th>Used/Max</th>
                                <th>Status</th>
                                <th>Created Date</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody id="promo-codes-list">
                            <!-- Data will be loaded here via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Edit Promo Code Modal -->
<div class="modal fade" id="editPromoModal" tabindex="-1" aria-labelledby="editPromoModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white py-2">
                <h6 class="modal-title mb-0" id="editPromoModalLabel">
                    <i class="ri-edit-box-line me-2"></i> Edit Promo Code
                </h6>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body p-3">
                <form id="edit-promo-form">
                    <input type="hidden" id="edit-promo-id">
                    
                    <div class="mb-3">
                        <label for="edit-promo-code" class="form-label">Promo Code <span style="color: red;"> *</span></label>
                        <input type="text" id="edit-promo-code" class="form-control form-control-sm" maxlength="50">
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit-offer-percentage" class="form-label">Offer Percentage (%) <span style="color: red;"> *</span></label>
                        <input type="number" id="edit-offer-percentage" class="form-control form-control-sm" step="0.01" min="0" max="100">
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit-minimum-order" class="form-label">Minimum Order Amount (BHD)</label>
                        <input type="number" id="edit-minimum-order" class="form-control form-control-sm" step="0.01" min="0">
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit-start-date" class="form-label">Start Date <span style="color: red;"> *</span></label>
                        <input type="date" id="edit-start-date" class="form-control form-control-sm" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    
                    <!-- Update the expire date div to be after start date -->
                    <div class="mb-3">
                        <label for="edit-expire-date" class="form-label">Expire Date <span style="color: red;"> *</span></label>
                        <input type="date" id="edit-expire-date" class="form-control form-control-sm" min="<?php echo date('Y-m-d'); ?>">
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit-max-uses" class="form-label">Maximum Uses</label>
                        <input type="number" id="edit-max-uses" class="form-control form-control-sm" min="1" placeholder="Leave empty for unlimited">
                    </div>
                    
                    <div class="mb-3">
                        <label for="edit-status" class="form-label">Status <span style="color: red;"> *</span></label>
                        <select id="edit-status" class="form-select form-select-sm">
                            <option value="1">Active</option>
                            <option value="0">Deactive</option>
                        </select>
                    </div>
                </form>
            </div>
            <div class="modal-footer py-2">
                <button type="button" class="btn btn-light btn-sm" data-bs-dismiss="modal">
                    <i class="ri-close-line me-1"></i> Cancel
                </button>
                <button type="button" class="btn btn-primary btn-sm" id="btn-update-promo">
                    <i class="ri-save-line me-1"></i> Update
                </button>
            </div>
        </div>
    </div>
</div>