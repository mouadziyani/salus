<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/ai/health-advice',
    tags: ['AI'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 201, description: 'Generate advice')]
)]
#[OA\Get(
    path: '/ai/health-advice',
    tags: ['AI'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 200, description: 'Advice history')]
)]
class AiAdvicePath {}
