<?php

namespace App\Http\Controllers;

use App\Models\Popup;
use App\Http\Requests\PopupRequest;
use Exception;
use Illuminate\Support\Facades\Storage;
use Illuminate\Http\Request;
use Illuminate\Support\Str;
use Illuminate\Support\Facades\Auth;
use Carbon\Carbon;
use Illuminate\Support\Facades\Session;
use PhpParser\Node\Expr\New_;

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
        try 
        {
            $data = $request->all();

            $popup = New Popup();
            if(!$popup->autorizePopup($request))
            {
                throw new Exception("Ya existe un popup activo, no puede poner otro para la misma fecha", 1);
            }

            $data['user_id'] = Auth::user()->id;
            $data['slug'] = Str::slug($request->name);

            
            if($request->file('file'))
            {
                $value = $request->file('file');
                $filename = $this->getFilename($value);
                $check    = $this->permittedFile($value->getClientOriginalExtension());
                if($check)
                {
                    if($this->moveFile($value, $filename))
                    {
                        $data['file'] = $filename;
                    }
                }
            }

            Popup::create($data);
            session()->flash('success', 'Popup creado correctamente!!!');
        
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('popups2');//throw $th;
        
    }

    public function show(Popup $popup)
    {
        return view('popups.show', [
            'popup'      => $popup
        ]);
    }


    public function edit(Popup $popup)
    {
        return view('popups.edit', [
            'popup'  => $popup
        ]);
    }

    public function update(PopupRequest $request, Popup $popup)
    {
        try 
        {
            $data = $request->all();

            if(!$popup->autorizePopup($request))
            {
                throw new Exception("Ya existe un popup activo, no puede poner otro para la misma fecha", 1);
            }

            if ($request->hasfile('file'))
            {
                $value = $request->file('file');
                $filename = $this->getFilename($value);
                $check    = $this->permittedFile($value->getClientOriginalExtension());
                if($check)
                {
                    if($this->moveFile($value, $filename))
                    {
                        $data['file'] = $filename;
                        $this->deleteOldFile($popup->file);
                    }
                }
            }
            if ($data['name'])
                $data['slug'] = Str::slug($data['name']);
            $popup->fill($data)->update();
            session()->flash('success', 'Popup actualizado correctamente!!!');
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }
        return redirect()->route('popups2');//throw $th;
    }

    private function getFilename($value)
    {
        $now = new \DateTime();
        $fullName = $value->getClientOriginalName();
        $extension = $value->getClientOriginalExtension();
        $onlyName = explode('.'.$extension,$fullName);
    
        $filename = rand(1,10000) . "-"  . Str::slug($now->format('d-m-Y H:i:s')) . "-" . $onlyName[0]  . "." . $extension;
        return $filename;
    }

    private function permittedFile($extension)
    {
        $allowedfileExtension=['jpeg','JPEG', 'jpg','png','JPG','PNG','gif', 'GIF'];
        return $check=in_array($extension,$allowedfileExtension);
    }

    private function moveFile($value, $file)
    {
        return ($value->move('storage/popups/', $file))?true:false;
    }

    private function deleteOldFile($actual)
    { 
        if(file_exists('storage/popups/' . $actual))
        {
            return (unlink('storage/popups/' . $actual))?true: false;
        }
        return true;
    }

    public function destroy(Popup $popup)
    {
        $imagenActual = $popup->file;
        $borrado = $popup->delete();
        if($imagenActual && $borrado)
        {
            Storage::delete('popups/'. $popup->file);
        }
        if($borrado)
        {
            session()->flash('success', 'Popup borrado correctamente!!!');
        }else{
            session()->flash('error', 'Error al intentar borrar el popup !!!');
        }
        return redirect()->route('popups2');
    }
}
