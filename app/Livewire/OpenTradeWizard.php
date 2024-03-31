<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Pokemon\Models\Card;
use Pokemon\Pokemon;

class OpenTradeWizard extends Component
{
    public array $cards;

    public ?string $img = null;

    public string $card;
    public function __construct()
    {
        $userId = auth()->getUser()->getQueueableId();

        $cards = DB::table('user_card_collections')->where(['user_id' => $userId])->get(['id', 'card_id']);

        $cardList = [];
        foreach ($cards as $card) {
            /** @var Card $pokemonData */
            $pokemonData = Pokemon::Card()->find($card->card_id);
            $name = $pokemonData->getName();
            $number = $pokemonData->getNumber();
            $set = $pokemonData->getSet()->getName();
            $cardList[$card->id] = sprintf('%s, number: %s, set: %s', $name, $number, $set);
        }

        $this->cards = $cardList;
    }
    public function render()
    {
        return view('livewire.open-trade-wizard');
    }

    public function selectCard(string $card)
    {

    }
}
