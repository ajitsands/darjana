<section class="col-xl-9 account-wrapper">
    <div class="account-card">
        <!-- Profile Header -->
        <div class="profile-header">
            <div class="avatar-upload">
                <div class="avatar-preview" id="imagePreview" style="background-image: url(images/profile3.jpg);"></div>
                <div class="change-btn thumb-edit d-none" id="imageUploadContainer">
                    <input type='file' name="image" class="form-control d-none" id="imageUpload" accept=".png, .jpg, .jpeg">
                    <label for="imageUpload" class="btn btn-light camera-btn">
                        <i class="fas fa-camera"></i>
                    </label>
                </div>
            </div>
            <h2 class="profile-title" id="customer_name"></h2>
            <div class="profile-email" id="email_id_span"></div>
            <button id="editProfile" class="edit-profile-btn" title="Edit Profile">
                <i class="fas fa-edit" style="color:red;"></i>
            </button>
        </div>

        <!-- Display View (Default) -->
        <div id="profileDisplay" class="profile-content">
            <div class="profile-section">
                <h3 class="section-title"><i class="fas fa-user-circle"></i> <span data-i18n="personal_information">Personal Information</span></h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label" data-i18n="name">Name:</span>
                        <span class="info-value" id="display_name"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label" data-i18n="gender">Gender:</span>
                        <span class="info-value" id="display_gender"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label" data-i18n="date_of_birth">Date of Birth:</span>
                        <span class="info-value" id="display_dob"></span>
                    </div>
                </div>
            </div>

            <div class="profile-section">
                <h3 class="section-title"><i class="fas fa-address-card"></i> <span data-i18n="contact_information">Contact Information</span></h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label" data-i18n="mobile_number">Mobile No:</span>
                        <span class="info-value" id="display_phone"></span>
                    </div>
                    <!-- <div class="info-item">
                        <span class="info-label" data-i18n="whatsapp_number">Whatsapp No:</span>
                        <span class="info-value" id="display_whatsapp"></span>
                    </div> -->
                </div>
            </div>

            <div class="profile-section">
                <h3 class="section-title"><i class="fas fa-map-marker-alt"></i> <span data-i18n="address_information">Address Information</span></h3>
                <div class="info-grid">
                    <div class="info-item">
                        <span class="info-label" data-i18n="address">Address:</span>
                        <span class="info-value" id="display_address"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label" data-i18n="postal_code">Postal Code:</span>
                        <span class="info-value" id="display_postal_code"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label" data-i18n="country">Country:</span>
                        <span class="info-value" id="display_country"></span>
                    </div>
                    <div class="info-item">
                        <span class="info-label" data-i18n="state">State:</span>
                        <span class="info-value" id="display_state"></span>
                    </div>
                    <!-- <div class="info-item">
                        <span class="info-label" data-i18n="district">District:</span>
                        <span class="info-value" id="display_district"></span>
                    </div> -->
                    <div class="info-item">
                        <span class="info-label" data-i18n="area">Area:</span>
                        <span class="info-value" id="display_street"></span>
                    </div>
                </div>
            </div>
        </div>

        <!-- Edit Form -->
        <div id="profileEditForm" class="edit-form d-none">
            <form class="row">
                <input type="hidden" id="ids" name="ids">
                <input type="hidden" id="email_id" name="email_id">

                <div class="form-grid">
                    <div class="form-group">
                        <label class="form-label" data-i18n="name">Name</label>
                        <input type="text" class="form-control" name="dzName" id="name" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="gender">Gender</label>
                        <select class="form-control" id="gender" name="gender" required>
                            <option value="" data-i18n="select_gender">Select Gender</option>
                            <option value="Male" data-i18n="male">Male</option>
                            <option value="Female" data-i18n="female">Female</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="date_of_birth">Date of Birth</label>
                        <input type="date" class="form-control" id="dob" name="dzEmail">
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="mobile_number">Mobile No</label>
                        <input type="tel" class="form-control" name="dzPhone" maxlength="10" id="phone" required>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label" data-i18n="whatsapp_number">Whatsapp No</label>
                        <input type="tel" class="form-control" name="dzPhone" id="whatsapp">
                    </div> -->

                    <div class="form-group">
                        <label class="form-label" data-i18n="address">Address</label>
                        <input type="text" class="form-control" name="dzName" id="address" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="postal_code">Postal Code</label>
                        <input type="text" class="form-control" id="postal_code" name="dzEmail" required>
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="country">Country</label>
                        <select class="form-control" id="country" name="country">
                            <option value="" data-i18n="select_country">Select Country</option>
                        </select>
                    </div>

                    <div class="form-group">
                        <label class="form-label" data-i18n="state">State</label>
                        <select class="form-control" id="state" name="state">
                            <option value="" data-i18n="select_state">Select State</option>
                        </select>
                    </div>

                    <!-- <div class="form-group">
                        <label class="form-label" data-i18n="district">District</label>
                        <select class="form-control" id="div_district" name="district">
                            <option value="" data-i18n="select_district">Select District</option>
                        </select>
                    </div> -->

                    <div class="form-group">
                        <label class="form-label" data-i18n="street">Area</label>
                        <input type="text" class="form-control" id="street" name="street">
                    </div>
                </div>

                <div class="form-actions">
                    <button type="button" id="cancelEdit" class="btn btn-outline" data-i18n="cancel">Cancel</button>
                    <button type="button" id="update" class="btn btn-primary" data-i18n="update_profile">Update Profile</button>
                </div>
            </form>
        </div>
    </div>
</section>