<div class="page-content bg-light pt-3">
    <div class="order-spinner-overlay" id="orderSpinner">
        <div class="order-spinner-content">
            <div class="order-spinner"></div>
            <p class="order-spinner-text">Processing Your Order</p>
            <p class="order-spinner-subtext">Please wait while we confirm your order...</p>
        </div>
    </div>
    <div class="content-inner-1" style="margin-top: 10px;">
        <div class="container">


            <div class="row shop-checkout">
                <div class="col-xl-1"></div>
                <div class="col-xl-6 pt-5">
                    <!-- <h4 class="title m-b15" style="font-size: 20px; font-weight: 600; margin-bottom: 10px;" 
                        data-i18n="Delivery">Delivery</h4> -->
                    <div id="add-address-btn-container" style="display: none; margin-bottom: 15px;">
                        <button type="button" id="add-address-btn" class="btn btn-primary" style="padding: 6px 16px; font-size: 14px;">
                            <i class="fas fa-plus-circle mr-2"></i>
                            <span data-i18n="add_address">Add Address</span>
                        </button>
                    </div>
                    <div id="new-address-form-container" style="display: none;">
                        <div class="card mb-4 border-primary new-address-form-card">
                            <div class="card-body">
                                <h5 class="card-title mb-4" data-i18n="add_new_address">Add New Address</h5>
                                <form id="new-address-form" class="row g-3">

                                    <div class="col-md-12">
                                        <label for="new-emails" class="form-label">
                                            <span data-i18n="email_address">Email Address</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="email" name="emails" id="new-emails" required class="form-control" readonly style="background-color: #f8f9fa;">
                                    </div>

                                    <div class="col-md-6">
                                        <label for="new-countrys" class="form-label">
                                            <span data-i18n="country">Country</span> <span style="color:red">*</span>
                                        </label>
                                        <select name="countrys" id="new-countrys" required class="form-select select2">
                                            <option disabled selected data-i18n="select_country">Select Country</option>
                                            <!-- <option value="Bahrain" data-i18n="bahrain">Bahrain</option>
                                            <option value="Saudi Arabia(KSA)" data-i18n="saudi_arabia">Saudi Arabia(KSA)</option>
                                            <option value="Kuwait" data-i18n="kuwait">Kuwait</option>
                                            <option value="Oman" data-i18n="oman">Oman</option>
                                            <option value="Qatar" data-i18n="qatar">Qatar</option>
                                            <option value="United Arab Emirates (UAE)" data-i18n="uae">United Arab Emirates (UAE)</option> -->
                                        </select>
                                        <div id="country-error" class="invalid-feedback" style="display: none; color: #dc3545; font-size: 12px; margin-top: 4px;">
                                            <span data-i18n="please_select_country">Please select a country</span>
                                        </div>
                                    </div>

                                    <div class="col-md-6">
                                        <label for="new-fullname" class="form-label">
                                            <span data-i18n="customer_name">Customer Name</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="text" name="fullname" id="new-fullname" required class="form-control" readonly style="background-color: #f8f9fa;">
                                    </div>

                                    <div class="col-md-12">
                                        <label for="new-permanentadd" class="form-label">
                                            <span data-i18n="address">Address</span> <span style="color:red">*</span>
                                        </label>
                                        <textarea name="permanentadd" id="new-permanentadd" required class="form-control" rows="3"></textarea>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="new-area" class="form-label" >
                                        <span data-i18n="area">Area</span> <span style="color:red">*</span></label>
                                        <input type="text" name="streets" id="new-streets" required class="form-control">
                                    </div>

                                    <!-- <div class="col-md-4">
                                        <label for="new-states" class="form-label">
                                            <span data-i18n="state">State</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="text" name="states" id="new-states" required class="form-control">
                                    </div> -->

                                    <div class="col-md-4">
                                        <label for="new-states" class="form-label">
                                            <span data-i18n="state">State</span> <span style="color:red">*</span>
                                        </label>
                                        <select name="states" id="new-states" required class="form-select select2">
                                            <option disabled selected data-i18n="select_state">Select State</option>
                                            <!-- <option value="Bahrain" data-i18n="bahrain">Bahrain</option>
                                            <option value="Saudi Arabia(KSA)" data-i18n="saudi_arabia">Saudi Arabia(KSA)</option>
                                            <option value="Kuwait" data-i18n="kuwait">Kuwait</option>
                                            <option value="Oman" data-i18n="oman">Oman</option>
                                            <option value="Qatar" data-i18n="qatar">Qatar</option>
                                            <option value="United Arab Emirates (UAE)" data-i18n="uae">United Arab Emirates (UAE)</option> -->
                                        </select>
                                        <div id="country-error" class="invalid-feedback" style="display: none; color: #dc3545; font-size: 12px; margin-top: 4px;">
                                            <span data-i18n="please_select_state">Please select a state</span>
                                        </div>
                                    </div>

                                    <div class="col-md-4">
                                        <label for="new-pocode" class="form-label">
                                            <span data-i18n="postal_code">Postal Box</span> (optional)<span style="color:red"></span>
                                        </label>
                                        <input type="text" name="pocode" id="new-pocode" class="form-control">
                                    </div>
                                    
                                    <div class="col-md-12">
                                        <label for="new-mobiles" class="form-label">
                                            <span data-i18n="mobile_number">Mobile Number</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="number" name="mobiles" id="new-mobiles" required class="form-control">
                                    </div>
                                    
                                    <!-- <div class="col-md-6">
                                        <label for="new-whatsappnos" class="form-label" data-i18n="whatsapp_number">Whatsapp Number</label>
                                        <input type="number" name="whatsappnos" id="new-whatsappnos" class="form-control">
                                    </div> -->
                                    
                                    
                                    
                                    
                                    
                                    
                                    <!-- <div class="col-md-6">
                                        <label for="new-districts" class="form-label">
                                            <span data-i18n="road_no">Road No</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="text" name="districts" id="new-districts" required class="form-control">
                                    </div>
                                    <div class="col-md-6">
                                        <label for="new-block" class="form-label">
                                            <span data-i18n="block_no">Block No</span> <span style="color:red">*</span>
                                        </label>
                                        <input type="text" name="block" id="new-block" required class="form-control">
                                    </div> -->
                                    
                                    
                                    
                                    
                                   
                                    <div class="col-12 d-flex justify-content-end mt-3">
                                       
                                        <button type="submit" class="btn btn-primary w-100">
                                            <span data-i18n="Continue">Continue</span>
                                        </button>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                    <div id="billing-address-form">
                        <form class="row">
                           <div class="col-xl-12">
                                <label for="email" class="form-label">
                                    <span data-i18n="contact">Contact</span> 
                                </label>
                                <input type="text" name="email" id="email" required class="form-control" readonly style="background-color: #f8f9fa;">
                            </div>

                           <!--   <div class="col-xl-12 pt-2">
                               <input type="checkbox" name="email_checked" id="email_checked">
                                <label for="email_checked">Email me with news and offers</label>
                            </div> -->
                

                            <!-- Country -->
                            <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="country">Country</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="country" id="country" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>
                            <!-- Customer Name -->
                            <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="customer_name">Customer name</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="fuName" id="funame" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>

                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="last_name">Last name</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="lastname" id="lastname" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->

                            <!-- Permanent Address -->
                            <div class="col-md-12">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="permanent_address">Permanent Address</span> <span style="color:red">*</span>
                                    </label>
                                    <textarea name="paddress" id="paddress"  required class="form-control" rows="2"></textarea>
                                </div>
                            </div>

                            <!-- City -->
                            <div class="col-md-4">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;"><span data-i18n="area">Area</span> <span style="color:red">*</span></label>
                                    <input name="street" id="street" required class="form-control"
                                    style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>





                            <!-- State -->
                            <div class="col-md-4">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;"><span data-i18n="state">State</span> <span style="color:red">*</span></label>
                                    <input name="state" id="state" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>
                           <!-- Postal Box -->
                            <div class="col-md-4">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="postal_code">Postal Box</span><span style="color:red"></span>
                                    </label>
                                    <input name="postcode" id="postalcode" class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>
                    
                            <!-- Mobile -->
                            <div class="col-md-12">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="mobile_number">Mobile Number</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="mobile" id="mobile" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>
                    
                            <!-- WhatsApp -->
                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;"
                                           data-i18n="whatsapp_number">Whatsapp Number</label>
                                    <input name="wmobile" id="wmobile" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div>
                     -->
                            <!-- Email -->
                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="email_address">Email address</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="email" id="email" required class="form-control" style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->
                            
                            
                    
                            <!-- Building No -->
                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="building_no">Building No</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="state" id="state" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->
                    
                            <!-- Road No -->
                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="road_no">Road No</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="district" id="district" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->
                            
                             <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;">
                                        <span data-i18n="block_no">Block No</span> <span style="color:red">*</span>
                                    </label>
                                    <input name="block" id="block" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->
                    
                            <!-- Street -->
                            <!-- <div class="col-md-6">
                                <div class="form-group m-b25" style="margin-bottom: 15px;">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;"><span data-i18n="area">Area</span> <span style="color:red">*</span></label>
                                    <input name="street" id="street" required class="form-control"
                                           style="height: 36px; padding: 6px 10px; font-size: 14px;">
                                </div>
                            </div> -->
                    
                            
                    
                            
                    
                            <!-- Buttons -->
                            <div class="col-md-12 m-b25" style="margin-bottom: 15px;">
                                <!--<button type="button" id="change-address-btn" class="btn btn-primary" style="padding: 6px 16px; font-size: 14px;">-->
                                <!--    <span data-i18n="change_address">Change Address</span>-->
                                <!--</button>-->
                                <button type="button" id="save-address-btn" class="btn btn-success" style="display:none; padding: 6px 16px; font-size: 14px;">
                                    <span data-i18n="save_address">Save Address</span>
                                </button>
                                <button type="button" id="cancel-edit-btn" class="btn btn-outline-secondary" style="display:none; padding: 6px 16px; font-size: 14px;">
                                    <span data-i18n="cancel">Cancel</span>
                                </button>
                            </div>
                    
                            <div class="col-md-12 m-b25 d-none d-lg-block" style="margin-bottom: 15px;">
                                <div class="form-group">
                                    <label class="label-title" style="font-size: 14px; margin-bottom: 4px; font-weight: 500;"
                                           data-i18n="order_notes">Order notes (optional)</label>
                                    <textarea id="comments"
                                              placeholder="Notes about your order, e.g. special notes for delivery."
                                              class="form-control"
                                              name="comment"
                                              cols="90"
                                              rows="5"
                                              style="font-size: 14px; padding: 8px 10px;"
                                              data-i18n-placeholder="notes_placeholder"></textarea>
                                </div>
                            </div>
                    
                        </form>
                    </div>

                </div>
                <div class="col-xl-4 side-bar">
                    <h4 class="title m-b15" data-i18n="your_order">Your Order</h4>
                    <div class="order-detail sticky-top">
                        <div id="cart-items-container">
                            <!-- Will be populated by JavaScript -->
                        </div>
                        <div class="form-group m-3">
                                <div class="input-group">
                                    <input type="text" class="discount" id="discount-code" data-i18n-placeholder="discount_code">
                                    <button class="btn btn-primary" type="button" id="apply-discount" data-i18n="apply">Apply</button>
                                </div>
                            </div>
                        <table>
                            <tbody>
                                <tr class="subtotal">
                                    <td data-i18n="subtotal">Subtotal</td>
                                    <td class="price" id="sub-total">BD 0.00</td>
                                </tr>
                                <!-- Tax and COD rows will be added dynamically -->
                                <tr class="total">
                                    <td data-i18n="total">Total</td>
                                    <td class="price" id="grand-total">BD 0.00</td>
                                </tr>
                            </tbody>
                        </table>
                        <div class="col-12 m-b25 d-block d-lg-none" style="margin: 20px 0 15px 0;">
                            <div class="form-group">
                                <label class="label-title" style="font-size: 15px; margin-bottom: 6px; font-weight: 600;"
                                       data-i18n="order_notes">Order notes (optional)</label>
                                <textarea id="comments_mobile"
                                          placeholder="Notes about your order, e.g. special notes for delivery."
                                          class="form-control"
                                          name="comment"
                                          rows="4"
                                          style="font-size: 14px; padding: 10px;"
                                          data-i18n-placeholder="notes_placeholder"></textarea>
                            </div>
                        </div>
                        <div class="accordion dz-accordion accordion-sm" id="accordionFaq1">
                        </div>
                        <p class="text">
                            <span data-i18n="privacy_policy_text">Your personal data will be used to process your order, support your experience throughout this website, and for other purposes described in our</span> 
                            <a href="javascript:void(0);" data-bs-toggle="modal" data-bs-target="#privacyPolicyModal" style="text-decoration: underline;" 
                               data-i18n="privacy_policy">privacy policy</a>.
                        </p>
                        <div class="form-group">
                            <div class="custom-control custom-checkbox d-flex m-b15">
                                <input type="checkbox" class="form-check-input" id="terms-checkbox">
                                <label class="form-check-label" for="terms-checkbox" data-i18n="terms_checkbox">
                                    I have read and agree to the website privacy policy
                                </label>
                            </div>
                            <!--<div class="custom-control custom-checkbox d-flex m-b15">-->
                            <!--    <input type="checkbox" class="form-check-input" id="cod-checkbox">-->
                            <!--    <label class="form-check-label" for="cod-checkbox" data-i18n="cod_checkbox">-->
                            <!--        I understand this delivery will be Cash on Delivery (COD)-->
                            <!--    </label>-->
                            <!--</div>-->
                            
                        </div>
                        <button class="btn btn-gold w-100" id="submit-order-btn" disabled>
                            <span data-i18n="confirm_order">CONFIRM ORDER</span>
                        </button>
                        
                        
                        
                         <div class="row" style="padding:20px;">
                        
                            <button type="button" class="btn btn-outline-primary me-2  w-100" id="change-address-btn">
                                <span data-i18n="Add_Another_Address">Add Another Address</span>
                            </button>
                            <!-- <button type="button" class="btn btn-outline-secondary me-2 cancel-new-addresss  w-100" style="padding-top:15px;">-->
                            <!--    <span data-i18n="cancel">Cancel</span>-->
                            <!--</button>-->
                        </div>
                    </div>
                    
                   
                </div>
                
            </div>
        </div>
    </div>
    <!-- Privacy Policy Modal -->
    <div class="modal fade" id="privacyPolicyModal" tabindex="-1" aria-labelledby="privacyPolicyModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header" style="background-color: #CC0D39; color: #fff;">
                    <h5 class="modal-title" id="privacyPolicyModalLabel" data-i18n="privacy_policy">Privacy Policy</h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="filter: invert(1);"></button>
                </div>
                <div class="modal-body">
                    <!-- Privacy policy content with data-i18n attributes -->
                    <h6 data-i18n="privacy_section_1">1. Information We Collect</h6>
                    <p data-i18n="privacy_content_1">We collect personal information such as your name, address, email address, phone number, and payment details when you place an order or register on our website.</p>
                    
                    <h6 data-i18n="privacy_section_2">2. How We Use Your Information</h6>
                    <p data-i18n="privacy_content_2">Your personal data is used to process orders, manage your account, provide customer support, and send you updates about your order or promotional offers (if you opt-in). We may also use data for analytics to enhance your shopping experience.</p>
                    
                    <h6 data-i18n="privacy_section_3">3. Sharing Your Information</h6>
                    <p data-i18n="privacy_content_3">We may share your information with trusted third parties, such as payment processors and shipping companies, to fulfill your orders. We do not sell or rent your personal information to third parties for marketing purposes.</p>
                    
                    <h6 data-i18n="privacy_section_4">4. Data Security</h6>
                    <p data-i18n="privacy_content_4">We implement industry-standard security measures to protect your data. However, no method of transmission over the internet is 100% secure, and we cannot guarantee absolute security.</p>
                    
                    <h6 data-i18n="privacy_section_5">5. Your Rights</h6>
                    <p data-i18n="privacy_content_5">You have the right to access, correct, or delete your personal information. You may also opt-out of marketing communications at any time. Contact us at support@website.com for assistance.</p>
                    
                    <h6 data-i18n="privacy_section_6">6. Cookies</h6>
                    <p data-i18n="privacy_content_6">We use cookies to enhance your browsing experience, remember your preferences, and analyze site traffic. You can manage cookie preferences through your browser settings.</p>
                    
                    <h6 data-i18n="privacy_section_7">7. Changes to This Policy</h6>
                    <p data-i18n="privacy_content_7">We may update this privacy policy from time to time. Any changes will be posted on this page, and the updated policy will take effect immediately upon posting.</p>
                </div>
                <div class="modal-footer">
                    <button type="button" class="btn btn-secondary" data-bs-dismiss="modal" data-i18n="close">Close</button>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- WhatsApp Confirmation Modal -->
