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
    <title>Unpaid Orders - Darjana Admin</title>
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
    #unpaidOrdersTable {
        width: 100% !important;
        border-collapse: collapse !important;
    }
    #unpaidOrdersTable th,
    #unpaidOrdersTable td {
        white-space: nowrap;
        overflow: hidden;
        text-overflow: ellipsis;
        padding: 8px;
        border: 1px solid #ddd;
    }
    #unpaidOrdersTable thead th {
        background-color: #f8f9fa;
        font-weight: bold;
    }
    #unpaidOrdersTable tbody tr:nth-child(odd) {
        background-color: #f9f9f9;
    }
    #unpaidOrdersTable tbody tr:hover {
        background-color: #f1f1f1;
    }
    #unpaidOrdersTable tbody tr.selected {
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
    /* Payment status badges */
    .payment-status-badge {
        display: inline-flex;
        align-items: center;
        padding: 0.35rem 0.65rem;
        font-size: 0.75rem;
        font-weight: 600;
        border-radius: 0.25rem;
    }
    
    .payment-status-badge i {
        margin-right: 0.25rem;
        font-size: 0.875rem;
    }
    
    .payment-status-badge.unpaid {
        background-color: #dc3545;
        color: #fff;
    }
    
    .payment-status-badge.paid {
        background-color: #198754;
        color: #fff;
    }
    
    .payment-status-badge.partial {
        background-color: #ffc107;
        color: #000;
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
    
    /* Amount highlight */
    .amount-highlight {
        font-weight: 600;
        color: #dc3545;
    }
    
    .btn-mark-paid {
        background-color: #198754;
        color: white;
    }
    
    .btn-mark-paid:hover {
        background-color: #157347;
        color: white;
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
                        <?PHP include("pages/unpaid_orders_body.php"); ?>
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
        $(document).ready(function() {
            loadCustomers();
            
            const endDate = new Date();
            const startDate = new Date();
            startDate.setDate(startDate.getDate() - 30);
        
            $('#startDate').val(startDate.toISOString().split('T')[0]);
            $('#endDate').val(endDate.toISOString().split('T')[0]);
        
            let selectedUnpaidOrderIds = [];
        
            const unpaidOrdersTable = initUnpaidDataTable();
            
            $('#customer_name').select2({
                placeholder: '- Please Select -',
                allowClear: true
            });
            
            function loadCustomers() {
                $.ajax({
                    url: '../controller/orders/unpaid_orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'fetch_customer_name'
                    },
                    success: function(response) {
                        var customers = JSON.parse(response);
                        var options = '<option value="">Select Customer</option>';
                        customers.forEach(function(customer) {
                            options += `<option value="${customer.ids}">${customer.customer_name}</option>`;
                        });
                        $('#customer_name').html(options).trigger('change');
                    },
                    error: function() {
                        console.error('Error fetching customers');
                    }
                });
            }
        
            function initUnpaidDataTable() {
                return $('#unpaidOrdersTable').DataTable({
                    processing: true,
                    serverSide: true,
                    ajax: {
                        url: '../controller/orders/unpaid_orders_controller.php',
                        type: 'POST',
                        data: function(d) {
                            return {
                                action: 'get_unpaid_orders',
                                customer_id: $('#customer_name').val(),
                                start_date: $('#startDate').val(),
                                end_date: $('#endDate').val(),
                                search: $('#customSearch').val() || d.search.value,
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
                            className: 'dt-checkbox-col'
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
                                            <span class="avatar-initial rounded-circle bg-label-danger">${data.name.charAt(0)}</span>
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
                            data: 'selling_price',
                            render: function(data) {
                                return `${parseFloat(data).toLocaleString('en-IN')} BHD`;
                            }
                        },
                        {
                            data: 'amount_due',
                            render: function(data, type, row) {
                                const amount = parseFloat(data).toLocaleString('en-IN');
                                return `<span class="amount-highlight">${amount} BHD</span>`;
                            }
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
                            data: 'order_status',
                            render: function(data) {
                                let displayStatus = data;
                                let cancelByText = '';
                                
                                // Check for Admin cancellations (exact match)
                                if (data === 'Cancelled' || data === 'Product Cancelled') {
                                    cancelByText = '<small class="d-block text-muted">Cancelled by Admin</small>';
                                } 
                                // Check for Customer cancellation (exact match - case sensitive)
                                else if (data === 'product cancelled') {
                                    cancelByText = '<small class="d-block text-muted">Cancelled by Customer</small>';
                                }
                                
                                const statusClass = getStatusBadgeClass(data);
                                return `<div>
                                            <span class="badge ${statusClass}">${displayStatus}</span>
                                            ${cancelByText}
                                        </div>`;
                            }
                        },
                        {
                            data: 'payment_status',
                            render: function(data) {
                                let badgeClass = 'bg-danger unpaid';
                                let icon = '<i class="ri-close-circle-line"></i>';
                                
                                if (data === 'UNPAID') {
                                    badgeClass = 'bg-danger unpaid';
                                    icon = '<i class="ri-error-warning-line"></i>';
                                } else if (data === 'PAID') {
                                    badgeClass = 'bg-success paid';
                                    icon = '<i class="ri-checkbox-circle-line"></i>';
                                } else if (data === 'PARTIAL') {
                                    badgeClass = 'bg-warning partial';
                                    icon = '<i class="ri-indeterminate-circle-line"></i>';
                                }
                                
                                return `<span class="payment-status-badge ${badgeClass}">${icon} ${data}</span>`;
                            }
                        },
                        {
                            data: 'actions',
                            orderable: false,
                            render: function(data, type, row) {
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
                                            <a class="dropdown-item mark-as-paid" href="javascript:void(0);" data-id="${row.ids}">
                                                <i class="ri-checkbox-circle-line me-1 text-success"></i> Mark as PAID
                                            </a>
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
                    order: [[7, 'desc']],
                    dom: '<"top">rt<"bottom"lip><"clear">',
                    language: {
                        emptyTable: "<div class='text-center py-4'>No unpaid orders found for the selected criteria</div>",
                        info: "Showing _START_ to _END_ of _TOTAL_ unpaid orders",
                        infoEmpty: "Showing 0 to 0 of 0 unpaid orders",
                        infoFiltered: "(filtered from _MAX_ total unpaid orders)",
                        zeroRecords: "<div class='text-center py-4'>No matching unpaid orders found</div>"
                    },
                    initComplete: function() {
                        this.api().columns.adjust().draw();
                        updateTotalDue();
                    }
                });
            }
            
            $('#customSearch').on('keyup', function() {
                const searchValue = $(this).val().trim();
                clearTimeout(window.searchTimer);
                window.searchTimer = setTimeout(function() {
                    unpaidOrdersTable.ajax.reload();
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
        
                unpaidOrdersTable.ajax.reload();
            });
        
            $('#resetFilters').click(function() {
                const endDate = new Date();
                const startDate = new Date();
                startDate.setDate(startDate.getDate() - 30);
                $('#startDate').val(startDate.toISOString().split('T')[0]);
                $('#endDate').val(endDate.toISOString().split('T')[0]);
                $('#customSearch').val('');
                $('#customer_name').val('').trigger('change');
                unpaidOrdersTable.ajax.reload();
            });
        
            $(document).on('change', '#customer_name', function () {
                unpaidOrdersTable.ajax.reload();
            });
        
            $(document).on('change', '.order-checkbox', function() {
                updateSelectedCount();
            });
        
            $('#selectAll').change(function() {
                $('.order-checkbox').prop('checked', $(this).prop('checked'));
                updateSelectedCount();
            });
        
            function updateSelectedCount() {
                selectedUnpaidOrderIds = [];
                $('.order-checkbox:checked').each(function() {
                    selectedUnpaidOrderIds.push({
                        itemId: $(this).val(),
                        orderId: $(this).data('order-id')
                    });
                });
                $('#selectedCount').text(selectedUnpaidOrderIds.length + ' selected');
                updateTotalSelectedAmount();
            }
            
            function updateTotalSelectedAmount() {
                // This would ideally calculate the sum from selected rows
                // For now, just show count
            }
            
            function updateTotalDue() {
                // Optional: Calculate total due amount from all visible rows
                // This could be done via AJAX
            }
        
            // Single mark as paid
            $(document).on('click', '.mark-as-paid', function() {
                const orderId = $(this).data('id');
                
                Swal.fire({
                    title: 'Confirm Payment',
                    text: 'Are you sure you want to mark this order as PAID?',
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, mark as PAID',
                    confirmButtonColor: '#198754',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        markOrdersAsPaid([orderId]);
                    }
                });
            });
        
            // Bulk mark as paid
            $('#bulkMarkAsPaid').click(function() {
                if (selectedUnpaidOrderIds.length === 0) {
                    Swal.fire('Warning', 'Please select at least one order', 'warning');
                    return;
                }
        
                Swal.fire({
                    title: 'Confirm Bulk Payment',
                    text: `Are you sure you want to mark ${selectedUnpaidOrderIds.length} order(s) as PAID?`,
                    icon: 'question',
                    showCancelButton: true,
                    confirmButtonText: 'Yes, mark all as PAID',
                    confirmButtonColor: '#198754',
                    cancelButtonText: 'Cancel'
                }).then((result) => {
                    if (result.isConfirmed) {
                        const itemIds = selectedUnpaidOrderIds.map(item => item.itemId);
                        markOrdersAsPaid(itemIds);
                    }
                });
            });
        
            function markOrdersAsPaid(orderIds) {
                $.ajax({
                    url: '../controller/orders/unpaid_orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'mark_as_paid',
                        order_ids: orderIds
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        Swal.fire({
                            title: 'Processing',
                            html: 'Updating payment status...',
                            allowOutsideClick: false,
                            didOpen: () => {
                                Swal.showLoading();
                            }
                        });
                    },
                    success: function(response) {
                        Swal.close();
                        if (response.success) {
                            Swal.fire({
                                icon: 'success',
                                title: 'Success',
                                text: response.message || 'Orders marked as PAID successfully',
                                timer: 2000,
                                showConfirmButton: false
                            }).then(() => {
                                unpaidOrdersTable.ajax.reload();
                                selectedUnpaidOrderIds = [];
                                $('#selectedCount').text('0 selected');
                                $('.order-checkbox').prop('checked', false);
                                $('#selectAll').prop('checked', false);
                            });
                        } else {
                            Swal.fire({
                                icon: 'error',
                                title: 'Error',
                                text: response.message || 'Failed to update payment status'
                            });
                        }
                    },
                    error: function(xhr) {
                        console.error('Error:', xhr.responseText);
                        Swal.fire({
                            icon: 'error',
                            title: 'Error',
                            text: 'Failed to update payment status. Please try again.'
                        });
                    }
                });
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
                    url: '../controller/orders/unpaid_orders_controller.php',
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
                            <li><strong>Order Status:</strong> <span class="badge ${getStatusBadgeClass(order.order_status)}">${order.order_status}</span></li>
                            <li><strong>Payment Status:</strong> <span class="payment-status-badge ${order.payment_status === 'PAID' ? 'paid' : 'unpaid'}">${order.payment_status}</span></li>
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
                        <p>${order.product_notes || 'N/A'}</p>
                        <h6>Delivery Comments</h6>
                        <p>${order.comments || 'N/A'}</p>
                        <h6>Order Summary</h6>
                        <ul class="tracking-receiver">
                            <li><strong>Subtotal:</strong> ${parseFloat(order.subtotal).toLocaleString('en-IN')} BHD</li>
                            <li><strong>Shipping Fee:</strong> ${parseFloat(order.shipping_fee).toLocaleString('en-IN')} BHD</li>
                            <li>
                              <strong>Tax (${order.tax_percentage}%):</strong> 
                              ${order.tax ? parseFloat(order.tax).toLocaleString('en-IN') + ' BHD' : '0 BHD'}
                            </li>
                            <li class="amount-highlight"><strong>Grand Total:</strong> ${parseFloat(order.grand_total).toLocaleString('en-IN')} BHD</li>
                            ${order.paid_amount ? `
                            <li><strong>Paid Amount:</strong> ${parseFloat(order.paid_amount).toLocaleString('en-IN')} BHD</li>
                            <li class="amount-highlight"><strong>Due Amount:</strong> ${(order.grand_total - order.paid_amount).toLocaleString('en-IN')} BHD</li>
                            ` : ''}
                        </ul>
                    </div>
                `;
                $('#invoiceModal .modal-body').html(modalBody);
            }
        
            $('#printInvoiceBtn').click(function() {
                const orderId = $('#invoiceModal').data('order-id');
                const itemId = $('#invoiceModal').data('item-id');
            
                if (!orderId || !itemId) {
                    Swal.fire('Error', 'No order selected', 'error');
                    return;
                }
            
                const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemId}`;
                window.open(pdfUrl, '_blank');
            });
            window.printInvoice = function(itemId, orderId) {
                const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemId}`;
                window.open(pdfUrl, '_blank');
            };
            // function printInvoice(itemId, orderId) {
            //     const pdfUrl = `../../controller/orders/generate_invoice.php?order_id=${orderId}&ids=${itemId}`;
                
            //     window.open(pdfUrl, '_blank');
            // }
        
            function getStatusBadgeClass(status) {
                const statusLower = status.toLowerCase();
                
                // Handle cancellation statuses with proper badge colors
                if (statusLower === 'cancelled' || statusLower === 'product cancelled' || statusLower === 'product cancelled') {
                    return 'bg-label-danger';
                }
                
                if (statusLower.includes('complete') || statusLower.includes('delivered')) return 'bg-label-success';
                if (statusLower.includes('process')) return 'bg-label-primary';
                if (statusLower.includes('quality check')) return 'bg-label-info';
                if (statusLower.includes('ready to ship')) return 'bg-label-info';
                if (statusLower.includes('shipped') || statusLower.includes('transit') || statusLower.includes('delivery')) return 'bg-label-warning';
                if (statusLower.includes('pending') || statusLower.includes('placed')) return 'bg-label-secondary';
                return 'bg-label-secondary';
            }
        });
    </script>
</body>
</html>