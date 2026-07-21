<?php
// Assuming session_start() and other includes are already present
?>

<div class="row">
    <!-- Existing Product Form and Table -->
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card mb-6">
            <form class="card-body form-repeater" enctype="multipart/form-data">
                <h6>Currency Details</h6>
                <div class="row g-2">
                    <input type="hidden" id="user_id" class="form-control" value="" />
                    <input type="hidden" id="vendor_id" class="form-control" value="" />
                    <input type="hidden" id="currency_id" class="form-control" value="" />
                  
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="country_name" class="form-control form-control-sm" placeholder="Country Name" />
                                <label for="country_name">Country Name<span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="country_code" class="form-control form-control-sm" placeholder="Country Code" />
                                <label for="country_code">Country Code <span style="color: red;"> *</span> </label>
                            </div>
                        </div>
                    </div>
                    
                     <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="currency_code" class="form-control form-control-sm" placeholder="Currency Code" />
                                <label for="currency_code">Currency Code <span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="text" id="currency_symbol" class="form-control form-control-sm" placeholder="Currency Symbol" />
                                <label for="currency_symbol">Currency Symbol <span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                    <div class="col-md-4">
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                                <input type="number" id="exchange_rate" class="form-control form-control-sm" placeholder="Exchange Rate"  />
                                <label for="exchange_rate">Exchange Rate <span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                  
                    <div class="col-md-4">
                       
                        <div class="input-group input-group-merge">
                            <div class="form-floating form-floating-outline">
                            <input type="text" id="flag_images" class="form-control form-control-sm" placeholder="Flag"  />
                            <label for="Flag">Flag <span style="color: red;"> *</span></label>
                            </div>
                        </div>
                    </div>
                   
                </div>
                <br>
                <div id="btn_save_div">
                    <button class="btn btn-primary ladda-button" type="button" style="float: right;" id="btn_save_currency" data-style="expand-left">
                        <i class="ri-save-line me-1"></i>
                        <span class="align-middle">Add Currency</span>
                    </button>
                    
                </div>
                <div id="btn_update_div">
                <button class="btn btn-primary ladda-button" type="button" style="float: right;" id="btn_update_currency" data-style="expand-left">
                        <i class="ri-save-line me-1"></i>
                        <span class="align-middle">Update Currency</span>
                    </button>
                </div>    
            </form>
        </div>
    </div>
    
 </div>
 <div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><b>Currency Details</b></h4>
            </div>
            <div class="card-body">
                <div class="table-responsive">
                    <table id="currencyTable" class="table table-bordered" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th>Sl No</th>
                                <th>Country Name</th>
                                <th>Country Code</th>
                                <th>Currency Code</th>
                                <th>Currency Symbol</th>
                                <th>Exchange Rate</th>
                                <th>Fag</th>
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
                            <label for="edit_category_name" class="form-label fw-bold">
                                <i class="fas fa-layer-group me-2"></i>Category Name
                            </label>
                            <select id="edit_category_name" class="form-select shadow-sm" required>
                                <option value="">Select Category</option>
                            </select>
                        </div>
                        <div class="col-md-6 mb-3">
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
                        <label for="edit_warranty_details" class="form-label fw-bold">
                            <i class="fas fa-shield-alt me-2"></i>Warranty Details
                        </label>
                        <textarea class="form-control shadow-sm" id="edit_warranty_details" name="warranty_details" rows="2"></textarea>
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
                    <div class="mb-3">
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
                            <i class="fas fa-ruler-combined me-2"></i>Product Sizes
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
                        <div id="edit_image_fields_container"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_image">
                            <i class="fas fa-plus me-1"></i>Add Image
                        </button>
                    </div>
                    <div class="mb-3">
                        <label class="form-label fw-bold">
                            <i class="fas fa-list-check me-2"></i>Product Specifications
                        </label>
                        <div id="edit_specification_fields_container"></div>
                        <button type="button" class="btn btn-outline-primary btn-sm mt-2" id="add_edit_specification">
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

<div class="modal fade" id="imageCropModal" tabindex="-1" role="dialog" aria-labelledby="imageCropModalLabel" aria-hidden="true">
    <div class="modal-dialog modal-lg" role="document">
        <div class="modal-content">
            <div class="modal-header">
                <h5 class="modal-title" id="imageCropModalLabel">Crop Image</h5>
                <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
            </div>
            <div class="modal-body">
                <div class="img-container">
                    <img id="imageToCrop" src="" alt="Image to crop" style="max-width: 100%;">
                </div>
            </div>
            <div class="modal-footer">
                <button type="button" class="btn btn-secondary" data-bs-dismiss="modal">Cancel</button>
                <button type="button" class="btn btn-primary" id="cropImageBtn">Crop & Save</button>
            </div>
        </div>
    </div>
</div>