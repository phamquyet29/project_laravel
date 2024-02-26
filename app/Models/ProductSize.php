<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class ProductSize extends Model
{
    protected $fillable = ['size', 'quantity_available'];

    public function product()
    {
        return $this->belongsTo(Products::class);
    }
}
