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
    <title>Darjana Admin - Customer Wise Report</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.min.js"></script>
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
    #customer_order_list td,
    #customer_order_list th{
        padding:4px 8px;
        font-size:13px;
    }
    .modal-backdrop + .modal-backdrop {
        z-index: 1060;
    }
    .country-badge {
        display: inline-block;
        padding: 4px 8px;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
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
                    <?PHP include("pages/customer_wise_details_body.php"); ?>
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
        
            let customerTable = null;
            let allCustomersTable = null;
            let quillInstance = null;
            let selectedCustomers = [];
            let currentCountry = '';
            let selectedCustomersWise = [];
            // Email templates
            const emailTemplates = {
                promotion: {
                    subject: "🎉 BIG SALE! Up to 50% OFF on Selected Items!",
                    body: "<p>Dear valued customer,</p><br><p>We're excited to announce our <strong>MEGA PROMOTION SALE</strong>! Get up to 50% OFF on selected fashion items.</p><br><p><strong>🔥 Hot Deals:</strong></p><ul><li>Buy 1 Get 1 Free on selected dresses</li><li>30% OFF on all winter collection</li><li>Free shipping on orders above 50 BHD</li></ul><br><p>Hurry up! Offer ends soon.</p><br><p>Shop Now: <a href='https://darjanafashion.com/shop'>https://darjanafashion.com/shop</a></p><br><p>Best regards,<br>Darjana Shopping Team</p>"
                },
                offer: {
                    subject: "🔥 EXCLUSIVE OFFER Just for You! Limited Time Only",
                    body: "<p>Dear customer,</p><br><p>We have a <strong>SPECIAL OFFER</strong> exclusively for our loyal customers!</p><br><p><strong>✨ Offer Details:</strong></p><ul><li>Flat 25% OFF on minimum purchase of 30 BHD</li><li>Extra 10% OFF on first order</li><li>Free gift wrapping on all orders</li></ul><br><p>Use code: <strong>SPECIAL25</strong> at checkout</p><br><p>Don't miss out on these amazing savings!</p><br><p>Shop Now: <a href='https://darjanafashion.com/shop'>https://darjanafashion.com/shop</a></p><br><p>Warm regards,<br>Darjana Shopping Team</p>"
                },
                coupon: {
                    subject: "🎫 Your Exclusive Coupon Code Inside! Save Big Today",
                    body: "<p>Dear valued customer,</p><br><p>We have a special coupon code just for you!</p><br><p><strong>🎁 Your Coupon Code: {PROMO_CODE}</strong></p><br><p><strong>Offer Details:</strong></p><ul><li>{OFFER_PERCENTAGE}% OFF on your next purchase</li><li>Minimum order: {MINIMUM_AMOUNT} BHD</li><li>Valid until: {EXPIRE_DATE}</li></ul><br><p>How to redeem:</p><ol><li>Shop your favorite items</li><li>Enter the coupon code at checkout</li><li>Enjoy your discount instantly!</li></ol><br><p>Shop Now: <a href='https://darjanafashion.com/shop'>https://darjanafashion.com/shop</a></p><br><p>Happy Shopping!<br>Darjana Shopping Team</p>"
                },
                newsletter: {
                    subject: "📧 Darjana Newsletter: New Arrivals & Fashion Tips",
                    body: "<p>Hello fashion lover!</p><br><p>Check out what's new at Darjana this week:</p><br><p><strong>✨ New Arrivals:</strong></p><ul><li>Summer Collection 2026</li><li>Traditional Wear Special</li><li>Accessories & Footwear</li></ul><br><p><strong>💡 Fashion Tip of the Week:</strong></p><p>Mix and match solid colors with patterns for a chic look!</p><br><p><strong>📸 Customer Spotlight:</strong></p><p>Share your Darjana outfit with #DarjanaStyle and get featured!</p><br><p>Stay stylish!<br>Darjana Shopping Team</p>"
                },
                feedback: {
                    subject: "💬 We Value Your Feedback! Share Your Experience",
                    body: "<p>Dear customer,</p><br><p>Your opinion matters to us! We'd love to hear about your shopping experience with Darjana.</p><br><p><strong>📝 Quick Feedback Request:</strong></p><ul><li>How was your shopping experience?</li><li>Were our products as expected?</li><li>How was the delivery service?</li><li>Any suggestions for improvement?</li></ul><br><p>Share your feedback: <a href='https://darjanafashion.com/feedback'>Click here to give feedback</a></p><br><p>As a thank you, you'll receive a 10% discount coupon on your next purchase!</p><br><p>Thank you for being a valued customer!<br>Darjana Shopping Team</p>"
                },
                custom: {
                    subject: "Update from Darjana",
                    body: "<p>Dear valued customer,</p><br><p>We wanted to share the latest updates with you...</p><br><p>Best regards,<br>Darjana Shopping Team</p>"
                }
            };
            
            // Load countries for filter
            function loadCountries() {
                $.ajax({
                    url: '../controller/Report/report_controller.php',
                    type: 'POST',
                    data: { action: 'get_countries' },
                    dataType: 'json',
                    success: function(response) {
                        if (response.data && response.data.length > 0) {
                            let options = '<option value="">All Countries</option>';
                            let countries = new Set();
                            response.data.forEach(function(item) {
                                if (item.country && item.country.trim() !== '') {
                                    countries.add(item.country);
                                }
                            });
                            countries.forEach(function(country) {
                                options += `<option value="${country}">${country}</option>`;
                            });
                            $('#filterCountry').html(options);
                            $('#filterCountry').select2({
                                placeholder: 'Select Country',
                                allowClear: true
                            });
                        }
                    }
                });
            }
            
            // Load promo codes
            function loadPromoCodes() {
                $.ajax({
                    url: '../controller/Report/report_controller.php',
                    type: 'POST',
                    data: { action: 'get_promo_codes' },
                    dataType: 'json',
                    success: function(response) {
                        if (response.data && response.data.length > 0) {
                            let options = '<option value="">Select a promo code...</option>';
                            response.data.forEach(function(code) {
                                let formattedExpiry = code.expire_date;
                                if (formattedExpiry) {
                                    const dateParts = formattedExpiry.split('-');
                                    if (dateParts.length === 3) {
                                        formattedExpiry = `${dateParts[2]}/${dateParts[1]}/${dateParts[0]}`;
                                    }
                                }
                                
                                options += `<option value="${code.promo_code}" 
                                    data-offer="${code.offer_percentage}"
                                    data-min="${code.minimum_order_amount}"
                                    data-expire="${formattedExpiry}">
                                    ${code.promo_code} - ${code.offer_percentage}% OFF (Min: ${code.minimum_order_amount} BHD) Expires: ${formattedExpiry}
                                </option>`;
                            });
                            $('#promoCodeSelect').html(options);
                            $('#promoCodeSelect').select2({
                                placeholder: 'Search promo codes...',
                                allowClear: true,
                                dropdownParent: $('#sendEmailModal')
                            });
                        }
                    }
                });
            }
            
            // Apply template to email
            function applyEmailTemplate(templateType, promoData = null) {
                const template = emailTemplates[templateType];
                if (template) {
                    $('#emailSubject').val(template.subject);
                    
                    let bodyContent = template.body;
                    
                    // Replace promo code placeholders if provided
                    if (promoData && templateType === 'coupon') {
                        bodyContent = bodyContent.replace('{PROMO_CODE}', promoData.code)
                            .replace('{OFFER_PERCENTAGE}', promoData.offer)
                            .replace('{MINIMUM_AMOUNT}', promoData.min_amount)
                            .replace('{EXPIRE_DATE}', promoData.expire_date);
                    }
                    
                    if (quillInstance) {
                        quillInstance.root.innerHTML = bodyContent;
                    }
                }
            }
            
            // Get default date range (last 30 days)
            function getDefaultDateRange() {
                const today = new Date();
                const thirtyDaysAgo = new Date(today);
                thirtyDaysAgo.setDate(today.getDate() - 30);
                
                return {
                    date_from: thirtyDaysAgo.toISOString().split('T')[0],
                    date_to: today.toISOString().split('T')[0]
                };
            }
            
            // Initialize Order Wise DataTable
            function initOrderWiseTable(useDefault = true, country = '') {
                let dateFrom = $('#filterDateFrom').val().trim();
                let dateTo = $('#filterDateTo').val().trim();
                
                if (useDefault && (!dateFrom || !dateTo)) {
                    const def = getDefaultDateRange();
                    dateFrom = def.date_from;
                    dateTo = def.date_to;
                    $('#filterDateFrom').val(dateFrom);
                    $('#filterDateTo').val(dateTo);
                }
                
                if (customerTable) {
                    customerTable.destroy();
                    customerTable = null;
                }
                
                customerTable = $('#CustomerwiseTable').DataTable({
                    processing: true,
                    serverSide: false,
                    destroy: true,
                    ajax: {
                        url: '../controller/Report/report_controller.php',
                        type: 'POST',
                        data: function(d) {
                            d.action = 'customer_wise_report';
                            d.date_from = dateFrom;
                            d.date_to = dateTo;
                            d.country = country;
                            return d;
                        },
                        dataSrc: function(json) {
                            return json.data || [];
                        }
                    },
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            className: 'text-center',
                            render: function(data, type, row) {
                                return `<input type="checkbox" class="row-checkbox"
                                        data-customer-id="${row.customer_id || ''}"
                                        data-customer-name="${row.customer_name || ''}"
                                        data-customer-email="${row.customer_email || ''}"
                                        data-country="${row.country || ''}">`;
                            }
                        },
                        {
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        { data: 'customer_name' },
                        {
                            data: 'country',
                            render: function(data) {
                                if (!data) return '<span class="text-muted">N/A</span>';
                        
                                let badgeClass = 'bg-success'; // default for any country
                        
                                if (data.toLowerCase() === 'india') {
                                    badgeClass = 'bg-primary';
                                } else if (data.toLowerCase() === 'uae') {
                                    badgeClass = 'bg-success';
                                }
                        
                                return `<span class="badge ${badgeClass}">${data}</span>`;
                            }
                        },
                        { data: 'total_items' },
                        {
                            data: 'total_spent',
                            className: 'text-end',
                            render: function(data, type, row) {
                                const amount = parseFloat(row.total_spent || 0);
                                return 'BHD ' + amount.toFixed(2);
                            }
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function(data, type, row) {
                                return `<i class="ri-eye-line text-primary view_customer_orders" 
                                        style="cursor:pointer; font-size:18px;" 
                                        data-id="${row.customer_id}" title="View Orders"></i>`;
                            }
                        }
                    ],
                    order: [[5, 'desc']],
                    dom: '<"top">rt<"bottom"lip><"clear">',
                    language: { emptyTable: "No records found" },
                    drawCallback: function() {
                        handleCheckboxEvents();
                        updateEmailButton();
                    }
                });
            }
            
            // Initialize Customer Wise DataTable (All Registered Customers)
            function initCustomerWiseTable(useDefault = true, country = '') {
                let dateFrom = $('#filterDateFrom').val().trim();
                let dateTo = $('#filterDateTo').val().trim();
                
                if (useDefault && (!dateFrom || !dateTo)) {
                    const def = getDefaultDateRange();
                    dateFrom = def.date_from;
                    dateTo = def.date_to;
                    $('#filterDateFrom').val(dateFrom);
                    $('#filterDateTo').val(dateTo);
                }
                
                if (allCustomersTable) {
                    allCustomersTable.destroy();
                    allCustomersTable = null;
                }
                
                allCustomersTable = $('#AllCustomersTable').DataTable({
                    processing: true,
                    serverSide: false,
                    destroy: true,
                    ajax: {
                        url: '../controller/Report/report_controller.php',
                        type: 'POST',
                        data: function(d) {
                            d.action = 'all_customers_report';
                            d.date_from = dateFrom;
                            d.date_to = dateTo;
                            d.country = country;
                            return d;
                        },
                        dataSrc: function(json) {
                            return json.data || [];
                        }
                    },
                    columns: [
                        {
                            data: null,
                            orderable: false,
                            className: 'text-center',
                            render: function(data, type, row) {
                                return `<input type="checkbox" class="customer-wise-checkbox"
                                        data-customer-id="${row.customer_id || ''}"
                                        data-customer-name="${row.customer_name || ''}"
                                        data-customer-email="${row.customer_email || ''}"
                                        data-country="${row.country || ''}">`;
                            }
                        },
                        {
                            data: null,
                            render: (data, type, row, meta) => meta.row + 1
                        },
                        { data: 'customer_name' },
                        { data: 'customer_email' },
                        { data: 'phone' },
                        {
                            data: 'country',
                            render: function(data) {
                                if (!data) return '<span class="text-muted">N/A</span>';
                        
                                return `<span class="badge bg-success">${data}</span>`;
                            }
                        },
                        { 
                            data: 'order_count',
                            className: 'text-center',
                            render: function(data) {
                                if (data > 0) {
                                    return `<span class="badge bg-success">${data} Orders</span>`;
                                }
                                return `<span class="badge bg-secondary">0 Orders</span>`;
                            }
                        },
                        { 
                            data: 'registration_date',
                            render: function(data) {
                                if (!data) return 'N/A';
                                const date = new Date(data);
                                return date.toLocaleDateString('en-GB');
                            }
                        },
                        { 
                            data: 'status',
                            render: function(data) {
                                if (data === 'Active') {
                                    return `<span class="badge bg-success">Active</span>`;
                                }
                                return `<span class="badge bg-danger">${data}</span>`;
                            }
                        },
                        {
                            data: null,
                            orderable: false,
                            render: function(data, type, row) {
                                if (row.order_count > 0) {
                                    return `<i class="ri-eye-line text-primary view_customer_orders" 
                                            style="cursor:pointer; font-size:18px;" 
                                            data-id="${row.customer_id}" title="View Orders"></i>`;
                                }
                                return `<span class="text-muted">No Orders</span>`;
                            }
                        }
                    ],
                    order: [[7, 'desc']],
                    dom: '<"top">rt<"bottom"lip><"clear">',
                    language: { emptyTable: "No customers found" },
                    drawCallback: function() {
                        handleCustomerWiseCheckboxEvents();
                    }
                });
            }
            
            function handleCustomerWiseCheckboxEvents() {
                $('.customer-wise-checkbox').off('change').on('change', function() {
                    const row = $(this).closest('tr');
                    const data = allCustomersTable.row(row).data();
                    
                    if ($(this).is(':checked')) {
                        if (!selectedCustomersWise.some(c => c.customer_id == data.customer_id)) {
                            selectedCustomersWise.push({
                                customer_id: data.customer_id,
                                customer_name: data.customer_name || 'Customer',
                                customer_email: data.customer_email || '',
                                country: data.country || ''
                            });
                        }
                    } else {
                        selectedCustomersWise = selectedCustomersWise.filter(c => c.customer_id != data.customer_id);
                    }
                    updateEmailButtonWise();
                });
            }
            
            // Select all for Customer Wise tab
            $('#selectAllCustomersWise').off('change').on('change', function() {
                const checked = $(this).is(':checked');
                const currentCountry = $('#filterCountry').val();
                
                $('.customer-wise-checkbox').each(function() {
                    const checkbox = $(this);
                    const rowCountry = checkbox.data('country');
                    
                    if (!currentCountry || currentCountry === '' || rowCountry === currentCountry) {
                        checkbox.prop('checked', checked).trigger('change');
                    } else {
                        checkbox.prop('checked', false);
                    }
                });
            });
            
            // Update email button for Customer Wise tab
            function updateEmailButtonWise() {
                const count = selectedCustomersWise.length;
                if (count > 0) {
                    $('#sendEmailBtnWise').removeClass('d-none').find('#selectedCountWise').text(count);
                } else {
                    $('#sendEmailBtnWise').addClass('d-none');
                }
            }
            
            // Handle checkbox events (only for Order Wise tab)
            function handleCheckboxEvents() {
                $('.row-checkbox').off('change').on('change', function() {
                    const row = $(this).closest('tr');
                    const data = customerTable.row(row).data();
                    
                    if ($(this).is(':checked')) {
                        if (!selectedCustomers.some(c => c.customer_id == data.customer_id)) {
                            selectedCustomers.push({
                                customer_id: data.customer_id,
                                customer_name: data.customer_name || 'Customer',
                                customer_email: data.customer_email || '',
                                country: data.country || ''
                            });
                        }
                    } else {
                        selectedCustomers = selectedCustomers.filter(c => c.customer_id != data.customer_id);
                    }
                    updateEmailButton();
                });
            }
            
            // Update email button visibility
            function updateEmailButton() {
                const count = selectedCustomers.length;
                if (count > 0) {
                    $('#sendEmailBtn').removeClass('d-none').find('#selectedCount').text(count);
                } else {
                    $('#sendEmailBtn').addClass('d-none');
                }
            }
            
            // Select all with country filter (for Order Wise tab)
            $('#selectAllCustomers').off('change').on('change', function() {
                const checked = $(this).is(':checked');
                const currentCountry = $('#filterCountry').val();
                
                $('.row-checkbox').each(function() {
                    const checkbox = $(this);
                    const rowCountry = checkbox.data('country');
                    
                    // Only select if country matches filter or no filter applied
                    if (!currentCountry || currentCountry === '' || rowCountry === currentCountry) {
                        checkbox.prop('checked', checked).trigger('change');
                    } else {
                        checkbox.prop('checked', false);
                    }
                });
            });
            
            // Apply Filters (for both tables)
            $('#applyFilters').on('click', function() {
                const from = $('#filterDateFrom').val();
                const to = $('#filterDateTo').val();
                const country = $('#filterCountry').val();
                
                if (!from || !to) {
                    Swal.fire('Warning', 'Please select both dates', 'warning');
                    return;
                }
                if (from > to) {
                    Swal.fire('Error', 'Date From cannot be after Date To', 'error');
                    return;
                }
                
                selectedCustomers = [];
                currentCountry = country || '';
                
                // Check which tab is active and reload the appropriate table
                if ($('#order-wise-tab').hasClass('active')) {
                    initOrderWiseTable(false, currentCountry);
                } else {
                    initCustomerWiseTable(false, currentCountry);
                }
            });
            
            // Reset Filters
            $('#resetFilters').on('click', function() {
                const def = getDefaultDateRange();
                $('#filterDateFrom').val(def.date_from);
                $('#filterDateTo').val(def.date_to);
                $('#filterCountry').val('').trigger('change');
                
                // Clear selections
                selectedCustomers = [];
                selectedCustomersWise = [];
                $('#selectAllCustomers').prop('checked', false);
                $('#selectAllCustomersWise').prop('checked', false);
                $('#sendEmailBtn').addClass('d-none');
                $('#sendEmailBtnWise').addClass('d-none');
                
                currentCountry = '';
                
                if ($('#order-wise-tab').hasClass('active')) {
                    initOrderWiseTable(false, '');
                } else {
                    initCustomerWiseTable(false, '');
                }
            });
            
            // Custom Search (for active tab)
            $('#customSearch').on('keyup', function() {
                if ($('#order-wise-tab').hasClass('active') && customerTable) {
                    customerTable.search(this.value).draw();
                } else if ($('#customer-wise-tab').hasClass('active') && allCustomersTable) {
                    allCustomersTable.search(this.value).draw();
                }
            });
            
            // Tab change handler
            $('#order-wise-tab').on('shown.bs.tab', function() {
                if (!customerTable) {
                    initOrderWiseTable(true, currentCountry);
                }
                $('#customSearch').val('');
                // Reset selection for Order Wise
                selectedCustomers = [];
                $('#selectAllCustomers').prop('checked', false);
                updateEmailButton();
            });
            
            $('#customer-wise-tab').on('shown.bs.tab', function() {
                if (!allCustomersTable) {
                    initCustomerWiseTable(true, currentCountry);
                }
                $('#customSearch').val('');
                // Reset selection for Customer Wise
                selectedCustomersWise = [];
                $('#selectAllCustomersWise').prop('checked', false);
                updateEmailButtonWise();
            });
            
            $('#sendEmailBtn').on('click', function() {
                if (selectedCustomers.length === 0) return;
                openEmailModal(selectedCustomers);
            });
            
            // Email Modal handlers for Customer Wise
            $('#sendEmailBtnWise').on('click', function() {
                if (selectedCustomersWise.length === 0) return;
                openEmailModal(selectedCustomersWise);
            });
            
            function openEmailModal(customers) {
                const modal = new bootstrap.Modal('#sendEmailModal');
                modal.show();
                
                if (!quillInstance) {
                    quillInstance = new Quill('#quillEditor', {
                        theme: 'snow',
                        modules: { toolbar: true }
                    });
                }
                
                applyEmailTemplate('custom');
                $('#recipientCount').text(customers.length);
                loadPromoCodes();
                
                // Store customers for sending
                $('#sendEmailModal').data('selected-customers', customers);
            }
            
            // Template type change
            $('#emailTemplateType').on('change', function() {
                const templateType = $(this).val();
                
                if (templateType === 'coupon') {
                    $('#promoCodeSection').show();
                    applyEmailTemplate(templateType);
                } else {
                    $('#promoCodeSection').hide();
                    applyEmailTemplate(templateType);
                }
            });
            
            // Promo code selection
            $('#promoCodeSelect').on('change', function() {
                const selectedOption = $(this).find('option:selected');
                if (selectedOption.val()) {
                    const promoData = {
                        code: selectedOption.val(),
                        offer: selectedOption.data('offer'),
                        min_amount: selectedOption.data('min'),
                        expire_date: selectedOption.data('expire')
                    };
                    applyEmailTemplate('coupon', promoData);
                } else {
                    applyEmailTemplate('coupon');
                }
            });

            // Send emails
            $(document).on('click', '#confirmSendEmail', function() {
                const subject = $('#emailSubject').val().trim();
                const body = quillInstance ? quillInstance.root.innerHTML : '';
                const customers = $('#sendEmailModal').data('selected-customers') || [];
                
                if (!subject) return Swal.fire('Error', 'Subject is required', 'error');
                if (!body || body === '<p><br></p>') return Swal.fire('Error', 'Please write a message', 'error');
                if (customers.length === 0) return Swal.fire('Error', 'No customers selected', 'error');
                
                const btn = $(this);
                btn.prop('disabled', true).html('<span class="spinner-border spinner-border-sm"></span> Sending...');
                
                $.ajax({
                    url: '../controller/Report/report_controller.php',
                    type: 'POST',
                    data: {
                        action: 'send_bulk_emails',
                        subject: subject,
                        body: body,
                        customers: JSON.stringify(customers)
                    },
                    dataType: 'json',
                    success: function(res) {
                        if (res.success) {
                            Swal.fire('Success', `Emails sent to ${res.sent} customer(s)`, 'success');
                            
                            // Clear selections based on active tab
                            if ($('#order-wise-tab').hasClass('active')) {
                                selectedCustomers = [];
                                $('#selectAllCustomers').prop('checked', false);
                                $('#sendEmailBtn').addClass('d-none');
                            } else {
                                selectedCustomersWise = [];
                                $('#selectAllCustomersWise').prop('checked', false);
                                $('#sendEmailBtnWise').addClass('d-none');
                            }
                            
                            bootstrap.Modal.getInstance('#sendEmailModal').hide();
                            $('#emailTemplateType').val('custom').trigger('change');
                        } else {
                            Swal.fire('Error', res.message || 'Failed to send emails', 'error');
                        }
                    },
                    error: function() {
                        Swal.fire('Error', 'Server error occurred', 'error');
                    },
                    complete: function() {
                        btn.prop('disabled', false).html('<i class="ri-mail-send-line me-1"></i> Send Emails');
                    }
                });
            });
            
            // View customer orders
            $(document).on("click", ".view_customer_orders", function() {
                let customer_id = $(this).data("id");
                let dateFrom = $('#filterDateFrom').val();
                let dateTo = $('#filterDateTo').val();
               
                $.ajax({
                    url: "../controller/Report/report_controller.php",
                    type: "POST",
                    data: {
                        action: "customer_order_details",
                        customer_id: customer_id,
                        date_from: dateFrom,
                        date_to: dateTo
                    },
                    dataType: "json",
                    success: function(response){
                        let html = "";
                        let totalSum = response.total_amount || 0;
                       
                        $.each(response.data, function(i, row){
                            let selling_price = parseFloat(row.selling_price);
                            let discount_price = parseFloat(row.discount_price);
                            let tax = parseFloat(row.tax_percentage);
                           
                            let actual_cost;
                            if(discount_price > 0) {
                                actual_cost = row.quantity * (discount_price + (discount_price * tax / 100));
                            } else {
                                actual_cost = row.quantity * (selling_price + (selling_price * tax / 100));
                            }
                           
                            let date = new Date(row.placed_date);
                            let formatted_date = date.toLocaleDateString('en-GB');
                           
                            html += `
                                <tr>
                                    <td>${i+1}</td>
                                    <td>#ORD${row.order_id}</td>
                                    <td>${row.product_name}</td>
                                    <td>${row.quantity}</td>
                                    <td class="text-end">BHD ${selling_price.toFixed(2)}</td>
                                    <td class="text-end">BHD ${selling_price.toFixed(2)}</td>
                                    <td class="text-end">BHD ${discount_price.toFixed(2)}</td>
                                    <td>${tax}%</td>
                                    <td class="text-end fw-semibold text-success">BHD ${actual_cost.toFixed(2)}</td>
                                    <td>${formatted_date}</td>
                                    <td class="text-center">
                                        <i class="ri-eye-line text-primary view-invoice"
                                            style="cursor:pointer;font-size:18px"
                                            data-order-id="${row.order_id}" data-id="${row.ids}"
                                            title="View Invoice"></i>
                                    </td>
                                </tr>
                            `;
                        });
                       
                        html += `
                            <tr class="table-active fw-bold">
                                <td colspan="8" class="text-end">Total Amount:</td>
                                <td class="text-end text-success">BHD ${totalSum.toFixed(2)}</td>
                                <td colspan="2"></td>
                            </tr>
                        `;
                       
                        $("#customer_order_list").html(html);
                        $("#customerOrdersModal").modal("show");
                        $('#orderSearch').val('');
                        
                        // Search functionality for orders
                        $('#orderSearch').off('keyup').on('keyup', function() {
                            const searchTerm = $(this).val().toLowerCase();
                            $('#customer_order_list tr').each(function() {
                                const text = $(this).text().toLowerCase();
                                $(this).toggle(text.indexOf(searchTerm) > -1);
                            });
                        });
                    },
                    error: function() {
                        Swal.fire('Error', 'Failed to load customer orders', 'error');
                    }
                });
            });
            
            // View invoice
            $(document).on('click', '.view-invoice', function() {
                const orderId = $(this).data('order-id');
                const itemId = $(this).data('id');
                showInvoiceModal(orderId, itemId);
            });
            
            // Print invoice
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
                }, 1000);
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
                            <li><strong>Grand Total:</strong> ${parseFloat(order.grand_total).toLocaleString('en-IN')} BHD</li>
                        </ul>
                    </div>
                `;
                $('#invoiceModal .modal-body').html(modalBody);
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
            
            // Fix modal z-index issue
            $(document).on('show.bs.modal', '.modal', function () {
                var zIndex = 1055 + (10 * $('.modal:visible').length);
                $(this).css('z-index', zIndex);
                
                setTimeout(function() {
                    $('.modal-backdrop').not('.modal-stack')
                        .css('z-index', zIndex - 1)
                        .addClass('modal-stack');
                }, 0);
            });
            
            // Initialize everything
            const defaultRange = getDefaultDateRange();
            $('#filterDateFrom').val(defaultRange.date_from);
            $('#filterDateTo').val(defaultRange.date_to);
            
            loadCountries();
            
            setTimeout(() => {
                initOrderWiseTable(false, '');
            }, 100);
        });
    </script>
    
</body>
</html>