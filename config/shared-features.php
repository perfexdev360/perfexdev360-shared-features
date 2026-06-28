<?php

return [
    /*
    |--------------------------------------------------------------------------
    | Shared Features Configurations
    |--------------------------------------------------------------------------
    |
    | Define any default configuration for your shared features here.
    |
    */
    'enabled' => true,

    /*
    |--------------------------------------------------------------------------
    | WhatsApp Cloud API
    |--------------------------------------------------------------------------
    */
    'whatsapp' => [
        'access_token' => env('WHATSAPP_CLOUD_API_TOKEN', ''),
        'phone_number_id' => env('WHATSAPP_CLOUD_PHONE_NUMBER_ID', ''),
        'api_version' => env('WHATSAPP_CLOUD_API_VERSION', 'v17.0'),
    ],

    /*
    |--------------------------------------------------------------------------
    | AI Blogging
    |--------------------------------------------------------------------------
    */
    'ai_blogging' => [
        'provider' => env('AI_BLOGGING_PROVIDER', 'openai'), // openai, gemini, anthropic
        'api_key' => env('AI_BLOGGING_API_KEY', ''),
        'model' => env('AI_BLOGGING_MODEL', 'gpt-4'),
    ],
];
