<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;

class User extends Authenticatable
{
    use HasFactory, Notifiable;

    /**
     * The attributes that are mass assignable.
     *
     * @var array<int, string>
     */
    protected $fillable = [
        'name', // User name
        'email', // User Email
        'password', // User passwords
        'height',  // User height
        'weight' , // User weight
        'age',  // User age
        'activity_level', // user activitiy level
    ];

    /**
     * The attributes that should be hidden for serialization.
     *
     * @var array<int, string>
     */
    protected $hidden = [
        'password',
        'remember_token',
    ];

    /**
     * Get the attributes that should be cast.
     * Essentially concerts attributes to common data types when getting or setting.
     * @return array<string, string>
     */
    protected function casts(): array
    {
        return [
        'email_verified_at' => 'datetime',
        'password' => 'hashed',
        'height' => 'float', // Height to float
        'weight' => 'float', // Weight to float
        'age' => 'int', // Age to int
        'activity_level' => 'string', //Activity level to string
        ];

        // if validation passed, retreive auth
        $user = Auth::user();

        // update metrics with data
        $user = update($validatedData);

        // Direct user to dash after
        return redirect ('dashboard');
    }
}
