<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Pokemon\Pokemon;

class MyCollections extends Controller
{
    public function getMyCardCollection()
    {
        $userId = auth()->getUser()->getQueueableId();

        $cards = DB::table('user_card_collections')->where(['user_id' => $userId])->get(['id', 'card_id']);

        $cardList = [];
        foreach ($cards as $card) {
            $cardList[$card->id] = Pokemon::Card()->find($card->card_id);
        }

        $cardPriceInCollection = [];

        foreach ($cards as $card) {
            $prices = DB::table('card_market_prices')->where('card_id', '=', $card->card_id)->get([
                'card_id',
                'average_sell_price',
                'low_price',
                'trend_price',
                'suggested_price',
                'created_at'
            ]);

            foreach ($prices->toArray() as $cardPrice) {
                $cardPrice = get_object_vars($cardPrice);

                if (isset($cardPriceInCollection[date("d-m-Y", strtotime($cardPrice['created_at']))])) {
                    $cardPriceInCollection[date("d-m-Y", strtotime($cardPrice['created_at']))] += $cardPrice['trend_price'];
                } else {
                    $cardPriceInCollection[date("d-m-Y", strtotime($cardPrice['created_at']))] = $cardPrice['trend_price'];
                }
            }
        }

//        dd($cardPriceInCollection);

        return view('my-collections', [
            'cardList' => $cardList,
            'labels' => array_keys($cardPriceInCollection),
            'trendPrice' => $cardPriceInCollection
        ]);
    }
}
