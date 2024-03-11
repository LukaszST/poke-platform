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
        Schema::create('card_market_prices', function (Blueprint $table) {
            $table->bigIncrements('id');
            $table->string('card_id');
            $table->float('average_sell_price');
            $table->float('low_price');
            $table->float('trend_price');
            $table->float('suggested_price');
            $table->timestamps();
            });
        }

    /**
     * Reverse the migrations.
     */
    public function down(): void
    {
        Schema::dropIfExists('card_market_prices');
    }
};
