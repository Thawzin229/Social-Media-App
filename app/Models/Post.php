<?php

namespace App\Models;

use App\Models\Like;
use App\Models\Post;
use App\Models\Commnet;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Post extends Model
{
    use HasFactory;
    protected $fillable = [
        'description',
        'image',
        'user_id',
    ];
    public function like()
    {
        return $this->hasMany(Like::class);
    }
    public function comment()
    {
        return $this->hasMany(Commnet::class);
    }
    public function commenter()
    {
        return $this->belongsToMany(User::class,"commnets");
    }

}
