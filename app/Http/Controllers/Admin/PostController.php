<?php

namespace App\Http\Controllers\Admin;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Http\Requests\PostStoreRequest;
use App\Http\Requests\PostUpdateRequest;
use App\Http\Requests\CommentStoreRequest;

use Illuminate\Support\Facades\Storage;
use App\Models\Post\Comment;
use App\Models\Post\Category;
use App\Models\Post\Post;
use App\Models\Post\Tag;

use File;

class PostController extends Controller
{

    public function __construct()
    {
        $this->middleware('auth');
    }

    public function index()
    {
        $posts = Post::orderBy('id', 'DESC')
            ->where('user_id', auth()->user()->id)
            ->paginate();

        return view('admin.posts.index', compact('posts'));
    }

    public function create()
    {
        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.create', compact('categories', 'tags'));
    }

    public function store(PostStoreRequest $request)
    {
        $post = Post::create($request->all());
        //$this->authorize('pass', $post);

        //IMAGE 
        if($request->file('image')){
            //$path = Storage::disk('public')->put('images',  $request->file('image'));

            $path = $this->getFileName($request->image);
            $request->image->move(base_path('public/images'), $path);

            $post->fill(['file' => $path])->save();
        }

        //TAGS
        $post->tags()->attach($request->get('tags'));

        return redirect()->route('posts.show', $post->id)->with('info', 'Entrada creada con éxito');
    }

    private function getFileName($file)
    {
        return str_random(32).'.'.$file->extension();
    }

    public function show($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);
        $comments = Comment::where('post_id', $post->id)->get();

        return view('admin.posts.show', compact('post', 'comments'));
    }

    public function edit($id)
    {
        $post       = Post::find($id);
        /*$this->authorize('pass', $post);*/

        $categories = Category::orderBy('name', 'ASC')->pluck('name', 'id');
        $tags       = Tag::orderBy('name', 'ASC')->get();

        return view('admin.posts.edit', compact('post', 'categories', 'tags'));
    }

    public function update(PostUpdateRequest $request, $id)
    {
        $post = Post::find($id);
        //$this->authorize('pass', $post);

        $post->fill($request->all())->save();

        //IMAGE 
        if($request->file('image')){
            $path = Storage::disk('public')->put('images',  $request->file('image'));
            $post->fill(['file' => asset($path)])->save();
        }

        //TAGS
        $post->tags()->sync($request->get('tags'));

        return redirect()->route('posts.show', $post->id)
            ->with('info', 'Entrada actualizada con éxito');
    }

    public function destroy($id)
    {
        $post = Post::find($id);
        $this->authorize('pass', $post);
        
        $post->delete();

        return back()->with('info', 'Eliminado correctamente');
    }
}