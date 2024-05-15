<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class CardBidsTrade extends Model
{
    use HasFactory;

    protected $fillable = [
        'trade_id',
        'bid_owner',
        'real_image_card_front',
        'real_image_card_back',
        'short_note',
        'trade_win_id'
    ];
}
