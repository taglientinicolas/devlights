@extends('layouts.app')

@section('content')
    <div class="container">
        <h2>Create New Deal</h2>

        <form action="{{ route('deals.store') }}" method="POST">
            @csrf

            <div class="form-group">
                <label for="internal_name">Internal Name</label>
                <input type="text" name="internal_name" id="internal_name" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="title">Title</label>
                <input type="text" name="title" id="title" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="metacritic_link">Metacritic Link</label>
                <input type="text" name="metacritic_link" id="metacritic_link" class="form-control">
            </div>

            <div class="form-group">
                <label for="deal_id">Deal ID</label>
                <input type="text" name="deal_id" id="deal_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="store_id">Store ID</label>
                <input type="number" name="store_id" id="store_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="game_id">Game ID</label>
                <input type="number" name="game_id" id="game_id" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="sale_price">Sale Price</label>
                <input type="number" name="sale_price" id="sale_price" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="normal_price">Normal Price</label>
                <input type="number" name="normal_price" id="normal_price" class="form-control" step="0.01" required>
            </div>

            <div class="form-group">
                <label for="is_on_sale">Is on Sale</label>
                <select name="is_on_sale" id="is_on_sale" class="form-control" required>
                    <option value="1">Yes</option>
                    <option value="0">No</option>
                </select>
            </div>

            <div class="form-group">
                <label for="savings">Savings</label>
                <input type="number" name="savings" id="savings" class="form-control" step="0.000001" required>
            </div>

            <div class="form-group">
                <label for="metacritic_score">Metacritic Score</label>
                <input type="number" name="metacritic_score" id="metacritic_score" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="steam_rating_text">Steam Rating Text</label>
                <input type="text" name="steam_rating_text" id="steam_rating_text" class="form-control">
            </div>

            <div class="form-group">
                <label for="steam_rating_percent">Steam Rating Percent</label>
                <input type="number" name="steam_rating_percent" id="steam_rating_percent" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="steam_rating_count">Steam Rating Count</label>
                <input type="number" name="steam_rating_count" id="steam_rating_count" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="steam_app_id">Steam App ID</label>
                <input type="number" name="steam_app_id" id="steam_app_id" class="form-control">
            </div>

            <div class="form-group">
                <label for="release_date">Release Date</label>
                <input type="date" name="release_date" id="release_date" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="last_change">Last Change</label>
                <input type="date" name="last_change" id="last_change" class="form-control" required>
            </div>

            <div class="form-group">
                <label for="deal_rating">Deal Rating</label>
                <input type="number" name="deal_rating" id="deal_rating" class="form-control" step="0.1" required>
            </div>

            <div class="form-group">
                <label for="thumb">Thumb</label>
                <input type="text" name="thumb" id="thumb" class="form-control" required>
            </div>

            <button type="submit" class="btn btn-primary">Create Deal</button>
        </form>
    </div>
@endsection
