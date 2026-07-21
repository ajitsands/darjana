<section class="px-3">
	<div class="row">
		<!-- <div class="col-xxl-6 col-xl-6 col-lg-6 start-side-content">
			<div class="dz-bnr-inr-entry">
				<h1>Forgot Password</h1>
				<nav aria-label="breadcrumb text-align-start" class="breadcrumb-row">
					<ul class="breadcrumb">
						<li class="breadcrumb-item"><a> Home</a></li>
						<li class="breadcrumb-item">Forgot Password</li>
					</ul>
				</nav>	
			</div>
			<div class="registration-media">
				<img src="images/registration/pic3.png" alt="/">
			</div>
		</div> -->
		<div class="col-xxl-12 col-xl-12 col-lg-12 end-side-content justify-content-center">
			<!-- Step 1: Email Input -->
			<div class="email-submit-area">
				<div class="login-area">
					<h2 class="text-secondary text-center">Forgot Password</h2>
					<p class="text-center m-b25">Enter your e-mail address below to reset your password.</p>
					<form id="email_form">
						<div class="m-b30">
							<label class="label-title">Email Address</label>
							<input name="email" class="form-control" placeholder="Email Address" type="email" id="txt_email_id" required>
						</div>
						<div class="d-flex justify-content-between">
							<a href="Login" class="btn btn-outline-secondary btnhover text-uppercase">Back</a>
							<a class="btn btn-secondary btnhover text-uppercase" id="submit_btn">Submit</a>
						</div>
					</form>
				</div>
			</div>

			<!-- Step 2: OTP Verification -->
			<div class="otp-verification-area d-none">
				<div class="login-area">
					<h2 class="text-secondary text-center">Verify OTP</h2>
					<p class="text-center m-b25">Enter the OTP sent to your email</p>
					<form id="otp_form">
						<div class="m-b30">
							<label class="label-title">OTP</label>
							<input type="number" class="form-control" id="txt_otp" placeholder="Enter OTP">
						</div>
						<div class="text-center">
							<a class="btn btn-secondary btnhover text-uppercase" id="verify_otp_btn">Verify OTP</a>
						</div>
					</form>
				</div>
			</div>

			<!-- Step 3: Password Reset -->
			<div class="reset-password-area d-none">
				<div class="login-area">
					<h2 class="text-secondary text-center">Reset Password</h2>
					<p class="text-center m-b25">Enter your new password</p>
					<form id="reset_form">
						
						<div class="m-b30" style="position:relative;">
							<label class="label-title">New Password</label>
							<input type="password" class="form-control" id="new_password" placeholder="New Password">
							<span class="toggle-password" data-target="#new_password"><i class="fa fa-eye"></i></span>
							<small id="password_strength_text" class="form-text mt-1"></small>
						</div>

						<div class="m-b30" style="position:relative;">
							<label class="label-title">Confirm Password</label>
							<input type="password" class="form-control" id="confirm_password" placeholder="Confirm Password">

							<span class="toggle-password" data-target="#confirm_password">
								<i class="fa fa-eye"></i>
							</span>
						</div>

						<div class="text-center">
							<a class="btn btn-secondary btnhover text-uppercase" id="reset_password_btn">Reset Password</a>
						</div>

					</form>
				</div>
			</div>
		</div>
	</div>
</section>