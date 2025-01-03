<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Distance extends Model
{
    use HasFactory;

    protected $table = 'distances';

    protected $fillable = [
        'jarak',
        'price',
    ];

    public function categoryDistance()
    {
        return $this->hasMany(Category_classes::class, 'distance_id');
    }
}
