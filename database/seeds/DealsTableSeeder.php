<?php

use Illuminate\Database\Seeder;
use App\Models\Deal;
use Illuminate\Support\Facades\File;

class DealsTableSeeder extends Seeder
{
    public function run()
    {
        $json = File::get(resource_path('json/deals.json'));
        $data = json_decode($json);

        foreach ($data as $item) {
            Deal::create([
                'internal_name' => $item->internalName,
                'title' => $item->title,
                'metacritic_link' => $item->metacriticLink,
                'deal_id' => $item->dealID,
                'store_id' => $item->storeID,
                'game_id' => $item->gameID,
                'sale_price' => $item->salePrice,
                'normal_price' => $item->normalPrice,
                'is_on_sale' => $item->isOnSale,
                'savings' => $item->savings,
                'metacritic_score' => $item->metacriticScore,
                'steam_rating_text' => $item->steamRatingText,
                'steam_rating_percent' => $item->steamRatingPercent,
                'steam_rating_count' => $item->steamRatingCount,
                'steam_app_id' => $item->steamAppID,
                'release_date' =>  $item->releaseDate,
                'last_change' => $item->lastChange,
                'deal_rating' => $item->dealRating,
                'thumb' => $item->thumb,
            ]);
        }
    }
}
