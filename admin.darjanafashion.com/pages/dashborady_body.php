<div class="container-fluid flex-grow-1 container-p-y">
    <div class="row row-cols-1 row-cols-md-2 row-cols-lg-5">
        <!-- Sales Summary -->
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Sales in BHD</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2" id="totalSales">0</h4>
                                <small class="text-success" id="salesGrowth">0%</small>
                            </div>
                            <small>vs last 30 days</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-primary rounded p-2">
                                <i class="ri-shopping-bag-line ri-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>

        <!-- Collected Summary -->
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Collected (Paid)</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2" id="totalCollected">0</h4>
                                <small class="text-success">Confirmed</small>
                            </div>
                            <small>Total Received Amount</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded p-2">
                                <i class="ri-money-dollar-circle-line ri-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Orders Summary -->
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Orders</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2" id="totalOrders">0</h4>
                                <small class="text-success" id="ordersGrowth">0%</small>
                            </div>
                            <small>vs last 30 days</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-success rounded p-2">
                                <i class="ri-shopping-cart-2-line ri-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Customers Summary -->
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Customers</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2" id="totalCustomers">0</h4>
                                <small class="text-success" id="customersGrowth">0%</small>
                            </div>
                            <small>vs last 30 days</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-warning rounded p-2">
                                <i class="ri-user-line ri-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Products Summary -->
        <div class="col mb-4">
            <div class="card">
                <div class="card-body">
                    <div class="d-flex justify-content-between">
                        <div class="card-info">
                            <p class="card-text">Total Products</p>
                            <div class="d-flex align-items-end mb-2">
                                <h4 class="card-title mb-0 me-2" id="totalProducts">0</h4>
                                <small class="text-success" id="productsGrowth">0%</small>
                            </div>
                            <small>vs last 30 days</small>
                        </div>
                        <div class="card-icon">
                            <span class="badge bg-label-info rounded p-2">
                                <i class="ri-box-3-line ri-2x"></i>
                            </span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Sales Chart -->
        <div class="col-lg-8 col-md-12 mb-4">
            <div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="card-title mb-0">Sales Overview</h5>
					<div class="dropdown">
						<button class="btn p-0" type="button" id="salesReportDropdown" data-bs-toggle="dropdown">
							<i class="ri-more-2-line"></i>
						</button>
						<div class="dropdown-menu dropdown-menu-end">
							<a class="dropdown-item" href="javascript:void(0);" onclick="loadSalesChart(7)">Last 7 Days</a>
							<a class="dropdown-item" href="javascript:void(0);" onclick="loadSalesChart(30)">Last 30 Days</a>
							<a class="dropdown-item" href="javascript:void(0);" onclick="loadSalesChart(90)">Last 90 Days</a>
						</div>
					</div>
				</div>
				<div class="card-body">
					<!-- Make sure this div has proper dimensions -->
					<div id="salesChart" style="min-height: 350px;"></div>
				</div>
			</div>
        </div>
        
        <!-- Top Categories -->
        <div class="col-lg-4 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Top Categories</h5>
                </div>
                <div class="card-body">
                    <div id="categoriesChart" class="my-3"></div>
                    <div id="categoriesLegend" class="text-center mt-3"></div>
                </div>
            </div>
        </div>
    </div>
    
    <div class="row">
        <!-- Recent Orders -->
        <div class="col-lg-8 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Recent Orders</h5>
                    <a href="Orders" class="btn btn-sm btn-outline-primary">View All</a>
                </div>
                <div class="table-responsive text-nowrap">
                    <table class="table table-hover" id="recentOrdersTable">
                        <thead>
                            <tr>
                                <th>Order ID</th>
                                <th>Customer</th>
                                <th>Product</th>
                                <th>Date</th>
                                <th>Status</th>
                                <th>Actions</th>
                            </tr>
                        </thead>
                        <tbody class="table-border-bottom-0">
                            <!-- Data will be loaded via AJAX -->
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
        
        <!-- Top Selling Products (without images) -->
		<div class="col-lg-4 col-md-12 mb-4">
			<div class="card">
				<div class="card-header d-flex justify-content-between align-items-center">
					<h5 class="card-title mb-0">Top Selling Products</h5>
					<!--<a href="products.php" class="btn btn-sm btn-outline-primary">View All</a>-->
				</div>
				<div class="card-body">
					<div class="table-responsive">
						<table class="table table-borderless">
							<thead>
								<tr>
									<th>Product</th>
									<th>Sold</th>
									<th>Revenue</th>
								</tr>
							</thead>
							<tbody id="topProductsList">
								<!-- Data will be loaded via AJAX -->
							</tbody>
						</table>
					</div>
				</div>
			</div>
		</div>
    
    <div class="row mt-4">
        <!-- Customer Locations -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header">
                    <h5 class="card-title mb-0">Customer Locations</h5>
                </div>
                <div class="card-body">
                    <div id="customerLocations" style="height: 300px;overflow-y: auto;">
                        <table class="table table-sm">
                            <thead>
                                <tr>
                                    <th>Area</th>
                                    <th>Customers</th>
                                    <th>Orders</th>
                                </tr>
                            </thead>
                            <tbody id="locationsTableBody">
                                <!-- Data will be loaded via AJAX -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
        
        <!-- Inventory Status -->
        <div class="col-lg-6 col-md-12 mb-4">
            <div class="card">
                <div class="card-header d-flex justify-content-between align-items-center">
                    <h5 class="card-title mb-0">Inventory Status</h5>
                </div>
                <div class="card-body">
                    <div class="row">
                        <div class="col-6">
                            <div class="d-flex align-items-center mb-3">
                                <div class="avatar avatar-md me-3">
                                    <span class="avatar-initial rounded bg-label-primary">
                                        <i class="ri-checkbox-circle-line ri-1x"></i>
                                    </span>
                                </div>
                                <div>
                                    <p class="mb-0">Active Products</p>
                                    <h4 class="mb-0" id="activeProducts">0</h4>
                                </div>
                            </div>
                        </div>                      
                    </div>
                    <div class="mt-4">
                        <h6 class="mb-3">Categories Distribution</h6>
                        <div id="inventoryChart"></div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>
