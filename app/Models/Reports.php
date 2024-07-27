<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Factories\HasFactory;
use Illuminate\Database\Eloquent\Model;

class Reports extends Model
{
    use HasFactory;
    
    protected $table = 'reports';
    protected $fillable = [
        'staff_email',
        'typhoon_name',
        'affected_barangay',
        'started_date',
        'end_date',
        'lowest_water_level',
        'highest_water_level',
        'casualties_dead',
        'casualties_injured',
        'dispPol_person',
        'dispPol_families',
        'infrastracture_damaged',
        'agriculture_damaged',
        'industrial_damaged',
        'privateComercial_damaged',
    ];
}