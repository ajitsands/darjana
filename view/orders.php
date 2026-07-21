<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>

    <!-- jQuery UI -->
    <link rel="stylesheet" href="https://code.jquery.com/ui/1.13.2/themes/base/jquery-ui.css">
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
    <script src="https://code.jquery.com/ui/1.13.2/jquery-ui.min.js"></script>

    <style>
         /* Apply Montserrat font to all text elements */
        body,
        h1, h2, h3, h4, h5, h6,
        p, span, div, a,
        .title, .product-name,
        .btn, .price,
        .modal-content,
        .navbar-nav {
            font-family: "Instrument Sans", sans-serif !important;
            /* text-transform: uppercase !important; */
            letter-spacing: 0.5px !important;
        }
        a {
            color: #3B3B3B;
            font-weight : 400;
        }
        /* Sidebar Wrapper */
        .account-sidebar-wrapper {
            /*z-index: 999;*/
            margin: 0;
        }

        /* Order Card */
        .order-card {
            border: none;
            border-radius: 12px;
            margin-bottom: 20px;
            background: #ffffff;
            box-shadow: 0 6px 20px rgba(0, 0, 0, 0.08);
            transition: transform 0.3s ease, box-shadow 0.3s ease;
            overflow: hidden;
            cursor: pointer;
            padding: 1rem;
        }

        .order-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0, 0, 0, 0.12);
        }

        .order-card img {
            width: 120px;
            height: 120px;
            object-fit: cover;
            border-radius: 8px;
            border: 1px solid #f1f1f1;
        }

        /* Order Status */
        .order-status {
            font-size: 14px;
            font-weight: 500;
            padding: 8px 16px;
            border-radius: 20px;
            text-transform: capitalize;
            display: inline-block;
        }

        .status-secondary { background-color: #6c757d; color: white; }
        .status-primary { background-color: #007bff; color: white; }
        .status-info { background-color: #17a2b8; color: white; }
        .status-warning { background-color: #ffca2c; color: #333; }
        .status-success { background-color: #28a745; color: white; }
        .status-danger { background-color: #dc3545; color: white; }

        /* Order Details */
        .order-details {
            flex-grow: 1;
        }

        .order-details h5 {
            font-size: 18px;
            font-weight: 600;
            color: #1a1a1a;
            margin-bottom: 8px;
        }

        .order-details p {
            font-size: 14px;
            color: #555;
            margin-bottom: 6px;
        }

        /* Currency Symbol Styling */
        .currency-symbol {
            font-size: 0.8em;
            margin-right: 2px;
            opacity: 0.9;
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

        /* Responsive */
        @media (max-width: 576px) {
            .order-card img {
                width: 90px;
                height: 90px;
            }
            .order-details h5 {
                font-size: 16px;
            }
            .order-details p {
                font-size: 13px;
            }
            .order-status {
                font-size: 12px;
                padding: 6px 12px;
            }
        }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">

        <!-- Loader -->
        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>

        <!-- Header -->
        <?php include("templates/header.php"); ?>

        <div class="page-content bg-light">
            <div class="content-inner-1">
                <div class="container">
                    <div class="row mt-5">
                        <?php include("templates/aside.php"); ?>
                        <?php include("pages/orders/orders_body.php"); ?>
                    </div>
                </div>
            </div>
        </div>

        <!-- Footer -->
        <?php include("templates/footer.php"); ?>

        <!-- Scroll to Top -->
        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>

        <!-- Quick Modal -->
        <?php include("pages/home/home_page_modal.php"); ?>
    </div>
	<a href="https://wa.me/97333300160?text=Hi I Like to Know more about the Products ." class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <?php include("templates/scripts.php"); ?>

    <!-- Currency Script -->
    <script>
    // Store current currency globally (same as in global.js)
    let currentCurrency = <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
        'country_code' => 'BH',
        'country_name' => 'Bahrain',
        'currency_code' => 'BHD',
        'currency_symbol' => 'BD',
        'exchange_rate' => 1.0000,
        'flag_emoji' => '<span class="fi fi-bh"></span>'
    ]); ?>;
    
    // Currency formatting function
    function formatPrice(price, includeSymbol = true, decimals = 2) {
        if (isNaN(price) || price == null || price === '') {
            if (includeSymbol) {
                return `${currentCurrency.currency_symbol || 'BD'} 0.00`;
            }
            return '0.00';
        }
        
        // Convert price based on current currency
        let convertedPrice = price;
        let currencySymbol = currentCurrency.currency_symbol || 'BD';
        let currencyCode = currentCurrency.currency_code || 'BHD';
        
        // Apply exchange rate if available
        const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
        convertedPrice = price * exchangeRate;
        
        // Format the number
        let formatted = Number(convertedPrice).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        
        // Return formatted price with symbol
        if (includeSymbol) {
            return `<span class="currency-symbol">${currencySymbol}</span> ${formatted}`;
        }
        
        return formatted;
    }
    
    // Function to update order prices when currency changes
    function updateOrderPrices() {
        console.log('Updating order prices with currency:', currentCurrency);
        
        // Re-fetch and render orders with new currency
        fetchOrders();
    }
    
    // Listen for currency update events from header
    $(document).on('currencyUpdated', function(event, currencyData) {
        console.log('Orders page received currency update:', currencyData);
        
        // Update the global currentCurrency
        currentCurrency = currencyData;
        window.currentCurrency = currencyData;
        
        // Update all prices on orders page
        updateOrderPrices();
    });
    // Translation helper function
    function getLocalized(en, ar) {
        const isArabic = window.currentLanguage === 'arabic';
        return (isArabic && ar && ar.trim() !== '') ? ar : (en || '');
    }
    
    // Function to translate status
    function translateStatus(status) {
        const dict = translations[window.currentLanguage] || translations.english;
        return dict[status] || status;
    }
    
    // Function to update static text on orders page
    function updateOrdersPageTranslations() {
        const dict = translations[window.currentLanguage] || translations.english;
        
        // Update all static text elements
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dict[key]) {
                el.textContent = dict[key];
            }
        });
        
        // Update page titles and headings
        const title = document.querySelector('.dz-title');
        if (title && !title.hasAttribute('data-i18n')) {
            title.textContent = dict.my_orders || 'My Orders';
        }
    }
    // Initialize currency when page loads
    $(document).ready(function () {
        // Get current currency on page load
        loadCurrentLanguage();
        getCurrentCurrency();
        updateOrdersPageTranslations();
        // Fetch orders
        fetchOrders();
        
        /* Sidebar Toggle */
        $(document).on('click', '.toggle-btn', function (e) {
            e.preventDefault();

            const $btn = $(this);
            $btn.toggleClass('active');

            if ($btn.hasClass('active')) {
                $('#accountSidebar').css({
                    'z-index': 9999,
                    'position': 'fixed',
                    'top': 0,
                    'right': 0,
                    'pointer-events': 'auto'
                }).addClass('open');

                $('.modal-backdrop, .offcanvas-backdrop, .overlay').remove();
            } else {
                $('#accountSidebar').removeClass('open');
            }
        });

        /* Order Card Click */
        $(document).on('click', '.order-card', function (e) {
            e.preventDefault();
            const id = $(this).data('id');
            $.redirect('Orders_details', { id: id }, 'POST', '');
        });
    });

    /* Fetch Orders Function */
    function fetchOrders() {
        $.ajax({
            type: 'POST',
            url: 'controller/orders_controller.php',
            data: { action: 'orders_list' },
            dataType: 'json',
            beforeSend: function() {
                $('#loading-area').show();
            },
            success: function (json) {
                $('#loading-area').hide();
                if (json && json.data) {
                    renderOrders(json.data);
                } else {
                    $('#orders_container').html('<div class="col-12"><p class="text-center text-muted">No orders found.</p></div>');
                }
            },
            error: function () {
                $('#loading-area').hide();
                $('#orders_container').html('<div class="col-12"><p class="text-center text-danger">Error loading orders.</p></div>');
            }
        });
    }

    /* Get Current Currency Function */
    function getCurrentCurrency() {
        $.ajax({
            url: 'controller/currency_controller.php',
            type: 'POST',
            dataType: 'json',
            data: { action: 'get_current_currency' },
            success: function(response) {
                if (response.status === 'success') {
                    currentCurrency = response.data;
                    console.log('Orders loaded currency:', currentCurrency);
                }
            },
            error: function(xhr, status, error) {
                console.error("Error loading currency:", error);
            }
        });
    }

    function renderOrders(orders) {
        const container = $('#orders_container');
        container.empty();
    
        if (!orders || orders.length === 0) {
            const noOrdersMsg = getLocalized('No orders found.', 'لم يتم العثور على طلبات.');
            container.html(`<div class="col-12"><p class="text-center text-muted">${noOrdersMsg}</p></div>`);
            return;
        }
    
        const statusMap = {
            'order placed': 'status-secondary',
            'Processing': 'status-primary',
            'Quality Check': 'status-info',
            'Ready to Ship': 'status-info',
            'Shipped': 'status-warning',
            'In Transit': 'status-warning',
            'Out for Delivery': 'status-warning',
            'Delivered': 'status-success',
            'Completed': 'status-success',
            'product cancelled': 'status-danger',
            'product returned': 'status-warning'
        };
        
        // Get translations
        const dict = translations[window.currentLanguage] || translations.english;
    
        orders.forEach(order => {
            const imageUrl = order.product_image
                ? `https://admin.darjanafashion.com/assets/img/products/product/${order.product_image}`
                : 'images/shop/product/default-product.jpg';
    
            // Get localized product name
            const productName = getLocalized(order.product_name, order.product_name_arabic);
    
            // Calculate TOTAL PRICE in BHD
            const unitPrice = (order.discount_price && parseFloat(order.discount_price) > 0)
                ? parseFloat(order.discount_price)
                : parseFloat(order.selling_price || 0);
            const quantity = parseInt(order.quantity || 1);
            const subtotal = unitPrice * quantity;
            
            const taxPercentage = parseFloat(order.tax_percentage || 0);
            const taxAmount = (subtotal * taxPercentage) / 100;
            
            const codFee = parseFloat(order.cod_fee || 0);
            const totalPriceBHD = subtotal + taxAmount + codFee;
    
            // Get currency conversion details
            const currencySymbol = currentCurrency.currency_symbol || 'BD';
            const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
            
            // Convert to selected currency
            const convertedPrice = totalPriceBHD * exchangeRate;
            const formattedPrice = convertedPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    
            // Build attributes with translation
            let attributes = '';
            if (order.product_color && order.product_color !== 'none') {
                const colorLabel = dict.color || 'Color';
                attributes += `${colorLabel}: ${order.product_color}`;
            }
            
            if (order.product_size && order.product_size !== 'none') {
                const sizeLabel = dict.size || 'Size';
                if (attributes) attributes += ' | ';
                attributes += `${sizeLabel}: ${order.product_size}`;
            }
            
            if (attributes) {
                attributes += '<br>';
            }
    
            const statusClass = statusMap[order.status] || 'status-secondary';
            
            // Translate the status for display
            const translatedStatus = translateStatus(order.status);
            
            // Translate labels
            const qtyLabel = dict.qty || 'Qty';
            const orderIdLabel = dict.order_id || 'Order ID';
            const dateLabel = dict.date_purchased || 'Date Purchased';
            const totalLabel = dict.total || 'Total';
    
            const cardHtml = `
                <div class="col-12 order-card" data-id="${order.ids}">
                    <div class="d-flex flex-wrap align-items-center">
                        <div class="me-4">
                            <img src="${imageUrl}" alt="${productName}" class="img-fluid">
                        </div>
                        <div class="order-details">
                            <h5>${productName}</h5>
                            ${attributes}
                            <p>${qtyLabel}: ${order.quantity}</p>
                            <p>${orderIdLabel}: ${order.order_id}</p>
                            <p>${dateLabel}: ${order.placed_date}</p>
                            <p>${totalLabel}: ${currencySymbol} ${formattedPrice}</p>
                        </div>
                        <div class="order-status ${statusClass} ms-auto me-4">
                            ${translatedStatus}
                        </div>
                    </div>
                </div>
            `;
            container.append(cardHtml);
        });
    }
    </script>
</body>
</html>