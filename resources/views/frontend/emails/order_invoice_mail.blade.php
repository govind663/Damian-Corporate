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
        /* Global Styles */
        * {
            margin: 0;
            padding: 0;
            box-sizing: border-box;
            font-family: 'Inter', sans-serif;
        }

        body {
            background-color: #f9f9f9;
            color: #333;
            font-size: 14px;
            line-height: 1.6;
        }

        table {
            width: 100%;
            border-spacing: 0;
        }

        td {
            padding: 12px;
            vertical-align: top;
        }

        /* Header Section */
        .logo {
            text-align: center;
            margin-bottom: 20px;
        }

        .logo img {
            width: 200px;
            height: auto;
        }

        h2 {
            font-size: 20px;
            font-weight: 600;
            color: #333;
            margin-bottom: 20px;
            text-decoration: underline;
        }

        /* Invoice Details Section */
        .invoice-details {
            background: #fff;
            border-radius: 8px;
            box-shadow: 0 6px 18px rgba(0, 0, 0, 0.05);
            padding: 30px;
            margin-bottom: 20px;
        }

        .billing-info {
            display: flex;
            justify-content: space-between;
            margin-top: 20px;
        }

        .billing-info div {
            width: 48%;
        }

        .billing-info p {
            margin-bottom: 10px;
        }

        .billing-info p strong {
            color: #333;
        }

        /* Table Styles */
        .order-table {
            width: 100%;
            border-collapse: collapse;
            margin-top: 30px;
        }

        .order-table th,
        .order-table td {
            padding: 12px;
            border: 1px solid #ddd;
            text-align: left;
        }

        .order-table th {
            background-color: #f7f7f7;
            font-weight: bold;
        }

        .order-table td {
            background-color: #fafafa;
        }

        /* Price and Discount */
        .total-price {
            font-size: 18px;
            font-weight: bold;
            color: #333;
            text-align: right;
            margin-top: 20px;
        }

        /* Price and Discount */
        .badge-danger {
            background-color: #e74c3c; /* Danger red color */
            color: white; /* White text color */
            font-size: 12px;
            padding: 2px 8px;
            border-radius: 5px;
        }

        /* Footer */
        .footer {
            text-align: center;
            font-size: 14px;
            color: #888;
            margin-top: 40px;
        }

        .footer a {
            color: #000;
            text-decoration: none;
        }

        /* Responsive Styles */
        @media (max-width: 768px) {
            .billing-info {
                flex-direction: column;
                align-items: flex-start;
            }

            .billing-info div {
                width: 100%;
                margin-bottom: 20px;
            }

            .order-table th, .order-table td {
                padding: 10px;
            }

            .total-price {
                font-size: 16px;
                text-align: left;
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
                                $orderlist = DB::table('orders')
                                            ->where('product_id', $mailData['product']->id)
                                            ->where('citizen_id', $mailData['user']->id)
                                            // ->where('payment_status', '3')
                                            ->get();
                            @endphp

                            <table class="order-table">
                                <thead>
                                    <tr>
                                        <th>Product SKU</th>
                                        <th>Product Name</th>
                                        <th>Quantity</th>
                                        <th>Price</th>
                                        <th>Discount</th>
                                        <th>Total</th>
                                    </tr>
                                </thead>
                                <tbody>
                                    <tr>
                                        <td>{{ $mailData['product']->product_sku }}</td>
                                        <td>{{ $mailData['product']->name }}</td>
                                        <td>{{ $mailData['cart']->quantity }}</td>
                                        <td>₹ {{ number_format($mailData['product']->price, 0) }}</td>
                                        <td><span class="bg badge-danger">{{ $mailData['product']->discount_price_in_percentage }} (%)</span></td>
                                        <td>₹ {{ number_format($mailData['order']->order_total_price, 0) }}</td>
                                    </tr>
                                </tbody>
                            </table>

                            <p class="total-price"><strong>Total Amount:</strong> ₹ {{ number_format($mailData['order']->order_total_price, 0) }}</p>
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
