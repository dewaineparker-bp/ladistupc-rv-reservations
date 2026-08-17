<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rv_rates', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->foreignId('site_id')->nullable()->constrained('rv_sites')->nullOnDelete();
            $table->date('start_date')->nullable();
            $table->date('end_date')->nullable();
            $table->enum('usage_mode', ['occupied', 'storage']);
            $table->decimal('daily_rate', 10, 2);
            $table->unsignedInteger('priority')->default(100);
            $table->boolean('active')->default(true);
            $table->timestamps();
            $table->index(['usage_mode', 'start_date', 'end_date', 'active']);
        });
    }

    public function down(): void { Schema::dropIfExists('rv_rates'); }
};
