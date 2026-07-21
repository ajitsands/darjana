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
    <title>Size Chart Management - Darjana Admin</title>
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
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>

    <style>
    .nav-tabs {
        border-bottom: 2px solid #dee2e6;
    }
    .nav-tabs .nav-link {
        border: none;
        color: #495057;
        font-weight: 500;
        padding: 0.75rem 1.5rem;
    }
    .nav-tabs .nav-link.active {
        color: #0d6efd;
        border-bottom: 3px solid #0d6efd;
        background: transparent;
    }
    .measurement-table th {
        background-color: #f8f9fa;
        font-weight: 600;
    }
    .height-length-table {
        max-height: 400px;
        overflow-y: auto;
    }
    .height-length-table thead th {
        position: sticky;
        top: 0;
        background-color: #f8f9fa;
        z-index: 1;
    }
    .action-buttons .btn {
        padding: 0.25rem 0.5rem;
        margin: 0 2px;
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
                        <?PHP include("pages/size_chart_body.php"); ?>
                    </div>
                    <?PHP include("templates/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
    $(document).ready(function() {
        // Load size chart data
        loadSizeChartData();
        
        // Tab switching
        $('.nav-tabs .nav-link').on('click', function(e) {
            e.preventDefault();
            $('.nav-tabs .nav-link').removeClass('active');
            $(this).addClass('active');
            
            $('.tab-pane').removeClass('show active');
            $($(this).attr('href')).addClass('show active');
        });
        
        // Save descriptions
        $('#saveDescriptions').click(function() {
            saveDescriptions();
        });
        
        // Add measurement row
        $('#addMeasurementRow').click(function() {
            addMeasurementRow();
        });
        
        // Save all measurements
        $('#saveMeasurements').click(function() {
            saveMeasurements();
        });
        
        // Add height-length row
        $('#addHeightLengthRow').click(function() {
            addHeightLengthRow();
        });
        
        // Save all height-length mappings
        $('#saveHeightLength').click(function() {
            saveHeightLengthMappings();
        });
        
        // Load measurement data
        $('#loadMeasurements').click(function() {
            loadMeasurements();
        });
        
        // Load height-length data
        $('#loadHeightLength').click(function() {
            loadHeightLengthMappings();
        });
    });
    
    function loadSizeChartData() {
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: {
                action: 'get_size_chart_data'
            },
            dataType: 'json',
            beforeSend: function() {
                $('#descriptionsSection').html('<div class="text-center py-4"><i class="ri-loader-4-line ri-spin fs-3"></i> Loading...</div>');
            },
            success: function(response) {
                if (response.success) {
                    // Populate descriptions
                    $('#chartName').val(response.data.chart_name);
                    $('#descriptionEn').val(response.data.description_en);
                    $('#descriptionAr').val(response.data.description_ar);
                    
                    // Populate measurements table
                    let measurementHtml = '';
                    response.data.measurements.forEach(function(item, index) {
                        measurementHtml += `
                            <tr data-id="${item.ids}">
                                <td><input type="text" class="form-control form-control-sm size-label" value="${item.size_label}"></td>
                                <td><input type="number" class="form-control form-control-sm chest-inch" value="${item.chest_inch}" step="0.1"></td>
                                <td><input type="number" class="form-control form-control-sm shoulder-inch" value="${item.shoulder_inch}" step="0.1"></td>
                                <td><input type="number" class="form-control form-control-sm sort-order" value="${item.sort_order}"></td>
                                <td>
                                    <select class="form-select form-select-sm status-select">
                                        <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                                        <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-measurement" onclick="deleteMeasurement(${item.ids})"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#measurementsTableBody').html(measurementHtml);
                    
                    // Populate height-length table
                    let heightHtml = '';
                    response.data.height_length.forEach(function(item, index) {
                        heightHtml += `
                            <tr data-id="${item.ids}">
                                <td><input type="number" class="form-control form-control-sm height-cm" value="${item.height_cm}"></td>
                                <td><input type="number" class="form-control form-control-sm length-inch" value="${item.abaya_length_inch}" step="0.1"></td>
                                <td>
                                    <select class="form-select form-select-sm status-select">
                                        <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                                        <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-height-length" onclick="deleteHeightLength(${item.ids})"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#heightLengthTableBody').html(heightHtml);
                    
                } else {
                    Swal.fire('Error', 'Failed to load size chart data', 'error');
                }
            },
            error: function() {
                Swal.fire('Error', 'Failed to load size chart data', 'error');
            }
        });
    }
    
    function saveDescriptions() {
        let data = {
            action: 'save_descriptions',
            chart_name: $('#chartName').val(),
            description_en: $('#descriptionEn').val(),
            description_ar: $('#descriptionAr').val()
        };
        
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: data,
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Saving...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },
            success: function(response) {
                Swal.close();
                if (response.success) {
                    Swal.fire('Success', 'Descriptions saved successfully', 'success');
                } else {
                    Swal.fire('Error', response.message || 'Failed to save descriptions', 'error');
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('Error', 'Failed to save descriptions', 'error');
            }
        });
    }
    
    function addMeasurementRow() {
        let newRow = `
            <tr data-id="new">
                <td><input type="text" class="form-control form-control-sm size-label" value="New"></td>
                <td><input type="number" class="form-control form-control-sm chest-inch" value="0" step="0.1"></td>
                <td><input type="number" class="form-control form-control-sm shoulder-inch" value="0" step="0.1"></td>
                <td><input type="number" class="form-control form-control-sm sort-order" value="99"></td>
                <td>
                    <select class="form-select form-select-sm status-select">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="$(this).closest('tr').remove()"><i class="ri-delete-bin-line"></i></button>
                </td>
            </tr>
        `;
        $('#measurementsTableBody').append(newRow);
    }
    
    function saveMeasurements() {
        let measurements = [];
        $('#measurementsTableBody tr').each(function() {
            let row = $(this);
            measurements.push({
                ids: row.data('id') === 'new' ? null : row.data('id'),
                size_label: row.find('.size-label').val(),
                chest_inch: row.find('.chest-inch').val(),
                shoulder_inch: row.find('.shoulder-inch').val(),
                sort_order: row.find('.sort-order').val(),
                status: row.find('.status-select').val()
            });
        });
        
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: {
                action: 'save_measurements',
                measurements: measurements
            },
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Saving...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },
            success: function(response) {
                Swal.close();
                if (response.success) {
                    Swal.fire('Success', 'Measurements saved successfully', 'success').then(() => {
                        loadMeasurements();
                    });
                } else {
                    Swal.fire('Error', response.message || 'Failed to save measurements', 'error');
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('Error', 'Failed to save measurements', 'error');
            }
        });
    }
    
    function loadMeasurements() {
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: {
                action: 'get_measurements'
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let measurementHtml = '';
                    response.data.forEach(function(item) {
                        measurementHtml += `
                            <tr data-id="${item.ids}">
                                <td><input type="text" class="form-control form-control-sm size-label" value="${item.size_label}"></td>
                                <td><input type="number" class="form-control form-control-sm chest-inch" value="${item.chest_inch}" step="0.1"></td>
                                <td><input type="number" class="form-control form-control-sm shoulder-inch" value="${item.shoulder_inch}" step="0.1"></td>
                                <td><input type="number" class="form-control form-control-sm sort-order" value="${item.sort_order}"></td>
                                <td>
                                    <select class="form-select form-select-sm status-select">
                                        <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                                        <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-measurement" onclick="deleteMeasurement(${item.ids})"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#measurementsTableBody').html(measurementHtml);
                }
            }
        });
    }
    
    function deleteMeasurement(id) {
        Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this measurement?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../controller/size_chart/size_chart_controller.php',
                    type: 'POST',
                    data: {
                        action: 'delete_measurement',
                        ids: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Deleted!', 'Measurement deleted successfully', 'success').then(() => {
                                loadMeasurements();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to delete', 'error');
                        }
                    }
                });
            }
        });
    }
    
    function addHeightLengthRow() {
        let newRow = `
            <tr data-id="new">
                <td><input type="number" class="form-control form-control-sm height-cm" value="0"></td>
                <td><input type="number" class="form-control form-control-sm length-inch" value="0" step="0.1"></td>
                <td>
                    <select class="form-select form-select-sm status-select">
                        <option value="Active" selected>Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </td>
                <td>
                    <button class="btn btn-sm btn-danger" onclick="$(this).closest('tr').remove()"><i class="ri-delete-bin-line"></i></button>
                </td>
            </tr>
        `;
        $('#heightLengthTableBody').append(newRow);
    }
    
    function saveHeightLengthMappings() {
        let mappings = [];
        $('#heightLengthTableBody tr').each(function() {
            let row = $(this);
            mappings.push({
                ids: row.data('id') === 'new' ? null : row.data('id'),
                height_cm: row.find('.height-cm').val(),
                abaya_length_inch: row.find('.length-inch').val(),
                status: row.find('.status-select').val()
            });
        });
        
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: {
                action: 'save_height_length',
                mappings: mappings
            },
            dataType: 'json',
            beforeSend: function() {
                Swal.fire({
                    title: 'Saving...',
                    allowOutsideClick: false,
                    didOpen: () => Swal.showLoading()
                });
            },
            success: function(response) {
                Swal.close();
                if (response.success) {
                    Swal.fire('Success', 'Height-Length mappings saved successfully', 'success').then(() => {
                        loadHeightLengthMappings();
                    });
                } else {
                    Swal.fire('Error', response.message || 'Failed to save mappings', 'error');
                }
            },
            error: function() {
                Swal.close();
                Swal.fire('Error', 'Failed to save mappings', 'error');
            }
        });
    }
    
    function loadHeightLengthMappings() {
        $.ajax({
            url: '../controller/size_chart/size_chart_controller.php',
            type: 'POST',
            data: {
                action: 'get_height_length'
            },
            dataType: 'json',
            success: function(response) {
                if (response.success) {
                    let heightHtml = '';
                    response.data.forEach(function(item) {
                        heightHtml += `
                            <tr data-id="${item.ids}">
                                <td><input type="number" class="form-control form-control-sm height-cm" value="${item.height_cm}"></td>
                                <td><input type="number" class="form-control form-control-sm length-inch" value="${item.abaya_length_inch}" step="0.1"></td>
                                <td>
                                    <select class="form-select form-select-sm status-select">
                                        <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                                        <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                                    </select>
                                </td>
                                <td>
                                    <button class="btn btn-sm btn-danger delete-height-length" onclick="deleteHeightLength(${item.ids})"><i class="ri-delete-bin-line"></i></button>
                                </td>
                            </tr>
                        `;
                    });
                    $('#heightLengthTableBody').html(heightHtml);
                }
            }
        });
    }
    
    function deleteHeightLength(id) {
        Swal.fire({
            title: 'Confirm Delete',
            text: 'Are you sure you want to delete this mapping?',
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#d33',
            cancelButtonColor: '#3085d6',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    url: '../controller/size_chart/size_chart_controller.php',
                    type: 'POST',
                    data: {
                        action: 'delete_height_length',
                        ids: id
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire('Deleted!', 'Mapping deleted successfully', 'success').then(() => {
                                loadHeightLengthMappings();
                            });
                        } else {
                            Swal.fire('Error', response.message || 'Failed to delete', 'error');
                        }
                    }
                });
            }
        });
    }
    </script>
</body>
</html>