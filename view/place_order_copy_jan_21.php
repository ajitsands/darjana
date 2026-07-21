<!DOCTYPE html>
<html lang="en">

<head>
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />
    <?php include("templates/head.php"); ?>
    <style>
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
        color: #888;
        margin-right: 10px;
    }
    .savings {
        color: green;
        font-weight: 500;
    }
    .new-address-form-card .form-control,
    .new-address-form-card .form-select {
        padding-top: 4px;
        padding-bottom: 4px;
        height: 35px;
        font-size: 14px;
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
        color: #333;
    }
    #changeAddressModal .modal-header {
        background-color: #CC0D39;
    }
    #changeAddressModal .modal-title,
    #changeAddressModal .close span {
        color: #fff;
    }
    .new-address-form-card .card-body {
        padding-top: 12px !important;
    }
    .new-address-form-card .card-title {
        margin-top: 0 !important;
        margin-bottom: 16px !important;
    }
    .select2-dropdown {
        z-index: 9999 !important;
    }
    .select2-container--default .select2-selection--single {
        border: 1px solid #222 !important;
        height: 35px !important;
        padding: 4px 12px !important;
        font-size: 14px !important;
        border-radius: 10px !important;
        background-color: #fff !important;
        display: flex !important;
        align-items: center !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__rendered {
        line-height: 26px !important;
        padding-left: 0 !important;
    }
    .select2-container--default .select2-selection--single .select2-selection__arrow {
        height: 35px !important;
        right: 6px !important;
        width: 30px;
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
    <script>
        $(document).ready(function() {
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
            
            // Notification function
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
        
            const urlParams = new URLSearchParams(window.location.search);
            const productId = urlParams.get('id');
            const flag = urlParams.get('flag') || '0';
            const baseImageUrl = "<?php echo $_SESSION['url']; ?>";
            const svgSuccess = '<svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="green" stroke-width="2"><path d="M22 11.08V12a10 10 0 1 1-5.93-9.14"></path><polyline points="22 4 12 14.01 9 11.01"></polyline></svg>';
            const svgError = '<svg class="mr-2" width="20" height="20" viewBox="0 0 24 24" fill="none" stroke="red" stroke-width="2"><circle cx="12" cy="12" r="10"></circle><line x1="12" y1="8" x2="12" y2="12"></line><line x1="12" y1="16" x2="12" y2="16"></line></svg>';
        
            let customerEmail = '';
            let customerName = '';
        
            CustomerListAddress();
            ProductPlaceOrder();
        
            // =======================
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
                            const isAddressIncomplete = !customer.permenant_address ||
                                customer.permenant_address.trim() === '' ||
                                customer.permenant_address === 'undefined' ||
                                !customer.district ||
                                customer.district.includes('Select District') ||
                                customer.district === 'undefined' ||
                                !customer.state ||
                                customer.state.includes('Select State') ||
                                customer.state === 'undefined' ||
                                !customer.postal_code ||
                                customer.postal_code === '0' ||
                                !customer.street ||
                                customer.street === 'undefined';
                            if (isAddressIncomplete) {
                                $('#billing-address-form').hide();
                                $('#add-address-btn-container').show();
                                $('#new-emails').val(customerEmail).prop('readonly', true).css('background-color', '#f8f9fa');
                                $('#new-fullname').val(customerName).prop('readonly', true).css('background-color', '#f8f9fa');
                            } else {
                                $('#funame').val(customer.customer_name || '');
                                $('#paddress').val(customer.permenant_address || '');
                                $('#street').val(customer.street || '');
                                $('#postalcode').val(customer.postal_code || '');
                                $('#country').val(customer.country || '');
                                $('#state').val(customer.state || '');
                                $('#district').val(customer.district || '');
                                $('#mobile').val(customer.mobile_no || '');
                                $('#wmobile').val(customer.whatsapp_no || '');
                                $('#email').val(customer.email_user_name || '');
                                $('#billing-address-form').show();
                                $('#add-address-btn-container').hide();
                                const addressFields = ['funame', 'paddress', 'street', 'postalcode', 'country', 'state', 'district', 'mobile', 'wmobile', 'email'];
                                addressFields.forEach(field => {
                                    $('#' + field).prop('readonly', true).css('background-color', '#f8f9fa');
                                });
                            }
                        } else {
                            $('#billing-address-form').hide();
                            $('#add-address-btn-container').show();
                            console.log('No customer data found.');
                        }
                    },
                    error: function() {
                        console.error('Error fetching customer details.');
                        $('#billing-address-form').hide();
                        $('#add-address-btn-container').show();
                    }
                });
            }
        
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
                var formData = {
                    action: 'update_customer_address',
                    customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>,
                    fullname: $('#new-fullname').val(),
                    permanentadd: $('#new-permanentadd').val(),
                    streets: $('#new-streets').val(),
                    pocode: $('#new-pocode').val(),
                    districts: $('#new-districts').val(),
                    states: $('#new-states').val(),
                    countrys: $('#new-countrys').val(),
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
                            $('#funame').val(formData.fullname);
                            $('#paddress').val(formData.permanentadd);
                            $('#street').val(formData.streets);
                            $('#postalcode').val(formData.pocode);
                            $('#country').val(formData.countrys);
                            $('#state').val(formData.states);
                            $('#district').val(formData.districts);
                            $('#mobile').val(formData.mobiles);
                            $('#wmobile').val(formData.whatsappnos);
                            $('#email').val(customerEmail);
                            $('#billing-address-form').show();
                            $('#new-address-form-container').hide();
                            $('#add-address-btn-container').hide();
                            const addressFields = ['funame', 'paddress', 'street', 'postalcode', 'country', 'state', 'district', 'mobile', 'wmobile', 'email'];
                            addressFields.forEach(field => {
                                $('#' + field).prop('readonly', true).css('background-color', '#f8f9fa');
                            });
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
                const urlParams = new URLSearchParams(window.location.search);
                const quantity = urlParams.get('quantity') || 1;
                
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
                        $('.tax, .cod-fee').remove();
                        
                        if (response && response.data && response.data.length > 0) {
                            const container = $('#cart-items-container');
                            container.empty();
                            let subtotal = 0;
                            let taxTotal = 0;
                            let codTotal = 0;
                            let taxPercentages = new Set();
                            
                            if (flag == '1') {
                                // CART MODE
                                const cartItems = response.data[0].cart_items.split(';;');
                                let totalMrp = 0;
                                let totalOffer = 0;
                                const vendorId = response.data[0].vendor_id || '';
                                let vendorCodMap = {};
                                
                                cartItems.forEach(item => {
                                    if (item) {
                                        const [name, price, quantity, image, productId, color, size, mrp, offer, vendor_id, tax_percentage, cod_fee] = item.split('||');
                                        
                                        const itemPrice = parseFloat(price) || 0;
                                        const itemQuantity = parseInt(quantity) || 1;
                                        const itemMrp = parseFloat(mrp) || 0;
                                        const itemOffer = parseFloat(offer) || itemPrice;
                                        const itemTaxPercentage = parseFloat(tax_percentage) || 0;
                                        const itemCodFee = parseFloat(cod_fee) || 0;
                                        
                                        const itemTotal = itemOffer * itemQuantity;
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
                                        
                                        const cartItemHTML = `
                                            <div class="cart-item style-1 mb-3">
                                                <div class="">
                                                    <img src="${baseImageUrl + image}" alt="${name}" style="max-width: 100px; height: auto;">
                                                </div>
                                                <div class="dz-content">
                                                    <h6 class="title mb-0">${name}</h6>
                                                    <div class="price-row">
                                                        <span class="price">${formatPrice(itemOffer)}</span>
                                                    </div>
                                                    <div class="quantity-row">
                                                        <span class="quantity">Quantity: ${itemQuantity}</span>
                                                    </div>
                                                    <div class="item-total">Total: ${formatPrice(itemTotal)}</div>
                                                    ${itemTaxPercentage > 0 ? `<div class="item-tax">Tax (${itemTaxPercentage}%): ${formatPrice(itemTax)}</div>` : ''}
                                                </div>
                                            </div>
                                        `;
                                        container.append(cartItemHTML);
                                    }
                                });
                                
                                codTotal = Object.values(vendorCodMap).reduce((sum, fee) => sum + fee, 0);
                                const savings = totalMrp - totalOffer;
                                const savingsHTML = `
                                    <div class="savings-row mt-3">
                                        <span class="savings">You will save ${formatPrice(savings)}</span><br>
                                        <del class="original-price">Total MRP: ${formatPrice(totalMrp)}</del>
                                    </div>
                                `;
                                container.append(savingsHTML);
                                
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
                                
                                $('#sub-total').text(formatPrice(subtotal));
                                
                                const taxText = taxPercentages.size === 1 ? 
                                    `Tax (${Array.from(taxPercentages)[0]}%)` : 'Taxes';
                                
                                $('.subtotal').after(`
                                    <tr class="tax">
                                        <td>${taxText}</td>
                                        <td class="price">${formatPrice(taxTotal)}</td>
                                    </tr>
                                    <tr class="cod-fee">
                                        <td>COD Fee</td>
                                        <td class="price">${formatPrice(codTotal)}</td>
                                    </tr>
                                `);
                                
                                const grandTotal = subtotal + taxTotal + codTotal;
                                $('#grand-total').text(formatPrice(grandTotal));
                                $('#final-total').text(formatPrice(grandTotal));
                            } else {
                                // SINGLE PRODUCT MODE
                                const product = response.data[0];
                                const amountMrp = parseFloat(product.amount_mrp) || 0;
                                const amountOffer = parseFloat(product.amount_offer) || parseFloat(product.amount_selling) || 0;
                                const taxPercentage = parseFloat(product.tax_percentage) || 0;
                                const codFee = parseFloat(product.cod_fee) || 0;
                                const productQuantity = parseInt(quantity) || 1;
                                
                                const productTotal = amountOffer * productQuantity;
                                const taxAmount = productTotal * (taxPercentage / 100);
                                const codAmount = codFee;
                                subtotal = productTotal;
                                taxTotal = taxAmount;
                                codTotal = codAmount;
                                
                                const discountPercent = amountMrp > 0 ? ((amountMrp - amountOffer) / amountMrp * 100).toFixed(0) : 0;
                                const vendorId = product.vendor_id || '';
                                
                                const productHTML = `
                                    <div class="cart-item style-1">
                                        <div class="dz-media">
                                            <img src="${product.product_image ? baseImageUrl + product.product_image : 'images/shop/product/default-product.jpg'}" 
                                                alt="${product.product_name}" style="max-width: 100px; height: auto;">
                                        </div>
                                        <div class="dz-content">
                                            <h6 class="title mb-0">${product.product_name}</h6>
                                            <div class="product-info-row">
                                                <span class="price">${formatPrice(amountOffer)}</span>
                                                ${amountMrp > amountOffer ? `<del class="original-price ml-2">${formatPrice(amountMrp)}</del>` : ''}
                                                ${discountPercent > 0 ? `<span class="discount ml-2">${discountPercent}% OFF</span>` : ''}
                                            </div>
                                            <div class="product-info-row">
                                                <span class="quantity">Quantity: ${productQuantity}</span>
                                            </div>
                                            <div class="product-info-row">
                                                <span class="item-total">Total: ${formatPrice(productTotal)}</span>
                                            </div>
                                            ${taxPercentage > 0 ? `<div class="product-info-row">
                                                <span class="item-tax">Tax (${taxPercentage}%): ${formatPrice(taxAmount)}</span>
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
                                    id: 'vendor-id',
                                    name: 'vendor_id',
                                    value: vendorId
                                }).appendTo('.order-detail');
                                
                                $('#sub-total').text(formatPrice(subtotal));
                                
                                $('.subtotal').after(`
                                    <tr class="tax">
                                        <td>Tax (${taxPercentage}%)</td>
                                        <td class="price">${formatPrice(taxTotal)}</td>
                                    </tr>
                                    <tr class="cod-fee">
                                        <td>COD Fee</td>
                                        <td class="price">${formatPrice(codTotal)}</td>
                                    </tr>
                                `);
                                
                                const grandTotal = subtotal + taxTotal + codTotal;
                                $('#grand-total').text(formatPrice(grandTotal));
                                $('#final-total').text(formatPrice(grandTotal));
                            }
                        } else {
                            console.log('No product data found.');
                            $('#cart-items-container').html('<p class="text-muted">No products found</p>');
                            // Also remove tax and COD rows when no products
                            $('.tax, .cod-fee').remove();
                            $('#sub-total').text(formatPrice(0));
                            $('#grand-total').text(formatPrice(0));
                            $('#final-total').text(formatPrice(0));
                        }
                    },
                    error: function(xhr, status, error) {
                        console.error('Error fetching product details:', error, xhr.responseText);
                        $('#cart-items-container').html('<p class="text-danger">Error loading products</p>');
                        $('.tax, .cod-fee').remove();
                    }
                });
            }
        
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
                                    <label for="fullname" class="form-label">Customer Name <span style="color:red">*</span></label>
                                    <input type="text" name="fullname" id="fullname" required class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="countrys" class="form-label">Country <span style="color:red">*</span></label>
                                    <select name="countrys" id="countrys" required class="form-select select2">
                                        <option disabled selected>Select Country</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="mobiles" class="form-label">Mobile Number <span style="color:red">*</span></label>
                                    <input type="text" name="mobiles" id="mobiles" required class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="states" class="form-label">State <span style="color:red">*</span></label>
                                    <select name="states" id="states" required class="form-select select2">
                                        <option disabled selected>Select State</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="whatsappnos" class="form-label">Whatsapp Number</label>
                                    <input type="text" name="whatsappnos" id="whatsappnos" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="districts" class="form-label">District <span style="color:red">*</span></label>
                                    <select name="districts" id="districts" required class="form-select select2">
                                        <option disabled selected>Select District</option>
                                    </select>
                                </div>
                                <div class="col-md-6">
                                    <label for="emails" class="form-label">Email Address <span style="color:red">*</span></label>
                                    <input type="email" name="emails" id="emails" required class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="streets" class="form-label">Street</label>
                                    <input type="text" name="streets" id="streets" class="form-control">
                                </div>
                                <div class="col-md-6">
                                    <label for="permanentadd" class="form-label">Permanent Address <span style="color:red">*</span></label>
                                    <textarea name="permanentadd" id="permanentadd" required class="form-control" rows="2"></textarea>
                                </div>
                                <div class="col-md-6">
                                    <label for="pocode" class="form-label">Postal Code <span style="color:red">*</span></label>
                                    <input type="text" name="pocode" id="pocode" required class="form-control">
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
        
                // Initialize Select2 for country/state/district
                $('#countrys').select2({
                    dropdownParent: $('#changeAddressModal'),
                    width: '100%',
                    placeholder: 'Select Country',
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
                    $('#states').select2({
                        dropdownParent: $('#changeAddressModal'),
                        width: '100%',
                        placeholder: 'Select State',
                        ajax: {
                            url: 'controller/orders_controller.php',
                            type: 'POST',
                            dataType: 'json',
                            delay: 250,
                            data: function(params) {
                                return {
                                    action: 'state_list',
                                    country_id: countryId
                                };
                            },
                            processResults: function(data) {
                                return { results: data.data || [] };
                            },
                            cache: true
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
                e.preventDefault();
                var formData = {
                    action: 'save_address',
                    customer_id: <?php echo $_SESSION['ids'] ?? 0; ?>,
                    fullname: $('#fullname').val(),
                    permanentadd: $('#permanentadd').val(),
                    streets: $('#streets').val(),
                    pocode: $('#pocode').val(),
                    districts: $('#districts').select2('data')[0]?.text || '',
                    states: $('#states').select2('data')[0]?.text || '',
                    countrys: $('#countrys').select2('data')[0]?.text || '',
                    mobiles: $('#mobiles').val(),
                    whatsappnos: $('#whatsappnos').val(),
                    emails: $('#emails').val()
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
                    const buttonText = isDefault ? 'Currently Selected' : 'Use This Address';
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
                            $('#email').val(address.email_address || '');
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
                const codChecked = $('#cod-checkbox').is(':checked');
                $('#submit-order-btn').prop('disabled', !(termsChecked && codChecked));
            }
        
            $('#terms-checkbox, #cod-checkbox').on('change', function() {
                checkSubmitButton();
            });
        
            $('#privacyPolicyModal').on('hidden.bs.modal', function() {
                checkSubmitButton();
            });
        
            $('#submit-order-btn').click(function(e) {
                e.preventDefault();
                const urlParams = new URLSearchParams(window.location.search);
                const flag = urlParams.get('flag') || '0';
                const urlQuantity = urlParams.get('quantity');
                const quantity = $('#quantity-input').val() || urlQuantity || 1;
                const color = $('input[name="product_color"]:checked').val() || urlParams.get('color') || '';
                const size = $('input[name="product_size"]:checked').val() || urlParams.get('size') || '';
                const length = urlParams.get('length') || '';
                const notes = urlParams.get('notes') || '';
        
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
        
                if (flag == '1') {
                    const cartItems = $('#selected-cart-items').val();
                    if (!cartItems) {
                        alert('No cart items found.');
                        return;
                    }
                    orderData.cart_items = cartItems;
                } else {
                    orderData.product_id = $('#selected-product-id').val();
                    orderData.quantity = quantity;
                    orderData.color = color;
                    orderData.size = size;
                    orderData.length = length;
                    orderData.notes = notes;
                }
        
                console.log('Submitting order data:', orderData);
        
                $.ajax({
                    url: 'controller/orders_controller.php',
                    type: 'POST',
                    data: orderData,
                    dataType: 'json',
                    contentType: 'application/x-www-form-urlencoded; charset=UTF-8',
                    success: function(response) {
                        if (response && response.status === 'success') {
                            setupDropdown('dropdownContent', 'success', svgSuccess + 'Order placed successfully! Order ID: ' + response.order_id, 'click');
                            window.location.href = '/OrderConfirmation?order_id=' + response.order_id;
                        } else {
                            setupDropdown('dropdownContent', 'error', svgError + (response.message || 'Unknown error occurred'), 'click');
                        }
                    },
                    error: function(xhr, status, error) {
                        try {
                            var response = JSON.parse(xhr.responseText);
                            alert('Error: ' + (response.message || 'Unknown error occurred'));
                        } catch (e) {
                            alert('Error submitting order. Please try again.');
                        }
                        console.error('AJAX Error:', status, error, xhr.responseText);
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
        });
    </script>
</body>
</html>