@extends('layouts.app')

@section('content')
<section class="section">
    <div class="container">
        {{-- Header dengan Judul dan Tombol Riwayat Pemesanan --}}
        <div class="level">
            <div class="level-left">
                <div class="level-item">
                    <h1 class="title is-2 has-text-link">Daftar Kost</h1>
                </div>
            </div>
            <div class="level-right">
                <div class="level-item">
                    <a href="{{ route('pemesanans.index') }}" class="button is-primary is-medium">
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
                        @if($kost->gambar)
                            <figure class="image is-4by3 mb-4"> {{-- Margin bawah untuk gambar --}}
                                <img src="{{ asset('images/kosts/' . $kost->gambar) }}" alt="Foto {{ $kost->nama_kost }}"> {{-- Path gambar disesuaikan --}}
                            </figure>
                        @else
                            <figure class="image is-4by3 mb-4">
                                <img src="https://via.placeholder.com/400x300?text=No+Image" alt="No Image Available"> {{-- Gambar default --}}
                            </figure>
                        @endif

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
    </div>
</section>
@endsection
