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
    protected $description = 'Updates prices for card market provider from Pokemon tcg api';

    /**
     * Execute the console command.
     */
    public function handle()
    {
        /** @var Set $list */
        $list = Pokemon::Set()->all();

        foreach ($list as $set) {
            foreach ($this->getSetByName($set->getName()) as $card) {
                try {
                    $cardMarket = $card->getCardmarket();

                    if (is_null($cardMarket)) {
                        $this->error('card market empty for ' . $card->getId(). ' and card name ' . $card->getName());
                        break;
                    }

                    $this->saveToDbCardInfo(
                        $card->getId(),
                        $card->getCardmarket()->getPrices()->getAverageSellPrice(),
                        $card->getCardmarket()->getPrices()->getLowPrice(),
                        $card->getCardmarket()->getPrices()->getTrendPrice(),
                        $card->getCardmarket()->getPrices()->getSuggestedPrice()
                    );

                    $this->line('Prices for: ' . $card->getName() . ' from set ' . $card->getSet()->getName() . ' was added');
                } catch (\Exception $exception) {
                    $this->error('failed for ' . $card->getId(). ' and card name ' . $card->getName());
                }
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
