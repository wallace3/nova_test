<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Flights extends Model
{
    use HasFactory;
    protected $fillable = [
        'name', 
        'code',
        'departure_id',
        'destination_id',
        'departure_time',
        'arrival_time',
        'airline_id'
    ];    
}
