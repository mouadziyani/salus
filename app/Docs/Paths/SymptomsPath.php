<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/symptoms',
    tags: ['Symptoms'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 200, description: 'List symptoms')]
)]
#[OA\Post(
    path: '/symptoms',
    tags: ['Symptoms'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 201, description: 'Create symptom')]
)]
class SymptomsPath {}
