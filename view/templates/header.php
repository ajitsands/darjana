<?php 
session_start(); 
require_once 'config.php';

// Define constants for Bahrain Dinar
define('STORE_CURRENCY_TYPE', 'BD');           // Country code
define('STORE_CURRENCY_CODE', 'BHD');          // Currency code
define('STORE_CURRENCY_SYMBOL', 'BHD');        // Changed to "BD" prefix
define('STORE_CURRENCY_NAME', 'Bahraini Dinar');
define('STORE_COUNTRY', 'Bahrain');

// Determine current language
$lang = isset($_SESSION['language']) && $_SESSION['language'] === 'arabic' ? 'arabic' : 'english';

// All translatable texts
$txt = [
    'home'                  => $lang === 'arabic' ? 'الرئيسية' : 'Home',
    'shop'                  => $lang === 'arabic' ? 'المتجر' : 'Shop',
    'cart'                  => $lang === 'arabic' ? 'سلة التسوق' : 'Cart',
    'my_account'            => $lang === 'arabic' ? 'حسابي' : 'My Account',
    'login'                 => $lang === 'arabic' ? 'تسجيل الدخول' : 'Login',
    'logout'                => $lang === 'arabic' ? 'تسجيل الخروج' : 'Logout',
    'wishlist'              => $lang === 'arabic' ? 'قائمة الرغبات' : 'Wishlist',
    'select_currency'       => $lang === 'arabic' ? 'اختر العملة' : 'Select Currency',
    'shopping_cart'         => $lang === 'arabic' ? 'سلة التسوق' : 'Shopping Cart',
    'subtotal'              => $lang === 'arabic' ? 'الإجمالي الفرعي:' : 'Subtotal:',
    'checkout'              => $lang === 'arabic' ? 'الدفع' : 'Checkout',
    'view_cart'             => $lang === 'arabic' ? 'عرض السلة' : 'View Cart',
    'check_favourite'       => $lang === 'arabic' ? 'تحقق من المفضلة' : 'Check Your Favourite',
    'search_product'        => $lang === 'arabic' ? 'ابحث عن منتج' : 'Search Product',
    'all_categories'        => $lang === 'arabic' ? 'جميع الفئات' : 'All Categories',
    'quick_search'          => $lang === 'arabic' ? 'بحث سريع :' : 'Quick Search :',
    'you_may_also_like'     => $lang === 'arabic' ? 'قد يعجبك أيضاً' : 'You May Also Like',
    'free_shipping_msg'     => $lang === 'arabic' ? 'تهانينا، لقد حصلت على شحن مجاني!' : 'Congratulations, you\'ve got free shipping!',
    'confirm_logout_title'  => $lang === 'arabic' ? 'تأكيد تسجيل الخروج' : 'Confirm Logout',
    'confirm_logout_body'   => $lang === 'arabic' ? 'هل أنت متأكد من أنك تريد تسجيل الخروج؟' : 'Are you sure you want to log out?',
    'cancel'                => $lang === 'arabic' ? 'إلغاء' : 'Cancel',
    'price'                 => $lang === 'arabic' ? 'السعر' : 'Price',
    'color'                 => $lang === 'arabic' ? 'اللون' : 'Color',
    'size'                  => $lang === 'arabic' ? 'المقاس' : 'Size',
    'category'              => $lang === 'arabic' ? 'الفئة' : 'Category',
    'tags'                  => $lang === 'arabic' ? 'الوسوم' : 'Tags',
    'reset'                 => $lang === 'arabic' ? 'إعادة تعيين' : 'RESET',
    'abayas'                 => $lang === 'arabic' ? 'عباية' : 'Abhayas',
    'view_orders'                 => $lang === 'arabic' ? 'عرض الطلبات' : 'View Orders',
    'logout'                 => $lang === 'arabic' ? 'تسجيل الخروج' : 'Logout',
    'login_register'                 => $lang === 'arabic' ? 'تسجيل الدخول / إنشاء حساب' : 'Login / Register',
];
?>

<!-- RTL Support for Arabic -->
<?php if ($lang === 'arabic'): ?>
<style>
    html, body {
        direction: rtl !important;
        text-align: right !important;
        font-family: 'Cairo', 'Tajawal', 'Segoe UI', sans-serif !important;
    }
    .navbar-nav {
        flex-direction: row-reverse !important;
    }
    .header-right {
        flex-direction: row-reverse !important;
    }
    .extra-nav {
        justify-content: flex-start !important;
    }
    .logo-header {
        margin-right: 0 !important;
        margin-left: auto !important;
    }
    .offcanvas-end {
        right: auto !important;
        left: 0 !important;
    }
    .btn-close {
        margin-left: auto !important;
        margin-right: 0 !important;
    }
    .input-group {
        flex-direction: row-reverse;
    }
    .form-control {
        text-align: right;
    }
    .navbar-toggler {
        margin-left: 0 !important;
        margin-right: auto !important;
    }
    .sticky-header .main-bar-wraper {
        direction: rtl;
    }
    
    
