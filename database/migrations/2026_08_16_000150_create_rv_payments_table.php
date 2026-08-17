<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void
    {
        Schema::create('rv_payments', function (Blueprint $table) {
            $table->id();
            $table->foreignId('reservation_id')->constrained('rv_reservations')->cascadeOnDelete();
            $table->string('gateway', 40)->default('authorize_net');
            $table->string('transaction_id')->nullable()->index();
            $table->string('transaction_type', 30)->default('charge');
            $table->decimal('amount', 10, 2);
            $table->string('status', 30)->default('pending');
            $table->json('gateway_response')->nullable();
            $table->timestamp('processed_at')->nullable();
            $table->timestamps();
        });
    }

    public function down(): void { Schema::dropIfExists('rv_payments'); }
};
