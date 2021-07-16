<?php

use Illuminate\Http\Request;
use Illuminate\Support\Facades\Route;

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

// Route::middleware('auth:api')->get('/user', function (Request $request) {
//     return $request->user();
// });

Route::group([

    'prefix' => 'auth'

], function () {

    // Route::post('login', 'AuthController@login');
    // Route::post('logout', 'AuthController@logout');
    // Route::post('refresh', 'AuthController@refresh');
    // Route::post('me', 'AuthController@me');
    // Route::post('register', 'AuthController@register');

    Route::post('login', 'AuthController@login');
    Route::post('register', 'AuthController@register');
    Route::post('me', 'AuthController@me'); 
    Route::post('logout', 'AuthController@logout');

});

//Route::middleware(['auth', 'api'])->group(function () {

Route::get('get_tickets','TicketController@getTickets');

Route::post('create_ticket','TicketController@createTicket');

Route::delete('delete_ticket/{id}','TicketController@deleteTicket');

Route::put('update_ticket/{id}','TicketController@updateTicket');

Route::get('get_ticket/{id}','TicketController@getTicket');

//});

// Route::post('login', 'AuthController@login');
// Route::post('register', 'AuthController@register');
// Route::get('user-profile', 'AuthController@register'); 
// Route::post('logout', 'AuthController@register');



// Route::get('get_tickets','TicketController@getTickets');

// Route::post('create_ticket','TicketController@createTicket');

// Route::delete('delete_ticket/{id}','TicketController@deleteTicket');

// Route::put('update_ticket/{id}','TicketController@updateTicket');

// Route::get('get_ticket/{id}','TicketController@getTicket');


Route::get('get_news','NewsController@getNews');

Route::post('create_news','NewsController@createNews');

Route::delete('delete_news/{id}','NewsController@deleteNews');

Route::post('update_news/{id}','NewsController@updateNews');

Route::get('get_news/{id}','NewsController@getSingleNews');


Route::get('get_contacts','ContactController@getContacts');

Route::post('create_contact','ContactController@createContact');

Route::delete('delete_contact/{id}','ContactController@deleteContact');

Route::put('update_contact/{id}','ContactController@updateContact');

Route::get('get_contact/{id}','ContactController@getContact');
