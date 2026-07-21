<div class="row">
    <div class="col-xl-4 col-lg-4 col-md-4 col-sm-12">
        <div class="card">
            <div class="card-header">
                <h5><strong>Customize Theme</strong></h5>
            </div>
            <div class="card-body">
                <div class="mb-1">
                    <label for="theme-color" class="form-label">Theme Color:</label>
                    <input type="color" class="form-control form-control-color" id="theme-color" value="#703838">
                </div>
                
                <div class="mb-1">
                    <label for="text-color" class="form-label">Text Color:</label>
                    <input type="color" class="form-control form-control-color" id="text-color" value="#ffffff">
                </div>
                
                <div class="mb-1">
                    <label for="button-color" class="form-label">Button Color:</label>
                    <input type="color" class="form-control form-control-color" id="button-color" value="#000000">
                </div>
                
                <div class="color-preview-container d-flex mb-1">
                    <div class="color-preview me-2" id="theme-preview"></div>
                    <div class="color-preview me-2" id="text-preview"></div>
                    <div class="color-preview" id="button-preview"></div>
                </div>
                
                <button id="save-colors" class="btn btn-primary">Save Colors</button>
            </div>
        </div>
    </div>
    
    <div class="col-xl-8 col-lg-8 col-md-8 col-sm-12">
        <div class="card">
            <!-- <div class="card-header"> -->
                <!-- <h5><strong>Theme Preview</strong></h5> -->
            <!-- </div> -->
            <div class="card-body mt-1">
                <div class="row">
                <div class="col-md-6">
                    <h6 class="text-center mb-2">Mobile Preview</h6>
                    <div class="d-flex justify-content-center">
                        <div class="mobile-device">
                            <div class="mobile-notch"></div>
                            <div class="mobile-screen">
                                <div class="mobile-status-bar">
                                    <span class="mobile-time">9:41</span>
                                    <div class="mobile-icons">
                                        <span class="mobile-icon">📶</span>
                                        <span class="mobile-icon">🔋</span>
                                    </div>
                                </div>
                                <div class="mobile-header">My Shop</div>
                                <div class="mobile-content">
                                    <div class="mobile-products">
                                        <div class="mobile-product">
                                            <div class="product-image" style="background-color: #f0f0f0;">
                                                <span>📱</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Product 1</h5>
                                                <p>$19.99</p>
                                                <button class="product-button">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="mobile-product">
                                            <div class="product-image" style="background-color: #f0f0f0;">
                                                <span>🎧</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Product 2</h5>
                                                <p>$29.99</p>
                                                <button class="product-button">Add to Cart</button>
                                            </div>
                                        </div>
                                        <div class="mobile-product">
                                            <div class="product-image" style="background-color: #f0f0f0;">
                                                <span>⌚</span>
                                            </div>
                                            <div class="product-info">
                                                <h5>Product 3</h5>
                                                <p>$39.99</p>
                                                <button class="product-button">Add to Cart</button>
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="mobile-footer">
                                    <div class="mobile-tab active">🏠</div>
                                    <div class="mobile-tab">🛒</div>
                                    <div class="mobile-tab">❤️</div>
                                    <div class="mobile-tab">👤</div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
                    <div class="col-md-6">
                        <h6 class="text-center mb-2">Desktop Preview</h6>
                        <div class="desktop-device">
                            <div class="desktop-screen">
                                <div class="desktop-navbar">
                                    <div class="desktop-nav-items">
                                        <div class="desktop-nav-item active">Home</div>
                                        <div class="desktop-nav-item">Products</div>
                                        <div class="desktop-nav-item">About</div>
                                        <div class="desktop-nav-item">Contact</div>
                                    </div>
                                    <div class="desktop-user">👤</div>
                                </div>
                                <div class="desktop-content">
                                    <div class="desktop-card">
                                        <h4>Welcome to My App</h4>
                                        <p>This is a preview of how your theme will look on desktop devices.</p>
                                        <button class="desktop-button">Explore Now</button>
                                    </div>
                                    <div class="desktop-product-grid">
                                        <div class="desktop-product">
                                            <div class="product-image">📱</div>
                                            <div class="product-title">Product 1</div>
                                        </div>
                                        <div class="desktop-product">
                                            <div class="product-image">🎧</div>
                                            <div class="product-title">Product 2</div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<style>
    .color-preview {
        width: 50px;
        height: 50px;
        border: 1px solid #ddd;
        border-radius: 4px;
    }
    
    /* Mobile Preview Styles */
    .mobile-device {
        width: 260px;
        height: 440px;
        background: #000;
        border-radius: 30px;
        padding: 10px;
        position: relative;
        box-shadow: 0 10px 25px rgba(0,0,0,0.3);
    }
    
    .mobile-notch {
        width: 150px;
        height: 25px;
        background: #000;
        position: absolute;
        top: 0;
        left: 50%;
        transform: translateX(-50%);
        border-bottom-left-radius: 15px;
        border-bottom-right-radius: 15px;
        z-index: 10;
    }
    
    .mobile-screen {
        width: 100%;
        height: 100%;
        background: #fff;
        border-radius: 20px;
        overflow: hidden;
        display: flex;
        flex-direction: column;
    }
    
    .mobile-status-bar {
        display: flex;
        justify-content: space-between;
        padding: 5px 15px;
        background-color: var(--theme-color, #703838);
        color: var(--text-color, #ffffff);
    }
    
    .mobile-header {
        height: 20px;
        background-color: var(--theme-color, #703838);
        color: var(--text-color, #ffffff);
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 15px;
        font-weight: bold;
    }
    
    .mobile-content {
        flex: 1;
        background-color: #f8f9fa;
        overflow-y: auto;
    }

    .mobile-search-input {
        width: 100%;
        padding: 8px 15px;
        border-radius: 20px;
        border: 1px solid #ddd;
    }
    
    .mobile-item-list {
        display: flex;
        flex-direction: column;
        gap: 10px;
    }
    
    .mobile-item {
        display: flex;
        align-items: center;
        padding: 10px;
        background-color: #fff;
        border-radius: 10px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }
    
    .mobile-item-icon {
        width: 30px;
        height: 30px;
        background-color: var(--button-color, #000);
        color: var(--text-color, #fff);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
        margin-right: 10px;
    }
    
    .mobile-footer {
        height: 40px;
        background-color: var(--theme-color, #703838);
        display: flex;
        justify-content: space-around;
        align-items: center;
    }
    
    .mobile-tab {
        color: var(--text-color, #ffffff);
        font-size: 20px;
        padding: 10px;
    }
    .mobile {
        width: 235px;
        height: 390px;
        border: 12px solid #333;
        border-radius: 20px;
        box-shadow: 0 5px 15px rgba(0,0,0,0.2);
        overflow: hidden;
        display: flex;
        flex-direction: column;
        background-color: var(--theme-color, #f4f4f4);
    }
    .mobile-tab.active {
        color: var(--button-color, #000);
    }

    .mobile-products {
        display: flex;
        flex-direction: column;
        gap: 15px;
        margin-top: 15px;
    }

    .mobile-product {
        display: flex;
        background: #fff;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
    }

    .product-image {
        width: 80px;
        height: 80px;
        display: flex;
        justify-content: center;
        align-items: center;
        font-size: 30px;
    }

    .product-info {
        flex: 1;
        padding: 10px;
    }

    .product-info h5 {
        margin: 0 0 5px 0;
        font-size: 16px;
    }

    .product-info p {
        margin: 0 0 8px 0;
        font-size: 14px;
        color: #333;
    }

    .product-button {
        background-color: var(--button-color, #000);
        color: var(--text-color, #fff);
        border: none;
        padding: 5px 10px;
        border-radius: 4px;
        font-size: 12px;
        cursor: pointer;
    }
    
    /* Desktop Preview Styles */
    .desktop-device {
        width: 100%;
        height: 400px;
        background: #f0f0f0;
        border-radius: 10px;
        overflow: hidden;
        box-shadow: 0 5px 15px rgba(0,0,0,0.1);
    }
    
    .desktop-screen {
        width: 100%;
        height: 100%;
        display: flex;
        flex-direction: column;
    }
    
    .desktop-navbar {
        height: 60px;
        background-color: var(--theme-color, #703838);
        color: var(--text-color, #ffffff);
        display: flex;
        justify-content: space-between;
        align-items: center;
        padding: 0 20px;
    }
    
    .desktop-logo {
        font-size: 20px;
        font-weight: bold;
    }
    
    .desktop-nav-items {
        display: flex;
        gap: 20px;
    }
    
    .desktop-nav-item {
        padding: 5px 10px;
        cursor: pointer;
    }
    
    .desktop-nav-item.active {
        border-bottom: 2px solid var(--button-color, #000);
    }
    
    .desktop-user {
        width: 30px;
        height: 30px;
        background-color: var(--button-color, #000);
        color: var(--text-color, #fff);
        border-radius: 50%;
        display: flex;
        justify-content: center;
        align-items: center;
    }
    
    .desktop-content {
        flex: 1;
        padding: 20px;
        background-color: #f8f9fa;
        overflow-y: auto;
    }
    
    .desktop-card {
        background: #fff;
        padding: 20px;
        border-radius: 8px;
        box-shadow: 0 2px 10px rgba(0,0,0,0.05);
        margin-bottom: 20px;
    }
    
    .desktop-button {
        background-color: var(--button-color, #000);
        color: var(--text-color, #fff);
        border: none;
        padding: 8px 16px;
        border-radius: 4px;
        cursor: pointer;
        margin-top: 10px;
    }
    
    .desktop-product-grid {
        display: grid;
        grid-template-columns: repeat(2, 1fr);
        gap: 15px;
    }
    
    .desktop-product {
        background: #fff;
        padding: 15px;
        border-radius: 8px;
        box-shadow: 0 2px 5px rgba(0,0,0,0.1);
        text-align: center;
    }
    
    .product-image {
        font-size: 30px;
        margin-bottom: 10px;
    }
    
    .product-title {
        font-weight: 500;
    }
</style>