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
        Schema::create('business_plans', function (Blueprint $table) {
            $table->id();
            $table->string('equipmentInvoice')->nullable();
            $table->string('salePromise')->nullable();
            $table->string('leaseContract')->nullable();
            $table->string('expertReport')->nullable();
            $table->string('materialsInvoice')->nullable();
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('business_plans');
    }
};
