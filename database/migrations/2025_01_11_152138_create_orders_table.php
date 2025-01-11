<?php

use App\Models\Cart;
use App\Models\Citizen;
use App\Models\Product;
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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(Product::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Citizen::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->foreignIdFor(Cart::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('transaction_token')->unique()->nullable();
            $table->string('order_status')->default('1')->nullable()->comment('1 => pending, 2 => processing, 3 => completed, 4 => cancelled');
            $table->timestamp('order_date')->nullable();
            // order total price
            $table->decimal('order_total_price', 10, 2)->nullable();
            // Payment Method
            $table->string('payment_method')->nullable()->comment('1 => Bank Transfer, 2 => Check Payment , 3 => Cash On Delivery, 4 => PayPal');
            // Payment Status
            $table->string('payment_status')->default('1')->nullable()->comment('1 => pending, 2 => processing, 3 => completed, 4 => cancelled');
            // Payment Transaction ID
            $table->string('payment_transaction_id')->nullable();
            // payment date
            $table->timestamp('payment_date')->nullable();
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
        Schema::dropIfExists('orders');
    }
};
