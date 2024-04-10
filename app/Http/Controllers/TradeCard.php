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

    public function addTOpenTrade()
    {
        return view('AddOpenTrade');
    }

    public function bidTrade(int $tradeId)
    {
        return view('BidTrade', ['tradeId' => $tradeId]);
    }

    public function listBidsForTrade(int $tradeId)
    {
        $bids = DB::table('card_bids_trade')->where('trade_id', '=', $tradeId)->get()->all();

        return view('ListBidsTrade', ['tradeId' => $tradeId, 'bids' => $bids]);
    }
}
