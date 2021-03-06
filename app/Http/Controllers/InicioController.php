<?php

namespace App\Http\Controllers;

use App\Http\Controllers\Controller;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Popup;

class InicioController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published')->paginate(10);
        $popup = Popup::find(20);
        $status = (int) $popup->status;
        return view('welcome',[
            'posts'  =>$posts,
            'popup' => $popup,
            'status' =>$status
        ]);
    }
}
