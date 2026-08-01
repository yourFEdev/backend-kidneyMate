<?php

namespace App\Http\Controllers;

use App\Models\BloodPressure;
use App\Models\FluidIntake;
use App\Models\Schedule;
use App\Models\WeightRecord;
use Illuminate\Http\Request;
use Illuminate\Support\Carbon;

class DashboardController extends Controller
{
    public function index(Request $request)
    {
        $user = $request->user();

        /*
        |--------------------------------------------------------------------------
        | Fluid Today
        |--------------------------------------------------------------------------
        */

        $fluidToday = FluidIntake::where('user_id', $user->id)
            ->whereDate('drank_at', today())
            ->sum('amount');

        /*
        |--------------------------------------------------------------------------
        | Latest Blood Pressure
        |--------------------------------------------------------------------------
        */

        $bloodPressure = BloodPressure::where('user_id', $user->id)
            ->latest('measured_at')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Latest Weight
        |--------------------------------------------------------------------------
        */

        $weight = WeightRecord::where('user_id', $user->id)
            ->latest('recorded_at')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Next Dialysis
        |--------------------------------------------------------------------------
        */

        $nextDialysis = Schedule::where('user_id', $user->id)
            ->where('type', 'dialysis')
            ->where('status', 'scheduled')
            ->where('scheduled_at', '>=', now())
            ->orderBy('scheduled_at')
            ->first();

        /*
        |--------------------------------------------------------------------------
        | Weekly Fluid Intake
        |--------------------------------------------------------------------------
        */

        $weeklyFluid = FluidIntake::selectRaw("
                DATE(drank_at) as date,
                SUM(amount) as total
            ")
            ->where('user_id', $user->id)
            ->whereBetween('drank_at', [
                Carbon::now()->subDays(6),
                Carbon::now()
            ])
            ->groupByRaw("DATE(drank_at)")
            ->orderByRaw("DATE(drank_at)")
            ->get();

        /*
        |--------------------------------------------------------------------------
        | Response
        |--------------------------------------------------------------------------
        */

        return response()->json([
            'status' => true,
            'message' => 'Dashboard fetched successfully.',
            'data' => [

                'summary' => [

                    'fluid_today' => $fluidToday,

                    'fluid_limit' => $user->daily_fluid_limit,

                    'blood_pressure' => [
                        'systolic' => $bloodPressure?->systolic,
                        'diastolic' => $bloodPressure?->diastolic,
                    ],

                    'weight' => $weight?->weight,

                ],

                'next_dialysis' => $nextDialysis,

                'weekly_fluid' => $weeklyFluid,

            ]
        ]);
    }
}
