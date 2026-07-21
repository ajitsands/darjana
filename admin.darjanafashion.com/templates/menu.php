<?php
session_start(); 
// $role = $_SESSION['user_type'];
$role ='vendor';
?>
<head>
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap-icons@1.11.3/font/bootstrap-icons.min.css">
</head>
<aside id="layout-menu" class="layout-menu-horizontal menu-horizontal menu bg-menu-theme flex-grow-0">
    <div class="container-fluid  d-flex h-100">
        <ul class="menu-inner">

            <!-- Always visible -->
            <li class="menu-item">
                <a href="Dashboard" class="menu-link">
                    <i class="menu-icon tf-icons ri-home-smile-line"></i>
                    <div data-i18n="Dashboard">Dashboard</div>
                </a>
            </li>

            <!-- Toggle Section -->
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Menu">Menu</div>
                </a>
                <ul class="menu-sub">
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="AddVendor" class="menu-link">
                            <i class="menu-icon tf-icons ri-home-office-line"></i>
                            <div data-i18n="Vendor Profile">Vendor Profile</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="AddProduct" class="menu-link">
                            <i class="menu-icon tf-icons ri-user-add-line"></i>
                            <div data-i18n="Add Products">Add Products</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    <!--<?php if ($role == 'Admin' || $role == 'vendor'): ?>-->
                    <!--<li class="menu-item">-->
                    <!--    <a href="ListProduct" class="menu-link">-->
                    <!--        <i class="menu-icon tf-icons ri-user-add-line"></i>-->
                    <!--        <div data-i18n="List Products">List Products</div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <?php endif; ?>
                    <!-- Shared menu item -->
                    <?php //if ($role == 'Admin' || $role == 'vendor'): ?>
                    <!--<li class="menu-item">-->
                    <!--    <a href="Theme" class="menu-link">-->
                    <!--        <i class="menu-icon tf-icons ri-group-line"></i>-->
                    <!--        <div data-i18n="Change Theme Color">Change Theme Color</div>-->
                    <!--    </a>-->
                    <!--</li>-->
                    <?php //endif; ?>
                    
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="UnpaidOrders" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-bag-line"></i>
                            <div data-i18n="Unpaid Orders">Unpaid Orders</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
					 <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="Orders" class="menu-link">
                            <i class="menu-icon tf-icons ri-shopping-bag-line"></i>
                            <div data-i18n="Paid Orders">Paid Orders</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="Currency" class="menu-link">
                            <i class="menu-icon tf-icons ri-currency-line"></i>
                            <div data-i18n="Currency Settings">Currency Settings</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="PaymentSettings" class="menu-link">
                            <i class="menu-icon tf-icons ri-bank-card-line"></i>
                            <div data-i18n="Payment Settings">Payment Settings</div>
                        </a>
                    </li>
                    <?php endif; ?>
                    
                    <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                    <li class="menu-item">
                        <a href="Promo" class="menu-link">
                            <i class="menu-icon tf-icons ri-coupon-3-line"></i>
                            <div data-i18n="Add Promo Code">Add Promo Code</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="TailoringUnit" class="menu-link">
                            <i class="menu-icon tf-icons ri-scissors-line"></i>
                            <div data-i18n="Add Tailoring Unit">Add Tailoring Unit</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="HomeVideo" class="menu-link">
                            <i class="menu-icon tf-icons ri-video-line"></i>
                            <div data-i18n="Add Home Video">Add Home Video</div>
                        </a>
                    </li>
                     <li class="menu-item">
                        <a href="SizeChart" class="menu-link">
                            <i class="menu-icon tf-icons ri-scales-line"></i>
                            <div data-i18n="Size Chart">Size Chart</div>
                        </a>
                    </li>
                    
                    <?php endif; ?>
                </ul>
            </li>
            
            
            <li class="menu-item">
                <a href="javascript:void(0)" class="menu-link menu-toggle">
                    <i class="menu-icon tf-icons ri-layout-2-line"></i>
                    <div data-i18n="Reports">Reports</div>
                </a>
            
                <?php if ($role == 'Admin' || $role == 'vendor'): ?>
                <ul class="menu-sub">
                    <li class="menu-item">
                        <a href="TailoringBatch" class="menu-link">
                            <i class="menu-icon tf-icons ri-t-shirt-line"></i>
                            <div data-i18n="Tailoring Batch Report">Tailoring Batch Report</div>
                        </a>
                    </li>
                    <li class="menu-item">
                        <a href="ProductwiseReport" class="menu-link">
                            <i class="menu-icon tf-icons ri-file-chart-line"></i>
                            <div data-i18n="Product Wise Report">Product Wise Report</div>
                        </a>
                    </li>
            
                    <li class="menu-item">
                        <a href="CustomerReport" class="menu-link">
                            <i class="menu-icon tf-icons ri-bar-chart-line"></i>
                            <div data-i18n="Customer Wise Report">Customer Wise Report</div>
                        </a>
                    </li>

                    <li class="menu-item">
                        <a href="AllCustomers" class="menu-link">
                            <i class="menu-icon tf-icons ri-account-circle-line"></i>
                            <div data-i18n="All Customers">All Customers</div>
                        </a>
                    </li>
                    
                    <li class="menu-item">
                        <a href="PlatformTracking" class="menu-link">
                            <i class="menu-icon tf-icons ri-radar-line"></i>
                            <div data-i18n="Platform Tracking">Platform Tracking</div>
                        </a>
                    </li>
            
                 
            
                </ul>
                <?php endif; ?>
            </li>
            
            <!--<li class="menu-item">-->
            <!--    <a href="javascript:void(0)" class="menu-link menu-toggle">-->
            <!--        <i class="menu-icon tf-icons ri-layout-2-line"></i>-->
            <!--        <div data-i18n="Home">Home Editor</div>-->
            <!--    </a>-->
            <!--    <ul class="menu-sub">-->
            <!--        <li class="menu-item">-->
            <!--            <a href="HomeOffer" class="menu-link">-->
            <!--                <i class="menu-icon tf-icons ri-home-office-line"></i>-->
            <!--                <div data-i18n="Home Offer">Home Offer</div>-->
            <!--            </a>-->
            <!--        </li>-->
            <!--    </ul>-->
            <!--</li>-->
        </ul>
    </div>
</aside>