<?php
session_start();
?>
<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport"
        content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Darjana Admin</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
        rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
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
    <!--<link rel="stylesheet" href="https://cdn.datatables.net/1.11.5/css/jquery.dataTables.min.css">-->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>

    <style>
    .row {
        --bs-gutter-x: 1rem;
    }
    .dt-controls {
        cursor: pointer;
        text-align: center;
    }
    .shown .dt-controls::before {
        content: "-";
        color: red;
        font-size: 20px;
    }
    .dt-controls::before {
        content: "+";
        color: green;
        font-size: 20px;
    }
    .modal-content {
        border-radius: 10px;
        border: none;
    }
    .modal-header {
        border-radius: 10px 10px 0 0;
    }
    .modal-footer {
        border-radius: 0 0 10px 10px;
    }
    .btn-outline-primary:hover {
        background-color: #0d6efd;
        color: white;
    }
    .form-control:focus {
        border-color: #0d6efd;
        box-shadow: 0 0 0 0.2rem rgba(13, 110, 253, 0.25);
    }
    #productTable {
        width: 100% !important;
        border-collapse: collapse !important;
    }
    #productTable th,
    #productTable td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 8px;
        border: 1px solid #ddd;
    }
    #productTable thead th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    #productTable tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }
    #productTable tbody tr:hover {
        background-color: #f1f1f1;
    }
    #productTable tbody tr.selected {
        background-color: #e6f2ff !important;
        border-left: 3px solid #0066cc !important;
    }
    .table-responsive {
        overflow-x: auto;
        -webkit-overflow-scrolling: touch;
    }
    .invoice-container {
        background: #fff;
        padding: 20px;
        border-radius: 5px;
    }
    .invoice-header {
        border-bottom: 1px solid #eee;
        padding-bottom: 15px;
    }
    .invoice-footer {
        border-top: 1px solid #eee;
        padding-top: 15px;
    }
    .table-bordered {
        border: 1px solid #dee2e6;
    }
    .table-bordered th,
    .table-bordered td {
        border: 1px solid #dee2e6;
    }
    .text-end {
        text-align: right;
    }
    @media print {
        body * {
            visibility: hidden;
        }
        .invoice-container,
        .invoice-container * {
            visibility: visible;
        }
        .invoice-container {
            position: absolute;
            left: 0;
            top: 0;
            width: 100%;
        }
        .modal-footer {
            display: none;
        }
    }
    /* Add to your existing styles */
    .tailoring-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.25rem 0.5rem;
        font-size: 0.75rem;
        font-weight: 500;
        border-radius: 0.25rem;
    }
    
    .tailoring-status-badge i {
        margin-right: 0.25rem;
        font-size: 0.875rem;
    }
    
    .tailoring-status-badge[data-status="Pending"] {
        background-color: #ffc107;
        color: #000;
    }
    
    .tailoring-status-badge[data-status="In Progress"] {
        background-color: #0dcaf0;
        color: #000;
    }
    
    .tailoring-status-badge[data-status="Completed"] {
        background-color: #198754;
        color: #fff;
    }
    
    .tailoring-status-badge[data-status="Cancelled"] {
        background-color: #dc3545;
        color: #fff;
    }
    
    .filter-bar{
    display:flex;
    flex-wrap:wrap;
    align-items:center;
    gap:10px;
    }
    
    .filter-bar .input-group{
        width:auto;
    }
    
    .filter-bar .form-control,
    .filter-bar .form-select{
        height:34px;
    }
    
    .filter-bar .btn{
        height:34px;
        display:flex;
        align-items:center;
    }
        
        
    .date-filter{
    max-width:180px;
    }

    .date-filter .input-group-text{
        font-size:13px;
        color:#555;
        border-right:0;
    }
    
    .date-filter input{
        border-left:0;
        font-size:13px;
    }    
    
    </style>
</head>

