<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Product extends Model
{
    use HasFactory;

    protected $table = 'product';
    protected $primaryKey = 'idProduct';

    protected $fillable = ['sub_category_id', 'user_id', 'nameProduct', 'description', 'price', 'path', 'status'];

    public function subCategory()
    {
        return $this->belongsTo(SubCategory::class, 'sub_category_id', 'idSubCategory');
    }

    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
