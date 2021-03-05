<?php

namespace App\Http\Controllers;

use App\Models\Category;
use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Tag;
use App\Http\Requests\PostRequest;
use Illuminate\Support\Str;

use Illuminate\Support\Facades\Storage;

class PostController extends Controller
{
    public function index()
    {
        $posts = Post::latest('published')->paginate(10);
        return view('posts.index',[
            'posts' =>$posts
        ]);
    }

    
    public function create()
    {
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.create', [
            'tags'          => $tags,
            'categories'    => $categories
        ]);
    }


    public function store(PostRequest $request)
    {
        
        $post = Post::create([
            'name'      => $request->name,
            'published' => $request->published,
            'status'    => $request->status,
            'extract'   => $request->extract,
            'body'      => $request->body,
            'slug'      => Str::slug($request->name)
            //'user_id'   => auth()->user()->id
        ]);

        if($request->file('file'))
        {
            $url = Storage::put('posts', $request->file('file'));

            $post->image()->create([
                'url'   => $url
            ]);
        }

        if ($request->tags)
        {
            $post->tags()->attach($request->tags);
        }

        if ($request->categories)
        {
            $post->categories()->attach($request->categories);
        }

        return redirect()->route('posts.index');
    }

    public function show(Post $post)
    {
        $etiqueta = $post->categories[0]->id;
        $categoria = Category::where('id', $etiqueta)->first();
        $similares = $categoria->posts()->where('post_id', '!=', $post->id)->latest('id')->take(4)->get();
        
        return view('posts.show', [
            'post'      => $post,
            'similares' => $similares
        ]);
    }

    public function tag(Tag $tag)
    {
        $posts = $tag->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('posts.tag', [
            'posts' => $posts,
            'tag'   => $tag
        ]);
    }

    public function edit(Post $post)
    {
        
       $this->authorize('author', $post);   
        $tags = Tag::all();
        $categories = Category::all();
        return view('posts.edit', [
            'tags'       => $tags,
            'categories' => $categories,
            'post'       => $post
        ]);
    }

    public function update(PostRequest $request, Post $post)
    {
        $this->authorize('author', $post);
        $post->update($request->all());

        if ($request->file('file'))
        {
            $url = Storage::put('posts', $request->file('file'));

            if($post->image)
            {
                Storage::delete($post->image->url);

                $post->image->update([
                    'url' => $url
                ]);
            }else{
                $post->image()->create([
                    'url'   => $url
                ]);
            }
        }

        if ($request->tags)
        {
            $post->tags()->sync($request->tags);
        }

        if ($request->categories)
        {
            $post->categories()->sync($request->categories);
        }

        return redirect()->route('post.ver', $post)->with('info', 'La Noticia se actualizó correctamente');

    }

    public function category(Category $category)
    {
        $posts = $category->posts()->where('status', 2)->latest('id')->paginate(4);
        return view('posts.category', [
            'posts' => $posts,
            'category'   => $category
        ]);
    }

    public function destroy(Post $post)
    {
        $this->authorize('author', $post);
        $post->delete();
    }

    public function upload(Request $request)
    {
        if($request->hasFile('upload')) {
            //get filename with extension
            $filenamewithextension = $request->file('upload')->getClientOriginalName();
      
            //get filename without extension
            $filename = pathinfo($filenamewithextension, PATHINFO_FILENAME);
      
            //get file extension
            $extension = $request->file('upload')->getClientOriginalExtension();
      
            //filename to store
            $filenametostore = $filename.'_'.time().'.'.$extension;
      
            //Upload File
            $request->file('upload')->storeAs('uploads', $filenametostore);
 
            $CKEditorFuncNum = $request->input('CKEditorFuncNum');
            $url = asset('storage/uploads/'.$filenametostore);
            $msg = 'Image successfully uploaded';
            $re = "<script>window.parent.CKEDITOR.tools.callFunction($CKEditorFuncNum, '$url', '$msg')</script>";
             
            // Render HTML output
            @header('Content-type: text/html; charset=utf-8');
            echo $re;
        }
    }
}
