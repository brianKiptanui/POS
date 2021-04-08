<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Preturn extends Model
{
    use HasFactory;

    public function products(){
        $this->hasMany(Product::class);
    }
}
