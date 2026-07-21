
<div class="col-xxl-12 col-xl-12 col-lg-12 end-side-content">
    <div class="login-area">
        <h2 class="text-secondary text-center pt-4">Register Now</h2>
        <p class="text-center m-b30">Welcome please register your account</p>
        <div class="registration-form">
            <form id="registrationForm">
                <div class="m-b25">
                    <label class="label-title">Full Name</label>
                    <input name="fuName" required="" class="form-control" id="funame" placeholder="Full name" type="text">
                </div>
                <div class="m-b25">
                    <label class="label-title">Email Address</label>
                    <input name="EuName" required="" class="form-control" id="euname" placeholder="Email Address" type="email">
                </div>
                <div class="m-b40">
                    <label class="label-title">Password</label>
                    <div class="secure-input">
                        <input type="password" name="password" class="form-control dz-password" id="password" placeholder="Password">
                        <div class="show-pass">
                            <i class="eye-open fa-regular fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="m-b40">
                    <label class="label-title">Confirm Password</label>
                    <div class="secure-input">
                        <input type="password" name="conpassword" class="form-control dz-password" id="conpassword" placeholder="Confirm Password">
                        <div class="show-pass">
                            <i class="eye-open fa-regular fa-eye"></i>
                        </div>
                    </div>
                </div>
                <div class="text-center">
                    <button type="button" id="customer_register" class="btn btn-primary">REGISTER</button>
                    <a href="Login" class="btn btn-outline-secondary btnhover text-uppercase">Sign In</a>
                </div>
            </form>
        </div>
        <div class="otp-section">
            <form id="otpForm">
                <div class="m-b25">
                    <label class="label-title">Enter OTP</label>
                    <input name="otp" required="" class="form-control" id="otp" placeholder="Enter 6-digit OTP" type="text">
                </div>
                <div class="text-center">
                    <button type="button" id="verify_otp" class="btn btn-primary">VERIFY OTP</button>
                </div>
            </form>
        </div>
    </div>
</div>