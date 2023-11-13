<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Override
    protected $table = 'vp_products';
    protected $primaryKey = 'product_id';

    // Can access all data
    protected $guarded = [];
}
