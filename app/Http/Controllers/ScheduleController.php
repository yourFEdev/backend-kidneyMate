<?php

namespace App\Http\Controllers;

use App\Models\Schedule;
use Illuminate\Http\Request;

class ScheduleController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $schedules = Schedule::where('user_id', $request->user()->id)
            ->orderBy('scheduled_at')
            ->get();

        return response()->json([
            'status' => true,
            'message' => 'Schedules fetched successfully.',
            'data' => $schedules,
        ]);
    }

    /**
     * Store a newly created resource.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'type' => 'required|in:dialysis,doctor,medication',
            'title' => 'required|string|max:255',
            'description' => 'nullable|string|max:1000',
            'scheduled_at' => 'required|date',
            'status' => 'nullable|in:scheduled,completed,missed,cancelled',
        ]);

        $validated['user_id'] = $request->user()->id;

        $schedule = Schedule::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Schedule created successfully.',
            'data' => $schedule,
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, Schedule $schedule)
    {
        if ($schedule->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        };

        return response()->json([
            'status' => true,
            'message' => 'Schedule fetched successfully.',
            'data' => $schedule,
        ]);
    }

    /**
     * Update the specified resource.
     */
    public function update(Request $request, Schedule $schedule)
    {
        if ($schedule->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        };

        $validated = $request->validate([
            'type' => 'sometimes|in:dialysis,doctor,medication',
            'title' => 'sometimes|string|max:255',
            'description' => 'nullable|string|max:1000',
            'scheduled_at' => 'sometimes|date',
            'status' => 'sometimes|in:scheduled,completed,missed,cancelled',
        ]);

        $schedule->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Schedule updated successfully.',
            'data' => $schedule,
        ]);
    }

    /**
     * Remove the specified resource.
     */
    public function destroy(Request $request, Schedule $schedule)
    {
        if ($schedule->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        };

        $schedule->delete();

        return response()->json([
            'status' => true,
            'message' => 'Schedule deleted successfully.',
        ]);
    }
}
