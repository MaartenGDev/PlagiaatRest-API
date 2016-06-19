<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('folder', new Route('/file/{file}/content/{content}', array(
        '_controller' => 'OneDriveController@file'
    )
));

return $routes;