<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Category_events extends Model
{
    use HasFactory;

    protected $fillable = [
        'event_id',
        'category_class_id',
        'price',
    ];

    public function eventId()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function categoryClass()
    {
        return $this->belongsTo(Category_classes::class, 'category_class_id');
    }

    public function ParticipantCategory()
    {
        return $this->hasMany(Participant_categories::class, 'category_event_id');
    }
}
