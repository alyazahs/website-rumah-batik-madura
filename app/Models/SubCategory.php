<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;

    protected $table = 'sub_category';
    protected $primaryKey = 'idSubCategory';

    protected $fillable = [
        'category_id',
        'user_id',
        'nameSubCategory',
    ];

    // Relasi ke kategori
    public function category()
    {
        return $this->belongsTo(Category::class, 'category_id', 'idCategory');
    }

    // Relasi ke user (admin)
    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    // Relasi ke produk
    public function products()
    {
        return $this->hasMany(Product::class, 'idSubCategory', 'idSubCategory');
    }
}
