<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Contact;
use App\Models\District;
use App\Models\SubDistrict;

class MasterDataController extends Controller
{
    public function index(Request $request)
    {
        $districtId = $request->input('district');
        $subDistrictId = $request->input('sub_district');
        $search = $request->input('search');
        $filter = $request->input('filter');

        $query = Contact::query();

        if ($districtId) {
            $query->whereHas('district', function ($q) use ($districtId) {
                $q->where('id', $districtId);
            });
        }

        if ($subDistrictId) {
            $query->whereHas('sub_district', function ($q) use ($subDistrictId) {
                $q->where('id', $subDistrictId);
            });
        }

        if ($search = $request->input('search')) {
            $query->where(function ($q) use ($search) {
                $q->where('office_name', 'LIKE', '%' . $search . '%')
                    ->orWhereHas('district', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'LIKE', '%' . $search . '%');
                    })
                    ->orWhereHas('sub_district', function ($subQuery) use ($search) {
                        $subQuery->where('name', 'LIKE', '%' . $search . '%');
                    });
            });
        }

        $contacts = $query->paginate(10)->appends($request->only(['search', 'district', 'sub_district']));

        $districts = District::all();
        $subDistricts = $districtId ? SubDistrict::where('district_id', $districtId)->get() : collect();

        return view('pages.admin.master_data', compact('contacts', 'districts', 'subDistricts'));
    }

    public function create()
    {
        $districts = District::all();
        $subDistricts = collect();

        return view('pages.admin.add_data', compact('districts', 'subDistricts'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'office_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'website' => 'nullable|url',
            'status' => 'required|in:Active,Inactive',
            'office_photo' => 'nullable|image|mimes:jpeg,png,jpg,gif|max:2048',
        ]);

        $contact = new Contact([
            'district_id' => $request->input('district_id'),
            'sub_district_id' => $request->input('sub_district_id'),
            'office_name' => $request->input('office_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'status' => $request->input('status'),
        ]);

        if ($request->hasFile('office_photo')) {
            $contact->office_photo = $request->file('office_photo')->store('office_photos');
        }

        $contact->save();

        return redirect()->route('master-data.index')->with('success', 'Data berhasil ditambahkan.');
    }

    public function edit($id)
    {
        $contact = Contact::findOrFail($id);
        $districts = District::all();
        $subDistricts = SubDistrict::where('district_id', $contact->district_id)->get();

        return view('pages.admin.edit_data', compact('contact', 'districts', 'subDistricts'));
    }

    public function update(Request $request, $id)
    {
        $request->validate([
            'district_id' => 'required|exists:districts,id',
            'sub_district_id' => 'required|exists:sub_districts,id',
            'office_name' => 'required|string|max:255',
            'address' => 'required|string',
            'email' => 'required|email',
            'phone' => 'required|string|max:15',
            'website' => 'nullable|url',
            'status' => 'required|in:Aktif,Non Aktif',
        ]);

        $contact = Contact::findOrFail($id);
        $contact->update([
            'district_id' => $request->input('district_id'),
            'sub_district_id' => $request->input('sub_district_id'),
            'office_name' => $request->input('office_name'),
            'address' => $request->input('address'),
            'email' => $request->input('email'),
            'phone' => $request->input('phone'),
            'website' => $request->input('website'),
            'status' => $request->input('status'),
        ]);

        return redirect()->route('master-data.index')->with('success', 'Data berhasil diperbarui.');
    }

    public function show($id)
    {
        $contact = Contact::findOrFail($id);
        return view('pages.admin.view_data', compact('contact'));
    }

    public function destroy($id)
    {
        $contact = Contact::findOrFail($id);
        $contact->delete();

        return redirect()->route('master-data.index')->with('success', 'Data berhasil dihapus.');
    }

    public function getSubDistricts(Request $request)
    {
        $districtId = $request->district_id;
        $subDistricts = SubDistrict::where('district_id', $districtId)->get();

        return response()->json($subDistricts);
    }
}
