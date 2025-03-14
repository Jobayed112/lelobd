<div class="container">
    <div class="invoice-card">
        <!-- Company Name and Logo -->
        <div class="header">
            <img src="{{ asset('images/logo.png') }}" alt="Lelobd Logo" class="logo">
            <h1 class="company-name">Lelobd.com</h1>
        </div>

        <!-- Invoice Info Section -->
        <div class="invoice-info">
            <!-- Left Section (User info and status) -->
            <div class="user-info">
                <p><strong>Name:</strong> {{ $invoice->user->name }}</p>
                <p><strong>Phone:</strong> {{ $invoice->user->phone }}</p>
                <p><strong>Status:</strong> <span class="status">{{ ucfirst($invoice->status) }}</span></p>
            </div>

            <!-- Right Section (Invoice Number, Order ID, Order Date, Shipping Address) -->
            <div class="order-info">
                <p><strong>Invoice: INV-</strong> {{ $invoice->invoice_number }}</p>
                <p><strong>Order ID:</strong>
                    @if ($invoice->order->id)
                        {{ $invoice->order->id }}
                    @else
                        <span class="no-order">No order associated</span>
                    @endif
                </p>
                <p><strong>Order Date:</strong> {{ $invoice->created_at->format('d M, Y') }}</p>
                <p><strong>Shipping Address:</strong> {{ $invoice->order->shipping_address }}</p>
            </div>
        </div>

        <!-- Products Section -->
        <h3 class="section-title">Products</h3>

        <!-- Products Table -->
        <table class="product-table">
            <thead>
                <tr class="table-header">
                    <th>Product</th>
                    <th>Quantity</th>
                    <th>Price</th>
                </tr>
            </thead>
            <tbody>
                @foreach ($invoice->invoiceProducts as $item)
                    <tr>
                        <td>{{ $item->product->name }}</td>
                        <td>{{ $item->qty }}</td>
                        @php
                            $total= $item->price * $item->qty;

                        @endphp
                        <td>BDT {{ number_format($total, 2) }}</td>
                    </tr>
                @endforeach
            </tbody>
        </table>

        <!-- Total Amount -->
        <h2 class="total-amount">Total Amount: BDT {{ number_format($invoice->total_amount, 2) }}</h2>

    </div>

    <!-- Company Signature Section item center / text aling center -->
    <div class="signature">
        <p class="border"></p>
        <p>Authorized Signature</p>
    </div>

</div>

<!-- style.css -->

<style>
 @page {
    size: A4;
    margin-top: auto;
    margin-bottom: auto;
    margin-left: 5mm;
    margin-right: 5mm;
    padding-top: 8mm;
}

body {
    font-family: Arial, sans-serif;
    font-size: 14px;
    margin: 0;
    padding: 0;
}

.container {
    width: 100%;
    padding: 1rem;
    margin: 0 auto;
}

.invoice-card {
    background-color: #ffffff;
    box-shadow: 0 4px 6px rgba(0, 0, 0, 0.1);
    border-radius: 8px;
    padding: 1rem;
}

.header {
    text-align: center;
}

.logo {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}

.company-name {
    font-size: 24px;
    color: #4f46e5;
    font-weight: bold;
}

.invoice-info {
    display: grid;
    grid-template-columns: 1fr 1fr; /* Two equal columns */
    gap: 10px; /* Adds spacing between the columns */
    margin-top: 10px;
}

.user-info {
    width: 100%;
    text-align: left;
}

.order-info {
    width: 100%;
    text-align: right;
}

.user-info p, .order-info p {
    margin: 0; /* Remove default margin */
}

.status {
    color: #38a169;
}

.no-order {
    color: #f56565;
}

.section-title {
    font-size: 18px;
    font-weight: bold;
    margin-top: 30px;
    margin-bottom: 10px;
}

.product-table {
    width: 100%;
    border-collapse: collapse;
    margin-top: 10px;
}

.product-table th, .product-table td {
    padding: 8px;
    text-align: left;
    border: 1px solid #ddd;
}

.table-header {
    background-color: #edf2f7;
}

.total-amount {
    font-size: 16px;
    font-weight: bold;
    text-align: right;
    margin-top: 20px;
    padding-right: 20px;
}

.signature {
    text-align: center;
    margin-top: 50px;
}


.signature-img {
    width: 80px;
    height: 80px;
    margin-bottom: 10px;
}


.signature .border {
    display: inline-block; /* Keep the border inline with the text */
    width: 150px; /* Adjust the width of the line */
    border-bottom: 1px dashed; /* Border line */
    margin-bottom: 10px;
}

.signature p {
    margin: 0; /* Remove default margin */
    font-size: 14px;
    font-weight: bold;
}


.download-btn-container {
    text-align: center;
    margin-top: 30px;
}

.download-btn {
    padding: 10px 20px;
    background-color: #38a169;
    color: #ffffff;
    border-radius: 8px;
    text-decoration: none;
    font-weight: bold;
    transition: background-color 0.3s ease;
}

.download-btn:hover {
    background-color: #2f855a;
}


h1, h2, h3, h4, h5, h6 {
    margin: 0;
    padding: 0;
    color: #333;
    font-weight: bold;
}

/* Style for horizontal rule (hr) */
hr {
    border: 1px solid #ddd;
    margin: 20px 0;
}

/* Style for all paragraphs */
p {
    margin: 10px 0;
    line-height: 1.5;
}

/* Style for all table rows (tr) */
tr {
    background-color: #ffffff;
    transition: background-color 0.3s ease;
}

/* Hover effect on table rows */
tr:hover {
    background-color: #f1f1f1;
}

/* Style for table header cells */
th {
    background-color: #edf2f7;
    font-weight: bold;
    padding: 10px;
    text-align: left;
}

/* Style for table data cells */
td {
    padding: 10px;
    border-top: 1px solid #ddd;
}

/* General styling for inline elements */
strong {
    font-weight: bold;
}

span {
    display: inline-block;
}

/* Responsive Styles */
@media (max-width: 768px) {
    .invoice-info {
        grid-template-columns: 1fr; /* Stack columns on top of each other */
        text-align: left;
    }

    .order-info {
        text-align: left; /* Align order info to the left on smaller screens */
    }

    .header {
        text-align: center;
    }

    .logo {
        width: 60px;
        height: 60px;
        margin-bottom: 8px;
    }

    .company-name {
        font-size: 20px; /* Make the company name smaller */
    }

    .product-table th, .product-table td {
        padding: 6px; /* Reduce padding in table cells */
    }

    .total-amount {
        font-size: 14px; /* Make the total amount text smaller */
        padding-right: 10px;
    }

    .signature-img {
        width: 70px;
        height: 70px;
    }

    .download-btn {
        font-size: 14px; /* Make the download button text smaller */
        padding: 8px 16px;
    }
}

@media (max-width: 480px) {
    .invoice-info {
        grid-template-columns: 1fr; /* Stack columns on top of each other for very small screens */
    }

    .product-table {
        font-size: 12px; /* Reduce the font size for product table */
    }

    .logo {
        width: 50px;
        height: 50px;
    }

    .company-name {
        font-size: 18px; /* Make the company name smaller */
    }

    .total-amount {
        font-size: 14px;
    }

    .download-btn {
        font-size: 12px; /* Make the button smaller */
        padding: 6px 12px;
    }
}


</style>
