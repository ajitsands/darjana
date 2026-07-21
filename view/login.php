<!DOCTYPE html>
<html lang="en">
<head>
  <?php include("view/templates/head.php"); ?>
  <style>
      .login-area, .forget-password-area {
            border: 1px solid #eee09e;
      }
  </style>
</head>
<body style="color: #E0E0E0;background-image: url('images/bg.jpg'); background-size: cover; background-repeat: repeat; background-position: center;">
<div class="page-wraper" >

	<div id="loading-area" class="preloader-wrapper-4">
		<img src="images/loading.gif" alt="">
	</div>
	 
	<!-- Header Star -->
	<?php //include("view/templates/header.php"); ?>
	<!-- Header End -->
	
	<?php include("view/pages/login/login_body.php"); ?>

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
    // Check for remember me on page load
    $.post("controller/login_controller.php", {
        action: "check_remember_me"
    }, function(res) {
        var response = JSON.parse(res);
        if(response.status === 'success') {
            window.location.href = "/";
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