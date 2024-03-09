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
        Schema::create('card_list_basic_info', function (Blueprint $table) {
            $table->id();
            $table->string('card_id');
            $table->string('card_name');
            $table->string('image_url_big')->nullable(true);
            $table->string('image_url_small')->nullable(true);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_list_basic_info');
    }
};
