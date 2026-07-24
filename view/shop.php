
<!DOCTYPE html>
<html lang="en">

<head>
   
    <?php include("view/templates/head.php"); ?>

    <style>
        html, body {
            overflow-x: hidden;
        }
       /* Apply Montserrat font to all text */
        body,
        h1, h2, h3, h4, h5, h6,
        p, span, div,
        .title, .product-name, .btn, .price,
        .modal-content, .navbar-nav,
        .badge, .form-label, .para-text,
        .color-label, .form-select {
            /* font-family: "Montserrat", sans-serif !important; */
            font-family: "Instrument Sans", sans-serif !important;
            /* text-transform: uppercase !important; */
            letter-spacing: 0.5px !important;
        }

        .size-label{
            font-family: "Instrument Sans", sans-serif !important;
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
        }

        .font-inst a{
        font-family: "Instrument Sans", sans-serif;
        text-transform: uppercase !important;
        font-size: 12px;
        color: #343434;
        letter-spacing: 2.16px;
        }
        @media (min-width: 768px) {
            .img-gap{
                margin: 0 10px;
            }
        }
        /* Quick View Modal specific */
        #quickViewModal * {
            /*font-family: "Montserrat", sans-serif !important;*/
            /* font-family: "Instrument Sans", sans-serif; */
            /* text-transform: uppercase !important; */
            letter-spacing: 0.5px !important;
        }

        .length-label {
            display: inline-block;
            padding: 5px 10px;
            border: 1px solid #ddd;
            border-radius: 4px;
            cursor: pointer;
            transition: all 0.3s ease;
        }
    
        /* Input fields exception */
        input:not(.btn),
        textarea,
        select {
            text-transform: none !important;
            letter-spacing: normal !important;
        }
    
        /* Product cards */
        .shop-card .title,
        .shop-card .price {
            font-weight: 500 !important;
        }
    
        /* Buttons */
        .btn {
            font-weight: 500 !important;
            letter-spacing: 1px !important;
        }
    
        /* Price styling */
        .price-num {
            font-weight: 600 !important;
        }
    
        /* Product title */
        h1.title {
            letter-spacing: 1px !important;
            font-weight: 600 !important;
        }
    
        /* Blinking animation for offers */
        @keyframes blink {
            0%, 100% { opacity: 1; }
            50% { opacity: 0; }
        }
        .offer-percent {
            animation: blink 1.5s infinite;
        }
    
        /* Mobile responsive */
        @media (max-width: 768px) {
            body,
            h1.title,
            .btn,
            .price {
                font-size: 0.9em !important;
            }
            .shop-card.style-1 .dz-content {
                padding: 8px 5px !important; /* Reduced from 15px */
            }
        }
    
        /* Quick View Modal specific adjustments */
        #quickViewModal .badge {
            letter-spacing: 1px !important;
            font-weight: 600 !important;
        }
    
        #quickViewModal .btn {
            letter-spacing: 1px !important;
        }
    
        #quickViewModal .form-select {
            text-transform: uppercase !important;
            font-weight: 500 !important;
        }
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
    
        /* Align amount with name */
        .shop-card.style-1 .dz-content {
            display: flex;
            flex-direction: column;
        }
        
        .shop-card.style-1 .dz-content .title {
            /* margin-bottom: 5px !important; */
            line-height: 1.3;
        }
        
        .shop-card.style-1 .dz-content .price-block {
            margin-top: 0 !important;
            padding-top: 0 !important;
        }
    
        /* Title */
        .shop-card.style-1 .dz-content .title,
        .content-section .dz-content .title {
            font-size: 13px;
            font-weight: 300;
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
            /*margin-left: 8px;*/
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
    
        /* Quick View Modal - DESKTOP DESIGN (Original) */
        .quick-view-modal .modal-dialog {
            max-width: 95vw;
            width: 65%;
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
        .bg-gold{
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%), radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
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
            /* border-color: #000;
            transform: scale(1.1); */
            border: 3px solid #FFD700 !important;
            box-shadow: 0 0 0 2px rgba(255, 215, 0, 0.3), 0 0 15px rgba(255, 215, 0, 0.5);
            transform: scale(1.1);
            z-index: 2 !important;

        }

        .color-option input[type="radio"]:checked + label::after {
            content: "";
            position: absolute;
            top: 50%;
            left: 50%;
            transform: translate(-50%, -50%);
            width: 14px;
            height: 14px;
            background-color: #FFD700 !important;
            border: 2px solid #333;
            border-radius: 0 !important;
            z-index: 3;
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
            background: 
                        radial-gradient(
                            ellipse farthest-corner at right bottom,
                            #FEDB37 0%,
                            #FDB931 8%,
                            #9f7928 30%,
                            #8A6E2F 40%,
                            transparent 80%
                        ),
                        radial-gradient(
                            ellipse farthest-corner at left top,
                            #FFFFFF 0%,
                            #FFFFAC 8%,
                            #D1B464 25%,
                            #5d4a1f 62.5%,
                            #5d4a1f 100%
                        ) !important;
            color: #fff;
            box-shadow: 0 0 0 2px rgba(254, 219, 55, 0.3), 0 0 15px rgba(254, 219, 55, 0.5);
            
            /* border-color: #000; */
        }

         .length-label.selected {
            background: 
                        radial-gradient(
                            ellipse farthest-corner at right bottom,
                            #FEDB37 0%,
                            #FDB931 8%,
                            #9f7928 30%,
                            #8A6E2F 40%,
                            transparent 80%
                        ),
                        radial-gradient(
                            ellipse farthest-corner at left top,
                            #FFFFFF 0%,
                            #FFFFAC 8%,
                            #D1B464 25%,
                            #5d4a1f 62.5%,
                            #5d4a1f 100%
                        ) !important;
            color: #fff;
            box-shadow: 0 0 0 2px rgba(254, 219, 55, 0.3), 0 0 15px rgba(254, 219, 55, 0.5);
            
            /* border-color: #000; */
        }

        .length-label {
            border-radius: 50% !important;
        }
    
        .size-label:hover {
            background-color: #f5f5f5;
        }
    
        /* Quantity */
        .quantity-input {
            width: 80px;
            text-align: center;
        }
    
        /* Swiper - DESKTOP (Original) */
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
    
        /* Mobile adjustments for general layout */
        @media (max-width: 768px) {
            .filter-area {
                flex-direction: column;
                gap: 10px;
            }
            .quick-view-modal .modal-dialog {
                max-width: 95vw;
                width: 100%;
                max-height: 90vh;
            }
            .filter-area .input-group {
                width: 100%;
                order: 1;
            }
            
            #filterBtn {
                order: 0;
                align-self: flex-end;
                margin-left: 0;
                margin-right: 0;
                padding: 18px 12px;
                font-size: 14px;
                line-height: 1.5;
                white-space: nowrap;
            }
            
            #dzSearch2 {
                flex-grow: 1;
                min-width: 0;
            }
            
            .search-btn2 {
                padding: 0 10px !important;
            }
            
            .search-btn2 i {
                margin-right: 0 !important;
            }
            
            .search-btn2 span {
                display: none;
            }
            
            .shop-card.style-1 .dz-content .title,
            .content-section .dz-content .title {
                height: auto;
                overflow: visible;
                text-overflow: initial;
                display: block;
                -webkit-line-clamp: unset;
                -webkit-box-orient: initial;
                white-space: normal;
            }
        
            .col-6.col-sm-6 {
                display: flex;
                flex: 1 1 50%;
                max-width: 50%;
                
                box-sizing: border-box;
            }
        
            .shop-card.style-1 {
                display: flex;
                flex-direction: column;
                height: auto;
                width: 100%;
            }
            
            .shop-card.style-1 .dz-content {
                height: auto;
                padding: 15px;  /* ← CHANGE THIS TO 8px 5px */
            }
        
            .shop-card.style-1 .dz-media img {
                width: 100%;
                height: auto;
                object-fit: cover;
            }
        }
    
        .text-truncate-2 {
            overflow: hidden;
            display: -webkit-box;
            -webkit-line-clamp: 2;
            -webkit-box-orient: vertical;
            line-height: 1.2rem;
            max-height: 2.4rem;
            font-size: 0.95rem;
            margin-bottom: 0.25rem;
        }
    
        .price-block {
            margin-top: 0 !important;
        }
        
        @media (min-width: 769px) {
            .shop-card.style-1 .dz-content .title {
                height: 40px;
            }
        }
        
        /* Make all product cards and images square */
        .shop-card.style-1,
        .shop-card.style-1 .dz-media,
        .shop-card.style-1 .dz-media img,
        .shop-card.style-2,
        .shop-card.style-2 .dz-media,
        .shop-card.style-2 .dz-media img,
        .shop-card .dz-media,
        .shop-card .dz-media img {
            border-radius: 0 !important;
        }
        
        /* Remove rounded corners from product tags/badges */
        .shop-card.style-1 .badge,
        .content-section .badge {
            border-radius: 0 !important;
        }
        
        /* Ensure no overflow rounding on quick view modal */
        .quick-view-modal .modal-content,
        .quick-view-modal .modal-dialog {
            border-radius: 0 !important;
        }
        
        /* Make thumbnail images square in quick view */
        .thumbnail-img {
            border-radius: 0 !important;
        }
        
        /* Make color and size options square */
        .size-label,
        .color-label {
            border-radius: 50% !important;
        }
        
        /* Make filter dropdown square */
        #filterDropdown {
            border-radius: 0 !important;
        }
        
        /* Make all buttons square */
        .btn-rounded {
            border-radius: 0 !important;
        }
        
        /* Ensure cards maintain clean square edges */
        .shop-card {
            overflow: hidden;
        }
    
        /* Specifically target Quick View button */
        .quick-view-btn,
        .shop-meta .quick-view-btn {
            border-radius: 0 !important;
            padding: 8px 16px !important;
        }
        
        /* If you want to be extra sure it wins over everything */
        .quick-view-btn.btn-md,
        .quick-view-btn.btn-secondary {
            border-radius: 0 !important;
        }
        
        /* Tablets */
        @media (max-width: 991px) {
            .search-box {
                width: 220px;
            }
        }
        
        /* Mobile */
        @media (max-width: 576px) {
            .search-box {
                width: 300px;
            }
        }
    
        /* MOBILE QUICK VIEW STYLES ONLY (767px and below) */
        @media (max-width: 767px) {
            /* Quick View Modal Mobile Layout */
            .quick-view-modal .modal-body {
                flex-direction: column !important;
                height: auto;
                max-height: 90vh;
            }
            
            /* Override desktop styles for mobile only */
            .image-section {
                width: 100% !important;
                height: auto !important;
                min-height: 400px;
                padding: 15px 15px 0 15px !important;
                background: #fff !important;
                display: flex;
                flex-direction: column;
                position: relative;
            }
            
            /* BADGE STYLES FOR MOBILE */
            .image-section .badge {
                position: absolute !important;
                top: 20px !important;
                right: 20px !important;
                left: auto !important;
                background-color: #e53935 !important;
                color: white !important;
                padding: 4px 8px !important;
                font-size: 11px !important;
                border-radius: 0 !important;
                z-index: 10;
            }
            
            /* ZOOM/FULLSCREEN BUTTON FOR MOBILE */
            .zoom-fullscreen-btn {
                position: absolute !important;
                bottom: 15px !important;
                right: 15px !important;
                width: 40px !important;
                height: 40px !important;
                background-color: rgba(0, 0, 0, 0.7) !important;
                color: white !important;
                border: none !important;
                border-radius: 0 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                z-index: 20 !important;
                cursor: pointer !important;
                transition: all 0.3s ease !important;
                opacity: 0.9 !important;
            }
            
            .zoom-fullscreen-btn:hover {
                background-color: rgba(0, 0, 0, 0.9) !important;
                opacity: 1 !important;
                transform: scale(1.05) !important;
            }
            
            .zoom-fullscreen-btn i {
                font-size: 18px !important;
            }
            
            /* Fullscreen modal styles */
            .fullscreen-image-modal {
                position: fixed !important;
                top: 0 !important;
                left: 0 !important;
                width: 100vw !important;
                height: 100vh !important;
                background-color: rgba(0, 0, 0, 0.95) !important;
                z-index: 2147483647 !important;
                display: none !important;
                align-items: center !important;
                justify-content: center !important;
                padding: 0 !important;
                margin: 0 !important;
            }
            
            .fullscreen-image-modal.active {
                display: flex !important;
            }
            
            .fullscreen-image-container {
                width: 100% !important;
                height: 100% !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                position: relative !important;
            }
            
            .fullscreen-image {
                max-width: 100% !important;
                max-height: 100% !important;
                object-fit: contain !important;
                padding: 20px !important;
            }
            
            .close-fullscreen-btn {
                position: absolute !important;
                top: 20px !important;
                right: 20px !important;
                width: 40px !important;
                height: 40px !important;
                background-color: rgba(255, 255, 255, 0.2) !important;
                color: white !important;
                border: none !important;
                border-radius: 50% !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                font-size: 24px !important;
                cursor: pointer !important;
                z-index: 10000 !important;
            }
            
            .close-fullscreen-btn:hover {
                background-color: rgba(255, 255, 255, 0.3) !important;
            }
            
            /* Override main image swiper for mobile */
            .main-image-swiper {
                width: 100% !important;
                height: 300px !important;
                margin-top: 15px !important;
                order: 2;
                position: relative !important;
            }
            
            .main-image-swiper img {
                max-width: 100%;
                max-height: 100%;
                width: auto;
                height: auto;
                object-fit: contain;
            }
            
            /* Override thumbnail swiper for mobile */
            .thumbnail-swiper-vertical {
                width: 100% !important;
                height: 80px !important;
                overflow-x: auto !important;
                overflow-y: hidden !important;
                order: 1;
                margin: 0 !important;
            }
            
            .thumbnail-swiper-vertical .swiper-wrapper {
                flex-direction: row !important;
            }
            
            .thumbnail-swiper-vertical .swiper-slide {
                width: 70px !important;
                height: 70px !important;
            }
            
            /* Override swiper container for mobile */
            .swiper-container-wrapper {
                flex-direction: column-reverse !important;
                gap: 10px;
                height: auto;
                min-height: 400px;
                position: relative;
            }
            
            /* Content section for mobile */
            .content-section {
                width: 100% !important;
                max-height: 45vh;
                overflow-y: auto;
                padding: 20px;
            }
            
            /* Hide navigation buttons on mobile */
            .swiper-button-next,
            .swiper-button-prev {
                display: none !important;
            }
            
            /* Modal adjustments for mobile */
            .quick-view-modal .modal-dialog {
                max-width: 95vw;
                margin: 10px auto;
                height: auto;
            }
            
            .quick-view-modal .modal-content {
                height: auto;
                max-height: 90vh;
            }
            .zoom-fullscreen-btn {
                position: absolute !important;
                bottom: 15px !important;
                right: 15px !important;
                width: 44px !important;
                height: 44px !important;
                background-color: rgba(0, 0, 0, 0.8) !important;
                color: white !important;
                border: 2px solid white !important;
                border-radius: 0 !important;
                display: flex !important;
                align-items: center !important;
                justify-content: center !important;
                z-index: 200 !important;
                cursor: pointer !important;
                transition: all 0.3s ease !important;
                box-shadow: 0 2px 8px rgba(0, 0, 0, 0.3);
            }
            
            .zoom-fullscreen-btn i {
                font-size: 20px !important;
            }
        }

        
        /* Hide zoom button on desktop */
        @media (min-width: 768px) {
            .zoom-fullscreen-btn {
                display: none !important;
            }
            #closeFullscreenBtn {
                display: none !important;
            }
            .image-section .badge {
                position: absolute !important;
                top: 20px !important;
                right: 20px !important;  /* Changed from left to right */
                left: auto !important;   /* Reset left positioning */
                background-color: #e53935 !important;
                color: white !important;
                padding: 4px 8px !important;
                font-size: 12px !important;
                border-radius: 0 !important;
                z-index: 10;
            }
            .content-section .dz-content .title {
                font-size: 1.5rem !important; /* Adjust size as needed */
                font-weight: 600 !important;
                margin-bottom: 15px !important;
                line-height: 1.4 !important;
                white-space: normal !important;
                overflow: visible !important;
                text-overflow: initial !important;
                display: block !important;
                -webkit-line-clamp: unset !important;
                -webkit-box-orient: initial !important;
                height: auto !important;
                max-height: none !important;
                min-height: auto !important;
                word-wrap: break-word !important;
                word-break: break-word !important;
                overflow-wrap: break-word !important;
            }
        }
    
        /* Desktop View (993px and above) - Original design */
        @media (min-width: 993px) {
            .quick-view-modal .modal-body {
                flex-direction: row !important;
            }
            
            .image-section {
                width: 50% !important;
            }
            
            .content-section {
                width: 50% !important;
            }
            
            .thumbnail-swiper-vertical {
                width: 80px !important;
                height: 900px !important;
            }
            
            .thumbnail-swiper-vertical .swiper-wrapper {
                flex-direction: column !important;
            }
            
            .swiper-container-wrapper {
                flex-direction: row !important;
            }
        }
        /*.price-block h5.price {*/
            font-size: 14px !important;       /* was probably ~16–18px → now smaller */
        /*    font-weight: 700;*/
        /*}*/
        
        /*.price-block h6.original-price {*/
            font-size: 12px !important;       /* struck-through price even smaller */
        /*    font-weight: 400;*/
        /*    margin-left: 6px;*/
        }
        /* Price formatting with smaller currency symbol */
        .price-block {
            margin-top: 0 !important;
            display: flex;
            align-items: baseline;
            gap: 0.25rem;
        }
        
        .price-block .price,
        .price-block .original-price {
            display: flex;
            align-items: baseline;
            line-height: 1;
            position: relative;
        }
        
        .price-block .price::before,
        .price-block .original-price::before {
            content: attr(data-currency);
            font-size: 0.7em; /* Make currency symbol 70% of the number size */
            font-weight: 500;
            vertical-align: baseline;
            /*position: absolute;*/
            left: 0;
            top: 0;
        }
        
        .price-block h5.price {
            font-size: 16px !important;
            font-weight: 700 !important;
            
        }
        
        .price-block h6.original-price {
            font-size: 14px !important;
            font-weight: 400 !important;
            /*margin-left: 6px;*/
            color: #666 !important; /* Changed from #999 to #666 for better visibility */
        }
        
        .bordered-select {
        border: 2px solid #007bff; /* Blue border */
        border-radius: 5px;         /* Rounded corners */
        padding: 5px 10px;          /* Optional spacing */
        outline: none;              /* Remove default outline */
    }
    
    /* Optional: change border color when focused */
    .bordered-select:focus {
        border-color: #0056b3;
        box-shadow: 0 0 5px rgba(0,123,255,0.5);
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
        	<?php include("pages/home/home_page_modal.php"); ?>
    </div>
    
    	<a href="https://wa.me/97333300160?text=Hi I Like to Know more about the Products ." class="whatsapp-float" target="_blank" title="Chat with us on WhatsApp">
        <i class="fab fa-whatsapp"></i>
    </a>
    <?php include("view/templates/scripts.php"); ?>
    <script>
    $(document).ready(function() {
        // $('#loading-area').hide();
        let currentSort = 'Price Sort';
        let currentPage = 1;
        let perPage = 12;
        let hasMore = true;
        let currentCatId = null;
        let isSearching = false;
        let currentSearchTerm = '';
        let totalLoaded = 0;
        checkPendingCartState();
        checkPendingWishlistState();
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
        
        
        function loadTotalProductsCount(cat_id = null, searchTerm = null) {
            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'get_total_products_count',
                    cat_id: cat_id,
                    search_term: searchTerm
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const total = response.total;                const isArabic = window.currentLanguage === 'arabic';
                        
                        if (isArabic) {
                            if (searchTerm) {
                                $('#totalProductsCount').html(`نتائج البحث: ${total}`);
                            } else {
                                $('#totalProductsCount').html(`إجمالي المنتجات: ${total}`);
                            }
                        } else {
                            if (searchTerm) {
                                $('#totalProductsCount').html(`Search Results: ${total}`);
                            } else {
                                $('#totalProductsCount').html(`Total Products: ${total}`);
                            }
                        }
                    } else {
                        $('#totalProductsCount').html('Total Products: 0');
                    }
                },
                error: function() {
                    $('#totalProductsCount').html('Total Products: --');
                }
            });
        }
        
        // Call this function when page loads
        // loadTotalProductsCount();

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
        
        // Load correct count + products
        loadTotalProductsCount(catId);   // ← Now passes cat_id
        loadProducts(catId);

        // loadProducts();



        function loadProducts(cat_id = null, loadMore = false) {
            if (!loadMore) {
                currentPage = 1;
                hasMore = true;
                isSearching = false;
                totalLoaded = 0;
                currentCatId = cat_id;
                currentSearchTerm = '';
                
                $('#product-grid-container').html(
                    '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Loading products...</p></div>'
                );
                $('#load-more-btn').hide();
                $('#no-more-products').hide();
            } else {
                currentPage++;
            }
        
            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'get_products',
                    sort: currentSort,
                    cat_id: currentCatId,
                    page: currentPage,
                    per_page: perPage
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        if (response.data.length === 0 && !loadMore) {
                            const isArabic = window.currentLanguage === 'arabic';
                            const noProductMsg = isArabic ? 'لم يتم العثور على منتجات في هذه الفئة' : 'No Products Found';
                            
                            $('#product-grid-container').html(
                                `<div class="col-12 text-center py-5">
                                    <div class="alert alert-info py-4 m-0" style="background-color: #f8f9fa; border: 1px solid #e9ecef; border-radius: 8px;">
                                        <i class="fas fa-box-open fa-3x mb-3 text-muted"></i>
                                        <h5 class="fw-bold mb-0">${noProductMsg}</h5>
                                    </div>
                                </div>`
                            );
                            $('#load-more-btn').hide();
                            $('#no-more-products').hide();
                            return;
                        }

                        const html = buildProductCards(response.data);
        
                        if (loadMore) {
                            $('#product-grid-container').append(html);
                            totalLoaded += response.data.length;
                        } else {
                            $('#product-grid-container').html(html);
                            totalLoaded = response.data.length;
                        }
        
                        // Show/Hide Load More button
                        if (response.data.length < perPage) {
                            hasMore = false;
                            $('#load-more-btn').hide();
                            if (totalLoaded > 0) {
                                $('#no-more-products').show();
                            } else {
                                $('#no-more-products').hide();
                            }
                        } else {
                            $('#load-more-btn').show();
                            $('#no-more-products').hide();
                        }
        
                        renderWishlistChecks();
                        updatePageTranslations();
                    } else {
                        $('#product-grid-container').html('<div class="alert alert-info">' + (response.message || 'No products found') + '</div>');
                    }
                },
                error: function() {
                    $('#product-grid-container').html('<div class="alert alert-danger">Error loading products. Please try again.</div>');
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
                
                loadTotalProductsCount(null, searchTerm);
                searchProductsHeader(searchTerm);
            } else {
                const params = new URLSearchParams(window.location.search);
                const catId = params.get('cat_id');
                loadTotalProductsCount(catId);
                loadProducts(catId);
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
                        
                        const isArabic = window.currentLanguage === 'arabic';
                        if (isArabic) {
                            $('#totalProductsCount').html(`نتائج البحث: ${response.data.length} من إجمالي ${response.total || response.data.length}`);
                        } else {
                            $('#totalProductsCount').html(`Search Results: ${response.data.length} of ${response.total || response.data.length}`);
                        }
                        
                        if ($('.filter-left-area span').length) {
                            $('.filter-left-area span').text(
                                `Showing ${response.data.length} results for "${searchTerm}"`
                            );
                        }
                    } else {
                        $('#product-grid-container').html(
                            `<div class="col-12 text-center py-5"><div class="alert alert-info">${response.message}</div></div>`
                        );
                        if ($('.filter-left-area span').length) {
                            $('.filter-left-area span').text(`No results found for "${searchTerm}"`);
                        }
                        
                        const isArabic = window.currentLanguage === 'arabic';
                        if (isArabic) {
                            $('#totalProductsCount').html(`نتائج البحث: 0`);
                        } else {
                            $('#totalProductsCount').html(`Search Results: 0`);
                        }
                    }
                    
                    currentPage = 1;
                    hasMore = false;
                    isSearching = true;
                    currentSearchTerm = searchTerm;
                    currentCatId = null;
                    totalLoaded = response.data.length;
                    $('#load-more-btn').hide();
                    $('#no-more-products').hide();
                },
                error: function(xhr, status, error) {
                    $('#product-grid-container').html(
                        '<div class="col-12 text-center py-5"><div class="alert alert-danger">Error searching products. Please try again later.</div></div>'
                    );
                    console.error('Search error:', error);
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
                loadTotalProductsCount(null, searchTerm);
                searchProducts(searchTerm);
            } else {
                const params = new URLSearchParams(window.location.search);
                const catId = params.get('cat_id');
                loadTotalProductsCount(catId);
                loadProducts(catId);
            }
        }

        // Build product cards HTML (extracted from your old renderProducts)
        function buildProductCards(products) {
            const isArabic = window.currentLanguage === 'arabic';
            let html = '';
        
            products.forEach(product => {
                const originalPrice = parseFloat(product.amount_mrp) || 0;
                const sellingPrice = parseFloat(product.amount_selling) || 0;
                const offerPrice = parseFloat(product.amount_offer) || 0;
        
                const displayPrice = (offerPrice > 0) ? offerPrice : sellingPrice;
                const showDiscount = originalPrice > displayPrice;
                const discount = showDiscount ? Math.round(((originalPrice - displayPrice) / originalPrice) * 100) : 0;
        
                const formatPrice = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    return price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                };
        
                const productImage = product.product_image ?
                    'https://admin.darjanafashion.com/assets/img/products/product/' + product.product_image :
                    'images/shop/product/default-product.jpg';
        
                const displayName = (isArabic && product.product_name_arabic && product.product_name_arabic.trim() !== '') 
                    ? product.product_name_arabic 
                    : (product.product_name || 'Unnamed Product');
        
                html += `
                    <div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-b30">
                        <div class="shop-card style-1" data-vendor-id="${product.vendor_id}">
                            <div class="img-gap">
                                <div class="dz-media">
                                    ${showDiscount ? `
                                    <span class="badge bg-gold position-absolute top-0 start-0 m-2" style="z-index: 1;">
                                        ${discount}% OFF
                                    </span>` : ''}
                                    
                                    <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}"
                                       class="product-main-link track-product-click"
                                       data-product-id="${product.ids}">
                                        <img src="${productImage}" alt="${displayName}">
                                    </a>
                                    
                                    <div class="shop-meta">
                                        <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}" 
                                           class="btn btn-secondary btn-md btn-rounded quick-view-btn">
                                            <i class="fa-solid fa-eye d-md-none d-block"></i>
                                            <span class="d-md-block d-none" data-i18n="view_details">View Details</span>
                                        </a>
                                        <div class="btn btn-primary meta-icon dz-wishicon" data-product-id="${product.ids}">
                                            <i class="icon feather icon-heart dz-heart"></i>
                                            <i class="icon feather icon-heart-on dz-heart-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dz-content font-inst align-items-center text-center p-3">
                                <h6 class="title mb-0 product-title">
                                    <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}">
                                        ${displayName}
                                    </a>
                                </h6>
                                <div class="price-block d-flex align-items-center gap-2 flex-wrap">
                                    <h5 class="price mb-0 text-primary fw-bold">
                                        ${formatShopPrice(displayPrice)}
                                    </h5>
                                    ${showDiscount ? `
                                    <h6 class="original-price mb-0 text-muted">
                                        <del>${formatShopPrice(originalPrice)}</del>
                                    </h6>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        
            return html;
        }
        
        // Helper to re-check wishlist status after loading cards
        function renderWishlistChecks() {
            $('.dz-wishicon').each(function() {
                const wishIcon = $(this);
                const productId = wishIcon.data('product-id') || 
                                 wishIcon.closest('.shop-card').find('.product-main-link').attr('href').split('id=')[1];
                if (productId) {
                    checkWishlistStatus(productId, wishIcon);
                }
            });
        }
        $('#load-more-btn').on('click', function() {
            if (isSearching) {
                searchProducts(currentSearchTerm, true);
            } else {
                loadProducts(currentCatId, true);
            }
        });
        function searchProducts(searchTerm, loadMore = false) {
            if (!loadMore) {
                currentPage = 1;
                hasMore = true;
                isSearching = true;
                totalLoaded = 0;
                currentSearchTerm = searchTerm;
                currentCatId = null;
        
                $('#product-grid-container').html(
                    '<div class="col-12 text-center py-5"><div class="spinner-border text-primary" role="status"><span class="visually-hidden">Loading...</span></div><p>Searching products...</p></div>'
                );
                $('#load-more-btn').hide();
                $('#no-more-products').hide();
            } else {
                currentPage++;
            }
        
            $.ajax({
                url: 'controller/product_controller.php',
                type: 'POST',
                data: {
                    action: 'search_products',
                    search_term: searchTerm,
                    sort: currentSort,
                    page: currentPage,
                    per_page: perPage
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'success') {
                        const html = buildProductCards(response.data);
        
                        if (loadMore) {
                            $('#product-grid-container').append(html);
                            totalLoaded += response.data.length;
                        } else {
                            $('#product-grid-container').html(html);
                            totalLoaded = response.data.length;
                        }
        
                        $('.filter-left-area span').text(`Showing ${totalLoaded} of ${response.total} results for "${searchTerm}"`);
        
                        if (response.data.length < perPage) {
                            hasMore = false;
                            $('#load-more-btn').hide();
                            $('#no-more-products').show();
                        } else {
                            $('#load-more-btn').show();
                            $('#no-more-products').hide();
                        }
        
                        renderWishlistChecks();
                        updatePageTranslations();
                    } else {
                        $('#product-grid-container').html(`<div class="alert alert-info">${response.message}</div>`);
                    }
                },
                error: function() {
                    $('#product-grid-container').html('<div class="alert alert-danger">Error searching products.</div>');
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
                // Check login status first
                $.ajax({
                    url: 'controller/check_session.php',
                    type: 'POST',
                    dataType: 'json',
                    success: function(response) {
                        if (response.logged_in) {
                            // User is logged in, proceed with adding to wishlist
                            addToWishlistt(productId, wishIcon);
                        } else {
                            // User is not logged in, save state and redirect
                            // Get product details from the card
                            const $card = wishIcon.closest('.shop-card');
                            const productName = $card.find('.title a').text();
                            const productImage = $card.find('.dz-media img').attr('src');
                            
                            // Save state
                            const modalState = {
                                product_id: productId,
                                product_name: productName,
                                product_image: productImage,
                                return_url: window.location.href,
                                timestamp: new Date().getTime(),
                                type: 'wishlist',
                                action: 'add_to_wishlist'
                            };
                            
                            // Store in sessionStorage
                            sessionStorage.setItem('pendingWishlistState', JSON.stringify(modalState));
                            
                            // Redirect to login
                            window.location.href = `Login?redirect=${encodeURIComponent(window.location.href)}`;
                        }
                    },
                    error: function() {
                        alert('Error checking login status. Please try again.');
                    }
                });
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
                    if (response.status === 'redirect') {
                        // This case shouldn't happen now since we check session first,
                        // but keep it as fallback
                        const $card = wishIcon.closest('.shop-card');
                        const modalState = {
                            product_id: productId,
                            product_name: $card.find('.title a').text(),
                            product_image: $card.find('.dz-media img').attr('src'),
                            return_url: window.location.href,
                            timestamp: new Date().getTime(),
                            type: 'wishlist',
                            action: 'add_to_wishlist'
                        };
                        
                        sessionStorage.setItem('pendingWishlistState', JSON.stringify(modalState));
                        window.location.href = response.redirect_url;
                        
                    } else if (response.status === 'success') {
                        wishIcon.addClass('active');
                        setupDropdown('dropdownContent', 'success', svgSuccess + response.message, 'click');
                        $(document).trigger('wishlistUpdated');
                        
                        // Clear any pending wishlist state
                        sessionStorage.removeItem('pendingWishlistState');
                        
                    } else if (response.status === 'exists') {
                        setupDropdown('dropdownContent', 'warning', svgError + response.message, 'click');
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
            const isArabic = window.currentLanguage === 'arabic';
            if (isArabic) {
                $('#totalProductsCount').html(`إجمالي المنتجات: ${products.length}`);
            } else {
                $('#totalProductsCount').html(`Total Products: ${products.length}`);
            }
            // Helper to get the appropriate product name with fallback to English
            const getProductName = (product) => {
                if (isArabic && product.product_name_arabic && product.product_name_arabic.trim() !== '') {
                    return product.product_name_arabic;
                }
                return product.product_name || 'Unnamed Product';
            };
        
            let html = '';
        
            products.forEach(product => {
                
                // const originalPrice = parseFloat(product.amount_mrp);
                // const offerPrice = parseFloat(product.amount_offer);
                // const sellingPrice = parseFloat(product.amount_selling);
        
                // // Determine which price to show
                // const displayPrice = offerPrice > 0 ? offerPrice : sellingPrice;
                // const showDiscount = offerPrice > 0 && originalPrice > offerPrice;
        
                // // Calculate discount percentage based on amount_mrp and amount_offer
                // const discount = showDiscount ? 
                //     Math.round(((originalPrice - offerPrice) / originalPrice) * 100) : 0;
                    
                    
                    
                const originalPrice = parseFloat(product.amount_mrp) || 0;
                const sellingPrice  = parseFloat(product.amount_selling) || 0;
                const offerPrice    = parseFloat(product.amount_offer) || 0;
                
                // Final price shown to user
                const displayPrice = (offerPrice > 0) ? offerPrice : sellingPrice;
                
                // Show discount if MRP > displayed price
                const showDiscount = originalPrice > displayPrice;
                
                // Discount %
                const discount = showDiscount
                    ? Math.round(((originalPrice - displayPrice) / originalPrice) * 100)
                    : 0;
                
                // Savings
                const savings = originalPrice - displayPrice;
                
                
            
                console.log("showDiscount"+showDiscount+"discount:"+discount +"Product ID "+ product.ids);
                    
                    
        
                // Format the price properly - BD 1,200.00 format
                const formatPrice = (price) => {
                    if (isNaN(price) || price === 0) return '0.00';
                    // Format with 2 decimal places and commas for thousands (without BD)
                    return `${price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",")}`;
                };
                
                const formattedDisplayPrice = formatPrice(displayPrice);
                const formattedOriginalPrice = formatPrice(originalPrice);
        
                const productImage = product.product_image ?
                    'https://admin.darjanafashion.com/assets/img/products/product/' + product.product_image :
                    'images/shop/product/default-product.jpg';
        
                // Get localized name for title and alt attribute
                const displayName = getProductName(product);
                const shortName = displayName.length > 20 
                    ? displayName.substring(0, 15) + '...' 
                    : displayName;
        
                // html += `
                //     <div class="col-6 col-xl-4 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-b30">
                //         <div class="shop-card style-1" data-vendor-id="${product.vendor_id}">
                //             <div class="img-gap">
                //                 <div class="dz-media">
                //                     ${showDiscount ? `
                //                     <span class="badge bg-danger position-absolute top-0 start-0 m-2" style="z-index: 1;">
                //                         ${discount}% OFF
                //                     </span>` : ''}
                                    
                //                     <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}" 
                //                     id="product_link" 
                //                     class="product-main-link track-product-click" 
                //                     data-product-id="${product.ids}">
                //                         <img src="${productImage}" alt="${displayName}">
                //                     </a>
                                    
                //                     <div class="shop-meta">
                //                         <a href="javascript:void(0);" class="btn btn-secondary btn-md btn-rounded quick-view-btn" data-product-id="${product.ids}">
                //                             <i class="fa-solid fa-eye d-md-none d-block"></i>
                //                             <span class="d-md-block d-none">Quick View</span>
                //                         </a>
                //                         <div class="btn btn-primary meta-icon dz-wishicon" data-product-id="${product.ids}">
                //                             <i class="icon feather icon-heart dz-heart"></i>
                //                             <i class="icon feather icon-heart-on dz-heart-fill"></i>
                //                         </div>
                //                     </div>
                //                 </div>
                //             </div>
                //             <div class="dz-content font-inst align-items-center text-center p-3">
                //                 <h6 class="title mb-0 product-title">
                //                     <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}">
                //                         ${displayName}
                //                     </a>
                //                 </h6>
                //                 <div class="price-block d-flex align-items-center gap-2 flex-wrap">
                //                     <h5 class="price mb-0 text-primary fw-bold">
                //                         ${formatShopPrice(displayPrice)}
                //                     </h5>
                //                     ${showDiscount ? `
                //                     <h6 class="original-price mb-0 text-muted">
                //                         <del>${formatShopPrice(originalPrice)}</del>
                //                     </h6>` : ''}
                //                 </div>
                //             </div>
                //         </div>
                //     </div>
                // `;
                html += `
                    <div class="col-6 col-xl-6 col-lg-6 col-md-6 col-sm-6 m-md-b15 m-b30">
                        <div class="shop-card style-1" data-vendor-id="${product.vendor_id}">
                            <div class="img-gap">
                                <div class="dz-media">
                                    ${showDiscount ? `
                                    <span class="badge bg-gold position-absolute top-0 start-0 m-2" style="z-index: 1;">
                                        ${discount}% OFF
                                    </span>` : ''}
                                    
                                    <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}" 
                                    id="product_link" 
                                    class="product-main-link track-product-click" 
                                    data-product-id="${product.ids}">
                                        <img src="${productImage}" alt="${displayName}">
                                    </a>
                                    
                                    <div class="shop-meta">
                                        <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}" class="btn btn-secondary btn-md btn-rounded quick-view-btn">
                                            <i class="fa-solid fa-eye d-md-none d-block"></i>
                                            <span class="d-md-block d-none" data-i18n="view_details">View Details</span>
                                        </a>
                                        <div class="btn btn-primary meta-icon dz-wishicon" data-product-id="${product.ids}">
                                            <i class="icon feather icon-heart dz-heart"></i>
                                            <i class="icon feather icon-heart-on dz-heart-fill"></i>
                                        </div>
                                    </div>
                                </div>
                            </div>
                            <div class="dz-content font-inst align-items-center text-center p-3">
                                <h6 class="title mb-0 product-title">
                                    <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}">
                                        ${displayName}
                                    </a>
                                </h6>
                                <div class="price-block d-flex align-items-center gap-2 flex-wrap">
                                    <h5 class="price mb-0 text-primary fw-bold">
                                        ${formatShopPrice(displayPrice)}
                                    </h5>
                                    ${showDiscount ? `
                                    <h6 class="original-price mb-0 text-muted">
                                        <del>${formatShopPrice(originalPrice)}</del>
                                    </h6>` : ''}
                                </div>
                            </div>
                        </div>
                    </div>
                `;
            });
        
            $('#product-grid-container').html(html);
            updatePageTranslations();
            
            // Re-attach wishlist status checks
            $('.dz-wishicon').each(function() {
                const wishIcon = $(this);
                const productId = wishIcon.data('product-id');
                if (productId) {
                    checkWishlistStatus(productId, wishIcon);
                }
            });
            
          
            
            // Quick view trigger
            // $(document).on('click', '.quick-view-btn', function(e) {
            //     e.preventDefault();
            //     e.stopPropagation();
            //     const productId = $(this).data('product-id');
            //     loadProductDetails(productId);
            // });
        
            // Click anywhere on card (except buttons) → go to product page
            // $(document).on('click', '.shop-card-wrapper', function(e) {
            //     if ($(e.target).closest('.shop-meta .btn, .quick-view-btn').length) {
            //         return;
            //     }
            //     window.location = $(this).find('.product-main-link').attr('href');
            // });
        }

          // Product click tracking (redirect after tracking)
            $(document).on('click', '.track-product-click', function(e) {
                alert("clicked");
                e.preventDefault();
                const productId = $(this).data('product-id');
                const productUrl = $(this).attr('href');
                
                // Send click data to server
                $.ajax({
                    url: 'controller/product_controller.php',
                    type: 'POST',
                    data: {
                        action: 'track_product_click',
                        product_id: productId
                    },
                    success: function() {
                        // After tracking, proceed to the product page
                        window.location.href = productUrl;
                    },
                    error: function(xhr, status, error) {
                        // Even if tracking fails, still proceed to product page
                        console.error('Error tracking click:', error);
                        window.location.href = productUrl;
                    }
                });
            });

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
            const isArabic = window.currentLanguage === 'arabic';
        
            // Helper: choose Arabic text if available and language is Arabic, otherwise English
            const getLocalized = (english, arabic, fallback = '') => {
                if (isArabic && arabic && arabic.trim() !== '') {
                    return arabic;
                }
                return english || fallback;
            };
        
            const getProductImageUrl = (imageName) => {
                return imageName ?
                    `https://admin.darjanafashion.com/assets/img/products/${imageName}` :
                    'images/product/default-product.jpg';
            };
            
            const originalPrice = parseFloat(product.amount_mrp) || 0;
            const offerPrice = parseFloat(product.amount_offer) || 0;
            const sellingPrice = parseFloat(product.amount_selling) || 0;
            const displayPrice = offerPrice > 0 ? offerPrice : sellingPrice;
            const showDiscount = offerPrice > 0 && originalPrice > offerPrice;
            const discount = showDiscount ? 
                Math.round(((originalPrice - offerPrice) / originalPrice) * 100) : 0;
            const STORE_CURRENCY_SYMBOL = '<?php echo STORE_CURRENCY_SYMBOL; ?>';
        
            const formatPrice = (price, includeCurrency = false) => {
                if (isNaN(price) || price === 0) return includeCurrency ? STORE_CURRENCY_SYMBOL + ' 0.00' : '0.00';
                const formatted = price.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
                return includeCurrency ? STORE_CURRENCY_SYMBOL + ' ' + formatted : formatted;
            };
        
            const formattedDisplayPrice = formatPrice(displayPrice);
            const formattedOriginalPrice = formatPrice(originalPrice);
        
            // ── Localized content ───────────────────────────────────────────────────
            const productName        = getLocalized(product.product_name, product.product_name_arabic, 'Unnamed Product');
            const productDescription = getLocalized(product.product_description, product.product_description_arabic);
            const noDescFallback = '<span data-i18n="no_description">No description available.</span>';
        
            const primaryImage = product.images?.length > 0 ?
                getProductImageUrl(product.images[0]) :
                getProductImageUrl(null);
            
            const generateImageSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <div class="main-image-container" id="mainImageContainer">
                                <img src="${primaryImage}" 
                                     alt="${productName}" 
                                     id="mainProductImage"
                                     data-zoom-image="${primaryImage}"
                                     class="zoom-image"
                                     data-fullscreen-src="${primaryImage}">
                            </div>
                        </div>
                    `;
                }
            
                return product.images.map((image, index) => {
                    const imgUrl = getProductImageUrl(image);
                    const isActive = index === 0 ? 'active' : '';
                    return `
                        <div class="swiper-slide ${isActive}" data-image-index="${index}">
                            <div class="main-image-container" id="mainImageContainer${index}">
                                <img src="${imgUrl}" 
                                     alt="${productName}" 
                                     data-zoom-image="${imgUrl}"
                                     class="zoom-image"
                                     data-fullscreen-src="${imgUrl}">
                            </div>
                        </div>
                    `;
                }).join('');
            };
            
            const generateThumbSlides = () => {
                if (!product.images || product.images.length === 0) {
                    return `
                        <div class="swiper-slide">
                            <img src="${primaryImage}" alt="${productName}" class="thumbnail-img">
                        </div>
                    `;
                }
            
                return product.images.map(image => {
                    const imgUrl = getProductImageUrl(image);
                    return `
                        <div class="swiper-slide">
                            <img src="${imgUrl}" alt="${productName}" class="thumbnail-img">
                        </div>
                    `;
                }).join('');
            };
            
            const generateSizeOptions = () => {
                if (!product.sizes || product.sizes.length === 0) {
                    return '<p class="text-muted" data-i18n="no_sizes_available">No sizes available</p>';
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
                    return '<p class="text-muted" data-i18n="no_colors_available">No colors available</p>';
                }
            
                const colorMap = {
                    'BLUE': { code: '#0000FF', text: 'Blue' },
                    'GREEN': { code: '#008000', text: 'Green' },
                    'RED': { code: '#FF0000', text: 'Red' },
                    'BLACK': { code: '#000000', text: 'Black' },
                    'WHITE': { code: '#FFFFFF', text: 'White', border: '1px solid #ddd' },
                    'YELLOW': { code: '#FFFF00', text: 'Yellow' },
                    'PURPLE': { code: '#800080', text: 'Purple' },
                    'PINK': { code: '#FFC0CB', text: 'Pink' },
                    'ORANGE': { code: '#FFA500', text: 'Orange' },
                    'GRAY': { code: '#808080', text: 'Gray' }
                };
            
                return product.colors.map((color, index) => {
                    const colorName = color.toUpperCase();
                    const colorData = colorMap[colorName] || { code: '#CCCCCC', text: color };
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
            
            // const generateLengthOptions = () => {
            //     if (!product.length || product.length.length === 0) {
            //         return '<p class="text-muted" data-i18n="no_length_available">No Length available</p>';
            //     }
            
            //     const options = product.length.map((length, index) => 
            //         `<option value="${length}" ${index === 0 ? 'selected' : ''}>${length}</option>`
            //     ).join('');
            
            //     return `
            //         <select class="form-select w-50" id="length-select">
            //             ${options}
            //         </select>
            //     `;
            // };
            const generateLengthOptions = () => {
                if (!product.length || product.length.length === 0) {
                    return '<p class="text-muted" data-i18n="no_length_available">No Length available</p>';
                }

                return product.length.map((length, index) => `
                    <div class="form-check form-check-inline length-option">
                        <input class="form-check-input" type="radio" name="productLength"
                            id="length-${index}" value="${length}" ${index === 0 ? 'checked' : ''}>
                        <label class="form-check-label length-label" for="length-${index}">
                            ${length}
                        </label>
                    </div>
                `).join('');
            };

           

            const modalContent = `
                <div class="image-section mt-4">
                    ${discount > 0 ? `<span class="badge bg-secondary position-absolute">SALE ${discount}% Off</span>` : ''}
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
                                <button class="zoom-fullscreen-btn" id="zoomFullscreenBtn" title="View fullscreen">
                                    <i class="fas fa-expand"></i>
                                </button>
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
                                    <h4 class="title mb-1">${productName}</h4>
                                </div>
                            </div>
                            <p class="para-text" style="text-align: justify;">
                                ${productDescription || noDescFallback}
                            </p>
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
                            
                            <div class="mb-3 length-selection">
                                <h6 class="mb-2">Length:</h6>
                                <div class="Length-options-container">
                                    ${generateLengthOptions()}
                                </div>
                            </div>
                                
                            <div class="meta-content m-b20 d-flex align-items-end">
                                <div class="me-3">
                                    <span class="form-label">Price</span>
                                    <span class="price">
                                        ${formatShopPrice(displayPrice)}
                                        ${showDiscount ? `<del>${formatShopPrice(originalPrice)}</del>` : ''}
                                    </span>
                                </div>
                                <div class="btn-quantity light me-0">
                                    <label class="form-label">Quantity</label>
                                    <input type="number" min="1" value="1" name="quantity" class="form-control quantity-input">
                                </div>
                            </div>
                            <div class="customer-desc-section mb-3">
                                <h6 class="mb-2">${isArabic ? 'ملاحظات خاصة' : 'other specifications (if any)'}</h6>
                                <textarea class="form-control customer-desc-input" rows="2" 
                                    placeholder="${isArabic ? 'أدخل أي طلبات خاصة أو ملاحظات حول هذا المنتج' : 'Enter specifications'}" 
                                    maxlength="1000"></textarea>
                                <small class="text-muted">${isArabic ? 'الحد الأقصى 1000 حرف' : 'Maximum 1000 characters'}</small>
                            </div>
                            <div class="cart-btn">
                                <button class="btn btn-dark btn-lg add-to-cart-btn" data-vendor-id="${product.vendor_id}">
                                    <i class="fas fa-shopping-cart me-2"></i>Add To Cart
                                </button>
                                <button class="btn btn-outline-secondary btn-lg add-to-wishlist-btn">
                                    <i class="fas fa-heart me-2"></i>
                                    <span data-i18n="add_to_wishlist">Add To Wishlist</span>
                                </button>
                            </div>
                        </div>
                    </div>
                </div>
            `;
            
            checkQuickViewWishlistStatus(product.ids);
            $('#quickViewModal .modal-body').html(modalContent);
            
            setTimeout(() => {
                const isMobile = window.innerWidth <= 767;
                
                // Initialize thumbnail swiper
                const thumbSwiper = new Swiper('.thumbnail-swiper-vertical', {
                    direction: isMobile ? 'horizontal' : 'vertical',
                    slidesPerView: isMobile ? 4 : 4,
                    spaceBetween: isMobile ? 8 : 10,
                    freeMode: true,
                    watchSlidesProgress: true,
                    breakpoints: {
                        0: {
                            slidesPerView: 4,
                            direction: 'horizontal',
                            spaceBetween: 8
                        },
                        768: {
                            slidesPerView: 4,
                            direction: 'vertical',
                            spaceBetween: 10
                        }
                    }
                });
            
                // Initialize main image swiper
                const mainSwiper = new Swiper('.main-image-swiper', {
                    slidesPerView: 1,
                    spaceBetween: 10,
                    navigation: !isMobile ? {
                        nextEl: '.swiper-button-next',
                        prevEl: '.swiper-button-prev',
                    } : {},
                    thumbs: {
                        swiper: thumbSwiper
                    },
                    on: {
                        slideChange: function() {
                            // Re-initialize zoom for new slide
                            setTimeout(initializeImageZoom, 100);
                            
                            // Update fullscreen image if active
                            if ($('#fullscreenImageModal').hasClass('active')) {
                                updateFullscreenImage(mainSwiper);
                            }
                        }
                    }
                });
                
                // FULLSCREEN FUNCTIONALITY FOR MOBILE
                if (isMobile) {
                    // Function to open fullscreen
                    function openFullscreenImage() {
                        const activeSlide = mainSwiper.slides[mainSwiper.activeIndex];
                        const activeImage = $(activeSlide).find('img').attr('src');
                        const activeAlt = $(activeSlide).find('img').attr('alt');
                        
                        $('#fullscreenImage').attr('src', activeImage);
                        $('#fullscreenImage').attr('alt', activeAlt);
                        $('#fullscreenImageModal').addClass('active');
                        
                        // Prevent background scrolling
                        $('body').css('overflow', 'hidden');
                        
                        // Add swipe functionality in fullscreen
                        initializeFullscreenSwipe(mainSwiper);
                    }
                    
                    // Function to close fullscreen
                    function closeFullscreenImage() {
                        $('#fullscreenImageModal').removeClass('active');
                        $('body').css('overflow', '');
                        
                        // Remove swipe listeners
                        $(document).off('touchstart.fullscreen touchmove.fullscreen touchend.fullscreen');
                    }
                    
                    // Function to update fullscreen image
                    function updateFullscreenImage(swiper) {
                        if ($('#fullscreenImageModal').hasClass('active')) {
                            const activeSlide = swiper.slides[swiper.activeIndex];
                            const activeImage = $(activeSlide).find('img').attr('src');
                            const activeAlt = $(activeSlide).find('img').attr('alt');
                            
                            // Smooth transition
                            $('#fullscreenImage').fadeOut(100, function() {
                                $(this).attr('src', activeImage);
                                $(this).attr('alt', activeAlt);
                                $(this).fadeIn(100);
                            });
                        }
                    }
                    
                    // Swipe functionality for fullscreen
                    function initializeFullscreenSwipe(swiper) {
                        let touchStartX = 0;
                        let touchEndX = 0;
                        
                        const minSwipeDistance = 50;
                        
                        $(document).on('touchstart.fullscreen', function(e) {
                            touchStartX = e.changedTouches[0].screenX;
                        });
                        
                        $(document).on('touchend.fullscreen', function(e) {
                            touchEndX = e.changedTouches[0].screenX;
                            handleSwipe();
                        });
                        
                        function handleSwipe() {
                            const swipeDistance = touchEndX - touchStartX;
                            
                            if (Math.abs(swipeDistance) < minSwipeDistance) return;
                            
                            if (swipeDistance > 0 && swiper.activeIndex > 0) {
                                swiper.slidePrev();
                            } else if (swipeDistance < 0 && swiper.activeIndex < swiper.slides.length - 1) {
                                swiper.slideNext();
                            }
                        }
                    }
                    
                    // Click event for zoom button
                    $('#zoomFullscreenBtn').off('click').on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        openFullscreenImage();
                    });
                    
                    // Click event for close button
                    $('#closeFullscreenBtn').off('click').on('click', function(e) {
                        e.preventDefault();
                        e.stopPropagation();
                        closeFullscreenImage();
                    });
                    
                    // Close fullscreen on ESC key
                    $(document).off('keyup.fullscreen').on('keyup.fullscreen', function(e) {
                        if (e.key === 'Escape' && $('#fullscreenImageModal').hasClass('active')) {
                            closeFullscreenImage();
                        }
                    });
                    
                    // Close fullscreen on click outside image
                    $('#fullscreenImageModal').off('click').on('click', function(e) {
                        if (e.target.id === 'fullscreenImageModal' || e.target.id === 'fullscreenImage') {
                            closeFullscreenImage();
                        }
                    });
                    
                    // Double tap on image to open fullscreen
                    let lastTap = 0;
                    $('.main-image-container img').off('click.fullscreen').on('click.fullscreen', function(e) {
                        if (isMobile && !$(e.target).closest('.zoom-fullscreen-btn').length) {
                            const currentTime = new Date().getTime();
                            const tapLength = currentTime - lastTap;
                            
                            if (tapLength < 300 && tapLength > 0) {
                                openFullscreenImage();
                            }
                            lastTap = currentTime;
                        }
                    });
                }
                
                // Initialize image zoom functionality
                function initializeImageZoom() {
                    $('.main-image-container img').off('mousemove').off('mouseleave');
                    
                    $('.main-image-container img').each(function() {
                        const $img = $(this);
                        const container = $img.parent('.main-image-container');
                        
                        $img.on('mousemove', function(e) {
                            if (window.innerWidth <= 767) return;
                            
                            const containerRect = container[0].getBoundingClientRect();
                            const imgRect = $img[0].getBoundingClientRect();
                            
                            const x = e.clientX - imgRect.left;
                            const y = e.clientY - imgRect.top;
                            
                            const xPercent = (x / imgRect.width) * 100;
                            const yPercent = (y / imgRect.height) * 100;
                            
                            $img.css({
                                'transform': 'scale(2)',
                                'transform-origin': `${xPercent}% ${yPercent}%`
                            });
                            
                            container.css('cursor', 'zoom-out');
                        });
                        
                        $img.on('mouseleave', function() {
                            $img.css({
                                'transform': 'scale(1)',
                                'transform-origin': 'center center'
                            });
                            container.css('cursor', 'zoom-in');
                        });
                        
                        container.on('click', function(e) {
                            if (window.innerWidth <= 767) return;
                            
                            if ($img.css('transform') === 'matrix(1, 0, 0, 1, 0, 0)') {
                                const containerRect = container[0].getBoundingClientRect();
                                const x = e.clientX - containerRect.left;
                                const y = e.clientY - containerRect.top;
                                const xPercent = (x / containerRect.width) * 100;
                                const yPercent = (y / containerRect.height) * 100;
                                
                                $img.css({
                                    'transform': 'scale(2)',
                                    'transform-origin': `${xPercent}% ${yPercent}%`
                                });
                                container.css('cursor', 'zoom-out');
                            } else {
                                $img.css({
                                    'transform': 'scale(1)',
                                    'transform-origin': 'center center'
                                });
                                container.css('cursor', 'zoom-in');
                            }
                        });
                    });
                }
                
                setTimeout(initializeImageZoom, 300);
                
                $(window).on('resize', function() {
                    setTimeout(initializeImageZoom, 100);
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

                $('.length-option input[type="radio"]').change(function() {
                    $('.length-label').removeClass('selected');
                    $(this).siblings('.length-label').addClass('selected');
                }).first().trigger('change');
                
                // Optional: Translate interface texts when in Arabic
                if (isArabic) {
                    $('.color-selection h6').text('اللون:');
                    $('.size-selection h6').text('المقاس:');
                    $('.length-selection h6').text('الطول:');
                    $('.meta-content .form-label').eq(0).text('السعر');
                    $('.btn-quantity .form-label').text('الكمية');
                    
                    $('.add-to-cart-btn').html('<i class="fas fa-shopping-cart me-2"></i>أضف إلى السلة');
                    $('.add-to-wishlist-btn').html('<i class="fas fa-heart me-2"></i>أضف إلى المفضلة');
                    
                    if (discount > 0) {
                        $('.badge.bg-secondary').text(`خصم ${discount}%`);
                    }
                }
                
                $('.add-to-cart-btn').off('click').on('click', function() {
                    const $button = $(this);
                    const selectedColor = $('input[name="productColor"]:checked').val();
                    const selectedSize = $('input[name="productSize"]:checked').val();

                    const productLength = $('input[name="productLength"]:checked').val();

                    const quantity = $('.quantity-input').val();
                    const vendorId = $(this).data('vendor-id');
                    const customerDesc = $('.customer-desc-input').val();
                    
                    if (!selectedColor && product.colors?.length > 0) {
                        showAlert('Please select a color');
                        return;
                    }
                
                    if (!selectedSize && product.sizes?.length > 0) {
                        showAlert('Please select a size');
                        return;
                    }
                
                    // Disable button and show loading
                    $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
                
                    $.ajax({
                        url: 'controller/cart_controller.php',
                        type: 'POST',
                        data: {
                            action: 'add_to_cart',
                            product_id: product.ids,
                            color: selectedColor,
                            size: selectedSize,
                            quantity: quantity,
                            vendor_id: vendorId,
                            productLength: productLength,
                            customer_desc: customerDesc
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'redirect') {
                                // Save the entire modal state before redirecting
                                const modalState = {
                                    product_id: product.ids,
                                    color: selectedColor,
                                    size: selectedSize,
                                    quantity: quantity,
                                    customer_desc: customerDesc,
                                    product_data: product,
                                    return_url: window.location.href,
                                    vendor_id: vendorId,
                                    timestamp: new Date().getTime()
                                };
                                
                                // Store in sessionStorage
                                sessionStorage.setItem('pendingCartState', JSON.stringify(modalState));
                                
                                // Hide the modal properly
                                $('#quickViewModal').modal('hide');
                                
                                // Wait for modal to be fully hidden
                                $('#quickViewModal').on('hidden.bs.modal', function() {
                                    // Remove any lingering backdrops
                                    $('.modal-backdrop').remove();
                                    $('body').removeClass('modal-open');
                                    
                                    // Now show SweetAlert
                                    if (typeof Swal !== 'undefined') {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Please Login',
                                            text: 'You need to be logged in to add items to cart',
                                            showCancelButton: true,
                                            confirmButtonText: 'Go to Login',
                                            cancelButtonText: 'Cancel',
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            allowOutsideClick: false,
                                            allowEscapeKey: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                const currentUrl = window.location.href;
                                                window.location.href = `Login?redirect=${encodeURIComponent(currentUrl)}`;
                                            } else {
                                                // Re-enable button if user cancels
                                                $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add To Cart');
                                                // Clear the saved state
                                                sessionStorage.removeItem('pendingCartState');
                                            }
                                        });
                                    } else {
                                        // Fallback to regular alert
                                        alert('Please login to add items to cart');
                                        window.location.href = `Login?redirect=${encodeURIComponent(window.location.href)}`;
                                    }
                                    
                                    // Remove the event handler
                                    $('#quickViewModal').off('hidden.bs.modal');
                                });
                                
                            } else if (response.status === 'success') {
                                loadHeaderCounts();
                                setupDropdown('dropdownContent', 'success', svgSuccess + response.message, 'click');
                                $('#quickViewModal').modal('hide');
                                
                                // Clear any pending cart state
                                sessionStorage.removeItem('pendingCartState');
                            } else {
                                setupDropdown('dropdownContent', 'warning', svgError + response.message, 'click');
                                $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add To Cart');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            setupDropdown('dropdownContent', 'warning', svgError + 'An error occurred while adding the product to the cart.', 'click');
                            $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add To Cart');
                        }
                    });
                });
                
                $('.add-to-wishlist-btn').off('click').on('click', function() {
                    const $button = $(this);
                    const selectedColor = $('input[name="productColor"]:checked').val();
                    const selectedSize = $('input[name="productSize"]:checked').val();
                    const customerDesc = $('.customer-desc-input').val(); // Get the description
                    
                    // Get current language for translation
                    const lang = window.currentLanguage || 'english';
                    const dict = translations[lang] || translations.english;
                    
                    // Disable button and show loading
                    $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
                    
                    $.ajax({
                        url: 'controller/wishlist_controller.php',
                        type: 'POST',
                        data: {
                            action: 'add_to_wishlist',
                            product_id: product.ids,
                            color: selectedColor,
                            size: selectedSize,
                            customer_desc: customerDesc // Include description
                        },
                        dataType: 'json',
                        success: function(response) {
                            if (response.status === 'redirect') {
                                // Save the entire modal state before redirecting
                                const modalState = {
                                    product_id: product.ids,
                                    color: selectedColor,
                                    size: selectedSize,
                                    customer_desc: customerDesc,
                                    product_data: product,
                                    return_url: window.location.href,
                                    timestamp: new Date().getTime(),
                                    type: 'wishlist' // Mark as wishlist action
                                };
                                
                                // Store in sessionStorage
                                sessionStorage.setItem('pendingWishlistState', JSON.stringify(modalState));
                                
                                // Hide the modal properly
                                $('#quickViewModal').modal('hide');
                                
                                // Wait for modal to be fully hidden
                                $('#quickViewModal').on('hidden.bs.modal', function() {
                                    // Remove any lingering backdrops
                                    $('.modal-backdrop').remove();
                                    $('body').removeClass('modal-open');
                                    
                                    // Now show SweetAlert
                                    if (typeof Swal !== 'undefined') {
                                        Swal.fire({
                                            icon: 'warning',
                                            title: 'Please Login',
                                            text: 'You need to be logged in to add items to wishlist',
                                            showCancelButton: true,
                                            confirmButtonText: 'Go to Login',
                                            cancelButtonText: 'Cancel',
                                            confirmButtonColor: '#3085d6',
                                            cancelButtonColor: '#d33',
                                            allowOutsideClick: false,
                                            allowEscapeKey: false
                                        }).then((result) => {
                                            if (result.isConfirmed) {
                                                const currentUrl = window.location.href;
                                                window.location.href = `Login?redirect=${encodeURIComponent(currentUrl)}`;
                                            } else {
                                                // Re-enable button if user cancels
                                                $button.prop('disabled', false).html('<i class="fas fa-heart me-2"></i>Add To Wishlist');
                                                // Clear the saved state
                                                sessionStorage.removeItem('pendingWishlistState');
                                            }
                                        });
                                    } else {
                                        // Fallback to regular alert
                                        alert('Please login to add items to wishlist');
                                        window.location.href = `Login?redirect=${encodeURIComponent(window.location.href)}`;
                                    }
                                    
                                    // Remove the event handler
                                    $('#quickViewModal').off('hidden.bs.modal');
                                });
                                
                            } else if (response.status === 'success' || response.status === 'exists') {
                                // Use translated text
                                const inWishlistText = dict['in_wishlist'] || 'In Wishlist';
                                
                                $('.add-to-wishlist-btn')
                                    .html(`<i class="fas fa-check me-2"></i>${inWishlistText}`)
                                    .prop('disabled', true)
                                    .removeClass('btn-outline-secondary')
                                    .addClass('btn-success');
                                
                                // Show success message with translation
                                const successMessage = dict['added_to_wishlist'] || 'Added to wishlist successfully';
                                setupDropdown('dropdownContent', 'success', svgSuccess + successMessage, 'click');
                                $(document).trigger('wishlistUpdated');
                                
                                // Clear any pending wishlist state
                                sessionStorage.removeItem('pendingWishlistState');
                            } else {
                                setupDropdown('dropdownContent', 'warning', svgError + response.message, 'click');
                                $button.prop('disabled', false).html('<i class="fas fa-heart me-2"></i>Add To Wishlist');
                            }
                        },
                        error: function(xhr, status, error) {
                            console.error(error);
                            // Use translated error message
                            const errorText = dict['error_adding_wishlist'] || 'An error occurred while adding to the wishlist.';
                            alert(errorText);
                            $button.prop('disabled', false).html('<i class="fas fa-heart me-2"></i>Add To Wishlist');
                        }
                    });
                });
                
                setTimeout(() => {
                    mainSwiper.update();
                    thumbSwiper.update();
                }, 50);
                
            }, 100);
            
            $('#quickViewModal').modal('show');
        }

         


        function checkPendingWishlistState() {
            const pendingState = sessionStorage.getItem('pendingWishlistState');
            if (pendingState) {
                const state = JSON.parse(pendingState);
                
                // Clear it immediately to prevent multiple triggers
                sessionStorage.removeItem('pendingWishlistState');
                
                // If it's a simple wishlist state without modal data (from dz-wishicon)
                if (state.action === 'add_to_wishlist' && !state.product_data) {
                    // Just trigger the wishlist addition directly
                    const wishIcon = $(`.dz-wishicon`).filter(function() {
                        return $(this).closest('.shop-card').find('.product-main-link').attr('href').includes(state.product_id);
                    });
                    
                    if (wishIcon.length) {
                        // Add to wishlist directly
                        addToWishlistt(state.product_id, wishIcon);
                    } else {
                        // If we can't find the element, reload the page
                        location.reload();
                    }
                } else {
                    // For modal-based wishlist states, reopen the modal
                    reopenModalWithState(state);
                }
            }
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
                            .attr('data-i18n', 'in_wishlist')
                            .html('<i class="fas fa-check me-2"></i><span data-i18n="in_wishlist">In Wishlist</span>')
                            .prop('disabled', true)
                            .removeClass('btn-outline-secondary')
                            .addClass('btn-success');
                    } else {
                        $('#quickViewModal .add-to-wishlist-btn')
                            .attr('data-i18n', 'add_to_wishlist')
                            .html('<i class="fas fa-heart me-2"></i><span data-i18n="add_to_wishlist">Add to Wishlist</span>')
                            .prop('disabled', false)
                            .removeClass('btn-success')
                            .addClass('btn-outline-secondary');
                    }
                    
                    // Update translations after changing HTML
                    updatePageTranslations();
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
        
        let currentCurrency = window.currentCurrency || {
            country_code: 'BH',
            currency_code: 'BHD',
            currency_symbol: 'BD',
            exchange_rate: 1.0000
        };
        
        // Listen for currency updates from header
        $(document).on('currencyUpdated', function(event, currencyData) {
            console.log('Shop page received currency update:', currencyData);
            currentCurrency = currencyData;
            updateShopPrices();
        });
        // Shop-specific price formatting
        function formatShopPrice(price, includeSymbol = true) {
            if (isNaN(price) || price === 0) {
                return includeSymbol ? 'BD 0.00' : '0.00';
            }
            
            // Convert using current currency exchange rate
            const exchangeRate = currentCurrency?.exchange_rate || 1;
            const convertedPrice = price * exchangeRate;
            
            // Format with 2 decimal places and commas
            const formatted = convertedPrice.toFixed(2).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
            if (includeSymbol) {
                const symbol = currentCurrency?.currency_symbol || 'BD';
                return `${symbol} ${formatted}`;
            }
            
            return formatted;
        }
        // Update all prices on shop page
        function updateShopPrices() {
            console.log('Updating shop prices with currency:', currentCurrency);
            
            // Update product grid
            const params = new URLSearchParams(window.location.search);
            const catId = params.get('cat_id');
            loadProducts(catId);
            
            // Update quick view modal if open
            if ($('#quickViewModal').is(':visible')) {
                const quickViewBtn = $('#quickViewModal').find('.quick-view-btn');
                if (quickViewBtn.length) {
                    const productId = quickViewBtn.data('product-id');
                    if (productId) {
                        // Reload product details with new currency
                        loadProductDetails(productId);
                    }
                }
            }
        }
        if (window.currentCurrency) {
            currentCurrency = window.currentCurrency;
        } else {
            // Fetch currency if not already loaded
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_currency' },
                success: function(response) {
                    if (response.status === 'success') {
                        currentCurrency = response.data;
                        window.currentCurrency = response.data; // Share globally
                    }
                }
            });
        }
        function checkPendingCartState() {
            const pendingState = sessionStorage.getItem('pendingCartState');
            if (pendingState) {
                const state = JSON.parse(pendingState);
                
                // Clear it immediately to prevent multiple triggers
                sessionStorage.removeItem('pendingCartState');
                
                // Directly reopen the modal with saved product data without confirmation
                reopenModalWithState(state);
            }
        }
        
        function checkPendingWishlistState() {
            const pendingState = sessionStorage.getItem('pendingWishlistState');
            if (pendingState) {
                const state = JSON.parse(pendingState);
                
                // Clear it immediately to prevent multiple triggers
                sessionStorage.removeItem('pendingWishlistState');
                
                // Directly reopen the modal with saved product data without confirmation
                reopenModalWithState(state);
            }
        }
        
        function reopenModalWithState(state) {
            // Load product details
            loadProductDetailsWithState(state.product_id, state);
        }
        
        function loadProductDetailsWithState(productId, savedState) {
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
                        // Show modal with saved state
                        showQuickViewModalWithState(response.data, savedState);
                    } else {
                        $('#quickViewModal .modal-body').html(
                            '<div class="alert alert-danger">' + response.message + '</div>'
                        );
                    }
                },
                error: function(xhr, status, error) {
                    $('#quickViewModal .modal-body').html(
                        '<div class="alert alert-danger">Error loading product details. Please try again later.</div>'
                    );
                    console.error(error);
                }
            });
        }
        
        // Modified function to show modal with saved state (no SweetAlert)
        function showQuickViewModalWithState(product, savedState) {
            // First show the normal modal
            showQuickViewModal(product);
            
            // Then after modal is shown and all elements are ready, pre-fill the values
            setTimeout(() => {
                // Pre-fill color
                if (savedState.color && product.colors?.length > 0) {
                    const colorExists = product.colors.some(c => c === savedState.color);
                    if (colorExists) {
                        $(`input[name="productColor"][value="${savedState.color}"]`).prop('checked', true).trigger('change');
                    }
                }
                
                // Pre-fill size
                if (savedState.size && product.sizes?.length > 0) {
                    const sizeExists = product.sizes.some(s => s === savedState.size);
                    if (sizeExists) {
                        $(`input[name="productSize"][value="${savedState.size}"]`).prop('checked', true).trigger('change');
                    }
                }
                
                // Pre-fill quantity (only for cart)
                if (savedState.quantity) {
                    $('.quantity-input').val(savedState.quantity);
                }
                
                // Pre-fill customer description
                if (savedState.customer_desc) {
                    $('.customer-desc-input').val(savedState.customer_desc);
                }
                
                // Show a small notification that fields were restored (optional - can be removed if you don't want any notification)
                const typeText = savedState.type === 'wishlist' ? 'wishlist' : 'cart';
                setupDropdown('dropdownContent', 'success', svgSuccess + `Your previous ${typeText} selections have been restored!`, 'click');
                
            }, 800); // Give time for modal to fully render
        }
    });
    </script>
    <!--<
    

</body>

</html>