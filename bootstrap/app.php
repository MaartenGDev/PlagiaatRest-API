<?php


use App\Core\Application;

$app = new Application(
    realpath(__DIR__ . '/../')
);


return $app;
