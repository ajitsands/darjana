<?php
// Assuming session_start() and other includes are already present
?>

    <!-- Existing Product Form and Table -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12 pt-4">
        <div class="card mb-12">
            <form class="card-body form-repeater" enctype="multipart/form-data" id="productForm">
                <h6>Product Details</h6>
                <div class="row g-3">
                    <input type="hidden" id="user_id" class="form-control" value="" />
                    <input type="hidden" id="vendor_id" class="form-control" value="" />
                    <input type="hidden" id="category_id" class="form-control" value="" />
                    <input type="hidden" id="sub_category_id" class="form-control" value="" />
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <select id="category_name" class="form-control form-control-sm" required>
                                    <option value="">Select Category</option>
                                    <option value="add_new_category">Add New Category</option>
                                </select>
                                <label for="category_name">Category Name<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4" style="display:none;">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <select id="sub_category_name" class="form-control form-control-sm" required>
                                    <option value="0">Select Sub Category</option>
                                    <option value="add_new_sub_category">Add New Sub Category</option>
                                </select>
                                <label for="sub_category_name">Sub Category Name<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="product_name" class="form-control form-control-sm" placeholder="Product Name" />
                                <label for="product_name">Product Name<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="product_name_arabic" class="form-control form-control-sm arabic-input" placeholder="Product Name (Arabic)" />
                                <label for="product_name_arabic">Product Name (Arabic)<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="product_brand_name" class="form-control form-control-sm" placeholder="Brand Name" />
                                <label for="product_brand_name">Brand Name</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="product_brand_name_arabic" class="form-control form-control-sm arabic-input" placeholder="Brand Name (Arabic)" />
                                <label for="product_brand_name_arabic">Brand Name (Arabic)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="number" id="amount_mrp" class="form-control form-control-sm" placeholder="MRP" />
                                <label for="amount_mrp">MRP (BHD)<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-2">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="number" id="amount_selling" class="form-control form-control-sm" placeholder="Selling Price" />
                                <label for="amount_selling">Selling Price (BHD)<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="number" id="offer_percentage" class="form-control form-control-sm" placeholder="Offer Percentage" min="0" max="100" step="0.01" />
                                <label for="offer_percentage">Offer (%)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="number" id="amount_offer" class="form-control form-control-sm" placeholder="Offer Price" />
                                <label for="amount_offer">Offer Price (BHD)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-floating form-floating-outline">
                            <input type="number" step="0.01" id="tax_percentage" class="form-control form-control-sm" placeholder="Tax %" />
                            <label for="tax_percentage">Tax (%)</label>
                        </div>
                    </div>
                    <div class="col-md-1">
                        <div class="form-floating form-floating-outline">
                            <input type="number" step="0.01" id="cod_fee" class="form-control form-control-sm" placeholder="COD Fee" readonly />
                            <label for="cod_fee">COD Fee (BHD)</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <textarea id="warranty_details" class="form-control form-control-sm" placeholder="Warranty Details"></textarea>
                                <label for="warranty_details">Warranty Details</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <textarea id="warranty_details_arabic" class="form-control form-control-sm arabic-input" placeholder="Warranty Details (Arabic)"></textarea>
                                <label for="warranty_details_arabic">Warranty Details (Arabic)</label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <textarea id="product_description" class="form-control form-control-sm" placeholder="Product Description"></textarea>
                                <label for="product_description">Product Description<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <textarea id="product_description_arabic" class="form-control form-control-sm arabic-input" placeholder="Product Description (Arabic)"></textarea>
                                <label for="product_description_arabic">Product Description (Arabic)<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <label for="product_color">Product Color  <span style="color: red;"> *</span></label>
                        <div class="input-group">
                            <input type="text" id="product_color" class="form-control form-control-sm" placeholder="Enter Product Color" />
                            <button type="button" class="btn btn-primary" id="add_new_color"><i class="bi bi-plus"></i></button>
                        </div>
                        <div id="color_fields_container"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="product_size">Product Size (XXL,XL,X,L,M,S)  </label>
                        <div class="input-group">
                            <input type="text" id="product_size" class="form-control form-control-sm" placeholder="Enter Product Size" />
                            <button type="button" class="btn btn-primary" id="add_new_size"><i class="bi bi-plus"></i></button>
                        </div>
                        <div id="size_fields_container"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="product_size">Product Length  <span style="color: red;"> *</span></label>
                        <div class="input-group">
                            <input type="text" id="product_length" class="form-control form-control-sm" placeholder="Enter Product Length" />
                            <button type="button" class="btn btn-primary" id="add_new_lentgh"><i class="bi bi-plus"></i></button>
                        </div>
                        <div id="size_fields_container"></div>
                    </div>
                    <div class="col-md-3">
                        <label for="product_images">Upload Product Images  <span style="color: red;"> *</span></label>
                        <div class="input-group">
                            <input type="file" id="product_images" class="form-control form-control-sm" accept="image/*" />
                            <button type="button" class="btn btn-primary" id="add_new_image"><i class="bi bi-plus"></i></button>
                        </div>
                        <div id="image_preview_container" class="mt-2"></div>
                        <div id="image_fields_container"></div>
                    </div>
                    
                    <div class="col-md-3">
                        <label for="product_video" >
                            <i class="fas fa-video me-2"></i>Product Video
                        </label>
                        <div class="input-group">
                            <input type="file" id="product_video" class="form-control form-control-sm" accept="video/mp4,video/mov,video/avi,video/mkv" />
                            <button type="button" class="btn btn-danger" id="clear_video_btn" style="display: none;">
                                <i class="bi bi-x-lg"></i> Clear
                            </button>
                        </div>
                        <small class="text-muted">Max size: 5.5MB | MP4, MOV, AVI, MKV only</small>
                        <div id="video_preview_container" class="mt-2" style="display: none;">
                            <video id="video_preview" controls style="width: 100%; max-height: 150px;">
                                <source src="" type="video/mp4">
                                Your browser does not support video tag.
                            </video>
                            <small id="video_filename" class="text-muted d-block mt-1"></small>
                        </div>
                    </div>
                    <div class="col-md-12 mb-3">
                        <label class="form-label">
                            <i class="fas fa-list-check me-2"></i>Product Specifications
                        </label>
                        <div id="specification_pairs_container">
                            <!-- Initial pair -->
                            <div class="row mb-2 specification-pair">
                                <div class="col-md-6">
                                    <div class="input-group">
                                        <span class="input-group-text">EN</span>
                                        <input type="text" class="form-control form-control-sm specification-en" placeholder="English Specification" />
                                    </div>
                                </div>
                                <div class="col-md-5">
                                    <div class="input-group">
                                        <span class="input-group-text">AR</span>
                                        <input type="text" class="form-control form-control-sm arabic-input specification-ar" placeholder="Arabic Specification" />
                                    </div>
                                </div>
                                <div class="col-md-1 text-end">
                                    <button type="button" class="btn btn-danger remove-spec-pair">
                                        <i class="bi bi-x-lg"></i>&nbsp; Del
                                    </button>
                                </div>
                            </div>
                        </div>
                        <button type="button" class="btn btn-primary mt-2" id="add_new_specification_pair">
                            <i class="bi bi-plus me-1"></i> Add Specification Pair
                        </button>
                    </div>
                    <div class="col-md-12" style="display:none;">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <textarea id="product_tags" class="form-control form-control-sm" placeholder="product tags"></textarea>
                                <label for="product_tags">Product Tags <span style="color: red;"> *</span> </label>
                            </div>
                        </div>
                    </div>
                </div>
                <br>
                <div id="btn_save_div">
                    <!--<button class="btn btn-primary ladda-button" type="button" style="float: right;" id="btn_save_product" data-style="expand-left">-->
                    <!--    <i class="ri-save-line me-1"></i>-->
                    <!--    <span class="align-middle">Add Product</span>-->
                    <!--</button>-->
                    
                    <button
                        type="button"
                        id="btn_save_product"
                        class="btn btn-primary ladda-button"
                        data-style="expand-left"
                        data-spinner-color="#fff"
                        style="float:right;">
                    
                        <span class="ladda-label">
                            <i class="ri-save-line me-1"></i>
                            Add Product
                        </span>
                    
                    </button>
                </div>
            </form>
        </div>
    </div>
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><b>Product Details</b></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="productTable" class="table table-bordered" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Category</th>
                                <th>Brand Name</th>
                                <th>MRP Amount</th>
                                <th>Selling Amount</th>
                                <th>Offer Amount</th>
                                <th>Warranty</th>
                                <th>Status</th>
                                <th>Status</th>
                                <th>Action</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>

