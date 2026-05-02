<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\User;
use App\Models\ActivityLog;

class AdminReportController extends Controller
{
    public function index(Request $request)
    {
        $from = $request->from;
        $to   = $request->to;

        $query = ActivityLog::with('user')->latest();

        if ($from) {
            $query->whereDate('created_at', '>=', $from);
        }
        if ($to) {
            $query->whereDate('created_at', '<=', $to);
        }

        $logs = $query->get();

        $total          = User::whereIn('role', ['clerk', 'secretary'])->count();
        $clerkCount     = User::where('role', 'clerk')->count();
        $secretaryCount = User::where('role', 'secretary')->count();

        $logCount = $logs->count();

        return view('admin_reports', compact('logs', 'total', 'clerkCount', 'secretaryCount', 'logCount'));
    }
}