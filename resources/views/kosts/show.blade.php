@extends('layouts.app')

@section('content')
    <div class="max-w-3xl mx-auto bg-white p-6 rounded shadow">
        <h1 class="text-2xl font-bold mb-2">{{ $kost->nama_kost }}</h1>
        <p class="text-gray-600 mb-4">{{ $kost->alamat }}</p>

        <div class="grid grid-cols-1 md:grid-cols-3 gap-4 mb-6">
            @foreach($kost->photos as $photo)
                <img src="{{ asset('storage/' . $photo->path) }}" alt="Foto Kost" class="w-full h-48 object-cover rounded">
            @endforeach
        </div>

        <p class="mb-2">
            <strong>Harga per bulan:</strong> Rp {{ number_format($kost->harga_per_bulan, 0, ',', '.') }}
        </p>
        <p class="mb-4">
            <strong>Fasilitas:</strong> {{ $kost->fasilitas }}
        </p>

        <a href="{{ route('pemesanans.create', $kost->id) }}" class="inline-block bg-blue-600 text-white px-4 py-2 rounded hover:bg-blue-700">
            Pesan Kost Ini
        </a>
    </div>
@endsection
