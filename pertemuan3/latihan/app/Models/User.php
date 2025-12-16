<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Database\Eloquent\Relations\HasMany;

class User extends Authenticatable
{
    use HasFactory, Notifiable;


    protected $fillable = [
        'name',        // Nama lengkap user
        'username',    // Username unik untuk login
        'email',       // Email unik untuk login
        'password',    // Password yang akan di-hash otomatis
    ];

    protected $hidden = [
        'password',          // Jangan tampilkan password di response
        'remember_token',    // Jangan tampilkan token di response
    ];

    
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',  // Cast ke object DateTime
            'password' => 'hashed',             // Otomatis hash password saat insert/update
        ];
    }

    // Relasi: Satu user memiliki banyak posts (One-to-Many)
    public function posts(): HasMany
    {
        return $this->hasMany(Post::class, 'user_id');
        // 'user_id' adalah foreign key di tabel posts yang menunjuk ke users.id
    }
}