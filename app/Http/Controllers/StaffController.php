<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Certificate;

class StaffController extends Controller
{
    public function dashboard()
    {
        return view('staff_dashboard', [
            'residents' => Resident::count(),
            'certs' => Certificate::count(),
            'residentList' => Resident::latest()->get(),
            'certificateList' => Certificate::with('resident')->latest()->get(),
        ]);
    }
}