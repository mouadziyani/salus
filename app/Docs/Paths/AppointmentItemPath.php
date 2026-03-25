<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/appointments/{id}',
    tags: ['Appointments'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Appointment detail')]
)]
#[OA\Put(
    path: '/appointments/{id}',
    tags: ['Appointments'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Update appointment')]
)]
#[OA\Delete(
    path: '/appointments/{id}',
    tags: ['Appointments'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Delete appointment')]
)]
class AppointmentItemPath {}
