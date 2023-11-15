<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    // Override
    protected $table = 'vp_categories';
    protected $primaryKey = 'cate_id';

    // Can access all data
    protected $guarded = [];

}