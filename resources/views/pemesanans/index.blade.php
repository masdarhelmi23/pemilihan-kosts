@extends('layouts.app')

@section('content')
<section class="section" style="background-color: #1a202c; min-height: 100vh;"> {{-- Added inline style for dark background and full height --}}
    <div class="container">
        {{-- Mengubah has-background-white menjadi has-background-dark untuk latar belakang box --}}
        {{-- Menambahkan has-text-white untuk memastikan teks di dalam box terlihat --}}
        <div class="box has-background-dark has-text-white" style="border-radius: 8px; padding: 2.5rem;"> {{-- Added border-radius and padding for better aesthetics --}}
            <h1 class="title is-3 has-text-primary mb-5" style="color: #48c78e !important;">Riwayat Pemesanan Kost</h1> {{-- Ensured primary color for title --}}

            {{-- Tombol Kembali --}}
            <div class="mb-5">
                <a href="/" class="button is-link is-light" style="border-radius: 4px;"> {{-- Added border-radius for button --}}
                    ← Kembali ke Halaman Utama
                </a>
            </div>

            {{-- Pesan Sukses Bulma --}}
            @if(session('success'))
                {{-- Mengubah warna notifikasi agar sesuai dengan tema gelap --}}
                <div class="notification is-success is-dark is-rounded mb-4" style="border-radius: 4px;"> {{-- Added border-radius for notification --}}
                    <button class="delete"></button>
                    {{ session('success') }}
                </div>
            @endif

            @if($pemesanans->count())
                <div class="table-container">
                    <table class="table is-fullwidth is-striped is-hoverable is-bordered" style="background-color: #2d3748; border-color: #4a5568;"> {{-- Darker background for table and border color --}}
                        <thead>
                            <tr>
                                {{-- Header tabel sudah has-background-dark dan has-text-white --}}
                                <th class="has-background-dark has-text-white has-text-left" style="border-color: #4a5568;">Kost</th> {{-- Added border-color for header cells --}}
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
                                {{-- Mengatur warna teks sel tabel menjadi putih untuk kontras --}}
                                <td class="has-text-white has-text-left" style="border-color: #4a5568;">{{ $pemesanan->kost->nama_kost }}</td> {{-- Added border-color for data cells --}}
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
                {{-- Mengubah warna notifikasi agar sesuai dengan tema gelap --}}
                <div class="notification is-info is-dark" style="border-radius: 4px;">
                    <p class="has-text-white">Tidak ada pemesanan yang ditemukan.</p>
                </div>
            @endif
        </div>
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
