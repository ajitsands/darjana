<?php
session_start();
?>
<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Size Chart Management - Darjana Admin</title>
    <meta name="description" content="" />
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />
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
    <link href="https://cdn.quilljs.com/1.3.6/quill.snow.css" rel="stylesheet">

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

    <!-- Scripts -->
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

    <!-- External Libraries -->
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="https://cdn.quilljs.com/1.3.6/quill.js"></script>
    <script>
// Make Quill editors global
var quillEn, quillAr;

$(document).ready(function() {
    // Initialize Quill editors first
    initializeQuillEditors();
    
    // Then load data
    loadSizeChartData();
    
    // Bootstrap 5 Tab shown event
    $('#sizeChartTabs button').on('shown.bs.tab', function(e) {
        const targetTab = $(e.target).attr('data-bs-target');
        if (targetTab === '#measurements') {
            loadMeasurements();
        } else if (targetTab === '#height-length') {
            loadHeightLengthMappings();
        }
    });
    
    // Button Events
    $('#saveDescriptions').click(function() {
        saveDescriptions();
    });
    
    $('#addMeasurementRow').click(function() {
        addMeasurementRow();
    });
    
    $('#saveMeasurements').click(function() {
        saveMeasurements();
    });
    
    $('#addHeightLengthRow').click(function() {
        addHeightLengthRow();
    });
    
    $('#saveHeightLength').click(function() {
        saveHeightLengthMappings();
    });
    
    $('#loadMeasurements').click(function() {
        loadMeasurements();
    });
    
    $('#loadHeightLength').click(function() {
        loadHeightLengthMappings();
    });
});

// Separate function to initialize Quill editors
function initializeQuillEditors() {
    const toolbarOptions = [
        ['bold', 'italic', 'underline', 'strike'],        // toggled buttons
        ['blockquote', 'code-block'],
        [{ 'list': 'ordered'}, { 'list': 'bullet' }],
        [{ 'script': 'sub'}, { 'script': 'super' }],      // superscript/subscript
        [{ 'indent': '-1'}, { 'indent': '+1' }],          // outdent/indent
        [{ 'direction': 'rtl' }],                          // text direction
        [{ 'size': ['small', false, 'large', 'huge'] }],  // custom dropdown
        [{ 'header': [1, 2, 3, 4, 5, 6, false] }],
        [{ 'color': [] }, { 'background': [] }],          // dropdown with defaults
        [{ 'font': [] }],
        [{ 'align': [] }],
        ['link', 'image', 'video'],                        // link, image, video
        ['clean']                                           // remove formatting
    ];

    quillEn = new Quill('#editor-en', {
        theme: 'snow',
        placeholder: 'Enter English description...',
        modules: {
            toolbar: toolbarOptions
        }
    });

    quillAr = new Quill('#editor-ar', {
        theme: 'snow',
        placeholder: 'أدخل الوصف بالعربية...',
        modules: {
            toolbar: toolbarOptions
        }
    });

    // Update hidden textareas when Quill content changes
    quillEn.on('text-change', function() {
        $('#descriptionEn').val(quillEn.root.innerHTML);
    });

    quillAr.on('text-change', function() {
        $('#descriptionAr').val(quillAr.root.innerHTML);
    });
    
    // Handle image insertion - you can customize image handling if needed
    quillEn.getModule('toolbar').addHandler('image', function() {
        selectLocalImage(quillEn);
    });
    
    quillAr.getModule('toolbar').addHandler('image', function() {
        selectLocalImage(quillAr);
    });
}

// Optional: Custom image handler for better UX
function selectLocalImage(quill) {
    const input = document.createElement('input');
    input.setAttribute('type', 'file');
    input.setAttribute('accept', 'image/*');
    input.click();

    input.onchange = () => {
        const file = input.files[0];
        if (/^image\//.test(file.type)) {
            const reader = new FileReader();
            reader.onload = () => {
                const range = quill.getSelection(true);
                quill.insertEmbed(range.index, 'image', reader.result, 'user');
            };
            reader.readAsDataURL(file);
        } else {
            console.log('You could only select images.');
        }
    };
}


