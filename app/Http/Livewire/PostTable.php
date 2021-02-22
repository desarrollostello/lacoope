<?php

namespace App\Http\Livewire;

use App\Models\Category;
use App\Models\Post;
use App\Models\Tag;
use Livewire\Component;
use Livewire\WithPagination;
use Illuminate\Support\Str;

class PostTable extends Component
{
    use WithPagination;

    public $search ='';
    public $perPage ='10';

    public $view = 'create';

    public $name, $date, $post_id, $extract, $body, $status, $user_id, $created_at;

    public $categoriesSelected = [];
    public $tagsSelected = [];

    public $tags = [];
    public $categories = [];

    protected $queryString = [
        'search' => ['except' => ''],
        'field' =>  ['except' => null],
        'order' =>  ['except' => null],
        'perPage'
    ];


    protected $rules = [
        'name'          => 'required|unique:posts',
        'date'          => 'required|date',
        'status'        => 'required',
        'extract'       => 'required',
        'body'          => 'required',
        'date'          => 'required|date'
        
    ];
    protected $messages = [
        'date.required'         => 'El campo Fecha de publicación es obligatoria',
        'name.required'         => 'El campo Titulo es obligatorio',
        'status.required'       => 'El campo Status es obligatorio',
        'extract.required'      => 'El Campo Extract es obligatorio',
        'body.required'         => 'El Campo Body es obligatorio',
        'name.unique'           => 'El campo Título ya existe en nuestra base de datos, debe ser único',
        
    ];


    public $field = null;
    public $order = null;

    public function render()
    {
        $categories = Category::select('name', 'id')->get();
        $tags = Tag::all();

        $this->tags = $tags;
        $this->categories = $categories;

        $posts = Post::where('name', 'LIKE', "%$this->search%")->orderBy('created_at', 'desc');
        if ($this->field && $this->order) {
            $posts = $posts->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $posts = $posts->paginate($this->perPage);

        return view('livewire.posts.index',[
            'posts'         => $posts,
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

    public function clear()
    {
        $this->page = 10;
        $this->order = null;
        $this->field = null;
        $this->search = '';
    }

    public function default()
    {
        $this->name = '';
        $this->view = 'create';
    }

    public function create()
    {
        return view('livewire.posts.create');
    }

    public function store()
    {
       
       $validatedData = $this->validate();
       

        $post = Post::create([
            'name'      => $validatedData['name'],
            'date'      => $validatedData['date'],
            'status'    => $validatedData['status'],
            'extract'   => $validatedData['extract'],
            'body'      => $validatedData['body'],
            'slug'      => Str::slug($validatedData['name']),
            'user_id'   => auth()->user()->id
        ]);

        if ($this->tagsSelected)
        {
            $post->tags()->attach($this->tagsSelected);
        }

        if ($this->categoriesSelected)
        {
            $post->categories()->attach($this->categoriesSelected);
        }

        session()->flash('message', 'Evento Creado Satisfactoriamente!!!.');
        $this->resetInputFields();

    }

    public function resetInputFields()
    {
        $this->status = '1';
        $this->name = '';
        $this->extract = '';
        $this->body = '';
        $this->tagsSelected = '';
        $this->categoriesSelected= '';

    }

    public function edit($id)
    {
        $post = Post::find($id);
        $this->post_id = $post->id;
        $this->name = $post->name;

        $this->view = 'edit';
    }
}
