<?php

use Symfony\Component\HttpFoundation\Session\Session;
use Symfony\Component\Routing\Matcher\UrlMatcher;
use Symfony\Component\Routing\RequestContext;
use Symfony\Component\Routing\RouteCollection;
use Symfony\Component\HttpFoundation\Request;

$config = include __DIR__ . '/config/config.php';
\App\Components\Repository::init($config['database']);

$webRoutes = include  __DIR__ . '/routes/web.php';

$routes = new RouteCollection();
foreach ($webRoutes as $routeName => $webRoute) {
    $routes->add($routeName, $webRoute);
}

$request = Request::createFromGlobals();
$context = new RequestContext();
$context->fromRequest($request);

$matcher = new UrlMatcher($routes, $context);
$parameters = $matcher->match($context->getPathInfo());

$session = new Session();
$session->start();

$controller = new $parameters['_controller']($request, $session, new \App\Components\Auth($session));
$res = $controller->{$parameters['_action']}();

if ($res instanceof \App\Components\View) {
    echo $res->render();
}
