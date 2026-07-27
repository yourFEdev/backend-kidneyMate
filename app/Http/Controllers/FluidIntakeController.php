<?php

namespace App\Http\Controllers;

use App\Models\FluidIntake;
use Illuminate\Http\Request;

class FluidIntakeController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(Request $request)
    {
        $fluid = FluidIntake::where('user_id', $request->user()->id)->latest('drank_at')->get();

        return response()->json([
            'status' => true,
            'message' => 'Data Fetched Successfully',
            'data' => [
                'fluid' => $fluid,
            ]
        ], 200);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(Request $request)
    {
        $validated = $request->validate([
            'drink_name' => 'required|string|max:100',
            'amount' => 'required|integer|max:5000',
            'notes' => 'nullable|string|max:225',
        ]);

        $validated['drank_at'] = now();
        $validated['user_id'] = $request->user()->id;

        $fluid = FluidIntake::create($validated);

        return response()->json([
            'status' => true,
            'message' => 'Fluid intake created.',
            'data' => $fluid
        ], 201);
    }

    /**
     * Display the specified resource.
     */
    public function show(Request $request, FluidIntake $fluidIntake)
    {
        if ($fluidIntake->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        return response()->json([
            'status' => true,
            'message' => 'Fluid intake created.',
            'data' => $fluidIntake
        ], 200);
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(Request $request, FluidIntake $fluidIntake)
    {

        if ($fluidIntake->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $validated = $request->validate([
            'drink_name' => 'required|string|max:100',
            'amount' => 'required|integer|min:1|max:5000',
            'notes' => 'nullable|string|max:255',
        ]);

        $fluidIntake->update($validated);

        return response()->json([
            'status' => true,
            'message' => 'Fluid intake updated.',
            'data' => $fluidIntake
        ]);
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Request $request, FluidIntake $fluidIntake)
    {
        if ($fluidIntake->user_id !== $request->user()->id) {
            return response()->json([
                'status' => false,
                'message' => 'You are not allowed to access this resource.'
            ], 403);
        }

        $fluidIntake->delete();

        return response()->json([
            'status' => true,
            'message' => 'Fluid intake deleted.'
        ]);
    }
}
