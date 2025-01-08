<?php

use App\Models\ProductCategory;
use App\Models\ProductColors;
use App\Models\ProductSubCategory;
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     */
    public function up(): void
    {
        Schema::create('products', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(ProductCategory::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(ProductSubCategory::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(ProductColors::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('product_sku')->nullable()->unique();
            $table->string('name')->nullable();
            $table->string('slug')->nullable()->unique();
            $table->text('description')->nullable();
            $table->string('image')->nullable();
            $table->text('product_other_images')->nullable();

            // ==== product price
            $table->integer('price')->nullable();
            $table->string('discount_type')->nullable()->comment('1 => Percent, 2 => Amount');
            $table->string('discount_price_in_percentage')->nullable();
            $table->string('discount_price_in_amount')->nullable();

            // ==== product dimensions
            $table->string('height')->nullable();
            $table->string('width')->nullable();
            $table->string('depth')->nullable();

            // ==== product type (New, Sale, Best Seller, Featured, etc.)
            $table->string('product_type')->nullable()->comment('1 => New, 2 => Sale, 3 => Best Seller, 4 => Featured');

            // ==== product status
            $table->string('status')->nullable()->comment('1 => Active, 2 => Inactive');

            $table->integer('inserted_by')->nullable();
            $table->timestamp('inserted_at')->nullable();
            $table->integer('modified_by')->nullable();
            $table->timestamp('modified_at')->nullable();
            $table->integer('deleted_by')->nullable();
            $table->timestamp('deleted_at')->nullable();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('products');
    }
};
