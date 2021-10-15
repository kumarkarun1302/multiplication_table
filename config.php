<?php

return [
    'matrix' => [
        'limit_column' => null,
        'limit_row' => 3,  // cannot set both limit column and limit row
        'is_prettify' => true,
        'direction' => 'r2c',  // r2c or c2r
        'multi_from' => 1,
        'multi_to' => null, // null = base_to
        'format' => 'result'  // result or expression
    ]
];