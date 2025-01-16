<?php

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
        Schema::table('products', function (Blueprint $table) {
            $table->decimal('discount_price_after_ammount', 10, 2)->nullable()->after('discount_price_in_amount');
            $table->decimal('discount_price_after_percentage', 10, 2)->nullable()->after('discount_price_in_percentage');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('products', function (Blueprint $table) {
            $table->dropColumn('discount_price_after_ammount');
            $table->dropColumn('discount_price_after_percentage');
        });
    }
};
