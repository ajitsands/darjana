<?php
session_start();
?>
<!DOCTYPE html>
<html lang="en">
<head >
<?php //include("templates/head.php"); ?>
<link rel="stylesheet" type="text/css" href="assets/scss/theme.css" />
<!--<link rel="manifest" href="/manifest.json">-->
<!--<meta name="theme-color" content="#D1B000">-->

<meta charset="UTF-8">

<link rel="manifest" href="/manifest.json">
<meta name="theme-color" content="#D1B000">

<!-- iOS PWA Support -->
<meta name="apple-mobile-web-app-capable" content="yes">
<meta name="apple-mobile-web-app-status-bar-style" content="default">
<meta name="apple-mobile-web-app-title" content="Your App Name">

<link rel="apple-touch-icon" href="/images/icon-192.png">


<meta property="og:title" content="Alabayaalislmiya"><meta property="og:url" content="https://alabayaalislamiya.net/en-ar">
<meta property="og:site_name" content="Alabayaalislmiya"><meta name="twitter:card" content="summary"><meta name="twitter:title" content="Alabayaalislmiya">
  <meta name="twitter:description" content="Alabayaalislmiya"><script type="application/ld+json">
  {
    "@context": "https://schema.org",
    "@type": "BreadcrumbList",
    "itemListElement": [{
        "@type": "ListItem",
        "position": 1,
        "name": "Home",
        "item": "https://alabayaalislamiya.net"
      }]
  }
</script><script type="application/ld+json">
  [
    {
      "@context": "https://schema.org",
      "@type": "WebSite",
      "name": "Alabayaalislmiya",
      "url": "https:\/\/alabayaalislamiya.net",
      "potentialAction": {
        "@type": "SearchAction",
        "target": "https:\/\/alabayaalislamiya.net\/en-ar\/search?q={search_term_string}",
        "query-input": "required name=search_term_string"
      }
    },
    {
      "@context": "https://schema.org",
      "@type": "Organization",
      "name": "Alabayaalislmiya","sameAs": ["https:\/\/www.instagram.com\/alabaya_alislamiya\/","https:\/\/wa.me\/0096550626277"],"url": "https:\/\/alabayaalislamiya.net"
    }
  ]
  </script><style>/* Typography (heading) */
  @font-face {
  font-family: "Instrument Sans";
  font-weight: 400;
  font-style: normal;
  font-display: fallback;
  src: url("//alabayaalislamiya.net/cdn/fonts/instrument_sans/instrumentsans_n4.db86542ae5e1596dbdb28c279ae6c2086c4c5bfa.woff2") format("woff2"),
       url("//alabayaalislamiya.net/cdn/fonts/instrument_sans/instrumentsans_n4.510f1b081e58d08c30978f465518799851ef6d8b.woff") format("woff");
}

@font-face {
  font-family: "Instrument Sans";
  font-weight: 400;
  font-style: italic;
  font-display: fallback;
  src: url("//alabayaalislamiya.net/cdn/fonts/instrument_sans/instrumentsans_i4.028d3c3cd8d085648c808ceb20cd2fd1eb3560e5.woff2") format("woff2"),
       url("//alabayaalislamiya.net/cdn/fonts/instrument_sans/instrumentsans_i4.7e90d82df8dee29a99237cd19cc529d2206706a2.woff") format("woff");
}

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

