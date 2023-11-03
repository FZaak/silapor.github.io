<?php

use App\Http\Controllers\LoginController;
use App\Http\Controllers\LogoutController;
use App\Http\Controllers\ReportController;
use App\Http\Controllers\SatkerController;
use App\Http\Controllers\UserController;
use App\Models\Report;
use App\Models\Satker;
use App\Models\User;
use Illuminate\Support\Carbon;
use Illuminate\Support\Facades\Auth;
use Illuminate\Support\Facades\Route;

/*
|--------------------------------------------------------------------------
| Web Routes
|--------------------------------------------------------------------------
|
| Here is where you can register web routes for your application. These
| routes are loaded by the RouteServiceProvider and all of them will
| be assigned to the "web" middleware group. Make something great!
|
*/




Route::middleware(['auth'])->group(function () {
    // Dashboard
    Route::get('/', function () {
        $dt = Carbon::now();
        $dt->toDateString();
        return view('welcome', [
            'satker' => Satker::count(),
            'users' => User::count(),
            'reports' => Report::count(),
            'reportsByMonth' => Report::whereMonth('created_at', $dt->format('m'))->count(),
            'reportsPegawai' => Report::where('satker_id', Auth::user()->satker_id)->count(),
            'reportsPegawaiByMonth' => Report::where('satker_id', Auth::user()->satker_id)->whereMonth('created_at', $dt->format('m'))->count()
        ]);
    });

    // SATKER
    Route::resource('/satker', SatkerController::class);

    // PENGGUNA
    Route::resource('/users', UserController::class);

    // Logout
    Route::get('/logout', LogoutController::class)->name('logout');

    // LAPORAN
    Route::resource('/reports', ReportController::class);
});


Route::middleware(['guest'])->group(function () {
    Route::get('/login', [LoginController::class, 'index'])->name('login');
    Route::post('/login', [LoginController::class, 'login'])->name('login');
});
