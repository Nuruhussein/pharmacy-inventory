<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
     // Migration for Orders Table
Schema::create('orders', function (Blueprint $table) {
    $table->id();
    $table->foreignId('doctor_id')->constrained('users'); // Assuming 'users' table for doctors
    $table->string('order_code')->unique();
    $table->string('status')->default('pending');
    $table->decimal('total_amount', 10, 2)->default(0); // Add total amount column
    $table->timestamps();
});

    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('orders');
    }
};
