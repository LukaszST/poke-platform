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

        $labels = DB::table('card_market_prices')->where('card_id', '=', $cardId)->get([
            'created_at'
        ]);

        $labelsFlat = $this->flatLabels($labels->all());

        $trendPrices = $this->flatPrices($prices->toArray(), '');

        return view('CardPriceChart', [
            'labels' => $labelsFlat,
            'prices' => $trendPrices
        ]);
    }

    private function flatLabels(array $labels)
    {
        $return = [];

        foreach ($labels as $label) {
            $return[] = $label->created_at;
        }

        return $return;
    }

    private function flatPrices(array $labels, string $priceType)
    {
        $return = [];

        foreach ($labels as $label) {
            $return[] = $label->average_sell_price;
        }

        return $return;
    }
}
