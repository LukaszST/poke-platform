<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pokemon\Models\Card;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

class SaveDataFromPokeApiForAllSets extends Command
{
    /**
     * The name and signature of the console command.
     *
     * @var string
     */
    protected $signature = 'app:save-data-from-poke-api-for-all-sets';

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
        string $cardName,
        ?string $largeImage,
        ?string $smallImage
    ): void {
        //TODO add saving image to local resources
        DB::table('card_list_basic_info')->insert([
            "card_id" => $cardId,
            "card_name" => $cardName,
            "image_url_big" => $largeImage,
            "image_url_small" => $smallImage,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
