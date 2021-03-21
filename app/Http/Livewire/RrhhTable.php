<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Rrhh;
use Livewire\WithPagination;
use Illuminate\Http\Request;
use Illuminate\Support\Str;

class RrhhTable extends Component
{
    use WithPagination;

    public $search ='';
    public $perPage ='10';

    public $view = 'create';

    public $nombre, $email, $telefono, $file;

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];


    protected $rules = [
        'nombre'        => 'required',
        'email'         => 'required|email',
        'telefono'      => 'required',
        'file'          => 'required',        
    ];
    protected $messages = [
        'nombre.required'       => 'El campo Nombre es obligatoria',
        'email.required'        => 'El campo Email es obligatorio',
        'email.required'        => 'Por favor ingrese un email válido',
        'telefono.required'     => 'El campo Teléfono es obligatorio',
        'file.required'         => 'Deberá subir un archivo'
    ];


    public $field = null;
    public $order = null;

    public function render()
    {
        $rrhhs = Rrhh::where('nombre', 'LIKE', "%$this->search%")->orderBy('created_at', 'desc');
        if ($this->field && $this->order) {
            $rrhhs = $rrhhs->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $curriculums = $rrhhs->paginate($this->perPage);

        return view('livewire.rrhh.index',[
            'curriculums' => $curriculums,
        ]);
     //   return view('livewire.rrhh-table');
    }

    public function sortBy($field)
    {
        switch ($this->order) {
            case null:
                $this->order = 'asc';
                break;
            
            case 'asc':
                $this->order = 'desc';
                break;

            case 'desc':
                $this->order = 'asc';
                break;
        }
        $this->field = $field;
    }

    public function updatingSearch()
    {
        $this->resetPage();
    }

    public function clear()
    {
        $this->page = 10;
        $this->order = null;
        $this->field = null;
        $this->search = '';
    }

    public function default()
    {
        $this->nombre = '';
        $this->view = 'create';
    }

    public function create()
    {
        return view('livewire.rrhh.create');
    }

    public function store(Request $request)
    {
       dd($request);

       $this->validate([
            'nombre'        => 'required',
            'email'         => 'required|email',
            'telefono'      => 'required',
            'file'          => 'required',     
        ]);

        /*
        if($request->file('file'))
        {
            $destination_path = 'cv';
            $image_name = 'cv.' . $request->file('file')->getClientOriginalExtension();
            $path = $request->file('file')->storeAs($destination_path, $image_name);
            $data2['file'] = $image_name;
            //$url = Storage::put('curriculums', $request->file('file'));
        }
        */
        
        $rrhh = Rrhh::create([
            'nombre'   => $this->nombre,
            'email'    => $this->email,
            'telefono' => $this->telefono,
            'slug'  => Str::random(5) . '-' . Str::slug($this->nombre)
        ]);



            /*
       $validatedData = $this->validate();
       

        $rrhh = Rrhh::create([
            'nombre'      => $validatedData['nombre'],
            'email'      => $validatedData['email'],
            'telefono'    => $validatedData['telefono'],
            'email'   => $validatedData['email'],
            'slug'      => Str::slug($validatedData['nombre']),
        ]);

                */


        session()->flash('message', 'Curriculum cargado Satisfactoriamente!!!.');
        $this->resetInputFields();
    }

    public function resetInputFields()
    {
        $this->nombre = '';
        $this->telefono = '';
        $this->email = '';
        $this->file = '';
    }

    public function edit($id)
    {
        $rrhh = Rrhh::find($id);
        $this->rrhh_id = $rrhh->id;
        $this->nombre = $rrhh->nombre;
        $this->telefono = $rrhh->telefono;
        $this->email = $rrhh->email;
        $this->view = 'edit';
    }
}
