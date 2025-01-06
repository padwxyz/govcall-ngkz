@extends('components.layouts.main')

@include('components.partials.navbar')

@section('container')
    <section class="container mx-auto mt-24 md:mt-[100px] mb-10 md:mb-[100px] px-5 md:p-0">
        <div>
            <p class="text-xl md:text-2xl md:mt-8">
                <a href="/">Home</a>
                <i class="fas fa-chevron-right mx-3"></i>
                <span class="font-bold">
                    <a href="{{ route('search') }}" class="text-blue-600 font-extrabold">Search Results</a>
                </span>
            </p>
            <div
                class="mt-5 w-full p-8 md:px-10 md:py-20 rounded-2xl bg-gradient-to-br from-[#213555] via-[#335D92] to-[#4A89C8]">
                <h1 class="text-3xl md:text-5xl font-bold text-white">Search Results for {{ $searchQuery }}</h1>
            </div>

            <div class="p-3 mt-3 md:p-5 md:mt-5 w-full rounded-lg shadow-lg bg-white">
                <form action="{{ route('search') }}" method="get" class="mb-5 flex justify-between items-center">
                    <div class="flex gap-2">
                        <select name="filter" class="p-2 rounded-lg border">
                            <option value="all">All</option>
                            <option value="district" {{ request('filter') == 'district' ? 'selected' : '' }}>District
                            </option>
                            <option value="sub-district" {{ request('filter') == 'sub-district' ? 'selected' : '' }}>
                                Sub-District</option>
                            <option value="office" {{ request('filter') == 'office' ? 'selected' : '' }}>Office Name
                            </option>
                        </select>
                        <input type="text" name="search" value="{{ old('search') }}" placeholder="Search..."
                            class="w-1/2 p-2 rounded-lg border">
                        <button type="submit" class="px-4 py-2 bg-blue-500 text-white rounded-lg">Search</button>
                    </div>
                </form>

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
                            @forelse($contacts as $index => $contact)
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
                                    <td colspan="7" class="text-center py-5">No contacts found for your search.</td>
                                </tr>
                            @endforelse
                        </tbody>
                    </table>
                </div>
            </div>
        </div>
    </section>

    @include('components.partials.footer')
@endsection
