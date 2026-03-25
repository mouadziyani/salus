<?php

namespace App\Docs\Paths;

use OpenApi\Attributes as OA;

#[OA\Get(
    path: '/symptoms/{id}',
    tags: ['Symptoms'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Symptom detail')]
)]
#[OA\Put(
    path: '/symptoms/{id}',
    tags: ['Symptoms'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Update symptom')]
)]
#[OA\Delete(
    path: '/symptoms/{id}',
    tags: ['Symptoms'],
    security: [['sanctum' => []]],
    parameters: [new OA\Parameter(name: 'id', in: 'path', required: true, schema: new OA\Schema(type: 'integer'))],
    responses: [new OA\Response(response: 200, description: 'Delete symptom')]
)]
class SymptomItemPath {}
