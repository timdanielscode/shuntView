<?php

use core\http\Route;
use core\http\Middleware;

new Route(['GET' => '/'], ['HomeController' => 'index']);
new Route(['GET' => '/register'], ['RegisterController' => 'index']);
new Route(['POST' => '/register'], ['RegisterController' => 'store']);
new Route(['GET' => '/login'], ['LoginController' => 'index']);
new Route(['POST' => '/login'], ['LoginController' => 'login']);

Middleware::route('auth', function() {

    new Route(['GET' => '/trainer/[id]'], ['TrainerController' => 'index']);
    new Route(['POST' => '/trainer/[id]'], ['TrainerController' => 'update']);
    new Route(['POST' => '/trainer/[id]/delete'], ['TrainerController' => 'delete']);
    new Route(['GET' => '/trainer/[id]/new'], ['NewController' => 'index']);
    new Route(['POST' => '/trainer/[id]/new'], ['NewController' => 'store']);
    new Route(['GET' => '/logout'], ['LogoutController' => 'logout']);
});