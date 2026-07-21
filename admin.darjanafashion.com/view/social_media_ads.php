<?php
session_start();
?>
<!doctype html>
<html lang="en"
  class="light-style layout-menu-fixed layout-compact"
  dir="ltr"
  data-theme="theme-default"
  data-assets-path="../../assets/"
  data-template="horizontal-menu-template"
  data-style="light">

<head>
    <meta charset="utf-8" />
    <meta content="company" name="SaNDsLaB">
    <meta name="viewport" content="width=device-width, initial-scale=1.0, user-scalable=no, minimum-scale=1.0, maximum-scale=1.0" />

    <title>Social Media Ads Report - Darjana Admin</title>
    <meta name="description" content="" />

    <link rel="icon" type="image/x-icon" href="../../assets/img/favicon/favicon.ico" />

    <!-- Google Fonts -->
    <link rel="preconnect" href="https://fonts.googleapis.com" />
    <link rel="preconnect" href="https://fonts.gstatic.com" crossorigin />
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700&display=swap" rel="stylesheet" />

    <!-- Custom -->
    <link rel="stylesheet" href="../../assets/sands/sands_popup.css" />

    <!-- Icons -->
    <link rel="stylesheet" href="../../assets/vendor/fonts/remixicon/remixicon.css" />
    <link rel="stylesheet" href="../../assets/vendor/fonts/flag-icons.css" />
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.css">

    <!-- Core CSS -->
    <link rel="stylesheet" href="../../assets/vendor/libs/node-waves/node-waves.css" />
    <link rel="stylesheet" href="../../assets/css/demo.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/typeahead-js/typeahead.css" />

    <!-- Plugins -->
    <link rel="stylesheet" href="../../assets/vendor/libs/select2/select2.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/bootstrap-select/bootstrap-select.css" />

    <!-- DataTables -->
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-bs5/datatables.bootstrap5.css" />
    <link rel="stylesheet" href="../../assets/vendor/libs/datatables-responsive-bs5/responsive.bootstrap5.css" />

    <!-- Charts -->
    <link rel="stylesheet" href="../../assets/vendor/libs/apex-charts/apex-charts.css" />

    <!-- Swiper -->
    <link rel="stylesheet" href="../../assets/vendor/libs/swiper/swiper.css" />

    <!-- Cropper -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/cropperjs/1.5.12/cropper.min.css" />

    <!-- Select2 CDN -->
    <link href="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/css/select2.min.css" rel="stylesheet" />

    <!-- SweetAlert -->
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/sweetalert2@11/dist/sweetalert2.min.css">

    <!-- Ladda -->
    <link rel="stylesheet" href="https://msurguy.github.io/ladda-bootstrap/dist/ladda-themeless.min.css">

    <!-- Scripts -->
    <script src="../../assets/vendor/js/helpers.js"></script>
    <script src="../../assets/vendor/js/template-customizer.js"></script>
    <script src="../../assets/js/config.js"></script>

    <!-- jQuery -->
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>

    <!-- SweetAlert (Old version support if used anywhere) -->
    <script src="https://unpkg.com/sweetalert/dist/sweetalert.min.js"></script>

    <style>
        .row {
            --bs-gutter-x: 1rem;
        }
        .container-p-y:not([class^=pt-]):not([class*=" pt-"]) {
            padding-top: .2rem !important;
        }
        @media (min-width: 992px) {
            .container, .container-fluid, .container-sm, .container-md, .container-lg, .container-xl, .container-xxl {
                padding-right: .5rem;
                padding-left: .5rem;
            }
        }
        .platform-badge {
            display: inline-block;
            padding: 4px 12px;
            border-radius: 20px;
            font-size: 12px;
            font-weight: 500;
        }
        .platform-facebook { background-color: #1877f2; color: white; }
        .platform-instagram { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); color: white; }
        .platform-youtube { background-color: #ff0000; color: white; }
        .platform-tiktok { background-color: #000000; color: white; }
        .summary-card {
            background: linear-gradient(135deg, #667eea 0%, #764ba2 100%);
            border-radius: 10px;
            padding: 20px;
            color: white;
            margin-bottom: 15px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
        }
        .summary-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .summary-card h6 {
            margin-bottom: 5px;
            font-size: 14px;
            opacity: 0.9;
        }
        .summary-card h3 {
            margin-bottom: 0;
            font-size: 28px;
            font-weight: bold;
        }
        .platform-card {
            border-radius: 10px;
            padding: 20px;
            color: white;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            text-align: center;
            height: 100%;
        }
        .platform-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 20px rgba(0,0,0,0.2);
        }
        .platform-card i {
            font-size: 48px;
            margin-bottom: 15px;
        }
        .platform-card h5 {
            margin-bottom: 10px;
            font-weight: bold;
        }
        .platform-card .click-count {
            font-size: 32px;
            font-weight: bold;
            margin-top: 10px;
        }
        .facebook-card { background: linear-gradient(135deg, #1877f2, #0c5bcd); }
        .instagram-card { background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888); }
        .youtube-card { background: linear-gradient(135deg, #ff0000, #cc0000); }
        .tiktok-card { background: linear-gradient(135deg, #000000, #161616); }
        .product-card {
            border: 1px solid #e0e0e0;
            border-radius: 8px;
            padding: 15px;
            margin-bottom: 10px;
            transition: all 0.3s;
            cursor: pointer;
            background: white;
        }
        .product-card:hover {
            box-shadow: 0 4px 12px rgba(0,0,0,0.1);
            transform: translateY(-2px);
            border-color: #696cff;
        }
        .product-rank {
            font-size: 20px;
            font-weight: bold;
            color: #696cff;
        }
        .click-count {
            font-size: 18px;
            font-weight: bold;
            color: #ff9f43;
        }
        .action-icon {
            cursor: pointer;
            font-size: 18px;
            margin-right: 10px;
            transition: 0.2s;
        }
        .action-icon:hover {
            transform: scale(1.2);
        }
        .modal-xl {
            max-width: 1200px;
        }
        .product-image {
            width: 100px;
            height: 100px;
            object-fit: cover;
            border-radius: 8px;
        }
        .platform-icon {
            width: 60px;
            height: 60px;
            border-radius: 50%;
            display: flex;
            align-items: center;
            justify-content: center;
            margin: 0 auto 15px;
        }
        .platform-icon i {
            font-size: 32px;
            margin: 0;
        }
        /* Fix for SweetAlert z-index to appear above modal */
        .swal2-container {
            z-index: 9999 !important;
        }
        /* Fix for chart container */
        #platformChart {
            width: 100% !important;
            max-height: 320px;           /* Safety limit */
        }
        
        .card-body canvas {
            margin: 0 auto;
        }
        
        .country-card {
            position: relative;
            overflow: hidden;
            border-radius: 10px;
            padding: 20px;
            cursor: pointer;
            transition: transform 0.2s, box-shadow 0.2s;
            min-height: 160px;
            background-size: cover;
            background-position: center;
        }
        
        /* Dark overlay for better text visibility */
        .country-card::before {
            content: '';
            position: absolute;
            top: 0;
            left: 0;
            right: 0;
            bottom: 0;
            background: linear-gradient(135deg, rgba(0,0,0,0.7) 0%, rgba(0,0,0,0.5) 100%);
            border-radius: 10px;
            z-index: 1;
            transition: all 0.3s ease;
        }
        
        .country-card:hover::before {
            background: linear-gradient(135deg, rgba(0,0,0,0.8) 0%, rgba(0,0,0,0.6) 100%);
        }
        
        /* Ensure all content appears above the overlay */
        .country-card > * {
            position: relative;
            z-index: 2;
        }
        
        .country-card .platform-icon i {
            font-size: 32px;
            margin-bottom: 15px;
            color: white;
            text-shadow: 2px 2px 4px rgba(0,0,0,0.5);
        }
        
        .country-card h5 {
            color: white;
            margin-bottom: 10px;
            font-weight: bold;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .country-card .click-count {
            font-size: 28px;
            font-weight: bold;
            color: #ffd966;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .country-card small {
            color: #f0f0f0;
            text-shadow: 1px 1px 2px rgba(0,0,0,0.5);
        }
        
        .country-card:hover {
            transform: translateY(-5px);
            box-shadow: 0 10px 25px rgba(0,0,0,0.3);
        }
    </style>
</head>
<body>
    <div class="layout-wrapper layout-navbar-full layout-horizontal layout-without-menu">
        <div class="layout-container">
            <?php include("templates/navbar.php"); ?>
            <div class="layout-page">
                <div class="content-wrapper">
                    <?php include("templates/menu.php"); ?>
                    <div class="container-fluid flex-grow-1 container-p-y">
                        <?php include("pages/social_media_ads_body.php"); ?>
                    </div>
                    <?php include("templates/footer.php"); ?>
                    <div class="content-backdrop fade"></div>
                </div>
            </div>
        </div>
    </div>
    <div class="layout-overlay layout-menu-toggle"></div>
    <div class="drag-target"></div>
    <div id="dropdownContent" style="text-align:center;"></div>
    
    <script src="../../assets/vendor/libs/jquery/jquery.js"></script>
    <script src="../../assets/vendor/libs/popper/popper.js"></script>
    <script src="../../assets/vendor/js/bootstrap.js"></script>
    <script src="../../assets/vendor/libs/node-waves/node-waves.js"></script>
    <script src="../../assets/vendor/libs/perfect-scrollbar/perfect-scrollbar.js"></script>
    <script src="../../assets/vendor/libs/hammer/hammer.js"></script>
    <script src="../../assets/vendor/libs/i18n/i18n.js"></script>
    <script src="../../assets/vendor/libs/typeahead-js/typeahead.js"></script>
    <script src="../../assets/vendor/js/menu.js"></script>
    <script src="../../assets/vendor/libs/select2/select2.js"></script>
    <script src="../../assets/vendor/libs/bootstrap-select/bootstrap-select.js"></script>
    <script src="../../assets/js/main.js"></script>
    <script src="../../assets/js/forms-selects.js"></script>
    <script src="../../assets/js/forms-typeahead.js"></script>
    <!--<script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>-->
    <script src="https://cdn.datatables.net/1.11.5/js/jquery.dataTables.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/js/bootstrap.bundle.min.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/sweetalert2@11"></script>
    <script src="../../assets/vendor/libs/datatables-bs5/datatables-bootstrap5.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/chart.js"></script>
    <script src="https://cdn.jsdelivr.net/npm/select2@4.1.0-rc.0/dist/js/select2.min.js"></script>

    <script>
        let currentPlatform = '';
        let table;

        $(document).ready(function() {
            const endDate = new Date();
            const startDate = new Date();
            startDate.setDate(startDate.getDate() - 30);
            
            $('#startDate').val(startDate.toISOString().split('T')[0]);
            $('#endDate').val(endDate.toISOString().split('T')[0]);

            $('#platform_filter').select2({ placeholder: "All Platforms", allowClear: true });

            initPlatformChart();
            loadSocialMediaReport();
            loadSummaryStats();
            loadCountrySummary();

            $("#applyFilter").click(function() {
                loadSocialMediaReport();
                loadSummaryStats();
                loadCountrySummary();
            });

            $('#resetFilters').click(function() {
                const endDate = new Date();
                const startDate = new Date();
                startDate.setDate(startDate.getDate() - 30);
                $('#startDate').val(startDate.toISOString().split('T')[0]);
                $('#endDate').val(endDate.toISOString().split('T')[0]);
                $('#platform_filter').val('').trigger('change');
                $('#customSearch').val('');
                loadSocialMediaReport();
                loadSummaryStats();
                loadCountrySummary();
            });

            $('#customSearch').on('keyup', function() {
                if (table) table.search($(this).val()).draw();
            });
        });

        function loadSocialMediaReport() {
            if ($.fn.DataTable.isDataTable('#social_media_table')) {
                table.ajax.reload(null, false);
            } else {
                table = $('#social_media_table').DataTable({
                    dom: 'rtip',
                    lengthChange: false,
                    pageLength: 25,
                    ajax: {
                        url: "controller/social_media_ads/social_media_ads.php",
                        type: "POST",
                        data: function() {
                            return {
                                action: "load_social_media_data",
                                start_date: $('#startDate').val(),
                                end_date: $('#endDate').val(),
                                platform: $('#platform_filter').val()
                            };
                        },
                        dataSrc: "data"
                    },
                    columns: [
                        { data: null, render: (data, type, row, meta) => meta.row + 1 },
                        { data: "product_name" },
                        { data: "platform" },
                        { data: "country" },
                        { data: "created_at" }
                    ],
                    columnDefs: [
                        {
                            targets: 2,
                            render: function(data) {
                                let badgeClass = '';
                                let icon = '';
                                switch(data ? data.toLowerCase() : '') {
                                    case 'facebook': badgeClass = 'platform-facebook'; icon = '<i class="bi bi-facebook me-1"></i>'; break;
                                    case 'instagram': badgeClass = 'platform-instagram'; icon = '<i class="bi bi-instagram me-1"></i>'; break;
                                    case 'youtube': badgeClass = 'platform-youtube'; icon = '<i class="bi bi-youtube me-1"></i>'; break;
                                    case 'tiktok': badgeClass = 'platform-tiktok'; icon = '<i class="bi bi-tiktok me-1"></i>'; break;
                                    default: icon = '<i class="bi bi-share me-1"></i>';
                                }
                                return `<span class="platform-badge ${badgeClass}">${icon} ${data || 'N/A'}</span>`;
                            }
                        },
                        {
                            targets: 4,
                            render: function(data) { return data ? new Date(data).toLocaleString() : '-'; }
                        }
                    ],
                    order: [[4, 'desc']]
                });
            }
        }

        function loadSummaryStats() {
            $.ajax({
                url: "controller/social_media_ads/social_media_ads.php",
                type: "POST",
                data: {
                    action: "load_summary_stats",
                    start_date: $('#startDate').val(),
                    end_date: $('#endDate').val(),
                    platform: $('#platform_filter').val()
                },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status === 'success') {
                            $('#total_clicks').text(data.total_clicks || 0);
                            $('#total_products').text(data.total_products || 0);
                            $('#facebook_count').text(data.facebook_count || 0);
                            $('#instagram_count').text(data.instagram_count || 0);
                            $('#youtube_count').text(data.youtube_count || 0);
                            $('#tiktok_count').text(data.tiktok_count || 0);

                            if (window.platformChart) {
                                window.platformChart.data.datasets[0].data = [
                                    parseInt(data.facebook_count) || 0,
                                    parseInt(data.instagram_count) || 0,
                                    parseInt(data.youtube_count) || 0,
                                    parseInt(data.tiktok_count) || 0
                                ];
                                window.platformChart.update('none');
                            }
                        }
                    } catch(e) { console.error('Summary stats error:', e); }
                }
            });
        }

        function loadCountrySummary() {
            $.ajax({
                url: "controller/social_media_ads/social_media_ads.php",
                type: "POST",
                data: {
                    action: "load_country_summary",
                    start_date: $('#startDate').val(),
                    end_date: $('#endDate').val(),
                    platform: $('#platform_filter').val()
                },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status === 'success') {
                            renderCountryCards(data.countries);
                        }
                    } catch(e) {
                        console.error('Country summary error:', e);
                    }
                }
            });
        }

        function renderCountryCards(countries) {
            const container = document.getElementById('countryCardsContainer');
            if (!countries || countries.length === 0) {
                container.innerHTML = `<div class="col-12"><div class="alert alert-info text-center">No country data found in selected period.</div></div>`;
                return;
            }
        
            let html = '';
            countries.forEach(country => {
                const countryCode = getCountryCode(country.country);
                const flagUrl = `https://flagcdn.com/w320/${countryCode}.png`;
                
                html += `
                    <div class="col-md-3 mb-3">
                        <div class="country-card" 
                             style="background-image: url('${flagUrl}'); background-size: cover; background-position: center;" 
                             onclick="showCountryDetails('${country.country.replace(/'/g, "\\'")}')">
                            <div class="platform-icon text-center">
                                <i class="menu-icon tf-icons ri-global-line"></i>
                            </div>
                            <h5 class="text-center">${country.country}</h5>
                            <div class="click-count text-center">${country.total_clicks}</div>
                            <small class="text-center d-block">${country.products_count} Products</small>
                        </div>
                    </div>`;
            });
            container.innerHTML = html;
        }
        
        function getCountryCode(countryName) {
            const countryCodes = {
                'United States': 'us',
                'USA': 'us',
                'United Kingdom': 'gb',
                'UK': 'gb',
                'UAE': 'ae',
                'United Arab Emirates': 'ae',
                'Saudi Arabia': 'sa',
                'Saudi': 'sa',
                'Kuwait': 'kw',
                'Qatar': 'qa',
                'Bahrain': 'bh',
                'Oman': 'om',
                'Egypt': 'eg',
                'Jordan': 'jo',
                'Lebanon': 'lb',
                'Turkey': 'tr',
                'India': 'in',
                'Pakistan': 'pk',
                'Canada': 'ca',
                'Australia': 'au',
                'Germany': 'de',
                'France': 'fr',
                'Italy': 'it',
                'Spain': 'es',
                'Netherlands': 'nl',
                'Belgium': 'be',
                'Switzerland': 'ch',
                'Sweden': 'se',
                'Norway': 'no',
                'Denmark': 'dk',
                'Finland': 'fi',
                'Ireland': 'ie',
                'South Africa': 'za',
                'Brazil': 'br',
                'Mexico': 'mx',
                'Argentina': 'ar',
                'Chile': 'cl',
                'Colombia': 'co',
                'Peru': 'pe',
                'Venezuela': 've',
                'Malaysia': 'my',
                'Singapore': 'sg',
                'Indonesia': 'id',
                'Thailand': 'th',
                'Vietnam': 'vn',
                'Philippines': 'ph',
                'China': 'cn',
                'Japan': 'jp',
                'South Korea': 'kr',
                'Russia': 'ru',
                'Poland': 'pl',
                'Czech Republic': 'cz',
                'Hungary': 'hu',
                'Romania': 'ro',
                'Greece': 'gr',
                'Portugal': 'pt',
                'New Zealand': 'nz'
            };
            
            return countryCodes[countryName] || countryName.toLowerCase().substring(0, 2);
        }
        
        function getTextColorForFlag(countryName) {
            // Light colored flags (needs dark text)
            const lightFlagCountries = [
                'United States', 'USA', 'United Kingdom', 'UK', 'UAE', 'United Arab Emirates',
                'Saudi Arabia', 'Saudi', 'Kuwait', 'Qatar', 'Bahrain', 'Oman', 'Egypt', 'Jordan',
                'Lebanon', 'Turkey', 'India', 'Pakistan', 'Canada', 'Australia', 'Germany',
                'France', 'Italy', 'Spain', 'Netherlands', 'Belgium', 'Switzerland', 'Sweden',
                'Norway', 'Denmark', 'Finland', 'Ireland', 'South Africa', 'Brazil', 'Mexico',
                'Argentina', 'Chile', 'Colombia', 'Peru', 'Venezuela', 'Malaysia', 'Singapore',
                'Indonesia', 'Thailand', 'Vietnam', 'Philippines', 'China', 'Japan', 'South Korea',
                'Poland', 'Czech Republic', 'Hungary', 'Romania', 'Greece', 'Portugal', 'New Zealand'
            ];
            
            // Dark colored flags (needs light text)
            const darkFlagCountries = [
                'Russia', 'Germany', 'Belgium', 'France', 'Italy', 'Netherlands'
            ];
            
            if (lightFlagCountries.includes(countryName)) {
                return '#333333'; // Dark text for light backgrounds
            } else if (darkFlagCountries.includes(countryName)) {
                return '#ffffff'; // White text for dark backgrounds
            } else {
                // Default to white text with dark overlay for unknown flags
                return '#ffffff';
            }
        }
        
        function showCountryDetails(countryName) {
            $('#countryModalLabel').html(`<i class="bi bi-globe me-2"></i> ${countryName} Performance`);
            $('#countryDetailsContent').html(`
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-3">Loading country performance...</p>
                </div>
            `);
            $('#countryDetailsModal').modal('show');

            $.ajax({
                url: "controller/social_media_ads/social_media_ads.php",
                type: "POST",
                data: {
                    action: "load_country_details",
                    start_date: $('#startDate').val(),
                    end_date: $('#endDate').val(),
                    country: countryName
                },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status === 'success') {
                            displayCountryDetails(data);
                        } else {
                            $('#countryDetailsContent').html('<div class="alert alert-danger">Failed to load data</div>');
                        }
                    } catch(e) {
                        $('#countryDetailsContent').html('<div class="alert alert-danger">Error parsing response</div>');
                    }
                },
                error: function() {
                    $('#countryDetailsContent').html('<div class="alert alert-danger">Server error occurred</div>');
                }
            });
        }

        function displayCountryDetails(data) {
            const c = data.country || {};
            let platformHtml = '';

            if (parseInt(c.facebook_clicks || 0) > 0) 
                platformHtml += `<div class="col-md-3 mb-3"><div class="p-3 text-center rounded" style="background:#1877f2;color:white;"><i class="bi bi-facebook"></i><br><strong>Facebook</strong><br>${c.facebook_clicks} clicks</div></div>`;
            if (parseInt(c.instagram_clicks || 0) > 0) 
                platformHtml += `<div class="col-md-3 mb-3"><div class="p-3 text-center rounded" style="background:linear-gradient(45deg,#f09433,#dc2743);color:white;"><i class="bi bi-instagram"></i><br><strong>Instagram</strong><br>${c.instagram_clicks} clicks</div></div>`;
            if (parseInt(c.youtube_clicks || 0) > 0) 
                platformHtml += `<div class="col-md-3 mb-3"><div class="p-3 text-center rounded" style="background:#ff0000;color:white;"><i class="bi bi-youtube"></i><br><strong>YouTube</strong><br>${c.youtube_clicks} clicks</div></div>`;
            if (parseInt(c.tiktok_clicks || 0) > 0) 
                platformHtml += `<div class="col-md-3 mb-3"><div class="p-3 text-center rounded" style="background:#000;color:white;"><i class="bi bi-tiktok"></i><br><strong>TikTok</strong><br>${c.tiktok_clicks} clicks</div></div>`;

            let productsHtml = `<h6 class="mt-4 mb-3">Top Products from ${c.country || 'this country'}</h6><div class="list-group">`;
            (data.top_products || []).forEach((p, i) => {
                productsHtml += `
                    <div class="list-group-item d-flex justify-content-between align-items-center">
                        <div><span class="badge bg-secondary me-2">#${i+1}</span> ${p.product_name || 'N/A'}</div>
                        <div><strong>${p.click_count}</strong> clicks</div>
                    </div>`;
            });
            productsHtml += '</div>';

            const html = `
                <div class="row text-center mb-4">
                    <div class="col-md-4"><h6 class="text-muted">Total Clicks</h6><h3 class="text-primary">${c.total_clicks || 0}</h3></div>
                    <div class="col-md-4"><h6 class="text-muted">Products Clicked</h6><h3 class="text-primary">${c.products_count || 0}</h3></div>
                    <div class="col-md-4"><h6 class="text-muted">Platforms Used</h6><h3 class="text-primary">${(c.platforms ? c.platforms.split(',').length : 0)}</h3></div>
                </div>
                <div class="row">${platformHtml}</div>
                ${productsHtml}
            `;

            $('#countryDetailsContent').html(html);
        }

        function initPlatformChart() {
            const canvas = document.getElementById('platformChart');
            if (!canvas) return;
            canvas.style.height = '280px';

            window.platformChart = new Chart(canvas.getContext('2d'), {
                type: 'doughnut',
                data: {
                    labels: ['Facebook', 'Instagram', 'YouTube', 'TikTok'],
                    datasets: [{
                        data: [0, 0, 0, 0],
                        backgroundColor: ['#1877f2', '#e4405f', '#ff0000', '#000000'],
                        borderWidth: 3,
                        borderColor: '#ffffff'
                    }]
                },
                options: {
                    responsive: true,
                    maintainAspectRatio: false,
                    cutout: '65%',
                    plugins: {
                        legend: {
                            position: 'bottom',
                            labels: { font: { size: 13 }, padding: 18, usePointStyle: true, boxWidth: 10 }
                        },
                        tooltip: {
                            callbacks: {
                                label: function(context) {
                                    const total = context.dataset.data.reduce((a, b) => a + b, 0);
                                    const percentage = total > 0 ? ((context.raw / total) * 100).toFixed(1) : 0;
                                    return `${context.label}: ${context.raw} clicks (${percentage}%)`;
                                }
                            }
                        }
                    }
                }
            });
        }

        // Platform Products Functions
        function showPlatformProducts(platform) {
            currentPlatform = platform;
            let platformName = '', iconClass = '', bgColor = '';
            
            switch(platform) {
                case 'facebook': platformName = 'Facebook'; iconClass = 'bi bi-facebook'; bgColor = '#1877f2'; break;
                case 'instagram': platformName = 'Instagram'; iconClass = 'bi bi-instagram'; bgColor = 'linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888)'; break;
                case 'youtube': platformName = 'YouTube'; iconClass = 'bi bi-youtube'; bgColor = '#ff0000'; break;
                case 'tiktok': platformName = 'TikTok'; iconClass = 'bi bi-tiktok'; bgColor = '#000000'; break;
            }
            
            $('#platformProductsModalLabel').html(`<i class="${iconClass} me-2"></i> ${platformName} - Product Performance`);
            $('#platformProductsModal').modal('show');
            
            document.getElementById('platformProductsList').innerHTML = `
                <div class="text-center py-5">
                    <div class="spinner-border text-primary" role="status"></div>
                    <p class="mt-3">Loading products...</p>
                </div>
            `;
            
            $.ajax({
                url: "controller/social_media_ads/social_media_ads.php",
                type: "POST",
                data: {
                    action: "load_platform_products_detailed",
                    start_date: $('#startDate').val(),
                    end_date: $('#endDate').val(),
                    platform: platform
                },
                success: function(response) {
                    try {
                        const data = JSON.parse(response);
                        if (data.status === 'success') {
                            displayPlatformProductsDetailed(data.products, platform);
                        }
                    } catch(e) {
                        document.getElementById('platformProductsList').innerHTML = '<div class="text-center text-danger py-5">Error loading products.</div>';
                    }
                },
                error: function() {
                    document.getElementById('platformProductsList').innerHTML = '<div class="text-center text-danger py-5">Error loading products.</div>';
                }
            });
        }

        function displayPlatformProductsDetailed(products, platform) {
            const container = document.getElementById('platformProductsList');
            if (!products || products.length === 0) {
                container.innerHTML = `
                    <div class="text-center text-muted py-5">
                        <i class="bi bi-inbox fs-1"></i>
                        <p class="mt-3">No products found for this platform</p>
                    </div>
                `;
                return;
            }
            
            let totalClicks = 0;
            products.forEach(product => totalClicks += parseInt(product.click_count || 0));
            
            let html = `
                <div class="mb-4 p-3 bg-light rounded">
                    <div class="row text-center">
                        <div class="col-md-4"><h6 class="text-muted">Total Products</h6><h3>${products.length}</h3></div>
                        <div class="col-md-4"><h6 class="text-muted">Total Clicks</h6><h3>${totalClicks}</h3></div>
                        <div class="col-md-4"><h6 class="text-muted">Avg Clicks/Product</h6><h3>${(totalClicks / products.length).toFixed(1)}</h3></div>
                    </div>
                </div>
                <div class="list-group">
            `;
            
            products.forEach((product, index) => {
                let platformBadge = '';
                switch(platform) {
                    case 'facebook': platformBadge = '<span class="badge bg-primary">Facebook</span>'; break;
                    case 'instagram': platformBadge = '<span class="badge" style="background: linear-gradient(45deg, #f09433, #e6683c, #dc2743, #cc2366, #bc1888);">Instagram</span>'; break;
                    case 'youtube': platformBadge = '<span class="badge bg-danger">YouTube</span>'; break;
                    case 'tiktok': platformBadge = '<span class="badge bg-dark">TikTok</span>'; break;
                }
                
                html += `
                    <div class="list-group-item list-group-item-action" style="cursor: pointer;" onclick="showProductDetails(${product.product_id})">
                        <div class="d-flex w-100 justify-content-between align-items-center">
                            <div class="flex-grow-1">
                                <div class="d-flex align-items-center mb-2">
                                    <span class="badge bg-secondary rounded-pill me-2">#${index + 1}</span>
                                    ${platformBadge}
                                </div>
                                <h6 class="mb-1">${product.product_name || 'N/A'}</h6>
                                ${product.product_brand_name ? `<small class="text-muted"><i class="bi bi-building"></i> ${product.product_brand_name}</small>` : ''}
                            </div>
                            <div class="text-end">
                                <div class="click-count"><i class="bi bi-hand-index-thumb"></i> ${product.click_count} clicks</div>
                                ${product.last_click ? `<small class="text-muted">Last: ${new Date(product.last_click).toLocaleDateString()}</small>` : ''}
                            </div>
                        </div>
                    </div>
                `;
            });
            
            html += '</div>';
            container.innerHTML = html;
        }

        function showProductDetails(productId) {
            $('#platformProductsModal').modal('hide');
            
            setTimeout(() => {
                Swal.fire({ title: 'Loading...', text: 'Fetching product details', allowOutsideClick: false, didOpen: () => Swal.showLoading() });
                
                $.ajax({
                    url: "controller/social_media_ads/social_media_ads.php",
                    type: "POST",
                    data: { action: "get_product_details", product_id: productId },
                    success: function(response) {
                        Swal.close();
                        try {
                            const data = JSON.parse(response);
                            if (data.status === 'success') {
                                let platformClicksHtml = '';
                                if (data.product.platform_clicks && data.product.platform_clicks.length > 0) {
                                    platformClicksHtml = '<div class="mt-3"><strong>Platform Breakdown:</strong><div class="row mt-2">';
                                    data.product.platform_clicks.forEach(pc => {
                                        let bgColor = '';
                                        switch(pc.platform) {
                                            case 'facebook': bgColor = '#1877f2'; break;
                                            case 'instagram': bgColor = '#e4405f'; break;
                                            case 'youtube': bgColor = '#ff0000'; break;
                                            case 'tiktok': bgColor = '#000000'; break;
                                        }
                                        platformClicksHtml += `
                                            <div class="col-md-3 mb-2">
                                                <div class="p-2 text-center rounded" style="background: ${bgColor}; color: white;">
                                                    <i class="bi bi-${pc.platform}"></i> <strong>${pc.platform}</strong><br>${pc.clicks} clicks
                                                </div>
                                            </div>`;
                                    });
                                    platformClicksHtml += '</div></div>';
                                }
                                
                                let html = `
                                    <div class="row">
                                        <div class="col-md-12">
                                            <h4>${data.product.product_name || 'N/A'}</h4>
                                            <hr>
                                            <div class="row mb-3">
                                                <div class="col-md-6">
                                                    <div class="card bg-light">
                                                        <div class="card-body">
                                                            <h6>Pricing Information</h6>
                                                            <p><strong>MRP:</strong> ${data.product.amount_mrp || 'N/A'} BHD</p>
                                                            <p><strong>Selling Price:</strong> ${data.product.amount_selling || 'N/A'} BHD</p>
                                                            ${data.product.amount_offer ? `<p><strong>Offer:</strong> ${data.product.amount_offer} BHD</p>` : ''}
                                                        </div>
                                                    </div>
                                                </div>
                                                <div class="col-md-6">
                                                    <div class="card bg-light">
                                                        <div class="card-body">
                                                            <h6>Product Information</h6>
                                                            <p><strong>Category:</strong> ${data.product.category_name || 'N/A'}</p>
                                                            <p><strong>Brand:</strong> ${data.product.product_brand || 'N/A'}</p>
                                                            <p><strong>Status:</strong> <span class="badge bg-${data.product.status === 'Active' ? 'success' : 'danger'}">${data.product.status || 'N/A'}</span></p>
                                                            <p><strong>Total Clicks:</strong> <span class="badge bg-info">${data.product.total_clicks || 0}</span></p>
                                                        </div>
                                                    </div>
                                                </div>
                                            </div>
                                            ${platformClicksHtml}
                                            <div class="mt-3">
                                                <strong>Description:</strong>
                                                <p>${data.product.product_description || 'No description available'}</p>
                                            </div>
                                        </div>
                                    </div>
                                `;
                                
                                Swal.fire({
                                    title: 'Product Details',
                                    html: html,
                                    width: '800px',
                                    confirmButtonText: 'Close'
                                });
                            } else {
                                Swal.fire('Error', data.message || 'Product not found', 'error');
                            }
                        } catch(e) {
                            Swal.fire('Error', 'Failed to load product details', 'error');
                        }
                    },
                    error: function() {
                        Swal.close();
                        Swal.fire('Error', 'Failed to load product details', 'error');
                    }
                });
            }, 300);
        }

        function exportToExcel() {
            Swal.fire({
                title: 'Export Report',
                text: 'Do you want to export this report to Excel?',
                icon: 'question',
                showCancelButton: true,
                confirmButtonText: 'Yes, Export!'
            }).then((result) => {
                if (result.isConfirmed) {
                    window.location.href = "controller/social_media_ads/social_media_ads.php?action=export_excel&start_date=" +
                        $('#startDate').val() + "&end_date=" + $('#endDate').val() + "&platform=" + $('#platform_filter').val();
                }
            });
        }
    </script>
</body>
</html>