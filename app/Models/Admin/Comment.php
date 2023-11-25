<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body' , 'parent_id' , 'author_id' , 'product_id', 'commentable_type'];

    public function parent(){
         return $this->belongsTo(Comment::class ,"parent_id");
    }
    public function author(){
         return $this->belongsTo(User::class ,"author_id");
    }
    public function product(){
         return $this->belongsTo(Product::class ,"product_id");
    }

}
