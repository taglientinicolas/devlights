<?php

use Illuminate\Database\Migrations\Migration;
use Illuminate\Database\Schema\Blueprint;
use Illuminate\Support\Facades\Schema;

class CreateDealsTable extends Migration
{
    /**
     * Run the migrations.
     *
     * @return void
     */
    public function up()
    {
        Schema::create('deals', function (Blueprint $table) {
            $table->id();
            $table->string('internal_name');
            $table->string('title');
            $table->string('metacritic_link')->nullable();
            $table->string('deal_id');
            $table->unsignedBigInteger('store_id');
            $table->unsignedBigInteger('game_id');
            $table->decimal('sale_price', 10, 2);
            $table->decimal('normal_price', 10, 2);
            $table->boolean('is_on_sale');
            $table->decimal('savings', 10, 6);
            $table->integer('metacritic_score');
            $table->string('steam_rating_text')->nullable();
            $table->integer('steam_rating_percent');
            $table->integer('steam_rating_count');
            $table->unsignedBigInteger('steam_app_id')->nullable();
            $table->unsignedBigInteger('release_date');
            $table->unsignedBigInteger('last_change');
            $table->decimal('deal_rating', 3, 1);
            $table->string('thumb');
            $table->timestamps();
        });
    }

    /**
     * Reverse the migrations.
     *
     * @return void
     */
    public function down()
    {
        Schema::dropIfExists('deals');
    }
}
