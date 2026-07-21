<br><br><br>
<div class="page-content bg-light">
    <!-- Breadcrumb will be updated dynamically -->
    <div class="d-sm-flex justify-content-between container-fluid py-3">
        <nav aria-label="breadcrumb" class="breadcrumb-row">
            <ul class="breadcrumb mb-0">
                <li class="breadcrumb-item"><a href="/" data-i18n="home">Home</a></li>
                <li class="breadcrumb-item"><a id="category-link"></a></li>
                <li class="breadcrumb-item" id="product-name-breadcrumb"></li>
            </ul>
        </nav>
    </div>
    <br>

    <section class="content-inner py-0">
        <div class="container-fluid">
            <div class="row">
                <!-- Product Gallery Column -->
                <div class="col-xl-4 col-md-4">
                    <div class="dz-product-detail sticky-top">
                        <div class="swiper-btn-center-lr position-relative">
                            
                            <!-- ADD THIS LOADER OVERLAY -->
                            <div class="product-gallery-loader" id="productGalleryLoader" style="position: absolute; top: 0; left: 0; width: 100%; height: 100%; background: rgba(255,255,255,0.9); z-index: 1000; display: flex; align-items: center; justify-content: center; border-radius: 12px;">
                                <div class="loader-content text-center">
                                    <img src="images/loading.gif" alt="Loading images..." style="width: 80px; height: 80px;">
                                    <p class="mt-2" data-i18n="loading_images">Loading images...</p>
                                </div>
                            </div>
                            
                            <!-- Wishlist Heart Icon -->
                            <div class="position-absolute" style="top: 15px; right: 15px; z-index: 100;">
                                <button class="add-to-wishlist-btn btn p-2 rounded-0" 
                                        data-product-id="" 
                                        style="width: 45px; height: 45px; display: flex; align-items: center; justify-content: center; background: transparent; border: none;">
                                    <i class="icon feather icon-heart" style="font-size: 24px; color: #333; transition: color 0.3s ease;"></i>
                                </button>
                            </div>
                            
                            <!-- Main Image Swiper -->
                            <div class="swiper product-gallery-swiper2 rounded">
                                <div class="swiper-wrapper" id="lightgallery2">
                                    <!-- Images will be populated by JavaScript -->
                                </div>
                            </div>
                            <!-- Thumbnail Swiper -->
                            <div class="swiper product-gallery-swiper thumb-swiper-lg">
                                <div class="swiper-wrapper">
                                    <!-- Thumbnails will be populated by JavaScript -->
                                </div>
                            </div>
                        </div>
                    </div>
                </div>

                <div class="col-xl-8 col-md-8">
                    <div class="row">
                        <div class="col-xl-7">
                            <div class="dz-product-detail style-2 p-t20 ps-0">
                                <div class="dz-content">
                                    <div class="dz-content-footer">
                                        <div class="dz-content-start">
                                            <span class="badge bg-secondary mb-2" id="discount-badge"></span>
                                            <h4 class="title mb-1" id="product-title"></h4>
                                        </div>
                                    </div>
                                    <p class="prose" id="product-description"></p>
                                    <div class="product-num">
                                        <div class="d-block">
                                            <label class="form-label" data-i18n="size">Size</label>
                                            <div class="btn-group product-size m-0" id="size-options">
                                            </div>
                                        </div>
                                    </div>

                                    <div class="product-colors">
                                        <label class="form-label" data-i18n="color">Color</label>
                                        <div class="d-flex align-items-center flex-wrap color-filter" id="color-options">
                                            <!-- Color options will be inserted here by JavaScript -->
                                        </div>
                                    </div>
                                    
                                    <!-- Length Dropdown -->
                               
                                    <div class="product-length mt-1">
                                        <label class="form-label d-block mb-2" data-i18n="length" >Length</label>
                                        
                                        <div class="btn-group length-options" role="group" aria-label="Length selection">
                                            <!-- Options will be injected here via JavaScript -->
                                        </div>
                                    </div>
									
									<br>
									
                                    <!-- Additional Requirements Text Box -->
                                    <div class="additional-requirements">
                                        <label class="form-label" data-i18n="">Other Specifications (if any)</label>
                                        <textarea 
                                            class="form-control" 
                                            id="additional-requirements" 
                                            name="additional_requirements" 
                                            rows="3" 
                                            placeholder="enter specificaions"
                                            maxlength="500"
                                            data-i18n-placeholder="additional_requirements_placeholder"
                                        ></textarea>
                                        <h6><small class="text-muted" data-i18n="max_characters" style="font-size:10px;">Maximum 500 characters</small></h6>
                                    </div>
                                    
                                    <br>
                                    <!-- Replace this entire block -->
                                    <div class="product-quantity mb-3">
                                        <label class="form-label" data-i18n="quantity">Quantity</label>
                                        
                                        <div class="quantity-selector d-flex align-items-center gap-0">
                                            <button type="button" class="btn-quantity-decrement btn btn-outline-secondary rounded-0 px-3 py-0" style="border-right : 0px;">-</button>
                                            
                                            <input type="number" 
                                                   id="quantity-input" 
                                                   name="quantity" 
                                                   class="form-control text-center rounded-0" 
                                                   min="1" 
                                                   value="1" 
                                                   style="width: 60px; height: 42px;">
                                                   
                                            <button type="button" class="btn-quantity-increment btn btn-outline-secondary rounded-0 px-3 py-0" style="border-left : 0px;">+</button>
                                        </div>
                                    </div>
                                    
                                    
                                    <br><br>
                                    <!-- Product Metadata -->
                                    <div class="dz-info">
                                        <!--<ul>-->
                                        <!--    <li><strong>SKU:</strong></li>-->
                                        <!--    <li id="product-sku"></li>-->
                                        <!--</ul>-->
                                        <ul id="category-info">
                                            <!-- Categories will be populated by JavaScript -->
                                        </ul>
                                        <ul id="brand-info">
                                            <!-- Brand will be populated if available -->
                                        </ul>
                                        <ul id="warranty-info">
                                            <!-- Warranty will be populated if available -->
                                        </ul>
                                        <ul id="vendor-info">
                                            <!-- Vendor will be populated if available -->
                                        </ul>
                                        <!-- Social Sharing -->
                                        <ul class="social-icon">
                                            <li><strong data-i18n="share">Share:</strong></li>
                                            <li>
                                                <a href="https://www.facebook.com/sharer/sharer.php?u=" target="_blank">
                                                    <i class="fa-brands fa-facebook-f"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://twitter.com/intent/tweet?url=" target="_blank">
                                                    <i class="fa-brands fa-twitter"></i>
                                                </a>
                                            </li>
                                            <li>
                                                <a href="https://www.instagram.com/" target="_blank">
                                                    <i class="fa-brands fa-instagram"></i>
                                                </a>
                                            </li>
                                        </ul>
                                    </div>
                                </div>
                            </div>
                        </div>

                        <!-- Cart/Order Section -->
                        <div class="col-xl-5">
                            <div class="cart-detail">
                                <div class="info-box m-b20">
                                    <h6 class="dz-title" data-i18n="premium_quality_products">Premium Quality Products</h6>
                                    <p data-i18n="premium_quality_description">Explore our handpicked range of high-quality products, crafted for durability and style to meet your needs.</p>
                                </div>
                                <!--<div class="info-box m-b20">-->
                                <!--    <h6 class="dz-title" data-i18n="cash_on_delivery">Cash on Delivery</h6>-->
                                <!--    <p data-i18n="cod_description">Shop worry-free with our secure Cash on Delivery option, making payments simple and convenient.</p>-->
                                <!--</div>-->
                                <div class="info-box m-b30">
                                    <h6 class="dz-title" data-i18n="satisfaction_guaranteed">Satisfaction Guaranteed</h6>
                                    <p data-i18n="satisfaction_description">We're committed to your happiness. Reach out to us anytime for support with your purchase!</p>
                                </div>
                                <table>
                                    <tbody>
                                        <tr class="total">
                                            <td>
                                                <h6 class="mb-0" data-i18n="actual_price">Actual Price</h6>
                                            </td>
                                            <td class="price" id="actual-price">
                                                <!-- Will be populated by JavaScript -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <div class="save-text">
                                    <i class="icon feather icon-check-circle"></i>
                                    <h6><span class="m-l10" id="savings-text" style="font-size: 15px;"></span></h6>
                                </div>
                                <table>
                                    <tbody>
                                        <tr class="total">
                                            <td>
                                                <h6 class="mb-0" data-i18n="total">Total</h6>
                                            </td>
                                            <td class="price" id="total-price">
                                                <!-- Will be populated by JavaScript -->
                                            </td>
                                        </tr>
                                    </tbody>
                                </table>
                                <!--<button class="btn btn-dark w-100 btn-icon m-b20 add-to-wishlist-btn">-->
                                <!--    <i class="icon feather icon-heart"></i>-->
                                <!--    <span data-i18n="add_to_wishlist">Add To Wishlist</span>-->
                                <!--</button>-->
                                <div>
                                    <button type="button" class="btn btn-dark w-100 add-to-cart-btn">
                                        <span data-i18n="add_to_cart">ADD TO CART</span>
                                    </button>
                                </div>
                                <div class="mt-3">
                                    <button type="button" class="btn btn-dark w-100 place-order-btn">
                                        <span data-i18n="place_order">PLACE ORDER</span>
                                    </button>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>

    <!-- Product Description Tabs -->
    <section class="content-inner-3 pb-0">
        <div class="container">
            <div class="product-description">
                <div class="dz-tabs">
    
                    <!-- Tabs -->
                    <ul class="nav nav-tabs justify-content-center" id="myTab1" role="tablist">
                        <li class="nav-item" role="presentation">
                            <button class="nav-link active" id="description-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#description-tab-pane"
                                type="button"
                                role="tab"
                                aria-controls="description-tab-pane"
                                aria-selected="true">
                                <span data-i18n="product_specifications">Specifications</span>
                            </button>
                        </li>
    
                        <!-- REVIEW TAB (COMMENTED FOR FUTURE USE)
                        <li class="nav-item" role="presentation">
                            <button class="nav-link" id="reviews-tab"
                                data-bs-toggle="tab"
                                data-bs-target="#reviews-tab-pane"
                                type="button"
                                role="tab"
                                aria-controls="reviews-tab-pane"
                                aria-selected="false">
                                <span data-i18n="reviews">Reviews</span>
                            </button>
                        </li>
                        -->
    
                    </ul>
    
                    <!-- Tab Content -->
                    <div class="tab-content" id="myTabContent">
    
                        <!-- Description -->
                        <div class="tab-pane fade show active"
                            id="description-tab-pane"
                            role="tabpanel"
                            aria-labelledby="description-tab"
                            tabindex="0">
    
                            <div class="detail-bx text-center">
                                <h5 class="title" id="description-title"></h5>
                                <div id="full-description" class="mx-auto" style="max-width: 800px;"></div>
                            </div>
    
                        </div>
    
                        <!-- REVIEW CONTENT (COMMENTED FOR FUTURE USE)
                        <div class="tab-pane fade"
                            id="reviews-tab-pane"
                            role="tabpanel"
                            aria-labelledby="reviews-tab"
                            tabindex="0">
    
                            <div class="text-center py-5">
                                <p data-i18n="no_reviews">
                                    No reviews yet. Be the first to review this product!
                                </p>
                            </div>
    
                        </div>
                        -->
    
                    </div>
    
                </div>
            </div>
        </div>
    </section>


    <!-- Related Products Section -->
    <section class="content-inner-1 overflow-hidden related-products-section">
        <div class="container">
            <div class="section-head style-2 d-md-flex justify-content-between align-items-center">
                <div class="left-content">
                    <h2 class="title mb-0" data-i18n="related_products">Related products</h2>
                </div>
                <a href="Shop" class="text-secondary font-14 d-flex align-items-center gap-1">
                    <h6><span data-i18n="" style="font-size:12px;">See all products</span> </h6>
                    <i class="icon feather icon-chevron-right font-18"></i>
                </a>
            </div>
            <div class="swiper-btn-center-lr">
                <div class="swiper swiper-four">
                    <div class="swiper-wrapper">
                        <!-- Related products will be populated here by JavaScript -->
                    </div>
                </div>
                <div class="pagination-align">
                    <div class="tranding-button-prev btn-prev">
                        <i class="flaticon flaticon-left-chevron"></i>
                    </div>
                    <div class="tranding-button-next btn-next">
                        <i class="flaticon flaticon-chevron"></i>
                    </div>
                </div>
            </div>
        </div>
    </section>
