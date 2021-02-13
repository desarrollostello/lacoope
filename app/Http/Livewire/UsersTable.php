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

    protected $queryString = [
        'search' => ['except' => ''],
        'perPage'
    ];

    public function render()
    {
        return view('livewire.users-table', [
            'users' => User::where('name', 'LIKE', "%$this->search%")
                        ->orWhere('email', 'LIKE', "%$this->search%")
                        ->paginate($this->perPage)
        ]);
    }
}
