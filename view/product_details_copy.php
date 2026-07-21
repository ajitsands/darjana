<?php session_start(); ?>
<!DOCTYPE html>
<html lang="en">

<head>
    
    <?php include("view/templates/head.php"); ?>

    <style>
    
    
            /* Typography (body) */
        @font-face {
        font-family: Nunito;
        font-weight: 400;
        font-style: normal;
        font-display: fallback;
        src: url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_n4.fc49103dc396b42cae9460289072d384b6c6eb63.woff2") format("woff2"),
            url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_n4.5d26d13beeac3116db2479e64986cdeea4c8fbdd.woff") format("woff");
        }

        @font-face {
        font-family: Nunito;
        font-weight: 400;
        font-style: italic;
        font-display: fallback;
        src: url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_i4.fd53bf99043ab6c570187ed42d1b49192135de96.woff2") format("woff2"),
            url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_i4.cb3876a003a73aaae5363bb3e3e99d45ec598cc6.woff") format("woff");
        }

        @font-face {
        font-family: Nunito;
        font-weight: 700;
        font-style: normal;
        font-display: fallback;
        src: url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_n7.37cf9b8cf43b3322f7e6e13ad2aad62ab5dc9109.woff2") format("woff2"),
            url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_n7.45cfcfadc6630011252d54d5f5a2c7c98f60d5de.woff") format("woff");
        }

        @font-face {
        font-family: Nunito;
        font-weight: 700;
        font-style: italic;
        font-display: fallback;
        src: url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_i7.3f8ba2027bc9ceb1b1764ecab15bae73f86c4632.woff2") format("woff2"),
            url("//alabayaalislamiya.net/cdn/fonts/nunito/nunito_i7.82bfb5f86ec77ada3c9f660da22064c2e46e1469.woff") format("woff");
        }


        body{
            font-family: "Nunito, sans-serif" !important;
        }
        .title, .product-name, .btn, .price,
        .modal-content, .navbar-nav,
        .badge, 
        .size-label, .color-label, .form-select,
         .spec-heading {
            font-family: "Instrument Sans", sans-serif !important;
            text-transform: uppercase !important;
        }

        .spec-list, .spec-content{
            font-family: "Instrument Sans", sans-serif !important;
            text-transform: lowercase !important;
        }

        .form-label{
            font-family: 'Nunito', sans-serif !important;
        }

        h1, h2, h3, h4, h5, h6{
            font-family: "Instrument Sans", sans-serif !important;
            text-transform: uppercase !important;
            letter-spacing:0.18em !important;
            font-weight: 400;
        }
        .para-text{
            /*font-family: "Instrument Sans", sans-serif; !important;*/
            font-size: 0.875rem !important;
        }
        
        p {
            font-size: 16px;
            font-family: 'Nunito', sans-serif;
            letter-spacing: 0.0em !important;
            color: #343434;
            text-align: justify;
        }
        /* Product name and title - Gold theme */
        #product-title,
        .title {
            letter-spacing: 0.18em !important;
            font-weight: 400 !important;
            color: #1c1c1c; /* Black */
            font-size:18.1444px;
            
            font-style: normal;     
        }

        textarea {
            font-family: 'Nunito', sans-serif !important;
            
        }
    
        /* Buttons - Gold theme */ 
        .btn {
            letter-spacing: 1px !important;
            font-weight: 500 !important;
            border-radius: 0 !important;
            transition: all 0.3s ease;
        }
    
        .btn-primary {
            background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                        radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
            border: none !important;
            color: #000 !important;
        }
        
        .btn-primary:hover {
            background: #000 !important;
            color: #FEDB37 !important;
        }
    
        /* Secondary buttons - Black */
        /* .btn-secondary {
            background-color: #000 !important;
            border-color: #ffffff !important;
            color: #ffffff !important;
        } */
