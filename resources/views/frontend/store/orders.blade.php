@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - My Order
@endsection

@push('styles')
<style>
    .tp-btn-theme.height {
        height: 40px !important;
        line-height: 40px !important;
        padding: 0px 7px 0px 7px !important;
        border-radius: 2px !important;
    }

    @media (max-width: 768px) {
        .myaccount-table table {
            border-collapse: collapse;
        }
        .myaccount-table thead {
            display: none;
        }
        .myaccount-table tbody tr {
            display: block;
            margin-bottom: 10px;
            border: 1px solid #ddd;
        }
        .myaccount-table tbody tr td {
            display: flex;
            justify-content: space-between;
            padding: 10px;
            border: none;
            border-bottom: 1px solid #ddd;
        }
        .myaccount-table tbody tr td:last-child {
            border-bottom: none;
        }
        .myaccount-table tbody tr td:before {
            content: attr(data-label);
            font-weight: bold;
            display: inline-block;
        }
    }

    .pagination-wrapper {
        display: flex;
        justify-content: center;
        margin-top: 20px;
    }

    .pagination {
        list-style: none;
        display: flex;
        gap: 5px;
        padding: 0;
    }

    .pagination li {
        display: inline-block;
    }

    .pagination li a,
    .pagination li span {
        padding: 8px 12px;
        text-decoration: none;
        border: 1px solid #ddd;
        border-radius: 4px;
        color: #007bff;
        transition: background-color 0.3s, color 0.3s;
    }

    .pagination li a:hover,
    .pagination li span:hover {
        background-color: #007bff;
        color: #fff;
    }

    .pagination li.active span {
        background-color: #007bff;
        color: #fff;
        border-color: #007bff;
    }

    .badge-primary {
        background-color: #007bff;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .badge-warning {
        background-color: #ffc107;
        color: #212529;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .badge-info {
        background-color: #17a2b8;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .badge-success {
        background-color: #28a745;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .badge-danger {
        background-color: #dc3545;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    .badge-secondary {
        background-color: #6c757d;
        color: #fff;
        padding: 5px 10px;
        border-radius: 4px;
    }

    @media (min-width: 1400px) {
        .container, .container-lg, .container-md, .container-sm, .container-xl, .container-xxl {
            max-width: 1417px;
        }
    }

</style>
@endpush

@section('content')
    <!-- breadcrumb area start -->
    <div class="bre-sec">
        <div class="container-fluid home-container">
            <div class="row">
                <div class="col-xxl-12">
                    <div class="breadcrumb-content">
                        <div class="breadcrumb__list">
                            <span><a href="{{ route('frontend.home') }}" title="Home">Home</a></span>
                            <span class="dvdr"><i class="fa-solid fa-angle-right"></i></span>
                            <span>My Order</span>
                        </div>
                    </div>
                </div>
            </div>
        </div>
    </div>
    <!-- breadcrumb area end -->

    <!-- My Account Section Start -->
    <section class="my-profile-section">
        <div class="container">
            <div class="row">
                <!-- Tab Menu -->
                <x-frontend.tab-menu />

                <!-- Tab Content -->
                <div class="col-lg-9">
                    <div class="tab-content">
                        <div class="tab-pane fade show active" id="orders" role="tabpanel" aria-labelledby="orders-tab">
                            <div class="order-sec">
                                <div class="myaccount-content">
                                    <h3>My Orders</h3>
                                    <div class="myaccount-table table-responsive text-center">
                                        <table class="table table-bordered">
                                            <thead class="thead-light">
                                                <tr>
                                                    <th>No</th>
                                                    <th>Product Name</th>
                                                    <th>Order Date</th>
                                                    <th>Order Status</th>
                                                    <th>Payment Method</th>
                                                    <th>Payment Status</th>
                                                    <th>Total Amount (₹)</th>
                                                    {{-- <th>Invoice</th> --}}
                                                </tr>
                                            </thead>

                                            <tbody>
                                                @foreach ($orders as $key => $order)
                                                    <tr>
                                                        <td data-label="No">{{ ++$key }}</td>
                                                        <td data-label="Product Name">{{ $order->product->name }}</td>
                                                        <td data-label="Order Date">{{ $order->order_date }}</td>
                                                        <td data-label="Order Status">
                                                            @if ($order->order_status == 1)
                                                                <span class="bg badge-primary">Pending</span>
                                                            @elseif ($order->order_status == 2)
                                                                <span class="bg badge-warning">Processing</span>
                                                            @elseif ($order->order_status == 3)
                                                                <span class="bg badge-info">Shipped</span>
                                                            @elseif ($order->order_status == 4)
                                                                <span class="bg badge-success">Delivered</span>
                                                            @endif
                                                        </td>

                                                        {{-- 1 => Bank Transfer, 2 => Check Payment , 3 => Cash On Delivery, 4 => PayPal --}}
                                                        @php
                                                            $paymentMethod = '';

                                                            if ($order->payment_method == 1) {
                                                                $paymentMethod = 'Bank Transfer';
                                                            } elseif ($order->payment_method == 2) {
                                                                $paymentMethod = 'Check Payment';
                                                            } elseif ($order->payment_method == 3) {
                                                                $paymentMethod = 'Cash On Delivery';
                                                            } elseif ($order->payment_method == 4) {
                                                                $paymentMethod = 'PayPal';
                                                            }
                                                        @endphp
                                                        <td data-label="Payment Method">{{ $paymentMethod }}</td>

                                                        <td data-label="Payment Status">
                                                            @if ($order->payment_status == 1)
                                                                <span class="bg badge-primary">Pending</span>
                                                            @elseif ($order->payment_status == 2)
                                                                <span class="bg badge-warning">Processing</span>
                                                            @elseif ($order->payment_status == 3)
                                                                <span class="bg badge-success">Completed</span>
                                                            @elseif ($order->payment_status == 4)
                                                                <span class="bg badge-danger">Delivered</span>
                                                            @endif
                                                        </td>
                                                        <td data-label="Total">{{ number_format($order->order_total_price, 0) }}</td>
                                                        {{-- <td data-label="Action">
                                                            <a class="tp-btn-theme height pro-btn-sec" href="#" title="View">
                                                                <i class="fa fa-eye"></i>
                                                            </a>
                                                        </td> --}}
                                                    </tr>
                                                @endforeach
                                            </tbody>

                                            <!-- Pagination Links -->
                                            {{-- <div class="pagination-wrapper">
                                                {{ $orders->links() }}
                                            </div> --}}
                                        </table>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- My Account Section End -->
@endsection

@push('scripts')
@endpush
