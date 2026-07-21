<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head >
<?php include("templates/head.php"); ?>
<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#D1B000">

	<style>
    /* Apply Montserrat font to all text elements */
    body,
    h1, h2, h3, h4, h5, h6,
    p, span, div,
    .title, .product-name,
    .btn, .price,
    .modal-content,
    .navbar-nav {
        font-family: "Montserrat", sans-serif !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }
    a {
        color: #3B3B3B;
        font-weight : 400;
    }
    /* Quick View Modal Specific */
    #quickViewModal * {
        /*font-family: "Montserrat", sans-serif !important;*/
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }

    /* Input fields exception */
    input:not(.btn),
    textarea,
    select {
        text-transform: none !important;
        letter-spacing: normal !important;
    }

    /* Product cards */
    .shop-card .title,
    .shop-card .price {
        font-weight: 600 !important;
        color : red;
    }


    /* Buttons */
    .btn {
        font-weight: 500 !important;
        letter-spacing: 1px !important;
    }

    /* Main title */
    h1.title {
        letter-spacing: 1px !important;
        font-weight: 600 !important;
    }

    /* Price styling */
    .price-num {
        font-weight: 600 !important;
    }

    @keyframes blink {
        0%, 100% { opacity: 1; }
        50% { opacity: 0; }
    }

    .offer-percent {
        animation: blink 1.5s infinite;
    }
    
    
    .title,
    .para-text {
        color: #969696;
        font-weight: 300;
        letter-spacing: 0.5px;
    }
    
    /* Mobile responsive */
    @media (max-width: 768px) {
        body,
        h1.title,
        .btn,
        .price {
            font-size: 0.9em !important;
        }
        
        .content-info h1.title {
            font-size: 1.5rem !important;
        }
    }
	.gold-gradient {
      background: linear-gradient(
        135deg,
        #FFD700,
        #D4AF37,
        #B8860B
      );
    }

	@keyframes blink {
		0%   { opacity: 1; }
		50%  { opacity: 0; }
		100% { opacity: 1; }
	}

	.offer-percent {
		animation: blink 1.5s infinite;
	}

	.slick-arrow {
        display: block !important;
        position: absolute;
        z-index: 1000;
        width: 40px;
        height: 40px;
        background: rgba(0, 0, 0, 0.7);
        color: #fff;
        border-radius: 50%;
        border: none;
        cursor: pointer;
        transition: background 0.3s ease;
        line-height: 40px;
        text-align: center;
        font-size: 0;
    }
    
    .slick-arrow:hover {
        background: rgba(0, 0, 0, 0.9);
    }
    
    .slick-prev::before {
        content: '\f053'; /* FontAwesome left arrow */
        font-family: 'Font Awesome 5 Free';
        font-weight: 900;
        font-size: 16px;
        color: #fff;
    }
    
    .slick-next::before {
        content: '\f054' !important; /* FontAwesome right arrow */
        font-family: 'Font Awesome 5 Free' !important;
        font-weight: 900;
        font-size: 16px;
        color: #fff;
    }
    
    .slick-next {
        font-size: 0 !important; /* Hide any default text or content */
        line-height: 40px;
        text-align: center;
    }
    
    .slick-next:after {
        content: none !important; /* Remove any default :after content */
    }
    
    .slick-prev {
        left: 10px;
    }
    
    .slick-next {
        right: 10px;
    }

	.blink-blue {
		color: blue;
		animation: blink 1s infinite;
		font-weight: bold;
	}

	.red-mrp del {
		color: red;
		font-weight: bold;
		font-size : 9px;
	}

	.main-slider-wrapper .slider-inner {
		padding-top: 30px !important;
		padding-bottom: 30px !important;
		height: 100%;
		position: relative;
	}
	
	

	@media only screen and (max-width: 1480px) {
		.content-inner {
			padding-top: 30px !important;
			padding-bottom: 40px;
		}
		.content-inner-2 {
			padding-top: 0px !important;
		}
	}

	.shop-section .left-box {
		padding-right: 100px;
		padding-left: 100px;
		background-color: rgb(251, 248, 249) !important;
	}

	.shop-section .right-box {
		background: #5e626f !important;
		display: flex;
		justify-content: center;
		flex-direction: column;
		align-items: center;
		border-radius: 10px;
	}

	.shop-section .right-box, .shop-section .left-box {
		position: relative;
		z-index: 1;
		padding: 0px 0;
		overflow: hidden;
	}

	.content-inner {
		padding-top: 50px !important;
		padding-bottom: 30px !important;
	}

	.content-inner-2 {
		padding-top: 10px !important;
		padding-bottom: 0;
	}

	.about-box .about-img img {
		width: 500px !important;
		height: 300px;
		object-fit: cover;
		border-radius: 10px;
		margin: 0 auto;
		display: block;
	}

	.product-media {
		position: relative;
		background-size: cover;
		background-position: center;
		min-height: 320px;
		border-radius: 10px;
		overflow: hidden;
	}

	.product-media .media-overlay {
		position: absolute;
		top: 0; left: 0; right: 0; bottom: 0;
		background: rgba(136, 135, 135, 0.35);
		z-index: 1;
		border-radius: 10px;
	}

	.product-content, .main-content {
		position: relative;
		z-index: 2;
	}

	.company-box .dz-media {
		position: relative;
		width: 100%;
		height: 180px;
		border-radius: 10px;
		overflow: hidden;
		background: #f8f8f8;
		display: flex;
		align-items: center;
		justify-content: center;
	}

	.company-box .dz-media .company-img {
		width: 100%;
		height: 100%;
		object-fit: cover;
		border-radius: 10px;
		display: block;
	}

	.btn.btn-outline-secondary.btn-rounded.btn-lg {
		background: #000 !important;
		color: #fff !important;
		border-color: #000 !important;
	}

	#dropdownContent {
		position: fixed;
		top: 20px;
		right: 20px;
		z-index: 2000;
		background-color: #fff;
		padding: 10px 20px;
		border-radius: 5px;
		box-shadow: 0 2px 10px rgba(0, 0, 0, 0.2);
		display: none;
	}

	#dropdownContent.success {
		background-color: #d4edda;
		color: #155724;
		border: 1px solid #c3e6cb;
	}

	#dropdownContent.warning {
		background-color: #fff3cd;
		color: #856404;
		border: 1px solid #ffeeba;
	}

	#dropdownContent svg {
		vertical-align: middle;
		margin-right: 10px;
	}

	/* Season Collection Banner Styling */
	.season-collection-banner {
		display: flex;
		align-items: center;
		margin-top: 1.5rem;
		padding: 15px;
		border-radius: 8px;
		transition: background 0.3s ease;
	}

	.season-collection-banner.summer {
		background: rgba(255, 152, 0, 0.1); /* Light orange for Summer */
	}

	.season-collection-banner.winter {
		background: rgba(33, 150, 243, 0.1); /* Light blue for Winter */
	}

	.season-collection-banner.monsoon {
		background: rgba(0, 150, 136, 0.1); /* Light teal for Monsoon */
	}

	.season-collection-banner:hover {
		background: rgba(0, 0, 0, 0.05);
	}

	.season-collection-banner svg {
		width: 40px;
		height: 40px;
		margin-right: 12px;
		flex-shrink: 0;
	}

	.season-collection-banner.summer svg {
		fill: #ff9800; /* Orange for Summer */
	}

	.season-collection-banner.winter svg {
		fill: #2196f3; /* Blue for Winter */
	}

	.season-collection-banner.monsoon svg {
		fill: #009688; /* Teal for Monsoon */
	}

	.season-collection-banner .collection-text {
		display: flex;
		flex-direction: column;
	}

	.season-collection-banner .collection-title {
		font-size: 1.4rem;
		font-weight: 600;
		margin-bottom: 4px;
	}

	.season-collection-banner.summer .collection-title {
		color: #ff9800;
	}

	.season-collection-banner.winter .collection-title {
		color: #2196f3;
	}

	.season-collection-banner.monsoon .collection-title {
		color: #009688;
	}

	.season-collection-banner .collection-subtitle {
		font-size: 1.2rem;
		color: #333;
		line-height: 1.4;
	}
	
	

   @media only screen and (max-width: 768px) {
        /* Main Slider Wrapper */
        .main-slider-wrapper {
            padding: 10px !important;
            margin-top: 60px !important;
            position: relative;
            z-index: 1;
        }
    
        .slider-inner {
            padding-top: 10px !important;
            padding-bottom: 10px !important;
        }
    
        /* Slider Layout - Stack image and content vertically with image first */
        .main-slider-wrapper .row {
            flex-direction: column-reverse !important; /* Keep image first */
            align-items: center;
        }
    
        .main-slider-wrapper .col-lg-6 {
            width: 100 !important;
            padding: 0 !important;
            text-align: center;
        }
    
        /* Right Side: Slider Images (Centered and Full Width, Now First) */
        .slider-thumbs {
            padding-left: 0;
            width: 100%;
            margin-bottom: 15px;
        }
    
        .slider-thumbs .banner-media {
            margin-bottom: 0;
        }
    
        .slider-thumbs .img-preview img {
            width: 100%;
            height: 350px; /* Increased height for demo2 */
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    
        .slider-main .slick-slide img {
            width: 100%;
            height: 350px; /* Match thumb height */
            object-fit: contain;
            display: block;
            margin: 0 auto;
        }
    
        /* Left Side: Product Name, Price, and Buttons (Now Second) */
        .content-info {
            display: flex;
            flex-direction: column;
            align-items: center;
            padding: 0 15px;
        }
    
        .content-info h1.title {
            font-size: 1.5rem !important; /* Slightly larger title */
            line-height: 1.2;
            margin-bottom: 10px;
            text-align: center;
        }
    
        .swiper-meta-items .meta-content {
            font-size: 0.9rem;
            margin-bottom: 10px;
            text-align: center;
            display: flex; /* Use flexbox for two rows */
            flex-direction: column; /* Stack rows vertically */
            gap: 5px; /* Space between the price label row and price row */
        }
    
        .swiper-meta-items .price-label-row {
            display: flex; /* Use flexbox for Price and % OFF in same row */
            justify-content: center;
            align-items: baseline;
            gap: 10px; /* Space between Price and % OFF */
        }
    
        .swiper-meta-items .price-label {
            font-size: 0.9rem;
            display: inline-block; /* Inline to fit in flex row */
        }
    
        .swiper-meta-items .offer-percent {
            font-size: 0.9rem; /* Consistent discount percentage size */
            color: #28a745;
            display: inline-block; /* Inline to fit in flex row */
        }
    
        .swiper-meta-items .price-row {
            display: flex; /* Use flexbox for price and MRP in same row */
            justify-content: center;
            align-items: baseline;
            gap: 3px; /* Space between price and MRP */
            white-space: nowrap; /* Prevent wrapping to new lines */
        }
        
        .swiper-meta-items .price-num {
            font-size: 1.2rem; /* Larger price number */
            display: inline-block; /* Inline to fit in flex row */
            margin: 0; /* Remove any default margins */
        }
        
        .swiper-meta-items del {
            color: #888;
            font-size: 0.9rem;
            display: inline-block; /* Inline to fit in flex row */
            margin: 0; /* Remove any default margins */
        }
    
        .content-btn {
            margin-bottom: 15px !important;
            display: flex; /* Use flexbox for buttons in same row */
            justify-content: center;
            gap: 10px; /* Space between buttons */
        }
    
        .content-btn a.btn {
            font-size: 0.9rem;
            padding: 8px 20px;
            width: auto; /* Allow buttons to size naturally */
            max-width: 200px; /* Limit max width for consistency */
        }
    
        /* Season Collection Banner (Below Buttons) */
        .season-collection-banner {
            width: 100%;
            padding: 10px;
            margin-top: 10px;
            display: flex;
            align-items: center;
            justify-content: center;
            text-align: center;
        }
    
        .season-collection-banner svg {
            width: 25px !important;
            height: 25px !important;
            margin-right: 8px;
        }
    
        .season-collection-banner .collection-title {
            font-size: 1rem !important;
            margin-bottom: 2px;
        }
    
        .season-collection-banner .collection-subtitle {
            font-size: 0.85rem !important;
        }
    
        /* Hide unnecessary elements */
        .star-1, .star-2 {
            display: none;
        }
    }
    
    /* Make all product cards square (remove rounded corners) */
    .shop-card,
    .shop-box,
    .dz-media,
    .dz-media img,
    .product-media,
    .company-box .dz-media,
    .company-box .dz-media .company-img,
    .about-box .about-img img,
    .position-relative,
    .shop-section .right-box,
    .product-media .media-overlay,
    .shop-card .dz-media img {
        border-radius: 0 !important;
    }
    
    /* Optional: Keep some elements rounded if needed */
    .season-collection-banner {
        border-radius: 0; /* Make banners square too */
    }
    
    #dropdownContent {
        border-radius: 0; /* Make notification square */
    }
    
    /* For the category cards in loadCategoriesToList */
    .position-relative {
        border-radius: 0 !important;
    }
    
    /* For featured collection cards */
    .product-box.style-2 .product-media {
        border-radius: 0 !important;
    }
    
    /* For quick view modal images if needed */
    .thumbnail-img {
        border-radius: 0 !important;
    }


   
    /*.page-wraper,*/
    .page-content.bg-light {
        background-color: #e8e8e8 !important;
        background-image: none !important;
    }
    
    /* Remove any background video/overlay */
    #video-background,
    .dz-bnr-inr,
    .overlay-black-light {
        background: transparent !important;
    }
    /* Make currency symbol smaller ONLY in product cards */
    .card-currency-symbol {
        font-size: 0.7em;
        /*vertical-align: super;*/
        margin-right: 1px;
        opacity: 0.9;
    }
    
    /* Ensure modal prices remain normal size */
    #quickViewModal .currency-symbol,
    #quickViewModal .card-currency-symbol {
        font-size: inherit !important;
        vertical-align: baseline !important;
    }
    
    /* Also update main slider if needed (keep normal size there) */
    .swiper-meta-items .price-num {
        /* Main slider prices should remain normal */
    }
    
    
    
    /* Default: dropdown opens down */
    .currency-dropdown-menu {
        top: 100%;
        bottom: auto;
    }
    
    /* Mobile: dropdown opens up */
    .currency-dropdown.drop-up .currency-dropdown-menu {
        /*top: auto !important;*/
        /*bottom: 100% !important;*/
        /*margin-bottom: 5px;*/
        /*margin-top: 0;*/
        
        
        position: fixed !important;
        top: 50% !important;
        left: 50% !important;
        right: auto !important;
        bottom: auto !important;
        transform: translate(-50%, -50%);
        width: 90%;
        max-width: 360px;
        max-height: 70vh;
        overflow-y: auto;
        z-index: 2000;
        
    }
    
    
    
	</style> 
   
