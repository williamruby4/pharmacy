<?php

namespace App;

use Illuminate\Database\Eloquent\Model;

class Location extends Model
{
	   protected $table = 'locations';

	   // If all attributes are mass assignable, $guarded property as an empty array can be used: protected $guarded = [];

	   protected $fillable = [
        'name', 'address', 'city', 'state', 'zip', 'latitude', 'longitude',
    ];

    
}