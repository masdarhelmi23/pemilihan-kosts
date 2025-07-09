@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        {{-- Mengubah has-background-white menjadi has-background-dark untuk latar belakang box --}}
        {{-- Menambahkan has-text-white untuk memastikan teks di dalam box terlihat --}}
        <div class="box has-background-dark has-text-white">
            {{-- Tombol Kembali ke Halaman Utama --}}
            <div class="mb-4">
                <a href="{{ route('home') }}" class="button is-link is-light">
                    ← Kembali ke Halaman Utama
                </a>
            </div>

            <h1 class="title is-3 has-text-primary mb-5">Riwayat Pemesanan Kost</h1>

            {{-- Pesan Sukses Bulma --}}
            @if(session('success'))
                {{-- Mengubah warna notifikasi agar sesuai dengan tema gelap --}}
                <div class="notification is-success is-dark is-rounded mb-4">
                    <button class="delete"></button>
                    {{ session('success') }}
                </div>
            @endif

            @if($pemesanans->count())
                <div class="table-container">
                    <table class="table is-fullwidth is-striped is-hoverable is-bordered">
                        <thead>
                            <tr>
                                {{-- Header tabel sudah has-background-dark dan has-text-white --}}
                                <th class="has-background-dark has-text-white has-text-left">Kost</th>
                                <th class="has-background-dark has-text-white has-text-left">Nama Penyewa</th>
                                <th class="has-background-dark has-text-white has-text-centered">Tanggal Mulai</th>
                                <th class="has-background-dark has-text-white has-text-centered">Tanggal Akhir</th>
                                <th class="has-background-dark has-text-white has-text-centered">Sisa Hari</th>
                                <th class="has-background-dark has-text-white has-text-centered">Status</th>
                            </tr>
                        </thead>
                        <tbody>
                            @foreach($pemesanans as $pemesanan)
                            <tr>
                                {{-- Mengatur warna teks sel tabel menjadi putih untuk kontras --}}
                                <td class="has-text-white has-text-left">{{ $pemesanan->kost->nama_kost }}</td>
                                <td class="has-text-white has-text-left">{{ $pemesanan->nama_penyewa }}</td>
                                <td class="has-text-white has-text-centered">{{ $pemesanan->tanggal_mulai }}</td>
                                <td class="has-text-white has-text-centered">{{ $pemesanan->tanggal_akhir }}</td>
                                <td class="has-text-centered">
                                    @php
                                        $today = \Carbon\Carbon::today();
                                        $end = \Carbon\Carbon::parse($pemesanan->tanggal_akhir);
                                        $diff = $today->diffInDays($end, false);
                                    @endphp
                                    @if($diff > 0)
                                        <span class="tag is-success is-light">{{ $diff }} hari lagi</span>
                                    @elseif($diff === 0)
                                        <span class="tag is-warning is-light">Habis hari ini</span>
                                    @else
                                        <span class="tag is-danger is-light">Sudah berakhir</span>
                                    @endif
                                </td>
                                <td class="has-text-centered">
                                    @php
                                        $statusClass = '';
                                        switch($pemesanan->status ?? 'Pending') {
                                            case 'Pending':
                                                $statusClass = 'is-warning';
                                                break;
                                            case 'Confirmed':
                                                $statusClass = 'is-success';
                                                break;
                                            case 'Cancelled':
                                                $statusClass = 'is-danger';
                                                break;
                                            default:
                                                $statusClass = 'is-info';
                                                break;
                                        }
                                    @endphp
                                    <span class="tag {{ $statusClass }} is-light">{{ $pemesanan->status ?? 'Pending' }}</span>
                                </td>
                            </tr>
                            @endforeach
                        </tbody>
                    </table>
                </div>
            @else
                {{-- Mengubah warna notifikasi agar sesuai dengan tema gelap --}}
                <div class="notification is-info is-dark">
                    <p class="has-text-white">Tidak ada pemesanan yang ditemukan.</p>
                </div>
            @endif
        </div>
    </div>
</section>
@endsection