:root {
    /* Container */
    --container-max-width: 100%;
    --container-xxs-max-width: 27.5rem; /* 440px */
    --container-xs-max-width: 42.5rem; /* 680px */
    --container-sm-max-width: 61.25rem; /* 980px */
    --container-md-max-width: 71.875rem; /* 1150px */
    --container-lg-max-width: 78.75rem; /* 1260px */
    --container-xl-max-width: 85rem; /* 1360px */
    --container-gutter: 1.25rem;

    --section-vertical-spacing: 2rem;
    --section-vertical-spacing-tight:2rem;

    --section-stack-gap:1.5rem;
    --section-stack-gap-tight:1.5rem;

    /* Form settings */
    --form-gap: 1.25rem; /* Gap between fieldset and submit button */
    --fieldset-gap: 1rem; /* Gap between each form input within a fieldset */
    --form-control-gap: 0.625rem; /* Gap between input and label (ignored for floating label) */
    --checkbox-control-gap: 0.75rem; /* Horizontal gap between checkbox and its associated label */
    --input-padding-block: 0.65rem; /* Vertical padding for input, textarea and native select */
    --input-padding-inline: 0.8rem; /* Horizontal padding for input, textarea and native select */
    --checkbox-size: 0.875rem; /* Size (width and height) for checkbox */

    /* Other sizes */
    --sticky-area-height: calc(var(--announcement-bar-is-sticky, 0) * var(--announcement-bar-height, 0px) + var(--header-is-sticky, 0) * var(--header-is-visible, 1) * var(--header-height, 0px));

    /* RTL support */
    --transform-logical-flip: 1;
    --transform-origin-start: left;
    --transform-origin-end: right;

    /**
     * ---------------------------------------------------------------------
     * TYPOGRAPHY
     * ---------------------------------------------------------------------
     */

    /* Font properties */
    --heading-font-family: "Instrument Sans", sans-serif;
    --heading-font-weight: 400;
    --heading-font-style: normal;
    --heading-text-transform: uppercase;
    --heading-letter-spacing: 0.18em;
    --text-font-family: Nunito, sans-serif;
    --text-font-weight: 400;
    --text-font-style: normal;
    --text-letter-spacing: 0.0em;
    --button-font: var(--text-font-style) var(--text-font-weight) var(--text-sm) / 1.65 var(--text-font-family);
    --button-text-transform: uppercase;
    --button-letter-spacing: 0.18em;

    /* Font sizes */--text-heading-size-factor: 1;
    --text-h1: max(0.6875rem, clamp(1.375rem, 1.146341463414634rem + 0.975609756097561vw, 2rem) * var(--text-heading-size-factor));
    --text-h2: max(0.6875rem, clamp(1.25rem, 1.0670731707317074rem + 0.7804878048780488vw, 1.75rem) * var(--text-heading-size-factor));
    --text-h3: max(0.6875rem, clamp(1.125rem, 1.0335365853658536rem + 0.3902439024390244vw, 1.375rem) * var(--text-heading-size-factor));
    --text-h4: max(0.6875rem, clamp(1rem, 0.9542682926829268rem + 0.1951219512195122vw, 1.125rem) * var(--text-heading-size-factor));
    --text-h5: calc(0.875rem * var(--text-heading-size-factor));
    --text-h6: calc(0.75rem * var(--text-heading-size-factor));

    --text-xs: 0.75rem;
    --text-sm: 0.8125rem;
    --text-base: 0.875rem;
    --text-lg: 1.0rem;
    --text-xl: 1.125rem;

    /* Rounded variables (used for border radius) */
    --rounded-full: 9999px;
    --button-border-radius: 0.0rem;
    --input-border-radius: 0.0rem;

    /* Box shadow */
    --shadow-sm: 0 2px 8px rgb(0 0 0 / 0.05);
    --shadow: 0 5px 15px rgb(0 0 0 / 0.05);
    --shadow-md: 0 5px 30px rgb(0 0 0 / 0.05);
    --shadow-block: px px px rgb(var(--text-primary) / 0.0);

    /**
     * ---------------------------------------------------------------------
     * OTHER
     * ---------------------------------------------------------------------
     */

    --checkmark-svg-url: url(//alabayaalislamiya.net/cdn/shop/t/17/assets/checkmark.svg?v=184380698634562560561770127488);
    --cursor-zoom-in-svg-url: url(//alabayaalislamiya.net/cdn/shop/t/17/assets/cursor-zoom-in.svg?v=112480252220988712521770127488);
  }

  [dir="rtl"]:root {
    /* RTL support */
    --transform-logical-flip: -1;
    --transform-origin-start: right;
    --transform-origin-end: left;
  }

  @media screen and (min-width: 700px) {
    :root {
      /* Typography (font size) */
      --text-xs: 0.75rem;
      --text-sm: 0.8125rem;
      --text-base: 0.875rem;
      --text-lg: 1.0rem;
      --text-xl: 1.25rem;

      /* Spacing settings */
      --container-gutter: 2rem;
    }
  }

  @media screen and (min-width: 1000px) {
    :root {
      /* Spacing settings */
      --container-gutter: 3rem;

      --section-vertical-spacing: 3rem;
      --section-vertical-spacing-tight: 3rem;

      --section-stack-gap:2.25rem;
      --section-stack-gap-tight:2.25rem;
    }
  }:root {/* Overlay used for modal */
    --page-overlay: 0 0 0 / 0.4;

    /* We use the first scheme background as default */
    --page-background: ;

    /* Product colors */
    --on-sale-text: 212 175 55;
    --on-sale-badge-background: 212 175 55;
    --on-sale-badge-text: 0 0 0 / 0.65;
    --sold-out-badge-background: 239 239 239;
    --sold-out-badge-text: 0 0 0 / 0.65;
    --custom-badge-background: 212 175 55;
    --custom-badge-text: 0 0 0 / 0.65;
    --star-color: 28 28 28;

    /* Status colors */
    --success-background: 212 227 203;
    --success-text: 48 122 7;
    --warning-background: 253 241 224;
    --warning-text: 237 138 0;
    --error-background: 243 204 204;
    --error-text: 203 43 43;
  }.color-scheme--scheme-1 {
      /* Color settings */--accent: 212 175 55;
      --text-color: 28 28 28;
      --background: 255 255 255 / 1.0;
      --background-without-opacity: 255 255 255;
      --background-gradient: ;--border-color: 221 221 221;/* Button colors */
      --button-background: 212 175 55;
      --button-text-color: 28 28 28;

      /* Circled buttons */
      --circle-button-background: 212 175 55;
      --circle-button-text-color: 28 28 28;
    }.shopify-section:has(.section-spacing.color-scheme--bg-54922f2e920ba8346f6dc0fba343d673) + .shopify-section:has(.section-spacing.color-scheme--bg-54922f2e920ba8346f6dc0fba343d673:not(.bordered-section)) .section-spacing {
      padding-block-start: 0;
    }.color-scheme--scheme-2 {
      /* Color settings */--accent: 212 175 55;
      --text-color: 28 28 28;
      --background: 255 255 255 / 1.0;
      --background-without-opacity: 255 255 255;
      --background-gradient: ;--border-color: 221 221 221;/* Button colors */
      --button-background: 212 175 55;
      --button-text-color: 28 28 28;

      /* Circled buttons */
      --circle-button-background: 212 175 55;
      --circle-button-text-color: 28 28 28;
    }.shopify-section:has(.section-spacing.color-scheme--bg-54922f2e920ba8346f6dc0fba343d673) + .shopify-section:has(.section-spacing.color-scheme--bg-54922f2e920ba8346f6dc0fba343d673:not(.bordered-section)) .section-spacing {
      padding-block-start: 0;
    }.color-scheme--scheme-3 {
      /* Color settings */--accent: 212 175 55;
      --text-color: 255 255 255;
      --background: 28 28 28 / 1.0;
      --background-without-opacity: 28 28 28;
      --background-gradient: ;--border-color: 62 62 62;/* Button colors */
      --button-background: 212 175 55;
      --button-text-color: 28 28 28;

      /* Circled buttons */
      --circle-button-background: 212 175 55;
      --circle-button-text-color: 28 28 28;
    }.shopify-section:has(.section-spacing.color-scheme--bg-c1f8cb21047e4797e94d0969dc5d1e44) + .shopify-section:has(.section-spacing.color-scheme--bg-c1f8cb21047e4797e94d0969dc5d1e44:not(.bordered-section)) .section-spacing {
      padding-block-start: 0;
    }.color-scheme--scheme-4 {
      /* Color settings */--accent: 255 255 255;
      --text-color: 255 255 255;
      --background: 0 0 0 / 0.0;
      --background-without-opacity: 0 0 0;
      --background-gradient: ;--border-color: 255 255 255;/* Button colors */
      --button-background: 255 255 255;
      --button-text-color: 28 28 28;

      /* Circled buttons */
      --circle-button-background: 255 255 255;
      --circle-button-text-color: 28 28 28;
    }.shopify-section:has(.section-spacing.color-scheme--bg-3671eee015764974ee0aef1536023e0f) + .shopify-section:has(.section-spacing.color-scheme--bg-3671eee015764974ee0aef1536023e0f:not(.bordered-section)) .section-spacing {
      padding-block-start: 0;
    }.color-scheme--dialog {
      /* Color settings */--accent: 212 175 55;
      --text-color: 28 28 28;
      --background: 255 255 255 / 1.0;
      --background-without-opacity: 255 255 255;
      --background-gradient: ;--border-color: 221 221 221;/* Button colors */
      --button-background: 212 175 55;
      --button-text-color: 28 28 28;

      /* Circled buttons */
      --circle-button-background: 212 175 55;
      --circle-button-text-color: 28 28 28;
    }
</style>
   
</head>	
<body id="bg">
	<div class="page-wraper">
		<div id="loading-area" class="preloader-wrapper-4">
			<img src="images/loading.gif" alt="">
		</div>
		
		<?php //include("templates/header.php"); ?>
		
	
	

		<div class="page-content bg-light">
		    
		    
	<!--<section id="shopify-section-template--25939948142910__featured_collections_mk764W" class="shopify-section shopify-section--featured-collections">-->
		
	<style>
    #shopify-section-template--25939948142910__featured_collections_mk764W {
      --product-list-items-per-row: 2;
      --product-list-horizontal-spacing-factor: 0.2;
      --product-list-vertical-spacing-factor: 0.2;
    }

    @media screen and (min-width: 700px) {
      #shopify-section-template--25939948142910__featured_collections_mk764W {
        --product-list-items-per-row: 2;
      }
    }
  </style>
  <!--<div class="section-spacing color-scheme color-scheme--scheme-1 color-scheme--bg-54922f2e920ba8346f6dc0fba343d673 bordered-section">-->
    <div class="container"><div class="section-stack">
        <div class="v-stack justify-self-center gap-4 text-center sm:gap-5"><span class="h2" aria-current="true">All Abaya</span><span class="h2" aria-current="false">Best seller</span></div>

