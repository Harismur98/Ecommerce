<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Colour extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'code',
        'status',
        'is_delete',
        'createdBy',
        
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }

    public function product(): BelongsToMany
    {
        return $this->belongsToMany(Product::class, 'product_colours');
    }
}
