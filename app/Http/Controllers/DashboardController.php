<?php

namespace App\Http\Controllers;

use App\Models\Contact;
use App\Models\District;
use App\Models\SubDistrict;

class DashboardController extends Controller
{
    public function dashboard()
    {
        $totalData = Contact::count();
        $activeDistricts = District::count();
        $activeSubDistricts = SubDistrict::count();
        $newDataThisMonth = Contact::whereMonth('created_at', now()->month)->count();
        $recentContacts = Contact::with(['district', 'sub_district'])
            ->orderBy('created_at', 'desc')
            ->take(5)
            ->get();

        return view('pages.admin.dashboard', [
            'title' => 'Dashboard Admin'
        ], compact('totalData', 'activeDistricts', 'activeSubDistricts',
        'newDataThisMonth', 'recentContacts'));
    }
}
