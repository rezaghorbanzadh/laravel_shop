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
        Schema::create('orders', function (Blueprint $table) {
            $table->id();
            $table->foreignId('user_id')->constrained('users');
            $table->foreignId('addresses_id')->constrained('addresses');
            $table->longText('payment_object')->nullable();
            $table->integer('payment_type')->default(0);
            $table->integer('payment_status')->default(0);
            $table->integer('order_status')->default(0);
            $table->timestamps();
            $table->softDeletes();
        });    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