/*     
        .btn-secondary:hover {
            background-color: #9e8246 !important;
            border-color: #ffffff !important;
            color: #ffffff !important;
        } */
    
        /* Outline buttons - Gold theme */
        .btn-outline-primary {
            border: 2px solid #FFD700 !important;
            color: #000 !important;
            background: transparent !important;
        }
    
        .btn-outline-primary:hover {
            background-color: #FFD700 !important;
            color: #000 !important;
        }
    
        /* Price styling - Gold for emphasis */
        .price {
            font-weight: 600 !important;
            color: #000;
        }
    
        #product-price {
            color: #FFD700 !important; /* Gold price */
            font-size: 1.5rem;
            font-weight: 700;
        }
    
        .original-price del {
            color: #999;
        }
    
        /* Input fields exception */
        input:not(.btn),
        textarea,
        select {
            text-transform: none !important;
            /* letter-spacing: normal !important; */
            border: 2px solid #e0e0e0 !important;
            border-radius: 0 !important;
            transition: all 0.3s ease;
        }
    
        input:not(.btn):focus,
        textarea:focus,
        select:focus {
            border-color: #FFD700 !important;
            box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2) !important;
            outline: none !important;
        }
    
        /* Related products */
        .related-products-section .shop-card.style-1 .dz-content .title,
        .related-products-section .shop-card.style-1 .dz-content .price {
            text-transform: uppercase !important;
            letter-spacing: 0.5px !important;
            font-family: "Montserrat", sans-serif !important;
        }
    
        /* Mobile responsive */
        @media (max-width: 768px) {
            body,
            h1.title,
            .btn,
             {
                font-size: 0.9em !important;
            }
        }

         /* @media (max-width: 768px) {
            .price {
                font-size: 20px !important;
            }
        } */
    
        /* Specifications list */
        .spec-list li {
            /* text-transform: uppercase !important; */
            letter-spacing: 0.3px !important;
            font-family: "Montserrat", sans-serif !important;
            border-bottom: 1px dashed #FFD700;
            padding: 8px 0;
        }
    
        .spec-list li:last-child {
            border-bottom: none;
        }
    
        .spec-heading {
            font-weight: bold;
            color: #FFD700 !important; /* Gold headings */
        }
    
        .spec-content {
            margin-left: 5px;
            color: #727272;
        }
    
        /* Nav tabs - Gold theme */
        .nav-tabs {
            border-bottom: 2px solid #FFD700;
        }
    
        .nav-tabs .nav-link {
            font-weight: 500;
            color: #666;
            padding: 10px 20px;
            border: none !important;
            position: relative;
        }
    
        .nav-tabs .nav-link::after {
            content: '';
            position: absolute;
            bottom: 0;
            left: 0;
            width: 0;
            height: 3px;
            background-color: #FFD700;
            transition: width 0.3s ease;
        }
    
        .nav-tabs .nav-link:hover::after {
            width: 100%;
        }
    
        .nav-tabs .nav-link.active {
            color: #000;
            font-weight: 600;
            background: transparent;
        }
    
        .nav-tabs .nav-link.active::after {
            width: 100%;
            background-color: #FFD700;
        }
    
        /* Description paragraph styling */
        .para-text {
            color: #1c1c1c;
            line-height: 1.6;
            margin-bottom: 20px;
        }
        .dz-product-detail .dz-content .para-text {
            color: #1c1c1c !important;
        }
        /* ========== RELATED PRODUCT CARDS - IMAGE ONLY HIGHLIGHT ========== */
        .related-products-section .shop-card.style-1 {
            transition: none;
            margin-bottom: 20px;
            position: relative;
        }
    
        .related-products-section .shop-card.style-1:hover {
            transform: none;
            box-shadow: none;
        }
    
        /* Add gold corner accents to related product cards */
        .related-products-section .shop-card.style-1::before,
        .related-products-section .shop-card.style-1::after {
            content: '';
            position: absolute;
            width: 20px;
            height: 20px;
            opacity: 0;
            transition: opacity 0.3s ease;
            z-index: 2;
        }
    
        .related-products-section .shop-card.style-1::before {
            top: 10px;
            left: 10px;
            border-top: 2px solid #FFD700;
        }
    
        .related-products-section .shop-card.style-1::after {
            bottom: 10px;
            right: 10px;
            border-bottom: 2px solid #FFD700;
            border-right: 2px solid #FFD700;
        }
    
        .related-products-section .shop-card.style-1:hover::before,
        .related-products-section .shop-card.style-1:hover::after {
            opacity: 1;
        }
    
        /* Keep the card content stable */
        .related-products-section .shop-card.style-1 .dz-content {
            transition: none;
        }
    
        .related-products-section .shop-card.style-1:hover .dz-content {
            transform: none;
        }
    
        .swiper-four {
            padding: 20px 0;
        }
    
        .btn-prev,
        .btn-next {
            width: 40px;
            height: 40px;
            background: #fff;
            border-radius: 0 !important;
            display: flex;
            align-items: center;
            justify-content: center;
            box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
            cursor: pointer;
            transition: all 0.3s ease;
            color: #000;
            border: 2px solid #FFD700;
        }
    
        .btn-prev:hover,
        .btn-next:hover {
            background: #FFD700;
            color: #000;
            border-color: #000;
        }
    
        /* Quantity Input Styling */
        .product-quantity {
            margin-top: 15px;
        }
    
        .btn-quantity {
            display: flex;
            align-items: center;
        }
    
        .btn-quantity .form-control {
            width: 70px;
            text-align: center;
            margin: 0 5px;
            border-radius: 0 !important;
            border: 2px solid #e0e0e0 !important;
        }
    
        .btn-quantity .form-control:focus {
            border-color: #FFD700 !important;
        }
    
        .btn-quantity .input-group-btn {
            display: flex;
        }
    
        .btn-quantity .btn {
            padding: 0.25rem 0.5rem;
            font-size: 0.8rem;
            line-height: 1.5;
            width: 30px;
            height: 30px;
            border-radius: 0 !important;
            background: #fff;
            border: 2px solid #e0e0e0;
            color: #000;
        }
    
        .btn-quantity .btn:hover {
            background: #FFD700;
            border-color: #FFD700;
            color: #000;
        }
    
        /* ========== PRODUCT IMAGE ENHANCEMENTS ========== */
        
        /* Main product gallery images */
        .product-gallery-swiper2 .dz-media,
        .product-gallery-swiper2 .dz-media img,
        .DZoomImage,
        .DZoomImage img {
            border-radius: 12px !important;
            transition: all 0.4s ease;
            box-shadow: 0 8px 20px rgba(0, 0, 0, 0.08);
            border: 1px solid #f0f0f0;
        }
    
        /* Image hover effect for main product */
        .product-gallery-swiper2 .dz-media:hover,
        .DZoomImage:hover {
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.15); /* Gold tinted shadow */
            transform: scale(1.01);
        }
    
        /* Thumbnail images styling */
        .thumb-swiper-lg .swiper-slide img,
        .thumbnail-img {
            border-radius: 8px !important;
            transition: all 0.3s ease;
            box-shadow: 0 4px 10px rgba(0, 0, 0, 0.05);
            border: 2px solid transparent;
            width: 100px;
            height: 100px;
            object-fit: cover;
        }
    
        /* Active thumbnail with gold border */
        .thumb-swiper-lg .swiper-slide-thumb-active img {
            border: 2px solid #FFD700;
            box-shadow: 0 0 15px rgba(255, 215, 0, 0.3);
            opacity: 1;
        }
    
        /* Thumbnail hover effect */
        .thumb-swiper-lg .swiper-slide img:hover {
            transform: translateY(-2px);
            box-shadow: 0 8px 15px rgba(255, 215, 0, 0.2);
            border-color: #FFD700;
        }
    
        /* ========== RELATED PRODUCT IMAGES ========== */
    
        /* Related products section images */
        .related-products-section .shop-card.style-1 .dz-media,
        .related-products-section .shop-card.style-1 .dz-media img {
            border-radius: 12px !important;
            transition: all 0.3s ease;
            box-shadow: 0 6px 15px rgba(0, 0, 0, 0.06);
            border: 1px solid #f0f0f0;
        }
    
        /* Related products image hover effect - ONLY IMAGE HIGHLIGHTED */
        .related-products-section .shop-card.style-1:hover .dz-media {
            transform: translateY(-3px);
        }
    
        .related-products-section .shop-card.style-1:hover .dz-media img {
            box-shadow: 0 15px 30px rgba(255, 215, 0, 0.2); /* Gold shadow */
            transform: scale(1.03);
            filter: brightness(1.02);
            border-color: #FFD700;
        }
    
        /* ========== ENHANCED COLOR SELECTION STYLES - GOLD THEME ========== */
        .color-filter {
            gap: 8px;
            display: flex;
            flex-wrap: wrap;
            padding: 10px 0;
        }
    
        .color-option {
            position: relative;
            margin: 0;
            transition: all 0.3s ease;
        }
    
        .color-option input[type="radio"] {
            position: absolute;
            opacity: 0;
            width: 0;
            height: 0;
        }
    
        .color-option label {
            display: inline-block;
            width: 40px;
            height: 40px;
            border-radius: 50%;
            cursor: pointer;
            border: 2px solid #e0e0e0;
            transition: all 0.3s ease;
            position: relative;
            overflow: hidden;
            box-shadow: 0 2px 5px rgba(0, 0, 0, 0.1);
        }
    
        /* Selected color style - GOLD THEME */
        .color-option input[type="radio"]:checked + label {
           border: 3px solid #dec978 !important;
        box-shadow: 0 0 0 2px rgb(245 235 174), 0 0 15px rgb(255 239 165);
                transform: scale(1.1);
                z-index: 2;
                
            }
        
            /* Checkmark for selected color - GOLD THEME (SQUARE) */
            .color-option input[type="radio"]:checked + label::after {
                content: "";
                position: absolute;
                top: 50%;
                left: 50%;
                transform: translate(-50%, -50%);
                width: 14px;
                height: 14px;
                background-color: #dcc574 !important;
                border: 2px solid #333;
                border-radius: 0 !important;
                z-index: 3;
            }
        
            /* Special handling for dark colors */
            .color-option input[value="BLACK"]:checked + label::after,
            .color-option input[value="NAVY"]:checked + label::after,
            .color-option input[value="DARK_BLUE"]:checked + label::after,
            .color-option input[value="DARK_GREEN"]:checked + label::after,
            .color-option input[value="BROWN"]:checked + label::after,
            .color-option input[value="PURPLE"]:checked + label::after,
            .color-option input[value="MAROON"]:checked + label::after {
                background-color: #FFD700 !important;
                border-color: #333;
            }
        
            /* Special handling for light colors */
            .color-option input[value="WHITE"]:checked + label,
            .color-option input[value="white"]:checked + label,
            .color-option input[value="GOLD"]:checked + label,
            .color-option input[value="gold"]:checked + label,
            .color-option input[value="SILVER"]:checked + label,
            .color-option input[value="silver"]:checked + label,
            .color-option input[value="BEIGE"]:checked + label,
            .color-option input[value="CREAM"]:checked + label,
            .color-option input[value="IVORY"]:checked + label,
            .color-option input[value="LIGHT_YELLOW"]:checked + label {
                border: 3px solid #FFD700 !important;
            }
        
            .color-option input[value="WHITE"]:checked + label::after,
            .color-option input[value="white"]:checked + label::after,
            .color-option input[value="GOLD"]:checked + label::after,
            .color-option input[value="gold"]:checked + label::after,
            .color-option input[value="SILVER"]:checked + label::after,
            .color-option input[value="silver"]:checked + label::after,
            .color-option input[value="BEIGE"]:checked + label::after,
            .color-option input[value="CREAM"]:checked + label::after,
            .color-option input[value="IVORY"]:checked + label::after,
            .color-option input[value="LIGHT_YELLOW"]:checked + label::after {
                background-color: #333 !important;
                border: 2px solid #FFD700 !important;
            }
        
            /* Hover effect with gold theme */
            .color-option label:hover {
                transform: scale(1.08);
                border-color: #FFD700;
                box-shadow: 0 0 12px rgba(255, 215, 0, 0.4);
                z-index: 1;
            }
        
            /* ========== SIZE OPTIONS STYLING - GOLD THEME ========== */
            .product-size .btn-group {
                display: flex;
                flex-wrap: wrap;
                gap: 8px;
            }
        
            .product-size .btn {
                min-width: 45px;
                padding: 0.6rem 1rem;
                margin-right: 0;
                margin-bottom: 0;
                font-size: 0.95rem;
                border: 2px solid #e0e0e0;
                background: white;
                color: #333;
                transition: all 0.3s ease;
                border-radius: 50 !important;
                font-weight: 600;
                text-transform: uppercase;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }
        
            .product-size .btn-check:checked + .btn {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
                border: none !important;
                color: #ffffff !important;
                box-shadow: 0 0 0 2px rgba(254, 219, 55, 0.3), 0 0 15px rgba(254, 219, 55, 0.5);
                transform: scale(1.05);
                font-weight: 700;
            }
        
            /* Hover state for size buttons */
            .product-size .btn:hover {
                border-color: #FFD700;
                background-color: rgba(255, 215, 0, 0.1);
                transform: translateY(-2px);
                box-shadow: 0 5px 10px rgba(255, 215, 0, 0.2);
            }
        
            /* ========== LENGTH/SELECT DROPDOWN STYLING - GOLD THEME ========== */
            #length-select {
                border: 2px solid #e0e0e0;
                border-radius: 0;
                padding: 12px 15px;
                font-family: "Montserrat", sans-serif;
                text-transform: uppercase;
                transition: all 0.3s ease;
                background-color: white;
                font-weight: 500;
                width: 100%;
                max-width: 200px;
            }
        
            #length-select:focus,
            #length-select:hover {
                border-color: #FFD700;
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2);
                outline: none;
            }
        
            /* Bootstrap select styling with gold theme */
            .bootstrap-select .dropdown-toggle {
                border: 2px solid #e0e0e0 !important;
                border-radius: 0 !important;
                padding: 10px 15px !important;
                background: white !important;
                font-family: "Montserrat", sans-serif !important;
                text-transform: uppercase !important;
                font-weight: 500 !important;
            }
        
            .bootstrap-select .dropdown-toggle:focus,
            .bootstrap-select .dropdown-toggle:hover {
                border-color: #FFD700 !important;
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.2) !important;
            }
        
            .bootstrap-select.show .dropdown-toggle {
                border-color: #FFD700 !important;
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.3) !important;
            }
        
            .bootstrap-select .dropdown-menu {
                border-radius: 0 !important;
                border: 2px solid #FFD700;
                padding: 0;
                box-shadow: 0 5px 15px rgba(0, 0, 0, 0.1);
            }
        
            .bootstrap-select .dropdown-menu li a {
                padding: 10px 15px;
                font-family: "Montserrat", sans-serif;
                text-transform: uppercase;
                border-bottom: 1px solid #f0f0f0;
                transition: all 0.2s ease;
            }
        
            .bootstrap-select .dropdown-menu li a:hover {
                background-color: rgba(255, 215, 0, 0.1);
            }
        
            .bootstrap-select .dropdown-menu li.selected a {
                background-color: #FFD700 !important;
                color: #000 !important;
                font-weight: 600;
            }
        
            /* Login Modal Styling with gold accents */
            #loginModal .modal-content {
                border-radius: 0 !important;
                border: 2px solid #FFD700;
                box-shadow: 0 5px 20px rgba(255, 215, 0, 0.2);
            }
        
            #loginModal .modal-header {
                border-bottom: 1px solid #FFD700;
                padding-bottom: 15px;
            }
        
            #loginModal .modal-title {
                font-weight: 600;
                color: #000;
            }
        
            #loginModal .modal-body {
                padding-top: 15px;
                color: #666;
            }
        
            #loginModal .modal-footer {
                border-top: 1px solid #FFD700;
                padding-top: 15px;
            }
        
            #loginModal .btn-primary {
                background-color: #FFD700 !important;
                border-color: #FFD700 !important;
                color: #000 !important;
                border-radius: 0 !important;
            }
        
            #loginModal .btn-primary:hover {
                background-color: #000 !important;
                border-color: #000 !important;
                color: #FFD700 !important;
            }
        
            #loginModal .btn-secondary {
                background-color: #000 !important;
                border-color: #000 !important;
                color: #FFD700 !important;
                border-radius: 0 !important;
            }
        
            /* Thumbnail Swiper Styling */
            .thumb-swiper-lg {
                overflow: hidden;
                margin-top: 15px;
            }
        
            .thumb-swiper-lg .swiper-slide {
                opacity: 0.6;
                transition: opacity 0.3s ease, border 0.3s ease;
                cursor: pointer;
                width: auto;
            }
        
            .thumb-swiper-lg .swiper-slide-thumb-active {
                opacity: 1;
            }
        
            .thumb-swiper-lg .swiper-wrapper {
                transform: none !important;
                display: flex;
                justify-content: center;
                gap: 10px;
            }
        
            .thumb-btn-prev,
            .thumb-btn-next {
                width: 30px;
                height: 30px;
                background: #fff;
                border-radius: 0 !important;
                display: flex;
                align-items: center;
                justify-content: center;
                box-shadow: 0 2px 10px rgba(0, 0, 0, 0.1);
                cursor: pointer;
                transition: all 0.3s ease;
                position: absolute;
                z-index: 10;
                top: 50%;
                transform: translateY(-50%);
                border: 2px solid #FFD700;
                color: #000;
            }
        
            .thumb-btn-prev:hover,
            .thumb-btn-next:hover {
                background: #FFD700;
                color: #000;
                border-color: #000;
            }
        
            /* Product tag badges with gold theme */
            .product-tag .badge {
                background-color: #FFD700 !important;
                color: #000 !important;
                font-weight: 600;
                padding: 5px 10px;
                border-radius: 0 !important;
                /*border: 1px solid #000;*/
            }
        
            #discount-badge, 
            .product-tag .badge {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
                color: white !important;
                font-weight: 700;
                border: none;
            }
        
            /* Make all badges square */
            .badge {
                border-radius: 0 !important;
            }
        
            /* Social icons with gold theme */
            .social-icon a {
                border-radius: 0 !important;
                transition: all 0.3s ease;
                border: 2px solid #ffffff00;
                color: #000;
            }
        
            .social-icon a:hover {
                background-color: #FFD700 !important;
                border-color: #FFD700 !important;
                color: #000 !important;
                transform: translateY(-2px);
            }
        
            /* Make currency symbol smaller in product cards */
            .card-currency-symbol {
                font-size: 0.7em;
                margin-right: 1px;
                opacity: 0.9;
            }
        
            /* For the main product details page */
            #product-price .currency,
            #actual-price .currency,
            #total-price .currency {
                font-size: 0.75em;
                margin-right: 1px;
            }
        
            /* Savings text in gold */
            #savings-text {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 600;
                display: inline-block; /* Ensures gradient applies correctly */
            }
        
            /* Category and metadata with gold gradient accents */
            #category-info li strong,
            #brand-info li strong,
            #warranty-info li strong,
            #vendor-info li strong {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                font-weight: 700;
                display: inline-block; /* Ensures gradient applies correctly */
            }
        
            #category-info a,
            #brand-info a,
            #warranty-info a,
            #vendor-info a {
                color: #6b6b6b;
                transition: color 0.3s ease;
                font-family: 'Nunito', sans-serif;
                font-size: 16px;
            
            }
        
            #category-info a:hover,
            #brand-info a:hover,
            #warranty-info a:hover,
            #vendor-info a:hover {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                -webkit-background-clip: text;
                -webkit-text-fill-color: transparent;
                background-clip: text;
                transition: all 0.3s ease;
            }
        
            /* SKU styling */
            #product-sku {
                color: #666;
                border-bottom: 1px dashed #FFD700;
                padding-bottom: 5px;
            }
        
            /* Wishlist heart button styling with gold */
            .add-to-wishlist-btn {
                transition: all 0.3s ease;
                cursor: pointer;
                border-radius: 0 !important;
                border: 2px solid #e0e0e0 !important;
                background: white !important;
            }
        
            .add-to-wishlist-btn:hover {
                transform: scale(1.1);
                border-color: #FFD700 !important;
                background-color: #fff !important;
            }
        
            .add-to-wishlist-btn:hover i {
                color: #FFD700 !important;
            }
        
            .add-to-wishlist-btn.wishlist-active i {
                color: #ff4444 !important;
            }
        
            .add-to-wishlist-btn.wishlist-active {
                border-color: #ff4444 !important;
            }
        
            /* Add to cart button with gold theme */
            .add-to-cart-btn {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
                border: none !important;
                color: #ffffff !important;
                border-radius: 10px !important;
                font-weight: 600;
                transition: all 0.3s ease;
                position: relative;
                overflow: hidden;
            }
            
            .add-to-cart-btn:hover {
                background: #000 !important;
                color: #FEDB37 !important;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(254, 219, 55, 0.4);
            }
            
            .add-to-cart-btn i {
                color: #000;
                transition: color 0.3s ease;
            }
            
            .add-to-cart-btn:hover i {
                color: #FEDB37;
            }
        
            .place-order-btn {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
                border: none !important;
                color: #ffffff !important;
                border-radius: 10px !important;
                font-weight: 600;
                position: relative;
                overflow: hidden;
                z-index: 1;
                transition: all 0.3s ease;
            }
            
            .place-order-btn:hover {
                background: #000 !important;
                color: #FEDB37 !important;
                transform: translateY(-2px);
                box-shadow: 0 5px 15px rgba(254, 219, 55, 0.3);
            }
            
            .place-order-btn:active {
                transform: translateY(0);
            }
        
            /* Zoom icon styling */
            .dz-maximize {
                background: rgba(255, 215, 0, 0.9) !important;
                border-radius: 0 !important;
                padding: 8px;
                transition: all 0.3s ease;
                color: #000 !important;
            }
        
            .dz-maximize:hover {
                background: #000 !important;
                color: #FFD700 !important;
            }
        
            /* Loading area enhancement */
            #loading-area {
                border-radius: 0 !important;
                background: rgba(255, 215, 0, 0.1) !important;
            }
        
            /* Section titles with gold underline */
            .section-title {
                position: relative;
                padding-bottom: 15px;
                margin-bottom: 30px;
            }
        
            .section-title::after {
                content: '';
                position: absolute;
                bottom: 0;
                left: 0;
                width: 60px;
                height: 3px;
                background-color: #FFD700;
            }
        
            /* Breadcrumb styling */
            .breadcrumb {
                background: transparent;
                padding: 10px 0;
            }
        
            .breadcrumb-item a {
                color: #666;
                transition: color 0.3s ease;
            }
        
            .breadcrumb-item a:hover {
                color: #FFD700;
            }
        
            .breadcrumb-item.active {
                color: #000;
                font-weight: 600;
            }
        
            .breadcrumb-item + .breadcrumb-item::before {
                color: #FFD700;
            }
        
            /* Rating stars in gold */
            .rating i {
                color: #FFD700;
            }
        
            .rating .fa-star-half-alt {
                color: #FFD700;
            }
        
            /* Responsive adjustments */
            @media (max-width: 768px) {
                .related-products-section .shop-card.style-1 .dz-content .title {
                    font-size: 0.85rem !important;
                    height: 36px;
                }
        
                .related-products-section .shop-card.style-1 .dz-content .price {
                    font-size: 0.8rem !important;
                }
        
                .color-option label {
                    width: 35px;
                    height: 35px;
                }
                
                .product-size .btn {
                    min-width: 40px;
                    padding: 0.5rem 0.8rem;
                }
        
                .product-gallery-swiper2 .dz-media img,
                .related-products-section .shop-card.style-1 .dz-media img {
                    border-radius: 8px !important;
                }
        
            }
        
            /* Ensure all images have consistent focus */
            img {
                image-rendering: -webkit-optimize-contrast;
                image-rendering: crisp-edges;
            }
        
            /* Gold scrollbar for webkit browsers */
            ::-webkit-scrollbar {
                width: 10px;
            }
        
            ::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
        
            ::-webkit-scrollbar-thumb {
                background: #FFD700;
            }
        
            ::-webkit-scrollbar-thumb:hover {
                background: #000;
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
            .quantity-selector {
                max-width: 220px;           /* adjust as needed */
            }
            
            .btn-quantity-decrement,
            .btn-quantity-increment {
                font-size: 1.1rem;
                font-weight: 600;
                border: 2px solid #e0e0e0;
                background: white;
                color: #333;
                transition: all 0.25s ease;
                width: 45px;
                height: 42px;
                display: flex;
                align-items: center;
                justify-content: center;
                padding: 0;
            }
            
            .btn-quantity-decrement:hover,
            .btn-quantity-increment:hover {
                background: #FFD700;
                border-color: #FFD700;
                color: #000;
            }
            
            #quantity-input {
                border: 2px solid #e0e0e0 !important;
                border-radius: 0 !important;
                text-align: center;
                /* font-weight: 600; */
                font-size: 1.1rem;
            }
            
            #quantity-input:focus {
                border-color: #FFD700 !important;
                box-shadow: 0 0 0 3px rgba(255, 215, 0, 0.15) !important;
            }
            
            /* Disable spinner arrows in number input (clean look) */
            #quantity-input::-webkit-inner-spin-button,
            #quantity-input::-webkit-outer-spin-button {
                -webkit-appearance: none;
                margin: 0;
            }
            /* ========== LENGTH OPTIONS – compact like sizes ========== */
            
            .product-length .form-label {
                display: block !important;   /* force new line */
                margin-bottom: 0.75rem;      /* good breathing room under label */
                font-weight: 500;
            }
            .product-length .btn-group {
                flex-wrap: wrap;
                gap: 8px;
                /* Optional: better visual grouping */
                padding: 4px 0;
            }
            
            .product-length .btn {
                min-width: 45px;
                padding: 0.6rem 1rem;
                margin-right: 0;
                margin-bottom: 0;
                font-size: 0.95rem;
                border: 2px solid #e0e0e0;
                background: white;
                color: #333;
                transition: all 0.3s ease;
                border-radius: 50% !important;
                font-weight: 600;
                text-transform: uppercase;
                box-shadow: 0 2px 5px rgba(0, 0, 0, 0.05);
            }
            
            .product-length .btn-check:checked + .btn {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%) !important;
                border: none !important;
                color: #ffffff !important;
                box-shadow: 0 0 0 2px rgba(254, 219, 55, 0.3), 0 0 15px rgba(254, 219, 55, 0.5);
                transform: scale(1.05);
                font-weight: 700;
            }
            
            .product-length .btn:hover {
                border-color: #FFD700;
                background-color: rgba(255, 215, 0, 0.08);
                transform: translateY(-2px);
                box-shadow: 0 5px 10px rgba(255, 215, 0, 0.25);
            }
            
            /* Make even smaller on mobile if needed */
            @media (max-width: 576px) {
                .product-length .btn {
                    min-width: 42px;
                    padding: 0.5rem 0.8rem;
                    font-size: 0.88rem;
                }
            }
            .para-text {
                /*font-family: "Fette 1451", sans-serif !important;*/
                font-style: normal !important;
                font-weight: 400 !important;
                font-size: 0.850rem !important;
                line-height: 1.65 !important;
            }
            /*@font-face {*/
            /*    font-family: "Fette 1451";*/
            /*    src: url("../assets/fonts/Fette1451-Regular.woff2") format("woff2"),*/
            /*         url("../assets/fonts/Fette1451-Regular.woff") format("woff");*/
            /*    font-weight: 400;*/
            /*    font-style: normal;*/
            /*}*/
            /* ========== FLOATING SIZE CHART BUTTON & SIDEBAR ========== */

            /* Floating Button */
            .size-chart-float-btn {
                position: fixed;
                right: 20px;
                top: 50%;
                transform: translateY(-50%);
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                color: #ffffff;
                padding: 15px 10px;
                border-radius: 8px 0 0 8px;
                writing-mode: vertical-rl;
                text-orientation: mixed;
                font-weight: 600;
                letter-spacing: 2px;
                cursor: pointer;
                z-index: 999;
                box-shadow: -3px 3px 15px rgba(0,0,0,0.2);
                transition: all 0.3s ease;
                border: none;
                font-size: 14px;
                text-transform: uppercase;
                display: flex;
                align-items: center;
                justify-content: center;
                gap: 8px;
            }
            
            .size-chart-float-btn i {
                font-size: 20px;
                transform: rotate(90deg);
                margin-bottom: 5px;
            }
            
            .size-chart-float-btn:hover {
                right: 25px;
                background: #000;
                color: #FFD700;
                box-shadow: -5px 5px 20px rgba(255, 215, 0, 0.4);
            }
            
            /* Sidebar */
            .size-chart-sidebar {
                position: fixed;
                top: 0;
                right: -450px;
                width: 450px;
                height: 100vh;
                background: #fff;
                z-index: 1001;
                box-shadow: -5px 0 30px rgba(0,0,0,0.15);
                transition: right 0.4s cubic-bezier(0.4, 0, 0.2, 1);
                overflow-y: auto;
                display: flex;
                flex-direction: column;
            }
            
            .size-chart-sidebar.open {
                right: 0;
            }
            
            /* Sidebar Header */
            .size-chart-header {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                color: #000;
                padding: 20px 25px;
                display: flex;
                justify-content: space-between;
                align-items: center;
                position: sticky;
                top: 0;
                z-index: 10;
            }
            
            .size-chart-header h3 {
                margin: 0;
                font-size: 1.3rem;
                font-weight: 600;
                letter-spacing: 0.1em;
                text-transform: uppercase;
            }
            
            .close-sidebar {
                background: none;
                border: none;
                font-size: 32px;
                line-height: 1;
                cursor: pointer;
                color: #ffffff;
                transition: transform 0.3s ease;
                padding: 0 5px;
            }
            
            .close-sidebar:hover {
                transform: rotate(90deg);
                color: #333;
            }
            
            /* Sidebar Content */
            .size-chart-content {
                padding: 25px;
                flex: 1;
            }
            
            /* Table Styling */
            .size-table {
                border: 2px solid #FFD700 !important;
                margin-bottom: 0;
            }
            
            .size-table thead {
                background: radial-gradient(ellipse farthest-corner at right bottom, #FEDB37 0%, #FDB931 8%, #9f7928 30%, #8A6E2F 40%, transparent 80%),
                            radial-gradient(ellipse farthest-corner at left top, #FFFFFF 0%, #FFFFAC 8%, #D1B464 25%, #5d4a1f 62.5%, #5d4a1f 100%);
                color: #000;
            }
            
            .size-table thead th {
                border: 1px solid #FFD700 !important;
                padding: 12px !important;
                font-weight: 600;
                text-transform: uppercase;
                font-size: 0.9rem;
                color: white;
            }
            
            .size-table tbody td {
                border: 1px solid #FFD700 !important;
                padding: 10px 12px !important;
            }
            
            .size-table tbody tr:nth-child(even) {
                background-color: #fafafa;
            }
            
            /* Table Title */
            .size-table-title {
                font-family: 'Instrument Sans', sans-serif;
                font-weight: 500;
                letter-spacing: 0.05em;
                font-size: 1.1rem;
            }
            
            .size-table-title small {
                font-size: 0.85rem;
                color: #666;
                margin-top: 3px;
            }
            
            /* Height-Length Table Scroll */
            .height-length-table {
                border: 2px solid #FFD700;
                border-radius: 4px;
            }
            
            .height-length-table::-webkit-scrollbar {
                width: 8px;
            }
            
            .height-length-table::-webkit-scrollbar-track {
                background: #f1f1f1;
            }
            
            .height-length-table::-webkit-scrollbar-thumb {
                background: #FFD700;
                border-radius: 4px;
            }
            
            .height-length-table::-webkit-scrollbar-thumb:hover {
                background: #000;
            }
            
            /* Arabic Text */
            .arabic-text {
                font-family: 'Amiri', serif;
                font-size: 0.95rem;
                color: #555;
            }
            
            .arabic-small {
                font-family: 'Amiri', serif;
                direction: rtl;
                text-align: right;
            }
            
            /* Overlay */
            .size-chart-overlay {
                position: fixed;
                top: 0;
                left: 0;
                width: 100%;
                height: 100%;
                background: rgba(0, 0, 0, 0.5);
                z-index: 1000;
                display: none;
                backdrop-filter: blur(3px);
            }
            
            .size-chart-overlay.active {
                display: block;
            }
            
            /* Responsive */
            @media (max-width: 768px) {
                .size-chart-sidebar {
                    width: 100%;
                    right: -100%;
                }
                
                .size-chart-float-btn {
                    padding: 12px 8px;
                    font-size: 12px;
                    right: 15px;
                }
                
                .size-chart-float-btn i {
                    font-size: 18px;
                }
                
                .size-chart-header h3 {
                    font-size: 1.1rem;
                }
                
                .size-table thead th {
                    font-size: 0.8rem;
                    padding: 8px !important;
                }
                
                .size-table tbody td {
                    font-size: 0.85rem;
                    padding: 8px !important;
                }
            }
            
            /* Print Styles */
            @media print {
                .size-chart-float-btn,
                .size-chart-overlay,
                .close-sidebar {
                    display: none !important;
                }
                
                .size-chart-sidebar {
                    position: static;
                    width: 100%;
                    height: auto;
                    box-shadow: none;
                }
            }
            .dz-tabs span{
                font-family:'Nunito', sans-serif;
                font-size: 16px;
                text-transform: UPPERCASE;
                /* color: #1c1c1c */
            }
            
            #additional-requirements::placeholder {
                    color: rgba(151, 151, 159, 0.39) !important;
            }

            .uppercase{
                text-transform: UPPERCASE;
            }

            .txt_centre{
                text-align: center;
            }

            .currency-symbol {
                font-size: 0.8em;
                vertical-align: baseline;
            }
    </style>



</head>

<body id="bg">
    <div class="page-wraper">

        <div id="loading-area" class="preloader-wrapper-4">
            <img src="images/loading.gif" alt="">
        </div>

        <?php include("view/templates/header.php"); ?>

        <div class="page-content bg-light">

            <?php include("view/pages/productDetails/product_details_body.php"); ?>

        </div>
        <div id="dropdownContent" style="text-align:center;"></div>

        <?php include("view/templates/footer.php"); ?>


        <button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>


    </div>
    <?php include("view/templates/scripts.php"); ?>

    <script>
    $(document).ready(function() {
        checkPendingCartState();
        checkPendingWishlistState();
        const CURRENCY_SYMBOL = '<?php echo STORE_CURRENCY_SYMBOL; ?>'; // "BD"
        function getLocalized(en, ar) {
            const isArabic = window.currentLanguage === 'arabic';
            return (isArabic && ar && ar.trim() !== '') ? ar : (en || '');
        }
        
        $('.btn-quantity-decrement').on('click', function() {
            let input = $('#quantity-input');
            let value = parseInt(input.val()) || 1;
            if (value > 1) {
                input.val(value - 1);
            }
        });
    
        $('.btn-quantity-increment').on('click', function() {
            let input = $('#quantity-input');
            let value = parseInt(input.val()) || 1;
            input.val(value + 1);
        });
    
        // Optional: prevent invalid values
        $('#quantity-input').on('change', function() {
            let val = parseInt($(this).val());
            if (isNaN(val) || val < 1) {
                $(this).val(1);
            }
        });
        
        let productId = null;
        updateStaticTextTranslations();
        // Get product ID from URL
        const urlParams = new URLSearchParams(window.location.search);
        productId = urlParams.get('id');

        // function formatPrice(price, includeSymbol = true, decimals = 2, context = 'default') {
        //     if (isNaN(price) || price == null) {
        //         if (includeSymbol) {
        //             const symbol = currentCurrency?.currency_symbol || '<?php echo STORE_CURRENCY_SYMBOL; ?>';
        //             if (context === 'card') {
        //                 return `<span class="card-currency-symbol">${symbol}</span> 0.00`;
        //             }
        //             return `${symbol} 0.00`;
        //         }
        //         return '0.00';
        //     }
            
        //     // Convert price using current currency exchange rate
        //     const exchangeRate = currentCurrency?.exchange_rate || 1;
        //     const convertedPrice = price * exchangeRate;
        //     const symbol = currentCurrency?.currency_symbol || '<?php echo STORE_CURRENCY_SYMBOL; ?>';
        //     const currencyCode = currentCurrency?.currency_code || 'BHD';
            
        //     // Format the number
        //     let formatted = Number(convertedPrice).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
            
        //     // Different styling based on context
        //     if (includeSymbol) {
        //         if (context === 'card') {
        //             return `<span class="card-currency-symbol">${symbol}</span> ${formatted} <span class="text-muted">${currencyCode}</span>`;
        //         }
        //         return `${symbol} ${formatted}`;
        //     }
            
        //     return formatted;
        // }

        // formate pricing updated
        function formatPrice(price, includeSymbol = true, decimals = 2, context = 'default') {
            if (isNaN(price) || price == null) {
                const symbol = currentCurrency?.currency_symbol || '<?php echo STORE_CURRENCY_SYMBOL; ?>';

                if (includeSymbol) {
                    return `<small class="currency-symbol">${symbol}</small> 0.00`;
                }
                return '0.00';
            }

            const exchangeRate = currentCurrency?.exchange_rate || 1;
            const convertedPrice = price * exchangeRate;

            const symbol = currentCurrency?.currency_symbol || '<?php echo STORE_CURRENCY_SYMBOL; ?>';
            const currencyCode = currentCurrency?.currency_code || 'BHD';

            let formatted = Number(convertedPrice)
                .toFixed(decimals)
                .replace(/\B(?=(\d{3})+(?!\d))/g, ",");

            if (includeSymbol) {
                if (context === 'card') {
                    return `<small class="card-currency-symbol">${symbol}</small> ${formatted} <span class="text-muted">${currencyCode}</span>`;
                }

                return `<small class="currency-symbol">${symbol}</small> ${formatted}`;
            }

            return formatted;
        }
        
        $(document).on('currencyUpdated', function(event, currencyData) {
            console.log('Product details page received currency update:', currencyData);
            
            // Update the global currency
            currentCurrency = currencyData;  // Update local variable
            window.currentCurrency = currencyData;  // Update global variable
            
            // Reload product details with new currency
            // Use window.productId instead of productId
            if (window.productId) {
                loadProductDetails(window.productId);
            } else if (productId) {
                loadProductDetails(productId);
            }
            
            // Show notification
            const currencyName = currencyData.country_name || 'selected currency';
            showNotification('Prices updated to ' + currencyName, 'success');
        });
        
        // Get current currency from session
        let currentCurrency = window.currentCurrency || <?php echo json_encode(isset($_SESSION['currency']) ? $_SESSION['currency'] : [
            'country_code' => 'BH',
            'currency_code' => 'BHD',
            'currency_symbol' => 'BD',
            'exchange_rate' => 1.0000
        ]); ?>;
        if (!currentCurrency && window.currentCurrency) {
            currentCurrency = window.currentCurrency;
        }
        
        // Or fetch from server if not available
        if (!currentCurrency) {
            $.ajax({
                url: 'controller/currency_controller.php',
                type: 'POST',
                dataType: 'json',
                data: { action: 'get_current_currency' },
                success: function(response) {
                    if (response.status === 'success') {
                        currentCurrency = response.data;
                        window.currentCurrency = response.data;
                    }
                }
            });
        }
        
        // Get product ID from URL
        //   const productId = <?php echo json_encode($_POST['id'] ?? null); ?>;
        // const urlParams = new URLSearchParams(window.location.search);
        // const productId = urlParams.get('id');
        // alert(productId);

        // if (!productId) {
        //     showError('Product ID is missing');
        //     return;
        // }

        if (productId) {

            checkWishlistStatus(productId);
        }

        // Load product details
        loadProductDetails(productId);
        
        function updateStaticTextTranslations() {
            const isArabic = window.currentLanguage === 'arabic';
            const dict = translations[window.currentLanguage] || translations.english;
        
            // Update all elements with data-i18n
            document.querySelectorAll('[data-i18n]').forEach(el => {
                const key = el.getAttribute('data-i18n');
                if (dict[key]) {
                    el.textContent = dict[key];
                }
            });
        
            // Update placeholder attributes
            document.querySelectorAll('[data-i18n-placeholder]').forEach(el => {
                const key = el.getAttribute('data-i18n-placeholder');
                if (dict[key]) {
                    el.setAttribute('placeholder', dict[key]);
                }
            });
        
            // Update button texts that are set via JavaScript
            if ($('#description-title').length) {
                const titleText = isArabic ? 'مواصفات المنتج' : 'Product Specifications';
                $('#description-title').text(titleText);
            }
        
            // Update save text format
            const saveText = $('#savings-text').text();
            if (saveText.includes('You save')) {
                const priceMatch = saveText.match(/You save\s*(.+)/);
                if (priceMatch) {
                    const price = priceMatch[1];
                    const newText = isArabic ? `وفرت ${price}` : `You save ${price}`;
                    $('#savings-text').text(newText);
                }
            }
        }

        
        function loadProductDetails(productId) {
            $.ajax({
                url: 'controller/product_details_controller.php',
                type: 'POST',
                data: {
                    action: 'get_product_details',
                    product_id: productId
                },
                dataType: 'json',
                beforeSend: function() {
                    $('#loading-area').show();
                },
                success: function(response) {
                    $('#loading-area').hide();
                    
                    if (response.status === 'success') {
                        // Update currentCurrency if returned from server
                        if (response.currency) {
                            currentCurrency = response.currency;
                            window.currentCurrency = response.currency;
                        }
                        
                        renderProductDetails(response.data);
                    } else {
                        showError(response.message || 'Error loading product details');
                    }
                },
                error: function(xhr, status, error) {
                    $('#loading-area').hide();
                    showError('Error loading product details. Please try again later.');
                    console.error(error);
                }
            });
        }
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
        function renderProductDetails(product) {
            // Calculate pricing (unchanged)
            const originalPrice = parseFloat(product.amount_mrp) || 0;
            const sellingPrice  = parseFloat(product.amount_selling) || 0;
            const offerPrice    = parseFloat(product.amount_offer) || 0;
            const displayPrice  = (offerPrice && offerPrice > 0) ? offerPrice : sellingPrice;
            const discount = originalPrice > displayPrice ?
                Math.round(((originalPrice - displayPrice) / originalPrice) * 100) : 0;
            const savings = originalPrice - offerPrice;
        
            // Set default image
            const defaultImage = 'images/shop/product/default-product.jpg';
            const baseImageUrl = 'https://admin.darjanafashion.com/assets/img/products/';
        
            // ── Localized values ────────────────────────────────────────────────────
            const productName        = getLocalized(product.product_name, product.product_name_arabic);
            const productDescription = getLocalized(product.product_description, product.product_description_arabic);
            const noDescMsg = '<span data-i18n="no_description">No description available</span>';
        
            if (product.related_products && product.related_products.length > 0) {
                renderRelatedProducts(product.related_products);
            } else {
                $('.related-products-section').hide();
            }
        
            // Breadcrumb – use localized name
            $('#product-name-breadcrumb').text(productName);
        
            if (product.category_name) {
                $('#category-link')
                    .text(product.category_name)
                    .removeAttr('href');
            }
        
            // Update product gallery – pass localized name for alt
            updateImageGallery(product.images || [], productName, baseImageUrl, defaultImage);
        
            // Update product info – localized title & description
            $('#product-title').text(productName);
            $('#product-description').text(productDescription || noDescMsg);
        
            // Update pricing (unchanged)
            updatePricing(sellingPrice, originalPrice, discount, savings, offerPrice);
            
            // Update options (unchanged – sizes/colors/length usually not translated)
            updateSizeOptions(product.sizes || []);
            updateColorOptions(product.colors || []);
            updateLengthOptions(product.length || []);
        
            // Update metadata (brand/warranty may need Arabic if you have them)
            updateProductMetadata(product);
        
            // Update action buttons (unchanged)
            $('.add-to-cart-btn').attr('data-product-id', product.ids);
            $('.add-to-wishlist-btn').attr('data-product-id', product.ids);
        
            // Update description tab to show specifications (unchanged logic)
            $('#description-title').text(getLocalized('Product Specifications', 'مواصفات المنتج'));
            updateStaticTextTranslations();
            if (product.specifications && product.specifications.length > 0) {
                let specsHtml = '<ul >';
                
                product.specifications.forEach(spec => {
                    if (spec && (spec.product_specification || spec.product_specification_arabic)) {
                        // Get localized heading and content
                        const heading = getLocalized(spec.product_specification, spec.product_specification_arabic);
                        
                        // For specifications that are in "key: value" format
                        if (heading.includes(':')) {
                            const parts = heading.split(':');
                            const specHeading = parts[0] || '';
                            const specContent = parts.slice(1).join(':').trim();
                            
                            specsHtml += `
                                <li>
                                    <span class="spec-heading">${specHeading.trim()}:</span>
                                    ${specContent ? `<p  style="text-transform: lowercase;">${specContent}</p>` : ''}
                                </li>`;
                        } else {
                            // For simple specification items
                            specsHtml += `
                                <li>
                                    <p class="txt_centre">${heading}</p>
                                </li>`;
                        }
                    }
                });
                
                specsHtml += '</ul>';
                $('#full-description').html(specsHtml);
                
                // Update tab text with localization
                $('#description-tab span').text(getLocalized('Specifications', 'المواصفات'));
            } else {
                const noSpecsMsg = getLocalized(
                    'No specifications available. ' + (productDescription ? 'See product description above.' : ''),
                    'لا توجد مواصفات متاحة. ' + (productDescription ? 'انظر وصف المنتج أعلاه.' : '')
                );
                $('#full-description').html(`<p class="text-muted">${noSpecsMsg}</p>`);
            }
        
            // Social sharing – use localized name in tweet
            const currentUrl = encodeURIComponent(window.location.href);
            $('.social-icon a[href*="facebook.com"]').attr('href',
                `https://www.facebook.com/sharer/sharer.php?u=${currentUrl}`);
            $('.social-icon a[href*="twitter.com"]').attr('href',
                `https://twitter.com/intent/tweet?url=${currentUrl}&text=${encodeURIComponent(productName)}`
            );
        
            // Initialize plugins (unchanged)
            initializePlugins();
        }

        // Helper functions
        function updateImageGallery(images, productName, baseUrl, defaultImage) {
            // Main image slides
            let imageSlides = '';
            if (images.length > 0) {
                images.forEach((image, index) => {
                    const imgUrl = baseUrl + image;
                    imageSlides += `
                                <div class="swiper-slide">
                                    <div class="dz-media DZoomImage">
                                        <a class="mfp-link lg-item" href="${imgUrl}" data-src="${imgUrl}">
                                            <i class="feather icon-maximize dz-maximize top-left"></i>
                                        </a>
                                        <img src="${imgUrl}" alt="${productName}">
                                    </div>
                                </div>
                            `;
                });
            } else {
                imageSlides = `
                            <div class="swiper-slide">
                                <div class="dz-media DZoomImage">
                                    <a class="mfp-link lg-item" href="${defaultImage}" data-src="${defaultImage}">
                                        <i class="feather icon-maximize dz-maximize top-left"></i>
                                    </a>
                                    <img src="${defaultImage}" alt="${productName}">
                                </div>
                            </div>
                        `;
            }

            // Thumbnail slides
            let thumbSlides = '';
            if (images.length > 0) {
                images.forEach((image, index) => {
                    const imgUrl = baseUrl + image;
                    thumbSlides += `
                                <div class="swiper-slide">
                                    <img src="${imgUrl}" alt="${productName}" class="thumbnail-img">
                                </div>
                            `;
                });
            } else {
                thumbSlides = `
                            <div class="swiper-slide">
                                <img src="${defaultImage}" alt="${productName}" class="thumbnail-img">
                            </div>
                        `;
            }

            // Update DOM
            $('#lightgallery2').html(imageSlides);
            $('.thumb-swiper-lg .swiper-wrapper').html(thumbSlides);
        }

        // function updatePricing(sellingPrice, originalPrice, discount, savings, offerPrice) {
        //     const displayPrice = (offerPrice && offerPrice > 0) ? offerPrice : sellingPrice;
        //     const hasOffer = (offerPrice && offerPrice > 0);
            
        //     // Calculate actual savings (original price - display price)
        //     const actualSavings = originalPrice > displayPrice ? originalPrice - displayPrice : 0;
            
        //     // Use formatPrice function
        //     $('#product-price').html(formatPrice(displayPrice));
        //     $('#actual-price').html(formatPrice(originalPrice));
            
        //     const $savingsText = $('#savings-text');
        //     const $checkIcon = $('.icon-check-circle');
            
        //     if (discount > 0) {
        //         $('#discount-badge').text(`SALE ${discount}% Off`).show();
        //         $('#original-price').html(`<del>${formatPrice(originalPrice)}</del>`).show();
        //         $savingsText.text(`You save ${formatPrice(actualSavings)}`).show();
        //         $checkIcon.show(); 
        //     } else {
        //         $('#discount-badge').hide();
        //         $('#original-price').hide();
                
        //         if (hasOffer && actualSavings > 0) {
        //             $savingsText.text(`You save ${formatPrice(actualSavings)}`).show();
        //             $checkIcon.show(); 
        //         } else {
        //             $savingsText.hide(); 
        //             $checkIcon.hide();  
        //         }
        //     }
            
        //     $('#total-price').text(formatPrice(displayPrice));
        // }

        // update pricing
        function updatePricing(sellingPrice, originalPrice, discount, savings, offerPrice) {
            const displayPrice = (offerPrice && offerPrice > 0) ? offerPrice : sellingPrice;
            const hasOffer = (offerPrice && offerPrice > 0);
            
            // Calculate actual savings (original price - display price)
            const actualSavings = originalPrice > displayPrice ? originalPrice - displayPrice : 0;
            
            // Use formatPrice function
            $('#product-price').html(formatPrice(displayPrice));
            $('#actual-price').html(formatPrice(originalPrice));
            
            const $savingsText = $('#savings-text');
            const $checkIcon = $('.icon-check-circle');
            
            if (discount > 0) {
                $('#discount-badge').text(`SALE ${discount}% Off`).show();
                $('#original-price').html(`<del>${formatPrice(originalPrice)}</del>`).show();
                // $savingsText.text(`You save ${formatPrice(actualSavings)}`).show();
                $savingsText.html(`You save ${formatPrice(actualSavings).replace(/<[^>]*>/g, '')}`).show();
                $checkIcon.show(); 
            } else {
                $('#discount-badge').hide();
                $('#original-price').hide();
                
                if (hasOffer && actualSavings > 0) {
                    // $savingsText.text(`You save ${formatPrice(actualSavings)}`).show();
                    $savingsText.html(`You save ${formatPrice(actualSavings).replace(/<[^>]*>/g, '')}`).show();
                    $checkIcon.show(); 
                } else {
                    $savingsText.hide(); 
                    $checkIcon.hide();  
                }
            }
            
            // $('#total-price').text(formatPrice(displayPrice));
            $('#total-price').html(formatPrice(displayPrice));
        }


        function updateSizeOptions(sizes) {
            let sizeOptions = '';
            if (sizes.length > 0) {
                sizes.forEach((size, index) => {
                    sizeOptions += `
                        <input type="radio" class="btn-check" name="product_size" 
                            id="size-option-${index}" value="${size}" ${index === 0 ? 'checked' : ''}>
                        <label class="btn" for="size-option-${index}">${size}</label>
                    `;
                });
            } else {
                sizeOptions = '<p class="text-muted" data-i18n="no_sizes_available">No sizes available</p>';
            }
            $('#size-options').html(sizeOptions);
        }

        function updateColorOptions(colors) {
            const colorMap = {
                'RED': '#FF0000',
                'BLUE': '#0000FF',
                'GREEN': '#00FF00',
                'BLACK': '#000000',
                'WHITE': '#FFFFFF',
                'ORANGE': '#FFA500',
                'PINK': '#FFC0CB',
                'GOLD': '#FFD700',
                'SILVER': '#C0C0C0',
                'YELLOW': '#FFFF00',
                'PURPLE': '#800080',
                'GRAY': '#808080',
                'BROWN': '#A52A2A',
                'BEIGE': '#F5F5DC'
            };
        
            let colorOptions = '';
            if (colors.length > 0) {
                colors.forEach((color, index) => {
                    const colorName = color.toUpperCase();
                    const colorCode = colorMap[colorName] || '#CCCCCC';
                    
                    colorOptions += `
                        <div class="color-option">
                            <input type="radio" class="form-check-input" 
                                id="color-option-${index}" 
                                name="product_color" 
                                value="${colorName}"
                                ${index === 0 ? 'checked' : ''}>
                            <label for="color-option-${index}" 
                                style="background-color: ${colorCode}; 
                                ${colorName === 'WHITE' ? 'border: 2px solid #ddd;' : ''}">
                            </label>
                        </div>
                    `;
                });
            } else {
                colorOptions = '<p class="text-muted" data-i18n="no_colors_available">No colors available</p>';
            }
            $('#color-options').html(colorOptions);
            
            // Add click handler for visual feedback
            $('.color-option').on('click', function() {
                $('.color-option input').prop('checked', false);
                $(this).find('input').prop('checked', true);
                $('.color-option label').removeClass('active');
                $(this).find('label').addClass('active');
            });
            
            // Initialize first color as selected
            $('.color-option:first-child label').addClass('active');
        }

        function updateProductMetadata(product) {
            // SKU
            $('#product-sku').text(product.ids);
        
            // Categories
            let categoryInfo = '<li><strong data-i18n="category">Category:</strong></li>';
            if (product.category_name) {
                categoryInfo += `<li><a class="no-link" style="cursor: default;">${product.category_name}</a></li>`;
            }
            if (product.sub_category_name) {
                categoryInfo += `<li><a class="no-link" style="cursor: default;">${product.sub_category_name}</a></li>`;
            }
            $('#category-info').html(categoryInfo);
        
            // Brand
            if (product.product_brand_name) {
                $('#brand-info').html(`
                    <li><strong data-i18n="brand">Brand:</strong></li>
                    <li>${product.product_brand_name}</li>
                `);
            } else {
                $('#brand-info').remove();
            }
        
            // Warranty
            if (product.warranty_details) {
                $('#warranty-info').html(`
                    <li><strong data-i18n="warranty">Warranty:</strong></li>
                    <li>${product.warranty_details}</li>
                `);
            } else {
                $('#warranty-info').remove();
            }
        
            // Vendor
            if (product.vendor_name) {
                $('#vendor-info').html(`
                    <li><strong data-i18n="sold_by">Sold By:</strong></li>
                    <li>${product.vendor_name}</li>
                `);
            } else {
                $('#vendor-info').remove();
            }
            
            // After adding the HTML, update translations for these new elements
            updatePageTranslations();
        }

        function initializePlugins() {
            // Initialize main gallery swiper
            const mainSwiper = new Swiper('.product-gallery-swiper2', {
                slidesPerView: 1,
                spaceBetween: 10,
                navigation: {
                    nextEl: '.btn-next',
                    prevEl: '.btn-prev',
                },
            });
        
            // Initialize thumbnail swiper
            const thumbSwiper = new Swiper('.thumb-swiper-lg', {
                slidesPerView: 'auto', // Show all thumbnails or adjust based on design
                spaceBetween: 10,
                watchSlidesVisibility: true, // Highlight active thumbnail
                centerInsufficientSlides: true, // Center if fewer thumbnails
                allowTouchMove: false, // Prevent sliding of thumbnails via touch/drag
                // Disable freeMode and watchSlidesProgress to prevent auto-sliding
            });
        
            // Handle thumbnail clicks to control main swiper
            $('.thumb-swiper-lg .swiper-slide').on('click', function () {
                const index = $(this).index(); // Get the index of the clicked thumbnail
                mainSwiper.slideTo(index); // Move main swiper to corresponding slide
                // Update active thumbnail
                $('.thumb-swiper-lg .swiper-slide').removeClass('swiper-slide-thumb-active');
                $(this).addClass('swiper-slide-thumb-active');
            });
        
            // Sync active thumbnail when main swiper changes
            mainSwiper.on('slideChange', function () {
                const activeIndex = mainSwiper.activeIndex;
                $('.thumb-swiper-lg .swiper-slide').removeClass('swiper-slide-thumb-active');
                $('.thumb-swiper-lg .swiper-slide').eq(activeIndex).addClass('swiper-slide-thumb-active');
            });
        
            // Initialize related products swiper
            new Swiper('.swiper-four', {
                slidesPerView: 4,
                spaceBetween: 30,
                navigation: {
                    nextEl: '.btn-next',
                    prevEl: '.btn-prev',
                },
                breakpoints: {
                    320: {
                        slidesPerView: 1
                    },
                    575: {
                        slidesPerView: 2
                    },
                    768: {
                        slidesPerView: 3
                    },
                    1200: {
                        slidesPerView: 4
                    }
                }
            });
        
            // Initialize lightgallery if available
            if (typeof lightGallery !== 'undefined') {
                lightGallery(document.getElementById('lightgallery2'), {
                    selector: '.lg-item',
                    download: false,
                    share: false
                });
            }
        
            // Initialize quantity input
            // $('input[name="quantity"]').TouchSpin({
            //     min: 1,
            //     max: 100,
            //     step: 1,
            //     buttondown_class: 'btn btn-primary',
            //     buttonup_class: 'btn btn-primary'
            // });
        }

        function showError(message) {
            const errorHtml = `
                        <div class="alert alert-danger alert-dismissible fade show" role="alert">
                            ${message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
            $('.page-content').prepend(errorHtml);
        }
        function initializeGoldTheme() {
            // Handle color option clicks with gold theme
            $('.color-option').off('click').on('click', function() {
                $('.color-option').removeClass('active');
                $('.color-option input').prop('checked', false);
                
                $(this).addClass('active');
                $(this).find('input').prop('checked', true);
                
                // Add gold border effect
                const color = $(this).find('input').val();
                if (color && color.toUpperCase() === 'WHITE') {
                    // Special handling for white remains the same
                }
            });
            
            // Handle size option clicks with gold theme
            $('.product-size .btn').off('click').on('click', function() {
                $('.product-size .btn').removeClass('active');
                $(this).addClass('active');
                
                // Add gold glow effect
                $(this).css('box-shadow', '0 0 0 2px rgba(255, 215, 0, 0.3), 0 0 15px rgba(255, 215, 0, 0.5)');
                
                // Remove glow after animation
                setTimeout(() => {
                    if ($(this).hasClass('active')) {
                        $(this).css('box-shadow', '0 0 0 2px rgba(255, 215, 0, 0.3), 0 0 15px rgba(255, 215, 0, 0.5)');
                    }
                }, 300);
            });
            
            // Initialize first color as selected with gold theme
            setTimeout(() => {
                $('.color-option:first').addClass('active');
                $('.product-size .btn:first').addClass('active');
            }, 100);
        }
        
        // Call the function
        initializeGoldTheme();
        function renderRelatedProducts(relatedProducts) {
            const isArabic = window.currentLanguage === 'arabic';
        
            let html = '';
            
            if (relatedProducts.length === 0) {
                $('.related-products-section').hide();
                return;
            }
            
            relatedProducts.forEach(product => {
                const originalPrice = parseFloat(product.amount_mrp) || 0;
                const sellingPrice  = parseFloat(product.amount_selling) || 0;
                const offerPrice    = parseFloat(product.amount_offer) || 0;
                const discount = originalPrice > offerPrice ?
                    Math.round(((originalPrice - offerPrice) / originalPrice) * 100) : 0;
                
                const productImage = product.product_image ?
                    `https://admin.darjanafashion.com/assets/img/products/${product.product_image}` :
                    'images/shop/product/default-product.jpg';
                
                // ── Localized name for related products ─────────────────────────────
                const displayName = getLocalized(product.product_name, product.product_name_arabic);
                const truncatedName = displayName.length > 20 
                    ? displayName.substring(0, 17) + '...' 
                    : displayName;
                
                const displayPrice = (offerPrice && offerPrice > 0) ? offerPrice : sellingPrice;
                
                html += `
                    <div class="swiper-slide">
                        <div class="shop-card style-1">
                            <div class="dz-media">
                                <img src="${productImage}" alt="${displayName}">
                                <div class="shop-meta">
                                    <a href="https://darjanafashion.com/ProductDetails?id=${product.ids}" class="btn btn-secondary btn-md btn-rounded">
                                        <i class="fa-solid fa-eye d-md-none d-block"></i>
                                        <span class="d-md-block d-none">View Details</span>
                                    </a>
                                </div>
                            </div>
                            <div class="dz-content">
                                <h5 class="title" style="font-size: 0.9rem; font-weight: 400; margin-bottom: 5px;">
                                    ${truncatedName}
                                </h5>
                                <h5 class="price" style="font-size: 0.85rem; font-weight: 600; margin-bottom: 3px;">
                                    ${formatPrice(displayPrice, true, 2, 'card')}
                                </h5>
                                ${originalPrice > offerPrice ? 
                                    `<h6 class="original-price" style="font-size: 0.75rem;">
                                        <del>${formatPrice(originalPrice, true, 2, 'card')}</del>
                                    </h6>` 
                                    : ''}
                            </div>
                            ${discount > 0 ? `
                            <div class="product-tag">
                                <span class="badge" style="font-size: 0.7rem; padding: 2px 8px;">${discount}% OFF</span>
                            </div>
                            ` : ''}
                        </div>
                    </div>
                `;
            });
            
            $('.swiper-four .swiper-wrapper').html(html);
            
            // Re-init swiper (your original config)
            if (typeof Swiper !== 'undefined') {
                new Swiper('.swiper-four', {
                    slidesPerView: 4,
                    spaceBetween: 30,
                    navigation: {
                        nextEl: '.btn-next',
                        prevEl: '.btn-prev',
                    },
                    breakpoints: {
                        320: { slidesPerView: 1 },
                        575: { slidesPerView: 2 },
                        768: { slidesPerView: 3 },
                        1200: { slidesPerView: 4 }
                    }
                });
            }
        }

        function updateLengthOptions(lengths) {
            const $container = $('.length-options');
            $container.empty();
        
            if (!lengths || lengths.length === 0) {
                $container.html('<p class="text-muted">No lengths available</p>');
                return;
            }
        
            let html = '';
            lengths.forEach((length, index) => {
                const isFirst = index === 0;
                html += `
                    <input type="radio" 
                           class="btn-check" 
                           name="product_length" 
                           id="length-option-${index}" 
                           value="${length}" 
                           ${isFirst ? 'checked' : ''}>
                    <label class="btn" 
                           for="length-option-${index}">
                        ${length}
                    </label>
                `;
            });
        
            $container.html(html);
        
            // Re-apply active class to the checked one (especially after page reload / restore)
            setTimeout(() => {
                const checked = $container.find('input:checked');
                if (checked.length) {
                    checked.next('label').addClass('active');
                } else {
                    // fallback - activate first
                    $container.find('input').first().prop('checked', true)
                        .next('label').addClass('active');
                }
            }, 50);
        }


        function checkWishlistStatus(productId) {
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
                        $('.add-to-wishlist-btn').find('i').css('color', '#ff4444');
                        $('.add-to-wishlist-btn').prop('disabled', true);
                        $('.add-to-wishlist-btn').addClass('wishlist-active');
                    }
                },
                error: function(xhr, status, error) {
                    console.error('Error checking wishlist status:', error);
                }
            });
        }

        // $(document).on('click', '.add-to-cart-btn', function() {
        //     const productId = $(this).data('product-id');
        //     const quantity = $('input[name="quantity"]').val();
        //     const selectedColor = $('input[name="product_color"]:checked').val();
        //     const selectedSize = $('input[name="product_size"]:checked').val();

        //     $.ajax({
        //         url: 'controller/product_details_controller.php',
        //         type: 'POST',
        //         data: { 
        //             action: 'add_to_cart',
        //             product_id: productId,
        //             quantity: quantity,
        //             color: selectedColor,
        //             size: selectedSize
        //         },
        //         dataType: 'json',
        //         beforeSend: function() {
        //             $('#loading-area').show();
        //         },
        //         success: function(response) {
        //             $('#loading-area').hide();
        //             if (response.status === 'success') {
        //                 // Show success message
        //                 setupDropdown('dropdownContent', 'success', svgError + 'Please enter a valid Gmail address (e.g., user@gmail.com)', 'click');


        //                 // Update cart count in header
        //                 if (response.cart_count) {
        //                     $('.cart-count').text(response.cart_count);
        //                 }

        //                 // Redirect to cart page after 1 second
        //                 setTimeout(function() {
        //                     // window.location.href = 'shop-cart.html';
        //                 }, 1000);
        //             } else {
        //                 showError(response.message || 'Error adding product to cart');
        //             }
        //         },
        //         error: function(xhr, status, error) {
        //             $('#loading-area').hide();
        //             showError('Error adding to cart. Please try again later.');
        //             console.error(error);
        //         }
        //     });
        // });

        $(document).on('click', '.color-option', function() {
            $('.color-option').removeClass('active');
            
            $(this).addClass('active');
            
            $(this).find('input[type="radio"]').prop('checked', true);
        });
        
        // Initialize first color as selected by default
        $('.color-option:first').addClass('active');

        $('.add-to-cart-btn').on('click', function() {
            const $button = $(this);
            const productId = $(this).data('product-id');
            const selectedColor = $('input[name="product_color"]:checked').val();
            const selectedSize = $('input[name="product_size"]:checked').val();
            const quantity = $('#quantity-input').val();
            const customerDesc = $('#additional-requirements').val().trim() || '';
            const selectedLength = $('input[name="product_length"]:checked').val() || '';
        
            // Disable button and show loading
            $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Adding...');
        
            $.ajax({
                url: 'controller/cart_controller.php',
                type: 'POST',
                data: {
                    action: 'add_to_cart',
                    product_id: productId,
                    color: selectedColor,
                    size: selectedSize,
                    quantity: quantity,
                    customer_desc: customerDesc,
                    length: selectedLength
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'redirect') {
                        // Save the entire modal state before redirecting
                        const modalState = {
                            product_id: productId,
                            color: selectedColor,
                            size: selectedSize,
                            quantity: quantity,
                            customer_desc: customerDesc,
                            length: selectedLength,
                            return_url: window.location.href,
                            timestamp: new Date().getTime(),
                            type: 'cart'
                        };
                        
                        // Store in sessionStorage
                        sessionStorage.setItem('pendingCartState', JSON.stringify(modalState));
                        
                        // Remove any modal backdrops that might be blocking
                        $('.modal-backdrop').remove();
                        
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
                                    $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add to Cart');
                                    // Clear the saved state
                                    sessionStorage.removeItem('pendingCartState');
                                }
                            });
                        } else {
                            // Fallback to regular alert
                            alert('Please login to add items to cart');
                            window.location.href = `Login?redirect=${encodeURIComponent(window.location.href)}`;
                        }
                        
                    } else if (response.status === 'success') {
                        showNotification('Product added to cart successfully!', 'success');
                        loadHeaderCounts();
                        $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add to Cart');
                        
                        // Clear any pending cart state
                        sessionStorage.removeItem('pendingCartState');
                    } else {
                        alert('Error: ' + response.message);
                        $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add to Cart');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    alert('An error occurred while adding the product to the cart.');
                    $button.prop('disabled', false).html('<i class="fas fa-shopping-cart me-2"></i>Add to Cart');
                }
            });
        });





        $('.add-to-wishlist-btn').on('click', function() {
            const $button = $(this);
            const productId = $(this).data('product-id');
            const selectedColor = $('input[name="product_color"]:checked').val();
            const selectedSize = $('input[name="product_size"]:checked').val();
            const customerDesc = $('#additional-requirements').val().trim() || '';
            const selectedLength = $('input[name="product_length"]:checked').val() || '';
            
            // Change icon color immediately for better UX
            $button.find('i').css('color', '#ff4444');
            
            // Disable button and show loading (keep icon visible)
            $button.prop('disabled', true);
            
            $.ajax({
                url: 'controller/wishlist_controller.php',
                type: 'POST',
                data: {
                    action: 'add_to_wishlist',
                    product_id: productId,
                    color: selectedColor,
                    size: selectedSize,
                    customer_desc: customerDesc,
                    length: selectedLength
                },
                dataType: 'json',
                success: function(response) {
                    if (response.status === 'redirect') {
                        // Save the entire modal state before redirecting
                        const modalState = {
                            product_id: productId,
                            color: selectedColor,
                            size: selectedSize,
                            customer_desc: customerDesc,
                            length: selectedLength,
                            return_url: window.location.href,
                            timestamp: new Date().getTime(),
                            type: 'wishlist'
                        };
                        
                        // Store in sessionStorage
                        sessionStorage.setItem('pendingWishlistState', JSON.stringify(modalState));
                        
                        // Remove any modal backdrops
                        $('.modal-backdrop').remove();
                        
                        // Reset icon color
                        $button.find('i').css('color', '#333');
                        $button.prop('disabled', false);
                        
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
                                    // Clear the saved state
                                    sessionStorage.removeItem('pendingWishlistState');
                                }
                            });
                        } else {
                            // Fallback to regular alert
                            alert('Please login to add items to wishlist');
                            window.location.href = `Login?redirect=${encodeURIComponent(window.location.href)}`;
                        }
                        
                    } else if (response.status === 'success' || response.status === 'exists') {
                        showNotification(response.message || 'Added to wishlist successfully!', 'success');
                        // Keep icon red and button disabled
                        $button.find('i').css('color', '#ff4444');
                        $button.prop('disabled', true);
                        $button.addClass('wishlist-active');
                        $(document).trigger('wishlistUpdated');
                        loadWishlistItems();
                        
                        // Clear any pending wishlist state
                        sessionStorage.removeItem('pendingWishlistState');
                    } else {
                        showNotification(response.message, 'warning');
                        // Reset icon color on error
                        $button.find('i').css('color', '#333');
                        $button.prop('disabled', false);
                        $button.removeClass('wishlist-active');
                    }
                },
                error: function(xhr, status, error) {
                    console.error(error);
                    showNotification('An error occurred while adding to the wishlist.', 'error');
                    // Reset icon color on error
                    $button.find('i').css('color', '#333');
                    $button.prop('disabled', false);
                    $button.removeClass('wishlist-active');
                }
            });
        });

        function showSuccess(message) {
            const successHtml = `
                        <div class="alert alert-success alert-dismissible fade show" role="alert">
                            ${message}
                            <button type="button" class="btn-close" data-bs-dismiss="alert" aria-label="Close"></button>
                        </div>
                    `;
            $('.page-content').prepend(successHtml);
        }

        $(document).on('click', '.place-order-btn', function() {
            const $button = $(this);
            const quantity = $('#quantity-input').val();
            const color = $('input[name="product_color"]:checked').val() || '';
            const size = $('input[name="product_size"]:checked').val() || '';
            const length = $('input[name="product_length"]:checked').val() || '';
            // const length = $('#length-select option:selected').text() || '';
            const notes = $('#additional-requirements').val().trim() || '';
            
            // Disable button and show loading
            $button.prop('disabled', true).html('<i class="fas fa-spinner fa-spin me-2"></i>Checking...');
            
            $.ajax({
                url: 'controller/check_session.php',
                type: 'POST',
                dataType: 'json',
                success: function(response) {
                    if (response.logged_in) {
                        // User is logged in, proceed to place order
                        $.redirect('PlaceOrder', {
                            id: productId,
                            quantity: quantity,
                            color: color,
                            size: size,
                            length: length,
                            notes: notes,
                            flag: 0
                        }, 'POST');
                    } else {
                        // Save state before showing login modal
                        const modalState = {
                            product_id: productId,
                            color: color,
                            size: size,
                            quantity: quantity,
                            customer_desc: notes,
                            length: length,
                            return_url: window.location.href,
                            timestamp: new Date().getTime(),
                            type: 'placeorder',
                            action: 'place_order' // Specific action for place order
                        };
                        
                        // Store in sessionStorage
                        sessionStorage.setItem('pendingCartState', JSON.stringify(modalState));
                        
                        // Re-enable button
                        $button.prop('disabled', false).html('Place Order');
                        
                        // Show your existing login modal
                        $('#loginModal').modal('show');
                    }
                },
                error: function() {
                    showError('Error checking login status. Please try again.');
                    $button.prop('disabled', false).html('Place Order');
                }
            });
        });
        
        function checkPendingCartState() {
            const pendingState = sessionStorage.getItem('pendingCartState');
            if (pendingState) {
                const state = JSON.parse(pendingState);
                
                // Clear it immediately to prevent multiple triggers
                sessionStorage.removeItem('pendingCartState');
                
                // Only restore selections without auto-adding to cart
                restorePendingSelections(state);
            }
        }
        
        function checkPendingWishlistState() {
            const pendingState = sessionStorage.getItem('pendingWishlistState');
            if (pendingState) {
                const state = JSON.parse(pendingState);
                
                // Clear it immediately to prevent multiple triggers
                sessionStorage.removeItem('pendingWishlistState');
                
                // Only restore selections without auto-adding to wishlist
                restorePendingSelections(state);
            }
        }

        
        function restorePendingSelections(state) {
            // Pre-fill color
            if (state.color) {
                $(`input[name="product_color"][value="${state.color}"]`).prop('checked', true).trigger('change');
                $('.color-option').removeClass('active');
                $(`input[name="product_color"][value="${state.color}"]`).closest('.color-option').addClass('active');
            }
           
            // Pre-fill size
            if (state.size) {
                $(`input[name="product_size"][value="${state.size}"]`).prop('checked', true).trigger('change');
            }
           
            // Pre-fill quantity
            if (state.quantity) {
                $('#quantity-input').val(state.quantity);
            }
           
            // Pre-fill customer description / notes
            if (state.customer_desc) {
                $('#additional-requirements').val(state.customer_desc);
            }
           
            // ── Pre-fill length (now using radio buttons) ───────────────────────────────
            if (state.length) {
                // Select the correct radio button
                const $lengthInput = $(`input[name="product_length"][value="${state.length}"]`);
                
                if ($lengthInput.length) {
                    $lengthInput
                        .prop('checked', true)
                        .trigger('change');
                    
                    // Remove active from all length buttons first
                    $('.length-options .btn').removeClass('active');
                    
                    // Add active class to the corresponding label
                    $lengthInput.next('label').addClass('active');
                } else {
                    // Optional fallback: if the saved length doesn't exist anymore → select first
                    $('.length-options input').first()
                        .prop('checked', true)
                        .trigger('change');
                    $('.length-options .btn').first().addClass('active');
                }
            }
           
            // Optional: scroll to the form area so user sees restored values
            // $('form').get(0)?.scrollIntoView({ behavior: 'smooth', block: 'center' });
        
            // Show success message
            let typeText = state.type === 'wishlist' ? 'wishlist' :
                           (state.type === 'placeorder' || state.action === 'place_order') ? 'order' : 'cart';
                           
            showNotification(`Your previous ${typeText} selections have been restored! Please review and proceed.`, 'success');
        }
        
        $('#sizeChartBtn').on('click', function() {
            $('#sizeChartSidebar').addClass('open');
            $('#sizeChartOverlay').addClass('active');
            $('body').css('overflow', 'hidden');
        });
        
        $('#closeSidebar, #sizeChartOverlay').on('click', function() {
            $('#sizeChartSidebar').removeClass('open');
            $('#sizeChartOverlay').removeClass('active');
            $('body').css('overflow', '');
        });
        
        // Close sidebar with ESC key
        $(document).on('keydown', function(e) {
            if (e.key === 'Escape' && $('#sizeChartSidebar').hasClass('open')) {
                $('#closeSidebar').click();
            }
        });
        
        // Prevent clicks inside sidebar from closing it
        $('#sizeChartSidebar').on('click', function(e) {
            e.stopPropagation();
        });
        
    });
    </script>
</body>

</html>