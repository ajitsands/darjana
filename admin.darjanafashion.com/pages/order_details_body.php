<div class="container-fluid flex-grow-1 container-p-y px-0">
    <div class="card shadow-none border-0">
        <div class="card-header bg-transparent py-3">
            <h5 class="mb-0 fw-semibold">All Orders</h5>
        </div>
        
        <div class="card-body pt-0">
            <!-- Filter Section -->
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
                    <button class="btn btn-primary btn-sm" id="applyFilter">
                        <!--<i class="ri-filter-line me-1"></i>--> Apply
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" id="resetFilters">
                        <!--<i class="ri-refresh-line me-1"></i> --> Reset
                    </button>
                </div>

                <div style="min-width: 200px;">
                    <select id="customer_name" class="form-select form-select-sm select2" required>
                        <option value="">Select Customer</option>
                    </select>
                </div>

                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="statusDropdown" data-bs-toggle="dropdown">
                        <span id="selectedStatus">All Statuses</span>
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="statusDropdown">
                        <li><a class="dropdown-item status-option" href="#" data-status="">All Statuses</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="order placed">Order Placed</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Processing">Processing</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Quality Check">Quality Check</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Ready to Ship">Ready to Ship</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Shipped">Shipped</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="In Transit">In Transit</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="out for delivery">Out for Delivery</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Delivered">Delivered</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Completed">Completed</a></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="Product Cancelled">Cancelled</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item status-option" href="#" data-status="search_by_id">Search by Order ID</a></li>
                    </ul>
                </div>

                <div class="input-group input-group-merge" style="width: 250px;">
                    <span class="input-group-text"><i class="ri-search-line"></i></span>
                    <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search orders...">
                </div>
            </div>

            <!-- Bulk Actions -->
            <div id="bulkActions" class="d-flex align-items-center gap-2 mb-3 p-2 bg-light rounded" style="display: none;">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll">Select All</label>
                </div>
                <div class="dropdown">
                    <button class="btn btn-outline-secondary btn-sm dropdown-toggle" type="button" id="bulkStatusDropdown" data-bs-toggle="dropdown">
                        Update Status
                    </button>
                    <ul class="dropdown-menu" aria-labelledby="bulkStatusDropdown">
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Processing">Processing</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Quality Check">Quality Check</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Ready to Ship">Ready to Ship</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Shipped">Shipped</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="In Transit">In Transit</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="out for delivery">Out for Delivery</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Delivered">Delivered</a></li>
                        <li><a class="dropdown-item bulk-status" href="#" data-status="Completed">Completed</a></li>
                        <li><hr class="dropdown-divider"></li>
                        <li><a class="dropdown-item bulk-status text-danger" href="#" data-status="Product Cancelled">Cancel Orders</a></li>
                    </ul>
                </div>
                <button class="btn btn-primary btn-sm" id="generateBulkInvoice">
                    <i class="ri-file-text-line me-1"></i> Generate Invoice
                </button>
                <span id="selectedCount" class="badge bg-primary">0 selected</span>
            </div>

            <!-- Main Table -->
            <div class="table-responsive">
                <table class="table table-hover w-100" id="ordersTable">
                    <thead>
                        <tr>
                            <th width="40"><input type="checkbox" id="selectAllHeader" style="display: none;"></th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Product Cst.</th>
                            <th>Selling Cst.</th>
                            <th>Discount Cst.</th>
                            <th>Tax (%)</th>
                            <th>Actual Cost</th>
                            <th>Date</th>
                            <th>Notes</th>
                            <th>Status</th>
                            <th>Tailoring Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Modals (keep these as they were) -->
<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Invoice Details</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <!-- Content will be inserted here by JavaScript -->
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
                <button type="button" class="btn btn-primary" id="printInvoiceBtn">Print</button>
            </div>
        </div>
    </div>
</div>

<!-- Send to Tailoring Modal -->
<div class="modal fade" id="sendToTailoringModal" tabindex="-1">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Send to Tailoring Unit</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row g-3">
                    <div class="col-md-6">
                        <label class="form-label">Select Tailoring Unit <span class="text-danger">*</span></label>
                        <select id="tailoringUnitSelect" class="form-select select2" required>
                            <option value="">-- Choose unit --</option>
                        </select>
                    </div>
                    <div class="col-12">
                        <label class="form-label">Notes / Special Instructions</label>
                        <textarea id="tailoringNotes" class="form-control" rows="4" placeholder="Fabric details, urgent delivery, special stitching instructions..."></textarea>
                    </div>
                </div>

                <hr class="my-4">

                <h6>Items to be sent</h6>
                <div class="table-responsive">
                    <table class="table table-bordered table-sm" id="tailoringPreviewTable">
                        <thead>
                            <tr>
                                <th>#</th>
                                <th>Order ID</th>
                                <th>Product</th>
                                <th>Qty</th>
                                <th>Notes from customer</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="confirmSendToTailoring">
                    <i class="ri-send-plane-line me-1"></i> Send to Tailoring Unit
                </button>
            </div>
        </div>
    </div>
</div>