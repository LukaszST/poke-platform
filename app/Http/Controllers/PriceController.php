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

        $labelsFlat = $this->flatResults($prices->toArray(), 'created_at');

        $averageSellPrice = $this->flatResults($prices->toArray(), 'average_sell_price');
        $lowPrice = $this->flatResults($prices->toArray(), 'low_price');
        $trendPrice = $this->flatResults($prices->toArray(), 'trend_price');
        $suggestedPrice = $this->flatResults($prices->toArray(), 'suggested_price');

        return view('CardPriceChart', [
            'labels' => $labelsFlat,
            'avgSellPrice' => $averageSellPrice,
            'lowPrice' => $lowPrice,
            'trendPrice' => $trendPrice,
            'suggestedPrice' => $suggestedPrice
        ]);
    }

    private function flatResults(array $labels, string $priceType)
    {
        $return = [];

        foreach ($labels as $label) {
            $label = get_object_vars($label);

            $return[] = $label[$priceType];
        }

        return $return;
    }
}
