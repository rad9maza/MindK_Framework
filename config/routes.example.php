<?php

return [
    'get_all_products' => [
        'pattern' => '/posts',
        'http_method' => 'GET',
        'class' => 'Products',
        'action' => 'get_all_posts'
    ],
    'get_post_by_id' => [
        'pattern' => '/posts/{id}',
        'http_method' => 'GET',
        'class' => 'Products',
        'action' => 'get_post',
        'requirements' => [
            'id' => '[0-9]'
        ]
    ]
];
?>