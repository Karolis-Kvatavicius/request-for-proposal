<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Request extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'material_id',
        'status',
    ];

    public function material() {
        return $this->hasOne(Material::class, 'id', 'material_id');
    }

    public function user() {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
}
