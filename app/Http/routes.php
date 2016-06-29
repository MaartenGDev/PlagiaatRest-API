<?php
use Symfony\Component\Routing\Route;
use Symfony\Component\Routing\RouteCollection;

$routes = new RouteCollection();

$options = new Route('/file/{file}/percentage', array(
    '_controller' => 'OneDriveController@options'
));

$options->setMethods(['OPTIONS']);

$fileOptions = new Route('/files', array(
    '_controller' => 'OneDriveController@options'
));

$fileOptions->setMethods(['OPTIONS']);

$file = new Route('/file/{file}/percentage', array(
    '_controller' => 'OneDriveController@file'
));

$file->setMethods(['POST']);


$rootFolder = new Route('/files',array(
   '_controller' => 'OneDriveController@rootFiles'
));

$rootFolder->setMethods(['GET']);

$folderChildren = new Route('/files/{folder}',array(
    '_controller' => 'OneDriveController@rootFiles'
));

$folderChildren->setMethods(['GET']);

$routes->add('options', $options);
$routes->add('fileOptions', $fileOptions);
$routes->add('folder', $file);

// List folder children
$routes->add('rootFolder',$rootFolder);
$routes->add('folderChildren',$folderChildren);



return $routes;