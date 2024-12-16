<?php

use App\Models\Project;
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
        Schema::create('project_details', function (Blueprint $table) {
            $table->id();
            $table->text('banner_image')->nullable();
            $table->foreignIdFor(Project::class)->nullable()->constrained()->onDelete('cascade')->onUpdate('cascade');
            $table->string('slug')->nullable();
            $table->string('location')->nullable();
            $table->string('location_url')->nullable();
            $table->string('total_constructed_area')->nullable();
            $table->text('project_description')->nullable();
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
        Schema::dropIfExists('project_details');
    }
};
