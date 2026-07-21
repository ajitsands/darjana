
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
        .row {
            --bs-gutter-x: 1rem;
        }
        .dt-controls {
            cursor: pointer;
            text-align: center;
        }
        .shown .dt-controls::before {
            content: "-";
            color: red;
            font-size: 20px;
        }
        .dt-controls::before {
            content: "+";
            color: green;
            font-size: 20px;
        }

        #vendorTable {
            width: 100% !important;
            border-collapse: collapse !important;
        }

        #vendorTable th, 
        #vendorTable td {
            white-space: nowrap;
            overflow: hidden;
            text-overflow: ellipsis;
            padding: 8px;
            border: 1px solid #ddd;
        }

        #vendorTable thead th {
            background-color: #f8f9fa;
            font-weight: bold;
        }

        #vendorTable tbody tr:nth-child(odd) {
            background-color: #f9f9f9;
        }

        #vendorTable tbody tr:hover {
            background-color: #f1f1f1;
        }

        #vendorTable tbody tr.selected {
            background-color: #e6f2ff !important;
            border-left: 3px solid #0066cc !important;
        }
        
        .table-responsive {
            overflow-x: auto;
            -webkit-overflow-scrolling: touch;
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

            <div class="container-fluid flex-grow-1 container-p-y">
                
               <?PHP include("pages/add_home_offer_body.php"); ?>
              
              
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
    <script src="../../assets/js/logout.js"></script>
    
    <script>
	$(document).ready(function() {
	    fetchCategories();
		function fetchCategories() {
            $.ajax({
                url: '../controller/add_product/product_controller.php',
                type: 'POST',
                data: {
                    action: 'fetch_categories'
                },
                success: function(response) {
                    var categories = JSON.parse(response);
                    var options =
                        '<option value="" disabled selected>- Please Select -</option>';

                    categories.forEach(function(category) {
                        options +=
                            `<option value="${category.ids}">${category.category_type}</option>`;
                    });

                    $('#category_name').html(options).trigger(
                        'change'); // Trigger change to re-render Select2
                },
                error: function() {
                    console.error('Error fetching categories');
                }
            });
        }
        
        $('#category_name').on('change', function() {
            var categoryId = $(this).val();
            if (categoryId === 'add_new_category') {
                $('#addCategoryModal').modal('show');
            } else {
                fetchSubCategories(categoryId);
            }
        });
	});
    </script>        
  </body>
</html>