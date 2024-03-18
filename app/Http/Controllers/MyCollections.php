<?php

namespace App\Http\Controllers;

use Illuminate\Support\Facades\DB;
use Pokemon\Pokemon;

class MyCollections extends Controller
{
    public function getMyCardCollection()
    {
        $userId = auth()->getUser()->getQueueableId();

        $cards = DB::table('user_card_collections')->where(['user_id' => $userId])->get(['id', 'card_id']);

        $cardList = [];
        foreach ($cards as $card) {
            $cardList[$card->id] = Pokemon::Card()->find($card->card_id);
        }

        return view('my-collections', [
            'cardList' => $cardList
        ]);
    }
}
