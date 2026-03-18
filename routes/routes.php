<?php

use core\http\Route;

new Route(['GET' => '/'], ['HomeController' => 'index']);
new Route(['GET' => '/register'], ['RegisterController' => 'index']);