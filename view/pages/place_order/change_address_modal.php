<div class="modal fade" id="newAddressModal" tabindex="-1" role="dialog" aria-labelledby="changeAddressModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="newAddressModalLabel" data-i18n="edit_billing_details">Edit Billing Details</h5>
                <button type="button" class="close" data-dismiss="modal" aria-label="Close">
                    <span aria-hidden="true">&times;</span>
                </button>
            </div>
            <div class="modal-body">
                <div class="col-xl-12">
                    <h4 class="title m-b15" style="font-size: 20px; font-weight: 600; margin-bottom: 10px;" data-i18n="billing_details">Billing details</h4>
                    <form id="addressForm" class="row">
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="customer_name">Customer name</label>
                                <input name="fuName" id="modal-funame" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;" 
                                    data-i18n-placeholder="enter_customer_name" placeholder="Enter customer name">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="permanent_address">Permanent Address</label>
                                <textarea name="paddress" id="modal-paddress" required class="form-control" rows="2" style="padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_permanent_address" placeholder="Enter permanent address"></textarea>
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="street">Street</label>
                                <input name="street" id="modal-street" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_street" placeholder="Enter street">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="postal_code">Postal Code</label>
                                <input name="postcode" id="modal-postalcode" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_postal_code" placeholder="Enter postal code">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="country">Country</label>
                                <input name="country" id="modal-country" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_country" placeholder="Enter country">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="BuildingNo">Building No</label>
                                <input name="state" id="modal-state" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_state" placeholder="Enter state">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="district">Road No</label>
                                <input name="district" id="modal-district" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_district" placeholder="Enter district">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="mobile_number">Mobile Number</label>
                                <input name="mobile" id="modal-mobile" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_mobile_number" placeholder="Enter mobile number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="whatsapp_number">Whatsapp Number</label>
                                <input name="wmobile" id="modal-wmobile" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_whatsapp_number" placeholder="Enter whatsapp number">
                            </div>
                        </div>
                        <div class="col-md-6">
                            <div class="form-group m-b25" style="margin-bottom: 15px;">
                                <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;" data-i18n="email_address">Email address *</label>
                                <input name="email" id="modal-email" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;"
                                    data-i18n-placeholder="enter_email_address" placeholder="Enter email address">
                            </div>
                        </div>
                    </form>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-dismiss="modal" data-i18n="close">Close</button>
                <button type="button" id="modal-save-address-btn" class="btn btn-primary" data-i18n="save_changes">Save changes</button>
            </div>
        </div>
    </div>
</div>