<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("templates/head.php"); ?>
    <style>
        /* Apply Montserrat font to all text elements */
        body,
        h1, h2, h3, h4, h5, h6,
        p, span, div, a,
        .title, .product-name,
        .btn, .price,
        .modal-content,
        .navbar-nav {
            font-family: "Montserrat", sans-serif !important;
            /*text-transform: uppercase !important;*/
            letter-spacing: 0.5px !important;
        }
        a {
            color: #3B3B3B;
            font-weight : 400;
        }
        .timeline-badge.cancelled {
            background-color: #dc3545 !important;
        }
        
        .timeline-badge.cancelled:after {
            border-color: #dc3545 !important;
        }
        
        .order-cancelled-badge {
            background-color: #dc3545;
            color: white;
            padding: 3px 8px;
            border-radius: 4px;
            font-size: 12px;
            font-weight: bold;
        }
        .badge-danger {
          background-color: #dc3545;
        }
        
        .timeline-badge.danger {
            background-color: #dc3545 !important;
        }
        
        .timeline-badge.danger:after {
            border-color: #dc3545 !important;
        }
        .form-check-input {
            display: inline-block !important;
            visibility: visible !important;
            opacity: 1 !important;
            width: 16px !important;    height: 16px !important;
            margin-right: 8px !important;    position: relative !important;
        }
    
        .form-check-label {
            display: inline-block !important;    vertical-align: middle;
        !important; }
        
        /* Currency symbol styling */
        .currency-symbol {
            font-size: 0.8em;
            margin-right: 2px;
            opacity: 0.9;
        }
        
        .grand-total .currency-symbol {
            font-size: 1em;
            font-weight: bold;
        }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">

        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>

        <?php include("templates/header.php"); ?>
        <br><br><br>

        <div class="page-content bg-light">
            <div class="content-inner-1">
                <div class="container">
                    <div class="row">
                        <?php include("templates/aside.php"); ?>
                        <?php include("pages/order_details/order_details_body.php"); ?>
                    </div>
                </div>
            </div>
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
    let currentCurrency = <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
        'country_code' => 'BH',
        'country_name' => 'Bahrain',
        'currency_code' => 'BHD',
        'currency_symbol' => 'BD',
        'exchange_rate' => 1.0000
    ]); ?>;
    
    let currentOrderData = null;
    
    $(document).on('currencyUpdated', function(event, currencyData) {
        currentCurrency = currencyData;
        updateDisplayedPrices();
    });
    
    function updateDisplayedPrices() {
        if (!currentOrderData) return;
        
        const currencySymbol = currentCurrency.currency_symbol || 'BD';
        const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
        
        // Update product price
        const displayPrice = currentOrderData.discount_price ? currentOrderData.discount_price : currentOrderData.selling_price;
        const itemPrice = currentOrderData.product_cost;
        const convertedItemPrice = itemPrice * exchangeRate;
        const formattedItemPrice = convertedItemPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        $('#nav-Item .tracking-product-content .price').html(`<strong>Price</strong> : ${currencySymbol} ${formattedItemPrice}`);
        
        // Update all price breakdowns
        const basePrice = (currentOrderData.discount_price && parseFloat(currentOrderData.discount_price) > 0)
                ? parseFloat(currentOrderData.discount_price)
                : parseFloat(currentOrderData.selling_price);
        const quantity = parseInt(currentOrderData.quantity);
        const taxPercentage = parseFloat(currentOrderData.tax_percentage || 0);
        const codFee = parseFloat(currentOrderData.cod_fee || 0);
        
        const subtotal = basePrice * quantity;
        const taxAmount = (subtotal * taxPercentage) / 100;
        const totalBeforeDiscount = subtotal + taxAmount + codFee;
        const discount = currentOrderData.product_cost - basePrice;
        
        // Convert prices
        const convertedSubtotal = subtotal * exchangeRate;
        const convertedTaxAmount = taxAmount * exchangeRate;
        const convertedCodFee = codFee * exchangeRate;
        const convertedDiscount = discount * exchangeRate;
        const convertedTotal = totalBeforeDiscount * exchangeRate;
        
        // Format prices
        const formatPriceValue = (price) => {
            if (isNaN(price) || price === 0) return '0.00';
            return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
        };
        
        const formattedSubtotal = formatPriceValue(convertedSubtotal);
        const formattedTaxAmount = formatPriceValue(convertedTaxAmount);
        const formattedCodFee = formatPriceValue(convertedCodFee);
        const formattedDiscount = formatPriceValue(convertedDiscount);
        const formattedTotal = formatPriceValue(convertedTotal);
        
        // Update pricing breakdown
        let pricingHtml = '';
        if (discount > 0) {
            pricingHtml += `<div class="tracking-item-content border-bottom border-light mb-2">
                <span class="text-success">Total Discounts</span>
                <h6>-${currencySymbol} ${formattedDiscount}</h6>
            </div>`;
        }
        pricingHtml += `<div class="tracking-item-content">
                <span>Subtotal</span>
                <h6>${currencySymbol} ${formattedSubtotal}</h6>
            </div>
            <div class="tracking-item-content">
                <span>Tax (${taxPercentage}%)</span>
                <h6>${currencySymbol} ${formattedTaxAmount}</h6>
            </div>`;
        if (codFee > 0) {
            pricingHtml += `<div class="tracking-item-content">
                <span>COD Fee</span>
                <h6>${currencySymbol} ${formattedCodFee}</h6>
            </div>`;
        }
        pricingHtml += `<div class="tracking-item-content">
                <span>Grand Total</span>
                <h6 class="grand-total">${currencySymbol} ${formattedTotal}</h6>
            </div>`;
        
        $('.tracking-item-content').remove();
        $('.tracking-item').after(pricingHtml);
    }
    </script>

