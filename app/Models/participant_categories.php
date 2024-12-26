<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class participant_categories extends Model
{
    use HasFactory;

    protected $fillable = [
        'participant_registration_id',
        'category_event_id',
        'no_participant',
        'price',
        'record',
        'last_record',
    ];

    public function participantRegistration()
    {
        return $this->belongsTo(Participant_registrations::class, 'participant_registration_id');
    }

    public function categoryEvent()
    {
        return $this->belongsTo(Category_events::class, 'category_event_id');
    }

    public function classId()
    {
        return $this->hasMany(Classes::class, 'id');
    }
    public function categoryId()
    {
        return $this->hasMany(Categories::class, 'id');
    }
}
