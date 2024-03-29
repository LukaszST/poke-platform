<?php

namespace App\Console\Commands;

use Illuminate\Console\Command;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use mysql_xdevapi\Statement;
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
    protected $description = 'Save basic info about card to db';

    /**
     * Execute the console command.
     */
    public function handle(): bool
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

        return true;
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
        string $setName,
        ?string $largeImage,
        ?string $smallImage
    ): void {
        DB::table('card_list_basic_info')->where('card_id', '==', $cardId)->updateOrInsert([
            "card_id" => $cardId,
            "card_name" => $cardName,
            "set_name" => $setName,
            "image_url_big" => $largeImage,
            "image_url_small" => $smallImage,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }
}
