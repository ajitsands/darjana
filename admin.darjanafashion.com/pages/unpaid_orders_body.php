<div class="container-fluid flex-grow-1 container-p-y px-0">
    <div class="card shadow-none border-0">
        <div class="card-header bg-transparent py-3">
            <h5 class="mb-0 fw-semibold">Unpaid Orders</h5>
            <p class="text-muted small mb-0">Manage orders with pending payments</p>
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
                        Apply
                    </button>
                    <button class="btn btn-outline-secondary btn-sm" id="resetFilters">
                        Reset
                    </button>
                </div>

                <div style="min-width: 200px;">
                    <select id="customer_name" class="form-select form-select-sm select2" required>
                        <option value="">All Customers</option>
                    </select>
                </div>

                <div class="input-group input-group-merge" style="width: 250px;">
                    <span class="input-group-text"><i class="ri-search-line"></i></span>
                    <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search unpaid orders...">
                </div>
            </div>

            <!-- Bulk Actions -->
            <div id="bulkActions" class="d-flex align-items-center gap-2 mb-3 p-2 bg-light rounded">
                <div class="form-check mb-0">
                    <input class="form-check-input" type="checkbox" id="selectAll">
                    <label class="form-check-label" for="selectAll">Select All</label>
                </div>
                <button class="btn btn-success btn-sm" id="bulkMarkAsPaid">
                    <i class="ri-checkbox-circle-line me-1"></i> Mark Selected as PAID
                </button>
                <span id="selectedCount" class="badge bg-danger">0 selected</span>
            </div>

            <!-- Total Due Summary (Optional) -->
            <div class="alert alert-warning mb-3 py-2" id="totalDueSummary" style="display: none;">
                <i class="ri-information-line me-1"></i>
                Total Due Amount: <strong id="totalDueAmount">0 BHD</strong>
            </div>

            <!-- Main Table -->
            <div class="table-responsive">
                <table class="table table-hover w-100" id="unpaidOrdersTable">
                    <thead>
                        <tr>
                            <th width="40"><input type="checkbox" id="selectAllHeader"></th>
                            <th>Order ID</th>
                            <th>Customer</th>
                            <th>Product</th>
                            <th>Qty</th>
                            <th>Selling Price</th>
                            <th>Amount Due</th>
                            <th>Date</th>
                            <th>Order Status</th>
                            <th>Payment Status</th>
                            <th>Actions</th>
                        </tr>
                    </thead>
                    <tbody></tbody>
                </table>
            </div>
        </div>
    </div>
</div>

<!-- Invoice Modal -->
<div class="modal fade" id="invoiceModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title">Order Details</h5>
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