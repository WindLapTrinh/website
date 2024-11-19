<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Post extends Model
{
    use HasFactory, SoftDeletes;

    // Khai báo bảng được sử dụng
    protected $table = 'posts';

    // Khai báo các trường có thể điền dữ liệu
    protected $fillable = [
        'title',
        'note',
        'slug',
        'excerpt',
        'content',
        'status',
        'user_id',
        'category_id',
        'image_id'
    ];

    // Quan hệ: Mỗi bài viết thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(CategoriesPost::class, 'category_id');
    }

    //get image tbale posst
    public function image()
    {
        return $this->belongsTo(Image::class, 'image_id', 'id');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($post) {
            // Tạo slug nếu chưa có
            $post->slug = Str::slug($post->title);
        });

        static::created(function ($post) {
            // Cập nhật slug thêm id nếu cần
            $post->slug = Str::slug($post->title) . '-' . $post->id . '.html';
            $post->save();
        });
    }
}
