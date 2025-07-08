<?php
namespace App\Http\Controllers;

use App\Models\Pemesanan;
use App\Models\Kost;
use Illuminate\Http\Request;

class PemesananController extends Controller
{
    /**
     * Menampilkan daftar semua pemesanan.
     *
     * @return \Illuminate\View\View
     */
    public function index()
{
    $pemesanans = Pemesanan::with('kost')->orderBy('tanggal_mulai', 'desc')->get();
    return view('pemesanans.index', compact('pemesanans'));
}

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
            'tanggal_akhir' => $request->tanggal_akhir, // Bagian ini diperbaiki
            'status' => 'Pending' // Baris ini ditambahkan
        ]);

        return redirect()->route('kosts.show', $kost_id)->with('success', 'Pemesanan berhasil dibuat.');
    }
}
