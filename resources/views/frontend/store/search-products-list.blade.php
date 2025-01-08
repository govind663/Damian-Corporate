<div id="product-section">
    @include('frontend.store.filtered-products', [
        'products' => $products,
        'productCategories' => $productCategories,
        'productSubCategories' => $productSubCategories,
        'colors' => $colors,
        'productfaqs' => $productfaqs,
    ])
</div>
