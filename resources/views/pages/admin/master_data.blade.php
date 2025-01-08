@extends('components.layouts.main')

@include('components.partials.sidebar')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Master Data</h1>
        </div>

        <form method="GET" action="{{ route('master-data.index') }}" class="space-y-4 mb-6">
            <div>
                <label for="district" class="block text-sm md:text-lg font-semibold mb-2">Filter By District</label>
                <select name="district" id="district"
                    class="w-full text-sm md:text-lg p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 transition ease-in-out">
                    <option value="">Select District</option>
                    @foreach ($districts as $district)
                        <option value="{{ $district->id }}" {{ request('district') == $district->id ? 'selected' : '' }}>
                            {{ $district->name }}</option>
                    @endforeach
                </select>
            </div>

            <div>
                <label for="sub_district" class="block text-sm md:text-lg font-semibold mb-2">Filter By Sub-District</label>
                <select name="sub_district" id="sub_district"
                    class="w-full text-sm md:text-lg p-4 border border-gray-300 rounded-lg shadow-sm focus:ring-2 focus:ring-blue-500 transition ease-in-out">
                    <option value="">Select Sub-District</option>
                    @foreach ($subDistricts as $subDistrict)
                        <option value="{{ $subDistrict->id }}"
                            {{ request('sub_district') == $subDistrict->id ? 'selected' : '' }}>{{ $subDistrict->name }}
                        </option>
                    @endforeach
                </select>
            </div>

            <div>
                <button type="submit"
                    class="w-full md:w-auto bg-blue-600 text-white text-sm md:text-lg py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                    Apply Filters
                </button>
            </div>
        </form>

        <div class="flex justify-end">
            <a href="{{ route('master-data.create') }}">
                <button
                    class="w-full md:w-auto bg-blue-600 text-white text-sm md:text-lg py-3 px-6 rounded-lg hover:bg-blue-700 transition duration-150 ease-in-out">
                    <i class="fas fa-plus mr-2"></i> Add Data
                </button>
            </a>
        </div>

        <div class="p-3 mt-3 md:p-5 md:mt-5 w-full rounded-lg shadow-lg bg-white">
            <div class="overflow-x-auto">
                <table class="w-full rounded-lg border-collapse border border-gray-300 text-sm text-left">
                    <thead class="bg-blue-200 text-md md:text-xl">
                        <tr>
                            <th class="px-4 py-5">No</th>
                            <th class="px-4 py-5">Office Name</th>
                            <th class="px-4 py-5">District</th>
                            <th class="px-4 py-5">Sub-District</th>
                            <th class="px-4 py-5">Email</th>
                            <th class="px-4 py-5">Phone</th>
                            <th class="px-4 py-5">Action</th>
                        </tr>
                    </thead>
                    <tbody>
                        @forelse ($contacts as $index => $contact)
                            <tr class="bg-white border-b text-sm md:text-lg">
                                <td class="px-4 py-3">{{ $contacts->firstItem() + $index }}</td>
                                <td class="px-4 py-3">{{ $contact->office_name }}</td>
                                <td class="px-4 py-3">{{ $contact->district->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $contact->sub_district->name ?? '-' }}</td>
                                <td class="px-4 py-3">{{ $contact->email }}</td>
                                <td class="px-4 py-3">{{ $contact->phone }}</td>
                                <td class="px-4 py-3">
                                    <div class="flex flex-row items-center space-x-2">
                                        <a href="{{ route('master-data.edit', $contact->id) }}"
                                            class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition duration-150 ease-in-out">
                                            <i class="fas fa-edit"></i>
                                        </a>
                                        <a href="{{ route('master-data.show', $contact->id) }}"
                                            class="bg-green-500 text-white p-3 rounded hover:bg-green-600 transition duration-150 ease-in-out">
                                            <i class="fas fa-eye"></i>
                                        </a>
                                        <form action="{{ route('master-data.destroy', $contact->id) }}" method="POST">
                                            @csrf
                                            @method('DELETE')
                                            <button type="submit"
                                                class="bg-red-500 text-white p-3 mt-4 rounded hover:bg-red-600 transition duration-150 ease-in-out"
                                                onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                                <i class="fas fa-trash"></i>
                                            </button>
                                        </form>
                                    </div>
                                </td>
                            </tr>
                        @empty
                            <tr>
                                <td colspan="7" class="text-center py-5 text-gray-500">Data tidak ditemukan</td>
                            </tr>
                        @endforelse
                    </tbody>
                </table>
            </div>

            <div class="flex flex-row justify-center items-center gap-4 mt-5 py-2">
                <div>
                    @if ($contacts->onFirstPage())
                        <button
                            class="flex items-center justify-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-left"></i>
                        </button>
                    @else
                        <a href="{{ $contacts->previousPageUrl() }}&search={{ request('search') }}&filter={{ request('filter') }}"
                            class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-left"></i>
                        </a>
                    @endif
                </div>

                <div class="flex gap-1">
                    @php
                        $currentPage = $contacts->currentPage();
                        $totalPages = $contacts->lastPage();
                        $start = 1;
                        $end = min(5, $totalPages);
                    @endphp
                    @for ($i = $start; $i <= $end; $i++)
                        @if ($i == $currentPage)
                            <button
                                class="flex items-center justify-center w-10 h-10 text-white bg-blue-500 rounded-lg hover:bg-blue-600">{{ $i }}</button>
                        @else
                            <a href="{{ $contacts->url($i) }}&search={{ request('search') }}&filter={{ request('filter') }}"
                                class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                {{ $i }}
                            </a>
                        @endif
                    @endfor

                    @if ($totalPages > 5)
                        <span class="flex items-center justify-center w-10 h-10 text-gray-500">...</span>
                    @endif

                    @if ($totalPages > 5 && $currentPage < $totalPages)
                        <a href="{{ $contacts->url($totalPages) }}&search={{ request('search') }}&filter={{ request('filter') }}"
                            class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            {{ $totalPages }}
                        </a>
                    @endif
                </div>

                <div>
                    @if ($contacts->hasMorePages())
                        <a href="{{ $contacts->nextPageUrl() }}&search={{ request('search') }}&filter={{ request('filter') }}"
                            class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                            <i class="fas fa-chevron-right"></i>
                        </a>
                    @else
                        <button
                            class="flex items-center justify-center px-4 py-2 bg-gray-200 border border-gray-300 rounded-lg cursor-not-allowed">
                            <i class="fas fa-chevron-right"></i>
                        </button>
                    @endif
                </div>
            </div>


        </div>
    </section>
@endsection
