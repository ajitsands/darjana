<?php
  
  session_start();
  //include('model/db_connection/connection.php');
  
  ?>
<!doctype html>

<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">
<?PHP //include("templates/head.php"); ?>

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
    <!--<link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />-->
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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="../../assets/vendor/js/helpers.js"></script>

    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <script src="../../assets/js/config.js"></script>



    <style>
    
    .row {
        --bs-gutter-x: 1rem;
    }

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
    .img-container {
        max-height: 70vh;
        margin-bottom: 10px;
    }
    
    /* Ensure the image fills its container */
    .img-container img {
        max-width: 100%;
    }

    /* Custom Modal Styles */
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
                    <?PHP //include("templates/sliders.php"); ?>
                    <?PHP include("templates/menu.php"); ?>



                    <!-- / Menu -->

                    <!-- Content -->

                    <div class="container-fluid flex-grow-1 container-p-y">

                        <?PHP include("pages/add_currency_body.php"); ?>


                    </div>
                    <!--/ Content -->

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

    <!--/ Layout wrapper -->

    <!-- SaNDS Popup -->
    <div id="dropdownContent" style="text-align:center;"></div>

    <!-- Core JS -->
    <!-- build:js assets/vendor/js/core.js -->
    <?PHP //include("templates/common_script.php"); ?>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <!--<script src="https://tenant.sandslab.com/assets/sands/sands_popup.js"></script>-->
    <!-- endbuild -->

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <!--<script src="../../assets/vendor/libs/tagify/tagify.js"></script>-->
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>


    <!-- Page JS -->
    <script src="../../assets/js/forms-selects.js"></script>
    <!-- <script src="../../assets/js/forms-tagify.js"></script>-->
    <script src="../../assets/js/forms-typeahead.js"></script>
    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.datatables.net/rowgroup/1.1.3/js/dataTables.rowGroup.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
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
    <!--  <script src="../../assets/js/logout.js"></script>-->

    <script>
    $(document).ready(function() {
        
     $('#btn_update_div').hide();
     
     load_datatable_currency_details();
      
        function load_datatable_currency_details() {
            if (!$.fn.DataTable.isDataTable('#currencyTable')) {
                var table = $('#currencyTable').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "ajax": {
                        'type': 'POST',
                        'url': '../controller/add_currency/currency_controller.php',
                        'data': {
                            action: 'list_currency_detailes'
                        },
                        'dataSrc': "data"
                    },
                    "language": {
                        "zeroRecords": "No records available",
                        "infoEmpty": "No records available",
                    },
                    "order": [],
                    "ordering": false,
                    "scrollX": false,
                    "scrollCollapse": false,
                    "paging": true,
                    "lengthChange": false,
                    "pageLength": 10,
                    "pagingType": "simple_numbers",
                    "searching": true,
                    "info": true,
                    "autoWidth": false,
                    "columns": [
                        {
                            "data": null,
                            "createdCell": function(td) {},
                            "render": function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            "data": "country_code",
                            "title": "Country Code"
                        },
                        {
                            "data": "country_name",
                            "title": "Country Name"
                        },
                        {
                            "data": "currency_code",
                            "title": "Currency Code"
                        },
                        {
                            "data": "currency_symbol",
                            "title": "Currency Symbol"
                        },
                        {
                            "data": "exchange_rate",
                            "title": "Exchange Rate"
                        },
                        {
                            "data": "flag_emoji",
                            "title": "Flags"
                        },
                        {
                            "data": "is_active",
                            render: function(data, type, row) {
                                if (data === '1') {
                                    return '<a class="status-toggle" data-id="' + row.id +
                                        '" data-status="1" style="cursor:pointer"><i class="ri-thumb-up-line ri-20px text-primary me-1"></i></a>';
                                } else {
                                    return '<a class="status-toggle" data-id="' + row.id +
                                        '" data-status="0" style="cursor:pointer"><i class="ri-thumb-down-line ri-20px text-danger me-1"></i></a>';
                                }
                            }
                        },
                        {
                            "data": "id",
                            render: function(data) {
                                return '<a class="waves-effect edit-product" data-id="' + data +
                                    '"><i class="ri-pencil-line me-1" style="color:blue;"></i></a>' +
                                    '<a class="waves-effect delete-product" data-id="' + data +
                                    '"><i class="ri-delete-bin-2-fill" style="color:red;"></i></a>';
                            }
                        },
                    ],
                    "pageLength": 10,
                    "responsive": false,
                    "initComplete": function() {
                        $('#datatable_search_container').append($('#currencyTable_filter'));
                    }
                });
                $('#currencyTable tbody').on('click', 'tr', function(e) {
                    if (!$(e.target).hasClass('dt-control') && !$(e.target).closest('td').hasClass('dt-control')) {
                        $('#currencyTable tbody tr').removeClass('selected');
                        $(this).addClass('selected');
                    }
                });
            }
        }

        $('#currencyTable').on('click', '.status-toggle', function() {
            var currencyId = $(this).data('id');
            var currentStatus = $(this).data('status');
          
        //   var newStatus = currentStatus === '1' ? '0' : '1';
        //   var newStatus_text = currentStatus == 0 ? 'Activate' : 'Deactivate';
          
             
             currentStatus = Number(currentStatus);

            var newStatus = currentStatus === 1 ? 0 : 1;
            var newStatus_text = currentStatus === 1 ? 'Deactivate' : 'Activate';
            //  alert(currentStatus);
            //  alert(newStatus);
            swal({
                title: "Are you sure?",
                text: "Do you want to change the status to " + newStatus_text + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willChange) => {
                if (willChange) {
                    var $icon = $(this).find('i');
                    $.ajax({
                        url: '../controller/add_currency/currency_controller.php',
                        type: 'POST',
                        data: {
                            action: 'update_currency_status',
                            currency_ids: currencyId,
                            new_status: newStatus
                        },
                        success: function(response) {
                            if (response >= 1) {
                                var newIconHtml = newStatus_text === 'Active' ?
                                    '<i class="ri-thumb-up-line ri-20px text-primary me-1"></i>' :
                                    '<i class="ri-thumb-down-line ri-20px text-danger me-1"></i>';
                                $icon.replaceWith(newIconHtml);
                                $('.status-toggle[data-id="' + currencyId + '"]').data('status', newStatus);
                                var table = $('#currencyTable').DataTable();
                                table.ajax.reload(null, false);
                                swal("Status updated!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Failed to update status.", {
                                    icon: "error",
                                });
                            }
                        },
                        error: function() {
                            swal("Error updating status.", {
                                icon: "error",
                            });
                        }
                    });
                }
            });
        });

        $('#currencyTable tbody').on('click', '.delete-product', function() {
            var currency_ids = $(this).data('id');
            swal({
                title: 'Are you sure?',
                text: 'You will not be able to recover this product!',
                icon: 'warning',
                buttons: {
                    cancel: {
                        text: "Cancel",
                        value: null,
                        visible: true,
                        className: "btn-danger",
                        closeModal: true,
                    },
                    confirm: {
                        text: "Yes, delete it!",
                        value: true,
                        visible: true,
                        className: "btn-primary",
                        closeModal: false
                    }
                },
                dangerMode: true
            }).then((willDelete) => {
                if (willDelete) {
                    $.ajax({
                        url: '../controller/add_currency/currency_controller.php',
                        type: 'POST',
                        data: {
                            action: 'delete_currency',
                            currency_ids: currency_ids
                        },
                        success: function(response) {
                            if (response > 0) {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Your currency has been deleted.',
                                    icon: 'success',
                                    button: 'OK'
                                }).then(function() {
                                    var table = $('#currencyTable').DataTable();
                                    table.ajax.reload();
                                });
                            } else {
                                swal({
                                    title: 'Error!',
                                    text: 'Failed to delete currency: ' + response,
                                    icon: 'error',
                                    button: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            swal({
                                title: 'Error!',
                                text: 'An error occurred while deleting the currency: ' + error,
                                icon: 'error',
                                button: 'OK'
                            });
                        }
                    });
                }
            });
        });

  
        
        $('#btn_save_currency').on('click', function(e) {
            e.preventDefault();
            var laddaButton = Ladda.create(this);
            laddaButton.start();
            let isValid = true;
            var userId = $('#user_id').val().trim();
            var vendorId = $('#vendor_id').val().trim();
            var country_name = $('#country_name').val().trim();
            var country_code = $('#country_code').val().trim();
            var currency_code = $('#currency_code').val().trim();
            var currency_symbol = $('#currency_symbol').val().trim();
            var exchange_rate = $('#exchange_rate').val().trim();
            var flag_icon = $('#flag_images').val().trim();

            if (country_name === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Country Name.', 'click');
            }
            if (country_code === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Country Code.', 'click');
            }
            if (currency_code === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Currency Code.', 'click');
            }
            if (currency_symbol === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Currency Symbol.', 'click');
            }
            
            
             if (flag_icon === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Flag Class.', 'click');
            }
            if (exchange_rate === '' || isNaN(exchange_rate)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Amount.', 'click');
            }
           
            if (!isValid) {
                laddaButton.stop();
                return;
            }

            let formData = new FormData();
            
            formData.append('user_id', userId);
            formData.append('vendor_id', vendorId);
            formData.append('country_name', country_name);
            formData.append('country_code', country_code);
            formData.append('currency_code', currency_code);
            formData.append('currency_symbol', currency_symbol);
            formData.append('exchange_rate', exchange_rate);
            formData.append('flag_icon', flag_icon);
            formData.append('action', 'add_currency_details');
            
            $.ajax({
                url: '../controller/add_currency/currency_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    
                    if (response > 0) {
                        setupDropdown('dropdownContent', 'success', svgSuccess + 'Currency details added successfully.', 'click');
                        laddaButton.stop();
                        var table = $('#currencyTable').DataTable();
                        table.ajax.reload(null, false);
                        $('input[type=text], input[type=number]').val('');
                     
                       
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', error);
                    laddaButton.stop();
                    alert('AJAX request failed');
                }
            });
        });
        
  
        var table = $('#currencyTable').DataTable();
      
        $('#currencyTable tbody').on('click', '.edit-product', function() {
            
            
            
            var currencyId = $(this).data('id');
            
            var data = table.row($(this).closest('tr')).data();
            
           
           $('#currency_id').val($.trim(currencyId));
           $('#country_name').val($.trim(data.country_name));
           $('#country_code').val($.trim(data.country_code));
           $('#currency_code').val($.trim(data.currency_code));
           $('#currency_symbol').val($.trim(data.currency_symbol));
           $('#exchange_rate').val($.trim(data.exchange_rate));
           $('#flag_images').val($.trim(data.flag_emoji));
            
            // show Update, hide Save
            $('#btn_update_div').show();
            $('#btn_save_div').hide();
            
        });
       
        
   
        $('#btn_update_currency').on('click', function(e) {
            e.preventDefault();
            let isValid = true;
            var laddaButton = Ladda.create(this);
            laddaButton.start();
        
            var currencyId = $('#currency_id').val();
            var country_name = $('#country_name').val();
            var country_code = $('#country_code').val();
            var currency_code = $('#currency_code').val();
            var currency_symbol = $('#currency_symbol').val();
            var exchange_rate = $('#exchange_rate').val();
            var flag_icon = $('#flag_images').val();
            
            if (country_name === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Country Name.', 'click');
            }
            if (country_code === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Country Code.', 'click');
            }
            if (currency_code === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Currency Code.', 'click');
            }
            if (currency_symbol === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Currency Symbol.', 'click');
            }
            
            
             if (flag_icon === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Flag Class.', 'click');
            }
            if (exchange_rate === '' || isNaN(exchange_rate)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Amount.', 'click');
            }
           
            if (!isValid) {
                laddaButton.stop();
                return;
            }

            let formData = new FormData();
            
           
            formData.append('currency_ids',currencyId);
            formData.append('country_name', country_name);
            formData.append('country_code', country_code);
            formData.append('currency_code', currency_code);
            formData.append('currency_symbol', currency_symbol);
            formData.append('exchange_rate', exchange_rate);
            formData.append('flag_icon', flag_icon);
            formData.append('action', 'update_currency_details');

              $.ajax({
                    url: '../controller/add_currency/currency_controller.php',
                    type: 'POST',
                    data: formData,
                    processData: false,
                    contentType: false,
                    success: function(response) {
                        
                        if (response > 0) {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Currency details updated successfully.', 'click');
                            laddaButton.stop();
                            var table = $('#currencyTable').DataTable();
                            table.ajax.reload(null, false);
                            }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error: ', error);
                        laddaButton.stop();
                        alert('AJAX request failed');
                    }
                });
            
            
        });

    
    });
    </script>

</body>

</html>