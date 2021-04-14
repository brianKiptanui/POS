<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Sale extends Model
{
    use HasFactory;

    protected $guarded = [];

    protected $qtys = [
        'quantity' => 'array',
    ];

    public function products()
    {
        return $this->belongsToMany(Product::class, 'product_sale', 'sale_id', 'product_id')->withPivot('quantity');
    }

}
