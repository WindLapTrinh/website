<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Customer extends Model
{
    use HasFactory;
    
    protected $table = 'customers';

    protected $fillable = [
        'fullname',
        'email',
        'phone_number',
        'address',
        'status'
    ];

    public function orders()
    {
        return $this->hasMany(Order::class);
    }

}