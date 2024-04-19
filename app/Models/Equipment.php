<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Equipment extends Model
{
    use HasFactory;

    protected $fillable = ['name',  'description']; // Mass assingable attributes.

    public function exercises() {
        return $this -> hasMany(Exercise :: class);

    }

}
