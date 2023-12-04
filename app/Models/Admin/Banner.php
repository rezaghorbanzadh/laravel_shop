<?php

namespace App\Models\Admin;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Banner extends Model
{
    use HasFactory;
    protected $fillable = ['title', 'image','url','position','status'];
    protected $casts = ['image' => 'array'];



    public static $positions=[
        0 =>"اسلاید شو اصلی",
        1 =>"کنار اسلاید شو اصلی",
        2 =>" دو بنر تبلیغاتی بین دو اسلاید شو",
        3 =>" بنر بزرگ تبلیغاتی پایین",
    ];
    }
