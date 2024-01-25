<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use App\Models\Categories;

class Products extends Model
{
    use HasFactory;
    protected $fillable = [
        'id',
        'name',
        'price',
        'image',
        'description',
        'category_id',
    ];
    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }
    
  
}
