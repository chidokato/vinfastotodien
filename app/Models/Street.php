<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

use Astrotomic\Translatable\Contracts\Translatable as TranslatableContract;
use Astrotomic\Translatable\Translatable;

class Province extends Model
{
    use Translatable;
    use HasFactory;
    public $timestamps = true;
    public $translatedAttributes = [
    	'name',
    	'parent',
    	'content',
    	'category_id',
    	'locale',
    	'title',
    	'description',
    ];
    protected $fillable = [
    	'user_id',
    	'status',
    ];
}
