<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;


/**
 * Represents body metric data for users, WHOOP collected data.
 */
class BodyMetricsData extends Model
{
    use HasFactory;

    // Mass assignables
    protected $fillable = [
        'user_id',
        'height_meter',
        'weight_kilogram',
        'max_heart_rate',
    ];

    /**
     * Establishes a one-to-one or many relationship with User data model
     */    
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
