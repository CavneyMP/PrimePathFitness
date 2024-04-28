<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

/**
 * Represents the sleep data tracked for a user, was WHOOP related, currently inactive.
 */
class SleepData extends Model
{
    use HasFactory;

    // Mass assignables
    protected $fillable = [
        'user_id',
        'start',
        'end',
        'timezone_offset',
        'nap',
        'score_state',
        'score',
    ];


    /**
    * Relationship to the User model require for knowing what data belongs to what user
    */
    public function user()
    {
        return $this -> belongsTo(User :: class);
    }
}
