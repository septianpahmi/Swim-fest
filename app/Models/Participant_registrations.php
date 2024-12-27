<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant_registrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'registration_id',
        'participan_id',
    ];

    public function registrationId()
    {
        return $this->belongsTo(Registrations::class, 'registration_id');
    }

    public function participantId()
    {
        return $this->belongsTo(Participants::class, 'participan_id');
    }

    public function participantCategories()
    {
        return $this->hasMany(Participant_categories::class, 'participant_registration_id');
    }

    // kiki
    public function participant_categories()
    {
        return $this->hasMany(Participant_categories::class, 'participant_registration_id', 'id');
    }

    public function participant()
    {
        return $this->belongsTo(Participants::class, 'participan_id', 'id');
    }
}
