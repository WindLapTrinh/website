<?php

return [
    'paths' => ['api/*', 'sanctum/csrf-cookie'], // Đường dẫn API cần áp dụng CORS

    'allowed_methods' => ['GET', 'POST', 'OPTIONS', 'PUT', 'DELETE'], // Thêm các phương thức bạn cần

    'allowed_origins' => ['*'], // Các domain được phép (có thể là '*', hoặc chỉ domain Zalo Mini App)

    'allowed_origins_patterns' => [],

    'allowed_headers' => [
        'DNT', 'User-Agent', 'X-Requested-With', 'If-Modified-Since', 
        'Cache-Control', 'Content-Type', 'Range',
    ], // Các header được phép gửi trong request

    'exposed_headers' => ['Content-Length', 'Content-Range'], // Các header được trả về cho client

    'max_age' => 0,

    'supports_credentials' => false, // Có hỗ trợ cookie không
];
