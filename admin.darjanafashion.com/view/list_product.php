<?php
session_start();
require_once '../../model/common/common_functions.php';

$controller = new CommonModel();
$categories_query = "SELECT * FROM category_details WHERE status = 'active'";
$categories = json_decode($controller->ListFromTable($categories_query), true);
?>

<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default" data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">
<?php include("templates/head.php"); ?>
<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <?php include("templates/navbar.php"); ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <?php include("templates/menu.php"); ?>
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php include("pages/list_product_body.php"); ?>
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
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/vendor/libs/bloodhound/bloodhound.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="../../assets/sands/settings.js"></script>
    <script src="../../assets/sands/sands_popup.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/spin.min.js"></script>
    <script src="https://msurguy.github.io/ladda-bootstrap/dist/ladda.min.js"></script>

    <script>
    $(document).ready(function() {
        $('#category_name').select2({ placeholder: '- Select Category -', allowClear: true });
        $('#sub_category_name').select2({ placeholder: '- Select Sub Category -', allowClear: true });
        $('#product_color').select2({ placeholder: '- Select Color -', allowClear: true });
        $('#product_size').select2({ placeholder: '- Select Size -', allowClear: true });

        $('#category_name').on('change', function() {
            var categoryId = $(this).val();
            $('#sub_category_name').prop('disabled', true).html('<option value="" disabled selected>- Select Sub Category -</option>');
            $('#product_color').prop('disabled', true).html('<option value="" disabled selected>- Select Color -</option>');
            $('#product_size').prop('disabled', true).html('<option value="" disabled selected>- Select Size -</option>');

            if (categoryId) {
                $.ajax({
                    url: '../controller/list_product_controller.php',
                    type: 'POST',
                    data: { action: 'fetch_sub_categories', category_id: categoryId },
                    success: function(response) {
                        var subCategories = JSON.parse(response);
                        var options = '<option value="" disabled selected>- Select Sub Category -</option>';
                        subCategories.forEach(function(subCategory) {
                            options += `<option value="${subCategory.ids}">${subCategory.sub_category}</option>`;
                        });
                        $('#sub_category_name').html(options).prop('disabled', false).trigger('change');
                    },
                    error: function() {
                        swal('Error', 'Failed to fetch subcategories', 'error');
                    }
                });
            }
            loadProductTable();
        });

        $('#sub_category_name').on('change', function() {
            var subCategoryId = $(this).val();
            $('#product_color').prop('disabled', true).html('<option value="" disabled selected>- Select Color -</option>');
            $('#product_size').prop('disabled', true).html('<option value="" disabled selected>- Select Size -</option>');

            if (subCategoryId) {
                $.ajax({
                    url: '../controller/list_product_controller.php',
                    type: 'POST',
                    data: { action: 'fetch_colors', sub_category_id: subCategoryId },
                    success: function(response) {
                        var colors = JSON.parse(response);
                        var options = '<option value="" disabled selected>- Select Color -</option>';
                        colors.forEach(function(color) {
                            options += `<option value="${color.product_color}">${color.product_color}</option>`;
                        });
                        $('#product_color').html(options).prop('disabled', false).trigger('change');
                    },
                    error: function() {
                        swal('Error', 'Failed to fetch colors', 'error');
                    }
                });
            }
            loadProductTable();
        });

        $('#product_color').on('change', function() {
            var subCategoryId = $('#sub_category_name').val();
            var color = $(this).val();
            $('#product_size').prop('disabled', true).html('<option value="" disabled selected>- Select Size -</option>');

            if (color && subCategoryId) {
                $.ajax({
                    url: '../controller/list_product_controller.php',
                    type: 'POST',
                    data: { action: 'fetch_sizes', sub_category_id: subCategoryId, color: color },
                    success: function(response) {
                        var sizes = JSON.parse(response);
                        var options = '<option value="" disabled selected>- Select Size -</option>';
                        sizes.forEach(function(size) {
                            options += `<option value="${size.product_size}">${size.product_size}</option>`;
                        });
                        $('#product_size').html(options).prop('disabled', false).trigger('change');
                    },
                    error: function() {
                        swal('Error', 'Failed to fetch sizes', 'error');
                    }
                });
            }
            loadProductTable();
        });

        $('#product_size').on('change', function() {
            loadProductTable();
        });

        function loadProductTable() {
            if ($.fn.DataTable.isDataTable('#productTable')) {
                $('#productTable').DataTable().destroy();
            }

            $('#productTable').DataTable({
                processing: true,
                serverSide: false,
                ajax: {
                    type: 'POST',
                    url: '../controller/list_product_controller.php',
                    data: function(d) {
                        d.action = 'list_products';
                        d.category_id = $('#category_name').val();
                        d.sub_category_id = $('#sub_category_name').val();
                        d.color = $('#product_color').val();
                        d.size = $('#product_size').val();
                    },
                    dataSrc: 'data'
                },
                language: {
                    zeroRecords: "No products found",
                    infoEmpty: "No products available",
                },
                order: [],
                ordering: false,
                scrollX: false,
                scrollCollapse: false,
                paging: true,
                lengthChange: false,
                pageLength: 10,
                pagingType: "simple_numbers",
                searching: true,
                info: true,
                autoWidth: false,
                columns: [
                    {
                        className: 'dt-control',
                        orderable: false,
                        searchable: false,
                        data: null,
                        defaultContent: '',
                        width: "30px"
                    },
                    {
                        data: null,
                        render: function(data, type, row, meta) {
                            return meta.row + 1;
                        }
                    },
                    { data: 'product_name', title: 'Product Name' },
                    { data: 'product_brand_name', title: 'Brand Name' },
                    { data: 'category_name', title: 'Category' },
                    { data: 'sub_category_name', title: 'Subcategory' },
                    { data: 'amount_mrp', title: 'MRP (₹)' },
                    { data: 'amount_selling', title: 'Selling Price (₹)' },
                    { data: 'amount_offer', title: 'Offer Price (₹)' },
                    {
                        data: 'status',
                        render: function(data) {
                            return data === 'Active' ?
                                '<span style="color: white; background-color: green; padding: 4px 8px; border-radius: 4px;">Active</span>' :
                                '<span style="color: white; background-color: red; padding: 4px 8px; border-radius: 4px;">Deactive</span>';
                        }
                    }
                ],
                responsive: false,
                initComplete: function() {
                    $('#datatable_search_container').append($('#productTable_filter'));
                }
            });

            $('#productTable tbody').on('click', 'td.dt-control', function() {
                var tr = $(this).closest('tr');
                var row = $('#productTable').DataTable().row(tr);
                var isShown = row.child.isShown();

                $('#productTable').DataTable().rows().every(function() {
                    if (this.child.isShown() && this.index() !== row.index()) {
                        this.child.hide();
                        $(this.node()).find('.dt-control i').removeClass('ri-subtract-line').addClass('ri-add-circle-line');
                        $(this.node()).removeClass('shown');
                    }
                });

                if (isShown) {
                    row.child.hide();
                    tr.removeClass('shown');
                    $(this).find('i').removeClass('ri-subtract-line').addClass('ri-add-circle-line');
                } else {
                    var childContent = '<div class="p-3">' +
                        '<p><strong>Description:</strong> ' + row.data().product_description + '</p>' +
                        '</div>';
                    row.child(childContent).show();
                    tr.addClass('shown');
                    $(this).find('i').removeClass('ri-add-circle-line').addClass('ri-subtract-line');
                }

                $('#productTable tbody tr').removeClass('selected');
                tr.addClass('selected');
            });

            $('#productTable tbody').on('click', 'tr', function(e) {
                if (!$(e.target).hasClass('dt-control') && !$(e.target).closest('td').hasClass('dt-control')) {
                    $('#productTable tbody tr').removeClass('selected');
                    $(this).addClass('selected');
                }
            });
        }
    });
    </script>
</body>
</html>