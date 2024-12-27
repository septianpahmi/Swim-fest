<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Registrations extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'event_id',
        'no_registration',
        'type',
        'status',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function eventIds()
    {
        return $this->belongsTo(Events::class, 'event_id');
    }

    public function participantRegistrations()
    {
        return $this->hasMany(Participant_registrations::class, 'registration_id');
    }

    public function payments()
    {
        return $this->hasOne(Payments::class, 'registration_id');
    }


    // kiki
    public function participant_registrations()
    {
        return $this->hasMany(Participant_registrations::class, 'registration_id', 'id');
    }
}
