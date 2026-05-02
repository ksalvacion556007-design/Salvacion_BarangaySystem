<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Certificate;
use Illuminate\Http\Request;

class ArchiveController extends Controller
{
    public function index(Request $request)
    {
        $type = $request->get('type', 'residents');

        $residents = collect();
        $certificates = collect();

        if ($type == 'residents') {
            $residents = Resident::onlyTrashed()
                ->with('archiver')
                ->latest()
                ->paginate(15);
        }

        if ($type == 'certificates') {
            $certificates = Certificate::onlyTrashed()
                ->with('issuer')
                ->latest()
                ->paginate(15);
        }

        return view('staff_archive', compact('type', 'residents', 'certificates'));
    }

    public function restoreResident($id)
    {
        $res = Resident::withTrashed()->findOrFail($id);
        $res->restore();

        return back()->with('success', 'Resident restored');
    }

    public function restoreCertificate($id)
    {
        $cert = Certificate::withTrashed()->findOrFail($id);
        $cert->restore();

        return back()->with('success', 'Certificate restored');
    }
}