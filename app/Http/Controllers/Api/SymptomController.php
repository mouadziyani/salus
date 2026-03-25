<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreSymptomRequest;
use App\Http\Requests\Api\UpdateSymptomRequest;
use App\Models\Symptom;
use Illuminate\Http\Request;

class SymptomController extends Controller
{
    public function index(Request $request)
    {
        $symptoms = $request->user()->symptoms()
            ->orderByDesc('date_recorded')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'symptoms' => $symptoms,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function store(StoreSymptomRequest $request)
    {
        $symptom = $request->user()->symptoms()->create($request->validated());

        return response()->json([
            'success' => true,
            'data' => [
                'symptom' => $symptom,
            ],
            'message' => 'The operation was successful'
        ], 201);
    }

    public function show(Request $request, int $id)
    {
        $symptom = Symptom::where('user_id', $request->user()->id)->find($id);

        if (!$symptom) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'symptom' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'symptom' => $symptom,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function update(UpdateSymptomRequest $request, int $id)
    {
        $symptom = Symptom::where('user_id', $request->user()->id)->find($id);

        if (!$symptom) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'symptom' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        $symptom->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => [
                'symptom' => $symptom,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function destroy(Request $request, int $id)
    {
        $symptom = Symptom::where('user_id', $request->user()->id)->find($id);

        if (!$symptom) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'symptom' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        $symptom->delete();

        return response()->json([
            'success' => true,
            'data' => (object) [],
            'message' => 'The operation was successful'
        ]);
    }
}

