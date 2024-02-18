<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Post extends Model
{
    use HasFactory;

    protected $fillable = [
       'title',
       'slug',
       'content',
       'image',
       'posted',
       'categories_id',
       'description',
       'created_ad',
       'updated_ad'
    ];

}
