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
              <?php include("pages/add_vendor_body.php"); ?>
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
    <!--<style>-->
    <!--     #vendor-profile-form .form-control {-->
    <!--      height: 20px !important;-->
    <!--      padding-top: 0.3rem !important;-->
    <!--      padding-bottom: 0.3rem !important;-->
    <!--      font-size: 0.85rem !important;-->
          <!--width: 100% !important; -->
    <!--    }-->
        
    <!--    #vendor-profile-form .form-floating > .form-control ~ label {-->
    <!--      padding-top: 0.7rem !important;-->
    <!--      padding-left: 0.75rem !important;-->
    <!--      font-size: 0.75rem !important;-->
    <!--    }-->
        
    <!--    #vendor-profile-form .form-floating > .form-control {-->
    <!--      height: 20px !important;-->
          <!--width: 100% !important; -->
    <!--    }-->
    <!--</style>-->
    <script>
      $(document).ready(function() {
          // Initialize Select2 for dropdowns
          $('#vendor-country, #vendor-state, #vendor-district, #vendor-business-type').select2({
            width: '100%',
            placeholder: '-- Select --',
            allowClear: true
          });
        
          // Password visibility toggle
          $('#toggle-password').on('click', function () {
            var passwordField = $('#vendor-password');
            var icon = $(this);
            if (passwordField.attr('type') === 'password') {
              passwordField.attr('type', 'text');
              icon.removeClass('ri-eye-off-line').addClass('ri-eye-line');
            } else {
              passwordField.attr('type', 'password');
              icon.removeClass('ri-eye-line').addClass('ri-eye-off-line');
            }
          });
        
          // Show KYC details modal
          $('#kyc-details-link').on('click', function() {
            $('#kycDetailsModal').modal('show');
          });
        
          // Function to fetch countries
          function loadCountries(selectedCountry) {
            $.ajax({
              type: 'POST',
              url: '../controller/add_vendor/vendor_controller.php',
              data: { action: 'get_countries' },
              dataType: 'json',
              success: function(response) {
                var $countrySelect = $('#vendor-country');
                $countrySelect.empty().append('<option value="" selected disabled>-- Select Country --</option>');
                if (response && response.length > 0) {
                  $.each(response, function(index, country) {
                    $countrySelect.append(`<option value="${country.country}">${country.country}</option>`);
                  });
                  if (selectedCountry) {
                    $countrySelect.val(selectedCountry).trigger('change');
                  }
                }
              },
              error: function(xhr, error) {
                console.error('Error fetching countries:', error);
                Swal.fire({
                  title: 'Error',
                  text: 'Failed to load countries.',
                  icon: 'error',
                  confirmButtonText: 'OK'
                });
              }
            });
          }
        
          // Function to fetch states based on country name
          function loadStates(country, selectedState) {
            var $stateSelect = $('#vendor-state');
            $stateSelect.prop('disabled', true).empty().append('<option value="" selected disabled>-- Select State --</option>');
            if (country) {
              $.ajax({
                type: 'POST',
                url: '../controller/add_vendor/vendor_controller.php',
                data: { action: 'get_states', country: country },
                dataType: 'json',
                success: function(response) {
                  if (response && response.length > 0) {
                    $.each(response, function(index, state) {
                      $stateSelect.append(`<option value="${state.state_name}">${state.state_name}</option>`);
                    });
                    $stateSelect.prop('disabled', false);
                    if (selectedState) {
                      $stateSelect.val(selectedState).trigger('change');
                    }
                  }
                },
                error: function(xhr, error) {
                  console.error('Error fetching states:', error);
                  Swal.fire({
                    title: 'Error',
                    text: 'Failed to load states.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  });
                }
              });
            }
          }
        
          // Function to fetch districts based on state name
          function loadDistricts(state, selectedDistrict) {
            var $districtSelect = $('#vendor-district');
            $districtSelect.prop('disabled', true).empty().append('<option value="" selected disabled>-- Select District --</option>');
            if (state) {
              $.ajax({
                type: 'POST',
                url: '../controller/add_vendor/vendor_controller.php',
                data: { action: 'get_districts', state: state },
                dataType: 'json',
                success: function(response) {
                  if (response && response.length > 0) {
                    $.each(response, function(index, district) {
                      $districtSelect.append(`<option value="${district.district_name}">${district.district_name}</option>`);
                    });
                    $districtSelect.prop('disabled', false);
                    if (selectedDistrict) {
                      $districtSelect.val(selectedDistrict).trigger('change');
                    }
                  }
                },
                error: function(xhr, error) {
                  console.error('Error fetching districts:', error);
                  Swal.fire({
                    title: 'Error',
                    text: 'Failed to load districts.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  });
                }
              });
            }
          }
        
          // Load countries on page load
          loadCountries();
        
          // Load states when country changes
          $('#vendor-country').on('change', function() {
            var country = $(this).val();
            $('#vendor-state').val(null).trigger('change');
            $('#vendor-district').val(null).trigger('change');
            loadStates(country);
          });
        
          // Load districts when state changes
          $('#vendor-state').on('change', function() {
            var state = $(this).val();
            $('#vendor-district').val(null).trigger('change');
            loadDistricts(state);
          });
        
          // Load vendor details for the logged-in vendor
          function loadVendorDetails() {
            var vendorId = $('#vendor-id').val();
            if (vendorId) {
              $.ajax({
                type: 'POST',
                url: '../controller/add_vendor/vendor_controller.php',
                data: {
                  action: 'get_vendor_details',
                  vendor_id: vendorId
                },
                dataType: 'json',
                success: function(response) {
                  if (response.success && response.data) {
                    var vendor = response.data;
                    $('#vendor-first-name').val(vendor.first_name || '');
                    $('#vendor-second-name').val(vendor.second_name || '');
                    $('#vendor-gmail-id').val(vendor.gmail_id || '');
                    $('#vendor-username').val(vendor.username || '');
                    $('#vendor-password').val(vendor.password || '');
                    $('#vendor-business-type').val(vendor.business_type || '0').trigger('change');
                    $('#vendor-address').val(vendor.address || '');
                    $('#vendor-street').val(vendor.street || '');
                    $('#vendor-pickup-pincode').val(vendor.pickup_pincode || '');
                    $('#vendor-landmark').val(vendor.landmark || '');
                    $('#vendor-tax-percentage').val(vendor.tax_percentage || '');
                    $('#vendor-cod-fee').val(vendor.cod_fee || '');
                    $('#vendor-tax-type').val(vendor.tax_type || '0').trigger('change');
                    $('#vendor-contact-number').val(vendor.vendor_whatsapp || '');
                    $('#vendor-business-number').val(vendor.chat_whatsapp || '');
                    
                    // Populate country and trigger state/district population
                    if (vendor.country) {
                      loadCountries(vendor.country);
                      if (vendor.state) {
                        loadStates(vendor.country, vendor.state);
                        if (vendor.district) {
                          setTimeout(function() {
                            loadDistricts(vendor.state, vendor.district);
                          }, 500); // Delay to ensure states are loaded
                        }
                      }
                    }
        
                    // Display KYC files if exist
                    if (response.kyc_filename && response.kyc_filename.length > 0) {
                      var fileLinks = response.kyc_filename.map(function(filename) {
                        return `<a href="https://shopping.sandslab.com/kyc/${encodeURIComponent(filename)}" target="_blank">${filename}</a>`;
                      }).join(', ');
                      $('#kyc-file-name').html(fileLinks);
                    } else {
                      $('#kyc-file-name').text('No files uploaded');
                    }
                  } else {
                    Swal.fire({
                      title: 'Error',
                      text: 'No vendor data found',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
                  }
                },
                error: function(xhr, error) {
                  console.error('AJAX Error: ', error);
                  Swal.fire({
                    title: 'Error',
                    text: 'Failed to load vendor details.',
                    icon: 'error',
                    confirmButtonText: 'OK'
                  });
                }
              });
            } else {
              Swal.fire({
                title: 'Error',
                text: 'Vendor ID is missing.',
                icon: 'error',
                confirmButtonText: 'OK'
              });
            }
          }
        
          // Load vendor details on page load
          loadVendorDetails();
        
          // Update vendor profile
          $('#btn_update_vendor').on('click', function(e) {
            e.preventDefault();
            var laddaButton = Ladda.create(this);
            laddaButton.start();
            let isValid = true;
        
            // Validation section
            var vendorId = $('#vendor-id').val().trim();
            if (!vendorId) {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Vendor ID is missing.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var firstName = $('#vendor-first-name').val().trim();
            if (firstName === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the first name.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var secondName = $('#vendor-second-name').val().trim();
            if (secondName === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the second name.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var gmailId = $('#vendor-gmail-id').val().trim();
            if (gmailId === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the email.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var username = $('#vendor-username').val().trim();
            if (username === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the username.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var password = $('#vendor-password').val().trim();
            if (password === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the password.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var businessType = $('#vendor-business-type').val().trim();
            if (businessType === '0' || businessType === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please select a business type.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var address = $('#vendor-address').val().trim();
            if (address === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the address.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var pickupPincode = $('#vendor-pickup-pincode').val().trim();
            if (pickupPincode === '') {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter the pickup pincode.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var country = $('#vendor-country').val();
            if (!country) {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please select a country.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
        
            var state = $('#vendor-state').val();
            if (!state) {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please select a state.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
            
             var vendor_contact_number = $('#vendor-contact-number').val();
            
            if (!vendor_contact_number) {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter a contact no.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
            
             var vendor_business_number = $('#vendor-business-number').val();
            
            if (!vendor_business_number) {
              isValid = false;
              Swal.fire({
                title: 'Warning',
                text: 'Please enter a contact no.',
                icon: 'warning',
                confirmButtonText: 'OK'
              });
              laddaButton.stop();
              return;
            }
            var street = $('#vendor-street').val().trim();
            var district = $('#vendor-district').val();
            var landmark = $('#vendor-landmark').val().trim();
            var kycFiles = $('#vendor-kyc-file')[0].files;
            var taxPercentage = $('#vendor-tax-percentage').val().trim();
            var codFee = $('#vendor-cod-fee').val().trim();
            if (isValid) {
              let formData = new FormData();
              formData.append('vendor_id', vendorId);
              formData.append('first_name', firstName);
              formData.append('second_name', secondName);
              formData.append('gmail_id', gmailId);
              formData.append('username', username);
              formData.append('password', password);
              formData.append('business_type', businessType);
              formData.append('address', address);
              formData.append('street', street);
              formData.append('district', district || '');
              formData.append('state', state);
              formData.append('country', country);
              formData.append('pickup_pincode', pickupPincode);
              formData.append('landmark', landmark);
              formData.append('tax_percentage', taxPercentage);
              formData.append('cod_fee', codFee);
              formData.append('tax_type', $('#vendor-tax-type').val());
              formData.append('action', 'update_vendor_details');
              formData.append('vendor_contact_number', vendor_contact_number);
              formData.append('vendor_business_number', vendor_business_number);
              
        
              // Add KYC files if selected
              if (kycFiles.length > 0) {
                let kycFilenames = [];
                for (let i = 0; i < kycFiles.length; i++) {
                  let file = kycFiles[i];
                  let fileExt = file.name.split('.').pop().toLowerCase();
                  let newFilename = 'kyc_' + vendorId + '_' + Date.now() + '_' + i + '.' + fileExt;
                  kycFilenames.push(newFilename);
                  formData.append('kyc_file[]', file, newFilename);
                }
                formData.append('kyc_filename', kycFilenames.join(','));
              }
        
              $.ajax({
                url: '../controller/add_vendor/vendor_controller.php',
                type: 'POST',
                data: formData,
                processData: false,
                contentType: false,
                success: function(response) {
                  try {
                    var jsonResponse = JSON.parse(response);
                    if (jsonResponse.success) {
                      laddaButton.stop();
                      Swal.fire({
                        title: 'Success',
                        text: jsonResponse.message || 'Vendor details updated successfully.',
                        icon: 'success',
                        confirmButtonText: 'OK'
                      });
                      // Update KYC display if files were uploaded
                      if (jsonResponse.kyc_filename) {
                        var fileLinks = jsonResponse.kyc_filename.split(',').map(function(filename) {
                          return `<a href="https://shopping.sandslab.com/kyc/${encodeURIComponent(filename)}" target="_blank">${filename}</a>`;
                        }).join(', ');
                        $('#kyc-file-name').html(fileLinks);
                      }
                      loadVendorDetails();
                      $('#vendor-kyc-file').val('');
                    } else {
                      Swal.fire({
                        title: 'Error',
                        text: jsonResponse.message || 'Failed to update vendor profile.',
                        icon: 'error',
                        confirmButtonText: 'OK'
                      });
                      laddaButton.stop();
                    }
                  } catch (e) {
                    Swal.fire({
                      title: 'Error',
                      text: 'Failed to parse server response.',
                      icon: 'error',
                      confirmButtonText: 'OK'
                    });
                    laddaButton.stop();
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
                  laddaButton.stop();
                }
              });
            }
          });
        });
    </script>
  </body>
</html>