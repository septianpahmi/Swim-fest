<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Events extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'event_name',
        'slug',
        'start_date',
        'end_date',
        'venue',
        'bsoure',
        'description',
    ];

    public function registrations()
    {
        return $this->hasMany(Registrations::class, 'event_id');
    }

    public function categoryEvents()
    {
        return $this->hasMany(Category_events::class, 'event_id');
    }
}
