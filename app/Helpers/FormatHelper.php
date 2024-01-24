<?php

//namespace App\Helpers\FormatHelper;

use Illuminate\Support\Facades\Http;

if (!function_exists('get_all_genre')) {
    function get_all_genre()
    {
        $genres = Http::withToken(env('TMDB_TOKEN'))
            ->get('http://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];
        return collect($genres)->mapWithKeys(function ($gen) {
            return [$gen['id'] => $gen['name']];
        });
    }
}
