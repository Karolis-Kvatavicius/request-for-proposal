<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\Auth;

class Material extends Model
{
    use HasFactory;

    protected $fillable = [
        'name',
        'type_id',
        'category_id',
        'amount',
        'link_to_material' 
    ];

    public function type() {
        return $this->hasOne(Type::class, "id", 'type_id');
    }

    public function category() {
        return $this->hasOne(Category::class, "id", 'type_id');
    }

    public function requests() {
        return $this->hasMany(Request::class);
    }

    public function requestedByUser() {
        return $this->requests()->where('user_id', Auth::id())->count() > 0;
    }

    public function approved() {
        return $request = $this->requests()->where('user_id', Auth::id())->where('status', true)->count() > 0;
    }
}