</style>
<?php endif; ?>

<style>
/* Desktop/Laptop - Reduce header size through spacing */
    @media only screen and (min-width: 992px) {

        .sticky-header.main-bar-wraper {
            /*padding-top: 8px !important;*/
            padding-bottom: 8px !important;
        }

        .logo-header img {
            width: 150px !important;
            height: auto !important;
        }

        .navbar-nav > li > a {
            padding: 8px 12px !important;
            font-size: 14px !important;
            font-family: "Montserrat", sans-serif !important;
        }

        .header-right {
            gap: 8px !important;
        }

        /* ✅ Desktop menu color white */
        .header-nav.w3menu .nav > li > a {
            font-family: "Instrument Sans", sans-serif !important;
            letter-spacing: 0.18em !important;
            text-transform: uppercase !important;
            color: #ffffff !important;
            font-size: 12px !important;
        }

        .nav-link {
            padding: 4px 8px !important;
            font-size: 13px !important;
        }

    }

    /* Force the profile menu to be visible */
    .profile-menu-item {
        display: block !important;
        visibility: visible !important;
        opacity: 1 !important;
    }
    .navbar-nav > li {
        display: inline-block !important;
        margin: 0 5px;
    }
    /* Fix for mobile menu categories visibility */
    @media (max-width: 991px) {
        /* Fix for menu wrapping */
        .navbar-nav {
            flex-wrap: wrap !important;
            white-space: normal !important;
        }

    }

    /* Force Arabic RTL for entire menu when language is Arabic */
    body.rtl-mode .navbar-nav {
        direction: rtl !important;
        text-align: right !important;
    }

    /* Make sure the placeholder is properly positioned */
    #div_menu_list_category {
        display: contents !important; /* This makes it invisible but keeps position */
    }

    @media (max-width: 991px) {
        .main-bar .container-fluid {
            padding-right: 0 !important;
            padding-left: 0 !important;
        }

        .extra-nav {
            padding-right: 0 !important;
            margin-right: 0 !important;
        }

        .extra-cell {
            padding-right: 0 !important;
            margin-right: 0 !important;
        }

        .header-right {
            padding-right: 0 !important;
            margin-right: 0 !important;
            /* Optional: make sure items hug the right edge */
            justify-content: flex-end !important;
        }
    }
    /* ──────────────────────────────────────────────
    Currency dropdown – mobile centered popup style
    ──────────────────────────────────────────────── */

    @media only screen and (max-width: 991px) {

        .currency-dropdown-menu {
            position: fixed !important;
            top: 50% !important;
            left: 50% !important;
            transform: translate(-50%, -50%) !important;
            margin: 0 !important;
            right: auto !important;
            bottom: auto !important;
            width: 86vw !important;
            max-width: 340px !important;
            max-height: 78vh !important;
            border-radius: 12px !important;
            box-shadow: 0 10px 40px rgba(0,0,0,0.25) !important;
            border: 1px solid #ccc !important;
            background: white !important;
        }

        /* Make sure it's above other offcanvas / modals */
        .currency-dropdown-menu {
            z-index: 1060 !important;
        }

        /* Optional: slight animation */
        .currency-dropdown-menu.show {
            animation: dropdownFadeIn 0.2s ease-out;
        }

        @keyframes dropdownFadeIn {
            from { opacity: 0; transform: translate(-50%, -50%) scale(0.92); }
            to   { opacity: 1; transform: translate(-50%, -50%) scale(1); }
        }
    }

    /* Desktop – normal dropdown behavior */
    @media only screen and (min-width: 992px) {
        .currency-dropdown-menu {
            position: absolute !important;
            top: 100% !important;
            right: 0 !important;
            left: auto !important;
            transform: none !important;
            width: auto !important;
            min-width: 240px !important;
            max-width: 280px !important;
            margin-top: 6px !important;
        }
    }
    /* Mobile-only extra icons row */
    .mobile-extra-icons {
        display: flex !important;
        flex-wrap: nowrap;
        justify-content: center;
        gap: 4px;
        padding: 12px 0;
        background: #111;
        border-radius: 8px;
        margin: 0 auto;
        width: fit-content;
        max-width: 100%;
    }

    .mobile-extra-icons .nav-link {
        padding: 8px 12px !important;
        color: #ddd !important;
        transition: all 0.2s;
    }

    .mobile-extra-icons .nav-link:hover,
    .mobile-extra-icons .nav-link:focus {
        color: #D4AF37 !important;
        transform: scale(1.08);
    }

    .mobile-extra-icons .badge {
        font-size: 0.65rem;
        padding: 2px 5px;
    }

    /* Hide mobile version on desktop */
    @media (min-width: 992px) {
        .mobile-extra-icons {
            display: none !important;
        }
    }

    /* Optional: make top bar icons a bit smaller on very small screens */
    @media (max-width: 360px) {
        .header-right .nav-link {
            padding: 4px 6px !important;
            font-size: 0.9rem;
        }
    }
    /* Mobile extra icons - single clean row like social icons */
    @media (max-width: 991.98px) {
    .mobile-extra-icons {
        display: flex !important;
        flex-direction: row;
        flex-wrap: nowrap;
        justify-content: center;
        align-items: center;
        gap: 8px;
        padding: 12px 16px;
        margin: 16px auto 8px auto;
        width: fit-content;
        max-width: 100%;
        /*background: rgba(30, 30, 30, 0.6);*/
        /*border-radius: 12px;*/
        /*border: 1px solid rgba(212, 175, 55, 0.15);*/
    }

    .mobile-extra-icons .nav-item {
        margin: 0;
        padding: 0;
    }

    .mobile-extra-icons .nav-link,
    .mobile-extra-icons button.nav-link {
        display: flex;
        align-items: center;
        justify-content: center;
        padding: 10px 12px !important;
        min-width: 44px;
        height: 44px;
        font-size: 1.4rem;
        color: #e0e0e0;
        background: transparent;
        border: none;
        border-radius: 8px;
        transition: all 0.18s ease;
    }

    .mobile-extra-icons .nav-link:hover,
    .mobile-extra-icons .nav-link:focus,
    .mobile-extra-icons button.nav-link:hover,
    .mobile-extra-icons button.nav-link:focus {
        color: #D4AF37;
        background: rgba(212, 175, 55, 0.08);
        transform: scale(1.08);
    }

    /* Currency display - make it look like an icon too */
    .mobile-extra-icons .nav-link span#mobileFlagIcon + small {
        font-size: 0.75rem;
        font-weight: 600;
        color: #aaa;
        margin-left: 6px;
    }

    /* Badges */
    .mobile-extra-icons .badge-circle {
        font-size: 0.65rem;
        min-width: 18px;
        height: 18px;
        line-height: 18px;
        padding: 0;
        top: 6px;
        right: 6px;
    }

    /* ────────────── Only change: smaller text for EN/AR ────────────── */
    #mobileLanguageSwitcher {
        font-size: 0.60rem !important;     /* ← smaller text (was 1rem) */
        padding: 10px 14px !important;
        font-weight: 700;
        letter-spacing: 0.5px;
        min-width: 52px;                    /* slightly wider to prevent crowding */
        height: 44px;
        line-height: 1;
    }
    }

    /* Hide on desktop */
    @media (min-width: 992px) {
    .mobile-extra-icons {
        display: none !important;
    }
    }
    /* Desktop – Logo on LEFT */
    @media (min-width: 992px) {
        .main-logo {
            position: relative !important;
            left: 0 !important;
            transform: none !important;
            text-align: left !important;
            margin-left: 0 !important;
        }
    }

    /* Mobile – Logo CENTER */
    @media (max-width: 991.98px) {
        .main-logo {
            position: absolute !important;
            left: 50% !important;
            transform: translateX(-50%) !important;
            text-align: center !important;
            z-index: 10;
        }
    }
    @media (min-width: 992px) {

        .extra-nav .nav-link,
        .extra-nav .nav-link i,
        .extra-nav button,
        .extra-nav button span,
        .extra-nav .has-mega-menu a {
            color: #ffffff !important;
        }

        .extra-nav button {
            border: 1px solid #ffffff !important;
        }

        .extra-nav .badge {
            color: #ffffff !important;
        }

    }
    .header-right .login-link .nav-link {
        border-bottom: none !important;
    }

    .has-mega-menu {
        position: relative;
    }

    .has-mega-menu .sub-menu {
        position: absolute;
        left: 0;
        top: 100%;
        display: none;
        background: #fff;
        list-style: none;
    }

    .has-mega-menu:hover .sub-menu {
        display: block;
    }

    .title, .product-name, .btn, .price, .navbar-nav, .badge, .size-label, .color-label, .form-select, .spec-list, .spec-heading, .spec-content {
        font-family: "Instrument Sans", sans-serif !important;
        text-transform: uppercase !important;
    }
    h1, .h1, h2, .h2, h3, .h3, h4, .h4, h5, .h5, h6, .h6, .h1, .h2, .h3, .h4, .h5, .h6 {
                    color: #3a3a3a;
                    font-weight: 400;
            }
            p {
                color: #6b6b6b;
            }
            .form-label {
                color: #595959;
            }
            .breadcrumb-row ul {
    
                padding-top: 10px;
            }
            .input-group {
                column-gap: .0rem; 
            }
            
            
        .sub-menu-down > a {
        display: flex;
        align-items: center;
    }

    .sub-menu-down > a i {
        display: inline-block !important;
        margin-left: 6px;
        font-size: 16px;
    }
    
    
