<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <style>
    /* Apply Montserrat font to all text elements */
    body,
    h1, h2, h3, h4, h5, h6,
    p, span, div,
    .title, .product-name, .btn, .price,
    .modal-content, .navbar-nav, .badge,
    .form-label, .para-text, .size-label,
    .color-label, .form-select,
    .check-tbl th, .check-tbl td,
    .total .price, .save-text,
    .product-meta, .current-prices,
    .original-price, .product-item-totle {
        font-family: "Montserrat", sans-serif !important;
        text-transform: uppercase !important;
        letter-spacing: 0.5px !important;
    }

    /* Modal specific */
    .modal-content,
    .modal-actions button {
        font-family: "Montserrat", sans-serif !important;
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

    /* Price styling */
    .price-num,
    .current-prices,
    .product-item-totle {
        font-weight: 600 !important;
    }

    /* Buttons */
    .btn {
        font-weight: 500 !important;
        letter-spacing: 1px !important;
    }

    /* Product title */
    h1.title,
    .product-item-name h6 {
        letter-spacing: 1px !important;
        font-weight: 600 !important;
    }

    /* Table headers */
    .check-tbl th {
        letter-spacing: 1px !important;
        font-weight: 600 !important;
    }

    /* Cart count */
    .cart-count {
        font-family: "Montserrat", sans-serif !important;
        font-weight: 600 !important;
    }

    /* Mobile responsive */
    @media (max-width: 768px) {
        body,
        h1.title,
        .btn,
        .price,
        .product-item-name h6 {
            font-size: 0.9em !important;
        }
    }
    .modal {
        position: fixed;
        z-index: 9999;
        left: 0;
        top: 0;
        width: 100%;
        height: 100%;
        overflow: auto;
        background-color: rgba(0, 0, 0, 0.4);
    }

    .modal-content {
        background-color: #fff;
        margin: 15% auto;
        padding: 20px;
        border-radius: 8px;
        width: 300px;
        text-align: center;
        position: relative;
    }

    .modal-actions button {
        margin: 10px;
        padding: 10px 20px;
    }

    .close {
        position: absolute;
        top: 5px;
        right: 10px;
        font-size: 20px;
        cursor: pointer;
    }

    .current-prices {
        text-decoration: none !important;
    }

    /* Desktop view table styles */
    .check-tbl {
        width: 100%;
        border-collapse: collapse;
    }

    .check-tbl thead {
        /*background-color: #f8f9fa;*/
    }

    .check-tbl th,
    .check-tbl td {
        padding: 15px;
        vertical-align: middle;
        text-align: left;
        border-bottom: 1px solid #eee;
    }

    .check-tbl th {
        font-weight: bold;
        text-transform: uppercase;
        font-size: 14px;
        /*color: #333;*/
    }

    /* Specific column widths for desktop view */
    .check-tbl .product-item-img {
        width: 12%;
        text-align: center;
    }

    .check-tbl .product-item-img img {
        max-width: 100px;
        height: auto;
    }

    .check-tbl .product-item-name {
        width: 38%;
    }

    .check-tbl .product-item-price {
        width: 15%;
        text-align: center;
    }

    .check-tbl .product-item-quantity {
        width: 15%;
        text-align: center;
    }

    .check-tbl .product-item-totle {
        width: 15%;
        text-align: right;
        font-weight: bold;
    }

    .check-tbl .product-item-close {
        width: 5%;
        text-align: center;
    }

    .check-tbl .product-item-name h6 {
        font-size: 16px;
        margin: 0 0 5px 0;
    }

    .check-tbl .product-meta {
        font-size: 13px;
        color: #666;
    }

    .check-tbl .product-item-price .original-price {
        font-size: 13px;
        color: #999;
        display: block;
    }

    .check-tbl .product-item-price .current-prices {
        font-weight: bold;
        font-size: 15px;
    }

    .check-tbl .quantity.btn-quantity.style-1 {
        display: inline-flex;
        align-items: center;
        max-width: 120px;
    }

    .check-tbl .quantity.btn-quantity.style-1 input {
        width: 60px;
        text-align: center;
        padding: 5px;
        height: 34px;
        font-size: 14px;
    }

    /* FIX: Make price and quantity in one row on desktop */
    @media (min-width: 768px) {
        .mobile-price-quantity-row {
            display: flex !important;
            align-items: center;
            justify-content: flex-start;
            gap: 25px;
            margin-top: 12px;
        }

        .mobile-price-quantity-row .product-item-price {
            min-width: 140px;
            text-align: left;
        }

        .mobile-price-quantity-row .product-item-quantity {
            margin-left: 0;
        }

        .quantity.btn-quantity.style-1 {
            margin: 0 !important;
        }
    }

    /* Mobile view styles */
    /* Mobile view styles - IMPROVED ALIGNMENT */
    @media (max-width: 767px) {
        .check-tbl,
        .check-tbl tbody,
        .check-tbl tr {
            display: block;
            width: 100%;
        }
    
        .check-tbl thead {
            display: none;
        }
    
        .check-tbl tbody tr {
            display: flex;
            flex-wrap: wrap;
            position: relative;
            padding: 12px 10px;
            margin-bottom: 15px;
            border: 1px solid #eee;
            border-radius: 8px;
            background: #fff;
        }
    
        .check-tbl .product-item-img {
            width: 30%;
            padding-right: 12px;
        }
    
        .check-tbl .product-item-img img {
            max-width: 90px;
            height: auto;
            border-radius: 4px;
        }
    
        .check-tbl .product-item-name {
            width: 70%;
            padding-left: 0;
            display: flex;
            flex-direction: column;
        }
    
        .check-tbl .product-item-name h6 {
            font-size: 15px;
            margin: 0 0 6px 0;
            line-height: 1.3;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
        }
    
        .check-tbl .product-meta {
            font-size: 12px;
            color: #666;
            margin-bottom: 8px;
        }
    
        /* ── IMPROVED: Price & Quantity Row ── */
        .mobile-price-quantity-row {
            display: flex;
            align-items: center;
            justify-content: space-between;
            gap: 12px;
            margin-top: 8px;
            width: 100%;
        }
    
        .mobile-price-quantity-row .product-item-price {
            flex: 1;
            display: flex;
            flex-direction: column;
            align-items: flex-start;
            font-size: 14px;
            line-height: 1.4;
        }
    
        /* Make sure symbol and price stay on same line */
        .mobile-price-quantity-row .product-item-price .original-price,
        .mobile-price-quantity-row .product-item-price .current-prices {
            display: inline-flex;
            align-items: center;
            gap: 6px;
            white-space: nowrap;
        }
    
        .mobile-price-quantity-row .product-item-price .original-price {
            font-size: 13px;
            color: #999;
            text-decoration: line-through;
        }
    
        .mobile-price-quantity-row .product-item-price .current-prices {
            font-weight: bold;
            font-size: 15px;
            color: #000;
        }
    
        .mobile-price-quantity-row .product-item-quantity {
            flex: 0 0 auto;
        }
    
        .mobile-price-quantity-row .quantity.btn-quantity.style-1 {
            max-width: 110px;
            margin: 0;
            background: #f8f9fa;
            border-radius: 6px;
            padding: 4px;
        }
    
        .mobile-price-quantity-row .quantity.btn-quantity.style-1 input {
            width: 50px;
            height: 32px;
            font-size: 14px;
            text-align: center;
            border: 1px solid #ddd;
            border-radius: 4px;
            background: white;
        }
    
        /* Total price at bottom */
        .check-tbl .product-item-totle {
            width: 100%;
            text-align: right;
            font-weight: bold;
            font-size: 15px;
            margin-top: 10px;
            padding-top: 8px;
            border-top: 1px dashed #eee;
        }
    
        .check-tbl .product-item-close {
            position: absolute;
            top: 8px;           /* Distance from top */
            right: 10px;        /* Distance from right */
            width: 28px;
            height: 28px;
            background: rgba(255, 255, 255, 0.9);
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            font-size: 16px;
            color: #999;
            z-index: 10;
            box-shadow: 0 2px 8px rgba(0,0,0,0.1);
            transition: all 0.2s ease;
            backdrop-filter: blur(4px);
            border: 1px solid #eee;
        }
    
        /* Hover/Tap effect - turns red */
        .check-tbl .product-item-close:hover,
        .check-tbl .product-item-close:active {
            color: #e74c3c !important;
            background: #ffebee;
            border-color: #ffcdd2;
            transform: scale(1.1);
        }
    
        /* Optional: Tiny pulse animation when tapped */
        .check-tbl .product-item-close:active {
            transform: scale(0.95);
        }
    }
    /* Customer description styling */
    .product-meta .customer-desc {
        margin-bottom: 6px;
        font-size: 12px;
        line-height: 1.4;
        color: #666;
        display: flex;
        flex-wrap: wrap;
        align-items: baseline;
        gap: 4px;
    }
    
    .product-meta .customer-desc .desc-label {
        font-weight: 600;
        min-width: 70px;
        color: #555;
    }
    
    .product-meta .customer-desc .desc-text {
        flex: 1;
        word-break: break-word;
        overflow-wrap: break-word;
        max-width: 100%;
    }
    
    /* Mobile responsive adjustments for description */
    @media (max-width: 767px) {
        .product-meta .customer-desc {
            flex-direction: column;
            gap: 2px;
            margin-bottom: 8px;
            background: #f8f9fa;
            padding: 8px;
            border-radius: 4px;
            border-left: 3px solid #ddd;
        }
        
        .product-meta .customer-desc .desc-label {
            min-width: auto;
            font-size: 11px;
            color: #888;
            text-transform: uppercase;
            letter-spacing: 0.5px;
        }
        
        .product-meta .customer-desc .desc-text {
            font-size: 13px;
            color: #333;
            line-height: 1.5;
            display: -webkit-box;
            -webkit-line-clamp: 3;
            -webkit-box-orient: vertical;
            overflow: hidden;
            text-overflow: ellipsis;
            max-height: 60px;
        }
        
        /* For very long descriptions, allow expansion on click/tap */
        .product-meta .customer-desc.expanded .desc-text {
            -webkit-line-clamp: unset;
            max-height: none;
        }
        
        /* Optional: Add a "show more" indicator for long descriptions */
        .product-meta .customer-desc.has-more::after {
            content: '...';
            display: inline-block;
            color: #999;
            font-size: 12px;
            margin-top: 2px;
        }
        
        /* Adjust the product meta container */
        .product-meta {
            margin: 8px 0 4px 0;
            padding: 0;
        }
        
        /* Ensure color and size are properly spaced */
        .product-meta > div:not(.customer-desc) {
            display: inline-block;
            margin-right: 12px;
            margin-bottom: 4px;
            font-size: 12px;
            background: #f0f0f0;
            padding: 3px 8px;
            border-radius: 3px;
        }
    }
    
    /* Desktop styling for description */
    @media (min-width: 768px) {
        .product-meta .customer-desc {
            margin-bottom: 8px;
            padding: 4px 0;
            border-bottom: 1px dashed #eee;
        }
        
        .product-meta .customer-desc .desc-label {
            font-weight: 600;
            margin-right: 8px;
        }
        
        .product-meta .customer-desc .desc-text {
            max-width: 300px;
            display: inline-block;
            white-space: normal;
            word-break: break-word;
        }
    }
    /* Customer description container */
    .customer-desc-container {
        margin-bottom: 12px;
        position: relative;
    }
    
    /* View mode styles */
    .customer-desc-view {
        padding: 8px;
        background: #f9f9f9;
        border-radius: 6px;
        border-left: 3px solid #ddd;
        transition: all 0.2s ease;
    }
    
    .customer-desc-view:hover {
        background: #f5f5f5;
        border-left-color: #999;
    }
    
    .desc-header {
        display: flex;
        align-items: center;
        justify-content: space-between;
        margin-bottom: 4px;
    }
    
    .desc-label {
        font-weight: 600;
        font-size: 12px;
        color: #666;
        text-transform: uppercase;
        letter-spacing: 0.5px;
    }
    
    .btn-edit-desc {
        background: none;
        border: none;
        color: #999;
        cursor: pointer;
        padding: 2px 6px;
        font-size: 12px;
        border-radius: 3px;
        transition: all 0.2s ease;
    }
    
    .btn-edit-desc:hover {
        color: #007bff;
        background: rgba(0,123,255,0.1);
    }
    
    .desc-text {
        font-size: 13px;
        line-height: 1.5;
        color: #333;
        word-break: break-word;
        white-space: pre-wrap;
    }
    
    .desc-text .text-muted {
        color: #999;
        font-style: italic;
    }
    
    /* Edit mode styles */
    .customer-desc-edit {
        padding: 8px;
        background: #fff;
        border-radius: 6px;
        border: 1px solid #007bff;
        box-shadow: 0 2px 8px rgba(0,123,255,0.1);
    }
    
    .desc-textarea {
        width: 100%;
        padding: 8px;
        border: 1px solid #ddd;
        border-radius: 4px;
        font-size: 13px;
        line-height: 1.5;
        resize: vertical;
        min-height: 60px;
        max-height: 200px;
        font-family: inherit;
        margin: 8px 0;
        transition: border-color 0.2s ease;
    }
    
    .desc-textarea:focus {
        outline: none;
        border-color: #007bff;
        box-shadow: 0 0 0 2px rgba(0,123,255,0.25);
    }
    
    .desc-actions {
        display: flex;
        gap: 8px;
        justify-content: flex-end;
    }
    
    .desc-actions button {
        padding: 6px 12px;
        border: none;
        border-radius: 4px;
        font-size: 12px;
        font-weight: 500;
        cursor: pointer;
        display: inline-flex;
        align-items: center;
        gap: 4px;
        transition: all 0.2s ease;
    }
    
    .btn-save-desc {
        background: #28a745;
        color: white;
    }
    
    .btn-save-desc:hover {
        background: #218838;
    }
    
    .btn-save-desc:disabled {
        opacity: 0.6;
        cursor: not-allowed;
    }
    
    .btn-cancel-desc {
        background: #6c757d;
        color: white;
    }
    
    .btn-cancel-desc:hover {
        background: #5a6268;
    }
    
    /* Meta items (color/size) */
    .meta-item {
        display: inline-block;
        margin-right: 12px;
        margin-bottom: 4px;
        background: #f0f0f0;
        padding: 4px 10px;
        border-radius: 4px;
        font-size: 12px;
    }
    
    .meta-label {
        font-weight: 600;
        color: #666;
        margin-right: 4px;
    }
    
    .meta-value {
        color: #333;
    }
    
    /* Mobile responsive adjustments */
    @media (max-width: 767px) {
        .customer-desc-view {
            padding: 10px;
            margin-bottom: 10px;
            border-left-width: 4px;
        }
        
        .desc-header {
            margin-bottom: 6px;
        }
        
        .btn-edit-desc {
            padding: 4px 8px;
            font-size: 13px;
        }
        
        .desc-text {
            font-size: 13px;
            max-height: 60px;
            overflow-y: auto;
        }
        
        .customer-desc-edit {
            padding: 10px;
        }
        
        .desc-textarea {
            font-size: 14px;
            padding: 10px;
            min-height: 80px;
        }
        
        .desc-actions {
            margin-top: 10px;
        }
        
        .desc-actions button {
            padding: 8px 16px;
            font-size: 13px;
            flex: 1;
            justify-content: center;
        }
        
        .meta-item {
            display: block;
            margin-right: 0;
            margin-bottom: 6px;
            padding: 6px 12px;
        }
    }
    
    /* Animation for loading state */
    @keyframes spin {
        from { transform: rotate(0deg); }
        to { transform: rotate(360deg); }
    }
    
    .fa-spinner {
        animation: spin 1s linear infinite;
    }
    
    /* Tooltip for long descriptions */
    .desc-text[title] {
        cursor: help;
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
            <?php include("pages/cart/cart_body.php"); ?>
        </div>

        <?php include("templates/footer.php"); ?>
        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
        <?php include("pages/home/home_page_modal.php"); ?>
    </div>

    <?php include("templates/scripts.php"); ?>

    <?php
    // Get currency symbol from configuration
    $currencySymbol = STORE_CURRENCY_SYMBOL; // Should be "BD"
    ?>

    <script>
        $(document).ready(function() {
            // Initialize currentCurrency
            window.currentCurrency = <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
                'country_code' => 'BH',
                'currency_code' => 'BHD',
                'currency_symbol' => 'BD',
                'exchange_rate' => 1.0000
            ]); ?>;
            
            // Define currency symbol from PHP
            const CURRENCY_SYMBOL = '<?php echo STORE_CURRENCY_SYMBOL; ?>';
            
            // Localization helper function
            function getLocalized(en, ar) {
                const isArabic = window.currentLanguage === 'arabic';
                return (isArabic && ar && ar.trim() !== '') ? ar : (en || '');
            }
            
            // Translation function for static text
            function updateCartTranslations() {
                const isArabic = window.currentLanguage === 'arabic';
                const dict = translations[window.currentLanguage] || translations.english;
                
                // Update all elements with data-i18n
                document.querySelectorAll('[data-i18n]').forEach(el => {
                    const key = el.getAttribute('data-i18n');
                    if (dict[key]) {
                        el.textContent = dict[key];
                    }
                });
                
                // Update save text if exists
                const saveText = $('.save-text span').text();
                if (saveText.includes('You saved')) {
                    const amountMatch = saveText.match(/You saved\s*(.+)\s*on this order/);
                    if (amountMatch) {
                        const amount = amountMatch[1];
                        const newText = isArabic ? `لقد وفرت ${amount} على هذا الطلب` : `You saved ${amount} on this order`;
                        $('.save-text span').text(newText);
                    }
                }
            }
            
            // SIMPLIFIED formatPrice function
            function formatPrice(price, includeSymbol = true) {
                if (isNaN(price) || price == null || price === '') {
                    return includeSymbol ? 'BD 0.00' : '0.00';
                }
                
                const numericPrice = parseFloat(price);
                const exchangeRate = window.currentCurrency?.exchange_rate || 1;
                const convertedPrice = numericPrice * exchangeRate;
                
                const symbol = window.currentCurrency?.currency_symbol || CURRENCY_SYMBOL || 'BD';
                
                const formatted = convertedPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                return includeSymbol ? `${symbol} ${formatted}` : formatted;
            }
            
            // Currency update listener
            $(document).on('currencyUpdated', function(event, currencyData) {
                console.log('Cart page received currency update:', currencyData);
                window.currentCurrency = currencyData;
                updateCartTranslations();
                loadCartItems();
            });
            
            // Language update listener
            $(document).on('languageUpdated', function(event, languageData) {
                console.log('Cart page received language update:', languageData);
                window.currentLanguage = languageData;
                updateCartTranslations();
                loadCartItems(); // Reload to get translated product names
            });
            
            // Load current language
            function loadCurrentLanguage() {
                $.ajax({
                    url: 'controller/home_controller.php',
                    type: 'POST',
                    dataType: 'json',
                    data: { action: 'get_current_language' },
                    success: function(response) {
                        window.currentLanguage = response.language || 'english';
                        console.log('Cart: Current language set to:', window.currentLanguage);
                        updateCartTranslations();
                        loadCartItems();
                    },
                    error: function() {
                        window.currentLanguage = 'english';
                        updateCartTranslations();
                        loadCartItems();
                    }
                });
            }
            
            // Initialize
            loadCurrentLanguage();
            
            // Load cart items
            function loadCartItems() {
                $.ajax({
                    url: 'controller/cart_controller.php',
                    type: 'POST',
                    data: { action: 'get_cart_items' },
                    dataType: 'json',
                    beforeSend: function() { 
                        $('#loading-area').show(); 
                    },
                    success: function(response) {
                        $('#loading-area').hide();
                        
                        if (response.currency) {
                            window.currentCurrency = response.currency;
                        }
                        
                        console.log('DEBUG - Cart response:', response);
                        
                        if (response.status === 'success') {
                            renderCartItems(response.items);
                        } else {
                            const emptyMsg = getLocalized(
                                'Your cart is empty',
                                'سلة التسوق فارغة'
                            );
                            showError(response.message || emptyMsg);
                            $('.check-tbl tbody').html(
                                `<tr><td colspan="6" class="text-center">${emptyMsg}</td></tr>`
                            );
                            updateCartSummary(0, 0);
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#loading-area').hide();
                        showError('Error loading cart. Please try again later.');
                        console.error(error);
                    }
                });
            }
            
            function renderCartItems(items) {
                let html = '';
                let totalSavings = 0;
                let calculatedSubtotal = 0;
            
                if (items.length === 0) {
                    const emptyMsg = getLocalized(
                        'Your cart is empty',
                        'سلة التسوق فارغة'
                    );
                    html = `<tr><td colspan="6" class="text-center">${emptyMsg}</td></tr>`;
                } else {
                    items.forEach(item => {
                        const itemMrp = parseFloat(item.product_amount_mrp) || 0;
                        const itemOffer = parseFloat(item.product_amount_offer) || 0;
                        const itemSelling = parseFloat(item.product_amount_selling) || 0;
                        
                        const displayPrice = itemOffer > 0 ? itemOffer : itemSelling;
                        const showDiscount = itemMrp > displayPrice;
                        const itemSavings = showDiscount ? (itemMrp - displayPrice) * item.quantity : 0;
                        totalSavings += itemSavings;
                        
                        const quantity = parseInt(item.quantity) || 1;
                        const itemTotal = displayPrice * quantity;
                        calculatedSubtotal += itemTotal;
                        
                        const imageUrl = item.product_image ?
                            'https://admin.darjanafashion.com/assets/img/products/product/' + item.product_image :
                            'images/shop/product/default-product.jpg';
                        
                        // Get localized product name
                        const productName = getLocalized(
                            item.product_name,
                            item.product_name_arabic
                        );
                        
                        // Get localized labels
                        const colorLabel = getLocalized('Color', 'اللون');
                        const sizeLabel = getLocalized('Size', 'الحجم');
                        const lengthLabel = getLocalized('Length','الطول');
                        const descriptionLabel = getLocalized('Description', 'الوصف');
                        const editLabel = getLocalized('Edit', 'تعديل');
                        const saveLabel = getLocalized('Save', 'حفظ');
                        const cancelLabel = getLocalized('Cancel', 'إلغاء');
                        
                        // Sanitize description for display
                        const customerDesc = item.customer_desc || '';
                        const escapedDesc = customerDesc.replace(/"/g, '&quot;').replace(/'/g, "&#39;");
                        
                        // Build meta info
                        let metaInfo = '<div class="product-meta">';
                        
                        // Editable description section
                        metaInfo += `
                            <div class="customer-desc-container" data-cart-id="${item.ids}">
                                <div class="customer-desc-view mode-view">
                                    <div class="desc-header">
                                        <span class="desc-label">${descriptionLabel}:</span>
                                        <button type="button" class="btn-edit-desc" data-cart-id="${item.ids}" title="${editLabel}">
                                            <i class="fas fa-pencil-alt"></i>
                                        </button>
                                    </div>
                                    <div class="desc-text" title="${escapedDesc}">
                                        ${customerDesc ? customerDesc : '<span class="text-muted">' + getLocalized('No description', 'لا يوجد وصف') + '</span>'}
                                    </div>
                                </div>
                                <div class="customer-desc-edit mode-edit" style="display:none;">
                                    <div class="desc-header">
                                        <span class="desc-label">${descriptionLabel}:</span>
                                    </div>
                                    <textarea class="desc-textarea" data-cart-id="${item.ids}" placeholder="${getLocalized('Enter description...', 'أدخل الوصف...')}" rows="2">${customerDesc}</textarea>
                                    <div class="desc-actions">
                                        <button type="button" class="btn-save-desc" data-cart-id="${item.ids}">
                                            <i class="fas fa-check"></i> ${saveLabel}
                                        </button>
                                        <button type="button" class="btn-cancel-desc" data-cart-id="${item.ids}">
                                            <i class="fas fa-times"></i> ${cancelLabel}
                                        </button>
                                    </div>
                                </div>
                            </div>
                        `;
                        
                        // Add color and size if they exist and not 'none'
                        if (item.product_color && item.product_color !== 'none') {
                            metaInfo += `<div class="meta-item"><span class="meta-label">${colorLabel}:</span> <span class="meta-value">${item.product_color}</span></div>`;
                        }
                        
                        if (item.product_size && item.product_size !== 'none') {
                            metaInfo += `<div class="meta-item"><span class="meta-label">${sizeLabel}:</span> <span class="meta-value">${item.product_size}</span></div>`;
                        }
                        if (item.length && item.length !== 'none') {
                            metaInfo += `<div class="meta-item"><span class="meta-label">${lengthLabel}:</span> <span class="meta-value">${item.length}</span></div>`;
                        }
                        
                        metaInfo += '</div>';
            
                        html += `
                            <tr data-cart-id="${item.ids}" data-unit-price="${displayPrice}">
                                <td class="product-item-img">
                                    <a href="ProductDetails?id=${item.product_id}" class="product-link">
                                        <img src="${imageUrl}" alt="${productName}" style="border-radius: 0px;width: 100%">
                                    </a>
                                </td>
                                <td class="product-item-name">
                                    <a href="ProductDetails?id=${item.product_id}" class="product-link">
                                        <h6>${productName}</h6>
                                    </a>
                                    ${metaInfo}
                                    <div class="mobile-price-quantity-row">
                                        <div class="product-item-price">
                                            ${showDiscount ? `<span class="original-price"><del>${formatPrice(itemMrp)}</del></span>` : ''}
                                            <span class="current-prices">${formatPrice(displayPrice)}</span>
                                        </div>
                                        <div class="product-item-quantity">
                                            <div class="quantity btn-quantity style-1 me-3">
                                                <input type="text" value="${quantity}" name="product_quantity${item.ids}" 
                                                    data-cart-id="${item.ids}" data-unit-price="${displayPrice}" data-mrp="${itemMrp}">
                                            </div>
                                        </div>
                                    </div>
                                </td>
                                <td class="product-item-totle">${formatPrice(itemTotal)}</td>
                                <td class="product-item-close">
                                    <a href="javascript:void(0);" class="remove-item" data-cart-id="${item.ids}">
                                        <i class="ti-close"></i>
                                    </a>
                                </td>
                            </tr>
                        `;
                    });
                }
            
                $('.check-tbl tbody').html(html);
                updateCartSummary(calculatedSubtotal, totalSavings);
                
                setupQuantityChangeHandlers();
                setupDescriptionEditHandlers(); // New function for description editing
            
                $('.remove-item').on('click', function() {
                    const cartId = $(this).data('cart-id');
                    removeCartItem(cartId);
                });
            }
            
            // New function to handle description editing
            function setupDescriptionEditHandlers() {
                // Click edit button
                $(document).off('click', '.btn-edit-desc').on('click', '.btn-edit-desc', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const container = $(this).closest('.customer-desc-container');
                    container.find('.mode-view').hide();
                    container.find('.mode-edit').show();
                    container.find('.desc-textarea').focus();
                });
                
                // Click save button
                $(document).off('click', '.btn-save-desc').on('click', '.btn-save-desc', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const container = $(this).closest('.customer-desc-container');
                    const cartId = container.data('cart-id');
                    const textarea = container.find('.desc-textarea');
                    const newDescription = textarea.val().trim();
                    
                    updateCartDescription(cartId, newDescription, container);
                });
                
                // Click cancel button
                $(document).off('click', '.btn-cancel-desc').on('click', '.btn-cancel-desc', function(e) {
                    e.preventDefault();
                    e.stopPropagation();
                    const container = $(this).closest('.customer-desc-container');
                    const viewMode = container.find('.mode-view');
                    const editMode = container.find('.mode-edit');
                    const originalText = viewMode.find('.desc-text').text();
                    
                    // Reset textarea to original value
                    if (originalText.includes(getLocalized('No description', 'لا يوجد وصف'))) {
                        editMode.find('.desc-textarea').val('');
                    } else {
                        editMode.find('.desc-textarea').val(originalText);
                    }
                    
                    editMode.hide();
                    viewMode.show();
                });
                
                // Handle Enter key in textarea (Ctrl+Enter to save)
                $(document).off('keydown', '.desc-textarea').on('keydown', '.desc-textarea', function(e) {
                    if (e.ctrlKey && e.keyCode === 13) { // Ctrl+Enter
                        e.preventDefault();
                        $(this).closest('.customer-desc-container').find('.btn-save-desc').click();
                    }
                    
                    if (e.keyCode === 27) { // Escape key
                        e.preventDefault();
                        $(this).closest('.customer-desc-container').find('.btn-cancel-desc').click();
                    }
                });
                
                // Auto-resize textarea as user types
                $(document).off('input', '.desc-textarea').on('input', '.desc-textarea', function() {
                    this.style.height = 'auto';
                    this.style.height = (this.scrollHeight) + 'px';
                });
            }
            
            // Function to update description via AJAX
            function updateCartDescription(cartId, description, container) {
                // Show loading state
                const saveBtn = container.find('.btn-save-desc');
                const originalText = saveBtn.text();
                saveBtn.html('<i class="fas fa-spinner fa-spin"></i>').prop('disabled', true);
                
                $.ajax({
                    url: 'controller/cart_controller.php',
                    type: 'POST',
                    data: {
                        action: 'update_cart_description',
                        cart_id: cartId,
                        customer_desc: description
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status === 'success') {
                            // Update the view mode with new description
                            const viewMode = container.find('.mode-view');
                            const descText = viewMode.find('.desc-text');
                            
                            if (description && description.trim() !== '') {
                                descText.text(description).removeClass('text-muted');
                            } else {
                                descText.html('<span class="text-muted">' + getLocalized('No description', 'لا يوجد وصف') + '</span>');
                            }
                            
                            // Switch back to view mode
                            container.find('.mode-edit').hide();
                            viewMode.show();
                            
                            // Show success message (optional)
                            showNotification(getLocalized('Description updated successfully', 'تم تحديث الوصف بنجاح'), 'success');
                        } else {
                            alert(response.message || getLocalized('Error updating description', 'خطأ في تحديث الوصف'));
                            // Revert to edit mode with original text
                            container.find('.mode-edit').show();
                            container.find('.mode-view').hide();
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating description:', error);
                        alert(getLocalized('Error updating description. Please try again.', 'خطأ في تحديث الوصف. حاول مرة أخرى.'));
                        
                        // Revert to edit mode
                        container.find('.mode-edit').show();
                        container.find('.mode-view').hide();
                    },
                    complete: function() {
                        // Restore save button
                        saveBtn.html('<i class="fas fa-check"></i> ' + getLocalized('Save', 'حفظ')).prop('disabled', false);
                    }
                });
            }
            
            function updateCartSummary(subtotal, savings) {
                console.log('DEBUG - updateCartSummary:', { subtotal, savings });
                $('.total .price').text(formatPrice(subtotal));
                
                if (savings > 0) {
                    const savedText = getLocalized(
                        `You saved ${formatPrice(savings)} on this order`,
                        `لقد وفرت ${formatPrice(savings)} على هذا الطلب`
                    );
                    $('.save-text').html(`
                        <i class="icon feather icon-check-circle"></i>
                        <span class="m-l10">${savedText}</span>
                    `).show();
                } else {
                    $('.save-text').hide();
                }
                
                updateCartCountDisplay();
            }
            
            // Debounce and other helper functions remain the same...
            function debounce(func, wait) {
                let timeout;
                return function executedFunction(...args) {
                    const later = () => {
                        clearTimeout(timeout);
                        func(...args);
                    };
                    clearTimeout(timeout);
                    timeout = setTimeout(later, wait);
                };
            }
            
            function handleQuantityChange(input) {
                const cartId = input.data('cart-id');
                const rawValue = input.val();
                
                if (!rawValue || rawValue === '' || isNaN(rawValue)) {
                    return;
                }
                
                const quantity = parseInt(rawValue) || 1;
                const unitPrice = parseFloat(input.data('unit-price')) || 0;
                
                if (quantity < 1) {
                    input.val(1);
                    return;
                }
                
                const newItemTotal = unitPrice * quantity;
                
                const row = input.closest('tr');
                row.find('.product-item-totle').text(formatPrice(newItemTotal));
        
                let newSubtotal = 0;
                let newSavings = 0;
        
                $('.check-tbl tbody tr').each(function() {
                    const itemInput = $(this).find('input[name^="product_quantity"]');
                    const itemQty = parseInt(itemInput.val()) || 1;
                    const itemUnitPrice = parseFloat(itemInput.data('unit-price')) || 0;
                    const itemMrp = parseFloat(itemInput.data('mrp')) || 0;
                    
                    newSubtotal += itemQty * itemUnitPrice;
                    newSavings += (itemMrp - itemUnitPrice) * itemQty;
                });
        
                updateCartSummary(newSubtotal, newSavings);
                
                updateCartCountDisplay();
            }
            
            const debouncedQuantityChange = debounce(function(input) {
                handleQuantityChange(input);
            }, 300);
            
            function setupQuantityChangeHandlers() {
                $('input[name^="product_quantity"]').off('input change blur keypress');
                
                $(document).on('input', 'input[name^="product_quantity"]', function() {
                    const input = $(this);
                    debouncedQuantityChange(input);
                });
                
                $(document).on('change blur', 'input[name^="product_quantity"]', function() {
                    const input = $(this);
                    const cartId = input.data('cart-id');
                    const quantity = parseInt(input.val()) || 1;
                    
                    if (quantity < 1) {
                        input.val(1);
                        return;
                    }
                    
                    updateCartItem(cartId, quantity);
                    loadHeaderCounts();
                });
                
                $(document).on('keypress', 'input[name^="product_quantity"]', function(e) {
                    if (e.which === 13) {
                        $(this).blur();
                        e.preventDefault();
                    }
                });
                
                $(document).on('click', '.qty-btn', function() {
                    const input = $(this).siblings('input[name^="product_quantity"]');
                    let currentVal = parseInt(input.val()) || 1;
                    
                    if ($(this).hasClass('qty-minus')) {
                        if (currentVal > 1) {
                            input.val(currentVal - 1);
                        }
                    } else if ($(this).hasClass('qty-plus')) {
                        input.val(currentVal + 1);
                    }
                    
                    input.trigger('input');
                    setTimeout(() => input.trigger('change'), 50);
                });
            }
            
            function updateCartItem(cartId, quantity) {
                console.log('Updating cart item:', { cartId, quantity });
                
                $.ajax({
                    url: 'controller/cart_controller.php',
                    type: 'POST',
                    data: {
                        action: 'update_cart_item',
                        cart_id: cartId,
                        quantity: quantity
                    },
                    dataType: 'json',
                    success: function(response) {
                        if (response.status !== 'success') {
                            console.error('Failed to update cart item:', response.message);
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error updating cart item:', error);
                    }
                });
            }
            // Optional: Allow tapping on description to expand/collapse on mobile
            $(document).on('click', '.customer-desc', function(e) {
                if ($(window).width() <= 767) {
                    e.preventDefault();
                    $(this).toggleClass('expanded');
                    
                    // Check if description is truncated and add class
                    const descText = $(this).find('.desc-text');
                    if (descText[0] && descText[0].scrollHeight > descText[0].clientHeight) {
                        $(this).addClass('has-more');
                    } else {
                        $(this).removeClass('has-more');
                    }
                }
            });
            
            // Initialize description truncation check
            function checkDescriptionTruncation() {
                if ($(window).width() <= 767) {
                    $('.customer-desc').each(function() {
                        const descText = $(this).find('.desc-text');
                        if (descText[0] && descText[0].scrollHeight > descText[0].clientHeight) {
                            $(this).addClass('has-more');
                        } else {
                            $(this).removeClass('has-more');
                        }
                    });
                }
            }
            
            // Call after rendering cart items
            // Add this line at the end of your renderCartItems function success callback:
            // checkDescriptionTruncation();
            
            // Also call on window resize
            $(window).on('resize', debounce(function() {
                checkDescriptionTruncation();
            }, 250));
            function updateCartCountDisplay() {
                let totalItems = 0;
                
                $('.check-tbl tbody tr').each(function() {
                    const itemQty = parseInt($(this).find('input[name^="product_quantity"]').val()) || 1;
                    totalItems += itemQty;
                });
                
                $('.cart-count').text(totalItems);
            }
            
            let selectedCartId = null;
            
            function removeCartItem(cartId) {
                selectedCartId = cartId;
                $('#removeModal').show();
                
                // Update modal text based on current language
                updateModalTranslations();
            }
            
            function updateModalTranslations() {
                const dict = translations[window.currentLanguage] || translations.english;
                
                $('#removeModal h2').text(dict.remove_item || 'Remove Item');
                $('#removeModal p').text(dict.remove_confirmation || 'Are you sure you want to remove this item from your cart?');
                $('#confirmRemove').text(dict.remove || 'REMOVE');
                $('#cancelRemove').text(dict.cancel || 'CANCEL');
            }
            
            $('#confirmRemove').click(function() {
                $('#removeModal').hide();
                if (!selectedCartId) return;
        
                $.ajax({
                    url: 'controller/cart_controller.php',
                    type: 'POST',
                    data: {
                        action: 'remove_cart_item',
                        cart_id: selectedCartId
                    },
                    dataType: 'json',
                    beforeSend: function() { $('#loading-area').show(); },
                    success: function(response) {
                        $('#loading-area').hide();
                        if (response.status === 'success') {
                            loadCartItems();
                            loadHeaderCounts();
                        } else {
                            showError(response.message || 'Error removing cart item');
                        }
                    },
                    error: function(xhr, status, error) {
                        $('#loading-area').hide();
                        showError('Error removing item. Please try again later.');
                        console.error(error);
                    }
                });
            });
            
            $('#cancelRemove, #closeModal').click(function() {
                $('#removeModal').hide();
                selectedCartId = null;
            });
            
            function showError(message) {
                const errorHtml = `
                    <div class="alert alert-danger alert-dismissible fade show" role="alert">
                        ${message}
                        <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                    </div>
                `;
                $('.page-content').prepend(errorHtml);
            }
            
            $(document).on('click', '#cartplaceorder-btn', function(e) {
                e.preventDefault();
                $.redirect('PlaceOrder', {
                    flag: 1
                }, 'POST');
            });
            
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
            
            // Initialize translations on page load
            updateCartTranslations();
        });
    </script>
</body>
</html>