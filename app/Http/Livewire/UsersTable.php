<?php

namespace App\Http\Livewire;

use App\Models\Post;
use App\Models\User;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Facades\Gate;
use Illuminate\Support\Str;
use RealRashid\SweetAlert\Facades\Alert;
use Spatie\Permission\Models\Role;


class UsersTable extends Component
{
    use WithPagination;

    public $search ='';
    public $perPage ='1';

    public $view = 'create';

    public $name, $email, $dni, $user_id;

    protected $queryString = [
        'search'=> ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];

    public $field = null;
    public $order = null;

    public function render()
    {
        
        //toast('Your Post as been submited!','success');
        //alert()->warning('Title','Lorem Lorem Lorem');
        //Alert::warning('Atención!', 'Ud no puede modificar este usuario!');

        $users = User::where('name', 'LIKE', "%$this->search%")
        ->orWhere('email', 'LIKE', "%$this->search%");
        if ($this->field && $this->order) {
            $users = $users->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $users = $users->paginate($this->perPage);

        return view('livewire.user.index', [
            'users' => $users,
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

    public function update()
    {
        $user = User::find($this->user_id);
        
        if (! Gate::allows('update-user', $this->user_id)) {
            session()->flash('error', 'Ud no puede actualizar este usuario!!!');
        }
        /* 
            para registrar los roles hacer 
            $user->roles()->sync($request->roles);
            lo tengo que cambiar pero me da una idea
        */

        $this->validate([
            'name'  => 'required',
            'email' => 'required|email',
            'dni'   => 'nullable'
        ]);

        $user->update([
            'name'  => $this->name,
            'email' => $this->email,
            'dni'   => $this->dni,
            'slug'  => Str::random(5) . '-' . Str::slug($this->name)
        ]);

        $this->default();
        session()->flash('success', 'Usuario actualizado correctamente!!!');
    }

    public function clear()
    {
        $this->page   = 1;
        $this->order  = null;
        $this->field  = null;
        $this->search = '';
    }

    public function destroy($id)
    {
        User::destroy($id);
    }

    public function default()
    {
        $this->name  = '';
        $this->email = '';
        $this->dni   = '';
        $this->view  = 'create';
    }

    public function edit($id)
    {
        if (! Gate::allows('update-user', $id)) {
            session()->flash('error', 'Ud no puede modificar este usuario!!');
            //toast('Your Post as been submited!','success');
            //alert()->warning('Title','Lorem Lorem Lorem');
            //Alert::warning('Atención!', 'Ud no puede modificar este usuario!');
            return;
        }
      
        $user = User::find($id);
        $this->user_id = $user->id;
        $this->name    = $user->name;
        $this->email   = $user->email;
        $this->dni     = $user->dni;
        
        $this->view    = 'edit';
    }

}
