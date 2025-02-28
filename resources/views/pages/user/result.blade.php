@extends('components.layouts.main_user')

@section('container')
    <section class="container min-h-screen mx-auto mt-24 md:mt-[100px] mb-10 px-5 md:p-0">
        <div>
            <p class="text-xl md:text-2xl md:mt-8">
                <a href="/">Home</a>
                <i class="fas fa-chevron-right mx-3"></i>
                <span class="font-bold">
                    <a href="{{ url()->current() }}" class="text-blue-600 font-extrabold">Result</a>
                </span>
            </p>
            <div
                class="mt-5 w-full p-8 md:px-10 md:py-20 rounded-2xl bg-gradient-to-br from-[#213555] via-[#335D92] to-[#4A89C8]">
                <h1 class="text-3xl md:text-5xl font-bold text-white">Result of
                    {{ $districts->id == 1 ? 'Kota' : 'Kabupaten' }} {{ $districts->name }}</h1>
            </div>
            <div class="p-3 mt-3 md:p-5 md:mt-5 w-full rounded-lg shadow-lg bg-white">
                <div class="overflow-x-auto">
                    <table class="w-full rounded-lg border-collapse border border-black-500 text-sm text-left">
                        <thead class="bg-blue-200 text-md md:text-xl">
                            <tr>
                                <th class="px-4 py-5 ">No</th>
                                <th class="px-4 py-5 ">Office Name</th>
                                <th class="px-4 py-5 ">District</th>
                                <th class="px-4 py-5 ">Sub-District</th>
                                <th class="px-4 py-5 ">Email</th>
                                <th class="px-4 py-5 ">Phone</th>
                                <th class="px-4 py-5 ">Action</th>

                            </tr>
                        </thead>
                        <tbody>
                            @forelse($districts->contacts as $index => $contact)
                                <tr class="bg-white border-b text-sm md:text-lg">
                                    <td class="px-4 py-3">{{ $contacts->firstItem() + $index }}</td>
                                    <td class="px-4 py-3">{{ $contact->office_name }}</td>
                                    <td class="px-4 py-3">{{ $contact->district->name ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $contact->sub_district->name ?? '-' }}</td>
                                    <td class="px-4 py-3">{{ $contact->email }}</td>
                                    <td class="px-4 py-3">{{ $contact->phone }}</td>
                                    <td class="px-4 py-3">
                                        <a href="{{ route('detail-information', ['id' => $contact->id]) }}"
                                            class="text-blue-600 hover:underline">
                                            Detail Information
                                        </a>
                                    </td>
                                </tr>
                            @empty
                                <tr>
                                    <td colspan="7" class="text-center py-5 text-sm md:text-xl">No contacts found for
                                        this district.</td>
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
                            <a href="{{ $contacts->previousPageUrl() }}"
                                class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                <i class="fas fa-chevron-left"></i>
                            </a>
                        @endif
                    </div>

                    <div class="flex gap-1">
                        @php
                            $currentPage = $contacts->currentPage();
                            $totalPages = $contacts->lastPage();
                            $start = max($currentPage - 2, 1);
                            $end = min($start + 4, $totalPages);

                            if ($end - $start < 4) {
                                $start = max($end - 4, 1);
                            }

                            $showFirstPage = $start > 2;
                            $showLastPage = $end < $totalPages;
                        @endphp

                        @if ($showFirstPage)
                            <a href="{{ $contacts->url(1) }}"
                                class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                1
                            </a>
                        @endif

                        @if ($start > 1)
                            <span class="flex items-center justify-center w-10 h-10 text-gray-500">...</span>
                        @endif

                        @for ($i = $start; $i <= $end; $i++)
                            @if ($i == $currentPage)
                                <button
                                    class="flex items-center justify-center w-10 h-10 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                    {{ $i }}
                                </button>
                            @else
                                <a href="{{ $contacts->url($i) }}"
                                    class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                    {{ $i }}
                                </a>
                            @endif
                        @endfor

                        @if ($end < $totalPages - 1)
                            <span class="flex items-center justify-center w-10 h-10 text-gray-500">...</span>
                        @endif

                        @if ($showLastPage)
                            <a href="{{ $contacts->url($totalPages) }}"
                                class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100">
                                {{ $totalPages }}
                            </a>
                        @endif
                    </div>

                    <div>
                        @if ($contacts->hasMorePages())
                            <a href="{{ $contacts->nextPageUrl() }}"
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
        </div>
    </section>
@endsection
