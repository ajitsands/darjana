<!-- Tax Report Body Component -->
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1"><i class="ri-percent-line text-primary me-2"></i>TAX & VAT Report</h4>
            <p class="text-muted mb-0">Overview of Sales & VAT/Tax collected for Paid Orders</p>
        </div>
        <div>
            <button id="exportExcelBtn" class="btn btn-success">
                <i class="ri-file-excel-line me-1"></i> Export to Excel
            </button>
        </div>
    </div>
</div>

<!-- KPI Cards -->
<div class="row mb-4">
    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="ri-money-dollar-circle-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Total Sales (Excl. Tax)</h6>
                        <h4 class="mb-0 fw-bold" id="cardTotalSales">0.00 BHD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-lg-0">
        <div class="card h-100 border-0 shadow-sm border-start border-warning border-4">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-warning">
                            <i class="ri-percent-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Tax / VAT Has to Pay</h6>
                        <h4 class="mb-0 fw-bold text-warning" id="cardTotalTax">0.00 BHD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3 mb-3 mb-sm-0">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-success">
                            <i class="ri-bank-card-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Total Gross Collected</h6>
                        <h4 class="mb-0 fw-bold text-success" id="cardTotalCollected">0.00 BHD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body">
                <div class="d-flex align-items-center mb-2">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="ri-shopping-bag-3-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Paid Orders Count</h6>
                        <h4 class="mb-0 fw-bold" id="cardPaidCount">0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Date Filter Card -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row align-items-end g-3">
            <div class="col-md-4">
                <label class="form-label fw-medium">Start Date</label>
                <input type="date" id="startDate" class="form-control" placeholder="Start Date">
            </div>
            <div class="col-md-4">
                <label class="form-label fw-medium">End Date</label>
                <input type="date" id="endDate" class="form-control" placeholder="End Date">
            </div>
            <div class="col-md-4 d-flex gap-2">
                <button id="applyFilter" class="btn btn-primary flex-grow-1">
                    <i class="ri-filter-3-line me-1"></i> Apply Filter
                </button>
                <button id="resetFilter" class="btn btn-outline-secondary">
                    <i class="ri-refresh-line me-1"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Tax Report Data Table -->
<div class="card">
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover table-striped w-100" id="taxReportTable">
                <thead>
                    <tr>
                        <th>Order ID</th>
                        <th>Order Date</th>
                        <th>Customer Name</th>
                        <th class="text-end">Net Sales (BHD)</th>
                        <th class="text-center">Tax %</th>
                        <th class="text-end">Tax / VAT (BHD)</th>
                        <th class="text-end">Shipping (BHD)</th>
                        <th class="text-end">Total Collected (BHD)</th>
                        <th class="text-center">Status</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Loaded via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>
