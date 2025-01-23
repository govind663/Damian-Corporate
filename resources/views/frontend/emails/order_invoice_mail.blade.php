<!doctype html>
<html lang="en-US">

<head>
    <meta charset="utf-8">
    <meta http-equiv="X-UA-Compatible" content="IE=edge">
    <meta http-equiv="Content-Type" content="text/html; charset=UTF-8">

    <!-- Google Fonts -->
    <link href="https://fonts.googleapis.com/css2?family=Inter:wght@300;400;500;600;700;800&display=swap" rel="stylesheet">

    <!-- Font Awesome (for icons) -->
    <link rel="stylesheet" href="https://cdnjs.cloudflare.com/ajax/libs/font-awesome/6.0.0-beta2/css/all.min.css" integrity="sha512-YWzhKL2whUzgiheMoBFwW8CKV4qpHQAEuvilg9FAn5VJUDwKZZxkJNuGM4XkWuk94WCrrwslk8yWNGmY1EduTA==" crossorigin="anonymous" referrerpolicy="no-referrer" />

    <meta name="viewport" content="width=device-width, initial-scale=1.0">
    <meta name="csrf-token" content="{{ csrf_token() }}">

    <title>Invoice for Order #{{ $mailData['order']->transaction_token }} - Damian Corporate</title>

    <style type="text/css">
        /* Reset and Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f3f4f6;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        td {
            padding: 15px;
            vertical-align: top;
        }

        a {
            text-decoration: none;
            color: #4a90e2;
        }

        /* Logo Section */
        .logo img {
            width: 180px;
            margin: 0 auto;
            display: block;
        }

        /* Invoice Wrapper */
        .invoice-container {
            max-width: 700px;
            margin: 40px auto;
            background-color: #ffffff;
            border-radius: 10px;
            box-shadow: 0 4px 12px rgba(0, 0, 0, 0.1);
            overflow: hidden;
        }

        .invoice-header {
            background-color: #121315;
            color: #ffffff;
            text-align: center;
            padding: 20px;
        }

        .invoice-header h2 {
            font-size: 22px;
            font-weight: 700;
            margin-bottom: 5px;
        }

        .invoice-header p {
            font-size: 14px;
            margin-top: 5px;
        }

        .invoice-details {
            padding: 30px;
        }

        /* Billing Info Section */
        .billing-info {
            display: flex;
            justify-content: space-between;
            flex-wrap: wrap;
            margin-bottom: 30px;
        }

        .billing-info div {
            width: 48%;
        }

        .billing-info div p {
            margin-bottom: 8px;
            color: #666;
        }

        .billing-info strong {
            font-weight: 600;
            color: #333;
        }

        /* Order Table */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 20px;
        }

        .order-table thead th {
            background-color: #f3f4f6;
            color: #333;
            font-weight: 700;
            text-align: left;
            padding: 12px;
            border-bottom: 2px solid #e5e7eb;
        }

        .order-table tbody td {
            padding: 10px;
            border-bottom: 1px solid #e5e7eb;
            color: #555;
        }

        .order-table tbody tr:hover {
            background-color: #f9fafb;
        }

        .order-table .badge-danger {
            display: inline-block;
            background-color: #e74c3c;
            color: white;
            font-size: 12px;
            padding: 3px 6px;
            border-radius: 4px;
            font-weight: 500;
        }

        /* Grand Total */
        .order-table tfoot td {
            font-weight: 700;
            color: #333;
            text-align: right;
            padding: 15px;
        }

        .total-price {
            font-size: 18px;
            font-weight: 700;
            color: #333638;
            text-align: right;
            margin-top: 20px;
        }

        /* Footer Section */
        .footer {
            background-color: #f3f4f6;
            text-align: center;
            padding: 15px;
            color: #666;
            font-size: 14px;
        }

        .footer a {
            color: #5885b9;
            font-weight: 600;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .billing-info {
                flex-direction: column;
            }

            .billing-info div {
                width: 100%;
                margin-bottom: 15px;
            }

            .order-table th,
            .order-table td {
                padding: 10px;
                font-size: 12px;
            }

            .total-price {
                font-size: 15px;
            }
        }
    </style>

</head>

