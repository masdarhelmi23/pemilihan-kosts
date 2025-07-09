@extends('layouts.app')

@section('content')
{{-- Menambahkan blok style untuk memastikan latar belakang gelap di seluruh halaman --}}
<style>
    html, body {
        background-color: #1a202c !important; /* Warna latar belakang sangat gelap */
        color: #e2e8f0; /* Warna teks default untuk kontras */
    }
    .box {
        background-color: #2d3748; /* Latar belakang box menjadi gelap */
        color: #e2e8f0; /* Warna teks di dalam box */
        border-radius: 8px;
        padding: 1.5rem; /* Menyesuaikan padding untuk kartu */
    }
    .title.has-text-link { /* Menyesuaikan warna judul 'Daftar Kost' */
        color: #3e8ed0 !important;
    }
    .title.is-5 { /* Menyesuaikan warna judul kost di kartu */
        color: #e2e8f0 !important;
    }
    .subtitle.is-6.has-text-grey { /* Menyesuaikan warna subtitle alamat di kartu */
        color: #a0aec0 !important;
    }
    .button.is-primary { /* Menyesuaikan warna tombol Riwayat Pemesanan */
        background-color: #48c78e;
        border-color: #48c78e;
        color: #fff;
    }
    .button.is-primary:hover {
        background-color: #3eb578;
        border-color: #3eb578;
    }
    .button.is-link.is-small.is-fullwidth { /* Menyesuaikan warna tombol Lihat Detail */
        background-color: #3e8ed0;
        border-color: #3e8ed0;
        color: #fff;
        border-radius: 4px;
    }
    .button.is-link.is-small.is-fullwidth:hover {
        background-color: #3273dc;
        border-color: #3273dc;
    }
    .has-text-success { /* Memastikan warna teks harga tetap terlihat */
        color: #48c78e !important;
    }
</style>

<section class="section" style="padding: 2rem 1.5rem;"> {{-- Menyesuaikan padding section untuk full width dengan sedikit margin horizontal --}}
    {{-- Menghapus div.container agar konten menjadi full width --}}
    {{-- Header dengan Judul dan Tombol Riwayat Pemesanan --}}
    <div class="level">
        <div class="level-left">
            <div class="level-item">
                <h1 class="title is-2 has-text-link">Daftar Kost</h1>
            </div>
        </div>
        <div class="level-right">
            <div class="level-item">
                <a href="{{ route('pemesanans.index') }}" class="button is-primary is-medium" style="border-radius: 4px;">
                    Riwayat Pemesanan
                </a>
            </div>
        </div>
    </div>

    {{-- Grid Kolom untuk Daftar Kost --}}
    <div class="columns is-multiline">
        @foreach($kosts as $kost)
            <div class="column is-one-third-desktop is-half-tablet is-full-mobile"> {{-- Responsive columns --}}
                <div class="box has-text-left"> {{-- Menggunakan Bulma 'box' untuk setiap kartu kost --}}
                    @php
                        $imageUrl = '';
                        // Menentukan URL gambar berdasarkan nama kost
                        if (strtolower($kost->nama_kost) === 'pratama') {
                            $imageUrl = 'https://binabangunbangsa.com/wp-content/uploads/2020/03/tips-Manajemen-Rumah-Kost-yang-Baik-dan-Benar-.jpg';
                        } elseif (strtolower($kost->nama_kost) === 'babol') {
                            $imageUrl = 'https://office.mitrarenov.com/assets/main/images/news/93cf29661239b41f5cc393e112ef7a39.jpg';
                        } elseif (strtolower($kost->nama_kost) === 'griya mustika') {
                            $imageUrl = 'https://papikost.com/images/property/478_968253603.jpg';
                        } else {
                            // Fallback ke gambar dari storage atau placeholder jika tidak ada yang cocok
                            $imageUrl = $kost->gambar ? asset('storage/kosts/' . $kost->gambar) : 'https://via.placeholder.com/400x300?text=No+Image';
                        }
                    @endphp

                    <figure class="image is-4by3 mb-4"> {{-- Margin bawah untuk gambar --}}
                        <img src="{{ $imageUrl }}" alt="Foto {{ $kost->nama_kost }}" onerror="this.onerror=null;this.src='https://via.placeholder.com/400x300?text=Image+Load+Error';" style="border-radius: 4px;"> {{-- Menambahkan onerror untuk fallback jika gambar gagal dimuat dan border-radius --}}
                    </figure>

                    <h2 class="title is-5 mb-2">{{ $kost->nama_kost }}</h2> {{-- Judul kost --}}
                    <p class="subtitle is-6 has-text-grey mb-2">{{ $kost->alamat }}</p> {{-- Alamat kost --}}
                    <p class="is-size-5 has-text-success has-text-weight-bold mb-3">Rp {{ number_format($kost->harga_per_bulan, 0, ',', '.') }}</p> {{-- Harga kost --}}

                    <a href="{{ route('kosts.show', $kost->id) }}" class="button is-link is-small is-fullwidth"> {{-- Tombol Lihat Detail --}}
                        Lihat Detail
                    </a>
                </div>
            </div>
        @endforeach
    </div>
</section>
@endsection
