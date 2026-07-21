<!-- <div class="container-fluid flex-grow-1 container-p-y"> -->
                        
<!-- Header -->
<div class="row mb-4">
    <div class="col-12">
        <h4 class="fw-bold">Tailoring Batches Management</h4>
        <p class="text-muted">View and manage items sent to tailoring units</p>
    </div>
</div>

<!-- Filters -->
<div class="card mb-4">
    <div class="card-body">
        <div class="row">
            <div class="col-md-4">
                <label class="form-label">Date Range</label>
                <div class="d-flex gap-2">
                    <input type="date" id="startDate" class="form-control" placeholder="Start Date">
                    <input type="date" id="endDate" class="form-control" placeholder="End Date">
                </div>
            </div>
            <div class="col-md-3">
                <label class="form-label">Tailoring Unit</label>
                <select id="unitFilter" class="form-select">
                    <option value="">All Units</option>
                </select>
            </div>
            <div class="col-md-2">
                <label class="form-label">Status</label>
                <select id="statusFilter" class="form-select">
                    <option value="">All Status</option>
                    <option value="Pending">Pending</option>
                    <option value="In Progress">In Progress</option>
                    <option value="Completed">Completed</option>
                    <option value="Cancelled">Cancelled</option>
                </select>
            </div>
            <div class="col-md-3 d-flex align-items-end">
                <button id="applyFilter" class="btn btn-primary me-2">
                    <i class="ri-filter-3-line"></i> Apply
                </button>
                <button id="resetFilter" class="btn btn-secondary">
                    <i class="ri-refresh-line"></i> Reset
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Batches List -->
<div class="card">
    <!--<div class="card-header d-flex justify-content-between align-items-center">-->
    <!--    <h5 class="mb-0">Batches List</h5>-->
    <!--    <div>-->
    <!--        <button class="btn btn-success" onclick="exportBatches()">-->
    <!--            <i class="ri-file-excel-line"></i> Export-->
    <!--        </button>-->
    <!--    </div>-->
    <!--</div>-->
    <div class="card-body">
        <div class="table-responsive">
            <table class="table table-hover" id="batchesTable">
                <thead>
                    <tr>
                        <th>Batch Code</th>
                        <th>Tailoring Unit</th>
                        <th>Items Count</th>
                        <th>Created Date</th>
                        <th>Status</th>
                        <th>Actions</th>
                    </tr>
                </thead>
                <tbody>
                    <!-- Data will be loaded via AJAX -->
                </tbody>
            </table>
        </div>
    </div>
</div>

<!-- Batch Details Modal -->
<div class="modal fade" id="batchDetailsModal" tabindex="-1">
    <div class="modal-dialog modal-xl">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title">Batch Details</h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-6">
                        <h6 class="fw-bold">Batch Information</h6>
                        <table class="table table-sm">
                            <tr>
                                <th>Batch Code:</th>
                                <td id="detailBatchCode"></td>
                            </tr>
                            <tr>
                                <th>Tailoring Unit:</th>
                                <td id="detailUnit"></td>
                            </tr>
                            <tr>
                                <th>Description:</th>
                                <td id="detailDescription"></td>
                            </tr>
                            <tr>
                                <th>Created Date:</th>
                                <td id="detailCreatedDate"></td>
                            </tr>
                            <!--<tr>-->
                            <!--    <th>Status:</th>-->
                            <!--    <td id="detailStatus"></td>-->
                            <!--</tr>-->
                        </table>
                    </div>
                    <!--<div class="col-md-6">-->
                    <!--    <h6 class="fw-bold">Update Status</h6>-->
                    <!--    <div class="mb-3">-->
                    <!--        <select id="updateBatchStatus" class="form-select">-->
                    <!--            <option value="Pending">Pending</option>-->
                    <!--            <option value="In Progress">In Progress</option>-->
                    <!--            <option value="Completed">Completed</option>-->
                    <!--            <option value="Cancelled">Cancelled</option>-->
                    <!--        </select>-->
                    <!--    </div>-->
                    <!--    <button class="btn btn-primary" onclick="updateBatchStatus()">-->
                    <!--        Update Status-->
                    <!--    </button>-->
                        <!--<button class="btn btn-success" onclick="printBatch()">-->
                        <!--    <i class="ri-printer-line"></i> Print-->
                        <!--</button>-->
                    <!--</div>-->
                </div>
                
                <h6 class="fw-bold">Items in this Batch</h6>
                <div class="table-responsive">
                    <table class="table table-bordered item-details-table">
                        <thead>
                            <tr>
                                <th width="40px">
                                    <i class="ri-checkbox-line"></i>
                                </th>
                                <th>Order ID</th>
                                <th>Customer Name</th>
                                <th>Product</th>
                                <th>Quantity</th>
                                <th>Color</th>
                                <th>Size</th>
                                <th>Length</th>
                                <th>Status</th>
                                <th>Notes</th>
                            </tr>
                        </thead>
                        <tbody id="batchItemsList">
                            <!-- Items will be loaded here -->
                        </tbody>
                    </table>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<!-- </div> -->