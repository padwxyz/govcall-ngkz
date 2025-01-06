@extends('components.layouts.main')

@include('components.partials.navbar')

@section('container')
    <section class="container mx-auto mt-24 md:mt-[100px] mb-10 md:mb-[100px] px-5 md:p-0">
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
                                    <td class="px-4 py-3">{{ $index + 1 }}</td>
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
                                    <td colspan="7" class="text-center py-5">No contacts found for this district.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
                <div>
                    <div class="flex flex-row justify-center items-center gap-4 mt-5 py-2">
                        <div>
                            <button
                                class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-mdvmd:er">
                                <i class="fas fa-chevron-left"></i>
                            </button>
                        </div>
                        <div class="flex gap-1">
                            <button
                                class="flex items-center justify-center w-10 h-10 text-white bg-blue-500 rounded-lg hover:bg-blue-600">
                                1
                            </button>
                            <button
                                class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-mdvmd:er">
                                2
                            </button>
                            <button
                                class="flex items-center justify-center w-10 h-10 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-mdvmd:er">
                                3
                            </button>
                        </div>
                        <div>
                            <button
                                class="flex items-center justify-center px-4 py-2 bg-white border border-gray-300 rounded-lg hover:bg-gray-100 text-mdvmd:er">
                                <i class="fas fa-chevron-right"></i>
                            </button>
                        </div>
                    </div>
                </div>
            </div>

            {{-- <div class="my-10 w-full p-10 rounded-lg bg-blue-500">
                <h1 class="text-xl lg:text-5xl font-bold text-white">Lorem ipsum dolor sit amet consectetur adipisicing?
                </h1>
                <p class="text-sm md:text-lg mt-5 text-white">Lorem ipsum dolor sit amet consectetur adipisicing elit.
                    Maxime illum
                    magni.
                    Lorem ipsum dolor, sit amet consectetur adipisicing elit. Nostrum aliquid ratione sed quod sapiente sit
                    beatae ut maxime nesciunt! Corporis! <span><a href="">nulla dolorum</a></span></p>
            </div> --}}
        </div>
    </section>

    @include('components.partials.footer')
@endsection
