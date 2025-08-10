<?php

use Illuminate\Support\Facades\Route;

Route::get('/', function () {
    return view('welcome');
});

Route::get('/login', function () {
    return view('login');
})->name('login');

Route::get('/signup', function () {
    return view('signup');
})->name('signup');

Route::get('/admin.home_admin', function () {
    return view('admin.home_admin');
})->name('admin.home_admin');

Route::get('/peserta.home_peserta', function () {
    return view('peserta.home_peserta');
})->name('peserta.home_peserta');

Route::get('/admin.menu_peserta', function () {
    return view('admin.menu_peserta');
})->name('admin.menu_peserta');

Route::get('/admin.absensi_admin', function () {
    return view('admin.absensi_admin');
})->name('admin.absensi_admin');

Route::get('/peserta.absensi_peserta', function () {
    return view('peserta.absensi_peserta');
})->name('peserta.absensi_peserta');

Route::get('/admin.laporan_admin', function () {
    return view('admin.laporan_admin');
})->name('admin.laporan_admin');

Route::get('/peserta.laporan_peserta', function () {
    return view('peserta.laporan_peserta');
})->name('peserta.laporan_peserta');

Route::get('/admin.dokumen_admin', function () {
    return view('admin.dokumen_admin');
})->name('admin.dokumen_admin');

Route::get('/peserta.dokumen_peserta', function () {
    return view('peserta.dokumen_peserta');
})->name('peserta.dokumen_peserta');

Route::get('/admin.statistik_admin', function () {
    return view('admin.statistik_admin');
})->name('admin.statistik_admin');

Route::get('/peserta.statistik_peserta', function () {
    return view('peserta.statistik_peserta');
})->name('peserta.statistik_peserta');

Route::get('/admin.profile_admin', function () {
    return view('admin.profile_admin');
})->name('admin.profile_admin');

Route::get('/peserta.profile_peserta', function () {
    return view('peserta.profile_peserta');
})->name('peserta.profile_peserta');

Route::get('/admin.notifikasi_admin', function () {
    return view('admin.notifikasi_admin');
})->name('admin.notifikasi_admin');

Route::get('/peserta.notifikasi_peserta', function () {
    return view('peserta.notifikasi_peserta');
})->name('peserta.notifikasi_peserta');

Route::get('/settings', function () {
    return view('settings');
})->name('settings');

Route::get('/admin.dashboard_admin', function () {
    return view('admin.dashboard_admin');
});

Route::get('/peserta.dashboard_peserta', function () {
    return view('peserta.dashboard_peserta');
})->name('peserta.dashboard_peserta');

Route::get('/peserta.pengajuan_izin', function () {
    return view('peserta.pengajuan_izin');
})->name('peserta.pengajuan_izin');