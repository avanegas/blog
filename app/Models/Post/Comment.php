<?php

namespace App\Models\Post;

use Illuminate\Database\Eloquent\Model;
use App\User;

class Comment extends Model
{
  protected $guarded = [];

  // fields can be filled
  protected $fillable = ['comment', 'user_id', 'parent_id'];

 
  public function user()
  {
    return $this->belongsTo(User::class);
  }

  public function replies()
    {
        return $this->hasMany(Comment::class, 'parent_id');
    }
}
