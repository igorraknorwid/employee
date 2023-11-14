<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\AuthAdminController;
use App\Http\Controllers\LocationController;
use App\Http\Controllers\StationController;
use App\Http\Controllers\ServiceController;
use App\Http\Controllers\DentalRoleController;
use App\Http\Controllers\SampleServiceController;


/*
| API Admin Routes
*/

//Dental Roles api keys
// Route::get('/dental-roles', [DentalRoleController::class, 'index'])->name('dental-roles.index');
// Route::get('/dental-roles/{id}', [DentalRoleController::class, 'show'])->name('dental-roles.show');

//SampleServices api keys
Route::get('/sample-services', [SampleServiceController::class, 'index'])->name('sample-services.index');
Route::get('/sample-services/{id}', [SampleServiceController::class, 'show'])->name('sample-services.show');

//Services api keys
Route::get('/services', [ServiceController::class, 'index'])->name('services.index');
Route::get('/services/{id}', [ServiceController::class, 'show'])->name('services.show');

//Locations api keys
Route::get('/locations', [LocationController::class, 'index'])->name('locations.index');
Route::get('/locations/{id}', [LocationController::class, 'show'])->name('locations.show');

//Stations api keys
Route::get('/stations', [StationController::class, 'index'])->name('stations.index');
Route::get('/stations/{id}', [StationController::class, 'show'])->name('stations.show');


Route::middleware('guest:admin')->group(function () {
     //Auth api keys
  Route::post('login', [AuthAdminController::class, 'login']);
  Route::post('register', [AuthAdminController::class, 'register']); 
});

Route::middleware('auth:admin')->group(function () {
  //Auth api keys
  Route::post('logout', [AuthAdminController::class, 'logout']); 
  Route::get('user', [AuthAdminController::class, 'user']);

  //Locations api keys
  Route::post('/locations', [LocationController::class, 'store'])->name('locations.store');
  Route::put('/locations/{id}', [LocationController::class, 'update'])->name('locations.update'); 
  Route::delete('/locations/{id}', [LocationController::class, 'destroy'])->name('locations.destroy');

  //Stations api keys
   Route::post('/stations', [StationController::class, 'store'])->name('stations.store');
   Route::put('/stations/{id}', [StationController::class, 'update'])->name('stations.update');
   Route::delete('/stations/{id}', [StationController::class, 'destroy'])->name('stations.destroy');

   //Service api keys
     Route::post('/services', [ServiceController::class, 'store'])->name('services.store');
    Route::put('/services/{id}', [ServiceController::class, 'update'])->name('services.update');
    Route::delete('/services/{id}', [ServiceController::class, 'destroy'])->name('services.destroy');

    //SampleServices api keys
     Route::post('/sample-services', [SampleServiceController::class, 'store'])->name('sample-services.store');   
    Route::put('/sample-services/{id}', [SampleServiceController::class, 'update'])->name('sample-services.update');
    Route::delete('/sample-services/{id}', [SampleServiceController::class, 'destroy'])->name('sample-services.destroy');

    //Dental role api keys    
    // Route::post('/dental-roles', [DentalRoleController::class, 'store'])->name('dental-roles.store');
    // Route::put('/dental-roles/{id}', [DentalRoleController::class, 'update'])->name('dental-roles.update');
    // Route::delete('/dental-roles/{id}', [DentalRoleController::class, 'destroy'])->name('dental-roles.destroy');
    });




  