<div class="modal fade" id="whatsappConfirmModal" tabindex="-1" aria-labelledby="whatsappConfirmModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content border-0 shadow-lg">
            <div class="modal-header bg-success text-white">
                <h5 class="modal-title" id="whatsappConfirmModalLabel">
                    <i class="fas fa-check-circle me-2"></i> 
                    <span data-i18n="order_success">Order Placed Successfully!</span>
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body text-center py-4">
                <div class="mb-3">
                    <i class="fas fa-shopping-bag fa-4x text-success mb-3"></i>
                </div>
                <h4 class="mb-3" data-i18n="thank_you">Thank You!</h4>
                <p class="lead mb-2" data-i18n="order_success_message">Your order has been successfully placed.</p>
                <p class="text-muted mb-4" data-i18n="whatsapp_prompt">
                    Would you like to send an instant confirmation message to seller on WhatsApp?
                </p>
                <small class="text-muted" data-i18n="whatsapp_instruction">
                    (A pre-filled message will open in WhatsApp — just tap <strong>Send</strong>)
                </small>
            </div>
            <div class="modal-footer justify-content-center border-0 pb-4">
                <button type="button" class="btn btn-outline-secondary px-4" data-bs-dismiss="modal" data-i18n="no_thanks">
                    No thanks
                </button>
                <a id="sendWhatsAppBtn" href="#" target="_blank" class="btn btn-success px-4">
                    <i class="fab fa-whatsapp me-2 fs-5"></i> 
                    <span data-i18n="send_whatsapp">Send WhatsApp Confirmation</span>
                </a>
            </div>
        </div>
    </div>
</div>