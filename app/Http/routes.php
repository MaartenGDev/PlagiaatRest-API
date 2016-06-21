<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$options = new Route('/file/{file}/percentage', array(
    '_controller' => 'OneDriveController@options'
));

$options->setMethods('OPTIONS');

$file = new Route('/file/{file}/percentage', array(
    '_controller' => 'OneDriveController@file'
));

$file->setMethods(['GET','POST']);

$routes->add('options', $options);
$routes->add('folder', $file);

return $routes;