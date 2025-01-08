@extends('components.layouts.main_admin')

@section('container')
    <section class="px-5 md:pl-24 md:pr-20 my-10 md:ml-56 flex-grow mt-[100px]">
        <div class="bg-white p-6 rounded-lg shadow-lg">
            <h2 class="text-2xl md:text-5xl font-bold mb-10">Add New Data</h2>
            <form action="{{ route('master-data.store') }}" method="POST" enctype="multipart/form-data">
                @csrf
                <div class="mb-4">
                    <label for="office_photo" class="block text-sm md:text-lg text-gray-700">Upload Office Photo</label>
                    <input type="file" id="office_photo" name="office_photo"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="district_id" class="block text-sm md:text-lg text-gray-700">District</label>
                    <select id="district_id" name="district_id" class="w-full text-sm md:text-lg px-3 py-2 border rounded"
                        onchange="filterSubDistricts()">
                        <option value="">Select District</option>
                        @foreach ($districts as $district)
                            <option value="{{ $district->id }}">{{ $district->name }}</option>
                        @endforeach
                    </select>
                </div>
                <div class="mb-4">
                    <label for="zip_code_district" class="block text-sm md:text-lg text-gray-700">District ZIP Code</label>
                    <input type="text" id="zip_code_district" name="zip_code_district"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="sub_district_id" class="block text-sm md:text-lg text-gray-700">Sub-District</label>
                    <select id="sub_district_id" name="sub_district_id"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                        <option value="">Select Sub-District</option>
                    </select>
                </div>
                <div class="mb-4">
                    <label for="zip_code_sub_district" class="block text-sm md:text-lg text-gray-700">Sub-District ZIP
                        Code</label>
                    <input type="text" id="zip_code_sub_district" name="zip_code_sub_district"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded bg-gray-100" readonly>
                </div>
                <div class="mb-4">
                    <label for="office_name" class="block text-sm md:text-lg text-gray-700">Office Name</label>
                    <input type="text" id="office_name" name="office_name"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="address" class="block text-sm md:text-lg text-gray-700">Address</label>
                    <input type="text" id="address" name="address"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="email" class="block text-sm md:text-lg text-gray-700">Email</label>
                    <input type="email" id="email" name="email"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="phone" class="block text-sm md:text-lg text-gray-700">Phone</label>
                    <input type="text" id="phone" name="phone"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="website" class="block text-sm md:text-lg text-gray-700">Website</label>
                    <input type="text" id="website" name="website"
                        class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                </div>
                <div class="mb-4">
                    <label for="status" class="block text-sm md:text-lg text-gray-700">Status</label>
                    <select id="status" name="status" class="w-full text-sm md:text-lg px-3 py-2 border rounded">
                        <option value="Active">Active</option>
                        <option value="Inactive">Inactive</option>
                    </select>
                </div>
                <div class="flex justify-end gap-2">
                    <button type="button"
                        class="bg-gray-500 text-white text-sm md:text-lg mt-5 px-10 py-3 rounded hover:bg-gray-600 transition duration-150 ease-in-out"
                        onclick="window.location.href='{{ url('master-data') }}'">Cancel</button>
                    <button type="submit"
                        class="bg-blue-500 text-white text-sm md:text-lg mt-5 px-10 py-3 rounded hover:bg-blue-600 transition duration-150 ease-in-out">Save</button>
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

            subDistrictSelect.innerHTML = '<option value="">Select Sub-District</option>';
            zipCodeDistrict.value = '';
            zipCodeSubDistrict.value = '';

            if (!districtId) return;

            fetch('{{ route('get.subdistricts') }}?district_id=' + districtId)
                .then(response => response.json())
                .then(data => {
                    data.forEach(sub => {
                        const option = document.createElement('option');
                        option.value = sub.id;
                        option.textContent = sub.name;
                        subDistrictSelect.appendChild(option);
                    });
                    const selectedDistrict = @json($districts).find(d => d.id == districtId);
                    if (selectedDistrict) {
                        zipCodeDistrict.value = selectedDistrict.zip_code;
                    }
                });
        }

        document.getElementById('sub_district_id').addEventListener('change', function() {
            const subDistrictId = this.value;
            const zipCodeSubDistrict = document.getElementById('zip_code_sub_district');

            if (!subDistrictId) {
                zipCodeSubDistrict.value = '';
                return;
            }

            const selectedSubDistrict = @json($subDistricts).find(sub => sub.id == subDistrictId);
            if (selectedSubDistrict) {
                zipCodeSubDistrict.value = selectedSubDistrict.zip_code;
            }
        });
    </script>
@endsection