<script>
$(document).ready(function () {
    const orderId = <?php echo json_encode($_POST['id'] ?? $_GET['order_id'] ?? null); ?>;
    console.log("Order ID:", orderId);

    // Initialize on page load
    updateOrderDetails(orderId);

    // Listen for language changes
    $(document).on('languageUpdated', function() {
        console.log('Language changed, updating order details...');
        updateOrderDetails(orderId);
    });

    function updateOrderDetails(orderId) {
        initializedatatable(orderId);
        item_details_table(orderId);
    }

    function initializedatatable(orderId) {
        $.ajax({
            url: "../controller/orders_controller.php",
            type: "POST",
            data: {
                action: "get_order_details",
                orderid: orderId
            },
            success: function (response) {
                let order = JSON.parse(response).data[0];
                
                // Use getProductName function from global.js
                const productName = getProductName(order);
                console.log('Product name for display:', productName);
                console.log('Current language:', window.currentLanguage);
                console.log('English name:', order.product_name);
                console.log('Arabic name:', order.product_name_arabic);
                
                $('#tracker_detail_item').text(productName);
                $('#tracker_detail_courier').text(productName);
                $('#tracker_detail_start_time').text(formatDate(new Date(order.placed_date)));
                $('#tracker_detail_address').text(order.customer_address);
                $('#order_product_image').attr('src', '<?php echo $_SESSION["url"]; ?>' + order.product_image);
                $('#ordernumber').text(`Order #${order.order_id}`);
                
                // Translate status using global function
                const statusText = translateOrderStatus(order.status);
                $('#orderstatus').text(statusText);
                
                const statusLower = (order.status || '').toLowerCase().trim();
                const cancelBtn = $('.cancel-order-btn');
                
                if (statusLower === 'processing' || statusLower === 'in progress' || statusLower === 'order processed' || statusLower === 'shipped' || statusLower === 'delivered') {
                    const processStartedText = getTranslation('already_process_started') || 'Already Process Started';
                    cancelBtn
                        .addClass('disabled')
                        .css({'pointer-events': 'none', 'opacity': '0.65', 'cursor': 'not-allowed'})
                        .attr('disabled', 'disabled')
                        .attr('data-i18n', 'already_process_started')
                        .text(processStartedText)
                        .show();
                } else if (statusLower === 'product cancelled' || statusLower === 'cancelled') {
                    cancelBtn.hide();
                } else {
                    const cancelOrderText = getTranslation('cancel_order') || 'Cancel Order';
                    cancelBtn
                        .removeClass('disabled')
                        .css({'pointer-events': 'auto', 'opacity': '1', 'cursor': 'pointer'})
                        .removeAttr('disabled')
                        .attr('data-i18n', 'cancel_order')
                        .text(cancelOrderText)
                        .show();
                }
            }
        });
    }

    function item_details_table(orderId) {
        $.ajax({
            url: "../controller/orders_controller.php",
            type: "POST",
            data: {
                action: "get_item_details",
                orderid: orderId
            },
            success: function (response) {
                const item = JSON.parse(response).data[0];
                currentOrderData = item;
        
                $('#nav-Item .tracking-product img').attr('src', '<?php echo $_SESSION["url"]; ?>' + item.product_image);
                
                // Use getProductName function from global.js
                const productName = getProductName(item);
                console.log('Item product name for display:', productName);
                $('#nav-Item .title').text(productName);
                
                const currencySymbol = currentCurrency.currency_symbol || 'BD';
                const exchangeRate = parseFloat(currentCurrency.exchange_rate) || 1;
                const displayPrice = item.discount_price ? item.discount_price : item.selling_price;
                const itemPrice = item.product_cost;
                const convertedItemPrice = itemPrice * exchangeRate;
                const formattedItemPrice = convertedItemPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                
                // Get translated "Price" label
                const priceLabel = getTranslation('price') || 'Price';
                $('#nav-Item .tracking-product-content .price').html(`<strong>${priceLabel}</strong> : ${currencySymbol} ${formattedItemPrice}`);

                if (item.product_color && item.product_color !== 'none') {
                    // Get translated "Color" label
                    const colorLabel = getTranslation('color') || 'Color';
                    $('#nav-Item .tracking-product-content .color').html(`<strong>${colorLabel}</strong> : ${item.product_color}`).show();
                } else {
                    $('#nav-Item .tracking-product-content .color').hide();
                }
                
                if (item.product_size && item.product_size !== 'none') {
                    // Get translated "Size" label
                    const sizeLabel = getTranslation('size') || 'Size';
                    $('#nav-Item .tracking-product-content .size').html(`<strong>${sizeLabel}</strong> : ${item.product_size}`).show();
                } else {
                    $('#nav-Item .tracking-product-content .size').hide();
                }
                
                // Get translated "Quantity" label
                const quantityLabel = getTranslation('quantity') || 'Quantity';
                $('#nav-Item .tracking-product-content .quantity').text(item.quantity);
        
                const basePrice = (item.discount_price && parseFloat(item.discount_price) > 0)
                        ? parseFloat(item.discount_price)
                        : parseFloat(item.selling_price);
                const quantity = parseInt(item.quantity);
                const taxPercentage = parseFloat(item.tax_percentage || 0);
                const codFee = parseFloat(item.cod_fee || 0);
                
                const subtotal = basePrice * quantity;
                const taxAmount = (subtotal * taxPercentage) / 100;
                const totalBeforeDiscount = subtotal + taxAmount + codFee;
                const discount = item.product_cost - basePrice;
                
                const convertedSubtotal = subtotal * exchangeRate;
                const convertedTaxAmount = taxAmount * exchangeRate;
                const convertedCodFee = codFee * exchangeRate;
                const convertedDiscount = discount * exchangeRate;
                const convertedTotal = totalBeforeDiscount * exchangeRate;
                
                const formatPriceValue = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };
                
                const formattedSubtotal = formatPriceValue(convertedSubtotal);
                const formattedTaxAmount = formatPriceValue(convertedTaxAmount);
                const formattedCodFee = formatPriceValue(convertedCodFee);
                const formattedDiscount = formatPriceValue(convertedDiscount);
                const formattedTotal = formatPriceValue(convertedTotal);
                
                // Get translated labels
                const totalDiscountsLabel = getTranslation('total_discounts') || 'Total Discounts';
                const subtotalLabel = getTranslation('subtotal') || 'Subtotal';
                const taxLabel = getTranslation('tax') || 'Tax';
                const codFeeLabel = getTranslation('cod_fee') || 'COD Fee';
                const grandTotalLabel = getTranslation('grand_total') || 'Grand Total';
                
                let pricingHtml = '';
                if (discount > 0) {
                    pricingHtml += `<div class="tracking-item-content border-bottom border-light mb-2">
                        <span class="text-success">${totalDiscountsLabel}</span>
                        <h6>-${currencySymbol} ${formattedDiscount}</h6>
                    </div>`;
                }
                pricingHtml += `<div class="tracking-item-content">
                        <span>${subtotalLabel}</span>
                        <h6>${currencySymbol} ${formattedSubtotal}</h6>
                    </div>`;
                    
                if (taxPercentage > 0) {
                    pricingHtml += `<div class="tracking-item-content">
                        <span>${taxLabel} (${taxPercentage}%)</span>
                        <h6>${currencySymbol} ${formattedTaxAmount}</h6>
                    </div>`;
                }
                    
                if (codFee > 0) {
                    pricingHtml += `<div class="tracking-item-content">
                        <span>${codFeeLabel}</span>
                        <h6>${currencySymbol} ${formattedCodFee}</h6>
                    </div>`;
                }
                    
                pricingHtml += `<div class="tracking-item-content">
                        <span>${grandTotalLabel}</span>
                        <h6 class="grand-total">${currencySymbol} ${formattedTotal}</h6>
                    </div>`;
                    
                $('.tracking-item-content').remove();
                $('.tracking-item').after(pricingHtml);
                
                order_history_table(orderId, item.cancelled_date);
            }
        });
    }

    function order_history_table(orderId, cancelledDate) {
        $.ajax({
            url: "../controller/orders_controller.php",
            type: "POST",
            data: {
                action: "get_order_history",
                orderid: orderId
            },
            success: function (response) {
                const historyList = JSON.parse(response).data;
                let timelineHtml = '';

                if (historyList.length === 0) {
                    const noHistoryText = getTranslation('no_order_history') || 'No order history available.';
                    timelineHtml = `<li><div class="timeline-box"><span>${noHistoryText}</span></div></li>`;
                } else {
                    historyList.forEach(item => {
                        const formattedDate = formatDate(new Date(item.placed_date));
                        let badgeClass = "";
                        let contextualClass = "";

                        // Translate status using global function
                        const statusText = translateOrderStatus(item.status);
                        
                        switch (item.status.toLowerCase()) {
                            case "order placed":
                                badgeClass = "order-placed"; contextualClass = "success"; break;
                            case "processing":
                                badgeClass = "processing"; contextualClass = "danger"; break;
                            case "quality check":
                                badgeClass = "quality-check"; contextualClass = "success"; break;
                            case "ready to ship":
                                badgeClass = "ready-to-ship"; contextualClass = "danger"; break;
                            case "shipped":
                                badgeClass = "shipped"; contextualClass = "success"; break;
                            case "in transit":
                                badgeClass = "in-transit"; contextualClass = "danger"; break;
                            case "out for delivery":
                                badgeClass = "out-for-delivery"; contextualClass = "success"; break;
                            case "delivered":
                                badgeClass = "Completed"; contextualClass = "danger"; break;
                            case "completed":
                                badgeClass = "completed"; contextualClass = "danger"; break;
                            case "Product Cancelled":
                                badgeClass = "cancelled"; contextualClass = "danger"; break;
                            case "product returned":
                                badgeClass = "cancelled"; contextualClass = "danger"; break;
                            case "Product Cancelled":
                                badgeClass = "cancelled"; contextualClass = "danger"; break;
                            default:
                                contextualClass = "secondary";
                        }

                        const dateToShow = (item.status.toLowerCase() === "product cancelled" && cancelledDate)
                            ? formatDate(new Date(cancelledDate))
                            : formattedDate;

                        // Get translated labels
                        const reasonLabel = getTranslation('reason') || 'reason';
                        const estimatedDeliveryLabel = getTranslation('estimated_delivery_date') || 'Estimated Delivery Date';
                        const trackingNumberLabel = getTranslation('tracking_number') || 'Tracking Number';

                        timelineHtml += `
                            <li>
                                <div class="timeline-badge ${contextualClass} ${badgeClass}"></div>
                                <div class="timeline-box">
                                    <a class="timeline-panel" href="javascript:void(0);">
                                        <h6 class="mb-0">${statusText}</h6>
                                        <span>${dateToShow}</span>
                                    </a>
                                    ${item.cancellation_reason ? `<p><strong>${reasonLabel} : </strong>${item.cancellation_reason}</p>` : ''}
                                    ${item.courier_service ? `<p><strong>Courier Service : </strong>${item.courier_service}</p>` : ''}
                                    ${item.estimated_delivery ? `<p><strong>${estimatedDeliveryLabel} : </strong>${item.estimated_delivery}</p>` : ''}
                                    ${item.tracking_number ? `<p><strong>${trackingNumberLabel} : </strong>${item.tracking_number}</p>` : ''}
                                </div>
                            </li>`;
                    });
                }

                $('.timeline').html(timelineHtml);
            }
        });
    }

    function formatDate(date) {
        const day = String(date.getDate()).padStart(2, '0');
        const month = String(date.getMonth() + 1).padStart(2, '0');
        const year = date.getFullYear();
        let hours = date.getHours();
        const minutes = String(date.getMinutes()).padStart(2, '0');
        const ampm = hours >= 12 ? 'pm' : 'am';
        hours = hours % 12 || 12;
        return `${day}/${month}/${year} ${hours}:${minutes}${ampm}`;
    }

    // Helper function to get translation
    function getTranslation(key) {
        const lang = window.currentLanguage || 'english';
        const dict = translations[lang] || translations.english;
        return dict[key];
    }

    // Helper function to get product name based on language
    function getProductName(item) {
        const lang = window.currentLanguage || 'english';
        console.log('getProductName called with lang:', lang);
        console.log('Item data:', item);
        
        if (lang === 'arabic' && item.product_name_arabic && item.product_name_arabic.trim() !== '') {
            console.log('Returning Arabic name:', item.product_name_arabic);
            return item.product_name_arabic;
        }
        console.log('Returning English name:', item.product_name);
        return item.product_name;
    }

    // Helper function to translate order status
    function translateOrderStatus(status) {
        const lang = window.currentLanguage || 'english';
        const dict = translations[lang] || translations.english;
        
        // Convert status to lowercase key
        const statusKey = status.toLowerCase();
        
        // Check if we have a direct translation
        if (dict[statusKey]) {
            return dict[statusKey];
        }
        
        // Check status translations
        if (statusKey === 'order placed') return dict['order placed'] || status;
        if (statusKey === 'quality check') return dict['quality_check'] || status;
        if (statusKey === 'ready to ship') return dict['ready_to_ship'] || status;
        if (statusKey === 'in transit') return dict['in_transit'] || status;
        if (statusKey === 'out for delivery') return dict['out_for_delivery'] || status;
        if (statusKey === 'product cancelled') return dict['product_cancelled'] || status;
        if (statusKey === 'product returned') return dict['product_returned'] || status;
        
        return status;
    }

    // Handle cancellation modal
    $(document).on('click', '.btnhover20.btn-outline-danger', function (e) {
        e.preventDefault();
        if ($(this).hasClass('disabled') || $(this).attr('disabled')) {
            return false;
        }
        $('#cancel_order_id').val(orderId);
        updateModalTranslations();
        $('#cancelOrderModal').modal('show');
    });

    $(document).on('change', 'input[name="cancel_reason"]', function () {
        $('#otherReasonContainer').toggle($(this).val() === 'Other reason');
    });

    $('#confirmCancelBtn').click(function () {
        let reason = $('input[name="cancel_reason"]:checked').val();
        if (reason === 'Other reason') {
            reason = $('#other_reason').val().trim();
            if (!reason) {
                const alertText = getTranslation('please_specify_reason') || 'Please specify your reason for cancellation';
                alert(alertText);
                return;
            }
        }
        cancelOrder(orderId, reason);
    });

    function cancelOrder(orderId, reason) {
        // const cancelledAt = new Date().toISOString().slice(0, 19).replace('T', ' ');
        const cancelledAt = new Date().toLocaleString('sv-SE', {
            timeZone: 'Asia/Bahrain'
        }).replace('T', ' ');
        $.ajax({
            url: "../controller/orders_controller.php",
            type: "POST",
            data: {
                action: "cancel_order",
                order_id: orderId,
                reason: reason,
                cancelled_at: cancelledAt
            },
            beforeSend: function () {
                $('#confirmCancelBtn').prop('disabled', true);
                const processingText = getTranslation('processing_text') || 'Processing...';
                $('#confirmCancelBtn').html(`<i class="fas fa-spinner fa-spin"></i> ${processingText}`);
            },
            success: function (response) {
                const result = JSON.parse(response);
                if (result.status === 'success') {
                    $('#cancelOrderModal').modal('hide');
                    
                    // Translate cancelled status
                    const cancelledText = getTranslation('product_cancelled') || 'product cancelled';
                    $('#orderstatus').text(cancelledText).removeClass('badge-success').addClass('badge-danger');
                    
                    const formattedDate = formatDate(new Date(cancelledAt));
                    const reasonLabel = getTranslation('reason') || 'reason';
                    const successText = getTranslation('cancellation_success') || 'Product cancelled successfully';
                    
                    $('.timeline').prepend(`
                        <li>
                            <div class="timeline-badge danger cancelled"></div>
                            <div class="timeline-box">
                                <a class="timeline-panel" href="javascript:void(0);">
                                    <h6 class="mb-0">${cancelledText}</h6>
                                    <span>${formattedDate}</span>
                                </a>
                                <p><strong>${reasonLabel} : </strong>${reason}</p>
                            </div>
                        </li>`);
                    
                    setupDropdown('dropdownContent', 'success', svgSuccess + successText, 'click');
                    $('.btnhover20.btn-outline-danger').hide();
                    
                    // Reload to update all text
                    updateOrderDetails(orderId);
                } else {
                    const failedText = getTranslation('cancellation_failed') || 'Product cancellation failed';
                    setupDropdown('dropdownContent', 'warning', svgError + failedText, 'click');
                }
            },
            error: function () {
                Swal.fire({ 
                    icon: 'error', 
                    title: 'Error', 
                    text: 'An error occurred while cancelling.', 
                    confirmButtonText: 'OK' 
                });
            },
            complete: function () {
                $('#confirmCancelBtn').prop('disabled', false);
                const confirmText = getTranslation('confirm_cancellation') || 'Confirm Cancellation';
                $('#confirmCancelBtn').html(confirmText);
            }
        });
    }

    function updateModalTranslations() {
        // Update placeholder for other reason textarea
        const placeholderText = getTranslation('please_specify_reason');
        if (placeholderText) {
            $('#other_reason').attr('placeholder', placeholderText);
        }
    }

    // Update prices when currency changes
    $(document).on('currencyUpdated', function(event, currencyData) {
        currentCurrency = currencyData;
        if (currentOrderData) {
            // Trigger item details table to recalculate prices
            item_details_table(orderId);
        }
    });
});
</script>
</body>
</html>