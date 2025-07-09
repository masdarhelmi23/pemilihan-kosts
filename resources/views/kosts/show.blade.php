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
        padding: 2.5rem;
    }
    .title.has-text-dark { /* Menyesuaikan warna title di dalam box */
        color: #e2e8f0 !important;
    }
    .card {
        background-color: #1a202c; /* Latar belakang card menjadi gelap */
        border-radius: 8px;
    }
    .card-content {
        color: #e2e8f0; /* Warna teks di dalam card */
    }
    .notification.is-success.is-light {
        background-color: #2a613f; /* Warna notifikasi sukses yang lebih gelap */
        color: #e2e8f0;
    }
    .notification.is-info.is-light {
        background-color: #2a4e61; /* Warna notifikasi info yang lebih gelap */
        color: #e2e8f0;
    }
    .has-text-grey-dark { /* Menyesuaikan warna teks abu-abu gelap agar terlihat di tema gelap */
        color: #a0aec0 !important;
    }
</style>

<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="box">
                {{-- Pesan Sukses Bulma --}}
                @if(session('success'))
                    <div class="notification is-success is-light is-rounded mb-4" style="border-radius: 4px;">
                        <button class="delete"></button>
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="title is-3 has-text-primary mb-3" style="color: #48c78e !important;"> {{-- Pastikan warna primary tetap hijau --}}
                    <span class="icon-text is-justify-content-center">
                        <span class="icon has-text-info" style="color: #3e8ed0 !important;"> {{-- Pastikan warna info tetap biru --}}
                            <i class="fas fa-home"></i>
                        </span>
                        <span>{{ $kost->nama_kost }}</span>
                    </span>
                </h1>
                <p class="subtitle is-6 has-text-grey mb-4" style="color: #a0aec0 !important;">{{ $kost->alamat }}</p> {{-- Warna subtitle disesuaikan --}}

                <div class="columns is-multiline is-variable is-4 mb-6 is-centered">
                    @forelse($kost->photos as $photo)
                        <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
                            <div class="card" style="border-radius: 8px;"> {{-- Tambahkan border-radius ke card --}}
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        @php
                                            $photoUrl = asset('storage/' . $photo->path); // Default to storage path

                                            // Override with specific online URLs if kost name matches
                                            if (strtolower($kost->nama_kost) === 'pratama') {
                                                $photoUrl = 'https://binabangunbangsa.com/wp-content/uploads/2020/03/tips-Manajemen-Rumah-Kost-yang-Baik-dan-Benar-.jpg';
                                            } elseif (strtolower($kost->nama_kost) === 'babol') {
                                                $photoUrl = 'https://office.mitrarenov.com/assets/main/images/news/93cf29661239b41f5cc393e112ef7a39.jpg';
                                            } elseif (strtolower($kost->nama_kost) === 'griya mustika') {
                                                $photoUrl = 'https://papikost.com/images/property/478_968253603.jpg';
                                            }
                                        @endphp
                                        <img src="{{ $photoUrl }}" alt="Foto Kost" style="border-radius: 8px 8px 0 0;" onerror="this.onerror=null;this.src='https://via.placeholder.com/400x300?text=Image+Load+Error';"> {{-- Tambahkan border-radius ke gambar di card dan error fallback --}}
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
                            <div class="card" style="border-radius: 8px;">
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        <img src="https://via.placeholder.com/400x300?text=No+Photo" alt="No Photo Available" style="border-radius: 8px 8px 0 0;">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @endforelse
                </div>

                <p class="mb-2 is-size-5 has-text-centered">
                    <strong class="has-text-grey-dark">Harga per bulan:</strong>
                    <span class="has-text-success has-text-weight-semibold">Rp {{ number_format($kost->harga_per_bulan, 0, ',', '.') }}</span>
                </p>
                <p class="mb-4 has-text-centered">
                    <strong class="has-text-grey-dark">Fasilitas:</strong> {{ $kost->fasilitas }}
                </p>

                <div class="has-text-centered mb-6">
                    <a href="{{ route('pemesanans.create', $kost->id) }}" class="button is-primary is-medium" style="border-radius: 4px;">
                        Pesan Kost Ini
                    </a>
                </div>

                {{-- Form Tambah Review (Bulma Modern) --}}
                <div class="mt-8">
                    <h2 class="title is-4 has-text-dark mb-4">Tulis Review</h2>
                    <form action="{{ route('reviews.store', $kost->id) }}" method="POST">
                        @csrf

                        <div class="field">
                            <label class="label" style="color: #e2e8f0;">Nama Anda</label> {{-- Warna label disesuaikan --}}
                            <div class="control">
                                <input class="input" type="text" name="nama_reviewer" placeholder="Masukkan nama Anda" style="background-color: #1a202c; border-color: #4a5568; color: #e2e8f0;"> {{-- Input field disesuaikan --}}
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" style="color: #e2e8f0;">Komentar</label>
                            <div class="control">
                                <textarea class="textarea" name="komentar" placeholder="Tulis komentar Anda tentang kost ini" style="background-color: #1a202c; border-color: #4a5568; color: #e2e8f0;"></textarea> {{-- Textarea disesuaikan --}}
                            </div>
                        </div>

                        <div class="field">
                            <label class="label" style="color: #e2e8f0;">Rating</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="rating" style="background-color: #1a202c; border-color: #4a5568; color: #e2e8f0;"> {{-- Select disesuaikan --}}
                                        <option value="5">5 - Sangat Bagus</option>
                                        <option value="4">4 - Bagus</option>
                                        <option value="3">3 - Cukup</option>
                                        <option value="2">2 - Kurang</option>
                                        <option value="1">1 - Buruk</option>
                                    </select>
                                </div>
                            </div>
                        </div>

                        <div class="field is-grouped is-justify-content-center">
                            <div class="control">
                                <button type="submit" class="button is-success is-medium" style="border-radius: 4px;">Kirim Review</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Akhir Form Tambah Review --}}

                {{-- Menampilkan Review (Bulma Modern) --}}
                <div class="mt-8">
                    <h2 class="title is-4 has-text-dark mb-4">Review</h2>
                    @forelse($kost->reviews as $review)
                        <div class="box mb-3 has-text-left" style="background-color: #1a202c; border-radius: 8px;"> {{-- Box untuk review disesuaikan --}}
                            <p class="title is-5 mb-1" style="color: #e2e8f0;">{{ $review->nama_reviewer }}
                                <span class="tag is-warning is-light ml-2">{{ $review->rating }}/5</span>
                            </p>
                            <p class="subtitle is-6 has-text-grey" style="color: #a0aec0;">{{ $review->komentar }}</p>
                        </div>
                    @empty
                        <div class="notification is-info is-light" style="border-radius: 4px;">
                            <p>Belum ada review untuk kost ini.</p>
                        </div>
                    @endforelse
                </div>
                {{-- Akhir Menampilkan Review --}}

            </div>
        </div>
    </div>
</section>
@endsection
