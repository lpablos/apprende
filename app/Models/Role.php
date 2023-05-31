<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name',
    ];


    // relación muchos a muchos
    public function users(){
        return $this->belongsToMany('App\Models\User');
    }

    // relación muchos a muchos
    public function permisos(){
        return $this->belongsToMany('App\Models\Permiso');
    }

}
