<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    // Tentukan field yang boleh diisi
    protected $fillable = [
        'name', 'description', 'price', 'category', 'image_url',
    ];
}
