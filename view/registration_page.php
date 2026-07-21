<?php
session_start();


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
     /* Apply Montserrat font to all text elements */
   
    h1, h2, h3, h4, h5, h6,
    p, span,
    .title, .product-name,
    .btn, .price,
    .modal-content,
    .navbar-nav {
        font-family: "Montserrat", sans-serif !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }
    body,div{
        font-family: "Montserrat", sans-serif !important;
        letter-spacing: 0.5px !important;
    }
        .otp-section {
            display: none;
        }
        input{
            text-transform: none;
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