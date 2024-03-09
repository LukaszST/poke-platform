<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\DB;
use Pokemon\Models\Set;
use Pokemon\Pokemon;

class PokemonSetController extends Controller
{

    public function setList()
    {
        /** @var Set $list */
        $list = Pokemon::Set()->all();

        return view('PokemonSetList', [
            'pokemonSetsList' => $list
        ]);
    }
    public function getSet(string $name)
    {
        $cardList = Pokemon::Card()->where(['set.name' => $name])->all();

        return view('pokemon-card-list', [
            'cardList' => $cardList
        ]);
    }
}
