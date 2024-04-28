<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Represents physical equipment in exercises
 * Stores details about gym equipment used across various exercises.
 */

class Equipment extends Model
{
    use HasFactory;
    
    // Mass assingables
    protected $fillable = ['name',  'description'];

    /**
     * Defines a one-to-many relationship for Exercise data model.
     */
    public function exercises() {
        return $this -> hasMany(Exercise :: class);

    }

}