<body>
    <!-- Main Wrapper -->
    <table cellspacing="0" cellpadding="0" bgcolor="#f9f9f9">
        <tr>
            <td>
                <table style="max-width: 700px; margin: 0 auto; background-color: #fff; border-radius: 8px; padding: 20px;">
                    <tr>
                        <td class="logo">
                            <img src="https://mbihosting.in/damiancorporate/demo1/assets/img/logo/damian-logo.png" alt="Damian Corporate" title="Damian Corporate">
                        </td>
                    </tr>

                    <tr>
                        <td class="invoice-details">
                            {{-- <h2>Invoice No : {{ $mailData['order']->transaction_token }}</h2> --}}

                            <div class="billing-info">
                                <div class="col-md-6 col-sm-6 col-xs-12 float-left text-justify">
                                    <p><strong>Name : - </strong> {{ $mailData['user']->f_name }} {{ $mailData['user']->l_name }}</p>
                                    <p><strong>Email : - </strong> {{ $mailData['user']->email }}</p>
                                    <p><strong>Phone : - </strong> {{ $mailData['user']->phone }}</p>
                                    @php
                                        $stateName = DB::table('states')->where('id', $mailData['billingAddress']['state'])->first('state_name');
                                    @endphp

                                    <p><strong>City : - </strong> {{ $mailData['billingAddress']['city'] }}</p>
                                    <p><strong>State : - </strong> {{ $stateName->state_name }}</p>
                                    <p><strong>Pincode : - </strong> {{ $mailData['billingAddress']['postcode'] }}</p>
                                    <p><strong>Country : - </strong> {{ $mailData['billingAddress']['country'] }}</p>
                                </div>
                                <div class="col-md-6 col-sm-6 col-xs-12 float-left text-justify">
                                    <p><strong>Order No : - </strong> {{ $mailData['order']->transaction_token }}</p>
                                    <p><strong>Order Date : - </strong> {{ $mailData['order']->order_date }}</p>
                                    <p>
                                        <strong>Shipping Address : - </strong>
                                        {{ $mailData['billingAddress']['address'] }} @if($mailData['billingAddress']['apartment_address']), {{ $mailData['billingAddress']['apartment_address'] }} @endif
                                    </p>
                                </div>
                            </div>

                            @php
                                $cartItems = DB::table('carts')
                                                ->select('carts.*', 'products.name', 'products.price', 'products.discount_price_in_percentage', 'products.product_sku')
                                                ->leftJoin('products', 'carts.product_id', '=', 'products.id')
                                                ->where('transaction_token', $mailData['order']->transaction_token)
                                                ->where('citizen_id', $mailData['user']->id)
                                                ->get();

                                $grandTotal = 0; // Initialize grand total for all products
                            @endphp

                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th>Product SKU</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price (RS)</th>
                                        <th>Discount</th>
                                        <th>Total (RS)</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    @foreach($cartItems as $cartItem)
                                        @php
                                            $total = $cartItem->price * $cartItem->quantity; // Total for this product
                                            $discountedTotal = $total - ($total * $cartItem->discount_price_in_percentage / 100); // Apply discount
                                            $grandTotal += $discountedTotal; // Add to grand total
                                        @endphp
                                        <tr>
                                            <td>{{ $cartItem->product_sku ?? '' }}</td>
                                            <td>{{ $cartItem->name ?? '' }}</td>
                                            <td>{{ $cartItem->quantity ?? '' }}</td>
                                            <td>{{ number_format($cartItem->price, 2) }}</td>
                                            <td><span class="bg badge-danger">{{ $cartItem->discount_price_in_percentage ?? '' }}%</span></td>
                                            <td>{{ number_format($discountedTotal, 2) }}</td>
                                        </tr>
                                    @endforeach
                                </tbody>
                                <tfoot>
                                    <tr>
                                        <td colspan="5" style="text-align: right;"><strong>Grand Total:</strong></td>
                                        <td><strong>RS {{ number_format($grandTotal, 2) }}</strong></td>
                                    </tr>
                                </tfoot>
                            </table>

                            <p class="total-price">
                                <strong>Total Amount:</strong>Rs {{ number_format($grandTotal, 0) }}
                            </p>
                        </td>
                    </tr>

                    <tr>
                        <td class="footer">
                            <p>&copy; {{ date('Y') }} <strong><a href="{{ route('frontend.home') }}" target="_blank">Damian Corporate</a></strong>. All rights reserved.</p>
                        </td>
                    </tr>
                </table>
            </td>
        </tr>
    </table>
</body>

</html>