<!-- New DataTable with Tabs for Collections -->
<div class="row mt-4" style="display:none;">
    <div class="col-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><b>Special Collections</b></h4>
            </div>
            <div class="card-body">
                <ul class="nav nav-tabs" id="collectionTabs" role="tablist">
                    <li class="nav-item">
                        <a class="nav-link active" id="featured-tab" data-bs-toggle="tab" href="#featured" role="tab" aria-controls="featured" aria-selected="true">Featured Products</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="summer-tab" data-bs-toggle="tab" href="#summer" role="tab" aria-controls="summer" aria-selected="false">Summer Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="winter-tab" data-bs-toggle="tab" href="#winter" role="tab" aria-controls="winter" aria-selected="false">Winter Collection</a>
                    </li>
                    <li class="nav-item">
                        <a class="nav-link" id="monsoon-tab" data-bs-toggle="tab" href="#monsoon" role="tab" aria-controls="monsoon" aria-selected="false">Monsoon Collection</a>
                    </li>
                </ul>
                <div class="tab-content" id="collectionTabContent">
                    <div class="tab-pane fade show active" id="featured" role="tabpanel" aria-labelledby="featured-tab">
                        <div class="table-responsive">
                            <table id="featuredTable" class="table table-bordered" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Brand Name</th>
                                        <th>MRP Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Offer Amount</th>
                                        <th>Warranty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="summer" role="tabpanel" aria-labelledby="summer-tab">
                        <div class="table-responsive">
                            <table id="summerTable" class="table table-bordered" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Brand Name</th>
                                        <th>MRP Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Offer Amount</th>
                                        <th>Warranty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="winter" role="tabpanel" aria-labelledby="winter-tab">
                        <div class="table-responsive">
                            <table id="winterTable" class="table table-bordered" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Brand Name</th>
                                        <th>MRP Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Offer Amount</th>
                                        <th>Warranty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                    <div class="tab-pane fade" id="monsoon" role="tabpanel" aria-labelledby="monsoon-tab">
                        <div class="table-responsive">
                            <table id="monsoonTable" class="table table-bordered" style="width:100%">
                                <thead class="text-center">
                                    <tr>
                                        <th></th>
                                        <th>Sl No</th>
                                        <th>Product Name</th>
                                        <th>Brand Name</th>
                                        <th>MRP Amount</th>
                                        <th>Selling Amount</th>
                                        <th>Offer Amount</th>
                                        <th>Warranty</th>
                                        <th>Status</th>
                                        <th>Action</th>
                                    </tr>
                                </thead>
                                <tbody></tbody>
                            </table>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Current Display Selection Section -->
