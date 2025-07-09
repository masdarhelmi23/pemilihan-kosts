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
                <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
                    <div class="box has-text-left">
                        {{-- Cek nama kost untuk menentukan gambar online --}}
                        @php
                            $imageUrl = null;
                            switch(strtolower($kost->nama_kost)) {
                                case 'pratama':
                                    $imageUrl = 'https://binabangunbangsa.com/wp-content/uploads/2020/03/tips-Manajemen-Rumah-Kost-yang-Baik-dan-Benar-.jpg';
                                    break;
                                case 'babol':
                                    $imageUrl = 'https://office.mitrarenov.com/assets/main/images/news/93cf29661239b41f5cc393e112ef7a39.jpg';
                                    break;
                                case 'griya mustika':
                                    $imageUrl = 'https://papikost.com/images/property/478_968253603.jpg';
                                    break;
                                default:
                                    $imageUrl = $kost->gambar ? asset('storage/kosts/' . $kost->gambar) : 'https://via.placeholder.com/400x300?text=No+Image';
                                    break;
                            }
                        @endphp

                        <figure class="image is-4by3 mb-4">
                            <img src="{{ $imageUrl }}" alt="Foto {{ $kost->nama_kost }}">
                        </figure>

                        <h2 class="title is-5 mb-2">{{ $kost->nama_kost }}</h2>
                        <p class="subtitle is-6 has-text-grey mb-2">{{ $kost->alamat }}</p>
                        <p class="is-size-5 has-text-success has-text-weight-bold mb-3">Rp {{ number_format($kost->harga_per_bulan, 0, ',', '.') }}</p>

                        <a href="{{ route('kosts.show', $kost->id) }}" class="button is-link is-small is-fullwidth">
                            Lihat Detail
                        </a>
                    </div>
                </div>
            @endforeach
        </div>
    </div>
</section>
@endsection
