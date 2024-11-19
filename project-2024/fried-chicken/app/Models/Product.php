<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Support\Str;

class Product extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = "products";

    protected $fillable = [
        'name',
        'slug',
        'desc',
        'details',
        'price',
        'stock_quantity',
        'is_featured',
        'product_status',
        'user_id',
        'category_id'
    ];

    // Quan hệ: Mỗi bài viết thuộc về một danh mục
    public function category()
    {
        return $this->belongsTo(CategoriesProduct::class, 'category_id');
    }

    //get image tbale posst

    public function images()
    {
        return $this->belongsToMany(Image::class, 'product_images', 'product_id', 'image_id');
    }

    public function orders()
    {
        return $this->belongsToMany(Order::class, 'order_items')
            ->withPivot('quantity');
    }

    protected static function boot()
    {
        parent::boot();

        static::creating(function ($product) {
            // Tạo slug nếu chưa có
            $product->slug = Str::slug($product->name);
        });

        static::created(function ($product) {
            // Cập nhật slug thêm id nếu cần
            $product->slug = Str::slug($product->name) . '-' . $product->id . '.html';
            $product->saveQuietly();
        });
    }
}
