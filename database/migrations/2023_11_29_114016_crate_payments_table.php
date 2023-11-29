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
        Schema::create('payments', function (Blueprint $table) {
            $table->id();
            $table->decimal('amount' , 20 , 3);
            $table->foreignId('user_id')->constrained('users');
            $table->tinyInteger('status')->default(0);
            $table->tinyInteger('type')->default(0);
            $table->unsignedBigInteger('payment_id');
            $table->string('payment_type');
            $table->timestamps();
            $table->softDeletes();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        //
    }
};
