<?php

namespace App\Models\Admin;

use App\Models\User;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Comment extends Model
{
    use HasFactory;
    protected $fillable = ['body' , 'parent_id' , 'author_id' , 'product_id', 'commentable_type'];

    public function author()
    {
        return $this->belongsTo(User::class , 'user_id');
    }
}
