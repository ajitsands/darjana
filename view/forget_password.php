<!DOCTYPE html>
<html lang="en">
<head>
    <?php include("view/templates/head.php"); ?>
</head>
<style>
	.toggle-password {
	position: absolute;
	top: 38px;
	right: 15px;
	cursor: pointer;
	color: #888;
}
</style>
<body>
<div class="page-wraper">

	<div id="loading-area" class="preloader-wrapper-4">
		<img src="images/loading.gif" alt="">
	</div>
	
	<!-- Header Star -->
	<?php //include("view/templates/header.php"); ?>
	<!-- Header End -->
	
	<div class="page-content bg-light">
		<?php include("view/pages/login/forgetpassword_body.php"); ?>
	</div>

	<!-- Footer -->
	<?php //include("view/templates/footer.php"); ?>
	<!-- Footer End -->
	 <!-- SaNDS Popup -->
			<div id="dropdownContent" style="text-align:center;"></div>
		<!-- End SaNDS Popup -->
	<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

</div>
<!-- JAVASCRIPT FILES ========================================= -->
<?php include("view/templates/scripts.php"); ?>
<script>
	$(document).ready(function () {
		// Step 1: Send OTP
		$('#submit_btn').on('click', function (e) {
			e.preventDefault();

			var email_id = $('#txt_email_id').val();
			var emailPattern = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;

			if (email_id === '') {
				setupDropdown('dropdownContent', 'warning', svgError + ' Please enter your email ID.', 'click');
				return;
			}

			if (!emailPattern.test(email_id)) {
				setupDropdown('dropdownContent', 'warning', svgError + ' Invalid email format.', 'click');
				return;
			}

			$.post("controller/login_controller.php", {
				action: "send_otp",
				v_username: email_id
			}, function (res) {
				if (res.status === 'success') {
					$('.email-submit-area').addClass('d-none');
					$('.otp-verification-area').removeClass('d-none');
					setupDropdown('dropdownContent', 'success', svgSuccess + ' OTP has been sent to your email.', 'click');
				} else {
					setupDropdown('dropdownContent', 'warning', svgError + ' ' + res.message, 'click');
				}
			}, 'json');
		});


		// Step 2: Verify OTP
		$('#verify_otp_btn').on('click', function (e) {
			e.preventDefault();
			var otp = $('#txt_otp').val();
			var email = $('#txt_email_id').val();
			if (otp === '') {
				setupDropdown('dropdownContent', 'warning', svgError + ' Please enter OTP.', 'click');
				return;
			}
			$.post("controller/login_controller.php", {
				action: "verify_otp",
				v_username: email,
				otp: otp
			}, function (res) {
				if (res.status ==='success') {
					$('.otp-verification-area').addClass('d-none');
					$('.reset-password-area').removeClass('d-none');
					setupDropdown('dropdownContent', 'success', svgSuccess + 'OTP verified. Please enter your new password.', 'click');
				} else {
					setupDropdown('dropdownContent', 'warning', svgError + ' ' + res.message, 'click');
				}
			}, 'json');
		});

		// Step 3: Reset Password
		$('#reset_password_btn').on('click', function (e) {
			e.preventDefault();
			var password = $('#new_password').val();
			var confirmPassword = $('#confirm_password').val();
			var email = $('#txt_email_id').val();
			if(password === ''){
				setupDropdown('dropdownContent', 'warning', svgError + ' Please enter Password.', 'click');
				return;
			}else if(confirmPassword ===''){
				setupDropdown('dropdownContent', 'warning', svgError + ' Please enter Confirm Password.', 'click');
				return;
			}
			if (password !== confirmPassword) {
				$('#confirm_password').val('');
				setupDropdown('dropdownContent', 'warning', svgError + 'Passwords do not match!.', 'click');
				return;
			}

			$.post("controller/login_controller.php", {
				action: "reset_password",
				v_username: email,
				v_password: password
			}, function (res) {
				if (res.status) {
					setupDropdown('dropdownContent', 'success', svgSuccess + 'Password reset successfully', 'click');
					window.location.href = "Login";
				} else {
					setupDropdown('dropdownContent', 'warning', svgError + ' ' + res.message, 'click');
				}
			}, 'json');
		});

		$(document).on('click', '.toggle-password', function () {
			let input = $($(this).data('target'));
			let icon = $(this).find('i');

			if (input.attr('type') === 'password') {
				input.attr('type', 'text');
				icon.removeClass('fa-eye').addClass('fa-eye-slash');
			} else {
				input.attr('type', 'password');
				icon.removeClass('fa-eye-slash').addClass('fa-eye');
			}
		});
		
	});
</script>
</body>
</html>