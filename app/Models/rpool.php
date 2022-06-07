<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class rpool extends Model
{
    use HasFactory;
    public function users()
    {
        return $this->belongsToMany(User::class , 'urlinks' , 'user_id', 'rpool_id');

    }
}
