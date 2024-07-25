<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable=[
        'Category_name'
    ];
    public function Product(){   // One to Many (Inverse) / hasMany To relationshi
        return $this->hasMany(Product::class);
    }
}
