<?php

namespace App\Http\Controllers;

use Illuminate\Http\Request;
use App\Models\Magang;

class MagangController extends Controller
{
    public function index()
    {
        $dataMagang = Magang::all();
        return view('peserta', ['magang' => $dataMagang]);
    }

    public function store(Request $request)
    {
        Magang::create([
            'nama' => $request->nama,
            'instansi' => $request->instansi,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_selesai' => $request->tanggal_selesai,
        ]);

        return redirect()->back()->with('success', 'Data magang berhasil ditambahkan');
    }
}
