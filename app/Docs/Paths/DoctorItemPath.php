<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/doctors/{id}',
    tags: ['Doctors'],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Doctor detail')]
)]
class DoctorItemPath {}
