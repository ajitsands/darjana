<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}
require_once(__DIR__ . '/../controller/payment_settings_controller.php');
$controller = new PaymentSettingsController();
$settings = $controller->getSettings();
?>
<!doctype html>
<html lang="en" class="light-style layout-menu-fixed layout-compact" dir="ltr" data-theme="theme-default"
    data-assets-path="../../assets/" data-template="horizontal-menu-template" data-style="light">

<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Payment Gateway Settings - Darjana Admin</title>

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts & Icons -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&ampdisplay=swap" rel="stylesheet" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Core CSS & Vendor CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Helpers & Config -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
</head>

<body style="background-color: #f5f5f9;">
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <?php include(__DIR__ . "/../templates/navbar.php"); ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <?php include(__DIR__ . "/../templates/menu.php"); ?>
                    <div class="container-fluid flex-grow-1 container-p-y">
                        
                        <div class="row justify-content-center">
                            <div class="col-md-8 col-lg-6">
                                <div class="card mb-4 shadow-sm border-0">
                                    <div class="card-header d-flex justify-content-between align-items-center bg-primary text-white">
                                        <h5 class="mb-0 text-white"><i class="ri-bank-card-line me-2"></i>AFS Payment Gateway Settings</h5>
                                        <span class="badge bg-light text-dark">Bahrain Gateway</span>
                                    </div>
                                    <div class="card-body mt-3">
                                        <form id="payment-settings-form">
                                            <input type="hidden" name="action" value="save_payment_settings">
                                            
                                            <div class="mb-3">
                                                 <label class="form-label font-weight-bold" for="gateway_name">Gateway Name</label>
                                                 <input type="text" class="form-control" id="gateway_name" name="gateway_name" value="<?php echo htmlspecialchars($settings['gateway_name'] ?? 'AFS Payment Gateway (OPPWA)'); ?>" required>
                                             </div>

                                             <div class="mb-3">
                                                 <label class="form-label font-weight-bold" for="base_url">API Base URL / Endpoint</label>
                                                 <input type="url" class="form-control" id="base_url" name="base_url" placeholder="https://test.oppwa.com" value="<?php echo htmlspecialchars($settings['base_url'] ?? 'https://test.oppwa.com'); ?>" required>
                                                 <small class="form-text text-muted">Use <code>https://test.oppwa.com</code> for testing and <code>https://oppwa.com</code> for live production.</small>
                                             </div>

                                             <div class="mb-3">
                                                 <label class="form-label font-weight-bold" for="entity_id">Entity ID</label>
                                                 <input type="text" class="form-control" id="entity_id" name="entity_id" value="<?php echo htmlspecialchars($settings['entity_id'] ?? ''); ?>" placeholder="8ac7a4c797662439019773da2ea107eb" required>
                                                 <small class="form-text text-muted">Provided by AFS OPPWA portal.</small>
                                             </div>

                                             <div class="mb-3">
                                                 <label class="form-label font-weight-bold" for="access_token">Access Token (Bearer Auth)</label>
                                                 <input type="text" class="form-control" id="access_token" name="access_token" value="<?php echo htmlspecialchars($settings['access_token'] ?? ''); ?>" placeholder="OGFjN2E0..." required>
                                                 <small class="form-text text-muted">Provided by AFS OPPWA portal.</small>
                                             </div>

                                             <div class="mb-3">
                                                 <label class="form-label font-weight-bold" for="currency">Default Currency</label>
                                                 <input type="text" class="form-control" id="currency" name="currency" value="<?php echo htmlspecialchars($settings['currency'] ?? 'BHD'); ?>" placeholder="BHD" required>
                                             </div>

                                             <div class="mb-3 form-check form-switch">
                                                 <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo (($settings['is_active'] ?? 1) == 1) ? 'checked' : ''; ?>>
                                                 <label class="form-check-label font-weight-bold" for="is_active">Enable AFS Payment Gateway on Checkout</label>
                                             </div>

                                            <div class="mt-4 text-end">
                                                <button type="submit" class="btn btn-primary btn-lg shadow-sm" id="save-btn">
                                                    <i class="ri-save-line me-1"></i> Save Payment Settings
                                                </button>
                                            </div>
                                        </form>
                                    </div>
                                </div>
                            </div>
                        </div>

                    </div>
                    <?php include(__DIR__ . "/../templates/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>

    <!-- Scripts -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/js/main.js"></script>

    <script>
    $(document).ready(function() {
        $('#payment-settings-form').on('submit', function(e) {
            e.preventDefault();
            $('#save-btn').prop('disabled', true).html('<span class="spinner-border spinner-border-sm me-1"></span> Saving...');

            $.ajax({
                url: '../controller/payment_settings_controller.php',
                type: 'POST',
                data: $(this).serialize(),
                dataType: 'json',
                success: function(res) {
                    $('#save-btn').prop('disabled', false).html('<i class="ri-save-line me-1"></i> Save Payment Settings');
                    if (res.status === 'success') {
                        Swal.fire({
                            icon: 'success',
                            title: 'Success!',
                            text: res.message,
                            timer: 2000,
                            showConfirmButton: false
                        });
                    } else {
                        Swal.fire({
                            icon: 'error',
                            title: 'Update Failed',
                            text: res.message
                        });
                    }
                },
                error: function(err) {
                    $('#save-btn').prop('disabled', false).html('<i class="ri-save-line me-1"></i> Save Payment Settings');
                    Swal.fire({
                        icon: 'error',
                        title: 'Error',
                        text: 'An error occurred while saving settings.'
                    });
                }
            });
        });
    });
    </script>
</body>
</html>
