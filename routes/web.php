<?php

$router->group(['prefix' => 'v1'], function () use ($router) {
    $router->get('/candidates/page/{page}/limit/{limit}','CandidateController@index');
    $router->get('/candidate/{id}','CandidateController@show');
    $router->post('/candidates','CandidateController@create');
    $router->post('/candidates/search','CandidateController@search');
});