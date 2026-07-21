<div class="row">
    <div class="col-xl-12 col-lg-12 col-md-12 col-sm-12">
        <div class="card shadow-lg border-0 rounded-4">
            <div class="card-header bg-primary text-white text-center">
                <h4 class="mb-0"><b>Product Listing</b></h4>
            </div>
            <div class="card-body">
                <div class="row g-2 mb-4">
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <select id="category_name" class="form-control form-control-sm" required>
                                <option value="" disabled selected>- Select Category -</option>
                                <?php foreach ($categories as $category): ?>
                                    <option value="<?php echo $category['ids']; ?>"><?php echo htmlspecialchars($category['category_type']); ?></option>
                                <?php endforeach; ?>
                            </select>
                            <label for="category_name">Category<span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <select id="sub_category_name" class="form-control form-control-sm" disabled>
                                <option value="" disabled selected>- Select Sub Category -</option>
                            </select>
                            <label for="sub_category_name">Sub Category<span style="color: red;"> *</span></label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <select id="product_color" class="form-control form-control-sm" disabled>
                                <option value="" disabled selected>- Select Color -</option>
                            </select>
                            <label for="product_color">Color</label>
                        </div>
                    </div>
                    <div class="col-md-3">
                        <div class="form-floating form-floating-outline">
                            <select id="product_size" class="form-control form-control-sm" disabled>
                                <option value="" disabled selected>- Select Size -</option>
                            </select>
                            <label for="product_size">Size</label>
                        </div>
                    </div>
                </div>
                <div class="table-responsive">
                    <table id="productTable" class="table table-bordered" style="width:100%">
                        <thead class="text-center">
                            <tr>
                                <th></th>
                                <th>Sl No</th>
                                <th>Product Name</th>
                                <th>Brand Name</th>
                                <th>Category</th>
                                <th>Subcategory</th>
                                <th>MRP (BHD)</th>
                                <th>Selling Price (BHD)</th>
                                <th>Offer Price (BHD)</th>
                                <th>Status</th>
                            </tr>
                        </thead>
                        <tbody></tbody>
                    </table>
                </div>
            </div>
        </div>
    </div>
</div>