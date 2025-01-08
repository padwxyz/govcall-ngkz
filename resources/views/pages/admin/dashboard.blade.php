@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-2xl font-bold">Admin Dashboard</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-xl md:text-2xl font-bold text-gray-700">Total Data</h1>
                <p class="text-3xl font-semibold text-blue-500 mt-2">{{ $totalData }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-xl md:text-2xl font-bold text-gray-700">Active Districts</h1>
                <p class="text-3xl font-semibold text-green-500 mt-2">{{ $activeDistricts }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-xl md:text-2xl font-bold text-gray-700">Active Sub-Districts</h1>
                <p class="text-3xl font-semibold text-green-500 mt-2">{{ $activeSubDistricts }}</p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h1 class="text-xl md:text-2xl font-bold text-gray-700">New Data This Month</h1>
                <p class="text-3xl font-semibold text-yellow-500 mt-2">{{ $newDataThisMonth }}</p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h1 class="text-xl md:text-2xl font-bold text-gray-700 mb-4">Recent Data Entries</h1>
            <ul class="divide-y divide-gray-200">
                @foreach ($recentContacts as $contact)
                    <li class="py-4 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg md:text-xl font-semibold text-gray-700">{{ $contact->office_name }} -
                                {{ $contact->district->name }}</h3>
                            <p class="text-gray-500">{{ $contact->sub_district->name }},
                                {{ $contact->created_at->diffForHumans() }}</p>
                        </div>
                        <a href="{{ url('master-data/' . $contact->id . '/edit') }}"
                            class="text-blue-500 hover:text-blue-600">Detail</a>
                    </li>
                @endforeach
            </ul>

        </div>
    </section>
@endsection
