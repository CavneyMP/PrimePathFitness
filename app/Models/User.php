<?php

namespace App\Models;

// use Illuminate\Contracts\Auth\MustVerifyEmail;
use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Foundation\Auth\User as Authenticatable;
use Illuminate\Notifications\Notifiable;
use Illuminate\Support\Facades\Auth;


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
    protected $casts = [
        'email_verified_at' => 'datetime',
    ];
    

    public function updateMetrics(array $validatedData)
    {
        // if validation passed, retrieve auth
        $user = Auth::user();

        // update metrics with data
        return $this->update($validatedData);
    }

    public function workouts() {
        return $this -> hasManyThrough( // Laravel function for SQL to retreive data.
                Workout :: class, // Final data model 
                UserWorkout :: class, // Middle table that links users to workouts
                'user_id', // Foreign key UserWorkout table
                 'id', // Foreign key Workout table
                'id', // Local Users table
                'workout_id' // Local UserWorkout table

        );
    }
    
    public function mealPlans()
    {
        return $this->hasMany(UserMealPlan::class);
    }
}