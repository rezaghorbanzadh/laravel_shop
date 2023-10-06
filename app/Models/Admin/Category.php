<?php

namespace App\Models\Admin;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory ,SoftDeletes;



    protected $fillable = ['name' , 'description'  , 'status' ];

    public function parent()
    {
        return $this->belongsTo(Category::class, 'parent_id');
    }
}
