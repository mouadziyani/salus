<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/login',
    tags: ['Auth'],
    responses: [new OA\Response(response: 200, description: 'Logged in')]
)]
class LoginPath {}
