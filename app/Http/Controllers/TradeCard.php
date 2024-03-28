<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class TradeCard extends Controller
{
    public function listCardsOpenForTrade()
    {
        $openTrades = DB::table('cards_trade_market')->get()->where('active', '=', true);

        return view('trade-cards', [
            'openTrades' => $openTrades
        ]);
    }
}
