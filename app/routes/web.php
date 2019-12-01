<?php

use Symfony\Component\Routing\Route;

return [
    'test' => new Route('/test', ['_controller' => \App\Controllers\TestController::class, '_action' => 'test']),
    'test_insert' => new Route('/test/insert', ['_controller' => \App\Controllers\TestController::class, '_action' => 'insert']),

    'login' => new Route('/login', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'login']),
    'logout' => new Route('/logout', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'logout']),
    'register' => new Route('/register', ['_controller' => \App\Controllers\AuthController::class, '_action' => 'register']),

    'index' => new Route('/', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'index']),
    'list' => new Route('/list', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'list']),
    'user' => new Route('/user', ['_controller' => \App\Controllers\HomeController::class, '_action' => 'user']),

    'search' => new Route('/search', ['_controller' => \App\Controllers\SearchController::class, '_action' => 'index']),
    'search_city' => new Route('/search/city', ['_controller' => \App\Controllers\SearchController::class, '_action' => 'city']),

    'dialogs_list' => new Route('/dialogs/list', ['_controller' => \App\Controllers\DialogController::class, '_action' => 'list']),
    'dialogs_dialog' => new Route('/dialogs/dialog', ['_controller' => \App\Controllers\DialogController::class, '_action' => 'dialog']),
    'dialogs_create' => new Route('/dialogs/create', ['_controller' => \App\Controllers\DialogController::class, '_action' => 'createDialog']),

];
