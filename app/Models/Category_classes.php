<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_classes extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'category_id',
        'class_id',
    ];

    public function category()
    {
        return $this->belongsTo(Categories::class, 'category_id');
    }

    public function classes()
    {
        return $this->belongsTo(Classes::class, 'class_id');
    }

    public function categoryClass()
    {
        return $this->hasMany(Category_events::class, 'category_class_id');
    }
}
