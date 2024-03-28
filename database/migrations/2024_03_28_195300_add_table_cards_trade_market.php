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
        Schema::create('cards_trade_market', function (Blueprint $table) {
            $table->id();
            $table->string('card_id_for_trade');
            $table->string('trade_owner');
            $table->string('wanted_card_id');
            $table->string('real_image_card_front');
            $table->string('real_image_card_back');
            $table->string('short_note');
            $table->boolean('active')->default(true);
            $table->timestamps();
        });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('cards_trade_market');
    }
};