<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <?PHP include("templates/navbar.php"); ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <?PHP include("templates/menu.php"); ?>
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?PHP include("pages/order_details_body.php"); ?>
                    </div>
                    <?PHP include("templates/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    <div id="dropdownContent" style="text-align:center;"></div>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/apex-charts/apexcharts.js"></script>
    <script src="../../assets/vendor/libs/swiper/swiper.js"></script>
    <script src="../../assets/sands/settings.js"></script>
    <script src="../../assets/sands/sands_popup.js"></script>
    <script src="../../assets/js/forms-extras.js"></script>
    <script src="../../assets/vendor/libs/jquery-repeater/jquery-repeater.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/spin.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/ladda.min.js"></script>

    <script>
    
        function printBatch(batchId) {
            if (!batchId) {
                Swal.fire('Error', 'Invalid batch ID', 'error');
                return;
            }
            
            // Open the tailoring slip PDF in a new tab
            const pdfUrl = `../controller/orders/generate_tailoring_slip.php?batch_id=${batchId}`;
            window.open(pdfUrl, '_blank');
        }
        
        // Also create a function to download/print with options
        function printBatchWithOptions(batchId, openInNewTab = true) {
            if (!batchId) {
                Swal.fire('Error', 'Invalid batch ID', 'error');
                return;
            }
            
            const pdfUrl = `../controller/orders/generate_tailoring_slip.php?batch_id=${batchId}`;
            
            if (openInNewTab) {
                window.open(pdfUrl, '_blank');
            } else {
                // Option to download instead of open
                const link = document.createElement('a');
                link.href = pdfUrl;
                link.download = `tailoring_batch_${batchId}.pdf`;
                link.click();
            }
        }
            
        $(document).ready(function() {
            loadTailoringUnits();
            let tailoringMode = null;
            let tailoringItemIds = [];
            
            const statusSequence = [
                'order placed',
                'Processing',
                'Quality Check',
                'Ready to Ship',
                'Shipped',
                'In Transit',
                'out for delivery',
                'Delivered',
                'Completed'
            ];
            const endDate = new Date();
            const startDate = new Date();
            startDate.setDate(startDate.getDate() - 30);
        
            $('#startDate').val(startDate.toISOString().split('T')[0]);
            $('#endDate').val(endDate.toISOString().split('T')[0]);
        
            let currentStatus = '';
            let isOrderIdSearch = false;
            let selectedOrderIds = [];
            let isBulkUpdate = false; // Ensure isBulkUpdate is defined
        
            const ordersTable = initDataTable();
            $('#customer_name').select2({
                placeholder: '- Please Select -',
                allowClear: true
            });
            fetchCustomerName();
           
            function fetchCustomerName() {
            $.ajax({
                url: '../controller/orders/orders_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_customer_name'
                    
                },
                success: function(response) {
                    var customername = JSON.parse(response);
                    var options = '<option value="">Select Customer</option>';
                    customername.forEach(function(customername) {
                        options += `<option value="${customername.ids}">${customername.customer_name}</option>`;
                    });
                    $('#customer_name').html(options).trigger('change');
                },
                error: function() {
                    console.error('Error fetching customer_name');
                }
            });
        }
        
        
           
        
            $(document).on('click', '.status-option', function(e) {
                e.preventDefault();
                const status = $(this).data('status');
                currentStatus = status;
                $('#selectedStatus').text($(this).text());
                
                if (status === 'search_by_id') {
                    isOrderIdSearch = true;
                    $('#customSearch').attr('placeholder', 'Search by Order ID...');
                    $('#bulkActions').show();
                    ordersTable.column(0).visible(true);
                    $('#selectAllHeader').show();
                } else {
                    isOrderIdSearch = false;
                    $('#customSearch').attr('placeholder', 'Search orders...');
                    if (status === '') {
                        $('#selectedStatus').text('All Statuses');
                        $('#bulkActions').hide();
                        ordersTable.column(0).visible(false);
                        $('#selectAllHeader').hide();
                    } else {
                        $('#bulkActions').show();
                        ordersTable.column(0).visible(true);
                        $('#selectAllHeader').show();
                    }
                }
                
                $('#customSearch').val('');
                ordersTable.ajax.reload();
            });
            
            $(document).on('change', '#customer_name', function () {
                ordersTable.ajax.reload(); // reload datatable
            });
        
            $('#orderIdSearch').on('keyup', function() {
                orderIdSearchValue = $(this).val().trim();
                if (orderIdSearchValue) {
                    clearTimeout(window.orderIdSearchTimer);
                    window.orderIdSearchTimer = setTimeout(function() {
                        ordersTable.column(0).visible(true);
                        $('#bulkActions').show();
                        ordersTable.ajax.reload();
                    }, 500);
                }
            });
        
            function initDataTable() {
                return $('#ordersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '../controller/orders/orders_controller.php',
                        type: 'POST',
                        data: function(d) {
                            return {
                                action: 'get_orders',
                                customer_id: $('#customer_name').val(),
                                status: isOrderIdSearch ? null : currentStatus,
                                order_id: isOrderIdSearch ? $('#customSearch').val() || null : null,
                                start_date: $('#startDate').val(),
                                end_date: $('#endDate').val(),
                                search: !isOrderIdSearch ? $('#customSearch').val() || d.search.value : null,
                                start: d.start,
                                length: d.length,
                                order_column: d.order[0].column,
                                order_dir: d.order[0].dir,
                                draw: d.draw
                            };
                        },
                        error: function(xhr, error, thrown) {
                            console.error('AJAX error:', xhr.responseText, error, thrown);
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: 'Failed to load data. Please try again.'
                            });
                        }
                    },
                    columns: [
                        {
                            data: 'ids',
                            orderable: false,
                            render: function(data, type, row) {
                                return `<input type="checkbox" class="order-checkbox" value="${data}" data-order-id="${row.order_id}">`;
                            },
                            className: 'dt-checkbox-col',
                            visible: false
                        },
                        {
                            data: 'order_id',
                            render: function(data, type, row) {
                                return `<strong>#${data}</strong>`;
                            }
                        },
                        {
                            data: 'customer',
                            render: function(data) {
                                return `
                                    <div class="d-flex align-items-center">
                                        <div class="avatar avatar-sm me-2">
                                            <span class="avatar-initial rounded-circle bg-label-primary">${data.name.charAt(0)}</span>
                                        </div>
                                        <div>
                                            <p class="mb-0">${data.name}</p>
                                            <small class="text-muted">${data.phone}</small>
                                        </div>
                                    </div>
                                `;
                            }
                        },
                        { data: 'product_name' },
                        { data: 'quantity' },
                        {
                            data: 'amount',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} BHD`;
                            }
                        },
                        {
                            data: 'selling_price',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} BHD`;
                            }
                        },
                        {
                            data: 'discount_price',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} BHD`;
                            }
                        },
                        {
                            data: 'tax_percentage',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} %`;
                            }
                        },
                        {
                            data: 'actual_cost',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} BHD`;
                            }
                        },
                        {
                            data: 'product_notes',
                           
                        },
                        {
                            data: 'order_date',
                            render: function(data) {
                                return new Date(data).toLocaleDateString('en-US', {
                                    month: 'short',
                                    day: 'numeric',
                                    year: 'numeric'
                                });
                            }
                        },
                        {
                            data: 'status',
                            render: function(data) {
                                const statusClass = getStatusBadgeClass(data);
                                let displayText = data;
                                let badgeExtra = '';
                        
                                if (data.toLowerCase() === 'product cancelled') {
                                    if (data === 'product cancelled') {
                                        badgeExtra = ' <small class="text-muted">(by Customer)</small>';
                                    } else if (data === 'Product Cancelled') {
                                        badgeExtra = ' <small class="text-muted">(by Admin)</small>';
                                    }
                                }
                        
                                return `<span class="badge ${statusClass}">${displayText}${badgeExtra}</span>`;
                            }
                        },
                        {
                            data: null, // Column for item-level tailoring status
                            render: function(data, type, row) {
                                // Only show tailoring status if order status is "Processing"
                                if (row.status === 'Processing' && row.tailoring_item_status) {
                                    const tailoringStatus = row.tailoring_item_status;
                                    let badgeClass = 'bg-secondary';
                                    let icon = '';
                                    
                                    switch(tailoringStatus) {
                                        case 'Pending':
                                            badgeClass = 'bg-warning';
                                            icon = '<i class="ri-time-line me-1"></i>';
                                            break;
                                        case 'In Progress':
                                            badgeClass = 'bg-info';
                                            icon = '<i class="ri-loader-4-line ri-spin me-1"></i>';
                                            break;
                                        case 'Completed':
                                            badgeClass = 'bg-success';
                                            icon = '<i class="ri-checkbox-circle-line me-1"></i>';
                                            break;
                                        case 'Cancelled':
                                            badgeClass = 'bg-danger';
                                            icon = '<i class="ri-close-circle-line me-1"></i>';
                                            break;
                                        default:
                                            badgeClass = 'bg-secondary';
                                            icon = '<i class="ri-question-line me-1"></i>';
                                    }
                                    
                                    // Show tooltip with batch code and item status
                                    return `
                                        <span class="badge ${badgeClass}" 
                                              title="Batch: ${row.tailoring_batch_code || 'N/A'} | Item Status: ${tailoringStatus}"
                                              data-bs-toggle="tooltip">
                                            ${icon} ${tailoringStatus}
                                        </span>
                                    `;
                                } else if (row.status === 'Processing' && !row.tailoring_item_status) {
                                    // In Processing but no tailoring batch item
                                    return `
                                        <span class="badge bg-secondary" title="No tailoring batch item found">
                                            <i class="ri-error-warning-line me-1"></i> Not Assigned
                                        </span>
                                    `;
                                } else {
                                    // Not in Processing status
                                    return `
                                        <span class="badge bg-light text-dark">
                                            <i class="ri-subtract-line me-1"></i> N/A
                                        </span>
                                    `;
                                }
                            }
                        },
                        {
                            data: 'actions',
                            orderable: false,
                            render: function(data, type, row) {
                                const isCancelled = row.status.toLowerCase() === 'product cancelled';
                                
                                // Check if tailoring is completed for orders in Processing
                                const canMoveFromProcessing = !(row.status === 'Processing' && 
                                                               row.tailoring_status && 
                                                               row.tailoring_status !== 'Completed');
                                
                                return `
                                    <div class="dropdown">
                                        <button type="button" class="btn p-0 dropdown-toggle hide-arrow" data-bs-toggle="dropdown">
                                            <i class="ri-more-2-line"></i>
                                        </button>
                                        <div class="dropdown-menu">
                                            <a class="dropdown-item view-invoice" href="javascript:void(0);" data-id="${row.ids}" data-order-id="${row.order_id}">
                                                <i class="ri-eye-line me-1"></i> View Order
                                            </a>
                                            <div class="dropdown-divider"></div>
                                            ${!isCancelled ? `
                                            <h6 class="dropdown-header">Update Status</h6>
                                            ${row.status === 'order placed' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="Processing">
                                                <i class="ri-settings-2-line me-1"></i> Mark as Processing
                                            </a>
                                            ` : ''}
                                            ${row.status === 'Processing' ? `
                                            <a class="dropdown-item status-update" 
                                               data-id="${row.ids}" 
                                               data-status="Quality Check"
                                               ${!canMoveFromProcessing ? 'style="opacity:0.5; pointer-events:none;" title="Complete tailoring first"' : ''}>
                                                <i class="ri-checkbox-circle-line me-1"></i> Quality Check
                                                ${!canMoveFromProcessing ? '<br><small class="text-muted">(Tailoring not completed)</small>' : ''}
                                            </a>
                                            ` : ''}
                                            ${row.status === 'Quality Check' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="Ready to Ship">
                                                <i class="ri-truck-line me-1"></i> Ready to Ship
                                            </a>
                                            ` : ''}
                                            ${row.status === 'Ready to Ship' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="Shipped">
                                                <i class="ri-ship-line me-1"></i> Mark as Shipped
                                            </a>
                                            ` : ''}
                                            ${row.status === 'Shipped' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="In Transit">
                                                <i class="ri-roadster-line me-1"></i> In Transit
                                            </a>
                                            ` : ''}
                                            ${row.status === 'In Transit' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="out for delivery">
                                                <i class="ri-truck-line me-1"></i> Out for Delivery
                                            </a>
                                            ` : ''}
                                            ${row.status === 'out for delivery' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="Delivered">
                                                <i class="ri-checkbox-circle-line me-1"></i> Mark as Delivered
                                            </a>
                                            ` : ''}
                                            ${row.status === 'Delivered' ? `
                                            <a class="dropdown-item status-update" data-id="${row.ids}" data-status="Completed">
                                                <i class="ri-check-double-line me-1"></i> Mark as Completed
                                            </a>
                                            ` : ''}
                                            <div class="dropdown-divider"></div>
                                            ` : ''}
                                            <div class="dropdown-divider"></div>
                                            <a class="dropdown-item" href="javascript:void(0);" onclick="printInvoice(${row.ids}, '${row.order_id}')">
                                                <i class="ri-printer-line me-1"></i> Print
                                            </a>
                                        </div>
                                    </div>
                                `;
                            }
                        }
                    ],
                    order: [[6, 'desc']],
                    dom: '<"top">rt<"bottom"lip><"clear">',
                    language: {
                        emptyTable: "<div class='text-center py-4'>No orders found for the selected criteria</div>",
                        info: "Showing _START_ to _END_ of _TOTAL_ orders",
                        infoEmpty: "Showing 0 to 0 of 0 orders",
                        infoFiltered: "(filtered from _MAX_ total orders)",
                        zeroRecords: "<div class='text-center py-4'>No matching orders found</div>"
                    },
                    columnDefs: [
                        {
                            targets: 0,
                            visible: false
                        }
                    ],
                    initComplete: function() {
                        this.api().columns.adjust().draw();
                        if (isOrderIdSearch || currentStatus) {
                            $('#selectAllHeader').show();
                            this.api().column(0).visible(true);
                        } else {
                            $('#selectAllHeader').hide();
                            this.api().column(0).visible(false);
                        }
                        
                        // Initialize tooltips
                        $('[data-bs-toggle="tooltip"]').tooltip();
                    }
                });
            }
            
            function getTailoringStatusBadgeClass(status) {
                switch(status) {
                    case 'Pending':
                        return 'bg-warning';
                    case 'In Progress':
                        return 'bg-info';
                    case 'Completed':
                        return 'bg-success';
                    case 'Cancelled':
                        return 'bg-danger';
                    default:
                        return 'bg-secondary';
                }
            }
            
            function loadTailoringUnits() {
                $.ajax({
                    url: '../controller/orders/orders_controller.php',
                    type: 'POST',
                    data: { action: 'get_tailoring_units' },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success) {
                            let html = '<option value="">-- Choose unit --</option>';
                            res.units.forEach(u => {
                                html += `<option value="${u.ids}">${u.unit_name} (${u.contact_person || '—'})</option>`;
                            });
                            $('#tailoringUnitSelect').html(html).trigger('change');
                        }
                    }
                });
            }
            $('#customSearch').on('keyup', function() {
                const searchValue = $(this).val().trim();
                clearTimeout(window.searchTimer);
                window.searchTimer = setTimeout(function() {
                    if (isOrderIdSearch && searchValue) {
                        ordersTable.column(0).visible(true);
                        $('#bulkActions').show();
                    }
                    ordersTable.ajax.reload();
                }, 500);
            });
        
            $('#applyFilter').click(function() {
                const startDate = $('#startDate').val();
                const endDate = $('#endDate').val();
        
                if (startDate && endDate && new Date(startDate) > new Date(endDate)) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Date Range',
                        text: 'End date must be after start date'
                    });
                    return;
                }
        
                ordersTable.ajax.reload();
            });
        
            $('#resetFilters').click(function() {
                const endDate = new Date();
                const startDate = new Date();
                startDate.setDate(startDate.getDate() - 30);
                $('#startDate').val(startDate.toISOString().split('T')[0]);
                $('#endDate').val(endDate.toISOString().split('T')[0]);
                $('#customSearch').val('');
                $('#customSearch').attr('placeholder', 'Search orders...');
                $('#selectedStatus').text('All Statuses');
                currentStatus = '';
                isOrderIdSearch = false;
                $('#bulkActions').hide();
                ordersTable.column(0).visible(false);
                $('#selectAllHeader').hide();
                ordersTable.ajax.reload();
            });
        
            $(document).on('change', '.order-checkbox', function() {
                updateSelectedCount();
            });
        
            $('#selectAll').change(function() {
                $('.order-checkbox').prop('checked', $(this).prop('checked'));
                updateSelectedCount();
            });
        
            $('#selectAllHeader').change(function() {
                $('.order-checkbox').prop('checked', $(this).prop('checked'));
                updateSelectedCount();
            });
        
            function updateSelectedCount() {
                selectedOrderIds = [];
                $('.order-checkbox:checked').each(function() {
                    selectedOrderIds.push({
                        itemId: $(this).val(),
                        orderId: $(this).data('order-id')
                    });
                });
                $('#selectedCount').text(selectedOrderIds.length + ' selected');
            }
        
            // Modified: Updated performBulkStatusUpdate to handle selectedOrderIds object array
            function performBulkStatusUpdate(orderIds, newStatus) {
                console.log('Performing bulk status update for IDs:', orderIds, 'to status:', newStatus); // Debug log
                // Ensure orderIds contains only itemIds
                const itemIds = orderIds.map(id => typeof id === 'object' ? id.itemId : id);
                $.ajax({
                    url: '../controller/orders/orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'bulk_update_status',
                        order_ids: itemIds,
                        status: newStatus
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        console.log('Sending AJAX request for status update'); // Debug log
                        Swal.fire({
                            title: 'Updating Status',
                            html: 'Please wait...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        console.log('Status update response:', response); // Debug log
                        Swal.close();
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message || 'Orders status updated successfully',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                ordersTable.ajax.reload();
                                selectedOrderIds = [];
                                $('#selectedCount').text('0 selected');
                                $('.order-checkbox').prop('checked', false);
                                $('#selectAll').prop('checked', false);
                                $('#selectAllHeader').prop('checked', false);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Failed to update status'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Status update error:', xhr.responseText); // Debug log
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to update status: ' + (xhr.responseJSON?.message || 'Server error')
                        });
                    }
                });
            }
        
            $(document).on('click', '.status-update', function() {
                const orderId = $(this).data('id');               // this is order_details.ids
                const newStatus = $(this).data('status');
                const row = $(this).closest('tr');
                const currentStatus = row.find('.badge').text().trim();
                
                // Get the tailoring item status from the row data
                const tailoringItemStatus = row.find('td:eq(12) .badge').text().trim(); // Adjust index if needed
                
                console.log('Single status update clicked for ID:', orderId, 'from:', currentStatus, 'to:', newStatus);
                
                // ────────────────────────────────────────────────
                // Intercept when target is "Processing"
                // ────────────────────────────────────────────────
                if (newStatus === 'Processing') {
            
                    // Optional: prevent if already Processing or later
                    const currentIndex = statusSequence.indexOf(currentStatus);
                    if (currentIndex >= statusSequence.indexOf('Processing')) {
                        Swal.fire({
                            icon: 'info',
                            title: 'No action needed',
                            text: currentStatus === 'Processing'
                                ? 'This order is already in Processing.'
                                : `This order has already passed Processing (${currentStatus}).`
                        });
                        return;
                    }
            
                    // Prepare data for modal
                    tailoringItemIds = [orderId];          // array with one item
                    tailoringMode = 'single';
            
                    // Build preview row (single item)
                    const orderNum = row.find('td:eq(1)').text().trim(); // "#12345"
                    const product  = row.find('td:eq(3)').text().trim();
                    const qty      = row.find('td:eq(4)').text().trim();
                    const notes      = row.find('td:eq(12)').text().trim();
            
                    const previewRow = `
                        <tr>
                            <td>1</td>
                            <td>${orderNum}</td>
                            <td>${product}</td>
                            <td>${qty}</td>
                            <td>${notes}</td>
                        </tr>`;
            
                    $('#tailoringPreviewTable tbody').html(previewRow);
                    $('#sendToTailoringModal').modal('show');
                    
                    // The real send + status update happens in #confirmSendToTailoring
                    return;   // ← stop here — do NOT continue to normal update
                }
                
                // ────────────────────────────────────────────────
                // Check if trying to move from Processing to next status
                // ────────────────────────────────────────────────
                if (currentStatus === 'Processing') {
                    // Check item-level tailoring status from the row data
                    // Get the actual status value from the badge text
                    const badgeText = row.find('td:eq(12) .badge').text().trim();
                    const itemStatus = badgeText.replace(/[^a-zA-Z\s]/g, '').trim(); // Remove icons and get text
                    
                    if (itemStatus && itemStatus !== 'Completed' && itemStatus !== 'N/A' && itemStatus !== 'Not Assigned') {
                        Swal.fire({
                            icon: 'error',
                            title: 'Tailoring Not Completed',
                            text: `Cannot update status beyond 'Processing' until tailoring is completed. Current item status: ${itemStatus}`,
                            confirmButtonColor: '#3085d6'
                        });
                        return;
                    }
                    
                    // If item status is 'Completed' or not applicable, continue with status update
                    if (itemStatus && itemStatus === 'Not Assigned') {
                        Swal.fire({
                            icon: 'warning',
                            title: 'No Tailoring Record',
                            text: 'This order is in Processing but has no tailoring record. You may want to assign it to a tailoring unit first.',
                            showCancelButton: true,
                            confirmButtonText: 'Continue Anyway',
                            cancelButtonText: 'Cancel'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                proceedWithStatusUpdate(orderId, currentStatus, newStatus);
                            }
                        });
                        return;
                    }
                }
                
                // ────────────────────────────────────────────────
                // Normal flow for all other statuses
                // ────────────────────────────────────────────────
                proceedWithStatusUpdate(orderId, currentStatus, newStatus);
            });
            
            // Helper function to proceed with status update
            function proceedWithStatusUpdate(orderId, currentStatus, newStatus) {
                const currentIndex = statusSequence.indexOf(currentStatus);
                const newIndex     = statusSequence.indexOf(newStatus);
            
                // if (newIndex <= currentIndex) {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Invalid Status Change',
                //         text: `Cannot move backwards. You can only change to a status that comes after "${currentStatus}" in the workflow.`
                //     });
                //     return;
                // }
            
                Swal.fire({
                    title: 'Confirm Status Change',
                    text: `Are you sure you want to change this order from "${currentStatus}" to "${newStatus}"?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, update it!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        performBulkStatusUpdate([orderId], newStatus);
                    }
                });
            }
        
            // Removed: Redundant updateBulkStatus function (already covered by performBulkStatusUpdate)
        
            $(document).on('click', '.bulk-status', function(e) {
                e.preventDefault();
                const newStatus = $(this).data('status');
            
                if (selectedOrderIds.length === 0) {
                    Swal.fire('Warning', 'Please select at least one order', 'warning');
                    return;
                }
            
                // ────────────────────────────────────────────────
                // Intercept when target is "Processing" (bulk)
                // ────────────────────────────────────────────────
                if (newStatus === 'Processing') {
            
                    // Check all selected items have same status (your existing logic)
                    const statuses = new Set();
                    selectedOrderIds.forEach(item => {
                        const row = $(`.order-checkbox[value="${item.itemId}"]`).closest('tr');
                        const status = row.find('.badge').text().trim();
                        statuses.add(status);
                    });
            
                    if (statuses.size > 1) {
                        Swal.fire({
                            icon: 'error',
                            title: 'Cannot Update Status',
                            text: 'You have selected orders with different statuses. Please select orders with the same status to update them together.'
                        });
                        return;
                    }
            
                    const currentStatus = statuses.values().next().value;
            
                    // Optional: already past Processing?
                    const currentIndex = statusSequence.indexOf(currentStatus);
                    if (currentIndex >= statusSequence.indexOf('Processing')) {
                        Swal.fire({
                            icon: 'info',
                            title: 'No action needed',
                            text: currentStatus === 'Processing'
                                ? 'Selected orders are already in Processing.'
                                : `Selected orders have already passed Processing (${currentStatus}).`
                        });
                        return;
                    }
            
                    // ─── Prepare bulk modal ─────────────────────────────────────────────
            
                    tailoringItemIds = selectedOrderIds.map(o => o.itemId);
                    tailoringMode = 'bulk';
            
                    let html = '';
                    let idx = 1;
            
                    selectedOrderIds.forEach(item => {
                        const row = $(`.order-checkbox[value="${item.itemId}"]`).closest('tr');
                        const orderNum = row.find('td:eq(1)').text().trim();
                        const product  = row.find('td:eq(3)').text().trim();
                        const qty      = row.find('td:eq(4)').text().trim();
                        const notes      = row.find('td:eq(12)').text().trim();
                        html += `
                            <tr>
                                <td>${idx++}</td>
                                <td>${orderNum}</td>
                                <td>${product}</td>
                                <td>${qty}</td>
                                <td>${notes}</td>
                            </tr>`;
                    });
            // <small class="text-muted">(customer notes will appear here)</small>
                    $('#tailoringPreviewTable tbody').html(html);
            
                    $('#sendToTailoringModal').modal('show');
            
                    return;   // ← stop — do not continue to normal bulk update
                }
            
                // ────────────────────────────────────────────────
                // Normal bulk flow (any other status)
                // ────────────────────────────────────────────────
            
                const statuses = new Set();
                selectedOrderIds.forEach(item => {
                    const row = $(`.order-checkbox[value="${item.itemId}"]`).closest('tr');
                    const status = row.find('.badge').text().trim();
                    statuses.add(status);
                });
            
                if (statuses.size > 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Cannot Update Status',
                        text: 'You have selected orders with different statuses. Please select orders with the same status to update them together.'
                    });
                    return;
                }
            
                const currentStatus = statuses.values().next().value;
                const currentIndex  = statusSequence.indexOf(currentStatus);
                const newIndex      = statusSequence.indexOf(newStatus);
            
                // if (currentIndex === -1 || newIndex === -1) {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Invalid Status',
                //         text: 'One of the statuses is not recognized in the workflow.'
                //     });
                //     return;
                // }
            
                // if (newIndex <= currentIndex) {
                //     Swal.fire({
                //         icon: 'error',
                //         title: 'Invalid Status Change',
                //         text: `Cannot move backwards. You can only change to a status that comes after "${currentStatus}" in the workflow.`
                //     });
                //     return;
                // }
            
                Swal.fire({
                    title: 'Confirm Status Change',
                    text: `Are you sure you want to update ${selectedOrderIds.length} order(s) from "${currentStatus}" to "${newStatus}"?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, update them!',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        performBulkStatusUpdate(selectedOrderIds, newStatus);
                    }
                });
            });
            
            
            
            function prepareTailoringModal(itemIds, mode) {
                tailoringItemIds = itemIds;
                tailoringMode = mode;
            
                // Fill preview table
                let html = '';
                let idx = 1;
                $('.order-checkbox:checked').each(function() {
                    let row = $(this).closest('tr');
                    html += `
                        <tr>
                            <td>${idx++}</td>
                            <td>#${row.find('td:eq(1)').text().trim()}</td>
                            <td>${row.find('td:eq(3)').text()}</td>
                            <td>${row.find('td:eq(4)').text()}</td>
                            <td><small class="text-muted">customer notes here is...</small></td>
                        </tr>`;
                });
                $('#tailoringPreviewTable tbody').html(html);
            
                $('#sendToTailoringModal').modal('show');
            }
            
            $(document).on('click', '#confirmSendToTailoring', function() {
                const unitId = $('#tailoringUnitSelect').val();
                const notes  = $('#tailoringNotes').val().trim();
            
                if (!unitId) {
                    Swal.fire('Error', 'Please select a tailoring unit', 'error');
                    return;
                }
            
                $.ajax({
                    url: '../controller/orders/orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'send_to_tailoring',
                        item_ids: tailoringItemIds,
                        unit_id: unitId,
                        notes: notes,
                        mode: tailoringMode
                    },
                    dataType: 'json',
                    beforeSend: () => Swal.fire({
                        title: 'Processing...',
                        html: 'Creating tailoring batch and generating dispatch slip...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    }),
                    success: function(res) {
                        Swal.close();
                        if (res.success) {
                            // Show success message with option to view/print PDF
                            Swal.fire({
                                icon: 'success',
                                title: 'Success!',
                                html: `
                                    <div class="text-center">
                                        <p>${res.message || 'Items sent to tailoring unit'}</p>
                                        <p><strong>Batch Code:</strong> ${res.batch_code}</p>
                                        <p><strong>Batch ID:</strong> ${res.batch_id}</p>
                                    </div>
                                `,
                                showCancelButton: true,
                                confirmButtonText: '<i class="ri-printer-line"></i> Print Dispatch Slip',
                                cancelButtonText: 'Close',
                                confirmButtonColor: '#3085d6',
                                cancelButtonColor: '#6c757d'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    // Open the PDF in a new tab
                                    if (res.pdf_url) {
                                        window.open(res.pdf_url, '_blank');
                                    } else {
                                        // If no PDF URL returned, use the printBatch function
                                        printBatch(res.batch_id);
                                    }
                                }
                            });
                            
                            // Also open PDF automatically in new tab (optional)
                            if (res.pdf_url) {
                                window.open(res.pdf_url, '_blank');
                            } else {
                                // Auto-print after 1 second if user wants (optional)
                                setTimeout(() => {
                                    printBatch(res.batch_id);
                                }, 1000);
                            }
                            
                            $('#sendToTailoringModal').modal('hide');
                            ordersTable.ajax.reload();
                        } else {
                            Swal.fire('Error', res.message || 'Operation failed', 'error');
                        }
                    },
                    error: function(xhr) {
                        Swal.close();
                        console.error('Error:', xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to create tailoring batch: ' + (xhr.responseJSON?.message || 'Server error')
                        });
                    }
                });
            });
            
            $('#generateBulkInvoice').click(function() {
                if (selectedOrderIds.length === 0) {
                    Swal.fire('Warning', 'Please select at least one order', 'warning');
                    return;
                }
        
                const orderGroups = {};
                selectedOrderIds.forEach(item => {
                    if (!orderGroups[item.orderId]) {
                        orderGroups[item.orderId] = [];
                    }
                    orderGroups[item.orderId].push(item.itemId);
                });
        
                const orderIds = Object.keys(orderGroups);
                if (orderIds.length > 1) {
                    Swal.fire({
                        icon: 'error',
                        title: 'Invalid Selection',
                        text: 'You have selected items from multiple orders. Please select items from a single order to generate an invoice.'
                    });
                    return;
                }
        
                const orderId = orderIds[0];
                const itemIds = orderGroups[orderId];
                generateMultiItemInvoice(orderId, itemIds);
            });
        
            function generateMultiItemInvoice(orderId, itemIds) {
                const btn = $('#generateBulkInvoice');
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Generating...');
            
                const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemIds.join(',')}&multi_item=1`;
                window.open(pdfUrl, '_blank');
            
                setTimeout(() => {
                    btn.prop('disabled', false).html('<i class="ri-file-text-line me-1"></i> Generate Invoice');
                }, 100);
            }
        
            $(document).on('click', '.view-invoice', function() {
                const orderId = $(this).data('order-id');
                const itemId = $(this).data('id');
                showInvoiceModal(orderId, itemId);
            });
        
            function showInvoiceModal(orderId, itemId) {
                $('#invoiceModal .modal-body').html(
                    '<div class="text-center py-4"><i class="ri-loader-4-line ri-spin fs-3"></i> Loading invoice...</div>'
                );
        
                const invoiceModal = new bootstrap.Modal(document.getElementById('invoiceModal'));
                invoiceModal.show();
        
                $('#invoiceModal').data('order-id', orderId);
                $('#invoiceModal').data('item-id', itemId);
        
                $.ajax({
                    url: '../controller/orders/orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'get_order_details',
                        order_id: itemId
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            populateInvoiceModal(response.data);
                        } else {
                            $('#invoiceModal .modal-body').html(`
                                <div class="alert alert-danger">
                                    Failed to load invoice: ${response.message || 'Unknown error'}
                                </div>
                            `);
                        }
                    },
                    error: function(xhr) {
                        $('#invoiceModal .modal-body').html(`
                            <div class="alert alert-danger">
                                Error loading invoice: ${xhr.statusText || 'Connection error'}
                            </div>
                        `);
                    }
                });
            }
        
            function populateInvoiceModal(order) {
                const modalBody = `
                    <div class="invoice-details">
                        <h6>Order Information</h6>
                        <ul class="tracking-receiver">
                            <li><strong>Order Number:</strong> <span>#${order.order_id}</span></li>
                            <li><strong>Order Date:</strong> <span>${new Date(order.order_date).toLocaleDateString('en-US', {
                                year: 'numeric',
                                month: 'short',
                                day: 'numeric',
                                hour: '2-digit',
                                minute: '2-digit'
                            })}</span></li>
                            <li><strong>Status:</strong> <span class="badge ${getStatusBadgeClass(order.status)}">${order.status}</span></li>
                            <li><strong>Payment Method:</strong> <span>${order.payment_method}</span></li>
                        </ul>
                        <hr>
                        <h6>Customer Information</h6>
                        <ul class="tracking-receiver">
                            <li><strong>Name:</strong> <span>${order.customer.name}</span></li>
                            <li><strong>Email:</strong> <span>${order.customer.email || 'N/A'}</span></li>
                            <li><strong>Phone:</strong> <span>${order.customer.phone}</span></li>
                        </ul>
                        <hr>
                        <h6>Shipping Address</h6>
                        <ul class="tracking-receiver">
                            <li><strong>Address:</strong> <span>${order.shipping.street}, ${order.shipping.address}</span></li>
                            <li><strong>City:</strong> <span>${order.shipping.city}</span></li>
                            <li><strong>State:</strong> <span>${order.shipping.state}</span></li>
                            <li><strong>Country:</strong> <span>${order.shipping.country}</span></li>
                            <li><strong>Postal Code:</strong> <span>${order.shipping.postal_code}</span></li>
                        </ul>
                        <hr>
                        <h6>Order Items</h6>
                        <div class="table-responsive">
                            <table class="table table-bordered">
                                <thead>
                                    <tr>
                                        <th>Product</th>
                                        <th>Color</th>
                                        <th>Size</th>
                                        <th>Length</th>
                                        <th>Quantity</th>
                                        <th>Unit Price</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    ${order.items.map(item => `
                                        <tr>
                                            <td>${item.product_name}</td>
                                            <td>${item.color}</td>
                                            <td>${item.size}</td>
                                            <td>${item.product_length}</td>
                                            <td>${item.quantity}</td>
                                            <td>${parseFloat(item.unit_price).toLocaleString('en-IN')} BHD</td>
                                            <td>${parseFloat(item.total).toLocaleString('en-IN')} BHD</td>
                                        </tr>
                                    `).join('')}
                                </tbody>
                            </table>
                        </div>
                        <hr>
                        <h6>Special Notes</h6>
                        <p>${order.product_notes}</p>
                        <h6>Delivery Comments</h6>
                        <p>${order.comments}</p>
                        <h6>Order Summary</h6>
                        <ul class="tracking-receiver">
                            <li><strong>Subtotal:</strong> ${parseFloat(order.subtotal).toLocaleString('en-IN')} BHD</li>
                            <li><strong>Shipping Fee:</strong> ${parseFloat(order.shipping_fee).toLocaleString('en-IN')} BHD</li>
                            <li>
                              <strong>Tax (${order.tax_percentage}%):</strong> 
                              ${order.tax ? parseFloat(order.tax).toLocaleString('en-IN') + ' BHD' : '0 BHD'}
                            </li>
                            <li><strong>Grand Total:</strong> ${parseFloat(order.grand_total).toLocaleString('en-IN')} BHD</li>
                        </ul>
                    </div>
                `;
                $('#invoiceModal .modal-body').html(modalBody);
            }

            $(document).on('click', '#printInvoiceBtn', function() {
                const orderId = $('#invoiceModal').data('order-id');
                const itemId = $('#invoiceModal').data('item-id');
            
                if (!orderId || !itemId) {
                    Swal.fire('Error', 'No order selected', 'error');
                    return;
                }
            
                const printBtn = $(this);
                printBtn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Generating...');
            
                const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemId}`;
                window.open(pdfUrl, '_blank');
            
                setTimeout(() => {
                    printBtn.prop('disabled', false).html('Print');
                }, 100);
            });
            
            function printInvoice(itemId, orderId) {
                const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemId}`;
                window.open(pdfUrl, '_blank');
            }
        
            function getStatusBadgeClass(status) {
                status = status.toLowerCase();
                
                if (status.includes('complete') || status.includes('delivered')) 
                    return 'bg-label-success';
                
                if (status.includes('process')) 
                    return 'bg-label-primary';
                
                if (status.includes('quality check') || status.includes('ready to ship')) 
                    return 'bg-label-info';
                
                if (status.includes('shipped') || status.includes('transit') || status.includes('delivery')) 
                    return 'bg-label-warning';
                
                // Improved cancel logic
                if (status.includes('cancel')) {
                    return status.includes('product cancelled') ? 'bg-label-danger' : 'bg-label-danger'; // both red, or you can differentiate
                }
                
                if (status.includes('pending') || status.includes('placed')) 
                    return 'bg-label-secondary';
                
                return 'bg-label-secondary';
            }
        });
    </script>
</body>
</html>