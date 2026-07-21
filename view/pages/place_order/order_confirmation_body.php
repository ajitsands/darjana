<section class="col-xl-9 account-wrapper">
    <div class="confirmation-card account-card">
        <div class="thumb">
            <img src="images/confirmation.png" alt="">
        </div>
        <div class="text-center mt-4">
            <h4 class="mb-3 text-capitalize" data-i18n="your_order_is_completed">Your Order Is Completed !</h4>
            <p class="mb-2" data-i18n="order_confirmation_message">You will receive an order confirmation email with details of your order.</p>
            <p class="mb-0">
                <span data-i18n="order_id">Order ID</span>: <?php echo isset($_GET['order_id']) ? htmlspecialchars($_GET['order_id']) : 'N/A'; ?>
            </p>
            <div class="mt-4 d-sm-flex gap-3 justify-content-center">
                <a href="account-order-details.html" class="btn my-1 btn-secondary" id="view-order-btn" data-i18n="view_order">View Order</a>
                <a href="/" class="btn btn-outline-secondary my-1 btnhover20" id="view-home-btn" data-i18n="back_to_home">Back To Home</a>
            </div>
        </div>
    </div>
</section>