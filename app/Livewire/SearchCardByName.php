<?php

namespace App\Livewire;

use Illuminate\Routing\Route;
use Livewire\Component;

class SearchCardByName extends Component
{
    public string $cardName;

    public function render()
    {
        return view('livewire.search-card-by-name');
    }

    public function searchCard()
    {
        return to_route('card.search', ['pokemonName' => $this->cardName]);
    }
}
