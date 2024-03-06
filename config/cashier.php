<?php

return [
    'webhook' => [
        'path' => '/stripe/webhook',
        'secret' => env('STRIPE_WEBHOOK_SECRET'),
    ],
];