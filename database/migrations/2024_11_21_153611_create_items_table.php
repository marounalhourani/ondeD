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
        Schema::create('items', function (Blueprint $table) {
            $table->id(); // Primary key for items
            $table->string('name'); // Name of the item
            $table->text('description')->nullable(); // Optional description of the item
            $table->decimal('price', 8, 2); // Price of the item (8 digits, 2 decimal places)
            $table->foreignId('category_id')->constrained('categories')->onDelete('cascade'); // Foreign key referencing 'categories'
            $table->boolean('is_special')->default(false); // Optional: Flag for special items
            $table->timestamps(); // Timestamps for created_at and updated_at
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('items');
    }
};
