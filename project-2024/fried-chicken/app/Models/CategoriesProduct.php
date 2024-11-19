<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class CategoriesProduct extends Model
{
    use HasFactory;
    use SoftDeletes;

    protected $table = 'categories_product';

    protected $fillable = [
        'name',
        'slug',
        'desc',
        'user_id',
        'parent_id'
    ];

    public function children()
    {
        return $this->hasMany(CategoriesProduct::class, 'parent_id');
    }


    public function parent()
    {
        return $this->belongsTo(CategoriesProduct::class, 'parent_id');
    }

    public function getIndentedNameAttribute()
    {
        // Đếm số cấp độ của danh mục hiện tại
        $level = $this->getLevel();

        // Thêm dấu --- tương ứng với cấp độ
        return str_repeat('--- ', $level) . $this->name;
    }

    public function getLevel()
    {
        // Biến $level để xác định cấp độ của danh mục
        $level = 0;
        $parent = $this->parent;

        // Tăng $level lên dựa trên số lần lặp qua các danh mục cha
        while ($parent) {
            $level++;
            $parent = $parent->parent;
        }

        return $level;
    }
    
    public function products()
    {
        return $this->hasMany(Product::class, 'category_id');
    }

}
