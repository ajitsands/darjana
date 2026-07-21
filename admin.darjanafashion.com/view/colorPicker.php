
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
  <?PHP //include("templates/head.php"); ?>
  <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Darjana Admin</title>

    <meta name="description" content="" />

   
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

   
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />
     <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap"
      rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
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
	<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <script src="../../assets/vendor/js/helpers.js"></script>
   
    <script src="../../assets/vendor/js/template-customizer.js"></script>
   
    <script src="../../assets/js/config.js"></script>
  
    <style>
       {
            box-sizing: border-box;
            margin: 0;
            padding: 0;
        }

        body {
            font-family: Arial, sans-serif;
            /* display: flex; */
            justify-content: center;
            align-items: center;
            height: 100vh;
            /* padding: 20px; */
        }

        .container {
            display: flex;
            width: 100%;
            max-width: 1200px;
        }

        /* Color Picker Section (6 columns) */
        .color-picker-container {
            flex: 1;
            padding: 20px;
        }

        h2 {
            margin-bottom: 10px;
        }

        label {
            display: block;
            margin-top: 10px;
            font-weight: bold;
        }

        input[type="color"] {
            width: 100%;
            height: 40px;
            border: none;
            cursor: pointer;
        }

        .color-preview-container {
            display: flex;
            margin-top: 10px;
        }

        .color-preview {
            width: 50px;
            height: 50px;
            margin-right: 10px;
            border: 1px solid #ccc;
        }

        button {
            margin-top: 15px;
            padding: 10px;
            background-color: #007bff;
            color: #fff;
            border: none;
            cursor: pointer;
            width: 100%;
        }

        button:hover {
            background-color: #0056b3;
        }

        /* Mobile Preview Section (6 columns) */
        .mobile-preview-container {
			flex: 1;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 3px; /* Reduced height */
		}


        .mobile {
            width: 280px;
            height: 550px;
            border: 12px solid #333;
            border-radius: 20px;
            box-shadow: 0px 5px 15px rgba(0, 0, 0, 0.2);
            overflow: hidden;
            display: flex;
            flex-direction: column;
            background-color: var(--theme-color, #f4f4f4);
        }

        .mobile-header {
            height: 50px;
            background-color: var(--theme-color, #703838);
            color: var(--text-color, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 18px;
            font-weight: bold;
        }

        .mobile-content {
            flex: 1;
            padding: 20px;
            display: flex;
            flex-wrap: wrap;
            gap: 10px;
            justify-content: center;
            align-items: center;
        }

        .mobile-item {
            width: 70px;
            height: 70px;
            background-color: var(--button-color, #000);
            color: #fff;
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 14px;
            border-radius: 10px;
        }

        .mobile-footer {
            height: 50px;
            background-color: var(--theme-color, #703838);
            color: var(--text-color, #ffffff);
            display: flex;
            justify-content: center;
            align-items: center;
            font-size: 16px;
        }

        /* Responsive */
        @media (max-width: 768px) {
            .container {
                flex-direction: column;
                align-items: center;
            }

            .color-picker-container,
            .mobile-preview-container {
                width: 100%;
            }
        }
		.color-picker-mobile-container {
			display: flex;
			justify-content: center;
			align-items: flex-start;
			gap: 20px;
			padding: 30px 20px; /* Adds padding from the top */
		}

		.color-picker-container {
			flex: 1;
			max-width: 50%;
		}

		.mobile-preview-container {
			flex: 1;
			max-width: 50%;
			display: flex;
			justify-content: center;
			align-items: center;
			height: 400px; /* Reduced height */
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
                
               <?PHP include("pages/colorPickerBody.php"); ?>
              
              
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
    
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/spin.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/ladda.min.js"></script>
	<!--  <script src="../../assets/js/logout.js"></script>-->
    
    <script>
		$(document).ready(function () {
			let isSaving = false;

				// Function to fetch saved colors from the database
			function loadSavedColors() {
				$.ajax({
					url: '../controller/color_picker/color_controller.php',
					type: 'POST',
					data: { action: 'get_saved_colors' },
					dataType: 'json',
					success: function (response) {
						if (response && response.data && response.data.length > 0) {
							let colors = response.data[0]; // Access the first color set

							$('#theme-color').val(colors.color_code_theme);
							$('#text-color').val(colors.color_code_text);
							$('#button-color').val(colors.color_code_button);

							document.documentElement.style.setProperty('--theme-color', colors.color_code_theme);
							document.documentElement.style.setProperty('--text-color', colors.color_code_text);
							document.documentElement.style.setProperty('--button-color', colors.color_code_button);

							$('#theme-preview').css('background-color', colors.color_code_theme);
							$('#text-preview').css('background-color', colors.color_code_text);
							$('#button-preview').css('background-color', colors.color_code_button);
						} else {
							console.warn('No saved colors found.');
						}
					},
					error: function () {
						console.error('Error fetching saved colors');
					}
				});
			}


			$('#save-colors').on('click', function () {
				if (isSaving) return;
				isSaving = true;

				var themeColor = $('#theme-color').val();
				var textColor = $('#text-color').val();
				var buttonColor = $('#button-color').val();

				$.ajax({
					url: '../controller/color_picker/color_controller.php',
					type: 'POST',
					data: {
						action: 'change_color_theme',
						theme_color: themeColor,
						text_color: textColor,
						button_color: buttonColor
					},
					success: function (response) {
						let result = JSON.parse(response);
						if (result.status === 'success') {
							swal({
							title: 'Success!',
								text: 'Colors saved successfully.',
								icon: 'success',
								button: 'OK'
							});

							document.documentElement.style.setProperty('--theme-color', themeColor);
							document.documentElement.style.setProperty('--text-color', textColor);
							document.documentElement.style.setProperty('--button-color', buttonColor);
						} else {
							swal({
								title: 'Error!',
								text: 'Failed to save colors.',
								icon: 'error',
								button: 'OK'
							});
						}
					},
					error: function (xhr, status, error) {
						swal({
							title: 'Error!',
							text: 'An error occurred: ' + error,
							icon: 'error',
							button: 'OK'
						});
					},
					complete: function () {
						isSaving = false;
					}
				});
			});

			// Live preview of selected colors
			$('#theme-color, #text-color, #button-color').on('input', function () {
				document.documentElement.style.setProperty('--theme-color', $('#theme-color').val());
				document.documentElement.style.setProperty('--text-color', $('#text-color').val());
				document.documentElement.style.setProperty('--button-color', $('#button-color').val());

				$('#theme-preview').css('background-color', $('#theme-color').val());
				$('#text-preview').css('background-color', $('#text-color').val());
				$('#button-preview').css('background-color', $('#button-color').val());
			});

			// Load saved colors on page load
			loadSavedColors();
		});
	</script>


            
  </body>
</html>
