<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/me',
    tags: ['Auth'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 200, description: 'Current user')]
)]
class MePath {}
