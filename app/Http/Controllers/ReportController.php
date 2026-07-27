<?php

namespace App\Http\Controllers;

use App\Models\BloodPressure;
use App\Models\FluidIntake;
use App\Models\Medication;
use App\Models\WeightRecord;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        // Latest Blood Pressure
        $latestBloodPressure = BloodPressure::where('user_id', $user->id)
            ->latest('measured_at')
            ->first();

        // Latest Weight
        $latestWeight = WeightRecord::where('user_id', $user->id)
            ->latest('recorded_at')
            ->first();

        // Fluid Achievement
        $totalFluid = FluidIntake::where('user_id', $user->id)
            ->sum('amount');

        $fluidGoal = 1500; // ml (sementara hardcode)

        $fluidPercentage = $fluidGoal > 0
            ? round(($totalFluid / $fluidGoal) * 100)
            : 0;

        if ($fluidPercentage > 100) {
            $fluidPercentage = 100;
        }

        // Medication (sementara hardcode)
        $medicationAdherence = 95;

        // Health Score (sementara hardcode)
        $healthScore = 87;

        // AI Summary (sementara hardcode)
        $aiSummary = [
            "Blood pressure remained stable throughout the month.",
            "Fluid goal achieved on {$fluidPercentage}% of recorded days.",
            "Medication adherence reached {$medicationAdherence}%.",
            "Keep your current routine and continue monitoring your daily fluid intake."
        ];

        // Health Journey (sementara dummy)
        $journey = [
            ["month" => "Jan", "score" => 82],
            ["month" => "Feb", "score" => 84],
            ["month" => "Mar", "score" => 83],
            ["month" => "Apr", "score" => 86],
            ["month" => "May", "score" => 87],
            ["month" => "Jun", "score" => 86],
            ["month" => "Jul", "score" => $healthScore],
        ];

        // Timeline (sementara dummy)
        $timeline = [
            [
                "month" => "July 2026",
                "status" => "Monthly report generated"
            ],
            [
                "month" => "June 2026",
                "status" => "Shared with doctor"
            ],
            [
                "month" => "May 2026",
                "status" => "Monthly report generated"
            ]
        ];

        return response()->json([
            'status' => true,
            'message' => 'Report fetched successfully.',
            'data' => [

                'health_score' => $healthScore,

                'summary' => [

                    'average_bp' => $latestBloodPressure
                        ? "{$latestBloodPressure->systolic} / {$latestBloodPressure->diastolic}"
                        : null,

                    'weight' => $latestWeight?->weight,

                    'fluid_goal' => $fluidPercentage,

                    'medication' => $medicationAdherence,
                ],

                'ai_summary' => $aiSummary,

                'journey' => $journey,

                'timeline' => $timeline,
            ]
        ], 200);
    }
}
