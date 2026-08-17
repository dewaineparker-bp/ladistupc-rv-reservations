<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rv_reservation_periods', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('rv_reservations')->cascadeOnDelete();
            $table->date('start_date');
            $table->date('end_date');
            $table->enum('usage_mode', ['occupied', 'storage']);
            $table->decimal('daily_rate', 10, 2)->default(0);
            $table->unsignedInteger('billable_days')->default(0);
            $table->decimal('line_total', 10, 2)->default(0);
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('rv_reservation_periods'); }
};
