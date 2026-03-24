<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\GenerateHealthAdviceRequest;
use App\Models\HealthAdvice;
use App\Models\Symptom;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Http;

class HealthAdviceController extends Controller
{
    public function index(Request $request)
    {
        $advices = HealthAdvice::where('user_id', $request->user()->id)
            ->orderByDesc('generated_at')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'advices' => $advices,
            ],
            'message' => 'Opération réussie'
        ]);
    }

    public function store(GenerateHealthAdviceRequest $request)
    {
        $apiKey = config('services.openai.key');
        $model = config('services.openai.model');

        if (!$apiKey || !$model) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'ai' => ['Missing AI configuration']
                ],
                'message' => 'Configuration IA manquante'
            ], 500);
        }

        $limit = $request->input('limit', 5);

        $symptoms = Symptom::where('user_id', $request->user()->id)
            ->orderByDesc('date_recorded')
            ->limit($limit)
            ->get();

        if ($symptoms->isEmpty()) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'symptoms' => ['No recent symptoms found']
                ],
                'message' => 'Aucun symptéme récent'
            ], 422);
        }

        $symptomLines = $symptoms->map(function (Symptom $symptom) {
            $line = $symptom->name . ' (' . $symptom->severity . ')';
            if ($symptom->description) {
                $line .= ' - ' . $symptom->description;
            }
            return $line;
        })->implode("\n");

        $prompt = "User symptoms:\n" . $symptomLines . "\nProvide general wellness advice, not medical diagnosis.";

        $response = Http::withToken($apiKey)
            ->post('https://api.openai.com/v1/chat/completions', [
                'model' => $model,
                'messages' => [
                    [
                        'role' => 'system',
                        'content' => 'You are a helpful wellness assistant.'
                    ],
                    [
                        'role' => 'user',
                        'content' => $prompt
                    ],
                ],
                'temperature' => 0.4,
            ]);

        if (!$response->successful()) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'ai' => [$response->json('error.message') ?? 'AI request failed']
                ],
                'message' => 'Erreur lors de la génération IA'
            ], 502);
        }

        $adviceText = $response->json('choices.0.message.content');

        if (!$adviceText) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'ai' => ['Empty AI response']
                ],
                'message' => 'Réponse IA vide'
            ], 502);
        }

        $advice = HealthAdvice::create([
            'user_id' => $request->user()->id,
            'advice' => $adviceText,
            'generated_at' => now(),
            'symptoms_used' => $symptoms->map(function (Symptom $symptom) {
                return [
                    'id' => $symptom->id,
                    'name' => $symptom->name,
                    'severity' => $symptom->severity,
                    'description' => $symptom->description,
                    'date_recorded' => $symptom->date_recorded?->toDateString(),
                    'notes' => $symptom->notes,
                ];
            })->values()->all(),
        ]);

        return response()->json([
            'success' => true,
            'data' => [
                'advice' => $advice,
            ],
            'message' => 'Opération réussie'
        ], 201);
    }
}
