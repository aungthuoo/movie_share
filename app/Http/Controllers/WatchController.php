<?php

namespace App\Http\Controllers;


use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;
use App\Models\Movie;
use App\Models\Comment;

class WatchController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index(Request $request)
    {

        $popularMovies = Movie::take(15)->orderBy('id', 'ASC')->get();
        return Inertia::render('Watch/Index', [
            'filters' => Request::all('search', 'trashed'),

            'popular_movies' => $popularMovies, 
            'movies' => Movie::orderByTitle()
                ->filter(Request::only('search', 'trashed'))
                ->paginate(3)
                ->withQueryString()
                ->through(fn ($item) => [
                    'id' => $item->id,
                    'title' => $item->title,
                    'imdb_ratings' => $item->imdb_ratings,
                    'cover_image' => $item->cover_image,
                ]),
        ]);
    }

    /**
     * Show the form for creating a new resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function watch(Movie $movie)
    {
        //$movies = Movie::take(15)->orderBy('id', 'ASC')->get();
        $isAuth = Auth::guard('web')->check();




        $relatedMovies = Movie::orderBy('id', 'desc')
                        ->take(4)
                        ->get(); 




        $comments = Comment::with(['user'])
                            ->where('movie_id', $movie->id )
                            ->orderBy('id', 'desc')
                            ->take(15)
                            ->get(); 

        return Inertia::render('Watch/Show', [
            "is_auth" => $isAuth, 
            "movie" => $movie,
            "related_movies" => $relatedMovies, 
            "comments" => $comments 
        ]);

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
