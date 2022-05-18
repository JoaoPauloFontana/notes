<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Nota extends Model
{
    use HasFactory;

    protected $fillable = [
        'users_id',
        'name',
        'text'
    ];

    public function users(){
        return $this->belongsTo(User::class, 'users_id', 'id');
    }
}
