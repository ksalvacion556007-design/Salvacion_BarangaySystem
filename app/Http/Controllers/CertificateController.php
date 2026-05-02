<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Certificate;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class CertificateController extends Controller
{
    public function index()
    {
        $residents = Resident::all();

        $certificates = Certificate::with(['resident', 'issuer'])
            ->latest()
            ->get();

        return view('staff_certificates', compact('residents', 'certificates'));
    }

    public function store(Request $request)
    {
        $request->validate([
            'resident_id' => 'required|exists:residents,id',
            'type'        => 'required|string',
            'purpose'     => 'nullable|string',
            'income'      => 'nullable|numeric',
        ]);

        $resident = Resident::findOrFail($request->resident_id);

        Certificate::create([
            'resident_id' => $request->resident_id,
            'type'        => $request->type,
            'purpose'     => $request->purpose,
            'income'      => $request->income,
            'issued_by'   => auth()->id(),
            'issued_at'   => now(),
            'valid_until' => now()->addMonths(6),
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Certificates',
            'action'  => 'Issued ' . $request->type . ' for ' . $resident->first_name . ' ' . $resident->last_name,
        ]);

        return redirect('/staff/certificates')
            ->with('success', 'Certificate issued successfully');
    }

    public function destroy($id)
    {
        $cert = Certificate::with('resident')->findOrFail($id);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Certificates',
            'action'  => 'Archived ' . $cert->type . ' for ' . optional($cert->resident)->first_name . ' ' . optional($cert->resident)->last_name,
        ]);

        $cert->delete();

        return back()->with('success', 'Certificate archived');
    }
}