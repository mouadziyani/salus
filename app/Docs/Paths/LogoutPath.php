<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/logout',
    tags: ['Auth'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 200, description: 'Logged out')]
)]
class LogoutPath {}
