<?php
session_start();
// require_once('../../../../model/db_connection/connection.php');
require_once('../../tcpdf/tcpdf.php');

// Get order ID from request (keep as string)
$order_id = isset($_GET['order_id']) ? trim($_GET['order_id']) : '';
if (empty($order_id)) {
    header('HTTP/1.1 400 Bad Request');
    die(json_encode(['error' => 'Invalid Order ID']));
}

// Database connection
$connObj = new DBConnection();
$conn = $connObj->ConnectToMYSQL();

// Get order details
$stmt = $conn->prepare("
    SELECT 
        od.ids as internal_id,
        od.order_id,
        od.customer_name,
        od.customer_mobile_no as customer_phone,
        od.customer_email,
        od.placed_date as order_date,
        od.status,
        p.amount_selling as unit_price,
        od.product_name,
        od.product_color as color,
        od.product_size as size,
        od.quantity,
        od.customer_address,
        od.street,
        od.district as city,
        od.state,
        od.country,
        od.postal_code,
        (p.amount_selling * od.quantity) as subtotal,
        40 as shipping_fee,
        0 as tax,
        (p.amount_selling * od.quantity) as grand_total,
        'Cash On Delivery' as payment_method
    FROM order_details od
    JOIN product_details p ON od.product_id = p.ids
    WHERE od.order_id = ?
");
$stmt->bind_param("s", $order_id);
$stmt->execute();
$result = $stmt->get_result();

if ($result->num_rows === 0) {
    header('HTTP/1.1 404 Not Found');
    die(json_encode(['error' => 'Order not found']));
}

$order = $result->fetch_assoc();

// Create PDF
$pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

// Set document information
$pdf->SetCreator('SandsLab Shopping');
$pdf->SetAuthor('SandsLab Shopping');
$pdf->SetTitle('Invoice #' . $order['order_id']);
$pdf->SetSubject('Order Invoice');

// Remove default header/footer
$pdf->setPrintHeader(false);
$pdf->setPrintFooter(false);

// Set margins
$pdf->SetMargins(15, 15, 15);
$pdf->SetAutoPageBreak(true, 15);

// Add a page
$pdf->AddPage();

// HTML content
$html = <<<HTML
<style>
    .header { font-size: 18px; font-weight: bold; text-align: center; margin-bottom: 10px; }
    .section-title { font-size: 14px; font-weight: bold; margin: 10px 0 5px 0; }
    .table-header { font-weight: bold; background-color: #f2f2f2; }
    .text-right { text-align: right; }
    .border-bottom { border-bottom: 1px solid #ddd; }
    table { width: 100%; border-collapse: collapse; }
    td { padding: 5px; }
</style>

<div class="header">SANDSLAB SHOPPING - INVOICE</div>

<div class="section-title">Order Information</div>
<table>
    <tr>
        <td width="100">Order #:</td>
        <td>#{$order['order_id']}</td>
    </tr>
    <tr>
        <td>Date:</td>
        <td>{$order['order_date']}</td>
    </tr>
    <tr>
        <td>Status:</td>
        <td>{$order['status']}</td>
    </tr>
    <tr>
        <td>Payment:</td>
        <td>{$order['payment_method']}</td>
    </tr>
</table>

<div class="section-title">Customer Information</div>
<table>
    <tr>
        <td width="100">Name:</td>
        <td>{$order['customer_name']}</td>
    </tr>
    <tr>
        <td>Phone:</td>
        <td>{$order['customer_phone']}</td>
    </tr>
    <tr>
        <td>Email:</td>
        <td>{$order['customer_email'] ?: 'N/A'}</td>
    </tr>
</table>

<div class="section-title">Shipping Address</div>
<table>
    <tr>
        <td width="100">Address:</td>
        <td>{$order['street']}, {$order['customer_address']}</td>
    </tr>
    <tr>
        <td>City:</td>
        <td>{$order['city']}</td>
    </tr>
    <tr>
        <td>State:</td>
        <td>{$order['state']}</td>
    </tr>
    <tr>
        <td>Postal Code:</td>
        <td>{$order['postal_code']}</td>
    </tr>
</table>

<div class="section-title">Order Items</div>
<table border="1" cellpadding="5">
    <tr class="table-header">
        <td>Product</td>
        <td>Color</td>
        <td>Size</td>
        <td>Qty</td>
        <td class="text-right">Price</td>
        <td class="text-right">Total</td>
    </tr>
    <tr>
        <td>{$order['product_name']}</td>
        <td>{$order['color']}</td>
        <td>{$order['size']}</td>
        <td>{$order['quantity']}</td>
        <td class="text-right">₹{$order['unit_price']}</td>
        <td class="text-right">₹{$order['subtotal']}</td>
    </tr>
</table>

<div class="section-title">Order Summary</div>
<table width="200" align="right">
    <tr>
        <td class="text-right">Subtotal:</td>
        <td class="text-right">₹{$order['subtotal']}</td>
    </tr>
    <tr>
        <td class="text-right">Shipping:</td>
        <td class="text-right">₹{$order['shipping_fee']}</td>
    </tr>
    <tr>
        <td class="text-right">Tax:</td>
        <td class="text-right">₹{$order['tax']}</td>
    </tr>
    <tr class="border-bottom">
        <td class="text-right"><strong>Total:</strong></td>
        <td class="text-right"><strong>₹{$order['grand_total']}</strong></td>
    </tr>
</table>

<div style="margin-top: 40px; text-align: center;">
    Thank you for your order!
</div>
HTML;

// Write HTML content
$pdf->writeHTML($html, true, false, true, false, '');

// Output for AJAX response
header('Content-Type: application/pdf');
header('Content-Disposition: attachment; filename="invoice_'.$order_id.'.pdf"');
header('Cache-Control: max-age=0');
echo $pdf->Output('invoice_' . $order_id . '.pdf', 'S');
exit;
?>