<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Category;
use Livewire\WithPagination;

use Illuminate\Support\Str;

class CategoriesTable extends Component
{

    use WithPagination;

    public $search ='';
    public $perPage ='10';

    public $view = 'create';

    public $name, $color, $category_id;

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];

    protected $listeners = ['changeColor'];

    public $field = null;
    public $order = null;


    public function changeColor($color)
    {
        $this->color = $color;
    }

    public function render()
    {
        $categories = Category::where('name', 'LIKE', "%$this->search%");
        if ($this->field && $this->order) {
            $categories = $categories->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        $categories = $categories->paginate($this->perPage);
        return view('livewire.category.index', [
            'categories' => $categories
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
            'name'  => 'required',
            'color' => 'nullable'
        ]);
        
        $category = Category::create([
            'name'  => $this->name,
            'color' => $this->color,
            'slug'  => Str::random(5) . '-' . Str::slug($this->name)
        ]);

        $this->default();
    }

    public function update()
    {
        $this->validate([
            'name'  => 'required',
            'color' => 'nullable'
        ]);

        $category = Category::find($this->category_id);

        $category->update([
            'name'  => $this->name,
            'color' => $this->color,
            'slug'  => Str::random(5) . '-' . Str::slug($this->name)
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
        Category::destroy($id);
    }

    public function default()
    {
        $this->name = '';
        $this->color = '';
        $this->view = 'create';
    }

    public function edit($id)
    {

        $category = Category::find($id);
        $this->category_id = $category->id;
        $this->name        = $category->name;
        $this->color       = $category->color;
        $this->view        = 'edit';
    }
    public function resetInputFields()
    {
        $this->name = '';
        $this->color = '#DBB8B8';

    }

}
