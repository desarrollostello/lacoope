<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Popup;
use Carbon\Carbon;

class InicioController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published')->take(4)->get();
        $popup = Popup::where('status', 2)->first();
        $datenow   = date("Y-m-d");
        $datestart = Carbon::parse($popup->start_date)->format('Y-m-d');
        $dateend   = Carbon::parse($popup->end_date)->format('Y-m-d');
        if(($datenow >= $datestart) && ($datenow <= $dateend))
        {
            return view('welcome',[
                'posts'  =>$posts,
                'popup' => $popup,
                'status' =>2
            ]);
        }else{
            return view('welcome',[
                'posts'  =>$posts,
                'status' =>1
            ]);
        }  
    }

    public function novedades()
    {
        $noticias = Post::latest('published')->paginate(4);
        return view('front.novedades',[
            'noticias'  =>$noticias
        ]);
    }
}
