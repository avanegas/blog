<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Post;
use App\Models\Category;
use App\Models\Tag;
use Illuminate\Auth\Middleware\authorize;

class PostController extends Controller
{
    public function index(){
        $posts = Post::where('status', 'PUBLISHED')
                       ->latest('id')
                       ->paginate(20);

        return view('posts.index', compact('posts'));
    }

    public function show(Post $post){
        
        $this->authorize('published', $post);
        
        $similares=Post::where('category_id', $post->category_id)
                        ->where('id','!=',$post->id)
                        ->where('status', 'PUBLISHED')
                        ->latest('id')
                        ->take(20)
                        ->get();

        return view('posts.show',compact('post', 'similares'));
    }

    public function category(Category $category){
        $posts = Post::where('category_id', $category->id)
                       ->where('status','PUBLISHED')
                       ->latest('id')
                       ->paginate(20);

        return view('posts.category', compact('posts', 'category'));
    }

    public function tag(Tag $tag){
        $posts = $tag->posts()
                     ->where('status', 'PUBLISHED')
                     ->latest('id')
                     ->paginate(20);

        return view('posts.tag', compact('posts', 'tag'));
    }
}