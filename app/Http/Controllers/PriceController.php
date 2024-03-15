<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class PriceController extends Controller
{
    public function showPriceForCard(string $cardId)
    {
        $prices = DB::table('card_market_prices')->where('card_id', '=', $cardId);

        return view('CardPriceChart', [
            'prices' => $prices
        ]);
    }
}
