<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rv_sites', function (Blueprint $table) {
            $table->id();
            $table->string('site_number', 30)->unique();
            $table->string('name')->nullable();
            $table->string('site_type')->nullable();
            $table->string('electric_service')->nullable();
            $table->unsignedSmallInteger('length_ft')->nullable();
            $table->unsignedSmallInteger('width_ft')->nullable();
            $table->boolean('handicap')->default(false);
            $table->boolean('active')->default(true);
            $table->decimal('map_x', 8, 5)->nullable();
            $table->decimal('map_y', 8, 5)->nullable();
            $table->decimal('map_w', 8, 5)->nullable();
            $table->decimal('map_h', 8, 5)->nullable();
            $table->text('notes')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void
    {
        Schema::dropIfExists('rv_sites');
    }
};