</style>

<header class="site-header mo-left header style-1 header-transparent" style="background-color: #ffffff;">
    
    <!-- Main Header -->
    <div class="sticky-header main-bar-wraper navbar-expand-lg">
        <div class="main-bar clearfix" style="background-color:black;">
            <div class="container-fluid clearfix d-lg-flex d-block">

                <!-- Website Logo (Centered) -->
                <div class="logo-header logo-dark main-logo">
                    <a href="/">
                        <img src="images/logo/web_logo.png" alt="logo"
                             style="width: 180px; height: auto;">
                    </a>
                </div>


                <!-- Nav Toggle Button -->
                <button class="navbar-toggler collapsed navicon justify-content-end" type="button"
                    data-bs-toggle="collapse" data-bs-target="#navbarNavDropdown" aria-controls="navbarNavDropdown"
                    aria-expanded="false" aria-label="Toggle navigation">
                    <span style="background-color:#D4AF37"></span>
                    <span style="background-color:#D4AF37"></span>
                    <span style="background-color:#D4AF37"></span>
                </button>
                <div id="dropdownContent" style="text-align:center;"></div>

                <!-- Main Nav -->
                <div class="header-nav w3menu navbar-collapse collapse justify-content-start" id="navbarNavDropdown">
                    <div class="logo-header logo-dark me-md-5"
                         style="background-color:black; margin: 0 auto; text-align:center;">
                        <a href="/" style="display:inline-block;">
                            <img src="images/logo/web_logo.png" alt="logo"
                                 style="width: 180px; height: auto;">
                        </a>
                    </div>

                    <ul class="nav navbar-nav">
                        <li class="has-mega-menu sub-menu-down auto-width menu-left">
                            <a href="/"><?= $txt['home'] ?></a>
                        </li>
                        <li class="has-mega-menu sub-menu-down">
                            <a href="Shop"><?= $txt['shop'] ?></a>
                        </li>
                        
                        <li class="has-mega-menu sub-menu-down auto-width">
                            <a href="Cart"><?= $txt['cart'] ?></a>
                        </li>
                        <!-- Dynamic categories will be inserted here -->
                        <!--<span id="div_menu_list_category"></span>-->
                        <li class="sub-menu-down">
                            <a href="#">
                                <span><?= $txt['abayas'] ?></span>
                                <i class="ri-arrow-down-s-line"></i>
                            </a>
                        
                            <ul class="sub-menu" id="div_menu_list_category_data">
                                <!-- Dynamic categories will come here -->
                            </ul>
                        
                        </li>
                        
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="has-mega-menu sub-menu-down">
                                <a href="Orders" >
                                   <?= $txt['view_orders'] ?>
                                </a>
                        </li>
                    </ul>
                    <ul class="nav navbar-nav">
                        <li class="has-mega-menu sub-menu-down auto-width">
                            <?php if (isset($_SESSION['ids']) && $_SESSION['ids'] > 0): ?>
                            <a class="nav-link logout-btn" href="javascript:void(0);"
                                style="text-decoration: none;">
                                <?= $txt['logout'] ?>
                            </a>
                            <?php else: ?>
                            <a class="nav-link"
                                href="Login?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>">
                                <?= $txt['login_register'] ?>
                            </a>
                            <?php endif; ?>
                        </li>
                    </ul>
                    <ul class="nav mobile-extra-icons d-lg-none mt-1 pt-1 pb-1 border-top">
                        <li class="nav-item position-relative">
                            <button id="mobileCurrencySwitcher" class="nav-link px-3" 
                                    style="font-size:1.1rem; display:flex; align-items:center; gap:6px; position:relative;">
                                <span id="mobileFlagIcon">
                                    <?= isset($_SESSION['currency']['flag_emoji']) ? $_SESSION['currency']['flag_emoji'] : '<span class="fi fi-bh"></span>' ?>
                                </span>
                                <small id="mobileCurrencyCode" style="font-size:0.85rem; font-weight:600;">
                                    <?= isset($_SESSION['currency']['currency_code']) ? $_SESSION['currency']['currency_code'] : 'BHD' ?>
                                </small>
                                <i class="fas fa-chevron-down" style="font-size:0.8rem; opacity:0.7;"></i>
                            </button>
                        
                            <!-- ── MOBILE-ONLY dropdown ── different IDs! ── -->
                            <div id="mobileCurrencyDropdown" class="currency-dropdown-menu" 
                                 style="display:none; background:white; border:1px solid #ddd; border-radius:12px; box-shadow:0 10px 40px rgba(0,0,0,0.25); z-index:1060;">
                                <div class="currency-dropdown-header" style="padding:12px 16px; border-bottom:1px solid #eee; font-weight:600; background:#f8f9fa; font-size:14px; text-align:center;">
                                    <?= $txt['select_currency'] ?>
                                </div>
                                <div id="mobileCurrencyList" class="currency-list" style="max-height:320px; overflow-y:auto; padding:6px 0;">
                                    <!-- Filled by JS -->
                                </div>
                            </div>
                        </li>
                
                        <!-- Login / Logout -->
                        <!--Wishlist -->
                        <li class="nav-item position-relative">
                            <a class="nav-link px-3" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                                <i class="iconly-Light-Heart2" style="font-size:1.3rem;"></i>
                                <span class="badge badge-circle bg-danger" id="mobile-wishlist-badge-count" style="font-size:9px; min-width:16px; height:16px; line-height:16px; position:absolute; top:4px; right:8px; display:none;">0</span>
                            </a>
                        </li>
                
                        <!-- Cart -->
                        <li class="nav-item position-relative">
                            <a class="nav-link px-3 cart-btn" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight">
                                <i class="iconly-Broken-Buy" style="font-size:1.3rem;"></i>
                                <span class="badge badge-circle bg-danger" id="mobile-cart-badge-count" style="font-size:9px; min-width:16px; height:16px; line-height:16px; position:absolute; top:4px; right:8px; display:none;">0</span>
                            </a>
                        </li>
                
                        <!-- Language -->
                        <li class="nav-item">
                            <button id="mobileLanguageSwitcher" class="nav-link px-3" style="font-size:1.1rem; font-weight:bold;white-space:nowrap;">
                                <?= $lang === 'arabic' ? 'AR / EN' : 'EN / AR' ?>
                            </button>
                        </li>
                
                        <!-- Profile (only if logged in) -->
                        <?php if (isset($_SESSION['ids']) && $_SESSION['ids'] > 0): ?>
                        <li class="nav-item">
                            <a class="nav-link px-3" href="Profile" style="font-size:1.3rem;">
                                <i class="fas fa-user"></i>
                            </a>
                        </li>
                        <?php endif; ?>
                    </ul>
                    
                    <div class="dz-social-icon">
                        <ul>
                            <li><a class="fab fa-facebook-f" target="_blank" href="https://www.facebook.com/dexignzone"></a></li>
                            <li><a class="fab fa-twitter" target="_blank" href="https://twitter.com/dexignzones"></a></li>
                            <li><a class="fab fa-linkedin-in" target="_blank" href="https://www.linkedin.com/showcase/3686700/admin/"></a></li>
                            <li><a class="fab fa-instagram" target="_blank" href="https://www.instagram.com/dexignzone/"></a></li>
                            
                            
                         
                        </ul>
                    </div>
                </div>

                <!-- EXTRA NAV -->
                <div class="extra-nav">
                    <div class="extra-cell" style="display: flex; justify-content: flex-end; flex-wrap: wrap;">
                       <ul class="header" style="display:flex;align-items: center;gap:15px;margin:0;padding:0;list-style:none;align-content: flex-end;justify-content: space-around;flex-wrap: nowrap;flex-direction: row;">
                            <!-- Replace the existing <li class="nav-item currency-dropdown"> ... </li> gap: 10px; block with this -->

                            <li class="nav-item currency-dropdown" style="flex: 0 0 auto; position: relative;padding-left:20px;">
                                <button id="currencySwitcher" class="nav-link" style="background: none; border: 1px solid #ddd; border-radius: 4px; padding: 6px 10px; cursor: pointer; font-weight: bold; display: flex; align-items: center; gap: 6px;">
                                    <span id="dropDownFlagIcon"><span class="fi fi-bh"></span></span>
                                    <span id="currentCurrencyCode">BHD</span>
                                    <i class="fas fa-chevron-down" style="font-size: 11px;"></i>
                                </button>
                                
                                <!-- Currency Dropdown – will be centered on mobile -->
                                <div id="currencyDropdown" class="currency-dropdown-menu" style="display: none; background: white; border: 1px solid #ddd; border-radius: 8px; box-shadow: 0 6px 20px rgba(0,0,0,0.18); z-index: 1050; min-width: 240px; max-width: 90vw; overflow: hidden;">
                                    
                                    <div class="currency-dropdown-header" style="padding: 12px 16px; border-bottom: 1px solid #eee; font-weight: 600; background: #f8f9fa; font-size: 14px; text-align: center;">
                                        Select Currency                                    </div>
                                    
                                    <div id="currencyList" class="currency-list" style="max-height: 320px; overflow-y: auto; padding: 6px 0;">
                                        <div class="currency-item active" data-country="BH" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-bh"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    Bahrain (BD)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="IN" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-in"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    India (₹)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="KW" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-kw"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    Kuwait (KWD)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="OM" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-om"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    Oman (OMR)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="QA" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-qa"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    Qatar (QAR)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="SA" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-sa"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    Saudi Arabia (SAR)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="AE" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-ae"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    UAE (AED)
                                                </div>
                                            </div>
                                        </div>
                                    
                                        <div class="currency-item " data-country="US" style="display:flex; align-items:center; padding:10px 15px; cursor:pointer; border-bottom:1px solid #f5f5f5;">
                                            <div class="flag" style="font-size:20px; margin-right:10px; width:30px; text-align:center;">
                                                <span class="fi fi-us"></span>
                                            </div>
                                            <div class="currency-info" style="flex:1;">
                                                <div class="country-name" style="font-size:14px; color:#333;">
                                                    United States ($)
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </li>
                          

                            <li class="nav-item wishlist-link" style="flex: 0 0 auto;">
                                <a class="nav-link" href="javascript:void(0);" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="text-decoration: none; padding: 5px 10px; position: relative;">
                                    <i class="iconly-Light-Heart2"></i>
                                    <span class="badge badge-circle" id="wishlist-badge-count" style="position: absolute; top: 0; right: 0; background: red; color: white; border-radius: 50%; font-size: 10px; padding: 2px 5px; display: none;">0</span>
                                </a>
                            </li>

                            <li class="nav-item cart-link" style="flex: 0 0 auto;">
                                <a href="javascript:void(0);" class="nav-link cart-btn" data-bs-toggle="offcanvas" data-bs-target="#offcanvasRight" aria-controls="offcanvasRight" style="text-decoration: none; padding: 5px 10px; position: relative;">
                                    <i class="iconly-Broken-Buy"></i>
                                    <span class="badge badge-circle" id="cart-badge-count" style="position: absolute; top: 0; right: 0; background: red; color: white; border-radius: 50%; font-size: 10px; padding: 2px 5px; display: none;">0</span>
                                </a>
                            </li>

                            <li class="nav-item language-link" style="flex: 0 0 auto; padding-right: 40px;" >
                                <button id="languageSwitcher" class="nav-link" style="background: none; border: 1px solid #ddd; border-radius: 4px; padding: 5px 10px; cursor: pointer; font-weight: bold;">
                                    <span id="currentLanguage">EN</span> / 
                                    <span id="targetLanguage">AR</span>
                                </button>
                            </li>
                            <!-- PROFILE / MY ACCOUNT – This will now DEFINITELY show when logged in -->
                            <?php if (isset($_SESSION['ids']) && $_SESSION['ids'] > 0): ?>
                                <li class="nav-item">
                                    <a class="nav-link px-3" href="Profile" style="font-size:1.3rem;">
                                        <i class="fas fa-user"></i>
                                    </a>
                                </li>
                            <?php endif; ?>
                            
                        </ul>
                    
                    </div>
                </div>
            </div>
        </div>
    </div>

    <div class="dz-search-area dz-offcanvas offcanvas offcanvas-top" tabindex="-1" id="offcanvasTop">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">&times;</button>
        <div class="container">
            <form class="header-item-search">
                <div class="input-group search-input">
                    <select class="default-select">
                        <option data-i18n="all_categories"><?= $txt['all_categories'] ?></option>
                        <option>Clothes</option>
                        <option>UrbanSkirt</option>
                        <option>VelvetGown</option>
                        <option>LushShorts</option>
                        <option>Vintage</option>
                        <option>Wedding</option>
                        <option>Cotton</option>
                        <option>Linen</option>
                        <option>Navy</option>
                        <option>Urban</option>
                        <option>Business Meeting</option>
                        <option>Formal</option>
                    </select>
                    <input type="search" id="dzSearch" class="form-control" 
                        placeholder="<?= $txt['search_product'] ?>" 
                        data-i18n-placeholder="search_product">
                    <button class="btn search-btn" type="button">
                        <i class="iconly-Light-Search"></i>
                    </button>
                </div>
                <ul class="recent-tag">
                    <li class="pe-0"><span data-i18n="quick_search"><?= $txt['quick_search'] ?></span></li>
                    <li><a href="#">Clothes</a></li>
                    <li><a href="#">UrbanSkirt</a></li>
                    <li><a href="#">VelvetGown</a></li>
                    <li><a href="#">LushShorts</a></li>
                </ul>
            </form>
            <div class="row">
                <div class="col-xl-12">
                    <h5 class="mb-3" data-i18n="you_may_also_like"><?= $txt['you_may_also_like'] ?></h5>
                    <div class="swiper category-swiper2">
                        <div class="swiper-wrapper">
                            <!-- Your existing swiper slides remain unchanged -->
                            <div class="swiper-slide">
                                <div class="shop-card">
                                    <div class="dz-media ">
                                        <img src="images/shop/product/1.png" alt="image">
                                    </div>
                                    <div class="dz-content">
                                        <h6 class="title"><a href="#">SilkBliss Dress</a></h6>
                                        <h6 class="price">$40.00</h6>
                                    </div>
                                </div>
                            </div>
                            <!-- ... all other slides ... -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Cart & Wishlist Offcanvas -->
    <div class="offcanvas dz-offcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasRight">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">&times;</button>
        <div class="offcanvas-body">
            <div class="product-description">
                <div class="dz-tabs">
                    <ul class="nav nav-tabs center" id="myTab" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="shopping-cart" data-bs-toggle="tab"
                                data-bs-target="#shopping-cart-pane" type="button" role="tab"
                                aria-controls="shopping-cart-pane" aria-selected="true">
                                <span data-i18n="shopping_cart"><?= $txt['shopping_cart'] ?></span>
                                <span class="badge badge-light" id="cart-count">0</span>
                            </button>
                        </li>
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="wishlist" data-bs-toggle="tab" data-bs-target="#wishlist-pane"
                                type="button" role="tab" aria-controls="wishlist-pane" aria-selected="false">
                                <span data-i18n="wishlist"><?= $txt['wishlist'] ?></span>
                                <span class="badge badge-light" id="wishlist-count">0</span>
                            </button>
                        </li>
                    </ul>
                    <div class="tab-content pt-4" id="dz-shopcart-sidebar">
                        <div class="tab-pane fade show active" id="shopping-cart-pane" role="tabpanel" aria-labelledby="shopping-cart">
                            <div class="shop-sidebar-cart">
                                <ul class="sidebar-cart-list" id="cart-items-list">
                                    <!-- Cart items populated dynamically -->
                                </ul>
                                <div class="cart-total">
                                    <h5 class="mb-0" data-i18n="subtotal"><?= $txt['subtotal'] ?></h5>
                                    <h5 class="mb-0 cart-subtotal">$0.00</h5>
                                </div>
                                <div class="mt-auto">
                                    <div class="shipping-time">
                                        <div class="dz-icon">
                                            <i class="flaticon flaticon-ship"></i>
                                        </div>
                                        <div class="shipping-content">
                                            <h6 class="title pe-4" data-i18n="free_shipping_msg"><?= $txt['free_shipping_msg'] ?></h6>
                                            <div class="progress">
                                                <div class="progress-bar progress-animated border-0" style="width: 75%;" role="progressbar">
                                                    <span class="sr-only">75% Complete</span>
                                                </div>
                                            </div>
                                        </div>
                                    </div>
                                    <a href="#" class="btn btn-gold btn-block m-b20" id="checkout-btn">
                                        <span data-i18n="checkout"><?= $txt['checkout'] ?></span>
                                    </a>
                                    <a href="Cart" class="btn btn-gold btn-block">
                                        <span data-i18n="view_cart"><?= $txt['view_cart'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                        <div class="tab-pane fade" id="wishlist-pane" role="tabpanel" aria-labelledby="wishlist">
                            <div class="shop-sidebar-cart">
                                <ul class="sidebar-cart-list" id="wishlist-items-list">
                                    <!-- Wishlist items populated dynamically -->
                                </ul>
                                <div class="mt-auto">
                                    <a href="Wishlist" class="btn btn-secondary btn-block">
                                        <span data-i18n="check_favourite"><?= $txt['check_favourite'] ?></span>
                                    </a>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    
    <!-- Filter Sidebar (offcanvasLeft) -->
    <div class="offcanvas dz-offcanvas offcanvas offcanvas-end" tabindex="-1" id="offcanvasLeft">
        <button type="button" class="btn-close" data-bs-dismiss="offcanvas" aria-label="Close">&times;</button>
        <div class="offcanvas-body">
            <div class="product-description">
                <div class="widget widget_search">
                    <div class="form-group">
                        <div class="input-group">
                            <input name="dzSearch" required="required" type="search" class="form-control"
                                placeholder="<?= $txt['search_product'] ?>"
                                data-i18n-placeholder="search_product">
                            <div class="input-group-addon">
                                <button name="submit" value="Submit" type="submit" class="btn">
                                    <i class="icon feather icon-search"></i>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="widget">
                    <h6 class="widget-title" data-i18n="price"><?= $txt['price'] ?></h6>
                    <!-- ... price slider remains the same ... -->
                </div>
                <div class="widget">
                    <h6 class="widget-title" data-i18n="color_filter"><?= $txt['color_filter'] ?></h6>
                    <!-- ... color filters remain the same ... -->
                </div>
                <div class="widget">
                    <h6 class="widget-title" data-i18n="size_filter"><?= $txt['size_filter'] ?></h6>
                    <!-- ... size buttons remain the same ... -->
                </div>
                <div class="widget widget_categories">
                    <h6 class="widget-title" data-i18n="category_filter"><?= $txt['category_filter'] ?></h6>
                    <!-- ... categories remain the same ... -->
                </div>
                <div class="widget widget_tag_cloud">
                    <h6 class="widget-title" data-i18n="tags"><?= $txt['tags'] ?></h6>
                    <!-- ... tags remain the same ... -->
                </div>
                <a href="javascript:void(0);" class="btn btn-sm font-14 btn-secondary btn-sharp">
                    <span data-i18n="reset"><?= $txt['reset'] ?></span>
                </a>
            </div>
        </div>
    </div>

    <!-- Logout Confirmation Modal -->
    <div class="modal fade" id="logoutConfirmModal" tabindex="-1" aria-labelledby="logoutConfirmModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered">
            <div class="modal-content rounded-4 shadow-sm">
                <div class="modal-header border-0">
                    <h5 class="modal-title" id="logoutConfirmModalLabel"><?= $txt['confirm_logout_title'] ?></h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <?= $txt['confirm_logout_body'] ?>
                </div>
                <div class="modal-footer border-0">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">
                        <?= $txt['cancel'] ?>
                    </button>
                    <button type="button" id="confirmLogoutBtn" class="btn btn-danger">
                        <?= $txt['logout'] ?>
                    </button>
                </div>
            </div>
        </div>
    </div>

</header>

<script>
const BASE_IMAGE_URL = '<?php echo BASE_IMAGE_URL; ?>';
const CATEGORY_IMAGE_URL = '<?php echo CATEGORY_IMAGE_URL; ?>';
const BASE_URL = '<?php echo BASE_URL; ?>';
document.getElementById('currencySwitcher').addEventListener('click', function(e) {
    e.stopPropagation();
    
    const dropdown = document.getElementById('currencyDropdown');
    
    // Toggle visibility
    if (dropdown.style.display === 'block') {
        dropdown.style.display = 'none';
        dropdown.classList.remove('show');
    } else {
        // Close other open menus if needed
        document.querySelectorAll('.currency-dropdown-menu').forEach(el => {
            el.style.display = 'none';
            el.classList.remove('show');
        });
        
        dropdown.style.display = 'block';
        dropdown.classList.add('show');
    }
});

// Close when clicking outside
document.addEventListener('click', function(e) {
    if (!document.getElementById('currencySwitcher').contains(e.target) &&
        !document.getElementById('currencyDropdown').contains(e.target)) {
        document.getElementById('currencyDropdown').style.display = 'none';
        document.getElementById('currencyDropdown').classList.remove('show');
    }
});
</script>

<!-- Header End -->