@extends('templates.navbar')

@section('container')
    <!-- Pharmacy Section Start  -->
    <section class="pharmacy" id="pharmacy">
        <h1 class="heading" style="margin-top: 8rem;">
            <span style="color: #205b48">Victoria </span>Pharmacy
        </h1>

        <div class="description">
            <p>
                Welcome to our pharmacy at Victoria Hospital. We are committed to
                providing comprehensive <br> pharmaceutical services to our patients
                and community. Our pharmacy carries a wide <br> range of medications
                and healthcare products to meet your needs.
            </p>
        </div>

        <div class="search-container">
            <h1 class="heading">pharmacy's <span>medicines</span></h1>
            <h2 class="subheading">"Find Information About Your Medicines"</h2>
            <form action="/pharmacy">
                <input type="text" id="search" placeholder="Search by name" name="search" />
                <button type="submit"><i class="fas fa-search"></i></button>
            </form>
        </div>

        <div class="table-container">
            <table>
                <thead>
                    <tr>
                        <th>Category Medicines</th>
                        <th>Name Medicines</th>
                        <th>Price Medicines</th>
                        <th>Description</th>
                    </tr>
                </thead>
                <tbody id="tableBody">
                    @foreach ($medichines as $medichine)
                        <tr>
                            <td>{{ $medichine->medichineCategory->name }}</td>
                            <td>{{ $medichine->name }}</td>
                            <td>{{ $medichine->price }}</td>
                            <td>
                                {{ $medichine->description }}
                            </td>
                        </tr>
                    @endforeach
                </tbody>
            </table>
        </div>
        {{-- Pagination --}}
        <div class="py-4 bg-white dark:bg-gray-900 flex justify-start">
            <div class="flex flex-col items-center">
                <!-- Buttons -->
                <div class="inline-flex mt-2 xs:mt-0">
                    <!-- Previous Page Link -->
                    @if ($medichines->onFirstPage())
                        <span>
                            <button id="prevPage">Prev</button>

                        </span>
                    @else
                        <a href="{{ $medichines->previousPageUrl() }}">
                            <button id="prevPage">Prev</button>
                        </a>
                    @endif

                    <!-- Next Page Link -->
                    @if ($medichines->hasMorePages())
                        <a href="{{ $medichines->nextPageUrl() }}">
                            <button id="nextPage">Next</button>
                        </a>
                    @else
                        <span>
                            <button id="nextPage">Next</button>
                        </span>
                    @endif
                </div>
                <!-- Help text -->
                <span class="text-sm text-gray-700 dark:text-gray-400">
                    Showing <span class="font-semibold text-gray-900 dark:text-white">{{ $medichines->firstItem() }}</span>
                    to <span class="font-semibold text-gray-900 dark:text-white">{{ $medichines->lastItem() }}</span> of
                    <span class="font-semibold text-gray-900 dark:text-white">{{ $medichines->total() }}</span> Entries
                </span>
            </div>
        </div>

    </section>
    <!-- Pharmacy Section End  -->
@endsection
