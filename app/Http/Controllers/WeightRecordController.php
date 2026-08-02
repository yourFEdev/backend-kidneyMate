<?php

namespace App\Http\Controllers;

use App\Models\WeightRecord;
use Illuminate\Http\Request;

class WeightRecordController extends Controller
{
    public function index(Request $request)
    {
        $weightRecords = WeightRecord::where(
            'user_id',
            $request->user()->id
        )
            ->latest('recorded_at')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Weight records fetched successfully.',
            'data' => $weightRecords
        ], 200);
    }

    public function store(Request $request)
    {
        $validated = $request->validate([
            'weight' => 'required|numeric|min:20|max:300',
            'notes' => 'nullable|string|max:255',
        ]);

        $validated['user_id'] = $request->user()->id;
        $validated['recorded_at'] = now();

        $weightRecord = WeightRecord::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Weight record created successfully.',
            'data' => $weightRecord,
        ], 201);
    }

    public function show(Request $request, WeightRecord $weightRecord)
    {
        if ($weightRecord->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Weight record fetched successfully.',
            'data' => $weightRecord
        ], 200);
    }

    public function update(Request $request, WeightRecord $weightRecord)
    {
        if ($weightRecord->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $validated = $request->validate([
            'weight' => 'required|numeric|min:20|max:300',
            'notes' => 'nullable|string|max:255',
        ]);

        $weightRecord->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Weight record updated successfully.',
            'data' => $weightRecord
        ], 200);
    }

    public function destroy(Request $request, WeightRecord $weightRecord)
    {
        if ($weightRecord->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $weightRecord->delete();

        return response()->json([
            'status' => true,
            'message' => 'Weight record deleted successfully.'
        ], 200);
    }
}
