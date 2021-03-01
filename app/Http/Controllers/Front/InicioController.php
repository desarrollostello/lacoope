<?php

namespace App\Http\Controllers\Front;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;

class InicioController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published')->paginate(10);
        return view('welcome',[
            'posts' =>$posts
        ]);
    }
}
