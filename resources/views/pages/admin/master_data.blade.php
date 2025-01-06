@extends('components.layouts.main')

@include('components.partials.sidebar')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="flex justify-between items-center mb-6">
            <h1 class="text-3xl font-bold">Master Data</h1>
        </div>
        <div class="grid grid-cols-1 md:grid-cols-2">
            <div>
                {{-- fiillter kabupaten --}}
            </div>
            <div>
                {{-- fillter kecamatan --}}
            </div>
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
                        <tr class="bg-white border-b text-sm md:text-lg">
                            <td class="px-4 py-3">1</td>
                            <td class="px-4 py-3">Kantor Kecamatan Kuta</td>
                            <td class="px-4 py-3">Badung</td>
                            <td class="px-4 py-3">Kuta</td>
                            <td class="px-4 py-3">test@gmail.com</td>
                            <td class="px-4 py-3">(0361) 00000</td>
                            <td class="px-4 py-3">
                                <div class="flex flex-row items-center space-x-2">
                                    <a href=""
                                        class="bg-blue-500 text-white p-3 rounded hover:bg-blue-600 transition duration-150 ease-in-out">
                                        <i class="fas fa-edit"></i>
                                    </a>
                                    <a href=""
                                        class="bg-green-500 text-white p-3 rounded hover:bg-green-600 transition duration-150 ease-in-out">
                                        <i class="fas fa-eye"></i>
                                    </a>
                                    <form action="" method="" class="">
                                        @csrf
                                        @method('DELETE')
                                        <button type="submit"
                                            class="bg-red-500 text-white p-3 rounded hover:bg-red-600 transition duration-150 ease-in-out"
                                            onclick="return confirm('Apakah anda yakin ingin menghapus data ini?')">
                                            <i class="fas fa-trash"></i>
                                        </button>
                                    </form>
                                </div>
                            </td>
                        </tr>
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
    </section>
@endsection
