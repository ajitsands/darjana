$(document).ready(function() {
    // Initialize DataTable
    var table = $('#promo-codes-table').DataTable({
        "pageLength": 10,
        "ordering": true,
        "responsive": true,
        "columnDefs": [
            { "orderable": false, "targets": 8 } // Disable ordering on actions column
        ]
    });
    
    // Load promo codes on page load
    loadPromoCodes();
    
    // Add Promo Code
    $('#btn-add-promo').on('click', function(e) {
        e.preventDefault();
        var laddaButton = Ladda.create(this);
        laddaButton.start();
        
        // Validation
        var promoCode = $('#promo-code').val().trim();
        var offerPercentage = $('#offer-percentage').val().trim();
        var startDate = $('#start-date').val().trim();
        var expireDate = $('#expire-date').val().trim();
        
        if (promoCode === '') {
            Swal.fire({
                title: 'Warning',
                text: 'Please enter promo code.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            laddaButton.stop();
            return;
        }
        
        if (offerPercentage === '' || offerPercentage <= 0 || offerPercentage > 100) {
            Swal.fire({
                title: 'Warning',
                text: 'Please enter valid offer percentage (1-100).',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            laddaButton.stop();
            return;
        }
        if (startDate === '') { // Add start date validation
            Swal.fire({
                title: 'Warning',
                text: 'Please select start date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            laddaButton.stop();
            return;
        }
        if (expireDate === '') {
            Swal.fire({
                title: 'Warning',
                text: 'Please select expire date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            laddaButton.stop();
            return;
        }
        
        if (new Date(startDate) > new Date(expireDate)) {
            Swal.fire({
                title: 'Warning',
                text: 'Start date must be before or equal to expire date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            laddaButton.stop();
            return;
        }
        
        var formData = new FormData();
        formData.append('action', 'add_promo_code');
        formData.append('promo_code', promoCode.toUpperCase());
        formData.append('offer_percentage', offerPercentage);
        formData.append('minimum_order_amount', $('#minimum-order').val() || 0);
        formData.append('start_date', startDate); // Add this
        formData.append('expire_date', expireDate);
        formData.append('max_uses', $('#max-uses').val() || '');
        formData.append('status', $('#status').val());
        
        $.ajax({
            url: '../controller/promo_code/promo_code_controller.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                        Swal.fire({
                            title: 'Success',
                            text: jsonResponse.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                // Reset form
                                $('#promo-code-form')[0].reset();
                                $('#promo-code').val('');
                                $('#offer-percentage').val('');
                                $('#minimum-order').val('');
                                $('#start-date').val('');
                                $('#expire-date').val('');
                                $('#max-uses').val('');
                                $('#status').val('1').trigger('change');
                                
                                // Reload table
                                loadPromoCodes();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: jsonResponse.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (e) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to parse server response.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);
                Swal.fire({
                    title: 'Error',
                    text: 'AJAX request failed.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            },
            complete: function() {
                laddaButton.stop();
            }
        });
    });

    // Load all promo codes
    function loadPromoCodes() {
        $.ajax({
            type: 'POST',
            url: '../controller/promo_code/promo_code_controller.php',
            data: { action: 'get_all_promos' },
            dataType: 'json',
            success: function(response) {
                var tbody = $('#promo-codes-list');
                tbody.empty();
                
                // Clear and destroy DataTable
                if ($.fn.DataTable.isDataTable('#promo-codes-table')) {
                    table.clear().destroy();
                }
                
                if (response && response.length > 0) {
                    $.each(response, function(index, promo) {
                        var currentDate = new Date();
                        var expireDate = new Date(promo.expire_date);
                        var dateClass = expireDate < currentDate ? 'expired-date' : 'valid-date';
                        var statusHtml = promo.status == 1 ? 
                            '<span class="status-badge-active">Active</span>' : 
                            '<span class="status-badge-inactive">Deactive</span>';
                        var maxUses = promo.max_uses ? promo.max_uses : 'Unlimited';
                        var useCountHtml = promo.use_count + ' / ' + maxUses;
                        
                        // Use index + 1 for sequential numbering instead of promo.ids
                        var row = '<tr>' +
                            '<td>' + (index + 1) + '</td>' + // Changed from promo.ids to index + 1
                            '<td><strong>' + promo.promo_code + '</strong></td>' +
                            '<td>' + promo.offer_percentage + '%</td>' +
                            '<td>' + (parseFloat(promo.minimum_order_amount) > 0 ? promo.minimum_order_amount + ' BHD' : 'No min') + '</td>' +
                            '<td>' + promo.start_date + '</td>' +
                            '<td class="' + dateClass + '">' + promo.expire_date + '</td>' +
                            '<td>' + useCountHtml + '</td>' +
                            '<td>' + statusHtml + '</td>' +
                            '<td>' + promo.created_date + '</td>' +
                            '<td class="action-btns">' +
                            '<button class="btn btn-sm btn-info" onclick="editPromoCode(' + promo.ids + ')"><i class="ri-edit-line"></i></button> ' +
                            '<button class="btn btn-sm btn-danger" onclick="deletePromoCode(' + promo.ids + ')"><i class="ri-delete-bin-line"></i></button>' +
                            '</td>' +
                            '</tr>';
                        tbody.append(row);
                    });
                } else {
                    // Updated colspan from 9 to 10 since we now have 10 columns
                    var row = '<tr><td colspan="10" class="text-center">No promo codes found</td></tr>';
                    tbody.append(row);
                }
                
                // Reinitialize DataTable
                table = $('#promo-codes-table').DataTable({
                    "pageLength": 10,
                    "ordering": true,
                    "responsive": true,
                    "columnDefs": [
                        { "orderable": false, "targets": 9 }, // Actions column (index 9)
                        { "visible": false, "targets": 8 } // Hide created date column (index 8)
                    ]
                });
            },
            error: function(xhr, error) {
                console.error('Error fetching promo codes:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to load promo codes.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    }
    
    // Edit Promo Code
    window.editPromoCode = function(id) {
        $.ajax({
            type: 'POST',
            url: '../controller/promo_code/promo_code_controller.php',
            data: { action: 'get_promo_by_id', ids: id },
            dataType: 'json',
            success: function(response) {
                if (response.success && response.data) {
                    var promo = response.data;
                    $('#edit-promo-id').val(promo.ids);
                    $('#edit-promo-code').val(promo.promo_code);
                    $('#edit-offer-percentage').val(promo.offer_percentage);
                    $('#edit-minimum-order').val(promo.minimum_order_amount);
                    $('#edit-start-date').val(promo.start_date);
                    $('#edit-expire-date').val(promo.expire_date);
                    $('#edit-max-uses').val(promo.max_uses);
                    $('#edit-status').val(promo.status);
                    
                    $('#editPromoModal').modal('show');
                } else {
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to load promo code details.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, error) {
                console.error('Error fetching promo code:', error);
                Swal.fire({
                    title: 'Error',
                    text: 'Failed to load promo code details.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    };
    
    // Update Promo Code
    $('#btn-update-promo').on('click', function() {
        var promoId = $('#edit-promo-id').val();
        var promoCode = $('#edit-promo-code').val().trim();
        var offerPercentage = $('#edit-offer-percentage').val().trim();
        var startDate = $('#edit-start-date').val().trim();
        var expireDate = $('#edit-expire-date').val().trim();
        
        // Validation
        if (promoCode === '') {
            Swal.fire({
                title: 'Warning',
                text: 'Please enter promo code.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        if (offerPercentage === '' || offerPercentage <= 0 || offerPercentage > 100) {
            Swal.fire({
                title: 'Warning',
                text: 'Please enter valid offer percentage (1-100).',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        if (startDate === '') { // Add start date validation
            Swal.fire({
                title: 'Warning',
                text: 'Please select start date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        if (expireDate === '') {
            Swal.fire({
                title: 'Warning',
                text: 'Please select expire date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        if (new Date(startDate) > new Date(expireDate)) {
            Swal.fire({
                title: 'Warning',
                text: 'Start date must be before or equal to expire date.',
                icon: 'warning',
                confirmButtonText: 'OK'
            });
            return;
        }
        
        var formData = new FormData();
        formData.append('action', 'update_promo_code');
        formData.append('ids', promoId);
        formData.append('promo_code', promoCode.toUpperCase());
        formData.append('offer_percentage', offerPercentage);
        formData.append('minimum_order_amount', $('#edit-minimum-order').val() || 0);
        formData.append('start_date', startDate);
        formData.append('expire_date', expireDate);
        formData.append('max_uses', $('#edit-max-uses').val() || '');
        formData.append('status', $('#edit-status').val());
        
        $.ajax({
            url: '../controller/promo_code/promo_code_controller.php',
            type: 'POST',
            data: formData,
            processData: false,
            contentType: false,
            success: function(response) {
                try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                        $('#editPromoModal').modal('hide');
                        Swal.fire({
                            title: 'Success',
                            text: jsonResponse.message,
                            icon: 'success',
                            confirmButtonText: 'OK'
                        }).then((result) => {
                            if (result.isConfirmed) {
                                loadPromoCodes();
                            }
                        });
                    } else {
                        Swal.fire({
                            title: 'Error',
                            text: jsonResponse.message,
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                } catch (e) {
                    Swal.fire({
                        title: 'Error',
                        text: 'Failed to parse server response.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                    });
                }
            },
            error: function(xhr, status, error) {
                console.error('AJAX Error: ', error);
                Swal.fire({
                    title: 'Error',
                    text: 'AJAX request failed.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                });
            }
        });
    });
    
    // Delete Promo Code
    window.deletePromoCode = function(id) {
        Swal.fire({
            title: 'Are you sure?',
            text: "You won't be able to revert this!",
            icon: 'warning',
            showCancelButton: true,
            confirmButtonColor: '#3085d6',
            cancelButtonColor: '#d33',
            confirmButtonText: 'Yes, delete it!'
        }).then((result) => {
            if (result.isConfirmed) {
                $.ajax({
                    type: 'POST',
                    url: '../controller/promo_code/promo_code_controller.php',
                    data: { action: 'delete_promo_code', ids: id },
                    dataType: 'json',
                    success: function(response) {
                        if (response.success) {
                            Swal.fire({
                                title: 'Deleted!',
                                text: response.message,
                                icon: 'success',
                                confirmButtonText: 'OK'
                            }).then((result) => {
                                if (result.isConfirmed) {
                                    loadPromoCodes();
                                }
                            });
                        } else {
                            Swal.fire({
                                title: 'Error!',
                                text: response.message,
                                icon: 'error',
                                confirmButtonText: 'OK'
                            });
                        }
                    },
                    error: function(xhr, error) {
                        console.error('Error deleting promo code:', error);
                        Swal.fire({
                            title: 'Error!',
                            text: 'Failed to delete promo code.',
                            icon: 'error',
                            confirmButtonText: 'OK'
                        });
                    }
                });
            }
        });
    };
    
    // Auto-uppercase promo code input
    $('#promo-code, #edit-promo-code').on('input', function() {
        $(this).val($(this).val().toUpperCase());
    });
    
    // Set minimum date for date inputs
    var today = new Date().toISOString().split('T')[0];
    $('#expire-date, #edit-expire-date').attr('min', today);
});