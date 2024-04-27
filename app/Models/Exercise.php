<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Exercise extends Model
{
    use HasFactory;

    protected $fillable = ['name', 'description', 'muscle_group', 'exercise_type', 'difficulty_level', 'equipment_id']; // Fields mass assignable

    public function equipment() {
        return $this -> belongsTo(Equipment :: class, 'equipment_id');
    }
    public function workouts() {
        return $this -> belongsToMany(Workout :: class)
            -> withPivot('day'); 

    }
}