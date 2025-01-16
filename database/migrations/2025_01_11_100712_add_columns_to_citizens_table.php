<?php

use App\Models\State;
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
        Schema::table('citizens', function (Blueprint $table) {
            $table->string('profile_image')->nullable()->after('email_verified_at');
            $table->string('postcode')->nullable()->after('profile_image');
            $table->string('city')->nullable()->after('postcode');
            $table->foreignIdFor(State::class, 'state')->nullable()->after('city')->constrained();
            $table->string('country')->nullable()->after('state');
            $table->text('billing_address')->nullable()->after('country');
            $table->text('shipping_address')->nullable()->after('billing_address');
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::table('citizens', function (Blueprint $table) {
            $table->dropColumn(['profile_image', 'postcode', 'city', 'state_id', 'country', 'billing_address', 'shipping_address']);
            $table->dropForeign(['state_id']);

        });
    }
};
