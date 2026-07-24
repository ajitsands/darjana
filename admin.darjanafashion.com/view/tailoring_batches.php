<?php
session_start();
?>
<!doctype html>
<html
 lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-style="light">
  <head>
    <meta charset="utf-8" />
    <meta content="company" name="SaNDsLaB">
    <meta
      name="viewport"
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
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <script src="../../assets/vendor/js/helpers.js"></script>

    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <script src="../../assets/js/config.js"></script>
    <style>
        .row {
            --bs-gutter-x: 1rem;
        }
        .form-floating > label {
            transition: all 0.2s ease;
        }
        .form-floating > .form-control-sm:focus ~ label,
        .form-floating > .form-control-sm:not(:placeholder-shown) ~ label {
            transform: scale(0.85) translateY(-1.25rem) translateX(0.15rem);
        }
        .form-floating > .form-select-sm ~ label {
            transform: scale(0.85) translateY(-1.25rem) translateX(0.15rem);
        }
        .form-floating > .form-control-sm {
            height: calc(2.25rem + 2px);
            padding: 0.5rem 0.75rem;
        }
        .form-floating > .form-select-sm {
            height: calc(2.25rem + 2px);
            padding: 0.5rem 0.75rem;
        }
        .form-check {
            margin-bottom: 0;
        }
        #kyc-file-display a {
            color: #0066cc;
            text-decoration: none;
            margin-right: 10px;
        }
        #kyc-file-display a:hover {
            text-decoration: underline;
        }
        #kyc-details-link {
            color: #0066cc;
            text-decoration: underline;
            cursor: pointer;
        }
        .modal-content {
            border-radius: 0.5rem;
            border: none;
            box-shadow: 0 0.5rem 1rem rgba(0, 0, 0, 0.15);
        }
        .modal-header {
            background-color: #696cff;
            color: white;
            border-top-left-radius: 0.5rem;
            border-top-right-radius: 0.5rem;
        }
        .modal-body ul {
            padding-left: 20px;
        }
        .modal-body li {
            margin-bottom: 0.5rem;
        }
        .modal-body .note {
            font-style: italic;
            color: #444;
            border-left: 3px solid #696cff;
            padding-left: 10px;
        }
       
        .swal2-container {
            z-index: 99999 !important;
        }
        
        /* Ensure modal doesn't block alerts */
        .modal {
            z-index: 1050;
        }
        
        /* Fix for Bootstrap modal backdrop */
        .modal-backdrop {
            z-index: 1040 !important;
        }
    </style>
  </head>
  <body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
      <d
      iv class="layout-container">
        <?php include("templates/navbar.php"); ?>
        <div class="layout-page">
          <div class="content-wrapper">
            <?php include("templates/menu.php"); ?>
            <div class="container-fluid flex-grow-1 container-p-y">
              <?php include("pages/tailor_batches.php"); ?>
            </div>
            <?php include("templates/footer.php"); ?>
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
        let batchesTable;

        $(document).ready(function() {
            loadTailoringUnits();
            initBatchesTable();

            // Bind change events to filters for automatic reloading
            $('#unitFilter, #statusFilter, #startDate, #endDate').on('change', function() {
                if (batchesTable) {
                    batchesTable.ajax.reload();
                }
            });
        });

        function loadTailoringUnits() {
            $.ajax({
                url: '../controller/orders/orders_controller.php',
                type: 'POST',
                data: { action: 'get_tailoring_units' },
                dataType: 'json',
                success: function(res) {
                    if (res.success) {
                        let options = '<option value="">All Units</option>';
                        res.units.forEach(u => {
                            options += `<option value="${u.ids}">${u.unit_name}</option>`;
                        });
                        $('#unitFilter').html(options);
                    }
                }
            });
        }

        function initBatchesTable() {
            batchesTable = $('#batchesTable').DataTable({
                processing: true,
                serverSide: true,
                ajax: {
                    url: '../controller/orders/orders_controller.php',
                    type: 'POST',
                    data: function(d) {
                        return {
                            action: 'get_tailoring_batches',
                            start_date: $('#startDate').val(),
                            end_date: $('#endDate').val(),
                            unit_id: $('#unitFilter').val(),
                            status: $('#statusFilter').val(),
                            start: d.start,
                            length: d.length,
                            order_column: d.order[0] ? d.order[0].column : 0,
                            order_dir: d.order[0] ? d.order[0].dir : 'desc',
                            search: d.search ? d.search.value : '',
                            draw: d.draw
                        };
                    }
                },
                columns: [
                    { data: 'batch_code' },
                    { data: 'unit_name' },
                    { data: 'items_count' },
                    { 
                        data: 'created_at',
                        render: function(data) {
                            return new Date(data).toLocaleString();
                        }
                    },
                    {
                        data: 'status',
                        render: function(data) {
                            let badgeClass = 'bg-secondary';
                            if (data === 'Pending') badgeClass = 'badge bg-label-info';
                            else if (data === 'In Progress') badgeClass = 'badge bg-label-warning';
                            else if (data === 'Completed') badgeClass = 'badge bg-label-success';
                            else if (data === 'Cancelled') badgeClass = 'badge bg-label-danger';
                            return `<span class="badge ${badgeClass}">${data}</span>`;
                        }
                    },
                    {
                        data: null,
                        render: function(data) {
                            return `
                                <button class="btn btn-sm btn-info" onclick="viewBatch(${data.batch_id})">
                                    <i class="ri-eye-line"></i> View
                                </button>
                                <button class="btn btn-sm btn-primary" onclick="printBatch(${data.batch_id})">
                                    <i class="ri-printer-line"></i>
                                </button>
                            `;
                        }
                    }
                ]
            });
        }

        $('#applyFilter').click(function() {
            if (batchesTable) {
                batchesTable.ajax.reload();
            }
        });

        $('#resetFilter').click(function() {
            $('#startDate').val('');
            $('#endDate').val('');
            $('#unitFilter').val('');
            $('#statusFilter').val('');
            if (batchesTable) {
                batchesTable.ajax.reload();
            }
        });

        function viewBatch(batchId) {
            $.ajax({
                url: '../controller/orders/orders_controller.php',
                type: 'POST',
                data: {
                    action: 'get_batch_details',
                    batch_id: batchId
                },
                dataType: 'json',
                beforeSend: function() {
                    Swal.fire({
                        title: 'Loading...',
                        allowOutsideClick: false,
                        didOpen: () => Swal.showLoading()
                    });
                },
                success: function(res) {
                    Swal.close();
                    if (res.success) {
                        populateBatchModal(res.data);
                        $('#batchDetailsModal').modal('show');
                        
                        // Also update the batch status in the main table if it's visible
                        if (batchesTable) {
                            // Find and update the specific row if needed
                            let row = batchesTable.row(function(idx, data, node) {
                                return data.batch_id == batchId;
                            });
                            
                            if (row.length) {
                                row.data().status = res.data.status;
                                row.invalidate();
                            }
                        }
                    } else {
                        Swal.fire('Error', res.message || 'Failed to load batch details', 'error');
                    }
                },
                error: function() {
                    Swal.close();
                    Swal.fire('Error', 'Failed to load batch details', 'error');
                }
            });
        }

        function populateBatchModal(data) {
            $('#detailBatchCode').text(data.batch_code);
            $('#detailUnit').text(data.unit_name);
            $('#detailDescription').text(data.description || 'No description');
            $('#detailCreatedDate').text(new Date(data.created_at).toLocaleString());
            $('#detailStatus').html(`<span class="badge ${getStatusClass(data.status)}">${data.status}</span>`);
            $('#updateBatchStatus').val(data.status);
            $('#batchDetailsModal').data('batch-id', data.batch_id);
            
            // Remove any existing select all div first
            $('.select-all-container').remove();
            
            let itemsHtml = '';
            data.items.forEach((item, index) => {
                // IMPORTANT: Use item.item_status from the response, not item.status
                const itemStatus = item.item_status || 'Pending';
                
                itemsHtml += `
                    <tr>
                        <td>
                            <input type="checkbox" class="item-checkbox" value="${item.id}" style="width: 18px; height: 18px;">
                        </td>
                        <td>#${item.order_id}</td>
                        <td>${item.customer_name}</td>
                        <td>${item.product_name}</td>
                        <td>${item.quantity}</td>
                        <td>${item.color || 'N/A'}</td>
                        <td>${item.size || 'N/A'}</td>
                        <td>${item.length || 'N/A'}</td>
                        <td>
                            <span class="badge ${getItemStatusClass(itemStatus)}" 
                                  style="cursor: pointer;"
                                  onclick="updateItemStatus(${data.batch_id}, ${item.id}, '${itemStatus}')">
                                ${itemStatus}
                            </span>
                        </td>
                        <td>
                            <button class="btn btn-sm btn-info" onclick="toggleNotes(${index})">
                                <i class="ri-arrow-down-s-line" id="icon-${index}"></i>
                            </button>
                        </td>
                    </tr>
                    <tr class="notes-row-${index}" style="display: none;">
                        <td colspan="10" style="background-color: #f8f9fa;">
                            <div class="p-3">
                                <strong>Notes:</strong> ${item.notes || 'No notes available'}
                            </div>
                        </td>
                    </tr>
                `;
            });
            
            $('#batchItemsList').html(itemsHtml);
            
            // Add select all functionality
            let selectAllHtml = `
                <div class="select-all-container mb-3">
                    <div class="d-flex align-items-center gap-3">
                        <div>
                            <input type="checkbox" id="selectAllItems" style="width: 18px; height: 18px;">
                            <label for="selectAllItems" class="ms-2">Select All</label>
                        </div>
                        <button class="btn btn-primary btn-sm" onclick="updateMultipleItemsStatus()">
                            <i class="ri-edit-line"></i> Update Selected
                        </button>
                    </div>
                </div>
            `;
            
            $('.item-details-table').before(selectAllHtml);
            
            // Handle select all
            $('#selectAllItems').off('change').on('change', function() {
                $('.item-checkbox').prop('checked', $(this).prop('checked'));
            });
        }
        
        // Function to toggle notes visibility
        function toggleNotes(index) {
            $(`.notes-row-${index}`).toggle();
            
            // Update icon
            let icon = $(`#icon-${index}`);
            if (icon.hasClass('ri-arrow-down-s-line')) {
                icon.removeClass('ri-arrow-down-s-line').addClass('ri-arrow-up-s-line');
            } else {
                icon.removeClass('ri-arrow-up-s-line').addClass('ri-arrow-down-s-line');
            }
        }
        
        function updateItemStatus(batchId, itemId, currentStatus) {
            Swal.fire({
                title: 'Update Item Status',
                input: 'select',
                inputOptions: {
                    'Pending': 'Pending',
                    'Processing': 'Processing',
                    'In Progress': 'In Progress', 
                    'Completed': 'Completed',
                    'Cancelled': 'Cancelled'
                },
                inputValue: currentStatus,
                showCancelButton: true,
                confirmButtonText: 'Update',
                inputValidator: (value) => {
                    return new Promise((resolve) => {
                        if (value) {
                            resolve();
                        } else {
                            resolve('Please select a status');
                        }
                    });
                }
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../controller/orders/orders_controller.php',
                        type: 'POST',
                        data: {
                            action: 'update_item_status',
                            batch_id: batchId,
                            item_id: itemId,
                            status: result.value
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: res.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    // First refresh the modal content
                                    viewBatch(batchId);
                                    // Then reload the DataTable
                                    if (batchesTable) {
                                        batchesTable.ajax.reload(null, false); // false = keep current page
                                    }
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Failed to update status', 'error');
                        }
                    });
                }
            });
        }
        
        function updateMultipleItemsStatus() {
            let batchId = $('#batchDetailsModal').data('batch-id');
            let selectedItems = [];
            
            // Get all checked items
            $('.item-checkbox:checked').each(function() {
                selectedItems.push($(this).val());
            });
            
            if (selectedItems.length === 0) {
                Swal.fire({
                    title: 'Warning',
                    text: 'Please select at least one item',
                    icon: 'warning',
                    timer: 1500,
                    showConfirmButton: false
                });
                return;
            }
            
            Swal.fire({
                title: 'Update Multiple Items',
                text: `Update ${selectedItems.length} item(s) to same status?`,
                input: 'select',
                inputOptions: {
                    'Pending': 'Pending',
                    'Processing': 'Processing',
                    'In Progress': 'In Progress',
                    'Completed': 'Completed',
                    'Cancelled': 'Cancelled'
                },
                inputPlaceholder: 'Select status',
                showCancelButton: true,
                confirmButtonText: 'Update',
                preConfirm: (status) => {
                    if (!status) {
                        Swal.showValidationMessage('Please select a status');
                        return false;
                    }
                    return status;
                }
            }).then((result) => {
                if (result.isConfirmed && result.value) {
                    $.ajax({
                        url: '../controller/orders/orders_controller.php',
                        type: 'POST',
                        data: {
                            action: 'update_multiple_items_status',
                            batch_id: batchId,
                            item_ids: selectedItems,
                            status: result.value
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.success) {
                                Swal.fire({
                                    title: 'Success',
                                    text: res.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    // First refresh the modal content
                                    viewBatch(batchId);
                                    // Then reload the DataTable
                                    if (batchesTable) {
                                        batchesTable.ajax.reload(null, false); // false = keep current page
                                    }
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Failed to update items', 'error');
                        }
                    });
                }
            });
        }
        
        function updateBatchStatus() {
            let batchId = $('#batchDetailsModal').data('batch-id');
            let newStatus = $('#updateBatchStatus').val();
            
            Swal.fire({
                title: 'Update Batch Status',
                text: 'This will update ALL items in this batch to the same status. Continue?',
                icon: 'warning',
                showCancelButton: true,
                confirmButtonColor: '#3085d6',
                cancelButtonColor: '#d33',
                confirmButtonText: 'Yes, update all!',
                cancelButtonText: 'No'
            }).then((result) => {
                if (result.isConfirmed) {
                    $.ajax({
                        url: '../controller/orders/orders_controller.php',
                        type: 'POST',
                        data: {
                            action: 'update_batch_status_with_items',
                            batch_id: batchId,
                            status: newStatus
                        },
                        dataType: 'json',
                        success: function(res) {
                            if (res.success) {
                                Swal.fire({
                                    title: 'Updated!',
                                    text: res.message,
                                    icon: 'success',
                                    timer: 1500,
                                    showConfirmButton: false
                                }).then(() => {
                                    $('#batchDetailsModal').modal('hide');
                                    if (batchesTable) {
                                        batchesTable.ajax.reload(null, false); // false = keep current page
                                    }
                                });
                            } else {
                                Swal.fire('Error', res.message, 'error');
                            }
                        },
                        error: function() {
                            Swal.fire('Error', 'Failed to update batch', 'error');
                        }
                    });
                }
            });
        }

        function printBatch(batchId) {
            window.open(`../controller/orders/generate_tailoring_slip.php?batch_id=${batchId}`, '_blank');
        }

        function exportBatches() {
            window.open('../controller/orders/export_batches.php', '_blank');
        }

        function getStatusClass(status) {
            switch(status) {
                case 'Pending': return 'badge-pending';
                case 'In Progress': return 'badge-in-progress';
                case 'Completed': return 'badge-completed';
                case 'Cancelled': return 'badge-cancelled';
                default: return 'bg-secondary';
            }
        }

        function getItemStatusClass(status) {
            switch(status) {
                case 'Pending': return 'bg-label-warning';
                case 'In Progress': return 'bg-label-info';
                case 'Processing': return 'bg-label-primary'; // Added for Processing
                case 'Completed': return 'bg-label-success';
                case 'Cancelled': return 'bg-label-danger';
                default: return 'bg-label-secondary';
            }
        }
    </script>
</body>
</html>