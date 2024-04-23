<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class BodyMetricsData extends Model
{
    use HasFactory;

    protected $fillable = [
        'user_id',
        'height_meter',
        'weight_kilogram',
        'max_heart_rate',
    ];

    // Relationship to User model
    public function user()
    {
        return $this->belongsTo(User::class);
    }
}
