<?php

namespace App\Helper;

trait StaticCalling {
    protected function callStatic($className, $methodName) {
        $parameters = func_get_args();
        $parameters = array_slice($parameters, 2);

        return call_user_func_array($className . '::' . $methodName, $parameters);
    }
}