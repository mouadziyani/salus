<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/appointments',
    tags: ['Appointments'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 200, description: 'List appointments')]
)]
#[OA\Post(
    path: '/appointments',
    tags: ['Appointments'],
    security: [['sanctum' => []]],
    responses: [new OA\Response(response: 201, description: 'Create appointment')]
)]
class AppointmentsPath {}
