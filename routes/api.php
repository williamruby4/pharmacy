<?php

use App\Location;

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;
use Illuminate\Support\Facades\DB;


/*
|--------------------------------------------------------------------------
| API Routes
|--------------------------------------------------------------------------
|
| Here is where you can register API routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| is assigned the "api" middleware group. Enjoy building your API!
|
*/

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});


Route::get('locations', function() {

	$longitude = -94.646870;
	$latitude = 38.930290;


	$result = DB::table('locations')->selectRaw('*,
 	ST_Distance_Sphere(
            point(longitude, latitude),
            point(?, ?)
        ) * .000621371192 as distance
	', [ 
    $longitude,
    $latitude,
	])
	->orderBy('distance', 'asc')
	->first(); // first() will return the closest pharmacy only to the inputed longitude and latitude.
	//->get(); will return all pharmacy records ascending closest to furthest from the inputed longitude and latitude. 

	dd($result);
    
    //return Location::all();
});







