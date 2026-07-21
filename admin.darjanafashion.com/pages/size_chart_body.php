<div class="container-fluid flex-grow-1 container-p-y px-0">
    <div class="card shadow-none border-0">
        <div class="card-header bg-transparent py-3">
            <h5 class="mb-0 fw-semibold">Size Chart Management</h5>
            <p class="text-muted small mb-0">Manage your abaya size chart data dynamically</p>
        </div>
        
        <div class="card-body pt-0">
            <!-- Tabs -->
            <ul class="nav nav-tabs mb-4" id="sizeChartTabs" role="tablist">
                <li class="nav-item" role="presentation">
                    <button class="nav-link active" id="descriptions-tab" data-bs-toggle="tab" data-bs-target="#descriptions" type="button" role="tab">
                        <i class="ri-file-text-line me-1"></i> Descriptions
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="measurements-tab" data-bs-toggle="tab" data-bs-target="#measurements" type="button" role="tab">
                        <i class="ri-ruler-line me-1"></i> Chest & Shoulder
                    </button>
                </li>
                <li class="nav-item" role="presentation">
                    <button class="nav-link" id="height-length-tab" data-bs-toggle="tab" data-bs-target="#height-length" type="button" role="tab">
                        <i class="ri-stack-line me-1"></i> Height to Length
                    </button>
                </li>
            </ul>
            
            <!-- Tab Content -->
            <div class="tab-content">
                <!-- Descriptions Tab -->
                <div class="tab-pane fade show active" id="descriptions" role="tabpanel">
                    <div class="row">
                        <div class="col-md-12 mb-3">
                            <label class="form-label">Chart Name</label>
                            <input type="text" class="form-control" id="chartName" value="Abaya Size Guide">
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description (English)</label>
                            <div id="editor-en" style="height: 300px;"></div> <!-- Increased height for better image viewing -->
                            <textarea class="form-control d-none" id="descriptionEn" rows="4"></textarea>
                            <small class="text-muted">You can add images by clicking the image icon in toolbar and pasting image URL</small>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label class="form-label">Description (Arabic)</label>
                            <div id="editor-ar" style="height: 300px; direction: rtl;"></div>
                            <textarea class="form-control d-none" id="descriptionAr" rows="4"></textarea>
                            <small class="text-muted">يمكنك إضافة الصور بالنقر على أيقونة الصورة في شريط الأدوات ولصق رابط الصورة</small>
                        </div>
                        <div class="col-12">
                            <button class="btn btn-primary" id="saveDescriptions">
                                <i class="ri-save-line me-1"></i> Save Descriptions
                            </button>
                        </div>
                    </div>
                </div>
                
                <!-- Measurements Tab (Chest & Shoulder) -->
                <div class="tab-pane fade" id="measurements" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Chest & Shoulder Measurements</h6>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2" id="loadMeasurements">
                                <i class="ri-refresh-line"></i> Refresh
                            </button>
                            <button class="btn btn-sm btn-success" id="addMeasurementRow">
                                <i class="ri-add-line"></i> Add Row
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive">
                        <table class="table table-bordered measurement-table">
                            <thead>
                                <tr>
                                    <th>Size Label</th>
                                    <th>Chest (inch)</th>
                                    <th>Shoulder (inch)</th>
                                    <th>Sort Order</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="measurementsTableBody">
                                <!-- Data will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <button class="btn btn-primary" id="saveMeasurements">
                            <i class="ri-save-line me-1"></i> Save All Measurements
                        </button>
                    </div>
                </div>
                
                <!-- Height to Length Tab -->
                <div class="tab-pane fade" id="height-length" role="tabpanel">
                    <div class="d-flex justify-content-between align-items-center mb-3">
                        <h6 class="mb-0">Height to Length Mapping</h6>
                        <div>
                            <button class="btn btn-sm btn-outline-primary me-2" id="loadHeightLength">
                                <i class="ri-refresh-line"></i> Refresh
                            </button>
                            <button class="btn btn-sm btn-success" id="addHeightLengthRow">
                                <i class="ri-add-line"></i> Add Row
                            </button>
                        </div>
                    </div>
                    
                    <div class="table-responsive height-length-table">
                        <table class="table table-bordered">
                            <thead>
                                <tr>
                                    <th>Height (cm)</th>
                                    <th>Abaya Length (inch)</th>
                                    <th>Status</th>
                                    <th>Actions</th>
                                </tr>
                            </thead>
                            <tbody id="heightLengthTableBody">
                                <!-- Data will be loaded here -->
                            </tbody>
                        </table>
                    </div>
                    
                    <div class="mt-3">
                        <button class="btn btn-primary" id="saveHeightLength">
                            <i class="ri-save-line me-1"></i> Save All Mappings
                        </button>
                    </div>
                    
                    <div class="alert alert-info mt-3">
                        <i class="ri-information-line me-1"></i>
                        <strong>Note:</strong> This mapping is used to recommend abaya length based on customer height.
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>