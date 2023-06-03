<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;

class Product extends Model
{
    use HasFactory, SoftDeletes;
    protected $fillable = ['slug', 'name', 'image', 'description', 'selling_price', 'stock'];

    public function tags()
    {
        return $this->belongsToMany(Tag::class);
    }
}
