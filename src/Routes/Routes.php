<?php
return [
    '/products/akakce'=>[
      'callable' => "Product@getProducts",
      'params' => [
          'platform'=>'akakce'
      ]
    ],
    '/products/cimri'=>[
        'callable' => "Product@getProducts",
        'params' => [
            'platform'=>'cimri'
        ]
    ],
    '/products/epey'=>[
        'callable' => "Product@getProducts",
        'params' => [
            'platform'=>'epey'
        ]
    ]
];