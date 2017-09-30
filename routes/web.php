<?php

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider within a group which
| contains the "web" middleware group. Now create something great!
|
*/

Route::group(['prefix' => 'admin','middleware' => ['auth','hasRole:admin']], function () {
//formulario crear job
    Route::get('/create-job', 'AdminJobController@createJob');
//Guardar Job
    Route::post('/create-job', 'AdminJobController@saveJob')->name('saveJob');

    Route::get('/my-jobs', 'AdminJobController@myjobs')->name('myJobs');
    Route::get('/editJob/{id}', 'AdminJobController@editJob')->name('editJob');
    Route::put('/editJob/{id}', 'AdminJobController@updateJob')->name('updateJob');
    Route::delete('/deleteJob/{id}', 'AdminJobController@deleteJob')->name('deleteJob');
});
Route::get('/', function () {
    return redirect()->route('home');
});

Route::get('/jobs', 'HomeController@index')->name('home');
Route::get('/jobs/{id}', 'HomeController@view')->name('viewJob');

Route::get('/hola-mundo', function () {
    //Eloquent
    $user = \App\User::all();
    //Query Builder
    $user1= \DB::table('users')->get();

    return response()->json($user1);
});

/**
 * GET
 * POST
 * PUT
 * DELETE
 */

Route::post('crear-algo',  function () {

});
Route::put('actualizar-algo', function () {

});
Route::delete('eliminar-algo', function () {

});



Auth::routes();
