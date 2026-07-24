<?php
session_start();
require_once('../../model/db_connection/connection.php');
require_once('../../tcpdf/tcpdf.php');

class InvoiceGenerator {
    private $order_id;
    private $item_ids;
    private $conn;
    private $orders;
    private $isMultiItem;
    private $vendor;
    private $totals = [
        'subtotal' => 0,
        'tax_amount' => 0,
        'shipping_fee' => 0,
        'grand_total' => 0
    ];

    public function __construct($conn) {
        $this->order_id = isset($_GET['order_id']) ? trim($_GET['order_id']) : '';
        $this->item_ids = isset($_GET['ids']) ? explode(',', $_GET['ids']) : [];
        $this->isMultiItem = isset($_GET['multi_item']) && $_GET['multi_item'] == 1;

        if (empty($this->order_id) || empty($this->item_ids)) {
            die('Error: Invalid Order ID or Item IDs');
        }

        foreach ($this->item_ids as $id) {
            if (!is_numeric($id)) {
                die('Error: Invalid Item ID format');
            }
        }

        $this->conn = $conn;
        $this->fetchOrderDetails();
        $this->calculateTotals();
        $this->fetchVendorDetails();
    }

    private function fetchOrderDetails() {
        $placeholders = implode(',', array_fill(0, count($this->item_ids), '?'));
        $types = 's' . str_repeat('i', count($this->item_ids));
    
        $query = "
            SELECT 
                od.ids,
                od.order_id,
                od.customer_name,
                od.customer_mobile_no AS customer_phone,
                od.customer_email,
                od.placed_date AS order_date,
                od.status,
                -- Price fields (we'll calculate which one to use in PHP)
                od.product_cost,
                od.selling_price,
                od.discount_price,
                od.product_name,
                od.product_color AS color,
                od.product_size AS size,
                od.quantity,
                od.customer_address,
                od.street,
                od.district AS city,
                od.state,
                od.country AS country_id,           -- Keep the ID if needed
                c.country AS country_name,          -- Get actual country name
                od.postal_code,
                od.cod_fee AS shipping_fee,
                od.tax_percentage,
                od.vendor_id
            FROM order_details od
            LEFT JOIN product_details pd ON od.product_id = pd.ids
            LEFT JOIN country c ON od.country = c.ids   -- Join with country table
            WHERE od.order_id = ? 
              AND od.ids IN ($placeholders)
            ORDER BY od.ids
        ";
    
        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die('Error preparing query: ' . $this->conn->error);
        }
    
        $params = array_merge([$this->order_id], $this->item_ids);
        $stmt->bind_param($types, ...$params);
        $stmt->execute();
        $result = $stmt->get_result();
    
        if ($result->num_rows === 0) {
            die('Error: Order not found');
        }
    
        $this->orders = [];
        while ($row = $result->fetch_assoc()) {
            $row['unit_price'] = $this->calculateUnitPrice($row);
            $this->orders[] = $row;
        }
    
        $stmt->close();
    }

    private function calculateUnitPrice($order) {
        $product_cost = isset($order['product_cost']) ? (float)$order['product_cost'] : 0;
        $selling_price = isset($order['selling_price']) ? (float)$order['selling_price'] : 0;
        $discount_price = isset($order['discount_price']) ? (float)$order['discount_price'] : 0;

        // Priority logic:
        // 1. If discount_price is present and > 0, return discount_price
        // 2. Else if selling_price is present and > 0, return selling_price
        // 3. Else if product_cost is present and > 0, return product_cost
        if ($discount_price > 0) {
            return $discount_price;
        } elseif ($selling_price > 0) {
            return $selling_price;
        } elseif ($product_cost > 0) {
            return $product_cost;
        } else {
            return 0;
        }
    }

