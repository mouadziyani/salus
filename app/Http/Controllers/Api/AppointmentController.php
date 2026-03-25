<?php

namespace App\Http\Controllers\Api;

use App\Http\Controllers\Controller;
use App\Http\Requests\Api\StoreAppointmentRequest;
use App\Http\Requests\Api\UpdateAppointmentRequest;
use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = $request->user()->appointments()
            ->with('doctor')
            ->orderBy('appointment_date')
            ->get();

        return response()->json([
            'success' => true,
            'data' => [
                'appointments' => $appointments,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function store(StoreAppointmentRequest $request)
    {
        $appointment = $request->user()->appointments()->create($request->validated());

        return response()->json([
            'success' => true,
            'data' => [
                'appointment' => $appointment,
            ],
            'message' => 'The operation was successful'
        ], 201);
    }

    public function show(Request $request, int $id)
    {
        $appointment = Appointment::with('doctor')
            ->where('user_id', $request->user()->id)
            ->find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'appointment' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        return response()->json([
            'success' => true,
            'data' => [
                'appointment' => $appointment,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function update(UpdateAppointmentRequest $request, int $id)
    {
        $appointment = Appointment::where('user_id', $request->user()->id)->find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'appointment' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        $appointment->update($request->validated());

        return response()->json([
            'success' => true,
            'data' => [
                'appointment' => $appointment,
            ],
            'message' => 'The operation was successful'
        ]);
    }

    public function destroy(Request $request, int $id)
    {
        $appointment = Appointment::where('user_id', $request->user()->id)->find($id);

        if (!$appointment) {
            return response()->json([
                'success' => false,
                'errors' => [
                    'appointment' => ['Not found']
                ],
                'message' => 'Ressource introuvable'
            ], 404);
        }

        $appointment->delete();

        return response()->json([
            'success' => true,
            'data' => (object) [],
            'message' => 'The operation was successful'
        ]);
    }
}