</div>

<div class="modal fade" id="loginModal" tabindex="-1" aria-labelledby="loginModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="loginModalLabel" data-i18n="login_required">Login Required</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <p data-i18n="login_message">To proceed with your order, please login or create an account.</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-i18n="close">Close</button>
                <a href="Login?redirect=<?php echo urlencode($_SERVER['REQUEST_URI']); ?>" class="btn btn-primary" data-i18n="login_register">Login / Register</a>
            </div>
        </div>
    </div>
</div>

<!-- Floating Size Chart Button -->
<div class="size-chart-float-btn" id="sizeChartBtn">
    <i class="fas fa-ruler"></i>
    <span data-i18n="size_guide">SIZE GUIDE</span>
</div>

<div class="size-chart-sidebar" id="sizeChartSidebar" style="z-index: 99999;">
    <div class="size-chart-header">
        <h3 class="size-chart-title" style="color: white;">Loading...</h3>
        <button class="close-sidebar" id="closeSidebar">&times;</button>
    </div>
    
    <div class="size-chart-content">

        <!-- Loader -->
        <div class="size-chart-loader" id="sizeChartLoader">
            <div class="loader-content text-center">
                <img src="images/loading.gif" alt="Loading..." style="width:250px; height:250px;">
            </div>
        </div>

        <!-- ✅ ONLY ADD THIS WRAPPER -->
        <div class="size-chart-main">

            <!-- Bilingual Introduction -->
            <div class="text-center mb-4">
                <p class="mb-2 english-text">
                    <span class="size-chart-description-en"></span>
                </p>
                <p class="arabic-text" style="font-family: 'Amiri', serif; direction: rtl;">
                    <span class="size-chart-description-ar"></span>
                </p>
            </div>

            <!-- Size Table 1 -->
            <div class="table-responsive mb-4">
                <h4 class="mb-3 size-table-title">
                    <span data-i18n="size_table_title_en">Size Guide - Chest & Shoulder</span>
                    <small class="text-muted d-block arabic-small" data-i18n="size_table_title_ar">دليل المقاسات - الصدر والكتف</small>
                </h4>
                <table class="table table-bordered size-table">
                    <thead>
                        <tr>
                            <th>Size / المقاسات</th>
                            <th>Chest (inch) / الصدر</th>
                            <th>Shoulder (inch) / الكتف</th>
                        </tr>
                    </thead>
                    <tbody class="size-chart-measurements-body"></tbody>
                </table>
            </div>

            <!-- Height to Length Chart -->
            <div class="mb-4">
                <h4 class="mb-3 size-table-title">
                    <span data-i18n="length_chart_title_en">Find Your Abaya Length by Height</span>
                    <small class="d-block arabic-small" data-i18n="length_chart_title_ar">جدول طول العباءة حسب الطول</small>
                </h4>

                <!-- ✅ YOUR FULL TEXT KEPT EXACTLY -->
                <p class="small mb-2" data-i18n="length_chart_note_en">
                    This chart shows the recommended length based on height. Please double-check with your own measurement to be sure of your perfect fit.
                </p>

                <p class="small arabic-text mb-3" style="direction: rtl;" data-i18n="length_chart_note_ar">
                    هذا الجدول يوضح الطول الموصى به حسب طولك. يُرجى التأكد بالمتر لقياسك الشخصي للحصول على المقاس الأنسب لكِ.
                </p>
                
                <div class="table-responsive height-length-table" style="max-height: 300px; overflow-y: auto;">
                    <table class="table table-bordered size-table">
                        <thead>
                            <tr>
                                <th>Abaya Length (inch)</th>
                                <th>Your Height (cm)</th>
                            </tr>
                        </thead>
                        <tbody class="size-chart-height-length-body"></tbody>
                    </table>
                </div>
            </div>

            <!-- Measurement Tips -->
            <div class="measurement-tips mt-4 p-3" style="background: #f9f9f9; border-left: 4px solid #FFD700;">
                <h5 class="mb-2" style="font-weight: 600;" data-i18n="measurement_tips_en">💡 Measurement Tips</h5>
                <div class="english-tips size-chart-tips-en"></div>
                
                <div class="mt-2 arabic-text size-chart-tips-ar" style="direction: rtl;"></div>
            </div>

        </div> <!-- END wrapper -->

    </div>
</div>

<!-- Overlay -->
<div class="size-chart-overlay" id="sizeChartOverlay"></div>



<!-- Floating WhatsApp -->
<a href="https://wa.me/<?php echo $phone; ?>?text=Hello%21%20I'm%20interested%20in%20a%20product" 
   class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
    <i class="fab fa-whatsapp"></i>
</a>