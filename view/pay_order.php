<?php
if (session_status() === PHP_SESSION_NONE) {
    session_start();
}

require_once(__DIR__ . '/../model/db_connection/connection.php');
require_once(__DIR__ . '/../controller/afs_payment.php');

$order_id = $_GET['order_id'] ?? null;
$checkout_id = $_GET['checkout_id'] ?? null;

if (!$order_id || !$checkout_id) {
    die("Invalid payment request. Missing order or session parameters.");
}

$dbObj = new DBConnection();
$con = $dbObj->ConnectToMYSQL();

$afs = new AFSPaymentGateway(null, null, null, $con);
$oppwaBaseUrl = $afs->getBaseUrl();

$protocol = (isset($_SERVER['HTTPS']) && $_SERVER['HTTPS'] === 'on') ? "https" : "http";
$siteHost = $_SERVER['HTTP_HOST'];
$shopperResultUrl = "$protocol://$siteHost/controller/orders_controller.php?action=afs_callback&order_id=" . urlencode($order_id);
?>
<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Complete Payment - Order #<?php echo htmlspecialchars($order_id); ?> | Darjana Fashion</title>
    <link href="https://fonts.googleapis.com/css2?family=Outfit:wght@300;400;500;600;700&display=swap" rel="stylesheet">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/bootstrap@5.3.0/dist/css/bootstrap.min.css">
    <link rel="stylesheet" href="https://cdn.jsdelivr.net/npm/remixicon@3.5.0/fonts/remixicon.css">

    <style>
        :root {
            --primary-color: #8A253A;
            --primary-hover: #701d2e;
            --accent-color: #D4AF37;
            --bg-gradient: linear-gradient(135deg, #1f1f2e 0%, #111119 100%);
        }
        body {
            font-family: 'Outfit', sans-serif;
            background: #f8f9fa;
            min-height: 100vh;
            display: flex;
            align-items: center;
            justify-content: center;
            padding: 20px 10px;
        }
        .payment-card {
            background: #ffffff;
            border-radius: 16px;
            box-shadow: 0 15px 35px rgba(0, 0, 0, 0.08);
            border: 1px solid #eaeaea;
            width: 100%;
            max-width: 520px;
            overflow: hidden;
        }
        .payment-header {
            background: linear-gradient(135deg, #8A253A 0%, #5d1726 100%);
            color: #ffffff;
            padding: 28px 24px;
            text-align: center;
            position: relative;
        }
        .payment-header h4 {
            margin: 0;
            font-weight: 600;
            font-size: 1.4rem;
            letter-spacing: 0.5px;
        }
        .payment-header p {
            margin: 6px 0 0 0;
            opacity: 0.85;
            font-size: 0.95rem;
        }
        .payment-body {
            padding: 30px 24px;
        }
        .payment-badges {
            display: flex;
            justify-content: center;
            gap: 12px;
            margin-bottom: 24px;
            flex-wrap: wrap;
        }
        .payment-badges img, .payment-badges span {
            height: 28px;
            font-size: 0.85rem;
            font-weight: 600;
            padding: 4px 12px;
            border-radius: 4px;
            background: #f1f3f5;
            color: #495057;
            display: inline-flex;
            align-items: center;
        }
        /* Custom styling for OPPWA widget elements */
        div.wpwl-container {
            font-family: 'Outfit', sans-serif !important;
        }
        .wpwl-control {
            border-radius: 8px !important;
            height: 48px !important;
            border: 1px solid #ced4da !important;
            font-size: 1rem !important;
        }
        .wpwl-button-pay {
            background-color: var(--primary-color) !important;
            border: none !important;
            border-radius: 8px !important;
            font-weight: 600 !important;
            font-size: 1.1rem !important;
            height: 50px !important;
            transition: all 0.3s ease !important;
            box-shadow: 0 4px 12px rgba(138, 37, 58, 0.25) !important;
        }
        .wpwl-button-pay:hover {
            background-color: var(--primary-hover) !important;
        }
        .secure-notice {
            font-size: 0.85rem;
            color: #6c757d;
            text-align: center;
            margin-top: 20px;
        }
        .secure-notice i {
            color: #198754;
            margin-right: 4px;
        }
    </style>

    <!-- OPPWA Copy & Pay Payment Widget Script -->
    <script src="<?php echo htmlspecialchars($oppwaBaseUrl); ?>/v1/paymentWidgets.js?checkoutId=<?php echo htmlspecialchars($checkout_id); ?>"></script>
</head>
<body>

    <div class="payment-card">
        <div class="payment-header">
            <h4><i class="ri-shield-check-fill me-2"></i>Secure Checkout</h4>
            <p>Order #<?php echo htmlspecialchars($order_id); ?></p>
        </div>

        <div class="payment-body">
            <div class="payment-badges">
                <span><i class="ri-bank-card-line me-1"></i> Visa</span>
                <span><i class="ri-bank-card-line me-1"></i> Mastercard</span>
                <span><i class="ri-bank-card-line me-1"></i> Benefit</span>
                <span><i class="ri-bank-card-line me-1"></i> Amex</span>
            </div>

            <!-- OPPWA Form Container -->
            <form action="<?php echo htmlspecialchars($shopperResultUrl); ?>" class="paymentWidgets" data-brands="VISA MASTER AMEX BENEFIT MADA"></form>

            <div class="secure-notice">
                <i class="ri-lock-2-line"></i> 256-bit SSL Encrypted Payment Gateway (AFS / OPPWA)
            </div>
        </div>
    </div>

</body>
</html>
