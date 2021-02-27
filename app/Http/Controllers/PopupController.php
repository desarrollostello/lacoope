<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use App\Http\Requests\PopupRequest;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Session;

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
        $url = "";
        $data = $request->all();
        $data['user_id'] = Auth::user()->id;
        $data['slug'] = Str::slug($request->name);

        if($request->file('file'))
        {
            $value = $request->file('file');
            $imageName = time() . '-' . $value->getClientOriginalName();
            $value->move(public_path('storage/popups/'), $imageName);
            $data['file'] = public_path('storage/popups/') . $imageName;
        }
        
        if (Popup::create($data))
        {
            Session::flash('message-success', 'Popup creado satisfactoriamente.');
        
        }else{
            Session::flash('message-danger', 'Error al intentar guardar el Popup');
        }

        return redirect()->route('popups2');
    }

    public function show(Popup $popup)
    {   
        return view('popups.show', [
            'popup'      => $popup
        ]);
    }


    public function edit(Popup $popup)
    {
        //$popup = Popup::all();
        return view('popups.edit', [
            'popup'  => $popup
        ]);
    }

    public function update(PopupRequest $request, Popup $popup)
    {
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
        $borrado = $popup->delete();
        if($imagenActual && $borrado)
        {
            Storage::delete($popup->url);
        }
        return redirect()->route('popups2')->with('info', 'El Popup se ha eliminado correctamente');
    }
}
