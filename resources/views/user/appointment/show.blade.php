@extends('templates.navbar')

@section('style')
    {{-- TAILWIND --}}
    <script src="https://cdn.tailwindcss.com"></script>
    {{-- JQUERY --}}
    <script src="https://code.jquery.com/jquery-3.6.0.min.js"></script>
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
            <form class="profile-info" id="profileForm" action="/profile/appointment/{{ $appointment->id }}" method="post"
                enctype="multipart/form-data">
                @method('PUT')
                @csrf
                <ul>
                    <li class="form-group">
                        <label for="no_appointment" style="font-size: 18px;">No. Appointment</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" id="no_appointment" name="no_appointment" disabled
                                placeholder="Enter your no_appointment" value="{{ $appointment->no_appointment }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="doctor" style="font-size: 18px;">Doctor</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" name="doctor" id="doctor" disabled
                                placeholder="Enter your full name" value="{{ $appointment->doctor->user->username }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="telephone" style="font-size: 18px;">Telephone *</label>
                        <div class="input-group">
                            <input type="tel" class="text-2xl" name="telephone" id="telephone"
                                placeholder="Enter your telephone number" value="{{ $appointment->telephone }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="date" style="font-size: 18px;">Date</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" name="date" id="date" disabled
                                value="{{ Carbon::parse($appointment->date)->translatedFormat('d F Y') }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="description">disease complaint *</label>
                        <div class="input-group">
                            <textarea name="description" id="description"
                                class="box w-[92%] px-2 py-5 border-gray-400 border rounded-lg mt-2 text-2xl" rows="1"
                                style="resize: vertical">{{ $appointment->description }}</textarea>
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    <li class="form-group">
                        <label for="date" style="font-size: 18px;">Payment status</label>
                        <div class="input-group">
                            <input type="text" class="text-2xl" name="date" id="date" disabled
                                value="{{ $status_payment[$appointment->status_payment] }}">
                            <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                        </div>
                    </li>
                    @if (isset($appointment->payment_photo_path))
                        <li class="form-group" style="display: block;">
                            <label for="payment_photo_path" style="font-size: 18px;">Payment Image</label>
                            <div class="input-group">
                                <img src="{{ asset('storage/appointments/' . $appointment->payment_photo_path) }}"
                                    alt="{{ $appointment->payment_photo_path }}" class="object-cover w-full">
                            </div>
                        </li>
                        <li class="form-group" style="display: block;">
                            <label for="photo" style="font-size: 18px;">Edit photo payment</label>
                            <div class="input-group">
                                <input type="file" class="text-2xl" name="photo" id="photo"
                                    value="{{ $status_payment[$appointment->status_payment] }}">
                                <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                            </div>
                        </li>
                    @else
                        <li class="form-group" style="display: block;">
                            <label for="photo" style="font-size: 18px;">Upload payment</label>
                            <div class="input-group">
                                <input type="file" class="text-2xl" name="photo" id="photo"
                                    value="{{ $status_payment[$appointment->status_payment] }}">
                                <i class="edit-icon" style="font-size: 20px; vertical-align: middle;">✎</i>
                            </div>
                        </li>
                    @endif
                </ul>
                <button class="save-button" type="submit">Save</button>
            </form>
        </div>
    </div>
@endsection
