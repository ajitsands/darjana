<div class="page-content" >
    <section class="px-3">
        <div class="row">
            <div class="col-xxl-12 col-xl-12 col-lg-12 end-side-content justify-content-center">
                <div class="login-area" style="padding-top:5px;">
                    <img src="images/logo.jpg"/>
                    <h2 class="text-center" style="color: white;">Login</h2>
                    <p class="text-center m-b25">welcome please login to your account</p>
                    <form>
                        <?php $redirect = $_GET['redirect'] ?? '/'; ?>
                        <input type="hidden" id="redirect_url" value="<?php echo htmlspecialchars($redirect); ?>">
                        
                        <div class="m-b30">
                            <label class="">Email Address</label>
                            <input name="dzName" required="" id="username" class="form-control" placeholder="Enter your email" type="email">
                        </div>
                        
                        <div class="m-b15">
                            <label class="">Password</label>
                            <div class="secure-input ">
                                <input type="password" name="password" id="user_password" class="form-control dz-password" placeholder="Password">
                                <div class="show-pass">
                                    <i class="eye-open fa-regular fa-eye"></i>
                                </div>
                            </div>
                        </div>
                        
                        <!-- ADD REMEMBER ME CHECKBOX HERE -->
                        <div class="form-row d-flex justify-content-between align-items-center m-b20">
                            <div class="form-group mb-0">
                                <div class="custom-control custom-checkbox">
                                    <input type="checkbox" class="custom-control-input" id="remember_me" checked>
                                    <label class="custom-control-label" for="remember_me" style="color: #fff; cursor: pointer;">Remember Me</label>
                                </div>
                            </div>
                            <div class="form-group mb-0">
                                <a class="text-primary" href="ForgetPassword">Forgot Password</a>
                            </div>
                        </div>
                        
                        <!-- Login and Register buttons -->
                        <div class="text-center">
                            <?php $redirect = $_GET['redirect'] ?? '/'; ?>
                            <a href="/Registration<?php echo $redirect !== '/' ? '?redirect=' . urlencode($redirect) : ''; ?>" 
                               class="btn btn-secondary text-uppercase me-2">Register</a>
                            <a class="btn btn-secondary text-uppercase sign-btn" id="btn_log_in">Sign In</a>
                        </div>
                    </form>
                </div> 
            </div>
        </div>
    </section>
</div>