<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserWorkout extends Model
{
    use HasFactory;

    protected $fillable = [ 'user_id', 'workout_id', 'date']; // Mass assinable fields for form.

    public function workout() {
        return $this -> belongsTo(Workout :: class);

    }

}
