<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'category_name',
        'status',
    ];

    public function categoryClasses()
    {
        return $this->hasMany(Category_classes::class, 'category_id');
    }
}
