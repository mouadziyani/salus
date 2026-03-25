<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Models\Doctor;
use Illuminate\Http\Request;

class DoctorController extends Controller
{
    public function index()
    {
        $doctors = Doctor::orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'doctors' => $doctors,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function show(int $id)
    {
        $doctor = Doctor::find($id);

        if (!$doctor) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'doctor' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'doctor' => $doctor,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function search(Request $request)
    {
        $specialty = $request->query('specialty');
        $city = $request->query('city');

        $query = Doctor::query();

        if ($specialty) {
            $query->where('specialty', 'like', '%' . $specialty . '%');
        }

        if ($city) {
            $query->where('city', 'like', '%' . $city . '%');
        }

        $doctors = $query->orderBy('name')->get();

        return response()->json([
            'success' => true,
            'data' => [
                'doctors' => $doctors,
            ],
            'message' => 'The operation was successful'
        ]);
    }
}

