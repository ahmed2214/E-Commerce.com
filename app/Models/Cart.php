<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Cart extends Model
{
    use HasFactory;
    protected $fillable=[
        'total_price',
        'quantity',
        'user_id',
        'product_id',
    ];
    public function Product(){   // One to Many (Inverse) / Belongs To relationshi
        return $this->belongsTo(Product::class);}
        public function User(){   // One to Many (Inverse) / Belongs To relationshi
            return $this->belongsTo(User::class);}

}
