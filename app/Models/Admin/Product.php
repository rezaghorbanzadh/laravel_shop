<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'color','price','oldprice','description',
        'inventory','img_product','user_id','discount','status'];


    public  function user(){
        return $this->belongsToMany(User::class);
    }
}
