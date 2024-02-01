<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class SubCategory extends Model
{
    use HasFactory;
    protected $table = 'sub_categories';
    protected $fillable = [
        'name',
        'slug',
        'status',
        'is_delete',
        'meta_title',
        'meta_description',
        'meta_keywords',
        'createdBy',
        'categoryId',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

}
