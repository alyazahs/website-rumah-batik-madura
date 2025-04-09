<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;

    protected $table = 'category';
    protected $primaryKey = 'idCategory';

    protected $fillable = ['user_id', 'nameCategory'];

    public function user()
    {
        return $this->belongsTo(\App\Models\User::class);
    }

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'category_id', 'idCategory');
    }
}
