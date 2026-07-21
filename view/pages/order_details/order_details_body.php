<section class="col-xl-9 account-wrapper" style="margin-top: 10px;">
    <div class="account-card order-details">
        <div class="order-head">
            <div class="head-thumb">
                <img src="" alt="" id="order_product_image">
            </div>
            <div class="clearfix m-l20">
                <div class="badge" id="orderstatus" data-i18n="in_progress">In Progress</div>
                <h4 class="mb-0" id="ordernumber"></h4>
            </div>
        </div>
        <div class="row mb-sm-4 mb-2">
            <div class="col-sm-6">
                <div class="shiping-tracker-detail">
                    <span data-i18n="item">Item</span>
                    <h6 class="title" id="tracker_detail_item"></h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shiping-tracker-detail">
                    <span data-i18n="courier">Courier</span>
                    <h6 class="title" id="tracker_detail_courier"></h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shiping-tracker-detail">
                    <span data-i18n="start_time">Start Time</span>
                    <h6 class="title" id="tracker_detail_start_time"></h6>
                </div>
            </div>
            <div class="col-sm-6">
                <div class="shiping-tracker-detail">
                    <span data-i18n="city">City</span>
                    <h6 class="title" id="tracker_detail_address"></h6>
                </div>
            </div>
        </div>
        <div class="content-btn m-b15">
            <!-- <a href="shop-wishlist.html" class="btn btn-secondary me-xl-3 me-2 m-b15 btnhover20" data-i18n="export_details">Export Details</a> -->
            <a href="javascript:void(0);" class="btn btn-outline-danger m-b15 btnhover20 cancel-order-btn" data-i18n="cancel_order">Cancel Order</a>
        </div>
        <div class="clearfix">
            <div class="dz-tabs style-3">
                <div class="nav nav-tabs" id="nav-tab" role="tablist">
                    <button class="nav-link active" id="nav-order-history-tab" data-bs-toggle="tab"
                        data-bs-target="#nav-order-history" role="tab" aria-controls="nav-order-history"
                        aria-selected="true" data-i18n="order_history">Order History</button>
                    <button class="nav-link" id="nav-Item-tab" data-bs-toggle="tab" data-bs-target="#nav-Item"
                        role="tab" aria-controls="nav-Item" aria-selected="false" data-i18n="item_details">Item Details</button>
                </div>
                <div class="tab-content" id="nav-tabContent">
                    <div class="tab-pane fade show active" id="nav-order-history" role="tabpanel"
                        aria-labelledby="nav-order-history-tab" tabindex="0">
                        <h5 data-i18n="order_history">Order History</h5>
                        <div class="widget-timeline style-1">
                            <ul class="timeline"></ul>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="nav-Item" role="tabpanel" aria-labelledby="nav-Item-tab"
                        tabindex="0">
                        <h5 data-i18n="item_details">Item Details</h5>
                        <div class="tracking-item">
                            <div class="tracking-product"><img src="" alt="" id="item_image"></div>
                            <div class="tracking-product-content">
                                <h6 class="title" id="item_title"></h6>
                                <small class="d-block price"><strong data-i18n="price">Price</strong> : <span id="item_price"></span></small>
                                <small class="d-block color"><strong data-i18n="color">Color</strong> : <span id="item_color"></span></small>
                                <small class="d-block size"><strong data-i18n="size">Size</strong> : <span id="item_size"></span></small>
                                <small class="d-block"><strong data-i18n="quantity">Quantity</strong> : <span class="quantity"></span></small>
                            </div>
                        </div>
                        <!-- Pricing breakdown will be dynamically added -->
                    </div>
                </div>
            </div>
        </div>
        <div class="modal fade" id="cancelOrderModal" tabindex="-1" aria-hidden="true">
            <div class="modal-dialog modal-dialog-centered">
                <div class="modal-content">
                    <div class="modal-header">
                        <h5 class="modal-title" data-i18n="cancel_order">Cancel Order</h5>
                        <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                    </div>
                    <div class="modal-body">
                        <form id="cancelOrderForm">
                            <input type="hidden" id="cancel_order_id" name="order_id" value="">
                            <div class="mb-3">
                                <label class="form-label d-block mb-2"><strong data-i18n="select_reason_cancellation">Select Reason for Cancellation</strong></label>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cancel_reason" 
                                           id="reason1" value="Changed my mind" checked>
                                    <label class="form-check-label" for="reason1" data-i18n="changed_my_mind">
                                        Changed my mind
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cancel_reason" 
                                           id="reason2" value="Found better price elsewhere">
                                    <label class="form-check-label" for="reason2" data-i18n="found_better_price">
                                        Found better price elsewhere
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cancel_reason" 
                                           id="reason3" value="Ordered wrong product">
                                    <label class="form-check-label" for="reason3" data-i18n="ordered_wrong_product">
                                        Ordered wrong product
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cancel_reason" 
                                           id="reason4" value="Shipping takes too long">
                                    <label class="form-check-label" for="reason4" data-i18n="shipping_takes_long">
                                        Shipping takes too long
                                    </label>
                                </div>
                                <div class="form-check mb-2">
                                    <input class="form-check-input" type="radio" name="cancel_reason" 
                                           id="reason5" value="Other reason">
                                    <label class="form-check-label" for="reason5" data-i18n="other_reason">
                                        Other reason
                                    </label>
                                </div>
                                <div class="mt-2" id="otherReasonContainer" style="display: none;">
                                    <textarea class="form-control" id="other_reason" 
                                              name="other_reason" rows="3" 
                                              placeholder="" data-i18n-placeholder="please_specify_reason"></textarea>
                                </div>
                            </div>
                        </form>
                    </div>
                    <div class="modal-footer">
                        <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-i18n="close">Close</button>
                        <button type="button" class="btn btn-danger" id="confirmCancelBtn" data-i18n="confirm_cancellation">Confirm Cancellation</button>
                    </div>
                </div>
            </div>
        </div>
    </div>
</section>