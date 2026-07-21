<!DOCTYPE html>
<html lang="en">

 <head>
	<?php include("templates/head.php"); ?>
	<link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
	<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
	<script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>
	<style>
		#state {
			background-image: url("data:image/svg+xml,%3csvg xmlns='http://www.w3.org/2000/svg' viewBox='0 0 16 16'%3e%3cpath fill='none' stroke='black' stroke-linecap='round' stroke-linejoin='round' stroke-width='2' d='m2 5 6 6 6-6'/%3e%3c/svg%3e");
			background-repeat: no-repeat;
			background-position: right 0.75rem center;
			background-size: 1rem 1rem;
			appearance: none;
			-webkit-appearance: none;
			-moz-appearance: none;
			padding-right: 2rem;Hey, Cortana. 
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
			#editProfile {
                right: 5px !important;
                top: 5px !important; 
                position: absolute !important;
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
						 <?php //include("pages/orders/orders_body.php"); ?>
						
						  
					</div>
					<div id="dropdownContent" style="text-align:center;"></div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php include("templates/footer.php"); ?>
		<!-- Footer End -->

		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

		<!-- Quick Modal Start -->
		<?php include("pages/home/home_page_modal.php"); ?>
	</div>
	<?php include("templates/scripts.php"); ?>
<!--	<script>-->
<!--		$(document).ready(function () {-->

<!--			$('#profileDisplay').show();-->
<!--   			$('#profileEditForm').hide();-->
<!--			$('#imageUploadContainer').addClass('d-none');-->
			
<!--			$('#editProfile').on('click', function() {-->
<!--				$('#profileDisplay').hide();-->
<!--				$('#profileEditForm').removeClass('d-none').show();-->
<!--				$('#imageUploadContainer').removeClass('d-none');-->
<!--				$('#editProfile').hide();-->
<!--			});-->

<!--			$('#cancelEdit').on('click', function() {-->
<!--				$('#profileEditForm').addClass('d-none').hide();-->
<!--				$('#imageUploadContainer').addClass('d-none');-->
<!--				$('#profileDisplay').show();-->
<!--				$('#editProfile').show();-->
<!--			});-->

<!--			$('#imageUpload').on('change', function () {-->
<!--				const file = this.files[0];-->
<!--				const validTypes = ['image/png', 'image/jpg', 'image/jpeg'];-->
<!--				if (file && !validTypes.includes(file.type)) {-->
<!--					alert('Please upload a valid image file (PNG, JPG, or JPEG).');-->
					this.value = ''; // Clear the input
<!--					return;-->
<!--				}-->
				// Optional: Preview the image
<!--				if (file) {-->
<!--					const reader = new FileReader();-->
<!--					reader.onload = function (e) {-->
<!--						$('#imagePreview').css('background-image', `url(${e.target.result})`);-->
<!--					};-->
<!--					reader.readAsDataURL(file);-->
<!--				}-->
<!--			});-->

<!--			initializeDataTable();-->
<!--			$('#country').on('change', function() {-->
<!--    			loadstateDropdown();-->
<!--			});-->

<!--			$('#state').on('change', function() {-->
<!--				var stateId = $(this).val();-->
<!--				loadDistrictDropdown(stateId);-->
<!--			});-->
<!--			function initializeDataTable() {-->
<!--				$.ajax({-->
<!--					url: "../controller/registration_controller.php",-->
<!--					type: "POST",-->
<!--					dataType: 'json',-->
<!--					data: {-->
<!--						action: 'get_details'-->
<!--					},-->
<!--				success: function(response) {-->
<!--				try {-->
					// Sometimes response comes as string even when expecting JSON
<!--					if (typeof response === 'string') {-->
<!--						response = JSON.parse(response);-->
<!--					}-->
					
<!--					console.log("Parsed Response:", response);-->
					
<!--					if (response.status === 'error') {-->
<!--						alert(response.message);-->
<!--						return;-->
<!--					}-->
					
<!--					if (Array.isArray(response) && response.length > 0) {-->
<!--						populateFormFields(response[0]);-->
<!--					} else {-->
<!--						alert("Unexpected response format");-->
<!--						console.log(response);-->
<!--					}-->
<!--				} catch (e) {-->
<!--					console.error("Parsing error:", e);-->
<!--					console.log("Raw response:", response);-->
<!--					alert("Error processing response");-->
<!--				}-->
<!--			},-->
<!--					error: function(xhr, status, error) {-->
<!--						console.error("AJAX error:", status, error);-->
<!--						console.log("Full error response:", xhr.responseText);-->
<!--						alert("An error occurred while fetching subscriber details. Check console for details.");-->
<!--					}-->
<!--				});-->
<!--			}-->

<!--		function populateFormFields(subscriberData) {-->
<!--			console.log("Populating form with:", subscriberData);-->
			
<!--			$('#display_name').text(subscriberData.customer_name || 'N/A');-->
<!--			$('#display_address').text(subscriberData.permenant_address || 'N/A');-->
<!--			$('#display_phone').text(subscriberData.mobile_no || 'N/A');-->
<!--			$('#display_whatsapp').text(subscriberData.whatsapp_no || 'N/A');-->
<!--			$('#display_postal_code').text(subscriberData.postal_code || 'N/A');-->
<!--			$('#display_country').text(subscriberData.country || 'N/A');-->
<!--			$('#display_state').text(subscriberData.state || 'N/A');-->
<!--			$('#display_district').text(subscriberData.district || 'N/A');-->
<!--			$('#display_street').text(subscriberData.street || 'N/A');-->
<!--			$('#display_gender').text(subscriberData.gender || 'N/A');-->
<!--			$('#display_dob').text(subscriberData.date_of_birth || 'N/A');-->


			// Handle image
<!--			if (subscriberData.Image) {-->
<!--				$('#imagePreview').css('background-image', 'url(../httpdocs/images/' + subscriberData.Image + ')');-->
<!--			} else {-->
<!--				$('#imagePreview').attr('src', 'https://via.placeholder.com/150');-->
<!--			}-->



			// Set basic fields
<!--			$('#customer_name').html(`${subscriberData.customer_name || 'N/A'}`);-->
<!--			$('#email_id_span').html(`${subscriberData.email_user_name || 'N/A'}`);-->
		
<!--			$('#email_id').val(subscriberData.email_user_name || '');-->
<!--			$('#ids').val(subscriberData.ids || '');-->
<!--			$('#name').val(subscriberData.customer_name || '');-->
<!--			$('#address').val(subscriberData.permenant_address || '');-->
<!--			$('#phone').val(subscriberData.mobile_no || '');-->
<!--			$('#whatsapp').val(subscriberData.whatsapp_no || '');-->
<!--			$('#postal_code').val(subscriberData.postal_code || '');-->
<!--			$('#street').val(subscriberData.street || '');-->
<!--			$('#dob').val(subscriberData.date_of_birth || '');-->
			
<!--			if (subscriberData.gender) {-->
<!--				const genderValue = subscriberData.gender.toLowerCase();-->
				// First try exact match
<!--				$('#gender option').each(function() {-->
<!--					if ($(this).val().toLowerCase() === genderValue) {-->
<!--						$(this).prop('selected', true);-->
						return false; // break loop
<!--					}-->
<!--				});-->
				
				// If still not selected, try partial match
<!--				if ($('#gender').val() === '') {-->
<!--					$('#gender option').each(function() {-->
<!--						if ($(this).val().toLowerCase().includes(genderValue) || -->
<!--							$(this).text().toLowerCase().includes(genderValue)) {-->
<!--							$(this).prop('selected', true);-->
							return false; // break loop
<!--						}-->
<!--					});-->
<!--				}-->
<!--			}-->
			
			// Store the location data for later use
<!--			window.subscriberLocationData = {-->
<!--				country: subscriberData.country || '',-->
<!--				state: subscriberData.state || '',-->
<!--				district: subscriberData.district || ''-->
<!--			};-->
			
			// Load country dropdown first - this will trigger the chain to load states and districts
<!--			loadcountryDropdown(subscriberData.country);-->
<!--		}-->

<!--	function setDropdownSelection(selector, value) {-->
<!--		if (!value) return;-->
		
		// Try exact match first
<!--		$(selector + ' option').each(function() {-->
<!--			if ($(this).text().toLowerCase() === value.toLowerCase()) {-->
<!--				$(this).prop('selected', true);-->
				return false; // break loop
<!--			}-->
<!--		});-->
		
		// If not found, try partial match
<!--		if ($(selector + ' option:selected').val() === '') {-->
<!--			$(selector + ' option').each(function() {-->
<!--				if ($(this).text().toLowerCase().includes(value.toLowerCase())) {-->
<!--					$(this).prop('selected', true);-->
					return false; // break loop
<!--				}-->
<!--			});-->
<!--		}-->
		
<!--		console.log(`Set ${selector} to ${value} - selected value is now ${$(selector).val()}`);-->
<!--	}-->

<!--			function validateForm() {-->
<!--				const name = document.getElementById("name").value.trim();-->
<!--				const address = document.getElementById("address").value.trim();-->
<!--				const phone = document.getElementById("phone").value.trim();-->
<!--				const whatsapp = document.getElementById("whatsapp").value.trim();-->

<!--				const nameRegex = /^[a-zA-Z\s.]{2,50}$/;-->


				//const phone = document.getElementById("phone").value.trim();
<!--				if (phone.length !== 10) {-->
<!--					alert("Phone number must be exactly 10 digits.");-->
<!--					return false;-->
<!--				}-->
<!--				if (whatsapp.length !== 10) {-->
<!--					alert("whatsapp number must be exactly 10 digits.");-->
<!--					return false;-->
<!--				}-->
				//const phoneRegex = /^[0-9]+$/;


				// whatsapp = /^[a-zA-Z\s.]{2,50}$/;
<!--				const postalCodeRegex = /^[1-9][0-9]{5}$/;-->
<!--				const districtRegex = /^[a-zA-Z\s]{2,50}$/;-->

<!--				if (!nameRegex.test(name)) {-->
<!--					alert("Please enter a valid name (letters, spaces, periods only).");-->
<!--					return false;-->
<!--				}-->

<!--				if (address.length < 15) {-->
<!--					alert("Please enter a valid address).");-->
<!--					return false;-->
<!--				}-->
<!--				if (!phoneRegex.test(phone)) {-->
<!--					alert("Please enter a valid 10-digit phone number starting with 6-9.");-->
<!--					return false;-->
<!--				}-->
<!--				if (!whatsappRegex.test(phone)) {-->
<!--					alert("Please enter a valid 10-digit phone number starting with 6-9.");-->
<!--					return false;-->
<!--				}-->
<!--				if (!postalCodeRegex.test(postalCode)) {-->
<!--					alert("Please enter a valid 6-digit postal code.");-->
<!--					return false;-->
<!--				}-->
<!--				if (!districtRegex.test(district)) {-->
<!--					alert("Please enter a valid district name (letters and spaces only).");-->
<!--					return false;-->
<!--				}-->



<!--				return true;-->
<!--			}-->


<!--			$('#update').on('click', function () {-->
<!--				const formData = new FormData();-->

				// Get the image file
<!--				const imageFile = $('#imageUpload')[0].files[0];-->

				// Add all form data to FormData
<!--				formData.append('action', 'update_details');-->
<!--				formData.append('id', $('#ids').val());-->
<!--				formData.append('customer_name', $('#name').val());-->
<!--				formData.append('permenant_address', $('#address').val());-->
<!--				formData.append('mobile_no', $('#phone').val());-->
<!--				formData.append('whatsapp_no', $('#whatsapp').val());-->
<!--				formData.append('postal_code', $('#postal_code').val());-->
<!--				formData.append('district', $('#div_district option:selected').text());-->
<!--				formData.append('state', $('#state option:selected').text());-->
<!--				formData.append('street', $('#street').val());-->
<!--				formData.append('country', $('#country option:selected').text());-->
<!--				formData.append('gender', $('#gender option:selected').text());-->
<!--				formData.append('date_of_birth', $('#dob').val());-->

				// Add the image file if it exists
<!--				if (imageFile) {-->
<!--					formData.append('image', imageFile);-->
<!--					formData.append('image_name', imageFile.name);-->
<!--				}-->

				// Make the AJAX request
<!--				$.ajax({-->
<!--					url: "../controller/registration_controller.php",-->
<!--					type: "POST",-->
<!--					data: formData,-->
<!--					processData: false,-->
<!--					contentType: false,-->
					dataType: 'json', // Expect JSON response
<!--					success: function (res) {-->
<!--						if (res.status === 'success') {-->
<!--							setupDropdown('dropdownContent', 'success', svgSuccess + 'Details updated successfully.', 'click');-->
<!--							$('.editable').prop('disabled', true);-->
<!--							initializeDataTable();-->
<!--							$('#profileEditForm').addClass('d-none').hide();-->
							$('#imageUploadContainer').addClass('d-none'); // Hide image upload on success
<!--							$('#profileDisplay').show();-->
<!--							$('#editProfile').show()-->
<!--						} else {-->
							alert(res.message); // Display server-side error message
<!--						}-->
<!--					},-->
<!--					error: function (xhr, status, error) {-->
<!--						console.error("AJAX error:", status, error);-->
<!--						alert("An error occurred while updating profile. Please try again.");-->
<!--					}-->
<!--				});-->
<!--			});-->
			// loadDistrictDropdown();
			
<!--			subscriberData='0';-->
<!--			loadcountryDropdown();-->

<!--function loadcountryDropdown(selectedCountry) {-->
<!--    console.log("Loading countries, selecting:", selectedCountry);-->
<!--    $.ajax({-->
<!--        url: "../controller/registration_controller.php",-->
<!--        type: "POST",-->
<!--        data: { action: "get_country" },-->
<!--        success: function(response) {-->
<!--            try {-->
<!--                $('#country').html(response);-->
                
                // If we have a country to select, try to find it
<!--                if (selectedCountry) {-->
<!--                    setDropdownSelection('#country', selectedCountry);-->
                    
                    // After country is set, load states
<!--                    loadstateDropdown(window.subscriberLocationData.state);-->
<!--                }-->
<!--            } catch (e) {-->
<!--                console.error("Error processing countries:", e);-->
<!--            }-->
<!--        },-->
<!--        error: function(xhr, status, error) {-->
<!--            console.error("AJAX error loading countries:", status, error);-->
<!--            $('#country').html('<option value="">Error loading countries</option>');-->
<!--        }-->
<!--    });-->
<!--}-->

<!--function loadstateDropdown(selectedState) {-->
<!--    console.log("Loading states for country:", $('#country').val(), "selecting:", selectedState);-->
<!--    $.ajax({-->
<!--        url: "../controller/registration_controller.php",-->
<!--        type: "POST",-->
<!--        data: { -->
<!--            action: "get_state",-->
            country_id: $('#country option:selected').val() // Pass the selected country ID
<!--        },-->
<!--        success: function(response) {-->
<!--            $('#state').html(response);-->
            
            // If we have a state to select, try to find it
<!--            if (selectedState) {-->
<!--                setDropdownSelection('#state', selectedState);-->
                
                // After state is set, load districts
<!--                loadDistrictDropdown(window.subscriberLocationData.district);-->
<!--            }-->
<!--        },-->
<!--        error: function(xhr, status, error) {-->
<!--            console.error("AJAX error loading states:", status, error);-->
<!--            $('#state').html('<option value="">Error loading states</option>');-->
<!--        }-->
<!--    });-->
<!--}-->

<!--function loadDistrictDropdown(selectedDistrict) {-->
<!--    var stateId = $('#state option:selected').val();-->
<!--    console.log("Loading districts for state:", stateId, "selecting:", selectedDistrict);-->
    
<!--    if (!stateId) {-->
<!--        $('#div_district').html('<option value="">Select state first</option>');-->
<!--        return;-->
<!--    }-->
    
<!--    $.ajax({-->
<!--        url: "../controller/registration_controller.php",-->
<!--        type: "POST",-->
<!--        data: { -->
<!--            action: "get_districts", -->
<!--            stateid: stateId -->
<!--        },-->
<!--        success: function(response) {-->
<!--            $('#div_district').html(response);-->
            
            // If we have a district to select, try to find it
<!--            if (selectedDistrict) {-->
<!--                setDropdownSelection('#div_district', selectedDistrict);-->
<!--            }-->
<!--        },-->
<!--        error: function(xhr, status, error) {-->
<!--            console.error("AJAX error loading districts:", status, error);-->
<!--            $('#div_district').html('<option value="">Error loading districts</option>');-->
<!--        }-->
<!--    });-->
<!--}-->
			// $('#country').on('change', function () {
			// 	const countryId = $(this).val();
			// 	// AJAX call to load states
			// });


			// $('#state').on('change', function () {
			// 	var stateId = $(this).val();
			// 	//alert(stateId);
			// 	loadDistrictDropdown(stateId);

			// });

<!--			$('#imagePreview').on('change', function () {-->
<!--				const file = this.files[0];-->
<!--				if (!validTypes.includes(file.type)) {-->
<!--					alert('Please upload ');-->
<!--					this.value = '';-->
<!--				}-->
<!--			});-->

<!--		});-->
<!--	</script>-->
</body>

</html>