</head>	
<body id="bg">
	<div class="page-wraper">
		<div id="loading-area" class="preloader-wrapper-4">
			<img src="images/loading.gif" alt="">
		</div>
		
		<?php include("templates/header.php"); ?>
		
	
	

		<div class="page-content bg-light">
		    
		    
			<?php include("pages/home/home_page_body.php"); ?>
		</div>
		
		<!-- Footer -->
		<?php include("templates/footer.php"); ?>
		<!-- Footer End -->
		
		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
		<button id="installBtn" onclick="installPWA()" style="display:none;">
          Install App
        </button>
<style>
.pwa-popup {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  z-index: 9999;
}

.pwa-content {
  background: #fff;
  max-width: 350px;
  margin: 30% auto;
  padding: 20px;
  border-radius: 12px;
  text-align: center;
}

/*    .pwa-popup {*/
/*  display: none;*/
/*  position: fixed;*/
/*  top: 0; left: 0;*/
/*  width: 100%; height: 100%;*/
/*  background: rgba(0,0,0,0.6);*/
/*  z-index: 9999;*/
/*}*/

/*.pwa-content {*/
/*  background: #fff;*/
/*  width: 90%;*/
/*  max-width: 350px;*/
/*  margin: 20% auto;*/
/*  padding: 20px;*/
/*  text-align: center;*/
/*  border-radius: 10px;*/
/*}*/

.pwa-content button {
  margin: 10px;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
}

#pwaInstallBtn {
  background: #D4AF37;
  color: #000;
}

#pwaCloseBtn {
  background: #ccc;
}
.navbar-nav {
    display: flex;
    flex-wrap: nowrap;      /* ðŸ”¥ prevent wrapping */
    align-items: center;
    white-space: nowrap;
}

.navbar-nav > li {
    flex: 0 0 auto;         /* do not shrink */
}

.navbar-nav > li > a {
    padding: 10px 14px;
    display: inline-flex;
    align-items: center;
}
.header-transparent .container-fluid, .header-transparent .container-sm, .header-transparent .container-md, .header-transparent .container-lg, .header-transparent .container-xl {
    padding-left: 5px;
    padding-right: 5px;
}

.site-header .extra-nav {
   
    padding-left: 1px;
   
}
</style>
<!-- PWA Install Popup -->
<div id="pwaPopup" class="pwa-popup">
  <div class="pwa-content">
      <img src="images/logo/web_logo.png" alt="logo" style="width: 180px; height: auto;">
    <h3>Install App</h3>
    <p>Add this app to your home screen for quick access.</p>

    <p id="iosHint" style="display:none;">
      Ã°Å¸â€œÂ² Tap <b>Share</b> Ã¢â€ â€™ <b>Add to Home Screen</b>
    </p>

    <button id="pwaInstallBtn">Add to Home Screen</button>
    <button id="pwaCloseBtn">Not Now</button>
  </div>
</div>


		<!-- Quick Modal Start -->
		<?php include("pages/home/home_page_modal.php"); ?>
	</div>
	<?php include("templates/scripts.php"); ?>
	
	
	<script>
let deferredPrompt = null;

// Detect iOS
function isIOS() {
  return /iphone|ipad|ipod/i.test(navigator.userAgent);
}

// Detect standalone
function isInstalled() {
  return window.matchMedia('(display-mode: standalone)').matches;
}

// Android install prompt
window.addEventListener('beforeinstallprompt', function(e) {
  e.preventDefault();
  deferredPrompt = e;

  if (!isInstalled()) {
    $('#pwaPopup').fadeIn();
  }
});

// Install button click
$('#pwaInstallBtn').on('click', function() {
  if (deferredPrompt) {
    deferredPrompt.prompt();

    deferredPrompt.userChoice.then(function(choice) {
      deferredPrompt = null;
      $('#pwaPopup').fadeOut();
    });
  } else if (isIOS()) {
    alert('Tap Share Ã¢â€ â€™ Add to Home Screen');
  }
});

// Close button
$('#pwaCloseBtn').on('click', function() {
  $('#pwaPopup').fadeOut();
});
</script>	
	
<script>
function updateCurrencyDropdownDirection() {
    const dropdownItem = document.querySelector('.currency-dropdown');

    if (window.innerWidth <= 768) {
        dropdownItem.classList.add('drop-up');
    } else {
        dropdownItem.classList.remove('drop-up');
    }
}

// Run on load
updateCurrencyDropdownDirection();

