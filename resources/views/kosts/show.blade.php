@extends('layouts.app')

@section('content')
<section class="hero is-fullheight">
    <div class="hero-body">
        <div class="container has-text-centered">
            <div class="box">
                {{-- Pesan Sukses Bulma --}}
                @if(session('success'))
                    <div class="notification is-success is-light is-rounded mb-4">
                        <button class="delete"></button>
                        {{ session('success') }}
                    </div>
                @endif

                <h1 class="title is-3 has-text-primary mb-3">
                    <span class="icon-text is-justify-content-center">
                        <span class="icon has-text-info">
                            <i class="fas fa-home"></i>
                        </span>
                        <span>{{ $kost->nama_kost }}</span>
                    </span>
                </h1>
                <p class="subtitle is-6 has-text-grey mb-4">{{ $kost->alamat }}</p>

                <div class="columns is-multiline is-variable is-4 mb-6 is-centered">
                    @forelse($kost->photos as $photo)
                        <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        <img src="{{ asset('storage/' . $photo->path) }}" alt="Foto Kost">
                                    </figure>
                                </div>
                            </div>
                        </div>
                    @empty
                        <div class="column is-one-third-desktop is-half-tablet is-full-mobile">
                            <div class="card">
                                <div class="card-image">
                                    <figure class="image is-4by3">
                                        <img src="https://via.placeholder.com/400x300?text=No+Photo" alt="No Photo Available">
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
                    <a href="{{ route('pemesanans.create', $kost->id) }}" class="button is-primary is-medium">
                        Pesan Kost Ini
                    </a>
                </div>

                {{-- Form Tambah Review (Bulma Modern) --}}
                <div class="mt-8">
                    <h2 class="title is-4 has-text-dark mb-4">Tulis Review</h2>
                    <form action="{{ route('reviews.store', $kost->id) }}" method="POST">
                        @csrf

                        <div class="field">
                            <label class="label">Nama Anda</label>
                            <div class="control">
                                <input class="input" type="text" name="nama_reviewer" placeholder="Masukkan nama Anda">
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Komentar</label>
                            <div class="control">
                                <textarea class="textarea" name="komentar" placeholder="Tulis komentar Anda tentang kost ini"></textarea>
                            </div>
                        </div>

                        <div class="field">
                            <label class="label">Rating</label>
                            <div class="control">
                                <div class="select is-fullwidth">
                                    <select name="rating">
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
                                <button type="submit" class="button is-success is-medium">Kirim Review</button>
                            </div>
                        </div>
                    </form>
                </div>
                {{-- Akhir Form Tambah Review --}}

                {{-- Menampilkan Review (Bulma Modern) --}}
                <div class="mt-8">
                    <h2 class="title is-4 has-text-dark mb-4">Review</h2>
                    @forelse($kost->reviews as $review)
                        <div class="box mb-3 has-text-left"> {{-- Menggunakan Bulma 'box' untuk setiap review --}}
                            <p class="title is-5 mb-1">{{ $review->nama_reviewer }}
                                <span class="tag is-warning is-light ml-2">{{ $review->rating }}/5</span> {{-- Bulma tag for rating --}}
                            </p>
                            <p class="subtitle is-6 has-text-grey">{{ $review->komentar }}</p>
                        </div>
                    @empty
                        <div class="notification is-info is-light">
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