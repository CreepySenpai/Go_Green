<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductModel extends Model
{
    //use HasFactory;

    protected $fillable = [
        'id',
        'ten_sp',
        'loai_sp',
        'so_luong',
        'gia',
        'ngay_nhap_kho',
        'mo_ta',
        'hinh_anh',
    ];


}
