@extends('templates.sidebarAdmin')

@section('container')
    @include('templates.alert')
    @include('templates.modalDelete')
    <div class="p-4 relative overflow-x-auto shadow-md sm:rounded-lg">
        <form action="">
            <div class="pb-4 flex justify-between bg-white dark:bg-gray-900">
                <label for="table-search" class="sr-only">Search</label>
                <div class="relative mt-1">
                    <div class="absolute inset-y-0 rtl:inset-r-0 start-0 flex items-center ps-3 pointer-events-none">
                        <svg class="w-4 h-4 text-gray-500 dark:text-gray-400" aria-hidden="true"
                            xmlns="http://www.w3.org/2000/svg" fill="none" viewBox="0 0 20 20">
                            <path stroke="currentColor" stroke-linecap="round" stroke-linejoin="round" stroke-width="2"
                                d="m19 19-4-4m0-7A7 7 0 1 1 1 8a7 7 0 0 1 14 0Z" />
                        </svg>
                    </div>
                    <input type="text" id="table-search" name="search"
                        class="block pt-2 ps-10 text-sm text-gray-900 border border-gray-300 rounded-lg w-80 bg-gray-50 focus:ring-blue-500 focus:border-blue-500 dark:bg-gray-700 dark:border-gray-600 dark:placeholder-gray-400 dark:text-white dark:focus:ring-blue-500 dark:focus:border-blue-500"
                        placeholder="Search for items">
                </div>
                <a href="/admin/create/news"><button type="button"
                        class="text-white bg-gray-800 hover:bg-gray-900 focus:outline-none focus:ring-4 focus:ring-gray-300 font-medium rounded-lg text-sm px-5 py-2.5 me-2 mb-2 dark:bg-gray-800 dark:hover:bg-gray-700 dark:focus:ring-gray-700 dark:border-gray-700">+
                        Add</button></a>
            </div>
        </form>
        <table class="w-full text-sm text-left rtl:text-right text-gray-500 dark:text-gray-400">
            <thead class="text-xs text-gray-700 uppercase bg-gray-50 dark:bg-gray-700 dark:text-gray-400">
                <tr>
                    <th scope="col" class="p-4">
                        <div class="flex items-center">
                            <input id="checkbox-all-search" type="checkbox"
                                class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                            <label for="checkbox-all-search" class="sr-only">checkbox</label>
                        </div>
                    </th>
                    <th scope="col" class="px-6 py-3">
                        ID
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Tile
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Image
                    </th>
                    <th scope="col" class="px-6 py-3">
                        Url
                    </th>
                </tr>
            </thead>
            <tbody>
                @foreach ($newses as $news)
                    <tr
                        class="bg-white border-b dark:bg-gray-800 dark:border-gray-700 hover:bg-gray-50 dark:hover:bg-gray-600">
                        <td class="w-4 p-4">
                            <div class="flex items-center">
                                <input id="checkbox-table-search-1" type="checkbox"
                                    class="w-4 h-4 text-blue-600 bg-gray-100 border-gray-300 rounded focus:ring-blue-500 dark:focus:ring-blue-600 dark:ring-offset-gray-800 dark:focus:ring-offset-gray-800 focus:ring-2 dark:bg-gray-700 dark:border-gray-600">
                                <label for="checkbox-table-search-1" class="sr-only">checkbox</label>
                            </div>
                        </td>
                        {{-- @dd($medichine) --}}
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $news->id }}
                        </th>
                        <th scope="row" class="px-6 py-4 font-medium text-gray-900 whitespace-nowrap dark:text-white">
                            {{ $news->title }}
                        </th>
                        <td class="px-6 py-4">
                            {{ $news->img_url }}
                        </td>
                        <td class="px-6 py-4">
                            Rp{{ $news->news_url }}
                        </td>
                        <td class="px-6 py-4">
                            {{ $news->description }}
                        </td>
                        <td class="px-6 py-4 flex gap-4">
                            <a href="/admin/news/{{ $news->id }}"
                                class="font-medium text-blue-600 dark:text-blue-500 hover:underline">Edit</a>
                            <button id="trigger-modal" onclick="urlModalHandler(this)"
                                data-id-target="{{ route('admin.news.destroy', $news->id) }}"
                                data-modal-target="popup-modal" data-modal-toggle="popup-modal" type="button"
                                class="font-medium text-red-600 dark:text-red-500 hover:underline">Delete</button>
                        </td>
                    </tr>
                @endforeach
            </tbody>
        </table>
        <div class="py-4 bg-white dark:bg-gray-900 flex justify-start">
            <div class="flex flex-col items-center">
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    <!-- Previous Page Link -->
                    @if ($newses->onFirstPage())
                        <span
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-600 bg-gray-800 rounded-s dark:bg-gray-700 dark:text-gray-500">
                            Prev
                        </span>
                    @else
                        <a href="{{ $newses->previousPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 rounded-s hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Prev
                        </a>
                    @endif

                    <!-- Next Page Link -->
                    @if ($newses->hasMorePages())
                        <a href="{{ $newses->nextPageUrl() }}"
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-white bg-gray-800 border-0 border-s border-gray-700 rounded-e hover:bg-gray-900 dark:bg-gray-800 dark:border-gray-700 dark:text-gray-400 dark:hover:bg-gray-700 dark:hover:text-white">
                            Next
                        </a>
                    @else
                        <span
                            class="flex items-center justify-center px-3 h-8 text-sm font-medium text-gray-600 bg-gray-800 rounded-e dark:bg-gray-700 dark:text-gray-500">
                            Next
                        </span>
                    @endif
                </div>
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $newses->firstItem() }}</span>
                    to <span class="font-semibold text-gray-900 dark:text-white">{{ $newses->lastItem() }}</span> of
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $newses->total() }}</span> Entries
                </span>
            </div>
        </div>

    </div>
@endsection
