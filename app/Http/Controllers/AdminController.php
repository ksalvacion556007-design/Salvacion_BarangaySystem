<?php

namespace App\Http\Controllers;

use App\Models\User;
use App\Models\ActivityLog;
use Illuminate\Http\Request;
use Illuminate\Support\Facades\Hash;

class AdminController extends Controller
{
    public function dashboard() {
        $staffQuery = User::whereIn('role', ['clerk', 'secretary']);

        $total          = $staffQuery->count();
        $secretaryCount = User::where('role', 'secretary')->count();
        $clerkCount     = User::where('role', 'clerk')->count();

        $totalList     = (clone $staffQuery)->get();
        $clerkList     = User::where('role', 'clerk')->get();
        $secretaryList = User::where('role', 'secretary')->get();

        return view('admin_dashboard', compact(
            'total', 'secretaryCount', 'clerkCount',
            'totalList', 'clerkList', 'secretaryList'
        ));
    }

    public function staff() {
        $staff = User::where('role', '!=', 'admin')->get();
        return view('admin_staff', compact('staff'));
    }

    public function storeStaff(Request $r) {

        $r->validate([
            'first_name'  => 'required|string',
            'middle_name' => 'nullable|string',
            'last_name'   => 'required|string',
            'email'       => 'required|email|unique:users,email',
            'role'        => 'required',
            'password'    => 'required|min:6|confirmed',
        ]);

        $user = User::create([
            'first_name'  => $r->first_name,
            'middle_name' => $r->middle_name,
            'last_name'   => $r->last_name,
            'email'       => $r->email,
            'role'        => $r->role,
            'status'      => 'active',
            'password'    => Hash::make($r->password),
        ]);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Staff Management',
            'action'  => 'Added staff: ' . $user->first_name . ' ' . $user->last_name,
        ]);

        return back()->with('success', 'Staff created successfully');
    }

    public function updateStaff(Request $r, $id) {

        $u = User::findOrFail($id);

        $data = [
            'first_name'  => $r->first_name,
            'middle_name' => $r->middle_name,
            'last_name'   => $r->last_name,
            'email'       => $r->email,
            'role'        => $r->role,
        ];

        if ($r->filled('password')) {
            $data['password'] = Hash::make($r->password);
        }

        $u->update($data);

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Staff Management',
            'action'  => 'Updated staff: ' . $u->first_name . ' ' . $u->last_name,
        ]);

        return back()->with('success', 'Staff updated successfully');
    }

    public function deleteStaff($id) {

        $u = User::findOrFail($id);

        $fullName = $u->first_name . ' ' . $u->last_name;

        $u->forceDelete();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Staff Management',
            'action'  => 'Permanently deleted staff: ' . $fullName,
        ]);

        return back()->with('success', 'Staff permanently deleted.');
    }

    public function archive() {
        $staff = User::onlyTrashed()->get();
        return view('admin_archive', compact('staff'));
    }

    public function restore($id) {

        $user = User::withTrashed()->findOrFail($id);
        $user->restore();

        ActivityLog::create([
            'user_id' => auth()->id(),
            'module'  => 'Staff Management',
            'action'  => 'Restored staff: ' . $user->first_name . ' ' . $user->last_name,
        ]);

        return back()->with('success', 'Staff restored');
    }
}