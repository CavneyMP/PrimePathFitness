<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Represents an exercise that within the project
 * Stores details: exercise types, muscle groups targeted, associated equipment
 */
class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'muscle_group', 'exercise_type', 'difficulty_level', 'equipment_id']; // Fields mass assignable

    /**
     * Defines many-to-one relationship with Equipment data model
     */
    public function equipment() {
        return $this -> belongsTo(Equipment :: class, 'equipment_id');
    }
    /**
     * Defines many-to-many relationship with Workout model
     */
    public function workouts() {
        return $this -> belongsToMany(Workout :: class)
            -> withPivot('day'); 

    }
}