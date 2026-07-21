<div class="page-content bg-light">
    <section class="content-inner shop-account">
        <div class="container">
            <div class="row mt-5">
                <div class="col-lg-8">
                    <div class="table-responsive">
                        <table class="table check-tbl">
                            <thead>
                                <tr>
                                    <th data-i18n="cart_products">Cart Products</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                            </tbody>
                        </table>
                    </div>
                    <div class="row shop-form m-t30 justify-content-end">
                        <div class="col-md-6 text-end">
                            <a href="Shop" class="btn btn-gold" data-i18n="shop_more">SHOP MORE</a>
                        </div>
                    </div>
                </div>
                <div class="col-lg-4">
                    <h4 class="title mb15" data-i18n="cart_total">Cart Total</h4>
                    <div class="cart-detail">
                        <div class="info-box m-b20">
                            <h6 class="dz-title" data-i18n="premium_quality_products">Premium Quality Products</h6>
                            <p data-i18n="premium_quality_description">Discover our carefully curated selection of high-quality products, designed to meet your needs with durability and style.</p>
                        </div>
                        <!--<div class="info-box m-b20">-->
                        <!--    <h6 class="dz-title" data-i18n="cash_on_delivery">Cash on Delivery</h6>-->
                        <!--    <p data-i18n="cod_description">Shop with confidence! Pay conveniently with Cash on Delivery, ensuring a secure and hassle-free experience.</p>-->
                        <!--</div>-->
                        <div class="info-box m-b30">
                            <h6 class="dz-title" data-i18n="satisfaction_guaranteed">Satisfaction Guaranteed</h6>
                            <p data-i18n="satisfaction_description">We stand by our products with a commitment to your satisfaction. Contact us for any assistance!</p>
                        </div>
                        <div class="save-text">
                            <i class="icon feather icon-check-circle"></i>
                        </div>
                        <table>
                            <tbody>
                                <tr class="total">
                                    <td>
                                        <h6 class="mb-0" data-i18n="total">Total</h6>
                                    </td>
                                    <td class="price"></td>
                                </tr>
                            </tbody>
                        </table>
                        <a href="shop-checkout.html" class="btn btn-gold w-100" id="cartplaceorder-btn" data-i18n="place_order">PLACE ORDER</a>
                    </div>
                </div>
            </div>
        </div>
    </section>
    
    <!-- Remove Item Confirmation Modal -->
    <div id="removeModal" class="modal" style="display:none;">
        <div class="modal-content">
            <span class="close" id="closeModal">&times;</span>
            <h2 data-i18n="remove_item">Remove Item</h2>
            <p data-i18n="remove_confirmation">Are you sure you want to remove this item from your cart?</p>
            <div class="modal-actions">
                <button id="confirmRemove" data-i18n="remove">REMOVE</button>
                <button id="cancelRemove" data-i18n="cancel">CANCEL</button>
            </div>
        </div>
    </div>
</div>