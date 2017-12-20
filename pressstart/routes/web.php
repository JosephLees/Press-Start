<?php

Route::get('/', function () {
	return view('pages.index');
})->middleware('auth');

/* Login Routes */
Route::get('/login', 'LoginController@create')->name('login');
Route::post('/login', 'LoginController@store');
Route::get('/logout', 'LoginController@destroy');

/* Customer Routes */
Route::get('/customer', 'CustomerController@index');
Route::get('/customer/create', 'CustomerController@create');
Route::post('/customer/create', 'CustomerController@store');
Route::get('/customer/{id}', 'CustomerController@view');
Route::post('/customer/{id}', 'CustomerController@update');
Route::get('/customer/{id}/delete', 'CustomerController@delete');

/* Item Routes */
Route::get('/item','ItemController@index');
Route::get('/item/create', 'ItemController@create');
Route::post('/item/create', 'ItemController@store');
Route::get('/item/{id}', 'ItemController@view');
Route::post('/item/{id}', 'ItemController@update');
Route::get('/item/{id}/delete', 'ItemController@delete');

/* Preorder Routes */
Route::get('/preorder', 'PreorderController@index');
Route::get('/preorder/create', 'PreorderController@create');
Route::post('/preorder/create', 'PreorderController@store');
Route::get('/preorder/{id}', 'PreorderController@view');
Route::get('/preorder/{id}/delete', 'PreorderController@delete');
Route::get('/preorder/{id}/complete', 'PreorderController@complete');

/* Ticket Routes */
Route::get('/ticket', 'TicketController@index');
Route::get('/ticket/create', 'TicketController@create');
Route::post('/ticket/create', 'TicketController@store');
Route::get('/ticket/{id}', 'TicketController@view');
Route::post('/ticket/{id}', 'TicketController@update');

/* Admin Routes */
Route::group(['middleware' => 'App\Http\Middleware\AdminMiddleware'], function()
{
	/* Employee Routes */
	Route::get('/employee', 'EmployeeController@index');
	Route::get('/employee/{id}', 'EmployeeController@view');
	Route::post('/employee/{id}', 'EmployeeController@update');
	Route::get('/employee/{id}/delete', 'EmployeeController@delete');

	/* Registration Routes */
	Route::get('/register', 'RegistrationController@create');
	Route::post('/register', 'RegistrationController@store');
});

?>