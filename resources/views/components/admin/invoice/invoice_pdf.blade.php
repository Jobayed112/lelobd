<!DOCTYPE html>
<html lang="en">
<head>
    <meta charset="UTF-8">
    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <title>Invoice PDF</title>
    <style>
        body {
            font-family: Arial, sans-serif;
        }
        .container {
            width: 80%;
            margin: auto;
            padding: 20px;
            border: 1px solid #ddd;
            background: #fff;
        }
        .header {
            text-align: center;
            margin-bottom: 20px;
        }
        .logo {
            width: 100px;
            height: auto;
        }
        table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 10px;
        }
        th, td {
            border: 1px solid #ddd;
            padding: 8px;
            text-align: left;
        }
        th {
            background: #f4f4f4;
        }
        .total {
            text-align: right;
            font-size: 18px;
            font-weight: bold;
            margin-top: 10px;
        }
    </style>
</head>
<body>

<div class="container">
    <!-- Company Name and Logo -->
    <div class="header">
        <img src="{{ public_path('images/logo.png') }}" alt="Lelobd Logo" class="logo">
        <h2>Lelobd.com</h2>
    </div>

    <!-- User Information -->
    <p><strong>Name:</strong> {{ $invoice->user->name }}</p>
    <p><strong>Phone:</strong> {{ $invoice->user->phone }}</p>
    <p><strong>Status:</strong> {{ ucfirst($invoice->status) }}</p>
    <p><strong>Invoice No:</strong> INV-{{ $invoice->invoice_number }}</p>
    <p><strong>Order Date:</strong> {{ $invoice->created_at->format('d M, Y') }}</p>
    <p><strong>Shipping Address:</strong> {{ $invoice->order->shipping_address }}</p>

    <!-- Products Table -->
    <h3>Products</h3>
    <table>
        <thead>
            <tr>
                <th>Product</th>
                <th>Quantity</th>
                <th>Price (BDT)</th>
            </tr>
        </thead>
        <tbody>
            @foreach ($invoice->invoiceProducts as $item)
                <tr>
                    <td>{{ $item->product->name }}</td>
                    <td>{{ $item->qty }}</td>
                    <td>{{ number_format($item->price, 2) }}</td>
                </tr>
            @endforeach
        </tbody>
    </table>

    <!-- Total Amount -->
    <p class="total">Total Amount: BDT {{ number_format($invoice->total_amount, 2) }}</p>
</div>

</body>
</html>
