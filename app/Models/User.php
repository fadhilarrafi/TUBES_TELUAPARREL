<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    // Kolom yang dapat diisi
    protected $fillable = [
        'name',
        'email',
        'password',
        'role', // Menambahkan kolom 'role'
    ];

    // Kolom yang harus disembunyikan saat serialisasi
    protected $hidden = [
        'password',
        'remember_token',
    ];

    // Kolom yang perlu di-cast ke tipe tertentu
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed', // Enkripsi password
        ];
    }

    /**
     * Menentukan apakah pengguna adalah admin.
     *
     * @return bool
     */
    public function isAdmin(): bool
    {
        return $this->role === 'admin'; // Cek apakah role pengguna adalah 'admin'
    }
}
