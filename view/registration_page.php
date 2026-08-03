<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}


if (isset($_SESSION['ids']) && !empty($_SESSION['ids'])) {
    header("Location: /");
    exit;
}

// Store redirect from URL to session if present
if (isset($_GET['redirect']) && !empty($_GET['redirect'])) {
    $_SESSION['redirect_after_registration'] = $_GET['redirect'];
}

// Get redirect URL from session or default to index.php
$redirect = $_SESSION['redirect_after_registration'] ?? 'index.php';
// echo "redirection". $redirect;
?>

<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <style>
    /* ── Global Poppins & Typography ── */
    body, html,
    h1, h2, h3, h4, h5, h6,
    p, span, div,
    .title, .product-name,
    .btn, .price,
    .modal-content,
    .navbar-nav {
        font-family: 'Poppins', sans-serif !important;
        letter-spacing: 0.3px !important;
    }

    /* ── Clean Spacing for Registration Page ── */
    .page-content.bg-light {
        padding-top: 0 !important;
        padding-bottom: 0 !important;
        background: #f7f9fb !important;
    }

    .registration-wrapper {
        padding-top: 40px !important;
        padding-bottom: 50px !important;
        min-height: 80vh;
    }

    @media (max-width: 991px) {
        .registration-wrapper {
            padding-top: 25px !important;
            padding-bottom: 40px !important;
        }
    }

    /* ── Registration Card ── */
    .registration-card {
        background: #ffffff;
        border-radius: 16px;
        padding: 32px 30px;
        max-width: 480px;
        margin: 0 auto;
        box-shadow: 0 10px 30px rgba(0, 0, 0, 0.05), 0 2px 6px rgba(0, 0, 0, 0.03);
        border: 1px solid #e8ecf1;
    }

    .registration-card .reg-title {
        font-size: 22px;
        font-weight: 700;
        color: #292929;
        margin-bottom: 4px;
        text-align: center;
        letter-spacing: -0.2px;
    }

    .registration-card .reg-subtitle {
        font-size: 13px;
        color: #718096;
        margin-bottom: 18px;
        text-align: center;
    }

    .form-group-reg {
        margin-bottom: 14px;
        text-align: left;
    }

    .form-group-reg label {
        display: block;
        font-size: 13px;
        font-weight: 600;
        color: #292929;
        margin-bottom: 5px;
    }

    .form-group-reg .form-control {
        height: 46px;
        border: 1.5px solid #e2e8f0;
        border-radius: 8px;
        padding: 10px 14px;
        font-size: 14px;
        color: #292929;
        background-color: #fff;
        transition: all 0.2s ease;
        box-shadow: none;
    }

    .form-group-reg .form-control:focus {
        border-color: #292929;
        box-shadow: 0 0 0 3px rgba(41, 41, 41, 0.08);
        outline: none;
    }

    .reg-secure-wrapper {
        position: relative;
    }

    .reg-secure-wrapper .show-pass-btn {
        position: absolute;
        right: 14px;
        top: 50%;
        transform: translateY(-50%);
        cursor: pointer;
        color: #718096;
        font-size: 15px;
        z-index: 5;
        padding: 4px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .reg-secure-wrapper .show-pass-btn:hover {
        color: #292929;
    }

    .otp-section {
        display: none;
    }

    input {
        text-transform: none;
    }

    /* ── Dark Gray-Black Buttons on Registration ── */
    .btn-reg-primary,
    #customer_register,
    #verify_otp {
        background: #292929 !important;
        background-color: #292929 !important;
        background-image: none !important;
        border: 1.5px solid #292929 !important;
        border-radius: 8px !important;
        color: #ffffff !important;
        height: 46px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        letter-spacing: 0.5px !important;
        text-transform: uppercase !important;
        width: 100% !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        margin-top: 16px !important;
        margin-bottom: 12px !important;
    }

    .btn-reg-primary:hover,
    #customer_register:hover,
    #verify_otp:hover {
        background: #111111 !important;
        background-color: #111111 !important;
        border-color: #111111 !important;
        color: #ffffff !important;
        box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
    }

    .btn-reg-secondary {
        background: #ffffff !important;
        background-color: #ffffff !important;
        background-image: none !important;
        color: #292929 !important;
        border: 1.5px solid #292929 !important;
        border-radius: 8px !important;
        height: 46px !important;
        display: flex !important;
        align-items: center !important;
        justify-content: center !important;
        font-size: 14px !important;
        font-weight: 600 !important;
        letter-spacing: 0.5px !important;
        text-transform: uppercase !important;
        width: 100% !important;
        cursor: pointer !important;
        transition: all 0.2s ease !important;
        text-decoration: none !important;
    }

    .btn-reg-secondary:hover {
        background: #292929 !important;
        background-color: #292929 !important;
        border-color: #292929 !important;
        color: #ffffff !important;
    }

    .reg-auth-divider {
        display: flex;
        align-items: center;
        text-align: center;
        margin: 14px 0;
        color: #a0aec0;
        font-size: 12px;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }

    .reg-auth-divider::before,
    .reg-auth-divider::after {
        content: '';
        flex: 1;
        border-bottom: 1px solid #e2e8f0;
    }

    .reg-auth-divider span {
        padding: 0 10px;
    }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">

        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>

        <?php include("templates/header.php"); ?>
        
        <div id="dropdownContent" style="text-align:center;"></div>

        <div class="page-content bg-light">

            <?php include("pages/registration/registration_page_body.php"); ?>

        </div>

        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
        <!-- Footer End -->

        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

    </div>
    <?php include("templates/scripts.php"); ?>
    <script>
        $(document).ready(function () {
            // Password toggle
            $(".toggle-pass").click(function() {
                var target = $($(this).data("target"));
                var icon = $(this).find("i");
                if (target.attr("type") === "password") {
                    target.attr("type", "text");
                    icon.removeClass("fa-eye").addClass("fa-eye-slash");
                } else {
                    target.attr("type", "password");
                    icon.removeClass("fa-eye-slash").addClass("fa-eye");
                }
            });

            $("#customer_register").click(function () {
                var v_funame = $("#funame").val();
                var v_euname = $("#euname").val();
                var v_password = $("#password").val();
                var v_confirm_password = $("#conpassword").val();

                // Validation checks
                if (v_funame == "" || v_euname == "" || v_password == "" || v_confirm_password == "") {
                    setupDropdown('dropdownContent', 'warning', svgError + 'Please fill all the fields.', 'click');
                    return;
                }
                if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(v_euname)) {
                    setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid email address.', 'click');
                    return;
                }
                if (v_password.length < 8) {
                    setupDropdown('dropdownContent', 'warning', svgError + 'Password must be at least 8 characters long.', 'click');
                    return;
                }
                if (v_password !== v_confirm_password) {
                    setupDropdown('dropdownContent', 'warning', svgError + 'Passwords do not match.', 'click');
                    return;
                }

                $.ajax({
                    type: "POST",
                    url: "controller/registration_controller.php",
                    data: {
                        action: "send_otp",
                        customer_name: v_funame,
                        email_user_name: v_euname,
                        user_password: v_password
                    },
                    success: function (response) {
                        // alert(response);
                        if (response === "otp_sent") {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'OTP sent to your email!', 'click');
                            $(".registration-form").hide();
                            $(".otp-section").show();
                        } else if (response === "exists") {
                            setupDropdown('dropdownContent', 'warning', svgError + 'Email already exists.', 'click');
                        } else {
                            setupDropdown('dropdownContent', 'warning', svgError + 'Failed to send OTP. Please try again.', 'click');
                        }
                    },
                    error: function () {
                        setupDropdown('dropdownContent', 'warning', svgError + 'An error occurred. Please try again.', 'click');
                    }
                });
            });

            $("#verify_otp").click(function () {
                var v_otp = $("#otp").val();
                var v_euname = $("#euname").val();
            
                if (v_otp == "") {
                    setupDropdown('dropdownContent', 'warning', svgError + 'Please enter the OTP.', 'click');
                    return;
                }
            
                $.ajax({
                    type: "POST",
                    url: "controller/registration_controller.php",
                    data: {
                        action: "verify_otp",
                        email_user_name: v_euname,
                        otp: v_otp
                    },
                    success: function (response) {
                        if (response === "success") {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Registration successful! Please complete your profile details after login.', 'click');
                            
                            // Use the PHP redirect variable
                            <?php 
                                $redirect = $_SESSION['redirect_after_registration'] ?? '';
                                // Clear the session after use
                                $_SESSION['redirect_after_registration'] = null;
                            ?>
                            
                            setTimeout(function() {
                                window.location.href = "<?php echo $redirect; ?>";
                            }, 2000);
                        } else if (response === "invalid_otp") {
                            setupDropdown('dropdownContent', 'warning', svgError + 'Invalid OTP. Please try again.', 'click');
                        } else {
                            setupDropdown('dropdownContent', 'warning', svgError + 'An error occurred. Please try again.', 'click');
                        }
                    },
                    error: function () {
                        setupDropdown('dropdownContent', 'warning', svgError + 'An error occurred. Please try again.', 'click');
                    }
                });
            });
        });
    </script>
</body>

</html>