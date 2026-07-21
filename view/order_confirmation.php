<!DOCTYPE html>

<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <style>
         body,
        h1, h2, h3, h4, h5, h6,
        p, span, div,
        .title, .product-name, .btn, .price,
        .modal-content, .navbar-nav,
        .badge, .form-label, .para-text,
        .size-label, .color-label, .form-select {
            font-family: "Montserrat", sans-serif !important;
            /*text-transform: uppercase !important;*/
            letter-spacing: 0.5px !important;
        }
        
        .whatsapp-float {
                position: fixed;
                width: 60px;
                height: 60px;
                bottom: 60px;
                right: 80px;
                background: #25D366;
                color: white !important;
                border-radius: 50%;
                text-align: center;
                font-size: 30px;
                box-shadow: 0 4px 12px rgba(0,0,0,0.25);
                z-index: 1000;
                display: flex;
                align-items: center;
                justify-content: center;
                text-decoration: none;
                transition: all 0.3s ease;
            }
            
            .whatsapp-float:hover {
                transform: scale(1.12);
                background: #20b858;
                color: white !important;
            }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>
        <?php include("templates/header.php"); ?>
        <!-- <div class="dz-bnr-inr bg-secondary overlay-black-light" style="background-image:url(images/background/bg1.jpg);">
			<div class="container">
				<div class="dz-bnr-inr-entry">
					<h1>Order Confirmation</h1>
					<nav aria-label="breadcrumb" class="breadcrumb-row">
						<ul class="breadcrumb">
							<li class="breadcrumb-item"><a href="index.html"> Home</a></li>
							<li class="breadcrumb-item">Order Confirmation</li>
						</ul>
					</nav>
				</div>
			</div>	
		</div> -->

        <div class="page-content bg-light">
            <div class="content-inner-1">
                <div class="container">
                    <div class="row">
                        <?php include("templates/aside.php"); ?>
                        <?php include("pages/place_order/order_confirmation_body.php"); ?>
                    </div>
                </div>
            </div>
        </div>
        <?php include("templates/footer.php"); ?>
        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
    </div>
    	<a href="https://wa.me/97333300160?text=Hi I Like to Know more about the Products ." class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <?php include("templates/scripts.php"); ?>
    <script>
    $(document).ready(function() {
        $(document).on('click', '#view-order-btn', function(e) {
            e.preventDefault();
            const urlParams = new URLSearchParams(window.location.search);
            const ids = urlParams.get('order_id');
            if (!ids) {
                alert("Order ID not found in URL");
                return;
            }
            window.location.href = '/Orders?order_id=' + encodeURIComponent(ids);
            // Use either $.redirect if available, or fallback to window.location.href
            // if (typeof $.redirect === "function") {
            //     $.redirect('Orders_details', {
            //         order_id: ids
            //     }, 'POST', '');
            // } else {
            //     window.location.href = '/Orders_details?order_id=' + encodeURIComponent(ids);
            // }
        });
    });
    </script>
</body>

</html>