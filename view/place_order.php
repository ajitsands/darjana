

<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include("templates/head.php"); ?>
    <style>
        /* Apply Montserrat font to all text elements */
        
        
        .modal-content,
        .navbar-nav {
            font-family: "Montserrat", sans-serif !important;
            /* text-transform: uppercase !important; */
            letter-spacing: 0.5px !important;
        }
        h1, h2, h3, h4, h5, h6,body,div,
        span, p{
            font-family: "Montserrat", sans-serif !important;
            /* text-transform: uppercase !important; */
            letter-spacing: 0.5px !important;
        }
        input {
            text-transform: none;
        }
        textarea {
            text-transform: none;
        }
    
        /* Color Theme Variables */
        :root {
            --gold-primary: #D4AF37;
            --gold-dark: #B49450;
            --gold-light: #F0E68C;
            --black: #000000;
            --black-light: #222222;
            --black-lighter: #333333;
            --white: #FFFFFF;
            /* --white-off: #F5F5F5; */
            --white-dark: #E5E5E5;
            --gray-light: #CCCCCC;
            --gray: #999999;
        }

        .modal-backdrop {
    z-index: 1040 !important;
}

.select2-container {
    z-index: 99999 !important;
}

.select2-dropdown {
    z-index: 99999 !important;
}
.select2-container,
.select2-dropdown {
    pointer-events: auto !important;
}
    
        .dz-content {
            display: flex;
            flex-direction: column;
            width: 100%;
        }
    
        .product-info-row {
            display: flex;
            align-items: center;
            margin-bottom: 5px;
        }
    
        .price-row {
            display: flex;
            align-items: center;
        }
    
        .original-price {
            text-decoration: line-through;
            color: var(--gray) !important;
            margin-right: 10px;
        }
    
        .savings {
            color: var(--gold-primary) !important;
            font-weight: 500;
        }
    
        .savings-row {
            background-color: var(--black-light) !important;
            color: var(--white) !important;
            border-left: 4px solid var(--gold-primary);
        }
    
        .savings-row .savings {
            color: var(--gold-primary) !important;
        }
    
        .new-address-form-card .form-control,
        .new-address-form-card .form-select {
            padding-top: 4px;
            padding-bottom: 4px;
            height: 35px;
            font-size: 14px;
            border: 1px solid var(--black-light) !important;
            border-radius: 4px !important;
            transition: all 0.3s ease;
        }
    
        .new-address-form-card .form-control:focus,
        .new-address-form-card .form-select:focus {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25) !important;
            outline: none;
        }
    
        .new-address-form-card textarea.form-control {
            height: 50px;
            min-height: 30px;
        }
    
        .close {
            background: none !important;
            border: none !important;
            box-shadow: none !important;
            padding: 0 !important;
            font-size: 1.5rem;
            opacity: 1;
        }
    
        .close span {
            color: var(--white) !important;
        }
    
        #changeAddressModal .modal-header {
            background-color: var(--black) !important;
            border-bottom: 2px solid var(--gold-primary) !important;
        }
    
        #changeAddressModal .modal-title {
            color: var(--white) !important;
            font-weight: 600;
        }
    
        #changeAddressModal .close span {
            color: var(--white) !important;
        }
    
        .modal-content {
            border: 1px solid var(--gold-primary) !important;
            border-radius: 8px !important;
        }
    
        .modal-footer {
            border-top: 1px solid var(--gold-primary) !important;
        }
    
        .new-address-form-card .card-body {
            padding-top: 12px !important;
        }
    
        .new-address-form-card .card-title {
            margin-top: 0 !important;
            margin-bottom: 16px !important;
            color: var(--gold-primary) !important;
            font-weight: 600;
        }
    
        .select2-dropdown {
            z-index: 9999 !important;
            border: 1px solid var(--black-light) !important;
        }
    
        .select2-container--default .select2-selection--single {
            border: 1px solid var(--black-light) !important;
            height: 35px !important;
            padding: 4px 12px !important;
            font-size: 14px !important;
            border-radius: 4px !important;
            background-color: var(--white) !important;
            display: flex !important;
            align-items: center !important;
            transition: all 0.3s ease;
        }
    
        .select2-container--default .select2-selection--single:hover {
            border-color: var(--gold-primary) !important;
        }
    
        .select2-container--default .select2-selection--single:focus {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25);
        }
    
        .select2-container--default .select2-selection--single .select2-selection__rendered {
            text-transform: none;
            line-height: 26px !important;
            padding-left: 0 !important;
            color: var(--black) !important;
        }
    
        .select2-container--default .select2-selection--single .select2-selection__arrow {
            height: 35px !important;
            right: 6px !important;
            width: 30px;
        }
    
        .select2-container--default .select2-results__option--highlighted.select2-results__option--selectable {
            background-color: var(--gold-primary) !important;
            color: var(--black) !important;
        }
    
        .order-spinner-overlay {
            position: fixed;
            top: 0;
            left: 0;
            width: 100%;
            height: 100%;
            background: rgba(0, 0, 0, 0.9) !important;
            display: none;
            justify-content: center;
            align-items: center;
            z-index: 9999;
            backdrop-filter: blur(3px);
        }
    
        .order-spinner-content {
            text-align: center;
            background: var(--white) !important;
            padding: 30px 40px;
            border-radius: 15px;
            box-shadow: 0 10px 30px rgba(212, 175, 55, 0.2) !important;
            border: 2px solid var(--gold-primary) !important;
        }
    
        .order-spinner {
            width: 60px;
            height: 60px;
            margin: 0 auto 20px;
            border: 5px solid var(--white-dark) !important;
            border-top: 5px solid var(--gold-primary) !important;
            border-radius: 50%;
            animation: spin 1s linear infinite;
        }
    
        @keyframes spin {
            0% { transform: rotate(0deg); }
            100% { transform: rotate(360deg); }
        }
    
        .order-spinner-text {
            color: var(--black) !important;
            font-size: 16px;
            font-weight: 600;
            margin: 0;
        }
    
        .order-spinner-subtext {
            color: var(--gray) !important;
            font-size: 14px;
            margin-top: 10px;
        }
    
        /* Hide the close button in WhatsApp modal */
        #whatsappConfirmModal .btn-close {
            display: none !important;
        }
    
        /* Hide the "No thanks" button */
        #whatsappConfirmModal .btn-outline-secondary {
            display: none !important;
        }
    
        /* Make the send button full width and more prominent */
        #whatsappConfirmModal .btn-success {
            width: 100%;
            padding: 12px !important;
            font-size: 16px !important;
            background-color: var(--gold-primary) !important;
            border-color: var(--gold-primary) !important;
            color: var(--black) !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }
    
        #whatsappConfirmModal .btn-success:hover {
            background-color: var(--gold-dark) !important;
            border-color: var(--gold-dark) !important;
            color: var(--black) !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
    
        /* Ensure modal cannot be closed by clicking outside */
        .modal.show {
            pointer-events: none;
        }
    
        .modal.show .modal-content {
            pointer-events: auto;
        }
    
        /* Cart Items Styling */
        .cart-item.style-1 {
            border: 1px solid var(--black-light) !important;
            border-radius: 8px !important;
            padding: 15px !important;
            background-color: var(--white) !important;
            transition: all 0.3s ease;
        }
    
        .cart-item.style-1:hover {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.1);
        }
    
        .cart-item .title {
            /* color: var(--black) !important; */
            color: #6b6b6b;
            font-weight: 600 !important;
        }
    
        .cart-item .price {
            color: var(--gold-primary) !important;
            font-weight: 600 !important;
            font-size: 1.1rem;
        }
    
        /* Button Styling */
        .btn-primary {
            background-color: var(--gold-primary) !important;
            border-color: var(--gold-primary) !important;
            color: var(--black) !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }
    
        .btn-primary:hover {
            background-color: var(--gold-dark) !important;
            border-color: var(--gold-dark) !important;
            color: var(--black) !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.3);
        }
    
        .btn-outline-primary {
            border-color: var(--gold-primary) !important;
            color: var(--gold-primary) !important;
            background-color: transparent !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }
    
        .btn-outline-primary:hover {
            background-color: var(--gold-primary) !important;
            color: var(--black) !important;
            transform: translateY(-2px);
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.2);
        }
    
        .btn-outline-secondary {
            border-color: var(--black-light) !important;
            color: var(--black) !important;
            background-color: var(--white) !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }
    
        .btn-outline-secondary:hover {
            background-color: var(--black) !important;
            border-color: var(--black) !important;
            color: var(--white) !important;
        }
    
        .btn-danger {
            background-color: var(--black) !important;
            border-color: var(--black) !important;
            color: var(--white) !important;
            font-weight: 600 !important;
            transition: all 0.3s ease;
        }
    
        .btn-danger:hover {
            background-color: var(--black-light) !important;
            border-color: var(--black-light) !important;
            color: var(--gold-primary) !important;
        }
    
        /* Badge Styling */
        .badge-primary {
            background-color: var(--gold-primary) !important;
            color: var(--black) !important;
            font-weight: 600 !important;
            padding: 5px 10px !important;
        }
    
        .badge-light {
            background-color: var(--white-dark) !important;
            color: var(--black) !important;
            font-weight: 500 !important;
            padding: 5px 10px !important;
        }
    
        .badge-danger {
            background-color: var(--black) !important;
            color: var(--gold-primary) !important;
            font-weight: 600 !important;
        }
    
        /* Card Styling */
        .card {
            border: 1px solid var(--black-light) !important;
            border-radius: 8px !important;
            background-color: var(--white) !important;
            transition: all 0.3s ease;
        }
    
        .card.border-primary {
            border-color: var(--gold-primary) !important;
            border-width: 2px !important;
            box-shadow: 0 5px 15px rgba(212, 175, 55, 0.1);
        }
    
        .card-title {
            color: var(--gold-primary) !important;
            font-weight: 600 !important;
        }
    
        /* Address Cards */
        .card .text-muted {
            color: var(--gray) !important;
        }
    
        .card .card-text {
            color: var(--black) !important;
        }
    
        /* Price Table Styling */
        .table {
            color: var(--black) !important;
        }
    
        .table td {
            border-top: 1px solid var(--white-dark) !important;
        }
    
        .table .price {
            color: var(--gold-primary) !important;
            font-weight: 600;
        }
    
        .table .subtotal td,
        .table .tax td,
        .table .cod-fee td {
            color: var(--black) !important;
        }
    
        #grand-total,
        #final-total {
            color: var(--gold-primary) !important;
            font-size: 1.2rem;
            font-weight: 700;
        }
    
        /* Form Controls */
        .form-control,
        .form-select {
            border: 1px solid #dedede !important;
            border-radius: 9px !important;
            transition: all 0.3s ease;
        }
    
        .form-control:focus,
        .form-select:focus {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25) !important;
        }
    
        .form-label {
            text-transform: none;
            color: var(--black) !important;
            font-weight: 500 !important;
            margin-bottom: 0.25rem !important;
        }
    
        .form-label span[style*="color:red"] {
            color: var(--gold-primary) !important;

        }
    
        /* Checkbox Styling */
        .form-check-input:checked {
            background-color: var(--gold-primary) !important;
            border-color: var(--gold-primary) !important;
        }
    
        .form-check-input:focus {
            border-color: var(--gold-primary) !important;
            box-shadow: 0 0 0 0.2rem rgba(212, 175, 55, 0.25) !important;
        }
    
        /* Link Styling */
        a {
            /* color: var(--gold-primary) !important; */
            transition: all 0.3s ease;
        }
    
        a:hover {
            color: var(--gold-dark) !important;
            text-decoration: none !important;
        }
    
        /* Page Background */
        .page-content.bg-light {
            background-color: var(--white-off) !important;
        }
    
        /* Alert Messages */
        .alert-success {
            background-color: var(--white) !important;
            border-color: var(--gold-primary) !important;
            color: var(--black) !important;
            border-left: 4px solid var(--gold-primary);
        }
    
        .alert-danger {
            background-color: var(--white) !important;
            border-color: var(--black) !important;
            color: var(--black) !important;
            border-left: 4px solid var(--black);
        }
    
        .alert .btn-close {
            color: var(--black) !important;
        }
    
        /* Address Modal Specific */
        #changeAddressModal .btn-block {
            width: 100%;
            margin-top: 1rem !important;
        }
    
        #changeAddressModal .selected-address-btn {
            background-color: var(--gold-primary) !important;
            border-color: var(--gold-primary) !important;
            color: var(--black) !important;
            opacity: 0.8;
        }
    
        /* Quantity and Item Styling */
        .quantity-row,
        .item-total,
        .item-tax,
        .item-color,
        .item-size {
            color: var(--gray) !important;
            font-size: 0.9rem;
        }
    
        .item-total {
            color: var(--gold-primary) !important;
            font-weight: 600;
        }
    
        /* Font Awesome Icons */
        .fas, .far, .fab {
            color: inherit;
        }
    
        .fa-tag {
            color: var(--gold-primary) !important;
        }
    
        .fa-check-circle {
            color: var(--gold-primary) !important;
        }
    
        /* Add New Address Card */
        .add-new-address-card .btn-link {
            color: var(--gold-primary) !important;
        }
    
        .add-new-address-card .btn-link:hover {
            color: var(--gold-dark) !important;
        }
    
        .fa-plus-circle {
            color: var(--gold-primary) !important;
            transition: all 0.3s ease;
        }
    
        .fa-plus-circle:hover {
            color: var(--gold-dark) !important;
            transform: scale(1.1);
        }
    
        /* Responsive Adjustments */
        @media (max-width: 768px) {
            .cart-item.style-1 {
                flex-direction: column;
                text-align: center;
            }
    
            .product-info-row {
                justify-content: center;
            }
    
            .price-row {
                justify-content: center;
            }
        }

        .discount{
                border: 1px solid #dedede !important;
                border-top-left-radius: 8px !important;
                border-bottom-left-radius: 8px !important;
                border-top-right-radius: 0 !important;
                border-bottom-right-radius: 0 !important;
                transition: all 0.3s ease;
                padding: 10px 10px;
        }
        
        #new-states,
        #new-states option {
            text-transform: none !important;
        }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>
        <?php include("templates/header.php"); ?>
        <div id="dropdownContent" style="text-align:center;"></div>
        <div class="page-content bg-light">
            <?php include("pages/place_order/place_order_body.php"); ?>
            <?php include("pages/place_order/change_address1_modal.php"); ?>
        </div>
        <?php include("templates/footer.php"); ?>
        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
    </div>
    <?php include("templates/scripts.php"); ?>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>
     
  
    <?php
    // Storing values passed through redirect js
        $productId = $_POST['id'] ?? '';
        $quantity = $_POST['quantity'] ?? '';
        $color = $_POST['color'] ?? '';
        $size = $_POST['size'] ?? '';
        $length = $_POST['length'] ?? '';
        $notes = $_POST['notes'] ?? '';
        $flag=$_POST['flag'] ?? '';
    ?>
    <script>
    
   
        $(document).ready(function() {
            loadcountryDropdown();
            // Add currency update listener for place order page
            $(document).on('currencyUpdated', function(event, currencyData) {
                console.log('Place order page received currency update:', currencyData);
                
                // Update current currency
                currentCurrency = currencyData;
                window.currentCurrency = currencyData;
                
                // Update prices with new currency
                ProductPlaceOrder();
                
                // Show notification
                const currencyName = currencyData.country_name || 'selected currency';
                showNotification('Prices updated to ' + currencyName, 'success');
            });
            
            // Get current currency
            let currentCurrency = window.currentCurrency || <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
                'country_code' => 'BH',
                'currency_code' => 'BHD',
                'currency_symbol' => 'BD',
                'exchange_rate' => 1.0000
            ]); ?>;
            function getLocalized(en, ar) {
                const isArabic = window.currentLanguage === 'arabic';
                return (isArabic && ar && ar.trim() !== '') ? ar : (en || '');
            }
            // Initialize currency
            if (window.currentCurrency) {
                currentCurrency = window.currentCurrency;
            }
            
            // IMPROVED Price formatting function
            function formatPrice(price, includeSymbol = true, decimals = 2) {
                // Handle null/undefined
                if (price === null || price === undefined) {
                    const symbol = currentCurrency?.currency_symbol || 'BD';
                    return includeSymbol ? `${symbol} 0.00` : '0.00';
                }
                
                // Convert to number
                const numericPrice = parseFloat(price);
                if (isNaN(numericPrice)) {
                    const symbol = currentCurrency?.currency_symbol || 'BD';
                    return includeSymbol ? `${symbol} 0.00` : '0.00';
                }
                
                // Convert price using current currency exchange rate
                const exchangeRate = currentCurrency?.exchange_rate || 1;
                const convertedPrice = numericPrice * exchangeRate;
                const symbol = currentCurrency?.currency_symbol || 'BD';
                
                // Format with commas and 2 decimal places
                const formatted = convertedPrice.toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                return includeSymbol ? `${symbol} ${formatted}` : formatted;
            }
            
            // Enhanced showNotification function
            function showNotification(message, type) {
                const dropdown = document.getElementById('dropdownContent');
                if (!dropdown) return;
                
                const svgSuccess = '<svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
                const svgError = '<svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>';
                
                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const icon = type === 'success' ? svgSuccess : svgError;
                
                dropdown.innerHTML = `
                    <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                        ${icon} ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                dropdown.style.display = 'block';
                
                setTimeout(() => {
                    dropdown.style.display = 'none';
                    dropdown.innerHTML = '';
                }, 5000);
            }
            
            function showNotificationWithDetails(message, type, offeredProducts = []) {
                const dropdown = document.getElementById('dropdownContent');
                if (!dropdown) return;
                
                const icons = {
                    success: '<svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>',
                    error: '<svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>',
                    warning: '<svg class="me-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="#D4AF37" stroke-width="2"><path d="M12 22s8-4 8-10V5l-8-3-8 3v7c0 6 8 10 8 10z"></path><line x1="12" y1="9" x2="12" y2="13"></line><line x1="12" y1="17" x2="12" y2="17"></line></svg>'
                };
                
                const alertClass = type === 'success' ? 'alert-success' : type === 'warning' ? 'alert-warning' : 'alert-danger';
                
                let productListHtml = '';
                if (offeredProducts.length > 0) {
                    productListHtml = '<div class="mt-2" style="font-size: 13px;">';
                    offeredProducts.forEach(product => {
                        productListHtml += `<div class="mt-1">• ${product.name} <span class="text-muted">(saves ${formatPrice(product.savings)})</span></div>`;
                    });
                    productListHtml += '</div>';
                }
                
                dropdown.innerHTML = `
                    <div class="alert ${alertClass} alert-dismissible fade show" role="alert" style="white-space: pre-line;">
                        ${icons[type] || ''} ${message}
                        ${productListHtml}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                dropdown.style.display = 'block';
                
                setTimeout(() => {
                    dropdown.style.display = 'none';
                    dropdown.innerHTML = '';
                }, 8000); // Longer timeout for detailed message
            }
            
            // function highlightOfferedItems() {
            //     // Remove any existing highlights
            //     $('.offer-highlight').remove();
                
            //     if (flag == '1') {
            //         // Cart mode - check each item
            //         $('.cart-item').each(function(index) {
            //             const $item = $(this);
                        
            //             // Check if this item has an offer badge or special price
            //             const hasOfferBadge = $item.find('.badge.bg-danger').length > 0;
            //             const priceText = $item.find('.price').first().text();
                        
            //             // For cart mode, we need to check the stored data
            //             // This is simplified - ideally you'd store this info in data attributes
            //             // if (hasOfferBadge) {
            //             //     $item.css('border', '2px solid #D4AF37');
            //             //     $item.append('<div class="offer-highlight badge bg-warning mt-2" style="color: #000;">🏷️ Special Offer Applied - Promo Not Allowed</div>');
            //             // }
            //         });
            //     } else {
            //         // Single product mode
            //         const hasOffer = $('.order-detail').data('product')?.has_offer;
            //         if (hasOffer) {
            //             $('.cart-item').css('border', '2px solid #D4AF37');
            //             $('.cart-item').append('<div class="offer-highlight badge bg-warning mt-2" style="color: #000;">🏷️ Special Offer Applied - Promo Not Allowed</div>');
            //         }
            //     }
            // }
            
            // New function to mark promo-eligible items
            function markPromoEligibleItems() {
                $('.cart-item').each(function() {
                    const $item = $(this);
                    const hasOriginalPrice = $item.find('.original-price').length > 0;
                    
                    // if (!hasOriginalPrice) {
                    //     $item.css('border', '2px solid #28a745');
                    //     $item.append('<div class="promo-eligible-badge badge bg-success mt-2" style="color: #fff;">✓ Promo eligible</div>');
                    // }
                });
            }
            
            // Add this CSS to your styles
            const promoStyles = `
                .alert-warning {
                    background-color: #fff3cd;
                    border-color: #D4AF37;
                    color: #856404;
                    border-left: 4px solid #D4AF37;
                }
                .badge.bg-warning {
                    background-color: #D4AF37 !important;
                    color: #000 !important;
                }
                .badge.bg-success {
                    background-color: #28a745 !important;
                }
                .offer-highlight, .promo-eligible-badge {
                    position: relative;
                    top: 5px;
                    margin-bottom: 5px;
                    padding: 5px 10px;
                    border-radius: 4px;
                    font-size: 12px;
                }
            `;
            
            // Add styles to head
            $('<style>').text(promoStyles).appendTo('head');
            
            // const urlParams = new URLSearchParams(window.location.search);
            // const productId = urlParams.get('id');
            // const flag = urlParams.get('flag') || '0';
            
            
            const productId= "<?php echo $productId; ?>";
            const flag = <?php echo isset($flag) ? $flag : 0; ?>;

           
            
            const baseImageUrl = "<?php echo $_SESSION['url']; ?>";
            const svgSuccess = '<svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
            const svgError = '<svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>';
        
            let customerEmail = '';
            let customerName = '';
        
            CustomerListAddress();
            ProductPlaceOrder();

            //  Billing Address Section
            // =======================
            function CustomerListAddress() {
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'customer_list' },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.data && response.data.length > 0) {
                            const customer = response.data[0];
                            customerEmail = customer.email_user_name || '';
                            customerName = customer.customer_name || '';
                            
                            // ALWAYS populate the new address form fields when we have customer data
                            // This ensures the form is populated whether it's shown on page load or later
                            if (customerName) {
                                $('#new-fullname').val(customerName).prop('readonly', true).css('background-color', '#f8f9fa');
                            }
                            if (customerEmail) {
                                $('#new-emails').val(customerEmail).prop('readonly', true).css('background-color', '#f8f9fa');
                            }
                            if (customer.mobile_no) {
                                $('#new-mobiles').val(customer.mobile_no);
                            }
                            if (customer.whatsapp_no) {
                                $('#new-whatsappnos').val(customer.whatsapp_no);
                            }
                            
                            const isAddressIncomplete = !customer.permenant_address ||
                                customer.permenant_address.trim() === '' ||
                                customer.permenant_address === 'undefined' ||
                                // !customer.district ||
                                // customer.district.includes('Select District') ||
                                // customer.district === 'undefined' ||
                                // !customer.state ||
                                // customer.state.includes('Select State') ||
                                // customer.state === 'undefined' ||
                               !customer.street ||
                                customer.street === 'undefined';
                            
                            // MODIFIED: Always show the address form on page load
                            // Populate the new address form with customer data if available
                            $('#new-emails').val(customerEmail).prop('readonly', true).css('background-color', '#f8f9fa');
                            
                            // If address is incomplete, show the new address form directly
                            if (isAddressIncomplete) {
                                console.log("address is incomplete");
                                $('#billing-address-form').hide();
                                $('#add-address-btn-container').hide();
                                $('#new-address-form-container').show();
                                
                                // Initialize Select2 for the new address form
                                $('#new-countrys').select2({ width: '100%' });
                                
                            } else {
                                // Address is complete - show the billing form
                                console.log("address is complete");
                                $('#funame').val(customer.customer_name || '');
                                $('#paddress').val(customer.permenant_address || '');
                                $('#street').val(customer.street || '');
                             //   $('#postalcode').val(customer.postal_code || '' || );
                                $('#postalcode').val(customer.postal_code == 0 ? '' : (customer.postal_code || ''));

                                $('#country').val(customer.country || '');
                                $('#state').val(customer.state || '');
                                $('#district').val(customer.district || '');
                                $('#mobile').val(customer.mobile_no || '');
                                $('#wmobile').val(customer.whatsapp_no || '');
                                $('#email').val(customer.email_user_name || '');
                                
                                $('#billing-address-form').show();
                                $('#add-address-btn-container').hide();
                                $('#new-address-form-container').hide();
                                
                                const addressFields = ['funame', 'paddress', 'street', 'postalcode', 'country', 'state', 'district', 'mobile', 'wmobile', 'email'];
                                addressFields.forEach(field => {
                                    $('#' + field).prop('readonly', true).css('background-color', '#f8f9fa');
                                });
                            }
                        } else {
                            // No customer data - still show the new address form
                            $('#billing-address-form').hide();
                            $('#add-address-btn-container').hide();
                            $('#new-address-form-container').show();
                            
                            // Initialize Select2 for the new address form
                            $('#new-countrys').select2({ width: '100%' });
                            
                            console.log('No customer data found - showing empty address form.');
                        }
                    },
                    error: function() {
                        console.error('Error fetching customer details.');
                        // On error, still show the address form
                        $('#billing-address-form').hide();
                        $('#add-address-btn-container').hide();
                        $('#new-address-form-container').show();
                        
                        // Initialize Select2 for the new address form
                        $('#new-countrys').select2({ width: '100%' });
                    }
                });
            }
            
            $('#new-mobiles').on('input', function () {
                $('#new-whatsappnos').val($(this).val());
            });
            
            $(document).on('input', '#mobiles', function () {
                $('#whatsappnos').val($(this).val());
            });
        
            $(document).on('click', '#add-address-btn', function() {
                $('#billing-address-form').hide();
                $('#add-address-btn-container').hide();
                $('#new-address-form-container').show();
                $('#new-emails').val(customerEmail).prop('readonly', true).css('background-color', '#f8f9fa');
                $('#new-fullname').val(customerName).prop('readonly', true).css('background-color', '#f8f9fa');
                $('#new-countrys').select2({ width: '100%' });
            });
        
            $(document).on('click', '.cancel-new-addresss', function() {
                $('#new-address-form-container').hide();
                $('#add-address-btn-container').show();
            });
        
            $(document).on('click', '.use-this-address', function(e) {
                e.preventDefault();
                // Populate billing form without saving to database
                $('#funame').val($('#new-fullname').val());
                $('#paddress').val($('#new-permanentadd').val());
                $('#street').val($('#new-streets').val());
                $('#postalcode').val($('#new-pocode').val());
                $('#country').val($('#new-countrys').val());
                $('#state').val($('#new-states').val());
                $('#district').val($('#new-districts').val());
                $('#mobile').val($('#new-mobiles').val());
                $('#wmobile').val($('#new-whatsappnos').val());
                $('#email').val(customerEmail);
                $('#billing-address-form').show();
                $('#new-address-form-container').hide();
                $('#add-address-btn-container').hide();
                const addressFields = ['funame', 'paddress', 'street', 'postalcode', 'country', 'state', 'district', 'mobile', 'wmobile', 'email'];
                addressFields.forEach(field => {
                    $('#' + field).prop('readonly', true).css('background-color', '#f8f9fa');
                });
                setupDropdown('dropdownContent', 'success', svgSuccess + 'Address applied successfully', 'click');
            });
        
            $(document).on('submit', '#new-address-form', function(e) {
                e.preventDefault();
                // alert("clicked");
                // Validate country selection
                var countryValue = $('#new-countrys').val();
                if (!countryValue) {
                    $('#new-countrys').addClass('is-invalid');
                    $('#country-error').show();
                    
                    // Scroll to country field
                    $('html, body').animate({
                        scrollTop: $('#new-countrys').offset().top - 100
                    }, 500);
                    
                    return false;
                } else {
                    $('#new-countrys').removeClass('is-invalid');
                    $('#country-error').hide();
                }
                
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                var formData = {
                    action: 'update_customer_address',
                    customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>,
                    fullname: $('#new-fullname').val(),
                    permanentadd: $('#new-permanentadd').val(),
                    streets: $('#new-streets').val(),
                    pocode: $('#new-pocode').val(),
                    districts: $('#new-districts').val(),
                    states: $('#new-states').val(),
                    countrys: countryValue,
                    mobiles: $('#new-mobiles').val(),
                    whatsappnos: $('#new-whatsappnos').val()
                };
                
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.status === 'success') {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Address updated successfully', 'click');
                           
                            CustomerListAddress();
                            $('#billing-address-form').show();
                            $('#new-address-form-container').hide();
                            $('#add-address-btn-container').hide();
                            
                            const addressFields = ['funame', 'paddress', 'street', 'postalcode', 'country', 'state', 'district', 'mobile', 'wmobile', 'email'];
                            addressFields.forEach(field => {
                                $('#' + field).prop('readonly', true).css('background-color', '#f8f9fa');
                            });
                            
                            // Auto-scroll to product details section after successful save
                            $('html, body').animate({
                                scrollTop: $('.order-detail').offset().top - 50
                            }, 800);
                            
                        } else {
                            setupDropdown('dropdownContent', 'error', svgError + (response.message || 'Failed to update address'), 'click');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Raw response:", xhr.responseText);
                        setupDropdown('dropdownContent', 'error', svgError + 'Error updating address. Please try again.', 'click');
                    }
                });
            });
        
            // =======================
            //  Product / Cart Display
            // =======================
            function ProductPlaceOrder() {
                const quantity = "<?php echo $quantity; ?>";
                const length = "<?php echo $length; ?>";
                const color = "<?php echo $color; ?>";
                const size = "<?php echo $size; ?>";
                const flag = <?php echo isset($flag) ? $flag : 0; ?>;
                
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { 
                        action: 'product_list', 
                        flag: flag, 
                        product_id: productId 
                    },
                    dataType: 'json',
                    success: function(response) {
                        console.log('Product list response:', response);
                        
                        // REMOVE EXISTING TAX AND COD ROWS BEFORE ADDING NEW ONES
                        $('.tax, .cod-fee, .savings-row').remove();
                        
                        if (response && response.data && response.data.length > 0) {
                            const container = $('#cart-items-container');
                            container.empty();
                            let subtotal = 0;
                            let taxTotal = 0;
                            let codTotal = 0;
                            let taxPercentages = new Set();
                            
                            if (flag == '1') {
                                // ===========================================
                                // CART MODE (flag=1)
                                // ===========================================
                                const cartItems = response.data[0].cart_items.split(';;');
                                let totalMrp = 0;
                                let totalOffer = 0;
                                const vendorId = response.data[0].vendor_id || '';
                                let vendorCodMap = {};
                                
                                cartItems.forEach(item => {
                                    if (item) {
                                        const parts = item.split('||');
                                        
                                        // Parse the parts
                                        const name = parts[0] || '';
                                        const amountSelling = parseFloat(parts[1] || '0');
                                        const quantity = parseInt(parts[2] || '1');
                                        const image = parts[3] || '';
                                        const productId = parts[4] || '';
                                        const color = parts[5] || '';
                                        const size = parts[6] || '';
                                        const amountMrp = parseFloat(parts[7] || '0');
                                        const amountOffer = parseFloat(parts[8] || '0');
                                        const vendor_id = parts[9] || '';
                                        const arabic_name = parts[10] || '';
                                        const customer_desc = parts[11] || '';
                                        const tax_percentage = parseFloat(parts[12] || '0');
                                        const cod_fee = parseFloat(parts[13] || '0');
                                        
                                        // Determine which price to display (use offer if available)
                                        const displayPrice = amountOffer > 0 ? amountOffer : amountSelling;
                                        
                                        // Get localized product name
                                        const displayName = getLocalized(name, arabic_name);
                                        
                                        const itemPrice = displayPrice || 0;
                                        const itemQuantity = quantity || 1;
                                        const itemMrp = amountMrp || 0;
                                        const itemOffer = amountOffer || itemPrice;
                                        const itemTaxPercentage = tax_percentage || 0;
                                        const itemCodFee = cod_fee || 0;
                                        
                                        const itemTotal = itemPrice * itemQuantity;
                                        const itemTax = itemTotal * (itemTaxPercentage / 100);
                                        subtotal += itemTotal;
                                        taxTotal += itemTax;
                                        taxPercentages.add(itemTaxPercentage);
                                        totalMrp += itemMrp * itemQuantity;
                                        totalOffer += itemOffer * itemQuantity;
                                        
                                        const vId = parseInt(vendor_id);
                                        if (!vendorCodMap[vId] || vendorCodMap[vId] < itemCodFee) {
                                            vendorCodMap[vId] = itemCodFee;
                                        }
                                        
                                        // Calculate discount percentage for display
                                        let discountPercent = 0;
                                        if (amountOffer > 0 && amountSelling > 0) {
                                            discountPercent = ((amountSelling - amountOffer) / amountSelling * 100).toFixed(0);
                                        } else if (amountOffer > 0 && amountMrp > 0) {
                                            discountPercent = ((amountMrp - amountOffer) / amountMrp * 100).toFixed(0);
                                        }
                                        
                                        const cartItemHTML = `
                                            <div class="cart-item style-1 mb-3" data-product-id="${productId}" data-has-offer="${amountOffer > 0}">
                                                <div class="dz-media">
                                                    <img src="${baseImageUrl + image}" alt="${displayName}" style="max-width: 100px; height: auto;">
                                                </div>
                                                <div class="dz-content">
                                                    <h6 class="title mb-0">${displayName}</h6>
                                                    <div class="price-row">
                                                        <span class="price">${formatPrice(itemPrice)}</span>
                                                        ${amountOffer > 0 && amountSelling > itemPrice ? 
                                                            `<del class="original-price ml-2">${formatPrice(amountSelling)}</del>` : ''}
                                                        ${discountPercent > 0 ? 
                                                            `<span class="discount badge bg-gold ml-2">${discountPercent}% OFF</span>` : ''}
                                                    </div>
                                                    <div class="quantity-row">
                                                        <span class="quantity">${getLocalized('Quantity:', 'الكمية:')} ${itemQuantity}</span>
                                                    </div>
                                                    <div class="item-total">${getLocalized('Total:', 'الإجمالي:')} ${formatPrice(itemTotal)}</div>
                                                    ${itemTaxPercentage > 0 ? `
                                                        <div class="item-tax">
                                                            ${getLocalized('Tax', 'الضريبة')} (${itemTaxPercentage}%): ${formatPrice(itemTax)}
                                                        </div>` : ''}
                                                    ${color && color !== 'none' && color !== 'undefined' ? 
                                                        `<div class="item-color">${getLocalized('Color:', 'اللون:')} ${color}</div>` : ''}
                                                    ${size && size !== 'none' && size !== 'undefined' ? 
                                                        `<div class="item-size">${getLocalized('Size:', 'الحجم:')} ${size}</div>` : ''}
                                
                                                </div>
                                            </div>
                                        `;
                                        container.append(cartItemHTML);
                                    }
                                });
                                
                                codTotal = Object.values(vendorCodMap).reduce((sum, fee) => sum + fee, 0);
                                const savings = totalMrp - totalOffer;
                                
                                if (savings > 0) {
                                    const savingsHTML = `
                                        <div class="savings-row mt-3 p-3 bg-light rounded">
                                            <span class="savings text-success">
                                                <i class="fas fa-tag me-2"></i>
                                                ${getLocalized('You will save', 'ستوفر')} ${formatPrice(savings)}
                                            </span><br>
                                            <del class="original-price text-muted">
                                                ${getLocalized('Total MRP:', 'السعر الأصلي الإجمالي:')} ${formatPrice(totalMrp)}
                                            </del>
                                        </div>
                                    `;
                                    container.append(savingsHTML);
                                }
                                
                                // Update or create hidden inputs
                                $('#selected-cart-items').remove();
                                $('#vendor-id').remove();
                                
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'selected-cart-items',
                                    name: 'cart_items',
                                    value: response.data[0].cart_items
                                }).appendTo('.order-detail');
                                
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'vendor-id',
                                    name: 'vendor_id',
                                    value: vendorId
                                }).appendTo('.order-detail');
                                
                            } else {
                                // ===========================================
                                // SINGLE PRODUCT MODE (flag=0)
                                // ===========================================
                                const product = response.data[0];
                                
                                // Store complete product data for later use (promo code checking, etc.)
                                const productData = {
                                    id: product.ids,
                                    name: getLocalized(product.product_name, product.product_name_arabic),
                                    amount_mrp: parseFloat(product.amount_mrp) || 0,
                                    amount_selling: parseFloat(product.amount_selling) || 0,
                                    amount_offer: parseFloat(product.amount_offer) || 0,
                                    tax_percentage: parseFloat(product.tax_percentage) || 0,
                                    cod_fee: parseFloat(product.cod_fee) || 0,
                                    vendor_id: product.vendor_id || '',
                                    has_offer: parseFloat(product.amount_offer) > 0,
                                    product_image: product.product_image || '',
                                    product_name: product.product_name || '',
                                    product_name_arabic: product.product_name_arabic || ''
                                };
                                
                                $('.order-detail').data('product', productData);
                                console.log('Product data stored for single product:', productData);
                                
                                // Get localized product name
                                const displayName = getLocalized(
                                    product.product_name, 
                                    product.product_name_arabic
                                );
                                
                                const amountMrp = parseFloat(product.amount_mrp) || 0;
                                const amountSelling = parseFloat(product.amount_selling) || 0;
                                const amountOffer = parseFloat(product.amount_offer) || 0;
                                
                                // IMPORTANT: Determine which price to display
                                // Use amount_offer if it exists and is > 0, otherwise use amount_selling
                                const displayPrice = amountOffer > 0 ? amountOffer : amountSelling;
                                
                                const taxPercentage = parseFloat(product.tax_percentage) || 0;
                                const codFee = parseFloat(product.cod_fee) || 0;
                                const productQuantity = parseInt(quantity) || 1;
                                
                                const productTotal = displayPrice * productQuantity;
                                const taxAmount = productTotal * (taxPercentage / 100);
                                const codAmount = codFee;
                                subtotal = productTotal;
                                taxTotal = taxAmount;
                                codTotal = codAmount;
                                
                                // Calculate discount percentage for display
                                let discountPercent = 0;
                                if (amountOffer > 0 && amountSelling > 0) {
                                    discountPercent = ((amountSelling - amountOffer) / amountSelling * 100).toFixed(0);
                                } else if (amountOffer > 0 && amountMrp > 0) {
                                    discountPercent = ((amountMrp - amountOffer) / amountMrp * 100).toFixed(0);
                                }
                                
                                const vendorId = product.vendor_id || '';
                                
                                const productHTML = `
                                    <div class="cart-item style-1" data-product-id="${product.ids}" data-has-offer="${amountOffer > 0}">
                                        <div class="dz-media">
                                            <img src="${product.product_image ? baseImageUrl + product.product_image : 'images/shop/product/default-product.jpg'}" 
                                                alt="${displayName}" style="max-width: 100px; height: auto;">
                                        </div>
                                        <div class="dz-content">
                                            <h6 class="title mb-0">${displayName}</h6>
                                            <div class="product-info-row">
                                                <span class="price">${formatPrice(displayPrice)}</span>
                                                ${amountOffer > 0 && amountSelling > displayPrice ? 
                                                    `<del class="original-price ml-2">${formatPrice(amountSelling)}</del>` : ''}
                                                ${discountPercent > 0 ? 
                                                    `<span class="discount badge bg-gold ml-2">${discountPercent}% OFF</span>` : ''}
                                            </div>
                                            <div class="product-info-row">
                                                <span class="quantity">${getLocalized('Quantity:', 'الكمية:')} ${productQuantity}</span>
                                            </div>

                                            ${length && length !== '0' ? `
                                            <div class="product-info-row">
                                                <span class="length">${getLocalized('Length:', 'الطول:')} ${length}</span>
                                            </div>` : ''}

                                            ${color && color !== 'none' && color !== 'undefined' ? `
                                            <div class="product-info-row">
                                                <span class="color">${getLocalized('Color:', 'اللون:')} ${color}</span>
                                            </div>` : ''}

                                            ${size && size !== 'none' && size !== 'undefined' ? `
                                            <div class="product-info-row">
                                                <span class="size">${getLocalized('Size:', 'الحجم:')} ${size}</span>
                                            </div>` : ''}

                                            <div class="product-info-row">
                                                <span class="item-total">${getLocalized('Total:', 'الإجمالي:')} ${formatPrice(productTotal)}</span>
                                            </div>
                                            ${taxPercentage > 0 ? `
                                                <div class="product-info-row">
                                                    <span class="item-tax">
                                                        ${getLocalized('Tax', 'الضريبة')} (${taxPercentage}%): ${formatPrice(taxAmount)}
                                                    </span>
                                                </div>` : ''}

                                        </div>
                                    </div>
                                `;
                                container.append(productHTML);
                                
                                // Update or create hidden inputs
                                $('#selected-product-id').remove();
                                $('#order-quantity').remove();
                                $('#vendor-id').remove();
                                
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'selected-product-id',
                                    name: 'product_id',
                                    value: product.ids
                                }).appendTo('.order-detail');
                                
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'order-quantity',
                                    name: 'quantity',
                                    value: productQuantity
                                }).appendTo('.order-detail');

                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'order-length',
                                    name: 'length',
                                    value: length
                                }).appendTo('.order-detail');

                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'order-color',
                                    name: 'color',
                                    value: color
                                }).appendTo('.order-detail');

                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'order-size',
                                    name: 'size',
                                    value: size
                                }).appendTo('.order-detail');
                                
                                $('<input>').attr({
                                    type: 'hidden',
                                    id: 'vendor-id',
                                    name: 'vendor_id',
                                    value: vendorId
                                }).appendTo('.order-detail');
                            }
                            
                            // ===========================================
                            // Update pricing table (common for both modes)
                            // ===========================================
                            $('#sub-total').text(formatPrice(subtotal));
                            
                            // Add tax row if applicable
                            if (taxTotal > 0) {
                                const taxLabel = taxPercentages.size === 1 ? 
                                    `${getLocalized('Tax', 'الضريبة')} (${Array.from(taxPercentages)[0]}%)` : 
                                    getLocalized('Taxes', 'الضرائب');
                                
                                // Check if tax row already exists
                                if ($('.tax').length === 0) {
                                    $('.subtotal').after(`
                                        <tr class="tax">
                                            <td>${taxLabel}</td>
                                            <td class="price">${formatPrice(taxTotal)}</td>
                                        </tr>
                                    `);
                                }
                            }
                            
                            // Add COD fee row if applicable
                            if (codTotal > 0) {
                                // Check if COD row already exists
                                if ($('.cod-fee').length === 0) {
                                    // Insert after tax row or after subtotal
                                    if ($('.tax').length > 0) {
                                        $('.tax').after(`
                                            <tr class="cod-fee">
                                                <td>${getLocalized('COD Fee', 'رسوم الدفع عند الاستلام')}</td>
                                                <td class="price">${formatPrice(codTotal)}</td>
                                            </tr>
                                        `);
                                    } else {
                                        $('.subtotal').after(`
                                            <tr class="cod-fee">
                                                <td>${getLocalized('COD Fee', 'رسوم الدفع عند الاستلام')}</td>
                                                <td class="price">${formatPrice(codTotal)}</td>
                                            </tr>
                                        `);
                                    }
                                }
                            }
                            
                            // Calculate and update grand total
                            const grandTotal = subtotal + taxTotal + codTotal;
                            $('#grand-total').text(formatPrice(grandTotal));
                            $('#final-total').text(formatPrice(grandTotal));
                            
                            // Store totals in data attributes for later use
                            $('.order-detail').data('totals', {
                                subtotal: subtotal,
                                tax: taxTotal,
                                cod: codTotal,
                                grand: grandTotal
                            });
                            
                            // Check for any existing offers and highlight them
                            // highlightOfferedItems();
                            
                        } else {
                            console.log('No product data found.');
                            $('#cart-items-container').html('<p class="text-muted">' + 
                                getLocalized('No products found', 'لم يتم العثور على منتجات') + '</p>');
                            $('.tax, .cod-fee, .savings-row').remove();
                            $('#sub-total').text(formatPrice(0));
                            $('#grand-total').text(formatPrice(0));
                            $('#final-total').text(formatPrice(0));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product details:', error, xhr.responseText);
                        $('#cart-items-container').html('<p class="text-danger">' + 
                            getLocalized('Error loading products', 'خطأ في تحميل المنتجات') + '</p>');
                        $('.tax, .cod-fee, .savings-row').remove();
                        $('#sub-total').text(formatPrice(0));
                        $('#grand-total').text(formatPrice(0));
                        $('#final-total').text(formatPrice(0));
                    }
                });
            }
            $(document).on('languageChanged', function() {
                updatePlaceOrderTranslations();
                ProductPlaceOrder(); // Reload products with new language
                
                // Update modal content if open
                if ($('#privacyPolicyModal').hasClass('show')) {
                    $('#privacyPolicyModal').modal('hide');
                }
                if ($('#whatsappConfirmModal').hasClass('show')) {
                    $('#whatsappConfirmModal').modal('hide');
                }
            });
            // =======================
            //  CHANGE ADDRESS MODAL
            // =======================
            $('#change-address-btn').click(function() {
                $('#changeAddressModal').modal('show');
                loadCustomerAddresses();
            });
            
        
            $('.fa-plus-circle').on('click', function(e) {
                e.stopPropagation();
                $('.add-new-address-card').hide();
                
                var newAddressFormHTML = `
                    <div class="card mb-4 border-primary new-address-form-card">
                        <div class="card-body">
                            <h5 class="card-title mb-4">Add New Address</h5>
                            <form id="inlineAddressForm" class="row g-3">

                                <div class="col-md-6">
                                    <label for="countrys" class="form-label">Country <span style="color:red">*</span></label>
                                    <select name="countrys" id="countrys" required class="form-select select2">
                                        <option value="" disabled selected>Select Country</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="fullname" class="form-label">Customer Name <span style="color:red">*</span></label>
                                    <input type="text" name="fullname" id="fullname" required class="form-control">
                                </div>
                                <div class="col-md-12">
                                    <label for="permanentadd" class="form-label">Permanent Address <span style="color:red">*</span></label>
                                    <textarea name="permanentadd" id="permanentadd" required class="form-control" rows="2"></textarea>
                                </div>
                                <div class="col-md-4" id="state_session">
                                    <label for="states" class="form-label">State <span style="color:red">*</span></label>
                                   <select name="states" id="states" class="form-select select2">
                                        <option disabled selected>Select State</option>
                                     </select>
                                    <!-- <input type="text" name="states" id="states" required class="form-control"> -->
                                </div>
                                <div class="col-md-4">
                                    <label for="city" class="form-label">Area <span style="color:red">*</span></label>
                                    <input type="text" name="streets" id="streets" required class="form-control">
                                </div>
                                 <div class="col-md-4">
                                    <label for="pocode" class="form-label">Postal Box <span style="color:red"> (optional)</span></label>
                                    <input type="text" name="pocode" id="pocode"  class="form-control">
                                </div>

                                <div class="col-md-12 ">
                                    <label for="mobiles" class="form-label">Mobile Number <span style="color:red">*</span></label>
                                    <input type="number" name="mobiles" id="mobiles" required class="form-control">
                                </div>
                                
                               
                                <div class="col-12 d-flex justify-content-end mt-3">
                                    <button type="button" class="btn btn-outline-secondary me-2 cancel-new-address">Cancel</button>
                                    <button type="submit" class="btn btn-primary">Save Address</button>
                                </div>
                            </form>
                        </div>
                    </div>
                `;
                
                $('h5:contains("Your Saved Addresses")').before(newAddressFormHTML);
        

                
                //     $('.select2-dropdown').css({
                //     'pointer-events': 'auto',
                //     'z-index': 99999
                // });
                // Initialize Select2 for country/state/district
                $.fn.modal.Constructor.prototype.enforceFocus = function () {};
                $('#countrys').select2({
                    dropdownParent: $('#changeAddressModal'),
                    width: '100%',
                    placeholder: 'Select Country',
                    minimumResultsForSearch: 0, // ✅ enable search
                    ajax: {
                        url: 'controller/orders_controller.php',
                        type: 'POST',
                        dataType: 'json',
                        delay: 250,
                        data: function(params) {
                            return { action: 'country_list' };
                        },
                        processResults: function(data) {
                            return { results: data.data || [] };
                        },
                        cache: true
                    }
                });
        
                $('#countrys').on('change', function() {
                    var countryId = $(this).val();

                    $('#states').val(null).trigger('change');

                    $.ajax({
                        url: 'controller/orders_controller.php',
                        type: 'POST',
                        dataType: 'json',
                        data: {
                            action: 'state_list',
                            country_id: countryId
                        },
                        success: function(response) {

                            let stateData = response.data || [];

                            // ✅ destroy select2 safely
                            if ($('#states').hasClass("select2-hidden-accessible")) {
                                $('#states').select2('destroy');
                            }

                            // ✅ clear old options completely
                            $('#states').empty();

                            // check if no states
                            if (!stateData || stateData.length === 0) {
                                $('#state_session').hide();
                                return;
                            }

                            $('#state_session').show();

                            // ✅ add fresh options manually
                            stateData.forEach(function(item) {
                                $('#states').append(
                                    new Option(item.text, item.id, false, false)
                                );
                            });

                            // ✅ reinitialize select2
                            $('#states').select2({
                                dropdownParent: $('#changeAddressModal'),
                                width: '100%',
                                placeholder: 'Select State'
                            });
                        }
                    });
                });
                            
                $('#states').on('change', function() {
                    var stateId = $(this).val();
                    $('#districts').val(null).trigger('change');
                    $('#districts').select2({
                        dropdownParent: $('#changeAddressModal'),
                        width: '100%',
                        placeholder: 'Select District',
                        ajax: {
                            url: 'controller/orders_controller.php',
                            type: 'POST',
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    action: 'district_list',
                                    state_id: stateId
                                };
                            },
                            processResults: function(data) {
                                return { results: data.data || [] };
                            },
                            cache: true
                        }
                    });
                });
        
                $('#states, #districts').select2({
                    dropdownParent: $('#changeAddressModal'),
                    width: '100%'
                });
            });
        
            $(document).on('click', '.cancel-new-address', function() {
                $('.new-address-form-card').remove();
                $('.add-new-address-card').show();
            });
        
            $(document).on('submit', '#inlineAddressForm', function(e) {
                // alert("clicked");
                e.preventDefault();
                var email = $('#email').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                // if (!/^[^\s@]+@[^\s@]+\.[^\s@]+$/.test(email)) {
                //     //  setupDropdown('dropdownContent', 'error', svgError + 'Please enter a valid email address', 'click');
                //     alert("Please enter a valid email address");
                //     return false;
                // }
                
                var countryValue = $('#countrys').val();

                if (!countryValue) {
                    setupDropdown('dropdownContent', 'error', svgError + 'Please choose a Country', 'click');
                    // alert("Please enter a valid country");
                    return false;
                }

                var formData = {
                    action: 'save_address',
                    customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>,
                    fullname: $('#fullname').val(),
                    permanentadd: $('#permanentadd').val(),
                    streets: $('#streets').val(),
                    pocode: $('#pocode').val(),
                    // districts: $('#districts').select2('data')[0]?.text || '',
                    states: $('#states').hasClass("select2-hidden-accessible")
                    ? $('#states').select2('data')[0]?.text || ''
                    : $('#states option:selected').text() || '',
                    // districts: $('#districtss').val() || '',
                    // states: $('#states').val() || '',
                    countrys: $('#countrys').select2('data')[0]?.text || '',
                    mobiles: $('#mobiles').val(),
                    whatsappnos: $('#whatsappnos').val(),
                    emails: $('#email').val()
                };
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: formData,
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.status === 'success') {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Shipping Address Saved successfully', 'click');
                            $('.new-address-form-card').remove();
                            $('.add-new-address-card').show();
                            loadCustomerAddresses();
                        } else {
                            setupDropdown('dropdownContent', 'error', svgError + (response.message || 'Failed to save address'), 'click');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.log("Raw response:", xhr.responseText);
                        setupDropdown('dropdownContent', 'error', svgError + 'Error saving address. Please try again.', 'click');
                        $('.new-address-form-card').remove();
                        $('.add-new-address-card').show();
                        loadCustomerAddresses();
                    }
                });
            });
        
            function renderAddressCards(addresses) {
                const container = $('#addressContainer');
                container.empty();
                if (!addresses || addresses.length === 0) {
                    container.html('<div class="col-12"><p class="text-muted">No saved addresses found.</p></div>');
                    return;
                }
                addresses.forEach((address, index) => {
                    const isDefault = address.status === "true";
                    const badgeClass = isDefault ? 'badge-primary' : 'badge-light text-muted';
                    const badgeText = isDefault ? 'Default' : (address.address_type || 'Address');
                    const buttonClass = isDefault ? 'btn-primary disabled' : 'btn-outline-primary';
                    const buttonIcon = isDefault ? 'fa-check-circle' : 'fa-map-marker-alt';
                    const buttonText = isDefault ? 'Currently Selected' : 'Use';
                    const addressCard = `
                        <div class="col-md-6 mb-4">
                            <div class="card h-100 ${isDefault ? 'border-primary' : ''} shadow-sm">
                                <div class="card-body">
                                    <input type="hidden" class="address-id" value="${address.ids}">
                                    <div class="d-flex justify-content-between align-items-start mb-2">
                                        <span class="badge ${badgeClass}">${badgeText}</span>
                                        <button class="btn btn-sm btn-outline-danger delete-address-btn" data-id="${address.ids}">
                                            <i class="fas fa-trash-alt"></i> Delete
                                        </button>
                                    </div>
                                    <h5 class="card-title mt-1">${address.customer_name}</h5>
                                    <p class="card-text mb-2">
                                        ${address.shipping_address}<br>
                                        ${address.street ? address.street + '<br>' : ''}
                                        ${address.district ? address.district + '<br>' : ''}
                                        ${address.state}, ${address.postal_code}<br>
                                        ${address.country}
                                    </p>
                                    <p class="card-text">
                                        <small class="text-muted">
                                            <i class="fas fa-phone-alt mr-1"></i> ${address.mobile_no}<br>
                                            ${address.whatsapp_no ? '<i class="fas fa-phone-alt mr-1"></i> ' + address.whatsapp_no + '<br>' : ''}
                                            ${address.email_address ? '<i class="fas fa-envelope mr-1"></i> ' + address.email_address + '<br>' : ''}
                                        </small>
                                    </p>
                                    <button class="btn ${buttonClass} btn-block mt-3 ${isDefault ? 'selected-address-btn' : 'select-address-btn'}" 
                                        data-id="${address.ids}" ${isDefault ? 'disabled' : ''}>
                                        <i class="fas ${buttonIcon} mr-2"></i> ${buttonText}
                                    </button>
                                </div>
                            </div>
                        </div>
                    `;
                    container.append(addressCard);
                });
            }
        
            function loadCustomerAddresses() {
                console.log("Reloading address list...");
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'customer_shipping_details', customer_id: <?php echo $_SESSION['ids']; ?> },
                    dataType: 'json',
                    success: function(response) {
                        const addresses = Array.isArray(response) ? response : (response.data || []);
                        renderAddressCards(addresses);
                    },
                    error: function(xhr, status, error) {
                        console.error("Error loading addresses:", error);
                        setupDropdown('dropdownContent', 'error', svgError + 'Error loading addresses', 'click');
                    }
                });
            }
        
            $(document).on('click', '.select-address-btn', function() {
                const addressId = $(this).data('id') || $(this).closest('.card-body').find('.address-id').val();
                console.log('Selected address ID:', addressId);
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: { action: 'get_single_address', address_id: addressId },
                    dataType: 'json',
                    success: function(response) {
                        if (response && response.data && response.data.length > 0) {
                            const address = response.data[0];
                            $('#funame').val(address.customer_name || '');
                            $('#paddress').val(address.shipping_address || '');
                            $('#street').val(address.street || '');
                            $('#postalcode').val(address.postal_code || '');
                            $('#country').val(address.country || '');
                            $('#state').val(address.state || '');
                            $('#district').val(address.district || '');
                            $('#mobile').val(address.mobile_no || '');
                            $('#wmobile').val(address.whatsapp_no || '');
                            // $('#email').val(address.email_address || '');
                            $('#changeAddressModal').modal('hide');
                        } else {
                            console.error('Invalid address data format:', response);
                            alert('Error: Could not load address details');
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('AJAX Error:', status, error);
                        alert('Error fetching address details. Please try again.');
                    }
                });
            });
        
            $(document).on('click', '.delete-address-btn', function() {
                const addressId = $(this).data('id');
                if (confirm('Are you sure you want to delete this address?')) {
                    $.ajax({
                        url: 'controller/orders_controller.php',
                        type: 'POST',
                        data: { action: 'delete_address', address_id: addressId },
                        dataType: 'json',
                        success: function(response) {
                            if (response === 1 || response.status === 'success') {
                                loadCustomerAddresses();
                            } else {
                                alert('Error deleting address: ' + (response.message || 'Unknown error'));
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('AJAX Error:', status, error);
                            alert('Error deleting address. Please try again.');
                        }
                    });
                }
            });
        
            // =======================
            //  Order Submission
            // =======================
            function checkSubmitButton() {
                const termsChecked = $('#terms-checkbox').is(':checked');
                // const codChecked = $('#cod-checkbox').is(':checked');
                $('#submit-order-btn').prop('disabled', !(termsChecked));
            }
              
            $('#terms-checkbox, #cod-checkbox').on('change', function() {
                checkSubmitButton();
            });
        
            $('#privacyPolicyModal').on('hidden.bs.modal', function() {
                checkSubmitButton();
            });
            // Promo Code Validation Function
            function validatePromoCode(code, subtotal, checkOffers = true) {
                return new Promise((resolve, reject) => {
                    // First check if there are any offered products in the cart
                    if (checkOffers) {
                        const hasOfferedProducts = checkForExistingOffers();
                        
                        if (hasOfferedProducts.hasOffer) {
                            reject({
                                message: 'This promo code cannot be applied to products that already have offers. Please remove offered items to use this promo code.',
                                type: 'offer_conflict',
                                offeredProducts: hasOfferedProducts.products
                            });
                            return;
                        }
                    }
                    
                    // Proceed with server validation
                    $.ajax({
                        url: 'controller/orders_controller.php',
                        type: 'POST',
                        data: {
                            action: 'validate_promo_code',
                            promo_code: code,
                            subtotal: subtotal,
                            customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>
                        },
                        dataType: 'json',
                        success: function(response) {
                            console.log('Promo validation response:', response);
                            if (response.valid) {
                                resolve(response);
                            } else {
                                reject({
                                    message: response.message || 'Invalid promo code',
                                    type: 'invalid'
                                });
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error('Promo validation error:', error);
                            reject({
                                message: 'Error validating promo code. Please try again.',
                                type: 'error'
                            });
                        }
                    });
                });
            }
            
            function checkForExistingOffers() {
                const flag = <?php echo isset($flag) ? $flag : 0; ?>;
                const result = {
                    hasOffer: false,
                    products: []
                };
                
                if (flag == '1') {
                    // CART MODE - Check all cart items
                    const cartItems = $('#selected-cart-items').val();
                    if (cartItems) {
                        const items = cartItems.split(';;').filter(item => item.trim() !== '');
                        
                        items.forEach(item => {
                            const parts = item.split('||');
                            
                            // Get the three price types
                            const amountMrp = parseFloat(parts[7] || '0');      // amount_mrp at index 7
                            const amountSelling = parseFloat(parts[1] || '0');   // amount_selling at index 1
                            const amountOffer = parseFloat(parts[8] || '0');     // amount_offer at index 8
                            
                            const name = parts[0] || 'Unknown Product';
                            const arabic_name = parts[10] || '';
                            
                            // CORRECT CHECK: If amount_offer exists and is > 0, product HAS an offer
                            if (amountOffer && amountOffer > 0) {
                                result.hasOffer = true;
                                result.products.push({
                                    name: getLocalized(name, arabic_name),
                                    mrp: amountMrp,
                                    selling: amountSelling,
                                    offer: amountOffer,
                                    savings: amountOffer < amountSelling ? (amountSelling - amountOffer) : 0
                                });
                            }
                        });
                    }
                } else {
                    // SINGLE PRODUCT MODE - Need to check if product has amount_offer > 0
                    // For single product, we need to check the product data from response
                    // Since we don't have direct access here, we can check the displayed price
                    
                    // Look for any visual indicator that this is an offer product
                    const hasOfferBadge = $('.badge.bg-danger').length > 0; // Discount badge
                    const priceElement = $('.price').first();
                    const originalPriceElement = $('.original-price').first();
                    
                    // Check if there's an amount_offer > 0 in the displayed data
                    // This is less reliable - better to store the product data
                    const productData = $('.order-detail').data('product');
                    
                    if (productData && productData.amount_offer && productData.amount_offer > 0) {
                        result.hasOffer = true;
                        result.products.push({
                            name: productData.name || 'This product',
                            offer: productData.amount_offer,
                            selling: productData.amount_selling,
                            mrp: productData.amount_mrp
                        });
                    }
                }
                
                return result;
            }
            
            // Promo Code Apply Button Handler
            $('#apply-discount').click(function() {
                const promoCode = $('#discount-code').val().trim();
                
                if (!promoCode) {
                    showNotification('Please enter a promo code', 'error');
                    return;
                }
                
                // Get current subtotal
                const subtotalText = $('#sub-total').text();
                const subtotal = parseFloat(subtotalText.replace(/[^0-9.-]+/g, '')) || 0;
                
                // Show loading state
                $(this).prop('disabled', true).html('<span class="spinner-border spinner-border-sm" role="status" aria-hidden="true"></span> Applying...');
                
                // CORRECT CHECK: Check if any product has amount_offer > 0
                const hasOfferedProducts = checkForExistingOffers();
                
                if (hasOfferedProducts.hasOffer) {
                    // Block promo code application and show details
                    let productList = '';
                    hasOfferedProducts.products.forEach((product, index) => {
                        const savingAmount = product.offer < product.selling ? 
                            (product.selling - product.offer) : 0;
                        
                        productList += `\n  ${index + 1}. ${product.name} `;
                        if (savingAmount > 0) {
                            productList += `(Offer: ${formatPrice(product.offer)} - Saves ${formatPrice(savingAmount)})`;
                        } else {
                            productList += `(Special offer: ${formatPrice(product.offer)})`;
                        }
                    });
                    
                    const message = `⚠️ Promo codes cannot be applied to products that already have special offers.\n\nOffered products:${productList}\n\nPlease remove these items to use promo code "${promoCode}".`;
                    
                    // Show enhanced notification
                    showNotificationWithDetails(message, 'warning', hasOfferedProducts.products);
                    
                    // Reset button
                    $('#apply-discount').prop('disabled', false).html('Apply');
                    
                    // Remove any existing promo data
                    $('.order-detail').removeData('promo');
                    $('#promo-code-hidden, #promo-discount-hidden').remove();
                    
                    // Highlight offered items visually
                    // highlightOfferedItems();
                    
                    return; // STOP HERE
                }
                
                // No products with amount_offer > 0, proceed with validation
                validatePromoCode(promoCode, subtotal, false)
                    .then((response) => {
                        // Apply promo code...
                        console.log('Promo code valid:', response);
                        
                        // Store promo data
                        $('.order-detail').data('promo', {
                            code: promoCode,
                            discount: response.discount_amount,
                            percentage: response.offer_percentage
                        });
                        
                        // Recalculate totals with promo
                        updateTotalsWithPromo();
                        
                        // Show success message
                        showNotification(`✅ Promo code applied! You saved ${formatPrice(response.discount_amount)}`, 'success');
                        
                        // Store promo code in hidden fields
                        $('#promo-code-hidden, #promo-discount-hidden').remove();
                        
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'promo-code-hidden',
                            name: 'promo_code',
                            value: promoCode
                        }).appendTo('.order-detail');
                        
                        $('<input>').attr({
                            type: 'hidden',
                            id: 'promo-discount-hidden',
                            name: 'promo_discount',
                            value: response.discount_amount
                        }).appendTo('.order-detail');
                        
                        // Clear input
                        $('#discount-code').val('');
                        
                        // Mark promo-eligible items
                        markPromoEligibleItems();
                    })
                    .catch((error) => {
                        console.error('Promo code error:', error);
                        showNotification(error.message || 'Invalid promo code', 'error');
                        
                        // Remove any existing promo data
                        $('.order-detail').removeData('promo');
                        $('#promo-code-hidden, #promo-discount-hidden').remove();
                        
                        // Recalculate without promo
                        updateTotalsWithPromo();
                    })
                    .finally(() => {
                        $('#apply-discount').prop('disabled', false).html('Apply');
                    });
            });
            
            // Function to update totals with promo discount
            function updateTotalsWithPromo() {
                const promo = $('.order-detail').data('promo');
                const subtotalText = $('#sub-total').text();
                const subtotal = parseFloat(subtotalText.replace(/[^0-9.-]+/g, '')) || 0;
                
                // Calculate tax and COD from existing rows
                let taxTotal = 0;
                let codTotal = 0;
                
                $('.tax .price').each(function() {
                    taxTotal += parseFloat($(this).text().replace(/[^0-9.-]+/g, '')) || 0;
                });
                
                $('.cod-fee .price').each(function() {
                    codTotal += parseFloat($(this).text().replace(/[^0-9.-]+/g, '')) || 0;
                });
                
                console.log('Updating totals with promo:', promo, 'Subtotal:', subtotal, 'Tax:', taxTotal, 'COD:', codTotal);
                
                // Remove existing promo row
                $('.promo-discount-row').remove();
                
                if (promo && promo.discount > 0) {
                    // Add promo discount row before total
                    $('.total').before(`
                        <tr class="promo-discount-row text-success">
                            <td>Promo Discount (${promo.percentage}%)</td>
                            <td class="price">-${formatPrice(promo.discount)}</td>
                        </tr>
                    `);
                    
                    // Calculate grand total with promo
                    const grandTotal = subtotal + taxTotal + codTotal - promo.discount;
                    $('#grand-total').text(formatPrice(Math.max(0, grandTotal)));
                    $('#final-total').text(formatPrice(Math.max(0, grandTotal)));
                    
                    console.log('Grand total with promo:', grandTotal);
                } else {
                    // Calculate without promo
                    const grandTotal = subtotal + taxTotal + codTotal;
                    $('#grand-total').text(formatPrice(grandTotal));
                    $('#final-total').text(formatPrice(grandTotal));
                    console.log('Grand total without promo:', grandTotal);
                }
            }


           $('#submit-order-btn').click(function(e) {
                e.preventDefault();
                
                console.group('===== ORDER SUBMISSION DEBUG =====');
                console.log('Submit button clicked at:', new Date().toISOString());
                
                // Show spinner
                $('#orderSpinner').fadeIn(300);
                
                // Collect all form data for validation
                const formData = {
                    email: $('#email').val(),
                    funame: $('#funame').val(),
                    paddress: $('#paddress').val(),
                    street: $('#street').val(),
                    postalcode: $('#postalcode').val(),
                    state: $('#state').val(),
                    country: $('#country').val(),
                    district: $('#district').val(),
                    mobile: $('#mobile').val(),
                    vendor_id: $('#vendor-id').val(),
                    quantity: $('#quantity-input').val(),
                    color: $('input[name="product_color"]:checked').val(),
                    size: $('input[name="product_size"]:checked').val(),
                    comments: $('#comments').val(),
                    selectedProductId: $('#selected-product-id').val(),
                    selectedCartItems: $('#selected-cart-items').val()
                };
                
                // Log PHP variables
                const phpVars = {
                    quantity: "<?php echo $quantity; ?>",
                    flag: <?php echo isset($flag) ? $flag : 0; ?>,
                    color: "<?php echo $color; ?>",
                    size: "<?php echo $size; ?>",
                    length: "<?php echo $length; ?>",
                    notes: "<?php echo $notes; ?>"
                };
                
                console.log('PHP Variables:', phpVars);
                console.log('Form Data Collected:', formData);
                
                // Validate email
                var email = $('#email').val();
                var emailRegex = /^[^\s@]+@[^\s@]+\.[^\s@]+$/;
                
                if (!emailRegex.test(email)) {
                    console.warn('VALIDATION ERROR: Invalid email address:', email);
                    $('#orderSpinner').fadeOut(300);
                    setupDropdown('dropdownContent', 'error', svgError + 'Please enter a valid email address', 'click');
                    console.groupEnd();
                    return false;
                } else {
                    console.log('Email validation passed:', email);
                }
                
                const urlQuantity = "<?php echo $quantity; ?>";
                const flag = <?php echo isset($flag) ? $flag : 0; ?>;
                console.log('Flag value:', flag, '(1 = cart checkout, 0 = single product)');
                
                const quantity = $('#quantity-input').val() || urlQuantity || 1;
                const color = $('input[name="product_color"]:checked').val() || "<?php echo $color; ?>" || '';
                const size =  "<?php echo $size; ?>" || '';
                const length = "<?php echo $length; ?>" || '';
                const notes = "<?php echo $notes; ?>" || '';
                const comments = $('#comments').val();
                
                console.log('Final values being used:', {
                    quantity: quantity,
                    color: color,
                    size: size,
                    length: length,
                    notes: notes,
                    comments: comments
                });
                
                // Check for missing data
                const requiredFields = [
                    { name: 'Full Name', value: $('#funame').val(), field: 'funame' },
                    { name: 'Address', value: $('#paddress').val(), field: 'paddress' },
                    { name: 'Street', value: $('#street').val(), field: 'street' },
                    { name: 'Postal Code', value: $('#postalcode').val(), field: 'postalcode' },
                    { name: 'State', value: $('#state').val(), field: 'state' },
                    { name: 'Country', value: $('#country').val(), field: 'country' },
                    { name: 'District', value: $('#district').val(), field: 'district' },
                    { name: 'Mobile', value: $('#mobile').val(), field: 'mobile' },
                    { name: 'Email', value: $('#email').val(), field: 'email' },
                    { name: 'Vendor ID', value: $('#vendor-id').val(), field: 'vendor_id' }
                ];
                
                console.group('Field Validation Check:');
                requiredFields.forEach(field => {
                    if (!field.value || field.value.trim() === '') {
                        console.warn(`MISSING FIELD: ${field.name} (${field.field}) is empty`);
                    } else {
                        console.log(`✓ ${field.name}:`, field.value);
                    }
                });
                console.groupEnd();
                
                // Check for promo code and discount
                const promoCode = $('#promo-code-hidden').val();
                const promoDiscount = $('#promo-discount-hidden').val();
                
                if (promoCode && promoDiscount) {
                    console.log('✅ Promo code detected:', promoCode, 'with discount:', promoDiscount);
                } else {
                    console.log('ℹ️ No promo code applied');
                }
                
                const orderData = {
                    action: 'submit_order',
                    flag: flag,
                    v_fuName: $('#funame').val(),
                    v_paddress: $('#paddress').val(),
                    v_street: $('#street').val(),
                    v_postalcode: $('#postalcode').val(),
                    v_state: $('#state').val(),
                    v_country: $('#country').val(),
                    v_district: $('#district').val(),
                    v_mobile: $('#mobile').val(),
                    v_email: $('#email').val(),
                    vendor_id: $('#vendor-id').val()
                };
                
                // Add promo code and discount if they exist
                if (promoCode && promoDiscount) {
                    orderData.promo_code = promoCode;
                    orderData.promo_discount = promoDiscount;
                    console.log('Adding promo data to orderData:', { promo_code: promoCode, promo_discount: promoDiscount });
                }
                
                if (flag == '1') {
                    console.log('Processing CART CHECKOUT');
                    const cartItems = $('#selected-cart-items').val();
                    console.log('Cart items raw value:', cartItems);
                    
                    if (!cartItems) {
                        console.error('CRITICAL: No cart items found!');
                        $('#orderSpinner').fadeOut(300);
                        alert('No cart items found.');
                        console.groupEnd();
                        return;
                    }
                    
                    // Parse and validate cart items
                    const cartItemsArray = cartItems.split(';;').filter(item => item.trim() !== '');
                    console.log(`Cart items count: ${cartItemsArray.length}`);
                    
                    if (cartItemsArray.length === 0) {
                        console.warn('Cart items array is empty after parsing');
                    } else {
                        console.group('Cart Items Details:');
                        cartItemsArray.forEach((item, index) => {
                            const parts = item.split('||');
                            console.log(`Item ${index + 1}:`, {
                                name: parts[0] || 'MISSING',
                                arabic_name: parts[10] || 'MISSING',
                                price: parts[1] || 'MISSING',
                                quantity: parts[2] || 'MISSING',
                                color: parts[5] || 'MISSING',
                                size: parts[6] || 'MISSING',
                                length: parts[14] || 'MISSING',
                                raw: item
                            });
                        });
                        console.groupEnd();
                    }
                    
                    orderData.cart_items = cartItems;
                } else {
                    console.log('Processing SINGLE PRODUCT checkout');
                    const productId = $('#selected-product-id').val();
                    console.log('Product ID:', productId);
                    
                    if (!productId) {
                        console.warn('Product ID is missing');
                    }
                    
                    orderData.product_id = productId;
                    orderData.quantity = quantity;
                    orderData.color = color;
                    orderData.size = size;
                    orderData.length = length;
                    orderData.notes = notes;
                    orderData.comments = comments;
                }
                
                console.log('Final orderData being sent:', JSON.stringify(orderData, null, 2));
                
                // Check for any undefined or null values in orderData
                console.group('Data Sanity Check:');
                Object.entries(orderData).forEach(([key, value]) => {
                    if (value === undefined || value === null) {
                        console.warn(`UNDEFINED VALUE: ${key} is ${value}`);
                    } else if (value === '') {
                        console.warn(`EMPTY VALUE: ${key} is empty string`);
                    }
                });
                console.groupEnd();
                
                console.log('Sending AJAX request to controller/orders_controller.php');
                
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: orderData,
                    dataType: 'json',
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function(response) {
                        console.log('AJAX SUCCESS - Response received:', response);
                        
                        // Hide spinner
                        $('#orderSpinner').fadeOut(300);
                        
                        if (response && response.status === 'success') {
                            console.log('✅ Order placed successfully! Order ID:', response.order_id);
                            console.log('Full success response:', response);
                            
                            // If Payment Gateway URL is provided, redirect customer to complete payment
                            if (response.payment_url) {
                                console.log('Redirecting to Payment Gateway:', response.payment_url);
                                window.location.href = response.payment_url;
                                return;
                            }
                            
                            // Show small toast/success message
                            setupDropdown('dropdownContent', 'success', 
                                svgSuccess + 'Order placed successfully! Order ID: ' + response.order_id, 
                                'click'
                            );
                    
                            // Prepare WhatsApp message & phone number
                            //const vendorWhatsappNumber = "97336533695";
                           
                             const vendorWhatsappNumber =response.vendor_whatsapp;
                              console.log("vendorWhatsappNumber"+vendorWhatsappNumber);
                            let waLink = '#';
            
                            if (vendorWhatsappNumber && vendorWhatsappNumber.length >= 8) {
                                console.log('Preparing WhatsApp message for vendor:', vendorWhatsappNumber);
                                let message = `🛒 New Order Received – #${response.order_id} 🛒\n\n`;
                                message += `Hello Darjana team,\n\n`;
                                message += `A customer has just placed an order. Please find the details below:\n\n`;
                                message += `Order ID : ${response.order_id}\n`;
                                message += `Order Date : ${new Date().toLocaleString('en-IN', { 
                                    timeZone: 'Asia/Bahrain',day: '2-digit', month: 'short', year: 'numeric', hour: '2-digit', minute: '2-digit' 
                                })}\n\n`;
                            
                                message += `Customer Name : ${$('#funame').val() || 'Not provided'}\n`;
                                message += `Phone : ${$('#mobile').val() || $('#wmobile').val() || 'Not provided'}\n`;
                                message += `Email : ${$('#email').val() || 'Not provided'}\n\n`;
                                
                                // Add promo code info to WhatsApp message if applied
                                if (promoCode && promoDiscount) {
                                    message += `Promo Code : ${promoCode}\n`;
                                    message += `Discount Applied : ${formatPrice(parseFloat(promoDiscount))}\n\n`;
                                }
                            
                                if (flag == '1') {
                                    const cartString = $('#selected-cart-items').val() || '';
                                    const cartItems = cartString.split(';;').filter(item => item.trim() !== '');
                                    
                                    if (cartItems.length > 0) {
                                        message += `${getLocalized('Items', 'المنتجات')} (${cartItems.length} ${getLocalized('products', 'منتجات')}):\n`;
                                        
                                        cartItems.forEach((item, index) => {
                                            const parts = item.split('||');
                                            const name = parts[0]?.trim() || 'Unknown Product';
                                            const arabic_name = parts[10]?.trim() || '';
                                            const price = parts[1] || '0';
                                            const qty = parts[2] || '1';
                                            const color = parts[5]?.trim() && parts[5] !== 'undefined' ? parts[5].trim() : '';
                                            const size = parts[6]?.trim() && parts[6] !== 'undefined' ? parts[6].trim() : '';
                                            
                                            const displayName = getLocalized(name, arabic_name);
                                            
                                            let line = `  ${index+1}. ${qty} × ${displayName}`;
                                            if (color || size) {
                                                line += ' (';
                                                if (color) line += getLocalized('Color', 'اللون') + ': ' + color;
                                                if (color && size) line += ', ';
                                                if (size) line += getLocalized('Size', 'الحجم') + ': ' + size;
                                                line += ')';
                                            }
                                            message += line + '\n';
                                        });
                                        message += '\n';
                                    } else {
                                        message += `${getLocalized('Items', 'المنتجات')} : ${getLocalized('Cart items not available in summary', 'عناصر السلة غير متاحة في الملخص')}\n\n`;
                                    }
                                }
                            
                                const addressPreview = [
                                    $('#paddress').val(),
                                    $('#street').val(),
                                    $('#district').val(),
                                    $('#state').val() + ' ' + $('#postalcode').val()
                                ].filter(Boolean).join(', ').substring(0, 180);
                            
                                if (addressPreview) {
                                    message += `Delivery Address :\n${addressPreview}\n\n`;
                                }
                            
                                message += `Please process this order at your earliest convenience.\n`;
                                message += `Thank you!\n\n`;
                                message += `— Sent from Darjana website`;
                            
                                waLink = `https://wa.me/${vendorWhatsappNumber}?text=${encodeURIComponent(message)}`;
                                console.log('WhatsApp link created:', waLink);
                            } else {
                                console.warn('Vendor WhatsApp number is invalid or too short:', vendorWhatsappNumber);
                            }
                    
                            // Show WhatsApp confirmation modal
                            const modal = $('#whatsappConfirmModal');
                            const sendBtn = $('#sendWhatsAppBtn');
            
                            if (vendorWhatsappNumber && vendorWhatsappNumber.length >= 8) {
                                sendBtn.attr('href', waLink)
                                       .removeClass('disabled')
                                       .prop('disabled', false)
                                       .html('<i class="fab fa-whatsapp me-2"></i> Send Order Details to Vendor');
                                console.log('WhatsApp button enabled');
                            } else {
                                sendBtn.addClass('disabled')
                                       .prop('disabled', true)
                                       .html('<i class="fas fa-exclamation-triangle me-2"></i> Vendor contact unavailable');
                                console.warn('WhatsApp button disabled due to invalid vendor number');
                            }
            
                            modal.modal('show');
                            console.log('WhatsApp confirmation modal shown');
            
                            // Close modal when clicking the send button
                            $('#sendWhatsAppBtn').on('click', function(e) {
                                console.log('Send WhatsApp button clicked');
                                $('#whatsappConfirmModal').modal('hide');
                            });
            
                            // Redirect to confirmation page after modal is closed
                            modal.one('hidden.bs.modal', function () {
                                console.log('Modal hidden, redirecting to OrderConfirmation with order_id:', response.order_id);
                                window.location.href = '/OrderConfirmation?order_id=' + response.order_id;
                            });
                        } 
                        else {
                            // error case
                            console.error('❌ Order submission failed:', response);
                            console.error('Error message:', response?.message || 'Unknown error occurred');
                            setupDropdown('dropdownContent', 'error', svgError + (response.message || 'Unknown error occurred'), 'click');
                        }
                        console.groupEnd();
                    },
                    error: function(xhr, status, error) {
                        console.error('🚨 AJAX ERROR!');
                        console.error('Status:', status);
                        console.error('Error:', error);
                        console.error('Response Text:', xhr.responseText);
                        console.error('Status Code:', xhr.status);
                        console.error('Response Headers:', xhr.getAllResponseHeaders());
                        
                        // Hide spinner on error
                        $('#orderSpinner').fadeOut(300);
                        
                        try {
                            var response = JSON.parse(xhr.responseText);
                            console.error('Parsed error response:', response);
                            alert('Error: ' + (response.message || 'Unknown error occurred'));
                        } catch (e) {
                            console.error('Failed to parse error response as JSON:', e);
                            alert('Error submitting order. Please try again.');
                        }
                        console.error('AJAX Error:', status, error, xhr.responseText);
                        console.groupEnd();
                    }
                });
            });
        
            // =======================
            //  Final Notification Helper
            // =======================
            function setupDropdown(containerId, type, message, trigger) {
                const container = $('#' + containerId);
                const alertClass = type === 'success' ? 'alert-success' : 'alert-danger';
                const dropdownHTML = `
                    <div class="alert ${alertClass} alert-dismissible fade show" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                container.html(dropdownHTML);
                setTimeout(() => {
                    container.find('.alert').alert('close');
                }, 5000);
            }

            $('#new-countrys').on('change', function() {
                loadstateDropdown();
            });
        });

        function loadcountryDropdown(selectedCountry) {
            console.log("Loading countries, selecting:", selectedCountry);
            $.ajax({
                url: "../controller/registration_controller.php",
                type: "POST",
                data: { action: "get_country" },
                success: function(response) {
                    try {
                        $('#new-countrys').html(response);
                                
                        // If we have a country to select, try to find it
                        if (selectedCountry) {
                            setDropdownSelection('#new-countrys', selectedCountry);
                            // After country is set, load states
                            loadstateDropdown(selectedState);
                        }
                        } catch (e) {
                            console.error("Error processing countries:", e);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error loading countries:", status, error);
                        $('#country').html('<option value="">Error loading countries</option>');
                    }
                });
            }

            function loadstateDropdown(selectedState) {
                // alert($('#new-countrys option:selected').val());
                console.log("Loading states for country:", $('#new-countrys').val(), "selecting:", selectedState);
                $.ajax({
                    url: "../controller/registration_controller.php",
                    type: "POST",
                    data: { 
                        action: "get_state",
                        country_id: $('#new-countrys option:selected').val() // Pass the selected country ID
                    },
                    success: function(response) {
                        $('#new-states').html(response);

                        let optionCount = $('#new-states option').length;

                        if (optionCount <= 1) {
                            // Hide and remove required
                            $('#new-states').prop('required', false);
                            $('#new-states').closest('.form-group, .col, div').hide();
                        } else {
                            // Show and make required
                            $('#new-states').prop('required', true);
                            $('#new-states').closest('.form-group, .col, div').show();
                        }

                        if (selectedState && optionCount > 1) {
                            setDropdownSelection('#new-states', selectedState);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error("AJAX error loading states:", status, error);
                        $('#state').html('<option value="">Error loading states</option>');
                    }
                });
            }
    </script>
</body>
</html>