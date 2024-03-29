<?php

namespace App\Models;

use App\User;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'slug', 'body', 'category_id', 'thumbnail'];
    protected $with = ['author', 'tags', 'category'];

    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }

    public function takeImage()
    {
        return "/storage/" . $this->thumbnail;
    }

    public function author()
    {
        return $this->belongsTo(User::class, 'user_id');
    }
}
