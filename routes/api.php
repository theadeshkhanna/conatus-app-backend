<?php

$api = app('Dingo\Api\Routing\Router');

$basePath     = "App\Api\V1\Controllers\\";

$api->version('v1', function ($api) use ($basePath){
    $api->post('register', $basePath . 'RegistrationController@create');
    $api->get('/', function () {
       return 'working';
    });
    $api->post('create', $basePath . 'StudentController@createStudent');
});
