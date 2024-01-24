<?php

namespace App\Http\Controllers;

use Carbon\Carbon;
use Illuminate\Support\Facades\Http;
use Illuminate\Http\Request;
use function PHPSTORM_META\map;

class MoviesController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
        $trendingMovies = Http::withToken(env('TMDB_TOKEN'))
            ->get('http://api.themoviedb.org/3/trending/movie/day?language=en-US')
            ->json()['results'];

        $trending = collect($trendingMovies)->map(function ($movie) {
            $gen = collect($movie['genre_ids'])->mapWithKeys(function ($val) {
                return [$val => get_all_genre()->get($val)];
            })->implode(',');
            return collect($movie)->merge([
                'genres' => $gen,
                'vote_average' => $movie['vote_average']
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
        /* $genres = Http::withToken(env('TMDB_TOKEN'))
            ->get('http://api.themoviedb.org/3/genre/movie/list')
            ->json()['genres'];

        $genre = collect($genres)->mapWithKeys(function ($gen) {
            return [$gen['id'] => $gen['name']];
        });*/

        $nowPlayingMovies = Http::withToken(env('TMDB_TOKEN'))
            ->get('http://api.themoviedb.org/3/movie/now_playing')
            ->json()['results'];
        $playing = collect($nowPlayingMovies)->map(function ($movie) {
            $gen = collect($movie['genre_ids'])->mapWithKeys(function ($val) {
                return [$val => get_all_genre()->get($val)];
            })->implode(',');
            return collect($movie)->merge([
                'genres' => $gen,
                'vote_average' => $movie['vote_average']
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
        $topRatingMovies = Http::withToken(env('TMDB_TOKEN'))
            ->get('http://api.themoviedb.org/3/movie/top_rated')
            ->json()['results'];
        $rating = collect($topRatingMovies)->map(function ($movie) {
            $gen = collect($movie['genre_ids'])->mapWithKeys(function ($val) {
                return [$val => get_all_genre()->get($val)];
            })->implode(',');
            return collect($movie)->merge([
                'genres' => $gen,
                'vote_average' => $movie['vote_average']
            ])->only([
                'poster_path', 'id', 'genre_ids', 'title', 'vote_average', 'overview', 'release_date', 'genres',
            ]);
        });
        // dd($trending->splitIn(5)->toArray());
        $trending_carsl = $trending->splitIn(5);
        return view('movies.index', ['trending' => $trending, 'trending_carsl' => $trending_carsl, 'playing' => $playing, 'rating' => $rating]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function create()
    {
        //
    }

    /**
     * Store a newly created resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @return \Illuminate\Http\Response
     */
    public function store(Request $request)
    {
        //
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        //
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function edit($id)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Request $request, $id)
    {
        //
    }

    /**
     * Remove the specified resource from storage.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        //
    }
}
