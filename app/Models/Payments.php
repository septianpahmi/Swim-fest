<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Database\Eloquent\Factories\HasFactory;

class Payments extends Model
{
    use HasFactory, SoftDeletes;

    protected $fillable = [
        'registration_id',
        'payment_method',
        'ref_id',
        'fee',
        'diskon',
        'grand_total',
        'paid_at',
    ];

    public function registration()
    {
        return $this->belongsTo(Registrations::class, 'registration_id');
    }
}