</div>
    </div>
  <!--</div>-->
<!--</section>-->
		
		</div>
		
		<!-- Footer -->
		<?php include("templates/footer.php"); ?>
		<!-- Footer End -->
		
		<button class="scroltop" type="button"><i class="fas fa-arrow-up"></i></button>
		<button id="installBtn" onclick="installPWA()" style="display:none;">
          Install App
        </button>
<style>
.pwa-popup {
  display: none;
  position: fixed;
  inset: 0;
  background: rgba(0,0,0,0.6);
  z-index: 9999;
}

.pwa-content {
  background: #fff;
  max-width: 350px;
  margin: 30% auto;
  padding: 20px;
  border-radius: 12px;
  text-align: center;
}

/*    .pwa-popup {*/
/*  display: none;*/
/*  position: fixed;*/
/*  top: 0; left: 0;*/
/*  width: 100%; height: 100%;*/
/*  background: rgba(0,0,0,0.6);*/
/*  z-index: 9999;*/
/*}*/

/*.pwa-content {*/
/*  background: #fff;*/
/*  width: 90%;*/
/*  max-width: 350px;*/
/*  margin: 20% auto;*/
/*  padding: 20px;*/
/*  text-align: center;*/
/*  border-radius: 10px;*/
/*}*/

.pwa-content button {
  margin: 10px;
  padding: 10px 15px;
  border: none;
  cursor: pointer;
}

