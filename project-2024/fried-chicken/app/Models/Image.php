<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Image extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $fillable = ['url', 'name', 'size', 'user_id'];

    public function user(){
        return $this->belongsTo(User::class);
    }

    public function post()
    {
        return $this->hasOne(Post::class, 'image_id', 'id');
    }
}
