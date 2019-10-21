<?php

use Symfony\Component\Routing\Route;

return [
    'test' => new Route('/test', ['_controller' => \App\Controllers\TestController::class, '_action' => 'test']),

    'login' => new Route('/login', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'login']),
    'logout' => new Route('/logout', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'logout']),
    'register' => new Route('/register', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'register']),

    'index' => new Route('/', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'index']),
    'list' => new Route('/list', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'list']),
    'user' => new Route('/user', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'user']),
];
