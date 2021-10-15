<?php

require 'vendor/autoload.php';

// create container
$containerBuilder = new \DI\ContainerBuilder();
$containerBuilder->addDefinitions('bind_config.php');
$container = $containerBuilder->build();


$application = $container->get('Application');
$application->printMatrix(1, 10);