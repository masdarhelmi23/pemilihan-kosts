@extends('layouts.app')

@section('content')
{{-- Menambahkan blok style untuk memastikan latar belakang gelap di seluruh halaman --}}
<style>
    html, body {
        background-color: #1a202c !important; /* Warna latar belakang sangat gelap */
        color: #e2e8f0; /* Warna teks default untuk kontras */
        min-height: 100vh; /* Memastikan body mengambil tinggi penuh viewport */
    }
    .box {
        background-color: #2d3748 !important; /* Latar belakang box menjadi gelap, pastikan dengan !important */
        color: #e2e8f0; /* Warna teks di dalam box */
        border-radius: 8px;
        padding: 2.5rem;
    }
    .title.has-text-primary { /* Menyesuaikan warna judul */
        color: #48c78e !important;
    }
    .table.is-fullwidth {
        background-color: #2d3748; /* Latar belakang tabel */
        border-color: #4a5568; /* Warna border tabel */
    }
    .table.is-striped tbody tr:nth-of-type(odd) {
        background-color: #2d3748; /* Latar belakang baris ganjil */
    }
    .table.is-striped tbody tr:nth-of-type(even) {
        background-color: #1a202c; /* Latar belakang baris genap */
    }
    .table.is-hoverable tbody tr:not(.is-selected):hover {
        background-color: #4a5568 !important; /* Latar belakang saat hover */
    }
    .table.is-bordered td, .table.is-bordered th {
        border-color: #4a5568; /* Warna border sel tabel */
    }
    .has-text-white { /* Memastikan teks di dalam tabel tetap putih */
        color: #e2e8f0 !important;
    }
    .notification.is-success.is-dark {
        background-color: #2a613f !important; /* Warna notifikasi sukses yang lebih gelap */
        color: #e2e8f0 !important;
    }
    .notification.is-info.is-dark {
        background-color: #2a4e61 !important; /* Warna notifikasi info yang lebih gelap */
        color: #e2e8f0 !important;
    }
</style>

<section class="section" style="min-height: 100vh; padding: 1.5rem;">
    {{-- Menghapus div.container agar konten menjadi full width --}}
    <div class="box" style="border-radius: 8px; padding: 2.5rem; margin-left: 1.5rem; margin-right: 1.5rem;">
        <h1 class="title is-3 has-text-primary mb-5" style="color: #48c78e !important;">Riwayat Pemesanan Kost</h1>

        <div class="mb-5">
            <a href="/" class="button is-link is-light" style="border-radius: 4px;">
                ← Kembali ke Halaman Utama
            </a>
        </div>

        @if(session('success'))
            <div class="notification is-success is-dark is-rounded mb-4" style="border-radius: 4px;">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        @endif

        @if($pemesanans->count())
            <div class="table-container">
                <table class="table is-fullwidth is-striped is-hoverable is-bordered">
                    <thead>
                        <tr>
                            <th class="has-background-dark has-text-white has-text-left" style="border-color: #4a5568;">Kost</th>
                            <th class="has-background-dark has-text-white has-text-left" style="border-color: #4a5568;">Nama Penyewa</th>
                            <th class="has-background-dark has-text-white has-text-centered" style="border-color: #4a5568;">Tanggal Mulai</th>
                            <th class="has-background-dark has-text-white has-text-centered" style="border-color: #4a5568;">Tanggal Akhir</th>
                            <th class="has-background-dark has-text-white has-text-centered" style="border-color: #4a5568;">Sisa Hari</th>
                            <th class="has-background-dark has-text-white has-text-centered" style="border-color: #4a5568;">Status</th>
                        </tr>
                    </thead>
                    <tbody>
                        @foreach($pemesanans as $pemesanan)
                        <tr>
                            <td class="has-text-white has-text-left" style="border-color: #4a5568;">{{ $pemesanan->kost->nama_kost }}</td>
                            <td class="has-text-white has-text-left" style="border-color: #4a5568;">{{ $pemesanan->nama_penyewa }}</td>
                            <td class="has-text-white has-text-centered" style="border-color: #4a5568;">{{ $pemesanan->tanggal_mulai }}</td>
                            <td class="has-text-white has-text-centered" style="border-color: #4a5568;">{{ $pemesanan->tanggal_akhir }}</td>
                            <td class="has-text-centered" style="border-color: #4a5568;">
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
                            <td class="has-text-centered" style="border-color: #4a5568;">
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
            <div class="notification is-info is-dark" style="border-radius: 4px;">
                <p class="has-text-white">Tidak ada pemesanan yang ditemukan.</p>
            </div>
        @endif
    </div>
</section>
@endsection

<script>
    document.addEventListener('DOMContentLoaded', () => {
        (document.querySelectorAll('.notification .delete') || []).forEach(($delete) => {
            const $notification = $delete.parentNode;

            $delete.addEventListener('click', () => {
                $notification.parentNode.removeChild($notification);
            });
        });
    });
</script>
