<div class="page-content bg-light">
    <div class="content-inner-1">
        <div class="container">
            <div class="row justify-content-center">
                <div class="col-lg-9">
                    <div class="table-responsive">
                        <table class="table check-tbl style-1">
                            <thead>
                                <tr>
                                    <th data-i18n="product">Product</th>
                                    <th data-i18n="wishlist">Wishlist</th>
                                    <th data-i18n="price">Price</th>
                                    <th data-i18n="stock">Stock</th>
                                    <th data-i18n="action">Action</th>
                                    <th></th>
                                </tr>
                            </thead>
                            <tbody>
                                <!-- Items will be populated by JavaScript -->
                            </tbody>
                        </table>
                    </div>
                </div>
            </div>
        </div>
    </div>
</div>

<div id="removeModal" class="modal" style="display:none;">
    <div class="modal-content">
        <span class="close" id="closeModal">&times;</span>
        <h2 data-i18n="remove_item">Remove Item</h2>
        <p data-i18n="remove_confirmation">Are you sure you want to remove this item from your wishlist?</p>
        <div class="modal-actions">
            <button id="confirmRemove" data-i18n="remove">REMOVE</button>
            <button id="cancelRemove" data-i18n="cancel">CANCEL</button>
        </div>
    </div>
</div>