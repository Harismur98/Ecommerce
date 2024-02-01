<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Relations\BelongsToMany;

class product extends Model
{
    use HasFactory;
    protected $fillable = [
        'title',
        'slug',
        'categoryId',
        'subcategoryId',
        'old_price',
        'new_price',
        'short_description',
        'description',
        'additional_information',
        'shipping_n_returns',
        'status',
        'is_delete',
        'createdBy',
        'brandId',


    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function category()
    {
        return $this->belongsTo(Category::class, 'categoryId');
    }

    public function subcategory()
    {
        return $this->belongsTo(SubCategory::class, 'subcategoryId');
    }

    public function colour(): BelongsToMany
    {
        return $this->belongsToMany(Colour::class);
    }

    public function size()
    {
        return $this->hasMany(Size::class, 'productId');
    }

    public function image()
    {
        return $this->hasMany(ProductImage::class, 'productId');
    }
}
