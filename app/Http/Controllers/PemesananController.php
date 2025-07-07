<?php
namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kost;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    public function create($kost_id)
    {
        $kost = Kost::findOrFail($kost_id);
        return view('pemesanans.create', compact('kost'));
    }

    public function store(Request $request, $kost_id)
    {
        $request->validate([
            'nama_penyewa' => 'required',
            'tanggal_mulai' => 'required|date',
            'tanggal_akhir' => 'required|date'
        ]);

        Pemesanan::create([
            'kost_id' => $kost_id,
            'nama_penyewa' => $request->nama_penyewa,
            'tanggal_mulai' => $request->tanggal_mulai,
            'tanggal_akhir' => $request->tanggal_akhir
        ]);

        return redirect()->route('kosts.show', $kost_id)->with('success', 'Pemesanan berhasil dibuat.');
    }
}
