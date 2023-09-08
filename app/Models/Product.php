<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'products';
    protected $primaryKey = 'id';

    protected $fillable = [
        'name',
        'slug',
        'image',
        'description',
        'price',
        'price_sale',
        'cost'
    ];

    public function product()
    {
        return $this->hasMany('App\Models\Product', 'category');
    }
}