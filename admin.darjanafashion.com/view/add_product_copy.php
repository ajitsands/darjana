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

    <title>Darjana Admin Panel</title>

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

                    <div class="container-xxl flex-grow-1 container-p-y">

                        <?PHP include("pages/add_product_body_copy.php"); ?>


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
        
        let cropper;
        let currentImageInput;
        let currentImageContainer;
        let uploadInProgress = false;
        
        
        function resizeImage(file, maxWidth = 1200, maxHeight = 1200, callback) {
            const reader = new FileReader();
            reader.onload = function(e) {
                const img = new Image();
                img.onload = function() {
                    const canvas = document.createElement('canvas');
                    const ctx = canvas.getContext('2d');
                    
                    // Calculate new dimensions
                    let width = img.width;
                    let height = img.height;
                    
                    if (width > maxWidth || height > maxHeight) {
                        const ratio = Math.min(maxWidth / width, maxHeight / height);
                        width = Math.round(width * ratio);
                        height = Math.round(height * ratio);
                    }
                    
                    canvas.width = width;
                    canvas.height = height;
                    
                    // Draw resized image
                    ctx.drawImage(img, 0, 0, width, height);
                    
                    // Convert to blob
                    canvas.toBlob(function(blob) {
                        callback(blob);
                    }, 'image/jpeg', 0.85);
                };
                img.src = e.target.result;
            };
            reader.readAsDataURL(file);
        }
        
        function uploadWithProgress(formData, successCallback) {
            if (uploadInProgress) {
                swal('Upload in progress', 'Please wait for current upload to complete', 'warning');
                return;
            }
            
            uploadInProgress = true;
            $('#uploadProgress').css('width', '0%').text('0%').parent().show();
            $('#uploadStatus').html('Uploading...').removeClass('text-danger').addClass('text-primary');
            
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                xhr: function() {
                    const xhr = new XMLHttpRequest();
                    xhr.upload.addEventListener('progress', function(e) {
                        if (e.lengthComputable) {
                            const percent = Math.round((e.loaded / e.total) * 100);
                            $('#uploadProgress').css('width', percent + '%').text(percent + '%');
                        }
                    }, false);
                    return xhr;
                },
                success: function(response) {
                    uploadInProgress = false;
                    $('#uploadProgress').css('width', '100%').text('100%');
                    $('#uploadStatus').html('Upload completed!').removeClass('text-primary').addClass('text-success');
                    
                    if (response.includes('Success')) {
                        if (typeof successCallback === 'function') {
                            successCallback(response);
                        }
                    } else {
                        $('#uploadStatus').html('<span class="text-danger">Upload failed: ' + response + '</span>');
                    }
                    
                    // Hide progress bar after 2 seconds
                    setTimeout(function() {
                        $('#uploadProgress').parent().hide();
                    }, 2000);
                },
                error: function(xhr, status, error) {
                    uploadInProgress = false;
                    $('#uploadStatus').html('<span class="text-danger">Upload error: ' + error + '</span>');
                    console.error('Upload error:', error);
                }
            });
        }
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
        $('#category_name').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId === 'add_new_category') {
                $('#addCategoryModal').modal('show');
            } else {
                fetchSubCategories(categoryId);
            }
        });
        
        function loadVendorTaxAndCodFee() {
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
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
                        'url': '../controller/add_product/product_controller_copy.php',
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
                        url: '../controller/add_product/product_controller_copy.php',
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
                        url: '../controller/add_product/product_controller_copy.php',
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
                        'url': '../controller/add_product/product_controller_copy.php',
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
                    'url': '../controller/add_product/product_controller_copy.php',
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
        
        $('#add_new_specification').on('click', function() {
            var newSpecField = '<div class="input-group input-group-merge mt-2">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Specification" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#specification_fields_container').append(newSpecField);
        });
        
        $('#add_edit_specification').on('click', function() {
            var newSpecField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_specification[]" placeholder="Enter Product Specification" />' +
                '<input type="hidden" name="product_specification_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_specification_fields_container').append(newSpecField);
        });
        
         $('#add_edit_length').on('click', function() {
            var newLengthField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="text" class="form-control" name="product_length[]" placeholder="Enter Product Length" />' +
                '<input type="hidden" name="product_length_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_length_fields_container').append(newLengthField);
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
            var newImage = $('#new_category_image')[0].files[0];
            if (newImage) {
                formData.append('category_image', newImage);
            }
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
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
                url: '../controller/add_product/product_controller_copy.php',
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
                url: '../controller/add_product/product_controller_copy.php',
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
                url: '../controller/add_product/product_controller_copy.php',
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
            var newColorField = '<div class="input-group input-group-merge mt-2">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Color" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_color').parent().append(newColorField);
        });

        $('#add_new_size').on('click', function() {
            var newSizeField = '<div class="input-group input-group-merge mt-2">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Size" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_size').parent().append(newSizeField);
        });
        
        $('#add_new_lentgh').on('click', function() {
            var newSizeField = '<div class="input-group input-group-merge mt-2">' +
                '<input type="text" class="form-control form-control-sm" placeholder="Enter Product Length" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_length').parent().append(newSizeField);
        });
        

        $('#add_new_image').on('click', function() {
            var newImageField = '<div class="input-group input-group-merge mt-2">' +
                '<input type="file" class="form-control form-control-sm" />' +
                '<button type="button" class="btn btn-danger remove-field"><i class="bi bi-x-lg"></i> </button>' +
                '</div>';
            $('#product_images').parent().append(newImageField);
        });

        $(document).on('change', 'input[type="file"]:not(.cropper-ignore)', function(e) {
            if (this.files && this.files.length > 0) {
                currentImageInput = this;
                currentImageContainer = $(this).closest('.input-group-merge').find('img').length ? 
                    $(this).closest('.input-group-merge').find('img') : null;
                
                const file = this.files[0];
                const reader = new FileReader();
                
                reader.onload = function(event) {
                    $('#imageToCrop').attr('src', event.target.result);
                    $('#imageCropModal').modal('show');
                };
                
                reader.readAsDataURL(file);
            }
        });
        
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
                    }, 'image/jpeg', 0.9); // 0.9 is the quality (90%)
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
            
            // Validation
            let isValid = true;
            var userId = $('#user_id').val().trim();
            var vendorId = $('#vendor_id').val().trim();
            var categoryId = $('#category_name').val().trim();
            var categoryName = $('#category_name option:selected').text();
            var subCategoryId = $('#sub_category_name').val().trim();
            var subCategoryName = $('#sub_category_name option:selected').text();
            var productName = $('#product_name').val().trim();
            var productBrandName = $('#product_brand_name').val().trim();
            var amountMRP = $('#amount_mrp').val().trim();
            var amountSelling = $('#amount_selling').val().trim();
            var amountOffer = $('#amount_offer').val().trim();
            var productDescription = $('#product_description').val().trim();
            var warrantyDetails = $('#warranty_details').val().trim();
            var producttags = $('#product_tags').val().trim();
        
            if (categoryName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Category Name.', 'click');
            }
            if (subCategoryName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Sub Category Name.', 'click');
            }
            if (productName === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Name.', 'click');
            }
            if (amountMRP === '' || isNaN(amountMRP)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid MRP.', 'click');
            }
            if (amountSelling === '' || isNaN(amountSelling)) {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Selling Price.', 'click');
            }
            if (productDescription === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Description.', 'click');
            }
            if (producttags === '') {
                isValid = false;
                setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the Product Tags.', 'click');
            }
            if (!isValid) {
                laddaButton.stop();
                return;
            }
        
            // Create FormData
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
            
            if ($('#featured_product').length) {
                formData.append('featured_product', $('#featured_product').is(':checked') ? 'yes' : 'no');
            }
            if ($('input[name="collection_type"]:checked').length) {
                formData.append('collection_type', $('input[name="collection_type"]:checked').val() || '');
            }
            
            // Add colors
            $('input[placeholder="Enter Product Color"]').each(function() {
                formData.append('product_color[]', $(this).val().trim());
            });
            
            // Add sizes
            $('input[placeholder="Enter Product Size"]').each(function() {
                formData.append('product_size[]', $(this).val().trim());
            });
            
            // Add lengths
            $('input[placeholder="Enter Product Length"]').each(function() {
                formData.append('product_length[]', $(this).val().trim());
            });
            
            // Add specifications
            $('input[placeholder="Enter Product Specification"]').each(function() {
                formData.append('product_specification[]', $(this).val().trim());
            });
        
            // Add ALL image files (FIX FOR MULTIPLE UPLOADS)
            const imageFiles = $('#product_images')[0].files;
            for (let i = 0; i < imageFiles.length; i++) {
                formData.append('product_images[]', imageFiles[i]);
            }
        
            // Upload with AJAX
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    console.log('Response:', response);
                    if (response.includes('Success')) {
                        setupDropdown('dropdownContent', 'success', 
                            'Product details added successfully!', 'click');
                        
                        // Refresh product table
                        var table = $('#productTable').DataTable();
                        table.ajax.reload(null, false);
                        
                        // Reset form
                        $('input[type=text], input[type=number], textarea').val('');
                        $('input[type="file"]').val('');
                        $('#color_fields_container').html('');
                        $('#size_fields_container').html('');
                        $('#specification_fields_container').html('');
                        $('#imagePreviewContainer').empty();
                    } else {
                        setupDropdown('dropdownContent', 'error', 
                            'Error: ' + response, 'click');
                    }
                    laddaButton.stop();
                },
                error: function(xhr, status, error) {
                    setupDropdown('dropdownContent', 'error', 
                        'Upload error: ' + error, 'click');
                    laddaButton.stop();
                }
            });
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
            $('#edit_category_name').on('change', function() {
                var categoryId = $(this).val();
                if (categoryId) {
                    fetchSubCategoriesForEdit(categoryId);
                } else {
                    $('#edit_sub_category_name').html('<option value="">Select Sub Category</option>').trigger('change');
                }
            });
        }
        
        function fetchSubCategoriesForEdit(categoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
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
            $('#edit_category_name').val(null).trigger('change');
            $('#edit_sub_category_name').html('<option value="">Select Sub Category</option>').trigger('change');
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
                type: 'POST',
                data: {
                    action: 'get_product_details',
                    product_id: productId
                },
                success: function(response) {
                    var x = JSON.parse(response);
                    if (x.success) {
                        var productDetails = x.data.product_details;
                        fetchCategoriesForEdit(productDetails.category_id, productDetails.sub_category_id);
                        var productColors = x.data.product_colors;
                        var productSizes = x.data.product_sizes;
                        var productlengths = x.data.product_lengths;
                        var productImages = x.data.product_images;
                        var productSpecifications = x.data.product_specifications || [];
                        $('#edit_tax_percentage').val(productDetails.tax_percentage || '');
                        $('#edit_cod_fee').val(productDetails.cod_fee || '');
                        $('#edit_product_id').val(productDetails.ids);
                        $('#edit_product_name').val(productDetails.product_name);
                        $('#edit_category_name').val(productDetails.category_name);
                        $('#edit_sub_category_name').val(productDetails.sub_category_name);
                        $('#edit_product_brand_name').val(productDetails.product_brand_name);
                        $('#edit_amount_mrp').val(productDetails.amount_mrp);
                        $('#edit_amount_selling').val(productDetails.amount_selling);
                        $('#edit_amount_offer').val(productDetails.amount_offer);
                        $('#edit_product_description').val(productDetails.product_description);
                        $('#edit_warranty_details').val(productDetails.warranty_details);
                        $('#edit_featured_product').prop('checked', productDetails.featured === 'yes');
                        $('input[name="collection_type"][value="' + (productDetails.collection_type || '') + '"]').prop('checked', true);
                        $('#edit_color_fields_container').html('');
                        $('#edit_size_fields_container').html('');
                        $('#edit_length_fields_container').html('');
                        $('#edit_image_fields_container').html('');
                        $('#edit_specification_fields_container').html('');
                        for (var i = 0; i < productColors.length; i++) {
                            var newColorField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productColors[i].id + '">' +
                                '<input type="text" class="form-control" name="product_color[]" value="' +
                                productColors[i].color + '" />' +
                                '<input type="hidden" name="product_color_id[]" value="' +
                                productColors[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_color_fields_container').append(newColorField);
                        }
                        for (var i = 0; i < productSizes.length; i++) {
                            var newSizeField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productSizes[i].id + '">' +
                                '<input type="text" class="form-control" name="product_size[]" value="' +
                                productSizes[i].size + '" />' +
                                '<input type="hidden" name="product_size_id[]" value="' +
                                productSizes[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_size_fields_container').append(newSizeField);
                        }
                          for (var i = 0; i < productlengths.length; i++) {
                            var newLengthField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productlengths[i].id + '">' +
                                '<input type="text" class="form-control" name="product_length[]" value="' +
                                productlengths[i].length + '" />' +
                                '<input type="hidden" name="product_length_id[]" value="' +
                                productlengths[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_length_fields_container').append(newLengthField);
                        }
                        for (var i = 0; i < productImages.length; i++) {
                            var newImageField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productImages[i].id + '">' +
                                '<input type="file" class="form-control" name="product_images[]" />' +
                                '<input type="hidden" name="product_image_id[]" value="' +
                                productImages[i].id + '" />' +
                                '<img src="../../assets/img/products/' +
                                productImages[i].image +
                                '" alt="Product Image" style="width: 50px; height: 50px; margin-left: 10px;" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_image_fields_container').append(newImageField);
                        }

                        for (var i = 0; i < productSpecifications.length; i++) {
                            var newSpecField = '<div class="input-group input-group-merge mt-2" data-id="' +
                                productSpecifications[i].id + '">' +
                                '<input type="text" class="form-control" name="product_specification[]" value="' +
                                productSpecifications[i].specification + '" />' +
                                '<input type="hidden" name="product_specification_id[]" value="' +
                                productSpecifications[i].id + '" />' +
                                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                                '</div>';
                            $('#edit_specification_fields_container').append(newSpecField);
                        }

                        $('#editProductModal').modal('show');
                    } else {
                        alert('Failed to fetch product details.');
                    }
                },
                error: function(xhr, status, error) {
                    alert('An error occurred while fetching product details: ' + error);
                }
            });
        });
        
        $('#editProductModal').on('shown.bs.modal', function() {
            initializeEditCategoryDropdowns();
        });
        
        function fetchCategoriesForEdit(selectedCategoryId, selectedSubCategoryId) {
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
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
                url: '../controller/add_product/product_controller_copy.php',
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

        $('#add_edit_image').on('click', function() {
            var newImageField = '<div class="input-group input-group-merge mt-2" data-id="">' +
                '<input type="file" class="form-control" name="product_images[]" />' +
                '<input type="hidden" name="product_image_id[]" value="" />' +
                '<button type="button" class="btn btn-danger remove-field">Remove</button>' +
                '</div>';
            $('#edit_image_fields_container').append(newImageField);
        });

        $(document).on('click', '.remove-field', function() {
            var $this = $(this);
            var itemId = $this.closest('.input-group').data('id');
            var itemType = $this.closest('.input-group').find('input').attr('name');
            if (itemId) {
                swal({
                    title: 'Are you sure?',
                    text: 'This action cannot be undone!',
                    icon: 'warning',
                    buttons: true,
                    dangerMode: true,
                }).then((willDelete) => {
                    if (willDelete) {
                        $.ajax({
                            url: '../controller/add_product/product_controller_copy.php',
                            type: 'POST',
                            data: {
                                action: 'delete_item',
                                item_id: itemId,
                                item_type: itemType
                            },
                            success: function(response) {
                                if (response === 'success') {
                                    $this.closest('.input-group').remove();
                                    swal({
                                        title: 'Deleted!',
                                        text: 'The item has been deleted.',
                                        icon: 'success',
                                        button: 'OK'
                                    });
                                } else {
                                    swal({
                                        title: 'Error!',
                                        text: 'Failed to delete the item.',
                                        icon: 'error',
                                        button: 'OK'
                                    });
                                }
                            },
                            error: function(xhr, status, error) {
                                swal({
                                    title: 'Error!',
                                    text: 'An error occurred while deleting the item: ' + error,
                                    icon: 'error',
                                    button: 'OK'
                                });
                            }
                        });
                    }
                });
            } else {
                $this.closest('.input-group').remove();
            }
        });

        $('#btn_update_product').on('click', function(e) {
            e.preventDefault();
            var laddaButton = Ladda.create(this);
            var selectedCategory = $('#edit_category_name option:selected');
            var selectedSubCategory = $('#edit_sub_category_name option:selected');
            laddaButton.start();
            let formData = new FormData();
            formData.append('product_id', $('#edit_product_id').val().trim());
            formData.append('product_name', $('#edit_product_name').val().trim());
            formData.append('category_id', selectedCategory.val());
            formData.append('category_name', selectedCategory.text());
            formData.append('sub_category_id', selectedSubCategory.val());
            formData.append('sub_category_name', selectedSubCategory.text());
            formData.append('product_brand_name', $('#edit_product_brand_name').val().trim());
            formData.append('amount_mrp', $('#edit_amount_mrp').val().trim());
            formData.append('amount_selling', $('#edit_amount_selling').val().trim());
            formData.append('amount_offer', $('#edit_amount_offer').val().trim());
            formData.append('product_description', $('#edit_product_description').val().trim());
            formData.append('warranty_details', $('#edit_warranty_details').val().trim());
            formData.append('featured_product', $('#edit_featured_product').is(':checked') ? 'yes' : 'no');
            formData.append('collection_type', $('input[name="collection_type"]:checked').val() || '');
            formData.append('tax_percentage', $('#edit_tax_percentage').val().trim());
            formData.append('cod_fee', $('#edit_cod_fee').val().trim());
            formData.append('action', 'update_product_details');
            $('input[name="product_color[]"]').each(function(index) {
                formData.append('product_color[]', $(this).val().trim());
                formData.append('product_color_id[]', $('input[name="product_color_id[]"]').eq(index).val() || '');
            });
            $('input[name="product_size[]"]').each(function(index) {
                formData.append('product_size[]', $(this).val().trim());
                formData.append('product_size_id[]', $('input[name="product_size_id[]"]').eq(index).val() || '');
            });
            $('input[name="product_images[]"]').each(function(index) {
                if (this.files.length > 0) {
                    formData.append('product_images[]', this.files[0]);
                    formData.append('product_image_id[]', $('input[name="product_image_id[]"]').eq(index).val() || '');
                }
            });

            $('input[name="product_specification[]"]').each(function(index) {
                formData.append('product_specification[]', $(this).val().trim());
                formData.append('product_specification_id[]', $('input[name="product_specification_id[]"]').eq(index).val() || '');
            });

            $('input[name="product_length[]"]').each(function(index) {
                formData.append('product_length[]', $(this).val().trim());
                formData.append('product_length_id[]', $('input[name="product_length_id[]"]').eq(index).val() || '');
            });

            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    var responseData = typeof response === 'string' ? JSON.parse(response) : response;
                    console.log(responseData);
                    if (responseData.status === 'success') {
                        swal({
                            title: 'Success!',
                            text: 'Product updated successfully.',
                            icon: 'success',
                            button: 'OK'
                        }).then(function() {
                            $('#editProductModal').modal('hide');
                            $('#productTable').DataTable().ajax.reload(null, false);
                        });
                    } else {
                        swal({
                            title: 'Error!',
                            text: 'Failed to update product: ' + response,
                            icon: 'error',
                            button: 'OK'
                        });
                    }
                    laddaButton.stop();
                },
                error: function(xhr, status, error) {
                    swal({
                        title: 'Error!',
                        text: 'An error occurred while updating the product: ' + error,
                        icon: 'error',
                        button: 'OK'
                    });
                    laddaButton.stop();
                }
            });
        });

        function fetchCategories() {
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
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
                url: '../controller/add_product/product_controller_copy.php',
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
            var categoryImage = $('#new_category_image')[0].files[0];
            var formData = new FormData();
            formData.append('action', 'add_new_category');
            formData.append('category_name', categoryName);
            formData.append('category_image', categoryImage);
            $.ajax({
                url: '../controller/add_product/product_controller_copy.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                    if (response === 'success') {
                        $('#addCategoryModal').modal('hide');
                        $('#new_category_name').val('');
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
                url: '../controller/add_product/product_controller_copy.php',
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
                        'url': '../controller/add_product/product_controller_copy.php',
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
                                    '" data-collection="' + collection + '"><i class="ri-close-circle-line me-1" style="color:orange;"></i></a>' +
                                    '<a class="waves-effect delete-product" data-id="' + data +
                                    '"><i class="ri-delete-bin-2-fill" style="color:red;"></i></a>';
                            }
                        },
                    ],
                    "responsive": false,
                    "initComplete": function() {
                        $('#' + tableId + '_filter').appendTo('#' + tableId + '_wrapper');
                    }
                });
    
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
                        url: '../controller/add_product/product_controller_copy.php',
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
                            url: '../controller/add_product/product_controller_copy.php',
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
                            url: '../controller/add_product/product_controller_copy.php',
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
                            url: '../controller/add_product/product_controller_copy.php',
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
        $('#product_images').on('change', function() {
            const files = this.files;
            const previewContainer = $('#imagePreviewContainer');
            
            previewContainer.empty();
            
            Array.from(files).forEach(file => {
                if (file.type.startsWith('image/')) {
                    const reader = new FileReader();
                    reader.onload = function(e) {
                        const previewHtml = `
                            <div class="image-preview">
                                <img src="${e.target.result}" alt="Preview">
                                <button type="button" class="remove-btn" title="Remove">×</button>
                            </div>
                        `;
                        previewContainer.append(previewHtml);
                    };
                    reader.readAsDataURL(file);
                }
            });
        });
    
        // Remove image preview
        $(document).on('click', '.image-preview .remove-btn', function() {
            $(this).closest('.image-preview').remove();
        });
    });
    </script>

</body>

</html>