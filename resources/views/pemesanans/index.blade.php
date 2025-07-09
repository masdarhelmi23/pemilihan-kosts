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
    .title.has-text-primary { /* Menyesuaikan warna judul 'Pesan Kost' */
        color: #48c78e !important;
    }
    .label { /* Warna label form */
        color: #e2e8f0;
    }
    .input, .textarea, .select select { /* Gaya input, textarea, dan select */
        background-color: #1a202c; /* Latar belakang input menjadi gelap */
        border-color: #4a5568; /* Warna border input */
        color: #e2e8f0; /* Warna teks input */
    }
    .input::placeholder, .textarea::placeholder { /* Warna placeholder */
        color: #a0aec0;
    }
    .input:focus, .textarea:focus, .select select:focus {
        border-color: #3e8ed0; /* Warna border saat fokus */
        box-shadow: 0 0 0 0.125em rgba(62, 142, 208, 0.25); /* Efek shadow saat fokus */
    }
    .button.is-success { /* Gaya tombol 'Simpan Pemesanan' */
        background-color: #48c78e;
        border-color: #48c78e;
        color: #fff;
        border-radius: 4px;
    }
    .button.is-success:hover {
        background-color: #3eb578;
        border-color: #3eb578;
    }
    .notification.is-success.is-light {
        background-color: #2a613f; /* Warna notifikasi sukses yang lebih gelap */
        color: #e2e8f0;
    }
    .notification.is-info.is-dark { /* Warna notifikasi info yang lebih gelap */
        background-color: #2a4e61;
        color: #e2e8f0;
    }
</style>

<section class="section" style="min-height: 100vh; padding: 1.5rem;">
    <div class="box has-background-dark has-text-white" style="border-radius: 8px; padding: 2.5rem; margin-left: 1.5rem; margin-right: 1.5rem;">
        <h1 class="title is-3 has-text-primary mb-5" style="color: #48c78e !important;">Pesan Kost: {{ $kost->nama_kost }}</h1>

        {{-- Pesan Sukses Bulma --}}
        @if(session('success'))
            <div class="notification is-success is-light is-rounded mb-4" style="border-radius: 4px;">
                <button class="delete"></button>
                {{ session('success') }}
            </div>
        @endif

        <form action="{{ route('pemesanans.store') }}" method="POST">
            @csrf
            <input type="hidden" name="kost_id" value="{{ $kost->id }}">

            <div class="field">
                <label class="label">Nama Penyewa</label>
                <div class="control">
                    <input class="input" type="text" name="nama_penyewa" placeholder="Masukkan nama Anda" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Mulai</label>
                <div class="control">
                    <input class="input" type="date" name="tanggal_mulai" required>
                </div>
            </div>

            <div class="field">
                <label class="label">Tanggal Akhir</label>
                <div class="control">
                    <input class="input" type="date" name="tanggal_akhir" required>
                </div>
            </div>

            <div class="field is-grouped is-justify-content-center mt-5">
                <div class="control">
                    <button type="submit" class="button is-success is-medium">Simpan Pemesanan</button>
                </div>
            </div>
        </form>
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
