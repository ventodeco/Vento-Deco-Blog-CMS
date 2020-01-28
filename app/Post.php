<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    protected $fillable = ['title', 'body', 'image', 'category_id'];

    protected $hidden = ['user_id'];
    public function user()
    {
        return $this->belongsTo(User::class);
    }

    public function comment()
    {
    	return $this->hasMany(Comment::class);
    }

    public function category()
    {
    	// return $this->belongsTo('App\Category', 'category_id');
        return $this->belongsTo('App\Category', 'category_id');
        
    }
}
