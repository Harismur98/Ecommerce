<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Category extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'is_delete',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'createdBy',
        
    ];

    public function subCategories()
    {
        return $this->hasMany(SubCategory::class, 'categoryId');
    }
}