// ====================== MAIN LOAD FUNCTION ======================
function loadSizeChartData() {
    $.ajax({
        url: '../controller/size_chart/size_chart_controller.php',
        type: 'POST',
        data: { action: 'get_size_chart_data' },
        dataType: 'json',
        beforeSend: function() {
            $('#measurementsTableBody, #heightLengthTableBody').html(
                '<tr><td colspan="6" class="text-center py-4"><i class="ri-loader-4-line ri-spin fs-3"></i> Loading...</td></tr>'
            );
        },
        success: function(response) {
            if (response.success) {
                const data = response.data;
                
                // Populate Descriptions Tab
                $('#chartName').val(data.chart_name || '');
                
                // Set Quill editor content with a slight delay to ensure editors are ready
                setTimeout(function() {
                    if (quillEn && data.description_en) {
                        quillEn.root.innerHTML = data.description_en;
                        $('#descriptionEn').val(data.description_en);
                    }
                    
                    if (quillAr && data.description_ar) {
                        quillAr.root.innerHTML = data.description_ar;
                        $('#descriptionAr').val(data.description_ar);
                    }
                }, 100);
                
                // Populate both tables
                renderMeasurementsTable(data.measurements);
                renderHeightLengthTable(data.height_length);
            } else {
                Swal.fire('Error', response.message || 'Failed to load size chart data', 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'Failed to connect to server', 'error');
        }
    });
}

// Alternative approach if setTimeout doesn't work - use a promise-based approach
function loadSizeChartDataAlternative() {
    // First ensure editors are initialized
    if (!quillEn || !quillAr) {
        setTimeout(loadSizeChartDataAlternative, 100);
        return;
    }
    
    $.ajax({
        url: '../controller/size_chart/size_chart_controller.php',
        type: 'POST',
        data: { action: 'get_size_chart_data' },
        dataType: 'json',
        beforeSend: function() {
            $('#measurementsTableBody, #heightLengthTableBody').html(
                '<tr><td colspan="6" class="text-center py-4"><i class="ri-loader-4-line ri-spin fs-3"></i> Loading...</td></tr>'
            );
        },
        success: function(response) {
            if (response.success) {
                const data = response.data;
                
                // Populate Descriptions Tab
                $('#chartName').val(data.chart_name || '');
                
                // Set Quill editor content directly
                if (quillEn && data.description_en) {
                    quillEn.root.innerHTML = data.description_en;
                    $('#descriptionEn').val(data.description_en);
                }
                
                if (quillAr && data.description_ar) {
                    quillAr.root.innerHTML = data.description_ar;
                    $('#descriptionAr').val(data.description_ar);
                }
                
                // Populate both tables
                renderMeasurementsTable(data.measurements);
                renderHeightLengthTable(data.height_length);
            } else {
                Swal.fire('Error', response.message || 'Failed to load size chart data', 'error');
            }
        },
        error: function(xhr, status, error) {
            console.error('AJAX Error:', error);
            console.error('Response:', xhr.responseText);
            Swal.fire('Error', 'Failed to connect to server', 'error');
        }
    });
}

// ====================== RENDER FUNCTIONS ======================
function renderMeasurementsTable(measurements) {
    let html = '';
    if (measurements && measurements.length > 0) {
        measurements.forEach(function(item) {
            html += `
                <tr data-id="${item.ids}">
                    <td><input type="text" class="form-control form-control-sm size-label" value="${escapeHtml(item.size_label) || ''}"></td>
                    <td><input type="number" class="form-control form-control-sm chest-inch" value="${parseFloat(item.chest_inch) || 0}" step="0.1"></td>
                    <td><input type="number" class="form-control form-control-sm shoulder-inch" value="${parseFloat(item.shoulder_inch) || 0}" step="0.1"></td>
                    <td><input type="number" class="form-control form-control-sm sort-order" value="${item.sort_order || 99}"></td>
                    <td>
                        <select class="form-select form-select-sm status-select">
                            <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                            <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger delete-measurement" onclick="deleteMeasurement(${item.ids})">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    } else {
        html = '<tr><td colspan="6" class="text-center py-4 text-muted">No measurements found</td></tr>';
    }
    $('#measurementsTableBody').html(html);
}

function renderHeightLengthTable(heightLength) {
    let html = '';
    if (heightLength && heightLength.length > 0) {
        heightLength.forEach(function(item) {
            html += `
                <tr data-id="${item.ids}">
                    <td><input type="number" class="form-control form-control-sm height-cm" value="${parseFloat(item.height_cm) || 0}"></td>
                    <td><input type="number" class="form-control form-control-sm length-inch" value="${parseFloat(item.abaya_length_inch) || 0}" step="0.1"></td>
                    <td>
                        <select class="form-select form-select-sm status-select">
                            <option value="Active" ${item.status === 'Active' ? 'selected' : ''}>Active</option>
                            <option value="Inactive" ${item.status === 'Inactive' ? 'selected' : ''}>Inactive</option>
                        </select>
                    </td>
                    <td>
                        <button class="btn btn-sm btn-danger delete-height-length" onclick="deleteHeightLength(${item.ids})">
                            <i class="ri-delete-bin-line"></i>
                        </button>
                    </td>
                </tr>
            `;
        });
    } else {
        html = '<tr><td colspan="4" class="text-center py-4 text-muted">No height-length mappings found</td></tr>';
    }
    $('#heightLengthTableBody').html(html);
}

// Helper function to escape HTML
function escapeHtml(unsafe) {
    if (!unsafe) return '';
    return unsafe
        .replace(/&/g, "&amp;")
        .replace(/</g, "&lt;")
        .replace(/>/g, "&gt;")
        .replace(/"/g, "&quot;")
        .replace(/'/g, "&#039;");
}

// ====================== YOUR EXISTING FUNCTIONS ======================
function saveDescriptions() {
    // Ensure hidden textareas have the latest Quill content
    if (quillEn) {
        $('#descriptionEn').val(quillEn.root.innerHTML);
    }
    if (quillAr) {
        $('#descriptionAr').val(quillAr.root.innerHTML);
    }
    
    let data = {
        action: 'save_descriptions',
        chart_name: $('#chartName').val(),
        description_en: $('#descriptionEn').val(),
        description_ar: $('#descriptionAr').val()
    };
    
    console.log('Saving descriptions:', data); // Debug log
    
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
            console.log('Save response:', response); // Debug log
            if (response.success) {
                Swal.fire('Success', 'Descriptions saved successfully', 'success');
            } else {
                Swal.fire('Error', response.message || 'Failed to save descriptions', 'error');
            }
        },
        error: function(xhr, status, error) {
            Swal.close();
            console.error('Save error:', error);
            console.error('Response:', xhr.responseText);
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
        data: { action: 'save_measurements', measurements: measurements },
        dataType: 'json',
        beforeSend: function() {
            Swal.fire({ title: 'Saving...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
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
        data: { action: 'get_measurements' },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                renderMeasurementsTable(response.data);
            } else {
                Swal.fire('Error', 'Failed to load measurements', 'error');
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
                data: { action: 'delete_measurement', ids: id },
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
        data: { action: 'save_height_length', mappings: mappings },
        dataType: 'json',
        beforeSend: function() {
            Swal.fire({ title: 'Saving...', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
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
        data: { action: 'get_height_length' },
        dataType: 'json',
        success: function(response) {
            if (response.success) {
                renderHeightLengthTable(response.data);
            } else {
                Swal.fire('Error', 'Failed to load height-length data', 'error');
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
                data: { action: 'delete_height_length', ids: id },
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