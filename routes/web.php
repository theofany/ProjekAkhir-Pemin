<?php

/** @var \Laravel\Lumen\Routing\Router $router */

/*
|--------------------------------------------------------------------------
| Application Routes
|--------------------------------------------------------------------------
|
| Here is where you can register all of the routes for an application.
| It is a breeze. Simply tell Lumen the URIs it should respond to
| and give it the Closure to call when that URI is requested.
|
*/

$router->get('/', function () use ($router) {
    return $router->app->version();
});

$router->group(['prefix' => 'auth'], function () use ($router) {
    $router->post('/register', ['uses'=> 'AuthController@register']);
    $router->post('/login', ['uses'=> 'AuthController@login']); // route login
});

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->post('/{nim}/matakuliah/{mkId}', ['middleware' => 'jwt.auth', 'uses' => 'MahasiswaController@addMataKuliah']);
});

$router->group(['prefix' => 'mahasiswa'], function () use ($router) {
    $router->put('/{nim}/matakuliah/{mkId}', ['middleware' => 'jwt.auth', 'uses' => 'MahasiswaController@delMataKuliah']);
});

$router->get('/home', ['middleware' => 'jwt.auth','uses' => 'HomeController@home']); 

$router->get('/matakuliah', ['uses'  => 'MataKuliahController@getAllMatkul']);


$router->get('/mahasiswa', ['uses' => 'MahasiswaController@getAllMahasiswa']);
$router->get('/mahasiswa/profile', ['middleware' => 'jwt.auth','uses' => 'MahasiswaController@getAllMahasiswabyProfile']);
$router->get('/mahasiswa/{nim}', ['uses' => 'MahasiswaController@getAllMahasiswabyNim']);

//tes
