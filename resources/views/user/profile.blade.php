@extends('templates.navbar')

@section('style')
    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>
    <style>
        {
            font-family: Arial,
                sans-serif;
            margin-top: 4rem;
            padding-top: 5rem;
            background-color: #f0f0f0;
        }

        .container {
            /* max-width: 500px; */
            margin: 50px auto;
            padding: 20px;
            background-color: #fff;
            border-radius: 10px;
            box-shadow: 0 0 10px rgba(0, 0, 0, 0.1);
        }

        .profile-header {
            text-align: center;
            margin-bottom: 20px;
        }

        .profile-image {
            width: 150px;
            height: 150px;
            background-color: #ccc;
            border-radius: 50%;
            margin: 0 auto 20px;
            cursor: pointer;
            display: flex;
            align-items: center;
            justify-content: center;
            overflow: hidden;
            position: relative;
        }

        .profile-image img {
            width: 100%;
            height: 100%;
            object-fit: cover;
            display: none;
        }

        .profile-image input {
            display: none;
        }

        .profile-image .placeholder {
            font-size: 50px;
            color: #fff;
            position: absolute;
        }

        .profile-info {
            list-style-type: none;
            padding: 0;
        }

        .profile-info ul {
            list-style-type: none;
            padding: 0;
        }

        .profile-info li {
            margin-bottom: 10px;
        }

        .profile-info label {
            font-weight: bold;
        }

        .edit-icon {
            margin-left: 5px;
            cursor: pointer;
        }

        .profile-info li {
            margin-bottom: 20px;
        }

        .profile-info label {
            display: block;
            font-weight: bold;
        }

        .profile-info input {
            width: 100%;
            padding: 10px;
            border: 1px solid #ccc;
            border-radius: 5px;
            box-sizing: border-box;
            margin-top: 5px;
        }

        .input-group input {
            width: calc(100% - 30px);
            /* Memberikan lebar kepada input, dikurangi lebar ikon edit */
            padding-right: 30px;
            /* Padding di sebelah kanan input untuk ikon */
        }

        @media (max-width: 768px) {
            .container {
                margin: 20px auto;
                padding: 15px;
            }

            .profile-image {
                width: 100px;
                height: 100px;
            }
        }

        .save-button {
            display: block;
            width: 100%;
            padding: 15px;
            font-size: 18px;
            font-weight: bold;
            color: #fff;
            background-color: #205b48;
            border: none;
            border-radius: 5px;
            text-align: center;
            cursor: pointer;
            transition: background-color 0.3s;
        }

        .save-button:active {
            background-color: #86A789;
        }
    </style>
@endsection

@section('container')
    @php
        use Carbon\Carbon;
    @endphp

    <!-- Profile Page Content -->
    <div class="pt-36 flex gap-5 justify-center">
        <div class="container w-[25%]">
            <form class="profile-info" id="profileForm" action="/profile/{{ Auth::user()->id }}" method="post"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <div class="profile-header">
                    <div class="profile-image" onclick="document.getElementById('profileImageInput').click();">
                        @if (isset(Auth::user()->photo_path))
                            <img id="profileImage" style="display: block;"
                                src="{{ asset('storage/user/' . Auth::user()->id . '/' . Auth::user()->photo_path) }}"
                                alt="{{ Auth::user()->photo_path }}">
                            <input type="file" id="profileImageInput" name="photo" style="display: none;">
                        @else
                            <input type="file" id="profileImageInput" name="photo" style="display: none;">
                            <span class="placeholder">+</span>
                        @endif
                    </div>
                </div>
                {{-- <img id="profileImage" class="rounded-full w-52 object-cover" src="{{ asset('storage/user/' . Auth::user()->id . '/' . Auth::user()->photo_path) }}" alt=""> --}}
                <ul>
                    <li class="form-group">
                        <label for="username" style="font-size: 18px;">Username</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" id="username" name="username"
                                placeholder="Enter your username" value="{{ Auth::user()->username }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="fullname" style="font-size: 18px;">Full Name</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" name="fullname" id="fullname"
                                placeholder="Enter your full name" value="{{ Auth::user()->fullname }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="telephone" style="font-size: 18px;">Telephone</label>
                        <div class="input-group">
                            <input type="tel" class="text-2xl" name="telephone" id="telephone"
                                placeholder="Enter your telephone number" value="{{ Auth::user()->telephone }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="nik" style="font-size: 18px;">NIK</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" name="nik" id="nik"
                                placeholder="Enter your NIK" value="{{ Auth::user()->nik }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="email" style="font-size: 18px;">Email</label>
                        <div class="input-group">
                            <input type="email" class="text-2xl" name="email" id="email"
                                placeholder="Enter your email" value="{{ Auth::user()->email }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                </ul>
                <button class="save-button" type="submit">Save</button>
                <br>
                <a class="save-button" href="/logout">Logout</a>
            </form>
        </div>
        <div class="schedule bg-white container w-[65%]">
            <h1 class="heading">My <span>Appointment</span></h1>
            <table>
                <thead>
                    <tr>
                        <th>No. Appointment</th>
                        <th>Doctor</th>
                        <th>Date</th>
                        <th>Time</th>
                        <th>Status</th>
                        <th>Status Pay</th>
                        <th>Action</th>
                    </tr>
                </thead>
                <tbody>
                    @foreach ($appointments as $appointment)
                        <tr>
                            <td>{{ $appointment->no_appointment }}</td>
                            <td>{{ $appointment->doctor->user->username }} ({{ $appointment->doctor->specialis->name }})
                            </td>
                            <td>{{ Carbon::parse($appointment->date)->translatedFormat('d F Y') }}</td>
                            <td>{{ $hours[$appointment->plan->hour] }}</td>
                            <td>{{ $status[$appointment->status] }}</td>
                            <td>{{ $status_payment[$appointment->status_payment] }}</td>
                            <td><a href="/profile/appointment/{{ $appointment->id }}" style="font-weight: 700">Detail</a>
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
    </div>
    <script>
        function previewImage(event) {
            const reader = new FileReader();
            reader.onload = function() {
                const output = document.getElementById('profileImage');
                output.src = reader.result;
                // output.style.display = 'block'; // Display the image
                // document.querySelector('.profile-image .placeholder').style.display = 'none'; // Hide the placeholder "+"
            }
            reader.readAsDataURL(event.target.files[0]);
        }
    </script>
@endsection
