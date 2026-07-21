<!DOCTYPE html>
<html lang="en">
<head>
	<?php include("templates/head.php"); ?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
	<script src="https://bootstrap.bundle.min.js"></script>
	<style>
	 /* Apply Montserrat font to all text elements */
    body,
    h1, h2, h3, h4, h5, h6,
    p, span, div,
    .title, .product-name,
    .btn, .price,
    .modal-content,
    .navbar-nav {
        font-family: "Instrument Sans", sans-serif !important;
        /* text-transform: uppercase !important; */
        letter-spacing: 0.5px !important;
    }
		#state {
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='black' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
			background-repeat: no-repeat;
			background-position: right 0.75rem center;
			background-size: 1rem 1rem;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			padding-right: 2rem;
			border: 1px solid #00000;
			/* visible border */
			border-radius: 4px;
			/* optional rounded corners */
		}

		#div_district {
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='black' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
			 background-repeat: no-repeat;
			background-position: right 0.75rem center;
			background-size: 1rem 1rem;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			padding-right: 2rem;
			border: 1px solid #00000;
			/* visible border */
			border-radius: 4px;
			/* optional rounded corners */
		}

		#country {
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='black' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
			background-repeat: no-repeat;
			background-position: right 0.75rem center;
			background-size: 1rem 1rem;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			padding-right: 2rem;
			border: 1px solid #00000;
			/* visible border */
			border-radius: 4px;
			/* optional rounded corners */
		}

		.profile-display {
			background: #fff;
			border-radius: 8px;
			padding: 25px;
			box-shadow: 0 2px 10px rgba(0,0,0,0.05);
		}
		
		.profile-info-grid {
			display: grid;
			grid-template-columns: repeat(auto-fill, minmax(300px, 1fr));
			gap: 20px;
		}
		
		.info-item {
			display: flex;
			flex-wrap: wrap;
			padding: 12px 0;
			border-bottom: 1px solid #f0f0f0;
		}
		
		.info-label {
			font-weight: 600;
			color: #555;
			min-width: 120px;
			margin-right: 15px;
		}
		
		.info-value {
			color: #333;
			flex: 1;
		}
		
		#editProfile {
			transition: all 0.3s ease;
		}
		
		#editProfile:hover {
			transform: translateY(-2px);
			box-shadow: 0 4px 8px rgba(0,0,0,0.1);
		}

		.profile-edit {
			position: relative;
			padding: 15px 0;
		}

		.btn-link i {
			color: #007bff; /* Primary color for the pencil icon */
			transition: color 0.3s ease;
		}

		.btn-link:hover i {
			color: #0056b3; /* Darker shade on hover */
		}

		.avatar-upload {
			margin-right: 15px;
		}

		#imageUploadContainer {
			margin-left: 10px;
		}
		
		/* Responsive adjustments */
		@media (max-width: 768px) {
			.profile-info-grid {
				grid-template-columns: 1fr;
			}
			
			.info-item {
				flex-direction: column;
			}
			
			.info-label {
				margin-bottom: 5px;
			}
		}
	</style>
</head>
 