<div class="row mt-4" style="display:none;">
    <div class="col-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><b>Current Display</b></h4>
            </div>
            <div class="card-body">
                <div class="row">
                    <div class="col-md-4">
                        <label for="current_display" class="form-label fw-bold">
                            <i class="fas fa-display me-2"></i>Select Collection for Main Site Display
                        </label>
                        <select id="current_display" class="form-select">
                            <option value="">None</option>
                            <option value="summer">Summer Collection</option>
                            <option value="winter">Winter Collection</option>
                            <option value="monsoon">Monsoon Collection</option>
                        </select>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<!-- Existing Modals (Edit Product, Add Category, Add Sub Category) -->
<div class="modal fade" id="editProductModal" tabindex="-1" aria-labelledby="editProductModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="editProductModalLabel">
                    <i class="fas fa-edit me-2"></i>Edit Product Details
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <form id="editProductForm" enctype="multipart/form-data">
                    <input type="hidden" id="edit_product_id" name="product_id" />
                    <div class="row">
                        <div class="col-md-6 mb-3">
                            <label for="edit_product_name" class="form-label fw-bold">
                                <i class="fas fa-tag me-2"></i>Product Name
                            </label>
                            <input type="text" class="form-control shadow-sm" id="edit_product_name" name="product_name" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_product_name_arabic" class="form-label fw-bold">
                                <i class="fas fa-tag me-2"></i>Product Name (Arabic)
                            </label>
                            <input type="text" class="form-control shadow-sm arabic-input" id="edit_product_name_arabic" name="product_name_arabic" required />
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_category_name" class="form-label fw-bold">
                                <i class="fas fa-layer-group me-2"></i>Category Name
                            </label>
                            <select id="edit_category_name" class="form-select shadow-sm" required>
                                <option value="">Select Category</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3" style="display:none;">
                            <label for="edit_sub_category_name" class="form-label fw-bold">
                                <i class="fas fa-layer-group me-2"></i>Sub Category Name
                            </label>
                            <select id="edit_sub_category_name" class="form-select shadow-sm" required>
                                <option value="">Select Sub Category</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
                            <label for="edit_product_brand_name" class="form-label fw-bold">
                                <i class="fas fa-building me-2"></i>Brand Name
                            </label>
                            <input type="text" class="form-control shadow-sm" id="edit_product_brand_name" name="product_brand_name" />
                        </div>
                    </div>
                    <div class="col-md-6 mb-3">
                        <label for="edit_product_brand_name_arabic" class="form-label fw-bold">
                            <i class="fas fa-building me-2"></i>Brand Name (Arabic)
                        </label>
                        <input type="text" class="form-control shadow-sm arabic-input" id="edit_product_brand_name_arabic" name="product_brand_name_arabic" />
                    </div>
                    <div class="row">
                        <div class="col-md-4 mb-3">
                            <label for="edit_amount_mrp" class="form-label fw-bold">
                                <i class="fas fa-money-bill-wave me-2"></i>MRP Amount
                            </label>
                            <input type="number" class="form-control shadow-sm" id="edit_amount_mrp" name="amount_mrp" required />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_amount_selling" class="form-label fw-bold">
                                <i class="fas fa-money-bill-wave me-2"></i>Selling Amount
                            </label>
                            <input type="number" class="form-control shadow-sm" id="edit_amount_selling" name="amount_selling" required />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_offer_percentage" class="form-label fw-bold">
                                <i class="fas fa-tags me-2"></i>Offer Percentage
                            </label>
                            <input type="number" class="form-control shadow-sm" id="edit_offer_percentage" name="offer_percentage" min="0" max="100" step="0.01" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_amount_offer" class="form-label fw-bold">
                                <i class="fas fa-tags me-2"></i>Offer Amount
                            </label>
                            <input type="number" class="form-control shadow-sm" id="edit_amount_offer" name="amount_offer" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_tax_percentage" class="form-label fw-bold">
                                <i class="fas fa-percent me-2"></i>Tax Percentage
                            </label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="edit_tax_percentage" name="tax_percentage" />
                        </div>
                        <div class="col-md-4 mb-3">
                            <label for="edit_cod_fee" class="form-label fw-bold">
                                <i class="fas fa-truck me-2"></i>COD Fee
                            </label>
                            <input type="number" step="0.01" class="form-control shadow-sm" id="edit_cod_fee" name="cod_fee" readonly />
                        </div>
                    </div>
                    <div class="mb-3">
                        <label for="edit_product_description" class="form-label fw-bold">
                            <i class="fas fa-align-left me-2"></i>Product Description
                        </label>
                        <textarea class="form-control shadow-sm" id="edit_product_description" name="product_description" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_product_description_arabic" class="form-label fw-bold">
                            <i class="fas fa-align-left me-2"></i>Product Description (Arabic)
                        </label>
                        <textarea class="form-control shadow-sm arabic-input" id="edit_product_description_arabic" name="product_description_arabic" rows="3" required></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_warranty_details" class="form-label fw-bold">
                            <i class="fas fa-shield-alt me-2"></i>Warranty Details
                        </label>
                        <textarea class="form-control shadow-sm" id="edit_warranty_details" name="warranty_details" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label for="edit_warranty_details_arabic" class="form-label fw-bold">
                            <i class="fas fa-shield-alt me-2"></i>Warranty Details (Arabic)
                        </label>
                        <textarea class="form-control shadow-sm arabic-input" id="edit_warranty_details_arabic" name="warranty_details_arabic" rows="2"></textarea>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-star me-2"></i>Featured Product
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="checkbox" id="edit_featured_product" name="featured_product" value="yes" />
                            <label class="form-check-label" for="edit_featured_product">Mark as Featured</label>
                        </div>
                    </div>
                    <div class="mb-3" style="display:none;">
                        <label class="form-label fw-bold">
                            <i class="fas fa-tshirt me-2"></i>Collection Type
                        </label>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="collection_type" id="collection_summer" value="summer" />
                            <label class="form-check-label" for="collection_summer">Summer Collection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="collection_type" id="collection_winter" value="winter" />
                            <label class="form-check-label" for="collection_winter">Winter Collection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="collection_type" id="collection_monsoon" value="monsoon" />
                            <label class="form-check-label" for="collection_monsoon">Monsoon Collection</label>
                        </div>
                        <div class="form-check">
                            <input class="form-check-input" type="radio" name="collection_type" id="collection_none" value="" checked />
                            <label class="form-check-label" for="collection_none">None</label>
                        </div>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-palette me-2"></i>Product Colors
                        </label>
                        <div id="edit_color_fields_container"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_color">
                            <i class="fas fa-plus me-1"></i>Add Color
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-ruler-combined me-2"></i>Product Sizes (XXL,XL,X,L,M,S)
                        </label>
                        <div id="edit_size_fields_container"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_size">
                            <i class="fas fa-plus me-1"></i>Add Size
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-ruler-combined me-2"></i>Product Length
                        </label>
                        <div id="edit_length_fields_container"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_length">
                            <i class="fas fa-plus me-1"></i>Add Length
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-image me-2"></i>Product Images
                        </label>
                        <div id="edit_image_fields_container">
                            <!-- Existing images will be loaded here -->
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_image">
                            <i class="fas fa-plus me-1"></i>Add Image
                        </button>
                    </div>
                    <div class="mb-3">
                        <label for="edit_product_video" class="form-label fw-bold">
                            <i class="fas fa-video me-2"></i>Product Video
                        </label>
                        <div class="input-group">
                            <input type="file" id="edit_product_video" class="form-control" accept="video/mp4,video/mov,video/avi,video/mkv" />
                            <button type="button" class="btn btn-danger" id="edit_clear_video_btn" style="display: none;">
                                <i class="bi bi-x-lg"></i> Clear
                            </button>
                        </div>
                        <small class="text-muted">Max size: 5.5MB | MP4, MOV, AVI, MKV only</small>
                        <div id="edit_video_preview_container" class="mt-2" style="display: none;">
                            <video id="edit_video_preview" controls style="width: 100%; max-height: 150px;">
                                <source src="" type="video/mp4">
                                Your browser does not support video tag.
                            </video>
                            <small id="edit_video_filename" class="text-muted d-block mt-1"></small>
                        </div>
                    </div>
                    <!-- In editProductModal, update the specifications section -->
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-list-check me-2"></i>Product Specifications
                        </label>
                        <div id="edit_specification_container">
                            <!-- Each specification pair (English + Arabic) will be added here -->
                        </div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_specification_pair">
                            <i class="fas fa-plus me-1"></i>Add Specification
                        </button>
                    </div>
                </form>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-primary" data-bs-dismiss="modal">
                    <i class="fas fa-times me-1"></i>Close
                </button>
                <button type="button" class="btn btn-primary" id="btn_update_product">
                    <i class="fas fa-save me-1"></i>Save Changes
                </button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addCategoryModal" tabindex="-1" aria-labelledby="addCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addCategoryModalLabel">Manage Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-4">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="categoryFormTitle">Add New Category</h5>
                                <form id="addCategoryForm">
                                    <input type="hidden" id="edit_category_id">
                                    <div class="row">
                                        <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new_category_name" class="form-label">Category Name</label>
                                                <input type="text" class="form-control" id="new_category_name" required>
                                            </div>
                                        </div>
                                          <div class="col-md-6">
                                            <div class="mb-3">
                                                <label for="new_category_name_arabic" class="form-label">Category Name (Arabic)</label>
                                                <input type="text" class="form-control arabic-input" id="new_category_name_arabic" required>
                                            </div>
                                        </div>
                                        </div>
                                         <div class="row">
                                        <div class="col-md-12">
                                            <div class="mb-3">
                                                <label for="new_category_image" class="form-label">Category Image</label>
                                                <input type="file" class="form-control" id="new_category_image">
                                                <div id="category_image_preview" class="mt-2"></div>
                                            </div>
                                        </div>
                                    </div>
                                    <div class="d-flex justify-content-end gap-1">
                                        <div id="savesub_div">
                                            <button type="button" class="btn btn-primary" id="saveNewCategory">Save Category</button>
                                        </div>
                                        <div id="updatesub_div">
                                            <button type="button" class="btn btn-primary" id="updateNewCategory" style="display:none;">Update Category</button>
                                        </div>
                                        <div id="cancelsub_div">
                                            <button type="button" class="btn btn-outline-secondary" id="cancelCategoryEdit">Cancel</button>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="categoryTable" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Category Name</th>
                                                <th>Category Name (Arabic) </th>
                                                <th>Image</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>

