<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    protected $table = 'user';
    protected $fillable = ['name', 'email', 'password', 'level', 'status', 'path'];
    protected $hidden = ['password', 'remember_token'];

    public function isSuperAdmin()
    {
        return $this->role === 'SuperAdmin';
    }
}