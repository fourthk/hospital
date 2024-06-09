<?php

namespace App\Http\Controllers;

use Ramsey\Uuid\Uuid;
use App\Models\Doctor;
use App\Models\Appointment;
use Illuminate\Support\Facades\Auth;
use App\Http\Requests\StoreAppointmentRequest;
use App\Http\Requests\UpdateAppointmentRequest;
use GuzzleHttp\Psr7\Request;

class AppointmentController extends Controller
{
    /**
     * Display a listing of the resource.
     */
    public function index(StoreAppointmentRequest $request)
    {

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');

        if (Auth::user()->role == 'admin') {
            if (isset($request['search'])) {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('no_appointment', 'LIKE', '%' . $request['search'] . '%')
                    ->where('status', '0')
                    ->paginate(10);
            } else {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])->where('status', '0')->paginate(10);
            }

            return view('admin.appointment.index', [
                'title' => 'Victoria | Appointment',
                'page' => 'appointment',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointments' => $appointments
            ]);
        } else {
            $doctor = Doctor::where('id_user', Auth::user()->id)->first();

            if (isset($request['search'])) {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('no_appointment', 'LIKE', '%' . $request['search'] . '%')
                    ->where('id_doctor', $doctor->id)
                    ->where('status', '0')
                    ->paginate(10);
            } else {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('id_doctor', $doctor->id)
                    ->where('status', '0')
                    ->paginate(10);
            }

            return view('doctor.appointment.index', [
                'title' => 'Victoria | Appointment',
                'page' => 'appointment',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointments' => $appointments
            ]);

        }
    }

    /**
     * Show the form for creating a new resource.
     */
    public function create(Doctor $doctor)
    {
        $doctor = Doctor::with(['user', 'specialis'])->find($doctor->id);
        return view('user.appointment.create', [
            'doctor' => $doctor
        ]);
    }

    /**
     * Store a newly created resource in storage.
     */
    public function store(StoreAppointmentRequest $request)
    {
        $validatedData = $request->validate([
            'id_doctor' => 'string',
            'id_plan' => 'string',
            'telephone' => 'string',
            'date' => 'string',
            'description' => 'string',
        ]);

        $appointment = Appointment::create([
            'no_appointment' => Uuid::uuid4(),
            'id_user' => Auth::user()->id,
            'id_doctor' => $validatedData['id_doctor'],
            'id_plan' => $validatedData['id_plan'],
            'telephone' => $validatedData['telephone'],
            'date' => $validatedData['date'],
            'status' => '0',
            'status_payment' => '0',
            'description' => $validatedData['description'],
        ]);

        $appointment->save();

        if ($appointment->wasRecentlyCreated) {
            return redirect('/profile')->with('success', 'Data berhasil dibuat');
        } else {
            return redirect('/profile')->with('error', 'Data gagal dibuat');
        }
    }

    /**
     * Display the specified resource.
     */
    public function show(Appointment $appointment)
    {
        $appointment = Appointment::with(['doctor.user', 'doctor.specialis', 'plan'])->where('id', $appointment->id)->first();

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');

        if (Auth::user()->role == 'admin') {
            return view('admin.appointment.show', [
                'title' => 'Victoria | Appointment edit',
                'page' => 'appointment',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointment' => $appointment
            ]);
        } else {
            return view('doctor.appointment.show', [
                'title' => 'Victoria | Appointment edit',
                'page' => 'appointment',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointment' => $appointment
            ]);

        }
    }

    /**
     * Show the form for editing the specified resource.
     */
    public function edit(Appointment $appointment)
    {
        //
    }

    /**
     * Update the specified resource in storage.
     */
    public function update(UpdateAppointmentRequest $request, Appointment $appointment)
    {
        $validatedData = $request->validate([
            'status' => 'string',
            'status_payment' => 'string',
        ]);

        $appointment->status = $validatedData['status'];
        $appointment->status_payment = $validatedData['status_payment'];

        $appointment->save();
        
        if (Auth::user()->role == 'admin') {
            return redirect('admin/appointment')->with('success', 'Data berhasil diubah');
        } else {
            return redirect('doctor/appointment')->with('success', 'Data berhasil diubah');
        }
    }

    /**
     * Remove the specified resource from storage.
     */
    public function destroy(Appointment $appointment)
    {
        //
    }

    public function index_history(StoreAppointmentRequest $request)
    {

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');

        if (Auth::user()->role == 'admin') {
            if (isset($request['search'])) {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('no_appointment', 'LIKE', '%' . $request['search'] . '%')
                    ->where('status', '2')->orWhere('status', '1')
                    ->paginate(10);
            } else {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('status', '2')->orWhere('status', '1')
                    ->paginate(10);
            }


            return view('admin.appointment.index', [
                'title' => 'Victoria | History',
                'page' => 'history',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointments' => $appointments
            ]);
        } else {
            $doctor = Doctor::where('id_user', Auth::user()->id)->first();

            if (isset($request['search'])) {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('no_appointment', 'LIKE', '%' . $request['search'] . '%')
                    ->where('id_doctor', $doctor->id)
                    ->Where('status', '!=', '0')
                    ->paginate(10);
            } else {
                $appointments = Appointment::with(['user', 'doctor.user', 'plan'])
                    ->where('id_doctor', $doctor->id)
                    ->Where('status', '!=', '0')
                    ->paginate(10);
            }


            return view('doctor.appointment.index', [
                'title' => 'Victoria | History',
                'page' => 'history',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointments' => $appointments
            ]);
        }
    }

    public function show_history(Appointment $appointment)
    {

        $appointment = Appointment::with(['doctor.user', 'doctor.specialis', 'plan'])->where('id', $appointment->id)->first();

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');


        if (Auth::user()->role == 'admin') {
            return view('admin.appointment.history', [
                'title' => 'Victoria | History view',
                'page' => 'history',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointment' => $appointment
            ]);
        } else {
            return view('doctor.appointment.history', [
                'title' => 'Victoria | History view',
                'page' => 'history',
                'hours' => $hours,
                'status' => $status,
                'status_payment' => $status_payment,
                'appointment' => $appointment
            ]);
        }
    }
}
