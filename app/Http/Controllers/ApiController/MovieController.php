<?php

namespace App\Http\Controllers\ApiController;

use App\Http\Controllers\Controller;
use Illuminate\Support\Facades\Auth;
use App\Models\Movie;
use App\Models\Comment;
use App\Http\Resources\MovieCollection;
use App\Http\Resources\MovieResource;
use Illuminate\Support\Facades\Request;

class MovieController extends Controller
{
    /**
     * Display a listing of the resource.
     *
     * @return \Illuminate\Http\Response
     */
    public function index()
    {
  
        $isAuth = Auth::guard('web')->check();
        $genres = [
            array( "id" => 1, "name" => "Action" ),
            array( "id" => 2, "name" => "Drama" )
        ]; 
        $banner = array( 
            'title' => "Kruty 1918 (2019)", 
            'summary' => "ယူကရိန်းကို ကမ္ဘာက လွတ်လပ်တဲ့နိုင်ငံအဖြစ် အသိအမှတ်ပြုဖို့ အသင့်ဖြစ်နေပါပြီ။ ဒါပေမယ့် လွတ်လပ်ရေးလမ်းကြောင်းကို အနှောင့်အယှက်ပေးနေတဲ့ ရုရှားစစ်တပ်ဟာ ယူကရိန်းမြို့တွေကို တစ်မြို့ပြီးတစ်မြို့သိမ်းယူရင်း မြို့တော် ကီဗီ ကိုသိမ်းဖို့အထိစီစဉ် ထားခဲ့ပါတယ်။", 
            'cover_image' => "https://channelmyanmar.org/wp-content/uploads/2023/02/MV5BNDBkNmVkMzQtNWI0Yi00ODgzLWJmYTQtMzc4N2ExNDFkN2ZjXkEyXkFqcGdeQXVyNDAwMzY0OTk@._V1_FMjpg_UX1000_.jpg", 
            'genres' => 'Action', 
            'author' => 'Aleksey Shaparev', 
            'tags' => "Action drama", 
            'imdb_ratings' => 9.0, 
            'pdf_download_link' => "https://channelmyanmar.org/kruty-1918-2019/"
         ); 
        $movies = Movie::take(15)->orderBy('id', 'DESC')->get();
        $popularMovies = Movie::take(15)->orderBy('id', 'ASC')->get();

        return response()->json([
            "is_auth" => $isAuth, 
            "genres" => $genres,
            "banner" => $banner,
            "movies" => new MovieCollection($movies),
            "popular_movies" => new MovieCollection($popularMovies)
        ], 200);
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
        $user = Auth::user(); 
        Request::merge([
            'user_id' => $user->id 
        ]);
        $movie = Movie::create(
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

        return response()->json([
            "status" => true,
            "data" => $movie
        ], 200);
    }

    /**
     * Display the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function show($id)
    {
        $movie = Movie::find( $id ); 
        $isAuth = Auth::guard('web')->check();




        $relatedMovies = Movie::orderBy('id', 'desc')
                        ->take(4)
                        ->get(); 




        $comments = Comment::with(['user'])
                            ->where('movie_id', $movie->id )
                            ->orderBy('id', 'desc')
                            ->take(15)
                            ->get(); 

        return response()->json([
            "is_auth" => $isAuth, 
            "movie" => new MovieResource($movie),
            "related_movies" => new MovieCollection( $relatedMovies), 
            "comments" => $comments 
        ], 200);
    }

    /**
     * Show the form for editing the specified resource.
     *
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function destroy($id)
    {
        $item = Movie::find($id); 
        $item->delete();

        return response()->json([
            "status" => true,
            "message" => "Deleted",
            "data" => $item
        ], 200);

    }

    /**
     * Update the specified resource in storage.
     *
     * @param  \Illuminate\Http\Request  $request
     * @param  int  $id
     * @return \Illuminate\Http\Response
     */
    public function update(Movie $movie, $id)
    {
        $movie->update(
            Request::all()
        );
        return response()->json([
            "status" => true,
            "message" => "Updated",
            "data" => $movie
        ], 200);
    }


}
