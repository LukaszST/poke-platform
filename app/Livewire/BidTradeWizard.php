<?php

namespace App\Livewire;

use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Pokemon\Models\Card;
use Pokemon\Pokemon;

class BidTradeWizard extends Component
{
    public array $cards;

    public string $card;

    public ?string $img = null;
    public function mount()
    {
        $this->userId = auth()->getUser()->getQueueableId();

        $cards = DB::table('user_card_collections')->where(['user_id' => $this->userId])->get(['id', 'card_id']);

        $cardList = [];
        foreach ($cards as $card) {
            /** @var Card $pokemonData */
            $pokemonData = Pokemon::Card()->find($card->card_id);
            $cardList[$card->card_id] = $this->prepareCardForSelect($pokemonData);
        }

        dd($cardList);

        $this->cards = $cardList;

    }

    public function updatedCard($value)
    {
        /** @var Card $cardInfo */
        $cardInfo = Pokemon::Card()->find($value);

        $this->img = $cardInfo->getImages()->getSmall();
    }

    public function render()
    {
        return view('livewire.bid-trade-wizard');
    }

    public function saveTrade()
    {
        DB::table('cards_bids_trade')->insert([
            'trade_id' => $this->card,
            'trade_owner' => $this->userId,
            'wanted_card_id' => $this->wantedCard,
            'active' => 1,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return Redirect::to('/trade');
    }

    public function cancel()
    {
        return Redirect::to('/trade');
    }

    private function prepareCardForSelect(Card $card): string
    {
        $name = $card->getName();
        $number = $card->getNumber();
        $set = $card->getSet()->getName();

        return sprintf('%s, number: %s, set: %s', $name, $number, $set);
    }
}
