@extends('templates.sidebarAdmin')

@section('container')
    @php
        use Carbon\Carbon;
    @endphp
    <form action="/admin/appointment/{{ $appointment->id }}" method="post">
        @method('PUT')
        @csrf
        <div class="max-w-2xl grid grid-cols-2 gap-4">
            <input type="text" name="id_doctor" value="{{ 7 }}" hidden>

            <div class="">
                <label for="id" class="block mb-2 text-sm font-medium text-gray-900 ">ID</label>
                <input type="text" id="id" name="id" value="{{ $appointment->id }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="">
                <label for="no_appointment" class="block mb-2 text-sm font-medium text-gray-900 ">No.
                    Appointment</label>
                <input type="text" id="no_appointment" name="no_appointment" value="{{ $appointment->no_appointment }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="">
                <label for="doctor" class="block mb-2 text-sm font-medium text-gray-900 ">Doctor</label>
                <input type="text" id="doctor" name="doctor" value="{{ $appointment->doctor->user->fullname }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="">
                <label for="plan" class="block mb-2 text-sm font-medium text-gray-900 ">plan</label>
                <input type="text" id="plan" name="plan" value="{{ $hours[$appointment->id_plan] }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="">
                <label for="telephone" class="block mb-2 text-sm font-medium text-gray-900 ">telephone</label>
                <input type="text" id="telephone" name="telephone" value="{{ $appointment->telephone }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>
            <div class="">
                <label for="date" class="block mb-2 text-sm font-medium text-gray-900 ">Date</label>
                <input type="text" id="date" name="date"
                    value=" {{ Carbon::parse($appointment->date)->translatedFormat('d F Y') }}" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
            </div>

            <div class="">
                <label for="status" class="block mb-2 text-sm font-medium text-gray-900 ">
                    Status</label>
                <select id="status" name="status" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @foreach ($status as $index => $sts)
                        <option value="{{ $index }}" {{ $index == $appointment->status ? 'selected' : '' }} {{ $sts == "done" ? 'disabled' : '' }}>
                            {{ $sts }}</option>
                    @endforeach
                </select>
            </div>

            <div class="">
                <label for="status_payment" class="block mb-2 text-sm font-medium text-gray-900 ">Payment
                    Status</label>
                <select id="status_payment" name="status_payment" disabled
                    class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">
                    @foreach ($status_payment as $index => $ps)
                        <option value="{{ $index }}"
                            {{ $index == $appointment->status_payment ? 'selected' : '' }}>
                            {{ $ps }}</option>
                    @endforeach
                </select>
            </div>


        </div>
        <br>
        <div class="max-w-2xl">
            <div class="">
                <label for="description" class="block mb-2 text-sm font-medium text-gray-900 ">Description</label>
                <textarea type="text" id="description" name="description" disabled
                    class="resize-y bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 ">{{ $appointment->description }}</textarea>
            </div>
            <br>
            @if (isset($appointment->payment_photo_path))
                <p for="payment_photo_path" style="font-size: 18px;">Payment Image</p>
                <img src="{{ asset('storage/appointments/' . $appointment->payment_photo_path) }}" alt="error">
            @else
                <p for="payment_photo_path" style="font-size: 18px;">Payment not found!</p>
            @endif
        </div>
        <br>
        <div class="mb-5 flex gap-4 justify-start">
            <a href="/admin/appointment">
                <button type="button"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800  dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</button>
            </a>
            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
        </div>
    </form>
@endsection
