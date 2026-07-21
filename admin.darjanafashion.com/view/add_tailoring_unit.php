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
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />
    <!-- Bootstrap CSS -->
    <!--<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">-->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">
    
    
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <script src="../../assets/vendor/js/template-customizer.js"></script>

    <script src="../../assets/js/config.js"></script>
     <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- DataTables JS -->
    
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
       .container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
             padding-top: .2rem !important;
        }
        @media (min-width: 992px) {
            .container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
                padding-right: .5rem;
                padding-left: .5rem;
            }
        }
        .action-icon{
            cursor:pointer;
            font-size:18px;
            margin-right:10px;
            transition:0.2s;
        }
        
        .action-icon:hover{
            transform:scale(1.2);
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
              <?php include("pages/add_tailoring_unit_body.php"); ?>
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
          
          
          $(document).on('click', '#btn_add_unit', function () {

    let unit_id = $('#unit_id').val();
    let unit_name = $('#unit_name').val().trim();
    let contact_person = $('#contact_person').val().trim();
    let phone = $('#phone').val().trim();
    let email = $('#email').val().trim();
    let address = $('#address').val().trim();

    if(unit_name == ''){
        Swal.fire.fire({
            title: "Warning",
            text: "Please enter Unit Name.",
            icon: "warning"
        });
        $('#unit_name').focus();
        return;
    }

    if(contact_person == ''){
        Swal.fire({
                    title: "Warning",
                    text: "Please enter Contact Person.",
                    icon: "warning",
                });
        
        $('#contact_person').focus();
        return;
    }

    let action = unit_id ? "update_unit" : "add_tailoring_unit";
   
    $.ajax({
        url: "../controller/tailoring/tailoring_controller.php",
        type: "POST",
        data: {
            action: action,
            unit_id: unit_id,
            unit_name: unit_name,
            contact_person: contact_person,
            phone: phone,
            email: email,
            address: address
        },
        success: function(response){

            let res = JSON.parse(response);

            if(res.status == "success"){

                Swal.fire({
                    title: "Success",
                    text: res.message,
                    icon: "success",
                });
                loadUnitsTable(); // reload datatable if exists
                
                $('#unit_id').val('');
                $('#unit_name').val('');
                $('#contact_person').val('');
                $('#phone').val('');
                $('#email').val('');
                $('#address').val('');
                $('#btn_add_unit span').text('Add Unit');

                loadUnitsTable(); // reload datatable if exists
            }
            else{
                Swal.fire({
                    title: "Error",
                    text: res.message,
                    icon: "error",
                });
            }

        }
    });

});

loadUnitsTable();
function loadUnitsTable()
{
    $.ajax({
        url: "controller/tailoring/tailoring_controller.php",
        type: "POST",
        data: { action: "list_tailoring_detailes" },
        dataType: "json",
        success: function(response)
        {
            let html = "";
            let i = 1;

            $.each(response.data, function(index, row)
            {
                
                let statusLabel = row.status == 'Active'
                    ? '<span class="badge bg-success">Active</span>'
                    : '<span class="badge bg-danger">Inactive</span>';

                let statusIcon = row.status == 'Active'
                    ? '<i class="bi bi-toggle-on text-success"></i>'
                    : '<i class="bi bi-toggle-off text-danger"></i>';
                html += `<tr>
                    <td>${i++}</td>
                    <td>${row.unit_name}</td>
                    <td>${row.contact_person}</td>
                    <td>${row.phone}</td>
                    <td>${row.email}</td>
                    <td>${row.address}</td>
                    <td>${statusLabel}</td>
                    <td>
                        <i class="bi bi-pencil-square text-primary edit_unit"
                        style="cursor:pointer; font-size:18px;"
                        data-id="${row.ids}"
                        data-name="${row.unit_name}"
                        data-person="${row.contact_person}"
                        data-phone="${row.phone}"
                        data-email="${row.email}"
                        data-address="${row.address}"
                        title="Edit"></i>
                
                    &nbsp;&nbsp;
                
                    <i class="ri-toggle-${row.status == 1 ? 'fill text-success' : 'line text-danger'} change_status"
                        style="cursor:pointer;font-size:20px"
                        data-id="${row.ids}"
                        data-status="${row.status}"
                        title="Change Status"></i>
                    </td>
                </tr>`;
            });

            $("#unit_tbody").html(html);
        }
    });
}
  $(document).on("click",".edit_unit",function(){
    $('#btn_add_unit span').text('Update Unit');
    $("#unit_id").val($(this).data("id"));
    $("#unit_name").val($(this).data("name"));
    $("#contact_person").val($(this).data("person"));
    $("#phone").val($(this).data("phone"));
    $("#email").val($(this).data("email"));
    $("#address").val($(this).data("address"));

}); 

$('#btn_clear_unit').click(function () {

    $('#unit_id').val('');
    $('#unit_name').val('');
    $('#contact_person').val('');
    $('#phone').val('');
    $('#email').val('');
    $('#address').val('');

});
$(document).on("click", ".change_status", function () {

    let id = $(this).data("id");
    let status = $(this).data("status");
    let new_status = status == 'Active' ? 'Inactive' : 'Active';

    Swal.fire({
        title: "Are you sure?",
        text: "Do you want to change the status?",
        icon: "warning",
        showCancelButton: true,
        confirmButtonColor: "#3085d6",
        cancelButtonColor: "#d33",
        confirmButtonText: "Yes, change it!"
    }).then((result) => {

        if (result.isConfirmed) {

            $.ajax({
                url: "controller/tailoring/tailoring_controller.php",
                type: "POST",
                data: {
                    action: "change_status",
                    unit_id: id,
                    status: new_status
                },
                dataType: "json",
                success: function (response) {

                    if (response.status === "success") {

                        Swal.fire(
                            "Updated!",
                            "Status changed successfully.",
                            "success"
                        );

                        loadUnitsTable(); // reload table
                    }

                }
            });

        }

    });

});
          
        });
    </script>
  </body>
</html>