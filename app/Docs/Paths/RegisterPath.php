<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Post(
    path: '/register',
    tags: ['Auth'],
    responses: [new OA\Response(response: 201, description: 'Registered')]
)]
class RegisterPath {}
