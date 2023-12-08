<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Role extends Model
{
    use HasFactory;

     // Override
     protected $table = 'vp_roles';
     protected $primaryKey = 'role_id';

     // Can access all data
     protected $guarded = [];
}
