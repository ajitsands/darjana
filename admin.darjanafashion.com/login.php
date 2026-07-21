<?PHP 
session_start();
?>
<!doctype html>
<html
  lang="en"
  class="light-style layout-wide customizer-hide"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-style="light">
  
   <head>
    <meta charset="utf-8" />
    <meta
      name="viewport"
      content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Login - CRM | Darjana Fashion Admin Portal</title>

    <meta name="description" content="" />

    <!-- Favicon -->
    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link
      href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap"
      rel="stylesheet" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />

    <!-- Menu waves for no-customizer fix -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/core.css" class="template-customizer-core-css" />
    <link rel="stylesheet" href="../../assets/vendor/css/rtl/theme-default.css" class="template-customizer-theme-css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />

    <!-- Vendors CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />
    <!-- Vendor -->
    <link rel="stylesheet" href="../../assets/vendor/libs/@form-validation/form-validation.css" />

    <!-- Page CSS -->
    <link rel="stylesheet" href="../../assets/vendor/css/pages/page-auth.css" />
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />
     
    <!-- Helpers -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>
  </head>  
  <body>
    <!-- Content -->
    <div class="authentication-wrapper authentication-cover">
      <!-- Logo -->
      <style>
        .auth-cover-brand {
          position: absolute;
          z-index: 1;
          inset-block-start: -.5rem;
          inset-inline-start: 1.5rem;
        }
      </style>
 
      <!--<a href="/" class="auth-cover-brand d-flex align-items-center gap-2">-->
      <!--  <span class="app-brand-logo demo">-->
      <!--      <span style="color: var(--bs-primary)"><img src="../../assets/img/illustrations/shopping_logo.png" alt="shopping cart" width="110" height="90" style="padding-top:12px;padding-bottom:12px;"></span>-->
      <!--  </span>-->
      <!--</a>-->
           
      <!-- /Logo -->
      <div class="authentication-inner row m-0">
        <!-- Left Section -->
        <div class="d-none d-lg-flex col-lg-7 col-xl-8 align-items-center justify-content-center p-12 pb-2" style="background-color:black;">
          <img
            src="../../assets/img/illustrations/darjana_logo.jpg"
            class="auth-cover-illustration w-100"
            alt="auth-illustration"
            data-app-light-img="illustrations/darjana_logo.jpg"
            data-app-dark-img="illustrations/darjana_logo.jpg" />
          <!--<img-->
          <!--  src="../../assets/img/illustrations/darjana_logo.jpg"-->
          <!--  class="authentication-image"-->
          <!--  alt="mask"-->
          <!--  data-app-light-img="illustrations/darjana_logo.jpg"-->
          <!--  data-app-dark-img="illustrations/darjana_logo.jpg" />-->
        </div>
        <!-- /Left Section -->

        <!-- Login -->
        <div
          class="d-flex col-12 col-lg-5 col-xl-4 align-items-center authentication-bg position-relative py-sm-12 px-12 py-6">
          <div class="w-px-400 mx-auto pt-5 pt-lg-0">
            <h4 class="mb-1">Welcome to DarjanaFashion admin panel! </h4>
            <p class="mb-5">Please sign-in to your account</p>

            <form id="formAuthentication" class="mb-5" action="auth-login-cover.php" method="GET">
              <div class="form-floating form-floating-outline mb-5">
                <input
                  type="text"
                  class="form-control"
                  id="login_email"
                  name="email-username"
                  placeholder="Enter your email or username">
                <label for="email">Email or Username</label>
              </div>
              <div class="mb-5">
                <div class="form-password-toggle">
                  <div class="input-group input-group-merge">
                    <div class="form-floating form-floating-outline">
                      <input
                        type="password"
                        id="login_password"
                        class="form-control"
                        name="password"
                        placeholder="············"
                        aria-describedby="password">
                      <label for="password">Password</label>
                    </div>
                    <span class="input-group-text cursor-pointer"><i class="ri-eye-off-line"></i></span>
                  </div>
                </div>
              </div>
              <!--<div class="mb-5 d-flex justify-content-between mt-1">-->
              <!--  <a href="Register" class="text-primary">Not a user? Register now</a>-->
              <!--</div>-->
              <a class="btn btn-primary d-grid w-100" style="color:white;" id="btn_admin_signIn">Sign in</a>
            </form>

            <div class="divider my-5">
              <div class="divider-text"><i class="ri-git-repository-private-line"></i> Powered By <a href='https://www.sandslab.com' target="_blank">SaNDS Lab</a></div>
            </div>
          </div>
        </div>
        <!-- /Login -->
      </div>
    </div>

    <!-- / Content -->
    <!-- SaNDS Popup -->
    <div id="dropdownContent" style="text-align:center;"></div>
    <!-- Core JS -->
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>

    <!-- Vendors JS -->
    <script src="../../assets/vendor/libs/@form-validation/popular.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/bootstrap5.js"></script>
    <script src="../../assets/vendor/libs/@form-validation/auto-focus.js"></script>

    <!-- Main JS -->
    <script src="../../assets/js/main.js"></script>
    
    <script src="../../assets/sands/settings.js"></script>
    <script src="../../assets/sands/sands_popup.js"></script>	
    <!-- Page JS -->
    <script src="../../assets/js/pages-auth.js"></script>
    <script>
        $(document).ready(function() {
            
            $('#btn_admin_signIn').on('click', function(event) {
               
                event.preventDefault(); // Prevent the form from submitting
                
                let valid = true;
                
                var v_username = $('#login_email').val();
                var v_password = $('#login_password').val();
                
                if (v_username === "") {
                    setupDropdown('dropdownContent','warning',svgSuccess+'Please Enter UserName','click');
                    valid = false;
                } else if (v_password === "") {
                    setupDropdown('dropdownContent','warning',svgSuccess+'Please Enter Password','click');
                    valid = false;
                }
            
                if (valid) {
                  $.post("controller/login/login_controller.php", {
                        action: "login_request",
                        v_username: v_username,
                        password: v_password
                    }, function(res) {
                        if(res=='true')
                        {
                          window.location.href="Dashboard";
                        }
                        else
                        {
                          setupDropdown('dropdownContent', 'error', svgSuccess + res, 'click');
                        }
                    }).fail(function(xhr, status, error) {
                        setupDropdown('dropdownContent', 'error', svgSuccess + 'An error occurred: ' + error, 'click');
                  });
                }
            });

        });
    </script>
  </body>
</html>