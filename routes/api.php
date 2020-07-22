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

Route::middleware('auth:api')->get('/user', function (Request $request) {
    return $request->user();
});

// List Members
Route::get('members', 'MemberController@index');

// List Single Member
Route::get('member/{id}', 'MemberController@show');

// Create New Member
Route::post('member', 'MemberController@store');

// Update Member
Route::put('member/{id}', 'MemberController@store');

// Delete Member
Route::delete('member/{id}', 'MemberController@destroy');
