<!-- Tax Report Body Component -->
<div class="row mb-4">
    <div class="col-12 d-flex justify-content-between align-items-center">
        <div>
            <h4 class="fw-bold mb-1"><i class="ri-percent-line text-primary me-2"></i>TAX & VAT Report</h4>
            <p class="text-muted mb-0">Overview of Sales, VAT/Tax, and Payment Gateway Fee Deductions for Paid Orders</p>
        </div>
        <div>
            <button id="exportExcelBtn" class="btn btn-success">
                <i class="ri-file-excel-line me-1"></i> Export to Excel
            </button>
        </div>
    </div>
</div>

<!-- Row 1: Top 4 KPI Cards (All in a Single Row) -->
<div class="row mb-4 g-3">
    <div class="col-sm-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-primary">
                            <i class="ri-money-dollar-circle-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Total Sales (Excl. Tax)</h6>
                        <h4 class="mb-0 fw-bold text-dark" id="cardTotalSales">0.00 BHD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm border-start border-warning border-4">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
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

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-info">
                            <i class="ri-bank-card-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Total Gross Collected</h6>
                        <h4 class="mb-0 fw-bold text-info" id="cardTotalCollected">0.00 BHD</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="col-sm-6 col-lg-3">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-3">
                <div class="d-flex align-items-center">
                    <div class="avatar me-3">
                        <span class="avatar-initial rounded bg-label-secondary">
                            <i class="ri-shopping-bag-3-line ri-24px"></i>
                        </span>
                    </div>
                    <div>
                        <h6 class="mb-0 text-muted small">Paid Orders Count</h6>
                        <h4 class="mb-0 fw-bold text-dark" id="cardPaidCount">0</h4>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Row 2: Gateway Fee Calculation Card + Date Range Filter -->
<div class="row mb-4 g-3">
    <!-- Gateway Fee Calculation Card -->
    <div class="col-lg-6">
        <div class="card h-100 border-0 shadow-sm border-start border-success border-4">
            <div class="card-body p-3">
                <div class="d-flex align-items-center justify-content-between mb-2">
                    <div class="d-flex align-items-center">
                        <div class="avatar me-2" style="width: 32px; height: 32px;">
                            <span class="avatar-initial rounded bg-label-success fs-6">
                                <i class="ri-wallet-3-line"></i>
                            </span>
                        </div>
                        <div>
                            <h6 class="mb-0 text-dark fw-bold">Payment Gateway Calculation</h6>
                        </div>
                    </div>
                    <!-- Gateway Fee % Input Text Box -->
                    <div class="d-flex align-items-center bg-light rounded px-2 py-1 border">
                        <span class="small fw-semibold text-muted me-1">Gateway Fee %:</span>
                        <input type="number" id="cardGatewayFeeInput" class="form-control form-control-sm text-center fw-bold border-0 bg-transparent p-0" style="width: 50px; box-shadow: none;" step="0.1" min="0" max="100" value="2.5" placeholder="2.5">
                        <span class="small fw-bold text-muted">%</span>
                    </div>
                </div>

                <div class="row g-2 pt-2 border-top align-items-center">
                    <div class="col-6">
                        <span class="text-muted d-block small" style="font-size: 0.75rem;">Before Gateway Fee</span>
                        <span class="fw-bold text-dark fs-6" id="cardBeforeGateway">0.00 BHD</span>
                    </div>
                    <div class="col-6 text-end">
                        <span class="text-muted d-block small" style="font-size: 0.75rem;">After Gateway (Net Amount)</span>
                        <span class="fw-bold text-success fs-5" id="cardNetCollected">0.00 BHD</span>
                    </div>
                </div>

                <div class="mt-2 pt-2 border-top d-flex justify-content-between align-items-center">
                    <small class="text-muted" style="font-size: 0.75rem;">Fee Deducted:</small>
                    <small class="fw-bold text-danger" style="font-size: 0.80rem;" id="cardGatewayFeeAmount">-0.00 BHD</small>
                </div>
            </div>
        </div>
    </div>

    <!-- Date Range Filter Card -->
    <div class="col-lg-6">
        <div class="card h-100 border-0 shadow-sm">
            <div class="card-body p-3 d-flex flex-column justify-content-between">
                <h6 class="mb-2 text-dark fw-bold"><i class="ri-calendar-event-line text-primary me-1"></i> Date Filter</h6>
                <div class="row align-items-end g-2">
                    <div class="col-sm-6">
                        <label class="form-label small fw-medium mb-1">Start Date</label>
                        <input type="date" id="startDate" class="form-control form-control-sm">
                    </div>
                    <div class="col-sm-6">
                        <label class="form-label small fw-medium mb-1">End Date</label>
                        <input type="date" id="endDate" class="form-control form-control-sm">
                    </div>
                    <div class="col-12 d-flex gap-2 mt-2">
                        <button id="applyFilter" class="btn btn-primary btn-sm flex-grow-1">
                            <i class="ri-filter-3-line me-1"></i> Apply Filter
                        </button>
                        <button id="resetFilter" class="btn btn-outline-secondary btn-sm">
                            <i class="ri-refresh-line me-1"></i> Reset
                        </button>
                    </div>
                </div>
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
