<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Post extends Model
{
    use HasFactory;
use SoftDeletes;
    protected $fillable = [
        'title',
        'body',
        'category_id',
        'user_id'
        
    ];
      


    public function comments()
    {
        return $this->hasMany(Comment::class);
    }





    public function category()
    {
        return $this->belongsTo(Category::class);
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
