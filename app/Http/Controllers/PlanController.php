<?php

namespace App\Http\Controllers;

use App\Models\Plan;
use App\Models\Doctor;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StorePlanRequest;
use App\Http\Requests\UpdatePlanRequest;

class PlanController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StorePlanRequest $request)
    {
        $doctor = Doctor::where('id_user', Auth::user()->id)->first();

        if (isset($request['search'])) {
            $plans = Plan::with('doctor.user')
                ->where('id_doctor', $doctor->id)
                ->where('id', 'LIKE', '%' . $request['search'] . '%')
                ->orderBy('day', 'asc')
                ->orderBy('hour', 'asc')
                ->paginate(10);
        } else {
            $plans = Plan::with('doctor.user')
                ->where('id_doctor', $doctor->id)
                ->orderBy('day', 'asc')
                ->orderBy('hour', 'asc')
                ->paginate(10);
        }

        $days = config('global.days');
        $hours = config('global.hours');
        // dd($plans);
        return view('doctor.plan.index', [
            'title' => 'Victoria | Plan',
            'page' => 'plan',
            'plans' => $plans,
            'days' => $days,
            'hours' => $hours
        ]);
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create()
    {
        $days = config('global.days');
        $hours = config('global.hours');

        return view('doctor.plan.create', [
            'title' => 'Victoria | Plan add',
            'page' => 'plan',
            'days' => $days,
            'hours' => $hours
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StorePlanRequest $request)
    {
        $doctor = Doctor::where('id_user', Auth::user()->id)->first();

        $validatedData = $request->validate([
            'day' => 'string',
            'hour' => 'string'
        ]);

        $plan = Plan::create([
            'id_doctor' => $doctor->id,
            'day' => $validatedData['day'],
            'hour' => $validatedData['hour']
        ]);

        $plan->save();

        if ($plan->wasRecentlyCreated) {
            return redirect('doctor/plan')->with('success', 'Data berhasil dibuat');
        } else {
            return redirect('doctor/plan')->with('error', 'Data gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Plan $plan)
    {
        $days = config('global.days');
        $hours = config('global.hours');

        return view('doctor.plan.show', [
            'title' => 'Victoria | Plan edit',
            'page' => 'plan',
            'plan' => $plan,
            'days' => $days,
            'hours' => $hours
        ]);
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Plan $plan)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdatePlanRequest $request, Plan $plan)
    {
        $validatedData = $request->validate([
            'day' => 'string',
            'hour' => 'string',
        ]);

        $plan->day = $validatedData['day'];
        $plan->hour = $validatedData['hour'];

        $plan->save();

        return redirect('doctor/plan')->with('success', 'Data berhasil diubah');
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Plan $plan)
    {
        //
    }
}
