<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


class Product extends Model
{
    use HasFactory;
    protected $fillable=[
        'Product_name',
        'imgpath',
        'description',
        'price',
        'quantity',
        'category_id',
    ];
    public function Category(){   // One to Many (Inverse) / Belongs To relationshi
        return $this->belongsTo(Category::class);}
        public function Cart(){
            return  $this->hasMany(Cart::class, 'product_id', 'id');
            
        }
        public function getImgpathAttribute($img){
                return 'images/prodects/' . $img ;
         }
}
