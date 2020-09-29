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

Auth::routes();
Route::get('/', 'HomeController@index')->name('home');
Route::view('about','about');
Route::get('sub/{slug}', 'MenuController@index');

Route::middleware(['web', 'auth'])->group(function () {
    Route::get('dashboard', 'DashboardController@index')->name('dashboard');
    Route::get('menus/index', 'MenuController@indexBackend')->name('menu.index');
    Route::resource('menus', 'MenuController');
    Route::get('divisions/index', 'DivisionsController@index')->name('divisions.index');
    Route::resource('divisions', 'DivisionsController');
    Route::get('units/index', 'UnitsController@index')->name('units.index');
    Route::resource('units', 'UnitsController');
    Route::get('settings/index', 'SettingsController@index')->name('settings.index');
    Route::resource('settings', 'SettingsController');
});




/*
Route::get('ppa-menu', 'ppaMenuController@index')->name('sub-menu.ppa-menu');
Route::get('ccharter-menu', 'CCharterMenuController@index')->name('sub-menu.ccharter-menu');
Route::get('csf-menu', 'csfMenuController@index')->name('sub-menu.csf-menu');*/


/*
// Route::view('/','home');

Route::get('/', [
    'uses' => 'IndexController@index'
])->name('home');

Route::view('about','about');
Route::view('contact','contact');
Route::view('services','services');
Route::view('register','auth.register');

// create here------------------------------------------------------------>
// Route::view('divisions/create','divisions.create');




// Route::view('units/create','units.create');
Route::get('units/create', 'UnitsController@create')
     ->name('units.create');

// Route::view('analysis/create','chemmicro.analysis.create');

Route::get('analysis/create', 'ChemmicroAnalysisController@create')
     ->name('chemmicro.analysis.create');


// Route::view('sched/create','chemmicro.sched.create');
Route::get('sched/create', 'ChemmicroSchedController@create')
     ->name('chemmicro.sched.create');

// Route::view('services/create','services.create');



// Route::view('settings/create','settings.create');


// index here------------------------------------------------------------>



Route::get('analysis/index', 'ChemmicroAnalysisController@index')
     ->name('chemmicro.analysis.index');

Route::get('sched/index', 'ChemmicroSchedController@index')
     ->name('chemmicro.sched.index');

Route::get('services/index', 'ServicesController@index')
     ->name('services.index');



Route::get('attachments/index', 'ServicesController@index')
     ->name('attachments.index');

Route::get('pdf-viewer', 'PDFViewController@index')
     ->name('pdf-viewer.index');






// Route::post('/addservices', 'Servicesontroller@store');

Route::post('addservices', 'ServicesController@store')
     ->name('addservices');


// Route::resource('dashboard','DashboardController')->middleware('auth');
// Route::resource('services', 'ServicesController');



Route::resource('ajax-crud', 'AjaxCrudController');

Route::post('ajax-crud/update', 'AjaxCrudController@update')->name('ajax-crud.update');

Route::get('ajax-crud/destroy/{id}', 'AjaxCrudController@destroy');


Route::resource('divisions', 'DivisionsController')->middleware('auth');
// Route::post('division/store', 'DivisionsController@store');
Route::resource('units', 'UnitsController');
// Route::post('division/store', 'DivisionsController@store');
//  Route::get('division/delete/{id}', 'DivisionsController@destroy');
Route::resource('services', 'ServicesController')->middleware('auth');
Route::resource('analysis', 'ChemmicroAnalysisController')->middleware('auth');
Route::resource('schedule', 'ChemmicroSchedController')->middleware('auth');
Route::resource('settings', 'SettingsController')->middleware('auth');
Route::resource('register', 'Auth.RegisterController')->middleware('auth');
Route::resource('attachments', 'ServicesController')->middleware('auth');
// Route::resource('homeservices','HomeServicesController');
Route::resource('pdf-viewer','PDFViewController');
Route::resource('/','MenuController');
Route::resource('ccharter-menu','ccharterMenuController');
Route::resource('ppa-menu','ppaMenuController');
Route::resource('csf-menu','csfMenuController');
// Route::get('/test', 'UnitsController@index');

Route::get('ccharter-menu', 'ccharterMenuController@index')
 ->name('sub-menu.ccharter-menu');


Auth::routes();


Route::get('get-units/{divisionID}', 'UnitsController@getUnits');
Route::get('get-units/{divisionID}', 'RegisterController@getUnits');
Route::get('services', 'ServicesController@getDivision');
Route::get('get-units/{divisionID}', 'ServicesController@getUnits');
Route::get('attachments/{id}', 'ServicesController@show');
*/
