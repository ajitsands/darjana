<?php
session_start();
?>
<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta content="company" name="SaNDsLaB">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>TAX & VAT Report - Darjana Admin</title>

    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <style>
        @media (min-width: 992px) {
            .col-lg-2-4 {
                flex: 0 0 auto;
                width: 20%;
            }
        }
    </style>

    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>
<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <?php include("templates/navbar.php"); ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <?php include("templates/menu.php"); ?>
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php include("pages/tax_report_body.php"); ?>
                    </div>
                    <?php include("templates/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/js/main.js"></script>
    
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>

    <script>
        let taxTable;
        let currentSummary = { total_sales: 0, total_tax: 0, total_collected: 0, paid_orders_count: 0 };

        function getDefaultMonthRange() {
            const now = new Date();
            const year = now.getFullYear();
            const month = String(now.getMonth() + 1).padStart(2, '0');
            const day = String(now.getDate()).padStart(2, '0');
            
            const startDate = `${year}-${month}-01`;
            const endDate = `${year}-${month}-${day}`;
            return { startDate, endDate };
        }

        function calculateGatewayNet() {
            const feeVal = $('#cardGatewayFeeInput').val();
            const feePct = (feeVal !== '' && !isNaN(feeVal)) ? parseFloat(feeVal) : 2.5;
            const totalSales = currentSummary.total_sales || 0;
            
            const gatewayFeeAmount = totalSales * (feePct / 100);
            const netAmountCollected = totalSales - gatewayFeeAmount;

            $('#cardBeforeGateway').text(totalSales.toFixed(2) + ' BHD');
            $('#cardNetCollected').text(netAmountCollected.toFixed(2) + ' BHD');
            $('#cardGatewayFeeAmount').text('-' + gatewayFeeAmount.toFixed(2) + ' BHD (' + feePct.toFixed(1) + '%)');
        }

        function loadTaxReportData() {
            const startDate = $('#startDate').val();
            const endDate = $('#endDate').val();

            if (!startDate || !endDate) {
                Swal.fire('Warning', 'Please select both start and end dates', 'warning');
                return;
            }

            if (startDate > endDate) {
                Swal.fire('Error', 'Start date cannot be after end date', 'error');
                return;
            }

            $.ajax({
                url: '../controller/Report/report_controller.php',
                type: 'POST',
                data: {
                    action: 'tax_report',
                    start_date: startDate,
                    end_date: endDate
                },
                dataType: 'json',
                beforeSend: function() {
                    if (taxTable) {
                        taxTable.clear().draw();
                    }
                },
                success: function(res) {
                    if (res && res.success) {
                        // Store summary
                        currentSummary = res.summary || {};
                        
                        // Update Summary KPI Cards
                        $('#cardTotalSales').text((currentSummary.total_sales || 0).toFixed(2) + ' BHD');
                        $('#cardTotalTax').text((currentSummary.total_tax || 0).toFixed(2) + ' BHD');
                        $('#cardTotalCollected').text((currentSummary.total_collected || 0).toFixed(2) + ' BHD');
                        $('#cardPaidCount').text(currentSummary.paid_orders_count || 0);

                        // Recalculate Net Amount after Gateway Fee
                        calculateGatewayNet();

                        // Reinitialize DataTable with data
                        initTaxTable(res.data || []);
                    } else {
                        Swal.fire('Error', (res && res.message) ? res.message : 'Failed to load Tax Report data', 'error');
                    }
                },
                error: function() {
                    Swal.fire('Error', 'An error occurred while fetching report data', 'error');
                }
            });
        }

        function initTaxTable(data) {
            taxTable = $('#taxReportTable').DataTable({
                data: data,
                destroy: true,
                pageLength: 25,
                order: [[1, 'desc']],
                columns: [
                    { 
                        data: 'order_id',
                        render: function(data) {
                            return `<span class="fw-bold text-primary">#${data}</span>`;
                        }
                    },
                    { 
                        data: 'order_date',
                        render: function(data) {
                            if (!data) return '-';
                            const dt = new Date(data);
                            return dt.toLocaleDateString('en-GB', { day: '2-digit', month: 'short', year: 'numeric' }) + ' ' + dt.toLocaleTimeString('en-US', { hour: '2-digit', minute: '2-digit' });
                        }
                    },
                    { 
                        data: 'customer_name',
                        render: function(data, type, row) {
                            let val = data || 'Guest Customer';
                            if (row.customer_phone) {
                                val += `<br><small class="text-muted"><i class="ri-phone-line"></i> ${row.customer_phone}</small>`;
                            }
                            return val;
                        }
                    },
                    { 
                        data: 'net_sales',
                        className: 'text-end font-monospace',
                        render: function(data) {
                            return parseFloat(data || 0).toFixed(2) + ' BHD';
                        }
                    },
                    { 
                        data: 'tax_percentage',
                        className: 'text-center',
                        render: function(data) {
                            return `<span class="badge bg-label-info">${data}%</span>`;
                        }
                    },
                    { 
                        data: 'tax_amount',
                        className: 'text-end font-monospace text-warning fw-bold',
                        render: function(data) {
                            return parseFloat(data || 0).toFixed(2) + ' BHD';
                        }
                    },
                    { 
                        data: 'shipping_fee',
                        className: 'text-end font-monospace',
                        render: function(data) {
                            return parseFloat(data || 0).toFixed(2) + ' BHD';
                        }
                    },
                    { 
                        data: 'grand_total',
                        className: 'text-end font-monospace fw-bold text-success',
                        render: function(data) {
                            return parseFloat(data || 0).toFixed(2) + ' BHD';
                        }
                    },
                    { 
                        data: 'payment_status',
                        className: 'text-center',
                        render: function(data, type, row) {
                            return `<span class="badge bg-success"><i class="ri-checkbox-circle-line me-1"></i>PAID</span>`;
                        }
                    }
                ]
            });
        }

        $(document).ready(function() {
            // Set default date range to current month
            const defaultRange = getDefaultMonthRange();
            $('#startDate').val(defaultRange.startDate);
            $('#endDate').val(defaultRange.endDate);

            // Load initial report data for current month
            loadTaxReportData();

            // Real-time automatic calculation when typing in Gateway Fee text box inside the card
            $(document).on('input change keyup', '#cardGatewayFeeInput', function() {
                calculateGatewayNet();
            });

            // Apply filter button click
            $('#applyFilter').on('click', function() {
                loadTaxReportData();
            });

            // Reset filter button click
            $('#resetFilter').on('click', function() {
                const range = getDefaultMonthRange();
                $('#startDate').val(range.startDate);
                $('#endDate').val(range.endDate);
                $('#cardGatewayFeeInput').val('2.5');
                loadTaxReportData();
            });

            // Export to Excel button click
            $('#exportExcelBtn').on('click', function() {
                const startDate = $('#startDate').val();
                const endDate = $('#endDate').val();
                const feePct = $('#cardGatewayFeeInput').val() || 2.5;
                window.location.href = `../controller/Report/report_controller.php?action=export_tax_report&start_date=${encodeURIComponent(startDate)}&end_date=${encodeURIComponent(endDate)}&gateway_fee_percent=${encodeURIComponent(feePct)}`;
            });
        });
    </script>
</body>
</html>
