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
        Schema::create('transactions', function (Blueprint $table) {
            $table->bigIncrements('ID')->autoIncrement(); 
            $table->date('Date'); // Date column for recording the transaction date
            $table->string('Product'); // String column for Product
            $table->string('Transactor'); // String column for Transactor
            $table->unsignedInteger('Qty'); // Unsigned integer column for quantity
            $table->decimal('Price', 10, 2); // Decimal column for price with precision 10 and scale 2 (for currency)
            $table->enum('Type', ['Buy', 'Sell']); // Enum column for defining whether it's a buy or sell transaction
            $table->timestamps(); // Automatically maintain created_at and updated_at columns
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('_transactions');
    }
};
