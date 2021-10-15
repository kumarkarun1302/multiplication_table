<?php

use \App\Contract\MultiplicationView;

class Application {
    //@var MultiplicationView
    private $multiplicationView;

    function __construct(MultiplicationView $multiplicationView)
    {
        $this->multiplicationView = $multiplicationView;
    }

     function printMatrix(int $baseFrom, int $baseTo) {
         $this->multiplicationView->print($baseFrom, $baseTo);
     }
 }