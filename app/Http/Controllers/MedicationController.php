<?php

namespace App\Http\Controllers;

use App\Models\Medication;
use Illuminate\Http\Request;

class MedicationController extends Controller
{
    public function index(Request $request)
    {
        $medications = Medication::where(
            'user_id',
            $request->user()->id
        )
        ->orderBy('schedule_time')
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Medications fetched successfully.',
            'data' => [
                'medications' => $medications
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'medicine_name' => 'required|string|max:100',
            'dosage' => 'required|string|max:50',
            'instruction' => 'nullable|string|max:255',
            'schedule_time' => 'required|date_format:H:i',
            'frequency' => 'required|in:daily,weekly,monthly,as_needed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'notes' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = $request->user()->id;

        $medication = Medication::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Medication created successfully.',
            'data' => [
                'medication' => $medication
            ]
        ], 201);
    }

    public function show(Request $request, Medication $medication)
    {
        if ($medication->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Medication fetched successfully.',
            'data' => [
                'medication' => $medication
            ]
        ], 200);
    }

    public function update(Request $request, Medication $medication)
    {
        if ($medication->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $validated = $request->validate([
            'medicine_name' => 'required|string|max:100',
            'dosage' => 'required|string|max:50',
            'instruction' => 'nullable|string|max:255',
            'schedule_time' => 'required|date_format:H:i',
            'frequency' => 'required|in:daily,weekly,monthly,as_needed',
            'start_date' => 'nullable|date',
            'end_date' => 'nullable|date|after_or_equal:start_date',
            'notes' => 'nullable|string|max:255',
        ]);

        $medication->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Medication updated successfully.',
            'data' => [
                'medication' => $medication
            ]
        ], 200);
    }

    public function destroy(Request $request, Medication $medication)
    {
        if ($medication->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $medication->delete();

        return response()->json([
            'status' => true,
            'message' => 'Medication deleted successfully.'
        ], 200);
    }
}
