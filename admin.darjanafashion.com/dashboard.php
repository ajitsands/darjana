<?php
session_start(); 
//echo $_SESSION["user_type"];
?>
<!doctype html>
<html
 lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta content="company" name="SaNDsLaB">
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Darjana Admin</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />
    <link rel="stylesheet" href="https://msurguy.github.io/ladda-bootstrap/dist/ladda-themeless.min.css">
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />
    <link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
    <style>
        .row {
            --bs-gutter-x: 1rem;
        }
    </style>
  </head>
  <body>
    <!-- Layout wrapper -->
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <div class="layout-container">
        <!-- Navbar -->
        <?PHP include("templates/navbar.php"); ?>
        
        <!-- / Navbar -->

        <!-- Layout container -->
        <div class="layout-page">
          <!-- Content wrapper -->
          <div class="content-wrapper">
            <!-- Menu -->
             <?PHP include("templates/menu.php"); ?>
             
            <!-- / Menu -->

            <!-- Content -->
            <div class="container-fluid flex-grow-1 container-p-y">
              <!-- Your content here -->
            </div>
            <!--/ Content -->
			 <?PHP include("pages/dashborady_body.php"); ?>
            <!-- Footer -->
             <?PHP include("templates/footer.php"); ?>
            <!-- / Footer -->

            <div class="content-backdrop fade"></div>
          </div>
          <!--/ Content wrapper -->
        </div>
        <!--/ Layout container -->
      </div>
    </div>

    <!-- Overlay -->
    <div class="layout-overlay layout-menu-toggle"></div>

    <!-- Drag Target Area To SlideIn Menu On Small Screens -->
    <div class="drag-target"></div>

    <!-- SaNDS Popup -->
    <div id="dropdownContent" style="text-align:center;"></div>
        
    <!-- Core JS -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    
    <!-- Page JS -->
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
    <script src="../../assets/sands/settings.js"></script>
    <script src="../../assets/sands/sands_popup.js"></script>
    <script src="../../assets/js/forms-extras.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/spin.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/ladda.min.js"></script>
    <script src="../../assets/js/logout.js"></script>  
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    
    <!-- SweetAlert2 (IMPORTANT) -->
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    
    <!-- Your script -->
    <script src="your-script.js"></script>
    <!-- Session Alert Script -->
	<script>
		$(document).ready(function() {
			// Load all dashboard data
			loadDashboardData();
			loadSalesChart(30); 
			loadCategoriesChart();
			loadRecentOrders();
			loadTopProducts();
			loadCustomerLocations();
			loadInventoryStatus();

			// Period selector for sales chart
			$(document).on('click', '.dropdown-item[data-period]', function() {
				var period = $(this).data('period');
				loadSalesChart(period);
			});

			// Function to load all dashboard summary data
// 			function loadDashboardData() {
// 				$.ajax({
// 					url: '../controller/dashboard/dashboard_controller.php',
// 					type: 'POST',
// 					data: { action: 'get_dashboard_summary' },
// 					dataType: 'json',
// 					success: function(response) {
					   
// 						if (response) {
// 							// Update summary cards
// 				// 			$('#totalSales').text(response.total_sales.toLocaleString('en-IN') + ' BHD');
// 							$('#totalSales').text(response.total_sales.toLocaleString('en-IN'));
// 							$('#totalOrders').text(response.total_orders.toLocaleString('en-IN'));
// 							$('#totalCustomers').text(response.total_customers.toLocaleString('en-IN'));
// 							$('#totalProducts').text(response.total_products.toLocaleString('en-IN'));
							
// 							// Update growth indicators
// 							updateGrowthIndicator('#salesGrowth', response.sales_growth);
// 							updateGrowthIndicator('#ordersGrowth', response.orders_growth);
// 							updateGrowthIndicator('#customersGrowth', response.customers_growth);
// 							updateGrowthIndicator('#productsGrowth', response.products_growth);
// 						}
// 					}
// 				});
// 			}






    function loadDashboardData() {
				$.ajax({
					url: '../controller/dashboard/dashboard_controller.php',
					type: 'POST',
					data: { action: 'get_dashboard_summary' },
					dataType: 'json',
					success: function(response) {
					   
						if (response) {
							// Update summary cards
							$('#totalSales').text(Number(response.total_sales).toLocaleString('en-IN', { minimumFractionDigits: 3, maximumFractionDigits: 3 }));
							$('#totalCollected').text(Number(response.total_collected).toLocaleString('en-IN', { minimumFractionDigits: 3, maximumFractionDigits: 3 }));
							$('#totalOrders').text(response.total_orders.toLocaleString('en-IN'));
							$('#totalCustomers').text(response.total_customers.toLocaleString('en-IN'));
							$('#totalProducts').text(response.total_products.toLocaleString('en-IN'));
							
							// Update growth indicators
							updateGrowthIndicator('#salesGrowth', response.sales_growth);
							updateGrowthIndicator('#ordersGrowth', response.orders_growth);
							updateGrowthIndicator('#customersGrowth', response.customers_growth);
							updateGrowthIndicator('#productsGrowth', response.products_growth);
						}
					}
				});
			}

// 			function loadSalesChart(days) {
//                 $.ajax({
//                     url: '../controller/dashboard/dashboard_controller.php',
//                     type: 'POST',
//                     data: { 
//                         action: 'get_sales_data',
//                         days: days
//                     },
//                     dataType: 'json',
//                     success: function(response) {
//                         // Check if we have a valid response
//                         if (!response || !response.labels || !response.data) {
//                             console.error("Invalid response format", response);
//                             document.querySelector("#salesChart").innerHTML = 
//                                 '<div class="text-center text-danger p-4">' +
//                                 'Failed to load sales data. Please try again.' +
//                                 '</div>';
//                             return;
//                         }
            
//                         // Destroy existing chart if it exists
//                         if (window.salesChart && typeof window.salesChart.destroy === 'function') {
//                             window.salesChart.destroy();
//                         }
            
//                         // Create the chart
//                         var options = {
//                             chart: {
//                                 height: 350,
//                                 type: 'area',
//                                 zoom: { enabled: false },
//                                 toolbar: { show: false },
//                                 animations: { enabled: true }
//                             },
//                             series: [{
//                                 name: "Sales",
//                                 data: response.data
//                             }],
//                             dataLabels: { enabled: false },
//                             stroke: {
//                                 curve: 'smooth',
//                                 width: 3
//                             },
//                             colors: ['#7367F0'],
//                             fill: {
//                                 type: 'gradient',
//                                 gradient: {
//                                     shadeIntensity: 1,
//                                     opacityFrom: 0.7,
//                                     opacityTo: 0.3,
//                                     stops: [0, 90, 100]
//                                 }
//                             },
//                             grid: {
//                                 row: {
//                                     colors: ['#f3f3f3', 'transparent'],
//                                     opacity: 0.5
//                                 },
//                             },
//                             xaxis: {
//                                 categories: response.labels,
//                                 labels: {
//                                     formatter: function(value) {
//                                         return value; // Use provided labels (e.g., "Apr 21")
//                                     }
//                                 }
//                             },
//                             yaxis: {
//                                 labels: {
//                                     formatter: function(value) {
//                                         return value.toLocaleString('en-IN') + ' BHD';
//                                     }
//                                 },
//                                 min: 0 // Ensure chart starts at 0
//                             },
//                             tooltip: {
//                                 y: {
//                                     formatter: function(value) {
//                                         return value.toLocaleString('en-IN') + ' BHD';
//                                     }
//                                 }
//                             },
//                             noData: {
//                                 text: "No sales data available",
//                                 align: 'center',
//                                 verticalAlign: 'middle'
//                             }
//                         };
            
//                         // Initialize the chart
//                         window.salesChart = new ApexCharts(document.querySelector("#salesChart"), options);
//                         window.salesChart.render();
                        
//                         // Debug output
//                         console.log("Chart rendered with data:", {
//                             labels: response.labels,
//                             data: response.data
//                         });
//                     },
//                     error: function(xhr, status, error) {
//                         console.error("AJAX Error:", status, error);
//                         console.log("Response:", xhr.responseText);
//                         document.querySelector("#salesChart").innerHTML = 
//                             '<div class="text-center text-danger p-4">' +
//                             'Failed to load sales data. Please try again.' +
//                             '</div>';
//                     }
//                 });
//             }


function loadSalesChart(days) {
                $.ajax({
                    url: '../controller/dashboard/dashboard_controller.php',
                    type: 'POST',
                    data: { 
                        action: 'get_sales_data',
                        days: days
                    },
                    dataType: 'json',
                    success: function(response) {
                        // Check if we have a valid response
                        if (!response || !response.labels || !response.data) {
                            console.error("Invalid response format", response);
                            document.querySelector("#salesChart").innerHTML = 
                                '<div class="text-center text-danger p-4">' +
                                'Failed to load sales data. Please try again.' +
                                '</div>';
                            return;
                        }
            
                        // Destroy existing chart if it exists
                        if (window.salesChart && typeof window.salesChart.destroy === 'function') {
                            window.salesChart.destroy();
                        }
            
                        // Create the chart
                        var options = {
                            chart: {
                                height: 350,
                                type: 'area',
                                zoom: { enabled: false },
                                toolbar: { show: false },
                                animations: { enabled: true }
                            },
                            series: [{
                                name: "Sales",
                                data: response.data
                            }],
                            dataLabels: { enabled: false },
                            stroke: {
                                curve: 'smooth',
                                width: 3
                            },
                            colors: ['#7367F0'],
                            fill: {
                                type: 'gradient',
                                gradient: {
                                    shadeIntensity: 1,
                                    opacityFrom: 0.7,
                                    opacityTo: 0.3,
                                    stops: [0, 90, 100]
                                }
                            },
                            grid: {
                                row: {
                                    colors: ['#f3f3f3', 'transparent'],
                                    opacity: 0.5
                                },
                            },
                            xaxis: {
                                categories: response.labels,
                                labels: {
                                    formatter: function(value) {
                                        return value; // Use provided labels (e.g., "Apr 21")
                                    }
                                }
                            },
                            yaxis: {
                                labels: {
                                    formatter: function(value) {
                                        return value.toLocaleString('en-IN', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + ' BHD';
                                    }
                                },
                                min: 0 // Ensure chart starts at 0
                            },
                            tooltip: {
                                y: {
                                    formatter: function(value) {
                                        return value.toLocaleString('en-IN', { minimumFractionDigits: 3, maximumFractionDigits: 3 }) + ' BHD';
                                    }
                                }
                            },
                            noData: {
                                text: "No sales data available",
                                align: 'center',
                                verticalAlign: 'middle'
                            }
                        };
            
                        // Initialize the chart
                        window.salesChart = new ApexCharts(document.querySelector("#salesChart"), options);
                        window.salesChart.render();
                        
                        // Debug output
                        console.log("Chart rendered with data:", {
                            labels: response.labels,
                            data: response.data
                        });
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX Error:", status, error);
                        console.log("Response:", xhr.responseText);
                        document.querySelector("#salesChart").innerHTML = 
                            '<div class="text-center text-danger p-4">' +
                            'Failed to load sales data. Please try again.' +
                            '</div>';
                    }
                });
            }
			// Function to load categories chart
			function loadCategoriesChart() {
				$.ajax({
					url: '../controller/dashboard/dashboard_controller.php',
					type: 'POST',
					data: { action: 'get_categories_data' },
					dataType: 'json',
					success: function(response) {
						if (response && response.series && response.labels) {
							var options = {
								chart: {
									height: 250,
									type: 'donut',
								},
								labels: response.labels,
								series: response.series,
								colors: ['#7367F0', '#28C76F', '#00CFE8', '#EA5455', '#FF9F43'],
								legend: {
									show: false
								},
								plotOptions: {
									pie: {
										donut: {
											size: '70%',
											labels: {
												show: true,
												total: {
													show: true,
													label: 'Total Orders',
													formatter: function(w) {
														return w.globals.seriesTotals.reduce((a, b) => a + b, 0);
													}
												}
											}
										}
									}
								},
								dataLabels: {
									enabled: false
								}
							};

							var chart = new ApexCharts(document.querySelector("#categoriesChart"), options);
							chart.render();

							// Create custom legend
							var legendHtml = '';
							response.labels.forEach(function(label, index) {
								legendHtml += `
									<div class="d-inline-block mx-2">
										<span class="badge badge-dot" style="background-color: ${options.colors[index]}"></span>
										<span>${label}</span>
									</div>
								`;
							});
							$('#categoriesLegend').html(legendHtml);
						}
					}
				});
			}

    		function loadRecentOrders() {
                $.ajax({
                    url: '../controller/dashboard/dashboard_controller.php',
                    type: 'POST',
                    data: { action: 'get_recent_orders' },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.length > 0) {
                            var html = '';
                            $.each(response, function(index, order) {
                                // Determine display text for cancellation status
                                var displayStatus = order.status;
                                var cancelByText = '';
                                
                                // Check for Admin cancellations (exact match)
                                if (order.status === 'Cancelled' || order.status === 'Product Cancelled') {
                                    cancelByText = '<small class="d-block text-muted">Cancelled by Admin</small>';
                                } 
                                // Check for Customer cancellation (exact match - case sensitive)
                                else if (order.status === 'product cancelled') {
                                    cancelByText = '<small class="d-block text-muted">Cancelled by Customer</small>';
                                }
                                
                                html += `
                                    <tr>
                                        <td><strong>${order.order_id}</strong></td>
                                        <td>
                                            <div class="d-flex align-items-center">
                                                <div class="avatar avatar-sm me-2">
                                                    <span class="avatar-initial rounded-circle bg-label-primary">${order.customer_name.charAt(0)}</span>
                                                </div>
                                                <div>
                                                    <p class="mb-0">${order.customer_name}</p>
                                                    <small class="text-muted">${order.customer_mobile}</small>
                                                </div>
                                            </div>
                                        </div>
                                        <td>${order.product_name}</div>
                                        <td>${order.order_date}</div>
                                        <td>
                                            <div>
                                                <span class="badge ${getStatusBadgeClass(order.status)}">${displayStatus}</span>
                                                ${cancelByText}
                                            </div>
                                        </div>
                                        <td>
                                            <div class="dropdown">
                                                <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                                    <i class="ri-more-2-line"></i>
                                                </button>
                                                <div class="dropdown-menu">
                                                    
                                                    <h6 class="dropdown-header">Update Status</h6>
                                                    
                                                    ${order.status === 'Order Placed' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Processing')">
                                                        <i class="ri-settings-2-line me-1"></i> Mark as Processing
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Processing' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Quality Check')">
                                                        <i class="ri-checkbox-circle-line me-1"></i> Quality Check
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Quality Check' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Ready to Ship')">
                                                        <i class="ri-truck-line me-1"></i> Ready to Ship
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Ready to Ship' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Shipped')">
                                                        <i class="ri-ship-line me-1"></i> Mark as Shipped
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Shipped' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'In Transit')">
                                                        <i class="ri-roadster-line me-1"></i> In Transit
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'In Transit' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Out for Delivery')">
                                                        <i class="ri-truck-line me-1"></i> Out for Delivery
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Out for Delivery' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Delivered')">
                                                        <i class="ri-checkbox-circle-line me-1"></i> Mark as Delivered
                                                    </a>
                                                    ` : ''}
                                                    
                                                    ${order.status === 'Delivered' ? `
                                                    <a class="dropdown-item" href="javascript:void(0);" onclick="updateOrderStatus(${order.id}, 'Completed')">
                                                        <i class="ri-check-double-line me-1"></i> Mark as Completed
                                                    </a>
                                                    ` : ''}
                                                    
                                                    <!-- Show cancel options only for non-cancelled orders -->
                                                    ${!['Cancelled', 'Product Cancelled', 'product cancelled', 'Completed', 'Delivered'].includes(order.status) ? `
                                                    <div class="dropdown-divider"></div>
                                                    <a class="dropdown-item text-danger" href="javascript:void(0);" onclick="cancelOrderAsAdmin (${order.id})">
                                                        <i class="ri-close-circle-line me-1"></i> Cancel Order (Admin)
                                                    </a>
                                                    ` : ''}
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                `;
                            });
                            $('#recentOrdersTable tbody').html(html);
                        } else {
                            $('#recentOrdersTable tbody').html('<tr><td colspan="6" class="text-center">No recent orders found</td></tr>');
                        }
                    }
                });
            }
            
            
			function loadTopProducts() {
				$.ajax({
					url: '../controller/dashboard/dashboard_controller.php',
					type: 'POST',
					data: { action: 'get_top_products' },
					dataType: 'json',
					success: function(response) {
						if (response && response.length > 0) {
							var html = '';
							$.each(response, function(index, product) {
								html += `
									<tr>
										<td>
											<div class="d-flex flex-column">
												<span class="fw-semibold">${product.name}</span>
												<small class="text-muted">${product.brand || 'No Brand'}</small>
												<small class="text-muted">${product.category} / ${product.subcategory || 'No Subcategory'}</small>
											</div>
										</td>
										<td>${product.quantity_sold}</td>
										<td class="text-end">${product.total_sales.toLocaleString('en-IN')} BHD</td>
									</tr>
								`;
							});
							$('#topProductsList').html(html);
						} else {
							$('#topProductsList').html('<tr><td colspan="3" class="text-center py-3 text-muted">No products found</td></tr>');
						}
					}
				});
			}

			// Function to load customer locations
			function loadCustomerLocations() {
				$.ajax({
					url: '../controller/dashboard/dashboard_controller.php',
					type: 'POST',
					data: { action: 'get_customer_locations' },
					dataType: 'json',
					success: function(response) {
						if (response && response.length > 0) {
							var html = '';
							$.each(response, function(index, location) {
								html += `
									<tr>
										<td>${location.street}</td>
										<td>${location.customer_count}</td>
										<td>${location.order_count}</td>
									</tr>
								`;
							});
							$('#locationsTableBody').html(html);
						} else {
							$('#locationsTableBody').html('<tr><td colspan="3" class="text-center">No data available</td></tr>');
						}
					}
				});
			}

			// Function to load inventory status
			function loadInventoryStatus() {
				$.ajax({
					url: '../controller/dashboard/dashboard_controller.php',
					type: 'POST',
					data: { action: 'get_inventory_status' },
					dataType: 'json',
					success: function(response) {
						if (response) {
							$('#activeProducts').text(response.active_products);

							// Inventory by category chart
							if (response.categories && response.counts) {
								var options = {
									chart: {
										height: 200,
										type: 'bar',
										toolbar: {
											show: false
										}
									},
									plotOptions: {
										bar: {
											borderRadius: 4,
											horizontal: true,
										}
									},
									dataLabels: {
										enabled: false
									},
									colors: ['#7367F0'],
									series: [{
										name: 'Products',
										data: response.counts
									}],
									xaxis: {
										categories: response.categories,
									}
								};

								var chart = new ApexCharts(document.querySelector("#inventoryChart"), options);
								chart.render();
							}
						}
					}
				});
			}

			// Helper function to update growth indicators
			function updateGrowthIndicator(selector, value) {
				var element = $(selector);
				element.removeClass('text-success text-danger');
				if (value >= 0) {
					element.addClass('text-success');
					element.html('+' + value + '% <i class="ri-arrow-up-line"></i>');
				} else {
					element.addClass('text-danger');
					element.html(value + '% <i class="ri-arrow-down-line"></i>');
				}
			}

			function getStatusBadgeClass(status) {
                status = status.toLowerCase();
                if (status.includes('complete') || status.includes('delivered')) return 'bg-label-success';
                if (status.includes('process')) return 'bg-label-primary';
                if (status.includes('quality check')) return 'bg-label-info';
                if (status.includes('ready to ship')) return 'bg-label-info';
                if (status.includes('shipped') || status.includes('transit') || status.includes('delivery')) return 'bg-label-warning';
                if (status.includes('cancel')) return 'bg-label-danger';
                if (status.includes('pending') || status.includes('placed')) return 'bg-label-secondary';
                return 'bg-label-secondary';
            }

			// Function to update order status
// 			window.updateOrderStatus = function(orderId, status) {
//                 $.ajax({
//                     url: '../controller/dashboard/dashboard_controller.php',
//                     type: 'POST',
//                     data: { 
//                         action: 'update_order_status',
//                         order_id: orderId,
//                         status: status
//                     },
//                     success: function(response) {
//                         if (response === 'success') {
//                             loadRecentOrders();
//                             showSuccessAlert('Order status updated successfully');
//                         } else {
//                             showErrorAlert('Failed to update order status');
//                         }
//                     },
//                     error: function() {
//                         showErrorAlert('Error updating order status');
//                     }
//                 });
//             };
            // Function to cancel order as Admin (status = 'Cancelled')
            window.cancelOrderAsAdmin = function(orderId) {
                Swal.fire({
                    title: 'Cancel Order?',
                    text: "Are you sure you want to cancel this order as Admin?",
                    icon: 'warning',
                    showCancelButton: true,
                    confirmButtonColor: '#d33',
                    cancelButtonColor: '#3085d6',
                    confirmButtonText: 'Yes, cancel it!'
                }).then((result) => {
                    if (result.isConfirmed) {
                        $.ajax({
                            url: '../controller/dashboard/dashboard_controller.php',
                            type: 'POST',
                            data: { 
                                action: 'update_order_status',
                                order_id: orderId,
                                status: 'Product Cancelled'  // Admin cancellation
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    loadRecentOrders();
                                    showSuccessAlert('Order cancelled by Admin successfully');
                                } else {
                                    showErrorAlert('Failed to cancel order');
                                }
                            },
                            error: function() {
                                showErrorAlert('Error cancelling order');
                            }
                        });
                    }
                });
            };
            
            // Keep the existing updateOrderStatus function for customer cancellation
            window.updateOrderStatus = function(orderId, status) {
                // If status is 'Product Cancelled', show confirmation
                if (status === 'Product Cancelled') {
                    Swal.fire({
                        title: 'Cancel Order?',
                        text: "Are you sure you want to cancel this order as Customer?",
                        icon: 'warning',
                        showCancelButton: true,
                        confirmButtonColor: '#d33',
                        cancelButtonColor: '#3085d6',
                        confirmButtonText: 'Yes, cancel it!'
                    }).then((result) => {
                        if (result.isConfirmed) {
                            $.ajax({
                                url: '../controller/dashboard/dashboard_controller.php',
                                type: 'POST',
                                data: { 
                                    action: 'update_order_status',
                                    order_id: orderId,
                                    status: status
                                },
                                success: function(response) {
                                    if (response === 'success') {
                                        loadRecentOrders();
                                        showSuccessAlert('Order cancelled by Customer successfully');
                                    } else {
                                        showErrorAlert('Failed to update order status');
                                    }
                                },
                                error: function() {
                                    showErrorAlert('Error updating order status');
                                }
                            });
                        }
                    });
                } else {
                    // For non-cancellation status updates
                    $.ajax({
                        url: '../controller/dashboard/dashboard_controller.php',
                        type: 'POST',
                        data: { 
                            action: 'update_order_status',
                            order_id: orderId,
                            status: status
                        },
                        success: function(response) {
                            if (response === 'success') {
                                loadRecentOrders();
                                showSuccessAlert('Order status updated successfully');
                            } else {
                                showErrorAlert('Failed to update order status');
                            }
                        },
                        error: function() {
                            showErrorAlert('Error updating order status');
                        }
                    });
                }
            };
			// Helper function to show success alert
			function showSuccessAlert(message) {
				Swal.fire({
					icon: 'success',
					title: 'Success',
					text: message,
					timer: 2000,
					showConfirmButton: false
				});
			}

			// Helper function to show error alert
			function showErrorAlert(message) {
				Swal.fire({
					icon: 'error',
					title: 'Error',
					text: message
				});
			}
		});
	
	</script>
		
	<script>
		$(document).ready(function() {
			<?php if(isset($_SESSION['user_type'])): ?>
			var userType = "<?php echo htmlspecialchars($_SESSION['user_type'], ENT_QUOTES); ?>";
// 		alert("User Type: " + userType);
			<?php else: ?>
			var userType = null;
			<?php endif; ?>

			// You can now use `userType` in your jQuery code
			console.log("User type is: ", userType);
		});

    </script>
  </body>
</html>