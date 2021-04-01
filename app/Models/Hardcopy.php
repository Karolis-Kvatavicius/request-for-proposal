<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Hardcopy extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'material_id',
        'taken',
        'return',
        'deadline',
    ];

    public function request() {
        // return $this->
    }
}
