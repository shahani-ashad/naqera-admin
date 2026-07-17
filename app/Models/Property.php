<?php

namespace App\Models;

use Illuminate\Database\Eloquent\Model;

class Property extends Model
{
    protected $fillable = [
        'title',
        'city',
        'type',
        'purpose',
        'price',
        'host_name',
        'host_phone',
        'tourism_license_number',
        'status',
    ];
}