<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;

use Filament\Models\Contracts\FilamentUser;
use Filament\Panel;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\SoftDeletes;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable implements FilamentUser
{
    /** @use HasFactory<\Database\Factories\UserFactory> */
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var list<string>
     */
    protected $fillable = [
        'google_id',
        'google_token',
        'google_refresh_token',
        'name',
        'email',
        'gender',
        'phone',
        'date_of_birth',
        'password',
        'role_id',
    ];
    public function role()
    {
        return $this->belongsTo(Roles::class, 'role_id');
    }

    public function participants()
    {
        return $this->hasMany(Participants::class, 'user_id');
    }

    public function registrations()
    {
        return $this->hasMany(Registrations::class, 'user_id');
    }

    public function canAccessPanel(Panel $panel): bool
    {
        return str_ends_with($this->email, '@swimfest.com') && $this->role_id == 1;
    }

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var list<string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     *
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
            'email_verified_at' => 'datetime',
            'password' => 'hashed',
        ];
    }
}
