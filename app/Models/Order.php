<?php

// app/Models/Order.php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Order extends Model
{
    use HasFactory;

    // Menambahkan atribut yang dapat diisi (fillable)
    protected $fillable = [
        'name',
        'email',
        'address',
        'credit_card_number',
    ];
}
