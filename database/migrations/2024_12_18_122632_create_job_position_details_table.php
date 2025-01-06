<?php

use App\Models\JobPosition;
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
        Schema::create('job_position_details', function (Blueprint $table) {
            $table->id();
            $table->foreignIdFor(JobPosition::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->text('requirements')->nullable();
            $table->text('experience')->nullable();
            $table->text('qualification')->nullable();
            $table->text('responsibilities')->nullable();
            $table->text('job_type')->nullable();
            $table->text('job_location')->nullable();
            $table->text('job_description')->nullable();
            $table->text('salary')->nullable();
            $table->string('status')->nullable();
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
        Schema::dropIfExists('job_position_details');
    }
};
