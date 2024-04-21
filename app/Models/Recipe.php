<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model; // Requirs Eloquent model

// Recipe model class, extends Eloquent allowing interaction with databases.

class Recipe extends Model
{
    use HasFactory;

    // Mass assigable attributes needed for meal planner.
    protected $fillable = [ 'name', 'description', 'mealtype' ];  // $fillable property = ables mass assignment attributes from model

}
