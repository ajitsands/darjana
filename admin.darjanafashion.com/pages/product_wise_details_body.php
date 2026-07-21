<div class="container-fluid flex-grow-1 container-p-y">
    <div class="card">
        <div class="card-header d-flex justify-content-between align-items-center">
            <h5 class="mb-0">Product Wise Report ( Showing Default as Today's Report )</h5>
            <div class="d-flex align-items-center">
                <!-- Filter Button -->
                <button class="btn btn-primary me-2" type="button" data-bs-toggle="collapse" data-bs-target="#filterCollapse" aria-expanded="false" aria-controls="filterCollapse">
                    <i class="ri-filter-line me-1"></i> Filters
                </button>
              
                <div class="input-group input-group-merge">
                    <span class="input-group-text"><i class="ri-search-line"></i></span>
                    <input type="text" class="form-control form-control-sm" id="customSearch" placeholder="Search Products...">
                </div>
            </div>
        </div>

        <!-- Filter Section - Only Date Filters -->
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
            <!-- Main Table -->
            <table class="table table-hover" id="ProductwiseTable">
                <thead>
                    <tr>
                        <th>SlNo</th>
                        <th>Product</th>
                        <th>Qty</th>
                    </tr>
                </thead>
                <tbody></tbody>
            </table>
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