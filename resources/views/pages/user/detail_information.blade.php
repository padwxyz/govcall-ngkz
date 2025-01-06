@extends('components.layouts.main')

@include('components.partials.navbar')

@section('container')
    <section class="container mx-auto mt-24 md:mt-[100px] mb-10 md:mb-[100px] px-5 md:p-0">
        <div>
            <p class="text-xl md:text-2xl md:mt-8">
                <a href="/">Home</a>
                <i class="fas fa-chevron-right mx-3"></i>
                <span>
                    <a href="{{ url()->previous() }}">Result</a>
                </span>
                <i class="fas fa-chevron-right mx-3"></i>
                <span class="font-bold">
                    <a href="{{ route('detail-information', ['id' => $contact->id]) }}"
                        class="text-blue-600 font-extrabold">Detail Information</a>
                </span>
            </p>
            <div
                class="mt-5 w-full p-8 md:px-10 md:py-20 rounded-2xl bg-gradient-to-br from-[#213555] via-[#335D92] to-[#4A89C8]">
                <h1 class="text-3xl md:text-5xl font-bold text-white">Detail Information of {{ $contact->office_name }}</h1>
            </div>
            <div class="p-3 md:p-5 md:mt-5 w-full rounded-lg shadow-lg bg-white">
                <div>
                    @if ($contact->office_photo)
                        <img src="{{ $contact->office_photo }}" alt="Office Photo"
                            class="h-1/4 w-full object-cover rounded-lg">
                    @else
                        -
                    @endif
                </div>
                <div class="grid grid-cols-1 md:grid-cols-2 md:gap-5 mt-5">
                    <div class="text-sm md:text-xl">
                        <p class="my-5"><strong>Office Name:</strong> {{ $contact->office_name }}</p>
                        <p class="my-5"><strong>District Name:</strong> {{ $contact->district->name ?? '-' }}</p>
                        <p class="my-5"><strong>District Zip Code:</strong> {{ $contact->district->zip_code ?? '-' }}</p>
                        <p class="my-5"><strong>Sub-District Name:</strong> {{ $contact->sub_district->name ?? '-' }}</p>
                        <p class="my-5"><strong>Sub-District Zip Code:</strong>
                            {{ $contact->sub_district->zip_code ?? '-' }}</p>
                    </div>
                    <div class="text-sm md:text-xl">
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
        </div>
    </section>

    @include('components.partials.footer')
@endsection
