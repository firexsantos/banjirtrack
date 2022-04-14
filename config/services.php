<?php

return [

    /*
    |--------------------------------------------------------------------------
    | Third Party Services
    |--------------------------------------------------------------------------
    |
    | This file is for storing the credentials for third party services such
    | as Mailgun, Postmark, AWS and more. This file provides the de facto
    | location for this type of information, allowing packages to have
    | a conventional file to locate the various service credentials.
    |
    */

    'mailgun' => [
        'domain' => env('MAILGUN_DOMAIN'),
        'secret' => env('MAILGUN_SECRET'),
        'endpoint' => env('MAILGUN_ENDPOINT', 'api.mailgun.net'),
    ],

    'postmark' => [
        'token' => env('POSTMARK_TOKEN'),
    ],

    'ses' => [
        'key' => env('AWS_ACCESS_KEY_ID'),
        'secret' => env('AWS_SECRET_ACCESS_KEY'),
        'region' => env('AWS_DEFAULT_REGION', 'us-east-1'),
    ],


    'firebase' => [
        'api_key' => 'AIzaSyCYabXocVT3zlXyJrJvMW4CBgzg82kfT30', // Only used for JS integration
        'auth_domain' => 'transmetropekanbaru-2021tmp.firebaseapp.com', // Only used for JS integration
        'database_url' => 'https://transmetropekanbaru-2021tmp-default-rtdb.asia-southeast1.firebasedatabase.app',
        'secret' => 'ciUS74roknkEqVwl76Ag0ziC2xQhJN5sFo7seMmx',
        'storage_bucket' => 'transmetropekanbaru-2021tmp.appspot.com', // Only used for JS integration
    ],
];
