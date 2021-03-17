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
        return view('rrhhs.create');
    }

    

    public function store(FrontRrhhRequest $request)
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
                $image_name = 'cv.' . $request->file('file')->getClientOriginalExtension();
                $path = $request->file('file')->storeAs($destination_path, $image_name);
                $data2['file'] = $image_name;
                //$url = Storage::put('curriculums', $request->file('file'));
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
            return redirect()->route('rrhh');
            session()->flash('success', 'Formulario enviado correctamente!!!');
        } catch (Exception $e) {  
            session()->flash('error', $e->getMessage());
        }
                /*
                //dd($request);
                $data = $request->all();
                $nombre = $data['nombre'];
                $telefono = $data['telefono'];
                $email = $data['email'];

                if ($request->hasfile('file'))
                {
                    $destination_path = 'cv';
                    $image_name = 'cv.' . $request->file('file')->getClientOriginalExtension();
                    $path = $request->file('file')->storeAs($destination_path, $image_name);
                }

                $result = SendRrhhMail::dispatch($nombre, $telefono, $email);
                */
        
        
    }

    public function show(Rrhh $rrhh)
    {
        return view('posts.show', [
            'rrhh'      => $rrhh
        ]);
    }

    public function edit(Rrhh $rrhh)
    {   
       //$this->authorize('author', $post);   
        return view('posts.edit', [
            'rrhh'  => $rrhh
        ]);
    }

    public function update(FrontRrhhRequest $request, Rrhh $rrhh)
    {
        //$this->authorize('author', $post);
        $rrhh->update($request->all());

        if ($request->file('file'))
        {
            $url = Storage::put('curriculum', $request->file('file'));
        }
        return redirect()->route('rrhh.ver', $rrhh)->with('info', 'El Curriculum se actualizó correctamente');

    }

    public function destroy(Rrhh $rrhh)
    {
       // $this->authorize('author', $rrhh);
        $rrhh->delete();
    }


    private function permittedFile($extension)
    {
        $allowedfileExtension=['jpeg','JPEG', 'pdf','jpg','png','JPG','PNG','gif', 'GIF'];
        return $check=in_array($extension,$allowedfileExtension);
    }
}
