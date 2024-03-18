<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    public function showPriceForCard(string $cardId)
    {
        $prices = DB::table('card_market_prices')->where('card_id', '=', $cardId)->get([
            'card_id',
            'average_sell_price',
            'low_price',
            'trend_price',
            'suggested_price',
            'created_at'
        ]);

        return view('CardPriceChart', [
            'prices' => $prices
        ]);
    }
}
