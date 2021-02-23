<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use App\Http\Requests\PopupRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;

class PopupController extends Controller
{
    public function index()
    {
        $popups = Popup::latest('start_date')->paginate(10);
        return view('popups.index',[
            'popups' =>$popups
        ]);
    }

    
    public function create()
    {
        
        return view('popups.create');
    }


    public function store(PopupRequest $request)
    {
        
        $popup = Popup::create([
            'name'      => $request->name,
            'published' => $request->published,
            'status'    => $request->status,
            'extract'   => $request->extract,
            'body'      => $request->body,
            'slug'      => Str::slug($request->name)
            //'user_id'   => auth()->user()->id
        ]);

        if($request->file('file'))
        {
            $url = Storage::put('popups', $request->file('file'));
        }

        return redirect()->route('popups.index');
    }

    public function show(Popup $popup)
    {   
        return view('popups.show', [
            'popup'      => $popup
        ]);
    }


    public function edit(Popup $popup)
    {
        //$this->authorize('popup', $popup);
        $popup = Popup::all();
        return view('popups.edit', [
            'popup'  => $popup
        ]);
    }

    public function update(PopupRequest $request, Popup $popup)
    {
        //$this->authorize('author', $post);
        $imagenActual = $popup->url;
        $popup->update($request->all());

        if ($request->file('file'))
        {
            $url = Storage::put('popups', $request->file('file'));

            if($imagenActual)
            {
                Storage::delete($popup->url);
            }
        }
        return redirect()->route('popup.show', $popup)->with('info', 'El Popup se actualizó correctamente');

    }

    public function destroy(Popup $popup)
    {
        $imagenActual = $popup->url;
        //$this->authorize('author', $post);
        $borrado = $popup->delete();
        if($imagenActual && $borrado)
        {
            Storage::delete($popup->url);
        }
    }
}
