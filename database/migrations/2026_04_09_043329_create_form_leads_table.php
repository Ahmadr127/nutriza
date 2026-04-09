<?php
use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('form_leads', function (Blueprint $table) {
            $table->id();
            $table->string('name');
            $table->string('phone');
            $table->string('email')->nullable();
            $table->string('program_interest')->nullable();
            $table->text('message')->nullable();
            $table->timestamps();
        });
    }
    public function down(): void { Schema::dropIfExists('form_leads'); }
};
