

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.4.0/css/all.min.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
    a {
        color: #3B3B3B;
        font-weight : 400;
    }
    /* Input fields exception */
    input:not(.btn),
    textarea,
    select {
        text-transform: none !important;
        letter-spacing: normal !important;
    }
    :root {
        --primary-color: #4361ee;
        --secondary-color: #3f37c9;
        --accent-color: #4895ef;
        --light-color: #f8f9fa;
        --dark-color: #212529;
        --success-color: #4cc9f0;
        --border-radius: 8px;
        --box-shadow: 0 4px 12px rgba(0, 0, 0, 0.08);
        --transition: all 0.3s ease;
    }

    .account-wrapper {
        padding: 15px;
    }

    .account-card {
        background: white;
        border-radius: var(--border-radius);
        box-shadow: var(--box-shadow);
        overflow: hidden;
    }

    .profile-header {
        background: #FEEB9D; /* light yellow tone */
        padding: 20px;
        color: #333; /* darker text for better contrast */
        position: relative;
        text-align: center;
    }


    .avatar-upload {
        position: relative;
        width: 100px;
        height: 100px;
        margin: 0 auto 15px;
    }

    .avatar-preview {
        width: 100%;
        height: 100%;
        border-radius: 50%;
        background-size: cover;
        background-position: center;
        border: 3px solid white;
    }

    .change-btn {
        position: absolute;
        bottom: 0;
        right: 0;
        background: var(--accent-color);
        width: 32px;
        height: 32px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        color: white;
        cursor: pointer;
        border: 2px solid white;
    }

    .profile-title {
        margin: 10px 0 5px;
        font-size: 1.3rem;
        font-weight: 600;
    }

    .profile-email {
        color: red;
        font-size: 0.9rem;
    }

    .edit-profile-btn {
        position: absolute;
        top: 15px;
        right: 15px;
        background: rgba(255, 255, 255, 0.2);
        border: none;
        width: 36px;
        height: 36px;
        border-radius: 50%;
        color: white;
        cursor: pointer;
    }

    .profile-content {
        padding: 20px;
    }

    .profile-section {
        margin-bottom: 25px;
    }

    .section-title {
        font-size: 1.1rem;
        color: #cc0d39;
        margin-bottom: 15px;
        padding-bottom: 8px;
        border-bottom: 1px solid #eee;
        display: flex;
        align-items: center;
    }

    .section-title i {
        margin-right: 8px;
        font-size: 0.9rem;
    }

    .info-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 12px;
    }

    .info-item {
        display: flex;
        flex-wrap: wrap;
        align-items: center;
    }

    .info-label {
        font-weight: 500;
        color: var(--dark-color);
        margin-right: 5px;
        white-space: nowrap;
    }

    .info-value {
        color: #555;
    }

    /* Edit Form Styles */
    .edit-form {
        padding: 20px;
    }

    .form-grid {
        display: grid;
        grid-template-columns: 1fr;
        gap: 15px;
    }

    .form-group {
        margin-bottom: 15px;
    }

    .form-label {
        display: block;
        margin-bottom: 6px;
        font-weight: 500;
        color: var(--dark-color);
        font-size: 0.9rem;
    }

    .form-control {
        width: 100%;
        padding: 10px 12px;
        border: 1px solid #ddd;
        border-radius: var(--border-radius);
        font-size: 0.9rem;
    }

    select.form-control {
        appearance: none;
        background-image: url("data:image/svg+xml,%3Csvg xmlns='http://www.w3.org/2000/svg' width='12' height='12' fill='%234361ee' viewBox='0 0 16 16'%3E%3Cpath d='M7.247 11.14 2.451 5.658C1.885 5.013 2.345 4 3.204 4h9.592a1 1 0 0 1 .753 1.659l-4.796 5.48a1 1 0 0 1-1.506 0z'/%3E%3C/svg%3E");
        background-repeat: no-repeat;
        background-position: right 12px center;
        background-size: 10px;
        padding-right: 30px;
    }

    .form-actions {
        display: flex;
        justify-content: flex-end;
        gap: 10px;
        margin-top: 20px;
        padding-top: 15px;
        border-top: 1px solid #eee;
    }

    .btn {
        padding: 10px 18px;
        border-radius: var(--border-radius);
        font-weight: 500;
        cursor: pointer;
        font-size: 0.9rem;
        border: none;
    }

    .btn-primary {
        background-color: var(--primary-color);
        color: white;
    }

    .btn-outline {
        background: transparent;
        border: 1px solid #ddd;
        color: var(--dark-color);
    }

    /* Desktop Styles */
    @media (min-width: 768px) {
        .account-wrapper {
            padding: 20px;
        }

        .profile-header {
            padding: 30px;
        }

        .avatar-upload {
            width: 120px;
            height: 120px;
            margin-bottom: 20px;
        }

        .profile-title {
            font-size: 1.5rem;
        }

        .edit-profile-btn {
            width: 40px;
            height: 40px;
        }

        .profile-content, .edit-form {
            padding: 25px;
        }

        .info-grid, .form-grid {
            grid-template-columns: repeat(2, 1fr);
            gap: 20px;
        }

        .btn {
            padding: 10px 20px;
        }
    }

    @media (min-width: 992px) {
        .info-grid, .form-grid {
            grid-template-columns: repeat(3, 1fr);
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
                        <?php include("pages/profile/profile_body.php"); ?>
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
    <script>
        $(document).ready(function () {
            $('#profileDisplay').show();
            $('#profileEditForm').hide();
            $('#imageUploadContainer').addClass('d-none');
            
            $('#editProfile').on('click', function() {
                $('#profileDisplay').hide();
                $('#profileEditForm').removeClass('d-none').show();
                $('#imageUploadContainer').removeClass('d-none');
                $('#editProfile').hide();
            });

            $('#cancelEdit').on('click', function() {
                $('#profileEditForm').addClass('d-none').hide();
                $('#imageUploadContainer').addClass('d-none');
                $('#profileDisplay').show();
                $('#editProfile').show();
            });

            $('#imageUpload').on('change', function () {
                const file = this.files[0];
                const validTypes = ['image/png', 'image/jpg', 'image/jpeg'];
                if (file && !validTypes.includes(file.type)) {
                    alert('Please upload a valid image file (PNG, JPG, or JPEG).');
                    this.value = ''; // Clear the input
                    return;
                }
                // Optional: Preview the image
                if (file) {
                    const reader = new FileReader();
                    reader.onload = function (e) {
                        $('#imagePreview').css('background-image', `url(${e.target.result})`);
                    };
                    reader.readAsDataURL(file);
                }
            });

            initializeDataTable();
            $('#country').on('change', function() {
                loadstateDropdown();
            });

            $('#state').on('change', function() {
                var stateId = $(this).val();
                loadDistrictDropdown(stateId);
            });
            
            function initializeDataTable() {
                $.ajax({
                    url: "../controller/registration_controller.php",
                    type: "POST",
                    dataType: 'json',
                    data: {
                        action: 'get_details'
                    },
                    success: function(response) {
                        try {
                            // Sometimes response comes as string even when expecting JSON
                            if (typeof response === 'string') {
                                response = JSON.parse(response);
                            }
                            
                            console.log("Parsed Response:", response);
                            
                            if (response.status === 'error') {
                                alert(response.message);
                                return;
                            }
                            
                            if (Array.isArray(response) && response.length > 0) {
                                populateFormFields(response[0]);
                            } else {
                                alert("Unexpected response format");
                                console.log(response);
                            }
                        } catch (e) {
                            console.error("Parsing error:", e);
                            console.log("Raw response:", response);
                            alert("Error processing response");
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error:", status, error);
                        console.log("Full error response:", xhr.responseText);
                        alert("An error occurred while fetching subscriber details. Check console for details.");
                    }
                });
            }

            function populateFormFields(subscriberData) {
                console.log("Populating form with:", subscriberData);
                
                $('#display_name').text(subscriberData.customer_name || 'N/A');
                $('#display_address').text(subscriberData.permenant_address || 'N/A');
                $('#display_phone').text(subscriberData.mobile_no || 'N/A');
                $('#display_whatsapp').text(subscriberData.whatsapp_no || 'N/A');
                $('#display_postal_code').text(subscriberData.postal_code || 'N/A');
                $('#display_country').text(subscriberData.country_name || 'N/A');
                $('#display_state').text(subscriberData.state_name || 'N/A');
                $('#display_district').text(subscriberData.district || 'N/A');
                $('#display_street').text(subscriberData.street || 'N/A');
                $('#display_gender').text(subscriberData.gender || 'N/A');
                $('#display_dob').text(subscriberData.date_of_birth || 'N/A');

                // Handle image
                if (subscriberData.Image) {
                    $('#imagePreview').css('background-image', 'url(../httpdocs/images/' + subscriberData.Image + ')');
                } else {
                    $('#imagePreview').attr('src', 'https://via.placeholder.com/150');
                }

                // Set basic fields
                $('#customer_name').html(`${subscriberData.customer_name || 'N/A'}`);
                $('#email_id_span').html(`${subscriberData.email_user_name || 'N/A'}`);
            
                $('#email_id').val(subscriberData.email_user_name || '');
                $('#ids').val(subscriberData.ids || '');
                $('#name').val(subscriberData.customer_name || '');
                $('#address').val(subscriberData.permenant_address || '');
                $('#phone').val(subscriberData.mobile_no || '');
                $('#whatsapp').val(subscriberData.whatsapp_no || '');
                $('#postal_code').val(subscriberData.postal_code || '');
                $('#street').val(subscriberData.street || '');
                $('#dob').val(subscriberData.date_of_birth || '');
                
                if (subscriberData.gender) {
                    const genderValue = subscriberData.gender.toLowerCase();
                    // First try exact match
                    $('#gender option').each(function() {
                        if ($(this).val().toLowerCase() === genderValue) {
                            $(this).prop('selected', true);
                            return false; // break loop
                        }
                    });
                    
                    // If still not selected, try partial match
                    if ($('#gender').val() === '') {
                        $('#gender option').each(function() {
                            if ($(this).val().toLowerCase().includes(genderValue) || 
                                $(this).text().toLowerCase().includes(genderValue)) {
                                $(this).prop('selected', true);
                                return false; // break loop
                            }
                        });
                    }
                }
                
                // Store the location data for later use
                window.subscriberLocationData = {
                    country: subscriberData.country || '',
                    state: subscriberData.state || '',
                    district: subscriberData.district || ''
                };
                
                // Load country dropdown first - this will trigger the chain to load states and districts
                loadcountryDropdown(subscriberData.country);
            }

            // function setDropdownSelection(selector, value) {
            //     if (!value) return;
                
            //     // Try exact match first
            //     $(selector + ' option').each(function() {
            //         if ($(this).text().toLowerCase() === value.toLowerCase()) {
            //             $(this).prop('selected', true);
            //             return false; // break loop
            //         }
            //     });
                
            //     // If not found, try partial match
            //     if ($(selector + ' option:selected').val() === '') {
            //         $(selector + ' option').each(function() {
            //             if ($(this).text().toLowerCase().includes(value.toLowerCase())) {
            //                 $(this).prop('selected', true);
            //                 return false; // break loop
            //             }
            //         });
            //     }
                
            //     console.log(`Set ${selector} to ${value} - selected value is now ${$(selector).val()}`);
            // }
            function setDropdownSelection(selector, value) {
                if (!value) return;

                let found = false;

                $(selector + ' option').each(function () {
                    // Match by VALUE first (important)
                    if ($(this).val().toLowerCase() === value.toLowerCase()) {
                        $(selector).val($(this).val()).trigger('change');
                        found = true;
                        return false;
                    }
                });

                // If not found, match by TEXT
                if (!found) {
                    $(selector + ' option').each(function () {
                        if ($(this).text().toLowerCase().includes(value.toLowerCase())) {
                            $(selector).val($(this).val()).trigger('change');
                            return false;
                        }
                    });
                }

                console.log(`Set ${selector} to ${value} → selected: ${$(selector).val()}`);
            }

            function validateForm() {
                const name = document.getElementById("name").value.trim();
                const address = document.getElementById("address").value.trim();
                const phone = document.getElementById("phone").value.trim();
                const whatsapp = document.getElementById("whatsapp").value.trim();

                const nameRegex = /^[a-zA-Z\s.]{2,50}$/;

                if (phone.length !== 10) {
                    alert("Phone number must be exactly 10 digits.");
                    return false;
                }
                if (whatsapp.length !== 10) {
                    alert("whatsapp number must be exactly 10 digits.");
                    return false;
                }

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

                return true;
            }

            $('#update').on('click', function () {
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
                // formData.append('district', $('#div_district option:selected').text());
                // formData.append('state', $('#state option:selected').text());
                formData.append('street', $('#street').val());
                // formData.append('country', $('#country option:selected').text());
                formData.append('state', $('#state').val());
                formData.append('country', $('#country').val());
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
                    processData: false,
                    contentType: false,
                    dataType: 'json', // Expect JSON response
                    success: function (res) {
                        if (res.status === 'success') {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Details updated successfully.', 'click');
                            $('.editable').prop('disabled', true);
                            initializeDataTable();
                            $('#profileEditForm').addClass('d-none').hide();
                            $('#imageUploadContainer').addClass('d-none'); // Hide image upload on success
                            $('#profileDisplay').show();
                            $('#editProfile').show()
                        } else {
                            alert(res.message); // Display server-side error message
                        }
                    },
                    error: function (xhr, status, error) {
                        console.error("AJAX error:", status, error);
                        alert("An error occurred while updating profile. Please try again.");
                    }
                });
            });

            function loadcountryDropdown(selectedCountry) {
                
                console.log("Loading countries, selecting:", selectedCountry);
                $.ajax({
                    url: "../controller/registration_controller.php",
                    type: "POST",
                    data: { action: "get_country" },
                    success: function(response) {
                        try {
                            $('#country').html(response);
                            
                            // If we have a country to select, try to find it
                            if (selectedCountry) {
                                setDropdownSelection('#country', selectedCountry);
                                
                                // After country is set, load states
                                loadstateDropdown(window.subscriberLocationData.state);
                            }
                        } catch (e) {
                            console.error("Error processing countries:", e);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error loading countries:", status, error);
                        $('#country').html('<option value="">Error loading countries</option>');
                    }
                });
            }

            function loadstateDropdown(selectedState) {
                console.log("Loading states for country:", $('#country').val(), "selecting:", selectedState);
                $.ajax({
                    url: "../controller/registration_controller.php",
                    type: "POST",
                    data: { 
                        action: "get_state",
                        country_id: $('#country option:selected').val() // Pass the selected country ID
                    },
                    success: function(response) {
                        $('#state').html(response);
                        
                        // If we have a state to select, try to find it
                        if (selectedState) {
                            setDropdownSelection('#state', selectedState);
                            
                            // After state is set, load districts
                            // loadDistrictDropdown(window.subscriberLocationData.district);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error loading states:", status, error);
                        $('#state').html('<option value="">Error loading states</option>');
                    }
                });
            }

            function loadDistrictDropdown(selectedDistrict) {
                var stateId = $('#state option:selected').val();
                console.log("Loading districts for state:", stateId, "selecting:", selectedDistrict);
                
                if (!stateId) {
                    $('#div_district').html('<option value="">Select state first</option>');
                    return;
                }
                
                $.ajax({
                    url: "../controller/registration_controller.php",
                    type: "POST",
                    data: { 
                        action: "get_districts", 
                        stateid: stateId 
                    },
                    success: function(response) {
                        $('#div_district').html(response);
                        
                        // If we have a district to select, try to find it
                        if (selectedDistrict) {
                            setDropdownSelection('#div_district', selectedDistrict);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error loading districts:", status, error);
                        $('#div_district').html('<option value="">Error loading districts</option>');
                    }
                });
            }
        });
    </script>
</body>
</html>