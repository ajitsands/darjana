<style>
/* Mobile */
.dz-bnr-inr {
    height: auto;
    background-color: #e8e8e8 !important;
    padding: 20px !important; /* keep for mobile */
}

/* Desktop */
@media (min-width: 992px) {
    .dz-bnr-inr {
        height: 100vh;
        padding: 0 !important; /* 🔥 remove gap */
        position: relative;
        overflow: hidden;
    }

    .video-wrapper {
        position: absolute;
        top: 0;
        left: 0;
        width: 100%;
        height: 100%;
    }

    #video-background {
        width: 100%;
        height: 100%;
        object-fit: cover;
    }
}


</style>
<br><br>
<section class="content-inner">
    <div class="container-fluid p-0">
        <div class="dz-bnr-inr bg-secondary overlay-white-light" 
             style="position:relative; overflow:hidden; padding: 5px;">
            
            <!-- Video Container -->
            <div class="video-wrapper">
                <video autoplay loop muted playsinline id="video-background">
                    <source src="" type="video/mp4">
                </video>
            </div>


            
        </div>      
    </div>
</section>       




<!-- Featured Products Section -->
<section class="content-inner">
    <div class="container">
        <div class="row justify-content-md-between align-items-start">
            <div class="col-lg-12 col-md-12">
                <!--section-head style-1 -->
                <div class="m-b20 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center pb-4">
                        <h2 class="title product-head" data-i18n="featured_products">
                            FEATURED PRODUCTS
                        </h2>
                    </div>
                </div>    
            </div>
            
        </div>
        <div class="clearfix">
            <ul id="featured-masonry" class="row g-xl-4 g-3">
                <!-- Dynamically loaded cards will follow global CSS -->
            </ul>
        </div>
    </div>
</section>

<!-- Most Popular Products Section  style="background-color: #F0F0F0"-->
<section class="content-inner-2 m-b10" >
    <div class="container">
        <div class="row justify-content-md-between align-items-start">
            <div class="col-lg-12 col-md-12">
                <div class=" m-b10 wow fadeInUp" data-wow-delay="0.2s">
                    <div class="text-center pb-4">
                        <h2 class="title product-head" data-i18n="most_popular_products">
                            MOST POPULAR PRODUCTS
                        </h2>
                    </div>
                </div>    
            </div>
        </div>
        <div class="clearfix">
            <ul id="masonry" class="row g-xl-4 g-3">
                <!-- Dynamically loaded cards will follow global CSS -->
            </ul>
        </div>
    </div>
</section>

<!-- Most Viewed Products Section -->
<section class="content-inner-2 overflow-hidden">
    <div class="container">
        <!--<div class="section-head style-1 wow fadeInUp d-lg-flex justify-content-between" data-wow-delay="0.2s">-->
            <div class="col-lg-12 col-md-12 m-b2 mb-4 m-t10">
                <h2 class="title product-head" data-i18n="most_viewed_products">
                    MOST VIEWED PRODUCTS
                </h2>
            </div>
        <!--</div>-->
        <div class="swiper swiper-four swiper-visible">
            <div class="swiper-wrapper" id="most-viewed-wrapper">
                <!-- Dynamically loaded slides will follow global CSS -->
            </div>
        </div>
    </div>
</section>
<!-- About Section Start  style="background-color: #EFF3F5" -->
<section class="content-inner" >
    <div class="container">
        <div class="row align-items-center">
            <div class="col-lg-12 col-md-12 m-b2 m-t10">
                <h2 class="title product-head" data-i18n="discover_our_latest_collections">
                    DISCOVER OUR LATEST COLLECTIONS
                </h2>
            </div>
            <div class="col-lg-12 col-md-12 m-b3">
                <div class="about-wraper position-relative pt-1">
                    <div class="row" id="about-category-list">
                        <div class="swiper testimonial-swiper about-swiper m-b3">
                            <div class="swiper-wrapper">
                                <!-- These will be dynamically loaded, but we force style via CSS -->
                                <div class="swiper-slide">
                                    <div class="about-box">    
                                        <div class="about-img">
                                            <img src="images/shop/product-2/1.png" alt="image">
                                        </div>
                                        <div class="about-btn">
                                            <a class="btn btn-white btn-md" href="shop-list.html">MAN SHOES</a>
                                        </div>
                                    </div>
                                </div>
                                <!-- ... other slides ... -->
                            </div>
                        </div>
                    </div>

                    <div class="d-flex justify-content-between align-items-center">
                        <div class="d-flex gap-3">
                            <div class="testimonial-button-prev">
                                <!-- SVG remains same -->
                            </div>
                            <div class="testimonial-button-next">
                                <!-- SVG remains same -->
                            </div>
                        </div>    
                        <div class="swiper-pagination style-1 text-end ...">
                            <!-- Pagination remains same -->
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>
<!-- About Section End -->

<!-- Quick View Modal -->
<div class="modal quick-view-modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered modal-lg">
        <div class="modal-content">
            <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                <i class="icon feather icon-x"></i>
            </button>
            <div class="modal-body">
                <!-- Content will be loaded here via AJAX – will follow global CSS -->
            </div>
        </div>
    </div>
</div>