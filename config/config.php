<?php

/*
 * You can place your custom package configuration in here.
 */
return [
    'oidc' => [
        'client_id'     => env("COMETCAST_OPENAPI_CLIENT_ID"),
        'redirectUri'   => env("COMETCAST_OPENAPI_REDIRECT_URI"),
        'client_secret' => env("COMETCAST_OPENAPI_CLIENT_SECRET"),
        'base_url'      => env("COMETCAST_OPENAPI_AUTH_BASEURL"),
        'scopes'        => env("COMETCAST_OPENAPI_SCOPES"),
        'pkce_method'   => "S256",
        'verify'        => env("COMETCAST_OPENAPI_SSL_VERIFY", false),  // 開發可用 略過 SSL
    ]
];