<?php

/*
|--------------------------------------------------------------------------
| BDR
|--------------------------------------------------------------------------
|
| Rota padrão da web
|
*/

/**
 * HOME, RAIZ
 */
Route::get('/', function () {
    return view('welcome');
})->name('home');

/**
 * Textos
 */
Route::get('/text',function(){
    return redirect()->to('storage/text/Prova_PHP.pdf');
})->name('text.enunciado');



/*
|--------------------------------------------------------------------------
| BACKEND
|--------------------------------------------------------------------------
|
| Acesso restrito de usuários.
|
|@Harmis.
*/
Route::group(['prefix'=>'BDR','middleware' => ['web','auth']], function(){

    /**
     * TESTE 1
     */
    Route::get('fizzbuzz','BDRController@index')->name('fizzbuzz');

    /**
     * TESTE 2
     */
    Route::get('refactor','BDRController@Refactor')->name('refactor');
    Route::get('refactor-navegate','BDRController@navegateRefactor')->name('navegaterefactor');
    Route::get('refactor-set','BDRController@setRefactor')->name('setrefactor');
    Route::get('refactor-erase','BDRController@eraseRefactor')->name('eraserefactor');

    /**
     * TESTE 3
     */
    Route::get('user-list','BDRController@getUserList')->name('user.getlist');



    /**
     * TESTE 4
     */
    Route::get('task','TaskController@getCreate')->name('task.getcreate');
    Route::post('task','TaskController@postCreate')->name('task.postcreate');
    Route::get('task-list','TaskController@getList')->name('task.getlist');
    Route::get('task-edit/{id}','TaskController@getEdit')->name('task.getedit');
    Route::put('task-edit/{id}','TaskController@putEdit')->name('task.putedit');
    Route::get('task-del/{id}','TaskController@Delete')->name('task.delete');

});

Auth::routes();

Route::get('/home', 'HomeController@index')->name('home');