<div class="modal fade" id="addSubCategoryModal" tabindex="-1" aria-labelledby="addSubCategoryModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="addSubCategoryModalLabel">Manage Sub Categories</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="row mb-3">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <h5 class="card-title" id="subCategoryFormTitle">Add New Sub Category</h5>
                                <form id="addSubCategoryForm">
                                    <input type="hidden" id="edit_sub_category_id">
                                    <input type="hidden" id="parent_category_id">
                                    <div class="row g-3 align-items-center">
                                        <div class="col-md-7 mb-7">
                                            <label for="new_sub_category_name" class="form-label">Sub Category Name</label>
                                            <input type="text" class="form-control" id="new_sub_category_name" required>
                                        </div>
                                        <div class="col-md-4 mb-1 d-flex justify-content-end gap-1">
                                            <div id="save_div">
                                                <button type="button" class="btn btn-primary" id="saveNewSubCategory">Save</button>
                                            </div>
                                            <div id="update_div">
                                                <button type="button" class="btn btn-primary" id="updateSubCategory">Update</button>
                                            </div>
                                            <div id="cancel_div">
                                                <button type="button" class="btn btn-secondary" id="cancelSubCategoryEdit">Cancel</button>
                                            </div>
                                        </div>
                                    </div>
                                </form>
                            </div>
                        </div>
                    </div>
                </div>
                <div class="row">
                    <div class="col-md-12">
                        <div class="card">
                            <div class="card-body">
                                <div class="table-responsive">
                                    <table id="subCategoryTable" class="table table-bordered" style="width:100%">
                                        <thead>
                                            <tr>
                                                <th>Sl No</th>
                                                <th>Sub Category Name</th>
                                                <th>Status</th>
                                                <th>Action</th>
                                            </tr>
                                        </thead>
                                        <tbody></tbody>
                                    </table>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Close</button>
            </div>
        </div>
    </div>
