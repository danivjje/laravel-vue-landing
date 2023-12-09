<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

return new class extends Migration {
    public function up(): void {
        Schema::create('coins', function (Blueprint $table) {
            $table->id();
            $table->json('coins');
            $table->timestamps();
        });
    }

    public function down(): void {
        Schema::dropIfExists('coins');
    }
};
