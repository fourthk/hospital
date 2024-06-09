<?php

namespace App\Http\Controllers\api;

use App\Http\Controllers\Controller;
use App\Models\Plan;
use Illuminate\Http\Request;

class PlanApiController extends Controller
{
    public function index(Request $request)
    {
        try {
            $doctor = $request->header('doctor');
            $day = $request->header('day');
            $appointment = $request->header('appointment');

            $plan = Plan::query();
            if (isset($appointment)) {
                if ($appointment == '0') {
                    $plan = $plan->whereDoesntHave('appointment', function ($query){
                        $query->where('status', '0');
                    });
                } else {
                    $plan = $plan->whereHas('appointment', function ($query){
                        $query->where('status', '0');
                    });
                }
            }

            // $plan = Plan::query();
            // if (isset($appointment)) {
            //     if ($appointment == '0') {
            //         $plan = $plan->doesntHave('appointment');
            //     } else {
            //         $plan = $plan->has('appointment');
            //     }
            // }

            if (isset($doctor)) {
                $plan = $plan->where('id_doctor', $doctor);
            }

            if (isset($day)) {
                $plan = $plan->where('day', $day);
            }

            $plan = $plan
                ->orderBy('day', 'asc')
                ->orderBy('hour', 'asc')
                ->get();

            return response()->json([
                'success' => true,
                'plans' => $plan
            ]);
        } catch (\Exception $e) {
            return response()->json([
                'success' => false,
                'message' => 'Failed to retrieve data from database.'
            ], 500);
        }
    }
}