</div>
<!--<div class="modal fade" id="imageCropModal" tabindex="-1" role="dialog" aria-labelledby="imageCropModalLabel" aria-hidden="true">-->
<!--    <div class="modal-dialog modal-lg" role="document">-->
<!--        <div class="modal-content">-->
<!--            <div class="modal-header">-->
<!--                <h5 class="modal-title" id="imageCropModalLabel">Crop Image</h5>-->
<!--                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>-->
<!--            </div>-->
<!--            <div class="modal-body">-->
<!--                <div class="img-container">-->
<!--                    <img id="imageToCrop" src="" alt="Image to crop" style="max-width: 100%;">-->
<!--                </div>-->
<!--            </div>-->
<!--            <div class="modal-footer">-->
<!--                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>-->
<!--                <button type="button" class="btn btn-primary" id="cropImageBtn">Crop & Save</button>-->
<!--            </div>-->
<!--        </div>-->
<!--    </div>-->
<!--</div>-->

<!-- Croppie Modal - Exact from your index.php -->
<div class="modal fade" id="croppieModal" tabindex="-1" aria-labelledby="croppieModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg modal-dialog-centered">
        <div class="modal-content">
            <div class="modal-header bg-primary text-white">
                <h5 class="modal-title" id="croppieModalLabel">
                    <i class="fas fa-crop me-2"></i>Crop Product Image
                </h5>
                <button type="button" class="btn-close btn-close-white" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div id="croppie-container" style="width:400px; height:700px; margin:auto;"></div>
                <p class="text-muted text-center mt-2">Crop to 800x1300 for product view | 400x650 for thumbnails</p>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="crop_and_save">
                    <i class="fas fa-crop me-1"></i>Crop & Save
                </button>
            </div>
        </div>
    </div>
