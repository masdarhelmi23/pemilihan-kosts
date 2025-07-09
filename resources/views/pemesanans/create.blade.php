@extends('layouts.app')

@section('content')
{{-- Menambahkan blok style untuk memastikan latar belakang gelap di seluruh halaman dan elemen form --}}
<style>
    html, body {
        background-color: #1a202c !important; /* Warna latar belakang sangat gelap untuk seluruh halaman */
        color: #e2e8f0; /* Warna teks default untuk kontras */
        min-height: 100vh; /* Memastikan body mengambil tinggi penuh viewport */
    }
    /* Menghapus .dark-page-wrapper dan menerapkan gayanya langsung ke section.hero */
    .hero.is-fullheight {
        background-color: #1a202c !important; /* Pastikan hero section juga gelap */
        min-height: 100vh; /* Pastikan hero section mengambil tinggi penuh viewport */
        display: flex; /* Menggunakan flexbox untuk centering */
        justify-content: center; /* Pusatkan konten secara horizontal */
        align-items: center; /* Pusatkan konten secara vertikal */
        padding: 1.5rem; /* Padding di sekitar box */
    }
    .box {
        background-color: #2d3748 !important; /* Latar belakang box menjadi gelap, pastikan dengan !important */
        color: #e2e8f0; /* Warna teks di dalam box */
        border-radius: 8px;
        padding: 2.5rem;
        width: 100%; /* Memastikan box mengambil lebar penuh dari wrapper */
        max-width: 768px; /* Batasi lebar maksimum box agar tidak terlalu lebar di desktop */
    }
    .title.is-3.has-text-primary { /* Menyesuaikan warna judul 'Pesan Kost' */
        color: #48c78e !important;
    }
    .label { /* Warna label form */
        color: #e2e8f0 !important; /* Pastikan label berwarna terang */
    }
    .input, .textarea, .select select { /* Gaya input, textarea, dan select */
        background-color: #1a202c !important; /* Latar belakang input menjadi gelap */
        border-color: #4a5568 !important; /* Warna border input */
        color: #e2e8f0 !important; /* Warna teks input */
    }
    .input::placeholder, .textarea::placeholder { /* Warna placeholder */
        color: #a0aec0 !important;
    }
    .input:focus, .textarea:focus, .select select:focus {
        border-color: #3e8ed0 !important; /* Warna border saat fokus */
        box-shadow: 0 0 0 0.125em rgba(62, 142, 208, 0.25) !important; /* Efek shadow saat fokus */
    }
    .button.is-primary { /* Gaya tombol 'Simpan Pemesanan' */
        background-color: #48c78e !important; /* Mengubah warna tombol primary ke hijau */
        border-color: #48c78e !important;
        color: #fff !important;
        border-radius: 4px;
    }
    .button.is-primary:hover {
        background-color: #3eb578 !important;
        border-color: #3eb578 !important;
    }
    .notification.is-success.is-light {
        background-color: #2a613f !important; /* Warna notifikasi sukses yang lebih gelap */
        color: #e2e8f0 !important;
    }
    .notification.is-info.is-dark { /* Warna notifikasi info yang lebih gelap */
        background-color: #2a4e61 !important;
        color: #e2e8f0 !important;
    }
</style>

{{-- Menggunakan section.hero sebagai kontainer utama dengan latar belakang gelap dan centering --}}
<section class="hero is-fullheight">
    <div class="box"> {{-- Bulma 'box' component for the main container --}}
        <h1 class="title is-3 has-text-primary mb-5" style="text-align: center;">Pesan Kost: {{ $kost->nama_kost }}</h1> {{-- Bulma title and color classes --}}

        <form action="{{ route('pemesanans.store', $kost->id) }}" method="POST">
            @csrf

            <div class="field"> {{-- Bulma 'field' for form groups --}}
                <label class="label" for="nama_penyewa">Nama Penyewa</label> {{-- Bulma 'label' class --}}
                <div class="control"> {{-- Bulma 'control' for input wrapping --}}
                    <input class="input" type="text" name="nama_penyewa" id="nama_penyewa" placeholder="Masukkan nama penyewa" required> {{-- Bulma 'input' class --}}
                </div>
            </div>

            <div class="field">
                <label class="label" for="tanggal_mulai">Tanggal Mulai</label>
                <div class="control">
                    <input class="input" type="date" name="tanggal_mulai" id="tanggal_mulai" required>
                </div>
            </div>

            <div class="field">
                <label class="label" for="tanggal_akhir">Tanggal Akhir</label>
                <div class="control">
                    <input class="input" type="date" name="tanggal_akhir" id="tanggal_akhir" required>
                </div>
            </div>

            <div class="field is-grouped is-justify-content-center mt-5"> {{-- Menggunakan is-grouped untuk tombol dan is-justify-content-center untuk memusatkannya --}}
                <div class="control">
                    <button type="submit" class="button is-primary is-medium"> {{-- Bulma 'button' classes --}}
                        Simpan Pemesanan
                    </button>
                </div>
            </div>
        </form>
    </div>
</section>
@endsection
