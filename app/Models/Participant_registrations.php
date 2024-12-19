<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Participant_registrations extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'registration_id',
        'participant_id',
    ];

    public function registration()
    {
        return $this->belongsTo(Registrations::class, 'registration_id');
    }

    public function participant()
    {
        return $this->belongsTo(Participants::class, 'participant_id');
    }
}
