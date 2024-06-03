<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;
    public $timestamps = true;

    public function Category()
    {
        return $this->hasOne(Category::class, 'id', 'category_id');
    }
    public function User()
    {
        return $this->hasOne(User::class, 'id', 'user_id');
    }
    public function Images()
    {
        return $this->hasMany(Images::class, 'post_id', 'id');
    }
    public function Order()
    {
        return $this->hasMany(Order::class, 'product_id', 'id');
    }
}
