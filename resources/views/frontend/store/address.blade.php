@extends('frontend.layouts.master')

@section('title')
    Damian Corporate | Store - Orders
@endsection

@push('styles')
<style>
    .tp-btn-theme.height {
        height: 40px !important;
        line-height: 40px !important;
        padding: 0px 7px 0px 7px !important;
        border-radius: 2px !important;
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
                            <span>Orders</span>
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
                        <div class="tab-pane fade show active" id="address-edit" role="tabpanel" aria-labelledby="address-tab">
                            <div class="row">
                                <div class="col-lg-6">
                                    <div class="myaccount-content">
                                        <div class="billing-address">
                                            <h3>Billing Address</h3>
                                            <address>
                                                <p>
                                                    {{ Auth::guard('citizen')->user()->billing_address ?? '' }}
                                                </p>
                                            </address>

                                            <div class="address-button-sec">
                                                <!-- Edit Button -->
                                                <button class="tp-btn-border height" data-bs-toggle="modal" data-bs-target="#editBillingAddressModal">
                                                    <span>Edit</span>
                                                </button>
                                                <!-- Delete Button -->
                                                {{-- <button class="tp-btn-border height">
                                                    <span>Delete</span>
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                                <div class="col-lg-6">
                                    <div class="myaccount-content">
                                        <div class="shipping-address">
                                            <h3>Shipping Address</h3>
                                            <address>
                                                <p>
                                                    {{ Auth::guard('citizen')->user()->shipping_address ?? '' }}
                                                </p>
                                            </address>

                                            <div class="address-button-sec">
                                                <button class="tp-btn-border height" data-bs-toggle="modal" data-bs-target="#editShippingAddressModal">
                                                    <span>Edit</span>
                                                </button>
                                                {{-- <button class="tp-btn-border height">
                                                    <span>Delete</span>
                                                </button> --}}
                                            </div>
                                        </div>
                                    </div>
                                </div>
                            </div>
                        </div>
                    </div>
                </div>
            </div>
        </section>
    <!-- My Account Section End -->

    <!-- Modal Structure Start For Edit Billing Address -->
    <div class="modal fade" id="editBillingAddressModal" tabindex="-1" aria-labelledby="editBillingAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-2xl" id="editBillingAddressModalLabel">
                        Edit Billing Address
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editBillingAddressForm" action="{{ route('frontend.updateBillingAddress', Auth::guard('citizen')->user()->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="citizen_id" id="citizen_id" value="{{ Auth::guard('citizen')->user()->id }}">

                        <!-- Address with Summernote -->
                        <div class="mb-3">
                            <textarea class="form-control" id="billing_address" name="billing_address" required value="{{ old('billing_address') }}" >{{ old('billing_address') ? old('billing_address') : Auth::guard('citizen')->user()->billing_address }}</textarea>
                        </div>

                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
    <!-- Modal Structure End For Edit Billing Address -->

    <!-- Modal Structure Start For Edit Shipping Address -->
    <div class="modal fade" id="editShippingAddressModal" tabindex="-1" aria-labelledby="editShippingAddressModalLabel" aria-hidden="true">
        <div class="modal-dialog modal-lg">
            <div class="modal-content">
                <div class="modal-header">
                    <h5 class="modal-title text-dark text-2xl" id="editShippingAddressModalLabel">
                        Edit Shipping Address
                    </h5>
                    <button type="button" class="btn-close" data-bs-dismiss="modal" aria-label="Close"></button>
                </div>
                <div class="modal-body">
                    <form id="editShippingAddressForm" action="{{ route('frontend.updateShippingAddress', Auth::guard('citizen')->user()->id) }}" method="POST" class="form-horizontal" enctype="multipart/form-data">
                        @csrf

                        <input type="hidden" name="citizen_id" id="citizen_id" value="{{ Auth::guard('citizen')->user()->id }}">

                        <!-- Address with Summernote -->
                        <div class="mb-3">
                            <textarea class="form-control" id="shipping_address" name="shipping_address" required value="{{ old('shipping_address') }}" >{{ old('shipping_address') ? old('shipping_address') : Auth::guard('citizen')->user()->shipping_address }}</textarea>
                        </div>
                        <button type="submit" class="btn btn-primary">Save Changes</button>
                    </form>
                </div>
            </div>
        </div>
    </div>
@endsection

@push('scripts')
@endpush
