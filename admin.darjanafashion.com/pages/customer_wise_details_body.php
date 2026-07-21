<div class="container-fluid flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Customer Reports</h5>
            
            <div class="d-flex align-items-center gap-2">
                <!-- Filter Button -->
                <button class="btn btn-primary" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse">
                    <i class="ri-filter-line me-1"></i> Filters
                </button>
        
                <!-- Bulk Email Button -->
                <button id="sendEmailBtn" class="btn btn-success d-none" title="Send email to selected customers">
                    <i class="ri-mail-send-line me-1"></i>
                    <span id="selectedCount" class="badge bg-white text-success ms-1">0</span>
                </button>
                <!-- Bulk Email Button for Customer Wise -->
                <button id="sendEmailBtnWise" class="btn btn-success d-none" title="Send email to selected customers">
                    <i class="ri-mail-send-line me-1"></i>
                    <span id="selectedCountWise" class="badge bg-white text-success ms-1">0</span>
                </button>
                <!-- Search -->
                <div class="input-group input-group-merge" style="width: 280px;">
                    <span class="input-group-text"><i class="ri-search-line"></i></span>
                    <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search in current table...">
                </div>
            </div>
        </div>

        <!-- Filter Section -->
        <div class="collapse" id="filterCollapse">
            <div class="card-body border-bottom">
                <div class="row g-3">
                    <div class="col-md-3">
                        <label class="form-label">Date From</label>
                        <input type="date" class="form-control" id="filterDateFrom">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Date To</label>
                        <input type="date" class="form-control" id="filterDateTo">
                    </div>
                    <div class="col-md-3">
                        <label class="form-label">Country</label>
                        <select class="form-control select2" id="filterCountry">
                            <option value="">All Countries</option>
                        </select>
                    </div>
                    <div class="col-md-2">
                        <label class="form-label">Order Count</label>
                        <select class="form-control select2" id="filterOrderCount">
                            <option value="">All Orders</option>
                        </select>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button class="btn btn-primary w-100" id="applyFilters">
                            <i class="ri-check-line me-1"></i> Apply
                        </button>
                    </div>
                    <div class="col-md-1 d-flex align-items-end">
                        <button class="btn btn-secondary w-100" id="resetFilters">
                            <i class="ri-refresh-line me-1"></i> Reset
                        </button>
                    </div>
                </div>
            </div>
        </div>
        
        <div class="card-body">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-3" id="reportTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="order-wise-tab" data-bs-toggle="tab" data-bs-target="#orderWise" type="button" role="tab">
                        <i class="ri-shopping-cart-line me-1"></i> Order Wise
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="customer-wise-tab" data-bs-toggle="tab" data-bs-target="#customerWise" type="button" role="tab">
                        <i class="ri-user-line me-1"></i> Customer Wise
                    </button>
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Order Wise Tab (Existing Table) -->
                <div class="tab-pane fade show active" id="orderWise" role="tabpanel">
                    <table class="table table-hover" id="CustomerwiseTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;">
                                    <input type="checkbox" id="selectAllCustomers">
                                </th>
                                <th>SlNo</th>
                                <th>Customer Name</th>
                                <th>Country</th>
                                <th>Qty</th>
                                <th>Amount</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
                
                <!-- Customer Wise Tab (All Registered Customers) -->
                <div class="tab-pane fade" id="customerWise" role="tabpanel">
                    <table class="table table-hover" id="AllCustomersTable">
                        <thead>
                            <tr>
                                <th style="width: 50px;">
                                    <input type="checkbox" id="selectAllCustomersWise">
                                </th>
                                <th>SlNo</th>
                                <th>Customer Name</th>
                                <th>Email</th>
                                <th>Phone</th>
                                <th>Country</th>
                                <th>Order Count</th>
                                <th>Registration Date</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body"></div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printInvoiceBtn">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- Customer Orders Modal -->
<div class="modal fade" id="customerOrdersModal">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Customer Order Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <input type="text" class="form-control" id="orderSearch" placeholder="Search in orders...">
                </div>
                <table class="table table-bordered table-xl">
                    <thead>
                        <tr>
                            <th>#</th>
                            <th>Order ID</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Product Cost</th>
                            <th>Selling Cost</th>
                            <th>Discount</th>
                            <th>Tax %</th>
                            <th>Actual Cost</th>
                            <th>Date</th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody id="customer_order_list"></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Bulk Email Modal -->
<div class="modal fade" id="sendEmailModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Compose Bulk Email</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="mb-3">
                    <label class="form-label">Email Template Type</label>
                    <select class="form-control" id="emailTemplateType">
                        <option value="custom">Custom Message</option>
                        <option value="promotion">🎉 Promotion & Sale Alert</option>
                        <option value="offer">🏷️ Special Offer Alert</option>
                        <option value="coupon">🎫 Coupon Code Alert</option>
                        <option value="newsletter">📧 Newsletter Update</option>
                        <option value="feedback">💬 Feedback Request</option>
                    </select>
                </div>
                
                <div class="mb-3" id="promoCodeSection" style="display:none;">
                    <label class="form-label">Select Coupon Code</label>
                    <select class="form-control select2" id="promoCodeSelect">
                        <option value="">Select a promo code...</option>
                    </select>
                    <small class="text-muted">Selected promo code will be automatically inserted into the email</small>
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Subject</label>
                    <input type="text" id="emailSubject" class="form-control" placeholder="Enter email subject">
                </div>
                
                <div class="mb-3">
                    <label class="form-label">Message</label>
                    <div id="quillEditor" style="height: 320px; background:#fff;"></div>
                </div>
                
                <div class="alert alert-info">
                    This email will be sent to <strong id="recipientCount">0</strong> customer(s).
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSendEmail">
                    <i class="ri-mail-send-line me-1"></i> Send Emails
                </button>
            </div>
        </div>
    </div>
</div>