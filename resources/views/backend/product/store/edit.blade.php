@extends('backend.layouts.master')

@section('title')
Damian Corporate | Edit Product
@endsection

@push('styles')
<style>
    .table-bordered, .table-bordered td, .table-bordered th {
        border: 1px solid #0924b9;
    }
</style>
@endpush

@section('content')
<div class="pd-ltr-20 xs-pd-20-10">
    <div class="min-height-200px">
        <div class="page-header">
            <div class="row">
                <div class="col-md-6 col-sm-12">
                    <div class="title">
                        <h4>Edit Product</h4>
                    </div>
                    <nav aria-label="breadcrumb" role="navigation">
                        <ol class="breadcrumb">
                            <li class="breadcrumb-item">
                                <a href="{{ route('admin.dashboard') }}">Home</a>
                            </li>
                            <li class="breadcrumb-item">
                                <a href="{{ route('product.index') }}">Manage Product</a>
                            </li>
                            <li class="breadcrumb-item active" aria-current="page">
                                Edit Product
                            </li>
                        </ol>
                    </nav>
                </div>

            </div>
        </div>


        <form method="POST" action="{{ route('product.update', $product->id) }}" class="form-horizontal" enctype="multipart/form-data" id="product-form') }}" class="form-horizontal">
            @csrf
            @method('PATCH')

            <input type="text" id="id" name="id" hidden  value="{{ $product->id }}">

            <div class="pd-20 card-box mb-30">

                <h5 class="text-justify text-primary">Product Details :</h5>
                <hr>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Name : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="name" id="name" class="form-control @error('name') is-invalid @enderror" value="{{ $product->name }}" placeholder="Enter Product Name.">
                        @error('name')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Product Slug : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="slug" id="slug" readonly class="form-control @error('slug') is-invalid @enderror" value="{{ $product->slug }}" placeholder="Enter Product Slug.">
                        @error('slug')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Category : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="product_category_id" id="product_category_id" class="custom-select2 form-control @error('product_category_id') is-invalid @enderror">
                            <option value="">Select Product Category</option>
                            @foreach ($productCategories as $productCategory)
                                <option value="{{ $productCategory->id }}" {{ $product->product_category_id == $productCategory->id ? 'selected' : '' }}>{{ $productCategory->name }}</option>
                            @endforeach
                        </select>
                        @error('product_category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Product Sub Category : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="product_sub_category_id" id="product_sub_category_id" class="custom-select2 form-control @error('product_sub_category_id') is-invalid @enderror">
                            <option value="">Select Product Sub Category</option>
                            @foreach ($productSubCategories as $productSubCategory)
                                <option value="{{ $productSubCategory->id }}" {{ $product->product_sub_category_id == $productSubCategory->id ? 'selected' : '' }}>{{ $productSubCategory->name }}</option>
                            @endforeach
                        </select>
                        @error('product_sub_category_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Color : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="product_colors_id" id="product_colors_id" class="custom-select2 form-control @error('product_colors_id') is-invalid @enderror">
                            <option value="">Select Product Color</option>
                            @foreach ($colors as $color)
                                <option value="{{ $color->id }}" {{ $product->product_colors_id == $color->id ? 'selected' : '' }}>{{ $color->name }}</option>
                            @endforeach
                        </select>
                        @error('product_colors_id')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Status : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="status" id="status" class="custom-select2 form-control @error('status') is-invalid @enderror">
                            <option value=" " >Select Status</option>
                            <optgroup label="Status">
                                <option value="1" {{ $product->status == '1' ? 'selected' : '' }}>Active</option>
                                <option value="2" {{ $product->status == '2' ? 'selected' : '' }}>Inactive</option>
                            </optgroup>
                        </select>
                        @error('status')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Product Type : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="product_type" id="product_type" class="custom-select2 form-control @error('product_type') is-invalid @enderror">
                            <option value=" " >Select Product Type</option>
                            <optgroup label="Product Type">
                                <option value="1" {{ $product->product_type == '1' ? 'selected' : '' }}>New</option>
                                <option value="2" {{ $product->product_type == '2' ? 'selected' : '' }}>Sale</option>
                                <option value="3" {{ $product->product_type == '3' ? 'selected' : '' }}>Best Seller</option>
                                <option value="4" {{ $product->product_type == '4' ? 'selected' : '' }}>Featured</option>
                            </optgroup>
                        </select>
                        @error('product_type')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-3"><b>Upload Project Image : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-9 col-md-9">
                        <input type="file" onchange="agentPreviewFile()" accept=".png, .jpg, .jpeg, .webp" name="project_image" id="project_image" class="form-control @error('project_image') is-invalid @enderror" value="{{ $product->image }}" placeholder="Upload Project Image.">
                        <small class="text-secondary"><b>Note : The file size  should be less than 2MB .</b></small>
                        <br>
                        <small class="text-secondary"><b>Note : Only files in .jpg, .jpeg, .png, .webp format can be uploaded .</b></small>
                        <br>
                        @error('project_image')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                        <br>
                        <div id="preview-image-container">
                            <div id="file-preview-image"></div>
                        </div>
                        @if(!empty($product->image))
                            <img src="{{ asset('/damian_corporate/product/project_image/' . $product->image) }}" style="width: 60%; height: 50%;">
                        @endif
                    </div>

                    <label class="col-sm-3"><strong>Product Description :  <span class="text-danger">*</span></strong></label>
                    <div class="col-sm-9 col-md-9">
                        <textarea id="description" name="description" class="textarea_editor form-control border-radius-0 @error('description') is-invalid @enderror" placeholder="Enter Product Description ..." value="{{ $product->description }}">{{ $product->description }}</textarea>
                        @error('description')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <h5 class="text-justify text-primary">Product Price Details :</h5>
                <hr>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Price : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="price" id="price"
                               class="form-control @error('price') is-invalid @enderror"
                               value="{{ old('price', $product->price) }}" placeholder="Enter Price.">
                        @error('price')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Discount Type : <span class="text-danger">*</span></b></label>
                    <div class="col-sm-4 col-md-4">
                        <select name="discount_type" id="discount_type"
                                class="custom-select2 form-control @error('discount_type') is-invalid @enderror">
                            <option value="">Select Discount Type</option>
                            <optgroup label="Discount Type">
                                {{-- <option value="11" {{ old('discount_type', $product->discount_type) == '11' ? 'selected' : '' }}>Fixed</option> --}}
                                <option value="12" {{ old('discount_type', $product->discount_type) == '12' ? 'selected' : '' }}>Percentage</option>
                            </optgroup>
                        </select>
                        @error('discount_type')
                        <span class="invalid-feedback" role="alert">
                            <strong>{{ $message }}</strong>
                        </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3 11 box" style="display: none;">
                    <label class="col-sm-2"><b>Price in (Rs) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="discount_price_in_amount" id="discount_price_in_amount"
                               class="form-control"
                               value="{{ old('discount_price_in_amount', $product->discount_price_in_amount) }}"
                               placeholder="Enter Price in (Rs).">
                    </div>

                    <label class="col-sm-2"><b>After Discount in (Rs) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="discount_price_after_ammount" id="discount_price_after_ammount"
                               class="form-control"
                               value="{{ old('discount_price_after_ammount', $product->discount_price_after_ammount) }}"
                               readonly>
                        <small class="text-secondary">
                            <b>
                                Note : This field will be auto calculated after discount.
                            </b>
                        </small>
                    </div>
                </div>

                <div class="form-group row mt-3 12 box" style="display: none;">
                    <label class="col-sm-2"><b>Price in (%) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="discount_price_in_percentage" id="discount_price_in_percentage"
                               class="form-control"
                               value="{{ old('discount_price_in_percentage', $product->discount_price_in_percentage) }}"
                               placeholder="Enter Product Price in (%).">
                    </div>

                    <label class="col-sm-2"><b>After Discount in (%) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="discount_price_after_percentage" id="discount_price_after_percentage"
                               class="form-control"
                               value="{{ old('discount_price_after_percentage', $product->discount_price_after_percentage) }}"
                               readonly>
                        <small class="text-secondary">
                            <b>
                                Note : This field will be auto calculated after discount.
                            </b>
                        </small>
                    </div>
                </div>


                <h5 class="text-justify text-primary">Product Dimensions Details :</h5>
                <hr>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Length (cm) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="depth" id="depth" class="form-control @error('depth') is-invalid @enderror" value="{{ $product->depth }}" placeholder="Enter Length (cm).">
                        @error('depth')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Width / Depth (cm) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="width" id="width" class="form-control @error('width') is-invalid @enderror" value="{{ $product->width }}" placeholder="Enter Width / Depth (cm).">
                        @error('width')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <div class="form-group row mt-3">
                    <label class="col-sm-2"><b>Height (cm) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="height" id="height" class="form-control @error('height') is-invalid @enderror" value="{{ $product->height }}" placeholder="Enter Height (cm).">
                        @error('height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>

                    <label class="col-sm-2"><b>Seat Heigh (cm) : </b></label>
                    <div class="col-sm-4 col-md-4">
                        <input type="text" name="seat_height" id="seat_height" class="form-control @error('seat_height') is-invalid @enderror" value="{{ $product->seat_height }}" placeholder="Enter Seat Height (cm).">
                        @error('seat_height')
                            <span class="invalid-feedback" role="alert">
                                <strong>{{ $message }}</strong>
                            </span>
                        @enderror
                    </div>
                </div>

                <h5 class="text-justify text-primary">Other Product Image :</h5>
                <hr>

                <table class="table table-bordered p-3" id="dynamicBannerImageTable">
                    <thead>
                        <tr>
                            <th>Product Image : <span class="text-danger">*</span></th>
                            <th>Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @if(!empty($product->product_other_images))
                            @foreach($product->product_other_images as $key => $image)
                                <tr id="banner-image-row-{{ $key }}">
                                    <td width="85%">
                                        <div class="row d-flex col-sm-8 col-md-8">
                                            @if(!empty($image))
                                                <img src="{{ asset('/damian_corporate/product/product_other_images/' . $image) }}" alt="{{ $image }}" class="img-thumbnail" style="max-width: 150px; max-height: 150px;">
                                            @endif
                                            <div id="banner-container-{{ $key }}">
                                                <div id="file-banner-{{ $key }}"></div>
                                            </div>
                                            <input type="file" onchange="bannerPreviewFiles({{ $key }})" accept=".png, .jpg, .jpeg, .webp" name="product_other_images[]" id="product_other_images_{{ $key }}" class="form-control mt-2 @error('product_other_images.*') is-invalid @enderror" value="{{ $image }}">
                                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                            <br>
                                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                            @error('product_other_images.*')
                                                <span class="invalid-feedback" role="alert">
                                                    <strong>{{ $message }}</strong>
                                                </span>
                                            @enderror
                                        </div>
                                    </td>
                                    <td width="15%">
                                        @if($loop->first)
                                            <button type="button" class="btn btn-primary" id="addBannerImageRow">Add More</button>
                                        @else
                                            <button type="button" class="btn btn-danger removeBannerImageRow" data-row-id="{{ $key }}">Remove</button>
                                        @endif
                                    </td>
                                </tr>
                            @endforeach
                        @else
                            <tr id="banner-image-row-0">
                                <td>
                                    <input type="file" onchange="bannerPreviewFiles(0)" accept=".png, .jpg, .jpeg, .webp" name="product_other_images[]" id="product_other_images_0" class="form-control @error('product_other_images.*') is-invalid @enderror">
                                    <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                                    <br>
                                    <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png, .webp format can be uploaded.</b></small>
                                    @error('product_other_images.0')
                                        <span class="invalid-feedback" role="alert">
                                            <strong>{{ $message }}</strong>
                                        </span>
                                    @enderror
                                </td>
                                <td>
                                    <button type="button" class="btn btn-primary" id="addBannerImageRow">Add More</button>
                                </td>
                            </tr>
                        @endif
                    </tbody>
                </table>

                <div class="form-group row mt-4">
                    <label class="col-md-3"></label>
                    <div class="col-md-9" style="display: flex; justify-content: flex-end;">
                        <a href="{{ route('product.index') }}" class="btn btn-danger">Cancel</a>&nbsp;&nbsp;
                        <button type="submit" class="btn btn-success">Submit</button>
                    </div>
                </div>

            </div>

        </form>

    </div>

    <!-- Footer Start -->
    <x-backend.footer />
    <!-- Footer Start -->
</div>
@endsection

@push('scripts')
{{-- Image/PDF preview --}}
<script>
    // Existing function for agent image/PDF preview (if needed)
    function agentPreviewFile() {
        const fileInput = document.getElementById('project_image');
        const previewContainer = document.getElementById('preview-image-container');
        const filePreview = document.getElementById('file-preview-image');
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];
            const validPdfTypes = ['application/pdf'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function(e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" style="height: 50%; width: 100%;">`;
                };
                reader.readAsDataURL(file);
            } else if (validPdfTypes.includes(fileType)) {
                // PDF preview using an embed element
                filePreview.innerHTML =
                    `<embed src="${URL.createObjectURL(file)}" type="application/pdf" width="100%" height="150px" />`;
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p>Unsupported file type</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>

{{-- Slug --}}
<script>
    document.getElementById('name').addEventListener('input', function () {
        const projectName = this.value;
        const slug = projectName
            .toLowerCase()
            .replace(/[^a-z0-9\s-]/g, '') // Remove invalid characters
            .trim()                       // Remove whitespace from both sides
            .replace(/\s+/g, '-');        // Replace spaces with dashes
        document.getElementById('slug').value = slug;
    });
</script>

{{-- Product Discount --}}
<script>
    $(document).ready(function () {
        // Function to handle display logic
        function handleFieldDisplay() {
            let discountType = $("#discount_type").val();
            let priceValue = $("#price").val().trim();

            // Check if both fields have valid values
            if (priceValue && discountType) {
                $(".box").not("." + discountType).hide(); // Hide other divs
                $("." + discountType).show(); // Show the relevant div
            } else {
                $(".box").hide(); // Hide all divs if conditions are not met
            }

            // Perform calculation based on Discount Type
            performCalculations(discountType, priceValue);
        }

        // Function to calculate the discount based on input values
        function performCalculations(discountType, priceValue) {
            priceValue = parseFloat(priceValue) || 0;

            if (discountType === "11") { // Fixed discount type
                let discountAmount = parseFloat($("#discount_price_in_amount").val()) || 0;
                let discountedPrice = priceValue - discountAmount;

                // Update the Fixed Discount result field
                $("#discount_price_after_ammount").val(discountedPrice > 0 ? discountedPrice.toFixed(2) : 0);
            } else if (discountType === "12") { // Percentage discount type
                let discountPercentage = parseFloat($("#discount_price_in_percentage").val()) || 0;
                let discountAmount = (priceValue * discountPercentage / 100);  // Calculate the discount amount
                let discountedPrice = priceValue - discountAmount;

                // Update the Percentage Discount result field
                $("#discount_price_after_percentage").val(discountedPrice > 0 ? discountedPrice.toFixed(2) : 0);
            }
        }

        // Event listener for Discount Type change
        $("#discount_type").change(function () {
            handleFieldDisplay();
        });

        // Event listener for Price keyup
        $("#price").on("keyup", function () {
            handleFieldDisplay();
        });

        // Event listener for Fixed discount amount keyup
        $("#discount_price_in_amount").on("keyup", function () {
            let discountType = $("#discount_type").val();
            let priceValue = $("#price").val().trim();
            performCalculations(discountType, priceValue);
        });

        // Event listener for Percentage discount keyup
        $("#discount_price_in_percentage").on("keyup", function () {
            let discountType = $("#discount_type").val();
            let priceValue = $("#price").val().trim();
            performCalculations(discountType, priceValue);
        });

        // Initial display logic on page load
        handleFieldDisplay();
    });
</script>

{{-- Add More Banner Image or View both Image and PDF --}}
<script>
    $(document).ready(function () {
        let rowId = $('#dynamicBannerImageTable tbody tr').length - 1;

        // Add a new row for banner image
        $('#addBannerImageRow').click(function () {
            rowId++;
            const newRow = `
                <tr>
                    <td>
                        <div class="col-sm-12 col-md-12">
                            <div id="banner-container-${rowId}">
                                <div id="file-banner-${rowId}"></div>
                            </div>
                            <input type="file" onchange="bannerPreviewFiles(${rowId})" accept=".png, .jpg, .jpeg, .webp" name="product_other_images[]" id="product_other_images_${rowId}" class="form-control @error('product_other_images.*') is-invalid @enderror" value="{{ old('product_other_images.${rowId}') }}">
                            <small class="text-secondary"><b>Note: The file size should be less than 2MB.</b></small>
                            <br>
                            <small class="text-secondary"><b>Note: Only files in .jpg, .jpeg, .png,.webp format can be uploaded.</b></small>
                        </div>
                    </td>
                    <td>
                        <button type="button" class="btn btn-danger removeBannerImageRow">Remove</button>
                    </td>
                </tr>`;
            $('#dynamicBannerImageTable tbody').append(newRow);
        });

        // Remove a row
        $(document).on('click', '.removeBannerImageRow', function () {
            $(this).closest('tr').remove();
        });
    });

    // Function for banner image preview
    function bannerPreviewFiles(rowId) {
        const fileInput = document.getElementById(`product_other_images_${rowId}`);
        const previewContainer = document.getElementById(`banner-container-${rowId}`);
        const filePreview = document.getElementById(`file-banner-${rowId}`);
        const file = fileInput.files[0];

        if (file) {
            const fileType = file.type;
            const validImageTypes = ['image/jpeg', 'image/jpg', 'image/png', 'image/webp'];

            if (validImageTypes.includes(fileType)) {
                // Image preview
                const reader = new FileReader();
                reader.onload = function (e) {
                    filePreview.innerHTML = `<img src="${e.target.result}" alt="File Preview" class="img-thumbnail" style="width:150px; height:150px;">`;
                };
                reader.readAsDataURL(file);
            } else {
                // Unsupported file type
                filePreview.innerHTML = '<p class="text-danger">Unsupported file type. Please upload .jpg, .jpeg, or .png.</p>';
            }

            previewContainer.style.display = 'block';
        } else {
            // No file selected
            previewContainer.style.display = 'none';
        }
    }
</script>
@endpush
