<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Storage;
use App\Jobs\SendRrhhMail;
use Illuminate\Support\Str;
use Exception;
use App\Models\Rrhh;
use App\Http\Requests\FrontRrhhRequest;

class FrontrrhhController extends Controller
{
    public function indexFront()
    {
        return view('front.rrhh');
    }

    public function create()
    {
        return view('rrhh.create');
    }


    public function store(Request $request)
    {
        try 
        {
            $data2 = [
                'nombre'   => $request->nombre,
                'telefono' => $request->telefono,
                'email'    => $request->email,
                'slug'     => Str::slug($request->nombre)
            ];

            if($request->file('file'))
            {
                $destination_path = 'cv';
                $image_name = 'cv-' . Str::slug($request->nombre)  . '.' . $request->file('file')->getClientOriginalExtension();
                //dd($image_name);
                $path = $request->file('file')->storeAs($destination_path, $image_name);
                $data2['file'] = $image_name;
            }
            
            $creado = Rrhh::create($data2);
            $data = [
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'file'     => $request->file('file')
            ];

            //$to = 'maurotello73@gmail.com';
            //\Mail::to($to)->send(new \App\Mail\SendRrhh($data));
            return redirect()->route('curriculum');
            session()->flash('success', 'Formulario enviado correctamente!!!');
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }

    }


    public function storeFront(Request $request)
    {
        try 
        {
            $data2 = [
                'nombre'   => $request->nombre,
                'telefono' => $request->telefono,
                'email'    => $request->email,
                'slug'     => Str::slug($request->nombre)
            ];

            if($request->file('file'))
            {
                $destination_path = 'cv';
                $image_name = 'cv-' . Str::slug($request->nombre)  . '.' . $request->file('file')->getClientOriginalExtension();
                //dd($image_name);
                $path = $request->file('file')->storeAs($destination_path, $image_name);
                $data2['file'] = $image_name;
            }
            
            $creado = Rrhh::create($data2);
            $data = [
            'nombre'   => $request->nombre,
            'email'    => $request->email,
            'telefono' => $request->telefono,
            'file'     => $request->file('file')
            ];

            $to = 'maurotello73@gmail.com';
            \Mail::to($to)->send(new \App\Mail\SendRrhh($data));
            return redirect()->route('curriculum');
            session()->flash('success', 'Formulario enviado correctamente!!!');
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }

    }

    public function show(Rrhh $curriculum)
    {
        return view('rrhh.show', [
            'curriculum' => $curriculum
        ]);
    }

    public function edit(Rrhh $curriculum)
    {
        
       //$this->authorize('author', $post);   
        return view('rrhh.edit', [
            'curriculum'  => $curriculum
        ]);
    }

    public function update(Request $request, Rrhh $curriculum)
    {
        try {
            $data2 = [
                'nombre'   => $request->nombre,
                'email'    => $request->email,
                'telefono' => $request->telefono,
            ];

            if ($request->file('file'))
            {
                $destination_path = 'cv';
                $image_name = rand(1,10000) . "-" . "cv-" . Str::slug($request->nombre)  . '.' . $request->file('file')->getClientOriginalExtension();
                $path = $request->file('file')->storeAs($destination_path, $image_name);
                if($path)
                {
                    $path = Storage::path('cv/');
                    $this->deleteOldFile( $path . $curriculum->file);
                }
                $data2['file'] = $image_name;
            }
        
            $curriculum->update($data2);
            $data = [
                'nombre'   => $request->nombre,
                'email'    => $request->email,
                'telefono' => $request->telefono,
                'file'     => $request->file('file')
            ];

            //$to = 'maurotello73@gmail.com';
            //\Mail::to($to)->send(new \App\Mail\SendRrhh($data));
            return redirect()->route('curriculum');
            session()->flash('success', 'Formulario actualizado correctamente!!!');
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }

        return redirect()->route('curriculum');
        //return redirect()->route('rrhh.ver', $rrhh)->with('info', 'El Curriculum se actualizó correctamente');

    }

    public function destroy(Rrhh $rrhh)
    {
       // $this->authorize('author', $rrhh);
        $rrhh->delete();
    }

    private function deleteOldFile($actual)
    { 
        if(file_exists($actual))
        {
            return (unlink($actual))?true: false;
        }
        return true;
    }


    private function permittedFile($extension)
    {
        $allowedfileExtension=['jpeg','JPEG', 'pdf','jpg','png','JPG','PNG','gif', 'GIF'];
        return $check=in_array($extension,$allowedfileExtension);
    }
}
