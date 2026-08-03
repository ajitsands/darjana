<div class="container registration-wrapper">
    <div class="row justify-content-center">
        <div class="col-xl-6 col-lg-8 col-md-10">
            <div class="registration-card">
                <h2 class="reg-title">Register Now</h2>
                <p class="reg-subtitle">Welcome! Please enter your details to create an account</p>
                
                <div class="registration-form">
                    <form id="registrationForm" onsubmit="return false;">
                        <div class="form-group-reg">
                            <label for="funame">Full Name</label>
                            <input name="fuName" required="" class="form-control" id="funame" placeholder="Enter your full name" type="text" autocomplete="name">
                        </div>
                        
                        <div class="form-group-reg">
                            <label for="euname">Email Address</label>
                            <input name="EuName" required="" class="form-control" id="euname" placeholder="Enter your email" type="email" autocomplete="email">
                        </div>
                        
                        <div class="form-group-reg">
                            <label for="password">Password</label>
                            <div class="reg-secure-wrapper">
                                <input type="password" name="password" class="form-control dz-password" id="password" placeholder="Create a password (min 8 characters)" autocomplete="new-password">
                                <span class="show-pass-btn toggle-pass" data-target="#password" title="Toggle password visibility">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        
                        <div class="form-group-reg">
                            <label for="conpassword">Confirm Password</label>
                            <div class="reg-secure-wrapper">
                                <input type="password" name="conpassword" class="form-control dz-password" id="conpassword" placeholder="Confirm your password" autocomplete="new-password">
                                <span class="show-pass-btn toggle-pass" data-target="#conpassword" title="Toggle password visibility">
                                    <i class="fa-regular fa-eye"></i>
                                </span>
                            </div>
                        </div>
                        
                        <button type="button" id="customer_register" class="btn btn-reg-primary">REGISTER</button>
                        
                        <div class="reg-auth-divider">
                            <span>or</span>
                        </div>
                        
                        <a href="Login" class="btn-reg-secondary">Sign In</a>
                    </form>
                </div>
                
                <div class="otp-section">
                    <form id="otpForm" onsubmit="return false;">
                        <div class="form-group-reg">
                            <label for="otp">Enter 6-Digit OTP</label>
                            <input name="otp" required="" class="form-control" id="otp" placeholder="Enter OTP received via email" type="text" maxlength="6">
                        </div>
                        <button type="button" id="verify_otp" class="btn btn-reg-primary">VERIFY OTP</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
</div>