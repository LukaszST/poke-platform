<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\DB;
use Pokemon\Models\Card;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

class UpdatePricesCardMarket extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:update-prices-card-market';

    /**
     * The console command description.
     *
     * @var string
     */
    protected $description = 'Command description';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var Set $list */
        $list = Pokemon::Set()->all();

        foreach ($list as $set) {
            foreach ($this->getSetByName($set->getName()) as $card) {
                $this->saveToDbCardInfo(
                    $card->getId(),
                    $card->getName(),
                    $card->getSet()->getName(),
                    $card->getImages()->getLarge(),
                    $card->getImages()->getSmall()
                );
            }
        }
    }

    /**
     * @param string $name
     * @return Card[]
     */
    private function getSetByName(string $name): array
    {
        /** @var Card[] $cardList */
        $cardList = Pokemon::Card()->where(['set.name' => $name])->all();

        return $cardList;
    }

    private function saveToDbCardInfo(
        string $cardId,
        float $averageSellPrice,
        float $lowPrice,
        float $trendPrice,
        float $suggestedPrice
    ): void {
        DB::table('card_market_prices')->insert([
            "card_id" => $cardId,
            'average_sell_price' => $averageSellPrice,
            'low_price' => $lowPrice,
            'trend_price' => $trendPrice,
            'suggested_price' => $suggestedPrice,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
