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
        Schema::create('card_bids_trade', function (Blueprint $table) {
            $table->id();
            $table->integer('trade_id');
            $table->string('bid_owner');
            $table->string('real_image_card_front')->nullable();
            $table->string('real_image_card_back')->nullable();
            $table->string('short_note')->nullable();
            $table->boolean('trade_win_id')->default(false);
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_bids_trade');
    }
};
