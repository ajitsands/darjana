<script>

//window.CURRENCY_SYMBOL = '<?php //echo STORE_CURRENCY_SYMBOL; ?>'; // This is the key line
window.CURRENCY_SYMBOL = '<?php echo isset($_SESSION["currency"]["country_code"]) ? $_SESSION["currency"]["country_code"] : "BH"; ?>';
window.FORMAT_PRICE = function(price, includeSymbol = true, decimals = 2) {
    if (isNaN(price) || price == null) {
        return includeSymbol ? window.CURRENCY_SYMBOL + ' 0.00' : '0.00';
    }
    let formatted = Number(price).toFixed(decimals).replace(/\B(?=(\d{3})+(?!\d))/g, ",");
    return includeSymbol ? window.CURRENCY_SYMBOL + ' ' + formatted : formatted;
};
</script>


<!-- JAVASCRIPT FILES ========================================= -->
<script src="assets/js/jquery.min.js"></script>
<!-- JQUERY MIN JS -->
<!-- jQuery (required) -->
<script src="https://code.jquery.com/jquery-3.7.1.min.js"></script>
<script src="assets/vendor/wow/wow.min.js"></script><!-- WOW JS -->
<script src="assets/vendor/bootstrap/dist/js/bootstrap.bundle.min.js"></script><!-- BOOTSTRAP MIN JS -->
<script src="assets/vendor/bootstrap-select/dist/js/bootstrap-select.min.js"></script><!-- BOOTSTRAP SELECT MIN JS -->
<script src="assets/vendor/bootstrap-touchspin/bootstrap-touchspin.js"></script><!-- BOOTSTRAP TOUCHSPIN JS -->
<script src="assets/vendor/swiper/swiper-bundle.min.js"></script><!-- SWIPER JS -->
<script src="assets/vendor/magnific-popup/magnific-popup.js"></script><!-- MAGNIFIC POPUP JS -->
<script src="assets/vendor/imagesloaded/imagesloaded.js"></script><!-- IMAGESLOADED-->
<script src="assets/vendor/masonry/masonry-4.2.2.js"></script><!-- MASONRY -->
<script src="assets/vendor/masonry/isotope.pkgd.min.js"></script><!-- ISOTOPE -->
<script src="assets/vendor/countdown/jquery.countdown.js"></script><!-- COUNTDOWN FUCTIONS  -->
<script src="assets/vendor/wnumb/wNumb.js"></script><!-- WNUMB -->
<script src="assets/vendor/nouislider/nouislider.min.js"></script><!-- NOUSLIDER MIN JS-->
<script src="assets/vendor/slick/slick.min.js"></script><!-- CAROUSEL MIN JS -->
<script src="assets/vendor/lightgallery/dist/lightgallery.min.js"></script>
<script src="assets/vendor/lightgallery/dist/plugins/thumbnail/lg-thumbnail.min.js"></script>
<script src="assets/vendor/lightgallery/dist/plugins/zoom/lg-zoom.min.js"></script>
<script src="assets/js/dz.carousel.js"></script><!-- DZ CAROUSEL JS -->
<script src="assets/js/dz.ajax.js"></script><!-- AJAX -->
<script src="assets/js/custom.js"></script><!-- CUSTOM JS -->
<script src="assets/sands/settings.js"></script>
<script src="assets/sands/sands_popup.js"></script>
<script src="assets/vendor/counter/waypoints-min.js"></script><!-- WAYPOINTS JS -->
<script src="assets/vendor/counter/counterup.min.js"></script><!-- COUNTERUP JS -->
<link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/iconly@2.0.0/css/iconly.min.css">
<!--<script src="httpdocs/user_js/user.js"></script><!-- USER JS -->
<script src="assets/js/global.js"></script>
<script src="assets/sands/cart_update.js"></script><!-- USER JS -->
<!-- DataTables JS -->
<script src="https://cdn.datatables.net/1.13.6/js/jquery.dataTables.min.js"></script>
<script src="assets/sands/redirect.js"></script>
<link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.5.0/css/all.min.css">
<!--<link rel="stylesheet" href="assets/sands/nunito_i7.3f8ba2027bc9ceb1b1764ecab15bae73f86c4632.woff2">-->
<!--<script src="assets/sands/nunito_i7.3f8ba2027bc9ceb1b1764ecab15bae73f86c4632.woff2"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_i7.82bfb5f86ec77ada3c9f660da22064c2e46e1469.woff">-->
<!--<script src="assets/sands/nunito_i7.82bfb5f86ec77ada3c9f660da22064c2e46e1469.woff"></script>-->
<!--<link rel="stylesheet" href="assets/sands/instrumentsans_n4.510f1b081e58d08c30978f465518799851ef6d8b.woff">-->
<!--<script src="assets/sands/instrumentsans_n4.510f1b081e58d08c30978f465518799851ef6d8b.woff"></script>-->
<!--<link rel="stylesheet" href="assets/sands/instrumentsans_n4.db86542ae5e1596dbdb28c279ae6c2086c4c5bfa.woff2">-->
<!--<script src="assets/sands/instrumentsans_n4.db86542ae5e1596dbdb28c279ae6c2086c4c5bfa.woff2"></script>-->
<!--<link rel="stylesheet" href="assets/sands/instrumentsans_i4.7e90d82df8dee29a99237cd19cc529d2206706a2.woff">-->
<!--<script src="assets/sands/instrumentsans_i4.7e90d82df8dee29a99237cd19cc529d2206706a2.woff"></script>-->
<!--<link rel="stylesheet" href="assets/sands/instrumentsans_i4.028d3c3cd8d085648c808ceb20cd2fd1eb3560e5.woff2">-->
<!--<script src="assets/sands/instrumentsans_i4.028d3c3cd8d085648c808ceb20cd2fd1eb3560e5.woff2"></script>-->
<!--<link href="https://fonts.googleapis.com/css2?family=Instrument+Sans:wght@400&display=swap" rel="stylesheet">-->
<!--<link rel="stylesheet" href="assets/sands/nunito_n4.fc49103dc396b42cae9460289072d384b6c6eb63.woff2">-->
<!--<script src="assets/sands/nunito_n4.fc49103dc396b42cae9460289072d384b6c6eb63.woff2"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_n4.5d26d13beeac3116db2479e64986cdeea4c8fbdd.woff">-->
<!--<script src="assets/sands/nunito_n4.5d26d13beeac3116db2479e64986cdeea4c8fbdd.woff"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_i4.fd53bf99043ab6c570187ed42d1b49192135de96.woff2">-->
<!--<script src="assets/sands/nunito_i4.fd53bf99043ab6c570187ed42d1b49192135de96.woff2"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_i4.cb3876a003a73aaae5363bb3e3e99d45ec598cc6.woff">-->
<!--<script src="assets/sands/nunito_i4.cb3876a003a73aaae5363bb3e3e99d45ec598cc6.woff"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_n7.37cf9b8cf43b3322f7e6e13ad2aad62ab5dc9109.woff2">-->
<!--<script src="assets/sands/nunito_n7.37cf9b8cf43b3322f7e6e13ad2aad62ab5dc9109.woff2"></script>-->
<!--<link rel="stylesheet" href="assets/sands/nunito_n7.45cfcfadc6630011252d54d5f5a2c7c98f60d5de.woff">-->
<!--<script src="assets/sands/nunito_n7.45cfcfadc6630011252d54d5f5a2c7c98f60d5de.woff"></script>-->
