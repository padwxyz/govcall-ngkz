@extends('components.layouts.main')

@include('components.partials.sidebar')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[110px]">
        <div
            class="mt-5 w-full p-8 md:px-10 md:py-20 rounded-2xl bg-gradient-to-br from-[#213555] via-[#335D92] to-[#4A89C8]">
            <h1 class="text-3xl md:text-5xl font-bold text-white">Detail Information of {{ $contact->office_name }}</h1>
        </div>
        <div class="p-3 md:p-5 md:mt-5 w-full rounded-lg shadow-lg bg-white">
            <div class="grid grid-cols-1 md:grid-cols-2 gap-6">
                <div class="flex justify-center items-center">
                    @if ($contact->office_photo)
                        <img src="{{ $contact->office_photo }}" alt="Office Photo"
                            class="h-auto w-full object-cover rounded-lg">
                    @else
                        -
                    @endif
                </div>
                <div class=" mt-5 text-sm md:text-xl">
                    <p class="my-5"><strong>Office Name:</strong> {{ $contact->office_name }}</p>
                    <p class="my-5"><strong>District Name:</strong> {{ $contact->district->name ?? '-' }}</p>
                    <p class="my-5"><strong>District Zip Code:</strong> {{ $contact->district->zip_code ?? '-' }}</p>
                    <p class="my-5"><strong>Sub-District Name:</strong> {{ $contact->sub_district->name ?? '-' }}</p>
                    <p class="my-5"><strong>Sub-District Zip Code:</strong>
                        {{ $contact->sub_district->zip_code ?? '-' }}</p>
                    <p class="my-5"><strong>Address:</strong> {{ $contact->address }}</p>
                    <p class="my-5"><strong>Email:</strong> {{ $contact->email }}</p>
                    <p class="my-5"><strong>Phone:</strong> {{ $contact->phone }}</p>
                    <p class="my-5"><strong>Website:</strong>
                        @if ($contact->website)
                            <a href="{{ $contact->website }}" target="_blank"
                                class="text-blue-600 hover:underline">{{ $contact->website }}</a>
                        @else
                            -
                        @endif
                    </p>
                    <p class="my-5"><strong>Status:</strong> {{ $contact->status }}</p>
                </div>
            </div>
        </div>
        <div class="flex justify-end">
            <button onclick="window.history.back();"
                class="bg-blue-500 text-white text-sm md:text-lg mt-5 px-10 py-3 rounded hover:bg-blue-600 transition duration-150 ease-in-out">
                Back
            </button>
        </div>
    </section>
@endsection
