<?php

use core\http\Route;

new Route(['GET' => '/'], ['HomeController' => 'index']);
new Route(['GET' => '/register'], ['RegisterController' => 'index']);
new Route(['POST' => '/register'], ['RegisterController' => 'store']);