<?php

namespace App\Http\Livewire;

use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;

class UsersTable extends Component
{
    use WithPagination;

    public $search ='';
    public $perPage ='1';

    public $name, $email, $dni;

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];

    public $field = null;
    public $order = null;

    public function render()
    {
        $users = User::where('name', 'LIKE', "%$this->search%")
        ->orWhere('email', 'LIKE', "%$this->search%");
        if ($this->field && $this->order) {
            $users = $users->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $users = $users->paginate($this->perPage);

        return view('livewire.users-table', [
            'users' => $users
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
        User::create([
            'name'  => $this->name,
            'email' => $this->email,
            'dni'   => $this->dni
        ]);
    }

    public function clear()
    {
        $this->page = 1;
        $this->order = null;
        $this->field = null;
        $this->search = '';
    }

}
