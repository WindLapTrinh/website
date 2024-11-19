<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Role extends Model
{
    use HasFactory;
    use SoftDeletes;    

    protected $fillable = ['name', 'description'];
    
    // xu ly add role
    public function permissions(){
        return $this->belongsToMany(Permission::class, 'role_permission');
    }
}
