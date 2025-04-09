<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Log extends Model
{
    protected $table = 'log';
    protected $primaryKey = 'idLog';
    public $timestamps = false;

    protected $fillable = ['user_id', 'information', 'time'];

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
