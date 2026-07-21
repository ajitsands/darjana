<style>
    #prof_image {
        width: 100px;
        height: 80px;
        background-size: cover;
        background-position: center;
        border-radius: 50%;
        display: inline-block;
    }

    .user-thumb {
        display: flex;
        align-items: center;
        justify-content: flex-start;
        /* Align to left */
    }
</style>
<aside class="col-xl-3 pt-3">
    <div class="toggle-info">
        <h5 class="title mb-0" >Profile</h5>
        
        <!--data-i18n="account_navbar" data-i18n="account_menu"-->
        <a class="toggle-btn"  href="#accountSidebar" >User Profile</a>
    </div>
    <div class="sticky-top account-sidebar-wrapper">
        <div class="account-sidebar" id="accountSidebar">
            <div class="profile-head">
                <div class="user-thumb">
                    <div id="prof_image" style="background-image: url(images/profile3.jpg);"></div>  
                </div>
                <h5 class="title mb-0" id="prof_name"></h5>
                <span class="text text-primary" id="prof_email"></span>
            </div>
            <div class="account-nav">

                <!--<div class="nav-title bg-light" data-i18n="account_settings">ACCOUNT SETTINGS</div>-->
                <ul class="account-info-list">
                     <li><a href="Orders" data-i18n="orders">Orders</a></li>
                    <li><a href="Profile" data-i18n="profile">Profile</a></li>
                    <li><a href="Address" data-i18n="address">Address</a></li>
                    <!--<li><a href="account-review.html" data-i18n="review">Review</a></li>-->
                </ul>
            </div>
        </div>
    </div>
</aside>
<script>
    $(document).ready(function () {
        // Apply translations
        updateAccountTranslations();
        
        fetch_data();
        
        function fetch_data() {
           $.ajax({
                url: "../controller/registration_controller.php",
                type: "POST",
                dataType: 'json',
                data: {
                    action: 'get_profile'
                },
                success: function (response) {
                    console.log("Result:", response);

                    if (Array.isArray(response) && response.length > 0) {
                        const subscriberData = response[0];
                        
                        const imagePath = "../httpdocs/images/" + subscriberData.Image;
                        $('#prof_name').html(subscriberData.customer_name || getLocalized('Name', 'الاسم'));
                        $('#prof_email').html(subscriberData.email_user_name || getLocalized('Email', 'البريد الإلكتروني'));
                        $('#prof_image').css('background-image', 'url(' + imagePath + ')');
                    } else {
                        console.error("Invalid response format or empty array");
                        $('#prof_name').text(getLocalized('Name', 'الاسم'));
                        $('#prof_email').text(getLocalized('Email', 'البريد الإلكتروني'));
                    }
                },
                error: function (xhr, status, error) {
                    console.error("AJAX error:", status, error);
                    $('#prof_name').text(getLocalized('Name', 'الاسم'));
                    $('#prof_email').text(getLocalized('Email', 'البريد الإلكتروني'));
                }
            });
        }
        
        // Add event listener for language changes
        $(document).on('languageChanged', function() {
            updateAccountTranslations();
        });
    });
    
    function updateAccountTranslations() {
        const dict = translations[window.currentLanguage] || translations.english;
        
        // Update all elements with data-i18n attribute
        document.querySelectorAll('[data-i18n]').forEach(el => {
            const key = el.getAttribute('data-i18n');
            if (dict[key]) {
                if (el.tagName === 'INPUT' || el.tagName === 'TEXTAREA') {
                    el.placeholder = dict[key];
                } else {
                    el.textContent = dict[key];
                }
            }
        });
        
        // Update dynamic text if needed
        if (!$('#prof_name').html().trim()) {
            $('#prof_name').text(dict.name || 'Name');
        }
        if (!$('#prof_email').html().trim()) {
            $('#prof_email').text(dict.email || 'Email');
        }
    }
    
    // Helper function (should be in global.js)
    function getLocalized(en, ar) {
        const isArabic = window.currentLanguage === 'arabic';
        return (isArabic && ar && ar.trim() !== '') ? ar : (en || '');
    }
</script>