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
        if($popup)
        {
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
        }else{
            return view('welcome',[
                'posts'  =>$posts,
                'status' =>1
            ]);
        }
        
    }

    public function novedades()
    {
        $meses = array("Enero","Febrero","Marzo","Abril","Mayo","Junio","Julio","Agosto","Septiembre","Octubre","Noviembre","Diciembre");
        //$fecha = Carbon::parse($inputs['Fecha']);
        $noticias = Post::latest('published')->paginate(4);
        return view('front.novedades',[
            'noticias'  =>$noticias,
            'meses'     =>$meses
        ]);
    }

    public function formContactoFrontend(Request $request)
    {
        //dd($request);
        $data = [
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'mensaje' => $request->mensaje
            ];
        $to = 'maurotello73@gmail.com';
        \Mail::to($to)->send(new \App\Mail\SendContactFront($data));
        return redirect()->route('paginarrhh');
    }
}
