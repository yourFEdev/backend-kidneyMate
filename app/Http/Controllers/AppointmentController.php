<?php

namespace App\Http\Controllers;

use App\Models\Appointment;
use Illuminate\Http\Request;

class AppointmentController extends Controller
{
    public function index(Request $request)
    {
        $appointments = Appointment::where(
            'user_id',
            $request->user()->id
        )
        ->latest('appointment_at')
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Appointments fetched successfully.',
            'data' => [
                'appointments' => $appointments
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:100',
            'appointment_at' => 'required|date',
            'status' => 'required|in:scheduled,confirmed,completed,cancelled',
        ]);

        $validated['user_id'] = $request->user()->id;

        $appointment = Appointment::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Appointment created successfully.',
            'data' => [
                'appointment' => $appointment
            ]
        ], 201);
    }

    public function show(Request $request, Appointment $appointment)
    {
        if ($appointment->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Appointment fetched successfully.',
            'data' => [
                'appointment' => $appointment
            ]
        ], 200);
    }

    public function update(Request $request, Appointment $appointment)
    {
        if ($appointment->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $validated = $request->validate([
            'title' => 'required|string|max:100',
            'description' => 'nullable|string|max:255',
            'location' => 'nullable|string|max:100',
            'appointment_at' => 'required|date',
            'status' => 'required|in:scheduled,confirmed,completed,cancelled',
        ]);

        $appointment->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Appointment updated successfully.',
            'data' => [
                'appointment' => $appointment
            ]
        ], 200);
    }

    public function destroy(Request $request, Appointment $appointment)
    {
        if ($appointment->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $appointment->delete();

        return response()->json([
            'status' => true,
            'message' => 'Appointment deleted successfully.'
        ], 200);
    }
}
