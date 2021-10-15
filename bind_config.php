<?php

use App\Contract\MatrixTable;
use App\Contract\MultiplicationView;
use App\Implementation\BaseMatrixTable;
use App\Implementation\ExpressionTextMatrix;
use App\Implementation\ResultTextMatrix;
use Psr\Container\ContainerInterface;

$config = require 'config.php';
return [
    MatrixTable::class => function() use ($config) {
        $matrixConfig = $config['matrix'];
        return new BaseMatrixTable(
            $matrixConfig['direction'],
            $matrixConfig['multi_from'],
            $matrixConfig['multi_to'],
            $matrixConfig['limit_column'],
            $matrixConfig['limit_row'],
            );
    },
    MultiplicationView::class => function (ContainerInterface $container) use ($config) {
        $matrixConfig = $config['matrix'];
        $multiplicationViewClass = ($matrixConfig['format'] === 'result') ? ResultTextMatrix::class : ExpressionTextMatrix::class;
        return new $multiplicationViewClass($container->get(MatrixTable::class));
    }
];