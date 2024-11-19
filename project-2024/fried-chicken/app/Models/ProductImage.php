<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class ProductImage extends Model
{
    use HasFactory;
    use SoftDeletes;

    // khai báo bảng được sử dụng 
    protected $table = "product_images";

    //khai báo các trường có thể điền dữ liệu
    protected $fillable = [
        'product_id',
        'image_id'
    ];
}
