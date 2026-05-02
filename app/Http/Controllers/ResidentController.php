<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use Illuminate\Http\Request;

class ResidentController extends Controller
{
    public function index()
    {
        $residents = Resident::with('creator')
            ->whereNull('deleted_at') 
            ->latest()
            ->get();

        return view('staff_residents', compact('residents'));
    }

    public function store(Request $r)
    {
        $validated = $r->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'suffix' => 'nullable|string',

            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'place_of_birth' => 'nullable|string',
            'civil_status' => 'required|string',

            'purok' => 'required|string',
            'barangay' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string',

            'occupation' => 'nullable|string',
            'mobile_number' => 'nullable|string',

            'voter_status' => 'nullable|string',
            'pwd_status' => 'nullable|string',
            'fourps_status' => 'nullable|string',
            'resident_status' => 'nullable|string',
            'monthly_income' => 'nullable|numeric',

            'citizenship' => 'nullable|string',
            'years_of_residency' => 'nullable|integer',
            'employment_status' => 'nullable|string'
        ]);

        $validated['created_by'] = auth()->id();

        Resident::create($validated);

        return back()->with('success', 'Resident added successfully');
    }

    public function update(Request $r, $id)
    {
        $res = Resident::findOrFail($id);

        $validated = $r->validate([
            'first_name' => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name' => 'required|string',
            'suffix' => 'nullable|string',

            'gender' => 'required|string',
            'birthdate' => 'required|date',
            'place_of_birth' => 'nullable|string',
            'civil_status' => 'required|string',

            'purok' => 'required|string',
            'barangay' => 'required|string',
            'municipality' => 'required|string',
            'province' => 'required|string',

            'occupation' => 'nullable|string',
            'mobile_number' => 'nullable|string',

            'voter_status' => 'nullable|string',
            'pwd_status' => 'nullable|string',
            'fourps_status' => 'nullable|string',
            'resident_status' => 'nullable|string',
            'monthly_income' => 'nullable|numeric',

            'citizenship' => 'nullable|string',
            'years_of_residency' => 'nullable|integer',
            'employment_status' => 'nullable|string'
        ]);

        $validated['updated_by'] = auth()->id();

        $res->update($validated);

        return back()->with('success', 'Resident updated');
    }

    public function destroy($id)
    {
        $res = Resident::findOrFail($id);

        $res->update([
            'archived_by' => auth()->id(),
        ]);

        $res->delete(); 

        return back()->with('success', 'Resident archived successfully');
    }
}