<?php
namespace App\Http\Requests;

use Illuminate\Foundation\Http\FormRequest;

class DealRequest extends FormRequest
{
    public function authorize()
    {
        return true;
    }

    public function rules()
    {
        return [
            'internal_name' => 'required|string|max:255',
            'title' => 'required|string|max:255',
            'metacritic_link' => 'nullable|string|max:255',
            'deal_id' => 'required|string',
            'store_id' => 'required|integer',
            'game_id' => 'required|integer',
            'sale_price' => 'required|numeric',
            'normal_price' => 'required|numeric',
            'is_on_sale' => 'required|boolean',
            'savings' => 'required|numeric',
            'metacritic_score' => 'required|integer',
            'steam_rating_text' => 'nullable|string|max:255',
            'steam_rating_percent' => 'required|integer',
            'steam_rating_count' => 'required|integer',
            'steam_app_id' => 'nullable|integer',
            'release_date' => 'required|date',
            'last_change' => 'required|date',
            'deal_rating' => 'required|numeric',
            'thumb' => 'required|string|max:255|url',
        ];
    }

    public function messages()
    {
        return [
            'internal_name.required' => 'The internal name field is required.',
            'title.required' => 'The title field is required.',
            'deal_id.required' => 'The deal ID field is required.',
            'store_id.required' => 'The store ID field is required.',
            'store_id.integer' => 'The store ID must be an integer.',
            'game_id.required' => 'The game ID field is required.',
            'game_id.integer' => 'The game ID must be an integer.',
            'sale_price.required' => 'The sale price field is required.',
            'sale_price.numeric' => 'The sale price must be a number.',
            'normal_price.required' => 'The normal price field is required.',
            'normal_price.numeric' => 'The normal price must be a number.',
            'is_on_sale.required' => 'The is on sale field is required.',
            'is_on_sale.boolean' => 'The is on sale field must be a boolean.',
            'savings.required' => 'The savings field is required.',
            'savings.numeric' => 'The savings must be a number.',
            'metacritic_score.required' => 'The Metacritic score field is required.',
            'metacritic_score.integer' => 'The Metacritic score must be an integer.',
            'steam_rating_percent.required' => 'The Steam rating percent field is required.',
            'steam_rating_percent.integer' => 'The Steam rating percent must be an integer.',
            'steam_rating_count.required' => 'The Steam rating count field is required.',
            'steam_rating_count.integer' => 'The Steam rating count must be an integer.',
            'steam_app_id.integer' => 'The Steam app ID must be an integer.',
            'release_date.required' => 'The release date field is required.',
            'release_date.date' => 'The release date must be a valid date.',
            'last_change.required' => 'The last change field is required.',
            'last_change.date' => 'The last change must be a valid date.',
            'deal_rating.required' => 'The deal rating field is required.',
            'deal_rating.numeric' => 'The deal rating must be a number.',
            'thumb.required' => 'The thumb field is required.',
            'thumb.url' =>'The :attribute field must be a valid URL.',
        ];
    }
}
