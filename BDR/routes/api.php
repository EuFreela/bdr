<?php

use Illuminate\Http\Request;

/*
|--------------------------------------------------------------------------
| API Routes BDR
|--------------------------------------------------------------------------
|
*/

Route::middleware('apijwt')->get('/user', function (Request $request) {
    return 'oa';
});

Route::post('signin', 'APIController@apiPostSignin');
Route::post('signup', 'APIController@apiPostSignup');

Route::post('task-create', 'APIController@apiPostCreateTask');
Route::get('task-list', 'APIController@apiGetListTask');
Route::put('task-edit/{id}', 'APIController@apiPutTask');
Route::delete('task-del/{id}', 'APIController@apiDeleteTask');