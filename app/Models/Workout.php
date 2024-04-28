<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Represents a workout plan that has multiple exercises.
 * Stores information: workout, its name, description, and type
 */
class Workout extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'type']; // Mass assignable attributes.
    
    /**
     * Defines many-to-many relationship with Exercise data model
     * Also includes pivot data that stores the day of the workout, for three day planning
     */
    public function exercises() {
        return $this -> belongsToMany(Exercise :: class, 'workout_exercises' , 'workout_id', 'exercise_id')
        ->withPivot('day');

    }
    
}
