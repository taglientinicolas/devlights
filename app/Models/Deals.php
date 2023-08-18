<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Deal extends Model
{
    protected $fillable = [
        'internal_name',
        'title',
        'metacritic_link',
        'deal_id',
        'store_id',
        'game_id',
        'sale_price',
        'normal_price',
        'is_on_sale',
        'savings',
        'metacritic_score',
        'steam_rating_text',
        'steam_rating_percent',
        'steam_rating_count',
        'steam_app_id',
        'release_date',
        'last_change',
        'deal_rating',
        'thumb',
    ];
}