#pwaInstallBtn {
  background: #D4AF37;
  color: #000;
}

#pwaCloseBtn {
  background: #ccc;
}
.navbar-nav {
    display: flex;
    flex-wrap: nowrap;      /* ðŸ”¥ prevent wrapping */
    align-items: center;
    white-space: nowrap;
}

.navbar-nav > li {
    flex: 0 0 auto;         /* do not shrink */
}

.navbar-nav > li > a {
    padding: 10px 14px;
    display: inline-flex;
    align-items: center;
}
.header-transparent .container-fluid, .header-transparent .container-sm, .header-transparent .container-md, .header-transparent .container-lg, .header-transparent .container-xl {
    padding-left: 5px;
    padding-right: 5px;
}

.site-header .extra-nav {
   
    padding-left: 1px;
   
}
</style>
<!-- PWA Install Popup -->
<div id="pwaPopup" class="pwa-popup" style="display:none;">
  <div class="pwa-content">
    <img src="images/logo/web_logo.png" alt="logo" style="width: 180px; height: auto;">

    <h3>Install App</h3>
    <p>Add this app to your home screen for quick access.</p>

    <!-- iOS Instructions -->
    <p id="iosHint" style="display:none;">
      📲 Tap <b>Share</b> → <b>Add to Home Screen</b>
    </p>

    <!-- Android Install Button -->
    <button id="pwaInstallBtn">Add to Home Screen</button>

    <button id="pwaCloseBtn" style="font-size:9px;">Not Now</button>
  </div>
</div>



		<!-- Quick Modal Start -->
		<?php include("pages/home/home_page_modal.php"); ?>
	</div>
	<?php include("templates/scripts.php"); ?>
	

	

</body>
</html>