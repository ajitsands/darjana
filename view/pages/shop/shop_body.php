<!--<div class="page-wraper">-->
<!--    <div id="loading-area" class="preloader-wrapper-4">-->
<!--        <img src="images/loading.gif" alt="">-->
<!--    </div>-->

    <div>
        <br><br><br>
    </div>
    <section class="content-inner-4 pt-4 z-index-unset">
        <div class="container-fluid">
            <div class="row">
                <div class="col-100 col-xl-12">
                    <!-- Search Bar -->
                    <!-- <div class="search-area mb-3">
                        <div class="input-group">
                            <input type="text" id="dzSearch" class="form-control" placeholder="Search products..."
                                aria-label="Search products">
                            <button class="btn btn-primary search-btn" type="button" id="searchButton">
                                <i class="fas fa-search me-2"></i> Search
                            </button>
                        </div>
                    </div> -->

                    <!-- Filter Button and Dropdown (initially hidden) -->
                    <!--<div class="mb-3 d-flex align-items-center justify-content-start" id="filterArea">-->
                    <!--    <button class="btn btn-primary me-2 mb-3" id="filterBtn" type="button">-->
                    <!--        <i class="fas fa-filter me-2 "></i>Filters-->
                    <!--    </button>-->
                    <!--    <div class="dropdown-menu" id="filterDropdown">-->
                    <!--        <h6 class="dropdown-header">Price Sort</h6>-->
                    <!--        <button class="dropdown-item filter-option" data-sort="Low to High">Low to High</button>-->
                    <!--        <button class="dropdown-item filter-option" data-sort="High to Low">High to Low</button>-->
                    <!--    </div>-->
                    <!--    <div class="input-group ms-auto" >-->
                    <!--        <input type="text" id="dzSearch2" class="form-control" placeholder="Search products..." aria-label="Search products">-->
                    <!--        <button class="btn btn-primary search-btn2" type="button" id="searchButton">-->
                    <!--            <i class="fas fa-search"></i> <!-- Removed "Search" text -->
                    <!--        </button>-->
                    <!--    </div>-->
                    <!--</div>-->
                    
                    
                   <div class="mb-3" id="filterArea">
                        <div class="d-flex justify-content-between align-items-center flex-wrap gap-3 mb-3">
                            <!-- Total Products Count Display -->
                            <div class="total-products-count">
                                <span class="fw-bold" id="totalProductsCount">Loading...</span>
                            </div>
                        </div>
                        
                        <div class="input-group" style="column-gap: .0rem;">
                            <!-- Filter Dropdown -->
                            <button class="btn btn-dark dropdown-toggle" type="button" data-bs-toggle="dropdown" id="filterBtn">
                                <i class="fas fa-filter me-2"></i>
                            </button>
                    
                            <ul class="dropdown-menu">
                                <li><h6 class="dropdown-header">Price Sort</h6></li>
                                <li><button class="dropdown-item filter-option" data-sort="Low to High">Low to High</button></li>
                                <li><button class="dropdown-item filter-option" data-sort="High to Low">High to Low</button></li>
                            </ul>
                    
                            <!-- Search Input -->
                            <input type="text" id="dzSearch2" class="form-control" placeholder="Search products..." style="border-radius: 0px !important;border:1px solid #d3d3d3;">
                    
                            <!-- Search Button -->
                            <button class="btn btn-dark" type="button" id="searchButton" style="padding: 12px 10px;">
                                <i class="fas fa-search"></i>
                            </button>
                        </div>
                    </div>


                    <!-- Existing product grid -->
                    <div class="row">
                        <div class="product-grid">
                            <div id="product-list-container" class="product-list-view" style="display: none;"></div>
                            <div id="product-column-container" class="product-column-view" style="display: none;"></div>
                            <div id="product-grid-container" class="row product-grid-view gx-5"></div>
                            <div id="load-more-section" class="col-12 text-center mt-5 mb-5">
                            <button id="load-more-btn" class="btn btn-dark btn-lg px-5 py-3" style="display: none;">
                                <i class="fas fa-chevron-down me-2"></i> Load More Products
                            </button>
                            <div id="no-more-products" class="text-muted py-4" style="display: none;">
                                🎉 You've reached the end of the list
                            </div>
                        </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </section>
    <div class="modal quick-view-modal fade" id="quickViewModal" tabindex="-1" aria-hidden="true">
        <div class="modal-dialog modal-dialog-centered modal-xxxl">
            <div class="modal-content">
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close">
                    <i class="icon feather icon-x"></i>
                </button>
                <div class="modal-body d-flex">
                <!--<div class="modal-body d-flex flex-column flex-lg-row">-->
                    <!-- Fixed Image Section -->
                    <div class="row">
                        
                   <div class="col-xl-6">
                    <div class="image-section mt-4">
                        <div class="dz-product-detail mb-0">
                            <div class="swiper-container-wrapper d-flex">
                                <div class="swiper thumbnail-swiper-vertical me-2">
                                    <div class="swiper-wrapper">
                                        <!-- Thumbnails will be loaded via AJAX -->
                                    </div>
                                </div>
                                <div class="swiper main-image-swiper">
                                    <div class="swiper-wrapper" id="lightgallery">
                                        <!-- Main images will be loaded via AJAX -->
                                    </div>
                                    <div class="swiper-button-next"></div>
                                    <div class="swiper-button-prev"></div>
                                </div>
                            </div>
                        </div>
                    </div>
                    </div>
                    <!-- Scrollable Content Section -->
                    <div class="col-xl-6">
                    <div class="content-section">
                        <div class="dz-product-detail style-2 ps-xl-3 ps-0 pt-2 mb-0">
                            <div class="dz-content">
                                <!-- Content will be loaded via AJAX -->
                            </div>
                        </div>
                    </div>
                    </div>
                </div>
                 </div>
            </div>
        </div>
    </div>
    <!-- Fullscreen Image Modal for Mobile -->
    <div id="fullscreenImageModal" class="fullscreen-image-modal">
        <div class="fullscreen-image-container">
            <button class="close-fullscreen-btn" id="closeFullscreenBtn">
                <i class="fas fa-times"></i>
            </button>
            <img id="fullscreenImage" class="fullscreen-image" src="" alt="">
        </div>
    </div>
<!--</div>-->