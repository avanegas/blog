<?php

namespace App\Http\Controllers\Web;

use Illuminate\Http\Request;
use App\Http\Controllers\Controller;

use App\Models\Post\Category;
use App\Models\Post\Post;
use App\Models\Post\Tag;
use App\Models\Post\Comment;
use App\User;

class PageController extends Controller
{
    
    public function blog(){
    	$posts = Post::with(['user', 'category', 'comments'])->where('status', 'PUBLISHED')->orderBy('id', 'DESC')->paginate(10);
    	return view('web.posts', compact('posts'));
    }

    public function category($slug){
        $category = Category::where('slug', $slug)->pluck('id')->first();

        $posts = Post::where('category_id', $category)
            ->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(10);

        return view('web.category', compact('posts'));
    }

    public function tag($slug){ 
        $posts = Post::whereHas('tags', function($query) use ($slug) {
                $query->where('slug', $slug);
            })->orderBy('id', 'DESC')->where('status', 'PUBLISHED')->paginate(10);

        return view('web.tag', compact('posts'));
    }

    public function post($slug){
    	$post = Post::where('slug', $slug)->first();
        $comments = Comment::where('parent_id', $post->id)->get();

    	return view('web.post', compact('post', 'comments'));
    }

}
