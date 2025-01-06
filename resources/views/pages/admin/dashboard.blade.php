@extends('components.layouts.main')

@include('components.partials.sidebar')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Dashboard Admin</h1>
        </div>

        <div class="grid grid-cols-1 md:grid-cols-4 gap-6 mb-6">
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold text-gray-700">Total Data</h2>
                <p class="text-3xl font-semibold text-blue-500 mt-2"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold text-gray-700">Bidang Aktif</h2>
                <p class="text-3xl font-semibold text-green-500 mt-2"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold text-gray-700">Subbidang Aktif</h2>
                <p class="text-3xl font-semibold text-green-500 mt-2"></p>
            </div>
            <div class="bg-white p-6 rounded-lg shadow">
                <h2 class="text-xl font-bold text-gray-700">Data Baru Bulan Ini</h2>
                <p class="text-3xl font-semibold text-yellow-500 mt-2"></p>
            </div>
        </div>

        <div class="bg-white p-6 rounded-lg shadow">
            <h2 class="text-xl font-bold text-gray-700 mb-4">Entri Data Terbaru</h2>
            <ul class="divide-y divide-gray-200">
                {{-- @foreach () --}}
                    <li class="py-4 flex justify-between items-center">
                        <div>
                            <h3 class="text-lg font-semibold text-gray-700"></h3>
                            <p class="text-gray-500"></p>
                        </div>
                        <a href=""
                            class="text-blue-500 hover:text-blue-600">Detail</a>
                    </li>
                {{-- @endforeach --}}
            </ul>
        </div>
    </section>
@endsection
