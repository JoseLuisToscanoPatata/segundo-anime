<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Here you may specify the default filesystem disk that should be used
    | by the framework. The "local" disk, as well as a variety of cloud
    | based disks are available to your application. Just store away!
    |
    */

    'default' => env('FILESYSTEM_DRIVER', 'public'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "sftp", "s3"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_ACCESS_KEY_ID'),
            'secret' => env('AWS_SECRET_ACCESS_KEY'),
            'region' => env('AWS_DEFAULT_REGION'),
            'bucket' => env('AWS_BUCKET'),
            'url' => env('AWS_URL'),
            'endpoint' => env('AWS_ENDPOINT'),
            'visibility'=>'public',
        ],

        /**
         * AWS_ACCESS_KEY_ID=AKIA4QTBKCG5GEJXOJUT
        *AWS_SECRET_ACCESS_KEY=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
        *AWS_DEFAULT_REGION=us-east-2
        *AWS_BUCKET=proyectobigchungus
         */

    ],

    /*
    |--------------------------------------------------------------------------
    | Symbolic Links
    |--------------------------------------------------------------------------
    |
    | Here you may configure the symbolic links that will be created when the
    | `storage:link` Artisan command is executed. The array keys should be
    | the locations of the links and the values should be their targets.
    |
    */

    'links' => [ //Links utilizados entre la carpeta storage y la carpeta public, usados para acceder y almacenar nuevas im??genes
        public_path('storage') => storage_path('app/public'),
        public_path('storage/profile-photos') => storage_path('app/public/profile-photos'),
        public_path('storage/manga-photos') => storage_path('app/public/manga-photos'),
        public_path('storage/anime-photos') => storage_path('app/public/anime-photos'),
    ],

];
