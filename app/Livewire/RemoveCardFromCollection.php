<?php

namespace App\Livewire;

use App\Models\User;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Livewire\Component;

class RemoveCardFromCollection extends Component
{
    public string $id;
    public function removeFromCollection(int $id)
    {
        return DB::table('user_card_collections')->delete($id);

    }

    public function render()
    {
        return view('livewire.remove-card-from-collection');
    }
}