</div>

<!-- Platform Selection Modal -->
<div class="modal fade" id="platformModal" tabindex="-1" aria-labelledby="platformModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-dialog-centered">
        <div class="modal-content" style="border-radius: 16px; border: none; box-shadow: 0 20px 60px rgba(0,0,0,0.3); background: #fff; overflow: hidden;">
            <div class="modal-header" style="border-bottom: 1px solid #f0f0f0; padding: 20px 24px; background: #fafafa;">
                <h5 class="modal-title" id="platformModalLabel" style="font-weight: 700; color: #1a1a1a; font-size: 1.3rem; margin: 0; display: flex; align-items: center; gap: 8px;">
                    <i class="ri-share-line" style="font-size: 24px; color: #1877F2;"></i>
                    Share Product
                </h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close" style="font-size: 14px;"></button>
            </div>
            <div class="modal-body" style="padding: 32px 24px;">
                <p style="margin-bottom: 28px; color: #666; font-size: 14px; text-align: center; line-height: 1.5;">
                    Generate a trackable link for your social media campaign
                </p>
                <div style="display: flex; justify-content: center; flex-wrap: wrap; gap: 20px;">
                    
                    <!-- Instagram -->
                    <button class="platform-btn" data-platform="instagram" 
                        style="background: #fff; border: 2px solid #e0e0e0; color: #262626; padding: 14px 28px; border-radius: 50px; transition: all 0.3s ease; cursor: pointer; font-weight: 600; font-size: 15px; display: inline-flex; align-items: center; gap: 12px; min-width: 140px; justify-content: center; position: relative; overflow: hidden;">
                        <i class="ri-instagram-line" style="font-size: 22px;"></i>
                        <span class="btn-text">Instagram</span>
                    </button>
                    
                    <!-- YouTube -->
                    <button class="platform-btn" data-platform="youtube"
                        style="background: #fff; border: 2px solid #e0e0e0; color: #FF0000; padding: 14px 28px; border-radius: 50px; transition: all 0.3s ease; cursor: pointer; font-weight: 600; font-size: 15px; display: inline-flex; align-items: center; gap: 12px; min-width: 140px; justify-content: center; position: relative; overflow: hidden;">
                        <i class="ri-youtube-line" style="font-size: 22px;"></i>
                        <span class="btn-text">YouTube</span>
                    </button>
                    
                    <!-- TikTok -->
                    <button class="platform-btn" data-platform="tiktok"
                        style="background: #fff; border: 2px solid #e0e0e0; color: #000000; padding: 14px 28px; border-radius: 50px; transition: all 0.3s ease; cursor: pointer; font-weight: 600; font-size: 15px; display: inline-flex; align-items: center; gap: 12px; min-width: 140px; justify-content: center; position: relative; overflow: hidden;">
                        <i class="ri-tiktok-line" style="font-size: 22px;"></i>
                        <span class="btn-text">TikTok</span>
                    </button>
                    
                    <!-- Facebook -->
                    <button class="platform-btn" data-platform="facebook"
                        style="background: #fff; border: 2px solid #e0e0e0; color: #1877F2; padding: 14px 28px; border-radius: 50px; transition: all 0.3s ease; cursor: pointer; font-weight: 600; font-size: 15px; display: inline-flex; align-items: center; gap: 12px; min-width: 140px; justify-content: center; position: relative; overflow: hidden;">
                        <i class="ri-facebook-circle-line" style="font-size: 22px;"></i>
                        <span class="btn-text">Facebook</span>
                    </button>
                    
                </div>
            </div>
        </div>
    </div>
</div>