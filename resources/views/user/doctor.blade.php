@extends('templates.navbar')

@section('container')
    <!-- Doctor Section Starts -->
    <section class="doctor" id="doctor">
        <div class="doctors">
            <h1 class="heading">our <span>doctors</span></h1>
            <div class="box-container">
                @foreach ($doctors as $doctor)
                    <div class="box">
                        <img src="{{ asset('storage/user/' . $doctor->user->id . '/' . $doctor->user->photo_path) }}" alt="">
                        <h3>{{ $doctor->user->fullname }}</h3>
                        <p> {{ $doctor->specialis->name }} <br></p>
                        <a href="/appointment/create/{{ $doctor->id }}" class="btn"> Appointment <span
                                class="fas fa-chevron-right"></span> </a>
                    </div>
                @endforeach
            </div>
        </div>
    </section>
    <!-- Doctor section End -->
@endsection
