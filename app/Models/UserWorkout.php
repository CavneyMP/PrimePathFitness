<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Links user with their workouts and includes date of the workout.
 * Middle man in associating workouts with users.
 */
class UserWorkout extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'workout_id', 'date']; // Mass assinable fields for form.


    /**
     * Defines a relationship to the Workout data model
     */
    public function workout() {
        return $this -> belongsTo(Workout :: class);

    }

}
