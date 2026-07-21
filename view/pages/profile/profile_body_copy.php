<section class="col-xl-9 account-wrapper">

    <div class="account-card">
        <div class="profile-edit">
            <div class="avatar-upload d-flex align-items-center">
                <div class=" position-relative ">
                    <div class="avatar-preview thumb">
                        <div id="imagePreview" style="background-image: url(images/profile3.jpg);"></div>
                    </div>

                    <div class="change-btn  thumb-edit d-flex align-items-center flex-wrap">
                        <input type='file' name="image" class="form-control d-none" id="imageUpload"
                            accept=".png, .jpg, .jpeg">
                        <label for="imageUpload" class="btn btn-light ms-0"><i class="fa-solid fa-camera"></i></label>
                    </div>

                </div>
            </div>
            <div class="clearfix">
                <h2 class="title mb-0" id="customer_name"></h2><span class="text text-primary"></span>

            </div>
        </div>
        <form action="#" class="row">
            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Name</label>
                    <input name="dzName" id="name" required class="form-control">
                </div>
            </div>

            <input type="hidden" id="email_id" name="email_id">

            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Address</label>
                    <input name="dzName" id="address" required class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Mobile No</label>
                    <input type="number" name="dzPhone" maxlength="10" id="phone" required class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Whatsapp No</label>
                    <input type="number" name="dzPhone" id="whatsapp" required class="form-control">
                </div>
            </div>

            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Postal code</label>
                    <input type="number" id="postal_code" name="dzEmail" required class="form-control">
                </div>
            </div>

            <div class="col-lg-6">

                <div class="form-group m-b25">
                    <label class="label-title" for="Country">Country</label>
                    <select id="country" name="country" class=" form-control">
                    </select>
                </div>
            </div>
            <div class="col-lg-6">

                <div class="form-group m-b25">
                    <label class="label-title" for="state">State</label>
                    <select id="state" name="state" class=" form-control">
                        <option value="">Loading states...</option>
                    </select>
                </div>
            </div>

            <div class="col-lg-6">

                <div class="form-group m-b25 ">
                    <label class="label-title" for="state">District</label>
                    <select id="div_district" name="district" class=" form-control">
                        <option value="">Select district</option>
                    </select>
                </div>
            </div>


            <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">Street</label>
                    <input type="email" id="street" name="street" required class="form-control">
                </div>
            </div>
          <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title" for="gender">Gender</label>
                    <select id="gender" name="gender" class="form-control" required>
                        <option value="">Select Gender</option>
                        <option value="Male">Male</option>
                        <option value="Female">Female</option>
                    </select>
                </div>
            </div>
           <div class="col-lg-6">
                <div class="form-group m-b25">
                    <label class="label-title">DOB</label>
                    <input type="date" id="dob" name="dzEmail" required class="form-control">
                </div>
            </div>

    </div>
</form> 
    <div class="d-flex flex-wrap justify-content-between align-items-center mt-4">
    <button id="update" class="btn btn-primary mt-3 mt-sm-0" type="button">Update profile</button>
    <input type="hidden" id="ids" name="ids">
</div>
    </div>
</section>