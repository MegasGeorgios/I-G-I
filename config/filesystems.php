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

    'default' => env('FILESYSTEM_DRIVER', 'local'),

    /*
    |--------------------------------------------------------------------------
    | Default Cloud Filesystem Disk
    |--------------------------------------------------------------------------
    |
    | Many applications store files both locally and in the cloud. For this
    | reason, you may specify a default "cloud" driver here. This driver
    | will be bound as the Cloud disk implementation in the container.
    |
    */

    'cloud' => env('FILESYSTEM_CLOUD', 's3'),

    /*
    |--------------------------------------------------------------------------
    | Filesystem Disks
    |--------------------------------------------------------------------------
    |
    | Here you may configure as many filesystem "disks" as you wish, and you
    | may even configure multiple disks of the same driver. Defaults have
    | been setup for each driver as an example of the required options.
    |
    | Supported Drivers: "local", "ftp", "s3", "rackspace"
    |
    */

    'disks' => [

        'local' => [
            'driver' => 'local',
            'root' => storage_path('app'),
        ],

        // 'google' => [
        //     'driver' => 'google',
        //     'clientId' => '767650517635-218qguvcqmbtfm5a051i77d51noctsos.apps.googleusercontent.com',
        //     'clientSecret' => 'B1n_eQYn0I5Q_O7mBfr9UHWJ',
        //     'refreshToken' => '1/aEDj_8IyU5rWxqS_rttEkP0m4KAnRZzdBqD6BUDduLs',
        //     'folderId' => '10eY_9N384GupdnMPlkNUMBcS4ksmUhDn',
        // ],

        'dropbox' => [
    			'driver' => 'dropbox',
    			'appSecret' => 'kr2j17prlczv96g',
    			'authorizationToken' => 'GTVF6Wr8kFAAAAAAAAAAClK7hOhaNGNoxTXF03uQEA074ggGLKRey4wBVrDC9NoQ',
    		],

        'public' => [
            'driver' => 'local',
            'root' => storage_path('app/public'),
            'url' => env('APP_URL').'/storage',
            'visibility' => 'public',
        ],

        's3' => [
            'driver' => 's3',
            'key' => env('AWS_KEY'),
            'secret' => env('AWS_SECRET'),
            'region' => env('AWS_REGION'),
            'bucket' => env('AWS_BUCKET'),
        ],

    ],

];
