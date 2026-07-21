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
			@media (max-width: 768px) {
                .edit-profile-icon {
                    right: 10px; /* Adjusts the icon to be slightly more to the left */
                    /* Alternatively, if not absolutely positioned, use margin */
                    /* margin-right: 5px; */
                }
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
					<div class="row">
						<?php include("templates/aside.php"); ?>
						<?php include("pages/profile/profile_body_copy.php"); ?>
					</div>
				</div>
			</div>
		</div>

		<!-- Footer -->
		<?php //include("templates/footer.php"); ?>
		<!-- Footer End -->

		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

		<!-- Quick Modal Start -->
		<?php include("pages/home/home_page_modal.php"); ?>
	</div>
	<?php include("templates/scripts.php"); ?>
	<script>
		$(document).ready(function () {
			initializeDataTable();

			function initializeDataTable() {
				$.ajax({
					url: "../controller/registration_controller.php",
					type: "POST",
					dataType: 'json',
					data: {
						action: 'get_details'
					},
					success: function (response) {
						console.log("Full Response:", response);

						if (Array.isArray(response) && response.length > 0) {
							const subscriberData = response[0];

							// Handle image
							if (subscriberData.Image) {
								$('#imagePreview').css('background-image', 'url(../httpdocs/images/' + subscriberData.Image + ')');
							} else {
								$('#imagePreview').attr('src', 'https://via.placeholder.com/150');
							}

							// Set basic fields
							const name = subscriberData.customer_name || 'N/A';
							const email = subscriberData.email_user_name || 'N/A';
							$('#customer_name').html(`Name: ${name}<br>Email: ${email}`);
							$('#email_id').val(email);
							$('#ids').val(subscriberData.ids || '');
							$('#name').val(subscriberData.customer_name || '');
							$('#address').val(subscriberData.permenant_address || '');
							$('#phone').val(subscriberData.mobile_no || '');
							$('#whatsapp').val(subscriberData.whatsapp_no || '');
							$('#postal_code').val(subscriberData.postal_code || '');
							$('#street').val(subscriberData.street || '');
							$('#gender').val(subscriberData.gender || '');
							$('#dob').val(subscriberData.date_of_birth || '');
							
						    loadcountryDropdown(subscriberData.country);

							console.log($.trim(subscriberData.country) === 'india'); // true or false?
							console.log($.trim(subscriberData.country) + "lllll");

							// First load states, then set the state and district

						} else {
							console.error("Invalid response format or empty array");
							alert("No subscriber data found or invalid format.");
						}
					},
					error: function (xhr, status, error) {
						console.error("AJAX error:", status, error);
						alert("An error occurred while fetching subscriber details.");
					}

				});
			}

			function validateForm() {
				const name = document.getElementById("name").value.trim();
				const address = document.getElementById("address").value.trim();
				const phone = document.getElementById("phone").value.trim();
				const whatsapp = document.getElementById("whatsapp").value.trim();

				const nameRegex = /^[a-zA-Z\s.]{2,50}$/;


				//const phone = document.getElementById("phone").value.trim();
				if (phone.length !== 10) {
					alert("Phone number must be exactly 10 digits.");
					return false;
				}
				if (whatsapp.length !== 10) {
					alert("whatsapp number must be exactly 10 digits.");
					return false;
				}
				//const phoneRegex = /^[0-9]+$/;


				// whatsapp = /^[a-zA-Z\s.]{2,50}$/;
				const postalCodeRegex = /^[1-9][0-9]{5}$/;
				const districtRegex = /^[a-zA-Z\s]{2,50}$/;

				if (!nameRegex.test(name)) {
					alert("Please enter a valid name (letters, spaces, periods only).");
					return false;
				}

				if (address.length < 15) {
					alert("Please enter a valid address).");
					return false;
				}
				if (!phoneRegex.test(phone)) {
					alert("Please enter a valid 10-digit phone number starting with 6-9.");
					return false;
				}
				if (!whatsappRegex.test(phone)) {
					alert("Please enter a valid 10-digit phone number starting with 6-9.");
					return false;
				}
				if (!postalCodeRegex.test(postalCode)) {
					alert("Please enter a valid 6-digit postal code.");
					return false;
				}
				if (!districtRegex.test(district)) {
					alert("Please enter a valid district name (letters and spaces only).");
					return false;
				}



				return true;
			}


			$('#update').on('click', function () {
				// const requiredFields = ['#name', '#address', '#phone', '#whatsapp', '#postal_code', '#div_district', '#state', '#street', '#country', '#gender', '#dob'];
				// for (const selector of requiredFields) {
				// 	let value = $(selector).val();
				// 	// For selects or dropdowns that might use .text() instead of .val(), adjust if needed
				// 	if (!value || value.trim() === '') {
				// 		alert("Please fill all the fields before updation");
				// 		return; // Stop execution if any field is empty
				// 	}
				// }
				// Create FormData object
				const formData = new FormData();

				// Get the image file
				const imageFile = $('#imageUpload')[0].files[0];

				// Add all form data to FormData
				formData.append('action', 'update_details');
				formData.append('id', $('#ids').val());
				formData.append('customer_name', $('#name').val());
				formData.append('permenant_address', $('#address').val());
				formData.append('mobile_no', $('#phone').val());
				formData.append('whatsapp_no', $('#whatsapp').val());
				formData.append('postal_code', $('#postal_code').val());
				//formData.append('div_district', $('#div_district').text());
				formData.append('district', $('#div_district option:selected').text());
				formData.append('state', $('#state option:selected').text());

				formData.append('street', $('#street').val());
				formData.append('country', $('#country').text());
				formData.append('gender', $('#gender option:selected').text());
				formData.append('date_of_birth', $('#dob').val());

				// Add the image file if it exists
				if (imageFile) {
					formData.append('image', imageFile);
					formData.append('image_name', imageFile.name);
				}

				// Make the AJAX request
				$.ajax({
					url: "../controller/registration_controller.php",
					type: "POST",
					data: formData,
					processData: false,  // Important for file upload
					contentType: false,  // Important for file upload
					success: function (res) {
						alert(" details updated successfully.");
						$('.editable').prop('disabled', true);
						initializeDataTable();
					},
					error: function () {
						alert("Failed to update subscriber details.");
					}
				});
			});
			// loadDistrictDropdown();
			// loadstateDropdown();
			subscriberData='0';
			loadcountryDropdown();

			function loadcountryDropdown(subscriberData) {
				console.log("tested");
				$.ajax({
					url: "../controller/registration_controller.php",
					type: "POST",
					data: { action: "get_country" },
					success: function (response) {
				// 		var $responseHtml=$('#div_country').html(response);
				// 		 // Extract only the <option> elements from the <select>
    //                     var options = $responseHtml.find('select#country').html();
                    
                        // Inject the options into your existing <select>
                        $('#country').html(response);
                        
                         // ✅ Now set the selected value
                    //if (subscriberData && subscriberData.country && subscriberData.country.selected) {
                        $('#country').val(subscriberData);
                   // }
                        

					},
					error: function (xhr, status, error) {
						console.error("AJAX error:", status, error);
						$('#div_country').html('<option value="">Error loading states</option>');

					}
				});
			}




			function loadstateDropdown() {
				console.log("tested");
				$.ajax({
					url: "../controller/registration_controller.php",
					type: "POST",
					data: { action: "get_state" },
					success: function (response) {
						$('#state').html(response);

					},
					error: function (xhr, status, error) {
						console.error("AJAX error:", status, error);
						$('#state').html('<option value="">Error loading states</option>');

					}
				});
			}

			function loadDistrictDropdown(stateId, callback) {
				$.ajax({
					url: "../controller/registration_controller.php",
					type: "POST",
					data: { action: "get_districts", stateid: stateId },
					success: function (response) {
						$('#div_district').html(response);
						if (callback) callback();
					},
					error: function (xhr, status, error) {
						console.error("AJAX error:", status, error);
						$('#div_district').html('<option value="">Error loading districts</option>');
						if (callback) callback();
					}
				});
			}
			$('#country').on('change', function () {
				const countryId = $(this).val();
				// AJAX call to load states
			});


			$('#state').on('change', function () {
				var stateId = $(this).val();
				//alert(stateId);
				loadDistrictDropdown(stateId);

			});

			$('#imagePreview').on('change', function () {
				const file = this.files[0];
				if (!validTypes.includes(file.type)) {
					alert('Please upload ');
					this.value = '';
				}
			});

		});
	</script>
</body>

</html>