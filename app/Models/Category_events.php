<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_events extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_id',
        'category_class_id',
        'price',
    ];

    public function event()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function categoryClass()
    {
        return $this->belongsTo(Category_classes::class, 'category_class_id');
    }
}
