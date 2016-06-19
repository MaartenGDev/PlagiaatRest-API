<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$routes->add('folder', new Route('/folder/{folder}', array(
        '_controller' => 'OneDriveController@folder'
    )
));

return $routes;