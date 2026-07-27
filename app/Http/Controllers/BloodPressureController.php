<?php

namespace App\Http\Controllers;

use App\Models\BloodPressure;
use Illuminate\Http\Request;

class BloodPressureController extends Controller
{
    public function index(Request $request)
    {
        $bloodPressures = BloodPressure::where(
            'user_id',
            $request->user()->id
        )
        ->latest('measured_at')
        ->get();

        return response()->json([
            'status' => true,
            'message' => 'Data Fetched Successfully',
            'data' => [
                'bloodPressure' => $bloodPressures,
            ]
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'systolic' => 'required|integer|min:50|max:300',
            'diastolic' => 'required|integer|min:30|max:200',
            'pulse' => 'required|integer|min:20|max:250',
            'notes' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = $request->user()->id;
         $validated['measured_at'] = now();

        $bloodPressure = BloodPressure::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data Created Successfully',
            'data' => [
                'bloodPressure' => $bloodPressure,
            ]
        ], 201);
    }

    public function show(Request $request, BloodPressure $bloodPressure)
    {
         if ($bloodPressure->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Data Fetched Successfully',
            'data' => [
                'bloodPressure' => $bloodPressure,
            ]
        ], 201);
    }

    public function update(Request $request, BloodPressure $bloodPressure)
    {

        if ($bloodPressure->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $validated = $request->validate([
            'systolic' => 'required|integer|min:50|max:300',
            'diastolic' => 'required|integer|min:30|max:200',
            'pulse' => 'required|integer|min:20|max:250',
            'notes' => 'nullable|string|max:255',
        ]);

        $bloodPressure->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Data Updated Successfully',
            'data' => [
                'bloodPressure' => $bloodPressure,
            ]
        ], 200);
    }

    public function destroy(Request $request, BloodPressure $bloodPressure)
    {
        if ($bloodPressure->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $bloodPressure->delete();

        return response()->json([
            'status' => true,
            'message' => 'Data Delete Successfully',
            'data' => [
                'bloodPressure' => $bloodPressure,
            ]
        ], 200);
    }
}
