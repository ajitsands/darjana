<div class="login-page-container">
    <div class="login-card">
        <!-- Top Black Area for Logo -->
        <div class="login-card-header">
            <a href="/">
                <img src="images/logo/web_logo_menu.png" alt="Darjana Fashion">
            </a>
        </div>
        
        <!-- Login Card Body -->
        <div class="login-card-body">
            <h2 class="login-title">Sign In</h2>
            <p class="login-subtitle">Welcome back! Please enter your details</p>
            
            <form onsubmit="return false;">
                <?php $redirect = $_GET['redirect'] ?? '/'; ?>
                <input type="hidden" id="redirect_url" value="<?php echo htmlspecialchars($redirect); ?>">
                
                <div class="form-group-custom">
                    <label for="username">Email Address</label>
                    <input name="dzName" required="" id="username" class="form-control" placeholder="Enter your email" type="email" autocomplete="email">
                </div>
                
                <div class="form-group-custom">
                    <label for="user_password">Password</label>
                    <div class="secure-input-wrapper">
                        <input type="password" name="password" id="user_password" class="form-control dz-password" placeholder="Enter your password" autocomplete="current-password">
                        <span class="show-pass-btn" id="toggle_password_btn" title="Toggle password visibility">
                            <i class="fa-regular fa-eye" id="password_eye_icon"></i>
                        </span>
                    </div>
                </div>
                
                <div class="login-options">
                    <label class="remember-checkbox" for="remember_me">
                        <input type="checkbox" id="remember_me" checked>
                        <span>Remember Me</span>
                    </label>
                    <a class="forgot-link" href="ForgetPassword">Forgot Password?</a>
                </div>
                
                <a class="btn-auth-primary" id="btn_log_in" role="button">Sign In</a>
                
                <div class="auth-divider">
                    <span>or</span>
                </div>
                
                <a href="/Registration<?php echo $redirect !== '/' ? '?redirect=' . urlencode($redirect) : ''; ?>" 
                   class="btn-auth-secondary" role="button">Register</a>
            </form>
        </div>
    </div>
</div>