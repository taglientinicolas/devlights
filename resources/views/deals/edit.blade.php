@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Edit Deal</h2>

        @if($errors->any())
            <div class="alert alert-danger">
                <ul>
                    @foreach ($errors->all() as $error)
                        <li>{{ $error }}</li>
                    @endforeach
                </ul>
            </div>
        @endif

        <form action="{{ route('deals.update', $deal->id) }}" method="POST">
            @csrf
            @method('PUT')

            <div class="form-group">
                <label for="internal_name">Internal Name</label>
                <input type="text" class="form-control" id="internal_name" name="internal_name" value="{{ old('internal_name', $deal->internal_name) }}">
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" class="form-control" id="title" name="title" value="{{ old('title', $deal->title) }}">
            </div>

            <div class="form-group">
                <label for="metacritic_link">Metacritic Link</label>
                <input type="text" class="form-control" id="metacritic_link" name="metacritic_link" value="{{ old('metacritic_link', $deal->metacritic_link) }}">
            </div>

            <div class="form-group">
                <label for="deal_id">Deal ID</label>
                <input type="text" class="form-control" id="deal_id" name="deal_id" value="{{ old('deal_id', $deal->deal_id) }}">
            </div>

            <div class="form-group">
                <label for="store_id">Store ID</label>
                <input type="number" class="form-control" id="store_id" name="store_id" value="{{ old('store_id', $deal->store_id) }}">
            </div>

            <div class="form-group">
                <label for="game_id">Game ID</label>
                <input type="number" class="form-control" id="game_id" name="game_id" value="{{ old('game_id', $deal->game_id) }}">
            </div>

            <div class="form-group">
                <label for="sale_price">Sale Price</label>
                <input type="text" class="form-control" id="sale_price" name="sale_price" value="{{ old('sale_price', $deal->sale_price) }}">
            </div>

            <div class="form-group">
                <label for="normal_price">Normal Price</label>
                <input type="text" class="form-control" id="normal_price" name="normal_price" value="{{ old('normal_price', $deal->normal_price) }}">
            </div>

            <div class="form-group">
                <label for="is_on_sale">Is on Sale</label>
                <select name="is_on_sale" id="is_on_sale" class="form-control" required>
                    <option value="1" {{ old('is_on_sale', $deal->is_on_sale) == 1 ? 'selected' : '' }}>Yes</option>
                    <option value="0" {{ old('is_on_sale', $deal->is_on_sale) == 0 ? 'selected' : '' }}>No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="savings">Savings</label>
                <input type="text" class="form-control" id="savings" name="savings" value="{{ old('savings', $deal->savings) }}">
            </div>

            <div class="form-group">
                <label for="metacritic_score">Metacritic Score</label>
                <input type="number" class="form-control" id="metacritic_score" name="metacritic_score" value="{{ old('metacritic_score', $deal->metacritic_score) }}">
            </div>

            <div class="form-group">
                <label for="steam_rating_text">Steam Rating Text</label>
                <input type="text" class="form-control" id="steam_rating_text" name="steam_rating_text" value="{{ old('steam_rating_text', $deal->steam_rating_text) }}">
            </div>

            <div class="form-group">
                <label for="steam_rating_percent">Steam Rating Percent</label>
                <input type="number" class="form-control" id="steam_rating_percent" name="steam_rating_percent" value="{{ old('steam_rating_percent', $deal->steam_rating_percent) }}">
            </div>

            <div class="form-group">
                <label for="steam_rating_count">Steam Rating Count</label>
                <input type="number" class="form-control" id="steam_rating_count" name="steam_rating_count" value="{{ old('steam_rating_count', $deal->steam_rating_count) }}">
            </div>

            <div class="form-group">
                <label for="steam_app_id">Steam App ID</label>
                <input type="number" class="form-control" id="steam_app_id" name="steam_app_id" value="{{ old('steam_app_id', $deal->steam_app_id) }}">
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="datetime-local" class="form-control" id="release_date" name="release_date" value="{{ old('release_date', date('Y-m-d\TH:i', $deal->release_date)) }}">
            </div>

            <div class="form-group">
                <label for="last_change">Last Change</label>
                <input type="datetime-local" class="form-control" id="last_change" name="last_change" value="{{ old('last_change', date('Y-m-d\TH:i', $deal->last_change)) }}">
            </div>

            <div class="form-group">
                <label for="deal_rating">Deal Rating</label>
                <input type="number" class="form-control" id="deal_rating" name="deal_rating" value="{{ old('deal_rating', $deal->deal_rating) }}">
            </div>

            <div class="form-group">
                <label for="thumb">Thumb</label>
                <input type="text" class="form-control" id="thumb" name="thumb" value="{{ old('thumb', $deal->thumb) }}">
            </div>

            <button type="submit" class="btn btn-primary">Update Deal</button>
        </form>
    </div>
@endsection
