<?php

use Illuminate\Http\Request;
header('Access-Control-Allow-Origin:  *');
header('Access-Control-Allow-Methods:  POST, GET, OPTIONS, PUT, DELETE');
header('Access-Control-Allow-Headers:  Content-Type, X-Auth-Token, Origin, Authorization');
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


Route::post('/register', 'AuthController@register');

Route::post('/login', 'AuthController@login');
Route::post('/logout', 'AuthController@logout');


Route::group(['middleware' => 'auth.jwt'], function () {
    Route::get('instituicoes/{id}', 'InstituicaoController@unicInt');
    Route::get('instituicoes', 'InstituicaoController@index');
    Route::post('instinew', 'InstituicaoController@create');
    Route::post('instiedit', 'InstituicaoController@update');
    Route::post('instidelete', 'InstituicaoController@delete');

    Route::get('cursosAll/{id}', 'CursoController@index');
    Route::get('cursos/{id}', 'CursoController@unicInt');
    Route::post('cursonew', 'CursoController@create');
    Route::post('cursoedit', 'CursoController@update');
    Route::post('cursodelete', 'CursoController@delete');


    Route::get('alunosAll/{id}', 'AlunoController@unicInt');
    Route::get('alunos/{id}', 'AlunoController@unicInt');
    Route::post('alunonew', 'AlunoController@create');
    Route::post('alunoedit', 'AlunoController@update');
    Route::post('alunodelete', 'AlunoController@delete');




});


