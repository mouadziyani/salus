<?php

namespace App\Docs;

use OpenApi\Attributes as OA;

#[OA\Info(
    title: 'Health Assistant API',
    version: '1.0.0',
    description: 'REST API for symptoms, doctors, appointments, and AI health advice.'
)]
#[OA\Server(url: '/api')]
#[OA\SecurityScheme(
    securityScheme: 'sanctum',
    type: 'http',
    scheme: 'bearer',
    bearerFormat: 'Bearer'
)]
class OpenApiDocs
{
}
