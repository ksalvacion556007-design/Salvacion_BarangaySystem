<?php

namespace App\Http\Controllers;

use App\Models\Resident;
use App\Models\Certificate;
use App\Models\ActivityLog;
use Illuminate\Http\Request;

class ReportController extends Controller
{
    public function index(Request $request)
    {
        $logs = ActivityLog::with('user')
            ->when($request->from, fn($q) => $q->whereDate('created_at', '>=', $request->from))
            ->when($request->to,   fn($q) => $q->whereDate('created_at', '<=', $request->to))
            ->latest()
            ->get();

        $totalResidents    = Resident::count();
        $totalCertificates = Certificate::count();

        return view('staff_reports', compact('logs', 'totalResidents', 'totalCertificates'));
    }
}