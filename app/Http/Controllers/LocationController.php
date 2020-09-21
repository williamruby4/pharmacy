<?php

namespace App\Http\Controllers;

use App\Location;

use Illuminate\Http\Request;
use Illuminate\Database\Eloquent\Model;
use Illuminate\Support\Facades\DB;


class LocationController extends Controller
{

	// Test case: Not used for pharmacies project

	public $longitude;
	public $latitude;
    
	public function index()
	{

		$location = DB::table('locations')->selectRaw('
 		ST_Distance_Sphere(
            point(longitude, latitude),
            point(?, ?)
        ) * .000621371192 as distance', 
    [ 
    $this->longitude = -94.382172,
    $this->latitude = 38.910843,
	])
	->orderBy('distance', 'asc')
	->first();

	dd($result);

		 //return Location::all();

	}

}