<body id="bg">
	<div class="page-wraper">

		<div id="loading-area" class="preloader-wrapper-4">
			<img src="images/loading.gif" alt="">
		</div>

		<?php include("templates/header.php"); ?>

		<div class="page-content bg-light">
			<div class="content-inner-1">
				<div class="container">
					<div class="row mt-5">
						<?php include("templates/aside.php"); ?>
						<?php include("pages/address/address_body.php"); ?>
					</div>
					<div id="dropdownContent" style="text-align:center;"></div>
				</div> 
			</div>
		</div>

		<!-- Footer -->
		<?php include("templates/footer.php"); ?>
		<!-- Footer End -->

		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

	</div>
	<?php include("templates/scripts.php"); ?>
	<script>
        $(document).ready(function () {
            $('[data-toggle="tooltip"]').tooltip();
            loadCustomerAddresses();
        
            // Initialize Select2
            function initSelect2() {
                $('.modal select').select2({
                    width: '100%',
                    dropdownParent: $('.modal.show')
                });
            }
        
            // ====================== LOAD & RENDER ADDRESSES ======================
            function loadCustomerAddresses() {
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: {
                        action: 'customer_shipping_details',
                        customer_id: <?php echo isset($_SESSION['ids']) ? json_encode($_SESSION['ids']) : '0'; ?>
                    },
                    dataType: 'json',
                    success: function (response) {
                        const addresses = Array.isArray(response) ? response : (response.data || []);
                        renderAddressCards(addresses);
                    }
                });
            }
        
            function renderAddressCards(addresses) {
                const container = $('#shipping-address');
                container.empty();
        
                if (addresses.length === 0) {
                    container.append('<p class="text-muted text-center">No shipping addresses found.</p>');
                    return;
                }
        
                let html = '<div class="row">';
                addresses.forEach(address => {
                    html += `
                        <div class="col-md-6 mb-4">
                            <div class="address-card-dynamic">
                                <div class="account-address-box">
                                    <h5 class="mb-3">Shipping Address</h5>
                                    <ul style="list-style:none; padding:0;">
                                        <li>
                                            <strong>${address.customer_name || 'N/A'}</strong><br>
                                            ${address.shipping_address || ''}, ${address.street || ''}<br>
                                            ${address.district ? address.district + ', ' : ''}
                                            ${address.state || ''}, ${address.country || ''}<br>
                                            ${address.postal_code ? 'Postal: ' + address.postal_code + '<br>' : ''}
                                            Phone: ${address.mobile_no || 'N/A'}
                                        </li>
                                    </ul>
                                </div>
                                <div class="account-address-bottom d-flex justify-content-end mt-3">
                                    <a href="javascript:void(0);" class="me-3 edit-address text-primary" data-id="${address.ids}">
                                        <i class="fa-solid fa-pen me-1"></i> Edit
                                    </a>
                                    <a href="javascript:void(0);" class="remove-address text-danger" data-id="${address.ids}">
                                        <i class="fa-solid fa-trash-can me-1"></i> Remove
                                    </a>
                                </div>
                            </div>
                        </div>`;
                });
                html += '</div>';
                container.html(html);
            }
        
            // ====================== CASCADING DROPDOWN FUNCTIONS ======================
        
            function loadCountries(selectId, callback) {
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'country_list' },
                    dataType: 'json',
                    success: function(response) {
                        const countries = Array.isArray(response) ? response : (response.data || []);
                        let options = '<option value="">Select Country</option>';
                        countries.forEach(c => {
                            options += `<option value="${c.id}">${c.text}</option>`;
                        });
                        $(`#${selectId}`).html(options);
                        if (callback) callback();
                    }
                });
            }
        
            function loadStates(countryId, selectId, selectedState = null, callback) {
                if (!countryId) {
                    $(`#${selectId}`).html('<option value="">Select State</option>');
                    return;
                }
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'state_list', country_id: countryId },
                    dataType: 'json',
                    success: function(response) {
                        const states = Array.isArray(response) ? response : (response.data || []);
                        let options = '<option value="">Select State</option>';
                        states.forEach(s => options += `<option value="${s.id}">${s.text}</option>`);
                        $(`#${selectId}`).html(options);
        
                        if (selectedState) {
                            $(`#${selectId} option`).each(function() {
                                if (this.value == selectedState || this.text.trim() === selectedState.trim()) {
                                    $(`#${selectId}`).val(this.value);
                                    return false;
                                }
                            });
                        }
                        if (callback) callback();
                    }
                });
            }
        
            function loadDistricts(stateId, selectId, selectedDistrict = null) {
                if (!stateId) {
                    $(`#${selectId}`).html('<option value="">Select District</option>');
                    return;
                }
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'district_list', state_id: stateId },
                    dataType: 'json',
                    success: function(response) {
                        const districts = Array.isArray(response) ? response : (response.data || []);
                        let options = '<option value="">Select District</option>';
                        districts.forEach(d => options += `<option value="${d.id}">${d.text}</option>`);
                        $(`#${selectId}`).html(options);
        
                        if (selectedDistrict) {
                            $(`#${selectId} option`).each(function() {
                                if (this.value == selectedDistrict || this.text.trim() === selectedDistrict.trim()) {
                                    $(`#${selectId}`).val(this.value);
                                    return false;
                                }
                            });
                        }
                    }
                });
            }
        
            // ====================== NEW ADDRESS MODAL ======================
            $('#addnew_address').on('click', function () {
                $('#newAddressModal').modal('show');
                loadCountries('modal-country');   // Load countries when modal opens
            });
        
            // Cascading for New Address Modal
            $('#modal-country').on('change', function() {
                const countryId = $(this).val();
                loadStates(countryId, 'modal-state');
            });
        
            $('#modal-state').on('change', function() {
                const stateId = $(this).val();
                loadDistricts(stateId, 'modal-district');
            });
        
            // Save New Address
            $('#modal-save-address-btn').on('click', function () {
                const formData = {
                    action: 'save_address',
                    customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>,
                    fullname: $('#modal-funame').val().trim(),
                    permanentadd: $('#modal-paddress').val().trim(),
                    streets: $('#modal-street').val().trim(),
                    pocode: $('#modal-postalcode').val().trim(),
                    districts: $('#modal-district option:selected').text().trim(),
                    states: $('#modal-state option:selected').text().trim(),
                    countrys: $('#modal-country option:selected').text().trim(),
                    mobiles: $('#modal-mobile').val().trim(),
                    whatsappnos: $('#modal-wmobile').val().trim(),
                    emails: $('#modal-email').val().trim()
                };
        
                if (!formData.fullname || !formData.permanentadd || !formData.countrys || !formData.mobiles) {
                    alert("Please fill all required fields");
                    return;
                }
        
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success' || response.success) {
                            alert('Address saved successfully!');
                            $('#newAddressModal').modal('hide');
                            loadCustomerAddresses();
                        } else {
                            alert(response.message || 'Failed to save address');
                        }
                    },
                    error: function() {
                        alert('Error saving address. Please try again.');
                    }
                });
            });
        
            // ====================== EDIT ADDRESS MODAL ======================
            $(document).on('click', '.edit-address', function() {
                const addressId = $(this).data('id');
                $('#editAddressModal').modal('show');
        
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'get_single_address', address_id: addressId },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.data && response.data.length > 0) {
                            const addr = response.data[0];
        
                            $('#address_id').val(addr.ids || '');
                            $('#customer_name').val(addr.customer_name || '');
                            $('#email_address').val(addr.email_address || '');
                            $('#shipping_address').val(addr.shipping_address || '');
                            $('#street').val(addr.street || '');
                            $('#postal_code').val(addr.postal_code || '');
                            $('#mobile_no').val(addr.mobile_no || '');
                            $('#whatsapp_no').val(addr.whatsapp_no || '');
        
                            // Store for cascading
                            $('#editAddressModal').data({
                                savedCountry: addr.country,
                                savedState: addr.state,
                                savedDistrict: addr.district
                            });
        
                            // Start population
                            loadCountries('edit_country', function() {
                                const saved = $('#editAddressModal').data();
                                if (saved.savedCountry) {
                                    $('#edit_country option').each(function() {
                                        if (this.value == saved.savedCountry || this.text.trim() === saved.savedCountry.trim()) {
                                            $('#edit_country').val(this.value).trigger('change');
                                            return false;
                                        }
                                    });
                                }
                            });
                        }
                    }
                });
            });
        
            // Cascading for Edit Modal
            $('#edit_country').on('change', function() {
                const countryId = $(this).val();
                const saved = $('#editAddressModal').data();
                loadStates(countryId, 'edit_state', saved.savedState, function() {
                    const currentState = $('#edit_state').val();
                    if (currentState) loadDistricts(currentState, 'edit_district', saved.savedDistrict);
                });
            });
        
            $('#edit_state').on('change', function() {
                const stateId = $(this).val();
                const saved = $('#editAddressModal').data();
                loadDistricts(stateId, 'edit_district', saved.savedDistrict);
            });
        
            // Update Address
            $('#updateAddressBtn').on('click', function() {
                const formData = {
                    action: 'update_address',
                    address_id: $('#address_id').val(),
                    customer_name: $('#customer_name').val().trim(),
                    email_address: $('#email_address').val().trim(),
                    shipping_address: $('#shipping_address').val().trim(),
                    street: $('#street').val().trim(),
                    postal_code: $('#postal_code').val().trim(),
                    country: $('#edit_country option:selected').text().trim(),
                    state: $('#edit_state option:selected').text().trim(),
                    district: $('#edit_district option:selected').text().trim(),
                    mobile_no: $('#mobile_no').val().trim()
                };
        
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response.success || response.status === 'success') {
                            alert('Address updated successfully!');
                            $('#editAddressModal').modal('hide');
                            loadCustomerAddresses();
                        } else {
                            alert(response.message || 'Update failed');
                        }
                    }
                });
            });
        
            // Initialize Select2 when any modal opens
            $('.modal').on('shown.bs.modal', function () {
                initSelect2();
            });
        
            // Reset forms on modal close
            $('#newAddressModal, #editAddressModal').on('hidden.bs.modal', function () {
                $(this).find('form')[0].reset();
                $(this).find('select').html('<option value="">Select...</option>');
            });
        
            // Delete Address
            $(document).on('click', '.remove-address', function () {
                if (confirm('Delete this address?')) {
                    $.ajax({
                        url: 'controller/orders_controller.php',
                        type: 'POST',
                        data: { action: 'delete_address', address_id: $(this).data('id') },
                        success: function() {
                            loadCustomerAddresses();
                        }
                    });
                }
            });
        });
    </script>
</body>

</html>