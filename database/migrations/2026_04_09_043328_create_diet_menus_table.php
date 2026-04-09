<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('diet_menus', function (Blueprint $table) {
            $table->id();
            $table->string('day');
            $table->string('meal_type'); // Breakfast, Lunch, Dinner, Snack
            $table->string('food_name');
            $table->string('image')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('diet_menus'); }
};
