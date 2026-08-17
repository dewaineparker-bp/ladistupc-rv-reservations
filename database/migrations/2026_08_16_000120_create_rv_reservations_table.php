<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rv_reservations', function (Blueprint $table) {
            $table->id();
            $table->string('confirmation_code', 32)->unique();
            $table->foreignId('customer_id')->constrained('rv_customers');
            $table->foreignId('site_id')->constrained('rv_sites');
            $table->date('arrival_date');
            $table->date('departure_date');
            $table->string('status', 30)->default('pending')->index();
            $table->decimal('subtotal', 10, 2)->default(0);
            $table->decimal('tax_total', 10, 2)->default(0);
            $table->decimal('total', 10, 2)->default(0);
            $table->string('payment_status', 30)->default('unpaid');
            $table->text('admin_notes')->nullable();
            $table->timestamps();
            $table->index(['site_id', 'arrival_date', 'departure_date']);
        });
    }

    public function down(): void { Schema::dropIfExists('rv_reservations'); }
};
