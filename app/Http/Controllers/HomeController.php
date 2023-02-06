<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Inertia\Inertia;
use App\Models\Movie;
use Illuminate\Support\Facades\Auth;

class HomeController extends Controller
{

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

        return Inertia::render('Home/Index', [
            "is_auth" => $isAuth, 
            "genres" => $genres,
            "banner" => $banner,
            "movies" => $movies,
            "popular_movies" => $popularMovies
        ]);
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
