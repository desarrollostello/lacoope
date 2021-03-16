<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Subscripcion;
use Livewire\WithPagination;

class SubscripcionTable extends Component
{

    use WithPagination;

    public $search ='';
    public $perPage ='10';

    public $view = 'create';

    public $email, $subscripcion_id, $desde;

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];

    protected $messages = [
        'email.required'         => 'El campo Email es obligatorio',
        'email.email'            => 'Ingrese un email válido',        
    ];

    //protected $listeners = ['changeColor'];

    public $field = null;
    public $order = null;

/*
    public function changeColor($color)
    {
        $this->color = $color;
    }
*/
    public function render()
    {
        $subscripciones = Subscripcion::where('email', 'LIKE', "%$this->search%");
        if ($this->field && $this->order) {
            $subscripciones = $subscripciones->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        $subscripciones = $subscripciones->paginate($this->perPage);

       
        if ($this->desde == 'front')
        {
            return view('livewire.subscripcion-table');
        }

        return view('livewire.subscripcion.index', [
            'subscripciones' => $subscripciones
        ]);
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

    

    public function store()
    {
        
        $this->validate([
            'email'  => 'required|email'
        ]);
        
        $subscripcion = Subscripcion::create([
            'email'  => $this->email
        ]);

        $this->default();
    }

    public function update()
    {
        $this->validate([
            'email'  => 'required|email'
        ]);

        $subscripcion = Subscripcion::find($this->subscripcion_id);

        $subscripcion->update([
            'email'  => $this->email
        ]);

        $this->default();
    }

    public function clear()
    {
        $this->page = 1;
        $this->order = null;
        $this->field = null;
        $this->search = '';
    }

    public function destroy($id)
    {
        Subscripcion::destroy($id);
    }

    public function default()
    {
        $this->email = '';
        $this->view = 'create';
    }

    public function edit($id)
    {

        $subscripcion = Subscripcion::find($id);
        $this->subscripcion_id = $subscripcion->id;
        $this->email        = $subscripcion->email;
        $this->view        = 'edit';
    }
    public function resetInputFields()
    {
        $this->email = '';
    }

}

