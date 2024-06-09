<?php

namespace App\Http\Controllers;

use App\Models\News;
use App\Models\User;
use App\Models\Doctor;
use App\Models\Appointment;
use App\Models\Medichine;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Auth;

class UserController extends Controller
{
    public function index()
    {
        $newses = News::all();
        return view('user.index', [
            'newses' => $newses
        ]);
    }

    public function facilities()
    {
        return view('user.facilities');
    }

    public function information()
    {
        return view('user.information');
    }
    public function doctor()
    {
        $doctors = Doctor::with(['user', 'specialis'])->get();
        return view('user.doctor', [
            'doctors' => $doctors
        ]);
    }

    public function pharmacy(Request $request)
    {
        if (isset($request['search'])) {
            $medichines = Medichine::with('medichineCategory')->where('name', 'LIKE', '%' . $request['search'] . '%')->paginate(10);
        } else {
            $medichines = Medichine::paginate(10);
        }
        return view('user.pharmacy', [
            'medichines' => $medichines
        ]);
    }

    public function location()
    {
        return view('user.location');
    }

    public function profile()
    {

        $appointments = Appointment::with(['doctor.user', 'doctor.specialis', 'plan'])->where('id_user', Auth::user()->id)->get();

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');

        return view('user.profile', [
            'hours' => $hours,
            'status' => $status,
            'status_payment' => $status_payment,
            'appointments' => $appointments
        ]);
    }

    public function update_profile(Request $request, User $user)
    {
        $validatedData = $request->validate([
            'username' => 'string',
            'photo' => 'nullable|image|max:2048',
            'fullname' => 'string',
            'telephone' => 'string',
            'nik' => 'string',
            'email' => 'string'
        ]);

        $user->username = $validatedData['username'];
        $user->fullname = $validatedData['fullname'];
        $user->telephone = $validatedData['telephone'];
        $user->nik = $validatedData['nik'];
        $user->email = $validatedData['email'];

        if ($request->hasFile('photo')) {

            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/user/' . Auth::user()->id . '/', $fileName);
            $user->photo_path = $fileName;
        }

        $user->save();

        return redirect('/profile')->with('success', 'Data berhasil diubah');
    }

    public function show_appointment(Appointment $appointment)
    {
        $appointments = Appointment::with(['doctor.user', 'doctor.specialis', 'plan'])->where('id_user', Auth::user()->id)->findOrFail($appointment->id);

        $hours = config('global.hours');
        $status = config('global.status');
        $status_payment = config('global.status_payment');

        return view('user.appointment.show', [
            'hours' => $hours,
            'status' => $status,
            'status_payment' => $status_payment,
            'appointment' => $appointment
        ]);
    }

    public function update_appointment(Appointment $appointment, Request $request)
    {
        // dd($request);
        $validatedData = $request->validate([
            'telephone' => 'string',
            'description' => 'string',
            'photo' => 'nullable|image|max:2048'
        ]);

        $appointment->telephone = $validatedData['telephone'];
        $appointment->description = $validatedData['description'];

        if ($request->hasFile('photo')) {
            $file = $request->file('photo');
            $fileName = $file->getClientOriginalName();
            $filePath = $file->storeAs('public/appointments', $fileName);
            $appointment->payment_photo_path = $fileName;
        }

        $appointment->save();

        return redirect('/profile')->with('success', 'Data berhasil diubah');
    }

}
