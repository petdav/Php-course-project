<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Section extends Model
{
    protected $fillable = ['title', 'body'];
    public function posts()
    {
        return $this->hasMany(Post::class);
    }
    public function addPost($body)
    {
        $this->posts()->create(['body' => $body]);
    }
    public function getRouteKeyName()
    {
        return 'slug';
    }
}