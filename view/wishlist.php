<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <style>
    /* Apply Montserrat font to all text */
    body,
        h1, h2, h3, h4, h5, h6,
        p, span, div,
        .title, .product-name, .btn, .price,
        .modal-content, .navbar-nav,
        .badge, .form-label, th, td,
        .product-meta, .current-prices,
        .original-price, .alert {
            font-family: "Montserrat", sans-serif !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }
    
        /* Quick View Modal specific */
        .modal-content * {
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
    
        /* Product title in wishlist */
        .product-item-name h6 {
            font-weight: 500 !important;
        }
    
        /* Buttons */
        .btn {
            font-weight: 500 !important;
            letter-spacing: 1px !important;
        }
    
        /* Price styling */
        .current-prices {
            font-weight: 600 !important;
        }
    
        /* Table header */
        .check-tbl th {
            letter-spacing: 1px !important;
            font-weight: 600 !important;
        }
    
        /* Mobile responsive */
        @media (max-width: 768px) {
            body,
            .product-item-name h6,
            .btn,
            .current-prices {
                font-size: 0.9em !important;
            }
        }
    
        /* Remove modal buttons */
        .modal-actions button {
            letter-spacing: 1px !important;
            font-weight: 500 !important;
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
        width: 15%;
        text-align: center;
    }

    .check-tbl .product-item-img img {
        max-width: 100px;
        height: auto;
    }

    .check-tbl .product-item-name {
        width: 40%;
    }

    .check-tbl .product-item-price {
        width: 15%;
        text-align: center;
    }

    .check-tbl .product-item-totle {
        width: 25%;
        text-align: center;
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
        text-decoration: line-through;
    }

    .check-tbl .product-item-price .current-prices {
        font-weight: bold;
        font-size: 15px;
        color: #000;
    }

    /* Mobile view styles */
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
            padding: 10px;
            margin-bottom: 15px;
            border: 1px solid #eee;
            border-radius: 5px;
        }

        .check-tbl .product-item-img {
            width: 30%;
            padding-right: 10px;
        }

        .check-tbl .product-item-img img {
            max-width: 80px;
            height: auto;
        }

        .check-tbl .product-item-name {
            width: 70%;
            padding-left: 0;
            display: flex;
            flex-direction: column;
        }

        .check-tbl .product-item-name h6 {
            font-size: 14px;
            margin: 0 0 5px 0;
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
            line-height: 1.4;
        }

        .check-tbl .mobile-price-row {
            display: flex;
            align-items: center;
            gap: 10px;
        }

        .check-tbl .product-item-price {
            font-size: 14px;
            text-align: left;
        }

        .check-tbl .product-item-price .original-price {
            font-size: 12px;
            color: #999;
        }

        .check-tbl .product-item-price .current-prices {
            font-weight: bold;
        }

        .check-tbl .product-item-totle {
            width: 100%;
            text-align: right;
            font-weight: bold;
            font-size: 14px;
            margin-top: 10px;
        }

        .check-tbl .product-item-close {
            position: absolute;
            top: 65px;
            right: 40px;
            padding: 0;
        }
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
            <?php include("pages/wishlist/wishlistbody.php"); ?>
        </div>

        <!-- Footer -->
        <?php include("templates/footer.php"); ?>
        <!-- Footer End -->

        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

        <!-- Quick Modal Start -->
        <?php include("pages/home/home_page_modal.php"); ?>
    </div>
    <?php include("templates/scripts.php"); ?>
    
    <!-- Currency Script -->
    <script>
        // Store current currency and language globally
        let currentCurrency = <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
            'country_code' => 'BH',
            'country_name' => 'Bahrain',
            'currency_code' => 'BHD',
            'currency_symbol' => 'BD',
            'exchange_rate' => 1.0000,
            'flag_emoji' => '<span class="fi fi-bh"></span>'
        ]); ?>;
        
        // let currentLanguage = 'english'; // Will be set on page load
        
        // Localization helper function
        function getLocalized(en, ar) {
            return (currentLanguage === 'arabic' && ar && ar.trim() !== '') ? ar : (en || '');
        }
        
        // Translation function for static text
        function updateWishlistTranslations() {
            const dict = translations[currentLanguage] || translations.english;
            
            // Update all elements with data-i18n
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (dict[key]) {
                    el.textContent = dict[key];
                }
            });
        }
        
        // Enhanced formatPrice function with currency conversion
        function formatPrice(price, includeSymbol = true, decimals = 2, context = 'default') {
            if (isNaN(price) || price == null || price === '') {
                if (includeSymbol) {
                    if (context === 'card') {
                        return `<span class="card-currency-symbol">${currentCurrency.currency_symbol || 'BD'}</span> 0.00`;
                    }
                    return `${currentCurrency.currency_symbol || 'BD'} 0.00`;
                }
                return '0.00';
            }
            
            // Convert price based on current currency
            let convertedPrice = price;
            
            // Apply exchange rate if available
            const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
            convertedPrice = price * exchangeRate;
            
            // Format the number
            let formatted = Number(convertedPrice).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            // Different styling based on context
            if (includeSymbol) {
                const currencySymbol = currentCurrency.currency_symbol || 'BD';
                if (context === 'card') {
                    const currencyCode = currentCurrency.currency_code || 'BHD';
                    return `<span class="card-currency-symbol">${currencySymbol}</span> ${formatted} <small class="text-muted">${currencyCode}</small>`;
                }
                return `${currencySymbol} ${formatted}`;
            }
            
            return formatted;
        }
        
        // Function to update wishlist prices when currency changes
        function updateWishlistPrices() {
            console.log('Updating wishlist prices with currency:', currentCurrency);
            
            // Re-render wishlist items with new currency
            loadWishlistItems();
        }
        
        // Listen for currency update events from header
        $(document).on('currencyUpdated', function(event, currencyData) {
            console.log('Wishlist received currency update:', currencyData);
            
            // Update the global currentCurrency
            currentCurrency = currencyData;
            window.currentCurrency = currencyData;
            
            // Update all prices on wishlist page
            updateWishlistPrices();
        });
        
        // Listen for language update events
        $(document).on('languageUpdated', function(event, languageData) {
            console.log('Wishlist received language update:', languageData);
            currentLanguage = languageData;
            updateWishlistTranslations();
            loadWishlistItems(); // Reload to get translated product names
        });
        
        // Initialize when page loads
        $(document).ready(function() {
            // Load current language
            loadCurrentLanguage();
            
            // Load current currency
            getCurrentCurrency();
            
            // Load wishlist items
            loadWishlistItems();
        });
        
        // Function to get current language
        function loadCurrentLanguage() {
            $.ajax({
                url: 'controller/home_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_language' },
                success: function(response) {
                    currentLanguage = response.language || 'english';
                    console.log('Wishlist: Current language set to:', currentLanguage);
                    updateWishlistTranslations();
                },
                error: function() {
                    currentLanguage = 'english';
                    updateWishlistTranslations();
                }
            });
        }
        
        // Function to get current currency from server
        function getCurrentCurrency() {
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_currency' },
                success: function(response) {
                    if (response.status === 'success') {
                        currentCurrency = response.data;
                        console.log('Wishlist loaded currency:', currentCurrency);
                    }
                },
                error: function(xhr, status, error) {
                    console.error("Error loading currency:", error);
                }
            });
        }
        
        // Function to load wishlist items
        function loadWishlistItems() {
            $.ajax({
                url: 'controller/wishlist_controller.php',
                type: 'POST',
                data: {
                    action: 'get_wishlist_items'
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loading-area').show();
                },
                success: function(response) {
                    $('#loading-area').hide();
                    if (response.status === 'success') {
                        renderWishlistItems(response.items);
                    } else {
                        const emptyMsg = getLocalized(
                            'Your wishlist is empty',
                            'قائمة الرغبات فارغة'
                        );
                        showError(response.message || emptyMsg);
                        $('.check-tbl tbody').html(
                            `<tr><td colspan="6" class="text-center">${emptyMsg}</td></tr>`
                        );
                    }
                },
                error: function(xhr, status, error) {
                    $('#loading-area').hide();
                    showError('Error loading wishlist. Please try again later.');
                    console.error(error);
                }
            });
        }
        
        // Function to render wishlist items with currency conversion and localization
        function renderWishlistItems(items) {
            let html = '';
        
            if (items.length === 0) {
                const emptyMsg = getLocalized(
                    'Your wishlist is empty',
                    'قائمة الرغبات فارغة'
                );
                html = `<tr><td colspan="6" class="text-center">${emptyMsg}</td></tr>`;
            } else {
                items.forEach(item => {
                    // Get localized product name
                    const productName = getLocalized(
                        item.product_name,
                        item.product_name_arabic
                    );
                    
                    // Get base prices
                    const baseMrpPrice = parseFloat(item.product_amount_mrp) || 0;
                    const baseOfferPrice = parseFloat(item.product_amount_offer) || 0;
                    const baseSellingPrice = parseFloat(item.product_amount_selling) || 0;
                    
                    // Use offer price if available, otherwise use selling price
                    const basePrice = baseOfferPrice > 0 ? baseOfferPrice : baseSellingPrice;
                    
                    // Format prices with current currency
                    const formattedPrice = formatPrice(basePrice);
                    const formattedMrpPrice = formatPrice(baseMrpPrice);
                    const showDiscount = baseMrpPrice > basePrice;
                    
                    // Determine stock status
                    const stockStatus = getLocalized('In Stock', 'متوفر في المخزون');
                    
                    // Get localized labels
                    const colorLabel = getLocalized('Color', 'اللون');
                    const sizeLabel = getLocalized('Size', 'الحجم');
                    const goToProductText = getLocalized('Go To Product', 'انتقل إلى المنتج');
                    
                    const imageUrl = item.product_image ?
                        'https://admin.darjanafashion.com/assets/img/products/' + item.product_image :
                        'images/shop/product/default-product.jpg';
                        
                    let metaInfo = '';
                    if (item.product_color !== 'none' || item.product_size !== 'none') {
                        metaInfo += '<div class="product-meta">';
                        if (item.product_color !== 'none') {
                            metaInfo += `<span>${colorLabel}: ${item.product_color}</span>`;
                        }
                        if (item.product_size !== 'none') {
                            if (item.product_color !== 'none') metaInfo += ' | ';
                            metaInfo += `<span>${sizeLabel}: ${item.product_size}</span>`;
                        }
                        metaInfo += '</div>';
                    }
        
                    html += `
                        <tr data-wishlist-id="${item.ids}">
                            <td class="product-item-img">
                                <a href="ProductDetails?id=${item.product_id}" class="product-link">
                                    <img src="${imageUrl}" alt="${productName}">
                                </a>
                            </td>
                            <td class="product-item-name">
                                <a href="ProductDetails?id=${item.product_id}" class="product-link">
                                    <h6>${productName}</h6>
                                </a>
                                ${metaInfo}
                                <div class="mobile-price-row">
                                    <div class="product-item-price">
                                        ${showDiscount ? `<span class="original-price"><del>${formattedMrpPrice}</del></span>` : ''}
                                        <span class="current-prices">${formattedPrice}</span>
                                    </div>
                                </div>
                            </td>
                            <td class="product-item-price">
                                <div class="desktop-price">
                                    ${showDiscount ? `<span class="original-price"><del>${formattedMrpPrice}</del></span>` : ''}
                                    <span class="current-prices">${formattedPrice}</span>
                                </div>
                            </td>
                            <td class="product-item-stock">${stockStatus}</td>
                            <td class="product-item-totle">
                                <a href="ProductDetails?id=${item.product_id}" class="btn btn-secondary btnhover text-nowrap">
                                    ${goToProductText}
                                </a>
                            </td>
                            <td class="product-item-close">
                                <a href="javascript:void(0);" class="remove-item" data-wishlist-id="${item.ids}">
                                    <i class="ti-close"></i>
                                </a>
                            </td>
                        </tr>
                    `;
                });
            }
        
            $('.check-tbl tbody').html(html);
        
            // Handle remove item
            $('.remove-item').on('click', function() {
                const wishlistId = $(this).data('wishlist-id');
                removeWishlistItem(wishlistId);
            });
        }
        
        let selectedWishlistId = null;
        
        function removeWishlistItem(wishlistId) {
            selectedWishlistId = wishlistId;
            $('#removeModal').show();
            
            // Update modal text based on current language
            updateModalTranslations();
        }
        
        function updateModalTranslations() {
            const dict = translations[currentLanguage] || translations.english;
            
            $('#removeModal h2').text(dict.remove_item || 'Remove Item');
            $('#removeModal p').text(dict.remove_confirmation || 'Are you sure you want to remove this item from your wishlist?');
            $('#confirmRemove').text(dict.remove || 'REMOVE');
            $('#cancelRemove').text(dict.cancel || 'CANCEL');
        }
        
        // Handle modal interactions
        $(document).ready(function() {
            $('#confirmRemove').click(function() {
                $('#removeModal').hide();
                if (!selectedWishlistId) return;
        
                $.ajax({
                    url: 'controller/wishlist_controller.php',
                    type: 'POST',
                    data: {
                        action: 'remove_wishlist_item',
                        wishlist_id: selectedWishlistId
                    },
                    dataType: 'json',
                    beforeSend: function() {
                        $('#loading-area').show();
                    },
                    success: function(response) {
                        $('#loading-area').hide();
                        if (response.status === 'success') {
                            loadWishlistItems();
                            loadHeaderCounts();
                        } else {
                            showError(response.message || 'Error removing wishlist item');
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
                selectedWishlistId = null;
            });
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
    </script>
</body>
</html>