<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/doctors/search',
    tags: ['Doctors'],
    parameters: [
        new OA\Parameter(name: 'specialty', in: 'query', required: false, schema: new OA\Schema(type: 'string')),
        new OA\Parameter(name: 'city', in: 'query', required: false, schema: new OA\Schema(type: 'string'))
    ],
    responses: [new OA\Response(response: 200, description: 'Search doctors')]
)]
class DoctorsSearchPath {}
