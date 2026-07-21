<!DOCTYPE html>
<html lang="en">

<head>
    <?php include("view/templates/head.php"); ?>

    <style>
    .shop-card.style-1 .product-tag .badge,
    .content-section .badge {
        position: absolute;
        top: 10px;
        left: 10px;
        background-color: #e53935;
        color: white;
        padding: 4px 8px;
        font-size: 12px;
        border-radius: 3px;
    }

    /* Product content */
    .shop-card.style-1 .dz-content {
        padding: 31px;
        display: flex;
        flex-direction: column;
        justify-content: space-between;
        height: 120px;
        box-sizing: border-box;
    }

    /* Title */
    .shop-card.style-1 .dz-content .title,
    .content-section .dz-content .title {
        font-size: 13px;
        font-weight: 600;
        margin-bottom: 8px;
        line-height: 1.2;
        height: 40px;
        overflow: hidden;
        text-overflow: ellipsis;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        color: #333;
    }

    /* Price */
    .shop-card.style-1 .dz-content .price,
    .content-section .price {
        font-size: 13px;
        font-weight: bold;
        color: #222;
    }

    .shop-card.style-1 .dz-content .original-price,
    .content-section .original-price {
        font-size: 15px;
        color: #999;
        text-decoration: line-through;
        margin-left: 8px;
    }

    /* Link wrapper */
    .product-card-link,
    .product-main-link {
        display: block;
        color: inherit;
        text-decoration: none;
    }

    .product-card-link:hover,
    .product-main-link:hover {
        color: inherit;
        text-decoration: none;
    }

    /* Search */
    .widget_search .input-group {
        display: flex;
        align-items: stretch;
    }

    .widget_search .form-control {
        border-right: 0;
        border-top-right-radius: 0;
        border-bottom-right-radius: 0;
    }

    .widget_search .search-btn {
        border-top-left-radius: 0;
        border-bottom-left-radius: 0;
        padding: 0 15px;
        display: flex;
        align-items: center;
        justify-content: center;
    }

    .widget_search .search-btn i {
        font-size: 16px;
        margin-right: 5px;
    }

    /* Wishlist */
    .dz-wishicon.active .dz-heart {
        display: none;
    }

    .search-btn2 {
        border-top-left-radius: 0 !important;
        border-bottom-left-radius: 0 !important;
    }

    #dzSearch2 {
        border-top-right-radius: 0 !important;
        border-bottom-right-radius: 0 !important;
    }

    .dz-wishicon.active .dz-heart-fill {
        display: inline-block;
        color: red;
    }

    /* Buttons */
    .btn-success {
        background-color: #28a745 !important;
        border-color: #28a745 !important;
        color: white !important;
    }

    .add-to-wishlist-btn[disabled] {
        opacity: 1 !important;
    }

    /* Filter */
    .filter-area {
        display: flex;
        justify-content: flex-start;
        margin-bottom: 20px;
    }

    #filterDropdown {
        position: absolute;
        z-index: 1000;
        min-width: 200px;
        border: 1px solid #ddd;
        border-radius: 8px;
        box-shadow: 0 2px 8px rgba(0, 0, 0, 0.1);
        display: none;
    }

    #filterDropdown.show {
        display: block;
    }

    .filter-option {
        width: 100%;
        text-align: left;
        padding: 10px 15px;
        font-size: 14px;
        color: #333;
        background: none;
        border: none;
        cursor: pointer;
    }

    .filter-option:hover {
        background-color: #f8f8f8;
    }

    .filter-option.active {
        font-weight: bold;
        color: #007bff;
    }

    /* Quick View Modal */
    .quick-view-modal .modal-dialog {
        max-width: 95vw;
        width: 100%;
        max-height: 90vh;
    }

    .quick-view-modal .modal-content {
        height: 90vh;
        display: flex;
        flex-direction: column;
    }

    .quick-view-modal .modal-body {
        display: flex;
        flex-direction: row;
        height: 100%;
        padding: 0;
        overflow: hidden;
    }

    /* Sections */
    .image-section,
    .content-section {
        height: 100%;
        overflow: hidden;
    }

    .image-section {
        width: 50%;
        background-size: cover;
        background-position: center;
        background-repeat: no-repeat;
        background-attachment: local;
        position: relative;
    }

    .content-section {
        width: 50%;
        overflow-y: auto;
        padding: 20px;
        box-sizing: border-box;
    }

    .content-section .dz-product-detail.style-2 {
        padding-right: 30px;
    }

    /* Color & Size Options */
    .color-option,
    .size-option {
        margin-right: 8px !important;
    }

    .color-selection,
    .size-selection {
        margin-bottom: 1rem;
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

    /* Quantity */
    .quantity-input {
        width: 80px;
        text-align: center;
    }

    /* Swiper */
    .swiper-container-wrapper {
        display: flex;
        flex-direction: row;
        align-items: flex-start;
        gap: 15px;
        height: 100%;
        min-height: 500px;
        position: relative;
    }

    .main-image-swiper,
    .main-image-swiper .swiper-slide {
        width: 100%;
        height: 100%;
        background: transparent;
    }

    .main-image-swiper img {
        max-height: 100%;
        max-width: 100%;
        object-fit: contain;
        box-shadow: 0 0 20px rgba(0, 0, 0, 0.1);
    }

    .thumbnail-swiper-vertical {
        width: 80px;
        height: 100%;
        overflow-y: auto;
        flex-shrink: 0;
        z-index: 2;
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

    .thumbnail-img {
        width: 100%;
        height: 80px;
        object-fit: cover;
        border: 1px solid #eee;
    }

    /* Swiper Nav Buttons */
    .swiper-button-next,
    .swiper-button-prev {
        color: #000;
        background: rgba(255, 255, 255, 0.7);
        width: 40px;
        height: 40px;
        border-radius: 50%;
        display: flex;
        align-items: center;
        justify-content: center;
        z-index: 2;
    }

    .swiper-button-next:after,
    .swiper-button-prev:after {
        font-size: 20px;
        font-weight: bold;
    }

    /* Responsive */
    @media (max-width: 992px) {
        .quick-view-modal .modal-body {
            flex-direction: column;
        }

        .image-section {
            width: 100%;
            height: 50vh;
            min-height: 300px;
        }

        .content-section {
            width: 100%;
            max-height: 40vh;
        }

        .thumbnail-swiper-vertical {
            width: 100%;
            height: 80px;
            overflow-x: auto;
            overflow-y: hidden;
            flex-direction: row;
        }

        .thumbnail-swiper-vertical .swiper-wrapper {
            flex-direction: row !important;
        }

        .thumbnail-swiper-vertical .swiper-slide {
            width: 80px !important;
            height: 100% !important;
        }

        .content-section .dz-product-detail.style-2 {
            padding-right: 15px;
        }

        .widget_search .search-btn {
            padding: 0 12px;
        }

        .widget_search .search-btn i {
            margin-right: 0;
        }
    }

    @media (max-width: 768px) {
        .quick-view-modal .modal-dialog {
            max-width: 100vw;
        }

        .image-section {
            height: 40vh;
            min-height: 250px;
        }

        .content-section {
            max-height: 50vh;
        }
    }

    .text-truncate-2 {
        overflow: hidden;
        display: -webkit-box;
        -webkit-line-clamp: 2;
        -webkit-box-orient: vertical;
        line-height: 1.2rem;
        max-height: 2.4rem;
        /* 2 lines */
        font-size: 0.95rem;
        margin-bottom: 0.25rem;
    }

    .price-block {
        margin-top: 0 !important;
    }
    </style>
</head>

<body id="bg">
    <div class="page-wraper">
        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>

        <?php include("view/templates/header.php"); ?>
        <div id="dropdownContent" style="text-align:center;"></div>

        <div class="page-content bg-light">
            <?php include("view/pages/shop/shop_body.php"); ?>
        </div>

        <?php include("view/templates/footer.php"); ?>
        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
    </div>
    <?php include("view/templates/scripts.php"); ?>
    <script>
    $(document).ready(function() {

        let currentSort = 'Price Sort';

        $('#filterBtn').on('click', function(e) {
            e.stopPropagation();
            $('#filterDropdown').toggleClass('show');
        });


        $('.filter-option').on('click', function() {
            const selectedSort = $(this).data('sort');
            currentSort = selectedSort;
            console.log("Filter changed to: " + currentSort);
            $('.filter-option').removeClass('active');
            $(this).addClass('active');
            $('#filterDropdown').removeClass('show');
            const searchTerm = $('#dzSearch2').val().trim();
            if (searchTerm.length > 0) {
                searchProducts(searchTerm);
            } else {
                loadProducts();
            }
        });

        $(document).on('click', function(e) {
            if (!$(e.target).closest('#filterBtn, #filterDropdown').length) {
                $('#filterDropdown').removeClass('show');
            }
        });

        $('#searchButton').on('click', function() {
            performSearch();
            console.log("Search button clicked");
        });


        $('#dzSearch2').on('keypress', function(e) {
            if (e.which === 13) {
                performSearch();
            }
        });


        // $('.filter-option').change(function() {
        //     currentSort = $(this).val();
        //     const searchTerm = $('#dzSearch2').val().trim();
        //     if (searchTerm.length > 0) {
        //         searchProducts(searchTerm);
        //     } else {
        //         loadProducts();
        //     }
        //     console.log("Filter changed to: " + currentSort);
        // }); 
        const params = new URLSearchParams(window.location.search);
        const catId = params.get('cat_id');
        loadProducts(catId);

        // loadProducts();



        function loadProducts(cat_id = null) {


            // Build filters object


            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'get_products',
                    sort: currentSort,
                    cat_id: cat_id

                },
                dataType: 'json',
                beforeSend: function() {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Loading products...</p></div>'
                    );
                },
                success: function(response) {
                    if (response.status === 'success') {
                        renderProducts(response.data);
                        $('.page-text').text(
                            `Showing 1–${response.data.length} Of ${response.total} Results`);
                    } else {
                        $('#product-grid-container').html(
                            '<div class="col-12 text-center py-5"><div class="alert alert-danger">' +
                            response.message + '</div></div>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error loading products. Please try again later.</div></div>'
                    );
                    console.error(error);
                }
            });
        }

        $(document).on('click', '.header-item-search .search-btn', function(e) {
            e.preventDefault();
            performSearchHeader();
            console.log("Search button clicked in header");
        });

        $(document).on('keypress', '.header-item-search input[name="dzSearch"]', function(e) {
            if (e.which === 13) {
                e.preventDefault();
                performSearchHeader();
            }
        });

        function performSearchHeader() {
            const searchTerm = $('.header-item-search input[name="dzSearch"]').val().trim();
            if (searchTerm.length > 0) {
                const offcanvasElement = document.getElementById('offcanvasTop');
                if (offcanvasElement) {
                    const offcanvas = bootstrap.Offcanvas.getInstance(offcanvasElement);
                    if (offcanvas) {
                        offcanvas.hide();
                    }
                }
                searchProductsHeader(searchTerm);
            } else {
                loadProducts();
            }
        }

        function searchProductsHeader(searchTerm) {
            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'search_products',
                    search_term: searchTerm,
                    sort: currentSort
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Searching products...</p></div>'
                    );
                },
                success: function(response) {
                    if (response.status === 'success') {
                        renderProducts(response.data);
                        $('.filter-left-area span').text(
                            `Showing ${response.data.length} results for "${searchTerm}"`
                        );
                    } else {
                        $('#product-grid-container').html(
                            `<div class="col-12 text-center py-5"><div class="alert alert-info">${response.message}</div></div>`
                        );
                        $('.filter-left-area span').text(`No results found for "${searchTerm}"`);
                    }
                },
                error: function(xhr, status, error) {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error searching products. Please try again later.</div></div>'
                    );
                    console.error(error);
                }
            });
        }

        //search2
        // $(document).on('click', '#filterArea #searchButton', function(e) {
        //     e.preventDefault(); // Prevent default button behavior
        //     console.log('Search button clicked');
        //     performSearch();
        // });

        $(document).on('keypress', '.widget_search input[name="dzSearch"]', function(e) {
            if (e.which === 13) { // Enter key
                e.preventDefault(); // Prevent form submission
                performSearch();
            }
        });

        function performSearch() {
            const searchTerm = $('#dzSearch2').val().trim();
            console.log(searchTerm);
            if (searchTerm.length > 0) {
                searchProducts(searchTerm);
            } else {
                loadProducts();
            }
        }



        function searchProducts(searchTerm) {
            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'search_products',
                    search_term: searchTerm,
                    sort: currentSort
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Searching products...</p></div>'
                    );
                },
                success: function(response) {
                    if (response.status === 'success') {
                        renderProducts(response.data);
                        // Update the results count
                        $('.filter-left-area span').text(
                            `Showing ${response.data.length} results for "${searchTerm}"`);
                    } else {
                        $('#product-grid-container').html(
                            `<div class="col-12 text-center py-5"><div class="alert alert-info">${response.message}</div></div>`
                        );
                        $('.filter-left-area span').text(`No results found for "${searchTerm}"`);
                    }
                },
                error: function(xhr, status, error) {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error searching products. Please try again later.</div></div>'
                    );
                    console.error(error);
                }
            });
        }



        $(document).on('click', '.dz-wishicon', function(e) {
            e.preventDefault();
            const wishIcon = $(this);
            const productId = wishIcon.closest('.shop-card').find('.product-main-link').attr('href')
                .split('id=')[1];
            if (!productId) {
                alert('Product ID is missing');
                return;
            }
            if (wishIcon.hasClass('active')) {
                removeFromWishlistt(productId, wishIcon);
            } else {
                addToWishlistt(productId, wishIcon);
            }
        });

        function addToWishlistt(productId, wishIcon) {
            $.ajax({
                url: 'controller/wishlist_controller.php',
                type: 'POST',
                data: {
                    action: 'add_to_wishlist',
                    product_id: productId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        wishIcon.addClass('active');
                        setupDropdown('dropdownContent', 'success', svgSuccess + response.message,
                            'click');
                        $(document).trigger('wishlistUpdated');
                        return;
                    } else if (response.status === 'exists') {
                        setupDropdown('dropdownContent', 'warning', svgError + response.message,
                            'click');
                    } else if (response.status === 'redirect') {
                        window.location.href = response.redirect_url;
                    } else {
                        alert(response.message || 'Error adding product to wishlist');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error adding to wishlist:', error);
                    alert('An error occurred while adding the product to the wishlist.');
                }
            });
        }

        function removeFromWishlistt(productId, wishIcon) {
            $.ajax({
                url: 'controller/wishlist_controller.php',
                type: 'POST',
                data: {
                    action: 'remove_wishlist_item_from_shop',
                    product_id: productId
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        wishIcon.removeClass('active');
                        setupDropdown('dropdownContent', 'warning', svgError + response.message,
                            'click');
                        $(document).trigger('wishlistUpdated');
                    } else {
                        alert(response.message || 'Error removing product from wishlist');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error removing from wishlist:', error);
                    alert('An error occurred while removing the product from the wishlist.');
                }
            });
        }

        function renderProducts(products) {
            let html = '';
            products.forEach(product => {
                const originalPrice = parseFloat(product.amount_mrp);
                const sellingPrice = parseFloat(product.amount_selling);
                const discount = originalPrice > sellingPrice ?
                    Math.round(((originalPrice - sellingPrice) / originalPrice) * 100) : 0;
                const productImage = product.product_image ?
                    'https://shopping.sandslab.com/assets/img/products/' + product.product_image :
                    'images/shop/product/default-product.jpg';
                html += `
                    <div class="col-6 col-xl-2 col-lg-3 col-md-4 col-sm-6 m-md-b15 m-b30">
                        <div class="shop-card style-1">
                            <div class="dz-media">
                                ${discount > 0 ? `
                                <span class="badge bg-danger position-absolute top-0 start-0 m-2" style="z-index: 1;">
                                    ${discount}% OFF
                                </span>` : ''}
                                <a href="https://shoppingweb.sandslab.com/ProductDetails?id=${product.ids}" id="product_link" class="product-main-link">
                                    <img src="${productImage}" alt="${product.product_name}">
                                </a>
                                <div class="shop-meta">
                                    <a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded quick-view-btn" data-product-id="${product.ids}">
                                        <i class="fa-solid fa-eye d-md-none d-block"></i>
                                        <span class="d-md-block d-none">Quick View</span>
                                    </a>
                                    <div class="btn btn-primary meta-icon dz-wishicon" data-product-id="${product.ids}">
                                        <i class="icon feather icon-heart dz-heart"></i>
                                        <i class="icon feather icon-heart-on dz-heart-fill"></i>
                                    </div>
                                </div>
                            </div>
                            <div class="dz-content">
                                <h6 class="title mb-0 text-truncate-2">
                                    <a href="https://shoppingweb.sandslab.com/ProductDetails?id=${product.ids}">
                                        ${product.product_name}
                                    </a>
                                </h6>
                                <div class="price-block d-flex align-items-center gap-2 flex-wrap">
                                    <h5 class="price mb-0 text-primary fw-bold">
                                        ₹${Number.isInteger(sellingPrice) ? sellingPrice : sellingPrice.toFixed(2)}
                                    </h5>
                                    ${originalPrice > sellingPrice ? `
                                    <h6 class="original-price mb-0 text-muted">
                                        <del>₹${Number.isInteger(originalPrice) ? originalPrice : originalPrice.toFixed(2)}</del>
                                    </h6>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
            $('#product-grid-container').html(html);
            $('.dz-wishicon').each(function() {
                const wishIcon = $(this);
                const productId = wishIcon.data('product-id');
                if (productId) {
                    checkWishlistStatus(productId, wishIcon);
                }
            });

            $(document).on('click', '.quick-view-btn', function(e) {
                e.preventDefault();
                e.stopPropagation();
                const productId = $(this).data('product-id');
                loadProductDetails(productId);
            });

            $(document).on('click', '.shop-card-wrapper', function(e) {
                if ($(e.target).closest('.shop-meta .btn, .quick-view-btn').length) {
                    return;
                }
                window.location = $(this).find('.product-main-link').attr('href');
            });
        }

        function checkWishlistStatus(productId, wishIcon) {
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
                        wishIcon.addClass('active');
                    } else {
                        wishIcon.removeClass('active');
                    }
                },
                error: function(xhr, error) {
                    console.error('Error checking wishlist status:', error);
                }
            });
        }

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
                    $('#quickViewModal .modal-body').html(
                        '<div class="text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Loading product details...</p></div>'
                    );
                    $('#quickViewModal').modal('show');
                },
                success: function(response) {
                    if (response.status === 'success') {
                        showQuickViewModal(response.data);
                    } else {
                        $('#quickViewModal .modal-body').html(
                            '<div class="alert alert-danger">' + response.message + '</div>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    $('#quickViewModal .modal-body').html(
                        '<div class="alert alert-danger">Error loading product details.</div>'
                    );
                    console.error(error);
                }
            });
        }

        function showQuickViewModal(product) {
            const getProductImageUrl = (imageName) => {
                return imageName ?
                    `https://shopping.sandslab.com/assets/img/products/${imageName}` :
                    'images/product/default-product.jpg';
            };

            const originalPrice = parseFloat(product.amount_mrp) || 0;
            const sellingPrice = parseFloat(product.amount_selling) || 0;
            const discount = originalPrice > sellingPrice ?
                Math.round(((originalPrice - sellingPrice) / originalPrice) * 100) : 0;

            const primaryImage = product.images?.length > 0 ?
                getProductImageUrl(product.images[0]) :
                getProductImageUrl(null);

            const generateImageSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <div class="dz-media DZoomImage">
                                <a class="mfp-link lg-item" href="${primaryImage}" data-src="${primaryImage}">
                                    <i class="feather icon-maximize dz-maximize top-right"></i>
                                </a>
                                <img src="${primaryImage}" alt="${product.product_name}">
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
                                <img src="${imgUrl}" alt="${product.product_name}">
                            </div>
                        </div>
                    `;
                }).join('');
            };

            const generateThumbSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <img src="${primaryImage}" alt="${product.product_name}" class="thumbnail-img">
                        </div>
                    `;
                }

                return product.images.map(image => {
                    const imgUrl = getProductImageUrl(image);
                    return `
                        <div class="swiper-slide">
                            <img src="${imgUrl}" alt="${product.product_name}" class="thumbnail-img">
                        </div>
                    `;
                }).join('');
            };

            const generateSizeOptions = () => {
                if (!product.sizes || product.sizes.length === 0) {
                    return '<p class="text-muted">No sizes available</p>';
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
                if (!product.colors || product.colors.length === 0) {
                    return '<p class="text-muted">No colors available</p>';
                }

                const colorMap = {
                    'BLUE': {
                        code: '#0000FF',
                        text: 'Blue'
                    },
                    'GREEN': {
                        code: '#008000',
                        text: 'Green'
                    },
                    'RED': {
                        code: '#FF0000',
                        text: 'Red'
                    },
                    'BLACK': {
                        code: '#000000',
                        text: 'Black'
                    },
                    'WHITE': {
                        code: '#FFFFFF',
                        text: 'White',
                        border: '1px solid #ddd'
                    },
                    'YELLOW': {
                        code: '#FFFF00',
                        text: 'Yellow'
                    },
                    'PURPLE': {
                        code: '#800080',
                        text: 'Purple'
                    },
                    'PINK': {
                        code: '#FFC0CB',
                        text: 'Pink'
                    },
                    'ORANGE': {
                        code: '#FFA500',
                        text: 'Orange'
                    },
                    'GRAY': {
                        code: '#808080',
                        text: 'Gray'
                    }
                };

                return product.colors.map((color, index) => {
                    const colorName = color.toUpperCase();
                    const colorData = colorMap[colorName] || {
                        code: '#CCCCCC',
                        text: color
                    };
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

            const modalContent = `
                <div class="image-section">
                ${discount > 0 ? `<span class="badge bg-secondary position-absolute" style="top: 10px; right: 10px; z-index: 10;">SALE ${discount}% Off</span>` : ''}
    
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
                <div class="content-section">
                    <div class="dz-product-detail style-2 ps-xl-3 ps-0 pt-2 mb-0">
                        <div class="dz-content">
                            <div class="dz-content-footer">
                                <div class="dz-content-start">
                                    <h4 class="title mb-1">${product.product_name}</h4>
                                </div>
                            </div>
                            <p class="para-text" style="text-align: justify;">${product.product_description || 'No description available.'}</p>
                            <div class="mb-3 color-selection">
                                <h6 class="mb-2">Color:</h6>
                                <div class="color-options-container">
                                    ${generateColorOptions()}
                                </div>
                            </div>
                            <div class="mb-3 size-selection">
                                <h6 class="mb-2">Size:</h6>
                                <div class="size-options-container">
                                    ${generateSizeOptions()}
                                </div>
                            </div>
                            <div class="meta-content m-b20 d-flex align-items-end">
                                <div class="me-3">
                                    <span class="form-label">Price</span>
                                    <span class="price">$${sellingPrice.toFixed(2)} 
                                        ${originalPrice > sellingPrice ? `<del>$${originalPrice.toFixed(2)}</del>` : ''}
                                    </span>
                                </div>
                                <div class="btn-quantity light me-0">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" min="1" value="1" name="quantity" class="form-control quantity-input">
                                </div>
                            </div>
                            <div class="cart-btn">
                                <button class="btn btn-primary btn-lg add-to-cart-btn">
                                    <i class="fas fa-shopping-cart me-2"></i>Add To Cart
                                </button>
                                <button class="btn btn-outline-secondary btn-lg add-to-wishlist-btn">
                                    <i class="fas fa-heart me-2"></i>Add To Wishlist
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;

            checkQuickViewWishlistStatus(product.ids);
            $('#quickViewModal .modal-body').html(modalContent);

            setTimeout(() => {
                const thumbSwiper = new Swiper('.thumbnail-swiper-vertical', {
                    direction: 'vertical',
                    slidesPerView: 4,
                    spaceBetween: 10,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        0: {
                            slidesPerView: 3,
                            direction: 'horizontal'
                        },
                        768: {
                            slidesPerView: 4,
                            direction: 'vertical'
                        }
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
                        swiper: thumbSwiper
                    },
                    on: {
                        slideChange: function() {
                            const activeSlide = this.slides[this.activeIndex];
                            const imgSrc = activeSlide.querySelector('img').src;
                            $('.image-section').css({
                                'background-image': `url(${imgSrc})`,
                                'background-size': 'cover',
                                'background-position': 'center'
                            });
                        }
                    }
                });

                // Set initial background image
                const initialImgSrc = $('.main-image-swiper .swiper-slide-active img').attr('src');
                $('.image-section').css({
                    'background-image': `url(${initialImgSrc})`,
                    'background-size': 'cover',
                    'background-position': 'center'
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

                $('.add-to-cart-btn').on('click', function() {
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
                                loadHeaderCounts();
                                setupDropdown('dropdownContent', 'success',
                                    svgSuccess + response.message, 'click');
                            } else {
                                setupDropdown('dropdownContent', 'warning',
                                    svgError + response.message, 'click');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert(
                                'An error occurred while adding the product to the cart.'
                            );
                        }
                    });
                });

                $('.add-to-wishlist-btn').on('click', function() {
                    const selectedColor = $('input[name="productColor"]:checked').val();
                    const selectedSize = $('input[name="productSize"]:checked').val();

                    $.ajax({
                        url: 'controller/wishlist_controller.php',
                        type: 'POST',
                        data: {
                            action: 'add_to_wishlist',
                            product_id: product.ids,
                            color: selectedColor,
                            size: selectedSize
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'redirect') {
                                window.location.href = response.redirect_url;
                            } else if (response.status === 'success' || response
                                .status === 'exists') {
                                $('.add-to-wishlist-btn')
                                    .html(
                                        '<i class="fas fa-check me-2"></i>In Wishlist'
                                    )
                                    .prop('disabled', true)
                                    .removeClass('btn-outline-secondary')
                                    .addClass('btn-success');
                                setupDropdown('dropdownContent', 'success',
                                    svgSuccess + response.message, 'click');
                                $(document).trigger('wishlistUpdated');
                            } else {
                                setupDropdown('dropdownContent', 'warning',
                                    svgError + response.message, 'click');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            alert(
                                'An error occurred while adding to the wishlist.'
                            );
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
                            .html('<i class="fas fa-check me-2"></i>In Wishlist')
                            .prop('disabled', true)
                            .removeClass('btn-outline-secondary')
                            .addClass('btn-success');
                    } else {
                        $('#quickViewModal .add-to-wishlist-btn')
                            .html('<i class="fas fa-heart me-2"></i>Add to Wishlist')
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

        function showAlert(message) {
            alert(message);
        }

        function addToCart(productData) {
            console.log('Adding to cart:', productData);
        }

        function addToWishlist(productData) {
            console.log('Adding to wishlist:', productData);
        }
    });
    </script>
</body>

</html>