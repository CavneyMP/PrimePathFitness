<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Represents health + fitness metrics for a user.
 * Stores: various biometric, fitness-related calculated data (BMI, BMR, and TDEE)
 */

class UserMetric extends Model
{
     use HasFactory;

     // Fillable array to allow mass assignment.
    protected $fillable = ['user_id', 'age', 'weight', 'height', 'gender' ,
    'activity_level', 'bmi', 'bmr', 'tdee', 'goal_weight', '
    whoop_access_token', 'whoop_refresh_token', ]; 

}