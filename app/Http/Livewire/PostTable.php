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

    public $name, $post_id, $extract, $body, $status, $user_id, $created_at;

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
        'name'          => 'required',
        //'created_at'    => 'date',
        'status'        => 'required',
        'extract'       => 'required',
        'body'          => 'required',
        
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
      //  $categories = Category::select('name', 'id')->get();
      //  $tags = Tag::all();
        return view('livewire.posts.create',[
           // 'categories'    =>$categories,
           // 'tags'          => $tags
        ] );
    }

    public function store()
    {
       dd($this->extract);

       // $validatedData = $this->validate();
        //$post = Post::create($validatedData);
        $post = Post::create([
            'name'  => $this->name,
            'status'    => $this->status,
            'extract'   => $this->extract,
            'body'      => $this->body,
            'slug'      => Str::slug($this->name),
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
}
