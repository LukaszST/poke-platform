<?php

namespace App\Livewire;

use Illuminate\Routing\Route;
use Illuminate\Support\Facades\DB;
use Illuminate\Support\Facades\Redirect;
use Livewire\Component;
use Pokemon\Models\Card;
use Pokemon\Pokemon;

class BidTradeWizard extends Component
{
    public array $cards;

    public string $card;

    public int $tradeId;

    public ?string $img = null;

    public string $userId;

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
        DB::table('card_bids_trade')->insert([
            'trade_id' => $this->tradeId,
            'bid_owner' => $this->userId,
            'short_note' => $this->card,
            "created_at" => now(),
            "updated_at" => now()
        ]);

        return Redirect::to('/trade/' . $this->tradeId);
    }

    public function cancel()
    {
        return Redirect::to('/trade/' . $this->tradeId);
    }

    private function prepareCardForSelect(Card $card): string
    {
        $name = $card->getName();
        $number = $card->getNumber();
        $set = $card->getSet()->getName();

        return sprintf('%s, number: %s, set: %s', $name, $number, $set);
    }
}
