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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.css" />
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <script src="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.js"></script>
    <script src="https://cdnjs.cloudflare.com/ajax/libs/croppie/2.6.5/croppie.min.js"></script>
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
    /* Add to your CSS */
    .arabic-text {
        direction: rtl;
        text-align: right;
        font-family: 'Arial', 'Segoe UI', sans-serif;
    }
    
    /* For Arabic input fields */
    .arabic-input {
        direction: rtl;
        text-align: right;
        font-family: 'Arial', 'Segoe UI', sans-serif;
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

                    <div style ="max-width:2200px;">

                        <?PHP include("pages/add_product_body.php"); ?>


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
        let croppieInstance;
        let cropper;
        let currentImageInput;
        let currentImageContainer;
        let editCroppieInstance;
        let currentEditFileInput;
        let currentEditImageContainer;
        fetchCategories();
        loadVendorTaxAndCodFee();
        $('#category_name').select2({
            placeholder: '- Please Select -',
            allowClear: true
        });
        $('#sub_category_name').select2({
            placeholder: '- Please Select -',
            allowClear: true
        });
        
        // Set default value for subcategory
        $('#sub_category_name,#edit_sub_category_name').val('0'); // or any default value your backend expects
        $('#sub_category_name,#edit_sub_category_name option:selected').text('Default'); // optional display text
    
       // If using a plugin like Select2, refresh it
        if ($('#sub_category_name,#edit_sub_category_name').hasClass('select2-hidden-accessible')) {
            $('#sub_category_name,#edit_sub_category_name').trigger('change'); // refresh display
        }
        $('#category_name').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId === 'add_new_category') {
                $('#addCategoryModal').modal('show');
            } else {
               // fetchSubCategories(categoryId);
            }
        });
        
        function loadVendorTaxAndCodFee() {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                dataType: 'json',  // Explicitly specify JSON to ensure proper parsing
                data: {
                    action: 'get_vendor_tax_cod'
                },
                success: function(response) {
                    console.log('Response from get_vendor_tax_cod:', response);  // For debugging
                    if (response.success) {
                        $('#tax_percentage').val(response.tax_percentage || '');
                        $('#cod_fee').val(response.cod_fee || '');
                        
                        // Trigger input event to activate floating labels in form-floating
                        $('#tax_percentage').trigger('input');
                        $('#cod_fee').trigger('input');
                        
                        // Alternatively, focus and blur if needed
                        // $('#tax_percentage').focus().blur();
                        // $('#cod_fee').focus().blur();
                    } else {
                        console.error('Failed to load vendor tax and COD fee:', response);
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX error in loadVendorTaxAndCodFee:', error);
                }
            });
        }
        
        let subCategoryInitialized = false;
        $('#sub_category_name').on('change', function() {
            if (!subCategoryInitialized) return;
            var subCategoryId = $(this).val();
            var category = $('#category_name option:selected').val();
            if (category == "" || category == "add_new_category") {
                swal({
                    title: "Warning",
                    text: "Please choose category before selecting a sub-category.",
                    icon: "warning",
                });
                return;
            }
            if (subCategoryId === 'add_new_sub_category') {
                $('#addSubCategoryModal').modal('show');
            }
        });
        load_datatable_product_details();

        function load_datatable_product_details() {
            if (!$.fn.DataTable.isDataTable('#productTable')) {
                var table = $('#productTable').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "ajax": {
                        'type': 'POST',
                        'url': '../controller/add_product/product_controller.php',
                        'data': {
                            action: 'list_product_detailes'
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
                    "columns": [{
                            "className": 'dt-control',
                            "orderable": false,
                            "searchable": false,
                            "data": null,
                            "defaultContent": '',
                            "title": "",
                            "width": "30px",
                        },
                        {
                            "data": null,
                            "createdCell": function(td) {},
                            "render": function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            "data": "product_name",
                            "title": "product name"
                        },
                        
                        {
                            "data": "category_name",
                            "title": "Category"
                        },
                        {
                            "data": "product_brand_name",
                            "title": "Brand Name"
                        },
                        {
                            "data": "amount_mrp",
                            "title": "MRP Amount"
                        },
                        {
                            "data": "amount_selling",
                            "title": "Selling Amount"
                        },
                        {
                            "data": "amount_offer",
                            "title": "Offer Amount"
                        },
                        {
                            "data": "warranty_details",
                            "title": "Warranty"
                        },
                        {
                            "data": "status",
                            "title": "Status",
                            "render": function(data, type, row) {
                                if (data === 'Active') {
                                    return '<span class="badge bg-success">Active</span>';
                                } else {
                                    return '<span class="badge bg-danger">No</span>';
                                }
                            }
                        },
                        {
                            "data": "status",
                            render: function(data, type, row) {
                                if (data === 'Active') {
                                    return '<a class="status-toggle" data-id="' + row.ids +
                                        '" data-status="Active" style="cursor:pointer"><i class="ri-thumb-up-line ri-20px text-primary me-1"></i></a>';
                                } else {
                                    return '<a class="status-toggle" data-id="' + row.ids +
                                        '" data-status="Deactive" style="cursor:pointer"><i class="ri-thumb-down-line ri-20px text-danger me-1"></i></a>';
                                }
                            }
                        },
                        {
                            "data": "ids",
                            render: function(data) {
                                return '<a class="waves-effect edit-product" data-id="' + data +
                                        '" title="Edit"><i class="ri-pencil-line me-1" style="color:blue;"></i></a>' +
                                        '<a class="waves-effect copy-product-link" data-id="' + data +
                                        '" title="Copy Secure Link" style="cursor:pointer;">' +
                                        '<i class="ri-file-copy-line me-1" style="color:green;"></i></a>' +
                                        '<a class="waves-effect delete-product" data-id="' + data +
                                        '" title="Delete"><i class="ri-delete-bin-2-fill" style="color:red;"></i></a>';
                            }
                        },
                    ],
                    "pageLength": 10,
                    "responsive": false,
                    "initComplete": function() {
                        $('#datatable_search_container').append($('#productTable_filter'));
                    }
                });
                $('#productTable tbody').on('click', 'td.dt-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var isShown = row.child.isShown();
                    table.rows().every(function() {
                        if (this.child.isShown() && this.index() !== row.index()) {
                            this.child.hide();
                            $(this.node()).find('.dt-control i').removeClass('ri-subtract-line')
                                .addClass('ri-add-circle-line');
                            $(this.node()).removeClass('shown');
                        }
                    });
                    if (isShown) {
                        row.child.hide();
                        tr.removeClass('shown');
                        $(this).find('i').removeClass('ri-subtract-line').addClass('ri-add-circle-line');
                    } else {
                        var childContent = '<div class="p-3">' +
                            '<p><strong>Description:</strong> ' + row.data().product_description + '</p>' +
                            '</div>';
                        row.child(childContent).show();
                        tr.addClass('shown');
                        $(this).find('i').removeClass('ri-add-circle-line').addClass('ri-subtract-line');
                    }
                    $('#productTable tbody tr').removeClass('selected');
                    tr.addClass('selected');
                });
                $('#productTable tbody').on('click', 'tr', function(e) {
                    if (!$(e.target).hasClass('dt-control') && !$(e.target).closest('td').hasClass('dt-control')) {
                        $('#productTable tbody tr').removeClass('selected');
                        $(this).addClass('selected');
                    }
                });
            }
        }

        $('#productTable').on('click', '.status-toggle', function() {
            var producttId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus === 'Active' ? 'Deactive' : 'Active';
            swal({
                title: "Are you sure?",
                text: "Do you want to change the status to " + newStatus + "?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willChange) => {
                if (willChange) {
                    var $icon = $(this).find('i');
                    $.ajax({
                        url: '../controller/add_product/product_controller.php',
                        type: 'POST',
                        data: {
                            action: 'update_product_status',
                            product_id: producttId,
                            new_status: newStatus
                        },
                        success: function(response) {
                            if (response >= 1) {
                                var newIconHtml = newStatus === 'Active' ?
                                    '<i class="ri-thumb-up-line ri-20px text-primary me-1"></i>' :
                                    '<i class="ri-thumb-down-line ri-20px text-danger me-1"></i>';
                                $icon.replaceWith(newIconHtml);
                                $('.status-toggle[data-id="' + producttId + '"]').data('status', newStatus);
                                swal("Status updated!", {
                                    icon: "success",
                                });
                                $('#productTable').DataTable().ajax.reload(null, false);
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

        $('#productTable tbody').on('click', '.delete-product', function() {
            var productId = $(this).data('id');
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
                        url: '../controller/add_product/product_controller.php',
                        type: 'POST',
                        data: {
                            action: 'delete_product',
                            deleteId: productId
                        },
                        success: function(response) {
                            if (response == "success") {
                                swal({
                                    title: 'Deleted!',
                                    text: 'Your product has been deleted.',
                                    icon: 'success',
                                    button: 'OK'
                                }).then(function() {
                                    var table = $('#productTable').DataTable();
                                    table.ajax.reload();
                                });
                            } else {
                                swal({
                                    title: 'Error!',
                                    text: 'Failed to delete product: ' + response,
                                    icon: 'error',
                                    button: 'OK'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            swal({
                                title: 'Error!',
                                text: 'An error occurred while deleting the product: ' + error,
                                icon: 'error',
                                button: 'OK'
                            });
                        }
                    });
                }
            });
        });

        function loadCategoryTable() {
            if (!$.fn.DataTable.isDataTable('#categoryTable')) {
                $('#categoryTable').DataTable({
                    "processing": true,
                    "serverSide": false,
                    "ajax": {
                        'type': 'POST',
                        'url': '../controller/add_product/product_controller.php',
                        'data': {
                            action: 'fetch_categories'
                        },
                        'dataSrc': function(json) {
                            return json;
                        }
                    },
                    "columns": [{
                            "data": null,
                            "render": function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            "data": "category_type"
                        },
                         {
                            "data": "category_name_ar"
                        },
                        {
                            "data": "category_image",
                            "render": function(data) {
                                return data ?
                                    `<img src="../../assets/img/categories/${data}" style="width:50px;height:50px;">` :
                                    'No Image';
                            }
                        },
                        {
                            "data": "status",
                            "render": function(data, type, row) {
                                if (data === 'active') {
                                    return `<a class="toggle-category-status" data-id="${row.ids}" data-status="active" style="cursor:pointer">
                                            <i class="ri-thumb-up-line ri-20px text-primary me-1"></i></a>`;
                                } else {
                                    return `<a class="toggle-category-status" data-id="${row.ids}" data-status="deactive" style="cursor:pointer">
                                            <i class="ri-thumb-down-line ri-20px text-danger me-1"></i></a>`;
                                }
                            }
                        },
                        {
                            "data": "ids",
                            "render": function(data) {
                                return `<a class="edit-category" data-id="${data}"><i class="ri-pencil-line me-1" style="color:blue;"></i></a>`;
                            }
                        }
                    ]
                });
            }
        }

        $('#updateSubCategory').hide();
        function loadSubCategoryTable(categoryId) {
            if ($.fn.DataTable.isDataTable('#subCategoryTable')) {
                $('#subCategoryTable').DataTable().destroy();
            }
            $('#subCategoryTable').DataTable({
                "processing": true,
                "serverSide": false,
                "ajax": {
                    'type': 'POST',
                    'url': '../controller/add_product/product_controller.php',
                    'data': {
                        action: 'fetch_sub_categories',
                        category_id: categoryId
                    },
                    'dataSrc': function(json) {
                        return json;
                    }
                },
                "columns": [{
                        "data": null,
                        "render": function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    {
                        "data": "sub_category"
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row) {
                            if (data === 'active') {
                                return `<span style="color: white; background-color: green; padding: 4px 8px; border-radius: 4px;">Active</span>`;
                            } else {
                                return `<span style="color: white; background-color: red; padding: 4px 8px; border-radius: 4px;">Deactive</span>`;
                            }
                        }
                    },
                    {
                        "data": "status",
                        "render": function(data, type, row) {
                            if (data === 'active') {
                                return `<a class="toggle-subcategory-status" data-id="${row.ids}" data-status="active" style="cursor:pointer">
                                        <i class="ri-thumb-up-line ri-20px text-primary me-1"></i></a><a class="edit-subcategory" data-id="${data}"><i class="ri-pencil-line me-1" style="color:blue;"></i></a>`;
                            } else {
                                return `<a class="toggle-subcategory-status" data-id="${row.ids}" data-status="deactive" style="cursor:pointer">
                                        <i class="ri-thumb-down-line ri-20px text-danger me-1"></i></a><a class="edit-subcategory" data-id="${data}"><i class="ri-pencil-line me-1" style="color:blue;"></i></a>`;
                            }
                        }
                    }
                ]
            });
        }
        
        // $('#add_new_specification').on('click', function() {
        //     var newSpecField = '<div class="input-group input-group-merge mt-2">' +
        //         '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Specification" />' +
        //         '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
        //         '</div>';
        //     $('#specification_fields_container').append(newSpecField);
        // });
        // $('#add_new_specification_arabic').on('click', function() {
        //     var newSpecField = '<div class="input-group input-group-merge mt-2">' +
        //         '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Specification (Arabic)" />' +
        //         '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
        //         '</div>';
        //     $('#specification_arabic_fields_container').append(newSpecField);
        // });
        
        // Video upload preview and validation
        $('#product_video').on('change', function(e) {
            const file = e.target.files[0];
            if (!file) {
                $('#video_preview_container').hide();
                $('#clear_video_btn').hide();
                return;
            }
            
            // Check file size (50MB)
            const maxSize = 5.5 * 1024 * 1024;
            if (file.size > maxSize) {
                swal({
                    title: "Error!",
                    text: "Video file size exceeds 5.5MB limit. Please choose a smaller video.",
                    icon: "error"
                });
                $(this).val('');
                $('#video_preview_container').hide();
                $('#clear_video_btn').hide();
                return;
            }
            
            // Check file type
            const allowedExtensions = ['mp4', 'mov', 'avi', 'mkv'];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            
            if (!allowedExtensions.includes(fileExtension)) {
                swal({
                    title: "Error!",
                    text: "Please upload MP4, MOV, AVI, or MKV video files only.",
                    icon: "error"
                });
                $(this).val('');
                $('#video_preview_container').hide();
                $('#clear_video_btn').hide();
                return;
            }
            
            // Preview video
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#video_preview source').attr('src', e.target.result);
                $('#video_preview')[0].load();
                $('#video_filename').text(file.name);
                $('#video_preview_container').show();
                $('#clear_video_btn').show();
            };
            reader.readAsDataURL(file);
        });
        
        // Clear video button
        $('#clear_video_btn').on('click', function() {
            $('#product_video').val('');
            $('#video_preview_container').hide();
            $(this).hide();
        });
        
        $('#add_new_specification_pair').on('click', function() {
            var newSpecPair = '<div class="row mb-2 specification-pair">' +
                '<div class="col-md-6">' +
                    '<div class="input-group">' +
                        '<span class="input-group-text">EN</span>' +
                        '<input type="text" class="form-control form-control-sm specification-en" placeholder="English Specification" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-5">' +
                    '<div class="input-group">' +
                        '<span class="input-group-text">AR</span>' +
                        '<input type="text" class="form-control form-control-sm arabic-input specification-ar" placeholder="Arabic Specification" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-1 text-end">' +
                    '<button type="button" class="btn btn-danger remove-spec-pair">' +
                        '<i class="bi bi-x-lg"></i> &nbsp;&nbsp;Del' +
                    '</button>' +
                '</div>'+
            '</div>';
            $('#specification_pairs_container').append(newSpecPair);
        });
        $('#add_edit_specification').on('click', function() {
            var newSpecField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_specification[]" placeholder="Enter Product Specification" />' +
                '<input type="hidden" name="product_specification_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_specification_fields_container').append(newSpecField);
        });
        $('#add_edit_specification_pair').on('click', function() {
            var newSpecPair = '<div class="row mb-2 spec-pair" data-id="">' +
                '<div class="col-md-5">' +
                    '<div class="input-group">' +
                        '<span class="input-group-text">EN</span>' +
                        '<input type="text" class="form-control" name="product_specification[]" placeholder="English Specification" />' +
                        '<input type="hidden" name="product_specification_id[]" value="" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-5">' +
                    '<div class="input-group">' +
                        '<span class="input-group-text">AR</span>' +
                        '<input type="text" class="form-control arabic-input" name="product_specification_arabic[]" placeholder="Arabic Specification" />' +
                        '<input type="hidden" name="product_specification_arabic_id[]" value="" />' +
                    '</div>' +
                '</div>' +
                '<div class="col-md-2">' +
                    '<button type="button" class="btn btn-danger remove-spec-pair">' +
                        '<i class="fas fa-trash"></i> Remove' +
                    '</button>' +
                '</div>' +
            '</div>';
            $('#edit_specification_container').append(newSpecPair);
        });
        $('#add_edit_specification_arabic').on('click', function() {
            var newSpecField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_specification_arabic[]" placeholder="Enter Product Specification (Arabic)" />' +
                '<input type="hidden" name="product_specification_arabic_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_specification_arabic_fields_container').append(newSpecField);
        });
         $('#add_edit_length').on('click', function() {
            var newLengthField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_length[]" placeholder="Enter Product Length" />' +
                '<input type="hidden" name="product_length_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_length_fields_container').append(newLengthField);
        });
        $(document).on('click', '.remove-spec-pair', function() {
            var $specPair = $(this).closest('.specification-pair, .spec-pair');
            var specId = $specPair.data('id');
            
            if (specId) {
                swal({
                    title: 'Are you sure?',
                    text: 'This specification will be deleted permanently!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'delete_specification',
                                spec_id: specId
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    $specPair.remove();
                                    swal({
                                        title: 'Deleted!',
                                        text: 'Specification deleted successfully.',
                                        icon: 'success',
                                        button: 'OK'
                                    });
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Failed to delete specification.',
                                        icon: 'error',
                                        button: 'OK'
                                    });
                                }
                            },
                            error: function() {
                                swal({
                                    title: 'Error!',
                                    text: 'Error deleting specification.',
                                    icon: 'error',
                                    button: 'OK'
                                });
                            }
                        });
                    }
                });
            } else {
                $specPair.remove();
            }
        });
        $('#addCategoryModal').on('shown.bs.modal', function() {
            loadCategoryTable();
            $('#categoryFormTitle').text('Add New Category');
            $('#addCategoryForm')[0].reset();
            $('#category_image_preview').empty();
            $('#edit_category_id').val('');
        });

        $('#addSubCategoryModal').on('shown.bs.modal', function() {
            var categoryId = $('#category_name').val();
            $('#parent_category_id').val(categoryId);
            loadSubCategoryTable(categoryId);
            $('#subCategoryFormTitle').text('Add New Sub Category');
            $('#addSubCategoryForm')[0].reset();
            $('#edit_sub_category_id').val('');
        });

        $('#updatesub_div').hide();
        $(document).on('click', '.edit-category', function(e) {
            var $row = $(this).closest('tr');
            var table = $('#categoryTable').DataTable();
            var categoryData = table.row($row).data();
            $('#edit_category_id').val(categoryData.ids);
            $('#new_category_name').val(categoryData.category_type);
            $('#new_category_name').focus();
            if (categoryData.category_image) {
                $('#category_image_preview').html(
                    `<img src="../../assets/img/categories/${categoryData.category_image}" 
                          style="width:100px;height:100px;" class="img-thumbnail">`
                );
            } else {
                $('#category_image_preview').empty();
            }
            $('#savesub_div').hide();
            $('#updatesub_div').show();
        });
        
        $('#offer_percentage').on('input', function() {
            var mrp = parseFloat($('#amount_mrp').val()) || 0;
            var percentage = parseFloat($(this).val()) || 0;
            if (mrp > 0 && percentage >= 0 && percentage <= 100) {
                var discount = (mrp * percentage) / 100;
                var offerAmount = mrp - discount;
                $('#amount_offer').val(offerAmount.toFixed(2));
            } else {
                $('#amount_offer').val('');
            }
        });
        
        $('#amount_offer').on('input', function() {
            $('#offer_percentage').val('');
        });

         $('#updateNewCategory').on('click', function() {
            var formData = new FormData();
            formData.append('action', 'update_category');
            formData.append('category_id', $('#edit_category_id').val());
            formData.append('category_name', $('#new_category_name').val());
            formData.append('category_name_arabic', $('#new_category_name_arabic').val());
            var newImage = $('#new_category_image')[0].files[0];
            if (newImage) {
                formData.append('category_image', newImage);
            }
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === 'success') {
                        $('#categoryTable').DataTable().ajax.reload();
                        $('#addCategoryModal').modal('hide');
                        swal('Success', 'Category updated successfully', 'success');
                    } else {
                        swal('Error', 'Failed to update category', 'error');
                    }
                },
                error: function() {
                    swal('Error', 'Error updating category', 'error');
                }
            });
        });

        $('#update_div').hide();
        $(document).on('click', '.edit-subcategory', function() {
            var $row = $(this).closest('tr');
            var table = $('#subCategoryTable').DataTable();
            var subcategoryData = table.row($row).data();
            $('#edit_sub_category_id').val(subcategoryData.ids);
            $('#new_sub_category_name').val(subcategoryData.sub_category);
            $('#new_sub_category_name').focus();
            $('#save_div').hide();
            $('#update_div').show();
        });

        $('#updateSubCategory').on('click', function() {
            var formData = new FormData();
            formData.append('action', 'update_sub_category');
            formData.append('sub_category_id', $('#edit_sub_category_id').val());
            formData.append('sub_category_name', $('#new_sub_category_name').val());
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === 'success') {
                        $('#subCategoryTable').DataTable().ajax.reload();
                        $('#addSubCategoryModal').modal('hide');
                        swal('Success', 'Sub Category updated successfully', 'success');
                    } else {
                        swal('Error', 'Failed to update sub category', 'error');
                    }
                },
                error: function() {
                    swal('Error', 'Error updating sub category', 'error');
                }
            });
        });

        $(document).on('click', '.toggle-category-status', function() {
            var categoryId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus === 'active' ? 'deactive' : 'active';
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'update_category_status',
                    category_id: categoryId,
                    new_status: newStatus
                },
                success: function(response) {
                    if (response === 'success') {
                        $('#categoryTable').DataTable().ajax.reload();
                    }
                }
            });
        });

        $(document).on('click', '.toggle-subcategory-status', function() {
            var subCategoryId = $(this).data('id');
            var currentStatus = $(this).data('status');
            var newStatus = currentStatus === 'active' ? 'deactive' : 'active';
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'update_subcategory_status',
                    sub_category_id: subCategoryId,
                    new_status: newStatus
                },
                success: function(response) {
                    if (response === 'success') {
                        $('#subCategoryTable').DataTable().ajax.reload(null, false);
                    }
                }
            });
        });

        $('#cancelCategoryEdit').on('click', function() {
            $('#categoryFormTitle').text('Add New Category');
            $('#addCategoryForm')[0].reset();
            $('#category_image_preview').empty();
            $('#edit_category_id').val('');
        });

        $('#cancelSubCategoryEdit').on('click', function() {
            $('#subCategoryFormTitle').text('Add New Sub Category');
            $('#addSubCategoryForm')[0].reset();
            $('#edit_sub_category_id').val('');
        });

        $('#add_new_color').on('click', function() {
            var newColorField = '<div class="input-group input-group-merge mt-2 dynamic_color">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Color" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_color').parent().append(newColorField);
        });

        $('#add_new_size').on('click', function() {
            var newSizeField = '<div class="input-group input-group-merge mt-2 dynamic_size">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Size" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_size').parent().append(newSizeField);
        });
        
        $('#add_new_lentgh').on('click', function() {
            var newSizeField = '<div class="input-group input-group-merge mt-2 dynamic_length">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Length" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_length').parent().append(newSizeField);
        });
        

        $('#add_new_image').on('click', function() {
            var newImageField = '<div class="input-group input-group-merge mt-2 dynamic_image">' +
                '<input type="file" name="product_images[]" class="form-control form-control-sm" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_images').parent().append(newImageField);
        });
        
        $(document).on('change', 'input[type="file"][name="product_images[]"], #product_images', function(e){
            const file = e.target.files[0];
            if(!file) return;
            
            currentFileInput = this;
        
            const reader = new FileReader();
        
            reader.onload = function(event){
                // Destroy old instance
                if(croppieInstance) {
                    croppieInstance.destroy();
                }
        
                // Show modal first
                $('#croppieModal').modal('show');
                
                // Small delay to ensure modal is visible
                setTimeout(function() {
                    // Initialize Croppie exactly as in your index.php
                    croppieInstance = new Croppie(document.getElementById('croppie-container'), {
                        viewport: { width:400, height:650 },
                        boundary:{ width:400,  height:650 },
                        showZoomer:true,
                        enableOrientation:true
                    });
        
                    croppieInstance.bind({
                        url:event.target.result
                    });
                }, 500);
            };
        
            reader.readAsDataURL(file);
        });
        
        
        $('#crop_and_save').off('click').on('click', function() {
            if (!editCroppieInstance && !croppieInstance) {
                swal("Error", "Please select an image first", "warning");
                return;
            }
            
            // Determine which instance to use
            const instance = editCroppieInstance || croppieInstance;
            const isEditMode = !!editCroppieInstance;
            
            // Show loading
            const $btn = $(this);
            $btn.html('<span class="spinner-border spinner-border-sm me-1"></span>Processing...');
            $btn.prop('disabled', true);
            
            instance.result({
                type: 'blob',
                size: {
                    width: 1600,
                    height: 2600
                },
                format: 'jpeg',
                quality: 1
            }).then(function(blob) {
                // Create filename
                const fileName = 'img_' + Date.now() + '.jpg';
                const croppedFile = new File([blob], fileName, {
                    type: 'image/jpeg',
                    lastModified: Date.now()
                });
                
                // Replace file input
                const dataTransfer = new DataTransfer();
                dataTransfer.items.add(croppedFile);
                
                if (isEditMode) {
                    currentEditFileInput.files = dataTransfer.files;
                    showEditImagePreview(currentEditFileInput, croppedFile, currentEditImageContainer);
                } else {
                    currentFileInput.files = dataTransfer.files;
                    showImagePreview(currentFileInput, croppedFile);
                }
                
                // Hide modal
                $('#croppieModal').modal('hide');
                
                // Reset button
                $btn.html('<i class="fas fa-crop me-1"></i>Crop & Save');
                $btn.prop('disabled', false);
                
                swal("Success", "Image cropped successfully", "success");
            }).catch(function(error) {
                console.error('Croppie error:', error);
                swal("Error", "Error cropping image", "error");
                $btn.html('<i class="fas fa-crop me-1"></i>Crop & Save');
                $btn.prop('disabled', false);
            });
        });
        
        // Preview function
       // function showImagePreview(input, file) {
        //     const reader = new FileReader();
        //     reader.onload = function(e) {
        //         const previewHtml = `
        //             <div class="image-preview-item mt-2 p-2 border rounded">
        //                 <img src="${e.target.result}" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">
        //                 <small class="text-muted">${file.name}</small>
        //                 <button type="button" class="btn btn-sm btn-danger float-end remove-image-preview">
        //                     <i class="bi bi-x"></i> Remove
        //                 </button>
        //             </div>
        //         `;
                
        //         // Find the wrapper and preview container
        //         const $wrapper = $(input).closest('.dynamic_image_wrapper');
        //         if ($wrapper.length) {
        //             let $previewContainer = $wrapper.find('.image-preview-container');
        //             if (!$previewContainer.length) {
        //                 $wrapper.append('<div class="image-preview-container mt-2"></div>');
        //                 $previewContainer = $wrapper.find('.image-preview-container');
        //             }
        //             $previewContainer.html(previewHtml);
        //         } else {
        //             // For single image upload (not dynamic)
        //             $('#image_preview_container').html(previewHtml);
        //         }
        //     };
        //     reader.readAsDataURL(file);
        // }
        
        
         function showImagePreview(input, file) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewHtml = `
                    <div class="image-preview-item mt-2 p-2 border rounded">
                    <div class="image-preview-item mt-2 p-2 border rounded position-relative">
                        <img src="${e.target.result}" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">
                        <small class="text-muted">${file.name}</small>
                        <div class="d-inline-block align-top">
                            <small class="text-muted d-block text-truncate" style="max-width: 150px;">${file.name}</small>
                            <div class="form-check mt-2">
                                <input class="form-check-input primary-image-radio" type="radio" name="primary_image" value="${file.name}" id="primary_${file.name.replace(/[^a-z0-9]/gi, '_')}">
                                <label class="form-check-label text-primary fw-bold" for="primary_${file.name.replace(/[^a-z0-9]/gi, '_')}">
                                    Primary Image
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger float-end remove-image-preview">
                            <i class="bi bi-x"></i> Remove
                        </button>
                    </div>
                `;
                
                // Find the wrapper and preview container
                const $wrapper = $(input).closest('.dynamic_image_wrapper');
                if ($wrapper.length) {
                    let $previewContainer = $wrapper.find('.image-preview-container');
                    if (!$previewContainer.length) {
                        $wrapper.append('<div class="image-preview-container mt-2"></div>');
                        $previewContainer = $wrapper.find('.image-preview-container');
                    }
                    $previewContainer.html(previewHtml);
                } else {
                    // For single image upload (not dynamic)
                    $('#image_preview_container').html(previewHtml);
                }
            };
            reader.readAsDataURL(file);
        }
        
        // Clear on modal hide
        $('#croppieModal').on('hidden.bs.modal', function() {
            if (editCroppieInstance) {
                editCroppieInstance.destroy();
                editCroppieInstance = null;
            }
            if (croppieInstance) {
                croppieInstance.destroy();
                croppieInstance = null;
            }
        });
        
        // Update add_new_image button
        $('#add_new_image').off('click').on('click', function() {
            var newImageField = '<div class="dynamic_image_wrapper mb-3">' +
                '<div class="input-group">' +
                    '<input type="file" class="form-control" name="product_images[]" accept="image/*" />' +
                    '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> Remove Field</button>' +
                '</div>' +
                '<div class="image-preview-container mt-2"></div>' +
            '</div>';
            $('#image_fields_container').append(newImageField);
        });
        
        // Remove field
        $(document).on('click', '.remove-field', function() {
            var $this = $(this);
            var $wrapper = $this.closest('.input-group, .dynamic_image_wrapper, .spec-pair, .specification-pair');
            var itemId = $wrapper.data('id') || $wrapper.find('input[type="hidden"]').val();
            
            console.log('Remove clicked - Item ID:', itemId);
            console.log('Wrapper classes:', $wrapper.attr('class'));
            
            // Determine the item type based on context
            var itemType = '';
            if ($wrapper.hasClass('dynamic_image_wrapper')) {
                itemType = 'product_images[]';
            } else if ($wrapper.hasClass('spec-pair') || $wrapper.hasClass('specification-pair')) {
                itemType = 'product_specification[]';
            } else {
                // Check the input name
                var inputName = $wrapper.find('input').attr('name');
                if (inputName) {
                    itemType = inputName;
                }
            }
            
            console.log('Item type:', itemType);
            
            if (itemId) {
                swal({
                    title: 'Are you sure?',
                    text: 'This item will be deleted permanently!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Show loading state
                        $this.html('<span class="spinner-border spinner-border-sm"></span>');
                        $this.prop('disabled', true);
                        
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'delete_item',
                                item_id: itemId,
                                item_type: itemType
                            },
                            success: function(response) {
                                console.log('Delete response:', response);
                                
                                if (response === 'success') {
                                    // For image wrappers, remove the entire wrapper and its preview
                                    if ($wrapper.hasClass('dynamic_image_wrapper')) {
                                        // Remove the entire wrapper (which includes input group and preview container)
                                        $wrapper.remove();
                                    } else {
                                        $wrapper.remove();
                                    }
                                    
                                    swal({
                                        title: 'Deleted!',
                                        text: 'The item has been deleted.',
                                        icon: 'success',
                                        timer: 1500,
                                        buttons: false
                                    });
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Failed to delete the item. Server response: ' + response,
                                        icon: 'error',
                                        button: 'OK'
                                    });
                                    // Reset button
                                    $this.html('<i class="bi bi-x-lg"></i> Remove');
                                    $this.prop('disabled', false);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', status, error);
                                console.error('Response Text:', xhr.responseText);
                                
                                swal({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the item: ' + error,
                                    icon: 'error',
                                    button: 'OK'
                                });
                                // Reset button
                                $this.html('<i class="bi bi-x-lg"></i> Remove');
                                $this.prop('disabled', false);
                            }
                        });
                    }
                });
            } else {
                // If no ID (new unsaved item), just remove the row
                $wrapper.remove();
            }
        });
        // Handle video upload for edit modal
        $('#edit_product_video').on('change', function(e) {
            const file = e.target.files[0];
            if (!file) {
                $('#edit_video_preview_container').hide();
                $('#edit_clear_video_btn').hide();
                return;
            }
            
            // Check file size (50MB)
            const maxSize = 5.5 * 1024 * 1024;
            if (file.size > maxSize) {
                swal({
                    title: "Error!",
                    text: "Video file size exceeds 5.5MB limit. Please choose a smaller video.",
                    icon: "error"
                });
                $(this).val('');
                $('#edit_video_preview_container').hide();
                $('#edit_clear_video_btn').hide();
                return;
            }
            
            // Check file type
            const allowedExtensions = ['mp4', 'mov', 'avi', 'mkv'];
            const fileExtension = file.name.split('.').pop().toLowerCase();
            
            if (!allowedExtensions.includes(fileExtension)) {
                swal({
                    title: "Error!",
                    text: "Please upload MP4, MOV, AVI, or MKV video files only.",
                    icon: "error"
                });
                $(this).val('');
                $('#edit_video_preview_container').hide();
                $('#edit_clear_video_btn').hide();
                return;
            }
            
            // Preview video
            const reader = new FileReader();
            reader.onload = function(e) {
                $('#edit_video_preview source').attr('src', e.target.result);
                $('#edit_video_preview')[0].load();
                $('#edit_video_filename').text(file.name);
                $('#edit_video_preview_container').show();
                $('#edit_clear_video_btn').show();
            };
            reader.readAsDataURL(file);
        });
        
        // Clear video button for edit modal
        $('#edit_clear_video_btn').on('click', function() {
            $('#edit_product_video').val('');
            $('#edit_video_preview_container').hide();
            $(this).hide();
        });
        // Specific handler for removing images in edit modal
        $(document).on('click', '#edit_image_fields_container .remove-field', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            var $button = $(this);
            var $wrapper = $button.closest('.dynamic_image_wrapper');
            var imageId = $wrapper.data('id');
            
            console.log('Remove image clicked - ID:', imageId);
            console.log('Wrapper HTML:', $wrapper[0].outerHTML);
            
            if (imageId) {
                swal({
                    title: 'Are you sure?',
                    text: 'This image will be deleted permanently!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        // Show loading state
                        $button.html('<span class="spinner-border spinner-border-sm"></span>');
                        $button.prop('disabled', true);
                        
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'delete_item',
                                item_id: imageId,
                                item_type: 'product_images[]'
                            },
                            success: function(response) {
                                console.log('Delete image response:', response);
                                
                                if (response === 'success') {
                                    // Remove the entire wrapper which contains both input and preview
                                    $wrapper.remove();
                                    
                                    swal({
                                        title: 'Deleted!',
                                        text: 'Image deleted successfully.',
                                        icon: 'success',
                                        timer: 1500,
                                        buttons: false
                                    });
                                } else {
                                    swal('Error!', 'Failed to delete image.', 'error');
                                    // Reset button
                                    $button.html('<i class="bi bi-x-lg"></i> Remove');
                                    $button.prop('disabled', false);
                                }
                            },
                            error: function(xhr, status, error) {
                                console.error('AJAX Error:', error);
                                swal('Error!', 'Error deleting image.', 'error');
                                // Reset button
                                $button.html('<i class="bi bi-x-lg"></i> Remove');
                                $button.prop('disabled', false);
                            }
                        });
                    }
                });
            } else {
                // If new unsaved image, just remove the wrapper
                $wrapper.remove();
            }
        });
        // Handle remove button for image fields in add product form (the one next to file input)
        $(document).on('click', '#image_fields_container .remove-field, #edit_image_fields_container .remove-field', function(e) {
            e.preventDefault();
            e.stopPropagation();
            
            const $button = $(this);
            const $wrapper = $button.closest('.dynamic_image_wrapper');
            const $fileInput = $wrapper.find('input[type="file"]');
            const imageId = $wrapper.data('id');
            
            if (imageId) {
                // If it's an existing image from database, delete it permanently
                swal({
                    title: 'Are you sure?',
                    text: 'This image will be deleted permanently!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $button.html('<span class="spinner-border spinner-border-sm"></span>');
                        $button.prop('disabled', true);
                        
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'delete_item',
                                item_id: imageId,
                                item_type: 'product_images[]'
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    $wrapper.remove();
                                    swal({
                                        title: 'Deleted!',
                                        text: 'Image deleted successfully.',
                                        icon: 'success',
                                        timer: 1500,
                                        buttons: false
                                    });
                                } else {
                                    swal('Error!', 'Failed to delete image.', 'error');
                                    $button.html('<i class="bi bi-x-lg"></i> Remove');
                                    $button.prop('disabled', false);
                                }
                            },
                            error: function() {
                                swal('Error!', 'Error deleting image.', 'error');
                                $button.html('<i class="bi bi-x-lg"></i> Remove');
                                $button.prop('disabled', false);
                            }
                        });
                    }
                });
            } else {
                // For new unsaved image, just remove the wrapper
                $wrapper.remove();
            }
        });
        // Handle remove preview button (the X button inside the preview)
        $(document).on('click', '.remove-image-preview', function(e) {
            e.stopPropagation();
            e.preventDefault();
            
            const $previewItem = $(this).closest('.image-preview-item');
            const $wrapper = $(this).closest('.dynamic_image_wrapper');
            
            if ($wrapper.length) {
                // Clear the file input
                const $fileInput = $wrapper.find('input[type="file"]');
                if ($fileInput.length) {
                    $fileInput.val('');
                    console.log('File input cleared for wrapper:', $wrapper.data('id'));
                }
                
                // Remove the preview
                $previewItem.remove();
                
                // Also clear any preview container content
                $wrapper.find('.image-preview-container').empty();
            } else {
                // For single image upload
                $('#product_images').val('');
                $previewItem.remove();
                $('#image_preview_container').empty();
            }
        });
        // Remove preview
        // $(document).on('click', '.remove-image-preview', function() {
        //     const $wrapper = $(this).closest('.dynamic_image_wrapper');
        //     $wrapper.find('input[type="file"]').val('');
        //     $(this).closest('.image-preview-item').remove();
            
        // });
        $('#imageCropModal').on('shown.bs.modal', function() {
            const image = document.getElementById('imageToCrop');
            
            // Destroy previous cropper instance if exists
            if (cropper) {
                cropper.destroy();
            }
            
            // Initialize cropper with fixed aspect ratio (450x600 = 3:4)
            cropper = new Cropper(image, {
                aspectRatio: 3 / 4,
                viewMode: 1,
                autoCropArea: 0.8,
                responsive: true,
                guides: true,
                center: true,
                highlight: true,
                cropBoxMovable: true,
                cropBoxResizable: true,
                toggleDragModeOnDblclick: false,
                minCropBoxWidth: 225,  // Minimum width (half of target)
                minCropBoxHeight: 300, // Minimum height (half of target)
                ready: function() {
                    // Set crop box to target dimensions (450x600)
                    const containerData = cropper.getContainerData();
                    const cropBoxWidth = 450;
                    const cropBoxHeight = 600;
                    
                    // Calculate position to center the crop box
                    const left = (containerData.width - cropBoxWidth) / 2;
                    const top = (containerData.height - cropBoxHeight) / 2;
                    
                    cropper.setCropBoxData({
                        width: cropBoxWidth,
                        height: cropBoxHeight,
                        left: left,
                        top: top
                    });
                }
            });
        });
        
        $('#cropImageBtn').on('click', function() {
            if (cropper) {
                // Get cropped canvas
                const canvas = cropper.getCroppedCanvas({
                    width: 450,  // Target width
                    height: 600, // Target height
                    minWidth: 450,
                    minHeight: 600,
                    maxWidth: 450,
                    maxHeight: 600,
                    fillColor: '#fff',
                    imageSmoothingEnabled: true,
                    imageSmoothingQuality: 'high'
                });
                
                if (canvas) {
                    // Convert canvas to blob
                    canvas.toBlob(function(blob) {
                        // Create a new File object from the blob
                        const fileName = currentImageInput.files[0].name;
                        const croppedFile = new File([blob], fileName, {
                            type: 'image/jpeg',
                            lastModified: Date.now()
                        });
                        
                        // Create a new DataTransfer object and add the cropped file
                        const dataTransfer = new DataTransfer();
                        dataTransfer.items.add(croppedFile);
                        
                        // Replace the original file input with the cropped file
                        currentImageInput.files = dataTransfer.files;
                        
                        // If there's an image container (for edit mode), update the preview
                        if (currentImageContainer) {
                            const reader = new FileReader();
                            reader.onload = function(e) {
                                currentImageContainer.attr('src', e.target.result);
                            };
                            reader.readAsDataURL(croppedFile);
                        }
                        
                        // Hide the modal
                        $('#imageCropModal').modal('hide');
                    }, 'image/jpeg', 1.0); // 0.9 is the quality (90%)
                }
            }
        });
        
        $('#imageCropModal').on('hidden.bs.modal', function() {
            if (cropper) {
                cropper.destroy();
                cropper = null;
            }
        });
        
        $('#btn_save_product').on('click', function(e) {
            e.preventDefault();
            var laddaButton = Ladda.create(this);
            laddaButton.start();
         try {
            let isValid = true;
            var userId = $('#user_id').val().trim();
            var vendorId = $('#vendor_id').val().trim();
            var categoryId = $('#category_name').val().trim();
            var categoryName = $('#category_name option:selected').text();
            // var subCategoryId = $('#sub_category_name').val().trim();
            // var subCategoryName = $('#sub_category_name option:selected').text();
            var subCategoryId=0;
            var subCategoryName='Default';
            var productName = $('#product_name').val().trim();
            var productBrandName = $('#product_brand_name').val().trim();
            var amountMRP = $('#amount_mrp').val().trim();
            var amountSelling = $('#amount_selling').val().trim();
            var amountOffer = $('#amount_offer').val().trim();
            var productDescription = $('#product_description').val().trim();
            var warrantyDetails = $('#warranty_details').val().trim();
            var producttags = $('#product_tags').val().trim();
            var productNameArabic = $('#product_name_arabic').val().trim();
            var productDescriptionArabic = $('#product_description_arabic').val().trim();
            if (categoryName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Category Name.', 'click');
                laddaButton.stop();
                return;
            }
            if (subCategoryName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Sub Category Name.', 'click');
                return;
            }
            if (productName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Name.', 'click');
                laddaButton.stop();
                return;
            }
               if (productNameArabic === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Name in Arabic.', 'click');
                laddaButton.stop();
                return;
            }
            // if (amountMRP === '' || isNaN(amountMRP)) {
            //     isValid = false;
            //     setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid MRP.', 'click');
            // }
            // if (amountSelling === '' || isNaN(amountSelling)) {
            //     isValid = false;
            //     setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Selling Price.', 'click');
            // }
            
            let mrp = parseFloat(amountMRP);
            let selling = parseFloat(amountSelling);
            let offer = amountOffer !== '' ? parseFloat(amountOffer) : null;
            
            // ✅ Mandatory checks
            if (!amountMRP || isNaN(mrp)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid MRP.', 'click');
                laddaButton.stop();
                return;
            }
            
            if (!amountSelling || isNaN(selling)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Selling Price.', 'click');
                laddaButton.stop();
                return;
            }
            
            // ✅ Selling should not exceed MRP
            if (!isNaN(mrp) && !isNaN(selling) && selling > mrp) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Selling price cannot be greater than MRP.', 'click');
                laddaButton.stop();
                return;
            }
            
            // ✅ Offer validation ONLY if entered
            if (offer !== null && !isNaN(offer)) {
            
                // Offer should not exceed MRP
                if (offer > mrp) {
                    isValid = false;
                    setupDropdown('dropdownContent', 'warning', svgError + 'Offer price cannot be greater than MRP.', 'click');
                    laddaButton.stop();
                    return;
                }
            
                // Offer should not exceed Selling
                if (offer > selling) {
                    isValid = false;
                    setupDropdown('dropdownContent', 'warning', svgError + 'Offer price cannot be greater than Selling price.', 'click');
                    laddaButton.stop();
                    return;
                }
            }

             if (productDescription === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Description.', 'click');
                laddaButton.stop();
                return;
            }
           
         
            if (productDescriptionArabic === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Description in Arabic.', 'click');
                laddaButton.stop();
                return;
            }

            
            //Added By Ebine
            
            
     

            // ✅ Check at least one color
            let hasColor = false;
            $('input[placeholder="Enter Product Color"]').each(function () {
                if ($(this).val().trim() !== '') {
                    hasColor = true;
                    laddaButton.stop();
                    return false;
                }
            });
            
            if (!hasColor) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please add at least one product color.', 'click');
                laddaButton.stop();
                return;
            }
            
            // ✅ Check at least one size
            let hasSize = false;
            $('input[placeholder="Enter Product Size"]').each(function () {
                if ($(this).val().trim() !== '') {
                    hasSize = true;
                    laddaButton.stop();
                    return false;
                    
                }
            });
            
            // if (!hasSize) {
            //     isValid = false;
            //     setupDropdown('dropdownContent', 'warning', svgError + 'Please add at least one product size.', 'click');
            //     laddaButton.stop();
            //     return;
            // }
            
            // ✅ Check at least one length
            let hasLength = false;
            $('input[placeholder="Enter Product Length"]').each(function () {
                if ($(this).val().trim() !== '') {
                    hasLength = true;
                    laddaButton.stop();
                    return false;
                }
            });
            
            if (!hasLength) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please add at least one product length.', 'click');
                laddaButton.stop();
                return;
            }
            
            // ✅ Check at least one image
            let hasImage = false;
            $('input[type="file"]').each(function () {
                if (this.files.length > 0) {
                    hasImage = true;
                    laddaButton.stop();
                    return false;
                }
            });
            
            if (!hasImage) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please upload at least one product image.', 'click');
                laddaButton.stop();
                return;
            }
            
            
            
           
            
            //  if (producttags === '') {
            //     isValid = false;
            //     setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Tags.', 'click');
            //     laddaButton.stop();
            //     return;
            // }
            
            //Block End by Ebine

            if (!isValid) {
                laddaButton.stop();
                return;
            }

            let formData = new FormData();
            formData.append('user_id', userId);
            formData.append('vendor_id', vendorId);
            formData.append('category_id', categoryId);
            formData.append('category_name', categoryName);
            formData.append('sub_category_id', subCategoryId);
            formData.append('sub_category_name', subCategoryName);
            formData.append('product_name', productName);
            formData.append('product_brand_name', productBrandName);
            formData.append('amount_mrp', amountMRP);
            formData.append('amount_selling', amountSelling);
            formData.append('amount_offer', amountOffer);
            formData.append('product_description', productDescription);
            formData.append('warranty_details', warrantyDetails);
            formData.append('product_tags', producttags);
            formData.append('action', 'add_product_details');
            formData.append('tax_percentage', $('#tax_percentage').val().trim());
            formData.append('cod_fee', $('#cod_fee').val().trim());
            formData.append('product_name_arabic', productNameArabic);
            formData.append('product_brand_name_arabic', $('#product_brand_name_arabic').val().trim());
            formData.append('product_description_arabic', productDescriptionArabic);
            formData.append('warranty_details_arabic', $('#warranty_details_arabic').val().trim());
            
            
              // Primary Image choice
            formData.append('primary_image', $('input[name="primary_image"]:checked').val() || '');
            
            
            // Collect colors
            $('input[placeholder="Enter Product Color"]').each(function() {
                formData.append('product_color[]', $(this).val().trim());
            });
            
            // Collect sizes
            $('input[placeholder="Enter Product Size"]').each(function() {
                formData.append('product_size[]', $(this).val().trim());
            });
            
            // Collect lengths
            $('input[placeholder="Enter Product Length"]').each(function() {
                formData.append('product_length[]', $(this).val().trim());
            });
            
            // Collect files
            $('input[type="file"]').each(function() {
                if (this.files.length > 0) {
                    formData.append('product_images[]', this.files[0]);
                }
            });
            
            var productVideo = $('#product_video')[0].files[0];
            if (productVideo) {
                formData.append('product_video', productVideo);
                console.log('Video added to form data:', productVideo.name, 'Size:', productVideo.size);
            } else {
                console.log('No video selected');
            }
            
            // FIXED: Collect specifications as pairs
            $('.specification-pair').each(function(index) {
                var englishSpec = $(this).find('.specification-en').val().trim();
                var arabicSpec = $(this).find('.specification-ar').val().trim();
                
                // Only add if at least one has content
                if (englishSpec || arabicSpec) {
                    formData.append('product_specification[]', englishSpec);
                    formData.append('product_specification_arabic[]', arabicSpec);
                }
            });
            
            laddaButton.start();

            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                   
                    if (response.includes('Success')) {
                        setupDropdown('dropdownContent', 'success', svgSuccess + 'Product details added successfully.', 'click');
                        //laddaButton.stop();
                        setTimeout(function () {
                            laddaButton.stop();
                        }, 1500); // 1.5 sec
                        
                       
                        $('.dynamic_color,.dynamic_size,.dynamic_length,.dynamic_image').remove();

                        var table = $('#productTable').DataTable();
                        table.ajax.reload(null, false);
                         $('input[type=text], input[type=number], textarea').val('');
                         $('input[type="file"]').val('');
                        $('#color_fields_container').html('');
                        $('#size_fields_container').html('');
                        $('#specification_pairs_container').html('');
                         $('.image-preview').attr('src', '').hide();
                         // 1. Clear file input
                            $('#product_video').val('');
                        
                            // 2. Remove video source
                            $('#video_preview source').attr('src', '');
                        
                            // 3. Reload video to reset player
                            $('#video_preview')[0].load();
                        
                            // 4. Hide preview container
                            $('#video_preview_container').hide();
                        
                            // 5. Clear filename
                            $('#video_filename').text('');
                         $('#product_images').val(''); // 🔥 IMPORTANT FIX
                        $('#image_preview_container').html(''); // remove preview
                                        
                      
                    } else {
                        setupDropdown('dropdownContent', 'error', svgError + 'Error adding product: ' + response, 'click');
                        laddaButton.stop();
                    }
                },
                error: function(xhr, status, error) {
                    console.error('AJAX Error: ', error);
                    laddaButton.stop();
                    setupDropdown('dropdownContent', 'error', svgError + 'AJAX request failed: ' + error, 'click');
                }
            });
            
        
        } catch (err) {
         console.error(err);
         swal({
                title: 'Error!',
                text: 'Please Fill product details',
                icon: 'error',
                button: 'OK'
            }).then(function () {
                laddaButton.stop();
            });
         }
        });
        
        function initializeEditCategoryDropdowns() {
            // Destroy any existing Select2 instances
            if ($('#edit_category_name').hasClass('select2-hidden-accessible')) {
                $('#edit_category_name').select2('destroy');
            }
            if ($('#edit_sub_category_name').hasClass('select2-hidden-accessible')) {
                $('#edit_sub_category_name').select2('destroy');
            }
            
            // Initialize Select2
            $('#edit_category_name').select2({
                placeholder: '- Please Select -',
                allowClear: true,
                dropdownParent: $('#editProductModal') // Important for modals
            });
            
            $('#edit_sub_category_name').select2({
                placeholder: '- Please Select -',
                allowClear: true,
                dropdownParent: $('#editProductModal') // Important for modals
            });
            
            // Handle category change
            // $('#edit_category_name').on('change', function() {
            //     var categoryId = $(this).val();
            //     if (categoryId) {
            //         fetchSubCategoriesForEdit(categoryId);
            //     } else {
            //         $('#edit_sub_category_name').html('<option value="">Select Sub Category</option>').trigger('change');
            //     }
            // });
        }
        
        function fetchSubCategoriesForEdit(categoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_sub_categories',
                    category_id: categoryId
                },
                success: function(response) {
                    var subCategories = JSON.parse(response);
                    var options = '<option value="">Select Sub Category</option>';
                    subCategories.forEach(function(subCategory) {
                        options += `<option value="${subCategory.ids}">${subCategory.sub_category}</option>`;
                    });
                    $('#edit_sub_category_name').html(options).trigger('change');
                },
                error: function() {
                    console.error('Error fetching subcategories for edit');
                }
            });
        }

        $('#productTable tbody').on('click', '.edit-product', function() {
            var productId = $(this).data('id');
            
            // Reset all form fields
            $('#edit_product_id').val('');
            $('#edit_product_name').val('');
            $('#edit_product_name_arabic').val('');
            $('#edit_product_brand_name').val('');
            $('#edit_product_brand_name_arabic').val('');
            $('#edit_amount_mrp').val('');
            $('#edit_amount_selling').val('');
            $('#edit_amount_offer').val('');
            $('#edit_product_description').val('');
            $('#edit_product_description_arabic').val('');
            $('#edit_warranty_details').val('');
            $('#edit_warranty_details_arabic').val('');
            $('#edit_product_tags').val('');
            $('#edit_featured_product').prop('checked', false);
            $('input[name="collection_type"]').prop('checked', false);
            $('#edit_tax_percentage').val('');
            $('#edit_cod_fee').val('');
            $('#edit_offer_percentage').val('');
            
            // Reset video preview
            $('#edit_product_video').val('');
            $('#edit_video_preview_container').hide();
            $('#edit_clear_video_btn').hide();
            $('#edit_video_preview source').attr('src', '');
            $('#edit_video_filename').text('');
            
            // Clear dynamic fields
            $('#edit_color_fields_container').html('');
            $('#edit_size_fields_container').html('');
            $('#edit_image_fields_container').html('');
            $('#edit_specification_container').html('');
            $('#edit_length_fields_container').html('');
            
            // Reset category dropdowns
            $('#edit_category_name').val(null).trigger('change');
            $('#edit_sub_category_name').html('<option value="">Select Sub Category</option>').trigger('change');
            
            // Show loading state (optional)
            swal({
                title: 'Loading...',
                text: 'Please wait while we fetch product details',
                icon: 'info',
                buttons: false,
                closeOnClickOutside: false,
                closeOnEsc: false
            });
            
            // Fetch product details
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'get_product_details',
                    product_id: productId
                },
                dataType: 'json',
                success: function(response) {
                    console.log('Product details response:', response);
                    swal.close(); // Close loading modal
                    
                    if (response.success) {
                        var productDetails = response.data.product_details;
                        var productColors = response.data.product_colors || [];
                        var productSizes = response.data.product_sizes || [];
                        var productImages = response.data.product_images || [];
                        var productSpecifications = response.data.product_specifications || [];
                        var productLengths = response.data.product_lengths || [];
                        
                        console.log('Product specifications:', productSpecifications);
                        
                        // Set basic product info
                        $('#edit_product_id').val(productDetails.ids);
                        $('#edit_product_name').val(productDetails.product_name || '');
                        $('#edit_product_name_arabic').val(productDetails.product_name_arabic || '');
                        $('#edit_product_brand_name').val(productDetails.product_brand_name || '');
                        $('#edit_product_brand_name_arabic').val(productDetails.product_brand_name_arabic || '');
                        $('#edit_amount_mrp').val(productDetails.amount_mrp || '');
                        $('#edit_amount_selling').val(productDetails.amount_selling || '');
                        $('#edit_amount_offer').val(productDetails.amount_offer || '');
                        $('#edit_product_description').val(productDetails.product_description || '');
                        $('#edit_product_description_arabic').val(productDetails.product_description_arabic || '');
                        $('#edit_warranty_details').val(productDetails.warranty_details || '');
                        $('#edit_warranty_details_arabic').val(productDetails.warranty_details_arabic || '');
                        $('#edit_product_tags').val(productDetails.product_tags || '');
                        $('#edit_tax_percentage').val(productDetails.tax_percentage || '');
                        $('#edit_cod_fee').val(productDetails.cod_fee || '');
                        $('#edit_featured_product').prop('checked', productDetails.featured === 'yes');
                        
                        // Set collection type
                        $('input[name="collection_type"][value="' + (productDetails.collection_type || '') + '"]').prop('checked', true);
                        
                        //Set Offer Percentage
                          if (productDetails.amount_offer=='0.00')
                          {
                            $('#edit_offer_percentage').val('0.00');  
                          }
                          else
                          {
                             var v_offer_percentage = (((productDetails.amount_mrp - productDetails.amount_offer) / productDetails.amount_mrp) * 100).toFixed(2);
                             
                             $('#edit_offer_percentage').val(v_offer_percentage);
                          }
                        
                        
                        // Load existing video if any
                        if (productDetails.product_video && productDetails.product_video !== '' && productDetails.product_video !== null) {
                            var videoUrl = '../../assets/videos/products/' + productDetails.product_video;
                            $('#edit_video_preview source').attr('src', videoUrl);
                            $('#edit_video_preview')[0].load();
                            $('#edit_video_filename').text(productDetails.product_video);
                            $('#edit_video_preview_container').show();
                            $('#edit_clear_video_btn').show();
                        } else {
                            $('#edit_video_preview_container').hide();
                            $('#edit_clear_video_btn').hide();
                        }
                        
                        // Fetch and set categories
                        fetchCategoriesForEdit(productDetails.category_id, productDetails.sub_category_id);
                        
                        // Populate colors
                        $('#edit_color_fields_container').html('');
                        for (var i = 0; i < productColors.length; i++) {
                            var newColorField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productColors[i].id + '">' +
                                '<input type="text" class="form-control" name="product_color[]" value="' +
                                escapeHtml(productColors[i].color || '') + '" placeholder="Product Color" />' +
                                '<input type="hidden" name="product_color_id[]" value="' +
                                productColors[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_color_fields_container').append(newColorField);
                        }
                        
                        // Populate sizes
                        $('#edit_size_fields_container').html('');
                        for (var i = 0; i < productSizes.length; i++) {
                            var newSizeField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productSizes[i].id + '">' +
                                '<input type="text" class="form-control" name="product_size[]" value="' +
                                escapeHtml(productSizes[i].size || '') + '" placeholder="Product Size" />' +
                                '<input type="hidden" name="product_size_id[]" value="' +
                                productSizes[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_size_fields_container').append(newSizeField);
                        }
                        
                        // Populate images
                        $('#edit_image_fields_container').html('');
                        for (var i = 0; i < productImages.length; i++) {
                            var imagePath = '../../assets/img/products/product/' + productImages[i].image;
                            var isChecked = productImages[i].is_primary == 1 ? 'checked' : '';
                            // var newImageField = '<div class="dynamic_image_wrapper mb-3" data-id="' + productImages[i].id + '">' +
                            //     '<div class="input-group">' +
                            //         '<input type="file" class="form-control" name="product_images[]" accept="image/*" />' +
                            //         '<input type="hidden" name="product_image_id[]" value="' + productImages[i].id + '" />' +
                            //         '<button type="button" class="btn btn-danger remove-field">' +
                            //             '<i class="bi bi-x-lg"></i> Remove' +
                            //         '</button>' +
                            //     '</div>' +
                            //     '<div class="image-preview-container mt-2">' +
                            //         '<div class="image-preview-item p-2 border rounded">' +
                            //             '<img src="' + imagePath + '" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">' +
                            //             '<small class="text-muted">' + productImages[i].image + '</small>' +
                            //         '</div>' +
                            //     '</div>' +
                            // '</div>';
                            
                             var newImageField = '<div class="dynamic_image_wrapper mb-3" data-id="' + productImages[i].id + '">' +
                                '<div class="input-group">' +
                                    '<input type="file" class="form-control" name="product_images[]" accept="image/*" />' +
                                    '<input type="hidden" name="product_image_id[]" value="' + productImages[i].id + '" />' +
                                    '<button type="button" class="btn btn-danger remove-field">' +
                                        '<i class="bi bi-x-lg"></i> Remove' +
                                    '</button>' +
                                '</div>' +
                                '<div class="image-preview-container mt-2">' +
                                    '<div class="image-preview-item p-2 border rounded">' +
                                        '<img src="' + imagePath + '" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">' +
                                        '<small class="text-muted">' + productImages[i].image + '</small>' +
                                        '<div class="d-inline-block align-top">' +
                                            '<small class="text-muted d-block">' + productImages[i].image + '</small>' +
                                            '<div class="form-check mt-2">' +
                                                '<input class="form-check-input primary-image-radio" type="radio" name="primary_image" value="' + productImages[i].id + '" id="primary_edit_' + productImages[i].id + '" ' + isChecked + '>' +
                                                '<label class="form-check-label text-primary fw-bold" for="primary_edit_' + productImages[i].id + '">' +
                                                    'Primary Image' +
                                                '</label>' +
                                            '</div>' +
                                        '</div>' +
                                    '</div>' +
                                '</div>' +
                            '</div>';
                            $('#edit_image_fields_container').append(newImageField);
                        }
                        
                        // Populate specifications (English + Arabic PAIRS)
                        $('#edit_specification_container').html('');
                        for (var i = 0; i < productSpecifications.length; i++) {
                            var specPair = '<div class="row mb-2 spec-pair" data-id="' + productSpecifications[i].id + '">' +
                                '<div class="col-md-5">' +
                                    '<div class="input-group">' +
                                        '<span class="input-group-text">EN</span>' +
                                        '<input type="text" class="form-control" name="product_specification[]" value="' +
                                            escapeHtml(productSpecifications[i].specification || '') + '" placeholder="English Specification" />' +
                                        '<input type="hidden" name="product_specification_id[]" value="' +
                                            productSpecifications[i].id + '" />' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-md-5">' +
                                    '<div class="input-group">' +
                                        '<span class="input-group-text">AR</span>' +
                                        '<input type="text" class="form-control arabic-input" name="product_specification_arabic[]" value="' +
                                            escapeHtml(productSpecifications[i].specification_arabic || '') + '" placeholder="Arabic Specification" />' +
                                        '<input type="hidden" name="product_specification_arabic_id[]" value="' +
                                            productSpecifications[i].id + '" />' +
                                    '</div>' +
                                '</div>' +
                                '<div class="col-md-2">' +
                                    '<button type="button" class="btn btn-danger remove-spec-pair">' +
                                        '<i class="fas fa-trash"></i> Remove' +
                                    '</button>' +
                                '</div>' +
                            '</div>';
                            $('#edit_specification_container').append(specPair);
                        }
                        
                        // Populate lengths
                        $('#edit_length_fields_container').html('');
                        for (var i = 0; i < productLengths.length; i++) {
                            var newLengthField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productLengths[i].id + '">' +
                                '<input type="text" class="form-control" name="product_length[]" value="' +
                                escapeHtml(productLengths[i].length || '') + '" placeholder="Product Length" />' +
                                '<input type="hidden" name="product_length_id[]" value="' +
                                productLengths[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_length_fields_container').append(newLengthField);
                        }
                        
                        // Show the modal
                        $('#editProductModal').modal('show');
                        
                    } else {
                        swal({
                            title: 'Error!',
                            text: response.message || 'Failed to fetch product details.',
                            icon: 'error',
                            button: 'OK'
                        });
                    }
                },
                error: function(xhr, status, error) {
                    swal.close(); // Close loading modal
                    console.error('AJAX error:', error);
                    console.error('Response text:', xhr.responseText);
                    swal({
                        title: 'Error!',
                        text: 'Error fetching product details: ' + error + '\nPlease check console for details.',
                        icon: 'error',
                        button: 'OK'
                    });
                }
            });
        });
        
        // Helper function to escape HTML
        function escapeHtml(text) {
            if (!text) return '';
            return text.replace(/[&<>]/g, function(m) {
                if (m === '&') return '&amp;';
                if (m === '<') return '&lt;';
                if (m === '>') return '&gt;';
                return m;
            }).replace(/[\u00A0-\u9999<>\&]/g, function(i) {
                return i;
            });
        }
        
        $('#editProductModal').on('shown.bs.modal', function() {
            initializeEditCategoryDropdowns();
        });
        
        function fetchCategoriesForEdit(selectedCategoryId, selectedSubCategoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_categories'
                },
                success: function(response) {
                    var categories = JSON.parse(response);
                    var options = '<option value="">Select Category</option>';
                    categories.forEach(function(category) {
                        options += `<option value="${category.ids}">${category.category_type}</option>`;
                    });
                    
                    $('#edit_category_name').html(options).trigger('change');
                    
                    // Set the selected category after options are loaded
                    if (selectedCategoryId) {
                        $('#edit_category_name').val(selectedCategoryId).trigger('change');
                        
                        // Fetch subcategories for this category
                        fetchSubCategoriesForEdit(selectedCategoryId, selectedSubCategoryId);
                    }
                }
            });
        }
        
        function fetchSubCategoriesForEdit(categoryId, selectedSubCategoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_sub_categories',
                    category_id: categoryId
                },
                success: function(response) {
                    var subCategories = JSON.parse(response);
                    var options = '<option value="">Select Sub Category</option>';
                    subCategories.forEach(function(subCategory) {
                        options += `<option value="${subCategory.ids}">${subCategory.sub_category}</option>`;
                    });
                    
                    $('#edit_sub_category_name').html(options).trigger('change');
                    
                    // Set the selected subcategory after options are loaded
                    if (selectedSubCategoryId) {
                        $('#edit_sub_category_name').val(selectedSubCategoryId).trigger('change');
                    }
                }
            });
        }
        
        $('#edit_offer_percentage').on('input', function() {
            var mrp = parseFloat($('#edit_amount_mrp').val()) || 0;
            var percentage = parseFloat($(this).val()) || 0;
            if (mrp > 0 && percentage >= 0 && percentage <= 100) {
                var discount = (mrp * percentage) / 100;
                var offerAmount = mrp - discount;
                $('#edit_amount_offer').val(offerAmount.toFixed(2));
            } else {
                $('#edit_amount_offer').val('');
            }
        });
        
        $('#edit_amount_offer').on('input', function() {
            $('#edit_offer_percentage').val('');
        });

        $('#add_edit_color').on('click', function() {
            var newColorField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_color[]" placeholder="Enter Product Color" />' +
                '<input type="hidden" name="product_color_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_color_fields_container').append(newColorField);
        });

        $('#add_edit_size').on('click', function() {
            var newSizeField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_size[]" placeholder="Enter Product Size" />' +
                '<input type="hidden" name="product_size_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_size_fields_container').append(newSizeField);
        });

        $('#add_edit_image').off('click').on('click', function() {
            var newImageField = '<div class="dynamic_image_wrapper mb-3" data-id="">' +
                '<div class="input-group">' +
                    '<input type="file" class="form-control" name="product_images[]" accept="image/*" />' +
                    '<input type="hidden" name="product_image_id[]" value="" />' +
                    '<button type="button" class="btn btn-danger remove-field">' +
                        '<i class="bi bi-x-lg"></i> Remove' +
                    '</button>' +
                '</div>' +
                '<div class="image-preview-container mt-2"></div>' +
            '</div>';
            $('#edit_image_fields_container').append(newImageField);
        });
        
        // $(document).on('click', '.remove-field', function() {
        //     var $this = $(this);
        //     var itemId = $this.closest('.input-group').data('id');
        //     var itemType = $this.closest('.input-group').find('input').attr('name');
        //     if (itemId) {
        //         swal({
        //             title: 'Are you sure?',
        //             text: 'This action cannot be undone!',
        //             icon: 'warning',
        //             buttons: true,
        //             dangerMode: true,
        //         }).then((willDelete) => {
        //             if (willDelete) {
        //                 $.ajax({
        //                     url: '../controller/add_product/product_controller.php',
        //                     type: 'POST',
        //                     data: {
        //                         action: 'delete_item',
        //                         item_id: itemId,
        //                         item_type: itemType
        //                     },
        //                     success: function(response) {
        //                         if (response === 'success') {
        //                             $this.closest('.input-group').remove();
        //                             swal({
        //                                 title: 'Deleted!',
        //                                 text: 'The item has been deleted.',
        //                                 icon: 'success',
        //                                 button: 'OK'
        //                             });
        //                         } else {
        //                             swal({
        //                                 title: 'Error!',
        //                                 text: 'Failed to delete the item.',
        //                                 icon: 'error',
        //                                 button: 'OK'
        //                             });
        //                         }
        //                     },
        //                     error: function(xhr, status, error) {
        //                         swal({
        //                             title: 'Error!',
        //                             text: 'An error occurred while deleting the item: ' + error,
        //                             icon: 'error',
        //                             button: 'OK'
        //                         });
        //                     }
        //                 });
        //             }
        //         });
        //     } else {
        //         $this.closest('.input-group').remove();
        //     }
        // });
        
        $(document).on('change', '#edit_image_fields_container input[type="file"]', function(e) {
            const file = e.target.files[0];
            if (!file) return;
            
            currentEditFileInput = this;
            const $wrapper = $(this).closest('.dynamic_image_wrapper');
            currentEditImageContainer = $wrapper.find('.image-preview-container');
            
            const reader = new FileReader();
            
            reader.onload = function(event) {
                // Destroy old instance
                if (editCroppieInstance) {
                    editCroppieInstance.destroy();
                }
                
                // Show modal first
                $('#croppieModal').modal('show');
                
                // Small delay to ensure modal is visible
                setTimeout(function() {
                    // Initialize Croppie
                    editCroppieInstance = new Croppie(document.getElementById('croppie-container'), {
                        viewport: { width: 400, height: 650 },
                        boundary: { width: 400, height: 650 },
                        showZoomer: true,
                        enableOrientation: true
                    });
                    
                    editCroppieInstance.bind({
                        url: event.target.result
                    });
                }, 500);
            };
            
            reader.readAsDataURL(file);
        });
        
        // function showEditImagePreview(input, file, container) {
        //     const reader = new FileReader();
        //     reader.onload = function(e) {
        //         const previewHtml = `
        //             <div class="image-preview-item mt-2 p-2 border rounded">
        //                 <img src="${e.target.result}" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">
        //                 <small class="text-muted">${file.name}</small>
        //                 <button type="button" class="btn btn-sm btn-danger float-end remove-image-preview">
        //                     <i class="bi bi-x"></i>
        //                 </button>
        //             </div>
        //         `;
        //         container.html(previewHtml);
        //     };
        //     reader.readAsDataURL(file);
        // }
        
        
        function showEditImagePreview(input, file, container) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const previewHtml = `
                    <div class="image-preview-item mt-2 p-2 border rounded">
                    <div class="image-preview-item mt-2 p-2 border rounded position-relative">
                        <img src="${e.target.result}" style="width: 80px; height: 120px; object-fit: cover; border-radius: 4px;" class="me-2">
                        <small class="text-muted">${file.name}</small>
                        <div class="d-inline-block align-top">
                            <small class="text-muted d-block text-truncate" style="max-width: 150px;">${file.name}</small>
                            <div class="form-check mt-2">
                                <input class="form-check-input primary-image-radio" type="radio" name="primary_image" value="${file.name}" id="primary_edit_new_${file.name.replace(/[^a-z0-9]/gi, '_')}">
                                <label class="form-check-label text-primary fw-bold" for="primary_edit_new_${file.name.replace(/[^a-z0-9]/gi, '_')}">
                                    Primary Image
                                </label>
                            </div>
                        </div>
                        <button type="button" class="btn btn-sm btn-danger float-end remove-image-preview">
                            <i class="bi bi-x"></i>
                        </button>
                    </div>
                `;
                container.html(previewHtml);
            };
            reader.readAsDataURL(file);
        }
        
        $('#btn_update_product').on('click', function(e) {
            e.preventDefault();
            
            const $btn = $(this);
            const ladda = Ladda.create(this);
            ladda.start();
            
            // ─── 1. Read values safely ──────────────────────────────────────────────
            const catId = $('#edit_category_name').val() || '';
            const catName = $('#edit_category_name option:selected').text().trim() || '';
            const subId = $('#edit_sub_category_name').val() || '';
            const subName = $('#edit_sub_category_name option:selected').text().trim() || '';
            
            // Basic required field check (client-side)
            if (!catId) {
                swal("Warning", "Please select a Category", "warning");
                ladda.stop();
                return;
            }
            
            if (!$('#edit_product_name').val()?.trim()) {
                swal("Warning", "Product name is required", "warning");
                ladda.stop();
                return;
            }
            
            if (!$('#edit_amount_mrp').val()?.trim()) {
                swal("Warning", "MRP amount is required", "warning");
                ladda.stop();
                return;
            }
            
            if (!$('#edit_amount_selling').val()?.trim()) {
                swal("Warning", "Selling price is required", "warning");
                ladda.stop();
                return;
            }
            
            // ─── 2. Build FormData ──────────────────────────────────────────────────
            let formData = new FormData();
            
            formData.append('action', 'update_product_details');
            formData.append('product_id', $('#edit_product_id').val()?.trim() || '');
            
            // Core product fields
            formData.append('product_name', $('#edit_product_name').val()?.trim() || '');
            formData.append('product_name_arabic', $('#edit_product_name_arabic').val()?.trim() || '');
            formData.append('product_brand_name', $('#edit_product_brand_name').val()?.trim() || '');
            formData.append('product_brand_name_arabic', $('#edit_product_brand_name_arabic').val()?.trim() || '');
            formData.append('amount_mrp', $('#edit_amount_mrp').val()?.trim() || '0');
            formData.append('amount_selling', $('#edit_amount_selling').val()?.trim() || '0');
            formData.append('amount_offer', $('#edit_amount_offer').val()?.trim() || '0');
            formData.append('product_description', $('#edit_product_description').val()?.trim() || '');
            formData.append('product_description_arabic', $('#edit_product_description_arabic').val()?.trim() || '');
            formData.append('warranty_details', $('#edit_warranty_details').val()?.trim() || '');
            formData.append('warranty_details_arabic', $('#edit_warranty_details_arabic').val()?.trim() || '');
            formData.append('product_tags', $('#edit_product_tags').val()?.trim() || '');
            
            // Flags & settings
            formData.append('featured_product', $('#edit_featured_product').is(':checked') ? 'yes' : 'no');
            formData.append('collection_type', $('input[name="collection_type"]:checked').val() || '');
            formData.append('tax_percentage', $('#edit_tax_percentage').val()?.trim() || '0');
            formData.append('cod_fee', $('#edit_cod_fee').val()?.trim() || '0');
            
            // Category & subcategory
            formData.append('category_id', catId);
            formData.append('category_name', catName);
            formData.append('sub_category_id', subId);
            formData.append('sub_category_name', subName);
            
            
            // Primary Image choice
            formData.append('primary_image', $('input[name="primary_image"]:checked').val() || '');
            
            // ─── Add video if selected ──────────────────────────────────────────────
            var editProductVideo = $('#edit_product_video')[0].files[0];
            if (editProductVideo) {
                formData.append('product_video', editProductVideo);
                console.log('Video added to edit form:', editProductVideo.name, 'Size:', editProductVideo.size);
            } else {
                console.log('No new video selected for edit');
            }
            
            // ─── Dynamic arrays ─────────────────────────────────────────────────────
            // Colors
            $('input[name="product_color[]"]').each((i, el) => {
                const val = $(el).val()?.trim() || '';
                const id = $('input[name="product_color_id[]"]').eq(i).val() || '';
                formData.append('product_color[]', val);
                formData.append('product_color_id[]', id);
            });
            
            // Sizes
            $('input[name="product_size[]"]').each((i, el) => {
                const val = $(el).val()?.trim() || '';
                const id = $('input[name="product_size_id[]"]').eq(i).val() || '';
                formData.append('product_size[]', val);
                formData.append('product_size_id[]', id);
            });
            
            // Lengths
            $('input[name="product_length[]"]').each((i, el) => {
                const val = $(el).val()?.trim() || '';
                const id = $('input[name="product_length_id[]"]').eq(i).val() || '';
                formData.append('product_length[]', val);
                formData.append('product_length_id[]', id);
            });
            
            // Images (only if file is selected)
            $('input[name="product_images[]"]').each((i, input) => {
                if (input.files && input.files[0]) {
                    formData.append('product_images[]', input.files[0]);
                    const id = $('input[name="product_image_id[]"]').eq(i).val() || '';
                    formData.append('product_image_id[]', id);
                } else {
                    // If no new file, we still need to pass existing IDs
                    const id = $('input[name="product_image_id[]"]').eq(i).val() || '';
                    if (id) {
                        formData.append('product_image_id[]', id);
                    }
                }
            });
            
            // Specifications – paired (English + Arabic)
            $('.spec-pair').each(function() {
                const $row = $(this);
                const en = $row.find('input[name="product_specification[]"]').val()?.trim() || '';
                const ar = $row.find('input[name="product_specification_arabic[]"]').val()?.trim() || '';
                const enId = $row.find('input[name="product_specification_id[]"]').val() || '';
                const arId = $row.find('input[name="product_specification_arabic_id[]"]').val() || '';
                
                formData.append('product_specification[]', en);
                formData.append('product_specification_id[]', enId);
                formData.append('product_specification_arabic[]', ar);
                formData.append('product_specification_arabic_id[]', arId);
            });
            
            // ─── Send request ───────────────────────────────────────────────────────
            
            ladda.start();
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                cache: false,
                timeout: 60000, // 60 seconds timeout
                success: function(response) {
                    console.log("Server response:", response);
                    
                    let res;
                    try {
                        res = typeof response === 'string' && response.trim() ? JSON.parse(response) : response;
                    } catch (e) {
                        console.error("Response is not JSON:", response);
                        swal("Error", "Server returned invalid format", "error");
                        ladda.stop();
                        return;
                    }
                    
                    if (res && (res.status === 'success' || res.success === true)) {
                        swal({
                            title: "Success",
                            text: res.message || "Product updated successfully",
                            icon: "success"
                        }).then(() => {
                            $('#editProductModal').modal('hide');
                            if ($.fn.DataTable.isDataTable('#productTable')) {
                                $('#productTable').DataTable().ajax.reload(null, false);
                            }
                            // Optional: reload collection tables
                            ['featuredTable','summerTable','winterTable','monsoonTable'].forEach(id => {
                                if ($.fn.DataTable.isDataTable('#'+id)) {
                                    $('#'+id).DataTable().ajax.reload(null, false);
                                }
                            });
                        });
                    } else {
                        swal("Error", res?.message || "Update failed – check server response", "error");
                    }
                    ladda.stop();
                },
                error: function(xhr, status, errorMsg) {
                    console.error("AJAX failed:", status, errorMsg, xhr.responseText);
                    swal("Error", "Could not connect to server\n" + (xhr.responseText?.substring(0,200) || errorMsg), "error");
                    ladda.stop();
                }
            });
        });

        function fetchCategories() {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_categories'
                },
                success: function(response) {
                    var categories = JSON.parse(response);
                    var options = '<option value="" disabled selected>- Please Select -</option>';
                    categories.forEach(function(category) {
                        options += `<option value="${category.ids}">${category.category_type}</option>`;
                    });
                    options += '<option value="add_new_category">Add New Category</option>';
                    $('#category_name').html(options).trigger('change');
                },
                error: function() {
                    console.error('Error fetching categories');
                }
            });
        }

        function fetchSubCategories(categoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_sub_categories',
                    category_id: categoryId
                },
                success: function(response) {
                    var subCategories = JSON.parse(response);
                    var options = '<option value="" disabled selected>- Please Select -</option>';
                    subCategories.forEach(function(subCategory) {
                        options += `<option value="${subCategory.ids}">${subCategory.sub_category}</option>`;
                    });
                    options += '<option value="add_new_sub_category">Add New Sub Category</option>';
                    $('#sub_category_name').html(options);
                    subCategoryInitialized = true;
                },
                error: function() {
                    console.error('Error fetching subcategories');
                }
            });
        }

        $('#saveNewCategory').on('click', function() {
            var categoryName = $('#new_category_name').val();
            var categoryName_Arabic = $('#new_category_name_arabic').val();
            var categoryImage = $('#new_category_image')[0].files[0];
            var formData = new FormData();
            formData.append('action', 'add_new_category');
            formData.append('category_name', categoryName);
            formData.append('category_name_arabic', categoryName_Arabic);
            formData.append('category_image', categoryImage);
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === 'success') {
                        $('#addCategoryModal').modal('hide');
                        $('#new_category_name,#new_category_name_arabic').val('');
                        $('#new_category_image').val('');
                        fetchCategories();
                    } else {
                        alert('Failed to add category');
                    }
                },
                error: function() {
                    alert('Error adding category');
                }
            });
        });

        $('#saveNewSubCategory').on('click', function() {
            var subCategoryName = $('#new_sub_category_name').val();
            var categoryId = $('#category_name').val();
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'add_new_sub_category',
                    sub_category_name: subCategoryName,
                    category_id: categoryId
                },
                success: function(response) {
                    if (response === 'success') {
                        $('#addSubCategoryModal').modal('hide');
                        $('#new_sub_category_name').val('');
                        fetchSubCategories(categoryId);
                    } else {
                        alert('Failed to add subcategory');
                    }
                },
                error: function() {
                    alert('Error adding subcategory');
                }
            });
        });
        function initializeCollectionTable(tableId, filterType, filterValue) {
            if (!$.fn.DataTable.isDataTable('#' + tableId)) {
                var table = $('#' + tableId).DataTable({
                    "processing": true,
                    "serverSide": false,
                    "ajax": {
                        'type': 'POST',
                        'url': '../controller/add_product/product_controller.php',
                        'data': {
                            action: 'list_collection_products',
                            filter_type: filterType,
                            filter_value: filterValue
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
                    "columns": [{
                            "className": 'dt-control',
                            "orderable": false,
                            "searchable": false,
                            "data": null,
                            "defaultContent": '',
                            "title": "",
                            "width": "30px",
                        },
                        {
                            "data": null,
                            "render": function(data, type, row, meta) {
                                return meta.row + 1;
                            }
                        },
                        {
                            "data": "product_name",
                            "title": "Product Name"
                        },
                        {
                            "data": "product_brand_name",
                            "title": "Brand Name"
                        },
                        {
                            "data": "amount_mrp",
                            "title": "MRP Amount"
                        },
                        {
                            "data": "amount_selling",
                            "title": "Selling Amount"
                        },
                        {
                            "data": "amount_offer",
                            "title": "Offer Amount"
                        },
                        {
                            "data": "warranty_details",
                            "title": "Warranty"
                        },
                        {
                            "data": "status",
                            render: function(data, type, row) {
                                if (data === 'Active') {
                                    return '<a class="status-toggle" data-id="' + row.ids +
                                        '" data-status="Active" style="cursor:pointer"><i class="ri-thumb-up-line ri-20px text-primary me-1"></i></a>';
                                } else {
                                    return '<a class="status-toggle" data-id="' + row.ids +
                                        '" data-status="Deactive" style="cursor:pointer"><i class="ri-thumb-down-line ri-20px text-danger me-1"></i></a>';
                                }
                            }
                        },
                        {
                            "data": "ids",
                            render: function(data, type, row) {
                                var collection = tableId.replace('Table', '');
                                return '<a class="waves-effect remove-from-collection" data-id="' + data +
                                        '" data-collection="' + collection + '" title="Remove from Collection">' +
                                        '<i class="ri-close-circle-line me-1" style="color:orange;"></i></a>' +
                                        '<a class="waves-effect copy-product-link" data-id="' + data +
                                        '" title="Copy Secure Link" style="cursor:pointer;">' +
                                        '<i class="ri-file-copy-line me-1" style="color:green;"></i></a>' +
                                        '<a class="waves-effect delete-product" data-id="' + data +
                                        '" title="Delete"><i class="ri-delete-bin-2-fill" style="color:red;"></i></a>';
                            }
                        },
                    ],
                    "responsive": false,
                    "initComplete": function() {
                        // Move the search/filter input to a custom container at the top-right
                        var $filterInput = $('#' + tableId + '_filter');
                        
                        // Create a container div for the search bar if it doesn't exist
                        var $searchContainer = $('#' + tableId + '_wrapper').find('.datatable-search-container');
                        if ($searchContainer.length === 0) {
                            $('#' + tableId + '_wrapper').prepend('<div class="datatable-search-container" style="display: flex; justify-content: flex-end; margin-bottom: 15px;"></div>');
                            $searchContainer = $('#' + tableId + '_wrapper').find('.datatable-search-container');
                        }
                        
                        // Move the filter input to the container
                        $filterInput.appendTo($searchContainer);
                        
                        // Style the search input
                        $filterInput.find('label').css({
                            'display': 'flex',
                            'align-items': 'center',
                            'gap': '8px'
                        });
                        $filterInput.find('input').css({
                            'padding': '6px 12px',
                            'border-radius': '4px',
                            'border': '1px solid #ddd'
                        });
                    }
                });
                
                let currentProductIdForLink = null;

                $(document).on('click', '.copy-product-link', function(e) {
                    e.preventDefault();
                    currentProductIdForLink = $(this).data('id');
                    $('#platformModal').modal('show');
                });
                
                $(document).on('mouseenter', '.platform-btn', function() {
                    const platform = $(this).data('platform');
                    const $btn = $(this);
                    
                    switch(platform) {
                        case 'instagram':
                            $btn.css({
                                'background': 'linear-gradient(45deg, #f09433 0%, #e6683c 25%, #dc2743 50%, #cc2366 75%, #bc1888 100%)',
                                'color': 'white',
                                'border-color': 'transparent',
                                'transform': 'translateY(-2px)',
                                'boxShadow': '0 8px 20px rgba(225, 48, 108, 0.3)'
                            });
                            $btn.find('i').css('color', 'white');
                            break;
                        case 'youtube':
                            $btn.css({
                                'background': '#FF0000',
                                'color': 'white',
                                'border-color': 'transparent',
                                'transform': 'translateY(-2px)',
                                'boxShadow': '0 8px 20px rgba(255, 0, 0, 0.3)'
                            });
                            $btn.find('i').css('color', 'white');
                            break;
                        case 'tiktok':
                            $btn.css({
                                'background': '#000000',
                                'color': 'white',
                                'border-color': 'transparent',
                                'transform': 'translateY(-2px)',
                                'boxShadow': '0 8px 20px rgba(0, 0, 0, 0.3)'
                            });
                            $btn.find('i').css('color', 'white');
                            break;
                        case 'facebook':
                            $btn.css({
                                'background': '#1877F2',
                                'color': 'white',
                                'border-color': 'transparent',
                                'transform': 'translateY(-2px)',
                                'boxShadow': '0 8px 20px rgba(24, 119, 242, 0.3)'
                            });
                            $btn.find('i').css('color', 'white');
                            break;
                    }
                }).on('mouseleave', '.platform-btn', function() {
                    const platform = $(this).data('platform');
                    const $btn = $(this);
                    
                    // Reset to original styles
                    $btn.css({
                        'background': '#fff',
                        'border-color': '#e0e0e0',
                        'transform': 'translateY(0)',
                        'boxShadow': 'none'
                    });
                    
                    // Reset colors based on platform
                    switch(platform) {
                        case 'instagram':
                            $btn.css('color', '#262626');
                            $btn.find('i').css('color', '#262626');
                            break;
                        case 'youtube':
                            $btn.css('color', '#FF0000');
                            $btn.find('i').css('color', '#FF0000');
                            break;
                        case 'tiktok':
                            $btn.css('color', '#000000');
                            $btn.find('i').css('color', '#000000');
                            break;
                        case 'facebook':
                            $btn.css('color', '#1877F2');
                            $btn.find('i').css('color', '#1877F2');
                            break;
                    }
                });
                
                // Store original content for each button
                let originalButtonContent = {};
                
                // Platform click handler with proper loading state
                $(document).on('click', '.platform-btn', function () {
                    const $btn = $(this);
                    const platform = $btn.data('platform');
                    const productId = currentProductIdForLink;
                
                    const $icon = $btn.find('i');
                    const $text = $btn.find('.btn-text');
                
                    // ✅ Prevent double click
                    if ($btn.prop('disabled')) return;
                
                    // ✅ Show loader (without destroying structure)
                    $btn.prop('disabled', true).css('opacity', '0.7');
                
                    $icon.removeClass().addClass('ri-loader-4-line ri-spin');
                    $text.text('Generating...');
                
                    $.ajax({
                        url: '../controller/add_product/product_controller.php',
                        type: 'POST',
                        data: {
                            action: 'generate_encrypted_product_url',
                            product_id: productId,
                            platform: platform
                        },
                        dataType: 'json',
                
                        success: function (response) {
                
                            if (response.success) {
                                const productUrl = response.encrypted_url;
                                copyToClipboard(productUrl);
                
                                if (typeof swal !== 'undefined') {
                                    swal({
                                        title: 'Success!',
                                        text: `${platform} link copied!`,
                                        icon: 'success',
                                        timer: 2000,
                                        buttons: false
                                    });
                                } else {
                                    alert(`${platform} link copied!`);
                                }
                            } else {
                                if (typeof swal !== 'undefined') {
                                    swal('Error!', response.message || 'Failed', 'error');
                                } else {
                                    alert('Error: ' + (response.message || 'Failed'));
                                }
                            }
                        },
                
                        error: function () {
                            if (typeof swal !== 'undefined') {
                                swal('Error!', 'Try again', 'error');
                            } else {
                                alert('Try again');
                            }
                        },
                
                        complete: function () {
                
                            // ✅ Restore icon properly per platform
                            switch (platform) {
                                case 'instagram':
                                    $icon.removeClass().addClass('ri-instagram-line');
                                    break;
                                case 'youtube':
                                    $icon.removeClass().addClass('ri-youtube-line');
                                    break;
                                case 'tiktok':
                                    $icon.removeClass().addClass('ri-tiktok-line');
                                    break;
                                case 'facebook':
                                    $icon.removeClass().addClass('ri-facebook-circle-line');
                                    break;
                            }
                
                            // ✅ Restore text
                            $text.text(platform.charAt(0).toUpperCase() + platform.slice(1));
                
                            // ✅ Enable button
                            $btn.prop('disabled', false).css('opacity', '1');
                
                            // ✅ Close modal
                            $('#platformModal').modal('hide');
                        }
                    });
                });
                
                // Helper function to copy to clipboard
                function copyToClipboard(text) {
                    // Try modern Clipboard API first
                    if (navigator.clipboard && navigator.clipboard.writeText) {
                        navigator.clipboard.writeText(text).catch(function(err) {
                            console.warn('Clipboard API failed, using fallback:', err);
                            fallbackCopy(text);
                        });
                    } else {
                        fallbackCopy(text);
                    }
                }
                
                function fallbackCopy(text) {
                    const tempInput = document.createElement('input');
                    tempInput.value = text;
                    document.body.appendChild(tempInput);
                    tempInput.select();
                    tempInput.setSelectionRange(0, 99999);
                    document.execCommand('copy');
                    document.body.removeChild(tempInput);
                }
                
                $('#' + tableId + ' tbody').on('click', 'td.dt-control', function() {
                    var tr = $(this).closest('tr');
                    var row = table.row(tr);
                    var isShown = row.child.isShown();
                    table.rows().every(function() {
                        if (this.child.isShown() && this.index() !== row.index()) {
                            this.child.hide();
                            $(this.node()).find('.dt-control i').removeClass('ri-subtract-line')
                                .addClass('ri-add-circle-line');
                            $(this.node()).removeClass('shown');
                        }
                    });
                    if (isShown) {
                        row.child.hide();
                        tr.removeClass('shown');
                        $(this).find('i').removeClass('ri-subtract-line').addClass('ri-add-circle-line');
                    } else {
                        var childContent = '<div class="p-3">' +
                            '<p><strong>Description:</strong> ' + row.data().product_description + '</p>' +
                            '</div>';
                        row.child(childContent).show();
                        tr.addClass('shown');
                        $(this).find('i').removeClass('ri-add-circle-line').addClass('ri-subtract-line');
                    }
                    $('#' + tableId + ' tbody tr').removeClass('selected');
                    tr.addClass('selected');
                });
    
                $('#' + tableId + ' tbody').on('click', 'tr', function(e) {
                    if (!$(e.target).hasClass('dt-control') && !$(e.target).closest('td').hasClass('dt-control')) {
                        $('#' + tableId + ' tbody tr').removeClass('selected');
                        $(this).addClass('selected');
                    }
                });
            }
        }
    
        // Initialize all collection tables
        initializeCollectionTable('featuredTable', 'featured', 'yes');
        initializeCollectionTable('summerTable', 'collection_type', 'summer');
        initializeCollectionTable('winterTable', 'collection_type', 'winter');
        initializeCollectionTable('monsoonTable', 'collection_type', 'monsoon');
    
        // Handle tab switching
        $('#collectionTabs a').on('shown.bs.tab', function(e) {
            var targetTable = $(e.target).attr('href').substring(1) + 'Table';
            $('#' + targetTable).DataTable().ajax.reload();
        });
    
        // Handle current display selection
        $('#current_display').on('change', function() {
            var selectedCollection = $(this).val();
            var collectionName = selectedCollection ? selectedCollection.charAt(0).toUpperCase() + selectedCollection.slice(1) + ' Collection' : 'None';
    
            swal({
                title: "Are you sure?",
                text: "Do you want to set " + collectionName + " as the current display on the main site?",
                icon: "warning",
                buttons: true,
                dangerMode: true,
            }).then((willChange) => {
                if (willChange) {
                    $.ajax({
                        url: '../controller/add_product/product_controller.php',
                        type: 'POST',
                        data: {
                            action: 'set_current_display',
                            collection: selectedCollection
                        },
                        success: function(response) {
                            if (response === 'success') {
                                swal("Current display set to " + collectionName + "!", {
                                    icon: "success",
                                });
                            } else {
                                swal("Failed to set current display.", {
                                    icon: "error",
                                });
                            }
                        },
                        error: function() {
                            swal("Error setting current display.", {
                                icon: "error",
                            });
                        }
                    });
                } else {
                    // Revert the dropdown to its previous value
                    $(this).val($(this).data('previous') || '');
                }
            });
    
            // Store the current value as the previous value
            $(this).data('previous', selectedCollection);
        });
    
        // Add status toggle, delete, and remove handlers for all tables
        ['featuredTable', 'summerTable', 'winterTable', 'monsoonTable'].forEach(function(tableId) {
            $('#' + tableId).on('click', '.status-toggle', function() {
                var productId = $(this).data('id');
                var currentStatus = $(this).data('status');
                var newStatus = currentStatus === 'Active' ? 'Deactive' : 'Active';
                swal({
                    title: "Are you sure?",
                    text: "Do you want to change the status to " + newStatus + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willChange) => {
                    if (willChange) {
                        var $icon = $(this).find('i');
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'update_product_status',
                                product_id: productId,
                                new_status: newStatus
                            },
                            success: function(response) {
                                if (response >= 1) {
                                    var newIconHtml = newStatus === 'Active' ?
                                        '<i class="ri-thumb-up-line ri-20px text-primary me-1"></i>' :
                                        '<i class="ri-thumb-down-line ri-20px text-danger me-1"></i>';
                                    $icon.replaceWith(newIconHtml);
                                    $('.status-toggle[data-id="' + productId + '"]').data('status', newStatus);
                                    swal("Status updated!", {
                                        icon: "success",
                                    });
                                    // Reload all collection tables to reflect status change
                                    ['featuredTable', 'summerTable', 'winterTable', 'monsoonTable'].forEach(function(tbl) {
                                        $('#' + tbl).DataTable().ajax.reload(null, false);
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
    
            $('#' + tableId).on('click', '.remove-from-collection', function() {
                var productId = $(this).data('id');
                var collection = $(this).data('collection');
                var collectionName = collection.charAt(0).toUpperCase() + collection.slice(1);
                if (collection === 'featured') {
                    collectionName = 'Featured Products';
                }
    
                swal({
                    title: "Are you sure?",
                    text: "Do you want to remove this product from " + collectionName + "?",
                    icon: "warning",
                    buttons: true,
                    dangerMode: true,
                }).then((willRemove) => {
                    if (willRemove) {
                        $.ajax({
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'remove_from_collection',
                                product_id: productId,
                                collection: collection
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    swal("Product removed from " + collectionName + "!", {
                                        icon: "success",
                                    });
                                    // Reload all collection tables to reflect changes
                                    ['featuredTable', 'summerTable', 'winterTable', 'monsoonTable'].forEach(function(tbl) {
                                        $('#' + tbl).DataTable().ajax.reload(null, false);
                                    });
                                } else {
                                    swal("Failed to remove product from " + collectionName + ".", {
                                        icon: "error",
                                    });
                                }
                            },
                            error: function() {
                                swal("Error removing product from " + collectionName + ".", {
                                    icon: "error",
                                });
                            }
                        });
                    }
                });
            });
    
            $('#' + tableId + ' tbody').on('click', '.delete-product', function() {
                var productId = $(this).data('id');
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
                            url: '../controller/add_product/product_controller.php',
                            type: 'POST',
                            data: {
                                action: 'delete_product',
                                deleteId: productId
                            },
                            success: function(response) {
                                if (response == "success") {
                                    swal({
                                        title: 'Deleted!',
                                        text: 'Your product has been deleted.',
                                        icon: 'success',
                                        button: 'OK'
                                    }).then(function() {
                                        // Reload all tables to reflect deletion
                                        $('#productTable').DataTable().ajax.reload();
                                        ['featuredTable', 'summerTable', 'winterTable', 'monsoonTable'].forEach(function(tbl) {
                                            $('#' + tbl).DataTable().ajax.reload(null, false);
                                        });
                                    });
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Failed to delete product: ' + response,
                                        icon: 'error',
                                        button: 'OK'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the product: ' + error,
                                    icon: 'error',
                                    button: 'OK'
                                });
                            }
                        });
                    }
                });
            });
        });
    });
    </script>

</body>

</html>