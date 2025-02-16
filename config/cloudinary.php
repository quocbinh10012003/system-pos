<?php
// return [
//     'cloud_url' => env('CLOUDINARY_URL'),

//     'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET', null),

//     'options' => [
//         'folder' => env('CLOUDINARY_FOLDER', 'laravel_uploads'),
//         'resource_type' => 'auto',
//     ],
// ];

return [
    'cloud_url' => env('CLOUDINARY_URL'),
    'upload_preset' => env('CLOUDINARY_UPLOAD_PRESET'), // Thêm dòng này
    'options' => [
        'folder' => 'laravel_uploads',
        'resource_type' => 'auto'
    ],
];
?>