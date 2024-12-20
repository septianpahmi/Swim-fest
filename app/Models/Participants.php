<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participants extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'user_id',
        'participant_name',
        'gender',
        'date_of_birth',
        'address',
        'province',
        'city',
        'district',
        'zip_code',
        'school',
        'email',
        'file_raport',
        'file_akte',
    ];

    public function user()
    {
        return $this->belongsTo(User::class, 'user_id');
    }

    public function participantRegistrations()
    {
        return $this->hasMany(Participant_registrations::class, 'participant_id');
    }
}
