<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class Admin extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'admins';
    protected $fillable = ['nama', 'email', 'password', 'role'];
    protected $hidden = ['password', 'remember_token'];

    // Mutator untuk hash password secara otomatis
    public function setPasswordAttribute($value)
    {
        $this->attributes['password'] = bcrypt($value);
    }

    // Cek apakah user adalah Super Admin
    public function isSuperAdmin()
    {
        return $this->role === 'super_admin';
    }
}