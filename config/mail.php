<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Default Mailer
    |--------------------------------------------------------------------------
    |
    | This option controls the default mailer that is used to send any email
    | messages sent by your application. Alternative mailers may be setup
    | and used as needed; however, this mailer will be used by default.
    |
    */

    'default' => env('MAIL_MAILER', 'smtp'),

    /*
    |--------------------------------------------------------------------------
    | Mailer Configurations
    |--------------------------------------------------------------------------
    |
    | Here you may configure all of the mailers used by your application plus
    | their respective settings. Several examples have been configured for
    | you and you are free to add your own as your application requires.
    |
    | Laravel supports a variety of mail "transport" drivers to be used while
    | sending an e-mail. You will specify which one you are using for your
    | mailers below. You are free to add additional mailers as required.
    |
    | Supported: "smtp", "sendmail", "mailgun", "ses",
    |            "postmark", "log", "array"
    |
    */


    /**
     * Configuración a utilizar en el fichero .env
     * 
     * MAIL_MAILER=smtp
    *MAIL_HOST=smtp.gmail.com
    *MAIL_PORT=587
    *MAIL_USERNAME=ejemplogimnasio@gmail.com
    *MAIL_PASSWORD=pixgledhjragixzu
    *MAIL_ENCRYPTION=tls
    *MAIL_FROM_ADDRESS=ejemplogimnasio@gmail.com
    *MAIL_FROM_NAME="${APP_NAME}"
     */

    'mailers' => [
        'smtp' => [
            'transport' => 'smtp', //Transport
            'host' => 'smtp.gmail.com', //Host
            'port' => 587, //puerto
            'encryption' => 'tls', //Encriptación
            'username' => 'ejemplogimnasio@gmail.com', //Correo desde el que enviamos el correo
            'password' => 'pixgledhjragixzu', //Contraseña dle correo encriptada
            'timeout' => null,
             'stream' => [
                'ssl' => [
                    'allow_self_signed' => true,
                    'verify_peer' => false,
                    'verify_peer_name' => false,
                ],
            ],
        ],

        'ses' => [
            'transport' => 'ses',
        ],

        'mailgun' => [
            'transport' => 'mailgun',
        ],

        'postmark' => [
            'transport' => 'postmark',
        ],

        'sendmail' => [
            'transport' => 'sendmail',
            'path' => '/usr/sbin/sendmail -bs',
        ],

        'log' => [
            'transport' => 'log',
            'channel' => env('MAIL_LOG_CHANNEL'),
        ],

        'array' => [
            'transport' => 'array',
        ],
    ],




    'port'=>env('MAIL_PORT',2525),
    /*
    |--------------------------------------------------------------------------
    | Global "From" Address
    |--------------------------------------------------------------------------
    |
    | You may wish for all e-mails sent by your application to be sent from
    | the same address. Here, you may specify a name and address that is
    | used globally for all e-mails that are sent by your application.
    |
    */

    'from' => [
        'address' => env('MAIL_FROM_ADDRESS', 'ejemplogimnasio@gmail.com'),
        'name' => env('MAIL_FROM_NAME', 'Big Chungus'),
    ],

    /*
    |--------------------------------------------------------------------------
    | Markdown Mail Settings
    |--------------------------------------------------------------------------
    |
    | If you are using Markdown based email rendering, you may configure your
    | theme and component paths here, allowing you to customize the design
    | of the emails. Or, you may simply stick with the Laravel defaults!
    |
    */

    'markdown' => [
        'theme' => 'default',

        'paths' => [
            resource_path('views/vendor/mail'),
        ],
    ],

];
