<?php

namespace App\Http\Controllers;

use App\Models\District;
use Illuminate\Http\Request;

class DistrictController extends Controller
{
    public function index()
    {
        $districts = District::all();
        return view('pages.user.landing_page', compact('districts'));
    }

    public function show($id)
    {
        $districts = District::with(['sub_districts', 'contacts'])->findOrFail($id);
        return view('pages.user.result', compact('districts'));
    }
}
