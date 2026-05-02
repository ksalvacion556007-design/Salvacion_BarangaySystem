<?php

use Illuminate\Support\Facades\Route;
use App\Http\Controllers\ProfileController;
use App\Http\Controllers\AdminController;
use App\Http\Controllers\AdminReportController;
use App\Http\Controllers\StaffController;
use App\Http\Controllers\ResidentController;
use App\Http\Controllers\CertificateController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\ArchiveController;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/dashboard', function () {

    if (auth()->user()->role == 'admin') {
        return redirect('/admin/dashboard');
    }

    return redirect('/staff/dashboard');

})->middleware(['auth', 'verified'])->name('dashboard');

Route::middleware('auth')->group(function () {

    Route::get('/profile', [ProfileController::class, 'edit'])->name('profile.edit');
    Route::patch('/profile', [ProfileController::class, 'update'])->name('profile.update');
    Route::delete('/profile', [ProfileController::class, 'destroy'])->name('profile.destroy');

    Route::prefix('admin')->group(function () {
        Route::get('/dashboard', [AdminController::class, 'dashboard']);

        Route::get('/staff', [AdminController::class, 'staff']);
        Route::post('/staff', [AdminController::class, 'storeStaff']);
        Route::put('/staff/{id}', [AdminController::class, 'updateStaff']);
        Route::post('/staff/delete/{id}', [AdminController::class, 'deleteStaff']);

        Route::get('/archive', [AdminController::class, 'archive']);
        Route::post('/restore/{id}', [AdminController::class, 'restore']);

        Route::get('/reports', [AdminReportController::class, 'index']);
    });

    Route::prefix('staff')->group(function () {
        Route::get('/dashboard', [StaffController::class, 'dashboard']);

        Route::get('/residents', [ResidentController::class, 'index'])->name('residents.index');
        Route::post('/residents', [ResidentController::class, 'store'])->name('residents.store');
        Route::post('/residents/update/{id}', [ResidentController::class, 'update'])->name('residents.update');
        Route::delete('/residents/{id}', [ResidentController::class, 'destroy'])->name('residents.destroy');

        Route::get('/certificates', [CertificateController::class, 'index'])->name('certificates.index');
        Route::post('/certificates', [CertificateController::class, 'store']);
        Route::delete('/certificates/{id}', [CertificateController::class, 'destroy']);

        Route::get('/reports', [ReportController::class, 'index']);

        Route::get('/archive', [ArchiveController::class, 'index']);
        Route::post('/archive/restore/resident/{id}', [ArchiveController::class, 'restoreResident']);
        Route::post('/archive/restore/certificate/{id}', [ArchiveController::class, 'restoreCertificate']);
    });

});
require __DIR__.'/auth.php';