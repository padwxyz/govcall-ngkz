<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use Illuminate\Http\Request;

class ContactController extends Controller
{
    public function show($id)
    {
        $contact = Contact::with(['district:id,name,zip_code', 
        'sub_district:id,name,zip_code'])->findOrFail($id);

        return view('pages.user.detail_information', [
            'title' => 'Detail Information'
        ], compact('contact'));
    }

    public function search(Request $request)
    {
        $searchQuery = $request->input('search');
        $filter = $request->input('filter', 'all');
        $contactsQuery = Contact::query();

        if ($filter == 'district' || $filter == 'all') {
            $contactsQuery->whereHas('district', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            });
        }

        if ($filter == 'sub-district' || $filter == 'all') {
            $contactsQuery->orWhereHas('sub_district', function ($query) use ($searchQuery) {
                $query->where('name', 'like', '%' . $searchQuery . '%');
            });
        }

        if ($filter == 'office' || $filter == 'all') {
            $contactsQuery->orWhere('office_name', 'like', '%' . $searchQuery . '%');
        }

        $contacts = $contactsQuery->paginate(10)->appends([
            'search' => $searchQuery,
            'filter' => $filter,
        ]);

        return view('pages.user.search_result', [
            'title' => 'Search Result'
        ], compact('contacts', 'searchQuery', 'filter'));
    }
}
