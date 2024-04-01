<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Livewire\Component;
use Pokemon\Models\Card;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

class OpenTradeWizard extends Component
{
    public array $cards;

    public ?string $img = null;
    public ?string $wantedImg = null;

    public string $card;

    public array $sets;

    public string $set;

    public ?array $wantedCardsSelect = null;
    public string $wantedCard;

    public function mount()
    {
        $userId = auth()->getUser()->getQueueableId();

        $cards = DB::table('user_card_collections')->where(['user_id' => $userId])->get(['id', 'card_id']);

        $cardList = [];
        foreach ($cards as $card) {
            /** @var Card $pokemonData */
            $pokemonData = Pokemon::Card()->find($card->card_id);
            $cardList[$card->id] = $this->prepareCardForSelect($pokemonData);
        }

        $pokemonSets = Pokemon::Set()->all();
        $sets = [];
        /** @var Set $pokemonSet */
        foreach ($pokemonSets as $pokemonSet) {
            $sets[] = $pokemonSet->getName();
        }
        $this->sets = $sets;

        $this->cards = $cardList;

    }
    public function render()
    {
        return view('livewire.open-trade-wizard');
    }

    public function updatedCard($value)
    {
        $cards = DB::table('user_card_collections')->where('id', '=', $value)->first(['card_id']);

        /** @var Card $cardInfo */
        $cardInfo = Pokemon::Card()->find($cards->card_id);

        $this->img = $cardInfo->getImages()->getSmall();
    }

    public function updatedSet($value)
    {
        $cardList = Pokemon::Card()->where(['set.name' => $value])->all();

        $cards = [];
        /** @var Card $card */
        foreach ($cardList as $card) {
            $cards[$card->getId()] = $this->prepareCardForSelect($card);
        }

        $this->wantedCardsSelect = $cards;
    }

    public function updatedWantedCard($value)
    {
        /** @var Card $cardInfo */
        $cardInfo = Pokemon::Card()->find($value);

        $this->wantedCard = $cardInfo->getImages()->getSmall();
    }

    private function prepareCardForSelect(Card $card): string
    {
        $name = $card->getName();
        $number = $card->getNumber();
        $set = $card->getSet()->getName();

        return sprintf('%s, number: %s, set: %s', $name, $number, $set);
    }
}
