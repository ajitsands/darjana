<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("view/templates/head.php"); ?>
  <style>
      /* ── Global Poppins Font for Login Page ── */
      body, html, .login-page-container, .login-card, .form-control, .btn, h2, h3, p, label, a, span {
          font-family: 'Poppins', sans-serif !important;
      }

      body {
          background: #f5f7fa !important;
          color: #292929 !important;
          margin: 0;
          min-height: 100vh;
      }

      .login-page-container {
          min-height: 100vh;
          display: flex;
          align-items: center;
          justify-content: center;
          padding: 40px 15px;
          background: linear-gradient(135deg, #f7f9fb 0%, #edf1f5 100%);
      }

      .login-card {
          background: #ffffff;
          border-radius: 16px;
          padding: 40px 36px;
          width: 100%;
          max-width: 440px;
          box-shadow: 0 10px 30px rgba(0, 0, 0, 0.06), 0 2px 6px rgba(0, 0, 0, 0.03);
          border: 1px solid #e8ecf1;
      }

      .login-brand {
          text-align: center;
          margin-bottom: 24px;
      }

      .login-brand img {
          max-height: 60px;
          max-width: 180px;
          object-fit: contain;
          margin-bottom: 15px;
      }

      .login-title {
          font-size: 22px;
          font-weight: 700;
          color: #292929;
          margin-bottom: 6px;
          text-align: center;
          letter-spacing: -0.2px;
      }

      .login-subtitle {
          font-size: 13px;
          color: #718096;
          margin-bottom: 24px;
          text-align: center;
      }

      .form-group-custom {
          margin-bottom: 18px;
          text-align: left;
      }

      .form-group-custom label {
          display: block;
          font-size: 13px;
          font-weight: 600;
          color: #292929;
          margin-bottom: 7px;
      }

      .form-group-custom .form-control {
          height: 48px;
          border: 1.5px solid #e2e8f0;
          border-radius: 8px;
          padding: 10px 16px;
          font-size: 14px;
          color: #292929;
          background-color: #fff;
          transition: all 0.2s ease;
          box-shadow: none;
      }

      .form-group-custom .form-control:focus {
          border-color: #292929;
          box-shadow: 0 0 0 3px rgba(41, 41, 41, 0.08);
          outline: none;
      }

      .secure-input-wrapper {
          position: relative;
      }

      .secure-input-wrapper .show-pass-btn {
          position: absolute;
          right: 14px;
          top: 50%;
          transform: translateY(-50%);
          cursor: pointer;
          color: #718096;
          font-size: 16px;
          z-index: 5;
          padding: 4px;
          display: flex;
          align-items: center;
          justify-content: center;
      }

      .secure-input-wrapper .show-pass-btn:hover {
          color: #292929;
      }

      .login-options {
          display: flex;
          justify-content: space-between;
          align-items: center;
          margin-bottom: 22px;
          font-size: 13px;
      }

      .remember-checkbox {
          display: flex;
          align-items: center;
          gap: 8px;
          cursor: pointer;
          user-select: none;
          color: #4a5568;
          margin-bottom: 0;
          font-weight: 400;
          font-size: 13px;
      }

      .remember-checkbox input[type="checkbox"] {
          accent-color: #292929;
          width: 16px;
          height: 16px;
          cursor: pointer;
          margin: 0;
      }

      .forgot-link {
          color: #292929;
          text-decoration: none;
          font-weight: 500;
          font-size: 13px;
          transition: color 0.2s;
      }

      .forgot-link:hover {
          color: #000;
          text-decoration: underline;
      }

      /* ── Dark Gray-Black Buttons ── */
      .btn-auth-primary {
          background: #292929 !important;
          background-color: #292929 !important;
          background-image: none !important;
          color: #ffffff !important;
          border: 1.5px solid #292929 !important;
          border-radius: 8px !important;
          height: 48px !important;
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

      .btn-auth-primary:hover {
          background: #111111 !important;
          background-color: #111111 !important;
          border-color: #111111 !important;
          color: #ffffff !important;
          box-shadow: 0 4px 12px rgba(0, 0, 0, 0.15) !important;
      }

      .btn-auth-secondary {
          background: #ffffff !important;
          background-color: #ffffff !important;
          background-image: none !important;
          color: #292929 !important;
          border: 1.5px solid #292929 !important;
          border-radius: 8px !important;
          height: 48px !important;
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

      .btn-auth-secondary:hover {
          background: #292929 !important;
          background-color: #292929 !important;
          border-color: #292929 !important;
          color: #ffffff !important;
      }

      .auth-divider {
          display: flex;
          align-items: center;
          text-align: center;
          margin: 18px 0;
          color: #a0aec0;
          font-size: 12px;
          text-transform: uppercase;
          letter-spacing: 0.5px;
      }

      .auth-divider::before,
      .auth-divider::after {
          content: '';
          flex: 1;
          border-bottom: 1px solid #e2e8f0;
      }

      .auth-divider span {
          padding: 0 12px;
      }
  </style>
</head>
<body>
<div class="page-wraper">

	<div id="loading-area" class="preloader-wrapper-4">
		<img src="images/loading.gif" alt="">
	</div>
	
	<?php include("view/pages/login/login_body.php"); ?>
	
	<!-- SaNDS Popup -->
	<div id="dropdownContent" style="text-align:center;"></div>
	<!-- End SaNDS Popup -->

	<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

</div>
<!-- JAVASCRIPT FILES ========================================= -->
<?php include("view/templates/scripts.php"); ?>
<script>
$(document).ready(function () {
    // Check for remember me on page load
    $.post("controller/login_controller.php", {
        action: "check_remember_me"
    }, function(res) {
        var response = JSON.parse(res);
        if(response.status === 'success') {
            window.location.href = "/";
        }
    });

    // Password toggle
    $("#toggle_password_btn").click(function(){
        var input = $("#user_password");
        var icon = $("#password_eye_icon");
        if(input.attr("type") === "password") {
            input.attr("type", "text");
            icon.removeClass("fa-eye").addClass("fa-eye-slash");
        } else {
            input.attr("type", "password");
            icon.removeClass("fa-eye-slash").addClass("fa-eye");
        }
    });

    // Submit on Enter key
    $("#username, #user_password").keypress(function(e) {
        if (e.which === 13) {
            $("#btn_log_in").click();
        }
    });

    $("#btn_log_in").click(function(){
        var v_username = $("#username").val().trim();
        var v_password = $("#user_password").val().trim();
        var remember_me = $("#remember_me").is(":checked");
        var redirectUrl = $("#redirect_url").val() || "/";

        var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

        if(v_username === '' || v_password === ''){
            setupDropdown('dropdownContent', 'warning', svgError + 'Please fill all fields', 'click');
            return;
        }

        if (!emailRegex.test(v_username)) {
            setupDropdown('dropdownContent', 'warning', svgError + 'Please enter a valid Email address', 'click');
            return;
        }

        $.post("controller/login_controller.php", {
            action: "login",
            v_username: v_username,
            v_password: v_password,
            remember_me: remember_me
        }, function(res){
            var response = JSON.parse(res);
            if(response.status === 'success') {
                window.location.href = redirectUrl;
            } else {
                setupDropdown('dropdownContent', 'warning', svgError + response.message, 'click');
            }
        });
    });
});
</script>
</body>
</html>