    private function calculateTotals() {
        // Reset totals
        $this->totals = [
            'subtotal' => 0,
            'tax_amount' => 0,
            'shipping_fee' => 0,
            'grand_total' => 0
        ];

        // For multi-item orders, shipping fee should be summed if different per item
        // Or use the first item's shipping fee if it's the same for all items
        $shippingFeePerItem = false;
        
        foreach ($this->orders as &$order) {
            // Calculate item subtotal
            $unitPrice = (float)$order['unit_price'];
            $quantity = (float)$order['quantity'];
            $itemSubtotal = $unitPrice * $quantity;
            
            // Calculate item tax
            $taxPercentage = (float)$order['tax_percentage'];
            $itemTax = ($itemSubtotal * $taxPercentage) / 100;
            
            // Get shipping fee for this item
            $itemShippingFee = (float)$order['shipping_fee'];
            
            // Store calculations in the order array
            $order['item_subtotal'] = $itemSubtotal;
            $order['item_tax'] = $itemTax;
            $order['item_total'] = $itemSubtotal + $itemTax + $itemShippingFee;
            
            // Accumulate totals
            $this->totals['subtotal'] += $itemSubtotal;
            $this->totals['tax_amount'] += $itemTax;
            $this->totals['shipping_fee'] += $itemShippingFee;
        }
        unset($order); // Break reference
        
        // Calculate grand total
        $this->totals['grand_total'] = $this->totals['subtotal'] + 
                                      $this->totals['tax_amount'] + 
                                      $this->totals['shipping_fee'];
        
        // If it's a single item order, use that item's shipping fee directly
        if (count($this->orders) === 1) {
            $this->totals['shipping_fee'] = (float)$this->orders[0]['shipping_fee'];
        }
        
        // Store totals in first order for display
        if (count($this->orders) > 0) {
            $this->orders[0]['subtotal'] = $this->totals['subtotal'];
            $this->orders[0]['tax_amount'] = $this->totals['tax_amount'];
            $this->orders[0]['shipping_fee'] = $this->totals['shipping_fee'];
            $this->orders[0]['grand_total'] = $this->totals['grand_total'];
        }
    }

    private function fetchVendorDetails() {
        $vendor_id = $this->orders[0]['vendor_id'] ?? null;

        if (!$vendor_id) {
            die('Error: Vendor ID not found for this order');
        }

        $query = "
            SELECT 
                first_name,
                second_name,
                address,
                street,
                district,
                state,
                country,
                pickup_pincode,
                gmail_id
            FROM vendor_details
            WHERE ids = ? AND status = 'Active'
        ";

        $stmt = $this->conn->prepare($query);
        if (!$stmt) {
            die('Error preparing vendor query: ' . $this->conn->error);
        }

        $stmt->bind_param('i', $vendor_id);
        $stmt->execute();
        $result = $stmt->get_result();

        if ($result->num_rows === 0) {
            die('Error: Vendor not found or inactive');
        }

        $this->vendor = $result->fetch_assoc();
        $stmt->close();
    }

    public function generateInvoice() {
        $pdf = new TCPDF(PDF_PAGE_ORIENTATION, PDF_UNIT, PDF_PAGE_FORMAT, true, 'UTF-8', false);

        $pdf->SetCreator('Darjana Fashion');
        $pdf->SetAuthor('Darjana Fashion');
        $pdf->SetTitle('Invoice #' . $this->order_id);
        $pdf->SetSubject('Order Invoice');

        $pdf->setPrintHeader(false);
        $pdf->setPrintFooter(false);

        $pdf->SetMargins(15, 20, 15);
        $pdf->AddPage();

        $html = $this->generateInvoiceHTML();
        $pdf->writeHTML($html, true, false, true, false, '');

        header('Content-Type: application/pdf');
        header('Content-Disposition: inline; filename="invoice_' . $this->order_id . '.pdf"');
        header('Cache-Control: private, max-age=0, must-revalidate');
        header('Pragma: public');

        $pdf->Output('invoice_' . $this->order_id . '.pdf', 'I');
    }

