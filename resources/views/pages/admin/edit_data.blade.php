@extends('components.layouts.main')

@include('components.partials.sidebar')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl font-bold mb-4">Edit Data</h2>
            <form action="{{ url('master-data/' . $contact->id) }}" method="POST" enctype="multipart/form-data">
                @csrf
                @method('PUT')
                <div class="mb-4">
                    <label for="office_photo" class="block text-gray-700">Upload Office Photo</label>
                    <input type="file" id="office_photo" name="office_photo" class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="district_id" class="block text-gray-700">District</label>
                    <select id="district_id" name="district_id" class="w-full px-3 py-2 border rounded"
                        onchange="filterSubDistricts()">
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}"
                                {{ $district->id == $contact->district_id ? 'selected' : '' }}>
                                {{ $district->name }}
                            </option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="zip_code_district" class="block text-gray-700">District ZIP Code</label>
                    <input type="text" id="zip_code_district" name="zip_code_district"
                        value="{{ $contact->district->zip_code ?? '' }}" class="w-full px-3 py-2 border rounded bg-gray-100"
                        readonly>
                </div>
                <div class="mb-4">
                    <label for="sub_district_id" class="block text-gray-700">Sub-District</label>
                    <select id="sub_district_id" name="sub_district_id" class="w-full px-3 py-2 border rounded"></select>
                </div>
                <div class="mb-4">
                    <label for="zip_code_sub_district" class="block text-gray-700">Sub-District ZIP Code</label>
                    <input type="text" id="zip_code_sub_district" name="zip_code_sub_district"
                        value="{{ $contact->subDistrict->zip_code ?? '' }}"
                        class="w-full px-3 py-2 border rounded bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="office_name" class="block text-gray-700">Office Name</label>
                    <input type="text" id="office_name" name="office_name" value="{{ $contact->office_name }}"
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-gray-700">Address</label>
                    <input type="text" id="address" name="address" value="{{ $contact->address }}"
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-gray-700">Email</label>
                    <input type="email" id="email" name="email" value="{{ $contact->email }}"
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone" value="{{ $contact->phone }}"
                        class="w-full px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full px-3 py-2 border rounded">
                        <option value="Active" {{ $contact->status == 'Active' ? 'selected' : '' }}>Active</option>
                        <option value="Inactive" {{ $contact->status == 'Inactive' ? 'selected' : '' }}>Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end">
                    <button type="button"
                        class="bg-gray-500 text-white px-4 py-2 rounded hover:bg-gray-600 transition duration-150 ease-in-out"
                        onclick="window.location.href='{{ url('master-data') }}'">Cancel</button>
                    <button type="submit"
                        class="bg-blue-500 text-white px-4 py-2 rounded ml-2 hover:bg-blue-600 transition duration-150 ease-in-out">Save</button>
                </div>
            </form>
        </div>
    </section>

    <script>
        function filterSubDistricts() {
            const districtId = document.getElementById('district_id').value;
            const subDistrictSelect = document.getElementById('sub_district_id');
            const zipCodeDistrict = document.getElementById('zip_code_district');
            const zipCodeSubDistrict = document.getElementById('zip_code_sub_district');

            subDistrictSelect.innerHTML = '';
            zipCodeDistrict.value = '';
            zipCodeSubDistrict.value = '';

            const districts = @json($districts);
            const subDistricts = @json($subDistricts);

            const selectedDistrict = districts.find(d => d.id == districtId);
            if (selectedDistrict) {
                zipCodeDistrict.value = selectedDistrict.zip_code;
            }

            subDistricts.forEach(sub => {
                if (sub.district_id == districtId) {
                    const option = document.createElement('option');
                    option.value = sub.id;
                    option.textContent = sub.name;
                    subDistrictSelect.appendChild(option);
                }
            });

            subDistrictSelect.addEventListener('change', function () {
                const selectedSubDistrict = subDistricts.find(sub => sub.id == subDistrictSelect.value);
                zipCodeSubDistrict.value = selectedSubDistrict ? selectedSubDistrict.zip_code : '';
            });
        }

        document.addEventListener('DOMContentLoaded', function () {
            filterSubDistricts();
        });
    </script>
@endsection
