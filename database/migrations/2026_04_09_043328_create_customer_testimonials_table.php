<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('customer_testimonials', function (Blueprint $table) {
            $table->id();
            $table->string('customer_name');
            $table->text('comment');
            $table->integer('rating')->default(5);
            $table->string('before_image')->nullable();
            $table->string('after_image')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('customer_testimonials'); }
};
