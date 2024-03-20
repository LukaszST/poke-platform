<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\DB;

class GetAllCardsFromAllSetsForPokemon extends Controller
{
    public function getAllCardsForPokemon(string $pokemonName)
    {
        $cards = DB::table('card_list_basic_info')->where('card_name', 'like', '%'.$pokemonName.'%')->get(['card_id', 'card_name', 'set_name'])->toArray();

        return view('ShowAllCardsForPokemon', ['cardList' => $cards]);
    }
}
