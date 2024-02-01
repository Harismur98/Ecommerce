<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Brand extends Model
{
    use HasFactory;
    protected $fillable = [
        'name',
        'slug',
        'status',
        'is_delete',
        'createdBy',
    ];

    public function createdByUser()
    {
        return $this->belongsTo(User::class, 'createdBy');
    }
}
