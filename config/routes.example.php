<?php

return [
    'get_all_products' => [
        'pattern' => '/products',
        'http_method' => 'GET',
        'class' => 'Products',
        'action' => 'get_all_posts'
    ],
    'get_products_by_id' => [
        'pattern' => '/products/{id}',
        'http_method' => 'GET',
        'class' => 'Products',
        'action' => 'get_product',
        'requirements' => [
            'id' => '[0-9]{3}'
        ]
    ]
];
?>