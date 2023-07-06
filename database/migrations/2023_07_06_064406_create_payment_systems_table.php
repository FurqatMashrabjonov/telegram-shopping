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
        Schema::create('payment_systems', function (Blueprint $table) {
            $table->id();
            $table->string('name', 125);
            $table->string('gateway', 100);
            $table->string('merchant_id', 250);
            $table->string('secret_key', 250)->nullable();
            $table->string('test_key', 250)->nullable();
            $table->boolean('status')->default(false);
            $table->boolean('approved')->default(false);
            $table->string('currency', 10)->nullable();
            $table->string('return_url', 125)->nullable();
            $table->string('merchant_user_id')->nullable();
            $table->string('service_id')->nullable();
            $table->uuid('handle')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('payment_systems');
    }
};
