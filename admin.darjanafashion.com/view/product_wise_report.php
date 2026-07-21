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
                        <?PHP include("pages/product_wise_details_body.php"); ?>
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
            let productsTable;
            
            // Function to get default date range (last 30 days)
            function getDefaultDateRange() {
                const today = new Date();
                const thirtyDaysAgo = new Date();
                thirtyDaysAgo.setDate(today.getDate() - 30);
                
                const dateTo = today.toISOString().split('T')[0];
                const dateFrom = thirtyDaysAgo.toISOString().split('T')[0];
                
                return { date_from: dateFrom, date_to: dateTo };
            }
            
            // Initialize DataTable with date filters
            function initDataTable(useDefaultRange = true) {
                let dateFrom = $('#filterDateFrom').val();
                let dateTo = $('#filterDateTo').val();
                
                // If no dates selected and we should use default range, set last 30 days
                if (useDefaultRange && (!dateFrom || !dateTo)) {
                    const defaultRange = getDefaultDateRange();
                    dateFrom = defaultRange.date_from;
                    dateTo = defaultRange.date_to;
                    
                    // Optionally set the input values to show the default range
                    $('#filterDateFrom').val(dateFrom);
                    $('#filterDateTo').val(dateTo);
                }
                
                productsTable = $('#ProductwiseTable').DataTable({
                    processing: true,
                    serverSide: false,
                    destroy: true, // Allow reinitialization
                    ajax: {
                        url: '../controller/Report/report_controller.php',
                        type: 'POST',
                        data: function(d) {
                            d.action = 'product_wise_report';
                            d.date_from = dateFrom;
                            d.date_to = dateTo;
                            return d;
                        }
                    },
                    columns: [
                        { 
                            data: null,
                            title: "S.No",
                            render: function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        { data: 'product_name' },
                        { data: 'total_sold' }
                    ],
                    searching: true,
                    dom: '<"top">rt<"bottom"lip><"clear">'
                });
            }
            
            // Initialize the table with default last 30 days data
            initDataTable(true);
            
            // Apply filters button - use selected dates
            $('#applyFilters').on('click', function() {
                const dateFrom = $('#filterDateFrom').val();
                const dateTo = $('#filterDateTo').val();
                
                if (!dateFrom || !dateTo) {
                    Swal.fire('Warning', 'Please select both date from and date to', 'warning');
                    return;
                }
                
                if (dateFrom > dateTo) {
                    Swal.fire('Error', 'Date from cannot be greater than date to', 'error');
                    return;
                }
                
                initDataTable(false);
            });
            
            // Reset filters button - reset to last 30 days
            $('#resetFilters').on('click', function() {
                const defaultRange = getDefaultDateRange();
                $('#filterDateFrom').val(defaultRange.date_from);
                $('#filterDateTo').val(defaultRange.date_to);
                initDataTable(false);
            });
            
            // Search in main table
            $('#customSearch').on('keyup', function() {
                if (productsTable) {
                    productsTable.search(this.value).draw();
                }
            });
        });
    </script>
</body>
</html>