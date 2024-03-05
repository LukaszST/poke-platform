<?php

namespace App\Livewire;

use Livewire\Component;

class AddCardToCollection extends Component
{
    public string $cardId = 'brak';
    public function addToCollection(string $cardId)
    {
        $this->cardId = $cardId;
    }

    public function render()
    {
        return view('livewire.add-card-to-collection');
    }
}
