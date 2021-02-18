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

    public $name, $post_id, $exrtact, $body, $status, $user_id, $category_id;

    public $categorySelected;
    public $tagSelected;

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
        $posts = Post::where('name', 'LIKE', "%$this->search%")->orderBy('created_at', 'desc');
        if ($this->field && $this->order) {
            $posts = $posts->orderBy($this->field, $this->order);
        }else{
            $this->field = null;
            $this->order = null;
        }
        
        $posts = $posts->paginate($this->perPage);

        return view('livewire.posts.index',[
            'posts' => $posts
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
        $categories = Category::select('name', 'id')->get();
        $tags = Tag::all();
        return view('livewire.posts.create',[
            'categories'    =>$categories,
            'tags'          => $tags
        ] );
    }
}