// Run on resize
window.addEventListener('resize', updateCurrencyDropdownDirection);
</script>
	
	
	<script>
        if ('serviceWorker' in navigator) {
          navigator.serviceWorker.register('/service-worker.js');
        }
        let deferredPrompt;

        window.addEventListener('beforeinstallprompt', e => {
          e.preventDefault();
          deferredPrompt = e;
        
          // show your own install button
          document.getElementById('installBtn').style.display = 'block';
        });
        
        function installPWA() {
          deferredPrompt.prompt();
          deferredPrompt.userChoice.then(choice => {
            deferredPrompt = null;
          });
        }

    </script>
    
	<script>
	$(document).ready(function () {
	    window.currentLanguage = 'english';
		// loadcategory();
		loadMainSlider();
		loadCategoriesToList();
		loadAboutCategories();
		loadFeaturedCollections();
		loadPopularSellingProduct();
		loadMostViewedProduct();
// 		loadFeaturedNowSection();
// 		loadSponsoredSection();
		loadFeaturedProducts();
// 		loadCurrentLanguage();
		
// 		loadCurrencies();
        //  getCurrentCurrency();
// 		menu_display_view_category();
		const imageBaseUrl = "<?php echo BASE_IMAGE_URL; ?>";
		const imageCatUrl = "<?php echo CATEGORY_IMAGE_URL; ?>";
//         $(document).on('click', '#languageSwitcher', function(e) {
//             e.preventDefault();
//             console.log('Language button clicked');
//             changeLanguage();
//         });
//         $(document).on('click', '#currencySwitcher', function(e) {
//             e.preventDefault();
//             e.stopPropagation();
//             $('#currencyDropdown').toggle();
//         });
//         $(document).on('click', '.currency-item', function() {
//             const countryCode = $(this).data('country');
//             setCurrency(countryCode);
//         });
//         $(document).on('click', function(e) {
//             if (!$(e.target).closest('.currency-dropdown').length) {
//                 $('#currencyDropdown').hide();
//             }
//         });
//          console.log('Language button exists?', $('#languageSwitcher').length > 0);
        $(document).on('currencyUpdated', function(event, currencyData) {
            console.log('Home page received currency update:', currencyData);
            
            // Update the global currentCurrency
            if (typeof currentCurrency !== 'undefined') {
                currentCurrency = currencyData;
            }
            if (typeof window.currentCurrency !== 'undefined') {
                window.currentCurrency = currencyData;
            }
            
            // Update all prices on home page WITHOUT reloading
            updateAllPricesOnPage();
            
            // Show notification
            const currencyName = currencyData.country_name || 'selected currency';
            // showNotification('Prices updated to ' + currencyName, 'success');
        });
		function loadcategory() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'get_category'
				},
				success: function(response) {
					if (response.data && response.data.length > 0) {
						let wrapper = $('.swiper-shop .swiper-wrapper');
						wrapper.empty();

						response.data.forEach((item, index) => {
							let delay = 0.2 + (index * 0.2);
							let imagePath = `https://darjanaadmin.sandslab.jcom/assets/img/categories/${item.category_image}`;

							let slide = `
								<div class="swiper-slide">
									<div class="shop-box style-1 wow fadeInUp" data-wow-delay="${delay.toFixed(1)}s">
										<div class="dz-media">
											<img src="${imagePath}" alt="${item.category_type}">
										</div>
										<h6 class="product-name">
											<a href="#" class="category-link" data-cat-id="${item.ids}">${item.category_type}</a>
										</h6>
									</div>
								</div>
							`;
							wrapper.append(slide);
						});

						if (typeof Swiper !== 'undefined') {
							new Swiper(".swiper-shop", {
								slidesPerView: 4,
								spaceBetween: 30,
								navigation: {
									nextEl: ".shop-button-next",
									prevEl: ".shop-button-prev",
								},
								breakpoints: {
									768: { slidesPerView: 2 },
									992: { slidesPerView: 3 },
									1200: { slidesPerView: 4 }
								}
							});
						}

						if (typeof WOW !== 'undefined') {
							new WOW().init();
						}
					}
				},
				error: function(xhr, status, error) {
					console.error("Error loading category data:", error);
				}
			});
		}
		
		
		// Put this in a shared JS file or at the top of your main scripts block
        const CURRENCY_SYMBOL = '<?php echo STORE_CURRENCY_SYMBOL; ?>';  // "BD"
        
        // Enhanced formatPrice function with currency conversion
        function formatPrice(price, includeSymbol = true, decimals = 2, context = 'default') {
            if (isNaN(price) || price == null || price === '') {
                if (includeSymbol) {
                    if (context === 'card') {
                        return `<span class="card-currency-symbol">${CURRENCY_SYMBOL}</span> 0.00`;
                    }
                    return `${CURRENCY_SYMBOL} 0.00`;
                }
                return '0.00';
            }
            
            // Convert price based on current currency
            let convertedPrice = price;
            let currencySymbol = CURRENCY_SYMBOL;
            let currencyCode = 'BHD';
            
            // Check if we have currency session data
            if (typeof currentCurrency !== 'undefined') {
                const exchangeRate = currentCurrency.exchange_rate || 1;
                convertedPrice = price * exchangeRate;
                currencySymbol = currentCurrency.currency_symbol || CURRENCY_SYMBOL;
                currencyCode = currentCurrency.currency_code || 'BHD';
            }
            
            // Format the number
            let formatted = Number(convertedPrice).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            // Different styling based on context
            if (includeSymbol) {
                if (context === 'card') {
                    return `<span class="card-currency-symbol">${currencySymbol}</span> ${formatted} <small class="text-muted">${currencyCode}</small>`;
                }
                return `${currencySymbol} ${formatted} (${currencyCode})`;
            }
            
            return formatted;
        }
        
        // Store current currency globally
        let currentCurrency = <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
            'country_code' => 'BH',
            'country_name' => 'Bahrain',
            'currency_code' => 'BHD',
            'currency_symbol' => 'BD',
            'exchange_rate' => 1.0000,
            'flag_emoji' => '<span id="dropDownFlag" class="fi fi-bh"></span>'
        ]); ?>;
		
        // function menu_display_view_category() {
        //     $.ajax({
        //         url: 'controller/home_controller.php',
        //         type: 'POST',
        //         dataType: 'json',
        //         data: { action: 'get_category' },
        //         success: function(response) {
        //             console.log('Raw response:', response);
                    
        //             let $placeholder = $('#div_menu_list_category');
                    
        //             if (!response?.data || !Array.isArray(response.data)) return;
                    
        //             let html = '';
                    
        //             response.data.forEach(item => {
        //                 // Try to fix encoding if needed
        //                 let categoryName = item.category_type;
                        
        //                 html += `
        //                     <li class="has-mega-menu sub-menu-down auto-width menu-left">
        //                         <a href="Shop?cat_id=${item.ids}" 
                                    
        //                           data-cat-id="${item.ids}">
        //                             ${categoryName}
        //                         </a>
        //                     </li>
        //                 `;
        //             });
                    
        //             // Clear existing dynamic categories
        //             $placeholder.nextAll('li').remove();
                    
        //             // Insert categories after placeholder
        //             $placeholder.after(html);
                    
        //             console.log('Menu updated. Language:', response.language);
        //         },
        //         error: function(xhr, status, error) {
        //             console.error("Category menu loading failed:", error);
        //         }
        //     });
        // }

        function showNotification(message, type) {
            const dropdown = document.getElementById('dropdownContent');
            if (!dropdown) return;
            
            dropdown.innerHTML = message;
            dropdown.className = type === 'success' ? 'success' : 'warning';
            dropdown.style.display = 'block';
            
            setTimeout(() => {
                dropdown.style.display = 'none';
            }, 3000);
        }
		function loadFeaturedProducts() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_featured_products'
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        // Store data once
                        window.featuredProducts = response.data;
        
                        // Render with current language settings
                        renderFeaturedProducts();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching featured products:", error);
                }
            });
        }
        
        function renderFeaturedProducts() {
            if (!window.featuredProducts || !window.featuredProducts.length) {
                return;
            }
        
            const isArabic = window.currentLanguage === 'arabic';
        
            let productHTML = '';
            let delay = 0.2;
        
            window.featuredProducts.forEach((product, index) => {
                let firstImage = product.images ? product.images.split(',')[0] : 'default.png';
                let imagePath = `${imageBaseUrl}${firstImage}`;
                let delayStr = (delay + index * 0.2).toFixed(1) + 's';
        
                // ── Select name based on language ────────────────────────────────
                let displayName = isArabic 
                    ? (product.product_name_arabic || product.product_name) 
                    : product.product_name;
        
                let shortName = displayName.length > 20 
                    ? displayName.substring(0, 15) + '...' 
                    : displayName;
        
                // Prices (same logic)
                const baseOfferPrice = parseFloat(product.amount_offer || product.off_amt) || 0;
                const baseMrpPrice   = parseFloat(product.amount_mrp  || product.mrp_amt)  || 0;
        
                let convertedOfferPrice = baseOfferPrice;
                let convertedMrpPrice   = baseMrpPrice;
                let currencySymbol = 'BD';
                let currencyCode   = 'BHD';
        
                if (typeof currentCurrency !== 'undefined' && currentCurrency) {
                    const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
                    convertedOfferPrice *= exchangeRate;
                    convertedMrpPrice   *= exchangeRate;
                    currencySymbol = currentCurrency.currency_symbol || 'BD';
                    currencyCode   = currentCurrency.currency_code   || 'BHD';
                }
        
                const formatPriceValue = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };
        
                const formattedOfferPrice = formatPriceValue(convertedOfferPrice);
                const formattedMrpPrice   = formatPriceValue(convertedMrpPrice);
        
                productHTML += `
                    <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 ${product.category_type} wow fadeInUp" data-wow-delay="${delayStr}">
                        <div class="shop-card">
                            <div class="dz-media">
                                <a href="ProductDetails?id=${product.ids}">
                                    <img src="${imagePath}" alt="${displayName}">
                                </a>
                                <div class="shop-meta">
                                    <a class="btn btn-secondary btn-md btn-rounded quick-view-btn" data-product-id="${product.ids}">
                                        <i class="fa-solid fa-eye d-md-none d-block"></i>
                                        <span class="d-md-block d-none">Quick View</span>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <h7 class="title" style="font-weight: 300;">
                                        <a href="ProductDetails?id=${product.ids}">${shortName}</a>
                                    </h7>
                                </div>
                                <div class="row">
                                    <div class="price">
                                        <span class="current-price blink-gold">
                                            ${currencySymbol} ${formattedOfferPrice}
                                        </span>
                                        <span class="original-price red-mrp">
                                            <del style="font-size: 12px;">${currencySymbol} ${formattedMrpPrice}</del>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div> 
                    </li>
                `;
            });
        
            $('#featured-masonry').html(productHTML);
            new WOW().init();  // re-apply animations
        }
        
		$(document).on('click', '.category-link', function(e) {
			e.preventDefault();
			var catId = $(this).data('cat-id');
			$.redirect('Shop', { cat_id: catId }, 'POST');
		});

		function loadMainSlider() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_products'
                },
                success: function(response) {
                    if (response.status === 'success' && response.data && response.data.length > 0) {
                        const mainSlider = $('#slider-main');
                        const thumbSlider = $('#slider-thumbs');
        
                        mainSlider.empty();
                        thumbSlider.empty();
        
                        response.data.forEach(product => {
                            const image = product.images[0] || "default.png";
                            const title = product.product_name;
                            const detailLink = `ProductDetails?id=${product.ids}`;
                            
                            // Get base prices in BHD
                            const basePrice = parseFloat(product.amount_offer) || 0;
                            const baseMrpPrice = parseFloat(product.amount_mrp) || 0;
                            
                            // Convert prices based on current currency
                            let convertedPrice = basePrice;
                            let convertedMrpPrice = baseMrpPrice;
                            let currencySymbol = 'BD';
                            let currencyCode = 'BHD';
                            
                            if (typeof currentCurrency !== 'undefined') {
                                const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
                                convertedPrice = basePrice * exchangeRate;
                                convertedMrpPrice = baseMrpPrice * exchangeRate;
                                currencySymbol = currentCurrency.currency_symbol || 'BD';
                                currencyCode = currentCurrency.currency_code || 'BHD';
                            }
                            
                            // Format prices
                            const formatPriceValue = (price) => {
                                if (isNaN(price) || price === 0) return '0.00';
                                return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                            };
                            
                            const formattedPrice = formatPriceValue(convertedPrice);
                            const formattedMrpPrice = formatPriceValue(convertedMrpPrice);
        
                            // Define season-specific data
                            const seasonData = {
                                summer: {
                                    icon: `<svg viewBox="0 0 24 24"><path d="M12 2a1 1 0 0 1 1 1v1a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm0 17a1 1 0 0 1 1 1v1a1 1 0 0 1-2 0v-1a1 1 0 0 1 1-1zm-9-7a1 1 0 0 1 1-1h1a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm16 0a1 1 0 0 1 1-1h1a1 1 0 0 1 0 2h-1a1 1 0 0 1-1-1zm-1.414-6.586a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1-1.414 1.414l-.707-.707a1 1 0 0 1 0-1.414zm-10.586 10.586a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1-1.414 1.414l-.707-.707a1 1 0 0 1 0-1.414zM6.586 6.586a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1-1.414 1.414l-.707-.707a1 1 0 0 1 0-1.414zm10.586 10.586a1 1 0 0 1 1.414 0l.707.707a1 1 0 0 1-1.414 1.414l-.707-.707a1 1 0 0 1 0-1.414zM12 6a6 6 0 1 0 0 12 6 6 0 0 0 0-12z"/></svg>`,
                                    subtitle: "Trendy and Classic for New Season"
                                },
                                winter: {
                                    icon: `<svg viewBox="0 0 24 24"><path d="M12 2a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0V3a1 1 0 0 1 1-1zm0 16a1 1 0 0 1 1 1v2a1 1 0 0 1-2 0v-2a1 1 0 0 1 1-1zm-6.364-2.636a1 1 0 0 1 1.414 0l1.414 1.414a1 1 0 0 1-1.414 1.414L5.636 16.778a1 1 0 0 1 0-1.414zm12.728 0a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 0 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM3 12a1 1 0 0 1 1-1h2a1 1 0 0 1 0 2H4a1 1 0 0 1-1-1zm16 0a1 1 0 0 1 1-1h2a1 1 0 0 1 0 2h-2a1 1 0 0 1-1-1zm-2.636-6.364a1 1 0 0 1 1.414 0l1.414 1.414a1 1 0 0 1-1.414 1.414L16.364 7.05a1 1 0 0 1 0-1.414zM7.05 16.364a1 1 0 0 1 0 1.414l-1.414 1.414a1 1 0 0 1-1.414-1.414l1.414-1.414a1 1 0 0 1 1.414 0zM12 8a4 4 0 1 0 0 8 4 4 0 0 0 0-8z"/></svg>`,
                                    subtitle: "Cool Styles for Cold Days"
                                },
                                monsoon: {
                                    icon: `<svg viewBox="0 0 24 24"><path d="M12 2a6 6 0 0 0-6 6c0 1.5.56 2.86 1.47 3.94C5.72 12.76 4 14.76 4 17a5 5 0 0 0 5 5h6a5 5 0 0 0 5-5c0-2.24-1.72-4.24-3.47-5.06A6 6 0 0 0 18 8a6 6 0 0 0-6-6zm-1 12v4a1 1 0 0 1-2 0v-4a1 1 0 0 1 2 0zm4 0v4a1 1 0 0 1-2 0v-4a1 1 0 0 1 2 0z"/></svg>`,
                                    subtitle: "Stay Stylish in the Rain"
                                }
                            };
        
                            const collectionType = product.collection_type.toLowerCase();
                            const { icon, subtitle } = seasonData[collectionType] || seasonData.summer;
        
                            const mainSlide = `
                                <div class="slick-slide">
                                    <div class="content-info move-up">
                                        <h1 class="title" style="font-size: 4rem;">${title}</h1>
                                        <div class="swiper-meta-items">
                                            <div class="meta-content">
                                                <div class="price-label-row">
                                                    <span class="price-label">Price</span>
                                                    <span class="offer-percent text-success fw-bold">${product.discount_percentage}% OFF</span>
                                                </div>
                                                <div class="price-row">
                                                    <span class="price-num d-inline-block">${currencySymbol} ${formattedPrice}</span>
                                                    <span class=""><del>${currencySymbol} ${formattedMrpPrice}</del></span>
                                                </div>
                                            </div>
                                        </div>
                                        <div class="content-btn m-b30">
                                            <a href="ProductDetails?id=${product.ids}" class="btn btn-outline-secondary btnhover20">VIEW DETAIL</a>
                                        </div>
                                        <br>
                                        <br>
                                        <!-- Season Collection Section -->
                                        <div class="season-collection-banner ${collectionType}">
                                            ${icon}
                                            <div class="collection-text">
                                                <div class="collection-title">${product.collection_type}</div>
                                                <div class="collection-subtitle">${subtitle}</div>
                                            </div>
                                        </div>
                                    </div>
                                </div>`;
        
                            const thumbSlide = `
                                <div class="slick-slide">
                                    <div class="banner-media" data-name="${product.discount_percentage}% OFF">
                                        <div class="img-preview">
                                            <img src="${imageBaseUrl}${image}" alt="${title}">
                                        </div>
                                    </div>
                                </div>
                            `;
        
                            mainSlider.append(mainSlide);
                            thumbSlider.append(thumbSlide);
                        });
        
                        $('.slider-main').slick('refresh');
                        $('.slider-thumbs').slick('refresh');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading slider data:", error);
                }
            });
        }

		$(document).on('click', '.add-to-cart, .view-detail', function(e) {
			e.preventDefault();
			var productId = $(this).data('product-id');
			$.redirect('ProductDetails', { id: productId }, 'POST');
		});

		function loadCategoriesToList() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: {
					action: 'get_category'
				},
				success: function(response) {
					if (response.data && response.data.length > 0) {
						const swiperWrapper = $('.swiper-shop .swiper-wrapper');
						swiperWrapper.empty();

						for (let i = 0; i < response.data.length; i += 2) {
							const item1 = response.data[i];
							const item2 = response.data[i + 1];

							const getSlideBlock = (item) => {
								if (!item) return '';
								const imageUrl = `https://darjanaadmin.sandslab.com/assets/img/categories/${item.category_image || 'default.jpg'}`;
								const category = item.category_type;

								return `
									<div class="col-6 p-2">
										<div class="position-relative" style="height: 300px; 
										border-radius: 10px; overflow: hidden;">
											<img src="${imageUrl}" alt="${category}" class="w-100 h-100" style="object-fit: cover;" />
											<div class="position-absolute bottom-0 start-0 p-3 bg-dark bg-opacity-50 w-100">
												<h5 class="text-white mb-1">${category}</h5>
												<a href="Shop?cat_id=${item.ids}" class="btn btn-sm btn-light">Shop Now</a>
											</div>
										</div>
									</div>
								`;
							};

							const slide = `
								<div class="swiper-slide">
									<div class="row m-0">
										${getSlideBlock(item1)}
										${getSlideBlock(item2)}
									</div>
								</div>
							`;

							swiperWrapper.append(slide);
						}

						new Swiper('.swiper-shop', {
							slidesPerView: 1,
							loop: true,
							navigation: {
								nextEl: '.shop-button-next',
								prevEl: '.shop-button-prev',
							}
						});
					}
				},
				error: function(xhr, status, error) {
					console.error("Error fetching categories:", error);
				}
			});
		}

		function loadAboutCategories() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: { action: 'get_category' },
				success: function(response) {
					if (response.data && response.data.length > 0) {
						const swiperWrapper = $('.about-swiper .swiper-wrapper');
						swiperWrapper.empty();

						response.data.slice(0, 8).forEach(function(item) {
							const imageUrl = `https://darjanaadmin.sandslab.com/assets/img/categories/${item.category_image || 'default.jpg'}`;
							const category = item.category_type;

							const html = `
								<div class="swiper-slide">
									<div class="about-box text-center">
										<div class="about-img mb-2">
											<img src="${imageUrl}" alt="${category}" style="width:200px;height:300px;object-fit:cover;border-radius:10px;">
										</div>
										<div class="about-btn">
											<a class="btn btn-white btn-md" href="Shop?cat_id=${item.ids}">${category}</a>
										</div>
									</div>
								</div>
							`;
							swiperWrapper.append(html);
						});

						new Swiper('.about-swiper', {
							slidesPerView: 4,
							spaceBetween: 30,
							navigation: {
								nextEl: '.testimonial-button-next',
								prevEl: '.testimonial-button-prev',
							},
							pagination: {
								el: '.swiper-pagination',
								clickable: true,
							},
							breakpoints: {
								0: { slidesPerView: 1 },
								576: { slidesPerView: 2 },
								992: { slidesPerView: 3 },
								1200: { slidesPerView: 4 }
							}
						});
					}
				},
				error: function(xhr, status, error) {
					console.error("Error loading about categories:", error);
				}
			});
		}

		function loadFeaturedCollections() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: { action: 'get_collections' },
				success: function(response) {
					if (response.data && response.data.length > 0) {
						const wrapper = $('.swiper-product .swiper-wrapper.product-style2');
						wrapper.empty();

						response.data.forEach(function(collection, idx) {
							const imageUrl = `https://darjanaadmin.sandslab.com/assets/img/collection/${collection.collection_img || 'default.jpg'}`;
							const offer = collection.offer || '';
							const name = collection.collection_type || '';
							const link = `Shop?collection_id=${collection.ids}`;
							const delay = 0.4 + idx * 0.2;

							const slide = `
								<div class="swiper-slide">
									<div class="product-box style-2 wow fadeInUp" data-wow-delay="${delay}s">
										<div class="product-media" style="background-image: url('${imageUrl}'); position: relative;">
											<div class="media-overlay"></div>
										</div>
										<div class="product-content">
											<div class="main-content">
												<span class="offer">${offer}% OFF</span>
												<h2 class="product-name">${name}</h2>
												<a href="${link}" class="btn btn-outline-secondary btn-rounded btn-lg">Collect Now</a>
											</div>
										</div>
									</div>
								</div>
							`;
							wrapper.append(slide);
						});

						if (typeof Swiper !== 'undefined') {
							new Swiper('.swiper-product', {
								slidesPerView: 3,
								spaceBetween: 30,
								loop: true,
								autoplay: {
									delay: 3500,
									disableOnInteraction: false,
								},
								breakpoints: {
									0: { slidesPerView: 1 },
									768: { slidesPerView: 2 },
									1200: { slidesPerView: 3 }
								}
							});
						}
						if (typeof WOW !== 'undefined') {
							new WOW().init();
						}
					}
				},
				error: function(xhr, status, error) {
					console.error("Error loading collections:", error);
				}
			});
		}

		function loadMostViewedProduct() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_most_viewed_product'
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        // Store once
                        window.mostViewedProducts = response.data;
        
                        // Render with current language
                        renderMostViewedProducts();
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading most viewed products:", error);
                }
            });
        }
        
        function renderMostViewedProducts() {
            if (!window.mostViewedProducts || !window.mostViewedProducts.length) {
                return;
            }
        
            const isArabic = window.currentLanguage === 'arabic';
            let swiperWrapper = $('#most-viewed-wrapper');
            swiperWrapper.empty();
        
            window.mostViewedProducts.forEach(function(product, index) {
                let productImage = product.images ? product.images.split(',')[0] : 'default.png';
                let delay = 0.4 + (index * 0.2);
        
                // ── Choose name depending on current language ───────────────────────
                let displayName = isArabic 
                    ? (product.product_name_arabic || product.product_name) 
                    : product.product_name;
        
                let shortName = displayName.length > 20 
                    ? displayName.substring(0, 15) + '...' 
                    : displayName;
        
                // Prices (same logic as before)
                const baseOfferPrice = parseFloat(product.amount_offer || product.off_amt) || 0;
                const baseMrpPrice   = parseFloat(product.amount_mrp  || product.mrp_amt)  || 0;
        
                let convertedOfferPrice = baseOfferPrice;
                let convertedMrpPrice   = baseMrpPrice;
                let currencySymbol = 'BD';
                let currencyCode   = 'BHD';
        
                if (typeof currentCurrency !== 'undefined' && currentCurrency) {
                    const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
                    convertedOfferPrice *= exchangeRate;
                    convertedMrpPrice   *= exchangeRate;
                    currencySymbol = currentCurrency.currency_symbol || 'BD';
                    currencyCode   = currentCurrency.currency_code   || 'BHD';
                }
        
                const formatPriceValue = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };
        
                const formattedOfferPrice = formatPriceValue(convertedOfferPrice);
                const formattedMrpPrice   = formatPriceValue(convertedMrpPrice);
        
                let html = `
                    <div class="swiper-slide">
                        <div class="shop-card style-2 wow fadeInUp" data-wow-delay="${delay}s">
                            <div class="dz-media">
                                <a href="ProductDetails?id=${product.ids}">
                                    <img src="${imageBaseUrl}${productImage}" alt="${displayName}">
                                </a>
                            </div>
                            <div class="">
                                <div class="row">
                                    <h7 class="title" style="font-weight: 300;">
                                        <a href="ProductDetails?id=${product.ids}">${shortName}</a>
                                    </h7>
                                </div>
                                <div class="row">
                                    <div class="price">
                                        <span class="current-price blink-gold">
                                            ${currencySymbol} ${formattedOfferPrice}
                                        </span>
                                        <span class="original-price red-mrp">
                                            <del>${currencySymbol} ${formattedMrpPrice}</del>
                                        </span>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>`;
        
                swiperWrapper.append(html);
            });
        
            // Re-init Swiper
            if (typeof Swiper !== 'undefined') {
                // Destroy existing instance if it exists (important when re-rendering)
                if (window.mostViewedSwiper) {
                    window.mostViewedSwiper.destroy(true, true);
                }
        
                window.mostViewedSwiper = new Swiper(".swiper-four", {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    loop: true,
                    autoplay: {
                        delay: 2500,
                        disableOnInteraction: false,
                    },
                    breakpoints: {
                        0:    { slidesPerView: 1 },
                        768:  { slidesPerView: 2 },
                        992:  { slidesPerView: 3 },
                        1200: { slidesPerView: 4 }
                    }
                });
            }
        
            // Re-init WOW animations
            if (typeof WOW !== 'undefined') {
                new WOW().init();
            }
        }
        
		function loadFeaturedNowSection() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: { action: 'get_featured_now' },
				success: function(response) {
					if (response.data && response.data.length > 0) {
						const wrapper = $('.swiper-product2 .swiper-wrapper');
						wrapper.empty();

						const products = response.data;
						const cardsPerSlide = 3;
						const totalProducts = products.length;
						const totalFullSlides = Math.floor(totalProducts / cardsPerSlide);
						const remainder = totalProducts % cardsPerSlide;

						for (let i = 0; i < totalFullSlides; i++) {
							let slideProducts = products.slice(i * cardsPerSlide, (i + 1) * cardsPerSlide);
							let slideHTML = generateSlideHTML(slideProducts, i * cardsPerSlide);
							wrapper.append(slideHTML);
						}

						if (remainder > 0) {
							let lastStart = totalProducts - cardsPerSlide;
							if (lastStart < 0) lastStart = 3;
							let lastSlideProducts = products.slice(lastStart, totalProducts);
							let slideHTML = generateSlideHTML(lastSlideProducts, lastStart);
							wrapper.append(slideHTML);
						}

						if (typeof Swiper !== 'undefined') {
							new Swiper('.swiper-product2', {
								slidesPerView: 1,
								spaceBetween: 50,
								loop: true,
								autoplay: {
									delay: 5000,
									disableOnInteraction: false
								}
							});
						}

						if (typeof WOW !== 'undefined') {
							new WOW().init();
						}
					}
				},
				error: function(xhr, status, error) {
					console.log("Error loading featured now data:", error);
				}
			});

			function generateSlideHTML(productsArray, baseIdx) {
				let slideContent = '';
				productsArray.forEach((product, idx) => {
					const delay = 0.4 + (baseIdx + idx) * 0.1;
					const productImage = product.images ? product.images.split(',')[0] : 'default.png';
					const discount = product.discount_percentage ? `Up to ${product.discount_percentage}% Off` : '';
					const productName = product.product_name || '';
					const price = product.amount_offer || '';
					const mrp = product.amount_mrp || '';
					const link = `ProductDetails?id=${product.ids}`;
				});

				return `<div class="swiper-slide"><div class="row g-4">${slideContent}</div></div>`;
			}
		}

		function loadSponsoredSection() {
			$.ajax({
				url: 'controller/home_controller.php',
				type: 'POST',
				dataType: 'json',
				data: { action: 'get_sponsored' },
				success: function(response) {
					if (response.data && response.data.length > 0) {
						const wrapper = $('.swiper-company .swiper-wrapper');
						wrapper.empty();

						response.data.forEach(function(item, idx) {
							const imgUrl = `https://darjanaadmin.sandslab.com/assets/img/sponsored/${item.brand_img || 'default.jpg'}`;
							const logoUrl = `https://darjanaadmin.sandslab.com/assets/img/sponsored/logo/${item.brand_logo || 'default.png'}`;
							const offer = item.offer ? `${item.offer}` : '';
							const instore = (item.Instore && item.Instore.toLowerCase() === 'yes') 
								? `<span class="sale-badge">in Store</span>` : '';
							const sponsoredType = item.sponsored_item || '';
							const delay = 0.4 + idx * 0.2;

							const slide = `
								<div class="swiper-slide">
									<div class="company-box style-1 wow fadeInUp" data-wow-delay="${delay}s">
										<div class="dz-media">
											<img src="${imgUrl}" alt="image" class="company-img">
											<img src="${logoUrl}" alt="logo" class="logo">
											${instore}
										</div>
										<div class="dz-content">
											<h6 class="title">${sponsoredType}</h6>
											<span class="sale-title">${offer}</span>
										</div>
									</div>
								</div>
							`;
							wrapper.append(slide);
						});

						if (typeof Swiper !== 'undefined') {
							new Swiper('.swiper-company', {
								slidesPerView: 4,
								spaceBetween: 30,
								loop: true,
								autoplay: {
									delay: 2500,
									disableOnInteraction: false,
								},
								breakpoints: {
									0: { slidesPerView: 1 },
									576: { slidesPerView: 2 },
									992: { slidesPerView: 3 },
									1200: { slidesPerView: 4 }
								}
							});
						}
						if (typeof WOW !== 'undefined') {
							new WOW().init();
						}
					}
				},
				error: function(xhr, status, error) {
					console.error("Error loading sponsored data:", error);
				}
			});
		}

		function loadPopularSellingProduct() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: {
                    action: 'get_top_selling_product'
                },
                success: function(response) {
                    if (response.data && response.data.length > 0) {
                        // Store the full data globally or in a better place (e.g. window or a module)
                        window.topSellingProducts = response.data;   // ← important
        
                        renderTopSellingProducts();   // initial render
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error fetching top selling Product:", error);
                }
            });
        }

        function renderTopSellingProducts() {
            if (!window.topSellingProducts || !window.topSellingProducts.length) {
                return;
            }
        
            const isArabic = window.currentLanguage === 'arabic';   // we'll set this later
        
            let productHTML = '';
            let delay = 0.2;
        
            window.topSellingProducts.forEach((product, index) => {
                let imagePath = `${imageBaseUrl}${product.image}`;
                let delayStr = (delay + index * 0.2).toFixed(1) + 's';
        
                // ── Choose name depending on language ────────────────────────────────
                let displayName = isArabic ? (product.arabic_name || product.name) : product.name;
        
                // Truncate if too long
                let shortName = displayName.length > 20 
                    ? displayName.substring(0, 15) + '...' 
                    : displayName;
        
                // Get base prices in BHD
                const baseOfferPrice = parseFloat(product.off_amt || product.amount_offer) || 0;
                const baseMrpPrice   = parseFloat(product.mrp_amt  || product.amount_mrp)  || 0;
        
                // Convert prices based on current currency
                let convertedOfferPrice = baseOfferPrice;
                let convertedMrpPrice   = baseMrpPrice;
                let currencySymbol = 'BD';
                let currencyCode   = 'BHD';
        
                if (typeof currentCurrency !== 'undefined' && currentCurrency) {
                    const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
                    convertedOfferPrice *= exchangeRate;
                    convertedMrpPrice   *= exchangeRate;
                    currencySymbol = currentCurrency.currency_symbol || 'BD';
                    currencyCode   = currentCurrency.currency_code   || 'BHD';
                }
        
                const formatPriceValue = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };
        
                const formattedOfferPrice = formatPriceValue(convertedOfferPrice);
                const formattedMrpPrice   = formatPriceValue(convertedMrpPrice);
        
                productHTML += `
                    <li class="card-container col-6 col-xl-3 col-lg-3 col-md-4 col-sm-6 ${product.category} wow fadeInUp" data-wow-delay="${delayStr}">
                        <div class="shop-card">
                            <div class="dz-media">
                                <a href="ProductDetails?id=${product.product_id}">
                                    <img src="${imagePath}" alt="${displayName}">
                                </a>
                                <div class="shop-meta">
                                    <a class="btn btn-secondary btn-md btn-rounded quick-view-btn" data-product-id="${product.product_id}">
                                        <i class="fa-solid fa-eye d-md-none d-block"></i>
                                        <span class="d-md-block d-none">Quick View</span>
                                    </a>
                                </div>
                            </div>
                            <div class="">
                                <div class="row">
                                    <h7 class="title" style="font-weight: 300;">
                                        <a href="ProductDetails?id=${product.product_id}">${shortName}</a>
                                    </h7>
                                </div>
                                <div class="row">
                                    <div class="price">
                                        <span class="current-price blink-gold">
                                            ${currencySymbol} ${formattedOfferPrice}
                                        </span>
                                        <span class="original-price red-mrp">
                                            <del>${currencySymbol} ${formattedMrpPrice}</del>
                                        </span>
                                    </div>
                                </div>
                            </div>
                            <div class="product-tag">
                                <span class="badge">${getTranslation('top_seller')}</span>
                            </div>
                        </div>
                    </li>
                `;
            });
        
            $('#masonry').html(productHTML);
            new WOW().init();   // re-init animations
        }

		$(document).on('click', '.quick-view-btn', function(e) {
			e.preventDefault();
			e.stopPropagation();
			const productId = $(this).data('product-id');
			loadProductDetails(productId);
		});

		function loadProductDetails(productId) {
			$.ajax({
				url: 'controller/product_controller.php',
				type: 'POST',
				data: { 
					action: 'get_product_details',
					product_id: productId
				},
				dataType: 'json',
				beforeSend: function() {
					$('#quickViewModal .modal-body').html('<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Loading product details...</p></div>');
					$('#quickViewModal').modal('show');
				},
				success: function(response) {
					if(response.status === 'success') {
						showQuickViewModal(response.data);
					} else {
						$('#quickViewModal .modal-body').html('<div class="alert alert-danger">' + response.message + '</div>');
					}
				},
				error: function(xhr, status, error) {
					$('#quickViewModal .modal-body').html('<div class="alert alert-danger">Error loading product details. Please try again later.</div>');
					console.error(error);
				}
			});
		}

		function showQuickViewModal(product) {
            const isArabic = window.currentLanguage === 'arabic';
        
            // Tiny helper — only for name & description
            const getLocalized = (english, arabic) => {
                if (isArabic && arabic && arabic.trim() !== '') {
                    return arabic;
                }
                return english || '';
            };
        
            const getProductImageUrl = (imageName) => {
                return imageName 
                    ? `${imageBaseUrl}${imageName}` 
                    : 'images/shop/product/default-product.jpg';
            };
        
            let currencySymbol = 'BD';
            let currencyCode = 'BHD';
            
            if (typeof currentCurrency !== 'undefined') {
                currencySymbol = currentCurrency.currency_symbol || 'BD';
                currencyCode = currentCurrency.currency_code || 'BHD';
            }
        
            const originalPrice = parseFloat(product.amount_mrp) || 0;
            const sellingPrice = parseFloat(product.amount_selling) || 0;
            const discount = originalPrice > sellingPrice 
                ? Math.round(((originalPrice - sellingPrice) / originalPrice) * 100) 
                : 0;
        
            const primaryImage = product.images?.length > 0 
                ? getProductImageUrl(product.images[0])
                : getProductImageUrl(null);
        
            // ── Only these three lines are different ───────────────────────────────
            const productName        = getLocalized(product.product_name, product.product_name_arabic);
            const productDescription = getLocalized(product.product_description, product.product_description_arabic);
            const noDescMsg = getTranslation('no_description');
        
            const generateImageSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <div class="dz-media DZoomImage">
                                <a class="mfp-link lg-item" href="${primaryImage}" data-src="${primaryImage}">
                                    <i class="feather icon-maximize dz-maximize top-right"></i>
                                </a>
                                <img src="${primaryImage}" alt="${productName}">
                            </div>
                        </div>
                    `;
                }
        
                return product.images.map(image => {
                    const imgUrl = getProductImageUrl(image);
                    return `
                        <div class="swiper-slide">
                            <div class="dz-media DZoomImage">
                                <a class="mfp-link lg-item" href="${imgUrl}" data-src="${imgUrl}">
                                    <i class="feather icon-maximize dz-maximize top-right"></i>
                                </a>
                                <img src="${imgUrl}" alt="${productName}">
                            </div>
                        </div>
                    `;
                }).join('');
            };
        
            const generateThumbSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <img src="${primaryImage}" alt="${productName}">
                        </div>
                    `;
                }
        
                return product.images.map(image => {
                    const imgUrl = getProductImageUrl(image);
                    return `
                        <div class="swiper-slide">
                            <img src="${imgUrl}" alt="${productName}" class="thumbnail-img">
                        </div>
                    `;
                }).join('');
            };
        
            // Everything below this line is IDENTICAL to your original code
            // (generateSizeOptions, generateColorOptions, generateLengthOptions, modalContent, etc.)
        
            const generateSizeOptions = () => {
                if (!product.sizes || product.sizes.length === 0) {
                    return `<p class="text-muted" data-i18n="no_sizes_available">${getTranslation('no_sizes_available')}</p>`;
                }

        
                return product.sizes.map((size, index) => `
                    <div class="form-check form-check-inline size-option">
                        <input class="form-check-input" type="radio" name="productSize" 
                            id="size-${index}" value="${size}" ${index === 0 ? 'checked' : ''}>
                        <label class="form-check-label size-label" for="size-${index}">${size}</label>
                    </div>
                `).join('');
            };
        
            const generateColorOptions = () => {
                // For colors
                if (!product.colors || product.colors.length === 0) {
                    return `<p class="text-muted" data-i18n="no_colors_available">${getTranslation('no_colors_available')}</p>`;
                }
        
                const colorMap = {
                    'BLUE': { code: '#0000FF', text: 'Blue' },
                    'GREEN': { code: '#008000', text: 'Green' },
                    'RED': { code: '#FF0000', text: 'Red' },
                    'BLACK': { code: '#000000', text: 'Black' },
                    'WHITE': { code: '#FFFFFF', text: 'White', border: '1px solid #ddd' },
                    'YELLOW': { code: '#FFFF00', text: 'Yellow' },
                    'PURPLE': { code: '#800080', text: 'Purple' },
                    'PINK': { code: '#FFC0CB', text: 'Pink' },
                    'ORANGE': { code: '#FFA500', text: 'Orange' },
                    'GRAY': { code: '#808080', text: 'Gray' }
                };
        
                return product.colors.map((color, index) => {
                    const colorName = color.toUpperCase();
                    const colorData = colorMap[colorName] || { code: '#CCCCCC', text: color };
                    return `
                        <div class="form-check form-check-inline color-option">
                            <input class="form-check-input" type="radio" name="productColor" 
                                id="color-${index}" value="${color}" ${index === 0 ? 'checked' : ''}>
                            <label class="form-check-label color-label" for="color-${index}" 
                                style="background-color: ${colorData.code}; ${colorData.border || ''}"
                                title="${colorData.text}">
                                <span class="visually-hidden">${colorData.text}</span>
                            </label>
                        </div>
                    `;
                }).join('');
            };
        
            const generateLengthOptions = () => {
                if (!product.length || product.length.length === 0) {
                    return `<p class="text-muted" data-i18n="no_length_available">${getTranslation('no_length_available')}</p>`;
                }

        
                const options = product.length.map((length, index) => 
                    `<option value="${length}" ${index === 0 ? 'selected' : ''}>${length}</option>`
                ).join('');
        
                return `
                    <select class="form-select w-50" id="length-select">
                        ${options}
                    </select>
                `;
            };
        
            const modalContent = `
                <div class="row g-xl-4 g-3">
                    <div class="col-xl-6 col-md-6">
                        <div class="dz-product-detail mb-0">
                            <div class="swiper-container-wrapper d-flex">
                                <div class="swiper thumbnail-swiper-vertical me-2">
                                    <div class="swiper-wrapper">
                                        ${generateThumbSlides()}
                                    </div>
                                </div>
                                <div class="swiper main-image-swiper">
                                    <div class="swiper-wrapper" id="lightgallery">
                                        ${generateImageSlides()}
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>    
                    </div>
                    <div class="col-xl-6 col-md-6">
                        <div class="dz-product-detail style-2 ps-3 pe-3 pt-2 mb-0">
                            <div class="dz-content">
                                <div class="dz-content-footer">
                                    <div class="dz-content-start">
                                        ${discount > 0 ? 
                                            `<span class="badge bg-secondary mb-2">${getTranslation('sale_off', {percent: discount})}</span>` 
                                            : ''}
                                        <h4 class="title mb-1">${productName}</h4>
                                    </div>
                                </div>
                                <p class="para-text" style="text-align: justify;color: #696969">
                                    ${productDescription || getTranslation('no_description')}
                                </p>
                                <div class="mb-3 color-selection">
                                    <h6 class="mb-2">${getTranslation('color')}:</h6>
                                    <div class="color-options-container">
                                        ${generateColorOptions()}
                                    </div>
                                </div>
                                <div class="mb-3 size-selection">
                                    <h6 class="mb-2">${getTranslation('size')}:</h6>
                                    <div class="size-options-container">
                                        ${generateSizeOptions()}
                                    </div>
                                </div>
                                
                                <div class="mb-3 length-selection">
                                    <h6 class="mb-2">${getTranslation('length')}:</h6>
                                    <div class="Length-options-container">
                                        ${generateLengthOptions()}
                                    </div>
                                </div>
                                
                                <div class="meta-content m-b20 d-flex align-items-end">
                                    <div class="me-3">
                                        <span class="form-label">${getTranslation('price')}</span>
                                        <span class="price">
                                            ${currencySymbol} ${formatPrice(sellingPrice, false)}
                                            ${originalPrice > sellingPrice ? 
                                                `<del>${currencySymbol} ${formatPrice(originalPrice, false)}</del>` : ''}
                                        </span>
                                    </div>
                                    <div class="btn-quantity light me-0">
                                        <label class="form-label">${getTranslation('quantity')}</label>
                                        <input type="number" min="1" value="1" name="quantity" class="form-control quantity-input">
                                    </div>
                                </div>
                                <div class="cart-btn">
                                    <button class="btn btn-outline-secondary btn-lg add-to-cart-btn">
                                        <i class="fas fa-shopping-cart me-2"></i>${getTranslation('add_to_cart')}
                                    </button>
                                    <button class="btn btn-outline-secondary btn-lg add-to-wishlist-btn">
                                        <i class="fas fa-heart me-2"></i>${getTranslation('add_to_wishlist')}
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div> 
                </div>
            `;

        
            checkQuickViewWishlistStatus(product.ids);
            $('#quickViewModal .modal-body').html(modalContent);
        
            // ── From here everything is exactly the same as your original ───────────
            setTimeout(() => {
                const thumbSwiper = new Swiper('.thumbnail-swiper-vertical', {
                    direction: 'vertical',
                    slidesPerView: 4,
                    spaceBetween: 10,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        0: { slidesPerView: 3 },
                        768: { slidesPerView: 4 }
                    }
                });
        
                const mainSwiper = new Swiper('.main-image-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    },
                    thumbs: {
                        swiper: thumbSwiper,
                    },
                });
        
                if (typeof lightGallery !== 'undefined') {
                    lightGallery(document.getElementById('lightgallery'), {
                        selector: '.lg-item',
                        download: false,
                        share: false
                    });
                }
        
                $('.color-option input[type="radio"]').change(function() {
                    $('.color-label').removeClass('selected');
                    $(this).siblings('.color-label').addClass('selected');
                }).first().trigger('change');
        
                $('.size-option input[type="radio"]').change(function() {
                    $('.size-label').removeClass('selected');
                    $(this).siblings('.size-label').addClass('selected');
                }).first().trigger('change');
        
                $('.add-to-cart-btn').on('click', function(e) {
					e.preventDefault();
					e.stopPropagation();

					const $button = $(this);
					const selectedColor = $('input[name="productColor"]:checked').val();
					const selectedSize = $('input[name="productSize"]:checked').val();
					const quantity = $('.quantity-input').val();

					if (!selectedColor && product.colors?.length > 0) {
						showAlert('Please select a color');
						return;
					}

					if (!selectedSize && product.sizes?.length > 0) {
						showAlert('Please select a size');
						return;
					}

					$button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');

					$.ajax({
						url: 'controller/cart_controller.php',
						type: 'POST',
						data: {
							action: 'add_to_cart',
							product_id: product.ids,
							color: selectedColor,
							size: selectedSize,
							quantity: quantity
						},
						dataType: 'json',
						success: function(response) {
							if (response.status === 'redirect') {
								window.location.href = response.redirect_url;
							} else if (response.status === 'success') {
								$('#quickViewModal').modal('hide');
								loadHeaderCounts();
								setupDropdown('dropdownContent', 'success', svgSuccess + response.message, 'click');
							} else {
								setupDropdown('dropdownContent', 'warning', svgError + response.message, 'click');
							}
						},
						error: function(xhr, status, error) {
							console.error(error);
							setupDropdown('dropdownContent', 'warning', svgError + 'An error occurred while adding the product to the cart.', 'click');
						},
						complete: function() {
							$button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add To Cart');
						}
					});
				});
        
                $('.add-to-wishlist-btn').on('click', function() {
                    const productId = product.ids;
                    const selectedColor = $('input[name="productColor"]:checked').val();
                    const selectedSize = $('input[name="productSize"]:checked').val();
                
                    // Get current language for translations
                    const lang = window.currentLanguage || 'english';
                    const dict = translations[lang] || translations.english;
                
                    $.ajax({
                        url: 'controller/wishlist_controller.php',
                        type: 'POST',
                        data: {
                            action: 'add_to_wishlist',
                            product_id: productId,
                            color: selectedColor,
                            size: selectedSize
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'redirect') {
                                window.location.href = response.redirect_url;
                            } else if (response.status === 'success') {
                                // Use translated message
                                const addedText = dict['added_to_wishlist'] || 'Added to Wishlist';
                                alert(response.message); // Keep original server message
                                $('.add-to-wishlist-btn').text(addedText).prop('disabled', true);
                            } else if (response.status === 'exists') {
                                // Use translated message
                                const addedText = dict['added_to_wishlist'] || 'Added to Wishlist';
                                alert(response.message); // Keep original server message
                                $('.add-to-wishlist-btn').text(addedText).prop('disabled', true);
                            } else {
                                alert(response.message);
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Use translated error message
                            const errorText = dict['error_adding_wishlist'] || 'An error occurred while adding to the wishlist.';
                            alert(errorText);
                        }
                    });
                });
            }, 100);
        
            $('#quickViewModal').modal('show');
        }

		function checkQuickViewWishlistStatus(productId) {
			if (!$('#quickViewModal').is(':visible')) return;

			$.ajax({
				url: 'controller/wishlist_controller.php',
				type: 'POST',
				data: {
					action: 'check_wishlist_status',
					product_id: productId
				},
				dataType: 'json',
				success: function(response) {
					if (response.status === 'exists') {
                        $('#quickViewModal .add-to-wishlist-btn')
                            .attr('data-i18n', 'in_wishlist')  // Change the translation key
                            .prop('disabled', true)
                            .removeClass('btn-outline-secondary')
                            .addClass('btn-success');
                    } else {
                        $('#quickViewModal .add-to-wishlist-btn')
                            .attr('data-i18n', 'add_to_wishlist')  // Change the translation key
                            .prop('disabled', false)
                            .removeClass('btn-success')
                            .addClass('btn-outline-secondary');
                    }
				},
				error: function(xhr, status, error) {
					console.error('Error checking wishlist status:', error);
				}
			});
		}

		const productModalCSS = `
			<style>
				.color-option {
					margin-right: 8px !important;
				}
				.color-selection {
					margin-bottom: 0.5rem !important;
				}
				.size-selection {
					margin-top: 0.25rem !important;
					margin-bottom: 1rem !important;
				}
				.color-label {
					display: inline-block;
					width: 30px;
					height: 30px;
					border-radius: 50%;
					cursor: pointer;
					border: 2px solid transparent;
					transition: all 0.3s ease;
				}
				.color-label.selected {
					border-color: #000;
					transform: scale(1.1);
				}
				.color-label:hover {
					transform: scale(1.1);
				}
				.size-option {
					margin-right: 8px !important;
				}
				.size-label {
					display: inline-block;
					padding: 5px 10px;
					border: 1px solid #ddd;
					border-radius: 4px;
					cursor: pointer;
					transition: all 0.3s ease;
				}
				.size-label.selected {
					background-color: #000;
					color: #fff;
					border-color: #000;
				}
				.size-label:hover {
					background-color: #f5f5f5;
				}
				.swiper-container-wrapper {
					display: flex;
					flex-direction: row;
					align-items: flex-start;
					gap: 15px;
					max-height: 500px;
					overflow: hidden;
				}
				.main-image-swiper {
					margin-bottom: 0px;
				}
				.main-image-swiper .swiper-slide {
					justify-content: center;
					align-items: center;
					background: #f8f9fa;
					padding-top:30px;
				}
				.main-image-swiper img {
					max-height: 400px;
					object-fit: contain;
				}
				.thumbnail-swiper {
					padding: 5px 0;
				}
				.thumbnail-swiper .swiper-slide {
					opacity: 0.6;
					cursor: pointer;
					justify-content: center;
					align-items: center;
					transition: opacity 0.3s ease;
				}
				.thumbnail-swiper .swiper-slide-thumb-active {
					opacity: 1;
				}
				.thumbnail-img {
					width: 100%;
					height: 80px;
					justify-content: center;
					align-items: center;
					object-fit: cover;
					border: 1px solid #eee;
				}
				.swiper-button-next, .swiper-button-prev {
					color: #000;
					background: rgba(255,255,255,0.7);
					width: 40px;
					height: 40px;
					border-radius: 50%;
					display: flex;
					align-items: center;
					justify-content: center;
				}
				.swiper-button-next:after, .swiper-button-prev:after {
					font-size: 20px;
					font-weight: bold;
				}
				.quantity-input {
					width: 80px;
					text-align: center;
				}
				.thumbnail-swiper-vertical {
					width: 80px;
					height: 400px;
					overflow-y: auto;
					flex-shrink: 0;
				}
				.thumbnail-swiper-vertical .swiper-wrapper {
					display: flex;
					flex-direction: column;
				}
				.thumbnail-swiper-vertical .swiper-slide {
					height: 90px !important;
					width: 100%;
					opacity: 0.6;
					cursor: pointer;
					display: flex;
					justify-content: center;
					align-items: center;
				}
				.thumbnail-swiper-vertical .swiper-slide-thumb-active {
					opacity: 1;
				}
			</style>
		`;

		$('head').append(productModalCSS);
		
		function loadCurrentLanguage() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_language' },
                success: function(response) {
                    window.currentLanguage = response.language || 'english';
                    console.log('Current language set to:', window.currentLanguage);
        
                    // Update UI buttons
                    if (window.currentLanguage === 'arabic') {
                        $('#currentLanguage').text('AR');
                        $('#targetLanguage').text('EN');
                    } else {
                        $('#currentLanguage').text('EN');
                        $('#targetLanguage').text('AR');
                    }
        
                    // Update page translations immediately
                    updatePageTranslations();
                    
                    // Re-render products with correct names
                    if (typeof renderTopSellingProducts === 'function') {
                        renderTopSellingProducts();
                    }
                },
                error: function() {
                    window.currentLanguage = 'english';
                    updatePageTranslations();
                }
            });
        }
        
        function changeLanguage() {
            console.log('Changing language...');
            
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'change_language' },
                success: function(response) {
                    console.log('Language change response:', response);
                    if (response.status === 'success') {
                        // Update button text
                        if (response.new_language === 'arabic') {
                            $('#currentLanguage').text('AR');
                            $('#targetLanguage').text('EN');
                        } else {
                            $('#currentLanguage').text('EN');
                            $('#targetLanguage').text('AR');
                        }
                        
                        // Reload menu with new language
                        menu_display_view_category();
                        
                        // Show success message
                        showNotification('Language changed to ' + response.new_language, 'success');
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error changing language:", error);
                    showNotification('Error changing language', 'error');
                }
            });
        }
        function getTranslation(key, replacements = {}) {
            const lang = window.currentLanguage || 'english';
            const dict = translations[lang] || translations.english;
            let text = dict[key] || key;
            
            // Replace placeholders like {percent}
            Object.keys(replacements).forEach(key => {
                text = text.replace(`{${key}}`, replacements[key]);
            });
            
            return text;
        }
        function loadCurrencies() {
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_currencies' },
                success: function(response) {
                    if (response.status === 'success') {
                        populateCurrencyDropdown(response.data);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading currencies:", error);
                }
            });
        }
        
        function getCurrentCurrency() {
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_currency' },
                success: function(response) {
                    if (response.status === 'success') {
                        currentCurrency = response.data;
                        updateCurrencyUI(response.data);
                        updateAllPricesOnPage(); // Add this line
                    }
                }
            });
        }
        
        function setCurrency(countryCode) {
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { 
                    action: 'set_currency',
                    country_code: countryCode 
                },
                success: function(response) {
                    if (response.status === 'success') {
                        currentCurrency = response.data;
                        console.log(JSON.stringify(response.data, null, 2));
                        console.log(response.data.flag_emoji);
                        updateCurrencyUI(response.data);
                        showNotification('Currency changed to ' + response.data.country_name, 'success');
                        
                        // Instead of reloading page, update prices dynamically
                        updateAllPricesOnPage();
                        
                        // Close dropdown
                        $('#currencyDropdown').hide();
                    } else {
                        showNotification(response.message, 'error');
                    }
                }
            });
        }
        
        function populateCurrencyDropdown(currencies) {
            const $currencyList = $('#currencyList');
            $currencyList.empty();
            
            currencies.forEach(currency => {
                const isActive = currency.country_code === '<?php echo isset($_SESSION["currency"]["country_code"]) ? $_SESSION["currency"]["country_code"] : "BH"; ?>';
                const currencyItem = `
                    <div class="currency-item ${isActive ? 'active' : ''}" 
                         data-country="${currency.country_code}"
                         style="display: flex; align-items: center; padding: 10px 15px; cursor: pointer; border-bottom: 1px solid #f5f5f5; transition: background 0.2s;"
                         onmouseover="this.style.background='#f8f9fa'" 
                         onmouseout="this.style.background='${isActive ? '#e8f4ff' : 'white'}'">
                        <div class="flag" style="font-size: 20px; margin-right: 10px; width: 30px; text-align: center;">
                            ${currency.flag_emoji}
                        </div>
                        <div class="currency-info" style="flex: 1;">
                            <div class="country-name" style="font-size: 14px; color: #333;">
                                ${currency.country_name}
                            </div>
                            <div class="currency-code" style="font-size: 12px; color: #666;">
                                ${currency.currency_code} (${currency.currency_symbol})
                            </div>
                        </div>
                        <div class="exchange-rate" style="font-size: 12px; color: #28a745; font-weight: bold;">
                            1 BHD = ${currency.exchange_rate}
                        </div>
                    </div>
                `;
                $currencyList.append(currencyItem);
            });
        }
        
        function updateCurrencyUI(currencyData) {
            //$('#currentCurrencyFlag').text(currencyData.flag_emoji);
            $('#dropDownFlagIcon').html(currencyData.flag_emoji);
            $('#currentCurrencyCode').text(currencyData.currency_code);
        }
        function updateAllPricesOnPage() {
            // This function should update all prices on the page based on current currency
            console.log('Updating all prices with currency:', currentCurrency);
            
            // Update featured products
            if ($('#featured-masonry').length) {
                loadFeaturedProducts();
            }
            
            // Update popular selling products
            if ($('#masonry').length) {
                loadPopularSellingProduct();
            }
            
            // Update most viewed products
            if ($('#most-viewed-wrapper').length) {
                loadMostViewedProduct();
            }
            
            // Update main slider prices
            if ($('.slider-main').length) {
                loadMainSlider();
            }
            
            // Update cart prices if cart is open
            loadHeaderCounts();
        }
	});
	</script>
</body>
</html>