    private function generateInvoiceHTML() {
        $mainOrder = $this->orders[0];

        $formatComma = function($text) {
            return preg_replace('/,\s*/', ', ', trim($text));
        };
    
        // Clean customer address formatting with proper comma spacing
        $addressLines = [];
        if (!empty($mainOrder['customer_address'])) {
            $addressLines[] = htmlspecialchars($formatComma($mainOrder['customer_address']));
        }
        if (!empty($mainOrder['street']) && $mainOrder['street'] !== ($mainOrder['customer_address'] ?? '')) {
            $addressLines[] = htmlspecialchars($formatComma($mainOrder['street']));
        }
        
        $cityPost = array_filter([$mainOrder['city'] ?? '', $mainOrder['postal_code'] ?? '']);
        if (!empty($cityPost)) {
            $addressLines[] = htmlspecialchars(implode(' - ', $cityPost));
        }
        
        $stateCountry = array_filter([$mainOrder['state'] ?? '', $mainOrder['country_name'] ?? '']);
        if (!empty($stateCountry)) {
            $addressLines[] = htmlspecialchars(implode(', ', $stateCountry));
        }

        $contactLines = [];
        if (!empty($mainOrder['customer_phone'])) {
            $contactLines[] = 'Ph: ' . htmlspecialchars($mainOrder['customer_phone']);
        }
        if (!empty($mainOrder['customer_email'])) {
            $contactLines[] = 'Email: ' . htmlspecialchars($mainOrder['customer_email']);
        }

        $custAddressHTML = implode('<br>', $addressLines);
        if (!empty($contactLines)) {
            $custAddressHTML .= (!empty($custAddressHTML) ? '<br>' : '') . implode('<br>', $contactLines);
        }

        // Clean vendor address formatting
        $vLines = [];
        $vLines[] = '<strong>Darjana Fashion</strong>';
        
        $vendorName = trim(($this->vendor['first_name'] ?? '') . ' ' . ($this->vendor['second_name'] ?? ''));
        if (!empty($vendorName)) {
            $vLines[] = htmlspecialchars($vendorName);
        }
        if (!empty($this->vendor['address'])) {
            $vLines[] = htmlspecialchars($this->vendor['address']);
        }
        if (!empty($this->vendor['street']) && $this->vendor['street'] !== ($this->vendor['address'] ?? '')) {
            $vLines[] = htmlspecialchars($this->vendor['street']);
        }
        
        $vDistrictPin = array_filter([$this->vendor['district'] ?? '', $this->vendor['pickup_pincode'] ?? '']);
        if (!empty($vDistrictPin)) {
            $vLines[] = htmlspecialchars(implode(' - ', $vDistrictPin));
        }

        $vStateCountry = array_filter([$this->vendor['state'] ?? '', $this->vendor['country'] ?? '']);
        if (!empty($vStateCountry)) {
            $vLines[] = htmlspecialchars(implode(', ', $vStateCountry));
        }

        if (!empty($this->vendor['gmail_id'])) {
            $vLines[] = 'Email: ' . htmlspecialchars($this->vendor['gmail_id']);
        }

        $vendorAddress = implode('<br>', $vLines);
    
        $html = '
        <style>
            .invoice-container { 
                font-family: DejaVu Sans, sans-serif; 
                font-size: 11px;
                color: #333; 
                line-height: 1.6;
            }
            .header { 
                font-size: 18px; 
                font-weight: bold; 
                color: #1a237e; 
                text-align: right; 
                margin-bottom: 15px;
            }
            .company-info { 
                font-size: 9px; 
                line-height: 14px;
            }
            .invoice-title { 
                font-weight: bold; 
                color: #1a237e; 
                font-size: 9px;
            }
            .bordered { 
                border: 1px solid #ccc; 
                border-radius: 4px;
            }
            .table { 
                border-collapse: collapse; 
                width: 100%; 
                font-size: 9px; 
                margin-top: 15px;
            }
            .table th, .table td { 
                border: 1px solid #ccc; 
                padding: 6px;
                font-size: 9px;
            }
            .table th {
                background-color: #1a237e;
                color: #fff;
                padding: 10px 6px;
                line-height: 2.2;
                font-weight: bold;
            }
            .text-right { 
                text-align: right;
            }
            .highlight { 
                background-color: #e8f0fe;
            }
            .footer-note { 
                font-size: 8px; 
                color: #555; 
                text-align: left; 
                padding: 6px 0;
                padding-left: 0;
                text-indent: 0;
            }
            .spacer { 
                margin-bottom: 20px;
            }
            .summary-table td {
                padding: 5px 10px;
            }
            .bold {
                font-weight: bold;
            }
        </style>
    
        <div class="invoice-container">
            <table width="100%" class="spacer">
                <tr>
                    <td width="60%" class="company-info">' . $vendorAddress . '</td>
                    <td width="40%" class="header">INVOICE</td>
                </tr>
            </table>
    
            <div class="spacer"></div>
    
            <table width="100%" cellpadding="6" class="bordered" style="font-size:10px;">
                <!-- Top Row: Invoice Number & Date in a single line -->
                <tr style="background-color: #f8f9fa; border-bottom: 1px solid #ccc;">
                    <td width="50%">
                        <span class="invoice-title">Invoice#:</span> ' . htmlspecialchars($mainOrder['order_id']) . '
                    </td>
                    <td width="50%" class="text-right">
                        <span class="invoice-title">Invoice Date:</span> ' . date('d M Y', strtotime($mainOrder['order_date'])) . '
                    </td>
                </tr>
                <!-- Bottom Row: Bill To (Left 50%) and Ship To (Right 50%) -->
                <tr>
                    <td width="50%" style="border-right: 1px solid #ccc; vertical-align: top; font-size: 9px; line-height: 1.4;">
                        <span class="invoice-title">Bill To</span><br>
                        <strong>' . htmlspecialchars($mainOrder['customer_name']) . '</strong><br>
                        ' . $custAddressHTML . '
                    </td>
                    <td width="50%" style="vertical-align: top; font-size: 9px; line-height: 1.4;">
                        <span class="invoice-title">Ship To</span><br>
                        <strong>' . htmlspecialchars($mainOrder['customer_name']) . '</strong><br>
                        ' . $custAddressHTML . '
                    </td>
                </tr>
            </table>
    
            <div class="spacer"></div>
    
            <table class="table">
                <thead>
                    <tr>
                        <th width="5%">#</th>
                        <th width="35%">Item & Description</th>
                        <th width="10%">Qty</th>
                        <th width="15%">Rate</th>
                        <th width="15%">Subtotal</th>
                        <th width="10%">Tax %</th>
                        <th width="10%">Tax Amt</th>
                    </tr>
                </thead>
                <tbody>';
    
        foreach ($this->orders as $index => $order) {
            $itemSubtotal = $order['unit_price'] * $order['quantity'];
            $itemTax = ($itemSubtotal * $order['tax_percentage']) / 100;
            
            $html .= '
                <tr>
                    <td width="5%">' . ($index + 1) . '</td>
                    <td width="35%">
                        <strong>' . htmlspecialchars($order['product_name']) . '</strong><br>
                        Color: ' . htmlspecialchars($order['color']) . ', Size: ' . htmlspecialchars($order['size']) . '
                    </td>
                    <td width="10%">' . $order['quantity'] . '</td>
                    <td width="15%" class="text-right">' . number_format($order['unit_price'], 2) . ' BHD</td>
                    <td width="15%" class="text-right">' . number_format($itemSubtotal, 2) . ' BHD</td>
                    <td width="10%">' . $order['tax_percentage'] . '%</td>
                    <td width="10%" class="text-right">' . number_format($itemTax, 2) . ' BHD</td>
                </tr>';
        }
    
        $html .= '
                </tbody>
            </table>
    
            <div class="spacer"></div>
    
            <table width="100%">
                <tr>
                    <td width="60%"></td>
                    <td width="40%">
                        <table class="summary-table bordered" width="100%">
                            <tr><td width="50%" class="text-right">Subtotal:</td><td width="50%" class="text-right">' . number_format($this->totals['subtotal'], 2) . ' BHD</td></tr>
                            <tr><td width="50%" class="text-right">Shipping Fee:</td><td width="50%" class="text-right">' . number_format($this->totals['shipping_fee'], 2) . ' BHD</td></tr>
                            <tr><td width="50%" class="text-right">Tax:</td><td width="50%" class="text-right">' . number_format($this->totals['tax_amount'], 2) . ' BHD</td></tr>
                            <tr class="highlight">
                                <td width="50%" class="bold text-right">Grand Total:</td>
                                <td width="50%" class="bold text-right">' . number_format($this->totals['grand_total'], 2) . ' BHD</td>
                            </tr>
                        </table>
                    </td>
                </tr>
                <tr>
                    <td colspan="7" class="footer-note">
                        This is a computer-generated invoice. No signature is required. Please retain this document for your records. For any inquiries, contact the address or email provided above. Thank you for your business.
                    </td>
                </tr>
            </table>
        </div>';
    
        return $html;
    }
}

// Initialize database connection
try {
    $connObj = new DBConnection();
    $conn = $connObj->ConnectToMYSQL();
} catch (Exception $e) {
    die('Database connection failed: ' . $e->getMessage());
}

// Generate invoice
try {
    $invoice = new InvoiceGenerator($conn);
    $invoice->generateInvoice();
} catch (Exception $e) {
    die('Error generating invoice: ' . $e->getMessage());
}

// Close connection
$conn->close();
?>