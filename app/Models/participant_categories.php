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
        'jarak',
        'no_renang',
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
        return $this->hasMany(Classes::class, 'id', 'category_event_id');
    }


    public function categoryId()
    {
        return $this->hasMany(Categories::class, 'id');
    }
    public function categories()
    {
        return $this->hasMany(Categories::class, 'id', 'no_participant');
    }


    //Raihan; untuk mengambil data kelas dari participant
    public function classParticipant()
    {
        return $this->hasMany(Classes::class, 'id', 'category_event_id');
    }
}
