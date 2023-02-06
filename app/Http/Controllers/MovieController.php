<?php

namespace App\Http\Controllers;

use App\Models\Movie;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Redirect;
use Illuminate\Support\Facades\Request;
use Illuminate\Validation\Rule;
use Inertia\Inertia;

class MovieController extends Controller
{
    public function index()
    {
        $user = Auth::user();
        return Inertia::render('Movies/Index', [
            'filters' => Request::all('search', 'trashed'),
            'movies' => Movie::orderByTitle()
                ->filter(Request::only('search', 'trashed'))
                ->where('user_id', $user->id)
                ->paginate(10)
                ->withQueryString()
                ->through(fn ($item) => [
                    'id' => $item->id,
                    'title' => $item->title,
                    'author' => $item->author,
                    'imdb_ratings' => $item->imdb_ratings,
                ]),
        ]);
    }

    public function create()
    {
        return Inertia::render('Movies/Create', [
            
        ]);
    }

    public function store()
    {
        $user = Auth::user(); 
        Request::merge([
            'user_id' => $user->id 
        ]);
        Movie::create(
            Request::validate([
                'user_id' => ['required'],
                'title' => ['required'],
                'summary' => ['nullable'],
                'author' => ['nullable'],
                'cover_image' => ['nullable'],
                'genres' => ['nullable'],
                'pdf_download_link' => ['nullable'],
                'tags' => ['nullable'],
                'imdb_ratings' => ['nullable']
            ])
        );

        return Redirect::route('movies')->with('success', 'Movie created.');
    }

    public function edit(Movie $movie)
    {
        return Inertia::render('Movies/Edit', [
            'movie' => [
                'id' => $movie->id,
                'title' => $movie->title,
                'summary' => $movie->summary,
                'cover_image' => $movie->cover_image,
                'genres' => $movie->genres,
                'author' => $movie->author,
                'tags' => $movie->tags,
                'imdb_ratings' => $movie->imdb_ratings,
                'pdf_download_link' => $movie->pdf_download_link,
                
            ]
        ]);
    }

    public function update(Movie $movie)
    {
        $movie->update(
            Request::validate([
                'title' => ['required'],
                'summary' => ['nullable'],
                'author' => ['nullable'],
                'cover_image' => ['nullable'],
                'genres' => ['nullable'],
                'pdf_download_link' => ['nullable'],
                'tags' => ['nullable'],
                'imdb_ratings' => ['nullable']
            ])
        );

        return Redirect::back()->with('success', 'Contact updated.');
    }

    public function destroy(Movie $movie)
    {
        $movie->delete();

        return Redirect::back()->with('success', 'Movie deleted.');
    }

    public function restore(Contact $contact)
    {
        $contact->restore();

        return Redirect::back()->with('success', 'Contact restored.');
    }
}
