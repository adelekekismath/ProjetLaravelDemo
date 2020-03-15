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

/* Route::get('/', function () {
    return view('welcome');
}); */

Route::get('/cool', function () {
    return "cool";
});

Route::get('', 'MainController@Index')->name("Home");

Route::get('inscription', 'MainController@inscription')->name("SignIn");

Route::get('connexion', 'MainController@connexion')->name("SignUp");

Route::get('demo', 'MainController@demo')->name("demo");


Route::post('traitement', 'MainController@traitement')->name("traitement");

Route::post('traitementC', 'MainController@traitementC')->name("traitementC");

Route::get('DashboardEtu', 'MainController@DashboardEtu')->name("DashboardEtu");
Route::get('profil', 'MainController@profil')->name("profil");
Route::get('adminEtu', 'MainController@adminEtu')->name("adminEtu");
Route::get('composer', 'MainController@composer')->name("composer");

Route::post('traitementComposer', 'MainController@traitementComposer')->name("traitementComposer");
Route::get('traitementSuppression/{id_mat}', 'MainController@traitementSuppression')->name("traitementSuppression");

Route::post('traitementModification', 'MainController@traitementModification')->name("traitementModification");
Route::get('Modifier/{id_mat}/{note}', 'MainController@Modifier')->name("Modifier");
Route::get('modifierUser', 'MainController@modifierUser')->name("modifierUser");
Route::post('traitementModifUser', 'MainController@traitementModifUser')->name("traitementModifUser");


//Route::resource('note', 'MainController');
