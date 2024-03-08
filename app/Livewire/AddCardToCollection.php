<?php

namespace App\Livewire;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class AddCardToCollection extends Component
{
    public string $cardId = '';
    public function addToCollection(string $cardId)
    {
        DB::table('user_card_collections')->insertGetId([
           "user_id" => Auth::user()->getQueueableId(),
            "card_id" => $cardId,
            "created_at" => now(),
            "updated_at" => now()
        ]);
    }

    public function render()
    {
        return view('livewire.add-card-to-collection');
    }
}
