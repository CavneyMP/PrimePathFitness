<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class UserMetric extends Model
{
    protected $fillable = ['user_id', 'age', 'weight', 'height', 'gender' ,'activity_level'];

}