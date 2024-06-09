@extends('templates.sidebarDoctor')

@section('container')
    <form class="max-w-sm" action="/doctor/plan" method="post">
        @csrf

        <div class="max-w-sm mx-auto mb-5">
            <label for="day" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Day</label>
            <select id="day" name="day"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($days as $index => $day)
                    <option value="{{ $index }}">{{ $day }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="max-w-sm mx-auto mb-5">
            <label for="hour" class="block mb-2 text-sm font-medium text-gray-900 dark:text-white">Hour</label>
            <select id="hour" name="hour"
                class="bg-gray-50 border border-gray-300 text-gray-900 text-sm rounded-lg focus:ring-blue-500 focus:border-blue-500 block w-full p-2.5 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500">
                @foreach ($hours as $index => $hour)
                    <option value="{{ $index }}">{{ $hour }}
                    </option>
                @endforeach
            </select>
        </div>

        <div class="mb-5 flex gap-4 justify-end">
            <a href="/doctor/plan">
                <button type="button"
                    class="text-gray-900 bg-white border border-gray-300 focus:outline-none hover:bg-gray-100 focus:ring-4 focus:ring-gray-100 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:text-white dark:border-gray-600 dark:hover:bg-gray-700 dark:hover:border-gray-600 dark:focus:ring-gray-700">Back</button>
            </a>
            <button type="submit"
                class="focus:outline-none text-white bg-green-700 hover:bg-green-800 focus:ring-4 focus:ring-green-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-green-600 dark:hover:bg-green-700 dark:focus:ring-green-800">Submit</button>
        </div>
    </form>
@endsection
