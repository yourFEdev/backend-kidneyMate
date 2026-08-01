<?php

namespace App\Http\Controllers;



class InsightController extends Controller
{
    public function index()
    {
        return response()->json([
            'status' => true,
            'message' => 'Insights fetched successfully.',
            'data' => [
                'health_score' => 87,
                'medication_adherence' => 96,
                'fluid_goal' => 82,
                'blood_pressure_status' => 'Stable',
                'summary' => 'Your blood pressure has remained stable over the past month.'
            ]
        ]);
    }
}
