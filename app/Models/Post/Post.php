<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use App\Presenters\DatePresenter;

class Post extends Model
{
    use DatePresenter;

    protected $fillable = [
        'user_id', 'category_id', 'name', 'slug', 'excerpt', 'body', 'status', 'file'
    ];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function comments()
    {
      return $this->hasMany(App\Models\Post\Comment::class);
    }
}
