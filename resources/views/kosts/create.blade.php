@extends('layouts.app')

@section('content')
    <h1>Pesan Kost: {{ $kost->nama_kost }}</h1>

    <form action="{{ route('pemesanans.store', $kost->id) }}" method="POST">
        @csrf
        <div>
            <label for="nama_penyewa">Nama Penyewa:</label>
            <input type="text" name="nama_penyewa" id="nama_penyewa" required>
        </div>
        <div>
            <label for="tanggal_mulai">Tanggal Mulai:</label>
            <input type="date" name="tanggal_mulai" id="tanggal_mulai" required>
        </div>
        <div>
            <label for="tanggal_akhir">Tanggal Akhir:</label>
            <input type="date" name="tanggal_akhir" id="tanggal_akhir" required>
        </div>
        <button type="submit">Pesan</button>
    </form>
@endsection
