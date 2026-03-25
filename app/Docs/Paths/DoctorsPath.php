<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/doctors',
    tags: ['Doctors'],
    responses: [new OA\Response(response: 200, description: 'List doctors')]
)]
class DoctorsPath {}
