<?php
session_start();
require_once(__DIR__ . '/../controller/payment_settings_controller.php');
$controller = new PaymentSettingsController();
$settings = $controller->getSettings();
?>
<!DOCTYPE html>
<html lang="en" class="light-style layout-menu-fixed" dir="ltr" data-theme="theme-default">
<head>
    <meta charset="utf-8" />
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />
    <title>Payment Gateway Settings | Darjana Fashion Admin</title>
    <?php include(__DIR__ . '/../templates/head.php'); ?>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
</head>

<body>
    <div class="layout-wrapper layout-content-navbar">
        <div class="layout-container">
            <?php include(__DIR__ . '/../templates/menu.php'); ?>

            <div class="layout-page">
                <?php include(__DIR__ . '/../templates/navbar.php'); ?>

                <div class="content-wrapper">
                    <div class="container-xxl flex-grow-1 container-p-y">
                        <h4 class="fw-bold py-3 mb-4"><span class="text-muted fw-light">Settings /</span> Payment Gateway Credentials</h4>

                        <div class="row">
                            <div class="col-md-8 mx-auto">
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
                                                <input type="text" class="form-control" id="gateway_name" name="gateway_name" value="<?php echo htmlspecialchars($settings['gateway_name']); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold" for="base_url">API Base URL / Domain</label>
                                                <input type="url" class="form-control" id="base_url" name="base_url" placeholder="https://invoicing.afs.com.bh" value="<?php echo htmlspecialchars($settings['base_url']); ?>" required>
                                                <small class="form-text text-muted">Enter the complete AFS Invoicing API domain provided by your bank.</small>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold" for="username">API Username</label>
                                                <input type="text" class="form-control" id="username" name="username" value="<?php echo htmlspecialchars($settings['username']); ?>" required>
                                            </div>

                                            <div class="mb-3">
                                                <label class="form-label font-weight-bold" for="password">API Password</label>
                                                <input type="password" class="form-control" id="password" name="password" value="<?php echo htmlspecialchars($settings['password']); ?>" required>
                                            </div>

                                            <div class="mb-3 form-check form-switch">
                                                <input class="form-check-input" type="checkbox" id="is_active" name="is_active" <?php echo ($settings['is_active'] == 1) ? 'checked' : ''; ?>>
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
                    <?php include(__DIR__ . '/../templates/footer.php'); ?>
                </div>
            </div>
        </div>
    </div>

    <script>
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
    </script>
</body>
</html>
