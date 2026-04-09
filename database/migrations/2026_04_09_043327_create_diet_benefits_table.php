<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('diet_benefits', function (Blueprint $table) {
            $table->id();
            $table->string('title');
            $table->text('description')->nullable();
            $table->text('icon')->nullable();
            $table->integer('display_order')->default(0);
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('diet_benefits'); }
};
