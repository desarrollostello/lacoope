<?php

namespace App\Http\Livewire;

use Livewire\Component;
use App\Models\Tag;
use Livewire\WithPagination;

use Illuminate\Support\Str;

class TagsTable extends Component
{

    use WithPagination;

    public $search ='';
    public $perPage ='10';

    public $view = 'create';

    public $name, $color, $tag_id;

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];

    protected $listeners = ['changeColor'];

    public function changeColor($color)
    {
        $this->color = $color;
    }

    public $field = null;
    public $order = null;

    public function render()
    {
        $tags = Tag::where('name', 'LIKE', "%$this->search%");
        if ($this->field && $this->order) {
            $tags = $tags->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $tags = $tags->paginate($this->perPage);
        return view('livewire.tag.index', [
            'tags' => $tags
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
        $tag = Tag::create([
            'name'  => $this->name,
            'color' => $this->color,
            'slug'  => Str::random(5) . '-' . Str::slug($this->name)
        ]);

        $this->edit($tag->id);
    }

    public function update()
    {
        $this->validate([
            'name'  => 'required',
            'color' => 'nullable'
        ]);

        $tag = Tag::find($this->tag_id);

        $tag->update([
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
        Tag::destroy($id);
    }

    public function default()
    {
        $this->name = '';
        $this->color = '';
        $this->view = 'create';
    }

    public function edit($id)
    {
        $tag = Tag::find($id);
        $this->tag_id = $tag->id;
        $this->name   = $tag->name;
        $this->color  = $tag->color;

        $this->view   = 'edit';
    }

}
